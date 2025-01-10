<?php
namespace App\Modules\Payment\Models;

use App\CRMEdu\Models\Bill;
use App\CRMEdu\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin;

class PaymentHistory extends Model
{
    protected $table = 'lich_su_payos';

    protected $fillable = [
        'id' ,'admin_id', 'loai_don','hinh_thuc_thanh_toan' , 'so_tien' , 'trang_thai','cancel','link', 'description'
    ];
    public function nguoinap(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
