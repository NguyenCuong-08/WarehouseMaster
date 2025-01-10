<?php

namespace App\CRMEdu\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Admin;

class Zoom extends Model
{

    protected $table = 'zoom';

    protected $fillable = [
        'id', 'subject', 'password', 'link', 'amount_of_people', 'time_meeting', 'price', 'payment_method'
    ];

}
