<?php

/**
 * Admin Model
 *
 * Admin Model manages Admin operation.
 *
 * @category   Admin
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2017 Techvillage
 * @license
 * @version    1.3
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Models;

use App\Http\Helpers\CommonHelper;
use App\Modules\Post\Models\Bill;
use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $table = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'address', 'tel', 'image', 'gender', 'birthday', 'api_token', 'password_md5', 'fb_id', 'role_id',
        'invite_by', 'invite_total', 'parent_id', 'level', 'ngay_tham_gia', 'vi_tien', 'ngay_mua_don_cuoi', 'ngan_hang', 'stk', 'pin',
        'vi_tien_status', 'status', 'comapny_id', 'province_id', 'district_id', 'ward_id', 'front_cccd', 'back_cccd'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_admin', 'admin_id', 'role_id');
    }
    public function invite()
    {
        return $this->belongsTo(Admin::class, 'invite_by');
    }
    public function parent()
    {
        return $this->belongsTo(Admin::class, 'parent_id');
    }
    public function hasSuperAdminRole()
    {
        return $this->roles()->where('name', 'super_admin')->exists();
    }
    public function recharges()
    {
        return $this->hasMany(Recharges::class, 'admin_id', 'id');
    }

    public function admin_log()
    {
        return $this->hasMany(Website::class, 'admin_id', 'id');
    }

    public function generateToken()
    {
        $this->api_token = str_random(60) . time();
        $this->save();

        return $this->api_token;
    }
    public function children()
    {
        return $this->hasMany(Admin::class, 'parent_id', 'id');
    }
    public function bill()
    {
        return $this->hasMany(Bill::class, 'admin_id');
    }
    public function getInviteCount()
    {
        return self::where('invite_by', $this->id)
            ->whereNotNull('ngay_mua_don_cuoi')
            ->count();
    }
    public static function getTopInviters($limit = 10)
    {
        return self::select('invite_by', DB::raw('COUNT(*) as invite_count'))
            ->whereNotNull('invite_by')
            ->whereNotNull('ngay_mua_don_cuoi')
            ->groupBy('invite_by')
            ->orderBy('invite_count', 'desc')
            ->limit($limit)
            ->get();
    }
}
