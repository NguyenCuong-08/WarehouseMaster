<?php

namespace App\Modules\Product\Controllers\Admin;

use App\CRMEdu\Models\Service;
use App\CRMEdu\Models\Tag;
use App\Http\Middleware\AdminCommon;
use App\Models\District;
use App\Models\Province;
use App\Models\RoleAdmin;
use App\Models\Setting;
use App\Models\Ward;
use App\Modules\GoiDichVu\Controllers\Admin\CURDBaseController;
use App\Modules\GoiDichVu\Models\Gift;
use App\Modules\LichSuGiaoDich\Models\LichSuGiaoDich;
use App\Modules\LichSuGiaoDich\Models\SoDu;
use App\Modules\Post\Models\Bill;
use App\Modules\Product\Models\Category;
use App\Modules\Product\Models\DayHang;
use App\Modules\Product\Models\KeHang;
use App\Modules\Product\Models\LichSuLuanChuyen;
use App\Modules\Product\Models\OHang;
use App\Modules\Product\Models\OHangProduct;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\Slip;
use App\Modules\Product\Models\TangKe;
use App\Modules\Product\Models\XuatHang;
use Illuminate\Http\Request;
use App\Modules\Affiliate\Helpers\CommonHelper;

//use App\Http\Helpers\CommonHelper;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Validator;
use Carbon\Carbon;
use App\Models\Admin;

//use DB;
class XuatHangController extends CURDBaseController
{

    protected $module = [
        'code' => 'xuat_hang',
        'table_name' => 'xuat_hang',
        'label' => 'Thông tin chi tiết',
        'modal' => '\App\Modules\Product\Models\XuatHang',
        'list' => [
            ['name' => 'slip_id', 'type' => 'text', 'label' => 'đơn hàng'],
//            ['name' => 'user_phone', 'type' => 'text', 'label' => 'Số điện thoại'],
//            ['name' => 'product_id', 'type' => 'text', 'label' => 'Tên sản phẩm'],
            ['name' => 'slip_id', 'type' => 'product','object' => 'slip', 'label' => 'Tên sản phẩm','display_field' => 'name'],
            ['name' => 'o_hang_id', 'type' => 'relation','object' => 'oHang', 'label' => 'Ô hàng','display_field' => 'name'],
            ['name' => 'o_hang_id', 'type' => 'relation','object' => 'oHang', 'label' => 'Vị trí','display_field' => 'des'],
            ['name' => 'quantity', 'type' => 'text', 'label' => 'Số lượng'],
            ['name' => 'created_at', 'type' => 'text', 'label' => 'Thời gian'],
//            ['name' => 'category_id', 'type' => 'relation', 'object' => 'category', 'display_field' => 'name', 'label' => 'Danh mục sản phẩm'],
//            ['name' => 'action', 'type' => 'custom', 'td' => 'Product.list.td.action', 'label' => 'Hành động',],
        ],
        'form' => [
            'general_tab' => [
                ['id' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Tên sản phẩm', 'group_class' => 'col-md-12'],
//                ['name' => 'code', 'type' => 'text', 'class' => 'required', 'label' => 'Mã sản phẩm', 'group_class' => 'col-md-12'],
//                ['name' => 'price', 'type' => 'textarea', 'class' => 'required', 'label' => 'giá sản phẩm', 'group_class' => 'col-md-12'],
//                ['name' => 'category_id', 'type' => 'select2_model', 'class' => '', 'label' => 'Danh mục',
//                    'model' => Category::class, 'display_field' => 'name', 'group_class' => 'col-md-4'],
            ],
            'more_info_tab' => [
                ['name' => 'image', 'type' => 'file_image', 'label' => 'Ảnh'],
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
        $data['listItem'] = XuatHang::where('slip_id','=',$request->id)->get();
//        dd($request);
//        $this->bil\lcheck();die();
        return view('Product.slip.list')->with($data);
    }
    public function getDataList(Request $request)
    {
        $listItem = $this->getData($request);
//        dd($listItem);
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
    public function getData($request)
    {
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

    public function xuathang()
    {
        return view('KhoHang.xuat');
    }
    public function nhaptt(Request $request)
    {
        //kierm tra xem có sản phẩm nào có má như này ko , nếu ko có yêu cầu nhạp sản phẩm mới
        $product = Product::where('code', $request->code)->first();
        if ($product) {
            if(!$product->oHangProduct){
                CommonHelper::one_time_message('error', 'Không có sản phẩm trong kho');
//            return redirect()->route('nhap-hang')->with('product', $product);
//                $day_hang = DayHang::all();
//                return view('KhoHang.nhap-hang', ['day_hang' => $day_hang, 'product' => $product]);
                return redirect()->back();
            }else{
                CommonHelper::one_time_message('success', 'Check mã thành công, nhập thông tin nhập đơn');
//            return redirect()->route('nhap-hang')->with('product', $product);
//                $day_hang = DayHang::all();
                return view('KhoHang.nhaptt', ['product' => $product]);
            }

        } else {
            //bắn sang trang thém sản phẩm
            CommonHelper::one_time_message('error', 'Chưa tồn tại sản phẩm này, vui lòng tạo ra sản phảm đó');
            return redirect()->route('create-product');
        }
    }
    public function xuatdon(Request $request)
    {
//        dd($request->all());
//        dd('tam');
        $quantity = $request->quantity;
        $product = Product::where('code', $request->code)->first();
//        // Tìm OHangProduct với o_hang_id và product_id đã tồn tại
        $ohangProduct = OHangProduct::where('product_id', $product->id)->orderBy('created_at', 'asc')->get();

        if($ohangProduct->sum('quantity') >= $request->quantity){


            $slip = Slip::create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'user_name' => $request->name,
                'user_phone' => $request->phone,
            ]);
            foreach ($ohangProduct as $ohang) {
                if($quantity == 0) break;
                if($quantity>= $ohang->quantity){
                    $quantity -= $ohang->quantity;
                    XuatHang::create([
                       'slip_id' => $slip->id,
                        'quantity' => $ohang->quantity,
                        'o_hang_id' => $ohang->id,
                        'date' => $ohang->date_end,
                    ]);
                    $ohang->delete();
                }
                else{
                    XuatHang::create([
                        'slip_id' => $slip->id,
                        'quantity' => $quantity,
                        'o_hang_id' => $ohang->id,
                        'date' => $ohang->date_end,
                    ]);
                    $ohang->update([
                        'quantity' => $ohang->quantity-$quantity,
                    ]);
                    $quantity = 0;
                }
            }
            CommonHelper::one_time_message('success', 'Cập nhật thông tin thành công');
            return redirect()->route('lichsuxuat');
        }
        else{
            CommonHelper::one_time_message('error', 'Số lượng hàng còn trong kho không đủ');
            return view('KhoHang.nhaptt', ['product' => $product]);


        }


//        return view('KhoHang.nhap-hang', ['day_hang'=> $day_hang]);
    }




}
