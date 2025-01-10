<?php

namespace App\CRMEdu\Controllers\Admin;

use App\CRMEdu\Models\Bill;
use App\CRMEdu\Models\Service;
use App\Http\Helpers\CommonHelper;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\CRMEdu\Models\Category;
use App\CRMEdu\Models\Codes;
use App\CRMEdu\Models\Theme;
use App\CRMEdu\Models\Tag;
use Validator;
use App\CRMEdu\Models\PostTag;
use App\CRMEdu\Models\BillProgress;

class ChoThueXeController extends CURDBaseController
{

    protected $module = [
        'code' => 'chothuexe',
        'table_name' => 'classroom',
        'label' => 'Hợp đồng thuê xe',
        'modal' => '\App\CRMEdu\Models\ChoThueXe',
        'list' => [
            ['name' => 'name', 'type' => 'text_edit', 'label' => 'Khách hàng'],
            ['name' => 'lecturers_id', 'type' => 'relation', 'label' => 'Loại xe', 'object' => 'lecturers', 'display_field' => 'name', 'sort' => true],
            ['name' => 'tutors_id', 'type' => 'relation', 'label' => 'Ngày thuê', 'object' => 'tutors', 'display_field' => 'name', 'sort' => true],
            ['name' => 'so_hoc_vien', 'type' => 'custom', 'td' => 'Ngày trả', 'label' => 'Ngày trả',],
            ['name' => 'so_hoc_vien', 'type' => 'custom', 'td' => 'Ghi chú', 'label' => 'Ghi chú',],

        ],
        'form' => [
            'general_tab' => [
                ['name' => 'retention_time', 'type' => 'select', 'options' =>
                    [
                        ''=> '',
                        3 => 'Đặng Thị Tuyết',
                        1 => 'Anh Tu Vuong',
                        6 => 'Nguyễn Thị Minh Châu',
                        8 => 'Nguyễn Mạnh Tuấn',
                        12 => 'Lê Minh Thành',

                    ], 'class' => '', 'label' => 'Chọn khách hàng', 'value' => 5, 'group_class' => 'col-md-6'],
                ['name' => 'name', 'type' => 'text', 'label' => 'Loại xe', 'group_class' => 'col-md-6'],
                ['name' => 'name', 'type' => 'date_vi', 'label' => 'Ngày thuê', 'group_class' => 'col-md-6'],
            ['name' => 'name', 'type' => 'date_vi', 'label' => 'Ngày trả', 'group_class' => 'col-md-6'],
                ['name' => 'name', 'type' => 'text', 'label' => 'Ghi chú', 'group_class' => 'col-md-6'],
                ['name' => 'name', 'type' => 'text', 'label' => 'Địa điểm nhận xe', 'group_class' => 'col-md-6'],

            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, type'
    ];

    protected $filter = [
        'status' => [
            'label' => 'Trạng thái',
            'type' => 'select',
            'options' => [
                '' => 'Tất cả',
                0 => 'Không kich hoạt',
                1 => 'Kich hoạt',
            ],
            'query_type' => '='
        ],
    ];

    public function getIndex(Request $request)
    {

        $data = $this->getDataList($request);

        return view('CRMEdu.chothuexe.list')->with($data);
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
                return view('CRMEdu.chothuexe.add')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ], [
                    'name.required' => 'Bắt buộc phải nhập tên',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $data = $this->processingValueInFields($request, $this->getAllFormFiled());
                    //  Tùy chỉnh dữ liệu insert

                    $data['admin_id'] = \Auth::guard('admin')->user()->id;

                    $data['bill_ids'] = '|' . implode('|', $request->get('bill_ids', [])) . '|';

                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
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

    public function update(Request $request)
    {
        try {


            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);
                return view('CRMEdu.classroom.edit')->with($data);
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

                    $data['bill_ids'] = '|' . implode('|', $request->get('bill_ids', [])) . '|';

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
