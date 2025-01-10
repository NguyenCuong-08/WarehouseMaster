<?php
namespace App\Modules\Product\Models;

use App\Models\Admin;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Illuminate\Database\Eloquent\Model;
use const App\Modules\Post\Models\admin_id;
use const App\Modules\Post\Models\goi_dich_vu_id;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

class LichSuLuanChuyen extends Model
{
//    use HasFactory;
    protected $table = 'lich_su_luan_chuyen';
    protected $fillable = [
        'id','o_hang_nguon_id','o_hang_dich_id',
        'product_id', 'quantity', 'admin_id','created_at', 'updated_at','date'
    ];
    public function oHangDich(){
        return $this->belongsTo(OHang::class, 'o_hang_dich_id');
    }public function oHangNguon(){
        return $this->belongsTo(OHang::class, 'o_hang_nguon_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
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
