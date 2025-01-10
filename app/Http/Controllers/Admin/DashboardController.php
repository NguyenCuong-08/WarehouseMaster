<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CommonHelper;
use App\Models\Admin;
use App\Models\District;
use App\Models\Ward;
use App\Modules\Affiliate\Models\Bill;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Mail;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $existingAdminIds = Admin::pluck('id')->toArray();

        // Lấy danh sách các bill có admin_id không tồn tại trong bảng admins
        $billsWithNonExistentAdmin = Bill::whereNotIn('admin_id', $existingAdminIds)->get();
//        dd($billsWithNonExistentAdmin);
        $data['module'] = [
            'code' => 'dashboard',
        ];
        $data['page_title'] = 'Thống kê';
        $data['page_type'] = 'list';

//        $data['tong_doanh_so'] = Bill::where('first_order', 1)->sum('total_price');
//        $data['tong_tien_don_tai'] = Bill::where('first_order', 0)->sum('total_price');
//        $data['tong_so_don_mua_moi']= Bill::where('first_order', 1)->count();
//        $data['tong_so_don_mua_tai']= Bill::where('first_order', 0)->count();
//        $data['tong_thu'] = $data['tong_doanh_so'] + $data['tong_tien_don_tai'];
//        $data['tong_chi'] = LichSuGiaoDich::where('type', 2)->sum('amount');
        $start_date = request()->start_date??'2024-07-01';
        $end_date = request()->end_date??\Carbon\Carbon::now()->format('Y-m-d');
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        // Chuyển đổi start_date thành bắt đầu từ 00:00
        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay()->format('Y-m-d H:i:s');
// Chuyển đổi end_date thành kết thúc vào 23:59
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay()->format('Y-m-d H:i:s');
        //        if(){
//            dd('khôi');
            $data['tong_doanh_so'] = Bill::where('first_order', 1)->whereBetween('created_at', [$start_date, $end_date])->where('company_id', 1)->sum('total_price');
            $data['tong_tien_don_tai'] = Bill::where('first_order', 0)->whereBetween('created_at', [$start_date, $end_date])->where('company_id', 1)->sum('total_price');
            $data['tong_so_don_mua_moi'] = Bill::where('first_order', 1)->whereBetween('created_at', [$start_date, $end_date])->where('company_id', 1)->count();
            $data['tong_so_don_mua_tai'] = Bill::where('first_order', 0)->whereBetween('created_at', [$start_date, $end_date])->where('company_id', 1)->count();
            $data['tong_thu'] =  $data['tong_doanh_so'] + $data['tong_tien_don_tai'];
            $data['tong_chi'] = LichSuGiaoDich::where('type', 2)->whereBetween('created_at', [$start_date, $end_date])->where('company_id', 1)->sum('amount');

//        }
        //lấy ra thông tin tài khoản đang đăng nhập
        $admin =\Auth()->guard('admin')->user();
        //lấy ra đơn của tài khoản đang đằng nhập
        $start_date_canhan = request()->start_date_ca_nhan ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $end_date_canhan = request()->end_date_ca_nhan ?? Carbon::now()->endOfMonth()->format('Y-m-d');
        $data['start_date_canhan'] = $start_date_canhan;
        $data['end_date_canhan'] = $end_date_canhan;
        $start_date_canhan = \Carbon\Carbon::parse($start_date_canhan)->startOfDay()->format('Y-m-d H:i:s');
        $end_date_canhan = \Carbon\Carbon::parse($end_date_canhan)->endOfDay()->format('Y-m-d H:i:s');
        $data['tong_so_don_ca_nhan'] = Bill::where('admin_id', $admin->id)->whereBetween('created_at', [$start_date, $end_date])->count();
        $data['tong_tien_don_ca_nhan'] = Bill::where('admin_id', $admin->id)->whereBetween('created_at', [$start_date, $end_date])->sum('total_price');
        //doanh thu tổng của nhánh cá nhân
        $data['doanh_thu_ca_nhan'] = $this->DoanhThuNhanhCaNhan($admin->id, $start_date_canhan, $end_date_canhan);
        $data['combo_ca_nhan'] = $this->ComboNhanhCaNhan($admin->id, $start_date_canhan, $end_date_canhan);
        //lấy ra 3 nhánh
        $admin_child = Admin::where('parent_id', $admin->id)->get();
        $index = 1;
        foreach($admin_child as $item){

            $data['doanh_so_nhanh_'.$index] = $this->DoanhThuNhanhCaNhan($item->id, $start_date_canhan, $end_date_canhan);
            $data['combo_nhanh_'.$index] = $this->ComboNhanhCaNhan($item->id, $start_date_canhan, $end_date_canhan);
            $index++;
        }

        //lấy 3 người có nhiều ngu gới thệu nhất
        $ids = Admin::getTopInviters()->pluck('invite_by')->toArray();
        $orderedIds = collect($ids)->mapWithKeys(function ($id, $index) {
            return [$id => $index];
        });

// Truy vấn các bản ghi theo danh sách ID và giữ thứ tự
        if (!empty($ids)) {
            $data['topInviters'] = Admin::whereIn('id', $ids)
                ->orderByRaw('FIELD(id, ' . implode(',', array_map('intval', $ids)) . ')')
                ->get();
        } else {
            $data['topInviters'] = collect(); // Trả về collection rỗng nếu không có ID nào
        }

        $first_day_of_current_month = date('Y-m-01 00:00:00');
        $first_day_of_next_month = date('Y-m-01 00:00:00', strtotime('first day of next month'));

        $start_date_thamgia = request()->start_date_ca_nhan ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $end_date_thamgia = request()->end_date_ca_nhan ?? Carbon::now()->endOfMonth()->format('Y-m-d');
        $data['start_date_thamgia'] = $start_date_thamgia;
        $data['end_date_thamgia'] = $end_date_thamgia;
        $data['so_thanh_vien_moi'] = Admin::whereBetween('ngay_tham_gia', [$start_date_thamgia, $end_date_thamgia])->count();
        $start_date_tong_hoa_hong = request()->start_date_tong_hoa_hong ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $end_date_tong_hoa_hong = request()->end_date_tong_hoa_hong ?? Carbon::now()->endOfMonth()->format('Y-m-d');
        $data['start_date_tong_hoa_hong'] = $start_date_tong_hoa_hong;
        $data['end_date_tong_hoa_hong'] = $end_date_tong_hoa_hong;
        $data['hoa_hong_phat_sinh'] = LichSuGiaoDich::whereBetween('created_at', [$start_date_thamgia, $end_date_thamgia])->where('type', 2)->sum('amount');
        $data['tien_da_rut'] = LichSuGiaoDich::whereBetween('created_at', [$start_date_thamgia, $end_date_thamgia])->where('note','like','%Rút tiền%')->sum('amount');

        return view(config('core.admin_theme') . '.dashboard', $data);
//        return view('ThuePhongZoom.zoom_meeting.add')->with($data);

    }
    public function DoanhThuNhanhCaNhan(int $admin_id,$start_date, $end_date){
        $arr_ids = [$admin_id];
        //lấy ra những ptu có parent_id là $admin_id;
        $this->getAdminChilds($admin_id, $arr_ids);
        //doanh thu nhánh cá nhân
        $doanhthu = Bill::whereIn('admin_id', $arr_ids)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->sum('total_price');
        return $doanhthu;
    }
    public function ComboNhanhCaNhan(int $admin_id, $start_date, $end_date){
        $arr_ids = [$admin_id];
        //lấy ra những ptu có parent_id là $admin_id;
        $this->getAdminChilds($admin_id, $arr_ids);
        //doanh thu nhánh cá nhân
        $total_combo = Bill::whereIn('admin_id', $arr_ids)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->sum('quantity');
        return $total_combo;
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
    public function changeTheme(Request $request)
    {
        \Cookie::queue('admin_theme_style', $request->style, 129600);
        CommonHelper::one_time_message('success', 'Đã đổi giao diện!');
        return back();
    }

    public function tooltipInfo(Request $request)
    {
        $modal = new $request->modal;
        $data['item'] = $modal->find($request->id);
        $data['tooltip_info'] = $request->tooltip_info;

        return view(config('core.admin_theme') . '.partials.modal.tooltip_info', $data);
    }

    public function ajax_up_file(Request $request)
    {
        if ($request->has('file')) {
            $fileRequest = $request->file;
            if (in_array($fileRequest->getClientOriginalExtension(), ['jpg', 'png', 'gif', 'jpeg'])) {
                $path = 'upload/' . date('Y/m/d');
                $base_path = public_path() . '/filemanager/userfiles/';
                $dir_name = $base_path . $path;
                if (!is_dir($dir_name)) {
                    // Tạo thư mục của chúng tôi nếu nó không tồn tại
                    mkdir($dir_name, 0777, true);
                }
                if (is_dir($dir_name)) {
                    $file = CommonHelper::saveFile($request->file('file'), $path);
                    return response()->json([
                        'status' => true,
                        'file' => '/public/filemanager/userfiles/' . $file,
                        'value' => $file,
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Sai định dạng ảnh, vui lòng chọn lại',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Không tồn tại file. xin vui  lòng thử lại',
            ]);
        }
    }

    public function ajax_up_file2(Request $request)
    {
        if ($request->has('file')) {
            if (is_array($request->file)) {
                foreach ($request->file as $key => $fileRequest) {
                    if (in_array($fileRequest->getClientOriginalExtension(), ['jpg', 'png', 'gif', 'jpeg'])) {
                        $path = 'upload/' . date('Y/m/d');
                        $base_path = public_path() . '/filemanager/userfiles/';
                        $dir_name = $base_path . $path;
                        if (!is_dir($dir_name)) {
                            // Tạo thư mục của chúng tôi nếu nó không tồn tại
                            mkdir($dir_name, 0777, true);
                        }
                        if (is_dir($dir_name)) {
                            $file = CommonHelper::saveFile($fileRequest, $path);
                            $img[] = [
                                'status' => true,
                                'file' => '/public/filemanager/userfiles/' . $file,
                                'value' => $file,
                                'msg' => 'Thành công !',
                            ];
                        }
                    } else {
                        $img[] = [
                            'status' => false,
                            'msg' => 'Không đúng định dạng !',
                        ];
                    }
                }
            } else {
                $fileRequest = $request->file;
                if (in_array($fileRequest->getClientOriginalExtension(), ['jpg', 'png', 'gif', 'jpeg'])) {
                    $path = 'upload/' . date('Y/m/d');
                    $base_path = public_path() . '/filemanager/userfiles/';
                    $dir_name = $base_path . $path;
                    if (!is_dir($dir_name)) {
                        // Tạo thư mục của chúng tôi nếu nó không tồn tại
                        mkdir($dir_name, 0777, true);
                    }
                    if (is_dir($dir_name)) {
                        $file = CommonHelper::saveFile($fileRequest, $path);
                        $img[] = [
                            'status' => true,
                            'file' => '/public/filemanager/userfiles/' . $file,
                            'value' => $file,
                            'msg' => 'Thành công !',
                        ];
                    }
                } else {
                    $img[] = [
                        'status' => false,
                        'msg' => 'Không đúng định dạng !',
                    ];
                }
            }

            return response()->json([
                'data' => $img
            ]);
        }
    }

    public function getDataLocation(Request $r, $table) {
//        dd('nguyen xuan tam');
        if ($table == 'districts') {
            $items = District::where('province_id', $r->province_id)->pluck('name', 'id');
        } elseif ($table == 'wards') {
            $items = Ward::where('district_id', $r->district_id)->pluck('name', 'id');
        }
        return response()->json([
            'status' => true,
            'msg' => '',
            'data' => $items
        ]);
    }


}
