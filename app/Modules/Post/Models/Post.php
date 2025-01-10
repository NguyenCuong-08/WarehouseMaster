<?php

namespace App\Modules\Post\Models;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Post extends Model
{

    protected $table = 'posts';
    protected $fillable = [
        'name', 'link', 'admin_id', 'content', 'multi_cat'
    ];

    public function admin()
    {
        return $this->hasOne(\App\Modules\Post\Models\Admin::class, 'id', 'admin_id');
    }

    public function categori()
    {
        return $this->hasOne(Categori::class, 'id', 'multi_cat');
    }

}
