<?php

namespace App\Modules\RutTien\Controllers\Admin;

use App\CRMEdu\Models\Bill;
use App\CRMEdu\Models\Service;
use App\Modules\Affiliate\Helpers\CommonHelper;

//use App\Http\Helpers\CommonHelper;
use App\Models\Admin;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\RutTien\Controllers\Admin\CURDBaseController;
use App\Modules\RutTien\Models\YeuCauRutTien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\CRMEdu\Models\Category;
use App\CRMEdu\Models\Codes;
use App\CRMEdu\Models\Theme;
use App\CRMEdu\Models\Tag;
use Validator;
use App\CRMEdu\Models\PostTag;
use App\CRMEdu\Models\BillProgress;

use Symfony\Component\String\UnicodeString;
use voku\helper\ASCII;
use Illuminate\Support\Str;

class CastOutController extends CURDBaseController
{

    protected $module = [
        'code' => 'cast_out',
        'table_name' => 'yeu_cau_rut_tien',
        'label' => 'Yêu Cầu rút tiền',
        'modal' => '\App\Modules\RutTien\Models\YeuCauRutTien',
        'list' => [
            ['name' => 'admin_id', 'type' => 'relation', 'object' => 'admin', 'label' => 'Người rút', 'display_field' => 'name'],
            ['name' => 'so_tien', 'type' => 'price_vi', 'label' => 'Số tiền '],
            ['name' => 'so_tien', 'type' => 'custom', 'td' => 'RutTien.Admin.so_tien_thuc_nhan', 'label' => 'Số tiền thực nhận sau rút(-10% VAT)'],
            ['name' => 'admin_id', 'type' => 'custom', 'td' => 'RutTien.Admin.so_du_hien_tai', 'label' => 'Số dư còn lại hiện giờ'],
            ['name' => 'ngan_hang', 'type' => 'text', 'label' => 'Ngân hàng',],
            ['name' => 'stk', 'type' => 'text', 'label' => 'Số tài khoản',],
            ['name' => 'chu_tk', 'type' => 'text', 'label' => 'Chủ tài khoản',],
            ['name' => 'created_at', 'type' => 'date_vi', 'label' => 'Ngày tạo',],
            ['name' => 'status', 'type' => 'custom', 'td' => 'RutTien.Admin.status', 'label' => 'Trạng thái',],
//            ['name' => 'action', 'type' => 'custom', 'td'=>'RutTien.Admin.action', 'label' => 'Hành động',],
        ],
        'list_admin' => [
            ['name' => 'admin_id', 'type' => 'relation', 'object' => 'admin', 'label' => 'Người rút', 'display_field' => 'name'],
            ['name' => 'so_tien', 'type' => 'price_vi', 'label' => 'Số tiền'],
            ['name' => 'so_tien', 'type' => 'custom', 'td' => 'RutTien.Admin.so_tien_thuc_nhan', 'label' => 'Số tiền cần chuyển(-10% VAT)'],
//            ['name' => 'cast_now', 'type' => 'price_vi', 'label' => 'Số dư còn lại'],
            ['name' => 'cast_now', 'type' => 'custom', 'td' => 'RutTien.Admin.so_du_hien_tai', 'label' => 'Số dư còn lại hiện giờ'],

            ['name' => 'ngan_hang', 'type' => 'text_nn', 'label' => 'Ngân hàng',],
            ['name' => 'stk', 'type' => 'text_nn', 'label' => 'Số tài khoản',],
            ['name' => 'chu_tk', 'type' => 'text_nn', 'label' => 'Chủ tài khoản',],
            ['name' => 'created_at', 'type' => 'text', 'label' => 'Ngày tạo',],
            ['name' => 'status', 'type' => 'custom', 'td' => 'RutTien.Admin.status', 'label' => 'Trạng thái',],
            ['name' => 'action', 'type' => 'custom', 'td' => 'RutTien.Admin.action', 'label' => 'Hành động',],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'so_tien', 'type' => 'text', 'class' => 'required', 'label' => 'Số tiền', 'group_class' => 'col-md-6'],
//                ['name' => 'password', 'type' => 'text', 'class' => 'required', 'label' => 'Mật khẩu','group_class' => 'col-md-6'],
                ['name' => 'ngan_hang', 'type' => 'textcastout', 'class' => 'required', 'label' => 'Ngân hàng', 'group_class' => 'col-md-6'],
                ['name' => 'stk', 'type' => 'textcastout', 'class' => 'required', 'label' => 'Số tài khoản', 'group_class' => 'col-md-6'],
                ['name' => 'chu_tk', 'type' => 'textcastout', 'class' => 'required', 'label' => 'Chủ tài khoản', 'group_class' => 'col-md-6'],
                ['name' => 'note', 'type' => 'textcastout', 'label' => 'Ghi chú', 'group_class' => 'col-md-6'],
                ['name' => 'pin', 'type' => 'password', 'class' => 'required', 'label' => 'Mã pin', 'group_class' => 'col-md-6'],


            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, type'
    ];

    protected $filter = [
        'status' => [
            'label' => 'Trạng thái',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                0 => 'Không kich hoạt',
                1 => 'Kich hoạt',
            ],
            'query_type' => '='
        ],
        'created_at' => [
            'label' => 'Thời gian tạo',
            'type' => 'from_to_date',
            'query_type' => 'from_to_date'
        ],
    ];

    public function getIndex(Request $request)
    {
//        dd('l');
        $data = $this->getDataList($request);
        $so_nguoi_gioi_thieu = CommonHelper::demSoThanhVienGioiThieu(\Auth()->guard('admin')->user()->id);
        $o_tien_da_rut = CommonHelper::soTienDaRut(\Auth()->guard('admin')->user()->id);
//        dd($o_tien_da_rut);
        $tai_mua_hang_id = CommonHelper::checkKhoaVi(\Auth()->guard('admin')->user()->id);
        $checkKhoaVi60ngay = CommonHelper::checkKhoaVi60ngay();
        if(\Auth()->guard('admin')->user()->hasSuperAdminRole())
            return view('RutTien.Admin.add')->with($data);
        else{
            if ($o_tien_da_rut > 100000000 && $so_nguoi_gioi_thieu < 4) {
                $data['block'] = 'Số tiền bạn rút đã cán mốc 100 triệu, bạn cần giới thiệu ít nhất 4 thành viên tham gia cây để tiếp tục rút tiền. Số thành viên hiện tại bạn đã giới thiệu là '.$so_nguoi_gioi_thieu.' THÀNH VIÊN';
                return view('Affiliate.admin.khoa_vi')->with($data);
                // Điều kiện rút trên 100 triệu và có ít hơn 4 người giới thiệu
            } elseif ($o_tien_da_rut > 10000000 && $so_nguoi_gioi_thieu < 2) {
                $data['block'] = 'Số tiền bạn rút đã cán mốc 10 triệu, bạn cần giới thiệu ít nhất 2 thành viên tham gia cây để tiếp tục rút tiền. Số thành viên hiện tại bạn đã giới thiệu là '.$so_nguoi_gioi_thieu.' THÀNH VIÊN';

                // Điều kiện rút trên 10 triệu và có ít hơn 2 người giới thiệu
                return view('Affiliate.admin.khoa_vi')->with($data);
            }
        }
//        if($tai_mua_hang_id!=0)
//            return view('Affiliate.admin.khoa_vi')->with($data);
//        if(!$checkKhoaVi60ngay){
//            return view('Affiliate.admin.khoa_vi')->with($data);
//        }

        return view('RutTien.Admin.add')->with($data);
    }

    public function history(Request $request)
    {
//        dd('khôi');
        $data = $this->getDataList($request);

        return view('RutTien.Admin.history')->with($data);
    }

    public function appendWhere($query, $request)
    {
//        dd($query->toSql());
        $from_date = request('from_date');
        $to_date = request('to_date');
        if (empty($from_date)) {
            $from_date = Carbon::now()->startOfDay()->format('Y-m-d H:i:s'); // 00:00:00 của ngày hiện tại
        }

        if (empty($to_date)) {
            $to_date = Carbon::now()->endOfDay()->format('Y-m-d H:i:s'); // 23:59:59 của ngày hiện tại
        }
//        dd($from_date, $to_date);
        $query->whereBetween('created_at', [$from_date, $to_date]);
//        dd($query->toSql());
        return $query;
    }

    public function add(Request $request)
    {
        try {


            if (!$_POST) {
//                dd('khôi');

                $data = $this->getDataAdd($request);
                return view('RutTien.Admin.add')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                //  Tùy chỉnh dữ liệu insert
                $data = $this->processingValueInFields($request, $this->getAllFormFiled());
//                dd($data);

                $data['admin_id'] = \Auth::guard('admin')->user()->id;
                $data['cast_now'] = \Auth::guard('admin')->user()->vi_tien - $data['so_tien'];

//
                // Loại bỏ dấu

                $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $data['chu_tk']);
                $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
                $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
                $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
                $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
                $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
                $data['chu_tk'] = preg_replace("/(đ)/", 'd', $str);

//                chuyển sang chữ in hoa
                $data['chu_tk'] = Str::upper($data['chu_tk']);
//

//                dd($data);
//                \Auth::guard('admin')->user()->update(['vi_tien'=> \Auth::guard('admin')->user()->vi_tien - $data['so_tien']]);
                if ($data['pin'] == \Auth::guard('admin')->user()->pin) {
                    unset($data['pin']);
                    $count = CommonHelper::demSoThanhVienGioiThieu(\Auth::guard('admin')->user()->id);
//                    if ($count >= 3) {
//                        if ($data['so_tien'] <= \Auth::guard('admin')->user()->vi_tien && $data['so_tien'] >= 500000) {
                        if ($data['so_tien'] <= \Auth::guard('admin')->user()->vi_tien) {
                            if ($data['so_tien'] % 100000 == 0) {
                                foreach ($data as $k => $v) {
                                    $this->model->$k = $v;
                                }

                                if ($this->model->save()) {
                                    \DB::commit();

                                    CommonHelper::one_time_message('success', 'Tạo yêu cầu thành công!');
                                } else {
                                    \DB::rollback();
                                    CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                                }

                                if ($request->ajax()) {
                                    return response()->json([
                                        'status' => true,
                                        'msg' => '',
                                        'data' => $this->model
                                    ]);
                                }

                                if ($request->return_direct == 'save_continue') {
                                    dd('123');
                                    return redirect('admin/' . $this->module['code'] . '/edit/' . $this->model->id);
                                } elseif ($request->return_direct == 'save_create') {
                                    dd('tam');
                                    return redirect('admin/' . $this->module['code'] . '/add');
                                }
                                return redirect()->route('castout_history');
                            } else {
                                \DB::rollback();
                                CommonHelper::one_time_message('error', 'Số tiền rút cần là bội số của 100,000 !');
                                return redirect()->route('castout');
                            }

                        }
//                        elseif ($data['so_tien'] < 500000) {
//                            CommonHelper::one_time_message('error', 'Số tiền rút tối thiểu 500.000 VNĐ !');
//                            return redirect()->route('castout');
//                        }
                        else {
                            CommonHelper::one_time_message('error', 'Số tiền trong ví không đủ !');
                            return redirect()->route('castout');
                        }
//                    } else {
//                        CommonHelper::one_time_message('error', 'Ví đang khóa !');
//                        return redirect()->route('castout');
//                    }

                } else {
                    CommonHelper::one_time_message('error', 'Sai mã pin !');
                    return redirect()->route('castout');
                }

//                return redirect('admin/' . $this->module['code']);
            }

        } catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function duyettc(Request $request)
    {
        return response()->json(['success' => 'Duyệt thành công']);
    }

    public function duyet(Request $request)
    {
        try {
            $item = $this->model->find($request->id);
            if (!is_object($item)) abort(404);
            $id = $request->input('id');
            $admin = \App\CRMEdu\Models\Admin::where('id', '=', $item->admin_id)->first();
//dd($admin->vi_tien - $item->so_tien);
            if ($item->so_tien <= $admin->vi_tien) {
                $admin->update(['vi_tien' => $admin->vi_tien - $item->so_tien]);
                $item->status = 1;
                $item->save();
                LichSuGiaoDich::create([
//                    'sender_id' => $admin->id,
//                    'receiver_id' => $admin2->id,
                    'amount' => $item->so_tien,
                    'note' => 'Rút tiền thành công',
                    'admin_id' => $item->admin_id,
                    'surplus' => $admin->vi_tien - $item->so_tien,
                    'company_id'=>$item->company_id,
                    'type' => '1',
                    'created_at' => Carbon::now()
                ]);
                CommonHelper::one_time_message('success', 'Đã duyệt');
                // Chuyển hướng lại về lịch sử yêu cầu rút tiền
                return redirect()->route('castout_history');
            } else {
                CommonHelper::one_time_message('error', 'Số dư ví không đủ');
                // Chuyển hướng lại về lịch sử yêu cầu rút tiền
                return redirect()->route('castout_history');
            }

        } catch (\Exception $ex) {
            \DB::rollback();
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function huy(Request $request)
    {
        try {
            $item = $this->model->find($request->id);
            if (!is_object($item)) abort(404);
            $id = $request->input('id');
            $admin = \App\CRMEdu\Models\Admin::where('id', '=', $item->admin_id)->first();
//dd($id)
            $item->status = 0;
            $item->save();
            $admin->update(['vi_tien' => $admin->vi_tien + $item->so_tien]);

//            \Auth::guard('admin')->user()->update(['vi_tien'=> \Auth::guard('admin')->user()->vi_tien + $item->so_tien]);
            CommonHelper::one_time_message('success', 'Đã hủy duyệt');
            // Chuyển hướng lại về lịch sử yêu cầu rút tiền
            return redirect()->route('castout_history');
        } catch (\Exception $ex) {
            \DB::rollback();
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
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
                return view('CRMEdu.classroom.edit')->with($data);
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

                    $data['bill_ids'] = '|' . implode('|', $request->get('bill_ids', [])) . '|';

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

    public function delete(Request $request)
    {
        try {

            $item = $this->model->find($request->id);

            $item->delete();

            CommonHelper::one_time_message('success', 'Xóa thành công!');
            return redirect('admin/' . $this->module['code']);
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return back();
        }
    }

    public function exportExcel($request, $data)
    {
//        dd($data);
        \Excel::create(Str::slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($excel) use ($data) {

            // Set the title
            $excel->setTitle($this->module['label'] . ' ' . date('d m Y'));

            $excel->sheet(Str::slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($sheet) use ($data) {

                $sheet->setColumnFormat([
                    'F' => '@', // 'F' là cột STK
                ]);
                $field_name[] = 'Người rút';
                $field_name[] = 'Số tiền';
                $field_name[] = 'Số tiền cần chuyển(-10% VAT)';
                $field_name[] = 'Số dư còn lại hiện giờ';
                $field_name[] = 'Tên ngân hàng ';
                $field_name[] = 'STK';
                $field_name[] = 'Chủ TK';
                $field_name[] = 'Thời gian';
                $field_name[] = 'Trạng thái';

                $sheet->row(1, $field_name);

                $k = 2;

                foreach ($data as $value) {

//                    dd(number_format((int)@$value->so_tien, 0, ',', '.'));
                    $data_export = [];
                    $data_export[] = @$value->admin['name'];
//                    $data_export[] = number_format((int)@$value->so_tien, 0, ',', '.') ;
//                    $data_export[] = number_format((int)@$value->so_tien*90/100, 0, ',', '.') ;
//                    $data_export[] = number_format(@$value->admin['vi_tien'], 0, ',', '.') ;
                    $data_export[] = $value->so_tien ;
                    $data_export[] = $value->so_tien*90/100 ;
                    $data_export[] = @$value->admin['vi_tien'];
                    $data_export[] = @$value->ngan_hang;
                    $data_export[] = @$value->stk;
                    $data_export[] = @$value->chu_tk;
                    $data_export[] = @$value->created_at;
                    $data_export[] = @$value->status?'Đã duyệt':'Chờ duyệt';

                    $sheet->row($k, $data_export);
                    $k++;
                }

            });
        })->download('xlsx');
    }


}




