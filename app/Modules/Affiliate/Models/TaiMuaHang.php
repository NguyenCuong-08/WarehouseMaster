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

class TaiMuaHang extends Model
{
//    use HasFactory;
    protected $table = 'tai_mua_hang';
    protected $fillable = [
        'id', 'price', 'request_total_order'
    ];
    public function admin(){
        return $this->belongsTo(Admin::class, admin_id);
    }
    public function goi_dich_vu(){
        return $this->belongsTo(GoiDichVu::class, goi_dich_vu_id);
    }
}
