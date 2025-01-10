<?php

namespace App\Modules\Affiliate\Controllers\Admin;

use App\Http\Controllers\Admin\CURDBaseController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Helpers\CommonHelper;

use App;
use App\Models\{Admin, Attribute, Import, RoleAdmin, Setting, Roles, User};
use Auth;
use App\Modules\Affiliate\Models\Districts;
use App\Modules\Affiliate\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mail;
use Session;
use Validator;
use function App\Http\Controllers\Admin\abort;
//use function App\Http\Controllers\Admin\back;
use function App\Http\Controllers\Admin\base_path;
//use function App\Http\Controllers\Admin\bcrypt;
////use function App\Http\Controllers\Admin\redirect;
//use function App\Http\Controllers\Admin\response;
use function App\Http\Controllers\Admin\trans;
use function App\Http\Controllers\Admin\view;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
//use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

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
        'label' => 'Danh sách thành viên được mình giới thiệu',
        'table_name' => 'admin',
        'modal' => '\App\Models\Admin',
        'list' => [
            ['name' => 'image', 'type' => 'image', 'label' => 'admin.image'],
            ['name' => 'name', 'type' => 'text_admin_edit', 'label' => 'admin.name', 'sort' => true],
            ['name' => 'role_id', 'type' => 'role_name', 'label' => 'admin.permission'],
            ['name' => 'tel', 'type' => 'text', 'label' => 'admin.phone', 'sort' => true],
            ['name' => 'email', 'type' => 'text', 'label' => 'admin.email', 'sort' => true],
            ['name' => 'id', 'type' => 'count_log', 'label' => 'Số thao tác', 'sort' => true],
            ['name' => 'status', 'type' => 'status', 'label' => 'admin.status', 'sort' => true],
//            ['name' => 'status', 'type' => 'status', 'label' => 'admin.status', 'sort' => true],
//            ['name' => 'updated_at', 'type' => 'text', 'label' => 'admin.update']
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'admin.full_name', 'group_class' => 'col-md-6'],
                ['name' => 'short_name', 'type' => 'text', 'class' => '', 'label' => 'Tên ngắn gọn', 'group_class' => 'col-md-6'],
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
            'more_info_tab' => [
                ['name' => 'image', 'type' => 'file_editor', 'label' => 'Ảnh đại diện'],
                ['name' => 'facebook', 'type' => 'text', 'class' => '', 'label' => 'facebook'],
                ['name' => 'skype', 'type' => 'text', 'class' => '', 'label' => 'skype'],
                ['name' => 'zalo', 'type' => 'text', 'class' => '', 'label' => 'zalo'],
                ['name' => 'invite_by', 'type' => 'select2_ajax_model', 'label' => 'Người giới thiệu', 'model' => Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'tel'],
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID, tên, sđt, email',
        'fields' => 'id, name, tel, email'
    ];

    protected $filter = [
        'name' => [
            'label' => 'admin.name',
            'type' => 'text',
            'query_type' => 'like'
        ],
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
        'created_at' => [
            'label' => 'Thời gian tạo',
            'type' => 'from_to_date',
            'query_type' => 'from_to_date'
        ],

    ];


    public function login(Request $request)
    {
        $data['page_title'] = 'Đăng nhập';
        $data['page_type'] = 'list';
        return \view(config('core.admin_theme') . '.auth.login');
    }
    public function forgetPassword(Request $request)
    {

        if (!$_POST) {
            $data['page_title'] = 'Quên mật khẩu';
            $data['page_type'] = 'list';
            return \view('Affiliate.admin.quen-mat-khau', $data);
        }

        $validator = Validator::make($request->all(), [
            'tel' => [
                'required',
                'exists:admin',
                'regex:/^\d{10}|\d{11}$/'
            ],
            'stk' => 'required',
            'pin' => 'required',
//            'email' => 'required|unique:admin,email',
            'password' => 'required|min:4',
            'password_confimation' => 'required|same:password',
//            'tel' => 'required|unique:admin,tel',
        ], [
//            'ngan_hang.required' => 'Bắt buộc phải nhập ngân hàng nhận tiền' ,
            'stk.required' => 'Bắt buộc phải nhập số tài khoản' ,
            'pin.required' => 'Bắt buộc phải nhập mật khẩu rút tiền' ,
            'tel.required' => 'Bắt buộc phải nhập số điện thoại' ,
            'address.required' => 'Bắt buộc phải nhập địa chỉ nhận hàng' ,
            'tel.regex' => 'Số điện thoại phải có 10 hoặc 11 số',
            'tel.exists' => 'Số điện thoại chưa được sử dụng' ,
//            'email.required' => 'Bắt buộc phải nhập email!',
//            'email.unique' => 'Địa chỉ email đã tồn tại!',
            'password.required' => 'Bắt buộc phải nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải trên 4 ký tự!',
            'password_confimation.required' => 'Bắt buộc nhập lại mật khẩu!',
            'password_confimation.same' => 'Nhập lại sai mật khẩu!',
//            'tel.required' => 'Bắt buộc nhập số điện thoại!',
//            'tel.unique' => 'Số điện thoại đã tồn tại!',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $data = $request->except('_token');
//            dd($data['password']);
            $hashedPassword = \bcrypt($data['password']);
            $data['password'] = $data['password_md5'] = \bcrypt($data['password']);
            $data['api_token'] = base64_encode(rand(1, 100) . time());
            if (isset($data['status'])) {
                unset($data['status']);
            }
            unset($data['password_confimation']);
            unset($data['agree']);

            $admin = Admin::where('tel',  $data['tel'])
                ->where('stk', $data['stk'])
                ->where('pin', $data['pin'])->first();
//dd($admin);
            if ($admin) {
                // Cập nhật mật khẩu mới
                $admin->update([
                    'password'=>$hashedPassword,
                    'password_md5'=>$hashedPassword,
                ]);
                return redirect('/admin/login')->with('success', 'Mật khẩu của bạn đã được cập nhật thành công!');
            }

            return back()->with('error', 'Thông tin sai. Vui lòng thử lại.');
        }
    }
    public function authenticate(Request $request)
    {
//        dd('k');
//        $admin = Admin::where('email', $request['email'])->orWhere('tel', $request['email'])->first();
            $admins = Admin::where(function($query) use ($request){
                $query->where('email', $request['email'])
                    ->orWhere('tel', $request['email']);
            })
                ->whereNull('deleted_at')
                ->get();
        if ($admins->isEmpty()) {
            CommonHelper::one_time_message('danger', 'Vui lòng kiểm tra lại tên đăng nhập của bạn');
            return redirect('admin/login');
        }

        $admin = $admins->first(function($admin) use ($request) {
            return \Hash::check(trim($request['password']), $admin->password);
        });

        if (!$admin) {
            CommonHelper::one_time_message('danger', 'Sai mật khẩu!');
            return redirect('admin/login');
        }

        if ($admin->status == 0) {
            CommonHelper::one_time_message('danger', 'Tài khoản của bạn chưa được kích hoạt!');
            return redirect('admin/login');
        }

        if ($admin->status == -1) {
            CommonHelper::one_time_message('danger', 'Tài khoản của bạn đã bị khóa!');
            return redirect('admin/login');
        }

        \Auth::guard('admin')->login($admin, true);
        return redirect()->intended('admin/profile');

        //code cũ
//            dd($admin);
        if (!is_object($admin)) {
            CommonHelper::one_time_message('danger', 'Vui lòng kiểm tra lại tên đăng nhập của bạn');
            return redirect('admin/login');
        }

        if (@$admin->status == 0) {
            CommonHelper::one_time_message('danger', 'Tài khoản của bạn chưa được kích hoạt!');
//            $this->hasTooManyLoginAttempts($request);
            return redirect('admin/login');
        }

        if (@$admin->status == -1) {
            CommonHelper::one_time_message('danger', 'Tài khoản của bạn đã bị khóa!');
//            $this->hasTooManyLoginAttempts($request);
            return redirect('admin/login');
        }

        if (\Auth::guard('admin')->attempt(['email' => trim($request['email']), 'password' => trim($request['password'])], true)) {
            return redirect()->intended('admin/profile');
        } elseif (\Auth::guard('admin')->attempt(['tel' => trim($request['email']), 'password' => trim($request['password'])], true)) {
            return redirect()->intended('admin/profile');
        } else {
            if(!$request['email'] || !$request['password']){
                CommonHelper::one_time_message('danger', 'Điền đầy đủ thông tin đăng nhập');
                return redirect('admin/login');
            }
//            $this->attemptLogin5Shot($request['tel']);
            CommonHelper::one_time_message('danger', 'Sai mật khẩu!');
            return redirect('admin/login');
        }
    }
    public function attemptLogin5Shot($email)
    {
        session_start();
        if (!isset($_SESSION['limitLoginFalse1'])) {
            $product_viewed = [$email];
        } else {
            $product_viewed = $_SESSION['limitLoginFalse1'];
            $product_viewed[] = $email;
        }
        $_SESSION['limitLoginFalse1'] = $product_viewed;
        if (isset($_SESSION['limitLoginFalse1'])) {
            $str = implode('|',$_SESSION['limitLoginFalse1']);
            $str_sub = substr_count($str, $email);
            $admi = Admin::where('email',$email)->first();
            if ($str_sub>5 && !empty($admi)){
                $admi->status = 0;
                $admi->save();
            }
        }
    }
    public function register(Request $request)
    {

        $settings = @Setting::select(['name', 'value'])->where('type', 'role_tab')->pluck('value', 'name')->toArray();

        if (!$_POST) {
            if (@$settings['allow_admin_account_registration'] != 1) {
                return redirect('/admin/login');
            }

            $data['provinces'] = App\Models\Province::all();
            $data['districts'] = districts::all();





            $data['page_title'] = 'Đăng ký tài khoản';
            $data['page_type'] = 'list';

            return \view('Affiliate.admin.register', $data);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'invite_by' => 'required|exists:admin,id',
//            'ngan_hang' => 'required',
//            'tel' => 'required|unique:admin',
            'tel' => [
                'required',
                Rule::unique('admin')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
                'regex:/^\d{10}|\d{11}$/'
            ],
            'stk' => 'required',
//            'address' => 'required',
            'pin' => 'required',
//            'email' => 'required|unique:admin,email',
            'password' => 'required|min:4',
            'password_confimation' => 'required|same:password',
//            'tel' => 'required|unique:admin,tel',
        ], [
            'name.required' => 'Bắt buộc phải nhập tên!',
            'invite_by.required' => 'Bắt buộc phải nhập mã người giới thiệu' ,
            'invite_by.exists' => 'Mã giới thiệu này không tồn tại' ,
//            'ngan_hang.required' => 'Bắt buộc phải nhập ngân hàng nhận tiền' ,
            'stk.required' => 'Bắt buộc phải nhập số tài khoản' ,
            'pin.required' => 'Bắt buộc phải nhập mã pin rút tiền' ,
            'tel.required' => 'Bắt buộc phải nhập số điện thoại' ,
//            'address.required' => 'Bắt buộc phải nhập địa chỉ nhận hàng' ,
            'tel.regex' => 'Số điện thoại phải có 10 hoặc 11 số',
            'tel.unique' => 'Số điện thoại đã được sử dụng' ,
//            'email.required' => 'Bắt buộc phải nhập email!',
//            'email.unique' => 'Địa chỉ email đã tồn tại!',
            'password.required' => 'Bắt buộc phải nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải trên 4 ký tự!',
            'password_confimation.required' => 'Bắt buộc nhập lại mật khẩu!',
            'password_confimation.same' => 'Nhập lại sai mật khẩu!',
//            'tel.required' => 'Bắt buộc nhập số điện thoại!',
//            'tel.unique' => 'Số điện thoại đã tồn tại!',
        ]);
//        dd('khôi');

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            //lấy ra tk cha
            $compa = Admin::where('id', $request->invite_by)->first();
            // lấy company_id của cha;
            $copanyId = $compa->company_id;
            $data = $request->only([
                'name', 'tel', 'password', 'address', 'pin','email',
                'province_id', 'district_id', 'ward_id',
                'ngan_hang', 'stk', 'invite_by', 'front_cccd','back_cccd'
            ]);
//            $data = $request->except('_token');
            $data['password'] = $data['password_md5'] = \bcrypt($data['password']);
            $data['api_token'] = base64_encode(rand(1, 100) . time());
            $data['company_id']= $copanyId;

            if (isset($data['status'])) {
                unset($data['status']);
            }
            unset($data['zarsrc']);
            unset($data['utm_source']);
            unset($data['utm_medium']);
            unset($data['password_confimation']);
            unset($data['agree']);
//            dd('tới');
            if ($request->has('front_cccd')) {
                $avatar = $request->file('front_cccd');
//                dd($avatar->getClientOriginalExtension());
                // Kiểm tra xem tệp tải lên có phải là ảnh không
                if (!$avatar->isValid() || !in_array($avatar->extension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                    CommonHelper::one_time_message('Lỗi', 'Loại tệp không hợp lệ. Chỉ cho phép JPG, JPEG, PNG và GIF.');
                    return redirect()->back()->withInput();
//                    return response()->json(['error' => 'Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.'], 400);
                }
                // Đặt đường dẫn lưu trữ tệp vào thư mục public_html.TestIQ
                $destinationPath = public_path('filemanager/userfiles');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatarPath = $destinationPath . '/' . $avatarName;
//                dd($avatarName, $avatarPath);

                try {
                    $avatar->move($destinationPath, $avatarName);
                    $data['front_cccd']=$avatarName;
//                    dd('lưu');
                } catch (\Exception $e) {
                    dd('Lỗi');
                }
            }
            if ($request->has('back_cccd')) {
                $avatar = $request->file('back_cccd');
//                dd($avatar->getClientOriginalExtension());
                // Kiểm tra xem tệp tải lên có phải là ảnh không
                if (!$avatar->isValid() || !in_array($avatar->extension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                    CommonHelper::one_time_message('Lỗi', 'Loại tệp không hợp lệ. Chỉ cho phép JPG, JPEG, PNG và GIF.');
                    return redirect()->back()->withInput();
//                    return response()->json(['error' => 'Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.'], 400);
                }
                // Đặt đường dẫn lưu trữ tệp vào thư mục public_html.TestIQ
                $destinationPath = public_path('filemanager/userfiles');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatarPath = $destinationPath . '/' . $avatarName;
//                dd($avatarName, $avatarPath);

                try {
                    $avatar->move($destinationPath, $avatarName);
                    $data['back_cccd']=$avatarName;
//                    dd('lưu');
                } catch (\Exception $e) {
                    dd('Lỗi');
                }
            }
            $admin = new Admin;

            foreach ($data as $k => $v) {
                $admin->{$k} = $v;
            }

            $admin->save();

            $this->setDefaultRoleToAdmin($admin, $settings['role_default_id']);

            //  Gọi đến các sự kiện sau khi đăng ký tài khoản
            try {
                \Eventy::action('admin.register', [
                    'email' => @$admin->email,
                    'password' => @$request->password,
                    'name' => @$admin->name,
                    'id' => @$admin->id
                ]);
            } catch (\Exception $ex) {
            }
            return redirect('/admin/login')->with('success', 'Bạn đã đăng kí tài khoản thành công!');
        }
    }

    //  Tìm cha cho tài khoản mới

    public function getDistricts($provinceId)
    {
        $districts = Districts::where('province_id', $provinceId)->get();
        return Response()->json(['districts' => $districts]);
    }

    public function getWards($districtId)
    {
        $wards = Wards::where('district_id', $districtId)->get();
        return Response()->json(['wards' => $wards]);
    }


    public function setDefaultRoleToAdmin($admin, $role_id = false)
    {
        if (!$role_id) {
            $settings = @Setting::select(['name', 'value'])->where('type', 'role_tab')->pluck('value', 'name')->toArray();
            $role_id = $settings['role_default_id'];
        }

        //  Set quyền mặc định khi mới đăng ký tài khoản
        if (isset($role_id)) {
            RoleAdmin::insert([
                'admin_id' => $admin->id,
                'role_id' => $role_id,
            ]);
        }
        return true;
    }

    public function getIndex(Request $request)
    {
//        dd('khôi');
        $data = $this->getDataList($request);
//        dd('khôi');

        return view('Affiliate.admin.danh-sach-gioi-thieu')->with($data);
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

                    #
                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
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
    public function blockAdmin()
    {
        $admin = \Auth::guard('admin')->user();
        //ấy ra đơn hàng cuối cùng để so sán với 30 ngày, nếu
        $now = \Carbon\Carbon::now();
        $last_bill = @\Auth::guard('admin')->user()->bill()->orderBy('created_at', 'desc')->first()->created_at;
//                        dd($last_bill);
        $so_ngay_con_lai = 30 - (($last_bill->diffInDays($now))%30);
        if($so_ngay_con_lai < 0){
            $admin->update(['vi_tien_status'=>0]);
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
                return view('admin.themes.metronic1.admin.edit')->with($data);
            } else if ($_POST) {
//                dd('2');
                if ($item->id == \Auth::guard('admin')->user()->id) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required'
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
                if ($item->save()) {
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
            $data['module'] = $this->module;
            $data['page_title'] = 'Chỉnh sửa ' . trans($this->module['label']);
            $data['page_type'] = 'update';
            return view(config('core.admin_theme') . '.admin.profile', $data);
        } else if ($_POST) {
            try {
//                dd('1');
                $item = \Auth::guard('admin')->user();

                if ($item->id == \Auth::guard('admin')->user()->id) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'tel' => 'required',
                    ], [
                        'name.required' => 'Bắt buộc phải nhập tên',
                        'tel.required' => 'Bắt buộc phải nhập SĐT',
                        // 'email.email' => 'Vui lòng nhập email',
                    ]);

                    if ($validator->fails()) {
                        return back()->withErrors($validator)->withInput();
                    }
                }

                $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                if ($request->file('image') != null) {
                    $data['image'] = CommonHelper::saveFile($request->file('image'), $this->module['code']);
                } else {
                    unset($data['image']);
                }

                //  Tùy chỉnh dữ liệu insert
                unset($data['status']);
                unset($data['role_id']);
                unset($data['password']);
                unset($data['password_confimation']);
                
                if (Admin::where('id', '!=', $item->id)->where('tel', $data['tel'])->count() > 0) {
                    CommonHelper::one_time_message('error', 'SĐT này đã được sử dụng!');
                    return back();
                }
                #
             
                foreach ($data as $k => $v) {
                    $item->$k = $v;
                }
                if ($item->save()) {
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

            dd(trim($request->password_current));
            if (Hash::check(trim($request->password_current), \Auth::guard('admin')->user()->password) ) {
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

    public function loginToAccount($id) {
        $admin = Admin::find($id);
        \Auth::guard('admin')->logout();
        \Auth::guard('admin')->login($admin);
        CommonHelper::one_time_message('success', 'Đã đăng nhập vào tài khoản ' . $admin->name);
        return redirect('/admin');
    }
}



