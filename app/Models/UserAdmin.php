<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAdmin extends Model
{

    protected $table = 'user_admin';

    protected $guarded = [];

    public $timestamps = false;
}
