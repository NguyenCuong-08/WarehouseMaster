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

class OHangProduct extends Model
{
//    use HasFactory;
    protected $table = 'o_hang_product';
    protected $fillable = [
        'id','o_hang_id','product_id','quantity','date','date_end',
        'name', 'created_at', 'updated_at',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
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
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function oHang()
    {
        return $this->belongsTo(OHang::class, 'o_hang_id', 'id');
    }
    public function tangke()
    {
        return $this->belongsTo(TangKe::class, 'tang_ke_id', 'id');
    }
}
