@extends('CRMDV.dashboard.new_header.new_template')
@section('main')
    <style>
        .w-50 {
            width: 50% !important;
        }

        .input-group-append {
            margin-left: -1px;
        }

        .input-group-prepend, .input-group-append {
            display: flex;
        }

        #btn_gtri {
            margin: 0 5px;
        }

        .breadcrumb {
            margin-top: -15px;
            font-size: 0.9rem;
            display: flex;
            flex-wrap: wrap;
            padding: 0 0;
            margin-bottom: 1rem;
            list-style: none;
            background-color: transparent;
        }

        .breadcrumb .breadcrumb-item {
            font-weight: 600;
            font-size: 16px;
            line-height: 16px;
            color: #000000;
        }

        .breadcrumb-item {
            display: flex;
        }

        .breadcrumb-item + .breadcrumb-item {
            padding-left: 0.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .card {
            /*background: #fffbef;*/
            border-radius: 0px 20px 0px 0px;
            border: 0;
            height: 100%;
        }

        .card .form-control {
            height: 38px;
            /* background: #f1f1f1; */
            border: 1px solid #d1d1d6;
            border-radius: 8px;
        }

        element.style {
            border-radius: 8px;
            height: 38px;
        }

        .flex-row {
            flex-direction: row !important;
        }

        .d-flex {
            display: flex !important;
        }

        .btn.btn-secondary {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn.btn-secondary {
            background: #1db2ff !important;
            font-weight: 700;
            font-size: 14px;
            line-height: 16px;
            text-transform: capitalize;
            border-color: #1db2ff;
            color: #000000;
            min-height: 35px;
        }

        .btn.btn-default i {
            color: #282a3c;
        }

        label {
            color: #000000;
        }

        .btn-success {
            color: #fff;
            background-color: #1db2ff;
            border-color: #1db2ff;
            color: #ffffff;
        }

        .card .card-header {
            background: linear-gradient(90deg, #1db2ff 26.16%, rgba(191, 224, 75, 0.14));
            border: 0;
            border-radius: 0px 20px 0px 0px;
            font-weight: 700;
            font-size: 16px;
            line-height: 20px;
            text-transform: capitalize;
            color: #000000;
            height: 60px;
        }

        .Bill_required__3WKSD {
            content: "*";
            color: red;
        }

        .ml-1, .mx-1 {
            margin-left: 0.25rem !important;
        }

        .Widget_widget__16nWC {
            display: block;
            position: relative;
            margin-bottom: 30px;
            padding: 15px 20px;

        }

        .backdetail {
            background: #fff;
        }

        .Widget_title__2xIdN {
            margin-top: 0;
            margin-bottom: 1.5rem / 2;
            color: #444;
        }

        .fw-semi-bold {
            font-weight: 600;
        }

        p + p {
            margin-top: 8px;
        }

        .table-sm {
            font-size: 0.9rem;
        }

        .table thead th, .table thead td {
            border-bottom-width: 0;
            border-bottom: 0;
            font-weight: 600;
            font-size: 16px;
            line-height: 16px;
            text-align: center;
            color: #000000;
            white-space: nowrap;
            text-transform: uppercase;
        }

        .table .input-group {
            grid-gap: 6px;
            grid-gap: 6px;
            gap: 6px;
        }

        .Bill_selectCustom__3IPWx {
            border-color: #ccc;
            background-color: white;
            padding: 7px;
        }

        div select, select.custom-select, select.form-control, input.pickup-date, #logisticService, .range-pickup-date input {
            cursor: pointer;
            appearance: none !important;
            background-image: url(/static/media/icon-select.655b8955.svg) !important;
            background-position: center right !important;
            background-repeat: no-repeat !important;
        }

        input.form-control, .custom-select, select, .input-group-text, #btn_gtri, input[type="text"], .range-pickup-date input {
            font-size: 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            line-height: 16px;
            color: #000000;
            transition: all 0.3s;
            outline: none;
        }

        .input-group-sm > .form-control, .input-group-sm > .custom-select, .input-group-sm > .input-group-prepend > .input-group-text, .input-group-sm > .input-group-append > .input-group-text, .input-group-sm > .input-group-prepend > .btn, .input-group-sm > .input-group-append > .btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.8rem;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #cccbca;
        }

        .btn.btn-default {
            border: 1px solid #fff;
        }

        .btn i {
            padding-right: 0px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <div class="container">
        <form class="needs-validation" action="{{ route('updatehoadon', ['id'=>$bill->id]) }}" method="POST">
            {{ csrf_field() }}
            <div id="BillForm">
                <nav class="" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">TRANG</li>
                        <li class="active breadcrumb-item" aria-current="page">Hoá đơn</li>
                    </ol>
                </nav>
                <div class="Toastify"></div>
                <div class="row">
                    <div class="mb-4 col-lg-3">
                        <div class="card"><h5 class="card-header">Thông tin Đơn hàng (Shipment Info)</h5>
                            <div class="card-body">
                                <div class="form-group"><label for="logisticService" class="">Dịch vụ vận chuyển
                                        (Services) <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                             placeholder="Chọn hoặc nhập"
                                                                                                             name="dichvuvanchuyen"
                                                                                                             id="logisticService"
                                                                                                             list="logisticServiceList"
                                                                                                             type="text"
                                                                                                             class="form-control"
                                                                                                             value="{{ $bill->services }}">
                                    <datalist id="logisticServiceList">
                                        <option value="AIR LOCAL US"> AIR LOCAL US</option>
                                        <option value="AIR LOCAL CA"> AIR LOCAL CA</option>
                                        <option value="AIR LOCAL AU"> AIR LOCAL AU</option>
                                        <option value="AIR LOCAL NZ"> AIR LOCAL NZ</option>
                                        <option value="SEA LOCAL AU"> SEA LOCAL AU</option>
                                        <option value="SEA LOCAL NZ"> SEA LOCAL NZ</option>
                                        <option value="DHL SIN"> DHL SIN</option>
                                        <option value="FEDEX SIN"> FEDEX SIN</option>
                                        <option value="UPS SIN"> UPS SIN</option>
                                        <option value="FEDEX VN"> FEDEX VN</option>
                                        <option value="UPS VN"> UPS VN</option>
                                        <option value="DHL VN"> DHL VN</option>
                                        <option value="LOCAL SIN"> LOCAL SIN</option>
                                        <option value="LOCAL AU"> LOCAL AU</option>
                                        <option value="LOCAL USA"> LOCAL USA</option>
                                        <option value="LOCAL EU"> LOCAL EU</option>
                                    </datalist>
                                    <div class="Bill_error__2txCw"></div>
                                </div>
                                <div class="form-group"><label for="referenceCode" class="">Ref Code</label>
                                    <div class="d-flex flex-row"><input id="referenceCode" name="refcode"
                                                                        type="text" class="form-control"
                                                                        value="{{ $bill->ref_code }}"></div>
                                </div>
                                <div class="form-group"><label for="referenceCode" class="">HAWB Code</label>
                                    <div class="d-flex flex-row"><input id="referenceCode" name="hawbCode" type="text"
                                                                        class="form-control"
                                                                        value="{{ $bill->hawb_code }}"></div>
                                </div>
                                <div class="form-group"><label for="referenceCode" class="">RG Code</label>
                                    <div class="d-flex flex-row"><input id="referenceCode" name="rgcode" type="text"
                                                                        class="form-control"
                                                                        value="{{ $bill->bill_up_id }}">
                                        <button class="btn btn-secondary ml-1"
                                                style="border-radius: 8px; height: 38px;">Xem Billup
                                        </button>
                                    </div>
                                </div>
                                <input id="solienhidden" type="hidden"
                                       data-number-commodity="{{ $bill->number_commodity }}">
                                <input id="contenthidden" type="hidden" data-contenthidden="{{ $bill->content }}">
                                <input id="invoicevaluehidden" type="hidden"
                                       data-packinvoiceunit="{{ $bill->invoice_value }}">
                                <input id="packInvoiceUnithidden" type="hidden"
                                       data-packinvoiceunithidden="{{ $bill->packInvoiceUnit }}">
                                <input type="hidden" id="totalNumberPackinput" name="totalNumberPack"
                                       value="{{ $bill->totalNumberPack }}">
                                <input type="hidden" id="totalCharfedWeightinput" name="totalCharfedWeight"
                                       value="{{ $bill->totalCharfedWeight }}">

                                <div id="tenhang" class="form-group"><label for="packContent">Tên Hàng (content) <span
                                                class="Bill_required__3WKSD">*</span></label>
                                    <input id="packContent" name="tenhang" type="text" class="form-control"
                                           aria-invalid="false" value="111">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                                <input type="hidden" id="cannanghidden" data-cannanghidden= {{ $bill->weight }}>
                                <div id="giatrikhaibao" class="form-group"><label for="packInvoiceValue" class="">Giá
                                        trị khai báo (invoice
                                        value)</label>
                                    <div class="input-group"><input id="packInvoiceValue" name="giatrikhaibao"
                                                                    type="number" class="form-control" value="65"
                                                                    enable="false">
                                        <div class="input-group-append w-50">
                                            <button style="padding: 5px" class="btn btn-outline-secondary btn-sm"
                                                    type="button" id="btn_gtri">GET
                                            </button>
                                            <input style="padding: 0px" placeholder="Loại" id="packInvoiceUnit"
                                                   name="packInvoiceUnit" list="typeListUnit" type="text"
                                                   class="input-group-append form-control" value="USD">
                                            <datalist id="typeListUnit">
                                                <option value="AED"> AED</option>
                                                <option value="AUD"> AUD</option>
                                                <option value="BDT"> BDT</option>
                                                <option value="BHD"> BHD</option>
                                                <option value="BND"> BND</option>
                                                <option value="CAD"> CAD</option>
                                                <option value="CHF"> CHF</option>
                                                <option value="CNY"> CNY</option>
                                                <option value="CNP"> CNP</option>
                                                <option value="CZK"> CZK</option>
                                                <option value="DKK"> DKK</option>
                                                <option value="EUR"> EUR</option>
                                                <option value="GBP"> GBP</option>
                                                <option value="HKD"> HKD</option>
                                                <option value="IDR"> IDR</option>
                                                <option value="INR"> INR</option>
                                                <option value="JPY"> JPY</option>
                                                <option value="KRW"> KRW</option>
                                                <option value="KWD"> KWD</option>
                                                <option value="LKR"> LKR</option>
                                                <option value="NMK"> NMK</option>
                                                <option value="MUR"> MUR</option>
                                                <option value="MYR"> MYR</option>
                                                <option value="NOK"> NOK</option>
                                                <option value="NZD"> NZD</option>
                                                <option value="PGK"> PGK</option>
                                                <option value="PHP"> PHP</option>
                                                <option value="PKR"> PKR</option>
                                                <option value="RMB"> RMB</option>
                                                <option value="RUB"> RUB</option>
                                                <option value="SEK"> SEK</option>
                                                <option value="SGD"> SGD</option>
                                                <option value="THB"> THB</option>
                                                <option value="TWD"> TWD</option>
                                                <option value="USD"> USD</option>
                                                <option value="VND"> VND</option>
                                                <option value="ZAR"> ZAR</option>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>


                                <fieldset class="row form-group" style="padding: 0px 15px;"><label class="">Loại (Type)
                                        &nbsp; &nbsp;</label>
                                    <div class="form-check"><input id="doc" name="doc" type="radio"
                                                                   class="form-check-input"
                                                                   value="doc" {{ $bill->type == 'doc'?'checked':'' }}><label
                                                class="form-check-label">DOC &nbsp; &nbsp;</label></div>
                                    <div class="form-check"><input id="pack" name="pack" type="radio"
                                                                   class="form-check-input"
                                                                   value="pack" {{ $bill->type == 'pack'?'checked':'' }}><label
                                                class="form-check-label">PACK</label></div>
                                    <script>
                                        $('#pack').click(function () {

                                            location.reload();
                                          
                                        });
                                    </script>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 col-lg-3">
                        <div class="card"><h5 class="card-header">Thông tin Người gửi (Sender)</h5>
                            <div class="card-body">
                                <div class="form-group"><label for="senderCompanyName" class="">Công ty (Company Name)
                                        <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                  id="senderCompanyName"
                                                                                                  name="congtygui"
                                                                                                  type="text"
                                                                                                  class="form-control"
                                                                                                  aria-invalid="false"
                                                                                                  value="{{ $bill->send_company_name }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderName" class="">Người LH (Contact Name) <span
                                                class="Bill_required__3WKSD">*</span></label><input required
                                                                                                    id="senderName"
                                                                                                    name="nguoilhgui"
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    aria-invalid="false"
                                                                                                    value="{{ $bill->sender_name }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderContact" class="">Địa chỉ Liên hệ (Contact
                                        address) <span class="Bill_required__3WKSD">*</span></label><input
                                            id="senderContact" name="diachilienhegui" type="text" class="form-control"
                                            aria-invalid="false" value="{{ $bill->sender_address }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderPhone" class="">Số Điện thoại (Telephone)
                                        <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                  id="senderPhone"
                                                                                                  name="sdtgui"
                                                                                                  type="text"
                                                                                                  class="form-control"
                                                                                                  aria-invalid="false"
                                                                                                  value="{{ $bill->sender_tel }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderEmail" class="">Email</label><input
                                            id="senderEmail" name="emailgui" type="email" class="form-control"
                                            aria-invalid="false" value="{{ $bill->email }}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 col-md-12 col-lg-6">
                        <div class="card"><h5 class="card-header">Thông tin Người nhận (Receiver)</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group"><label for="receiverCompanyName" class="">Công ty
                                                (Company Name) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverCompanyName" name="congtynhan" type="text"
                                                    class="form-control" aria-invalid="false"
                                                    value="{{ $bill->receiver_company }}">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverName" class="">Người Liên hệ
                                                (Contact Name) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverName" name="nguoilhnhan" type="text"
                                                    class="form-control" aria-invalid="false"
                                                    value="{{ $bill->receiver_name }}">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverPhone" class="">Số Điện thoại
                                                (Telephone) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverPhone" name="sdtnhan" type="text"
                                                    class="form-control" aria-invalid="false"
                                                    value="{{ $bill->receiver_tel }}">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverCountry" class="">Quốc gia (Country)
                                                <span class="Bill_required__3WKSD">*</span></label><select
                                                    id="receiverCountry" name="quocgianhan" class="form-control"
                                                    aria-invalid="false">

                                                <option {{ $bill->country == 'Afghanistan - AF' ? 'selected' : '' }}>
                                                    Afghanistan - AF
                                                </option>
                                                <option {{ $bill->country == 'Aland Islands - AX' ? 'selected' : '' }}>
                                                    Aland Islands - AX
                                                </option>
                                                <option {{ $bill->country == 'Albania - AL' ? 'selected' : '' }}>Albania
                                                    - AL
                                                </option>
                                                <option {{ $bill->country == 'Algeria - DZ' ? 'selected' : '' }}>Algeria
                                                    - DZ
                                                </option>
                                                <option {{ $bill->country == 'American Samoa - AS' ? 'selected' : '' }}>
                                                    American Samoa - AS
                                                </option>
                                                <option {{ $bill->country == 'Andorra - AD' ? 'selected' : '' }}>Andorra
                                                    - AD
                                                </option>
                                                <option {{ $bill->country == 'Angola - AO' ? 'selected' : '' }}>Angola -
                                                    AO
                                                </option>
                                                <option {{ $bill->country == 'Anguilla - AI' ? 'selected' : '' }}>
                                                    Anguilla - AI
                                                </option>
                                                <option {{ $bill->country == 'Antarctica - AQ' ? 'selected' : '' }}>
                                                    Antarctica - AQ
                                                </option>
                                                <option {{ $bill->country == 'Antigua And Barbuda - AG' ? 'selected' : '' }}>
                                                    Antigua And Barbuda - AG
                                                </option>
                                                <option {{ $bill->country == 'Argentina - AR' ? 'selected' : '' }}>
                                                    Argentina - AR
                                                </option>
                                                <option {{ $bill->country == 'Armenia - AM' ? 'selected' : '' }}>Armenia
                                                    - AM
                                                </option>
                                                <option {{ $bill->country == 'Aruba - AW' ? 'selected' : '' }}>Aruba -
                                                    AW
                                                </option>
                                                <option {{ $bill->country == 'Australia - AU' ? 'selected' : '' }}>
                                                    Australia - AU
                                                </option>
                                                <option {{ $bill->country == 'Austria - AT' ? 'selected' : '' }}>Austria
                                                    - AT
                                                </option>
                                                <option {{ $bill->country == 'Azerbaijan - AZ' ? 'selected' : '' }}>
                                                    Azerbaijan - AZ
                                                </option>
                                                <option {{ $bill->country == 'Bahamas The - BS' ? 'selected' : '' }}>
                                                    Bahamas The - BS
                                                </option>
                                                <option {{ $bill->country == 'Bahrain - BH' ? 'selected' : '' }}>Bahrain
                                                    - BH
                                                </option>
                                                <option {{ $bill->country == 'Bangladesh - BD' ? 'selected' : '' }}>
                                                    Bangladesh - BD
                                                </option>
                                                <option {{ $bill->country == 'Barbados - BB' ? 'selected' : '' }}>
                                                    Barbados - BB
                                                </option>
                                                <option {{ $bill->country == 'Belarus - BY' ? 'selected' : '' }}>Belarus
                                                    - BY
                                                </option>
                                                <option {{ $bill->country == 'Belgium - BE' ? 'selected' : '' }}>Belgium
                                                    - BE
                                                </option>
                                                <option {{ $bill->country == 'Belize - BZ' ? 'selected' : '' }}>Belize -
                                                    BZ
                                                </option>
                                                <option {{ $bill->country == 'Benin - BJ' ? 'selected' : '' }}>Benin -
                                                    BJ
                                                </option>
                                                <option {{ $bill->country == 'Bermuda - BM' ? 'selected' : '' }}>Bermuda
                                                    - BM
                                                </option>
                                                <option {{ $bill->country == 'Bhutan - BT' ? 'selected' : '' }}>Bhutan -
                                                    BT
                                                </option>
                                                <option {{ $bill->country == 'Bolivia - BO' ? 'selected' : '' }}>Bolivia
                                                    - BO
                                                </option>
                                                <option {{ $bill->country == 'Bosnia and Herzegovina - BA' ? 'selected' : '' }}>
                                                    Bosnia and Herzegovina - BA
                                                </option>
                                                <option {{ $bill->country == 'Botswana - BW' ? 'selected' : '' }}>
                                                    Botswana - BW
                                                </option>
                                                <option {{ $bill->country == 'Bouvet Island - BV' ? 'selected' : '' }}>
                                                    Bouvet Island - BV
                                                </option>
                                                <option {{ $bill->country == 'Brazil - BR' ? 'selected' : '' }}>Brazil -
                                                    BR
                                                </option>
                                                <option {{ $bill->country == 'British Indian Ocean Territory - IO' ? 'selected' : '' }}>
                                                    British Indian Ocean Territory - IO
                                                </option>
                                                <option {{ $bill->country == 'Brunei - BN' ? 'selected' : '' }}>Brunei -
                                                    BN
                                                </option>
                                                <option {{ $bill->country == 'Bulgaria - BG' ? 'selected' : '' }}>
                                                    Bulgaria - BG
                                                </option>
                                                <option {{ $bill->country == 'Burkina Faso - BF' ? 'selected' : '' }}>
                                                    Burkina Faso - BF
                                                </option>
                                                <option {{ $bill->country == 'Burundi - BI' ? 'selected' : '' }}>Burundi
                                                    - BI
                                                </option>
                                                <option {{ $bill->country == 'Cambodia - KH' ? 'selected' : '' }}>
                                                    Cambodia - KH
                                                </option>
                                                <option {{ $bill->country == 'Cameroon - CM' ? 'selected' : '' }}>
                                                    Cameroon - CM
                                                </option>
                                                <option {{ $bill->country == 'Canada - CA' ? 'selected' : '' }}>Canada -
                                                    CA
                                                </option>
                                                <option {{ $bill->country == 'Cape Verde - CV' ? 'selected' : '' }}>Cape
                                                    Verde - CV
                                                </option>
                                                <option {{ $bill->country == 'Cayman Islands - KY' ? 'selected' : '' }}>
                                                    Cayman Islands - KY
                                                </option>
                                                <option {{ $bill->country == 'Central African Republic - CF' ? 'selected' : '' }}>
                                                    Central African Republic - CF
                                                </option>
                                                <option {{ $bill->country == 'Chad - TD' ? 'selected' : '' }}>Chad -
                                                    TD
                                                </option>
                                                <option {{ $bill->country == 'Chile - CL' ? 'selected' : '' }}>Chile -
                                                    CL
                                                </option>
                                                <option {{ $bill->country == 'China - CN' ? 'selected' : '' }}>China -
                                                    CN
                                                </option>
                                                <option {{ $bill->country == 'Christmas Island - CX' ? 'selected' : '' }}>
                                                    Christmas Island - CX
                                                </option>
                                                <option {{ $bill->country == 'Cocos (Keeling) Islands - CC' ? 'selected' : '' }}>
                                                    Cocos (Keeling) Islands - CC
                                                </option>
                                                <option {{ $bill->country == 'Colombia - CO' ? 'selected' : '' }}>
                                                    Colombia - CO
                                                </option>
                                                <option {{ $bill->country == 'Comoros - KM' ? 'selected' : '' }}>Comoros
                                                    - KM
                                                </option>
                                                <option {{ $bill->country == 'Congo - CG' ? 'selected' : '' }}>Congo -
                                                    CG
                                                </option>
                                                <option {{ $bill->country == 'Congo The Democratic Republic Of The - CD' ? 'selected' : '' }}>
                                                    Congo The Democratic Republic Of The - CD
                                                </option>
                                                <option

                                                        {{ $bill->country == 'Cook Islands - CK' ? 'selected' : '' }}>
                                                    Cook Islands - CK
                                                </option>
                                                <option {{ $bill->country == 'Costa Rica - CR' ? 'selected' : '' }}>
                                                    Costa Rica - CR
                                                </option>
                                                <option {{ $bill->country == 'Cote D\'Ivoire (Ivory Coast) - CI' ? 'selected' : '' }}>
                                                    Cote D'Ivoire (Ivory Coast) - CI
                                                </option>
                                                <option {{ $bill->country == 'Croatia (Hrvatska) - HR' ? 'selected' : '' }}>
                                                    Croatia (Hrvatska) - HR
                                                </option>
                                                <option {{ $bill->country == 'Cuba - CU' ? 'selected' : '' }}>Cuba -
                                                    CU
                                                </option>
                                                <option {{ $bill->country == 'Cyprus - CY' ? 'selected' : '' }}>Cyprus -
                                                    CY
                                                </option>
                                                <option {{ $bill->country == 'Czech Republic - CZ' ? 'selected' : '' }}>
                                                    Czech Republic - CZ
                                                </option>
                                                <option {{ $bill->country == 'Denmark - DK' ? 'selected' : '' }}>Denmark
                                                    - DK
                                                </option>
                                                <option {{ $bill->country == 'Djibouti - DJ' ? 'selected' : '' }}>
                                                    Djibouti - DJ
                                                </option>
                                                <option {{ $bill->country == 'Dominica - DM' ? 'selected' : '' }}>
                                                    Dominica - DM
                                                </option>
                                                <option {{ $bill->country == 'Dominican Republic - DO' ? 'selected' : '' }}>
                                                    Dominican Republic - DO
                                                </option>
                                                <option {{ $bill->country == 'East Timor - TL' ? 'selected' : '' }}>East
                                                    Timor - TL
                                                </option>
                                                <option {{ $bill->country == 'Ecuador - EC' ? 'selected' : '' }}>Ecuador
                                                    - EC
                                                </option>
                                                <option {{ $bill->country == 'Egypt - EG' ? 'selected' : '' }}>Egypt -
                                                    EG
                                                </option>
                                                <option {{ $bill->country == 'El Salvador - SV' ? 'selected' : '' }}>El
                                                    Salvador - SV
                                                </option>
                                                <option {{ $bill->country == 'Equatorial Guinea - GQ' ? 'selected' : '' }}>
                                                    Equatorial Guinea - GQ
                                                </option>
                                                <option {{ $bill->country == 'Eritrea - ER' ? 'selected' : '' }}>Eritrea
                                                    - ER
                                                </option>
                                                <option {{ $bill->country == 'Estonia - EE' ? 'selected' : '' }}>Estonia
                                                    - EE
                                                </option>
                                                <option {{ $bill->country == 'Ethiopia - ET' ? 'selected' : '' }}>
                                                    Ethiopia - ET
                                                </option>
                                                <option {{ $bill->country == 'Falkland Islands - FK' ? 'selected' : '' }}>
                                                    Falkland Islands - FK
                                                </option>
                                                <option {{ $bill->country == 'Faroe Islands - FO' ? 'selected' : '' }}>
                                                    Faroe Islands - FO
                                                </option>
                                                <option {{ $bill->country == 'Fiji Islands - FJ' ? 'selected' : '' }}>
                                                    Fiji Islands - FJ
                                                </option>
                                                <option {{ $bill->country == 'Finland - FI' ? 'selected' : '' }}>Finland
                                                    - FI
                                                </option>
                                                <option {{ $bill->country == 'France - FR' ? 'selected' : '' }}>France -
                                                    FR
                                                </option>
                                                <option {{ $bill->country == 'French Guiana - GF' ? 'selected' : '' }}>
                                                    French Guiana - GF
                                                </option>
                                                <option {{ $bill->country == 'French Polynesia - PF' ? 'selected' : '' }}>
                                                    French Polynesia - PF
                                                </option>
                                                <option {{ $bill->country == 'French Southern Territories - TF' ? 'selected' : '' }}>
                                                    French Southern Territories - TF
                                                </option>
                                                <option {{ $bill->country == 'Gabon - GA' ? 'selected' : '' }}>Gabon -
                                                    GA
                                                </option>
                                                <option {{ $bill->country == 'Gambia The - GM' ? 'selected' : '' }}>
                                                    Gambia The - GM
                                                </option>
                                                <option {{ $bill->country == 'Georgia - GE' ? 'selected' : '' }}>Georgia
                                                    - GE
                                                </option>
                                                <option {{ $bill->country == 'Germany - DE' ? 'selected' : '' }}>Germany
                                                    - DE
                                                </option>
                                                <option {{ $bill->country == 'Ghana - GH' ? 'selected' : '' }}>Ghana -
                                                    GH
                                                </option>
                                                <option {{ $bill->country == 'Gibraltar - GI' ? 'selected' : '' }}>
                                                    Gibraltar - GI
                                                </option>
                                                <option {{ $bill->country == 'Greece - GR' ? 'selected' : '' }}>Greece -
                                                    GR
                                                </option>
                                                <option {{ $bill->country == 'Greenland - GL' ? 'selected' : '' }}>
                                                    Greenland - GL
                                                </option>
                                                <option {{ $bill->country == 'Grenada - GD' ? 'selected' : '' }}>Grenada
                                                    - GD
                                                </option>
                                                <option {{ $bill->country == 'Guadeloupe - GP' ? 'selected' : '' }}>
                                                    Guadeloupe - GP
                                                </option>
                                                <option {{ $bill->country == 'Guam - GU' ? 'selected' : '' }}>Guam -
                                                    GU
                                                </option>
                                                <option {{ $bill->country == 'Guatemala - GT' ? 'selected' : '' }}>
                                                    Guatemala - GT
                                                </option>
                                                <option {{ $bill->country == 'Guernsey and Alderney - GG' ? 'selected' : '' }}>
                                                    Guernsey and Alderney - GG
                                                </option>
                                                <option {{ $bill->country == 'Guinea - GN' ? 'selected' : '' }}>Guinea -
                                                    GN
                                                </option>
                                                <option {{ $bill->country == 'Guinea-Bissau - GW' ? 'selected' : '' }}>
                                                    Guinea-Bissau - GW
                                                </option>
                                                <option {{ $bill->country == 'Guyana - GY' ? 'selected' : '' }}>Guyana -
                                                    GY
                                                </option>
                                                <option {{ $bill->country == 'Haiti - HT' ? 'selected' : '' }}>Haiti -
                                                    HT
                                                </option>
                                                <option {{ $bill->country == 'Heard Island and McDonald Islands - HM' ? 'selected' : '' }}>
                                                    Heard Island and McDonald Islands - HM
                                                </option>
                                                <option {{ $bill->country == 'Honduras - HN' ? 'selected' : '' }}>
                                                    Honduras - HN
                                                </option>
                                                <option {{ $bill->country == 'Hong Kong S.A.R. - HK' ? 'selected' : '' }}>
                                                    Hong Kong S.A.R. - HK
                                                </option>
                                                <option {{ $bill->country == 'Hungary - HU' ? 'selected' : '' }}>Hungary
                                                    - HU
                                                </option>
                                                <option {{ $bill->country == 'Iceland - IS' ? 'selected' : '' }}>Iceland
                                                    - IS
                                                </option>
                                                <option {{ $bill->country == 'India - IN' ? 'selected' : '' }}>India -
                                                    IN
                                                </option>
                                                <option {{ $bill->country == 'Indonesia - ID' ? 'selected' : '' }}>
                                                    Indonesia - ID
                                                </option>
                                                <option {{ $bill->country == 'Iran - IR' ? 'selected' : '' }}>Iran -
                                                    IR
                                                </option>
                                                <option {{ $bill->country == 'Iraq - IQ' ? 'selected' : '' }}>Iraq - IQ
                                                </option>
                                                <option {{ $bill->country == 'Ireland - IE' ? 'selected' : '' }}>Ireland
                                                    - IE
                                                </option>
                                                <option {{ $bill->country == 'Israel - IL' ? 'selected' : '' }}>Israel -
                                                    IL
                                                </option>
                                                <option {{ $bill->country == 'Italy - IT' ? 'selected' : '' }}>Italy -
                                                    IT
                                                </option>
                                                <option {{ $bill->country == 'Jamaica - JM' ? 'selected' : '' }}>Jamaica
                                                    - JM
                                                </option>
                                                <option {{ $bill->country == 'Japan - JP' ? 'selected' : '' }}>Japan -
                                                    JP
                                                </option>
                                                <option {{ $bill->country == 'Jersey - JE' ? 'selected' : '' }}>Jersey -
                                                    JE
                                                </option>
                                                <option {{ $bill->country == 'Jordan - JO' ? 'selected' : '' }}>Jordan -
                                                    JO
                                                </option>
                                                <option {{ $bill->country == 'Kazakhstan - KZ' ? 'selected' : '' }}>
                                                    Kazakhstan - KZ
                                                </option>
                                                <option {{ $bill->country == 'Kenya - KE' ? 'selected' : '' }}>Kenya -
                                                    KE
                                                </option>
                                                <option {{ $bill->country == 'Kiribati - KI' ? 'selected' : '' }}>
                                                    Kiribati - KI
                                                </option>
                                                <option {{ $bill->country == 'Korea North - KP' ? 'selected' : '' }}>
                                                    Korea North - KP
                                                </option>
                                                <option {{ $bill->country == 'Korea South - KR' ? 'selected' : '' }}>
                                                    Korea South - KR
                                                </option>
                                                <option {{ $bill->country == 'Kuwait - KW' ? 'selected' : '' }}>Kuwait -
                                                    KW
                                                </option>
                                                <option {{ $bill->country == 'Kyrgyzstan - KG' ? 'selected' : '' }}>
                                                    Kyrgyzstan - KG
                                                </option>
                                                <option {{ $bill->country == 'Laos - LA' ? 'selected' : '' }}>Laos -
                                                    LA
                                                </option>
                                                <option {{ $bill->country == 'Latvia - LV' ? 'selected' : '' }}>Latvia -
                                                    LV
                                                </option>
                                                <option {{ $bill->country == 'Lebanon - LB' ? 'selected' : '' }}>Lebanon
                                                    - LB
                                                </option>
                                                <option {{ $bill->country == 'Lesotho - LS' ? 'selected' : '' }}>Lesotho
                                                    - LS
                                                </option>
                                                <option {{ $bill->country == 'Liberia - LR' ? 'selected' : '' }}>Liberia
                                                    - LR
                                                </option>
                                                <option {{ $bill->country == 'Libya - LY' ? 'selected' : '' }}>Libya -
                                                    LY
                                                </option>
                                                <option {{ $bill->country == 'Liechtenstein - LI' ? 'selected' : '' }}>
                                                    Liechtenstein - LI
                                                </option>
                                                <option {{ $bill->country == 'Lithuania - LT' ? 'selected' : '' }}>
                                                    Lithuania - LT
                                                </option>
                                                <option {{ $bill->country == 'Luxembourg - LU' ? 'selected' : '' }}>
                                                    Luxembourg - LU
                                                </option>
                                                <option {{ $bill->country == 'Macau S.A.R. - MO' ? 'selected' : '' }}>
                                                    Macau S.A.R. - MO
                                                </option>
                                                <option {{ $bill->country == 'Macedonia - MK' ? 'selected' : '' }}>
                                                    Macedonia - MK
                                                </option>
                                                <option {{ $bill->country == 'Madagascar - MG' ? 'selected' : '' }}>
                                                    Madagascar - MG
                                                </option>
                                                <option {{ $bill->country == 'Malawi - MW' ? 'selected' : '' }}>Malawi -
                                                    MW
                                                </option>
                                                <option {{ $bill->country == 'Malaysia - MY' ? 'selected' : '' }}>
                                                    Malaysia - MY
                                                </option>
                                                <option {{ $bill->country == 'Maldives - MV' ? 'selected' : '' }}>
                                                    Maldives - MV
                                                </option>
                                                <option {{ $bill->country == 'Mali - ML' ? 'selected' : '' }}>Mali -
                                                    ML
                                                </option>
                                                <option {{ $bill->country == 'Malta - MT' ? 'selected' : '' }}>Malta -
                                                    MT
                                                </option>
                                                <option {{ $bill->country == 'Man (Isle of) - IM' ? 'selected' : '' }}>
                                                    Man (Isle of) - IM
                                                </option>
                                                <option {{ $bill->country == 'Marshall Islands - MH' ? 'selected' : '' }}>
                                                    Marshall Islands - MH
                                                </option>
                                                <option {{ $bill->country == 'Martinique - MQ' ? 'selected' : '' }}>
                                                    Martinique - MQ
                                                </option>
                                                <option {{ $bill->country == 'Mauritania - MR' ? 'selected' : '' }}>
                                                    Mauritania - MR
                                                </option>
                                                <option {{ $bill->country == 'Mauritius - MU' ? 'selected' : '' }}>
                                                    Mauritius - MU
                                                </option>
                                                <option {{ $bill->country == 'Mayotte - YT' ? 'selected' : '' }}>Mayotte
                                                    - YT
                                                </option>
                                                <option {{ $bill->country == 'Mexico - MX' ? 'selected' : '' }}>Mexico -
                                                    MX
                                                </option>
                                                <option {{ $bill->country == 'Micronesia - FM' ? 'selected' : '' }}>
                                                    Micronesia - FM
                                                </option>
                                                <option {{ $bill->country == 'Moldova - MD' ? 'selected' : '' }}>Moldova
                                                    - MD
                                                </option>
                                                <option {{ $bill->country == 'Monaco - MC' ? 'selected' : '' }}>Monaco -
                                                    MC
                                                </option>
                                                <option {{ $bill->country == 'Mongolia - MN' ? 'selected' : '' }}>
                                                    Mongolia - MN
                                                </option>
                                                <option {{ $bill->country == 'Montenegro - ME' ? 'selected' : '' }}>
                                                    Montenegro - ME
                                                </option>
                                                <option {{ $bill->country == 'Montserrat - MS' ? 'selected' : '' }}>
                                                    Montserrat - MS
                                                </option>
                                                <option {{ $bill->country == 'Morocco - MA' ? 'selected' : '' }}>Morocco
                                                    - MA
                                                </option>
                                                <option {{ $bill->country == 'Mozambique - MZ' ? 'selected' : '' }}>
                                                    Mozambique - MZ
                                                </option>
                                                <option {{ $bill->country == 'Myanmar - MM' ? 'selected' : '' }}>Myanmar
                                                    - MM
                                                </option>
                                                <option {{ $bill->country == 'Namibia - NA' ? 'selected' : '' }}>Namibia
                                                    - NA
                                                </option>
                                                <option {{ $bill->country == 'Nauru - NR' ? 'selected' : '' }}>Nauru -
                                                    NR
                                                </option>
                                                <option {{ $bill->country == 'Nepal - NP' ? 'selected' : '' }}>Nepal -
                                                    NP
                                                </option>
                                                <option {{ $bill->country == 'Netherlands The - NL' ? 'selected' : '' }}>
                                                    Netherlands The - NL
                                                </option>
                                                <option {{ $bill->country == 'New Caledonia - NC' ? 'selected' : '' }}>
                                                    New Caledonia - NC
                                                </option>
                                                <option {{ $bill->country == 'New Zealand - NZ' ? 'selected' : '' }}>New
                                                    Zealand - NZ
                                                </option>
                                                <option {{ $bill->country == 'Nicaragua - NI' ? 'selected' : '' }}>
                                                    Nicaragua - NI
                                                </option>
                                                <option {{ $bill->country == 'Niger - NE' ? 'selected' : '' }}>Niger -
                                                    NE
                                                </option>
                                                <option {{ $bill->country == 'Nigeria - NG' ? 'selected' : '' }}>Nigeria
                                                    - NG
                                                </option>
                                                <option {{ $bill->country == 'Niue - NU' ? 'selected' : '' }}>Niue -
                                                    NU
                                                </option>
                                                <option {{ $bill->country == 'Norfolk Island - NF' ? 'selected' : '' }}>
                                                    Norfolk Island - NF
                                                </option>
                                                <option {{ $bill->country == 'Northern Mariana Islands - MP' ? 'selected' : '' }}>
                                                    Northern Mariana Islands - MP
                                                </option>
                                                <option {{ $bill->country == 'Norway - NO' ? 'selected' : '' }}>Norway -
                                                    NO
                                                </option>
                                                <option {{ $bill->country == 'Oman - OM' ? 'selected' : '' }}>Oman -
                                                    OM
                                                </option>
                                                <option {{ $bill->country == 'Pakistan - PK' ? 'selected' : '' }}>
                                                    Pakistan - PK
                                                </option>
                                                <option {{ $bill->country == 'Palau - PW' ? 'selected' : '' }}>Palau -
                                                    PW
                                                </option>
                                                <option {{ $bill->country == 'Palestinian Territory Occupied - PS' ? 'selected' : '' }}>
                                                    Palestinian Territory Occupied - PS
                                                </option>
                                                <option {{ $bill->country == 'Panama - PA' ? 'selected' : '' }}>Panama -
                                                    PA
                                                </option>
                                                <option {{ $bill->country == 'Papua new Guinea - PG' ? 'selected' : '' }}>
                                                    Papua new Guinea - PG
                                                </option>
                                                <option {{ $bill->country == 'Paraguay - PY' ? 'selected' : '' }}>
                                                    Paraguay - PY
                                                </option>
                                                <option {{ $bill->country == 'Peru - PE' ? 'selected' : '' }}>Peru -
                                                    PE
                                                </option>
                                                <option {{ $bill->country == 'Philippines - PH' ? 'selected' : '' }}>
                                                    Philippines - PH
                                                </option>
                                                <option {{ $bill->country == 'Pitcairn Island - PN' ? 'selected' : '' }}>
                                                    Pitcairn Island - PN
                                                </option>
                                                <option {{ $bill->country == 'Poland - PL' ? 'selected' : '' }}>Poland -
                                                    PL
                                                </option>
                                                <option {{ $bill->country == 'Portugal - PT' ? 'selected' : '' }}>
                                                    Portugal - PT
                                                </option>
                                                <option {{ $bill->country == 'Puerto Rico - PR' ? 'selected' : '' }}>
                                                    Puerto Rico - PR
                                                </option>
                                                <option {{ $bill->country == 'Qatar - QA' ? 'selected' : '' }}>Qatar -
                                                    QA
                                                </option>
                                                <option {{ $bill->country == 'Reunion - RE' ? 'selected' : '' }}>Reunion
                                                    - RE
                                                </option>
                                                <option {{ $bill->country == 'Romania - RO' ? 'selected' : '' }}>Romania
                                                    - RO
                                                </option>
                                                <option {{ $bill->country == 'Russia - RU' ? 'selected' : '' }}>Russia -
                                                    RU
                                                </option>
                                                <option {{ $bill->country == 'Rwanda - RW' ? 'selected' : '' }}>Rwanda -
                                                    RW
                                                </option>
                                                <option {{ $bill->country == 'Saint Helena - SH' ? 'selected' : '' }}>
                                                    Saint Helena - SH
                                                </option>
                                                <option {{ $bill->country == 'Saint Kitts And Nevis - KN' ? 'selected' : '' }}>
                                                    Saint Kitts And Nevis - KN
                                                </option>
                                                <option {{ $bill->country == 'Saint Lucia - LC' ? 'selected' : '' }}>
                                                    Saint Lucia - LC
                                                </option>
                                                <option {{ $bill->country == 'Saint Pierre and Miquelon - PM' ? 'selected' : '' }}>
                                                    Saint Pierre and Miquelon - PM
                                                </option>
                                                <option {{ $bill->country == 'Saint Vincent And The Grenadines - VC' ? 'selected' : '' }}>
                                                    Saint Vincent And The Grenadines - VC
                                                </option>
                                                <option {{ $bill->country == 'Samoa - WS' ? 'selected' : '' }}>Samoa -
                                                    WS
                                                </option>
                                                <option {{ $bill->country == 'San Marino - SM' ? 'selected' : '' }}>San
                                                    Marino - SM
                                                </option>
                                                <option {{ $bill->country == 'Sao Tome and Principe - ST' ? 'selected' : '' }}>
                                                    Sao Tome and Principe - ST
                                                </option>
                                                <option {{ $bill->country == 'Saudi Arabia - SA' ? 'selected' : '' }}>
                                                    Saudi Arabia - SA
                                                </option>
                                                <option {{ $bill->country == 'Senegal - SN' ? 'selected' : '' }}>Senegal
                                                    - SN
                                                </option>
                                                <option {{ $bill->country == 'Serbia - RS' ? 'selected' : '' }}>Serbia -
                                                    RS
                                                </option>
                                                <option {{ $bill->country == 'Seychelles - SC' ? 'selected' : '' }}>
                                                    Seychelles - SC
                                                </option>
                                                <option {{ $bill->country == 'Sierra Leone - SL' ? 'selected' : '' }}>
                                                    Sierra Leone - SL
                                                </option>
                                                <option {{ $bill->country == 'Singapore - SG' ? 'selected' : '' }}>
                                                    Singapore - SG
                                                </option>
                                                <option {{ $bill->country == 'Slovakia - SK' ? 'selected' : '' }}>
                                                    Slovakia - SK
                                                </option>
                                                <option {{ $bill->country == 'Slovenia - SI' ? 'selected' : '' }}>
                                                    Slovenia - SI
                                                </option>
                                                <option {{ $bill->country == 'Smaller Territories of the UK - XK' ? 'selected' : '' }}>
                                                    Smaller Territories of the UK - XK
                                                </option>
                                                <option {{ $bill->country == 'Solomon Islands - SB' ? 'selected' : '' }}>
                                                    Solomon Islands - SB
                                                </option>
                                                <option {{ $bill->country == 'Somalia - SO' ? 'selected' : '' }}>Somalia
                                                    - SO
                                                </option>
                                                <option {{ $bill->country == 'South Africa - ZA' ? 'selected' : '' }}>
                                                    South Africa - ZA
                                                </option>
                                                <option {{ $bill->country == 'South Georgia - GS' ? 'selected' : '' }}>
                                                    South Georgia - GS
                                                </option>
                                                <option {{ $bill->country == 'South Sudan - SS' ? 'selected' : '' }}>
                                                    South Sudan - SS
                                                </option>
                                                <option {{ $bill->country == 'Spain - ES' ? 'selected' : '' }}>Spain -
                                                    ES
                                                </option>
                                                <option {{ $bill->country == 'Sri Lanka - LK' ? 'selected' : '' }}>Sri
                                                    Lanka - LK
                                                </option>
                                                <option {{ $bill->country == 'Sudan - SD' ? 'selected' : '' }}>Sudan -
                                                    SD
                                                </option>
                                                <option {{ $bill->country == 'Suriname - SR' ? 'selected' : '' }}>
                                                    Suriname - SR
                                                </option>
                                                <option {{ $bill->country == 'Svalbard And Jan Mayen Islands - SJ' ? 'selected' : '' }}>
                                                    Svalbard And Jan Mayen Islands - SJ
                                                </option>
                                                <option {{ $bill->country == 'Swaziland - SZ' ? 'selected' : '' }}>
                                                    Swaziland - SZ
                                                </option>
                                                <option {{ $bill->country == 'Sweden - SE' ? 'selected' : '' }}>Sweden -
                                                    SE
                                                </option>
                                                <option {{ $bill->country == 'Switzerland

 - CH' ? 'selected' : '' }}>Switzerland - CH
                                                </option>
                                                <option {{ $bill->country == 'Syria - SY' ? 'selected' : '' }}>Syria -
                                                    SY
                                                </option>
                                                <option {{ $bill->country == 'Taiwan - TW' ? 'selected' : '' }}>Taiwan -
                                                    TW
                                                </option>
                                                <option {{ $bill->country == 'Tajikistan - TJ' ? 'selected' : '' }}>
                                                    Tajikistan - TJ
                                                </option>
                                                <option {{ $bill->country == 'Tanzania - TZ' ? 'selected' : '' }}>
                                                    Tanzania - TZ
                                                </option>
                                                <option {{ $bill->country == 'Thailand - TH' ? 'selected' : '' }}>
                                                    Thailand - TH
                                                </option>
                                                <option {{ $bill->country == 'Togo - TG' ? 'selected' : '' }}>Togo -
                                                    TG
                                                </option>
                                                <option {{ $bill->country == 'Tokelau - TK' ? 'selected' : '' }}>Tokelau
                                                    - TK
                                                </option>
                                                <option {{ $bill->country == 'Tonga - TO' ? 'selected' : '' }}>Tonga -
                                                    TO
                                                </option>
                                                <option {{ $bill->country == 'Trinidad And Tobago - TT' ? 'selected' : '' }}>
                                                    Trinidad And Tobago - TT
                                                </option>
                                                <option {{ $bill->country == 'Tunisia - TN' ? 'selected' : '' }}>Tunisia
                                                    - TN
                                                </option>
                                                <option {{ $bill->country == 'Turkey - TR' ? 'selected' : '' }}>Turkey -
                                                    TR
                                                </option>
                                                <option {{ $bill->country == 'Turkmenistan - TM' ? 'selected' : '' }}>
                                                    Turkmenistan - TM
                                                </option>
                                                <option {{ $bill->country == 'Turks And Caicos Islands - TC' ? 'selected' : '' }}>
                                                    Turks And Caicos Islands - TC
                                                </option>
                                                <option {{ $bill->country == 'Tuvalu - TV' ? 'selected' : '' }}>Tuvalu -
                                                    TV
                                                </option>
                                                <option {{ $bill->country == 'Uganda - UG' ? 'selected' : '' }}>Uganda -
                                                    UG
                                                </option>
                                                <option {{ $bill->country == 'Ukraine - UA' ? 'selected' : '' }}>Ukraine
                                                    - UA
                                                </option>
                                                <option {{ $bill->country == 'United Arab Emirates - AE' ? 'selected' : '' }}>
                                                    United Arab Emirates - AE
                                                </option>
                                                <option {{ $bill->country == 'United Kingdom - GB' ? 'selected' : '' }}>
                                                    United Kingdom - GB
                                                </option>
                                                <option {{ $bill->country == 'United States - US' ? 'selected' : '' }}>
                                                    United States - US
                                                </option>
                                                <option {{ $bill->country == 'United States Minor Outlying Islands - UM' ? 'selected' : '' }}>
                                                    United States Minor Outlying Islands - UM
                                                </option>
                                                <option {{ $bill->country == 'Uruguay - UY' ? 'selected' : '' }}>Uruguay
                                                    - UY
                                                </option>
                                                <option {{ $bill->country == 'Uzbekistan - UZ' ? 'selected' : '' }}>
                                                    Uzbekistan - UZ
                                                </option>
                                                <option {{ $bill->country == 'Vanuatu - VU' ? 'selected' : '' }}>Vanuatu
                                                    - VU
                                                </option>
                                                <option {{ $bill->country == 'Vatican City State (Holy See) - VA' ? 'selected' : '' }}>
                                                    Vatican City State (Holy See) - VA
                                                </option>
                                                <option {{ $bill->country == 'Venezuela - VE' ? 'selected' : '' }}>
                                                    Venezuela - VE
                                                </option>
                                                <option {{ $bill->country == 'Vietnam - VN' ? 'selected' : '' }}>Vietnam
                                                    - VN
                                                </option>
                                                <option {{ $bill->country == 'Virgin Islands (British) - VG' ? 'selected' : '' }}>
                                                    Virgin Islands (British) - VG
                                                </option>
                                                <option {{ $bill->country == 'Virgin Islands (US) - VI' ? 'selected' : '' }}>
                                                    Virgin Islands (US) - VI
                                                </option>
                                                <option {{ $bill->country == 'Wallis And Futuna Islands - WF' ? 'selected' : '' }}>
                                                    Wallis And Futuna Islands - WF
                                                </option>
                                                <option {{ $bill->country == 'Western Sahara - EH' ? 'selected' : '' }}>
                                                    Western Sahara - EH
                                                </option>
                                                <option {{ $bill->country == 'Yemen - YE' ? 'selected' : '' }}>Yemen -
                                                    YE
                                                </option>
                                                <option {{ $bill->country == 'Yugoslavia - YU' ? 'selected' : '' }}>
                                                    Yugoslavia - YU
                                                </option>
                                                <option {{ $bill->country == 'Zambia - ZM' ? 'selected' : '' }}>Zambia -
                                                    ZM
                                                </option>
                                                <option {{ $bill->country == 'Zimbabwe - ZW' ? 'selected' : '' }}>
                                                    Zimbabwe - ZW
                                                </option>

                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverPostalCode" class="">Mã Bưu chính
                                                (Postal code) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverPostalCode" name="mabuuchinh" type="text"
                                                    class="form-control" aria-invalid="false"
                                                    value="{{ $bill->postal_code }}">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group"><label for="receiverCity" class="">Thành phố (City)
                                                <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                          name="thanhpho"
                                                                                                          placeholder="Thành phố (City)"
                                                                                                          list="cityList"
                                                                                                          type="text"
                                                                                                          class="form-control flex-fill form-control"
                                                                                                          aria-invalid="false"
                                                                                                          value="{{ $bill->city }}">
                                            <datalist id="cityList"></datalist>
                                            <div class="Bill_error__2txCw"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverProvince" class="">Tỉnh
                                                (State/Province)</label><input id="receiverProvince"
                                                                               name="tinh" type="text"
                                                                               class="form-control"
                                                                               value="{{ $bill->province }}"></div>
                                        <div class="form-group"><label for="receiverAddr1" class="">Địa chỉ (address) 1
                                                <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                          id="receiverAddr1"
                                                                                                          name="diachinhan1"
                                                                                                          type="text"
                                                                                                          class="form-control"
                                                                                                          aria-invalid="false"
                                                                                                          value="{{ $bill->receiver_address1 }}">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverAddr2" class="">Địa chỉ (address) 2
                                                <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                          id="receiverAddr2"
                                                                                                          name="diachinhan2"
                                                                                                          type="text"
                                                                                                          class="form-control"
                                                                                                          aria-invalid="false"
                                                                                                          value="{{ $bill->receiver_address2 }}">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverAddr3" class="">Địa chỉ (address)
                                                3</label><input id="receiverAddr3" name="diachinhan3" type="text"
                                                                class="form-control"
                                                                value="{{ $bill->receiver_address3 }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="backdetail">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <section class="Widget_widget__16nWC">
                                <header class="Widget_title__2xIdN"><h4><span class="fw-semi-bold">PACK DETAILS</span>
                                    </h4></header>
                                <div>
                                    <div class="row">
                                        <div class="col"><p style="color: red;"> *Chú ý: Gross Weight và Dimension phải
                                                được làm tròn</p>
                                            <p>- Làm tròn 0,5kg đối với những kiện hàng dưới 30kg.<br>Ví dụ: 25.1kg làm
                                                tròn 25.5kg hoặc 25.6kg làm tròn 26kg<br>- Làm tròn 1kg đối với những
                                                kiện hàng trên 30kg<br>Ví dụ: 30.1kg -&gt; 30.9kg làm tròn 31kg</p>
                                        </div>
                                        <div class="text-right col">

                                            <label id="totalNumberPack" class="totalNumberPack">Total
                                                Number of Packs: {{ $bill->totalNumberPack }}</label> <br>

                                            <label
                                                    class="totalCharfedWeight">Total
                                                Charged Weight: {{ $bill->totalCharfedWeight }}</label>
                                            <br><br></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table width="100%" class="table-bordered table-sm table">
                                            <thead class="text-uppercase table-light">
                                            <tr>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Length (cm)</th>
                                                <th class="text-center">Width (cm)</th>
                                                <th class="text-center">Height (cm)</th>
                                                <th class="text-center">Weight (kg)</th>
                                                <th class="text-center">Converted Weight</th>
                                                <th class="text-center">Charged Weight</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody id="packdetail_tr">
                                            @foreach($backdetail as $item)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="input-group input-group-sm"><input required=""
                                                                                                       name="quantitypack[]"
                                                                                                       id="quantitypack"
                                                                                                       type="number"
                                                                                                       class="quantitypack form-control quantity form-control"
                                                                                                       aria-invalid="false"
                                                                                                       value="{{ $item->quantity }}">
                                                        </div>
                                                    </td>
                                                    <td><select name="typeback[]" class="Bill_selectCustom__3IPWx"
                                                                aria-label="Default select example">
                                                            <option value="">Loại</option>
                                                            <option value="carton" {{ $item->type == 'carton'?'selected':'' }}>
                                                                Carton
                                                            </option>
                                                            <option value="pallet" {{ $item->type == 'pallet'?'selected':'' }}>
                                                                Pallet
                                                            </option>
                                                            <option value="tui" {{ $item->type == 'tui'?'selected':'' }}>
                                                                Túi (Phong bì)
                                                            </option>
                                                        </select></td>
                                                    <td class="text-center">
                                                        <div class="input-group input-group-sm "><input required=""
                                                                                                        name="lengthpack[]"
                                                                                                        id="chieudai"
                                                                                                        type="number"
                                                                                                        class="chieudai form-control"
                                                                                                        aria-invalid="false"
                                                                                                        value="{{ $item->length }}"
                                                                                                        step="0.01">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="input-group input-group-sm "><input required=""
                                                                                                        name="widthpack[]"
                                                                                                        id="chieurong"
                                                                                                        type="number"
                                                                                                        class="chieurong form-control"
                                                                                                        aria-invalid="false"
                                                                                                        value="{{ $item->width }}"
                                                                                                        step="0.01">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="input-group input-group-sm "><input required=""
                                                                                                        name="heightpack[]"
                                                                                                        id="chieucao"
                                                                                                        type="number"
                                                                                                        class="chieucao form-control"
                                                                                                        aria-invalid="false"
                                                                                                        value="{{ $item->height }}"
                                                                                                        step="0.1">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="input-group input-group-sm"><input required=""
                                                                                                       name="weightpack[]"
                                                                                                       id="trongluong"
                                                                                                       type="number"
                                                                                                       class="trongluong form-control"
                                                                                                       aria-invalid="false"
                                                                                                       value="{{ $item->weight }}">
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><input type="hidden" class="tl-quydoi"
                                                                                   name="tlquydoi[]"
                                                                                   value="{{ $item->converted_weight }}"><label
                                                                class="tlquydoi">{{ $item->converted_weight }}</label>
                                                    </td>
                                                    <td class="text-center"><input type="hidden" class="tl-tinh"
                                                                                   name="tltinh[]"
                                                                                   value="{{ $item->charged_weight }}"><label
                                                                class="tltinh"
                                                                id="chargedweight">{{ $item->charged_weight }}</label>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-default"
                                                                aria-label="glyphicon-trash"><i
                                                                    class="fa-solid fa-trash-can"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-center d-flex align-content-center justify-content-center">
                                        <button type="button" id="plus"
                                                class="btn btn-default btn-add btn btn-secondary"
                                                aria-label="Left Align"><i class="fa fa-plus-circle"></i>Thêm Kiện hàng
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <section class="Widget_widget__16nWC">
                                <header class="Widget_title__2xIdN"><h4><span class="fw-semi-bold">Invoice</span></h4>
                                </header>
                                <div>
                                    <div name="invoiceExportFormat" class="form-inline form-group"><label
                                                id="invoiceExportFormat" name="exportas" class="">Export as:
                                            &nbsp; </label><input placeholder="Choose" name="invoiceExportFormat"
                                                                  list="invoiceExportForms" type="text"
                                                                  class="form-control form-control">
                                        <datalist id="invoiceExportForms">
                                            <option value="Gift (no commercial value)"></option>
                                            <option value="Sample"></option>
                                            <option value="Other"></option>
                                        </datalist>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table-bordered table-sm mb-0 table">
                                            <thead class="text-uppercase table-light">
                                            <tr>
                                                <th class="text-center">Goods Details<br>(Product names, materials,
                                                    stamps, ...)
                                                </th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Unit</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Total Value</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody id="invoice_tr">
                                            @foreach($invoice as $item)
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="input-group"><textarea name="description[]"
                                                                                           id="description"
                                                                                           class="description form-control">{{ $item->goods_detail }}</textarea>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="input-group flex-nowrap"><input
                                                                    name="quantityinvoice[]"
                                                                    id="quantity"
                                                                    placeholder="quantity"
                                                                    type="number"
                                                                    class="quantityinvoice form-control"
                                                                    value="{{ $item->quantity }}"></div>
                                                    </td>
                                                    <td><input placeholder="Choose" name="unitinvoice[]" list="unitList"
                                                               type="text" class="form-control form-control"
                                                               value="{{ $item->unit }}">
                                                        <datalist id="unitList">
                                                            <option value="Bag" {{ $item->unit == 'Bag'?'selected':'' }}></option>
                                                            <option value="Pcs" {{ $item->unit == 'Pcs'?'selected':'' }}></option>
                                                            <option value="Box" {{ $item->unit == 'Box'?'selected':'' }}></option>
                                                            <option value="Jar" {{ $item->unit == 'Jar'?'selected':'' }}></option>
                                                            <option value="Set" {{ $item->unit == 'Set'?'selected':'' }}></option>
                                                            <option value="Other" {{ $item->unit == 'Other'?'selected':'' }}></option>
                                                        </datalist>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="input-group flex-nowrap"><input
                                                                    name="unitPriceinvoice[]" id="unitPrice"
                                                                    type="number"
                                                                    class="unitPriceinvoice form-control"
                                                                    value="{{ $item->price }}">
                                                        </div>
                                                    </td>
                                                    <td class="subTotalinvoice text-center">{{ $item->total_value }}</td>
                                                    <input type="hidden" class="subTotal-invoice"
                                                           name="subTotalinvoice[]"
                                                           value="0">
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-default"
                                                                aria-label="glyphicon-trash"><i
                                                                    class="fa-solid fa-trash-can"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="button" id="plus_invoice"
                                                class="btn btn-default btn btn-secondary" aria-label="Left Align"><span
                                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span>Thêm
                                        </button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container mt-3">
                        <div class="input-group d-flex justify-content-center mb-3"><span>
                                <button type="submit"
                                        class="btn-add btn btn-success btn-lg">Cập nhật</button></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('custom_head')

@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(".kt-header__topbar-wrapper").click(function () {
            $(".dropdown-menu").toggle();
        });
        $(document).on("click", function (event) {
            if (!$(event.target).closest('.kt-header__topbar-wrapper').length && !$(event.target).closest('.dropdown-menu').length) {
                $(".dropdown-menu").hide();
            }
        });
    </script>
    <script src="{{ \URL::asset('backend/js/hoadon.js') }}"></script>
    {{--    @include(config('core.admin_theme').'.partials.js_common_list')--}}
@endpush