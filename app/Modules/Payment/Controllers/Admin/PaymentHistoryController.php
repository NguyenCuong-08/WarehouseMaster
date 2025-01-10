<?php
namespace App\Modules\Payment\Controllers\Admin;

use App\CRMEdu\Models\Admin;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\LichSuGiaoDich\Models\SoDu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\Payment\Controllers\Admin\CURDBaseController;
use App\Modules\Payment\Models\PaymentHistory;
use App\Models\User;
use Validator;
class PaymentHistoryController extends CURDBaseController
{

    protected $module = [
        'code' => 'payment_history',
        'table_name' => 'lich_su_payos',
        'label' => 'Lịch sử nạp tiền',
        'modal' => '\App\Modules\Payment\Models\PaymentHistory',
        'list' => [
//            ['name' => 'ma_don', 'type' => 'text', 'label' => 'Mã đơn'],
            ['name' => 'id', 'type' => 'text', 'label' => 'id'],
            ['name' => 'loai_don', 'type' => 'text', 'label' => 'Loại giao dịch'],
            ['name' => 'created_at', 'type' => 'text', 'label' => 'Ngày tạo'],
            ['name' => 'so_tien', 'type' => 'price_vi', 'label' => 'Số tiền'],
            ['name' => 'link', 'type' => 'link', 'label' => 'Đường dẫn thanh toán'],
            ['name' => 'hinh_thuc_thanh_toan', 'type' => 'text', 'label' => 'Hình thức'],
            ['name' => 'admin_id', 'type' => 'relation','object'=>'nguoinap', 'label' => 'Người dùng','display_field'=>'name'],
            ['name' => 'description', 'type' => 'text', 'label' => 'Mã'],
            ['name' => 'trang_thai', 'type' => 'text', 'label' => 'Trạng thái'],

        ],
        'form' => [
            'general_tab' => [
                //
            ],
        ]
    ];

//    protected $quick_search = [
//        'label' => 'ID',
//        'fields' => 'id, type'
//    ];

    protected $filter = [
        'trang_thai' => [
            'label' => 'Trạng thái',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                'Đang xử lý' => 'Đang xử lý',
                'Đã hủy' => 'Đã hủy',
                'Thành công' => 'Thành công',
            ],
            'query_type' => '='
        ],
        'admin_id' => [
            'label' => 'Nguời dùng',
            'type' => 'select2_model',
//            'object'=>'nguoinap',
            'display_field'=>'name',
            'model'=> Admin::class,
            'query_type' => 'like'
        ],
        'filter_date' => [
            'label' => 'Ngày tạo',
            'type' => 'filter_date',
            'options' => [
                '' => '',
                'created_at' => 'Ngày tạo',
            ],
            'query_type' => 'filter_date'
        ],

    ];


    public function getIndex(Request $request)
    {
        $data = $this->getDataList($request);

        return view('Payment.payment_history.list')->with($data);

    }

    public function appendWhere($query, $request)
    {
        return $query;
    }

//    public function getPublish(Request $request)
//    {
//        try {
//
//            $item = $this->model->find($request->id);
//
//            if (!is_object($item))
//                return response()->json([
//                    'status' => false,
//                    'msg' => 'Không tìm thấy bản ghi'
//                ]);
//
//            if ($item->{$request->column} == 0)
//                $item->{$request->column} = 1;
//            else
//                $item->{$request->column} = 0;
//
//            $item->save();
//
//            return response()->json([
//                'status' => true,
//                'published' => $item->{$request->column} == 1 ? true : false
//            ]);
//        } catch (\Exception $ex) {
//            return response()->json([
//                'status' => false,
//                'published' => null,
//                'msg' => 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.'
//            ]);
//        }
//    }

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
        if(\Auth::guard('admin')->user()->super_admin == 1){
            $listItem = $this->getData($request);
        }else{
            $listItem = $this->getData($request)->where('admin_id','=',\Auth::guard('admin')->user()->id);
        }

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
                return view('Payment.payment_history.add')->with($data);
            } else if ($_POST) {
                $validator = Validator::make($request->all(), [
//                    'value' => 'required'
                ], [
//                    'value.required' => 'Bắt buộc phải nhập giá trị',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                    //  Tùy chỉnh dữ liệu insert vào bảng lich_su_thanh_toan

                    $data['admin_id'] = \Auth::guard('admin')->user()->id;
                    $data['ma_don'] = $request['ma_don'];
                    $data['so_tien'] = $request['so_tien'];
                    $data['loai_don'] = 'Nạp tiền';
                    $data['hinh_thuc_thanh_toan'] = 'QR Pay';
                    $data['trang_thai'] = 'Đang xử lý';
                    $data['cancel'] = 0;
                    $data['link'] = $request['link'];
                    $data['description'] = $request['description'];
                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
                        CommonHelper::flushCache();
                        CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                    } else {
                        CommonHelper::one_time_message('error', 'Lỗi tạo mới. Vui lòng load lại trang và thử lại!');
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

    //  Lưu vào DB khi Khách ấn huỷ nạp tiền
    public function cancelPayment(Request $request)
    {
//        dd('khôi');
        //  Lấy dữ liệu trả về
        $code = $request->input('code');    //  mã trạng thái. vd: 00 là thành công
        $payment_id = $request->input('id');
        $cancel = $request->input('cancel');
        $trang_thai = $request->input('status');
        $ma_don = $request->input('orderCode'); //  mã đơn hàng

       
        $ls_giao_dich = $this->model->where('ma_don', $ma_don)->first();
//        dd($ls_giao_dich);

        \DB::beginTransaction();

        $data = [
            'payment_id' => $payment_id,
            'cancel' => $cancel,
//            'trang_thai' => $trang_thai,
            'trang_thai' => 'Đã hủy'
        ];
//        dd('kkk');
        foreach ($data as $k => $v) {
            $ls_giao_dich->$k = $v;
        }

        if ($ls_giao_dich->save()) {
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
                'data' => $ls_giao_dich
            ]);
        }

        CommonHelper::one_time_message('error', 'Đã hủy hóa đơn');
        // chuyển trang sau khi thêm vào DB
        return redirect('admin/' . $this->module['code']);
    }

    //  Lưu vào DB khi Khách ấn thanh toán thành công
    public function succesPayment(Request $request)
    {
//            dd($request->all());
        //  Lấy dữ liệu trả về
        $code = $request->input('code');    //  mã trạng thái. vd: 00 là thành công
        $payment_id = $request->input('id');
        $cancel = $request->input('cancel');
        $trang_thai = $request->input('status');
        $ma_don = $request->input('orderCode'); //  mã đơn hàng
//        $goiDichVuId = $request->input('goiDichVuId'); //mã gói dịch vụ
        $ls_giao_dich = $this->model->where('ma_don', $ma_don)->first();

        // Thực hiện cập nhật trang thái success vào DB nếu đơn hàng chưa từng thanh toán thành công
        if($ls_giao_dich) {
            if ($ls_giao_dich->trang_thai !== 'Thành công') {
                \DB::beginTransaction();

                //  cập nhật ví admin
                $admin = \App\Models\Admin::where('id', 1)->first();
                \App\Models\Admin::where('id', $admin->id)->update([
                    'vi_tien' => $admin->vi_tien - $ls_giao_dich->so_tien
                ]);

                //  cập nhật ví người nhận
                $admin2 = \App\Models\Admin::where('id', $ls_giao_dich->admin_id)->first();
                \App\Models\Admin::where('id', $ls_giao_dich->admin_id)->update([
                    'vi_tien' => $admin2->vi_tien + $ls_giao_dich->so_tien
                ]);

                //  Tạo lịch sử giao dịch cho người gửi
                $lsgd=  LichSuGiaoDich::create([
                    'sender_id' => $admin->id,
                    'receiver_id' => $admin2->id,
                    'amount' => $ls_giao_dich->so_tien,
                    'note' =>  'Nạp tiền payos',
                    'admin_id'=> $admin->id,
                    'surplus'=>$admin->vi_tien - $ls_giao_dich->so_tien,
                    'type'=> '1',
                    'company_id'=>$admin->company_id,
                    'created_at' => Carbon::now()
                ]);

                //  Tạo lịch sử giao dịch cho người nhận
                LichSuGiaoDich::create([
                    'sender_id' => $admin->id,
                    'receiver_id' => $admin2->id,
                    'amount' => $ls_giao_dich->so_tien,
                    'note' =>  'Nạp tiền payos',
                    'admin_id'=> $admin2->id,
                    'company_id'=>$admin2->company_id,
                    'surplus'=> $admin2->vi_tien + $ls_giao_dich->so_tien,
                    'type'=> '0',
                    'created_at' => Carbon::now()
                ]);

                SoDu::create([
                    'lsgd_id' => $lsgd->id,
                    'user_id' => $admin->id,
                    'surplus' => $admin->vi_tien - $ls_giao_dich->so_tien,
                    'type' => '1',
                    'created_at' => Carbon::now()
                ]);
                SoDu::create([
                    'lsgd_id' => $lsgd->id,
                    'user_id' => $admin2->id,
                    'surplus' => $admin2->vi_tien + $ls_giao_dich->so_tien,
                    'type' => '0',
                    'created_at' => Carbon::now()
                ]);

                $data = [
                    'payment_id' => $payment_id,
                    'cancel' => $cancel,
                    'trang_thai' => 'Thành công'
                ];

                foreach ($data as $k => $v) {
                    $ls_giao_dich->$k = $v;
                }

                if ($ls_giao_dich->save()) {
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
                        'data' => $ls_giao_dich
                    ]);
                }
            }

            // Tăng tiền của User
//            $payment = new \App\Modules\Payment\Models\PaymentHistory();
//            $paymentData = $payment->where('ma_don', $ma_don)->first();
//            $user_id = $paymentData->admin_id;
//            $user = new \App\Models\Admin();
//            $userData = $user->where('id', $user_id)->first();
//            $userData->vi_tien = $paymentData->vi_tien;
//            $userData->save();

            CommonHelper::one_time_message('success', 'Thanh toán thành công!');
        }

        // chuyển trang sau khi thêm vào DB
        return redirect()->route('goi_dich_vu.goiDichVuView');
    }

    public function update(Request $request)
    {
        try {

            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);
                return view('Payment.payment_history.edit')->with($data);
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
                    $data['ma_don'] = $request['orderCode'];
                    $data['payment_id'] = $request['id'];
                    $data['trang_thai'] = $request['status'];

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


//    public function delete(Request $request)
//    {
//        try {
//            $item = $this->model->find($request->id);
//
//            $bill_id = $item->bill_id;
//
//            $item->delete();
//
//            if ($bill_id != null) {
//                //  nếu là giao dịch của HĐ thì cập nhật tiền đã nhận của HĐ
//                $BillReceiptsController = new \App\CRMEdu\Controllers\Admin\BillReceiptsController();
//                $BillReceiptsController->updateTienDaTraHD($bill_id);
//            }
//
//            CommonHelper::flushCache();
//            CommonHelper::one_time_message('success', 'Xóa thành công!');
//
//            return \App\CRMEdu\Controllers\Admin\redirect('admin/' . $this->module['code']);
//        } catch (\Exception $ex) {
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
//            return \App\CRMEdu\Controllers\Admin\back();
//        }
//    }

    /*public function multiDelete(Request $request)
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
    }*/

}
