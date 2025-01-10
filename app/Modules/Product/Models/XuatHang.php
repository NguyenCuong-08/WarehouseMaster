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

class XuatHang extends Model
{
//    use HasFactory;
    protected $table = 'xuat_hang';
    protected $fillable = [
        'id', 'slip_id', 'quantity', 'date',
        'o_hang_id', 'created_at', 'updated_at',
    ];

    public function oHang()
    {
        return $this->belongsTo(OHang::class, 'o_hang_id', 'id');
    }

    public function productss()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function slip()
    {
        return $this->belongsTo(Slip::class, 'slip_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
