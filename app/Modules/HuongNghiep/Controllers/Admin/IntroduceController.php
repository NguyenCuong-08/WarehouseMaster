<?php

namespace App\Modules\HuongNghiep\Controllers\Admin;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Helpers\CommonHelper;
use Auth;
use App\Modules\HoChieu\Controllers\Admin\CURDBaseController;
use App\Modules\HoChieu\Models\Passport;
use App\Modules\HoChieu\Models\TypePassport;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use Validator;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class IntroduceController extends CURDBaseController
{

    protected $module = [
        'code' => 'introduce',
        'table_name' => 'introduce',
        'label' => 'Giới thiệu',
        'modal' => '\App\Modules\HuongNghiep\Models\Introduce',
        'list' => [


        ],
        'form' => [
            'general_tab' => [
                ['name' => 'title', 'type' => 'text', 'class' => 'required', 'label' => 'Tiêu đề giới thiệu', 'group_class' => 'col-md-12'],
                ['name' => 'content', 'type' => 'textarea_editor', 'class' => 'required', 'label' => 'Nội dung giới thiệu','group_class' => 'col-md-12'],
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, type'
    ];

    protected $filter = [

        'filter_date' => [
            'label' => 'Ngày quét',
            'type' => 'filter_date',
            'options' => [
                '' => '',
                'created_at' => 'Ngày quét',
            ],
            'query_type' => 'filter_date'
        ],
        'nationality' => [
            'label' => 'Quốc gia',
            'type' => 'select2_qg_model',
            'display_field'=>'nationality',
            'model'=> Passport::class,
            'query_type' => 'like'
        ],
    ];

    public function add(Request $request)
    {
        try {

            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('HuongNhiep.Admin.introduce.add')->with($data);
            } else if ($_POST) {

                \DB::beginTransaction();
                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'content' => 'required',
                ], [
                    'title' => 'Bắt buộc phải nhập tiêu đề',
                    'content' => 'Bắt buộc phải nhập nội dung',

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

                    foreach ($data as $k => $v) {
                        $this->model->$k = $v;
                    }

                    if ($this->model->save()) {
                        $this->model->code_id = 'S' . $this->model->id;
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


    public function update(Request $request)
    {
        try {

            $item = $this->model->find($request->id);

            if (!is_object($item)) abort(404);
            if (!$_POST) {
                $data = $this->getDataUpdate($request, $item);
                return view('HuongNghiep.Admin.introduce.update')->with($data);
            } else if ($_POST) {
                \DB::beginTransaction();

                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'content' => 'required',
                ], [
                    'title' => 'Bắt buộc phải nhập tiêu đề',
                    'content' => 'Bắt buộc phải nhập nội dung',
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
        Excel::create(str_slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($excel) use ($data) {

            // Set the title
            $excel->setTitle($this->module['label'] . ' ' . date('d m Y'));

            $excel->sheet(str_slug($this->module['label'], '_') . '_' . date('d_m_Y'), function ($sheet) use ($data) {

                $field_name = ['STT'];
                $field_name[] = 'Loại';
                $field_name[] = 'Mã quốc gia';
                $field_name[] = 'Số hộ chiếu';
                $field_name[] = 'Họ và tên';
                $field_name[] = 'Quốc tịch';
                $field_name[] = 'Ngày sinh';
                $field_name[] = 'Nơi sinh';
                $field_name[] = 'Giới tính';
                $field_name[] = 'Số căn cước/ID';
                $field_name[] = 'Ngày cấp';
                $field_name[] = 'Có giá trị đến';

                $sheet->row(1, $field_name);

                $k = 2;

                foreach ($data as $value) {
                    $data_export = [];
                    $data_export[] = $value->id;
                    $data_export[] = $value->passport_class;
                    $data_export[] = $value->country_code;
                    $data_export[] = $value->passport_number;
                    $data_export[] = $value->name;
                    $data_export[] = $value->nationality;
                    $data_export[] = $value->dob;
                    $data_export[] = $value->pob;
                    $data_export[] = $value->sex;
                    $data_export[] = $value->id_number;
                    $data_export[] = $value->doi;
                    $data_export[] = $value->doe;
                    $str = '';
                    $data_export[] = $str;


                    // dd($this->getAllFormFiled());
                    $sheet->row($k, $data_export);
                    $k++;
                }
            });
        })->download('xlsx');
    }

}
