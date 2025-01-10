<?php

namespace App\Modules\Affiliate\Controllers\Admin;

use App\CRMDV\Models\HoaDon;
use App\CRMDV\Models\Invoice;
use App\CRMDV\Models\PackDetail;
use App\Models\Admin;
use App\Models\Setting;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\LichSuGiaoDich\Models\SoDu;
use App\Modules\Logistics\Controllers\Admin\CURDBaseController;
use App\Modules\Logistics\Models\Bill;
use App\Http\Helpers\CommonHelper;
use App\Modules\Post\Models\BackDetail;
use Illuminate\Http\Request;
use App\Modules\Logistics\Models\Codes;
use App\Modules\Logistics\Models\Theme;
use App\Modules\Logistics\Models\Tag;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Validator;
use App\Modules\Logistics\Models\PostTag;
use App\Modules\Logistics\Models\BillProgress;
use function App\Modules\Post\Controllers\Admin\abort;
use function App\Modules\Post\Controllers\Admin\asset;
use function App\Modules\Post\Controllers\Admin\back;
//use function App\Modules\Post\Controllers\Admin\Response;
use function App\Modules\Post\Controllers\Admin\str_slug;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;
//use Illuminate\Http\Responses;

class BillController extends \App\Modules\Post\Controllers\Admin\CURDBaseController
{

    protected $module = [
        'code' => 'hoadon',
        'table_name' => 'bills',
        'label' => 'Hóa Đơn',
        'modal' => '\App\Modules\Post\Models\Bill',
        'list' => [
//            ['name' => 'admin_id', 'type' => 'text_admin_edit' ,'label' => 'ID'],
            ['name' => 'admin_id', 'type' => 'relation', 'object'=>'admin', 'display_field'=>'name' ,'label' => 'Tài khoản mua'],
            ['name' => 'goi_dich_vu_id', 'type' => 'relation','object'=>'goi_dich_vu', 'display_field'=>'name', 'label' => 'Gói'],
            ['name' => 'quantity', 'type' => 'number', 'label' =>'Số lượng Combo'],
            ['name' => 'total_price', 'type' => 'number', 'label' => 'Giá'],
            ['name' => 'admin_id', 'type' => 'custom','td' => 'Affiliate.bill.list.td.thong_tin_nguoi_nhan', 'label' => 'Thông tin người nhận'],
            ['name' => 'created_at', 'type' => 'datetime_vi', 'label' => 'Ngày mua'],
            ['name' => 'updated_at', 'type' => 'datetime_vi', 'label' => 'Ngày duyệt'],
            ['name' => 'status', 'type' => 'custom','td' => 'Affiliate.bill.list.td.status', 'label' => 'Trạng thái'],
            ['name' => 'hanh_dong', 'type' => 'custom', 'td' => 'Affiliate.bill.list.td.hanh_dong', 'label' => 'Hành động'],

        ],
        'form' => [
            'general_tab' => [

            ],
//
//            'remind_tab' => [
//                ['name' => 'image', 'type' => 'file_image', 'label' => 'Ảnh đại diện'],
////                ['name' => 'image_extra', 'type' => 'custom', 'field' => 'Logistics.package.list.form.multiple_image', 'class' => 'required', 'count' => '6', 'label' => 'Ảnh nhà chào bán'],
//            ],
            'des_tab' => [
//
//
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id'
    ];

    protected $filter = [

    ];
    public function changePinView()
    {
        return view('admin.themes.metronic1.admin.changePin');
    }
    public function changePin(Request $request)
    {
        $user=Auth::guard('admin')->user();
        $adm = $user->pin;
        if($request->pinold != $adm ){
            CommonHelper::one_time_message('error', 'Mã pin không chính xác!');
            return redirect()->back();
        }
        $user->pin=$request->pinnew;
        $user->save();
        CommonHelper::one_time_message('success', 'Thành công !');
        return redirect()->back();
    }
    public function cayNgang($id)
    {

        if($id == 1){
            return view('Affiliate/admin/cayngang');
        }else{
            return view('Affiliate/admin/cayngang2', compact('id'));
        }

    }
    public function getIndex(Request $request, $id)
    {
        if($id == 1){
            $companyId = \Illuminate\Support\Facades\Auth::guard('admin')->user()->company_id;
            $data = $this->getDataList2($request, $companyId);
        }else{

            $data = $this->getDataList2($request, $id);
        }


        return view('Affiliate.bill.list')->with($data);
    }
    public function getIndex2(Request $request)
    {
        $companyId = 2;
        $data = $this->getDataList2($request, $companyId);
//        dd($data);
        return view('Affiliate.bill.list')->with($data);
    }
    public function getIndex3(Request $request)
    {
        $companyId = 3;
        $data = $this->getDataList2($request, $companyId);

        return view('Affiliate.bill.list')->with($data);
    }
    public function getDataList2(Request $request, $companuId) {
        //  Filter
        $where = $this->filterSimple($request);
        $listItem = $this->model->whereRaw($where);
        $listItem = $this->model->where('company_id', $companuId);
        $listItem = $this->quickSearch($listItem, $request);
        if ($this->whereRaw) {
            $listItem = $listItem->whereRaw($this->whereRaw);
        }
        $listItem = $this->appendWhere($listItem, $request);

        //  Export
        if ($request->has('export')) {
            $this->exportExcel($request, $listItem->take(9000)->get());
        }

        //  Sort
        $listItem = $this->sort($request, $listItem);

        $data['record_total'] = $listItem->count();
        $data = $this->thongKe($data, $listItem, $request);

        if ($request->has('limit')) {
            $data['listItem'] = $listItem->paginate($request->limit);
            $data['limit'] = $request->limit;
        } else {
            $data['listItem'] = $listItem->paginate($this->limit_default);
            $data['limit'] = $this->limit_default;
        }
        $data['page'] = $request->get('page', 1);

        $data['param_url'] = $request->all();

        //  Get data default (param_url, filter, module) for return view
        $data['module'] = $this->module;
        $data['quick_search'] = $this->quick_search;
        $data['filter'] = $this->filter;

        //  Set data for seo
        $data['page_title'] = $this->module['label'];
        $data['page_type'] = 'list';
        return $data;
    }
    public function getListChild(Request $request)
    {
//        dd('khôi');
        $data = $this->getDataListChild($request);

        return view('Affiliate.bill.list')->with($data);
    }
    public function thongTinThuNhap()
    {
        $admin = \Auth::guard('admin')->user();
        $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
        $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
        $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
        $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
        $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
        $hoan_phi_nhom_sau = Setting::where('name', 'hoan_phi_nhom_sau')->first()->value;
//        dd($admin->ngay_tham_gia->day);

        if($admin->ngay_tham_gia){
            $ngay_tham_gia =Carbon::parse($admin->ngay_tham_gia)->day;
        }
        else{
            $ngay_tham_gia = 1;

        }
        $ngay_tham_gia = 1;
        $thang_hien_tai = $currentMonth = Carbon::now()->month;
        $nam_hien_tai = Carbon::now()->year;
        $ngay_tinh_thu_nhap = Carbon::create($nam_hien_tai, $thang_hien_tai, $ngay_tham_gia)->startOfDay();
//        dd($ngay_tinh_thu_nhap);
        $han_ngay_tinh_thu_nhap = Carbon::create($nam_hien_tai, $thang_hien_tai, $ngay_tham_gia)->addMonth();
//        dd($han_ngay_tinh_thu_nhap);
        $goidv = GoiDichVu::first();
//        $sl_nhom1 = Admin::Where('parent_id', $admin->id);
        $arr_nhom1 = Admin::Where('parent_id', $admin->id)->pluck('id')->toArray();
//        dd(\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom1)->whereBetween('created_at', [$ngay_tinh_thu_nhap, $han_ngay_tinh_thu_nhap])->get());
//        $so_nguoi_da_mua1=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom1)->where('created_at','>=', $ngay_tinh_thu_nhap)->count();
        $so_nguoi_da_mua1=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom1)
//            ->whereBetween('created_at', [$ngay_tinh_thu_nhap, $han_ngay_tinh_thu_nhap])
            ->distinct('admin_id') // Loại bỏ các admin_id trùng lặp
            ->count('admin_id');
//        dd($so_nguoi_da_mua1);
//        $hoan_tien_nhom1 = $this->HoanTien($arr_nhom1, $ngay_tinh_thu_nhap);

        $hoan_tien_nhom1 = \App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom1)
//                ->where('created_at','>=', $ngay_tinh_thu_nhap)
                ->sum('total_price_hoan_tien')*$hoan_phi_nhom_mot/100;
//        $sl_nhom2 = Admin::WhereIn('parent_id', $arr_nhom1);
        $arr_nhom2 = Admin::WhereIn('parent_id', $arr_nhom1)->pluck('id')->toArray();
        $so_nguoi_da_mua2=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom2)
//            ->where('created_at','>=', $ngay_tinh_thu_nhap)
            ->distinct('admin_id') // Loại bỏ các admin_id trùng lặp
            ->count('admin_id');
//        $hoan_tien_nhom2 = $this->HoanTien($arr_nhom2, $ngay_tinh_thu_nhap);

        $hoan_tien_nhom2 = \App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom2)
//                ->where('created_at','>=', $ngay_tinh_thu_nhap)
                ->sum('total_price_hoan_tien')*$hoan_phi_nhom_hai/100;

//        $sl_nhom3 = Admin::WhereIn('parent_id', $arr_nhom2);
        $arr_nhom3 = Admin::WhereIn('parent_id', $arr_nhom2)->pluck('id')->toArray();
        $so_nguoi_da_mua3=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom3)
//            ->where('created_at','>=', $ngay_tinh_thu_nhap)
            ->distinct('admin_id') // Loại bỏ các admin_id trùng lặp
            ->count('admin_id');
//        $hoan_tien_nhom3 = $this->HoanTien($arr_nhom3, $ngay_tinh_thu_nhap);

        $hoan_tien_nhom3 = \App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom3)
//                ->where('created_at','>=', $ngay_tinh_thu_nhap)
                ->sum('total_price_hoan_tien')*$hoan_phi_nhom_ba/100;

//        $sl_nhom4 = Admin::WhereIn('parent_id', $arr_nhom3);
        $arr_nhom4 = Admin::WhereIn('parent_id', $arr_nhom3)->pluck('id')->toArray();
        $so_nguoi_da_mua4=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom4)
//            ->where('created_at','>=', $ngay_tinh_thu_nhap)
            ->distinct('admin_id') // Loại bỏ các admin_id trùng lặp
            ->count('admin_id');
//        $hoan_tien_nhom4 = $this->HoanTien($arr_nhom4, $ngay_tinh_thu_nhap);

        $hoan_tien_nhom4 = \App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom4)
//                ->where('created_at','>=', $ngay_tinh_thu_nhap)
                ->sum('total_price_hoan_tien')*$hoan_phi_nhom_bon/100;

//        $sl_nhom5 = Admin::WhereIn('parent_id', $arr_nhom4);
        $arr_nhom5 = Admin::WhereIn('parent_id', $arr_nhom4)->pluck('id')->toArray();

        $so_nguoi_da_mua5=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom5)
//            ->where('created_at','>=', $ngay_tinh_thu_nhap)
            ->distinct('admin_id')
            ->count('admin_id');
//        $hoan_tien_nhom5 = $this->HoanTien($arr_nhom5, $ngay_tinh_thu_nhap);

        $hoan_tien_nhom5 = \App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom5)
//                ->where('created_at','>=', $ngay_tinh_thu_nhap)
                ->sum('total_price_hoan_tien')*$hoan_phi_nhom_nam/100;
        $arr_nhom6 = Admin::WhereIn('parent_id', $arr_nhom5)->pluck('id')->toArray();

        $so_nguoi_da_mua6=\App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom6)
//            ->where('created_at','>=', $ngay_tinh_thu_nhap)
            ->distinct('admin_id')
            ->count('admin_id');
//        $hoan_tien_nhom5 = $this->HoanTien($arr_nhom5, $ngay_tinh_thu_nhap);

        $hoan_tien_nhom6 = \App\Modules\Post\Models\Bill::whereIn('admin_id',$arr_nhom6)
//                ->where('created_at','>=', $ngay_tinh_thu_nhap)
                ->sum('total_price_hoan_tien')*$hoan_phi_nhom_nam/100;
        $hoan_tien_f1 = LichSuGiaoDich::where('receiver_id', $admin->id)
            ->where('hoan_f1', '1')
            ->orWhere(function($query) use ($admin) {
                $query->where('receiver_id', $admin->id)
                    ->where('note', 'like', '%hoàn điểm f1%');
            })
            ->sum('amount');
//        dd($hoan_tien_f1);
//        dd($ngay_tinh_thu_nhap);
        //doanh số nhanh
        $start_date_canhan = \Carbon\Carbon::parse(Carbon::now()->startOfMonth()->format('Y-m-d'))->startOfDay()->format('Y-m-d H:i:s');
        $end_date_canhan = \Carbon\Carbon::parse(Carbon::now()->endOfMonth()->format('Y-m-d'))->endOfDay()->format('Y-m-d H:i:s');
        $doanh_so_nhanh = $this->DoanhThuNhanhCaNhan($admin->id, $start_date_canhan, $end_date_canhan);
        $sltv_new =$this->DemThanhVienMoi($admin->id, $start_date_canhan, $end_date_canhan);
        return view('Affiliate.thong-tin-thu-nhap',
            compact('hoan_phi_nhom_nam', 'hoan_phi_nhom_hai','hoan_phi_nhom_sau',
                'hoan_phi_nhom_mot', 'hoan_phi_nhom_bon', 'hoan_phi_nhom_ba', 'goidv',
                'arr_nhom1', 'arr_nhom2', 'arr_nhom3', 'arr_nhom4', 'arr_nhom5','arr_nhom5',
                'hoan_tien_nhom1', 'hoan_tien_nhom2', 'hoan_tien_nhom3', 'hoan_tien_nhom4', 'hoan_tien_nhom5', 'hoan_tien_nhom6'
                ,'so_nguoi_da_mua1','so_nguoi_da_mua2','so_nguoi_da_mua3','so_nguoi_da_mua4','so_nguoi_da_mua5', 'so_nguoi_da_mua6'
                ,'hoan_tien_f1', 'doanh_so_nhanh', 'sltv_new'
            ));
    }
    public function DoanhThuNhanhCaNhan(int $admin_id, $start_date, $end_date){
        $arr_ids = [$admin_id];
        //lấy ra những ptu có parent_id là $admin_id;
        $this->getAdminChilds($admin_id, $arr_ids);
        //doanh thu nhánh cá nhân
        $doanhthu = \App\Modules\Affiliate\Models\Bill::whereIn('admin_id', $arr_ids)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->sum('total_price');
        return $doanhthu;
    }
    public function DemThanhVienMoi(int $admin_id, $start_date, $end_date){
        $arr_ids = [$admin_id];
        //lấy ra những ptu có parent_id là $admin_id;
        $this->getAdminChilds($admin_id, $arr_ids);
        //doanh thu nhánh cá nhân
        $doanhthu = \App\Modules\Affiliate\Models\Bill::whereIn('admin_id', $arr_ids)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->where('first_order', 1)
            ->count();
        return $doanhthu;
    }
    private function getAdminChilds(int $admin_id, &$arr_ids) {
        // Lấy ra những nhân sự con có parent_id là $admin_id
        $admin_childs = Admin::where('parent_id', $admin_id)->take(3)->pluck('id')->toArray();

        // Thêm những nhân sự con vào mảng $arr_ids
        foreach ($admin_childs as $child_id) {
            $arr_ids[] = $child_id;
            // Đệ quy để lấy tiếp những nhân sự con của $child_id
            $this->getAdminChilds($child_id, $arr_ids);
        }
        return true;
    }
    public function HoanTien($arr_nhom1, $ngay_tinh_thu_nhap){
        $bill1s = \App\Modules\Post\Models\Bill::whereIn('admin_id', $arr_nhom1)
            ->where('created_at', '>=', $ngay_tinh_thu_nhap)
            ->get();
        $hoan_tien_nhom1 = 0;
        foreach ($bill1s as $bill) {
            $goiDichVu = GoiDichVu::find($bill->goi_dich_vu_id);
            if ($goiDichVu) {
                $hoan_tien_nhom1 += $goiDichVu->price_hoan_tien;
            }
        }
        return $hoan_tien_nhom1;
    }
    public function duyetTrangThai(Request $request){
//        dd($request->id);
        $bill = \App\Modules\Affiliate\Models\Bill::find($request->id);
        $bill->update(['status' => 1]);
        return response()->json(['success'=>'Duyệt thành công']);
    }
    public function duyetDon(Request $request, string $id)
    {
        $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
        $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
        $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
        $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
        $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
//        dd($hoan_phi_nhom_mot.'|'.$hoan_phi_nhom_hai.'|'.$hoan_phi_nhom_ba.'|'.$hoan_phi_nhom_bon.'|'.$hoan_phi_nhom_nam.'|');

        $yeu_cau_f1 =Setting::where('name', 'yeu_cau_f1')->first()->value;
        $hoan_phi_f1 =Setting::where('name', 'hoan_phi_f1')->first()->value;
        $yeu_cau_f1_2 =Setting::where('name', 'yeu_cau_f1_2')->first()->value;
        $hoan_phi_f1_2 =Setting::where('name', 'hoan_phi_f1_2')->first()->value;
//        dd($yeu_cau_f1.'|'.$hoan_phi_f1.'|'.$yeu_cau_f1_2.'|'.$hoan_phi_f1_2);

        \DB::beginTransaction();
        try {
            $bill = \App\Modules\Post\Models\Bill::find($id);
//            dd($bill);

            //lấy ra tài khoản người mua
            $admin_buy = Admin::find($bill->admin_id);
//            dd('khôi');
//            dd($admin_buy->vi_tien);
            $vi_tien = $admin_buy->vi_tien;
            if(!$vi_tien) $vi_tien =0;
            //lấy giá trị gói
            $dich_vu_buy = GoiDichVu::find($bill->goi_dich_vu_id);
            $goi_dich_vu_price = $dich_vu_buy->price;
            $today = Carbon::now();

            //kiểm tra xem nếu số dư trong ví > số tiền mua gói
            if($vi_tien >= $goi_dich_vu_price){
                $admin_buy->update([
                    'vi_tien'=>$vi_tien - $goi_dich_vu_price,
                    'ngay_mua_don_cuoi'=>$today,

                ]);
                $lsgdct=LichSuGiaoDich::create([
                    'sender_id'=>$admin_buy->id,
                    'receiver_id'=>\Auth::guard('admin')->user()->id,
                    'type'=>1,
                    'amount'=> $goi_dich_vu_price,
                    'note' => 'Mua '.$dich_vu_buy->name,
                    'created_at'=>$today
                ]);
                SoDu::create([
                    'lsgd_id' =>$lsgdct->id,
                    'user_id'=>$admin_buy->id,
                    'surplus'=>$admin_buy->vi_tien,
                    'created_at'=>$today,
                    'type'=>1,

                ]);
                if($admin_buy->invite_total>=3){
                    $admin_buy->update([
                        'vi_tien_status'=>1,
                    ]);
                }
                $admin_auth = \Auth::guard('admin')->user();

//                dd($admin_buy->vi_tien . ' | ' . $admin_auth->vi_tien);
                $vi_tien_auth=$admin_auth->vi_tien;
//                dd($vi_tien_auth);

                $admin_auth->update([
                    'vi_tien'=>$vi_tien_auth+$goi_dich_vu_price,
                ]);
                //lịch sử giao dịch cho admin
                $lsgd=LichSuGiaoDich::create([
                    'receiver_id'=>$admin_auth->id,
                    'type'=>0,
                    'amount'=> $goi_dich_vu_price,
                    'note' => 'Người dùng '.$admin_buy->name.'mua'. $dich_vu_buy->name,
                    'created_at'=>$today
                ]);
                SoDu::create([
                    'lsgd_id' =>$lsgd->id,
                    'user_id'=>$admin_auth->id,
                    'surplus'=>$admin_auth->vi_tien,
                    'created_at'=>$today,
                    'type'=>0,

                ]);
                //
                $bill->update(['status' => 1]);
                //thêm tài khoản vào cây thành viên
                $invite_by = $admin_buy->invite_by;
                $parentid = $admin_buy->parent_id;
                //nó có mã giới thiệu và chưa có parrent_id
                if($invite_by && !$parentid){
                    $parent_id = $this->TimCha($invite_by);

                    //admin cha
                    $parent_admin = Admin::find($parent_id);
                    $level_cha = $parent_admin->level;

                    $admin_buy->update([
                        'parent_id'=>$parent_id,
                        'ngay_tham_gia'=>$today,
                        'level'=>$level_cha + 1,
                        'status'=> 1,

                    ]);
                    //cập nhật total_invice cho invite_admin
                    $invite_admin = Admin::find($invite_by);
                    $invite_total_admin_invite = $invite_admin->invite_total;
                    $invite_admin->update([
                        'invite_total'=> $invite_total_admin_invite + 1,
                    ]);
                }
                else{
                    $parent_admin = Admin::find($admin_buy->parent_id);

                }
                if($parent_admin){
                    //cộng hoàn tiền cho 5 cấp độ
                    //cha(nhóm 1)
                    $vi_tien_cha = $parent_admin->vi_tien;
//                    $parent_admin->update(['vi_tien'=>$vi_tien_cha + 35*$goi_dich_vu_price/100]);
                    $this->congTienChoCha($parent_admin->id, $admin_buy->id, '1', $goi_dich_vu_price);
                    if($parent_admin->invite_by) {
                        $this->congTienChoNguoiGioiThieu($parent_admin->invite_by, $parent_admin->id, $hoan_phi_nhom_mot * $goi_dich_vu_price / 100);
                    }
                    //nhóm 2
                    if($parent_admin->parent_id){
                        $parent2_admin = Admin::find($parent_admin->parent_id);
                        $vi_tien_cha2 = $parent2_admin->vi_tien;
//                        $parent2_admin->update(['vi_tien'=>$vi_tien_cha2 + 5*$goi_dich_vu_price/100]);
                        $this->congTienChoCha($parent2_admin->id, $admin_buy->id, '2', $goi_dich_vu_price);
                        if($parent2_admin->invite_by){
                            $this->congTienChoNguoiGioiThieu($parent2_admin->invite_by, $parent2_admin->id, $hoan_phi_nhom_hai*$goi_dich_vu_price/100);

                        }

                        //nhóm 3
                        if($parent2_admin->parent_id){
                            $parent3_admin = Admin::find($parent2_admin->parent_id);
                            $vi_tien_cha3 = $parent3_admin->vi_tien;
//                            $parent3_admin->update(['vi_tien'=>$vi_tien_cha3 + 5*$goi_dich_vu_price/100]);
                            $this->congTienChoCha($parent3_admin->id, $admin_buy->id, '3', $goi_dich_vu_price);
                            if($parent3_admin->invite_by) {
                                $this->congTienChoNguoiGioiThieu($parent3_admin->invite_by, $parent3_admin->id, $hoan_phi_nhom_ba * $goi_dich_vu_price / 100);
                            }
                            //nhóm 4
                            if($parent3_admin->parent_id){
                                $parent4_admin = Admin::find($parent3_admin->parent_id);
                                $vi_tien_cha4 = $parent4_admin->vi_tien;
//                                $parent4_admin->update(['vi_tien'=>$vi_tien_cha4 + 5*$goi_dich_vu_price/100]);
                                $this->congTienChoCha($parent4_admin->id, $admin_buy->id, '4', $goi_dich_vu_price);
                                if($parent4_admin->invite_by) {
                                    $this->congTienChoNguoiGioiThieu($parent4_admin->invite_by, $parent4_admin->id, $hoan_phi_nhom_bon * $goi_dich_vu_price / 100);
                                }
                                //nhóm 5
                                if($parent4_admin->parent_id){
                                    $parent5_admin = Admin::find($parent4_admin->parent_id);
                                    $vi_tien_cha5 = $parent5_admin->vi_tien;
//                                    $parent5_admin->update(['vi_tien'=>$vi_tien_cha5 + 10*$goi_dich_vu_price/100]);
                                    $this->congTienChoCha($parent5_admin->id, $admin_buy->id, '5', $goi_dich_vu_price);
                                    if($parent5_admin->invite_by){
                                        $this->congTienChoNguoiGioiThieu($parent5_admin->invite_by, $parent5_admin->id,  $hoan_phi_nhom_nam*$goi_dich_vu_price/100);
                                    }
                                }
                            }

                        }

                    }
                }


                \DB::commit();
//                dd('khôi');
                return response()->json(['success'=>'Duyệt thành công']);
            }
            \DB::rollback();
            return response()->json(['error'=>'Ví người dùng không đủ']);
        }catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return response()->json(['error'=>'Duyệt thất bại'.$ex->getMessage()]);
        }

    }
    public function TimCha($invite_by) {

        $childs = $this->hoiDuCon($invite_by);
        if (is_numeric($childs)) {
            return $childs;
        }

        //  nếu đã đủ con rồi thì gọi tất cả con ra hỏi xem ai chưa đủ thì gán cho
        //  gọi tất cả con ra
        $next_generation = [];
        foreach ($childs as $child) {
            //  Kiểm tra từng người con xem có đủ con chưa
            $data = $this->hoiDuCon($child->id);
            if (is_numeric($data)) {
                return $data;
            }
            //  Thu thập tất cả con để xét thế hệ tiếp theo
            $next_generation[] = $child;
        }
        foreach ($next_generation as $child) {
            $parent = $this->TimCha($child->id);
            if (is_numeric($parent)) {
                return $parent;
            }
        }
        return null;
    }

    //  Hỏi xem tài khoản admin này đủ con chưa
    //lúc xét con  thì nên xét từ thằng con được tạo sớm
    // nhất trước(làm thêm một trường date_được_thêm_vào_cây)
    //không thể lấy theo id từ bé đến lớn được, vì có nhiều thằng được tạo trước
    //nhưng chưa cho vào cây sẽ có id bé, khi vào cây cấp độ sau, vẫn sẽ được xét trước do có id bé -> sai
    public function hoiDuCon($admin_id) {
        //  gọi tất cả con ra
        $childs = Admin::where('parent_id', $admin_id)
            ->where('status', 1)
            ->orderBy('ngay_tham_gia', 'asc')
            ->get();
        if (count($childs) < env('AFF_MAX_CON_TRUC_TIEP')) {
            //  chưa đủ con thi gan vao lam con truc tiep
            return $admin_id;
        }
        return $childs;
    }
    public function congTienChoCha(string $id, string $admin_buy_id, string $nhom, float $goi_dich_vu_price){
        //
        $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
        $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
        $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
        $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
        $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
        //
        $parent_admin = Admin::find($id);
        $admin_buy = Admin::find($admin_buy_id);
        $vi_tien_cha = $parent_admin->vi_tien;
        if($nhom == 1){
            $amount = $hoan_phi_nhom_mot*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 2){
            $amount = $hoan_phi_nhom_hai*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 3){
            $amount = $hoan_phi_nhom_ba*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 4){
            $amount = $hoan_phi_nhom_bon*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        else{
            $amount = $hoan_phi_nhom_nam*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        $today = Carbon::now();
        $lsgd=LichSuGiaoDich::create([
            'receiver_id'=>$id,
            'type'=>2,
            'amount'=> $amount,
            'note' => 'hoàn tiền mua hàng từ thành viên nhóm '.$nhom.' '. $admin_buy->name,
            'created_at'=>$today
        ]);
        SoDu::create([
            'lsgd_id' =>$lsgd->id,
            'user_id'=>$parent_admin->id,
            'surplus'=>$parent_admin->vi_tien,
            'created_at'=>$today,
            'type'=>2,

        ]);
//        return true;
    }
    public function congTienChoNguoiGioiThieu(string $id, string $f1_id, float $money){
        //
        $yeu_cau_f1 =Setting::where('name', 'yeu_cau_f1')->first()->value;
        $hoan_phi_f1 =Setting::where('name', 'hoan_phi_f1')->first()->value;
        $yeu_cau_f1_2 =Setting::where('name', 'yeu_cau_f1_2')->first()->value;
        $hoan_phi_f1_2 =Setting::where('name', 'hoan_phi_f1_2')->first()->value;
        //
        $today = Carbon::now();
        //người giới thiệu
        $f1_admin = Admin::find($f1_id);
        $invite_admin = Admin::find($id);
        DB::beginTransaction();
        try{
            if($invite_admin){
                //số tiền ban đầu
                $vi_tien_old = $invite_admin->vi_tien;
                //kiểm tra xem nếu invite_admin có 5f1 trực tiếp hoặc 10f1 trước tiếp
                if($invite_admin->invite_total>$yeu_cau_f1){
                    if($invite_admin->invite_total>$yeu_cau_f1_2){
                        $invite_admin->update(['vi_tien' => $vi_tien_old + $hoan_phi_f1_2*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
                            'receiver_id'=>$id,
                            'type'=>2,
                            'amount'=> $hoan_phi_f1_2*$money/100,
                            'note' => 'hoàn tiền f1 trực tiếp từ'. $f1_admin->name,
                            'created_at'=>$today
                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>2,

                        ]);
                    }
                    else{
                        $invite_admin->update(['vi_tien' => $vi_tien_old + $hoan_phi_f1*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
                            'receiver_id'=>$id,
                            'type'=>2,
                            'amount'=>  $hoan_phi_f1*$money/100,
                            'note' => 'hoàn tiền f1 trực tiếp từ'. $f1_admin->name,
                            'created_at'=>$today
                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today
                        ]);
                    }

                }
            }
            DB::commit();
//            return true;

        }
        catch(\Exception $e){
            DB::rollBack();
//            return false;
        }

    }
    public function view(Request $request)
    {
        $where = $this->filterSimple($request);
        $listItem = $this->model->whereRaw($where);
        $listItem = $this->quickSearch($listItem, $request);
        if ($this->whereRaw) {
            $listItem = $listItem->whereRaw($this->whereRaw);
        }
//        $listItem = $this->appendWhere($listItem, $request);

        //  Export
        if ($request->has('export')) {
            $this->exportExcel($request, $listItem->take(9000)->get());
        }

        //  Sort
        $listItem = $this->sort($request, $listItem);

        $data['record_total'] = $listItem->count();
        $data = $this->thongKe($data, $listItem, $request);

        if ($request->has('limit')) {
            $data['listItem'] = $listItem->paginate($request->limit);
            $data['limit'] = $request->limit;
        } else {
            $data['listItem'] = $listItem->paginate($this->limit_default);
            $data['limit'] = $this->limit_default;
        }
        $data['page'] = $request->get('page', 1);

        $data['param_url'] = $request->all();

        //  Get data default (param_url, filter, module) for
        $data['module'] = [
            'code' => 'package',
            'table_name' => 'package',
            'label' => 'package',
            'modal' => '\App\Modules\Logistics\Models\Package',
            'list' => [
                ['name' => 'code', 'type' => 'text', 'label' => 'RG CODE'],
                ['name' => 'contact', 'type' => 'text', 'label' => 'CONTACT'],
                ['name' => 'address', 'type' => 'text', 'label' => 'ADDRESS'],
                ['name' => 'sentdate', 'type' => 'text', 'label' => 'SENT DATE'],
                ['name' => 'tracking', 'type' => 'text', 'label' => 'TRACKING'],
                ['name' => 'service', 'type' => 'text', 'label' => 'SERVICE'],
                ['name' => 'bill', 'type' => 'text', 'label' => 'BILL/INVOICE'],
            ]
        ];
        $data['quick_search'] = $this->quick_search;
        $data['filter'] = $this->filter;

        //  Set data for seo
        $data['page_title'] = $this->module['label'];
        $data['page_type'] = 'list';

        return view('Logistics.package.view')->with($data);
    }

    public function appendWhere($query, $request)
    {
//        dd('khôi');
//        if (!CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'view_all_data')) {
//            $query = $query->where('admin_id', \Auth::guard('admin')->user()->id);
//        }
        return $query;
    }
    public function appendWhereChild($query, $request)
    {
        //dd('khôi');
        $admin_id = \Auth::guard('admin')->user()->id;
        //các thành viên con
        $admin_child_id = Admin::where('parent_id',$admin_id)->pluck('id')->toArray();
        if (!CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'view_all_data')) {
            $query = $query->whereIn('admin_id', $admin_child_id);
        }
        return $query;
    }
    public function formupdate($id)
    {
        $bill = \App\Modules\Post\Models\Bill::where('id', $id)->first();
        if($bill->type == 'doc'){
            return view('Affiliate.bill.doc_hoa_don', compact('bill'));
        }else{
            $backdetail = BackDetail::where('bill_id', $id)->get();
            $invoice = \App\Modules\Post\Models\Invoice::where('bill_id', $id)->get();
            return view('Affiliate.bill.pack_hoa_don', compact('bill', 'backdetail', 'invoice'));
        }


    }

    //  Xử lý tag
    public function xulyTag($post_id, $data)
    {
        $id_updated = [];
        $tags = json_decode($data['tags']);

        if (is_array($tags) && !empty($tags)) {
            foreach ($tags as $tag_name) {
                $tag_name = $tag_name->value;
                //  Tạo tag nếu chưa có
                $tag = Tag::where('name', $tag_name)->first();
                if (!is_object($tag)) {
                    $tag = new Tag();
                    $tag->name = $tag_name;
                    $tag->slug = str_slug($tag_name, '-');
                    $tag->type = 'code';
                    $tag->save();
                }


                $post_tag = PostTag::updateOrCreate([
                    'post_id' => $post_id,
                    'tag_id' => $tag->id,
                ], [
                    'multi_cat' => $data['multi_cat']
                ]);
                $id_updated[] = $post_tag->id;
            }
        }
        //  Xóa tag thừa
        PostTag::where('post_id', $post_id)->whereNotIn('id', $id_updated)->delete();

        return true;
    }

    public function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            if ($request->doc !== null) {
                // dd($request->all());
                $hoadon = HoaDon::where('id', $id)->update([
                    'services' => $request->dichvuvanchuyen,
                    'ref_code' => $request->refcode,
                    'hawb_code' => $request->hawbCode,
                    'bill_up_id' => $request->rgcode,
                    'number_commodity' => $request->sokien,
                    'weight' => $request->cannang,
                    'type' => 'doc',
                    'send_company_name' => $request->congtygui,
                    'sender_name' => $request->nguoilhgui,
                    'sender_address' => $request->diachilienhegui,
                    'sender_tel' => $request->sdtgui,
                    'email' => $request->emailgui,
                    'receiver_company' => $request->congtynhan,
                    'receiver_name' => $request->nguoilhnhan,
                    'receiver_tel' => $request->sdtnhan,
                    'country' => $request->quocgianhan,
                    'postal_code' => $request->mabuuchinh,
                    'city' => $request->thanhpho,
                    'province' => $request->tinh,
                    'receiver_address1' => $request->diachinhan1,
                    'receiver_address2' => $request->diachinhan2,
                    'receiver_address3' => $request->diachinhan3
                ]);
                if ($hoadon !== null) {
                    \DB::commit();
                    CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    return redirect()->back();
                } else {
                    \DB::rollback();
                    CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    return redirect()->back();
                }

            } else {
                $hoadon = HoaDon::where('id', $id)->update([
                    'services' => $request->dichvuvanchuyen,
                    'ref_code' => $request->refcode,
                    'totalCharfedWeight'=>$request->totalCharfedWeight,
                    'totalNumberPack'=>$request->totalNumberPack,
                    'hawb_code' => $request->hawbCode,
                    'bill_up_id' => $request->rgcode,
                    'content' => $request->tenhang,
                    'invoice_value' => $request->giatrikhaibao,
                    'type' => 'pack',
                    'send_company_name' => $request->congtygui,
                    'sender_name' => $request->nguoilhgui,
                    'sender_address' => $request->diachilienhegui,
                    'sender_tel' => $request->sdtgui,
                    'email' => $request->emailgui,
                    'receiver_company' => $request->congtynhan,
                    'receiver_name' => $request->nguoilhnhan,
                    'receiver_tel' => $request->sdtnhan,
                    'country' => $request->quocgianhan,
                    'postal_code' => $request->mabuuchinh,
                    'city' => $request->thanhpho,
                    'province' => $request->tinh,
                    'receiver_address1' => $request->diachinhan1,
                    'receiver_address2' => $request->diachinhan2,
                    'receiver_address3' => $request->diachinhan3,
                    'export_as' => $request->invoiceExportFormat
                ]);
                if ($hoadon !== null) {
                    $quantitypack = $request->quantitypack;
                    $typeback = $request->typeback;
                    $lengthpack = $request->lengthpack;
                    $widthpack = $request->widthpack;
                    $heightpack = $request->heightpack;
                    $weightpack = $request->weightpack;
                    $tlquydoi = $request->tlquydoi;
                    $tltinh = $request->tltinh;
                    PackDetail::where('bill_id', $id)->delete();
                    Invoice::where('bill_id', $id)->delete();
                    foreach ($quantitypack as $key => $item) {
                        PackDetail::create([
                            'bill_id' => $id,
                            'quantity' => $item,
                            'type' => $typeback[$key],
                            'length' => $lengthpack[$key],
                            'width' => $widthpack[$key],
                            'height' => $heightpack[$key],
                            'weight' => $weightpack[$key],
                            'converted_weight' => $tlquydoi[$key],
                            'charged_weight' => $tltinh[$key]
                        ]);
                    }

                    $description = $request->description;
                    $quantityinvoice = $request->quantityinvoice;
                    $unitinvoice = $request->unitinvoice;
                    $unitPriceinvoice = $request->unitPriceinvoice;
                    $subTotalinvoice = $request->subTotalinvoice;
                    foreach ($description as $key => $item) {
                        Invoice::create([
                            'bill_id' => $id,
                            'goods_detail' => $item,
                            'quantity' => $quantityinvoice[$key],
                            'unit' => $unitinvoice[$key],
                            'price' => $unitPriceinvoice[$key],
                            'total_value' => $subTotalinvoice[$key]
                        ]);
                    }
                    \DB::commit();
                    CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    return redirect()->back();
                } else {
                    \DB::rollback();
                    CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    return redirect()->back();
                }
            }

        } catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function getPublish(Request $request)
    {
        try {

            $item = $this->model->find($request->id);

            if (!is_object($item))
                return response()->json([
                    'status' => false,
                    'msg' => 'Không tìm thấy bản ghi'
                ]);

            if ($item->{$request->column} == 0)
                $item->{$request->column} = 1;
            else
                $item->{$request->column} = 0;

            $item->save();
//            dd('khôi');
//            return redirect()->back()->withInput();
            return response()->json([
                'status' => true,
                'published' => $item->{$request->column} == 1 ? true : false
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'published' => null,
                'msg' => 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.'
            ]);
        }
    }

    public function delete(Request $request)
    {
        try {
//            PackDetail::where('bill_id', $request->id)->delete();
//            Invoice::where('bill_id', $request->id)->delete();
            $item = $this->model->find($request->id);
            $item->delete();

            CommonHelper::one_time_message('success', 'Xóa thành công!');
            return redirect('admin/' . $this->module['code']);
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return back();
        }
    }

    public function multiDelete(Request $request)
    {
        try {

            $ids = $request->ids;
            if (is_array($ids)) {
                $this->model->whereIn('id', $ids)->delete();
            }
            CommonHelper::one_time_message('success', 'Xóa thành công!');
            return response()->json([
                'status' => true,
                'msg' => ''
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'msg' => 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên'
            ]);
        }
    }

    public function exportExcel($request, $data)
    {
        \Excel::create(Str::slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($excel) use ($data) {

            // Set the title
            $excel->setTitle($this->module['label'] . ' ' . date('d m Y'));

            $excel->sheet(Str::slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($sheet) use ($data) {

                $field_name = [];
                foreach ($this->getAllFormFiled() as $field) {
                    if (!isset($field['no_export']) && isset($field['label'])) {
                        $field_name[] = $field['label'];
                    }
                }
                $field_name[] = 'Tài khoản mua';
                $field_name[] = 'Gói';
                $field_name[] = 'Số điểm';
                $field_name[] = 'Tên người nhận';
                $field_name[] = 'Sdt nhận';
                $field_name[] = 'Địa chỉ nhận';
                $field_name[] = 'Ghi chú';
                $field_name[] = 'Ngày mua';
                //   thêm cột tỉnh / huyện / xã
//                $field_name[] = 'Tỉnh';
//                $field_name[] = 'Huyện';
//                $field_name[] = 'Xã';
//                $field_name[] = 'Tạo lúc';
//                $field_name[] = 'Cập nhập lần cuối';

                $sheet->row(1, $field_name);

                $k = 2;

                foreach ($data as $value) {
                    $data_export = [];
//                    $data_export[] = $value->id;
                    foreach ($this->getAllFormFiled() as $field) {
                        if (!isset($field['no_export']) && isset($field['label'])) {
                            try {
                                if ($field['label'] == 'Mô tả chi tiết') {
                                    $dataInput = $value->{$field['name']};
                                    $data_export[] = strip_tags($dataInput);
                                } elseif (in_array($field['type'], ['text', 'number', 'textarea', 'textarea_editor', 'date', 'datetime-local', 'email', 'hidden', 'checkbox', 'textarea_editor', 'textarea_editor2', 'custom', 'radio', 'price_vi'])) {
                                    if (in_array(CommonHelper::getRoleName(\Auth::guard('admin')->user()->id, 'name'), ['cvkd_parttime'])) {
                                        if ($field['label'] == 'Địa chỉ chi tiết') {
                                            $data_export[] = '--Đã ẩn đối với quyền cvkd parttime--';
                                        } else {
                                            $data_export[] = $value->{$field['name']};
                                        }
                                    } else {
                                        $data_export[] = $value->{$field['name']};
                                    }
                                } elseif (in_array($field['type'], [
                                    'relation', 'select_model', 'select2_model', 'select2_ajax_model', 'select_model_tree',

                                ])) {
                                    $data_export[] = @$value->{$field['object']}->{$field['display_field']};
                                } elseif ($field['type'] == 'select') {
                                    $data_export[] = @$field['options'][$value->{$field['name']}];
                                } elseif (in_array($field['type'], ['file', 'file_editor2'])) {
                                    $data_export[] = \URL::asset('public/filemanager/userfiles/' . @$value->{$field['name']});
                                } elseif (in_array($field['type'], ['file_editor_extra'])) {
                                    $items = explode('|', @$value->{$field['name']});
                                    foreach ($items as $item) {
                                        $data_export[] = \URL::asset('public/filemanager/userfiles/' . @$item) . ' | ';
                                    }
                                } else {
                                    $data_export[] = $field['label'];
                                }
                            } catch (\Exception $ex) {
                                $data_export[] = $ex->getMessage();
                            }
                        }
                    }
                    $data_export[] = @$value->admin['name'];
                    $data_export[] = @$value->goi_dich_vu['name'];
                    $data_export[] = @$value->total_price;
                    $data_export[] = @$value->receive_user;
                    $data_export[] = @$value->receive_phone;
                    $data_export[] = @$value->receive_address;
                    $data_export[] = @$value->note;
                    $data_export[] = @$value->created_at;
                    //  xuất ra tỉnh / huyện / xã
//                    $data_export[] = @$value->province->name;
//                    $data_export[] = @$value->district->name;
//                    $data_export[] = @$value->ward->name;
//                    $data_export[] = @$value->created_at;
//                    $data_export[] = @$value->updated_at;
                    // dd($this->getAllFormFiled());
                    $sheet->row($k, $data_export);
                    $k++;
                }
            });
        })->download('xlsx');
    }

    public function ajaxGetInfo($id)
    {
        $data = $this->model->find($id);
        if (!is_object($data)) abort(404);
        $service = $data->service->name_vi;
        // tăng số lượt xem thêm 1
        $data->luot_xem += 1;
        $data->save();

        // lấy thông tin đầu chủ
        $dauchu = \App\Modules\Logistics\Models\Admin::query()->where('id', $data->admin_id)->first();
        $anhDauChu = asset('/filemanager/userfiles/' . $dauchu->image);


        //lay thong tin phong ban
        $phongban = \App\Modules\Logistics\Models\Phong_ban::query()->where('id', $dauchu->phong_ban_id)->first();

        $imagePath = asset('/filemanager/userfiles/' . $data->image);
        $anhSoDo = asset('/filemanager/userfiles/' . $data->so_do_va_hop_dong_chu_nha);
        // image chi tiet
        $imagePaths = explode('|', $data->image_extra);
        $fullPaths = array_map(function ($path) {
            return asset('/filemanager/userfiles/' . $path);
        }, $imagePaths);

        // image sổ đỏ và hợp đồng với chủ nhà
        $imageRedBook = explode('|', $data->so_do_va_hop_dong_chu_nha);
        $imageRedBooks = array_map(function ($path) {
            return asset('/filemanager/userfiles/' . $path);
        }, $imageRedBook);


        $show = true;
        if ($data->admin_id == \Auth::guard('admin')->user()->id || \Auth::guard('admin')->user()->super_admin == 1 || CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'hcns_195')) {
            $show = true;
        } else {
            $show = false;
        }
        return response()->json([
            'status' => true,
            'data' => $data,
            'service' => $service,
            'imageRedBooks' => $imageRedBooks,
            'imagePaths' => $fullPaths,
            'dauchu' => $dauchu,
            'anhDauChu' => $anhDauChu,
            'phongban' => $phongban,
            'show' => $show
        ]);

    }

    public function ajaxGetImage($id)
    {
//        $data = $id;
        $data = $this->model->find($id);
        $imagePaths = explode('|', $data->image_extra);
        $fullPaths = array_map(function ($path) {
            return asset('/filemanager/userfiles/' . $path);
        }, $imagePaths);
        return Response()->json([
            'data' => $data,
            'fullPaths' => $fullPaths
        ]);
    }

}
