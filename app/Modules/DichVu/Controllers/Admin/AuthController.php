<?php

namespace App\Modules\DichVu\Controllers\Admin;

use App\Mail\ForgotPassword;
use App\Modules\DichVu\Models\PasswordReset;
use App\Modules\DichVu\Models\Provinces;
use App\Modules\HuongNghiep\Controllers\Admin\Controller;
use App\Modules\DichVu\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Str;
use Validator;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('Hong.Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $result = \Illuminate\Support\Facades\Auth::attempt($credentials);
        if ($result) {
            return redirect('huongnghiep/home');
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function registerForm()
    {
        $city = Provinces::get();
        return view('Hong.Auth.register', compact('city'));
    }
    public function validateEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user !== null) {
            // Nếu tìm thấy người dùng với email này, trả về phản hồi với success là true
            return response()->json(['success' => true], 200);
        } else {
            // Nếu không tìm thấy người dùng với email này, trả về phản hồi với success là false
            return response()->json(['success' => false], 200);
        }
    }

    public function register(Request $request)
    {
//        dd($request);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
//            'password1' => $request->password,
            'year' => $request->year,
            'address' => $request->address,
            'class' => $request->class,
            'class2' => $request->class2,
            'gender' => $request->gender
        ]);
        Auth::login($user);
        return redirect('huongnghiep/home');
    }
    public function profileForm()
    {
        $user = Auth::user();

//        dd($user);
        $city = Provinces::get();
        return view('Hong.Auth.profile', compact('user', 'city'));
    }

    public function profile(Request $request)
    {

        $user = Auth::user();

        $user = User::where('id', $user->id)->update([
            'name' => $request->name,

            'year' => $request->year,
            'address' => $request->address,
            'class' => $request->class,
            'class2' => $request->class2,
            'gender' => $request->gender,
            'phone' => $request->phone
        ]);
        return redirect()->back();
    }

    public function delete()
    {
        $user = Auth::user();
        $deleted = User::where('id', $user->id)->delete();
        if ($deleted) {

            return redirect()->route('login.form');
        } else {
            // Nếu không xóa được, hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Xóa người dùng không thành công.');
        }
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->password_old, $user->password)) {
            return redirect()->back()->with('error1', 'Mật khẩu hiện tại không khớp');
        }
//        $data = User::where('id', $user->id)->where('password1', $request->password_old)->first();
//        if ($data == null) {
//            return redirect()->back()->with('error1','Mật khẩu hiện tại không khớp');
//        }

        User::where('id', $user->id)->update([
            'password' => bcrypt($request->new_password),
//            'password1' => $request->new_password
        ]);
        return redirect()->back();
    }

//    public function validatePassword(Request $request)
//    {
//        $user = Auth::user();
//        $data = User::where('id', $user->id)->where('password1', $request->password_old)->first();
//        if ($data !== null) {
//
//            return response()->json(['success' => false], 200);
//        } else {
//
//            return response()->json(['success' => true], 200);
//        }
//    }

    public function checkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user !== null) {
            $token = Str::random(50);

            $tokenData = [
                'token' => $token,
                'email' => $request->email
            ];

            PasswordReset::create($tokenData);

            Mail::to($request->email)->send(new ForgotPassword($user, $token));
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 200);
        }
    }

    public function resetPasswordform($token)
    {
        return view('Hong.Auth.reset_password', compact('token'));
    }
    public function resetPassword(Request $request)
    {

        $tokenData = PasswordReset::where('token', $request->token)->first();
        if (!$tokenData) {
            return redirect()->back()->with(['error' => 'Đã hết thời gian']);
        }
        $user = $tokenData->user;  // hàm ->user ở trong Model

        $data = [
            'password' => bcrypt($request->new_password)
        ];
        $check = $user->update($data);
        PasswordReset::where('email', $tokenData->email)->delete();

        if ($check) {
            return redirect()->route('login.form');
        }

    }

}
