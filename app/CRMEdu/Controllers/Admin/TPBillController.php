<?php

namespace App\CRMEdu\Controllers\Admin;

use App\Http\Helpers\CommonHelper;
use App\Mail\MailServer;
use App\Models\Admin;
use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;
use App\CRMEdu\Controllers\Helpers\CRMEduHelper;
use App\CRMEdu\Models\Bill;
use App\CRMEdu\Models\BillHistory;
use App\CRMEdu\Models\BillFinance;
use App\CRMEdu\Models\BillProgress;
use App\CRMEdu\Models\Service;
use Validator;

class TPBillController extends CURDBaseController
{

    protected $orderByRaw = 'status DESC, id DESC';

    protected $module = [
        'code' => 'tpbill',
        'table_name' => 'bills',
        'label' => 'CRMEdu_admin.tpbill',
        'modal' => '\App\CRMEdu\Models\Bill',
        'list' => [
//            ['name' => 'domain', 'type' => 'text_edit', 'label' => 'CRMEdu_admin.tpbill-bill_domain', 'sort' => true],
            ['name' => 'customer_id', 'type' => 'relation_edit', 'label' => 'CRMEdu_admin.tpbill_client', 'object' => 'customer', 'display_field' => 'name'],
            ['name' => 'total_price', 'type' => 'price_vi', 'label' => 'CRMEdu_admin.tpbill_total_price', 'sort' => true],
            ['name' => 'total_price_contract', 'type' => 'price_vi', 'label' => 'CRMEdu_admin.tpbill_total_money'],
            ['name' => 'total_received', 'type' => 'price_vi', 'label' => 'CRMEdu_admin.tpbill_money_received'],
            ['name' => 'finance_id', 'type' => 'custom', 'td' => 'CRMEdu.dhbill.list.td.chua_thu', 'label' => 'CRMEdu_admin.tpbill_uncollected_money'],
            ['name' => 'service_id', 'type' => 'relation', 'label' => 'CRMEdu_admin.tpbill_money_received', 'object' => 'service', 'display_field' => 'name_vi', 'sort' => true],
//            ['name' => 'count_product', 'type' => 'custom', 'td' => 'CRMEdu.tpbill.list.td.count_product', 'label' => 'Tổng SP'],
            ['name' => 'registration_date', 'type' => 'date_vi', 'label' => 'CRMEdu_admin.tpbill_contract_signing_date', 'sort' => true],
            ['name' => 'saler_id', 'type' => 'relation', 'label' => 'CRMEdu_admin.tpbill_business', 'object' => 'saler', 'display_field' => 'name'],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'total_price', 'type' => 'price_vi', 'class' => 'required', 'label' => 'CRMEdu_admin.tpbill_sales', 'group_class' => 'col-md-6'],
                ['name' => 'domain', 'type' => 'text', 'label' => 'CRMEdu_admin.tpbill_Domain', 'group_class' => 'col-md-6'],
                ['name' => 'service_id', 'type' => 'select2_model', 'class' => ' required',  'label' => 'CRMEdu_admin.tpbill_Goi_DV', 'model' => Service::class, 'display_field' => 'name_vi', 'group_class' => 'col-md-3'],
                ['name' => 'registration_date', 'type' => 'date', 'label' => 'CRMEdu_admin.tpbill_sign_day', 'class' => 'required', 'group_class' => 'col-md-3'],
                ['name' => 'contract_time', 'type' => 'number', 'label' => 'CRMEdu_admin.tpbill_Used_Time', 'class' => 'required', 'group_class' => 'col-md-3'],
                /*['name' => 'retention_time', 'type' => 'select', 'options' =>
                    [
                        0 => 'Không bảo hành',
                        1 => '1 tháng',
                        3 => '3 tháng',
                        6 => '6 tháng',
                        8 => '8 tháng',
                        12 => '12 tháng',
                        36 => '36 tháng',
                    ], 'class' => '', 'label' => 'Thời hạn duy trì', 'value' => 5, 'group_class' => 'col-md-6'],*/

            ],
            'customer_tab' => [
                ['name' => 'marketer_ids', 'type' => 'select2_ajax_model', 'label' => 'CRMEdu_admin.tpbill_Marketing', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'code', 'multiple' => true, 'group_class' => 'col-md-6'],
                ['name' => 'saler_id', 'type' => 'select2_ajax_model', 'label' => 'CRMEdu_admin.tpbill_Sale', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'code', 'class' => 'required'],
                ['name' => 'customer_id', 'type' => 'custom', 'type_history' => 'relation_multiple', 'field' => 'CRMEdu.form.fields.select_customer',
                    'label' => 'CRMEdu_admin.tpbill_client', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'tel', 'class' => 'required'],
                ['name' => 'customer_legal_id', 'type' => 'custom', 'type_history' => 'relation_multiple', 'field' => 'CRMEdu.form.fields.select_customer',
                    'label' => 'CRMEdu_admin.tpbill_Legal_representative', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'tel', 'class' => ''],
            ],
            'gia_han_tab' => [
                ['name' => 'expiry_date', 'type' => 'custom', 'field' => 'CRMEdu.form.fields.expiry_date', 'label' => 'CRMEdu_admin.tpbill_Expiration_date', 'class' => 'required', 'group_class' => 'col-md-6'],
                ['name' => 'exp_price', 'type' => 'price_vi', 'class' => ' required', 'label' => 'CRMEdu_admin.tpbill_renewal_price', 'group_class' => 'col-md-6'],
                ['name' => 'auto_extend', 'type' => 'checkbox', 'label' => 'CRMEdu_admin.tpbill_activate', 'value' => 1, 'group_class' => 'col-md-6'],
            ],
            'domain_tab' => [

            ],
            'hosting_tab' => [

            ],
            'ldp_tab' => [

            ],
            'wp_tab' => [

            ],
            'service_tab' => [
                ['name' => 'status', 'type' => 'checkbox', 'label' => 'CRMEdu_admin.tpbill_activated', 'value' => 1, ],
                ['name' => 'note', 'type' => 'textarea', 'label' => 'CRMEdu_admin.tpbill_Note'],
                ['name' => 'customer_note', 'type' => 'textarea', 'label' => 'CRMEdu_admin.tpbill_customer_notes'],
            ],
            'account_tab' => [


            ],
            'histories_bill_tab' => [
            ],
        ],
    ];

    protected $filter = [
        'customer_id' => [
            'label' => 'CRMEdu_admin.tpbill_customer_name',
            'type' => 'select2_ajax_model',
            'display_field' => 'name',
            'model' => \App\Models\Admin::class,
            'object' => 'admin',
            'query_type' => '='
        ],
        'marketer_ids' => [
            'label' => 'CRMEdu_admin.tpbill_source_marketing',
            'type' => 'select2_ajax_model',
            'display_field' => 'name',
            'display_field2' => 'code',
            'model' => \App\Models\Admin::class,
            'object' => 'admin',
            'query_type' => 'custom'
        ],
        'saler_id' => [
            'label' => 'CRMEdu_admin.tpbill_Sale1',
            'type' => 'select2_ajax_model',
            'display_field' => 'name',
            'display_field2' => 'code',
            'model' => \App\Models\Admin::class,
            'object' => 'admin',
            'query_type' => '='
        ],
        'service_id' => [
            'label' => 'CRMEdu_admin.tpbill_Service',
            'type' => 'select2_model',
            'display_field' => 'name_vi',
            'model' => Service::class,
            'query_type' => '='
        ],
        /*'total_price' => [
            'label' => 'Tổng tiền',
            'type' => 'number',
            'query_type' => 'like'
        ],*/
        'filter_date' => [
            'label' => 'CRMEdu_admin.tpbill_Loc',
            'type' => 'filter_date',
            'options' => [
                '' => '',
                'created_at' => 'Ngày tạo',
                'expiry_date' => 'Hết hạn',
                'registration_date' => 'Ngày ký HĐ',
            ],
            'query_type' => 'filter_date'
        ],
        'auto_extend' => [
            'label' => 'Tự động gia hạn',
            'type' => 'select',
            'query_type' => '=',
            'options' => [
                '' => '',
                0 => 'Không kích hoạt',
                1 => 'Kích hoạt',
            ],
        ],
        'status' => [
            'label' => 'Trạng thái',
            'type' => 'select',
            'query_type' => '=',
            'options' => [
                '' => 'Tất cả',
                0 => 'Không kích hoạt',
                1 => 'Kích hoạt',
            ],
        ],
    ];

    protected $quick_search = [
        'label' => 'ID, tên miền, giá, note',
        'fields' => 'id, domain, exp_price, total_price, note'
    ];

    public function getIndex(Request $request)
    {

        $data = $this->getDataList($request);

        return view('CRMEdu.tpbill.list')->with($data);
    }

    public function appendWhere($query, $request)
    {
        if (@$request->marketer_ids != null) {
            $query = $query->where('marketer_ids', 'like', '%|' . $request->marketer_ids . '|%');
        }


        if (CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'bill_view_all')) {
            //  truy vấn tất cả các đơn hàng

        } elseif(CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'bill_room_view')) {
            //  truy vấn đơn hàng của thành viên phòng mình
            $members = Admin::where('room_id', \Auth::guard('admin')->user()->room_id)->pluck('id')->toArray();
            $query = $query->whereIn('saler_id', $members);
        }

        return $query;
    }


    public function add(Request $request)
    {
        try {
            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('CRMEdu.tpbill.add')->with($data);
            }

            \DB::beginTransaction();

            $data = $this->processingValueInFields($request, $this->getAllFormFiled());
            //  Tùy chỉnh dữ liệu insert
            $data['service_id'] = @$_GET['service_id'];

            $customer = Admin::find($data['customer_id']);
            $data['customer_name'] = $customer->name;
            $data['customer_tel'] = $customer->tel;
            $data['customer_email'] = $customer->email;
            $data['customer_address'] = $customer->address;
            $data['curator_ids'] = '|' . implode('|', $request->get('curator_ids', [])) . '|';
            $data['staff_care'] = '|' . implode('|', $request->get('staff_care', [])) . '|';
            $data['marketer_ids'] = '|' . implode('|', $request->get('marketer_ids', [])) . '|';

            $data['company_id'] = \Auth::guard('admin')->user()->last_company_id;

            unset($data['file_ldp']);
            if (isset($data['quick_note'])) unset($data['quick_note']);
            #
            foreach ($data as $k => $v) {
                $this->model->$k = $v;
            }

            if ($this->model->save()) {
                $this->afterAddLog($request, $this->model);

                //  Cập nhật tiến độ dự án
                BillProgress::updateOrCreate([
                    'bill_id' => $this->model->id,
                ],[
                    'status' => $request->progress_status,
                    'yctk' => $request->progress_yctk,
                ]);

                //  Cập nhật tiền đự án
                BillFinance::updateOrCreate([
                    'bill_id' => $this->model->id,
                ],[
                    // 'debt' => $request->finance_debt,
                    'received' => $request->finance_received,
                    'total' => $request->finance_total,
                    'detail' => $request->finance_detail,
                ]);



                // //  nếu thuê tên miền bên mình thì tạo 1 hóa đơn cho tên miền đó
                // if ($data['domain_owner'] == 'hobasoft') {
                //     $this->createBillForDomain($data, $this->model);
                // }

                // //  nếu thuê hosting bên mình thì tạo 1 hóa đơn cho hosting đó
                // if ($data['hosting_owner'] == 'hobasoft') {
                //     $this->createBillForHosting($data, $this->model);
                // }

                \DB::commit();
                CommonHelper::one_time_message('success', 'Tạo mới thành công!');
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

            if ($request->return_direct == 'save_exit') {
                return redirect('admin/' . $this->module['code']);
            } elseif ($request->return_direct == 'save_create') {
                return redirect('admin/' . $this->module['code'] . '/add');
            }

            return redirect('admin/' . $this->module['code'] . '/edit/' . $this->model->id);
        } catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request)
    {
        try {
            $item = $this->model->find($request->id);

            //  Khách hàng ko được xem bản ghi của người khác
            if (in_array(CommonHelper::getRoleName(\Auth::guard('admin')->user()->id, 'name'), ['customer', 'customer_ldp_vip'])
                && $item->customer_id != \Auth::guard('admin')->user()->id) {
                CommonHelper::one_time_message('error', 'Bạn không có quyền!');
                return back();
            }

            if (!is_object($item)) abort(404);

            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);

                if ($item->service_id == 1) {
                    $camp = MarketingMail::find(1);
                    $data['email_content_ban_giao'] = $this->processContentMail(@$camp->email_template->content, $item);
                } elseif($item->service_id == 5) {
                    $camp = MarketingMail::find(5);
                    $data['email_content_ban_giao'] = $this->processContentMail(@$camp->email_template->content, $item);
                }

                return view('CRMEdu.tpbill.edit')->with($data);
            }

            \DB::beginTransaction();

            $data = $this->processingValueInFields($request, $this->getAllFormFiled());

            //  Tùy chỉnh dữ liệu insert
            //  Khách hàng tự sửa hóa đơn của mình
            if (CRMEduHelper::getRoleType(\Auth::guard('admin')->user()->id) == 'customer') {
                unset($data['customer_id']);
            }

            // //  nếu thuê tên miền bên mình thì tạo 1 hóa đơn cho tên miền đó
            // if ($data['domain_owner'] == 'hobasoft') {
            //     $this->createBillForDomain($data, $item);
            // }

            // //  nếu thuê hosting bên mình thì tạo 1 hóa đơn cho hosting đó
            // if ($data['hosting_owner'] == 'hobasoft') {
            //     $this->createBillForHosting($data, $item);
            // }

            //  Lấy người phụ trách
            $data['curator_ids'] = '|' . implode('|', $request->get('curator_ids', [])) . '|';
            $data['staff_care'] = '|' . implode('|', $request->get('staff_care', [])) . '|';
            $data['marketer_ids'] = '|' . implode('|', $request->get('marketer_ids', [])) . '|';

            unset($data['file_ldp']);

            if (isset($data['quick_note'])) unset($data['quick_note']);


            foreach ($data as $k => $v) {
                $item->$k = $v;
            }
            if ($item->save()) {

                //  Cập nhật tiến độ dự án
                BillProgress::updateOrCreate([
                    'bill_id' => $item->id,
                ],[
                    'status' => $request->progress_status,
                    'yctk' => $request->progress_yctk,
                ]);

                //  Cập nhật tiền đự án
                BillFinance::updateOrCreate([
                    'bill_id' => $item->id,
                ],[
                    // 'debt' => $request->finance_debt,
                    'received' => $request->finance_received,
                    'total' => $request->finance_total,
                    'detail' => $request->finance_detail,
                ]);


                /*$expiry_date_db = Bill::find($request->id)->expiry_date;
                $price_db = Bill::find($request->id)->exp_price;
                if ($expiry_date_db != $request->expiry_date) {
                    $billHistory = new BillHistory();
                    $billHistory->bill_id = $request->id;
                    $billHistory->price = $price_db;
                    $billHistory->expiry_date = $expiry_date_db;

                    $billHistory->save();
                }*/

                if ($request->log_name != null || $request->log_note != null) {
                    //  Nếu có viết vào lịch sử tư vấn thì tạo lịch sử tư vấn
                    $leadController = new \App\CRMEdu\Admin\LeadController();
                    $leadController->LeadContactedLog([
                        'title' => $request->log_name,
                        'note' => $request->log_note,
                        'lead_id' => $item->id,
                        'type' => 'hđ',
                    ]);
                }

                \DB::commit();

                if ($request->return_direct == 'mail_ban_giao_ldp') {
                    //  Gửi mail bàn giao LDP
                    $this->sendMailBanGiao($item, 1);

                    $item->handover_landingpage ++;

                    $item->save();

                    CommonHelper::one_time_message('success', 'Bàn giao thành công!');
                    return redirect('admin/' . $this->module['code'] . '/edit/' . $item->id);
                }

                if ($request->return_direct == 'mail_ban_giao_wp') {
                    //  Gửi mail bàn giao LDP
                    $this->sendMailBanGiao($item, 5);

                    $item->handover_wp ++;

                    $item->save();

                    CommonHelper::one_time_message('success', 'Bàn giao thành công!');
                    return redirect('admin/' . $this->module['code'] . '/edit/' . $item->id);
                }

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

        } catch (\Exception $ex) {
            \DB::rollback();
            dd($ex->getMessage());
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return redirect()->back()->withInput();
        }
    }

    public function getPublish(Request $request)
    {
        try {


            $id = $request->get('id', 0);
            $item = $this->model->find($id);

            // Không được sửa dữ liệu của cty khác, cty mình ko tham gia
//            if (strpos(Auth::guard('admin')->user()->company_ids, '|' . $item->company_id . '|') === false) {
//                return response()->json([
//                    'status' => false,
//                    'msg' => 'Bạn không có quyền xuất bản!'
//                ]);
//            }

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


    public function searchForSelect2(Request $request)
    {
        $data = $this->model->select([$request->col, 'id'])->where($request->col, 'like', '%' . $request->keyword . '%');
        if ($request->where != '') {
            $data = $data->whereRaw(urldecode(str_replace('&#039;', "'", $request->where)));
        }
        if (@$request->company_id != null) {
            $data = $data->where('company_id', $request->company_id);
        }

        //  Khách hàng ko được xem hóa đơn người khác
        if (CRMEduHelper::getRoleType(\Auth::guard('admin')->user()->id) == 'customer') {
            $data = $data->where('customer_id', \Auth::guard('admin')->user()->id);
        }

        $data = $data->limit(5)->get();
        return response()->json([
            'status' => true,
            'items' => $data
        ]);
    }

    public function processContentMail($html, $bill)
    {
        $html = str_replace('{service_name}', $bill->service_name == '' ? $bill->service->name_vi : $bill->service_name, $html);
        $html = str_replace('{domain}', '<a target="_blank" href="'.$bill->domain.'">'.$bill->domain.'</a>', $html);
        $html = str_replace('{guarantee}', $bill->guarantee, $html);
        $html = str_replace('{web_link}', '<a target="_blank" href="'.$bill->web_link.'">'.$bill->web_link.'</a>', $html);
        $html = str_replace('{web_username}', $bill->web_username, $html);
        $html = str_replace('{web_password}', $bill->web_password, $html);
        $html = str_replace('{hosting_link}', '<a target="_blank" href="'.$bill->hosting_link.'">'.$bill->hosting_link.'</a>', $html);
        $html = str_replace('{hosting_username}', $bill->hosting_username, $html);
        $html = str_replace('{hosting_password}', $bill->hosting_password, $html);
        $html = str_replace('{file_ldp}', '<a target="_blank" href="'.url('admin/landingpage/down-load-file/' . $bill->id . '/' . @$bill->ldp->id).'">Click để tải File thiết kế</a>', $html);
        $html = str_replace('{customer_link}', '<a target="_blank" href="'.@$bill->ldp->customer_link.'">Danh sách khách hàng</a>', $html);

        return $html;
    }
}
