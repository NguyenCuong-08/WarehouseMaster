<?php

namespace App\Modules\GoiDichVu\Controllers\Admin;

use App\Http\Middleware\AdminCommon;
use App\Models\District;
use App\Models\Province;
use App\Models\Setting;
use App\Models\Ward;
use App\Modules\GoiDichVu\Controllers\Admin\CURDBaseController;
use App\Modules\GoiDichVu\Models\Gift;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\LichSuGiaoDich\Models\SoDu;
use App\Modules\Post\Models\Bill;
use Illuminate\Http\Request;
use App\Modules\Affiliate\Helpers\CommonHelper;
//use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Validator;
use Carbon\Carbon;
use App\Models\Admin;
use DB;
class GoiDichVuController extends CURDBaseController
{

    protected $module = [
        'code' => 'goi_dich_vu',
        'table_name' => 'goi_dich_vu',
        'label' => 'Gói sản phẩm',
        'modal' => '\App\Modules\GoiDichVu\Models\GoiDichVu',
        'list' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Tên gói'],
            ['name' => 'price', 'type' => 'number', 'label' => 'Giá bán',],
//            ['name' => 'price_hoan_tien', 'type' => 'number', 'label' => 'Giá tính hoàn điểm',],
//            ['name' => 'old_price', 'type' => 'text', 'label' => 'Giá cũ',],
            ['name' => 'old_price', 'type' => 'number', 'label' => 'Giá gốc',],
            ['name' => 'description', 'type' => 'text', 'label' => 'Mô tả',],
            ['name' => 'type', 'type' => 'custom','td'=>'GoiDichVu.admin.status', 'label' => 'Loại',],
//            ['name' => 'note', 'type' => 'text', 'label' => 'Mô tả ngắn',],
//            ['name' => 'dv_thoi_gian', 'type' => 'text', 'label' => 'Đơn vị thời gian',],
//            ['name' => 'trang_thai', 'type' => 'custom','td'=>'ThuePhongZoom.tai_khoan_zoom.status', 'label' => 'Trạng thái',],
            ['name' => 'action', 'type' => 'custom', 'td'=>'GoiDichVu.admin.action', 'label' => 'Hành động',],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Tên gói', 'group_class' => 'col-md-12'],
//                ['name' => 'dv_thoi_gian', 'type' => 'text', 'class' => 'required', 'label' => 'Đơn vị thời gian', 'group_class' => 'col-md-4'],
                ['name' => 'price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá bán','group_class' => 'col-md-6'],
//                ['name' => 'price_hoan_tien', 'type' => 'text', 'class' => 'required', 'label' => 'Giá tính hoàn điểm','group_class' => 'col-md-6'],
//                ['name' => 'old_price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá cũ','group_class' => 'col-md-4'],
                ['name' => 'old_price', 'type' => 'text', 'class' => 'required', 'label' => 'Giá gốc','group_class' => 'col-md-6'],
                ['name' => 'description', 'type' => 'textarea', 'class' => 'required', 'label' => 'Thông tin gói','group_class' => 'col-md-12'],
//                ['name' => 'type', 'type' => 'select', 'class' => 'required', 'label' => 'Quà tặng','group_class' => 'col-md-12'],
                ['name' => 'type', 'type' => 'select', 'options' => [
                    '' => 'Loại',
                    1 => 'VIP',
                    2 => 'Đầu tư',
                ], 'label' => 'Loại','class' => 'required', 'group_class' => 'col-md-4', 'value' => ''],

//                ['name' => 'note', 'type' => 'textarea', 'class' => 'required', 'label' => 'Mô tả ngắn','group_class' => 'col-md-12'],
            ],
            'remind_tab' => [
                ['name' => 'image', 'type' => 'file_image', 'label' => 'Ảnh gói sản phẩm'],
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, type'
    ];

    protected $filter = [
//        'trang_thai' => [
//            'label' => 'Trạng thái',
//            'type' => 'select',
//            'options' => [
//                '' => 'Tất cả',
//                0 => 'Đang rảnh',
//                1 => 'Đang sử dụng',
//            ],
//            'query_type' => '='
//        ],
    ];



    public function getIndex(Request $request)
    {
        $data = $this->getDataList($request);
//        $this->billcheck();die();
        return view('GoiDichVu.admin.list')->with($data);
    }
    //update giá tiền khi thay đổi số lượng
    public function getDiscountInfo(Request $request)
    {
        $quantity = $request->input('quantity');
        $price = GoiDichVu::find($request->input('id'))->price;
        $list_quantity = Gift::orderBy('total_product', 'desc')->get();
        $discount = 0;

        foreach($list_quantity as $item){
            if($quantity>=$item->total_product){
                $discount = $item->gift_price;
                break;
            }
        }
        //bỏ chức năng triết khấu, nếu thêm chức năng triết khấu xóa dòng này là được
        $discount = 0;

        $discountedPrice = $price * $quantity - $discount;

        return response()->json([
            'discountedPrice' => $discountedPrice
        ]);
    }
    //hàm tạo lịch sử giao dịch
    public function createLichSuGiaoDich($senderId, $type, $adminId, $surplus, $amount, $note, $createdAt, $billId, $companyId)
    {
        return LichSuGiaoDich::create([
            'sender_id' => $senderId,
            'type' => $type,
            'admin_id' => $adminId,
            'surplus' => $surplus,
            'amount' => $amount,
            'note' => $note,
            'created_at' => $createdAt,
            'bill_id' => $billId,
            'company_id' => $companyId,
        ]);
    }
    public function muaGoi(Request $request, string $id)
    {
//        dd($request->all());
        try {
            \DB::beginTransaction();
            $quantity = $request->quantity;
            if($quantity<=0){
                return response()->json(['error'=>'Số lượng Combo phải lớn hơn 0']);
            }
            $admin_id =  \Auth::guard('admin')->user()->id;
            $companyId = \Auth::guard('admin')->user()->company_id;
            $goi_da_mua = GoiDichVu::find($id);
            $today = Carbon::now();

//            if(\Auth::guard('admin')->user()->vi_tien < $goi_da_mua->price){
//                return response()->json(['error'=>'Số dư ví không đủ']);
//            }


            //lấy ra thông tin hoàn phí cho từng nhóm
            $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
            $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
            $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
            $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
            $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
            $hoan_phi_nhom_sau = Setting::where('name', 'hoan_phi_nhom_sau')->first()->value;

            //lấy ra tài khoản người mua
            $admin_buy = \Auth::guard('admin')->user();
            $vi_tien = $admin_buy->vi_tien;
            if(!$vi_tien) $vi_tien =0;
           //lấy ra tổng tiền hóa đơn
            //0 là mua lần đầu, 1 là mua từ lần thứ 2
           if($request->re_purchase == 0){
               $total_bill =  $goi_da_mua->price * $quantity;
               $total_bill_hoan_tien = $goi_da_mua->price_hoan_tien * $quantity;
           }
           else{
               //
               $list_quantity = Gift::orderBy('total_product', 'desc')->get();
               $discount = 0;
               foreach($list_quantity as $item){
                   if($quantity>=$item->total_product){
                       $discount = $item->gift_price;
                       break;
                   }
               }
               //nếu cần chức năng triếu khấu giá, lại xóa bỏ dòng này là được
               $discount = 0 ;
               //
               $total_bill = $goi_da_mua->price * $quantity - $discount;
               $total_bill_hoan_tien = $goi_da_mua->price_hoan_tien * $quantity - $discount;
               //
//               dd($total_bill.'-'.$total_bill_hoan_tien);
           }

            //kiểm tra xem nếu số dư trong ví > số điểm mua gói
            if($vi_tien >= $total_bill){
                $admin_buy->update([
                    'vi_tien'=>$vi_tien - $total_bill,
                    'ngay_mua_don_cuoi'=>$today,
                    'status'=>1,
                ]);
                //địa chỉ giao hàng
                $province = Province::find($request->province)->name;
                $district = District::find($request->district)->name;
                $ward = Ward::find($request->ward)->name;

                $dia_chi_giao_hang = $request->address.'/'.$ward.'/'.$district.'/'.$province;
                //tạo hóa đơn và trừ tiền của ngời mua
                $new_bill=\App\Modules\Affiliate\Models\Bill::create([
                    'admin_id'=>$admin_id,
                    'goi_dich_vu_id' => $goi_da_mua->id,
//                    'total_price'=>$goi_da_mua->price,
                    'total_price'=>$total_bill,
//                    'total_price_hoan_tien'=>$goi_da_mua->price_hoan_tien,
                    'total_price_hoan_tien'=>$total_bill_hoan_tien,
                    'receive_user'=>$request->name,
                    'receive_address'=>$dia_chi_giao_hang,
                    'receive_phone'=>$request->phone,
                    'receive_email'=>$request->email,
                    'note'=>$request->notes,
                    'company_id'=>$companyId,
                    'quantity'=>$quantity,
                    'province_id'=>$request->province,
                    'district_id'=>$request->district,
                    'ward_id'=>$request->ward,
                ]);
                $lsgdct=LichSuGiaoDich::create([
                    'sender_id'=>$admin_buy->id,
                    'type'=>1,
                    'admin_id'=>$admin_buy->id,
                    'surplus'=>$admin_buy->vi_tien,
                    'amount'=> $total_bill,
                    'note' => 'Mua '.$goi_da_mua->name,
                    'created_at'=>$today,
                    'bill_id'=>$new_bill->id,
                    'company_id'=>$admin_buy->company_id,
                ]);
                SoDu::create([
                    'lsgd_id' =>$lsgdct->id,
                    'user_id'=>$admin_buy->id,
                    'surplus'=>$admin_buy->vi_tien,
                    'created_at'=>$today,
                    'type'=>1,
                ]);

                $count = CommonHelper::demSoThanhVienGioiThieu($admin_buy->id);
                if($count>=3){
                    $check = $admin_buy->update([
                        'vi_tien_status'=>1,
                    ]);
                }

                //thêm tài khoản vào cây thành viên
                $invite_by = $admin_buy->invite_by;
                $parentid = $admin_buy->parent_id;
                //nó có mã giới thiệu và chưa có parrent_id
                if(!$admin_buy->hasSuperAdminRole()){

                    if($invite_by && !$parentid){
                        //update lại first_order là 1 (mua lần đầu)
                        $new_bill->update([
                            'first_order'=>1,
                        ]);
                        $this->checkViTienStatusInviter($invite_by);
                        //nếu thg giới thiệu chưa vào cây thì sẽ tim từ thằng giới thiệu ra thằng giới thiệu
                        $id_dung_de_tim_cha = $this->TimNguoiGioiThieuDaVaoCay($invite_by);
                        $parent_id = $this->TimCha($id_dung_de_tim_cha);

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
                        if(!$invite_total_admin_invite){
                            $invite_total_admin_invite=0;
                        }
                        $invite_admin->update([
                            'invite_total'=> $invite_total_admin_invite + 1,
                        ]);

                    }

                    $parent_admin = Admin::find($admin_buy->parent_id);
                    $this->congTienChoNguoiGioiThieuNew($admin_buy->invite_by, $admin_buy->id, $new_bill->id);
                    if($parent_admin){
                        //cộng hoàn điểm cho 10 cấp độ
                        //cha(nhóm 1)
                        $this->congTienChoChaNew($parent_admin->id, $admin_buy->id, $new_bill->id);
                    }
                }
                \DB::commit();
                return response()->json(['success'=>'Mua gói thành công']);
            }
            \DB::rollback();
            return response()->json(['error'=>'Số dư ví không đủ']);

        }catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return response()->json(['error'=>'Duyệt thất bại'.$ex->getMessage()]);
        }
//        return response()->json(['success'=>'Mua thành công']);
    }
    //kiểm tra xem người giới thiệu có đủ 3 tài khoản giới thiệu đã mua gói không
    // nếu có thể cập nhật trạng thái v cho người giới thiệu thành 1
    //biến truyền vào là id người giới thiệu ra tài khoản mua gói
    //Tìm người giới thiệu đã vào cây
    public function TimNguoiGioiThieuDaVaoCay($id_nguoi_gioi_thieu){
        // Tìm người giới thiệu bằng ID
        $nguoi_gioi_thieu = Admin::find($id_nguoi_gioi_thieu);

        // Nếu không tìm thấy người giới thiệu, trả về admin mặc định (giá trị 1 trong trường hợp này)
        if (!$nguoi_gioi_thieu) {
            return 1;
        }

        // Nếu người giới thiệu là admin cấp cao (SuperAdmin), trả về ID của người giới thiệu
        if ($nguoi_gioi_thieu->hasSuperAdminRole()) {
            return $id_nguoi_gioi_thieu;
        }

        // Kiểm tra nếu người giới thiệu đã tham gia và có ngày mua đơn cuối
        if ($nguoi_gioi_thieu->ngay_tham_gia && $nguoi_gioi_thieu->ngay_mua_don_cuoi) {
            return $id_nguoi_gioi_thieu;
        }

        // Nếu không, đệ quy tiếp tục tìm người giới thiệu của người giới thiệu hiện tại
        return $this->TimNguoiGioiThieuDaVaoCay($nguoi_gioi_thieu->invite_by);
    }
    public function checkViTienStatusInviter($id){
    //lấy người giới thiệu
        $user_invite = Admin::find($id);
        //đếm số người mà người đó đã giới thiệu, nếu nó bằng 2(cộng thêm tài khoản này nữa là thành 3)
        //thì sẽ update vitien_status thành1
        if($user_invite->invite_total>=2 && $user_invite->ngay_tham_gia){
            $user_invite->update(['vi_tien_status'=> 1]);
        }
    }
//    public function TimCha($invite_by) {
//
//        $childs = $this->hoiDuCon($invite_by);
//        if (is_numeric($childs)) {
//            return $childs;
//        }
//
//        //  nếu đã đủ con rồi thì gọi tất cả con ra hỏi xem ai chưa đủ thì gán cho
//        //  gọi tất cả con ra
//        $next_generation = [];
//        //childs     =  mainguyeen,anhtuvuong,  tranthiphuog
//        foreach ($childs as $child) {
//            //  Kiểm tra từng người con xem có đủ con chưa
//            $data = $this->hoiDuCon($child->id);
//            if (is_numeric($data)) {
//                return $data;
//            }
//            //  Thu thập tất cả con để xét thế hệ tiếp theo
//            $next_generation[] = $child;
//        }
//        foreach ($next_generation as $child) {
////            dd($child);
//            $parent = $this->TimCha($child->id);
//            if (is_numeric($parent)) {
//                return $parent;
//            }
//        }
//        return null;
//    }
    public function TimCha($invite_by) {
        $tai_khoan_ban_dau = Admin::find($invite_by);
        $queue = [['id' => $invite_by, 'level' => $tai_khoan_ban_dau->level]];; // Khởi tạo hàng đợi với invite_by là phần tử đầu tiên
        $test=1;
        while (!empty($queue)) {
//            if(($test)==4) dd($queue);
            $current = array_shift($queue); // Lấy phần tử đầu tiên ra khỏi hàng đợi
            $childs = $this->hoiDuCon($current['id']);

            if (is_numeric($childs)) {

//                dd($queue);
                return $childs; // Nếu chưa đủ con, trả về ID
            }
            // Tạo một mảng để lưu trữ số con của mỗi tài khoản con
            $children_with_counts = [];

            // Lặp qua các con để lấy số con của chúng
            foreach ($childs as $child) {
                $num_children = $this->getNumChildren($child->id); // Lấy số con của tài khoản hiện tại
                $children_with_counts[] = ['id' => $child->id,
                    'num_children' => $num_children,
                    'original_position' => count($children_with_counts),
                    'level' => $child->level,

                ];

            }

            // Sắp xếp các tài khoản con theo số con tăng dần
//            usort($children_with_counts, function($a, $b) {
//                if ($a['num_children'] === $b['num_children']) {
//                    return $a['original_position'] - $b['original_position'];
//                }
//                return $a['num_children'] - $b['num_children'];
//            });

            // Thêm các tài khoản con đã sắp xếp vào hàng đợi
//            foreach ($children_with_counts as $child_with_count) {
//                $queue[] = $child_with_count['id'];
//            }
// Thêm tất cả con vào hàng đợi trước khi sắp xếp
            foreach ($children_with_counts as $child_with_count) {
                $queue[] = $child_with_count; // Thêm vào hàng đợi
            }

            // Sắp xếp hàng đợi theo level và số con sau khi đã thêm hết con
            usort($queue, function($a, $b) {
                if ($a['level'] === $b['level']) {
                    if ($a['num_children'] !== $b['num_children']) {
                        return $a['num_children'] - $b['num_children']; // Sắp xếp theo số con
                    }
                }
                return $a['level'] - $b['level'];
            });
            $test++;
        }

        return null; // Nếu duyệt hết mà không tìm thấy thì trả về null
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
    public function getNumChildren($admin_id) {
        return Admin::where('parent_id', $admin_id)
            ->where('status', 1)
            ->count();
    }
    public function congTienChoCha(string $id, string $admin_buy_id, string $nhom, float $goi_dich_vu_price, int $new_bill_id){
        //
        $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
        $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
        $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
        $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
        $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
        $hoan_phi_nhom_sau = Setting::where('name', 'hoan_phi_nhom_sau')->first()->value;
        //
        $bill = \App\Modules\Affiliate\Models\Bill::find($new_bill_id);
        $goi_dich_vu = GoiDichVu::find($bill->goi_dich_vu_id);
        $parent_admin = Admin::find($id);
        $admin_buy = Admin::find($admin_buy_id);
        $vi_tien_cha = $parent_admin->vi_tien;
        if($nhom == 1){
            $hoan_phi = $hoan_phi_nhom_mot;
            $amount = $hoan_phi_nhom_mot*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 2){
            $hoan_phi = $hoan_phi_nhom_hai;
            $amount = $hoan_phi_nhom_hai*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 3){

            $hoan_phi = $hoan_phi_nhom_ba;

            $amount = $hoan_phi_nhom_ba*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 4){
            $hoan_phi = $hoan_phi_nhom_bon;

            $amount = $hoan_phi_nhom_bon*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 5){
            $hoan_phi = $hoan_phi_nhom_nam;

            $amount = $hoan_phi_nhom_nam*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        else{
            $hoan_phi = $hoan_phi_nhom_sau;
            $amount = $hoan_phi_nhom_sau*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        $today = Carbon::now();
        $lsgd=LichSuGiaoDich::create([
            'receiver_id'=>$id,
            'type'=>2,
            'admin_id'=>$id,
            'surplus'=>$vi_tien_cha+$amount,
            'amount'=> $amount,
            'note' => 'hoàn điểm mua hàng từ thành viên nhóm '.$nhom.' ('.$hoan_phi.'%) '. $admin_buy->name.'( '.$admin_buy->tel.' ) mua '.$bill->quantity.' x '.$goi_dich_vu->name.' tổng giá :'.number_format($bill->total_price, 0, ',', ',').'- (tiền hoàn sẽ được tính : '.$hoan_phi.'% x '.number_format($bill->total_price_hoan_tien, 0, ',', ',').' )',
            'created_at'=>$today,
            'bill_id'=>$new_bill_id,
            'company_id'=>$admin_buy->company_id,

        ]);
        SoDu::create([
            'lsgd_id' =>$lsgd->id,
            'user_id'=>$parent_admin->id,
            'surplus'=>$parent_admin->vi_tien+$amount,
            'created_at'=>$today,
            'type'=>2,

        ]);
//        return true;
    }
    public function ThuHoi($admin_buy_id, $new_bill_id){
//        dd($admin_buy_id.' - '. $new_bill_id);
        DB::beginTransaction();
        try {

            $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
            $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
            $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
            $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
            $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
            $hoan_phi_nhom_sau = Setting::where('name', 'hoan_phi_nhom_sau')->first()->value;
            $admin_buy = Admin::find($admin_buy_id);
            $new_bill = Bill::find($new_bill_id);
            $total_bill_hoan_tien = $new_bill->total_price_hoan_tien;
//        dd($total_bill_hoan_tien.' - '. $new_bill_id);

            $parent_admin = Admin::find($admin_buy->parent_id);
            if($parent_admin){
                //cộng hoàn điểm cho 5 cấp độ
                //cha(nhóm 1)
                $this->ThuHoiTienCha($parent_admin->id, $admin_buy->id, '1', $total_bill_hoan_tien, $new_bill->id);
                if($parent_admin->invite_by) {
                    $this->ThuHoiTienChoNguoiGioiThieu($parent_admin->invite_by, $parent_admin->id, $hoan_phi_nhom_mot * $total_bill_hoan_tien / 100,$new_bill->id);
                }
                //nhóm 2
                if($parent_admin->parent_id){
                    $parent2_admin = Admin::find($parent_admin->parent_id);
                    if($parent2_admin){
                        $this->ThuHoiTienCha($parent2_admin->id, $admin_buy->id, '2', $total_bill_hoan_tien, $new_bill->id);
                        if($parent2_admin->invite_by){
                            $this->ThuHoiTienChoNguoiGioiThieu($parent2_admin->invite_by, $parent2_admin->id, $hoan_phi_nhom_hai*$total_bill_hoan_tien/100, $new_bill->id);
                        }
                        //nhóm 3
                        if($parent2_admin->parent_id){
                            $parent3_admin = Admin::find($parent2_admin->parent_id);
                            if($parent3_admin){
                                $this->ThuHoiTienCha($parent3_admin->id, $admin_buy->id, '3', $total_bill_hoan_tien, $new_bill->id);
                                if($parent3_admin->invite_by) {
                                    $this->ThuHoiTienChoNguoiGioiThieu($parent3_admin->invite_by, $parent3_admin->id, $hoan_phi_nhom_ba * $total_bill_hoan_tien / 100, $new_bill->id);
                                }
                                //nhóm 4
                                if($parent3_admin->parent_id){
                                    $parent4_admin = Admin::find($parent3_admin->parent_id);
                                    if($parent4_admin){
                                        $this->ThuHoiTienCha($parent4_admin->id, $admin_buy->id, '4', $total_bill_hoan_tien, $new_bill->id);
                                        if($parent4_admin->invite_by) {
                                            $this->ThuHoiTienChoNguoiGioiThieu($parent4_admin->invite_by, $parent4_admin->id, $hoan_phi_nhom_bon * $total_bill_hoan_tien / 100, $new_bill->id);
                                        }
                                        //nhóm 5
                                        if($parent4_admin->parent_id){
                                            $parent5_admin = Admin::find($parent4_admin->parent_id);
                                            if($parent5_admin){
                                                $this->ThuHoiTienCha($parent5_admin->id, $admin_buy->id, '5', $total_bill_hoan_tien, $new_bill->id);
                                                if($parent5_admin->invite_by){
                                                    $this->ThuHoiTienChoNguoiGioiThieu($parent5_admin->invite_by, $parent5_admin->id,  $hoan_phi_nhom_nam*$total_bill_hoan_tien/100, $new_bill->id);
                                                }
                                                //nhóm 6
                                                if($parent5_admin->parent_id){
                                                    $parent6_admin = Admin::find($parent5_admin->parent_id);
                                                    if($parent6_admin){
                                                        $this->ThuHoiTienCha($parent6_admin->id, $admin_buy->id, '6', $total_bill_hoan_tien, $new_bill->id);
                                                        if($parent6_admin->invite_by){
                                                            $this->ThuHoiTienChoNguoiGioiThieu($parent6_admin->invite_by, $parent6_admin->id,  $hoan_phi_nhom_sau*$total_bill_hoan_tien/100, $new_bill->id);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            DB::commit();
            dd('Thành công');
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollBack();
            // Log lỗi để debug
            \Log::error('ThuHoi Error: ' . $e->getMessage());
            // Hiển thị thông báo lỗi
            dd('Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
    public function congTienChoChaNew(string $id, string $admin_buy_id, int $new_bill_id){
        $bill = \App\Modules\Affiliate\Models\Bill::find($new_bill_id);
        $goi_dich_vu = GoiDichVu::find($bill->goi_dich_vu_id);
        $admin_buy = Admin::find($admin_buy_id); // Người mua
        $parent_admin = Admin::find($id); // Admin cấp cha đầu tiên
        $today = Carbon::now();
        $amount = 150000; // Mỗi cha được cộng 150k
        $count = 1;

        // Duyệt qua 10 cấp cha
        while ($parent_admin && $count <= 10) {
            // Cộng tiền cho cấp cha hiện tại
            $vi_tien_cha = $parent_admin->vi_tien;
            $parent_admin->update(['vi_tien' => $vi_tien_cha + $amount]);

            // Ghi nhận lịch sử giao dịch
            $lsgd = LichSuGiaoDich::create([
                'receiver_id' => $parent_admin->id,
                'type' => 2,
                'admin_id' => $parent_admin->id,
                'surplus' => $vi_tien_cha + $amount,
                'amount' => $amount,
                'note' => 'Thưởng học tập từ thành viên nhóm '.$count.' ('.number_format($amount, 0, ',', ',').' VNĐ) '. $admin_buy->name.'( '.$admin_buy->tel.' )',
                'created_at' => $today,
                'bill_id' => $new_bill_id,
                'company_id' => $admin_buy->company_id,
            ]);

            // Cập nhật số dư (SoDu) cho cấp cha hiện tại
            SoDu::create([
                'lsgd_id' => $lsgd->id,
                'user_id' => $parent_admin->id,
                'surplus' => $parent_admin->vi_tien,
                'created_at' => $today,
                'type' => 2,
            ]);

            // Tìm admin cấp cha tiếp theo
            $parent_admin = Admin::find($parent_admin->parent_id); // Lấy cha của cấp hiện tại

            $count++;
        }
//        return true;
    }
    public function congTienChoNguoiGioiThieuNew(string $id,  string $f1_id, int $new_bill_id){
        $today = Carbon::now();
        $f1_admin = Admin::find($f1_id);
        //người giới thiệu
        $invite_admin = Admin::find($id);
        DB::beginTransaction();
        try{
            if($invite_admin){
                //số điểm ban đầu
                $vi_tien_old = $invite_admin->vi_tien;
                $invite_admin->update(['vi_tien' => $vi_tien_old + 1000000]);
                $lsgd=LichSuGiaoDich::create([
                    'receiver_id'=>$id,
                    'type'=>2,
                    'admin_id'=>$id,
                    'surplus'=>$vi_tien_old + 1000000,
                    'hoan_f1'=>1,
                    'amount'=> 1000000,
                    'note' => 'Hoa Hồng trực tiếp mua hàng từ '. $f1_admin->name.'-'.$f1_admin->tel.' ('.number_format(1000000, 0, ',', ',').' VNĐ)',
                    'created_at'=>$today,
                    'bill_id'=>$new_bill_id,
                    'company_id'=>$invite_admin->company_id,

                ]);
                SoDu::create([
                    'lsgd_id' =>$lsgd->id,
                    'user_id'=>$invite_admin->id,
                    'surplus'=>$invite_admin->vi_tien,
                    'created_at'=>$today,
                    'type'=>2,

                ]);
            }
            DB::commit();
//            return true;

        }
        catch(\Exception $e){
            DB::rollBack();
//            return false;
        }
    }
    public function congTienChoNguoiGioiThieu(string $id, string $f1_id, float $money, int $new_bill_id){
        //
        $yeu_cau_f1 =Setting::where('name', 'yeu_cau_f1')->first()->value;
        $hoan_phi_f1 =Setting::where('name', 'hoan_phi_f1')->first()->value;
        $yeu_cau_f1_2 =Setting::where('name', 'yeu_cau_f1_2')->first()->value;
        $hoan_phi_f1_2 =Setting::where('name', 'hoan_phi_f1_2')->first()->value;
        //
        $today = Carbon::now();
        $f1_admin = Admin::find($f1_id);
        //người giới thiệu
        $invite_admin = Admin::find($id);
        DB::beginTransaction();
        try{
            if($invite_admin && $invite_admin->status == 1){
                //số điểm ban đầu
                $vi_tien_old = $invite_admin->vi_tien;
                //đếm so tai khoản giới thiệu được
                $count = CommonHelper::demSoThanhVienGioiThieu($id);
//                if($id==1){
//                    dd('đã vào admin : '.$count);
//                }
                //kiểm tra xem nếu invite_admin có 5f1 trực tiếp hoặc 10f1 trước tiếp
                if($count>=$yeu_cau_f1){
                    if($count>=$yeu_cau_f1_2){
                        $invite_admin->update(['vi_tien' => $vi_tien_old + $hoan_phi_f1_2*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
                            'receiver_id'=>$id,
                            'type'=>2,
                            'admin_id'=>$id,
                            'surplus'=>$vi_tien_old + $hoan_phi_f1_2*$money/100,
                            'hoan_f1'=>1,
                            'amount'=> $hoan_phi_f1_2*$money/100,
                            'note' => 'hoàn điểm f1 trực tiếp ('.$hoan_phi_f1_2.'%) từ '. $f1_admin->name.'-'.$f1_admin->tel.' ('.number_format($money, 0, ',', ',').')',
                            'created_at'=>$today,
                            'bill_id'=>$new_bill_id,
                            'company_id'=>$invite_admin->company_id,

                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>2,

                        ]);
                        if ($invite_admin->invite_by) {
                            $inviter = Admin::find($invite_admin->invite_by);
                            if($inviter){
                                $this->congTienChoNguoiGioiThieu($invite_admin->invite_by, $invite_admin->id, $hoan_phi_f1_2*$money/100, $new_bill_id);

                            }
                        }
                    }
                    else{
                        $invite_admin->update(['vi_tien' => $vi_tien_old + $hoan_phi_f1*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
                            'receiver_id'=>$id,
                            'type'=>2,
                            'admin_id'=>$id,
                            'surplus'=>$vi_tien_old + $hoan_phi_f1*$money/100,
                            'hoan_f1'=>1,
                            'amount'=>  $hoan_phi_f1*$money/100,
                            'note' => 'hoàn điểm f1 trực tiếp('.$hoan_phi_f1.'%) từ'. $f1_admin->name.'-'.$f1_admin->tel.' ('.number_format($money, 0, ',', ',').')',
                            'created_at'=>$today,
                            'bill_id'=>$new_bill_id,
                            'company_id'=>$invite_admin->company_id,


                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>2,

                        ]);
                        if ($invite_admin->invite_by) {
                            $inviter = Admin::find($invite_admin->invite_by);
                            if($inviter){
                                $this->congTienChoNguoiGioiThieu($invite_admin->invite_by, $invite_admin->id, $hoan_phi_f1*$money/100, $new_bill_id);

                            }
                        }
                    }
                    //tính xem nó có người giới thiệu  không


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
    public function ThuHoiTienChoNguoiGioiThieu(string $id, string $f1_id, float $money, int $new_bill_id){
        //
        $yeu_cau_f1 =Setting::where('name', 'yeu_cau_f1')->first()->value;
        $hoan_phi_f1 =Setting::where('name', 'hoan_phi_f1')->first()->value;
        $yeu_cau_f1_2 =Setting::where('name', 'yeu_cau_f1_2')->first()->value;
        $hoan_phi_f1_2 =Setting::where('name', 'hoan_phi_f1_2')->first()->value;
        //
        $new_bill = Bill::find($new_bill_id);
        $today = Carbon::now();
        $f1_admin = Admin::find($f1_id);
        //người giới thiệu
        $invite_admin = Admin::find($id);
        DB::beginTransaction();
        try{
            if($invite_admin && $invite_admin->status == 1){
                //số điểm ban đầu
                $vi_tien_old = $invite_admin->vi_tien;
                //đếm so tai khoản giới thiệu được
                $count = CommonHelper::demSoThanhVienGioiThieu($id, $new_bill->created_at);
//                if($id==1){
//                    dd('đã vào admin : '.$count);
//                }
                //kiểm tra xem nếu invite_admin có 5f1 trực tiếp hoặc 10f1 trước tiếp
                if($count>=$yeu_cau_f1){
                    if($count>=$yeu_cau_f1_2){
                        $invite_admin->update(['vi_tien' => $vi_tien_old - $hoan_phi_f1_2*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
//                            'receiver_id'=>$id,
                            'type'=>1,
                            'admin_id'=>$id,
                            'surplus'=>$vi_tien_old - $hoan_phi_f1_2*$money/100,
//                            'hoan_f1'=>1,
                            'amount'=> $hoan_phi_f1_2*$money/100,
                            'note' => 'Thu hồi điểm f1 trực tiếp ('.$hoan_phi_f1_2.'%) từ '. $f1_admin->name.'-'.$f1_admin->tel.' ('.number_format($money, 0, ',', ',').') do có sự dịch yêu cầu dịch chuyển thành viên của admin',
                            'created_at'=>$today,
                            'bill_id'=>$new_bill_id,
                            'company_id'=>$invite_admin->company_id,

                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>1,

                        ]);
                        if ($invite_admin->invite_by) {
                            $inviter = Admin::find($invite_admin->invite_by);
                            if($inviter){
                                $this->ThuHoiTienChoNguoiGioiThieu($invite_admin->invite_by, $invite_admin->id, $hoan_phi_f1_2*$money/100, $new_bill_id);

                            }
                        }
                    }
                    else{
                        $invite_admin->update(['vi_tien' => $vi_tien_old - $hoan_phi_f1*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
//                            'receiver_id'=>$id,
                            'type'=>1,
                            'admin_id'=>$id,
                            'surplus'=>$vi_tien_old - $hoan_phi_f1*$money/100,
//                            'hoan_f1'=>1,
                            'amount'=>  $hoan_phi_f1*$money/100,
                            'note' => 'Thu hồi điểm hoàn f1 trực tiếp('.$hoan_phi_f1.'%) từ'. $f1_admin->name.'-'.$f1_admin->tel.' ('.number_format($money, 0, ',', ',').')',
                            'created_at'=>$today,
                            'bill_id'=>$new_bill_id,
                            'company_id'=>$invite_admin->company_id,


                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>1,

                        ]);
                        if ($invite_admin->invite_by) {
                            $inviter = Admin::find($invite_admin->invite_by);
                            if($inviter){
                                $this->ThuHoiTienChoNguoiGioiThieu($invite_admin->invite_by, $invite_admin->id, $hoan_phi_f1*$money/100, $new_bill_id);

                            }
                        }
                    }
                    //tính xem nó có người giới thiệu  không


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
    public function ThuHoiTienCha(string $id, string $admin_buy_id, string $nhom, float $goi_dich_vu_price,  int $new_bill_id){
        //
        $hoan_phi_nhom_mot = Setting::where('name', 'hoan_phi_nhom_mot')->first()->value;
        $hoan_phi_nhom_hai = Setting::where('name', 'hoan_phi_nhom_hai')->first()->value;
        $hoan_phi_nhom_ba = Setting::where('name', 'hoan_phi_nhom_ba')->first()->value;
        $hoan_phi_nhom_bon = Setting::where('name', 'hoan_phi_nhom_bon')->first()->value;
        $hoan_phi_nhom_nam = Setting::where('name', 'hoan_phi_nhom_nam')->first()->value;
        $hoan_phi_nhom_sau = Setting::where('name', 'hoan_phi_nhom_sau')->first()->value;
        //
        $bill = \App\Modules\Affiliate\Models\Bill::find($new_bill_id);
        $goi_dich_vu = GoiDichVu::find($bill->goi_dich_vu_id);
        $parent_admin = Admin::find($id);
        $admin_buy = Admin::find($admin_buy_id);
        $vi_tien_cha = $parent_admin->vi_tien;
        if($nhom == 1){
            $hoan_phi = $hoan_phi_nhom_mot;
            $amount = $hoan_phi_nhom_mot*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha - $amount]);
        }
        elseif($nhom == 2){
            $hoan_phi = $hoan_phi_nhom_hai;
            $amount = $hoan_phi_nhom_hai*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha - $amount]);
        }
        elseif($nhom == 3){

            $hoan_phi = $hoan_phi_nhom_ba;

            $amount = $hoan_phi_nhom_ba*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha - $amount]);
        }
        elseif($nhom == 4){
            $hoan_phi = $hoan_phi_nhom_bon;

            $amount = $hoan_phi_nhom_bon*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha - $amount]);
        }
        elseif($nhom == 5){
            $hoan_phi = $hoan_phi_nhom_nam;

            $amount = $hoan_phi_nhom_nam*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha - $amount]);
        }
        else{
            $hoan_phi = $hoan_phi_nhom_sau;
            $amount = $hoan_phi_nhom_sau*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha - $amount]);
        }
        $today = Carbon::now();
        $lsgd=LichSuGiaoDich::create([
//            'receiver_id'=>$id,
            'type'=>1,
            'admin_id'=>$id,
            'surplus'=>$vi_tien_cha-$amount,
            'amount'=> $amount,
            'note' => 'Thu hồi điểm mua hàng (chuyển vị trí) từ thành viên nhóm '.$nhom.' ('.$hoan_phi.'%) '. $admin_buy->name.'( '.$admin_buy->tel.' ) mua '.$bill->quantity.' x '.$goi_dich_vu->name.' tổng giá :'.number_format($bill->total_price, 0, ',', ',').'- (tiền thu hồi sẽ được tính : '.$hoan_phi.'% x '.number_format($bill->total_price_hoan_tien, 0, ',', ',').' )',
            'created_at'=>$today,
            'bill_id'=>$new_bill_id,
            'company_id'=>$admin_buy->company_id,

        ]);
        SoDu::create([
            'lsgd_id' =>$lsgd->id,
            'user_id'=>$parent_admin->id,
            'surplus'=>$parent_admin->vi_tien-$amount,
            'created_at'=>$today,
            'type'=>1,

        ]);
//        return true;
    }
    public function checkHanMuaGoi(){



        // Lấy ngày hiện tại
        $now = Carbon::now();

        $so_ngay_khoa_vi = trim(Setting::where('name', 'so_ngay_khoa_vi')->value('value'));
        // Lấy tất cả admin
        $admins = Admin::all();

        foreach ($admins as $admin) {
            //lấy tài khoản người giới thiệu
            $invite_admin = Admin::find($admin->invite_by);
            $invite_total_admin_invite = $invite_admin->invite_total;
            //không có ngày mua đơn cuối chứng tỏ mới đăng kys
            if (!$admin->ngay_mua_don_cuoi){
                if($now->diffInDays(Carbon::parse($admin->created_at)) > $so_ngay_khoa_vi){
//                    $admin->status = '-1';
                    $admin->status = '0';
                    $admin->vi_tien_status = '0';
                    $admin->save();
                    $invite_admin->update([
                        'invite_total'=> $invite_total_admin_invite - 1,
                    ]);
                }

            }
            // Kiểm tra nếu ngày mua đơn cuối cách ngày hiện tại quá số ngày khóa ví
            if ($admin->ngay_mua_don_cuoi && $now->diffInDays(Carbon::parse($admin->ngay_mua_don_cuoi)) > $so_ngay_khoa_vi*2) {
                // Cập nhật trạng thái admin thành 'khóa'
//                $admin->status = '-1';
                $admin->status = '0';
                $admin->vi_tien_status = '0';
                $admin->save();
                $invite_admin->update([
                    'invite_total'=> $invite_total_admin_invite - 1,
                ]);
            }
        }
    }
    public function appendWhere($query, $request)
    {

        return $query;
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
    //gán ngày vào cây cho một số tài khoản đã có ngày mua đơn cuối nhưng ngày vào caay lại bị null\
    public function UpdateNgayVaoCay()
    {
        $list_admin = Admin::whereNotNull('ngay_mua_don_cuoi')
            ->whereNull('ngay_tham_gia')
            ->get();
        foreach ($list_admin as $item) {
            //do ngày mua đơn cuối dạng tdate
            $ngay_tham_gia = \Carbon\Carbon::parse($item->ngay_mua_don_cuoi)->startOfDay();
            $item->update([
                // Cập nhật ngày tham gia
                'ngay_tham_gia' => $ngay_tham_gia,
            ]);
        }
    }
    //cập nhật loại lịch sử giao dịch
    public function UpdateTypeLichSuGiaoDich(){
        $list = LichSuGiaoDich::where('note', 'LIKE', '%hoàn điểm%')->get();
        foreach ($list as $item) {
            $item->update([
                // Cập nhật ngày tham gia
                'type' => 2,
            ]);
        }
    }
    //bổ osung hóa đơn cho các tài khoản đã vào cây m chưa có hóa đơn
    public function UpdateBoSungHoaDon(){
        $list_admin = Admin::whereNotNull('ngay_tham_gia')
            ->doesntHave('bill')
            ->get();
        foreach($list_admin as $item){
            \App\Modules\Affiliate\Models\Bill::create([
                'admin_id'=>$item->id,
                'goi_dich_vu_id' => 5,
                'total_price'=>1450000,
                'total_price_hoan_tien'=>1400000,
                'receive_user'=>$item->name,
                'receive_address'=>$item->address,
                'receive_phone'=>$item->tel,
                'note'=>'Bổ sung',
                'company_id'=>1,
                'quantity'=>1,
                'created_at'=>$item->ngay_tham_gia,
                'updated_at'=>$item->ngay_tham_gia,
                'first_order'=>1,
            ]);
        }
    }

    //bù trừ hoàn tiền theo thay đổi mới
    //cấp 1: 40% - 40%
    //cấp 2: 2% - 5%
    //cấp 3: 2% - 10%
    //cấp 4: 2% - 5%
    //cấp 5: 13% - 13%
    public function HoanTienChinhSachMoi(){
        //lấy ra tất cả các đơn hàng
        $bill_list = Bill::where('created_at', '<', '2024-07-16')->get();;
        foreach($bill_list as $item){
            \DB::beginTransaction();
            try{
                $admin_buy = Admin::find($item->admin_id);
                //viết hàm riêng tính cho từng cấp
                //xét cấp 1: giữ nguyên
                //cấp 2: 2% - 5%
                //cấp 3: 2% - 10%
                //cấp 4: 2% - 5%
                //cấp 5: giu nguyên

                if($admin_buy->parent_id){
                    $cap_mot = Admin::find($admin_buy->parent_id);
                    if($cap_mot){
                        //cấp 1 giư nguyen, xét tiếp cấp 2
                        if($cap_mot->parent_id){
                            $cap_hai = Admin::find($cap_mot->parent_id);
                            if($cap_hai){
                                $this->BuTienChoCha($cap_hai->id, $admin_buy->id, '2', $item->total_price_hoan_tien, $item->id, 5);
                                if($cap_hai->invite_by){
                                    $this->BuTienChoNguoiGioiThieu($cap_hai->invite_by, $cap_hai->id, (5-2)*$item->total_price_hoan_tien/100, $item->id);
                                }
                                //nhóm 3
                                if($cap_hai->parent_id){
                                    $cap_ba = Admin::find($cap_hai->parent_id);
                                    if($cap_ba){
                                        $this->BuTienChoCha($cap_ba->id, $admin_buy->id, '3', $item->total_price_hoan_tien, $item->id, 10);
                                        if($cap_ba->invite_by) {
                                            $this->BuTienChoNguoiGioiThieu($cap_ba->invite_by, $cap_ba->id, (10-2) * $item->total_price_hoan_tien / 100, $item->id);
                                        }
                                        //nhóm 4
                                        if($cap_ba->parent_id){
                                            $cap_bon = Admin::find($cap_ba->parent_id);
                                            if($cap_bon){
                                                $this->BuTienChoCha($cap_bon->id, $admin_buy->id, '4', $item->total_price_hoan_tien, $item->id, 5);
                                                if($cap_bon->invite_by) {
                                                    $this->BuTienChoNguoiGioiThieu($cap_bon->invite_by, $cap_bon->id, (5-2) * $item->total_price_hoan_tien / 100, $item->id);
                                                }
                                                //nhóm 5 giữ ngueen
                                            }

                                        }
                                    }

                                }
                            }

                        }
                    }
                }
                \DB::commit();
            }catch (\Exception $e) {
                \DB::rollBack();
                \Log::error('Error updating policies for Bill ID: ' . $item->id . ' - ' . $e->getMessage());
            }


        }
    }
    //Bù Hoàn tiền cho người cha )
    public function BuTienChoCha(string $id, string $admin_buy_id, string $nhom, float $goi_dich_vu_price, int $new_bill_id, int $hoan_phi_moi){
        //
        $hoan_phi_nhom_mot = 40;
        $hoan_phi_nhom_hai = 2;
        $hoan_phi_nhom_ba = 2;
        $hoan_phi_nhom_bon = 2;
        $hoan_phi_nhom_nam = 13;
        //
        $parent_admin = Admin::find($id);
        $admin_buy = Admin::find($admin_buy_id);
        $vi_tien_cha = $parent_admin->vi_tien;
        $ngay_mua = \App\Modules\Affiliate\Models\Bill::find($new_bill_id)->created_at;
        if($nhom == 1){
            $hoan_phi = $hoan_phi_nhom_mot;
            $amount = $hoan_phi_nhom_mot*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 2){
            $hoan_phi = $hoan_phi_nhom_hai;
            $chenh_lech_hoan_phi = $hoan_phi_moi-$hoan_phi;
            $amount = ($hoan_phi_moi-$hoan_phi_nhom_hai)*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 3){

            $hoan_phi = $hoan_phi_nhom_ba;
            $chenh_lech_hoan_phi = $hoan_phi_moi-$hoan_phi;
            $amount = ($hoan_phi_moi-$hoan_phi_nhom_ba)*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        elseif($nhom == 4){
            $hoan_phi = $hoan_phi_nhom_bon;
            $chenh_lech_hoan_phi = $hoan_phi_moi-$hoan_phi;
            $amount = ($hoan_phi_moi-$hoan_phi_nhom_bon)*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        else{
            $hoan_phi = $hoan_phi_nhom_nam;
            $amount = $hoan_phi_nhom_nam*$goi_dich_vu_price/100;
            $parent_admin->update(['vi_tien'=>$vi_tien_cha + $amount]);
        }
        $today = Carbon::now();
        $lsgd=LichSuGiaoDich::create([
            'receiver_id'=>$id,
            'type'=>2,
            'admin_id'=>$id,
            'surplus'=>$vi_tien_cha,
            'amount'=> $amount,
            'note' => 'Bù hoàn điểm theo chính sách mới '.$hoan_phi.'% -> '.$hoan_phi_moi.'.Bù '.number_format($amount, 0, ',', ',').'('.$chenh_lech_hoan_phi.' % của đơn '.number_format($goi_dich_vu_price, 0, ',', ',').' do thành viên nhóm '.$nhom.' - '.$admin_buy->name.'( '.$admin_buy->tel.' ) mua ngày '.$ngay_mua.')',
            'created_at'=>$today,
            'bill_id'=>$new_bill_id,
            'company_id'=>$admin_buy->company_id,

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
    public function BuTienChoNguoiGioiThieu(string $id, string $f1_id, float $money, int $new_bill_id){
        //
        $yeu_cau_f1 =Setting::where('name', 'yeu_cau_f1')->first()->value;
        $hoan_phi_f1 =Setting::where('name', 'hoan_phi_f1')->first()->value;
        $yeu_cau_f1_2 =Setting::where('name', 'yeu_cau_f1_2')->first()->value;
        $hoan_phi_f1_2 =Setting::where('name', 'hoan_phi_f1_2')->first()->value;
        //ngày tạo đơn hàng
        $time = \App\Modules\Affiliate\Models\Bill::find($new_bill_id)->created_at;
        //
        $today = Carbon::now();
        $f1_admin = Admin::find($f1_id);
        //người giới thiệu
        $invite_admin = Admin::find($id);
        DB::beginTransaction();
        try{
            if($invite_admin && $invite_admin->status == 1){
                //số điểm ban đầu
                $vi_tien_old = $invite_admin->vi_tien;
                //đếm so tai khoản giới thiệu được
                $count = CommonHelper::demSoThanhVienGioiThieu($id, $time);
                //kiểm tra xem nếu invite_admin có 5f1 trực tiếp hoặc 10f1 trước tiếp
                if($count>=$yeu_cau_f1){
                    if($count>=$yeu_cau_f1_2){
                        $invite_admin->update(['vi_tien' => $vi_tien_old + $hoan_phi_f1_2*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
                            'receiver_id'=>$id,
                            'type'=>2,
                            'admin_id'=>$id,
                            'surplus'=>$vi_tien_old,
                            'hoan_f1'=>1,
                            'amount'=> $hoan_phi_f1_2*$money/100,
                            'note' => 'Bù hoàn điểm f1 trực tiếp ('.$hoan_phi_f1_2.'%).Bù '.number_format($hoan_phi_f1_2*$money/100, 0, ',', ',').' ('.$hoan_phi_f1_2.' % từ '. $f1_admin->name.'-'.$f1_admin->tel.' được bù ('.number_format($money, 0, ',', ',').') theo chính sách mới',
                            'created_at'=>$today,
                            'bill_id'=>$new_bill_id,
                            'company_id'=>$invite_admin->company_id,

                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>2,

                        ]);
                        if ($invite_admin->invite_by) {
                            $inviter = Admin::find($invite_admin->invite_by);
                            if($inviter){
                                $this->BuTienChoNguoiGioiThieu($invite_admin->invite_by, $invite_admin->id, $hoan_phi_f1_2*$money/100, $new_bill_id);

                            }
                        }
                    }
                    else{
                        $invite_admin->update(['vi_tien' => $vi_tien_old + $hoan_phi_f1*$money/100]);
                        $lsgd=LichSuGiaoDich::create([
                            'receiver_id'=>$id,
                            'type'=>2,
                            'admin_id'=>$id,
                            'surplus'=>$vi_tien_old,
                            'hoan_f1'=>1,
                            'amount'=>  $hoan_phi_f1*$money/100,
//                            'note' => 'Bù hoàn điểm f1 trực tiếp('.$hoan_phi_f1.'%) từ'. $f1_admin->name.'-'.$f1_admin->tel.' được bù ('.number_format($money, 0, ',', ',').') theo chính sách mới',
                            'note' => 'Bù hoàn điểm f1 trực tiếp ('.$hoan_phi_f1.'%).Bù '.number_format($hoan_phi_f1*$money/100, 0, ',', ',').' ('.$hoan_phi_f1.' % từ '. $f1_admin->name.'-'.$f1_admin->tel.' được bù ('.number_format($money, 0, ',', ',').') theo chính sách mới',

                            'created_at'=>$today,
                            'bill_id'=>$new_bill_id,
                            'company_id'=>$invite_admin->company_id,


                        ]);
                        SoDu::create([
                            'lsgd_id' =>$lsgd->id,
                            'user_id'=>$invite_admin->id,
                            'surplus'=>$invite_admin->vi_tien,
                            'created_at'=>$today,
                            'type'=>2,

                        ]);
                        if ($invite_admin->invite_by) {
                            $inviter = Admin::find($invite_admin->invite_by);
                            if($inviter){
                                $this->BuTienChoNguoiGioiThieu($invite_admin->invite_by, $invite_admin->id, $hoan_phi_f1*$money/100, $new_bill_id);

                            }
                        }
                    }
                    //tính xem nó có người giới thiệu  không


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
    public function getData($request) {
        //  Filter
        $where = $this->filterSimple($request);
        $listItem = $this->model->whereRaw($where);
        $listItem = $this->quickSearch($listItem, $request);
        if ($this->whereRaw) {
            $listItem = $listItem->whereRaw($this->whereRaw);
        }
        $listItem = $this->appendWhere($listItem, $request);

        //  Export
        if ($request->has('export')) {
            $this->exportExcel($request, $listItem->get());
        }

        //  Sort
        $listItem = $this->sort($request, $listItem);
        return $listItem;
    }
    public function getProvinces()
    {
        $provinces = Province::all();
//        dd($provinces);
        return response()->json(['success' => true, 'provinces' => $provinces]);
    }

    public function getDistricts($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->get();
        return response()->json(['success' => true, 'districts' => $districts]);
    }

    public function getWards($districtId)
    {
        $wards = Ward::where('district_id', $districtId)->get();
        return response()->json(['success' => true, 'wards' => $wards]);
    }
    public function getDataList(Request $request) {
        $listItem = $this->getData($request);

        $data['record_total'] = $listItem->count();

//        $data['tong_thu'] = $this->getData($request)->where('so_tien', '>', 0)->sum('price');
//        $data['tong_chi'] = $this->getData($request)->where('so_tien', '<', 0)->sum('price');

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

    public function add(Request $request)
    {
//        dd('khôi');

        try {
            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('GoiDichVu.admin.add')->with($data);
            } else if ($_POST) {
//                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'name' => 'required',
                ], [
//                    'name.required' => 'Bắt buộc phải nhập tên',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {

                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    $data['company_id'] = \Auth::guard('admin')->user()->company_id;
                    //  Tùy chỉnh dữ liệu insert

//                    $data['admin_id'] = \Auth::guard('admin')->user()->id;
                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
                        CommonHelper::flushCache();
                        CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                    } else {
                        CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                    }

                    if ($request->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $this->model
                        ]);
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request)
    {
        try {
            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);

                return view('GoiDichVu.admin.edit')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'name' => 'required',
//                    'link' => 'required',
                ], [
//                    'name.required' => 'Bắt buộc phải nhập tên gói',
//                    'link.unique' => 'Web này đã đăng!',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
//                    $data['ma_don'] = '|' . implode('|', $request->get('ma_don', [])) . '|';

                    foreach ($data as $k => $v) {
                        $item->$k = $v;
                    }

                    if ($item->save()) {
                        \DB::commit();
                        CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    } else {
                        \DB::rollback();
                        CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    }
                    if ($request->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $item
                        ]);
                    }

                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit/' . $item->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            \DB::rollback();
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }


    public function delete(Request $request)
    {
        try {
            $item = $this->model->find($request->id);

            $bill_id = $item->bill_id;

            $item->delete();

            CommonHelper::flushCache();
            CommonHelper::one_time_message('success', 'Xóa thành công!');

            return redirect('admin/' . $this->module['code']);
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return \App\CRMEdu\Controllers\Admin\back();
        }
    }

    public function multiDelete(Request $request)
    {
        try {
            $ids = $request->ids;
            if (is_array($ids)) {
                $this->model->whereIn('id', $ids)->delete();
            }
            CommonHelper::flushCache();
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
    public function takeDataImagePassPort($admin_id){
        $admin=Admin::find($admin_id);
        $totalData=0;
        $fileUserPath="filemanager/userfiles/anh_ho_chieu/".$admin_id;
        $fileItem=scandir($fileUserPath);
        foreach ($fileItem  as $a){
            if ($a !== '.' && $a !== '..'){
                if($a!=='anh_the') {
                    $fileItemPath = $fileUserPath . '/' . $a;
                    $months = scandir($fileItemPath);
                    foreach($months as $month){
                        if ($month !== '.' && $month !== '..'){
                            $monthPath = $fileItemPath . '/' . $month;
                            $days=scandir($monthPath);
                            foreach($days as $day){
                                if ($day !== '.' && $day !== '..'){
                                    $dayPath = $monthPath . '/' . $day;
                                    $images=scandir($dayPath);
                                    foreach($images as $image){
                                        if ($image !== '.' && $image !== '..'){
                                            $imagePath = $dayPath . '/' . $image;
                                            $totalData+=filesize($imagePath);
                                        }

                                    }

                                }
                            }
                        }
                    }
                }
                else{
                    $avatarPath = $fileUserPath . '/' . $a;
                    $years=scandir($avatarPath);
                    foreach($years as $year){
                        if ($year !== '.' && $year !== '..'){
                            $yearPath=$avatarPath. '/' . $year;
                            $months = scandir($yearPath);
                            foreach($months as $month){
                                if ($month !== '.' && $month !== '..'){
                                    $monthPath = $yearPath . '/' . $month;
                                    $days=scandir($monthPath);
                                    foreach($days as $day){
                                        if ($day !== '.' && $day !== '..'){
                                            $dayPath = $monthPath . '/' . $day;

                                            $images=scandir($dayPath);
                                            foreach($images as $image){
                                                if ($image !== '.' && $image !== '..'){
                                                    $imagePath = $dayPath . '/' . $image;
                                                    $totalData+=filesize($imagePath);
                                                }
                                            }

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $admin->dung_luong=$totalData/pow(1024,2);
        $admin->save();
    }
    public  function goiDichVuView(Request $request){
        $data = $this->getDataList($request);
        return view('GoiDichVu.admin.goi_dich_vu')->with($data);
    }
    public function register(Request $request){
        $admin_id = \Auth::guard('admin')->user()->id;
        $admin=Admin::find($admin_id);
        $goi_dich_vu_id=$request->goi_dich_vu_id;
        $goi_dich_vu=GoiDichVu::find($goi_dich_vu_id);
//        dd(isset($goi_dich_vu));
        if(isset($goi_dich_vu) && isset($admin) ){
            if($admin->vi_tien >=$goi_dich_vu->price ){
                $admin->vi_tien-=$goi_dich_vu->price;
                $admin->dung_luong_gioi_han+=$goi_dich_vu->value;
                $admin->save();
                $this->takeDataImagePassPort($admin_id);
                CommonHelper::flushCache();
                CommonHelper::one_time_message('success', 'Bạn đã mua gói thành công!');
            }
            else{
                CommonHelper::flushCache();
                CommonHelper::one_time_message('error', 'Số dư của quý khách không đủ, xin vui lòng nạp thêm điểm !');
                return redirect()->back();
            }
        }
        return redirect()->back();

    }




}
