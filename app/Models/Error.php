<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Error extends Model
{

    protected $table = 'errors';

    protected $fillable = [
        'module', 'message', 'code', 'file'
    ];


}
