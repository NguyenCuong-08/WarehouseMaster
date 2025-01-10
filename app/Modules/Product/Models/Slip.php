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

class Slip extends Model
{
//    use HasFactory;
    protected $table = 'slip';
    protected $fillable = [
        'id','product_id','quantity','user_name','user_phone',
        'o_hang_id', 'created_at', 'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function oHang()
    {
        return $this->belongsTo(OHang::class, 'o_hang_id', 'id');
    }
}
