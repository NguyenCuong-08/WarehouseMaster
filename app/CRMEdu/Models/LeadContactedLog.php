<?php

namespace App\CRMEdu\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\CRMEdu\Models\Lead;

class LeadContactedLog extends Model
{

    protected $table = 'lead_contacted_log';

    protected $fillable = [
        'title', 'admin_id', 'lead_id', 'note', 'type'
    ];

    public function admin() {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function lead() {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

//    public function bill() {
//        return $this->belongsTo(Bill::class, 'lead_id');
//    }
}
