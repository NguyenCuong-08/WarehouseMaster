<?php

namespace App\Modules\Post\Controllers\Admin;

use App\Modules\Logistics\Controllers\Admin\CURDBaseController;
use App\Modules\Logistics\Models\Bill;
use App\Http\Helpers\CommonHelper;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Modules\Logistics\Models\Category;
use App\Modules\Logistics\Models\Codes;
use App\Modules\Logistics\Models\Theme;
use App\Modules\Logistics\Models\Tag;
use Validator;
use App\Modules\Logistics\Models\PostTag;
use App\Modules\Logistics\Models\BillProgress;
use function App\Modules\Logistics\Controllers\Admin\abort;
use function App\Modules\Logistics\Controllers\Admin\asset;
use function App\Modules\Logistics\Controllers\Admin\back;
use function App\Modules\Logistics\Controllers\Admin\Response;
use function App\Modules\Logistics\Controllers\Admin\str_slug;

class CategoryController extends \App\Modules\Post\Controllers\Admin\CURDBaseController
{

    protected $module = [
        'code' => 'category',
        'table_name' => 'catagories',
        'label' => 'Category',
        'modal' => '\App\Modules\Post\Models\Category',
        'list' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Tiêu đề'],
            ['name' => 'intro', 'type' => 'text', 'label' => 'Ghi chú'],
            ['name' => 'hanh_dong', 'type' => 'custom', 'td' => 'Post.category.list.td.hanh_dong', 'label' => 'Hành động'],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'class' => 'required', 'type' => 'text', 'label' => 'Tiêu đề', 'group_class' => 'col-md-6'],
                ['name' => 'intro', 'class' => 'required', 'type' => 'text', 'label' => 'Ghi chú', 'group_class' => 'col-md-6'],
            ],
            'des_tab' => [

//
            ],
        ],
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, address'
    ];

    protected $filter = [
//        'filter_date' => [
//            'label' => 'Lọc theo',
//            'type' => 'filter_date',
//            'options' => [
//                '' => '',
//                'created_at' => 'From Date',
//                'expiry_date' => 'To Date',
//                'registration_date' => 'Ngày ký HĐ',
//            ],
//            'query_type' => 'filter_date'
//        ],

    ];

    public function getIndex(Request $request)
    {
        $data = $this->getDataList($request);

        return view('Post.category.list')->with($data);
    }

    public function traCuu(Request $request)
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

        //  Get data default (param_url, filter, module) for return view
        $data['module'] = [
            'code' => 'codes',
            'table_name' => 'codes',
            'label' => 'Bảng hàng',
            'modal' => '\App\Modules\Logistics\Models\Codes',
            'list' => [
//            ['name' => 'image', 'type' => 'image', 'label' => 'Ảnh'],
                ['name' => 'id', 'type' => 'text', 'label' => 'No'],
                ['name' => 'address', 'type' => 'custom', 'td' => 'Post.category.list.td.ten_bang_hang', 'label' => 'Địa chỉ'],
//            ['name' => 'link', 'type' => 'relation', 'object' => 'bill', 'display_field' => 'name_vi', 'label' => 'Dự án'],
//            ['name' => 'multi_cat', 'type' => 'custom', 'td' => 'Logistics.list.td.multi_cat', 'label' => 'Danh mục'],
                ['name' => 'dien_tich', 'type' => 'text', 'label' => 'Diện tích'],
                ['name' => 'gia_niem_yet', 'type' => 'price_vi', 'label' => 'Giá'],
                ['name' => 'so_phong_ngu', 'type' => 'number', 'label' => 'Số phòng ngủ'],
                ['name' => 'phi_moi_gioi', 'type' => 'number', 'label' => 'Phí môi giới'],
                ['name' => 'luot_xem', 'type' => 'number', 'label' => 'Lượt xem',],
                ['name' => 'created_at', 'type' => 'datetime_vi', 'label' => 'Ngày tạo'],
                ['name' => 'admin_id', 'type' => 'relation', 'label' => 'Người tạo', 'object' => 'admin', 'display_field' => 'name'],
            ],
        ];
        $data['quick_search'] = $this->quick_search;
        $data['filter'] = $this->filter;

        //  Set data for seo
        $data['page_title'] = $this->module['label'];
        $data['page_type'] = 'list';
        return view('Post.category.tra_cuu')->with($data);
    }

    public function appendWhere($query, $request)
    {

        return $query;
    }

    public function add(Request $request)
    {
        try {


            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('Post.category.add')->with($data);
            } else if ($_POST) {

                \DB::beginTransaction();
//                $validator = Validator::make($request->all(), [
//                    'district_id' => 'required',
//                    'province_id' => 'required',
//                    'so_do_va_hop_dong_chu_nha' => 'required',
//                    'ward_id' => 'required',
//                    'image_extra' => 'required',
//                    'content' => 'required',
//                    'dien_tich' => ['required', 'regex:/^[0-9]+([,.][0-9]+)?$/u'],
////                    'gia_niem_yet' => ['required', 'regex:/^[0-9]+([,.][0-9]+)?$/'],
////                    'phi_moi_gioi' => ['required', 'regex:/^[0-9]+([,.][0-9]+)?$/'],
//                    'sdt_chu_nha' => 'required|regex:/^[0-9]{10}$/',
//
//
//                ], [
//                    'so_do_va_hop_dong_chu_nha.required' => 'Bắt buộc phải sổ đỏ và hợp đồng với chủ nhà',
//                    'image_extra.required' => 'Bắt buộc phải nhập ảnh',
//                    'district_id.required' => 'Quận huyện bắt buộc chọn',
//                    'ward_id.required' => 'Phường xã bắt buộc chọn',
//                    'province_id.required' => 'Thành phố bắt buộc chọn',
//                    'content.required' => 'Mô tả không được để trống',
//                    'sdt_chu_nha.regex' => 'Số điện thoại khách không đúng định dạng',
////                    'dien_tich.regex' => 'Diện tích không đúng định dạng',
////                    'dien_tich.required' => 'Diện tích bắt buộc nhập',
////                    'dien_tich.numeric' => 'Diện tích bắt buộc là số'
//
//
//                ]);
//                if ($validator->fails()) {
//                    CommonHelper::one_time_message('error', 'Cập nhật thất bại, vui lòng kiểm tra lại.');
//                    return back()->withErrors($validator)->withInput();
//                } else
                {
//                                    dd(1);

                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert

//                    $data['admin_id'] = \Auth::guard('admin')->user()->id;
//                    $data['district_id'] = $request->district_id;
//                    $data['ward_id'] = $request->ward_id;
//                    $data['gia_niem_yet'] = str_replace(".", "", $request->gia_niem_yet);
//                    $data['phi_moi_gioi'] = str_replace(".", "", $request->phi_moi_gioi);

//                    if ($request->has('image_extra')) {
//                        $data['image_extra'] = implode('|', $request->image_extra);
//                    }
////                    dd($data['image_extra']);
//
//                    if ($request->has('so_do_va_hop_dong_chu_nha')) {
//                        $data['so_do_va_hop_dong_chu_nha'] = implode('|', $request->so_do_va_hop_dong_chu_nha);
//                    }


                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
//                        $this->model->id = 'S' . $this->model->id;
                        $this->model->save();
                        \DB::commit();

                        CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                    } else {
                        \DB::rollback();
                        CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                    }

                    if ($request->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $this->model
                        ]);
                    }

                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit/' . $this->model->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
                    }

                    return redirect('admin/' . $this->module['code']);
                }
            }
        } catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
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

    public function update(Request $request)
    {
        try {


            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);
                return view('Post.category.edit')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

//                $validator = Validator::make($request->all(), [
//                    'district_id' => 'required',
//                    'province_id' => 'required',
//                    'so_do_va_hop_dong_chu_nha' => 'required',
//                    'ward_id' => 'required',
//                    'image_extra' => 'required',
//                    'content' => 'required',
//                    'dien_tich' => ['required', 'regex:/^[0-9]+([,.][0-9]+)?$/u'],
////                    'gia_niem_yet' => ['required', 'regex:/^[0-9]+([,.][0-9]+)?$/'],
////                    'phi_moi_gioi' => ['required', 'regex:/^[0-9]+([,.][0-9]+)?$/'],
//                    'sdt_chu_nha' => 'required|regex:/^[0-9]{10}$/',
//
//
//                ], [
//                    'so_do_va_hop_dong_chu_nha.required' => 'Bắt buộc phải sổ đỏ và hợp đồng với chủ nhà',
//                    'image_extra.required' => 'Bắt buộc phải nhập ảnh',
//                    'district_id.required' => 'Quận huyện bắt buộc chọn',
//                    'ward_id.required' => 'Phường xã bắt buộc chọn',
//                    'province_id.required' => 'Thành phố bắt buộc chọn',
//                    'content.required' => 'Mô tả không được để trống',
//                    'sdt_chu_nha.regex' => 'Số điện thoại khách không đúng định dạng',
////                    'dien_tich.regex' => 'Diện tích không đúng định dạng',
////                    'dien_tich.required' => 'Diện tích bắt buộc nhập',
////                    'dien_tich.numeric' => 'Diện tích bắt buộc là số'
//
//
//                ]);

//                if ($validator->fails()) {
//                    CommonHelper::one_time_message('error', 'Cập nhật thất bại, vui lòng kiểm tra lại.');
//                    return back()->withErrors($validator)->withInput();
//                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                    //  Tùy chỉnh dữ liệu insert
//                    if ($request->has('image_extra')) {
//                        $data['image_extra'] = implode('|', $request->image_extra);
//                    }
//
////                    dd($data['image_extra']);
//                    if ($request->has('so_do_va_hop_dong_chu_nha')) {
//                        $data['so_do_va_hop_dong_chu_nha'] = implode('|', $request->so_do_va_hop_dong_chu_nha);
//                    }
//                    $data['district_id'] = $request->district_id;
//                    $data['ward_id'] = $request->ward_id;
//                    $data['gia_niem_yet'] = str_replace(".", "", $request->gia_niem_yet);
//                    $data['phi_moi_gioi'] = str_replace(".", "", $request->phi_moi_gioi);
//                    $item->phi_moi_gioi = $data['phi_moi_gioi'];
//                    $item->save();

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
//            }
        } catch (\Exception $ex) {
            \DB::rollback();
//            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
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
        \Excel::create(str_slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($excel) use ($data) {

            // Set the title
            $excel->setTitle($this->module['label'] . ' ' . date('d m Y'));

            $excel->sheet(str_slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($sheet) use ($data) {

                $field_name = ['Mã tin'];
                foreach ($this->getAllFormFiled() as $field) {
                    if (!isset($field['no_export']) && isset($field['label'])) {
                        $field_name[] = $field['label'];
                    }
                }

                //   thêm cột tỉnh / huyện / xã
                $field_name[] = 'Tỉnh';
                $field_name[] = 'Huyện';
                $field_name[] = 'Xã';


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
                                if ($field['label'] == 'Mô tả chi tiết') {
                                    $dataInput = $value->{$field['name']};
                                    $data_export[] = strip_tags($dataInput);
                                }
                                elseif (in_array($field['type'], ['text', 'number', 'textarea', 'textarea_editor', 'date', 'datetime-local', 'email', 'hidden', 'checkbox', 'textarea_editor', 'textarea_editor2', 'custom', 'radio', 'price_vi'])) {
                                    if(in_array(CommonHelper::getRoleName(\Auth::guard('admin')->user()->id, 'name'), ['cvkd_parttime'])) {
                                        if($field['label'] == 'Địa chỉ chi tiết') {
                                            $data_export[] = '--Đã ẩn đối với quyền cvkd parttime--';
                                        } else {
                                            $data_export[] = $value->{$field['name']};
                                        }
                                    }else {
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

                    //  xuất ra tỉnh / huyện / xã
                    $data_export[] = @$value->province->name;
                    $data_export[] = @$value->district->name;
                    $data_export[] = @$value->ward->name;

                    $data_export[] = @$value->created_at;
                    $data_export[] = @$value->updated_at;
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
