<?php

namespace App\Modules\Post\Models;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Page extends Model
{

    protected $table = 'pages';
    protected $fillable = [
        'name', 'slug', 'admin_id', 'content','image'
    ];

    public function admin()
    {
        return $this->hasOne(\App\Modules\Post\Models\Admin::class, 'id', 'admin_id');
    }


}
