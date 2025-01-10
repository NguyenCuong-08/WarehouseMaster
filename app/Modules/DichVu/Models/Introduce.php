<?php

namespace App\Modules\HuongNghiep\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class Introduce extends Model
{

    protected $table = 'introduce';

    protected $fillable = [
        'title','content'
    ];

}
