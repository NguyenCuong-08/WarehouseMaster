<?php

namespace App\Modules\GoiDichVu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class Gift extends Model
{

    protected $table = 'gifts';

    protected $fillable = [
        'id', 'total_product','gift_text', 'gift_price', 'created_at', 'updated_at',
    ];

}
