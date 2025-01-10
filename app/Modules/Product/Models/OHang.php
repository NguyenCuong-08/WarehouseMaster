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

class OHang extends Model
{
//    use HasFactory;
    protected $table = 'o_hang';
    protected $fillable = [
        'id','category_id','price','day_hang_id','des','tang_hang', 'o_hang',
        'name', 'created_at', 'updated_at',
    ];
    public function day_hang(){
        return $this->belongsTo(DayHang::class, 'day_hang_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
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
    public function oHangProduct(){
        return $this->belongsTo(OHangProduct::class, 'id');
    }
    public function tangke()
    {
        return $this->belongsTo(TangKe::class, 'tang_ke_id', 'id');
    }
}
