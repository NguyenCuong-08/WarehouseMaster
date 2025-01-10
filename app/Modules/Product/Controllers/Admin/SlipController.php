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
class SlipController extends CURDBaseController
{

    protected $module = [
        'code' => 'slip',
        'table_name' => 'slip',
        'label' => 'Báo cáo xuất kho',
        'modal' => '\App\Modules\Product\Models\Slip',
        'list' => [
            ['name' => 'user_name', 'type' => 'text', 'label' => 'Tên khách'],
            ['name' => 'user_phone', 'type' => 'text', 'label' => 'Số điện thoại'],
            ['name' => 'product_id', 'type' => 'relation','object' => 'productss', 'label' => 'Tên sản phẩm','display_field' => 'name'],
            ['name' => 'quantity', 'type' => 'text', 'label' => 'Số lượng'],
//            ['name' => 'o_hang_id', 'type' => 'text', 'label' => 'Ô hàng'],
            ['name' => 'created_at', 'type' => 'text', 'label' => 'Thời gian'],
//            ['name' => 'category_id', 'type' => 'relation', 'object' => 'category', 'display_field' => 'name', 'label' => 'Danh mục sản phẩm'],
            ['name' => 'action', 'type' => 'custom', 'td' => 'Product.list.td.info', 'label' => 'Hành động',],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'user_name', 'type' => 'text', 'class' => 'required', 'label' => 'Tên người dùng ', 'group_class' => 'col-md-12'],
                ['name' => 'user_phone', 'type' => 'text', 'class' => 'required', 'label' => 'SĐT', 'group_class' => 'col-md-12'],
                ['name' => 'quantity', 'type' => 'textarea', 'class' => 'required', 'label' => 'Số lượng', 'group_class' => 'col-md-12'],
//                ['name' => 'category_id', 'type' => 'select2_model', 'class' => '', 'label' => 'Danh mục',
//                    'model' => Category::class, 'display_field' => 'name', 'group_class' => 'col-md-4'],
            ],
            'more_info_tab' => [
                ['name' => 'image', 'type' => 'file', 'label' => 'Ảnh'],
            ],

        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'user_name, user_phone'
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
//                $field_name[] = 'ảnh sản phẩm';
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
//                    $data_export[] = @$value->product->image;

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

                $ohangp = OHangProduct::where('product_id','=', $product->id)->get();
//                dd($ohangp);
                CommonHelper::one_time_message('success', 'Check mã thành công, nhập thông tin nhập đơn');
//            return redirect()->route('nhap-hang')->with('product', $product);
//                $day_hang = DayHang::all();
                return view('KhoHang.nhaptt', ['product' => $product, 'ohangp' => $ohangp]);
            }

        } else {
            //bắn sang trang thém sản phẩm
            CommonHelper::one_time_message('error', 'Chưa tồn tại sản phẩm này, vui lòng tạo ra sản phảm đó');
            return redirect()->route('create-product');
        }
    }
    public function xuatdon(Request $request)
    {

//        dd('tam');
//        $quantity = $request->quantity;
        $product = Product::where('code', $request->code)->first();
        $ohangp = OHangProduct::where('product_id','=', $product->id)->get();

//        // Tìm OHangProduct với o_hang_id và product_id đã tồn tại
//        $ohangProduct = OHangProduct::where('product_id', $product->id)->orderBy('created_at', 'asc')->get();

        $total = array_sum(array_filter($request->input(), function($value, $key) {
            return is_numeric($key); // Kiểm tra key có phải là số hay không
        }, ARRAY_FILTER_USE_BOTH));
//        dd($total);
        if($total>0) {
            $slip = Slip::create([
                'product_id' => $product->id,
                'quantity' => $total,
                'user_name' => $request->name,
                'user_phone' => $request->phone,
            ]);

            foreach ($request->input() as $key => $value) {
                if (is_numeric($key) && is_numeric($value) && (intval($value) > 0)) {
                    $ohangProduct = OHangProduct::where('id', $key)->first();
                    XuatHang::create([
                        'slip_id' => $slip->id,
                        'quantity' => $value,
                        'o_hang_id' => $ohangProduct->o_hang_id,
                        'date' => $ohangProduct->date,
                    ]);
//                dd($ohangProduct);
                    if ($ohangProduct->quantity == $value) {
                        $ohangProduct->delete();
                    } elseif ($ohangProduct->quantity > $value) {
                        $ohangProduct->update([
                            'quantity' => $ohangProduct->quantity - $value,
                        ]);
                    }
                }
            }
            CommonHelper::one_time_message('success', 'Xuất kho thành công');
            return redirect()->route('lichsuxuatkho');
        }
        else{
            CommonHelper::one_time_message('error', 'Số lượng xuất = 0');
            return view('KhoHang.nhaptt', ['product' => $product, 'ohangp' => $ohangp]);
        }

//        if($ohangProduct->sum('quantity') >= $request->quantity){
//            $slip = Slip::create([
//                'product_id' => $product->id,
//                'quantity' => $request->quantity,
//                'user_name' => $request->name,
//                'user_phone' => $request->phone,
//            ]);
//            foreach ($ohangProduct as $ohang) {
//                if($quantity == 0) break;
//                if($quantity>= $ohang->quantity){
//                    $quantity -= $ohang->quantity;
//                    XuatHang::create([
//                       'slip_id' => $slip->id,
//                        'quantity' => $ohang->quantity,
//                        'o_hang_id' => $ohang->o_hang_id,
//                    ]);
//                    $ohang->delete();
//                }
//                else{
//                    XuatHang::create([
//                        'slip_id' => $slip->id,
//                        'quantity' => $quantity,
//                        'o_hang_id' => $ohang->o_hang_id,
//                    ]);
//                    $ohang->update([
//                        'quantity' => $ohang->quantity-$quantity,
//                    ]);
//                    $quantity = 0;
//                }
//            }
//            CommonHelper::one_time_message('success', 'Cập nhật thông tin thành công');
//            return redirect()->route('lichsuxuatkho');
//        }
//        else{
//            CommonHelper::one_time_message('error', 'Số lượng hàng còn trong kho không đủ');
//            return view('KhoHang.nhaptt', ['product' => $product]);
//        }


//        return view('KhoHang.nhap-hang', ['day_hang'=> $day_hang]);
    }




}
