<?php

namespace App\Modules\LichSuGiaoDich\Controllers\Admin;

use App\Http\Middleware\AdminCommon;
use App\Models\RoleAdmin;
use App\Models\Setting;
use App\Modules\GoiDichVu\Controllers\Admin\CURDBaseController;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\LichSuGiaoDich\Models\SoDu;
use App\Modules\Post\Models\Bill;
use Illuminate\Http\Request;

//use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use App\Models\Admin;
use App\Modules\Affiliate\Helpers\CommonHelper;

class LichSuGiaoDichController extends CURDBaseController
{

    protected $module = [
        'code' => 'lich_su_giao_dich',
        'table_name' => 'lich_su_giao_dich',
        'label' => 'Lịch sử giao dịch',
        'modal' => '\App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich',
        'list' => [
//            ['name' => 'id', 'type' => 'text', 'label' => 'Mã giao dịch'],
            ['name' => 'sender_id', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.nguoi_chuyen', 'label' => 'Tên người gửi'],
            ['name' => 'receiver_id', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.nguoi_nhan', 'label' => 'Tên người nhận'],
            ['name' => 'amount', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.so_tien2', 'label' => 'Số point',],
            ['name' => 'surplus', 'type' => 'price_vi', 'label' => 'Số dư',],
//            ['name' => 'account_balance', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.so_du', 'label' => 'Số dư',],
            ['name' => 'note', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.note', 'label' => 'Nội dung',],
            ['name' => 'created_at', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.thoigian', 'label' => 'Thời gian',],
//            ['name' => 'type', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.loai', 'label' => 'Loại'],
        ],
        'list2' => [
//            ['name' => 'id', 'type' => 'text', 'label' => 'Mã giao dịch'],
            ['name' => 'admin_id', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.admin_id', 'label' => 'Người tạo'],
            ['name' => 'tel', 'type' => 'relation', 'label' => 'Sđt', 'object' => 'adminId', 'display_field' => 'tel'],
            ['name' => 'sender_id', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.nguoi_chuyen', 'label' => 'Tên người gửi'],
            ['name' => 'receiver_id', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.nguoi_nhan', 'label' => 'Tên người nhận'],
//            ['name' => 'surplus', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.so_du_truoc', 'label' => 'Số dư trước',],
            ['name' => 'amount', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.so_tien2', 'label' => 'Số point',],
            ['name' => 'account_balance', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.so_du2', 'label' => 'Số dư',],
            ['name' => 'note', 'type' => 'text', 'label' => 'Nội dung',],
            ['name' => 'created_at', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.thoigian', 'label' => 'Thời gian',],
//            ['name' => 'type', 'type' => 'custom', 'td' => 'LichSuGiaoDich.td.loai', 'label' => 'Loại'],
        ],
        'form' => [
            'general_tab' => [

            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, type'
    ];

    protected $filter = [
        'created_at' => [
            'label' => 'Thời gian tạo',
            'type' => 'from_to_date',
            'query_type' => 'from_to_date'
        ],
        'search_admin_id' => [
            'label' => 'Tên',
            'type' => 'select2_model',
            'display_field' => 'name',
            'object' => 'adminId',
            'model' => Admin::class,
            'query_type' => 'custom'
        ],
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
        $admin_id = Auth::guard('admin')->user()->id;
        $data = $this->getDataList2($request, $admin_id);
//        $this->billcheck();die();
//        dd('2');
        return view('LichSuGiaoDich.list')->with($data);
    }

    public function getLsgd(Request $request)
    {
        $data = $this->getDataList($request);
        return view('LichSuGiaoDich.list2')->with($data);
    }

    public function getDataList2(Request $request, $admin_id)
    {
        //  Filter
        $where = $this->filterSimple($request);
//        $item->sender_id == $admin_id or $item->receiver_id == $admin_id
//        $listItem = $this->model->whereRaw($where)->where('sender_id', $admin_id)->orWhere('receiver_id', $admin_id);
//        đợi ngạy mở
        $listItem = $this->model->whereRaw($where)->where('admin_id', $admin_id);
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
//        if(!\Auth::guard('admin')->user()->super_admin == 1){
//            $listItem = $listItem->where('admin_id','=',\Auth::guard('admin')->user()->id);
//        }
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

    public function updateViTienStutus()
    {

//        $admin = \Auth::guard('admin')->user();
//
//        $day = Setting::where('name', 'so_ngay_khoa_vi')->pluck('value')->first();
//        $account = Admin::where('id', '!=', 1)->get();
//        foreach ($account as $admin) {
//            $currentDate = Carbon::now();
//            $otherDate = Carbon::parse($admin->ngay_mua_don_cuoi);
//            $diffInDays = $currentDate->diffInDays($otherDate);
//            if ($diffInDays <= $day) {
//
//                $count = Admin::where('invite_by', $admin->id)->count();
////                dd($count);
//                if ($count >= 3) {
//
//                    $a = Admin::where('invite_by', $admin->id)->get();
//                    $total = 0;
//                    foreach ($a as $item) {
//                        if ($item->ngay_mua_don_cuoi !== null) {
//                            $total = $total + 1;
//                        }
//
//                    }
////                    dd($total);
//                    if ($total >= 3) {
//
//                        $admin->update([
//                            'vi_tien_status' => 1
//                        ]);
//                    } else {
//                        $admin->update([
//                            'vi_tien_status' => 0
//                        ]);
//                    }
//                } else {
//                    $admin->update([
//                        'vi_tien_status' => 0
//                    ]);
//                }
//            } else {
//                $admin->update([
//                    'vi_tien_status' => 0
//                ]);
//            }
//        }


//        return redirect()->back();
    }

    public function chuyentienForm()
    {
        $tai_mua_hang_id = CommonHelper::checkKhoaVi(\Auth()->guard('admin')->user()->id);
//        if (\Auth()->guard('admin')->user()->hasSuperAdminRole())
//            return view('LichSuGiaoDich.chuyentien');
//        if ($tai_mua_hang_id != 0)
//            return view('Affiliate.admin.khoa_vi');
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

    //  chuyển tiền cho người khác
    public function chuyentien2(Request $request, $user_id2)
    {
//        dd('khôi');
        $admin = \Auth::guard('admin')->user(); // đặt tên biến $sender
        $admin2 = Admin::where('id', $user_id2)->first();       //  đặt


        if (!CommonHelper::checkAdmin($admin->id)) {
            $count = CommonHelper::demSoThanhVienGioiThieu($admin->id);
            //  Nếu tổng thành viên giới thiệu được < 3 thì không cho chuyển
            if ($count < 3) {
                CommonHelper::one_time_message('error', 'Ví đang bị khóa');
                return redirect()->back();
            }
        }


        //  kiểm tra số tiền chuyển đi
        if ($request->sotien > $admin->vi_tien or $request->sotien <= 0) {
            CommonHelper::one_time_message('error', 'Số dư không đủ');
            return redirect()->back();
        }

        //  kiểm tra mật khẩu chuyển tiền
        if ($request->password !== $admin->pin) {
            CommonHelper::one_time_message('error', 'Mã PIN không đúng');
            return redirect()->back();

        }

        //  cập nhật ví người chuyển
        Admin::where('id', $admin->id)->update([
            'vi_tien' => $admin->vi_tien - $request->sotien
        ]);

        //  cập nhật ví người nhận
        Admin::where('id', $user_id2)->update([
            'vi_tien' => $admin2->vi_tien + $request->sotien
        ]);


        //  Tạo lịch sử giao dịch cho người gửi
        $lsgd = LichSuGiaoDich::create([
            'sender_id' => $admin->id,
            'receiver_id' => $admin2->id,
            'amount' => $request->sotien,
            'note' => 'Chuyển điểm. Nội dung: ' . $request->note,
            'admin_id' => $admin->id,
            'surplus' => $admin->vi_tien - $request->sotien,
            'type' => '1',
            'company_id' => $admin->company_id,
            'created_at' => Carbon::now()
        ]);

        //  Tạo lịch sử giao dịch cho người nhận
        LichSuGiaoDich::create([
            'sender_id' => $admin->id,
            'receiver_id' => $admin2->id,
            'amount' => $request->sotien,
            'note' => 'Chuyển điểm. Nội dung: ' . $request->note,
            'admin_id' => $admin2->id,
            'company_id' => $admin2->company_id,
            'surplus' => $admin2->vi_tien + $request->sotien,
            'type' => '0',
            'created_at' => Carbon::now()
        ]);

        SoDu::create([
            'lsgd_id' => $lsgd->id,
            'user_id' => $admin->id,
            'surplus' => $admin->vi_tien - $request->sotien,
            'type' => '1',
            'created_at' => Carbon::now()
        ]);
        SoDu::create([
            'lsgd_id' => $lsgd->id,
            'user_id' => $admin2->id,
            'surplus' => $admin2->vi_tien + $request->sotien,
            'type' => '0',
            'created_at' => Carbon::now()
        ]);

        CommonHelper::one_time_message('success', 'Chuyển tiền thành công');

        return redirect()->back();
    }


    public function appendWhere($query, $request)
    {
        if (!is_null($request->get('search_admin_id'))) {
            $admin_id_arr = LichSuGiaoDich::where('admin_id', $request->search_admin_id)->pluck('admin_id')->toArray();
            $query = $query->whereIn('admin_id', $admin_id_arr);
        }
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
