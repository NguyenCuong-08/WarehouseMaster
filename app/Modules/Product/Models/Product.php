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
//use const App\Modules\Product\Models\OHangProduct;

//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
//    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id','category_id','price', 'don_vi_chuyen_doi_khoi_luong', 'ty_le_chuyen_doi_khoi_luong', 'mo_ta_chuyen_doi_khoi_luong',
        'name', 'created_at', 'updated_at','mo_ta_chuyen_doi', 'ty_le_chuyen_doi', 'don_vi_chuyen_doi', 'don_vi_tinh_chinh', 'nhom_vthh'
    ];
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
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
    public function oHangProduct()
    {
        return $this->belongsTo(OHangProduct::class, 'id', 'product_id');
    }

}
