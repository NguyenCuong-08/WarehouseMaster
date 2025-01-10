<?php

namespace App\Modules\HuongNghiep\Controllers\Admin;
use App\CRMEdu\Models\Service;
use App\Modules\HuongNghiep\Models\NganhDaoTao;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\HuongNghiep\Controllers\Admin\CURDBaseController;
//use App\Modules\HoChieu\Models\Passport;
//use App\Modules\HoChieu\Models\TypePassport;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use Validator;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends CURDBaseController
{

    protected $module = [
        'code' => 'schools',
        'table_name' => 'schools',
        'label' => 'Trường học',
        'modal' => '\App\Modules\HuongNghiep\Models\School',
        'list' => [
            ['name' => 'id', 'type' => 'text_edit', 'label' => 'Mã'],
            ['name' => 'name', 'type' => 'text', 'label' => 'Tên trường'],
            ['name' => 'link_web', 'type' => 'text', 'label' => 'Link web'],
            ['name' => 'hoc_phi', 'type' => 'text', 'label' => 'Chỉ tiêu'],
            ['name' => 'chi_tieu', 'type' => 'text', 'label' => 'Tên trường'],
            ['name' => 'địa chỉ', 'type' => 'relation','object'=>'province','display_field'=>'name' ,'label' => 'Địa chỉ'],

        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Tiêu trường', 'group_class' => 'col-md-12'],
                ['name' => 'link_web', 'type' => 'text', 'class' => 'required', 'label' => 'Link Web', 'group_class' => 'col-md-12'],
                ['name' => 'hoc_phi', 'type' => 'number', 'class' => 'required', 'label' => 'Học phí', 'group_class' => 'col-md-12'],
                ['name' => 'chi_tieu', 'type' => 'text', 'class' => 'required', 'label' => 'Chỉ tiêu', 'group_class' => 'col-md-12'],
//                ['name' => 'nganh_dao_tao_id', 'type' => 'select2_model', 'class' => '', 'label' => 'Các ngành đào tạo', 'multiple' => true,
//                    'model' => Service::class, 'display_field' => 'name_vi', 'group_class' => 'col-md-12'],
                ['name' => 'nganh_dao_tao_ids', 'type' => 'select2_model', 'class' => '', 'label' => 'Các ngành đào tạo','multiple' => true,
                    'model' => NganhDaoTao::class, 'display_field' => 'name','group_class' => 'col-md-12'],
                ['name' => 'province_id', 'type' => 'select2_model_tag', 'class' => 'required', 'label' => 'Địa chỉ',
                    'model' => \App\Models\Province::class, 'object' => 'province', 'display_field' => 'name','group_class' => 'col-md-12'],
                ['name' => 'link_gg_map', 'type' => 'text', 'class' => 'required', 'label' => 'Link google map', 'group_class' => 'col-md-12'],
//                ['name' => 'content', 'type' => 'textarea_editor', 'class' => 'required', 'label' => 'Nội dung giới thiệu','group_class' => 'col-md-12'],
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id'
    ];

    protected $filter = [



    ];

    public function getIndex(Request $request)
    {
        $data = $this->getDataList($request);

        return view('HuongNghiep.Admin.school.list')->with($data);
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
        if (!CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'view_all_data')) {
            $query = $query->where('admin_id', \Auth::guard('admin')->user()->id);
        }
        if ($request->gia_tri_loc != null) {
            if ($request->kieu_loc == 'Người tạo') {
                $id = User::whereHas('admin', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->gia_tri_loc . '%');
                })->pluck('id')->toArray();

                $query->whereIn('id', $id);

            } elseif ($request->kieu_loc == 'Mã kH') {
                $id = User::where('code', $request->gia_tri_loc)->pluck('id')->toArray();
                $query->whereIn('id', $id);
            }
        }

        return $query;
    }

    public function add(Request $request)
    {
        try {


            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('HuongNghiep.Admin.school.add')->with($data);
            } else if ($_POST) {

                \DB::beginTransaction();
                $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                //  Tùy chỉnh dữ liệu insert

//                $data['admin_id'] = \Auth::guard('admin')->user()->id;
//                $data['code'] = 'KHRG' + ;
//                if ($request->has('image_extra')) {
//                    $data['image_extra'] = implode('|', $request->image_extra);
//                }
//                    dd($data['image_extra']);

//                if ($request->has('so_do_va_hop_dong_chu_nha')) {
//                    $data['so_do_va_hop_dong_chu_nha'] = implode('|', $request->so_do_va_hop_dong_chu_nha);
//                }

                if ($request->nganh_dao_tao_ids != null) {
                    $data['nganh_dao_tao_ids'] = '|' . implode('|', $request->get('nganh_dao_tao_ids', [])) . '|';
                }
                foreach ($data as $k => $v) {
                    $this->model->$k = $v;
                }

                if ($this->model->save()) {

                    $this->model->save();
//                    $this->update_khcode($this->model);
//                    $this->update_admin_id($this->model);

                    \DB::commit();

                    CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                } else {
                    \DB::rollback();
                    CommonHelper::one_time_message('error', 'Lỗi tạo mới. Vui lòng load lại trang và thử lại!');
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
        } catch (\Exception $ex) {
            \DB::rollback();
            CommonHelper::one_time_message('error', $ex->getMessage());
            return redirect()->back()->withInput();
        }
    }
    //update khách hafng code
    public function update_khcode(User $user)
    {
        // Viết mã để cập nhật trường rg_code ở đây
        if($user->id>=1000000000){
            $user->code = 'KH'.$user->id;
        }else{
            $idPadding = str_pad($user->id, 9, '0', STR_PAD_LEFT);
            $user->code = 'KH'.$idPadding;
        }

        $user->save();
        return true;
    }
    public function update_admin_id( User $user)
    {
        // Viết mã để cập nhật trường rg_code ở đây
//            dd(\Auth::guard('admin')->user()->id);
        $user->admin_id = \Auth::guard('admin')->user()->id;

        $user->save();
        return true;
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
                return view('HuongNghiep.Admin.school.edit')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();


                $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                //  Tùy chỉnh dữ liệu insert
                if ($request->nganh_dao_tao_ids != null) {
                    $data['nganh_dao_tao_ids'] = '|' . implode('|', $request->get('nganh_dao_tao_ids', [])) . '|';
                }
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

                $field_name = [];
                foreach ($this->getAllFormFiled() as $field) {
                    if (!isset($field['no_export']) && isset($field['label'])) {
                        $field_name[] = $field['label'];
                    }
                }

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
