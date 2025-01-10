<?php

namespace App\Modules\LichSuGiaoDich\Models;

use App\Modules\DichVu\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class SoDu extends Model
{

    protected $table = 'surplus';

    protected $fillable = [
        'lsgd_id', 'user_id', 'surplus', 'created_at', 'type'
    ];
    public $timestamps = false;


}
