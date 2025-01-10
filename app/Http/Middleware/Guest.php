<?php

namespace App\Http\Middleware;

use App\Http\Helpers\CommonHelper;
use Closure;
use Auth;

class Guest
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == 'student') {
            if (!Auth::guard($guard)->check()) {
                return \Redirect::guest('/')->with(['openLogin' => true]);
            }
            if (@Auth::user()->status == -1) {
                CommonHelper::one_time_message('error', 'Tài khoản của bạn bị khóa');
                return redirect()->back();
            }
        } else if ($guard == 'admin') {
            if (!Auth::guard($guard)->check()) {
                //  nếu chưa đăng nhập chuyển sang login
                return \Redirect::guest('admin/login');
            } else {
                //  nếu đăng nhập rồi kiểm tra mật khẩu lâu chưa update thì chuyển sang bắt đổi mật khẩu
                if (env('CHANGE_PASSWORD_ADMIN') == true && strpos($request->url(), '/change-password') == false && strpos($request->url(), '/logout') == false && strtotime(Auth::guard($guard)->user()->updated_at) < (time() - 30 * 24 * 60 * 60)) {
                    //  1 tháng ko đổi mật khẩu thì yêu cầu đổi mk
                    CommonHelper::one_time_message('error', 'Mật khẩu quá cũ. Yêu cầu đổi mật khẩu');
                    return redirect('/admin/profile/change-password');
                }
            }
        }
        return $next($request);
    }
}
