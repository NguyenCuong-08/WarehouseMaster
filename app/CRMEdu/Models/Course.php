<?php

namespace App\CRMEdu\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'courses';

    protected $fillable = [
        'name', 'link', 'level', 'order_no', 'admin_id', 'multi_cat'
    ];
}
