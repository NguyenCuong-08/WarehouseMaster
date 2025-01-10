<?php

namespace App\Modules\Post\Models;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Widget extends Model
{

    protected $table = 'widgets';
    protected $fillable = [
        'name', 'link', 'admin_id', 'content','data'
    ];

    public function admin()
    {
        return $this->hasOne(\App\Modules\Post\Models\Admin::class, 'id', 'admin_id');
    }


}