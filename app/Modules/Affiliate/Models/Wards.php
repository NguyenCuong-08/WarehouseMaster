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

class Wards extends Model
{
    protected $table = 'wards'; // Tên bảng phải là chuỗi

    protected $fillable = ['*']; // Cách này không được khuyến khích vì có thể gây rủi ro bảo mật
}