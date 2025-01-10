<?php
namespace App\Modules\Affiliate\Models;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Illuminate\Database\Eloquent\Model;
use const App\Modules\Post\Models\admin_id;
use const App\Modules\Post\Models\goi_dich_vu_id;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
//    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'admin_id',
        'goi_dich_vu_id',
        'total_price',
        'total_price_hoan_tien',
        'status','receive_address', 'receive_user', 'receive_phone', 'note', 'company_id',
        'first_order', 'quantity', 'created_at', 'updated_at',
        'province_id', 'district_id', 'ward_id', 'receive_email'
    ];
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function goi_dich_vu(){
        return $this->belongsTo(GoiDichVu::class, 'goi_dich_vu_id');
    }
    public function province(){
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function district(){
        return $this->belongsTo(Province::class, 'district_id');
    }
    public function ward(){
        return $this->belongsTo(Province::class, 'ward_id');
    }
}
