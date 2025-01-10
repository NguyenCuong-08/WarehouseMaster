<?php

namespace App\Modules\LichSuGiaoDich\Controllers\Admin;

use App\Http\Middleware\AdminCommon;
use App\Modules\GoiDichVu\Controllers\Admin\CURDBaseController;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\Post\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use App\Models\Admin;

class DSThanhVienController extends CURDBaseController
{

    protected $module = [
        'code' => 'list-user',
        'table_name' => 'admin',
        'label' => 'DS thành viên do mình giới thiệu',
        'modal' => '\App\Models\Admin',
        'list' => [
            ['name' => 'image', 'type' => 'image', 'label' => 'Ảnh'],
            ['name' => 'name', 'type' => 'text', 'label' => 'Họ tên', 'sort' => true],

            ['name' => 'tel', 'type' => 'text', 'label' => 'Sđt', 'sort' => true],
            ['name' => 'email', 'type' => 'text', 'label' => 'Email', 'sort' => true],
            ['name' => 'vi_tien', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.so_du_vi',  'label' => 'ssSố dư',   'sort' => true],

            ['name' => 'status', 'type' => 'status', 'label' => 'Trạng thái', 'sort' => true],
            ['name' => 'ngay_tham_gia', 'type' => 'date_vi', 'label' => 'Ngày vào', 'sort' => true],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Tên gói', 'group_class' => 'col-md-8'],
//                ['name' => 'dv_thoi_gian', 'type' => 'text', 'class' => 'required', 'label' => 'Đơn vị thời gian', 'group_class' => 'col-md-4'],
                ['name' => 'price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá bán', 'group_class' => 'col-md-4'],
//                ['name' => 'old_price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá cũ','group_class' => 'col-md-4'],
                ['name' => 'value', 'type' => 'text', 'class' => 'required', 'label' => 'Giá trị', 'group_class' => 'col-md-4'],
                ['name' => 'description', 'type' => 'textarea', 'class' => 'required', 'label' => 'Các hạng mục quyền lợi trong gói', 'group_class' => 'col-md-12'],
//                ['name' => 'note', 'type' => 'textarea', 'class' => 'required', 'label' => 'Mô tả ngắn','group_class' => 'col-md-12'],
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, type'
    ];

    protected $filter = [
//        'trang_thai' => [
//            'label' => 'Trạng thái',
//            'type' => 'select',
//            'options' => [
//                '' => 'Tất cả',
//                0 => 'Đang rảnh',
//                1 => 'Đang sử dụng',
//            ],
//            'query_type' => '='
//        ],
    ];

    public function getIndex(Request $request)
    {

        $admin = Auth::guard('admin')->user()->id;
        $data = $this->getDataList2($request, $admin);
//        $this->billcheck();die();
        return view('LichSuGiaoDich.dsThanhVien')->with($data);
    }
    public function getDataList2(Request $request, $admin) {
        //  Filter
        $where = $this->filterSimple($request);
        $listItem = $this->model->whereRaw($where)->where('invite_by', $admin);

        $listItem = $this->quickSearch($listItem, $request);
        if ($this->whereRaw) {
            $listItem = $listItem->whereRaw($this->whereRaw);
        }
        $listItem = $this->appendWhere($listItem, $request);

        //  Export
        if ($request->has('export')) {
            $this->exportExcel($request, $listItem->take(9000)->get());
        }
        //lọc phân quyền,nếu super_admin mới cho hiển thị full
        if(!\Auth::guard('admin')->user()->super_admin == 1){
            $listItem = $listItem->where('admin_id','=',\Auth::guard('admin')->user()->id);
        }
        //  Sort sap xep
        $listItem = $this->sort($request, $listItem);
        $data['record_total'] = $listItem->count();
        $data = $this->thongKe($data, $listItem, $request);

        if ($request->has('limit')) {
            $data['listItem'] = $listItem->paginate($request->limit);
            $data['limit'] = $request->limit;
        } else {
            $data['listItem'] = $listItem->paginate($this->limit_default);
            $data['limit'] = $this->limit_default;
        }
        $data['page'] = $request->get('page', 1);

        $data['param_url'] = $request->all();

        //  Get data default (param_url, filter, module) for return view
        $data['module'] = $this->module;
        $data['quick_search'] = $this->quick_search;
        $data['filter'] = $this->filter;

        //  Set data for seo
        $data['page_title'] = $this->module['label'];
        $data['page_type'] = 'list';
        return $data;
    }
    public function chuyentienForm()
    {
        return view('LichSuGiaoDich.chuyentien');
    }

    public function chuyentienSearch(Request $request)
    {
        $admin_id = \Auth::guard('admin')->user()->id;
        $data = Admin::where(function ($query) use ($request) {
            $query->where('email', $request->email)
                ->orWhere('tel', $request->email);
        })
            ->where('id', '!=', $admin_id)
            ->get();
        if (!$data->isEmpty()) {
            return redirect()->back()->with('data', $data);
        } else {
            CommonHelper::one_time_message('error', 'Không tìm thấy thông tin người nhận');
            return redirect()->back();
        }
    }

    public function chuyentien2Form($user_id2)
    {
        $data = Admin::where('id', $user_id2)->first();
        return view('LichSuGiaoDich.chuyentiensearch', compact('data'));
    }

    public function chuyentien2(Request $request, $user_id2)
    {
        $admin = \Auth::guard('admin')->user();
        $admin2 = Admin::where('id', $user_id2)->first();

        $count = Admin::where('invite_by', $admin->id)->count();
        if ($count < 3) {
            CommonHelper::one_time_message('error', 'Ví đang bị khóa');
            return redirect()->back();
        }
        if ($request->sotien > $admin->vi_tien or $request->sotien < 0) {
            CommonHelper::one_time_message('error', 'Số dư không đủ');
            return redirect()->back();
        }
        if (!Hash::check($request->password, $admin->password)) {
            CommonHelper::one_time_message('error', 'Mật khẩu không đúng');
            return redirect()->back();

        }

        Admin::where('id', $admin->id)->update([
            'vi_tien' => $admin->vi_tien - $request->sotien
        ]);
        Admin::where('id', $user_id2)->update([
            'vi_tien' => $admin2->vi_tien + $request->sotien
        ]);
        LichSuGiaoDich::create([
            'user_id1' => $admin->id,
            'user_id2' => $admin2->id,
            'amount' => $request->sotien,
            'note' => $request->note,
            'created_at' => Carbon::now()
        ]);
        CommonHelper::one_time_message('success', 'Chuyển tiền thành công');

        return redirect()->back();
    }

    public function muaGoi(Request $request, string $id)
    {
        $admin_id = \Auth::guard('admin')->user()->id;
        $goi_da_mua = GoiDichVu::find($id);
        $today = Carbon::now();
        Bill::create([
            'admin_id' => $admin_id,
            'goi_dich_vu_id' => $goi_da_mua->id,
            'total_price' => $goi_da_mua->price,
            'status' => '0',
        ]);
//        $admin =  \Auth::guard('admin')->user();
//        $invite_by = $admin->invite_by;
//        $parentid = $admin->parent_id;
//        //nó có mã giới thiệu và chưa có parrent_id
//        if($invite_by && !$parentid){
//            $parent_id = $this->TimCha($invite_by);
//
//            //admin cha
//            $parent_admin = Admin::find($parent_id);
//            $level_cha = $parent_admin->level;
//            $admin->update([
//                'parent_id'=>$parent_id,
//                'ngay_vao_cay'=>$today,
//                'level'=>$level_cha + 1,
//                'status'=> 1,
//
//            ]);
////            dd($admin->ngay_vao_cay);
//
//            //cập nhật total_invice cho invite
//            $invite_admin = Admin::find($invite_by);
//            $invite_admin->update([
//                'invite_total'=> $invite_admin->invite_total + 1,
//            ]);
//        }

        return response()->json(['success' => 'Mua thành công']);
    }

    public function appendWhere($query, $request)
    {

        return $query;
    }

    public function getPublish(Request $request)
    {
        try {

            $item = $this->model->find($request->id);

            if (!is_object($item))
                return response()->json([
                    'status' => false,
                    'msg' => 'Không tìm thấy bản ghi'
                ]);

            if ($item->{$request->column} == 0)
                $item->{$request->column} = 1;
            else
                $item->{$request->column} = 0;

            $item->save();

            return response()->json([
                'status' => true,
                'published' => $item->{$request->column} == 1 ? true : false
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'published' => null,
                'msg' => 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.'
            ]);
        }
    }

    public function getData($request)
    {
        //  Filter
        $where = $this->filterSimple($request);
        $listItem = $this->model->whereRaw($where);
        $listItem = $this->quickSearch($listItem, $request);
        if ($this->whereRaw) {
            $listItem = $listItem->whereRaw($this->whereRaw);
        }
        $listItem = $this->appendWhere($listItem, $request);

        //  Export
        if ($request->has('export')) {
            $this->exportExcel($request, $listItem->get());
        }

        //  Sort
        $listItem = $this->sort($request, $listItem);
        return $listItem;
    }

//    public function getDataList(Request $request)
//    {
//        $listItem = $this->getData($request);
//
//        $data['record_total'] = $listItem->count();
//
////        $data['tong_thu'] = $this->getData($request)->where('so_tien', '>', 0)->sum('price');
////        $data['tong_chi'] = $this->getData($request)->where('so_tien', '<', 0)->sum('price');
//
//        if ($request->has('limit')) {
//            $data['listItem'] = $listItem->paginate($request->limit);
//            $data['limit'] = $request->limit;
//        } else {
//            $data['listItem'] = $listItem->paginate($this->limit_default);
//            $data['limit'] = $this->limit_default;
//        }
//        $data['page'] = $request->get('page', 1);
//
//        $data['param_url'] = $request->all();
//
//        //  Get data default (param_url, filter, module) for return view
//        $data['module'] = $this->module;
//        $data['quick_search'] = $this->quick_search;
//        $data['filter'] = $this->filter;
//
//        //  Set data for seo
//        $data['page_title'] = $this->module['label'];
//        $data['page_type'] = 'list';
//        return $data;
//    }

    public function add(Request $request)
    {
        try {
            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('GoiDichVu.admin.add')->with($data);
            } else if ($_POST) {
//                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'name' => 'required',
                ], [
//                    'name.required' => 'Bắt buộc phải nhập tên',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert

//                    $data['admin_id'] = \Auth::guard('admin')->user()->id;

                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
                        CommonHelper::flushCache();
                        CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                    } else {
                        CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                    }

                    if ($request->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $this->model
                        ]);
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request)
    {
        try {
            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);

                return view('GoiDichVu.admin.edit')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'name' => 'required',
//                    'link' => 'required',
                ], [
//                    'name.required' => 'Bắt buộc phải nhập tên gói',
//                    'link.unique' => 'Web này đã đăng!',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
//                    $data['ma_don'] = '|' . implode('|', $request->get('ma_don', [])) . '|';

                    foreach ($data as $k => $v) {
                        $item->$k = $v;
                    }

                    if ($item->save()) {
                        \DB::commit();
                        CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    } else {
                        \DB::rollback();
                        CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    }
                    if ($request->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $item
                        ]);
                    }

                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit/' . $item->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            \DB::rollback();
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }


    public function delete(Request $request)
    {
        try {
            $item = $this->model->find($request->id);

            $bill_id = $item->bill_id;

            $item->delete();

            CommonHelper::flushCache();
            CommonHelper::one_time_message('success', 'Xóa thành công!');

            return redirect('admin/' . $this->module['code']);
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return \App\CRMEdu\Controllers\Admin\back();
        }
    }

    public function multiDelete(Request $request)
    {
        try {
            $ids = $request->ids;
            if (is_array($ids)) {
                $this->model->whereIn('id', $ids)->delete();
            }
            CommonHelper::flushCache();
            CommonHelper::one_time_message('success', 'Xóa thành công!');
            return response()->json([
                'status' => true,
                'msg' => ''
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên'
            ]);
        }
    }

    public function takeDataImagePassPort($admin_id)
    {
        $admin = Admin::find($admin_id);
        $totalData = 0;
        $fileUserPath = "filemanager/userfiles/anh_ho_chieu/" . $admin_id;
        $fileItem = scandir($fileUserPath);
        foreach ($fileItem as $a) {
            if ($a !== '.' && $a !== '..') {
                if ($a !== 'anh_the') {
                    $fileItemPath = $fileUserPath . '/' . $a;
                    $months = scandir($fileItemPath);
                    foreach ($months as $month) {
                        if ($month !== '.' && $month !== '..') {
                            $monthPath = $fileItemPath . '/' . $month;
                            $days = scandir($monthPath);
                            foreach ($days as $day) {
                                if ($day !== '.' && $day !== '..') {
                                    $dayPath = $monthPath . '/' . $day;
                                    $images = scandir($dayPath);
                                    foreach ($images as $image) {
                                        if ($image !== '.' && $image !== '..') {
                                            $imagePath = $dayPath . '/' . $image;
                                            $totalData += filesize($imagePath);
                                        }

                                    }

                                }
                            }
                        }
                    }
                } else {
                    $avatarPath = $fileUserPath . '/' . $a;
                    $years = scandir($avatarPath);
                    foreach ($years as $year) {
                        if ($year !== '.' && $year !== '..') {
                            $yearPath = $avatarPath . '/' . $year;
                            $months = scandir($yearPath);
                            foreach ($months as $month) {
                                if ($month !== '.' && $month !== '..') {
                                    $monthPath = $yearPath . '/' . $month;
                                    $days = scandir($monthPath);
                                    foreach ($days as $day) {
                                        if ($day !== '.' && $day !== '..') {
                                            $dayPath = $monthPath . '/' . $day;

                                            $images = scandir($dayPath);
                                            foreach ($images as $image) {
                                                if ($image !== '.' && $image !== '..') {
                                                    $imagePath = $dayPath . '/' . $image;
                                                    $totalData += filesize($imagePath);
                                                }
                                            }

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $admin->dung_luong = $totalData / pow(1024, 2);
        $admin->save();
    }

    public function goiDichVuView(Request $request)
    {
        $data = $this->getDataList($request);
        return view('GoiDichVu.admin.goi_dich_vu')->with($data);
    }

    public function register(Request $request)
    {
        $admin_id = \Auth::guard('admin')->user()->id;
        $admin = Admin::find($admin_id);
        $goi_dich_vu_id = $request->goi_dich_vu_id;
        $goi_dich_vu = GoiDichVu::find($goi_dich_vu_id);
//        dd(isset($goi_dich_vu));
        if (isset($goi_dich_vu) && isset($admin)) {
            if ($admin->vi_tien >= $goi_dich_vu->price) {
                $admin->vi_tien -= $goi_dich_vu->price;
                $admin->dung_luong_gioi_han += $goi_dich_vu->value;
                $admin->save();
                $this->takeDataImagePassPort($admin_id);
                CommonHelper::flushCache();
                CommonHelper::one_time_message('success', 'Bạn đã mua gói thành công!');
            } else {
                CommonHelper::flushCache();
                CommonHelper::one_time_message('error', 'Số dư của quý khách không đủ, xin vui lòng nạp thêm tiền !');
                return redirect()->back();
            }
        }
        return redirect()->back();

    }


}
