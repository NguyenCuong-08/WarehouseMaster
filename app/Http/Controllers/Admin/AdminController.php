<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\CommonHelper;
use App\Models\{Admin, Attribute, Import, RoleAdmin, Setting, Roles, User};
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;
use Validator;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use Illuminate\Validation\Rule;

class AdminController extends CURDBaseController
{
    protected $_role;

    public function __construct()
    {
        parent::__construct();
        $this->_role = new RoleController();
    }

    protected $module = [
        'code' => 'admin',
        'label' => 'admin.admin',
        'table_name' => 'admin',
        'modal' => '\App\Models\Admin',
        'list' => [
            ['name' => 'image', 'type' => 'image', 'label' => 'admin.image'],
            ['name' => 'name', 'type' => 'text_admin_edit', 'label' => 'admin.name', 'sort' => true],
            ['name' => 'tel', 'type' => 'text', 'label' => 'SĐT', 'sort' => true],
//            ['name' => 'role_id', 'type' => 'role_name', 'label' => 'admin.permission'],
            ['name' => 'vi_tien', 'type' => 'price_vi', 'label' => 'Ví', 'sort' => true],
//            ['name' => 'vi_tien_status', 'type' => 'custom', 'td'=>'Affilate.admin.list.td.trang_thai_vi','label' => 'Trạng thái ví', 'options' => [
//                0 => 'Khoá',
//                1 => 'Mở',
//            ], 'group_class' => 'col-md-4'],
            ['name' => 'vi_tien', 'type' => 'price_vi', 'label' => 'Số điểm', 'sort' => true],
            ['name' => 'parent_id', 'type' => 'relation', 'label' => 'Cha', 'object' => 'parent', 'display_field' => 'name', 'display_field2' => 'tel'],
            ['name' => 'invite_by', 'type' => 'relation', 'label' => 'Người giới thiệu', 'object' => 'invite', 'display_field' => 'name', 'display_field2' => 'tel'],
            ['name' => 'created_at', 'type' => 'text', 'label' => 'Tạo lúc', 'sort' => true],
//            ['name' => 'id', 'type' => 'count_log', 'label' => 'Số thao tác', 'sort' => true],
            ['name' => 'status', 'type' => 'status', 'label' => 'admin.status', 'sort' => true],
//            ['name' => 'updated_at', 'type' => 'text', 'label' => 'admin.update']
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'admin.full_name', 'group_class' => 'col-md-6'],
//                ['name' => 'short_name', 'type' => 'text', 'class' => '', 'label' => 'Tên ngắn gọn', 'group_class' => 'col-md-6'],
                ['name' => 'email', 'type' => 'email', 'class' => '', 'label' => 'admin.email', 'group_class' => 'col-md-6'],
                ['name' => 'tel', 'type' => 'text', 'label' => 'admin.phone', 'group_class' => 'col-md-6'],
                ['name' => 'password', 'type' => 'password', 'class' => 'required', 'label' => 'admin.password', 'group_class' => 'col-md-6'],
                ['name' => 'password_confimation', 'type' => 'password', 'class' => 'required', 'label' => 'admin.re_password', 'group_class' => 'col-md-6'],
                ['name' => 'role_id', 'type' => 'custom', 'field' => 'admin.partials.select_role', 'label' => 'Quyền', 'class' => 'required', 'model' => \App\Models\Roles::class, 'display_field' => 'display_name', 'group_class' => 'col-md-6'],
                ['name' => 'status', 'type' => 'checkbox', 'label' => 'admin.active', 'value' => 1, 'group_class' => 'col-md-6'],
                ['name' => 'province_id', 'type' => 'select_location', 'label' => 'Chọn địa điểm'],
                ['name' => 'address', 'type' => 'text', 'class' => '', 'label' => 'Địa chỉ cụ thể'],
                ['name' => 'intro', 'type' => 'textarea', 'class' => '', 'label' => 'Giới thiệu'],
                ['name' => 'note', 'type' => 'textarea', 'class' => '', 'label' => 'Ghi chú', 'inner' => 'rows=10'],
            ],
            'affiliate_tab' => [

//                ['name' => 'vi_tien', 'type' => 'number', 'label' => 'Số dư ví', 'group_class' => 'col-md-4'],
                ['name' => 'pin', 'type' => 'text', 'label' => 'Mã pin rút tiền', 'group_class' => 'col-md-4'],
//                ['name' => 'vi_tien_status', 'type' => 'select', 'class' => '', 'label' => 'Trạng thái ví', 'options' => [
//                    0 => 'Khoá',
//                    1 => 'Mở',
//                ], 'group_class' => 'col-md-4'],
                ['name' => 'chu_tk', 'type' => 'text', 'class' => '', 'label' => 'Chủ tk ngân hàng', 'group_class' => 'col-md-4'],

                ['name' => 'ngan_hang', 'type' => 'text', 'class' => '', 'label' => 'Ngân hàng', 'group_class' => 'col-md-4'],
                ['name' => 'stk', 'type' => 'text', 'class' => '', 'label' => 'STK', 'group_class' => 'col-md-4'],
//                ['name' => 'parent_id', 'type' => 'select2_ajax_model', 'group_class' => 'col-md-4', 'label' => 'Cấp cha trực tiếp', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'tel'],
                ['name' => 'vi_tien', 'type' => 'number', 'class' => 'required', 'label' => 'Số dư ví', 'group_class' => 'col-md-4'],

//                ['name' => 'invite_total', 'type' => 'number', 'class' => '', 'group_class' => 'col-md-6', 'label' => 'Tổng số người mình giới thiệu được'],

            ],
            'more_info_tab' => [
                ['name' => 'image', 'type' => 'file_editor', 'label' => 'Ảnh đại diện'],
                ['name' => 'facebook', 'type' => 'text', 'class' => '', 'label' => 'facebook'],

                ['name' => 'skype', 'type' => 'text', 'class' => '', 'label' => 'skype'],
                ['name' => 'zalo', 'type' => 'text', 'class' => '', 'label' => 'zalo'],
//                ['name' => 'invite_by', 'type' => 'select2_ajax_model', 'label' => 'Người giới thiệu', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'tel'],
//                ['name' => 'status', 'type' => 'checkbox', 'options' => [
//                    '0' => '0',
//                    '1' => 'Cây mới',
//                ], 'label' => 'Tạo cây mới',   'group_class' => 'col-md-6'],
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID, tên, sđt, email',
        'fields' => 'id, name, tel, email'
    ];

    protected $filter = [
//        'name' => [
//            'label' => 'admin.name',
//            'type' => 'text',
//            'query_type' => 'like'
//        ],
        'status' => [
            'label' => 'admin.status',
            'type' => 'select',
            'query_type' => '=',
            'options' => [
                '' => 'admin.status',
                0 => 'admin.hidden',
                1 => 'admin.active'
            ]
        ],
        'role_id' => [
            'label' => 'Quyền',
            'type' => 'select2_model',
            'display_field' => 'display_name',
            'object' => 'role',
            'model' => Roles::class,
            'query_type' => 'custom'
        ],
        'parent_id' => [
            'label' => 'Cha trực tiếp',
            'type' => 'select2_model',
            'display_field' => 'name',
            'object' => 'admin',
            'model' => Admin::class,
            'query_type' => '='
        ],
        'created_at' => [
            'label' => 'Thời gian tạo',
            'type' => 'from_to_date',
            'query_type' => 'from_to_date'
        ],

    ];

    /*protected $validate = [
        'request' => [
            'name' => 'required',
        ],
        'label' => [
            'name' => 'Tên',
            'email' => 'Email'
        ]
    ];*/

    /*protected $validate_add = [
        'request' => [
            'email' => 'required|email|max:255|unique:admin'
        ],
        'label' => [
            'email' => 'Email'
        ]
    ];*/
    public function getIndex(Request $request)
    {
//        dd('khôi');
        $data = $this->getDataList($request);

        return view('admin.themes.metronic1.admin.list')->with($data);
    }

    public function getIndex2(Request $request)
    {
//        dd('khôi');
        $data = $this->getDataList2($request);

        return view('admin.themes.metronic1.admin.list2')->with($data);
    }

    public function getDataList2(Request $request)
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
        if ($this->whereRaw) {
            $data['record_total'] = $this->model->whereRaw($this->whereRaw);
        } else {
            $data['record_total'] = $this->model;
        }

        $data['record_total'] = $data['record_total']->whereRaw($where)->count();

        //  Set data for seo
        $data['page_title'] = $this->module['label'];
        $data['page_type'] = 'list';
        return $data;
    }

    public function appendWhere($query, $request)
    {
        if (!is_null($request->get('role_id'))) {
            $admin_id_arr = RoleAdmin::where('role_id', $request->role_id)->pluck('admin_id')->toArray();
            $query = $query->whereIn('id', $admin_id_arr);
        }
        return $query;
    }

    public function add(Request $request)
    {
        try {

            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('admin.themes.metronic1.admin.add')->with($data);
            } else if ($_POST) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
//                    'email' => 'required|unique:admin,email',
                    'password' => 'required|min:5',
                    'password_confimation' => 'required|same:password',
                ], [
                    'name.required' => 'Bắt buộc phải nhập tên!',
//                    'email.required' => 'Bắt buộc phải nhập email!',
//                    'email.unique' => 'Địa chỉ email đã tồn tại!',
                    'password.required' => 'Bắt buộc phải nhập mật khẩu!',
                    'password.min' => 'Mật khẩu phải trên 5 ký tự!',
                    'password_confimation.required' => 'Bắt buộc nhập lại mật khẩu!',
                    'password_confimation.same' => 'Nhập lại sai mật khẩu!',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    $data['api_token'] = base64_encode(rand(1, 100) . time());

                    //  Tùy chỉnh dữ liệu insert

//                    $data['role_id']=1;
                    unset($data['password_confimation']);
                    unset($data['role_id']);
                    $data['password'] = bcrypt($request->password);

                    $data['district_id'] = $request->get('district_id', null);
                    $data['ward_id'] = $request->get('ward_id', null);
                    if ($request->company_id == 1) {
                        $companyCount = Admin::distinct('company_id')->count('company_id');
                        $data['company_id'] = $companyCount + 1;
                    }
//                    $data['company_id'] = $request->company_id;

                    #
                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
                        $check = RoleAdmin::where('admin_id', $this->model->id)->count();
                        if($check>0){
                            // Lấy tất cả các bản ghi của admin_id theo thứ tự từ cũ nhất tới mới nhất
                            $roles = RoleAdmin::where('admin_id',$this->model->id)->get();
                            // Xóa tất cả các bản ghi ngoại trừ bản ghi cuối cùng
                            RoleAdmin::where('admin_id', $this->model->id)
                                ->delete();
                        }
                        RoleAdmin::create([
                            'admin_id' => $this->model->id,
                            'role_id' => $request->role_id,
                        ]);
                        CommonHelper::flushCache($this->module['table_name']);
                        CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                        return redirect('/admin/admin');
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
                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit/' . $this->model->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
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

            if (!is_object($item)) {
                abort(404);
            }
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);
                $id = $data['result']['id'];
                return view('admin.themes.metronic1.admin.edit', compact('id'))->with($data);
            } else if ($_POST) {
                if ($item->id == \Auth::guard('admin')->user()->id) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'tel' => [
                            'required',
                            Rule::unique('admin')->where(function ($query) {
                                return $query->whereNull('deleted_at');
                            })->ignore($request->id), // Bỏ qua kiểm tra unique cho giá trị hiện tại
                            'regex:/^\d{10,11}$/', // Chấp nhận số điện thoại 10 hoặc 11 chữ số
                        ],

                        'email' => [
                            'required',
                            'email', // Xác thực email đúng định dạng
                            Rule::unique('admin')->where(function ($query) {
                                return $query->whereNull('deleted_at');
                            })->ignore($request->id), // Bỏ qua kiểm tra unique cho giá trị hiện tại
                        ],
                    ], [
                        'name.required' => 'Bắt buộc phải nhập tên',
                    ]);

                    if ($validator->fails()) {
                        return back()->withErrors($validator)->withInput();
                    }
                }
                $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                //  Tùy chỉnh dữ liệu edit

                if ($request->password != null) {
                    if ($request->password != $request->password_confimation) {
                        CommonHelper::one_time_message('error', 'Mật khẩu không khớp');
                        return redirect()->back()->withInput();
                    }

                    $data['password'] = bcrypt($request->password);
                } else {
                    unset($data['password']);
                }
                unset($data['role_id']);
                unset($data['password_confimation']);

                $data['district_id'] = $request->get('district_id', null);
                $data['ward_id'] = $request->get('ward_id', null);
                #
                foreach ($data as $k => $v) {
                    $item->$k = $v;
                }
//                dd($item->id);
                if ($item->save()) {
                    //đém xem có nhiều hơn 1 rolwadmin thì xóa bỏ hết
                    $check = RoleAdmin::where('admin_id', $item->id)->count();
                    if($check>1){
                        // Lấy tất cả các bản ghi của admin_id theo thứ tự từ cũ nhất tới mới nhất
                        $roles = RoleAdmin::where('admin_id', $item->id)->orderBy('id', 'asc')->get();

                        // Lấy ID của bản ghi cuối cùng
                        $lastRoleId = $roles->last()->id;

                        // Xóa tất cả các bản ghi ngoại trừ bản ghi cuối cùng
                        RoleAdmin::where('admin_id', $item->id)
                            ->where('id', '!=', $lastRoleId)
                            ->delete();
                    }
                    RoleAdmin::updateOrCreate([
                        'admin_id' => $item->id,
//                        'company_id' => \Auth::guard('admin')->user()->company_id
                    ],
                        [
                            'role_id' => $request->role_id,
                            'status' => 1
                        ]);
                    CommonHelper::flushCache($this->module['table_name']);
                    CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                } else {
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
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', $ex->getMessage());
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return redirect()->back()->withInput();
        }
    }

    public function validator(array $data)
    {
        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:50',
        );

        $fieldNames = array(
            'name' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
        );

        $validator = Validator::make($data, $rules);
        $validator->setAttributeNames($fieldNames);
        return $validator;
    }

    public function profile(Request $request)
    {
        if (!$_POST) {
            $data['result'] = \Auth::guard('admin')->user();
            $data['user'] = \Auth::guard('admin')->user();
            $data['provinces'] = Province::all();
            $data['districts'] = District::all();
            $data['wards'] = Ward::all();
            $data['module'] = $this->module;
            $data['page_title'] = 'Chỉnh sửa ' . trans($this->module['label']);
            $data['page_type'] = 'update';
            return view(config('core.admin_theme') . '.admin.profile', $data);
        } else if ($_POST) {
            try {

                $item = \Auth::guard('admin')->user();
                $admin = Admin::find($item->id);
                if ($item->id == \Auth::guard('admin')->user()->id) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required',
//                        'tel' => 'required',
//                        'ngan_hang' => 'required',
//                        'stk' => 'required',
//                        'pin' => 'required',
                    ], [
                        'name.required' => 'Bắt buộc phải nhập tên',
                        'address.required' => 'Bắt buộc phải nhập địa chỉ nhận hàng',
                        'ngan_hang.required' => 'Bắt buộc phải nhập SĐT',
                        'stk.required' => 'Bắt buộc phải nhập SĐT',
                        'pin.required' => 'Bắt buộc phải nhập SĐT',
                        // 'email.email' => 'Vui lòng nhập email',
                    ]);

                    if ($validator->fails()) {
                        return back()->withErrors($validator)->withInput();
                    }
                }

//                $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                if ($request->file('image') != null) {
                    $admin->image = CommonHelper::saveFile($request->file('image'), $this->module['code']);
                }
//                dd($request->all());
                //  Tùy chỉnh dữ liệu insert
//                unset($data['status']);
//                unset($data['role_id']);
//                unset($data['password']);
//                unset($data['password_confimation']);

                if (Admin::where('id', '!=', $item->id)->where('tel', $request->tel)->count() > 0) {
                    CommonHelper::one_time_message('error', 'SĐT này đã được sử dụng!');
                    return back();
                }

                $admin->name = $request->name;
                $admin->province_id = $request->province_id;
                $admin->district_id = $request->district_id;
                $admin->ward_id = $request->ward_id;
                $admin->address = $request->address;
                $admin->ngan_hang = $request->ngan_hang;
                $admin->stk = $request->stk;
//                $admin->pin = $request->pin;
                $admin->intro = $request->intro;
//                $admin->save();
//             dd('khôi');
//                foreach ($data as $k => $v) {
//                    $item->$k = $v;
//                }
//                dd($data);
                if ($admin->save()) {
                    CommonHelper::flushCache($this->module['table_name']);
                    CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                } else {
                    CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                }

                return back();
            } catch (\Exception $ex) {
//                CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
                CommonHelper::one_time_message('error', $ex->getMessage());
                return redirect()->back()->withInput();
            }
        }
    }

    public function profileAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        if (!$_POST) {
            $data['result'] = $admin;
            $data['module'] = $this->module;
            $data['page_title'] = 'Chỉnh sửa ' . $this->module['label'];
            $data['page_type'] = 'update';
            $data['id_user'] = $id;
            return view(config('core.admin_theme') . '.admin.profile', $data);
        } else {
            if (CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'admin_edit')) {
                RoleAdmin::updateOrCreate([
                    'admin_id' => $id,
                ], [
                    'role_id' => $request->role_id,
                    'status' => $request->status
                ]);
                $admin->status = $request->status;
                $admin->save();
            }
            CommonHelper::flushCache($this->module['table_name']);
            CommonHelper::one_time_message('success', 'Cập nhật thành công!');
            return back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $item = $this->model->find($request->id);

            $item->delete();
            CommonHelper::flushCache($this->module['table_name']);
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
            CommonHelper::flushCache($this->module['table_name']);
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

    public function resetPassword(Request $request, $id)
    {
        if (!$_POST) {
            $data['result'] = Admin::find($id);
            $data['module'] = $this->module;
            $data['page_title'] = 'Reset password' . trans($this->module['label']);
            $data['page_type'] = 'Reset password';
            $data['id_user'] = $id;
            return view(config('core.admin_theme') . '.admin.reset_password', $data);
        } elseif ($_POST) {
            $user = Admin::find($id);

            $user->password = bcrypt($request->reset_pass);
            $user->password_md5 = md5($request->reset_pass, true);
            $user->save();
            CommonHelper::one_time_message('success', 'Reset password thành công!');
            CommonHelper::flushCache($this->module['table_name']);
            return redirect()->back();
        }
    }

    public function changePassword(Request $request)
    {
        if (!$_POST) {
            $data['result'] = \Auth::guard('admin')->user();
            $data['module'] = [
                'code' => 'profile',
                'label' => 'profile',
            ];
            $data['page_title'] = 'Đổi mật khẩu';
            $data['page_type'] = 'update';
            return view(config('core.admin_theme') . '.admin.change_password', $data);
        } else if ($_POST) {

            $validator = Validator::make($request->all(), [
                'password_current' => 'required|max:20',
                'password' => 'required|max:20|min:5',
                're_password' => 'required|max:20|min:5|same:password',
            ], [
                'password_current.required' => 'Bắt buộc phải nhập mật khẩu hiện tại!',
                'password_current.max' => 'Mật khẩu hiện tại tối đa 20 ký tự!',

                'password.required' => 'Bắt buộc phải nhập mật khẩu!',
                'password.min' => 'Mật khẩu phải trên 5 ký tự!',
                'password.max' => 'Mật khẩu tối đa 20 ký tự!',

                're_password.same' => 'Nhập lại sai mật khẩu!',
                're_password.max' => 'Mật khẩu nhập lại tối đa 20 kí tự',
                're_password.min' => 'Mật khẩu nhập lại phải trên 5 ký tự!',
                're_password.required' => 'Bắt buộc phải nhập lại mật khẩu!',
            ]);

            if (!Hash::check(trim($request->password_current), \Auth::guard('admin')->user()->password)) {
                CommonHelper::one_time_message('error', 'Mật khẩu không đúng!');
                return back();
            }

            if (\Auth::guard('admin')->attempt(['tel' => \Auth::guard('admin')->user()->tel, 'password' => trim($request->password)])) {
                CommonHelper::one_time_message('error', 'Mật khẩu mới phải khác mật khẩu hiện tại!');
                return back();
            }
            
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {

//                if ($request->password != $request->re_password) {
//                    CommonHelper::one_time_message('error', 'Nhập lại mật khẩu không khớp!');
//                    return back();
//                }
                \Auth::guard('admin')->user()->password = bcrypt($request->password);
                \Auth::guard('admin')->user()->password_md5 = md5($request->password, true);
                \Auth::guard('admin')->user()->save();
                CommonHelper::flushCache($this->module['table_name']);
                CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                return back();
            }
        }
    }

    /*public function searchForSelect2(Request $request)
    {
        $data = $this->model->select([$request->col, 'id'])->where($request->col, 'like', '%' . $request->keyword . '%');
        if ($request->where != '') {
            $data = $data->whereRaw(urldecode(str_replace('&#039;', "'", $request->where)));
        }

        $data = $data->limit(5)->get();
        return response()->json([
            'status' => true,
            'items' => $data
        ]);
    }*/

    /**
     * Tối đa import được 999 dòng
     */
    public function importExcel(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'module' => 'required',
        ], [
            'module.required' => 'Bắt buộc phải nhập module!',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $importController = new ImportController();
            $data = $this->processingValueInFields($r, $importController->getAllFormFiled());
            //  Tùy chỉnh dữ liệu insert

            if ($r->has('file')) {
                $file_name = $r->file('file')->getClientOriginalName();
                $file_name = str_replace(' ', '', $file_name);
                $file_name_insert = date('s_i_') . $file_name;
                $r->file('file')->move(base_path() . '/public/filemanager/userfiles/imports/', $file_name_insert);
                $data['file'] = 'imports/' . $file_name_insert;
            }

            unset($data['field_options_key']);
            unset($data['field_options_value']);
            #
            $importModel = new Import();
            foreach ($data as $k => $v) {
                $importModel->$k = $v;
            }

            if ($importModel->save()) {
                //  Import dữ liệu vào
                $this->updateAttributes($r, $importModel);
                $this->processingImport($r, $importModel);

                CommonHelper::flushCache($this->module['table_name']);
                CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                return redirect('/admin/import');
            } else {
                CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
            }

            if ($r->ajax()) {
                return response()->json([
                    'status' => true,
                    'msg' => '',
                    'data' => $importModel
                ]);
            }

            return redirect('/admin/import');
        }
    }

    public function processingImport($r, $item)
    {
        $record_total = $record_success = 0;
        $dataInsertFix = Attribute::where('table', $this->module['table_name'])->where('type', 'field_options')->where('item_id', @$item->id)->pluck('value', 'key')->toArray();
        \Excel::load('public/filemanager/userfiles/' . $item->file, function ($reader) use ($r, $dataInsertFix, &$model, &$record_total, &$record_success) {
            $reader->each(function ($sheet) use ($r, $reader, $dataInsertFix, &$model, &$record_total, &$record_success) {
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
    public function importItem($row, $request, $dataInsertFix)
    {
        try {
            //  Kiểm tra trường dữ liêu bắt buộc có
            $fields_require = ['tel'];
            foreach ($fields_require as $field_require) {
                if (!isset($row->{$field_require}) || $row->{$field_require} == null) {
                    return false;
                }
            }

            //  Các trường không được trùng
            $item_model = new $this->module['modal'];
            $item = $item_model->where('tel', $row->all()['tel'])->first();
            if (!is_object($item)) {
                $item = $item_model;
            }

            /*if ($this->import[$request->module]['unique']) {
                $field_name = $this->import[$request->module]['fields'][$this->import[$request->module]['unique']];
                $model_new = new $this->import[$request->module]['modal'];
                $model = $model_new->where($field_name, $row->{$this->import[$request->module]['unique']})->first();
            }*/

            //  Gán các dữ liệu được fix cứng từ view
            foreach ($dataInsertFix as $k => $v) {
                $item->{$k} = $v;
            }

            $item->save();

            //  Chèn các dữ liệu lấy vào từ excel
            foreach ($row->all() as $key => $value) {
                switch ($key) {
                    case 'role':
                    {
                        $role = Roles::where('display_name', $value)->select('id')->first();
                        if (is_object($role)) {
                            RoleAdmin::updateOrCreate([
                                'admin_id' => $item->id,
                            ], [
                                'role_id' => $role->id,
                                'status' => 1
                            ]);
                        }
                        break;
                    }
                    case 'password':
                    {
                        $item->password = bcrypt($value);
                        break;
                    }
                    default:
                    {
                        if (\Schema::hasColumn($item->getTable(), $key)) {
                            $item->{$key} = $value;
                        }
                    }
                }
            }
            if ($item->save()) {

                return [
                    'status' => true,
                    'import' => true
                ];
            }
        } catch (\Exception $ex) {
            return [
                'status' => true,
                'import' => false,
                'msg' => $ex->getMessage()
            ];
        }
    }

    public function updateAttributes($request, $item)
    {
        try {
            if ($request->has('field_options_key')) {
                $key_update = [];
                foreach ($request->field_options_key as $k => $key) {
                    if ($key != null && $request->field_options_value[$k] != null) {
                        $key_update[] = $key;
                        Attribute::updateOrCreate([
                            'key' => $key,
                            'table' => $this->module['table_name'],
                            'type' => 'field_options',
                            'item_id' => $item->id
                        ], [
                            'value' => $request->field_options_value[$k]
                        ]);
                    }
                }
                if (!empty($key_update)) {
                    Attribute::where([
                        'table' => $this->module['table_name'],
                        'type' => 'field_options',
                        'item_id' => $item->id
                    ])->whereNotIn('key', $key_update)->delete();
                }
            } else {
                Attribute::where([
                    'table' => $this->module['table_name'],
                    'type' => 'field_options',
                    'item_id' => $item->id
                ])->delete();
            }
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function loginToAccount($id)
    {
        $admin = Admin::find($id);
        \Auth::guard('admin')->logout();
        \Auth::guard('admin')->login($admin);
        CommonHelper::one_time_message('success', 'Đã đăng nhập vào tài khoản ' . $admin->name);
        return redirect('/admin');
    }
}



