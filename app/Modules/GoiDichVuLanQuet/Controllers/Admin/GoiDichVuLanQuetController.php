<?php

namespace App\Modules\GoiDichVuLanQuet\Controllers\Admin;

use App\Modules\GoiDichVuLanQuet\Controllers\Admin\CURDBaseController;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\GoiDichVuLanQuet\Models\GoiDichVuLanQuet;
use Validator;
use Carbon\Carbon;
use App\Models\Admin;

class GoiDichVuLanQuetController extends CURDBaseController
{

    protected $module = [
        'code' => 'goi_dich_vu_lan_quet',
        'table_name' => 'goi_dich_vu_lan_quet',
        'label' => 'Gói dịch vụ lần quét',
        'modal' => '\App\Modules\GoiDichVuLanQuet\Models\GoiDichVuLanQuet',
        'list' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Tên gói'],
            ['name' => 'price', 'type' => 'text', 'label' => 'Giá bán',],
            ['name' => 'old_price', 'type' => 'text', 'label' => 'Giá cũ',],
            ['name' => 'value', 'type' => 'text', 'label' => 'Giá trị',],
            ['name' => 'description', 'type' => 'text', 'label' => 'Các hạng mục quyền lợi trong gói',],
            ['name' => 'note', 'type' => 'text', 'label' => 'Mô tả ngắn',],
            ['name' => 'action', 'type' => 'custom', 'td'=>'GoiDichVu.admin.action', 'label' => 'Hành động',],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Tên gói', 'group_class' => 'col-md-12'],
                ['name' => 'price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá bán','group_class' => 'col-md-4'],
                ['name' => 'old_price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá cũ','group_class' => 'col-md-4'],
                ['name' => 'value', 'type' => 'text', 'class' => 'required', 'label' => 'Giá trị','group_class' => 'col-md-4'],
                ['name' => 'description', 'type' => 'textarea', 'class' => 'required', 'label' => 'Các hạng mục quyền lợi trong gói','group_class' => 'col-md-12'],
                ['name' => 'note', 'type' => 'textarea', 'class' => 'required', 'label' => 'Mô tả ngắn','group_class' => 'col-md-12'],
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
        $data = $this->getDataList($request);
//        $this->billcheck();die();
        return view('GoiDichVuLanQuet.admin.list')->with($data);
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

    public function getData($request) {
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

    public function getDataList(Request $request) {
        $listItem = $this->getData($request);

        $data['record_total'] = $listItem->count();

//        $data['tong_thu'] = $this->getData($request)->where('so_tien', '>', 0)->sum('price');
//        $data['tong_chi'] = $this->getData($request)->where('so_tien', '<', 0)->sum('price');

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

    public function add(Request $request)
    {
        try {
            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('GoiDichVuLanQuet.admin.add')->with($data);
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

                return view('GoiDichVuLanQuet.admin.edit')->with($data);
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
    public function takeDataImagePassPort($admin_id){
        $admin=Admin::find($admin_id);
        $totalData=0;
        $fileUserPath="filemanager/userfiles/anh_ho_chieu/".$admin_id;
        $fileItem=scandir($fileUserPath);
        foreach ($fileItem  as $a){
            if ($a !== '.' && $a !== '..'){
                if($a!=='anh_the') {
                    $fileItemPath = $fileUserPath . '/' . $a;
                    $months = scandir($fileItemPath);
                    foreach($months as $month){
                        if ($month !== '.' && $month !== '..'){
                            $monthPath = $fileItemPath . '/' . $month;
                            $days=scandir($monthPath);
                            foreach($days as $day){
                                if ($day !== '.' && $day !== '..'){
                                    $dayPath = $monthPath . '/' . $day;
                                    $images=scandir($dayPath);
                                    foreach($images as $image){
                                        if ($image !== '.' && $image !== '..'){
                                            $imagePath = $dayPath . '/' . $image;
                                            $totalData+=filesize($imagePath);
                                        }

                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    $avatarPath = $fileUserPath . '/' . $a;
                    $years=scandir($avatarPath);
                    foreach($years as $year){
                        if ($year !== '.' && $year !== '..'){
                            $yearPath=$avatarPath. '/' . $year;
                            $months = scandir($yearPath);
                            foreach($months as $month){
                                if ($month !== '.' && $month !== '..'){
                                    $monthPath = $yearPath . '/' . $month;
                                    $days=scandir($monthPath);
                                    foreach($days as $day){
                                        if ($day !== '.' && $day !== '..'){
                                            $dayPath = $monthPath . '/' . $day;

                                            $images=scandir($dayPath);
                                            foreach($images as $image){
                                                if ($image !== '.' && $image !== '..'){
                                                    $imagePath = $dayPath . '/' . $image;
                                                    $totalData+=filesize($imagePath);
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
        $admin->dung_luong=$totalData/pow(1024,2);
        $admin->save();
    }
    public  function goiDichVuView(Request $request){
        $data = $this->getDataList($request);
        return view('GoiDichVuLanQuet.admin.goi_dich_vu')->with($data);
    }
    public function register(Request $request){
        $admin_id = \Auth::guard('admin')->user()->id;
        $admin=Admin::find($admin_id);
        $goi_dich_vu_id=$request->goi_dich_vu_id;
        $goi_dich_vu=GoiDichVu::find($goi_dich_vu_id);
//        dd(isset($goi_dich_vu));
        if(isset($goi_dich_vu) && isset($admin) ){
            if($admin->vi_tien >=$goi_dich_vu->price ){
                $admin->vi_tien-=$goi_dich_vu->price;
                $admin->dung_luong_gioi_han+=$goi_dich_vu->value;
                $admin->save();
                $this->takeDataImagePassPort($admin_id);
                CommonHelper::flushCache();
                CommonHelper::one_time_message('success', 'Bạn đã mua gói thành công!');
            }
            else{
                CommonHelper::flushCache();
                CommonHelper::one_time_message('error', 'Số dư của quý khách không đủ, xin vui lòng nạp thêm tiền !');
                return redirect()->back();
            }
        }
        return redirect()->back();

    }
}
