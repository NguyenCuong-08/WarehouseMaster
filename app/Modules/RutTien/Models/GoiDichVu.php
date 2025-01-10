<?php

namespace App\Modules\GoiDichVu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class GoiDichVu extends Model
{

    protected $table = 'goi_dich_vu';

    protected $fillable = [
        'id', 'name', 'price', 'value', 'old_price', 'note', 'description', 'created_at', 'updated_at', 'order_no',
    ];

}
