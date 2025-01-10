<?php

namespace App\Modules\DichVu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class PasswordReset extends Model
{

    protected $table = 'password_resets';

    protected $fillable = [
        'email', 'token', 'created_at'
    ];
    public $timestamps = false;
    public function user(){
        return $this->hasOne(User::class, 'email', 'email');
    }

}
