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
        <form class="needs-validation" action="{{ route('addhoadon') }}" method="POST">
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
                                                                                                             value="">
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
                                                                        type="text" class="form-control" value=""></div>
                                </div>
                                <div class="form-group"><label for="referenceCode" class="">HAWB Code</label>
                                    <div class="d-flex flex-row"><input id="referenceCode" name="hawbCode" type="text"
                                                                        class="form-control" value=""></div>
                                </div>
                                <div class="form-group"><label for="referenceCode" class="">RG Code</label>
                                    <div class="d-flex flex-row"><input id="referenceCode" name="rgcode" type="text"
                                                                        class="form-control" value="">
                                        <button class="btn btn-secondary ml-1"
                                                style="border-radius: 8px; height: 38px;">Xem Billup
                                        </button>
                                    </div>
                                </div>
                                <div id="sokien" class="form-group"><label for="docCount" class="">Số Kiện (Number of
                                        Packages)
                                        <span class="Bill_required__3WKSD">*</span></label><input required id="docCount"
                                                                                                  name="sokien"
                                                                                                  type="number"
                                                                                                  class="form-control"
                                                                                                  aria-invalid="false"
                                                                                                  value="0">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div id="cannang" class="form-group"><label for="docWeight" class="">Cân nặng
                                        (GrossWeight) <span
                                                class="Bill_required__3WKSD">*</span></label>
                                    <div class="input-group"><input required id="docWeight" name="cannang" type="number"
                                                                    class="form-control" aria-invalid="false" value="0">
                                        <div class="input-group-append"><span class="input-group-text">(Kg) </span>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>


                                <fieldset class="row form-group" style="padding: 0px 15px;"><label class="">Loại (Type)
                                        &nbsp; &nbsp;</label>
                                    <div class="form-check"><input id="doc" name="doc" type="radio"
                                                                   class="form-check-input"
                                                                   value="doc" checked=""><label
                                                class="form-check-label">DOC &nbsp; &nbsp;</label></div>
                                    <div class="form-check"><input id="pack" name="pack" type="radio"
                                                                   class="form-check-input"
                                                                   value="pack"><label
                                                class="form-check-label">PACK</label></div>
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
                                                                                                  value="RINGO LOGISTICS">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderName" class="">Người LH (Contact Name) <span
                                                class="Bill_required__3WKSD">*</span></label><input required
                                                                                                    id="senderName"
                                                                                                    name="nguoilhgui"
                                                                                                    type="text"
                                                                                                    class="form-control"
                                                                                                    aria-invalid="false">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderContact" class="">Địa chỉ Liên hệ (Contact
                                        address) <span class="Bill_required__3WKSD">*</span></label><input
                                            id="senderContact" name="diachilienhegui" type="text" class="form-control"
                                            aria-invalid="false" value="">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderPhone" class="">Số Điện thoại (Telephone)
                                        <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                  id="senderPhone"
                                                                                                  name="sdtgui"
                                                                                                  type="text"
                                                                                                  class="form-control"
                                                                                                  aria-invalid="false">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group"><label for="senderEmail" class="">Email</label><input
                                            id="senderEmail" name="emailgui" type="email" class="form-control"
                                            aria-invalid="false"></div>
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
                                                    class="form-control" aria-invalid="false">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverName" class="">Người Liên hệ
                                                (Contact Name) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverName" name="nguoilhnhan" type="text"
                                                    class="form-control" aria-invalid="false">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverPhone" class="">Số Điện thoại
                                                (Telephone) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverPhone" name="sdtnhan" type="text"
                                                    class="form-control" aria-invalid="false">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverCountry" class="">Quốc gia (Country)
                                                <span class="Bill_required__3WKSD">*</span></label><select
                                                    id="receiverCountry" name="quocgianhan" class="form-control"
                                                    aria-invalid="false">
                                                <option>Afghanistan - AF</option>
                                                <option>Aland Islands - AX</option>
                                                <option>Albania - AL</option>
                                                <option>Algeria - DZ</option>
                                                <option>American Samoa - AS</option>
                                                <option>Andorra - AD</option>
                                                <option>Angola - AO</option>
                                                <option>Anguilla - AI</option>
                                                <option>Antarctica - AQ</option>
                                                <option>Antigua And Barbuda - AG</option>
                                                <option>Argentina - AR</option>
                                                <option>Armenia - AM</option>
                                                <option>Aruba - AW</option>
                                                <option>Australia - AU</option>
                                                <option>Austria - AT</option>
                                                <option>Azerbaijan - AZ</option>
                                                <option>Bahamas The - BS</option>
                                                <option>Bahrain - BH</option>
                                                <option>Bangladesh - BD</option>
                                                <option>Barbados - BB</option>
                                                <option>Belarus - BY</option>
                                                <option>Belgium - BE</option>
                                                <option>Belize - BZ</option>
                                                <option>Benin - BJ</option>
                                                <option>Bermuda - BM</option>
                                                <option>Bhutan - BT</option>
                                                <option>Bolivia - BO</option>
                                                <option>Bosnia and Herzegovina - BA</option>
                                                <option>Botswana - BW</option>
                                                <option>Bouvet Island - BV</option>
                                                <option>Brazil - BR</option>
                                                <option>British Indian Ocean Territory - IO</option>
                                                <option>Brunei - BN</option>
                                                <option>Bulgaria - BG</option>
                                                <option>Burkina Faso - BF</option>
                                                <option>Burundi - BI</option>
                                                <option>Cambodia - KH</option>
                                                <option>Cameroon - CM</option>
                                                <option>Canada - CA</option>
                                                <option>Cape Verde - CV</option>
                                                <option>Cayman Islands - KY</option>
                                                <option>Central African Republic - CF</option>
                                                <option>Chad - TD</option>
                                                <option>Chile - CL</option>
                                                <option>China - CN</option>
                                                <option>Christmas Island - CX</option>
                                                <option>Cocos (Keeling) Islands - CC</option>
                                                <option>Colombia - CO</option>
                                                <option>Comoros - KM</option>
                                                <option>Congo - CG</option>
                                                <option>Congo The Democratic Republic Of The - CD</option>
                                                <option>Cook Islands - CK</option>
                                                <option>Costa Rica - CR</option>
                                                <option>Cote D'Ivoire (Ivory Coast) - CI</option>
                                                <option>Croatia (Hrvatska) - HR</option>
                                                <option>Cuba - CU</option>
                                                <option>Cyprus - CY</option>
                                                <option>Czech Republic - CZ</option>
                                                <option>Denmark - DK</option>
                                                <option>Djibouti - DJ</option>
                                                <option>Dominica - DM</option>
                                                <option>Dominican Republic - DO</option>
                                                <option>East Timor - TL</option>
                                                <option>Ecuador - EC</option>
                                                <option>Egypt - EG</option>
                                                <option>El Salvador - SV</option>
                                                <option>Equatorial Guinea - GQ</option>
                                                <option>Eritrea - ER</option>
                                                <option>Estonia - EE</option>
                                                <option>Ethiopia - ET</option>
                                                <option>Falkland Islands - FK</option>
                                                <option>Faroe Islands - FO</option>
                                                <option>Fiji Islands - FJ</option>
                                                <option>Finland - FI</option>
                                                <option>France - FR</option>
                                                <option>French Guiana - GF</option>
                                                <option>French Polynesia - PF</option>
                                                <option>French Southern Territories - TF</option>
                                                <option>Gabon - GA</option>
                                                <option>Gambia The - GM</option>
                                                <option>Georgia - GE</option>
                                                <option>Germany - DE</option>
                                                <option>Ghana - GH</option>
                                                <option>Gibraltar - GI</option>
                                                <option>Greece - GR</option>
                                                <option>Greenland - GL</option>
                                                <option>Grenada - GD</option>
                                                <option>Guadeloupe - GP</option>
                                                <option>Guam - GU</option>
                                                <option>Guatemala - GT</option>
                                                <option>Guernsey and Alderney - GG</option>
                                                <option>Guinea - GN</option>
                                                <option>Guinea-Bissau - GW</option>
                                                <option>Guyana - GY</option>
                                                <option>Haiti - HT</option>
                                                <option>Heard Island and McDonald Islands - HM</option>
                                                <option>Honduras - HN</option>
                                                <option>Hong Kong S.A.R. - HK</option>
                                                <option>Hungary - HU</option>
                                                <option>Iceland - IS</option>
                                                <option>India - IN</option>
                                                <option>Indonesia - ID</option>
                                                <option>Iran - IR</option>
                                                <option>Iraq - IQ</option>
                                                <option>Ireland - IE</option>
                                                <option>Israel - IL</option>
                                                <option>Italy - IT</option>
                                                <option>Jamaica - JM</option>
                                                <option>Japan - JP</option>
                                                <option>Jersey - JE</option>
                                                <option>Jordan - JO</option>
                                                <option>Kazakhstan - KZ</option>
                                                <option>Kenya - KE</option>
                                                <option>Kiribati - KI</option>
                                                <option>Korea North - KP</option>
                                                <option>Korea South - KR</option>
                                                <option>Kuwait - KW</option>
                                                <option>Kyrgyzstan - KG</option>
                                                <option>Laos - LA</option>
                                                <option>Latvia - LV</option>
                                                <option>Lebanon - LB</option>
                                                <option>Lesotho - LS</option>
                                                <option>Liberia - LR</option>
                                                <option>Libya - LY</option>
                                                <option>Liechtenstein - LI</option>
                                                <option>Lithuania - LT</option>
                                                <option>Luxembourg - LU</option>
                                                <option>Macau S.A.R. - MO</option>
                                                <option>Macedonia - MK</option>
                                                <option>Madagascar - MG</option>
                                                <option>Malawi - MW</option>
                                                <option>Malaysia - MY</option>
                                                <option>Maldives - MV</option>
                                                <option>Mali - ML</option>
                                                <option>Malta - MT</option>
                                                <option>Man (Isle of) - IM</option>
                                                <option>Marshall Islands - MH</option>
                                                <option>Martinique - MQ</option>
                                                <option>Mauritania - MR</option>
                                                <option>Mauritius - MU</option>
                                                <option>Mayotte - YT</option>
                                                <option>Mexico - MX</option>
                                                <option>Micronesia - FM</option>
                                                <option>Moldova - MD</option>
                                                <option>Monaco - MC</option>
                                                <option>Mongolia - MN</option>
                                                <option>Montenegro - ME</option>
                                                <option>Montserrat - MS</option>
                                                <option>Morocco - MA</option>
                                                <option>Mozambique - MZ</option>
                                                <option>Myanmar - MM</option>
                                                <option>Namibia - NA</option>
                                                <option>Nauru - NR</option>
                                                <option>Nepal - NP</option>
                                                <option>Bonaire, Sint Eustatius and Saba - BQ</option>
                                                <option>Netherlands The - NL</option>
                                                <option>New Caledonia - NC</option>
                                                <option>New Zealand - NZ</option>
                                                <option>Nicaragua - NI</option>
                                                <option>Niger - NE</option>
                                                <option>Nigeria - NG</option>
                                                <option>Niue - NU</option>
                                                <option>Norfolk Island - NF</option>
                                                <option>Northern Mariana Islands - MP</option>
                                                <option>Norway - NO</option>
                                                <option>Oman - OM</option>
                                                <option>Pakistan - PK</option>
                                                <option>Palau - PW</option>
                                                <option>Palestinian Territory Occupied - PS</option>
                                                <option>Panama - PA</option>
                                                <option>Papua new Guinea - PG</option>
                                                <option>Paraguay - PY</option>
                                                <option>Peru - PE</option>
                                                <option>Philippines - PH</option>
                                                <option>Pitcairn Island - PN</option>
                                                <option>Poland - PL</option>
                                                <option>Portugal - PT</option>
                                                <option>Puerto Rico - PR</option>
                                                <option>Qatar - QA</option>
                                                <option>Reunion - RE</option>
                                                <option>Romania - RO</option>
                                                <option>Russia - RU</option>
                                                <option>Rwanda - RW</option>
                                                <option>Saint Helena - SH</option>
                                                <option>Saint Kitts And Nevis - KN</option>
                                                <option>Saint Lucia - LC</option>
                                                <option>Saint Pierre and Miquelon - PM</option>
                                                <option>Saint Vincent And The Grenadines - VC</option>
                                                <option>Saint-Barthelemy - BL</option>
                                                <option>Saint-Martin (French part) - MF</option>
                                                <option>Samoa - WS</option>
                                                <option>San Marino - SM</option>
                                                <option>Sao Tome and Principe - ST</option>
                                                <option>Saudi Arabia - SA</option>
                                                <option>Senegal - SN</option>
                                                <option>Serbia - RS</option>
                                                <option>Seychelles - SC</option>
                                                <option>Sierra Leone - SL</option>
                                                <option>Singapore - SG</option>
                                                <option>Slovakia - SK</option>
                                                <option>Slovenia - SI</option>
                                                <option>Solomon Islands - SB</option>
                                                <option>Somalia - SO</option>
                                                <option>South Africa - ZA</option>
                                                <option>South Georgia - GS</option>
                                                <option>South Sudan - SS</option>
                                                <option>Spain - ES</option>
                                                <option>Sri Lanka - LK</option>
                                                <option>Sudan - SD</option>
                                                <option>Suriname - SR</option>
                                                <option>Svalbard And Jan Mayen Islands - SJ</option>
                                                <option>Swaziland - SZ</option>
                                                <option>Sweden - SE</option>
                                                <option>Switzerland - CH</option>
                                                <option>Syria - SY</option>
                                                <option>Taiwan - TW</option>
                                                <option>Tajikistan - TJ</option>
                                                <option>Tanzania - TZ</option>
                                                <option>Thailand - TH</option>
                                                <option>Togo - TG</option>
                                                <option>Tokelau - TK</option>
                                                <option>Tonga - TO</option>
                                                <option>Trinidad And Tobago - TT</option>
                                                <option>Tunisia - TN</option>
                                                <option>Turkey - TR</option>
                                                <option>Turkmenistan - TM</option>
                                                <option>Turks And Caicos Islands - TC</option>
                                                <option>Tuvalu - TV</option>
                                                <option>Uganda - UG</option>
                                                <option>Ukraine - UA</option>
                                                <option>United Arab Emirates - AE</option>
                                                <option>United Kingdom - GB</option>
                                                <option>United States - US</option>
                                                <option>United States Minor Outlying Islands - UM</option>
                                                <option>Uruguay - UY</option>
                                                <option>Uzbekistan - UZ</option>
                                                <option>Vanuatu - VU</option>
                                                <option>Vatican City State (Holy See) - VA</option>
                                                <option>Venezuela - VE</option>
                                                <option>Vietnam - VN</option>
                                                <option>Virgin Islands (British) - VG</option>
                                                <option>Virgin Islands (US) - VI</option>
                                                <option>Wallis And Futuna Islands - WF</option>
                                                <option>Western Sahara - EH</option>
                                                <option>Yemen - YE</option>
                                                <option>Zambia - ZM</option>
                                                <option>Zimbabwe - ZW</option>
                                                <option>Kosovo - XK</option>
                                                <option>Curaçao - CW</option>
                                                <option>Sint Maarten (Dutch part) - SX</option>
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverPostalCode" class="">Mã Bưu chính
                                                (Postal code) <span class="Bill_required__3WKSD">*</span></label><input
                                                    required
                                                    id="receiverPostalCode" name="mabuuchinh" type="text"
                                                    class="form-control" aria-invalid="false">
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
                                                                                                          aria-invalid="false">
                                            <datalist id="cityList"></datalist>
                                            <div class="Bill_error__2txCw"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverProvince" class="">Tỉnh
                                                (State/Province)</label><input id="receiverProvince"
                                                                               name="tinh" type="text"
                                                                               class="form-control"></div>
                                        <div class="form-group"><label for="receiverAddr1" class="">Địa chỉ (address) 1
                                                <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                          id="receiverAddr1"
                                                                                                          name="diachinhan1"
                                                                                                          type="text"
                                                                                                          class="form-control"
                                                                                                          aria-invalid="false">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverAddr2" class="">Địa chỉ (address) 2
                                                <span class="Bill_required__3WKSD">*</span></label><input required
                                                                                                          id="receiverAddr2"
                                                                                                          name="diachinhan2"
                                                                                                          type="text"
                                                                                                          class="form-control"
                                                                                                          aria-invalid="false">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group"><label for="receiverAddr3" class="">Địa chỉ (address)
                                                3</label><input id="receiverAddr3" name="diachinhan3" type="text"
                                                                class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="backdetail">

                </div>
                <div class="row">
                    <div class="container mt-3">
                        <div class="input-group d-flex justify-content-center mb-3"><span>
                                <button type="submit"
                                        class="btn-add btn btn-success btn-lg">Tạo Hoá đơn</button></span>
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