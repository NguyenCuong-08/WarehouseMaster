<?php
namespace App\Modules\Post\Models;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
//    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'admin_id',
        'goi_dich_vu_id',
        'total_price',
        'total_price_hoan_tien','quantity',
        'status','receive_address', 'receive_user', 'receive_phone', 'note', 'company_id', 'first_order'
    ];
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function goi_dich_vu(){
        return $this->belongsTo(GoiDichVu::class, 'goi_dich_vu_id');
    }
}
