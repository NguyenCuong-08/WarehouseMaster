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

class ZoomMeetingController extends CURDBaseController
{

    protected $module = [
        'code' => 'classroom',
        'table_name' => 'classroom',
        'label' => 'Phòng học',
        'modal' => '\App\CRMEdu\Models\Zoom',
        'list' => [
//            ['name' => 'subject', 'type' => 'text', 'label' => 'Chủ đề'],
//            ['name' => 'password', 'type' => 'text', 'label' => 'Mật khẩu',],
//            ['name' => 'link', 'type' => 'text', 'label' => 'Link phòng',],
//            ['name' => 'amount_of_people', 'type' => 'text', 'label' => 'Số người',],
//            ['name' => 'time_meeting', 'type' => 'text', 'label' => 'Thời lượng',],
//            ['name' => 'price', 'type' => 'text', 'label' => 'Đơn giá',],
//            ['name' => 'payment_method', 'type' => 'text', 'label' => 'Thanh toán',],
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'subject', 'type' => 'text', 'class' => 'required', 'label' => 'Chủ đề', 'group_class' => 'col-md-6'],
                ['name' => 'password', 'type' => 'text', 'class' => 'required', 'label' => 'Mật khẩu','group_class' => 'col-md-6'],
                ['name' => 'amount_of_people', 'type' => 'select', 'class' => '', 'label' => 'Phòng', 'group_class' => 'col-md-6','options'=>[
                    '10 người'=>'10 người',
                    '20 người'=>'20 người',
                    '50 người'=>'50 người',
                    '500 người'=>'500 người',
                    '1000 người'=>'1000 người',
                ]],
                ['name' => 'time_meeting', 'type' => 'select', 'class' => '', 'label' => 'Thời lượng', 'group_class' => 'col-md-6','options'=>[
                    '1 giờ'=>'1 giờ',
                    '2 giờ'=>'2 giờ',
                    '3 giờ'=>'3 giờ',
                    '4 giờ'=>'4 giờ',
                    '5 giờ'=>'5 giờ',
                    '6 giờ'=>'6 giờ',
                    '7 giờ'=>'7 giờ',
                    '8 giờ'=>'8 giờ',
                    '9 giờ'=>'9 giờ',
                    '10 giờ'=>'10 giờ',
                ]],
                ['name'=>'price','type'=>'text','label' => 'Đơn giá', 'group_class' => 'col-md-6'],
                ['name'=>'link','type'=>'select','label' => 'Link phòng', 'group_class' => 'col-md-6','options'=>[
                    'Ngẫu nhiên'=>'Ngẫu nhiên',
                ]],

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

        return view('CRMEdu.classroom.list')->with($data);
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
                return view('CRMEdu.zooms.add')->with($data);
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

    public function createMeet()
    {
        $start_time = gmdate("Y-m-d\TH:i:s", strtotime(date('2024-02-19 00:03:17')));
//        $meetings = (new \App\CRMEdu\Controllers\Admin\ZoomController)->createMeeting([
//            "topic" => 'hop', // chủ đề
//            "type" => 2, // mặc định
//            "duration" => 60, // tính theo phút, tuy nhiên hết giờ vẫn ko kết thúc meeting nên phải gọi api riêng
//            "timezone" => 'Asia/Saigon',
//            "password" => '123456', // mật khẩu
//            "start_time" => $start_time, // thời gian bắt đầu meeting - để trống sẽ mặc định là thời gian tạo meeting hiện tại
//            "settings" => [
//                'join_before_host' => true, // người ko phải host join đc vào meeting khi chưa có host
//            ],
//        ]);
        $meetings = new ZoomController();
        dd($meetings);
        $meetings = $meetings->createMeeting([
            "topic" => 'hop', // chủ đề
            "type" => 2, // mặc định
            "duration" => 60, // tính theo phút, tuy nhiên hết giờ vẫn ko kết thúc meeting nên phải gọi api riêng
            "timezone" => 'Asia/Saigon',
            "password" => '123456', // mật khẩu
            "start_time" => $start_time, // thời gian bắt đầu meeting - để trống sẽ mặc định là thời gian tạo meeting hiện tại
            "settings" => [
                'join_before_host' => true, // người ko phải host join đc vào meeting khi chưa có host
            ],
        ]);
        dd($meetings);
        print_r($meetings['data']['join_url']); // link join meeting ko cần mật khẩu
        echo "<br>";
        print_r($meetings['data']['start_url']); // link join meeting cần mật khẩu
        echo "<br>";
        print_r($meetings['data']['id']); // meeting id - có thể join meeting - dùng để endMeeting
    }
}

class ZoomHttpClient
{
    protected $clientId;
    protected $clientSecret;
    protected $accountId;
    protected $accessToken;
    protected $httpClient;

    public function __construct(string $clientId, string $clientSecret, string $accountId)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accountId = $accountId;
        $this->accessToken = $this->getAccessToken();
    }

    protected function getAccessToken()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://zoom.us/oauth/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'grant_type' => 'account_credentials',
            'account_id' => $this->accountId,
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
            'Host: zoom.us',
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseBody = json_decode($response, true);
        return $responseBody['access_token'];
    }

    public function request($method, $url, $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.zoom.us/v2/' . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->accessToken,
            'Content-Type: application/json',
        ]);
        if ($method === 'POST' || $method === 'PUT') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return [
            'status' => true,
            'data' => json_decode($response, true),
        ];
    }
}
