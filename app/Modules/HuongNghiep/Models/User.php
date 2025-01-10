<?php

namespace App\Modules\HuongNghiep\Models;

use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class User extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'id','name', 'note', 'created_at', 'updated_at'
    ];
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
