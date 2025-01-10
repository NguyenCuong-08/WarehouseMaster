<?php

namespace App\Modules\HuongNghiep\Models;

use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class School extends Model
{

    protected $table = 'schools';

    protected $fillable = [
        'id','name', 'link_web', 'hoc_phi', 'chi_tieu', 'nganh_dao_dao_id',
        'updated_at', 'created_at', 'link_gg_map', 'province_id'
    ];
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
