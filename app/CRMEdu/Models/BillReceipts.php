<?php
namespace App\CRMEdu\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class BillReceipts extends Model
{
    use SoftDeletes;

//    protected $table = 'lich_su_giao_dich';
//
//    protected $fillable = [
//        'ma_don' , 'created_at' , 'so_tien'
//    ];

    protected $table = 'bill_receipts';

    protected $fillable = [
        'bill_id' , 'date' , 'price'
    ];


//    public function bill() {
//        return $this->belongsTo(Bill::class, 'bill_id', 'id');
//    }
//
//    public function admin() {
//        return $this->belongsTo(Admin::class, 'admin_id', 'id');
//    }
//
//    public function tag() {
//        return $this->belongsTo(Tag::class, 'receiving_account', 'id');
//    }
//
//    public function saler() {
//        return $this->belongsTo(Admin::class, 'saler_id', 'id');
//    }
}
