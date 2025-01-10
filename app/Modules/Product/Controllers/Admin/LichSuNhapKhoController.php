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
use App\Modules\Product\Models\LichSuNhapKho;
//use App\Http\Helpers\CommonHelper;
use App\Modules\GoiDichVu\Models\GoiDichVu;
use Validator;
use Carbon\Carbon;
use App\Models\Admin;

//use DB;
class LichSuNhapKhoController extends CURDBaseController
{

    protected $module = [
        'code' => 'lich_su_nhap_kho',
        'table_name' => 'lich_su_nhap_kho',
        'label' => 'Lịch sử nhập kho',
        'modal' => '\App\Modules\Product\Models\LichSuNhapKho',
        'list' => [
            ['name' => 'product_id', 'type' => 'relation','object' => 'product','display_field' => 'name', 'label' => 'Sản phẩm'],
            ['name' => 'product_id', 'type' => 'relation','object' => 'product','display_field' => 'code', 'label' => 'Mã sản phẩm'],
//            ['name' => 'user_phone', 'type' => 'text', 'label' => 'Số điện thoại'],
//            ['name' => 'product_id', 'type' => 'text', 'label' => 'Tên sản phẩm'],
            ['name' => 'o_hang_id', 'type' => 'relation','object' => 'oHang', 'label' => 'Ô hàng','display_field' => 'name'],
            ['name' => 'quantity', 'type' => 'text', 'label' => 'Số lượng'],
            ['name' => 'date', 'type' => 'date_vi',   'label' => 'Thời gian'],
//            ['name' => 'product_id', 'type' => 'relation', 'object' => 'category', 'display_field' => 'name', 'label' => 'Danh mục sản phẩm'],
//            ['name' => 'action', 'type' => 'custom', 'td' => 'Product.list.td.action', 'label' => 'Hành động',],
        ],
        'form' => [
            'general_tab' => [
//                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Tên sản phẩm', 'group_class' => 'col-md-12'],
                ['name' => 'product_id', 'type' => 'text', 'class' => 'required', 'label' => 'Mã sản phẩm', 'group_class' => 'col-md-12'],
                ['name' => 'quantity', 'type' => 'number', 'class' => 'required', 'label' => 'Số lượng sản phẩm', 'group_class' => 'col-md-12'],
//                ['name' => 'o_hang_id', 'type' => 'text', 'class' => 'required', 'label' => 'Ô hàng', 'group_class' => 'col-md-12'],

//                ['name' => 'category_id', 'type' => 'select2_model', 'class' => '', 'label' => 'Danh mục',
//                    'model' => Category::class, 'display_field' => 'name', 'group_class' => 'col-md-4'],
            ]

        ]
    ];

    protected $quick_search = [
        'label' => 'Tên hoặc Mã sản phẩm',
        'fields' => 'name,code'  // Chỉ định cột name và code để tìm kiếm
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
//        'filter_date' => [
//            'label' => 'Lọc theo',
//            'type' => 'filter_date',
//            'options' => [
//                '' => '',
//                'created_at' => 'From Date',
////                'created_at' => 'To Date',
//            ],
//            'query_type' => 'filter_date'
//        ],
    ];

    public function getIndex(Request $request)
    {
        // Lấy dữ liệu đã qua lọc
        $data = $this->getDataList($request);
//dd($data);
        // Trả về view với dữ liệu đã lọc
        return view('Product.slip.list')->with($data);
    }

    public function exportExcel($request, $data)
    {
        \Excel::create(str_slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($excel) use ($data) {

            // Set the title
            $excel->setTitle($this->module['label'] . ' ' . date('d m Y'));

            $excel->sheet(str_slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($sheet) use ($data) {

                $field_name = ['ID'];
                foreach ($this->getAllFormFiled() as $field) {
                    if (!isset($field['no_export']) && isset($field['label'])) {
                        $field_name[] = $field['label'];
                    }
                }
                $field_name[] = 'Ô hàng';
                $field_name[] = 'Tên sản phẩm';
                $field_name[] = 'ảnh sản phẩm';
                $field_name[] = 'Tạo lúc';
                $field_name[] = 'Cập nhập lần cuối';

                $sheet->row(1, $field_name);

                $k = 2;

                foreach ($data as $value) {
                    $data_export = [];
                    $data_export[] = $value->id;
                    foreach ($this->getAllFormFiled() as $field) {
                        if (!isset($field['no_export']) && isset($field['label'])) {
                            try {
                                if (in_array($field['type'], ['text', 'number', 'textarea', 'textarea_editor', 'date', 'datetime-local', 'email', 'hidden', 'checkbox', 'textarea_editor', 'textarea_editor2'])) {
                                    $data_export[] = $value->{$field['name']};
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
                    $data_export[] = @$value->oHang->name;
                    $data_export[] = @$value->product->name;
                    $data_export[] = @$value->product->image;

                    $data_export[] = @$value->created_at;
                    $data_export[] = @$value->updated_at;
                    // dd($this->getAllFormFiled());
                    $sheet->row($k, $data_export);
                    $k++;
                }
            });
        })->download('xlsx');
    }

    public function getDataList(Request $request)
    {
        $listItem = $this->getData($request);

        $data['record_total'] = $listItem->count();

        $sumNhapKho = LichSuNhapKho::all();
        $totals = [];

        foreach ($sumNhapKho as $item) {
            $productId = $item->product_id;
            $quantity = $item->quantity;


            if (!isset($totals[$productId])) {
                $totals[$productId] = 0;
            }

            $totals[$productId] += $quantity;



        }





//         Phân trang
        if ($request->has('limit')) {
            $data['listItem'] = $listItem->paginate($request->limit);
            $data['limit'] = $request->limit;
        } else {
            $data['listItem'] = $listItem->paginate($this->limit_default);
            $data['limit'] = $this->limit_default;
        }

        $data['page'] = $request->get('page', 1);
        $data['param_url'] = $request->all();

        // Các dữ liệu cần thiết khác
        $data['module'] = $this->module;
        $data['quick_search'] = $this->quick_search;
        $data['filter'] = $this->filter;

        // SEO
        $data['page_title'] = $this->module['label'];
        $data['page_type'] = 'list';

        return $data;
    }
    public function quickSearch($query, $request)
    {
//        $searchTerm = $request->get('quick_search');  // Lấy từ GET request
//
//        if ($searchTerm) {
//            // Thêm điều kiện tìm kiếm cho các cột khác nhau
//            $query = $query->where(function($query) use ($searchTerm) {
//                // Tìm kiếm theo tên sản phẩm (name) và mã sản phẩm (code)
//                $query->where('name', 'LIKE', "%$searchTerm%")
//                    ->orWhere('code', 'LIKE', "%$searchTerm%");
//            });
//        }
        $searchTerm = $request->get('quick_search');
        if($searchTerm){
            $product=Product::query()->where('name', 'LIKE', "%$searchTerm%")
                ->orWhere('code', 'LIKE', "%$searchTerm%")->get();

            if ($product->isNotEmpty()) {
                // Lấy tất cả ID của sản phẩm tìm được
                $product_ids = $product->pluck('id')->toArray();

                // Thêm điều kiện tìm kiếm vào query chính
                $query = $query->whereIn('product_id', $product_ids);
            }
        }
//dd($query);
        return $query;
    }
    public function getData($request)
    {
        //  Filter
        $where = $this->filterSimple($request);
        $listItem = $this->model->whereRaw($where);

        // Tìm kiếm nhanh theo nhiều cột khác nhau
        $listItem = $this->quickSearch($listItem, $request);

        if ($this->whereRaw) {
            $listItem = $listItem->whereRaw($this->whereRaw);
        }

        $listItem = $this->appendWhere($listItem, $request);

        //  Export
        if ($request->has('export')) {
            $this->exportExcel($request, $listItem->get());
        }

//        if ($request->has('export_nhap_xuat_ton')) {
//            $start_date = $request->filter_date_from_date;
//            $end_date = $request->filter_date_to_date;
//            $product_id = '2212';
//
//            $from_date = Carbon::parse($start_date);
//            $to_date = Carbon::parse($end_date);
//
//
//
//            dd($report);
//
////            $this->exportExcel($request, $listItem->get());
//        }

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
                    ]);
                    $ohang->delete();
                }
                else{
                    XuatHang::create([
                        'slip_id' => $slip->id,
                        'quantity' => $quantity,
                        'o_hang_id' => $ohang->id,
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
