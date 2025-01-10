<?php

namespace App\Modules\Post\Controllers\Admin;

use App\CRMDV\Models\HoaDon;
use App\CRMDV\Models\Invoice;
use App\CRMDV\Models\PackDetail;
use App\Modules\Logistics\Controllers\Admin\CURDBaseController;
use App\Modules\Logistics\Models\Bill;
use App\Http\Helpers\CommonHelper;
use App\Modules\Post\Models\BackDetail;
use Illuminate\Http\Request;
use App\Modules\Logistics\Models\Codes;
use App\Modules\Logistics\Models\Theme;
use App\Modules\Logistics\Models\Tag;
use Validator;
use App\Modules\Logistics\Models\PostTag;
use App\Modules\Logistics\Models\BillProgress;

class BillController extends CURDBaseController
{

    protected $module = [
        'code' => 'hoadon',
        'table_name' => 'bills',
        'label' => 'Hóa Đơn',
        'modal' => '\App\Modules\Post\Models\Bill',
        'list' => [
            ['name' => 'ref_code', 'type' => 'text', 'label' => 'Ref Code'],
            ['name' => 'hawb_code', 'type' => 'text', 'label' => 'HAWB Code'],
            ['name' => 'bill_up_id', 'type' => 'text', 'label' => 'RG Code'],
//            ['name' => 'admin_id', 'type' => 'text', 'label' => 'Admin'],
            ['name' => 'send_company_name', 'type' => 'text', 'label' => 'Công ty gửi'],
            ['name' => 'receiver_name', 'type' => 'text', 'label' => 'Công ty nhận'],
            //  ['name' => 'multi_cat', 'type' => 'text', 'label' => 'Danh mục'],
//            ['name' => 'service', 'type' => 'text', 'label' => 'SERVICE'],
//            ['name' => 'bill', 'type' => 'text', 'label' => 'BILL/INVOICE'],
            ['name' => 'hanh_dong', 'type' => 'custom', 'td' => 'Logistics.bill_up.list.td.hanh_dong', 'label' => 'Hành động'],
//            ['name' => 'name_customer', 'type' => 'text',  'label' => 'Địa chỉ'],
//            ['name' => 'status', 'type' => 'custom', 'td' => 'Logistics.package.list.td.trang_thai', 'label' => 'Trạng thái'],
//            ['name' => 'image_extra', 'type' => 'custom', 'td' => 'Logistics.package.list.td.slide_anh', 'label' => 'Ảnh'],
//            ['name' => 'khoang_tang', 'type' => 'custom', 'td' => 'Logistics.package.list.td.khoang_tang', 'label' => 'Khoảng tầng'],
//            ['name' => 'service_id', 'type' => 'custom', 'td' => 'Logistics.package.list.td.du_an', 'label' => 'Dự án', 'object' => 'service', 'display_tdfield' => 'name_vi'],
//            ['name' => 'gia_niem_yet', 'type' => 'price_vi', 'label' => 'Giá'],
//            ['name' => 'dien_tich', 'type' => 'custom', 'td' => 'Logistics.package.list.td.dientich', 'label' => 'Diện tích'],
//            ['name' => 'so_phong_ngu', 'type' => 'number', 'label' => 'Phòng ngủ'],
//            ['name' => 'created_at', 'type' => 'date_vi', 'label' => 'Ngày tạo'],
//            ['name' => 'admin_id', 'type' => 'relation', 'label' => 'Đầu chủ', 'object' => 'admin', 'display_field' => 'name'],
//            ['name' => 'hanh_dong', 'type' => 'custom', 'td' => 'Logistics.package.list.td.hanh_dong', 'label' => 'Hành động'],
        ],
        'form' => [
            'general_tab' => [
//                ['name' => 'name', 'class' => 'required', 'type' => 'text', 'label' => 'Tiêu đề', 'group_class' => 'col-md-6'],
//                ['name' => 'link', 'class' => 'required', 'type' => 'text', 'label' => 'Link', 'group_class' => 'col-md-6'],
//                // ['name' => 'admin_id', 'class' => 'required', 'type' => 'relation', 'label' => 'Admin' ,'group_class' => 'col-md-6'],
//                ['name' => 'content', 'class' => 'required', 'type' => 'text', 'label' => 'Nội dung', 'group_class' => 'col-md-6'],
//                ['name' => 'multi_cat', 'class' => 'required', 'type' => 'select2_model', 'label' => 'Danh mục', 'model' => \App\Modules\Post\Models\Categori::class, 'object' => 'categori', 'display_field' => 'name', 'group_class' => 'col-md-6'],
//           ['name' => 'service', 'type' => 'text', 'label' => 'SERVICE'],
//            ['name' => 'bill', 'type' => 'text', 'label' => 'BILL/INVOICE'],
                //   ['name' => 'hanh_dong', 'type' => 'custom', 'td' => 'Logistics.bill_up.list.td.hanh_dong', 'label' => 'Hành động'],
//             ['name' => 'loai_hinh', 'class' => 'required', 'type' => 'select', 'options' => [
//                    '' => '',
//                    'Mua bán' => 'Mua bán',
//                    'Cho thuê' => 'Cho thuê',
//                ], 'label' => 'Loại hình', 'group_class' => 'col-md-6'],
//                ['name' => 'loai_nha_dat', 'class' => 'required', 'type' => 'select', 'options' => [
//                    '' => '',
//                    'Nhà đất riêng lẻ' => 'Nhà đất riêng lẻ',
//                    'Liền kề - biệt thự' => 'Liền kề - biệt thự',
//                    'Chung cư' => 'Chung cư',
//                ], 'label' => 'Loại nhà đất', 'group_class' => 'col-md-6'],
//                ['name' => 'service_id', 'class' => 'required', 'type' => 'select2_model', 'label' => 'Dự án', 'model' => \App\Modules\Logistics\Models\Service::class, 'object' => 'service', 'display_field' => 'name_vi', 'group_class' => 'col-md-6'],
////                ['name' => 'project_type_id', 'type' => 'select2_model', 'label' => 'Loại dự án', 'model' => \App\Modules\Logistics\Models\Project_type::class,'where' => 'type="project"', 'object' => 'project_type', 'display_field' => 'name', 'group_class' => 'col-md-6'],
//                ['name' => 'province_id', 'type' => 'custom', 'no_export' => true, 'field' => 'Logistics.package.list.form.select_location2', 'label' => 'Chọn địa điểm', 'group_class' => 'col-md-9'],
//                ['name' => 'duong', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'label' => 'Đường', 'class' => 'required', 'group_class' => 'col-md-12'],
//                ['name' => 'address', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'class' => 'required', 'label' => 'Địa chỉ chi tiết', 'group_class' => 'col-md-12'],
//                ['name' => 'dien_tich', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'class' => 'required', 'label' => 'Diện tích', 'group_class' => 'col-md-4'],
//                ['name' => 'so_phong_ngu', 'type' => 'custom', 'field' => 'Logistics.package.list.form.number', 'class' => 'required', 'label' => 'Số phòng ngủ', 'group_class' => 'col-md-4'],
//                ['name' => 'khoang_tang', 'class' => 'required', 'type' => 'select', 'options' => [
//                    '' => '',
//                    'Tầng thấp' => 'Tầng thấp',
//                    'Tầng trung' => 'Tầng trung',
//                    'Tầng cao' => 'Tầng cao',
//                ], 'label' => 'Khoảng tầng', 'group_class' => 'col-md-4'],
//                ['name' => 'huong_cua_chinh', 'class' => '', 'type' => 'select', 'options' => [
//                    '' => '',
//                    'Đông' => 'Đông',
//                    'Tây' => 'Tây',
//                    'Nam' => 'Nam',
//                    'Bắc' => 'Bắc',
//                    'Đông Bắc' => 'Đông Bắc',
//                    'Tây Bắc' => 'Tây Bắc',
//                    'Tây Nam' => 'Tây Nam',
//                    'Đông Nam' => 'Đông Nam',
//                ], 'label' => 'Hướng cửa chính', 'group_class' => 'col-md-4'],
//                ['name' => 'ban_cong', 'type' => 'custom', 'field' => 'Logistics.package.list.form.number', 'label' => 'Ban công / Lô gia', 'group_class' => 'col-md-4'],
//                ['name' => 'so_nha_ve_sinh', 'type' => 'custom', 'field' => 'Logistics.package.list.form.number', 'label' => 'Số nhà vệ sinh', 'group_class' => 'col-md-4'],
//                ['name' => 'link', 'type' => 'text', 'class' => '', 'label' => 'Đường', 'group_class' => 'col-md-12'],
            ],
//
//            'remind_tab' => [
//                ['name' => 'image', 'type' => 'file_image', 'label' => 'Ảnh đại diện'],
////                ['name' => 'image_extra', 'type' => 'custom', 'field' => 'Logistics.package.list.form.multiple_image', 'class' => 'required', 'count' => '6', 'label' => 'Ảnh nhà chào bán'],
//            ],
            'des_tab' => [
//                ['name' => 'gia_niem_yet', 'type' => 'price_vi', 'class' => 'required', 'label' => 'Giá bán', 'group_class' => 'col-md-4'],
//                ['name' => 'phi_moi_gioi', 'type' => 'price_vi', 'class' => 'required', 'label' => 'Phí môi giới', 'group_class' => 'col-md-4'],
//                ['name' => 'content', 'type' => 'custom', 'field' => 'Logistics.package.list.form.textarea', 'label' => 'Mô tả chi tiết','class' => 'required' ],
////                ['name' => 'content', 'type' => 'textarea_editor', 'class' => '', 'label' => 'Mô tả chi tiết tính năng'],
//                ['name' => 'intro', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'label' => 'Họ tên chủ nhà', 'class' => 'required', 'group_class' => 'col-md-6'],
//                ['name' => 'dia_chi_tren_so', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'class' => '', 'label' => 'Địa chỉ chủ nhà', 'group_class' => 'col-md-6'],
//                ['name' => 'sdt_chu_nha', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'label' => 'Số điện thoại chủ nhà', 'class' => 'required', 'group_class' => 'col-md-6'],
//
//                ['name' => 'so_giay_chung_nhan', 'type' => 'custom', 'field' => 'Logistics.package.list.form.text', 'label' => 'Số seri sổ/GCN/HDMB', 'group_class' => 'col-md-6'],
////                ['name' => 'seri', 'type' => 'text', 'label' => 'Số hợp đồng mua bán', 'group_class' => 'col-md-12'],
//                ['name' => 'so_do_va_hop_dong_chu_nha', 'type' => 'custom', 'field' => 'Logistics.package.list.form.multiple_image','class' => 'required', 'count' => '6', 'label' => 'Sổ đỏ và hợp đồng ký gửi với chủ nhà'],
////                ['name' => 'xac_thuc', 'type' => 'checkbox', 'label' => 'Trạng thái tin xác thực', 'value' => 1, 'group_class' => 'col-md-4'],
////                ['name' => 'trang_thai_2', 'type' => 'checkbox', 'label' => 'Trạng thái tin xác thực', 'value' => 1, 'group_class' => 'col-md-4'],
////                ['name' => 'da_ban', 'type' => 'checkbox', 'label' => 'Đã bán', 'value' => 1, 'group_class' => 'col-md-4'],
//                ['name' => 'status', 'class' => '', 'type' => 'radio', 'value' => 'Đang bán', 'options' => [
//                    'Đang bán' => 'Đang bán',
//                    'Đã bán' => 'Đã bán',
//                    'Tạm dừng' => 'Tạm dừng',
//                ], 'label' => 'Trạng thái', 'group_class' => 'col-md-4'],
//
            ],
        ]
    ];

    protected $quick_search = [
        'label' => 'ID',
        'fields' => 'id, name'
    ];

    protected $filter = [

    ];

    public function getIndex(Request $request)
    {
        $data = $this->getDataList($request);

        return view('Logistics.bill.list')->with($data);
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

        return $query;
    }

    public function formupdate($id)
    {
        $bill = \App\Modules\Post\Models\Bill::where('id', $id)->first();
        if($bill->type == 'doc'){
            return view('Logistics.bill.doc_hoa_don', compact('bill'));
        }else{
            $backdetail = BackDetail::where('bill_id', $id)->get();
            $invoice = \App\Modules\Post\Models\Invoice::where('bill_id', $id)->get();
            return view('Logistics.bill.pack_hoa_don', compact('bill', 'backdetail', 'invoice'));
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

    public function update(Request $request, $id)
    {
        try {
            \DB::beginTransaction();
            if ($request->doc !== null) {
                // dd($request->all());
                $hoadon = HoaDon::where('id', $id)->update([
                    'services' => $request->dichvuvanchuyen,
                    'ref_code' => $request->refcode,
                    'hawb_code' => $request->hawbCode,
                    'bill_up_id' => $request->rgcode,
                    'number_commodity' => $request->sokien,
                    'weight' => $request->cannang,
                    'type' => 'doc',
                    'send_company_name' => $request->congtygui,
                    'sender_name' => $request->nguoilhgui,
                    'sender_address' => $request->diachilienhegui,
                    'sender_tel' => $request->sdtgui,
                    'email' => $request->emailgui,
                    'receiver_company' => $request->congtynhan,
                    'receiver_name' => $request->nguoilhnhan,
                    'receiver_tel' => $request->sdtnhan,
                    'country' => $request->quocgianhan,
                    'postal_code' => $request->mabuuchinh,
                    'city' => $request->thanhpho,
                    'province' => $request->tinh,
                    'receiver_address1' => $request->diachinhan1,
                    'receiver_address2' => $request->diachinhan2,
                    'receiver_address3' => $request->diachinhan3
                ]);
                if ($hoadon !== null) {
                    \DB::commit();
                    CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    return redirect()->back();
                } else {
                    \DB::rollback();
                    CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    return redirect()->back();
                }

            } else {
                $hoadon = HoaDon::where('id', $id)->update([
                    'services' => $request->dichvuvanchuyen,
                    'ref_code' => $request->refcode,
                    'totalCharfedWeight'=>$request->totalCharfedWeight,
                    'totalNumberPack'=>$request->totalNumberPack,
                    'hawb_code' => $request->hawbCode,
                    'bill_up_id' => $request->rgcode,
                    'content' => $request->tenhang,
                    'invoice_value' => $request->giatrikhaibao,
                    'type' => 'pack',
                    'send_company_name' => $request->congtygui,
                    'sender_name' => $request->nguoilhgui,
                    'sender_address' => $request->diachilienhegui,
                    'sender_tel' => $request->sdtgui,
                    'email' => $request->emailgui,
                    'receiver_company' => $request->congtynhan,
                    'receiver_name' => $request->nguoilhnhan,
                    'receiver_tel' => $request->sdtnhan,
                    'country' => $request->quocgianhan,
                    'postal_code' => $request->mabuuchinh,
                    'city' => $request->thanhpho,
                    'province' => $request->tinh,
                    'receiver_address1' => $request->diachinhan1,
                    'receiver_address2' => $request->diachinhan2,
                    'receiver_address3' => $request->diachinhan3,
                    'export_as' => $request->invoiceExportFormat
                ]);
                if ($hoadon !== null) {
                    $quantitypack = $request->quantitypack;
                    $typeback = $request->typeback;
                    $lengthpack = $request->lengthpack;
                    $widthpack = $request->widthpack;
                    $heightpack = $request->heightpack;
                    $weightpack = $request->weightpack;
                    $tlquydoi = $request->tlquydoi;
                    $tltinh = $request->tltinh;
                    PackDetail::where('bill_id', $id)->delete();
                    Invoice::where('bill_id', $id)->delete();
                    foreach ($quantitypack as $key => $item) {
                        PackDetail::create([
                            'bill_id' => $id,
                            'quantity' => $item,
                            'type' => $typeback[$key],
                            'length' => $lengthpack[$key],
                            'width' => $widthpack[$key],
                            'height' => $heightpack[$key],
                            'weight' => $weightpack[$key],
                            'converted_weight' => $tlquydoi[$key],
                            'charged_weight' => $tltinh[$key]
                        ]);
                    }

                    $description = $request->description;
                    $quantityinvoice = $request->quantityinvoice;
                    $unitinvoice = $request->unitinvoice;
                    $unitPriceinvoice = $request->unitPriceinvoice;
                    $subTotalinvoice = $request->subTotalinvoice;
                    foreach ($description as $key => $item) {
                        Invoice::create([
                            'bill_id' => $id,
                            'goods_detail' => $item,
                            'quantity' => $quantityinvoice[$key],
                            'unit' => $unitinvoice[$key],
                            'price' => $unitPriceinvoice[$key],
                            'total_value' => $subTotalinvoice[$key]
                        ]);
                    }
                    \DB::commit();
                    CommonHelper::one_time_message('success', 'Cập nhật thành công!');
                    return redirect()->back();
                } else {
                    \DB::rollback();
                    CommonHelper::one_time_message('error', 'Lỗi cập nhật. Vui lòng load lại trang và thử lại!');
                    return redirect()->back();
                }
            }

        } catch (\Exception $ex) {
            \DB::rollback();
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
            PackDetail::where('bill_id', $request->id)->delete();
            Invoice::where('bill_id', $request->id)->delete();
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
        dd('1');
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
                $field_name[] = 'Tài khoản mua';
                $field_name[] = 'Gói';
                $field_name[] = 'Số điểm';
                $field_name[] = 'Tên người nhận';
                $field_name[] = 'Sdt nhận';
                $field_name[] = 'Địa chỉ nhận';
                $field_name[] = 'Ghi chú';
                $field_name[] = 'Ngày mua';
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
                    $data_export[] = @$value->admin['name'];
                    $data_export[] = @$value->goi_dich_vu['name'];
                    $data_export[] = @$value->total_price;
                    $data_export[] = @$value->receive_user;
                    $data_export[] = @$value->receive_phone;
                    $data_export[] = @$value->receive_address;
                    $data_export[] = @$value->note;
                    $data_export[] = @$value->created_at;
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
