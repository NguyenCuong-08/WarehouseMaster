<?php

namespace App\Modules\GoiDichVu\Controllers\Frontend;

use App\Modules\GoiDichVu\Controllers\Admin\CURDBaseController;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Validator;
use Carbon\Carbon;

class GoiDichVuController
{
    public function getIndex(Request $request)
    {
        $data = $this->getDataList($request);
//        $this->billcheck();die();
        return view('GoiDichVu.admin.list')->with($data);
    }

    public function getViewGoiDV(Request $request)
    {
        return view('GoiDichVu.frontend.partials.danh_sach_goi');
    }
}
