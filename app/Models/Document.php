<?php
namespace App\CRMDV\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\CRMDV\Models\Bill;

class Document extends Model
{

    protected $table = 'documents';

    protected $fillable = [
        'admin_id' , 'name' , 'author_name', 'service_id', 'intro', 'content'
    ];

    public function service() {
        return $this->belongsTo(Bill::class, 'service_id', 'id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

}
