<?php

namespace App\CRMEdu\Controllers\Admin;

use App\Http\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\CRMEdu\Models\Service;
use Validator;
use App\Models\Admin;
use App\CRMEdu\Models\Category;

class CourseController extends CURDBaseController
{

    protected $orderByRaw = 'order_no DESC';

    protected $module = [
        'code' => 'course',
        'table_name' => 'courses',
        'label' => 'CRMEdu_admin.courses',
        'modal' => '\App\CRMEdu\Models\Course',
        'list' => [
            ['name' => 'name', 'type' => 'text_edit', 'label' => 'CRMEdu_admin.courses_title', 'sort' => true],
            ['name' => 'author_name', 'type' => 'text', 'label' => 'CRMEdu_admin.courses_author', 'sort' => true],
            ['name' => 'link1', 'type' => 'link', 'label' => 'CRMEdu_admin.courses_Link', 'sort' => true],
            ['name' => 'level', 'type' => 'text', 'label' => 'CRMEdu_admin.courses_Level', 'sort' => true],
            ['name' => 'status', 'type' => 'status', 'label' => 'CRMEdu_admin.courses_status'],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'CRMEdu_admin.courses_Tieu_de', 'group_class' => 'col-md-6'],
                ['name' => 'author_name1', 'type' => 'text', 'class' => '', 'label' => 'CRMEdu_admin.courses_name_author', 'group_class' => 'col-md-6'],
                ['name' => 'link', 'type' => 'text', 'label' => 'CRMEdu_admin.courses_duong_link',  'group_class' => 'col-md-9'],
                ['name' => 'order_no', 'type' => 'number', 'class' => 'required', 'label' => 'CRMEdu_admin.courses_order', 'group_class' => 'col-md-3', 'value' => 1],
                ['name' => 'multi_cat', 'type' => 'custom', 'field' => 'CRMEdu.form.fields.multi_cat', 'label' => 'CRMEdu_admin.courses_duong_link', 'model' => Category::class,
                    'object' => 'category_course', 'where' => 'type in (1)', 'display_field' => 'name', 'multiple' => true, 'group_class' => 'col-md-8'],
                ['name' => 'status', 'type' => 'checkbox', 'label' => 'CRMEdu_admin.courses_display', 'value' => 1, 'group_class' => 'col-md-4'],

            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID, tiêu đề, link, tác giả',
        'fields' => 'id, name, link, author_name'
    ];

    protected $filter = [
        'admin_id' => [
            'label' => 'Người tạo',
            'type' => 'select2_ajax_model',
            'display_field' => 'name',
            'model' => \App\Models\Admin::class,
            'object' => 'admin',
            'query_type' => '='
        ],
        'created_at' => [
            'label' => 'Khoảng ngày tạo',
            'type' => 'from_to_date',
            'query_type' => 'from_to_date'
        ],
    ];

    public function appendWhere($query, $request)
    {
        if (!CommonHelper::has_permission(\Auth::guard('admin')->user()->id, 'course')) {
            //  nếu ko có quyền quản lý tài liệu thì chỉ hiện thị các tài liệu kich hoạt
            $query = $query->where('status', 1);
        }

        if ($request->category_id == 0) {
            $cat_ids = Category::where(function ($query) {
                            $query->orWhere('role_ids', 'LIKE', '%|'.@\App\Models\RoleAdmin::where('admin_id', \Auth::guard('admin')->user()->id)->first()->role_id.'|%');
                            $query->orWhereNull('role_ids');
                        })
                            ->pluck('id')->toArray();

            $query = $query->where(function ($query) use($cat_ids) {
                                if (empty($cat_ids)) {
                                    $query->whereNull('multi_cat');
                                }
                                foreach($cat_ids as $id) {
                                    $query->orWhere('multi_cat', 'like', '%|'.$id.'|%');
                                }
                            });
        } else {
            // lọc nếu truyền vào id danh mục

            //  lọc ra các bài trong danh mục con
            $cat_ids = Category::select('id')->where('status', 1)->where('type', 1)
                ->where('parent_id', $request->category_id)
                ->where('role_ids', 'LIKE', '%|'.@\App\Models\RoleAdmin::where('admin_id', \Auth::guard('admin')->user()->id)->first()->role_id.'|%')
                ->pluck('id')->toArray();

            $cat_ids = array_merge($cat_ids, [$request->category_id]);

            $query = $query->where(function ($query) use($cat_ids) {
                foreach($cat_ids as $id) {
                    $query->orWhere('multi_cat', 'like', '%|'.$id.'|%');
                }
            });
        }

        return $query;
    }

    public function view(Request $request, $id)
    {
        $request->merge(['category_id' => $id]);

        $data = $this->getDataList($request);
        $data['category_id'] = $id;

        return view('CRMEdu.course.get_course')->with($data);
    }

    public function getCourse(Request $request, $id)
    {
        $request->merge(['course_id' => $id]);

        $data = $this->getDataList($request);
        $data['course_id'] = $id;

//        $item = $this->model->find($request->id);
//
//        if (!is_object($item)) abort(404);
//        if (!$_POST) {
//            $data = $this->getDataUpdate($request, $item);
//            return view('CRMEdu.course.get_one_course')->with($data);
//        }

        return view('CRMEdu.course.get_one_course')->with($data);
    }

    public function add(Request $request)
    {
        try {


            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('CRMEdu.course.add')->with($data);
            } else if ($_POST) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'link' => 'required',
                ], [
                    'name.required' => 'Bắt buộc phải nhập tiêu đề',
                    'link.required' => 'Bắt buộc phải nhập đường link',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert
                    $data['admin_id'] = \Auth::guard('admin')->user()->id;
                    if ($request->has('multi_cat')) {
                        $data['multi_cat'] = '|' . implode('|', $request->multi_cat) . '|';
                    }

                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
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

                    if ($request->return_direct == 'save_continue') {
                        return redirect('admin/' . $this->module['code'] . '/edit/' . $this->model->id);
                    } elseif ($request->return_direct == 'save_create') {
                        return redirect('admin/' . $this->module['code'] . '/add');
                    }

                    return redirect('admin/' . $this->module['code'] . '/view/0');
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
                return view('CRMEdu.course.edit')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
//                    'name' => 'required',
                    // 'link' => 'required',
                ], [
//                    'name.required' => 'Bắt buộc phải nhập tên gói',
//                    'link.unique' => 'Web này đã đăng!',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());

                    //  Tùy chỉnh dữ liệu insert
                    if ($request->has('multi_cat')) {
                        $data['multi_cat'] = '|' . implode('|', $request->multi_cat) . '|';
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

                    return redirect('admin/' . $this->module['code'] . '/view/0');
                }
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

}
