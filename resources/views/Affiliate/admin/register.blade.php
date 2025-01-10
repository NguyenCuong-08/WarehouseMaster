<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>{{ $settings['name'] }} | {{trans('admin.register')}}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="stylesheet" href="{{asset('login/css/vendors.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/vendors.bundle.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/style.bundle.css')}}">


    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{ CommonHelper::getUrlImageThumb(@$settings['favicon'], null, 16) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .fa-classic, .fa-regular, .fa-solid, .far, .fas {
            font-family: "Font Awesome 6 Free" !important;
        }

        .form-group label {
            font-size: 20px;
            font-weight: 400;
            margin-top: 1rem !important;
            color: #fff !important;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        #address_display {
            background-color: #f9f9f9;
            color: #333;
        }

        #selected_province {
            background-color: #f9f9f9;
            color: #333;
        }

        .form-control.m-input {
            color: #495057; /* Màu chữ cho select */
            background-color: #fff; /* Màu nền cho select */
        }

        .form-control.m-input option {
            color: #495057; /* Màu chữ cho option */
        }


        .form-control.m-input.dark-mode option {
            background-color: #343a40;
            color: #ffffff;
        }

        .form-group label span {
            color: red;
        }

        .form-group input {
            margin-top: 0 !important;
        }

        * {
            font-family: Roboto, sans-serif !important;
        }

        .form-control {
            height: calc(3rem + 22px) !important;
        }

        .form-group {
            position: relative; /* Để vị trí tuyệt đối của biểu tượng nằm trong khung nhập liệu */
            margin-bottom: 1rem;
        }

        .form-control {
            padding-right: 2.5rem; /* Tạo không gian cho biểu tượng */
        }

        .toggle-password {
            position: absolute;
            top: 72%;
            right: 0.75rem;
            transform: translateY(-50%);
            cursor: pointer;
            color: #000; /* Màu của biểu tượng */
            z-index: 1; /* Đảm bảo biểu tượng nằm trên trường nhập liệu */
        }

        .text-danger {
            padding-left: 10px;
        }

        @media only screen and (max-width: 600px) {
            .form-group input {
                background: rgba(255, 255, 255, 1) !important;
            }
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1"
         id="m_login" style="
		 background: linear-gradient(115deg, #288098 50%, #125e7e 50%)  ;
		 background-attachment: fixed;
		 background-size: 200% 200%; /* Đảm bảo gradient chéo đến góc màn hình */
	background-position: center;
	">
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img style="width: 50%" class="" src="{{asset('/filemanager/userfiles/'.@$settings['logo'])}}"
                             title="{{ @$settings['name'] }}" alt="{{ @$settings['name'] }}"/>
                    </a>
                </div>

                <div class="signup">
                    <div class="m-login__head">
                        <h3 class="m-login__title">{{trans('admin.register')}}</h3>
                        <div class="m-login__desc">{{trans('admin.enter_information_to_create_your_account')}}:</div>
                    </div>
                    <form method="post" class="m-login__form m-form" action="" enctype="multipart/form-data">
                        <div class="form-group m-form__group">
                            <label for="">Họ & Tên <span>*</span></label>
                            <input required style="color: #000;!important;" class="form-control m-input" type="text"
                                   placeholder="Họ & Tên" name="name" id="firstname" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        						<div class="form-group m-form__group">
                                                    <label for="">Email <span>*</span></label>
                        							<input style="color: #000;!important;" class="form-control m-input" type="email" placeholder="Email" name="email" id="inputEmail" value="{{old('email')}}" autocomplete="off">
                        							@if ($errors->has('email'))
                        								<p class="text-danger" style="padding-left: 10px;">{{$errors->first('email')}}</p>
                        							@endif
                        						</div>
                        <div class="form-group m-form__group">
                            <label for="">Số điện thoại <span>*</span></label>
                            <input required style="color: #000;!important;" class="form-control m-input" name="tel"
                                   type="text" placeholder="Số điện thoại" id="tel" value="{{old('tel')}}">
                            @if ($errors->has('tel'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('tel')}}</p>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            <label for="">Mật khẩu <span>*</span></label>
                            <input required style="color: #000;!important;" class="form-control m-input" type="password"
                                   name="password" id="inputPassword" placeholder="Mật khẩu">
                            <span class="toggle-password" onclick="togglePassword()">
								<i id="toggle-icon" class="fas fa-eye"></i>
							</span>
                            @if ($errors->has('password'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('password')}}</p>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            <label for="">Nhập Lại Mật khẩu <span>*</span></label>
                            <input required style="color:#000!important;"
                                   class="form-control m-input m-login__form-input--last" name="password_confimation"
                                   type="password" id="inputPasswordConfirm" placeholder="Nhập lại mật khẩu">
                            <span class="toggle-password" onclick="togglePasswordConfirm()">
            <i id="toggle-icon-confirm" class="fas fa-eye"></i>
        </span>
                            @if ($errors->has('password_confimation'))
                                <p class="text-danger"
                                   style="padding-left: 10px;">{{$errors->first('password_confimation')}}</p>
                            @endif
                        </div>
                        {{--					<div class="form-group m-form__group">--}}


                        {{--                        <label for="">Thành Phố <span>*</span></label>--}}
                        {{--                      <select required id="province" name="province_id" class="form-control m-input" style="color: black; background: white;">--}}
                        {{--                          <option value="" selected>Chọn tỉnh thành</option>--}}
                        {{--                          @foreach ($provinces as $province)--}}
                        {{--                              <option value="{{ $province->id }}">{{ $province->name }}</option>--}}
                        {{--                          @endforeach--}}
                        {{--                      </select>--}}

                        {{--                        @if ($errors->has('province'))--}}
                        {{--                            <p class="text-danger" style="padding-left: 10px;">{{$errors->first('province')}}</p>--}}
                        {{--                        @endif--}}

                        {{--                        <label for="">Quận/Huyện<span>*</span></label>--}}
                        {{--                        <select required id="district" name="district_id" class="form-control m-input"  style="color: black; background: white;">--}}
                        {{--                            <option value="">Chọn quận huyện</option >--}}
                        {{--                        </select>--}}
                        {{--                        @if ($errors->has('district'))--}}
                        {{--                            <p class="text-danger" style="padding-left: 10px;">{{$errors->first('district')}}</p>--}}
                        {{--                        @endif--}}

                        {{--                        <label for="">Phường/Xã<span>*</span></label>--}}
                        {{--                        <select required id="ward" name="ward_id" class="form-control m-input"  style="color: black; background: white;">--}}
                        {{--                            <option value="">Chọn phường xã</option>--}}
                        {{--                        </select>--}}
                        {{--                        @if ($errors->has('ward'))--}}
                        {{--                            <p class="text-danger" style="padding-left: 10px;">{{$errors->first('ward')}}</p>--}}
                        {{--                        @endif--}}

                        {{--                        <label for="address">Địa chỉ nhận hàng <span>*</span></label>--}}
                        {{--                        <br>--}}
                        {{--                        <input type="text" id="address" name="address" placeholder="Tên đường, tòa nhà, số nhà" class="form-control m-input" style="color: black;" required>--}}


                        {{--                        @if ($errors->has('address_detail'))--}}
                        {{--                            <p class="text-danger" style="padding-left: 10px;">{{$errors->first('address_detail')}}</p>--}}
                        {{--                        @endif--}}
                        {{--                    </div>--}}


                        <div class="form-group m-form__group">
                            <label for="">Tên ngân hàng nhận tiền</label>

                            <input style="color: #000;!important;" class="form-control m-input" name="ngan_hang"
                                   type="text" placeholder="Tên ngân hàng nhận tiền" id="ngan_hang"
                                   value="{{ old('ngan_hang') }}">
                            @if ($errors->has('ngan_hang'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('ngan_hang')}}</p>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            <label for="">Số tài khoản nhận tiền</label>

                            <input style="color: #000;!important;" class="form-control m-input" name="stk" type="text"
                                   placeholder="Số tài khoản nhận tiền" id="stk" value="{{ old('stk') }}">
                            @if ($errors->has('stk'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('stk')}}</p>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            <label for="">Mã pin rút tiền <span>*</span></label>

                            <input required style="color: #000;!important;" class="form-control m-input" name="pin"
                                   type="password" placeholder="Mã pin rút tiền" id="pin" value="{{ old('pin') }}">
                            <span class="toggle-password" onclick="togglePin()">
                <i id="toggle-icon-pin" class="fas fa-eye"></i>
            </span>
                            @if ($errors->has('pin'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('pin')}}</p>
                            @endif
                        </div>
{{--						<div class="form-group m-form__group">--}}
{{--							<label for="front_id">Ảnh mặt trước của căn cước công dân</label>--}}
{{--							<input style="color: #000; !important;" class="" name="front_cccd" type="file"--}}
{{--								   id="front_id">--}}
{{--							@if ($errors->has('front_id'))--}}
{{--								<p class="text-danger" style="padding-left: 10px;">{{$errors->first('front_id')}}</p>--}}
{{--							@endif--}}
{{--						</div>--}}

{{--						<div class="form-group m-form__group">--}}
{{--							<label for="back_id">Ảnh mặt sau của căn cước công dân</label>--}}
{{--							<input style="color: #000; !important;" class="" name="back_cccd" type="file"--}}
{{--								   id="back_id">--}}
{{--							@if ($errors->has('back_id'))--}}
{{--								<p class="text-danger" style="padding-left: 10px;">{{$errors->first('back_id')}}</p>--}}
{{--							@endif--}}
{{--						</div>--}}
                        <div class="form-group m-form__group">
                            <label for="">ID người giới thiệu <span>*</span></label>

                            <input required style="color: #000 !important;" class="form-control m-input"
                                   name="invite_by" type="number" placeholder="ID người giới thiệu" id="invite_by"
                                   value="{{ request()->get('code', '') }}"> @if ($errors->has('invite_by'))
                                <p class="text-danger" style="padding-left: 10px;">{{$errors->first('invite_by')}}</p>
                            @endif
                        </div>
                        <div class="row form-group m-form__group m-login__form-sub">
                            <div class="col m--align-left">
                                <label class="m-checkbox m-checkbox--light">
                                    <input type="checkbox" name="agree">{{trans('admin.i_agree')}} <a href="#"
                                                                                                      class="m-link m-link--focus">{{trans('admin.terms_and_conditions')}}
                                        .</a>.
                                    <span></span>
                                </label>
                                <span class="m-form__help"></span>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">{{trans('admin.register')}}</button>&nbsp;&nbsp;
                            <a href="/admin/login"
                               class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">{{trans('admin.do_you_already_have_an_account')}}</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Global Theme Bundle -->
<link rel="stylesheet" href="{{asset('login/js/login.js')}}">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
{{--<script src="{{URL::to('backend/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>--}}
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::to('libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('inputPassword');
        const toggleIcon = document.getElementById('toggle-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    function togglePasswordConfirm() {
        const passwordInput = document.getElementById('inputPasswordConfirm');
        const toggleIcon = document.getElementById('toggle-icon-confirm');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }

    function togglePin() {
        const pinInput = document.getElementById('pin');
        const toggleIcon = document.getElementById('toggle-icon-pin');

        if (pinInput.type === 'password') {
            pinInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            pinInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const provinceSelect = document.getElementById('province');
        const districtSelect = document.getElementById('district');
        const wardSelect = document.getElementById('ward');

        provinceSelect.addEventListener('change', function () {
            const provinceId = this.value;
            if (provinceId) {
                fetch(`/districts/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        districtSelect.innerHTML = '<option value="">Chọn quận huyện</option>';
                        wardSelect.innerHTML = '<option value="">Chọn phường xã</option>';
                        districtSelect.disabled = false;
                        data.districts.forEach(district => {
                            districtSelect.innerHTML += `<option value="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                districtSelect.innerHTML = '<option value="">Chọn quận huyện</option>';
                wardSelect.innerHTML = '<option value="">Chọn phường xã</option>';
                districtSelect.disabled = true;
                wardSelect.disabled = true;
            }
        });

        districtSelect.addEventListener('change', function () {
            const districtId = this.value;
            if (districtId) {
                fetch(`/wards/${districtId}`)
                    .then(response => response.json())
                    .then(data => {
                        wardSelect.innerHTML = '<option value="">Chọn phường xã</option>';
                        wardSelect.disabled = false;
                        data.wards.forEach(ward => {
                            wardSelect.innerHTML += `<option value="${ward.id}">${ward.name}</option>`;
                        });
                    });
            } else {
                wardSelect.innerHTML = '<option value="">Chọn phường xã</option>';
                wardSelect.disabled = true;
            }
        });
    });
</script>


<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>