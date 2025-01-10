<?php

namespace App\Modules\HuongNghiep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class NganhDaoTao extends Model
{

    protected $table = 'nganh_dao_tao';

    protected $fillable = [
        'id','name', 'note', 'created_at', 'updated_at'
    ];

}
