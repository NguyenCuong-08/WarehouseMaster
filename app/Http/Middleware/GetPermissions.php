<?php

namespace App\Http\Middleware;

use App\Http\Helpers\CommonHelper;
use Closure;

class GetPermissions
{
    
    public function handle($request, Closure $next)
    {
        $per_check = \Eventy::filter('permission.check', [
            'setting',
            'dashboard',
            'admin_view', 'admin_edit', 'admin_add', 'admin_delete',
            'role_view', 'role_add', 'role_edit', 'role_delete',
            'user_view', 'user_edit', 'user_add', 'user_delete',
            'super_admin',
            'view_all_data',
        ]);
        //  Require các quyền khai báo ở các module
        $modulesPath = base_path() . '/app/Modules';
        foreach (glob($modulesPath . '/*/config/permission.php') as $permissionFile) {
            require $permissionFile;
            //  Gộp quyền khai báo trong modules vào các quyền khai báo ở per_check
            $per_check = array_merge($per_check, $view);
        }
        $permissions = CommonHelper::has_permission(@\Auth::guard('admin')->user()->id, $per_check);
        \View::share('permissions', $permissions);
        return $next($request);
    }
}
