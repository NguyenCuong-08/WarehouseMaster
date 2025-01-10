<?php

namespace App\Modules\Post\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Auth;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use App\Http\Controllers\Admin\CURDBaseController;
use Validator;

class PageController extends CURDBaseController
{
//    protected $orderByRaw = 'status desc, order_no desc, id desc';

    protected $module = [
        'code' => 'pages',
        'table_name' => 'pages',
        'label' => 'Page',
        'modal' => '\App\Modules\Post\Models\Page',
        'list' => [
            ['name' => 'name', 'type' => 'text_edit', 'label' => 'Tên'],
            ['name' => 'sulg', 'type' => 'text_edit', 'label' => 'Link'],
//            ['name' => 'sulg', 'type' => 'select', 'label' => 'Vị trí hiển thị'],
//            ['name' => 'type', 'type' => 'select', 'label' => 'Loại',],
//            ['name' => 'order_no', 'type' => 'text', 'label' => 'Thứ tự'],
            ['name' => 'status', 'type' => 'status', 'label' => 'Trạng thái'],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => '', 'label' => 'Tiêu đề'],
                ['name' => 'content', 'type' => 'custom', 'field' => 'HuongNghiep.Admin.widgets.form.fields.widget_content', 'label' => 'Nội dung',
                    'inner' => 'rows=20', 'height' => '300px'],
                ['name' => 'slug', 'type' => 'text', 'label' => 'Link page (slug)', 'des' => 'Đường dẫn'],
                ['name' => 'status', 'type' => 'checkbox', 'label' => 'Kích hoạt', 'value' => 1, 'group_class' => 'col-md-4'],
            ],

            'info_tab' => [

                ['name' => 'image', 'type' => 'file_editor', 'label' => 'Ảnh page'],
//                ['name' => 'name', 'type' => 'text', 'class' => '', 'label' => 'Tên Widget'],
//                ['name' => 'location', 'type' => 'text', 'label' => 'Location'],
//                ['name' => 'vi_tri', 'type' => 'text', 'label' => 'Vị trí page'],
//                ['name' => 'location', 'type' => 'select', 'options' => [
//                    'home_widget_1' => 'Trang chủ - Các địa điểm tiêu biểu',
//                    'home_widget_2' => 'Trang chủ - Our Tour List',
//                    'home_widget_3' => 'Trang chủ - Are you ready to travel?',
//                    'home_widget_4' => 'Trang chủ - Why choose us?',
//                    'home_widget_5' => 'Trang chủ - Latest blog and article',
//                    'home_widget_6' => 'Trang chủ - 4 khối dấu tích dưới why choose us',
//                    'home_widget_7' => 'Trang chủ - Visit The Beautiful Lanscape',
////                    'home_widget_8' => 'Trang chủ - Các thông số thống kê ở giữa trang chủ',
//                    'home_widget_9' => 'Trang chủ - Browse by category',
////                    'home_widget_10' => 'Trang chủ - 4 khối dưới browse by category',
//                    'about_widget_1' => 'About - About Us',
//                    'about_widget_2' => 'About - Our Story',
//                    'about_widget_3' => 'About - Why book with us?',
//                    'about_widget_4' => 'About - Thanh phần trăm 1',
//                    'about_widget_5' => 'About - Thanh phần trăm 2',
//                    'about_widget_6' => 'About - Các thông số thống kê ở giữa trang',
//                    'about_widget_7' => 'About - Các khối bên dưới why book with us',
//                    'about_widget_8' => 'About - Travel solutions since ...',
//                    'destination_widget_1' => 'Destination - Các địa điểm tiêu biểu',
//                    'destination_widget_2' => 'Destination - Browse by category',
//                    'destination_widget_3' => 'Destination - Các loại hình tour',
//                    'destination_widget_4' => 'Destination and FAQ - Featured Questions',
////                    'destination_widget_5' => 'Destination - Các câu hỏi dưới featured questions',
//                    'error_404_widget'=>'Error - 404',
//                    'blog_widget_1'=>'Blog - Latest Blog & Article',
//                    'contact_widget_1'=>'Contact - Contact Us',
//                    'gallery_widget'=>'Gallery - Our Photo Gallery',
//                    'faq_widget' => 'Faq - Các câu hỏi',
//
//                ], 'label' => 'Vị trí hiển thị'],
//                ['name' => 'type', 'type' => 'select', 'options' => [
//                    'html' => 'Html',
//                    'textarea' => 'Textarea',
//                    'banner_slides' => 'Banner - slides',
//                    'posts' => 'Khối tin tức',
//                    'other' => 'Khác',
//                ], 'label' => 'Loại'],
//                ['name' => 'config', 'type' => 'textarea', 'label' => 'Cấu hình'],
//                ['name' => 'config', 'type' => 'custom', 'field' => 'HuongNghiep.Admin.widgets.form.fields.dynamic', 'class' => 'form-action', 'label' => 'Cấu hình', 'cols' => ['key', 'Giá trị'], 'des' => 'Key bao gồm: view, location, limit, category_id, where']
            ],
        ],
    ];

    protected $filter = [
        'name' => [
            'label' => 'Tên',
            'type' => 'text',
            'query_type' => 'like'
        ],
        'location' => [
            'label' => 'Vị trí',
            'type' => 'select',
            'options' => [
                '' => 'Vị trí',
                'home_widget_1' => 'Trang chủ - Các địa điểm tiêu biểu',
                'home_widget_2' => 'Trang chủ - Our Tour List',
                'home_widget_3' => 'Trang chủ - Are you ready to travel?',
                'home_widget_4' => 'Trang chủ - Why choose us?',
                'home_widget_5' => 'Trang chủ - Latest blog and article',
                'home_widget_6' => 'Trang chủ - 4 khối dấu tích dưới why choose us',
                'home_widget_7' => 'Trang chủ - Visit The Beautiful Lanscape',
//                'home_widget_8' => 'Trang chủ - Các thông số thống kê ở giữa trang chủ',
                'home_widget_9' => 'Trang chủ - Browse by category',
//                'home_widget_10' => 'Trang chủ - 4 khối dưới browse by category',
                'about_widget_1' => 'About - About Us',
                'about_widget_2' => 'About - Our Story',
                'about_widget_3' => 'About - Why book with us?',
                'about_widget_4' => 'About - Thanh phần trăm 1',
                'about_widget_5' => 'About - Thanh phần trăm 2',
                'about_widget_6' => 'About - Các thông số thống kê ở giữa trang',
                'about_widget_7' => 'About - Các khối bên dưới why book with us',
                'about_widget_8' => 'About - Travel solutions since ...',
                'destination_widget_1' => 'Destination - Các địa điểm tiêu biểu',
                'destination_widget_2' => 'Destination - Browse by category',
                'destination_widget_3' => 'Destination - Các loại hình tour',
                'destination_widget_4' => 'Destination and FAQ - Featured Questions',
//                'destination_widget_5' => 'Destination - Các câu hỏi dưới featured questions',
                'error_404_widget'=>'Error - 404',
                'blog_widget_1'=>'Blog - Latest Blog & Article',
                'contact_widget_1'=>'Contact - Contact Us',
                'gallery_widget'=>'Gallery - Our Photo Gallery',
                'faq_widget' => 'Faq - Các câu hỏi',

            ],
            'query_type' => '='
        ],
        'type' => [
            'label' => 'Loại',
            'type' => 'select',
            'query_type' => '=',
            'options' => [
                '' => 'Loại',
                'html' => 'Html',
                'textarea' => 'Textarea',
                'banner_slides' => 'Banner - slides',
                'posts' => 'Khối tin tức',
                'other' => 'Khác',
            ]
        ],
        'status' => [
            'label' => 'Trạng thái',
            'type' => 'select',
            'options' => [
                '' => 'Trạng thái',
                0 => 'Ẩn',
                1 => 'Hiển thị',
            ],
            'query_type' => '='
        ],
    ];
    public function testView($name)
    {

        $viewName = "HuongNghiep.Frontend.test_view.{$name}";

        return view($viewName);


    }


    public function getIndex(Request $r)
    {


        $data = $this->getDataList($r);

        return view('HuongNghiep.Admin.widgets.list')->with($data);
    }

    public function add(Request $r)
    {
        try {


            if (!$_POST) {
                $data = $this->getDataAdd($r);
                return view('HuongNghiep.Admin.widgets.add')->with($data);
            } else if ($_POST) {
                $validator = Validator::make($r->all(), [
//                    'location' => 'required'
                ], [
//                    'location.required' => 'Bắt buộc phải nhập vị trí',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($r, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert
                    if ($r->has('config_key')) {
                        $val = [];
                        foreach ($r->config_key as $k => $key) {
                            if ($key != null && $r->config_value[$k] != null) {
                                $val[$key] = $r->config_value[$k];
                            }
                        }
                        $data['config'] = json_encode($val);
                    }

                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
                        CommonHelper::flushCache($this->module['table_name']);
//                        $this->afterAddLog($r, $this->model);

                        CommonHelper::one_time_message('success', 'Tạo mới thành công!');
                    } else {
                        CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                    }

                    if ($r->ajax()) {
                        return response()->json([
                            'status' => true,
                            'msg' => '',
                            'data' => $this->model
                        ]);
                    }

                    if ($r->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/' . $this->model->id);
                    } elseif ($r->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
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
                return view('HuongNghiep.Admin.widgets.edit')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'location' => 'required'
                ], [
//                    'location.required' => 'Bắt buộc phải nhập vị trí',
                ]);

                if ($validator->fails()) {
                    CommonHelper::one_time_message('error', 'Cập nhật thất bại, vui lòng kiểm tra lại.');
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                    //  Tùy chỉnh dữ liệu insert
                    if ($request->has('image_extra')) {
                        $data['image_extra'] = implode('|', $request->image_extra);
                    }

                    $item->save();

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

    public function getContactInfo($r)
    {
        $contact_info = [];
        if ($r->has('contact_info_name')) {
            foreach ($r->contact_info_name as $k => $key) {
                if ($key != null) {
                    $contact_info[] = [
                        'name' => $key,
                        'tel' => $r->contact_info_tel[$k],
                        'email' => $r->contact_info_email[$k],
                        'note' => $r->contact_info_note[$k],
                    ];
                }
            }
        }
        return $contact_info;
    }

    public function getPublish(Request $r)
    {
        try {



            $id = $r->get('id', 0);
            $item = $this->model->find($id);

            // Không được sửa dữ liệu của cty khác, cty mình ko tham gia
//            if (strpos(Auth::guard('admin')->user()->company_ids, '|' . $item->company_id . '|') === false) {
//                return response()->json([
//                    'status' => false,
//                    'msg' => 'Bạn không có quyền xuất bản!'
//                ]);
//            }

            if (!is_object($item))
                return response()->json([
                    'status' => false,
                    'msg' => 'Không tìm thấy bản ghi'
                ]);

            if ($item->{$r->column} == 0)
                $item->{$r->column} = 1;
            else
                $item->{$r->column} = 0;

            $item->save();
            CommonHelper::flushCache($this->module['table_name']);
            return response()->json([
                'status' => true,
                'published' => $item->{$r->column} == 1 ? true : false
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'published' => null,
                'msg' => 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.'
            ]);
        }
    }

    public function delete(Request $r)
    {
        try {



            $item = $this->model->find($r->id);

            //  Không được xóa dữ liệu của cty khác, cty mình ko tham gia
//            if (strpos(Auth::guard('admin')->user()->company_ids, '|' . $item->company_id . '|') === false) {
//                CommonHelper::one_time_message('error', 'Bạn không có quyền xóa!');
//                return back();
//            }

            $item->delete();
            CommonHelper::flushCache($this->module['table_name']);
            CommonHelper::one_time_message('success', 'Xóa thành công!');
            return redirect('admin/' . $this->module['code']);
        } catch (\Exception $ex) {
            CommonHelper::one_time_message('error', 'Lỗi hệ thống! Vui lòng liên hệ kỹ thuật viên.');
            return back();
        }
    }

    public function multiDelete(Request $r)
    {
        try {



            $ids = $r->ids;
            if (is_array($ids)) {
                $this->model->whereIn('id', $ids)->delete();
            }
            CommonHelper::flushCache($this->module['table_name']);
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
}
