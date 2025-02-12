<?php

namespace App\CRMEdu\Controllers\Admin;

use App\Http\Helpers\CommonHelper;
use Illuminate\Http\Request;
use Modules\EworkingCompany\Models\Company;
use App\CRMEdu\Models\Service;
use App\CRMEdu\Models\ServiceHistory;
use Validator;
use App\CRMEdu\Models\LeadContactedLog;
use App\CRMEdu\Models\UngVien;
use App\Models\Admin;
use DB;

class UngVienController extends CURDBaseController
{

    protected $module = [
        'code' => 'Ung-Vien',
        'table_name' => 'UngVien',
        'label' => 'Ứng Viên',
        'modal' => '\App\CRMEdu\Models\UngVien',
        'list' => [
            ['name' => 'name', 'type' => 'text_edit', 'label' => 'CRMEdu_admin.UngVien_name', 'sort' => true],
            ['name' => 'Phone', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_SĐT', 'sort' => true],
            ['name' => 'Email', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_Email', 'sort' => true],
            ['name' => 'Vi_Tri', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_Vi_Tri', 'sort' => true],
            ['name' => 'CV', 'type' => 'text', 'td' => 'CRMEdu_admin.UngVien_CV', 'label' => 'CRMEdu_admin.UngVien_CV', 'sort' => true],
            ['name' => 'Trang_Ca_Nhan', 'type' => 'link', 'td' => 'CRMEdu_admin.UngVien_Ca_nhan', 'label' => 'CRMEdu_admin.UngVien_Ca_nhan', 'sort' => true],
            ['name' => 'status', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_status', 'sort' => true],
            ['name' => 'Tuyen_Dung', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_Tuyen_Dung', 'sort' => true],
            ['name' => 'Phong_Van', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_Phong_Van', 'sort' => true],


        ],
        'form' =>[
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_name', 'group_class' => 'col-md-3'],
                ['name' => 'Phone', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_SĐT', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_SĐT', 'group_class' => 'col-md-3'],
                ['name' => 'Email', 'type' => 'text', 'label' => 'CRMEdu_admin.UngVien_Email', 'group_class' => 'col-md-3'],
                ['name' => 'Vi_Tri', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_Vi_Tri', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_Vi_Tri', 'group_class' => 'col-md-3'],
                ['name' => 'CV', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_CV', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_CV', 'group_class' => 'col-md-3'],
                //['name' => 'status', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_status', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_status', 'group_class' => 'col-md-3'],
                ['name' => 'status', 'type' => 'select', 'options' => [
                    ''=>'',
                    'Không liên lạc được' => 'Không liên lạc được',
                    'Không có nhu cầu' => 'Không có nhu cầu',
                    'Đang tìm hiểu' => 'Đang tìm hiểu',
                    'Care dài' => 'Đang Phỏng Vấn',
                ], 'label' => 'Trạng Thái', 'group_class' => 'col-md-3'],
                ['name' => 'Trang_Ca_Nhan', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_Ca_nhan', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_Ca_nhan', 'group_class' => 'col-md-3'],
                ['name' => 'Tuyen_Dung', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_Tuyen_Dung', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_Tuyen_Dung', 'group_class' => 'col-md-3'],
                ['name' => 'Phong_Van', 'type' => 'text', 'field' => 'CRMEdu_admin.UngVien_Phong_Van', 'class' => 'required', 'label' => 'CRMEdu_admin.UngVien_Phong_Van', 'group_class' => 'col-md-3'],


            ],

        ]
    ];

    protected $quick_search = [
        'label' => 'ID, tên, sđt, đánh giá, mô tả',
        'fields' => 'id, name, tel, rate, profile, need, product'
    ];

    protected $filter = [
        'saler_ids' => [
            'label' => 'Tên',
            'type' => 'text',
            'display_field' => 'name',
            'display_field2' => 'code',
            'model' => \App\Models\Admin::class,
            'object' => 'admin',
            'query_type' => 'custom'
        ],
        'marketer_ids' => [
            'label' => 'SĐT',
            'type' => 'select2_ajax_model',
            'display_field' => 'name',
            'display_field2' => 'code',
            'model' => \App\Models\Admin::class,
            'object' => 'admin',
            'query_type' => 'custom'
        ],
        'service' => [
            'label' => 'Email',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                'landingpage' => 'landingpage',
                'wordpress' => 'wordpress',
                'laravel' => 'laravel',
                'web khác' => 'web khác',
                'app' => 'app',
                'marketing tổng thể' => 'Marketing tổng thể',
                'ads' => 'ads',
                'seo' => 'seo',
                'content' => 'content',
                'logo' => 'logo',
                'banner' => 'banner',
                'design khác' => 'design khác',
                'game' => 'game',
            ],
            'query_type' => 'like'
        ],
        'status' => [
            'label' => 'Trạng thái',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                'Đang chăm sóc' => 'Đang chăm sóc',
                'Tạm dừng' => 'Tạm dừng',
                'Thả nổi' => 'Thả nổi',
                'Đã ký HĐ' => 'Đã ký HĐ',
            ],
            'query_type' => '='
        ],
        'rate' => [
            'label' => 'Đánh giá',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                'Chưa đánh giá' => 'Chưa đánh giá',
                'Không liên lạc được' => 'Không liên lạc được',
                'Không có nhu cầu' => 'Không có nhu cầu',
                'Đang tìm hiểu / Care dài' => 'Đang tìm hiểu / Care dài',
                'Quan tâm cao' => 'Quan tâm cao',
                'Đã ký HĐ' => 'Đã ký HĐ',
            ],
            'query_type' => 'custom'
        ],
        'sale_status' => [
            'label' => 'Tình trạng sale',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                'Chưa có sale' => 'Chưa có sale',
                'Đã có sale' => 'Đã có sale',
            ],
            'query_type' => 'custom'
        ],
        'lead_status' => [
            'label' => 'Sắp xếp',
            'type' => 'select',
            'options' => [
                '' => 'Không',
                'Sắp thả nổi' => 'Sắp thả nổi',
                'Ngày tạo: Mới -> cũ' => 'Ngày tạo: Mới -> cũ',
                'Ngày nhận: Mới -> cũ' => 'Ngày nhận: Mới -> cũ',
                'Đến ngày TT' => 'Đến ngày TT',
            ],
            'query_type' => 'custom'
        ],
        'contacted_log_last' => [
            'label' => 'Ngày TT',
            'type' => 'from_to_date',
            'query_type' => 'from_to_date'
        ],
        'check_tel' => [
            'label' => 'Check SĐT',
            'type' => 'textarea',
            'query_type' => 'custom'
        ],
    ];

    public function appendWhere($query, $request)
    {


        if (\Auth::guard('admin')->user()->super_admin != 1) {
            //  Nếu ko phải super_admin thì truy vấn theo dữ liệu cty đó
            // $query = $query->where('company_id', \Auth::guard('admin')->user()->last_company_id);
        }



        return $query;
    }


    public function sort($request, $model)
    {
        if (@$request->lead_status != null) {
            if ($request->lead_status == 'Sắp thả nổi') {
                $model = $model->orderBy('contacted_log_last', 'asc');
            } elseif ($request->lead_status == 'Ngày tạo: Mới -> cũ') {
                $model = $model->orderBy('id', 'desc');
            } elseif ($request->lead_status == 'Ngày nhận: Mới -> cũ') {
                $model = $model->orderBy('received_date', 'desc');
            } elseif ($request->lead_status == 'Đến ngày TT') {
                $model = $model->orderBy('dating', 'asc')
                    ->where('dating', '<=', date('Y-m-d 23:59:59'));
            }
        }
        if ($request->sorts != null) {
            foreach ($request->sorts as $sort) {
                if ($sort != null) {
                    $sort_data = explode('|', $sort);
                    $model = $model->orderBy($sort_data[0], $sort_data[1]);
                }
            }
        } else {
            $model = $model->orderByRaw($this->orderByRaw);
        }
        return $model;
    }

    public function quickSearch($listItem, $r) {
        if (@$r->quick_search != '') {
            $listItem = $listItem->where(function ($query) use ($r) {
                foreach (explode(',', $this->quick_search['fields']) as $field) {
                    $query->orWhere(trim($field), 'LIKE', '%' . $r->quick_search . '%');    //  truy vấn các tin thuộc các danh mục con của danh mục hiện tại
                }

                //  Tìm theo sđt
                $search_tel = str_replace('.', '', $r->quick_search);
                $search_tel = str_replace(',', '', $search_tel);
                $search_tel = trim($search_tel);
                $query->orWhere('tel', 'LIKE', '%' . $search_tel . '%');
            });

        }
        return $listItem;
    }

    public function getIndex(Request $request)
    {
        //dd($request->all());
        $data = $this->getDataList($request);
//dd($data);
        return view('CRMEdu.UngVien.list')->with($data);

    }

    public function add(Request $request)
    {
        try {


            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('CRMEdu.UngVien.add')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ], [
                    'name.required' => 'Bắt buộc phải nhập tên',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert



                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
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

                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit/' . $this->model->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function getTimePrice($request)
    {
        $time_price = [];
        if ($request->has('time_price_use_date_max')) {
            foreach ($request->time_price_use_date_max as $k => $key) {
                if ($key != null) {
                    $time_price[] = [
                        'use_date_max' => $key,
                        'price' => $request->time_price_price[$k],
                    ];
                }
            }
        }
        return $time_price;
    }

    public function update(Request $request)

    {
        try {

            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);
                return view('CRMEdu.UngVien.edit')->with($data);

            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'name' => 'required',
//                    'tel' => 'required',
                ], [
//                    'name.required' => 'Bắt buộc phải nhập tên',
//                    'tel.required' => 'Bắt buộc phải nhập sđt',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert
//                    if (\Auth::guard('admin')->user()->super_admin == 1 || \Auth::guard('admin')->user()->id == $item->admin_id) {
//                        //  Nếu là super admin hoặc là người tạo đầu mối thì được phép sửa mkt
//                        $data['marketer_ids'] = '|' . implode('|', $request->get('marketer_ids', [])) . '|';
//                    }
//
//                    if (\Auth::guard('admin')->user()->super_admin == 1 || strpos($item->saler_ids, '|'.\Auth::guard('admin')->user()->id.'|') !== false) {
//
//                        //  Nếu là super admin hoặc đầu mối của mình là sale thì được phép sửa sale
//                        $data['saler_ids'] = '|' . implode('|', $request->get('saler_ids', [])) . '|';
//                    } else {
//                        //  Nếu chuyển trạng thái từ Thả nổi về đang chăm sóc thì reset lại sale
//                        if ($item->status == 'Thả nổi' && $data['status'] == 'Đang chăm sóc') {
//                            $data['saler_ids'] = '|'. \Auth::guard('admin')->user()->id .'|';
//                        }
//                    }
//
//                    if ($request->has('service')) {
//                        $data['service'] = '|' . implode('|', $data['service']) . '|';
//                    } else {
//                        $data['service'] = '';
//                    }
//                    $data['dating'] = $request->dating;
//
//                    //  Nếu thay đổi sale thì tạo log
//                    $data = $this->changeSale($data, $item);
//
//                    //  Nếu thay đổi trạng thái thì tạo log
//                    $this->changeStatus($data, $item);

                    foreach ($data as $k => $v) {
                        $item->$k = $v;
                    }
                    if ($item->save()) {

                        if ($request->log_name != null || $request->log_note != null) {
                            //  Nếu có viết vào lịch sử tư vấn thì tạo lịch sử tư vấn
                            $this->LeadContactedLog([
                                'title' => $request->log_name,
                                'note' => $request->log_note,
                                'lead_id' => $item->id,
                                'type' => 'lead',
                            ]);
                        }

                        CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    } else {
                        CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    }

                    \DB::commit();

                    if ($request->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $item
                        ]);
                    }

                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit?code=' . $item->phone .'-' .date('d-m-Y', strtotime($item->created_at)) . '-' . $item->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
                    } elseif ($request->return_direct == 'save_exit') {
                        return redirect('admin/' . $this->module['code']);
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            \DB::rollback();

            // CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    //  Kiểm tra thay đổi sale thì log lại lịch sử
    public function changeSale($data, $item) {
        if (@$data['saler_ids'] != null && @$data['saler_ids'] != $item->saler_ids) {
            $data['received_date'] = date('Y-m-d H:i:s');    //  reset lai ngay nhan lead
            $data['contacted_log_last'] = null; //  reset ngày cuối tương tác
            $sales_old = Admin::whereIn('id', explode('|', $item->saler_ids))->pluck('name');
            $sales_new = Admin::whereIn('id', explode('|', @$data['saler_ids']))->pluck('name');
            $txt = 'từ ';
            foreach($sales_old as $v) {
                $txt .= $v . ', ';
            }
            $txt .= ' sang ';
            foreach($sales_new as $v) {
                $txt .= $v . ', ';
            }
            $log_create = [
                'title' => '',
                'admin_id' => \Auth::guard('admin')->user()->id,
                'lead_id' => $item->id,
                'note' => 'Đổi sale ' . $txt,
                'type' => 'lead',
            ];
        }
        return $data;
    }

    //  Kiểm tra thay đổi trạng thái thì log lại lịch sử
    public function changeStatus($data, $item) {
        if (@$data['status'] != $item->status) {
            $log_create = [
                'title' => '',
                'admin_id' => \Auth::guard('admin')->user()->id,
                'lead_id' => $item->id,
                'note' => 'Đổi trạng thái: từ "' . $item->status . '" sang "'.$data['status'].'"',
                'type' => 'lead',
            ];
        }
        return true;
    }

    public function view(Request $request) {
        $code = $request->get('code', '');
        $id = explode('-', $code)[count(explode('-', $code)) - 1];
        $item = $this->model->find($id);

        if (!is_object($item)) abort(404);

        if ($item->tel != @explode('-', $code)[0]) {
            CommonHelper::one_time_message('error', 'Đường dẫn không tồn tại');
            return redirect('/admin');
        }


        $data = $this->getDataUpdate($request, $item);
        return view('CRMEdu.UngVien.view')->with($data);
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

    public function multiDelete(Request $request)
    {
        try {

            $ids = $request->ids;
            if (is_array($ids)) {
                $this->model->whereIn('id', $ids)->delete();
            }
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

    public function getPriceInfo($request)
    {
        $price = [];
        if ($request->has('price_day')) {
            foreach ($request->price_day as $k => $key) {
                if ($key != null) {
                    $price[] = [
                        'day' => $key,
                        'price' => str_replace(',', '', str_replace('.', '', $request->price_price[$k])),
                    ];
                }
            }
        }
        return $price;
    }

    public function show()
    {
        $data['page_title'] = 'Các gói dịch vụ';
        $data['page_type'] = 'list';
        return view('CRMEdu.UngVien.show')->with($data);
    }

    public function get_info(Request $r) {
        $service = Service::find($r->service_id);
        $configPrice = json_decode($service->price);
        foreach ($configPrice as $v) {
            if ($v->day == 'start') {
                $priceStart = $v->price;
            }
            if ($v->day == '365') {
                $priceExpiry = $v->price;
            }
        }
        return response()->json([
            'total_price' => $priceStart,
            'total_price_format' => number_format($priceStart),
            'exp_price' => $priceExpiry,
            'exp_price_format' => number_format($priceExpiry)
        ]);
    }

    // ajax Log lịch sử tư vấn
    public function ajaxLeadContactedLog(Request $r) {

        $data = $r->all();

        $log = new LeadContactedLog();
        foreach ($data as $k => $v) {
            $log->$k = $v;
        }
        $log->admin_id = @\Auth::guard('admin')->user()->id;

        $log->save();

        if($data['type'] == 'lead') {
            //  Nếu là đầu mối thì thêm ngày cuối cùng tương tác cho đầu mối
            Lead::where('id', $data['lead_id'])->update([
                'contacted_log_last' => date('Y-m-d H:i:s'),
            ]);
        } elseif($data['type'] == 'hđ') {
            //  Nếu là hợp đồng thì thêm ngày cuối cùng tương tác cho HĐ
            Bill::where('id', $data['lead_id'])->update([
                'contacted_log_last' => date('Y-m-d H:i:s'),
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $log,
            'msg' => 'Thành công'
        ]);

    }

    // Log lịch sử tư vấn
    public function leadContactedLog($data) {

        $log = new LeadContactedLog();
        foreach ($data as $k => $v) {
            $log->$k = $v;
        }
        $log->admin_id = @\Auth::guard('admin')->user()->id;

        $log->save();

        if($data['type'] == 'lead') {
            //  Nếu là đầu mối thì thêm ngày cuối cùng tương tác cho đầu mối
            Lead::where('id', $data['lead_id'])->update([
                'contacted_log_last' => date('Y-m-d H:i:s'),
            ]);
        } elseif($data['type'] == 'hđ') {
            //  Nếu là hợp đồng thì thêm ngày cuối cùng tương tác cho HĐ
            Bill::where('id', $data['lead_id'])->update([
                'contacted_log_last' => date('Y-m-d H:i:s'),
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $log,
            'msg' => 'Thành công'
        ]);

    }

    public function tooltipInfo(Request $r) {
        $data['lead'] = Lead::find($r->id);


        return view('CRMEdu.lead.tooltip_info')->with($data);
    }

    public function sendMail() {
        $logs = LeadContactedLog::where('created_at', '>', date('Y-m-d 00:00:00'))->where('type', 'lead')->get();

        $settings = Setting::whereIn('name', ['admin_emails', 'mail_name', 'admin_email', 'admin_receives_mail'])->pluck('value', 'name')->toArray();
        $admins = explode(',', $settings['admin_emails']);
        if ($settings['admin_receives_mail'] == 1) {
            $admins = explode(',', $settings['admin_emails']);
            foreach ($admins as $admin) {
                $user = (object)[
                    'email' => trim($admin),
                    'name' => $settings['mail_name'],
                ];
                $data = [
                    'view' => 'CRMEdu.lead.emails.tien_do_cong_viec',
                    'link_view_more' => \URL::to('/admin/lead'),
                    'user' => $user,
                    'name' => $settings['mail_name'],
                    'subject' => 'Cập nhật công việc trong ngày'
                ];
                Mail::to($user)->send(new MailServer($data));
            }
        }
        die('xong!');
    }




    public function checkExist(Request $request) {
        if ($request->has('tel')) {
            $leads = Lead::select('id', 'email', 'name', 'tel', 'created_at', 'admin_id')->where('tel', $request->tel);
            if ($request->has('id')) {
                $leads = $leads->where('id', '!=', $request->id)->first();
            }
            $leads = $leads->get();
            if (count($leads) > 0) {
                $txt = 'SĐT này trùng với đầu mối:<br>';
                foreach($leads as $v) {
                    $txt .= ' - <a target="_blank" href="/admin/lead/edit?code='.$v->tel.'-'.$v->created_at.'-'.$v->id.'">'.$v->name.'-'.$v->tel.'. Tạo bởi: ' . @$v->admin->name . '. Lúc: ' . @date('H:i d/m/Y', strtotime($v->created_at)) .'</a><br>';
                }
                return response()->json([
                    'status' => false,
                    'html' => $txt,
                ]);
            }
        }
        return response()->json([
            'status' => true,
            'html' => ''
        ]);
    }

    public function adminSearchForSelect2(Request $request)
    {
        $col2 = $request->get('col2', '') == '' ? '' : ', ' . $request->get('col2');

        $data = Admin::selectRaw('id, name' . $col2)->where($request->col, 'like', '%' . $request->keyword . '%');

        if ($request->where != '') {
            $data = $data->whereRaw(urldecode(str_replace('&#039;', "'", $request->where)));
        }

        $data = $data->limit(5)->get();

        return response()->json([
            'status' => true,
            'items' => $data
        ]);
    }

    public function test() {
        //  Convert cột kq1 => log
        $leads = Lead::where('admin_id', 324)->get();
        foreach($leads as $lead) {
            if ($lead->kq1 != null || $lead->kq2 != null || $lead->kq3 != null) {
                $log = new LeadContactedLog();
                $log->admin_id = $lead->admin_id;
                $log->lead_id = $lead->id;
                $log->title = $lead->kq3 . '. ' .$lead->kq4;
                $log->note = $lead->kq1 . '. ' .$lead->kq2;
                $log->save();
            }
        }
        die('xong');
    }

    public function ajaxUpdate(Request $r) {
        $lead = Lead::where('id', $r->id)->update($r->data);
        CommonHelper::one_time_message('success', 'Cập nhật thành công!');
        return response()->json($lead);
    }

    public function leadAssign(Request $r) {
        $str = '';
        foreach(explode(',', $r->lead_ids) as $lead_id) {
            if ($lead_id != '') {
                $lead = Lead::where('id', trim($lead_id));
                if (\Auth::guard('admin')->user()->super_admin != 1) {
                    //  Nếu mình ko phải super admin thì truy vấn ra đầu mối của mình là sale
                    $lead = $lead->where(function ($query) use ($r) {
                        $query->orWhere('saler_ids', 'like', '%|'.\Auth::guard('admin')->user()->id.'|%');  //  đầu mối của mình là sale
                        $query->orWhere('status', 'Thả nổi');  //  đầu mối thả nổi
                    });
                }
                $lead = $lead->first();
                $lead->saler_ids = '|'.$r->sale_id.'|';
                $lead->received_date = date('Y-m-d H:i:s');    //  reset lai ngay nhan lead
                if ($r->rate != '-') {
                    //  nếu có chọn sửa đánh giá thì gán tất cả đầu mối thành đánh giá đó
                    $lead->rate = $r->rate;
                }
                if ($r->status != '-') {
                    //  nếu có chọn sửa trạng thái thì gán tất cả đầu mối thành đánh giá đó
                    $lead->status = $r->status;
                }
                $lead->save();
                $str .= $lead->id . ',';
            }
        }
        CommonHelper::one_time_message('success', 'Chuyển thành công đầu mối: ' . $str);
        return redirect()->back();
        return response()->json([
            'status' => true,
            'msg' => 'Chuyển thành công: ' . $str
        ]);
    }


    /**
     * Tối đa import được 999 dòng
     */
    public function importExcel(Request $r)
    {

        $table_import = $r->has('table') ? $r->table : $this->module['table_name'];
        $validator = Validator::make($r->all(), [
            'module' => 'required',
        ], [
            'module.required' => 'Bắt buộc phải nhập module!',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $importController = new \App\Http\Controllers\Admin\ImportController();
            $data = $importController->processingValueInFields($r, $importController->getAllFormFiled());
            //  Tùy chỉnh dữ liệu insert

            if ($r->has('file')) {
                $file_name = $r->file('file')->getClientOriginalName();
                $file_name = str_replace(' ', '', $file_name);
                $file_name_insert = date('s_i_') . $file_name;
                $r->file('file')->move(base_path() . '/public_html/filemanager/userfiles/imports/', $file_name_insert);
                $data['file'] = 'imports/' . $file_name_insert;
            }

            unset($data['field_options_key']);
            unset($data['field_options_value']);
            #

            $item = new \App\Models\Import();
            foreach ($data as $k => $v) {
                $item->$k = $v;
            }
            if ($item->save()) {


                //  Import dữ liệu vào
                $importController->updateAttributes($r, $item);

                $this->processingImport($r, $item);

                CommonHelper::flushCache($table_import);
                CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                return redirect('/admin/import');
            } else {
                CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
            }

            if ($r->ajax()) {
                return response()->json([
                    'status' => true,
                    'msg' => '',
                    'data' => $item
                ]);
            }

            return redirect('/admin/import');
        }
    }

    public function processingImport($r, $item)
    {

        $table_import = $r->has('table') ? $r->table : $this->module['table_name'];
        $record_total = $record_success = 0;
        $dataInsertFix =\App\Models\Attribute::where('table', $table_import)->where('type', 'field_options')->where('item_id', @$item->id)->pluck('value', 'key')->toArray();


        \Excel::load('public_html/filemanager/userfiles/' . $item->file, function ($reader) use ($r, $dataInsertFix, &$record_total, &$record_success) {

            $reader->each(function ($sheet) use ($r, $reader, $dataInsertFix, &$record_total, &$record_success) {

                if ($reader->getSheetCount() == 1) {

                    $result = $this->importItem($sheet, $r, $dataInsertFix);
                    if ($result['status']) {
                        $record_total++;
                    }
                    if ($result['import']) {
                        $record_success++;
                    }
                } else {
                    $sheet->each(function ($row) use ($r, $dataInsertFix, &$model, &$record_total, &$record_success) {
                        $result = $this->importItem($row, $r, $dataInsertFix);
                        if ($result['status']) {
                            $record_total++;
                        }
                        if ($result['import']) {
                            $record_success++;
                        }
                    });
                }
            });
        });
        $item->record_total = $record_total;
        $item->record_success = $record_total;
        $item->save();
        return true;
    }

    //  Xử lý import 1 dòng excel
    public function importItem($row, $r, $dataInsertFix)
    {
        try {
            //  Kiểm tra trường dữ liêu bắt buộc có
            /*$fields_require = ['tel'];
            foreach ($fields_require as $field_require) {
                if (!isset($row->{$field_require}) || $row->{$field_require} == '' || $row->{$field_require} == null) {
                    return false;
                }
            }*/

            $row_empty = true;
            foreach ($row->all() as $key => $value) {
                if ($value != null) {
                    $row_empty = false;
                }
            }

            //  Các trường không được trùng
            $item_model = new $this->module['modal'];
            $item = $item_model->where('tel', $row->all()['tel'])->first();
            if (is_object($item)) {
                //  nếu đã tồn tại đầu mối này
                if ($item->status == 'Thả nổi') {
                    $item->status = 'Đang chăm sóc';
                    $item->received_date = date('Y-m-d H:i:s');    //  reset lai ngay nhan lead
                    $item->save();
                }
                $row_empty = true;
            }

            /*if ($this->import[$request->module]['unique']) {
                $field_name = $this->import[$request->module]['fields'][$this->import[$request->module]['unique']];
                $model_new = new $this->import[$request->module]['modal'];
                $model = $model_new->where($field_name, $row->{$this->import[$request->module]['unique']})->first();
            }*/

            if (!$row_empty) {
                $data = [];
                $data['saler_ids'] = '|'.\Auth::guard('admin')->user()->id.'|';
                $data['admin_id'] = \Auth::guard('admin')->user()->id.'|';
                $data['received_date'] = date('Y-m-d H:i:s');    //  reset lai ngay nhan lead

                //  Gán các dữ liệu được fix cứng từ view
                foreach ($dataInsertFix as $k => $v) {
                    $data[$k] = $v;
                }

                //  Chèn các dữ liệu lấy vào từ excel
                foreach ($row->all() as $key => $value) {
                    switch ($key) {
                        case 'password': {
                            $data['password'] = bcrypt($value);
                            break;
                        }
                        default: {
                            if (\Schema::hasColumn($r->table, $key)) {
                                $data[$key] = $value;
                            }
                        }
                    }
                }
                foreach ($data as $k => $v) {
                    $this->model->$k = $v;
                }

                if ($this->model->save()) {
                    return [
                        'status' => true,
                        'import' => true
                    ];
                }
            }
        } catch (\Exception $ex) {
            return [
                'status' => true,
                'import' => false,
                'msg' => $ex->getMessage()
            ];
        }
    }
}

//  Lệnh sql update data Hoàng Hạnh -> thả nổi
// update leads set status = "Thả nổi" WHERE `admin_id` = '324' AND `status` = 'Đang chăm sóc' AND `saler_ids` = '|324|'