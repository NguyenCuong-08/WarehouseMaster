<?php

namespace App\Modules\DichVu\Controllers\Admin;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use Illuminate\View\View;
use Validator;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

use App\Modules\HuongNghiep\Controllers\Admin\Controller;

class DichVuController extends Controller
{
    public function dichvu()
    {
        return view('Hong.DichVu.goidichvu');
    }

    public function dichVuNhom()
    {
        return view('Hong.DichVuNhom.view');
    }
}
