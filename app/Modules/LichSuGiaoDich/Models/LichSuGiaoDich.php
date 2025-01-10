<?php

namespace App\Modules\LichSuGiaoDich\Models;

use App\Modules\DichVu\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class LichSuGiaoDich extends Model
{

    protected $table = 'lich_su_giao_dich';

    protected $fillable = [
       'sender_id', 'receiver_id', 'amount', 'note','type', 'created_at', 'admin_id', 'surplus', 'hoan_f1', 'company_id'
    ];
    public $timestamps = false;

    public function admin1(){
        return $this->hasOne(Admin::class, 'id', 'sender_id');
    }

    public function admin2(){
        return $this->hasOne(Admin::class, 'id', 'receiver_id');
    }

    public function sodu()
    {
        return $this->hasMany(SoDu::class, 'lsgd_id', 'id');
    }

    public function adminId(){
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
}
