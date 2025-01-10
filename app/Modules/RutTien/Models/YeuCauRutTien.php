<?php

namespace App\Modules\RutTien\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class YeuCauRutTien extends Model
{

    protected $table = 'yeu_cau_rut_tien';

    protected $fillable = [
        'id', 'admin_id','so_tien','cast_now','stk','ngan_hang','chu_tk','note'
    ];
    public function admin(){
        return $this->belongsTo(\App\CRMEdu\Models\Admin::class,'admin_id','id');
    }

}
