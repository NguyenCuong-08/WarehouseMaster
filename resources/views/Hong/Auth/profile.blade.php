<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function validateForm() {
        // Lấy giá trị từ các trường input
        var new_password = document.getElementById('new_password').value;
        var new_password1 = document.getElementById('new_password1').value;
        var password_old = document.getElementById('password_old').value;

        // Xóa các thông báo lỗi hiện tại
        $('.error').remove();

        // Kiểm tra điều kiện validation
        var errors = [];
        var uppercaseRegex = /[A-Z]/;
        var lowercaseRegex = /[a-z]/;
        var digitRegex = /\d/;
        var specialCharRegex = /[^A-Za-z0-9]/;

        if (password_old.trim() == '') {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Bạn chưa điền thông tin';
            document.getElementById('password_old').parentNode.appendChild(errorElement);
            errors.push('password_old');
        }

        if (new_password.trim() === '') {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Bạn chưa điền thông tin';
            document.getElementById('new_password').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');

        } else if (new_password.trim().length < 8 || new_password.trim().length > 16) {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Mật khẩu phải dài từ 8 đến 16 ký tự';
            document.getElementById('new_password').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');
        } else if (!uppercaseRegex.test(new_password)) {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Mật khẩu phải chứa ít nhất 1 ký tự viết hoa';
            document.getElementById('new_password').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');
        } else if (!lowercaseRegex.test(new_password)) {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Mật khẩu phải chứa ít nhất 1 ký tự viết thường';
            document.getElementById('new_password').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');
        } else if (!digitRegex.test(new_password)) {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Mật khẩu phải chứa ít nhất 1 ký tự số';
            document.getElementById('new_password').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');
        } else if (!specialCharRegex.test(new_password)) {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt';
            document.getElementById('new_password').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');
        }

        if (new_password1.trim() === '') {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Bạn chưa điền thông tin';
            document.getElementById('new_password1').parentNode.appendChild(errorElement);
            errors.push('Field 1 is required.');
        } else if (new_password.trim() !== new_password1.trim()) {
            var errorElement = document.createElement('small');
            errorElement.className = 'text-left error';
            errorElement.textContent = 'Mật khẩu không khớp';
            document.getElementById('new_password1').parentNode.appendChild(errorElement);

            errors.push('Field 1 is required.');

        }

        if (errors.length > 0) {
            // alert('8');
            console.log(errors);
            return false;
        }

        // Nếu không có lỗi, form sẽ được submit bình thường
        return true;
    }
</script>
<form action="{{ route('setting.submit') }}" method="post">
    {{ csrf_field() }}

    <div class="wrapper" id="wrapper" style="text-align: left">
        @include('HuongNghiep.Frontend.partials.header.header_2')
        <div class="grid-container transparent settings-form" style="
    margin-bottom: 100px;">
            <div class="grid-x align-center">
                <div class="x-large-6 large-8 medium-12 small-12 cell">
                    <h1>Cài đặt tài khoản TeenCodes</h1>
                    <div data-react-class="user/editForm"
                         data-react-cache-id="user/editForm-0">
                        <div class=""><label><span>Họ và tên đầy đủ</span>
                                <div class=""><input type="text" name="name" value="{{ $user->name }}"
                                                     style="color: #fff"></div>
                            </label>
                            <div class="input-link"><label><span>Thư điện tử</span>
                                    <div class=""><input disabled="" type="text" name="email"
                                                         value="{{ $user->email }}"></div>
                                </label></div>
                            <div class="input-link"><label><span>Số điện thoại di động </span>
                                    <div class=""><input type="text" name="phone" value="{{ $user->phone }}"></div>

                                </label></div>
                            <div class="input-link"><label><span>Mật khẩu</span>
                                    <div class=""><input type="password" name="password" disabled=""
                                                         value="{{ $user->password }}">
                                    </div>
                                    <a data-bs-toggle="modal" data-bs-target="#myModal">Đổi mật khẩu</a>
                                </label></div>
                            <div class=" input-link"><label><span>Năm sinh</span>
                                    <div class=""><input type="text" name="year" value="{{ $user->year }}"></div>
                                </label></div>

                            <label><span>Giới tính</span>
                                <div class="label-icon-right select-label"><select name="gender">
                                        <option value="Nam" {{ $user->gender =='Nam'?'selected':'' }}>Nam</option>
                                        <option value="Nữ" {{ $user->gender =='Nữ'?'selected':'' }}>Nữ</option>
                                        <option value="Không đề cập" {{ $user->gender =='Không đề cập'?'selected':'' }}>
                                            Không đề cập
                                        </option>

                                    </select></div>
                            </label>
                            <label><span>Tỉnh / Thành phố</span>
                                <div class="label-icon-right select-label"><select name="address">
                                        <option value="">Nơi đang sống</option>
                                        @foreach($city as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $user->address?'selected':'' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select></div>
                            </label>
                            <label><span>Cấp học hiện nay</span>
                                <div class="label-icon-right select-label"><select name="class">
                                        <option value="Lớp 12" {{ $user->class == 'Lớp 12'?'selected':'' }}>Lớp 12
                                        </option>
                                        <option value="Lớp 11" {{ $user->class == 'Lớp 11'?'selected':'' }}>Lớp 11
                                        </option>
                                        <option value="Lớp 10" {{ $user->class == 'Lớp 10'?'selected':'' }}>Lớp 10
                                        </option>
                                        <option value="Lớp 9" {{ $user->class == 'Lớp 9'?'selected':'' }}>Lớp 9
                                        </option>
                                        <option value="Lớp 8" {{ $user->class == 'Lớp 8'?'selected':'' }}>Lớp 8
                                        </option>
                                        <option value="Tốt nghiệp THPT" {{ $user->class == 'Tốt nghiệp THPT'?'selected':'' }}>
                                            Tốt nghiệp THPT
                                        </option>
                                        <option value="Tốt nghiệp THCS" {{ $user->class == 'Tốt nghiệp THCS'?'selected':'' }}>
                                            Tốt nghiệp THCS
                                        </option>
                                        <option value="Tôi là giáo viên" {{ $user->class == 'Tôi là giáo viên'?'selected':'' }}>
                                            Tôi là giáo viên
                                        </option>
                                    </select></div>
                            </label><label><span>Cấp học mục tiêu</span>
                                <div class="label-icon-right select-label"><select name="class2">

                                        <option value="Đại học chính quy" {{ $user->class2 == 'Đại học chính quy'?'selected':'' }}>
                                            Đại học chính quy
                                        </option>
                                        <option value="Cao đẳng" {{ $user->class2 == 'Cao đẳng'?'selected':'' }}>Cao
                                            đẳng
                                        </option>
                                        <option value="Trung cấp nghề" {{ $user->class2 == 'Trung cấp nghề'?'selected':'' }}>
                                            Trung cấp nghề
                                        </option>
                                        <option value="THPT" {{ $user->class2 == 'THPT'?'selected':'' }}>THPT
                                        </option>
                                        <option value="Trung tâm GDTX" {{ $user->class2 == 'Trung tâm GDTX'?'selected':'' }}>
                                            Trung tâm GDTX
                                        </option>
                                        <option value="Đại học liên thông" {{ $user->class2 == 'Đại học liên thông'?'selected':'' }}>
                                            Đại học liên thông
                                        </option>
                                        <option value="Đào tạo quốc tế" {{ $user->class2 == 'Đào tạo quốc tế'?'selected':'' }}>
                                            Đào tạo quốc tế
                                        </option>
                                        <option value="Làm việc ngay" {{ $user->class2 == 'Làm việc ngay'?'selected':'' }}>
                                            Làm việc ngay
                                        </option>
                                    </select></div>
                            </label>
                            <div class="grid-x align-middle custom mar-bot-20">
                                <div class="small-12 cell delete">
                                    {{--                                    <a>Do you have full access code?</a>--}}
                                    {{--                                    <div--}}
                                    {{--                                            class="tooltip-trigger into-label align-left small-icon green-tooltip-icon">--}}
                                    {{--                                                <span class="tooltip top">This field is only relevant to specific--}}
                                    {{--                                                    business and--}}
                                    {{--                                                    institutions that have been previously provided with a code. Please--}}
                                    {{--                                                    ignore--}}
                                    {{--                                                    this field if do not have a code</span>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <label><span>Hãy chọn ngay Tài khoản TeenCodes của bạn</span></label>
                            <div class="grid-x">
                                {{--                                <div class="large-6 medium-6 small-12 cell padR5">--}}
                                {{--                                    <div class=" input-tick"><label><input type="checkbox"--}}
                                {{--                                                                           name="receive_advice_emails" value="true"--}}
                                {{--                                                                           checked="">--}}
                                {{--                                            <div class="checkbox-material">--}}
                                {{--                                                <div class="custom-checkbox"></div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <span class="check-text">Khám phá</span>--}}
                                {{--                                        </label></div>--}}
                                {{--                                </div>--}}
                                <div class="large-6 medium-6 small-12 cell">
                                    <div class=" input-tick"><label><input type="checkbox"
                                                                           name="receive_study_emails" value="true"
                                                                           checked="">
                                            <div class="checkbox-material">
                                                <div class="custom-checkbox"></div>
                                            </div>
                                            <span class="check-text" style="text-transform: uppercase">Cơ bản</span>
                                        </label></div>
                                </div>
                            </div>
                            <div class="grid-x">
                                <div class="large-6 medium-6 small-12 cell padR5">
                                    <div class=" input-tick"><label><input type="checkbox"
                                                                           name="receive_jobs_emails" value="true"
                                                                           checked="">
                                            <div class="checkbox-material">
                                                <div class="custom-checkbox"></div>
                                            </div>
                                            <span class="check-text"
                                                  style="text-transform: uppercase">Tiêu chuẩn</span>
                                        </label></div>
                                </div>
                                <div class="large-6 medium-6 small-12 cell">
                                    <div class=" input-tick"><label><input type="checkbox"
                                                                           name="receive_promo_emails" value="true"
                                                                           checked="">
                                            <div class="checkbox-material">
                                                <div class="custom-checkbox"></div>
                                            </div>
                                            <span class="check-text"
                                                  style="text-transform: uppercase">Thành công</span>
                                        </label></div>
                                </div>

                            </div>
                            <div class="grid-x align-middle custom">
                                <div class="small-4 cell delete mar-bot-20"><a href="{{ route('delete.account') }}">Xóa
                                        tài khoản</a>
                                    @if(session('error'))
                                        {{ session('error') }}
                                    @endif
                                </div>
                                <div class="small-8 cell flex-end">
                                    <a href="huongnghiep/home"
                                       class="button button--white before-fade-in fade-in cancel">Hủy bỏ<span
                                                class="button__hovered"></span></a>
                                    <button
                                            class="button button--green before-fade-in fade-in save">Lưu<span
                                                class="button__hovered"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="oaiklv">
                <div class="popup opened" style="margin-top: 0px;">
                    <div class="popup__content">
                        <div class="form-container grid-x">
                            <h3 class="popup__title" style="font-size: 38px;">Thay đổi mật khẩu của bạn</h3>
                            <form onsubmit="return validateForm()" action="{{ route('change.password') }}"
                                  method="post" style="width: 100%;">
                                {{ csrf_field() }}

                                <div class="small-12 cell">

                                    <div class=""><input placeholder="Mật khẩu mới*" type="password"
                                                         id="new_password"
                                                         name="new_password"></div>

                                </div>
                                <div class="small-12 cell">

                                    <div class=""><input placeholder="Xác nhận mật khẩu*" type="password"
                                                         id="new_password1"
                                        ></div>

                                </div>
                                <div class="small-12 cell">
                                    <div class=""><input placeholder="Mật khẩu hiện tại*" type="password"
                                                         id="password_old" name="password_old"
                                        >
                                        @if(session('error1'))

                                            <small class="text-left error">{{ session('error1') }}</small>
                                            <script>
                                                $('#myModal').modal('show');
                                            </script>
                                        @endif
                                    </div>
                                </div>
                                <div class="medium-text-center text-right">
                                    <button type="submit"
                                            class="button button--green before-fade-in fade-in">Lưu<span
                                                class="button__hovered"></span></button>
                                </div>
                            </form>
                        </div>
                        <a class="popup__close" data-bs-dismiss="modal">×</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-backdrop {
        display: none;
    }

    @media screen and (max-width: 39.99875em) {
        .test-page__wrapper__main {
            overflow-y: scroll;
            margin-bottom: 0px !important;

        }

        .grid-container {
            margin-bottom: 0px !important;
        }
    }

    .test-page-container {
        background-color: #0A1E2E;
    }

    @font-face {
        font-family: sofia-pro-bold;
        src: url(https://use.typekit.net/af/09d302/00000000000000007735a14e/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("woff2"), url(https://use.typekit.net/af/09d302/00000000000000007735a14e/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("woff"), url(https://use.typekit.net/af/09d302/00000000000000007735a14e/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3) format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 700
    }

    @font-face {
        font-family: sofia-pro-semi-bold;
        src: url(https://use.typekit.net/af/61b4ba/00000000000000007735a167/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3) format("woff2"), url(https://use.typekit.net/af/61b4ba/00000000000000007735a167/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3) format("woff"), url(https://use.typekit.net/af/61b4ba/00000000000000007735a167/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3) format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 600
    }

    @font-face {
        font-family: sofia-pro-regular;
        src: url(https://use.typekit.net/af/5e6988/00000000000000007735a163/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("woff2"), url(https://use.typekit.net/af/5e6988/00000000000000007735a163/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("woff"), url(https://use.typekit.net/af/5e6988/00000000000000007735a163/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3) format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 400
    }

    @font-face {
        font-family: sofia-pro-light;
        src: url(https://use.typekit.net/af/1416a9/00000000000000007735a15a/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n3&v=3) format("woff2"), url(https://use.typekit.net/af/1416a9/00000000000000007735a15a/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n3&v=3) format("woff"), url(https://use.typekit.net/af/1416a9/00000000000000007735a15a/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n3&v=3) format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 300
    }

    .not-selectable {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    @media print {
        .no-print {
            display: none !important
        }
    }

    .dashboard__menu {
        visibility: hidden;
        height: 45px;
        margin: 0 0 60px
    }

    @media screen and (min-width: 64.0625em) {
        .dashboard__hero {
            margin-top: -40px
        }
    }

    .breadcrumbs-nav {
        font-size: 10px;
        line-height: 15px;
        color: rgba(255, 255, 255, .5);
        margin: 0 0 15px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .breadcrumbs-nav a {
        color: rgba(255, 255, 255, .5);
        font-size: 10px;
        line-height: 15px
    }

    .test-top-hero__title-icon {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap
    }

    .test-top-hero__title-tests {
        font-size: 35px;
        line-height: 40px;
        margin: 0 0 0 15px
    }

    .test-top-hero__details {
        color: rgba(255, 255, 255, .5);
        margin: 10px 0 20px -15px;
        font-size: 15px;
        width: 100%
    }

    .test-top-hero__menu {
        padding: 0 15px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    @media screen and (max-width: 39.99875em) {
        .test-top-hero__menu {
            padding: 0 10px 10px
        }
    }

    .test-top-hero .breadcrumbs-nav .breadcrumbs-nav {
        margin-bottom: 42px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .test-top-hero .breadcrumbs-nav .breadcrumbs-nav {
            margin-bottom: 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .test-top-hero .breadcrumbs-nav .breadcrumbs-nav {
            margin-bottom: 18px
        }
    }

    .admin-icon {
        background: url(//cdn1.careerhunter.io/assets/sprites/admin_icons-f566279819429dc5a7eeb63d8f06dd297f6fa1cac0ea0f64d6744e1ba67e2f07.svg)
    }

    .admin-icon.star {
        width: 15px;
        height: 14px
    }

    .admin-icon.star.grey {
        background-position-y: -13px
    }

    .admin-icon.star.grey:hover {
        background-position-y: -40px;
        cursor: pointer
    }

    .admin-icon.star.white {
        background-position-y: -71px
    }

    .admin-icon.star.empty {
        background-position-x: -35px
    }

    .admin-icon.star.half {
        background-position-x: -11px
    }

    .admin-icon.star.full {
        background-position-x: -59px
    }

    .admin-icon.view {
        background-position-x: -83px;
        width: 15px;
        height: 10px
    }

    .admin-icon.view.grey {
        background-position-y: -15px
    }

    .admin-icon.view.grey:hover {
        background-position-y: -41px;
        cursor: pointer
    }

    .admin-icon.view.white {
        background-position-y: -73px
    }

    .admin-icon.edit {
        background-position-x: -107px;
        width: 14px;
        height: 14px
    }

    .admin-icon.edit.grey {
        background-position-y: -13px
    }

    .admin-icon.edit.grey:hover {
        background-position-y: -40px;
        cursor: pointer
    }

    .admin-icon.edit.white {
        background-position-y: -71px
    }

    .admin-icon.trash {
        background-position-x: -130px;
        width: 11px;
        height: 14px
    }

    .admin-icon.trash.grey {
        background-position-y: -13px
    }

    .admin-icon.trash.grey:hover {
        background-position-y: -40px;
        cursor: pointer
    }

    .admin-icon.trash.white {
        background-position-y: -71px
    }

    .admin-icon.cross-small {
        background-position-x: -150px;
        width: 11px;
        height: 11px
    }

    .admin-icon.cross-small.grey {
        background-position-y: -14px
    }

    .admin-icon.cross-small.white {
        background-position-y: -73px
    }

    .admin-icon.minus {
        background-position-x: -170px;
        width: 11px;
        height: 3px
    }

    .admin-icon.minus.grey {
        background-position-y: -18px
    }

    .admin-icon.minus.grey:hover {
        background-position-y: -45px;
        cursor: pointer
    }

    .admin-icon.minus.white {
        background-position-y: -77px
    }

    .admin-icon.x-icon {
        background-position-x: -192px;
        width: 10px;
        height: 9px
    }

    .admin-icon.x-icon.grey {
        background-position-y: -15px
    }

    .admin-icon.x-icon.grey:hover {
        background-position-y: -42px;
        cursor: pointer
    }

    .admin-icon.x-icon.white {
        background-position-y: -74px
    }

    .admin-icon.cross-large {
        background-position-x: -211px;
        width: 21px;
        height: 21px
    }

    .admin-icon.cross-large.grey {
        background-position-y: -9px
    }

    .admin-icon.cross-large.white {
        background-position-y: -68px
    }

    .admin-icon.chevron-left,
    .admin-icon.chevron-right {
        background-position-y: -72px;
        width: 8px;
        height: 12px
    }

    .admin-icon.chevron-left {
        background-position-x: -242px
    }

    .admin-icon.chevron-right {
        background-position-x: -260px
    }

    .admin-icon.chevron-down {
        background-position: -300px -16px;
        width: 12px;
        height: 8px
    }

    .admin-icon.chevron-up {
        background-position: -277px -16px;
        width: 12px;
        height: 8px
    }

    .admin-icon.search-icon {
        background-position: -430px -12px;
        width: 15px;
        height: 15px
    }

    .admin-icon.clean {
        background-position: -349px -10px;
        width: 15px;
        height: 20px
    }

    .admin-icon.clean:hover {
        background-position: -349px -37px;
        cursor: pointer
    }

    .admin-icon.upload {
        background-position: -323px -13px;
        width: 15px;
        height: 13px
    }

    .admin-icon.upload:hover {
        background-position: -323px -40px;
        cursor: pointer
    }

    .admin-icon.ellipsis {
        background-position: -375px -18px;
        width: 17px;
        height: 4px
    }

    .admin-icon.ellipsis:hover {
        background-position: -375px -44px;
        cursor: pointer
    }

    .admin-icon.account {
        background-position: -403px -12px;
        width: 15px;
        height: 15px
    }

    .admin-icon.account:hover {
        background-position: -403px -39px;
        cursor: pointer
    }

    .admin-icon.note {
        background-position: -502px -12px;
        width: 15px;
        height: 15px
    }

    .admin-icon.note:hover {
        background-position: -502px -39px;
        cursor: pointer
    }

    .small-icon {
        background: url(//cdn1.careerhunter.io/assets/sprites/admin_icons-f566279819429dc5a7eeb63d8f06dd297f6fa1cac0ea0f64d6744e1ba67e2f07.svg)
    }

    .small-icon.bin {
        background-position-x: -130px;
        background-position-y: -71px;
        width: 11px;
        height: 14px
    }

    .small-icon.cross {
        background-position-x: -150px;
        width: 11px;
        height: 11px;
        background-position-y: -73px
    }

    .small-icon.grey-x {
        background-position: -192px -15px !important;
        cursor: pointer;
        display: inline-block;
        width: 12px;
        height: 12px;
        margin-left: 10px
    }

    .small-icon.grey-cross {
        background-position-x: -192px;
        width: 10px;
        height: 9px;
        background-position-y: -15px
    }

    .small-icon.green-chevron-down {
        background-position: -300px -16px;
        width: 12px;
        height: 8px;
        display: inline-block
    }

    .foundation-mq {
        font-family: "small=0em&medium=40em&large=64.0625em&xlarge=75em&xxlarge=90em"
    }

    .large-icon {
        background: url(//cdn2.careerhunter.io/assets/sprites/large_icons-27cb6f771f1a68e026130a616e69b9cf5fa3ef6cbcb9dfcf2b423519ccf2e740.svg)
    }

    .large-icon.interests-white-bold {
        background-position: -15px -18px;
        width: 44px;
        height: 37px
    }

    .large-icon.personality-white-bold {
        background-position: -85px -18px;
        width: 34px;
        height: 37px
    }

    .large-icon.motivators-white-bold {
        background-position: -149px -19px;
        width: 35px;
        height: 36px
    }

    .large-icon.abstract-white-bold {
        background-position: -210px -20px;
        width: 38px;
        height: 36px
    }

    .large-icon.numerical-white-bold {
        background-position: -270px -22px;
        width: 45px;
        height: 36px
    }

    .large-icon.verbal-white-bold {
        background-position: -328px -21px;
        width: 52px;
        height: 38px
    }

    .large-icon.white-search-paper {
        background-position: -404px -22px;
        width: 31px;
        height: 36px
    }

    .large-icon.interests-small-white {
        background-position: -455px -16px;
        width: 45px;
        height: 38px
    }

    .large-icon.personality-small-white {
        background-position: -519px -16px;
        width: 36px;
        height: 38px
    }

    .large-icon.motivators-small-white {
        background-position: -573px -17px;
        width: 37px;
        height: 37px
    }

    .large-icon.abstract-small-white {
        background-position: -631px -20px;
        width: 32px;
        height: 30px
    }

    .large-icon.numerical-small-white {
        background-position: -682px -20px;
        width: 40px;
        height: 32px
    }

    .large-icon.verbal-small-white {
        background-position: -742px -18px;
        width: 49px;
        height: 35px
    }

    .large-icon.interests-blue-bold {
        background-position: -814px -13px;
        width: 49px;
        height: 41px
    }

    .large-icon.personality-blue-bold {
        background-position: -879px -16px;
        width: 37px;
        height: 40px
    }

    .large-icon.motivators-blue-bold {
        background-position: -935px -14px;
        width: 44px;
        height: 44px
    }

    .large-icon.abstract-blue-bold {
        background-position: -997px -17px;
        width: 39px;
        height: 38px
    }

    .large-icon.numerical-blue-bold {
        background-position: -1054px -20px;
        width: 44px;
        height: 34px
    }

    .large-icon.verbal-blue-bold {
        background-position: -1116px -17px;
        width: 55px;
        height: 39px
    }

    .large-icon.white-hat {
        background-position: -1193px -23px;
        width: 47px;
        height: 28px
    }

    .large-icon.white-envelope {
        background-position: -1255px -24px;
        width: 34px;
        height: 24px
    }

    .large-icon.white-tick {
        background-position: -1304px -24px;
        width: 34px;
        height: 23px
    }

    .large-icon.green-unlock {
        background-position: -15px -84px;
        width: 36px;
        height: 42px;
        margin: auto
    }

    .large-icon.interests-green {
        background-position: -80px -84px;
        width: 49px;
        height: 41px
    }

    .large-icon.personality-green {
        background-position: -149px -85px;
        width: 37px;
        height: 40px
    }

    .large-icon.motivators-green {
        background-position: -208px -83px;
        width: 44px;
        height: 44px
    }

    .large-icon.abstract-green {
        background-position: -274px -86px;
        width: 39px;
        height: 38px
    }

    .large-icon.numerical-green {
        background-position: -335px -89px;
        width: 43px;
        height: 34px
    }

    .large-icon.verbal-green {
        background-position: -396px -86px;
        width: 55px;
        height: 39px
    }

    .large-icon.white-magnifying-glass {
        background-position: -471px -86px;
        width: 39px;
        height: 39px
    }

    .large-icon.climber {
        background-position: -529px -91px;
        width: 23px;
        height: 27px
    }

    .large-icon.hands-deal {
        background-position: -577px -93px;
        width: 31px;
        height: 23px
    }

    .large-icon.green-hat {
        background-position: -626px -90px;
        width: 45px;
        height: 26px
    }

    .large-icon.green-books {
        background-position: -686px -89px;
        width: 26px;
        height: 27px
    }

    .large-icon.green-small-lamp {
        background-position: -728px -87px;
        width: 25px;
        height: 28px
    }

    .large-icon.ssl-secured {
        background-position: -776px -84px;
        width: 163px;
        height: 34px
    }

    .large-icon.student-discount {
        background-position: -96px -149px;
        width: 90px;
        height: 80px;
        -webkit-transition: all .3s ease;
        transition: all .3s ease
    }

    .large-icon.student-discount:hover {
        cursor: pointer;
        opacity: .9
    }

    .large-icon.trustpilot {
        background-position: -19px -554px;
        width: 117px;
        height: 60px;
        -webkit-transition: all .3s ease;
        transition: all .3s ease
    }

    @media screen and (max-width: 699px) {
        .large-icon.trustpilot {
            background-position: -206px -169px;
            width: 92px;
            height: 46px
        }
    }

    .large-icon.trustpilot:hover {
        cursor: pointer;
        opacity: .9
    }

    .large-icon.guarentee-icon {
        background-position: -285px -741px;
        width: 81px;
        height: 81px;
        opacity: .5
    }

    .large-icon.payment-failed {
        background-position: -1056px -76px;
        width: 60px;
        height: 60px;
        margin: 0 auto 20px
    }

    .large-icon.payment-successful {
        background-position: -968px -76px;
        width: 60px;
        height: 60px;
        margin: 0 auto 20px
    }

    .large-icon.green-lampb {
        background-position: -1145px -83px;
        width: 41px;
        height: 46px
    }

    .large-icon.green-science-small {
        background-position: -1207px -92px;
        width: 33px;
        height: 32px
    }

    .large-icon.green-science-small {
        background-position: -1207px -92px;
        width: 33px;
        height: 32px
    }

    .large-icon.white-tick-icons {
        background-position: -326px -170px;
        width: 73px;
        height: 46px
    }

    .large-icon.white-luggage {
        background-position: -425px -166px;
        width: 77px;
        height: 54px
    }

    .large-icon.white-star-box {
        background-position: -530px -166px;
        width: 51px;
        height: 54px
    }

    .large-icon.black-trustpilot {
        background-position: -607px -181px;
        width: 100px;
        height: 25px;
        -webkit-transition: all .3s ease;
        transition: all .3s ease
    }

    .large-icon.black-trustpilot:hover {
        cursor: pointer;
        opacity: .8
    }

    .large-icon.black-trustpilot-stars {
        background-position: -1206px -410px;
        width: 116px;
        height: 60px
    }

    .large-icon.interests-white {
        background-position: -735px -167px;
        width: 64px;
        height: 53px
    }

    .large-icon.personality-white {
        background-position: -828px -167px;
        width: 50px;
        height: 53px
    }

    .large-icon.motivators-white {
        background-position: -908px -167px;
        width: 55px;
        height: 53px
    }

    .large-icon.abstract-white {
        background-position: -992px -167px;
        width: 53px;
        height: 53px
    }

    .large-icon.numerical-white {
        background-position: -1074px -167px;
        width: 66px;
        height: 53px
    }

    .large-icon.verbal-white {
        background-position: -1169px -166px;
        width: 78px;
        height: 55px
    }

    .large-icon.pdf-icon {
        background-position: -1283px -162px;
        width: 59px;
        height: 67px
    }

    .large-icon.unlock-tests {
        background-position: -18px -255px;
        width: 63px;
        height: 75px
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.unlock-tests {
            background-position: -17px -729px;
            width: 37px;
            height: 44px
        }
    }

    .large-icon.interests-big-white {
        background-position: -119px -256px;
        width: 86px;
        height: 72px;
        margin: auto
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.interests-big-white {
            background-position: -15px -18px;
            width: 44px;
            height: 37px
        }
    }

    .large-icon.personality-big-white {
        background-position: -229px -256px;
        width: 67px;
        height: 72px;
        margin: auto
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.personality-big-white {
            background-position: -85px -18px;
            width: 34px;
            height: 37px
        }
    }

    .large-icon.motivators-big-white {
        background-position: -324px -259px;
        width: 68px;
        height: 68px;
        margin: auto
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.motivators-big-white {
            background-position: -149px -19px;
            width: 35px;
            height: 36px
        }
    }

    .large-icon.abstract-big-white {
        background-position: -419px -262px;
        width: 62px;
        height: 60px;
        margin: auto
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.abstract-big-white {
            background-position: -210px -20px;
            width: 38px;
            height: 36px
        }
    }

    .large-icon.numerical-big-white {
        background-position: -507px -262px;
        width: 79px;
        height: 63px;
        margin: auto
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.numerical-big-white {
            background-position: -270px -22px;
            width: 45px;
            height: 36px
        }
    }

    .large-icon.verbal-big-white {
        background-position: -614px -256px;
        width: 105px;
        height: 74px;
        margin: auto
    }

    @media screen and (max-width: 64.06125em) {
        .large-icon.verbal-big-white {
            background-position: -328px -21px;
            width: 52px;
            height: 38px
        }
    }

    .large-icon.email-sent {
        background-position: -758px -259px;
        width: 67px;
        height: 69px;
        margin: 0 auto 20px
    }

    .large-icon.blue-warning-icon {
        background-position: -853px -265px;
        width: 66px;
        height: 58px
    }

    .large-icon.rounded-warning {
        background-position: -1235px -673px;
        width: 76px;
        height: 68px
    }

    .large-icon.blue-clap-icon {
        background-position: -952px -256px;
        width: 77px;
        height: 80px
    }

    .large-icon.not-verified {
        background-position: -1253px -269px;
        width: 90px;
        height: 64px;
        margin-right: auto;
        margin-left: auto
    }

    .large-icon.blue-person-icon {
        background-position: -1170px -265px;
        width: 66px;
        height: 68px
    }

    .large-icon.student-discount-big {
        background-position: -18px -356px;
        width: 178px;
        height: 158px;
        margin-right: 40px;
        -webkit-transform-origin: 50% 0;
        -ms-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-animation: fadeIn 4s ease-in both running, swinging 4.5s ease-in-out forwards infinite;
        animation: fadeIn 4s ease-in both running, swinging 4.5s ease-in-out forwards infinite
    }

    @-webkit-keyframes swinging {
        0% {
            -webkit-transform: rotate(10deg)
        }

        50% {
            -webkit-transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(10deg)
        }
    }

    @keyframes swinging {
        0% {
            -webkit-transform: rotate(10deg);
            transform: rotate(10deg)
        }

        50% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(10deg);
            transform: rotate(10deg)
        }
    }

    .large-icon.student-discount-blue {
        background-position: -229px -356px;
        width: 171px;
        height: 152px;
        margin-right: 40px
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.student-discount-blue {
            margin: 0 auto 30px
        }
    }

    .large-icon.guarantee-large {
        background-position: -432px -383px;
        width: 111px;
        height: 111px
    }

    .large-icon.guarantee-blue-large {
        background-position: -575px -383px;
        width: 111px;
        height: 111px
    }

    .large-icon.paid-access-required {
        background-position: -707px -386px;
        width: 155px;
        height: 108px
    }

    .large-icon.pay-monthly-icon {
        background-position: -893px -390px;
        width: 87px;
        height: 95px
    }

    .large-icon.guarantee-40 {
        background-position: -172px -535px;
        width: 101px;
        height: 101px;
        margin-bottom: 25px
    }

    .large-icon.assistance {
        background-position: -304px -530px;
        width: 108px;
        height: 108px;
        margin-bottom: 25px
    }

    .large-icon.instant-access {
        background-position: -441px -535px;
        width: 109px;
        height: 98px;
        margin-bottom: 25px
    }

    .large-icon.how-works-one {
        background-position: -586px -567px;
        width: 73px;
        height: 45px;
        margin-top: 20px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .large-icon.how-works-one {
            margin: 70px 0 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.how-works-one {
            margin: 50px 0 30px
        }
    }

    .large-icon.how-works-two {
        background-position: -688px -552px;
        width: 72px;
        height: 75px;
        margin-top: 20px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .large-icon.how-works-two {
            margin: 70px 0 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.how-works-two {
            margin: 50px 0 30px
        }
    }

    .large-icon.how-works-three {
        background-position: -787px -562px;
        width: 76px;
        height: 55px;
        margin-top: 20px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .large-icon.how-works-three {
            margin: 70px 0 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.how-works-three {
            margin: 50px 0 30px
        }
    }

    .large-icon.how-works-four {
        background-position: -892px -558px;
        width: 68px;
        height: 63px;
        margin-top: 20px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .large-icon.how-works-four {
            margin: 70px 0 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.how-works-four {
            margin: 50px 0 30px
        }
    }

    .large-icon.how-works-fifth {
        background-position: -1001px -563px;
        width: 51px;
        height: 53px;
        margin-top: 20px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .large-icon.how-works-fifth {
            margin: 70px 0 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.how-works-fifth {
            margin: 50px 0 30px
        }
    }

    .large-icon.journey {
        background-position: -1086px -563px;
        width: 67px;
        height: 58px
    }

    @media screen and (max-width: 39.99875em) {
        .large-icon.journey {
            margin: 0 auto
        }
    }

    .large-icon.unrivaled-testing {
        background-position: -1183px -563px;
        width: 49px;
        height: 59px
    }

    .large-icon.green-lamp-large {
        background-position: -1259px -549px;
        width: 75px;
        height: 83px
    }

    .large-icon.interests-blue {
        background-position: -18px -670px;
        width: 45px;
        height: 38px
    }

    .large-icon.personality-blue {
        background-position: -80px -671px;
        width: 35px;
        height: 38px
    }

    .large-icon.motivators-blue {
        background-position: -133px -672px;
        width: 37px;
        height: 37px
    }

    .large-icon.abstract-blue {
        background-position: -188px -677px;
        width: 33px;
        height: 31px
    }

    .large-icon.numerical-blue {
        background-position: -239px -675px;
        width: 40px;
        height: 32px
    }

    .large-icon.verbal-blue {
        background-position: -298px -675px;
        width: 48px;
        height: 35px
    }

    .large-icon.interests-blue-large {
        background-position: -376px -666px;
        width: 83px;
        height: 69px;
        margin: 0 auto 10px
    }

    .large-icon.personality-blue-large {
        background-position: -492px -668px;
        width: 65px;
        height: 69px;
        margin: 0 auto 10px
    }

    .large-icon.motivators-blue-large {
        background-position: -592px -669px;
        width: 68px;
        height: 68px;
        margin: 0 auto 10px
    }

    .large-icon.abstract-blue-large {
        background-position: -696px -679px;
        width: 58px;
        height: 56px;
        margin: 0 auto 10px
    }

    .large-icon.numerical-blue-large {
        background-position: -790px -675px;
        width: 75px;
        height: 59px;
        margin: 0 auto 10px
    }

    .large-icon.verbal-blue-large {
        background-position: -901px -675px;
        width: 89px;
        height: 62px;
        margin: 0 auto 10px
    }

    .large-icon.completed-test {
        background-position: -1312px -103px;
        width: 27px;
        height: 20px;
        margin: 0 auto
    }

    .large-icon.share-career {
        background-position: -1114px -671px;
        width: 91px;
        height: 68px;
        margin-right: auto;
        margin-left: auto
    }

    .large-icon.unanswered-questions {
        background-position: -1025px -385px;
        width: 156px;
        height: 107px
    }

    .small-icons {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg)
    }

    .small-icons.white-down-arrow {
        background-position: -19px -19px;
        width: 13px;
        height: 8px
    }

    .small-icons.white-down-arrow.right {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .small-icons.grey-right-arrow {
        background-position: -49px -17px;
        width: 7px;
        height: 11px
    }

    .small-icons.grey-down-arrow {
        background-position: -73px -19px;
        width: 11px;
        height: 7px
    }

    .small-icons.grey-right-arrow-small {
        background-position: -101px -18px;
        width: 6px;
        height: 9px
    }

    .small-icons.back-arrow-white-xs {
        background-position: -124px -17px;
        width: 14px;
        height: 11px;
        margin-right: 8px
    }

    .small-icons.next-arrow-white-xs {
        background-position: -157px -17px;
        width: 14px;
        height: 11px;
        position: relative;
        top: 1px;
        margin-left: 8px
    }

    .small-icons.back-arrow-blue-s {
        background-position: -314px -206px;
        width: 17px;
        height: 13px
    }

    .small-icons.back-arrow-blue {
        background-position: -184px -17px;
        width: 20px;
        height: 11px;
        position: relative;
        top: 2px
    }

    .small-icons.next-arrow-blue {
        background-position: -314px -206px;
        width: 17px;
        height: 13px;
        margin-left: 7px;
        position: relative;
        top: 2px
    }

    .small-icons.next-arrow-white-s {
        background-position: -258px -16px;
        width: 17px;
        height: 13px;
        margin-left: 7px;
        position: relative;
        top: 2px
    }

    .small-icons.next-arrow-green-s {
        background-position: -293px -17px;
        width: 14px;
        height: 11px;
        position: relative;
        top: 2px
    }

    .small-icons.next-arrow-white-l {
        background-position: -323px -15px;
        width: 20px;
        height: 15px;
        margin-left: 8px;
        position: relative;
        top: 2px
    }

    .small-icons.next-arrow-white-xl {
        background-position: -404px -11px;
        width: 29px;
        height: 23px
    }

    .small-icons.back-arrow-white-xl {
        background-position: -357px -11px;
        width: 29px;
        height: 23px
    }

    .small-icons.next-arrow-white-m {
        background-position: -474px -17px;
        width: 20px;
        height: 11px;
        margin-left: 8px
    }

    .small-icons.next-arrow-green-xs {
        background-position: -448px -18px;
        width: 11px;
        height: 9px;
        display: inline-block;
        margin: 0 0 -1px 5px
    }

    .small-icons.login {
        background-position: -20px -47px;
        width: 17px;
        height: 19px;
        display: inline-block
    }

    .small-icons.logout {
        background-position: -56px -47px;
        width: 18px;
        height: 19px;
        display: inline-block
    }

    .small-icons.green-bullet-point-xs {
        background-position: -93px -50px;
        width: 13px;
        height: 13px
    }

    .small-icons.green-bullet-point-s {
        background-position: -125px -49px;
        width: 15px;
        height: 15px
    }

    .small-icons.green-bullet-point-m {
        background-position: -194px -48px;
        width: 15px;
        height: 17px
    }

    .small-icons.white-bullet-point-m {
        background-position: -159px -48px;
        width: 15px;
        height: 17px
    }

    .small-icons.checkout-card {
        background-position: -228px -46px;
        width: 20px;
        height: 20px;
        margin-left: 8px
    }

    .small-icons.questions {
        background-position: -266px -48px;
        width: 18px;
        height: 19px;
        margin-right: 8px
    }

    .small-icons.timed {
        background-position: -302px -48px;
        width: 18px;
        height: 18px;
        margin-right: 8px
    }

    .small-icons.clock-stop-green {
        background-position: -336px -48px;
        width: 17px;
        height: 18px;
        margin-right: 8px
    }

    .small-icons.stopwatch {
        background-position: -367px -48px;
        width: 16px;
        height: 19px
    }

    .small-icons.magnify-right {
        background-position: -397px -49px;
        width: 16px;
        height: 16px;
        margin: 2px 0 0 5px
    }

    .small-icons.green-tick {
        background-position: -427px -55px;
        width: 13px;
        height: 10px
    }

    .small-icons.blue-envelope {
        background-position: -455px -50px;
        width: 20px;
        height: 15px
    }

    .small-icons.green-small-lock-s {
        background-position: -489px -47px;
        width: 16px;
        height: 18px;
        margin-left: 8px
    }

    .small-icons.white-small-lock-s {
        background-position: -486px -83px;
        width: 16px;
        height: 18px;
        margin-left: 8px
    }

    .small-icons.white-small-lock-m {
        background-position: -486px -83px;
        width: 16px;
        height: 18px;
        margin-right: 8px
    }

    .small-icons.green-small-lock-m {
        background-position: -19px -84px;
        width: 17px;
        height: 20px
    }

    .small-icons.retake {
        background-position: -58px -84px;
        width: 16px;
        height: 19px
    }

    .small-icons.blue-share {
        background-position: -90px -82px;
        width: 19px;
        height: 23px
    }

    .small-icons.download {
        background-position: -123px -85px;
        width: 19px;
        height: 18px;
        margin-left: 5px
    }

    .small-icons.locked {
        background-position: -159px -84px;
        width: 16px;
        height: 19px
    }

    .small-icons.drag-drop-icon {
        background-position: -193px -87px;
        width: 15px;
        height: 14px;
        display: inline-block;
        cursor: pointer
    }

    @media screen and (min-width: 40em) {
        .small-icons.drag-drop-icon {
            margin: 2px 10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-icons.drag-drop-icon {
            position: relative;
            top: 2px;
            right: 5px
        }
    }

    .small-icons.facebook {
        background-position: -227px -87px;
        width: 8px;
        height: 14px
    }

    .small-icons.google-plus {
        background-position: -253px -87px;
        width: 14px;
        height: 14px
    }

    .small-icons.linkedin {
        background-position: -282px -88px;
        width: 13px;
        height: 12px
    }

    .small-icons.magnify-left-s {
        background-position: -305px -87px;
        width: 15px;
        height: 14px
    }

    .small-icons.print {
        background-position: -336px -84px;
        width: 19px;
        height: 20px
    }

    .small-icons.location-icon {
        background-position: -368px -85px;
        width: 14px;
        height: 18px
    }

    .small-icons.magnify-left-m {
        background-position: -396px -85px;
        width: 17px;
        height: 18px
    }

    .small-icons.share-white {
        background-position: -423px -82px;
        width: 19px;
        height: 23px
    }

    .small-icons.world {
        background-position: -456px -85px;
        width: 18px;
        height: 18px
    }

    .small-icons.blue-small-letter {
        background-position: -20px -124px;
        width: 18px;
        height: 13px
    }

    .small-icons.blue-facebook {
        background-position: -57px -123px;
        width: 9px;
        height: 15px
    }

    .small-icons.blue-twitter {
        background-position: -85px -123px;
        width: 18px;
        height: 15px
    }

    .small-icons.blue-linkedin {
        background-position: -123px -124px;
        width: 14px;
        height: 14px
    }

    .small-icons.blue-letter {
        background-position: -156px -124px;
        width: 21px;
        height: 15px
    }

    .small-icons.blue-star {
        background-position: -195px -121px;
        width: 21px;
        height: 21px
    }

    .small-icons.blue-printer {
        background-position: -235px -119px;
        width: 24px;
        height: 25px
    }

    .small-icons.visa-card {
        background-position: -277px -117px;
        width: 37px;
        height: 26px;
        display: inline-block;
        margin-right: 5px
    }

    @media screen and (max-width: 680px) {
        .small-icons.visa-card {
            position: absolute;
            top: -43px;
            right: 120px
        }
    }

    .small-icons.master-card {
        background-position: -332px -117px;
        width: 37px;
        height: 26px;
        display: inline-block;
        margin-right: 5px
    }

    @media screen and (max-width: 680px) {
        .small-icons.master-card {
            position: absolute;
            top: -43px;
            right: 80px
        }
    }

    .small-icons.am-express-card {
        background-position: -252px -274px;
        width: 37px;
        height: 25px;
        display: inline-block;
        margin-right: 5px
    }

    @media screen and (max-width: 680px) {
        .small-icons.am-express-card {
            position: absolute;
            top: -43px;
            right: 40px
        }
    }

    .small-icons.union-card {
        background-position: -343px -274px;
        width: 40px;
        height: 25px;
        display: inline-block
    }

    @media screen and (max-width: 680px) {
        .small-icons.union-card {
            position: absolute;
            top: -43px;
            right: 0
        }
    }

    .small-icons.white-lock-icon {
        background-position: -386px -121px;
        width: 16px;
        height: 19px
    }

    .small-icons.orange-tick {
        background-position: -417px -127px;
        width: 17px;
        height: 12px;
        margin-left: 4px
    }

    .small-icons.green-person {
        background-position: -447px -122px;
        width: 15px;
        height: 18px
    }

    .small-icons.green-letter {
        background-position: -431px -205px;
        width: 19px;
        height: 13px
    }

    .small-icons.red-close {
        background-position: -475px -122px;
        width: 19px;
        height: 19px
    }

    .small-icons.credit-card {
        background-position: -19px -163px;
        width: 60px;
        height: 16px
    }

    @media screen and (max-width: 39.99875em) {
        .small-icons.credit-card {
            width: 22px;
            height: 16px
        }
    }

    .small-icons.applePay {
        background-position: -101px -162px;
        width: 45px;
        height: 19px;
        display: inline-block
    }

    @media screen and (max-width: 39.99875em) {
        .small-icons.applePay {
            width: 13px;
            height: 16px
        }
    }

    .small-icons.payPal {
        background-position: -163px -163px;
        width: 71px;
        height: 18px
    }

    @media screen and (max-width: 39.99875em) {
        .small-icons.payPal {
            width: 15px;
            height: 18px
        }
    }

    .small-icons.payPal-button {
        background-position: -18px -278px;
        width: 137px;
        height: 18px
    }

    .small-icons.googlePay {
        background-position: -251px -163px;
        width: 49px;
        height: 17px
    }

    .small-icons.grey-letter {
        background-position: -319px -162px;
        width: 28px;
        height: 19px
    }

    .small-icons.orange-right-arrow {
        background-position: -364px -165px;
        width: 17px;
        height: 13px
    }

    .small-icons.white-stopwatch {
        background-position: -397px -162px;
        width: 18px;
        height: 18px
    }

    .small-icons.white-chat-icon {
        background-position: -431px -162px;
        width: 18px;
        height: 19px
    }

    .small-icons.red-stopwatch {
        background-position: -465px -163px;
        width: 17px;
        height: 18px
    }

    .small-icons.verified-visa {
        background-position: -20px -204px;
        width: 52px;
        height: 23px
    }

    .small-icons.secure-mastercard {
        background-position: -92px -205px;
        width: 63px;
        height: 20px
    }

    .small-icons.pci {
        background-position: -175px -201px;
        width: 92px;
        height: 28px
    }

    .small-icons.payment-icon-cards {
        background-position: -70px -243px;
        width: 108px;
        height: 21px
    }

    .small-icons.blue-chat-icon {
        background-position: -282px -204px;
        width: 18px;
        height: 19px
    }

    .small-icons.applePay-card {
        background-position: -170px -274px;
        width: 32px;
        height: 21px;
        display: inline-block;
        margin-left: 10px
    }

    .small-icons.am-ex-card {
        background-position: -211px -274px;
        width: 31px;
        height: 21px;
        display: inline-block;
        margin-left: 10px
    }

    .small-icons.union-pay-card {
        background-position: -300px -274px;
        width: 35px;
        height: 21px;
        display: inline-block;
        margin-left: 10px
    }

    .small-icons.payment-icons {
        background-position: -20px -201px;
        width: 247px;
        height: 28px
    }

    @media screen and (max-width: 64.06125em) {
        .small-icons.payment-icons {
            margin: auto
        }
    }

    .small-icons.grey-tooltip-icon {
        background-position: -502px -14px;
        width: 16px;
        height: 16px;
        margin: 2px 5px 0 0;
        display: inline-block
    }

    @media screen and (max-width: 39.99875em) {
        .small-icons.grey-tooltip-icon {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 16px;
            -ms-flex: 0 0 16px;
            flex: 0 0 16px;
            margin: 2px 0 0 16px
        }
    }

    .small-icons.grey-tooltip-icon:focus {
        outline: none;
        border: none
    }

    .small-icons.blue-off-tooltip {
        background-position: -504px -123px;
        width: 16px;
        height: 16px;
        margin: 0 7px 0 0;
        display: inline-block
    }

    .small-icons.blue-off-tooltip:focus {
        outline: none;
        border: none
    }

    .small-icons.grey-off-tooltip {
        background-position: -454px -245px;
        width: 16px;
        height: 16px;
        margin: 0 7px 0 0;
        display: inline-block
    }

    .small-icons.grey-off-tooltip:focus {
        outline: none;
        border: none
    }

    .small-icons.grey-white-tooltip {
        background-position: -465px -202px;
        width: 18px;
        height: 19px;
        display: inline-block
    }

    .small-icons.grey-white-tooltip:focus {
        outline: none;
        border: none
    }

    .small-icons.big-white-tooltip {
        background-position: -495px -202px;
        width: 18px;
        height: 19px;
        display: inline-block
    }

    .small-icons.big-white-tooltip:focus {
        outline: none;
        border: none
    }

    .small-icons.clock-red {
        background-position: -465px -163px;
        width: 17px;
        height: 18px
    }

    .small-icons.clock-stop {
        background-position: -496px -162px;
        width: 16px;
        height: 19px
    }

    .small-icons.blue-tooltip {
        background-position: -17px -244px;
        width: 17px;
        height: 17px
    }

    .small-icons.close-blue {
        background-position: -510px -88px;
        width: 11px;
        height: 11px
    }

    .small-icons.white-tooltip-icon {
        background-position: -46px -245px;
        width: 15px;
        height: 15px;
        margin: 2px 4px 0 0
    }

    .small-icons.white-tooltip-icon:focus {
        outline: none;
        border: none
    }

    .small-icons.benefit-green-point {
        background-position: -194px -48px;
        width: 15px;
        height: 17px;
        margin-right: 5px
    }

    @media screen and (max-width: 39.99875em) {
        .small-icons.benefit-green-point {
            background-position: -93px -50px;
            width: 13px;
            height: 13px;
            margin-right: 5px;
            display: inline-block
        }
    }

    .small-icons.apply-icon {
        background-position: -267px -243px;
        width: 21px;
        height: 21px
    }

    .small-icons.full-star {
        background-position: -299px -244px;
        width: 16px;
        height: 16px
    }

    .small-icons.empty-star {
        background-position: -326px -244px;
        width: 18px;
        height: 16px
    }

    .small-icons.remove-white-icon {
        background-position: -351px -250px;
        width: 8px;
        height: 8px
    }

    .small-icons.remove-blue-icon {
        background-position: -365px -250px;
        width: 8px;
        height: 8px
    }

    .small-icon {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg)
    }

    .small-icon.reset {
        background-position: -219px -8px;
        width: 17px;
        height: 19px
    }

    .small-icon.reset-white {
        background-position: -219px -32px;
        width: 17px;
        height: 19px;
        -webkit-animation: none;
        animation: none
    }

    .small-icon.reset-white:hover {
        cursor: pointer;
        background-position: -219px -8px
    }

    .small-icon.white-right-arrow {
        background-position: -299px -36px;
        width: 14px;
        height: 11px
    }

    .small-icon.white-left-arrow {
        background-position: -299px -36px;
        width: 14px;
        height: 11px;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .small-icon.blue-left-arrow {
        background-position: -271px -57px;
        width: 14px;
        height: 11px
    }

    .small-icon.blue-right-arrow {
        background-position: -271px -57px;
        width: 14px;
        height: 11px;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .small-icon.close-icon {
        background-position: -316px -36px;
        width: 12px;
        height: 11px
    }

    .small-icon.chevron-down {
        background-position: -423px -33px;
        width: 12px;
        height: 7px;
        margin: 0 auto
    }

    .small-icon.chevron-down.rotated {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .small-icon.chevron-down.with-opacity {
        opacity: .2
    }

    .small-icon.chevron-left {
        background-position: -423px -33px;
        width: 12px;
        height: 7px;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .small-icon.chevron-left-blue {
        background-position: -423px -52px;
        width: 12px;
        height: 8px;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .small-icon.green-chevron-down {
        background-position: -424px -15px;
        width: 10px;
        height: 7px;
        display: inline-block;
        margin: 0 0 0 10px
    }

    .small-icon.green-chevron-down.rotated {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .small-icon.right-arrow {
        background-position: -299px -12px;
        width: 14px;
        height: 11px
    }

    .small-icon.left-arrow {
        background-position: -299px -75px;
        width: 14px;
        height: 11px
    }

    .small-icon.plus-icon {
        background-position: -441px -30px;
        width: 10px;
        height: 11px
    }

    .small-icon.plus-icon-green {
        background-position: -441px -12px;
        width: 10px;
        height: 11px
    }

    .small-icon.plus-icon--white {
        background-position: -354px -63px;
        width: 14px;
        height: 14px
    }

    .small-icon.plus-icon--grey {
        background-position: -353px -88px;
        width: 15px;
        height: 15px
    }

    .small-icon.green-tooltip-icon {
        background-position: -459px -9px;
        width: 16px;
        min-width: 16px;
        height: 16px
    }

    .small-icon.green-tooltip-icon:focus {
        outline: none;
        border: none
    }

    .small-icon.white-tooltip-icon {
        background-position: -482px -33px;
        width: 16px;
        height: 16px
    }

    .small-icon.white-tooltip-icon:focus {
        outline: none;
        border: none
    }

    .small-icon.tooltip-icon {
        background-position: -459px -35px;
        width: 15px;
        height: 16px
    }

    .small-icon.tooltip-icon:focus {
        outline: none;
        border: none
    }

    .small-icon.red-tooltip-icon {
        background-position: -479px -10px;
        width: 15px;
        height: 16px
    }

    .small-icon.red-tooltip-icon:focus {
        outline: none;
        border: none
    }

    .small-icon.green-icon-2 {
        background-position: -8px -115px;
        width: 64px;
        height: 54px
    }

    .small-icon.green-icon-5 {
        background-position: -225px -191px;
        width: 53px;
        height: 42px
    }

    .small-icon.green-icon-6 {
        background-position: -91px -185px;
        width: 62px;
        height: 54px
    }

    .small-icon.green-icon-7 {
        background-position: -169px -185px;
        width: 41px;
        height: 55px
    }

    .small-icon.green-icon-8 {
        background-position: -156px -115px;
        width: 51px;
        height: 53px
    }

    .small-icon.green-icon-9 {
        background-position: -212px -323px;
        width: 49px;
        height: 50px
    }

    .small-icon.green-icon-10 {
        background-position: -150px -324px;
        width: 48px;
        height: 45px
    }

    .small-icon.green-icon-11 {
        background-position: -76px -329px;
        width: 56px;
        height: 36px
    }

    .small-icon.green-icon-12 {
        background-position: -10px -325px;
        width: 48px;
        height: 39px
    }

    .small-icon.green-icon-13 {
        background-position: -7px -258px;
        width: 45px;
        height: 54px
    }

    .small-icon.info-white,
    .small-icon.lock-white {
        opacity: .5;
        -webkit-animation: none;
        animation: none
    }

    .small-icon.info-white:hover,
    .small-icon.lock-white:hover {
        cursor: pointer;
        opacity: 1
    }

    .small-icon.info-white {
        background-position: -541px -37px;
        width: 18px;
        height: 18px
    }

    .small-icon.white-tooltip {
        background-position: -541px -37px;
        width: 18px;
        height: 18px
    }

    .small-icon.white-tooltip:hover {
        background-position: -541px -8px
    }

    .small-icon.lock-white {
        background-position: -137px -33px;
        width: 16px;
        height: 18px
    }

    .small-icon.lock-white:hover {
        background-position: -118px -9px
    }

    .small-icon.lock-red {
        background-position: -232px -60px;
        width: 16px;
        height: 18px
    }

    .small-icon.lock-red:hover {
        background-position: -211px -60px
    }

    .small-icon.lock-green {
        background-position: -137px -9px;
        width: 16px;
        height: 18px
    }

    .small-icon.lock-bold-green {
        background-position: -379px -387px;
        width: 18px;
        height: 21px
    }

    .small-icon.benefit-1 {
        background-position: -297px -389px;
        width: 56px;
        height: 49px
    }

    .small-icon.benefit-2 {
        background-position: -202px -391px;
        width: 62px;
        height: 48px
    }

    .small-icon.benefit-3 {
        background-position: -103px -393px;
        width: 66px;
        height: 47px
    }

    .small-icon.benefit-4 {
        background-position: -10px -390px;
        width: 68px;
        height: 49px
    }

    .small-icon.clock-go {
        background-position: -199px -32px;
        width: 17px;
        height: 19px;
        display: inline-block
    }

    .small-icon.minus-icon {
        background-position: -565px -16px;
        width: 11px;
        height: 2px
    }

    .small-icon.minus-icon--black {
        background-position: -377px -69px;
        width: 15px;
        height: 2px
    }

    .small-icon.minus-icon--red {
        background-position: -565px -32px;
        width: 10px;
        height: 3px
    }

    .small-icon.minus-icon--grey {
        background-position: -377px -94px;
        width: 15px;
        height: 3px
    }

    .small-icon.equal-icon {
        background-position: -400px -67px;
        width: 15px;
        height: 6px
    }

    .small-icon.scroll-down-icon {
        background-position: -334px -57px;
        width: 11px;
        height: 14px;
        opacity: .5;
        margin: 0 auto
    }

    .small-icon.scroll-down-icon.rotated {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .small-icon.envelope {
        background-position: -398px -11px;
        width: 18px;
        height: 13px
    }

    .small-icon.envelope-white {
        background-position: -398px -30px;
        width: 18px;
        height: 13px
    }

    .small-icon.checked {
        background-position: -256px -9px;
        width: 18px;
        height: 18px
    }

    .small-icon.download {
        background-position: -331px -33px;
        width: 17px;
        height: 18px
    }

    .small-icon.download.disabled {
        opacity: .1 !important;
        background-position: -331px -33px;
        cursor: default
    }

    .small-icon.download-green {
        background-position: -228px -88px;
        width: 18px;
        height: 18px
    }

    .small-icon.google-icon {
        background-position: -9px -66px;
        width: 14px;
        height: 13px
    }

    .small-icon.facebook-icon {
        background-position: -32px -65px;
        width: 8px;
        height: 15px
    }

    .small-icon.pay-icon {
        background-position: -52px -64px;
        width: 16px;
        height: 15px
    }

    .small-icon.play-icon {
        background-position: -48px -36px;
        width: 10px;
        height: 11px
    }

    .small-icon.green-star {
        background-position: -505px -6px;
        width: 26px;
        height: 25px
    }

    .small-icon.star {
        background-position: -505px -35px;
        width: 26px;
        height: 26px
    }

    .small-icon.trustpilot {
        background-position: -388px -114px;
        width: 100px;
        height: 26px;
        margin-left: 20px;
        position: relative;
        top: 5px
    }

    @media screen and (max-width: 374px) {
        .small-icon.trustpilot {
            margin: 0
        }
    }

    .small-icon.trustpilot-blue {
        background-position: -427px -144px;
        width: 100px;
        height: 25px;
        position: relative;
        top: -4px
    }

    .small-icon.paypal-icon {
        background-position: -392px -149px;
        width: 15px;
        height: 18px
    }

    .small-icon.paypal-white {
        background-position: -514px -71px;
        width: 76px;
        height: 21px
    }

    .small-icon.green-cross {
        background-position: -441px -12px;
        width: 10px;
        height: 10px
    }

    .small-icon.white-x {
        background-position: -317px -36px;
        width: 11px;
        height: 11px
    }

    .small-icon.white-x:hover {
        cursor: pointer
    }

    .small-icon.payment-methods {
        background-position: -301px -196px;
        width: 124px;
        height: 22px;
        display: inline-block
    }

    .small-icon.payment-cards {
        background-position: -344px -196px;
        width: 79px;
        height: 22px;
        float: right
    }

    .small-icon.magnify {
        background-position: -376px -28px;
        width: 14px;
        height: 15px
    }

    .small-icon.magnify.green-fill {
        background-position: -376px -9px
    }

    .small-icon.link-to {
        background-position: -352px -34px;
        width: 18px;
        height: 16px
    }

    .small-icon.location-icon {
        background-position: -100px -60px;
        width: 15px;
        height: 20px;
        position: absolute;
        top: 10px;
        left: 12px
    }

    .small-icon.location-icon.green-fill {
        background-position: -80px -60px
    }

    .small-icon.facebook-blue {
        background-position: -133px -62px;
        width: 8px;
        height: 14px
    }

    .small-icon.linkedin-blue {
        background-position: -159px -63px;
        width: 12px;
        height: 12px
    }

    .small-icon.twitter-blue {
        background-position: -189px -63px;
        width: 14px;
        height: 12px
    }

    .small-icon.clock-icon {
        background-position: -199px -8px;
        width: 17px;
        height: 19px
    }

    .small-icon.no-results {
        background-position: -313px -260px;
        width: 44px;
        height: 40px
    }

    .small-icon.green-tick-big {
        background-position: -439px -388px;
        width: 30px;
        height: 22px
    }

    .small-icon.tick-icon {
        background-position: -239px -13px;
        width: 13px;
        height: 10px
    }

    .small-icon.tick-icon.correct-example {
        display: inline-block;
        margin-right: 15px
    }

    .small-icon.happy-face {
        background-position: -515px -99px;
        width: 31px;
        height: 32px;
        display: inline-block
    }

    .small-icon.sad-face {
        background-position: -556px -99px;
        width: 31px;
        height: 32px;
        display: inline-block
    }

    .small-icon.red-delete {
        background-position: -317px -76px;
        width: 11px;
        height: 11px;
        margin-right: 15px
    }

    .small-icon.arrow {
        background-position: -424px -66px;
        width: 10px;
        height: 18px;
        display: inline-block;
        margin: 0 10px
    }

    .small-icon.bin {
        background-position-y: -87px;
        height: 23px;
        width: 18px
    }

    .small-icon.bin--white {
        background-position-x: -8px
    }

    .small-icon.bin--green {
        background-position-x: -31px
    }

    .small-icon.envelope-send {
        background-position-y: -88px;
        width: 26px;
        height: 20px
    }

    .small-icon.envelope-send--white {
        background-position-x: -58px
    }

    .small-icon.envelope-send--green {
        background-position-x: -89px
    }

    .small-icon.eye {
        background-position-y: -91px;
        height: 16px;
        width: 30px
    }

    .small-icon.eye--white {
        background-position-x: -123px
    }

    .small-icon.eye--green {
        background-position-x: -158px
    }

    .small-icon.login {
        background-position: -572px -150px;
        width: 18px;
        height: 19px;
        display: inline-block
    }

    .small-icon.logout {
        background-position: -538px -150px;
        width: 19px;
        height: 19px;
        display: inline-block
    }

    .small-icon.white-tickboxes {
        background-position: -256px -33px;
        width: 18px;
        height: 18px;
        display: inline-block;
        position: relative;
        top: 2px
    }

    .small-icon.arrow-breadcrumbs {
        background-position: -568px -42px;
        width: 5px;
        height: 8px;
        margin: 2px 5px 0
    }

    .play-icon {
        background: url(//cdn3.careerhunter.io/assets/Player-icon-f4fd0fd8ebbea5bc80d8df289cb73593267f9fd7a7296bfc5bb017ca1e47d1fb.svg);
        width: 32px;
        height: 32px;
        margin: 0 10px 0 0;
        display: inline-block
    }

    .green-small-icon {
        background: url(//cdn2.careerhunter.io/assets/sprites/green_small_icons-6929878e7e80b311f76b7c53f1352256008c2d3e3ac33b1b8b9f03f8d3cc36f2.svg)
    }

    .green-small-icon.icon-1 {
        background-position: -19px -20px;
        width: 57px;
        height: 50px
    }

    .green-small-icon.icon-2 {
        background-position: -119px -19px;
        width: 42px;
        height: 51px
    }

    .green-small-icon.icon-3 {
        background-position: -204px -13px;
        width: 62px;
        height: 64px
    }

    .green-small-icon.icon-4 {
        background-position: -299px -25px;
        width: 57px;
        height: 39px
    }

    .green-small-icon.icon-5 {
        background-position: -22px -116px;
        width: 52px;
        height: 42px
    }

    .green-small-icon.icon-6 {
        background-position: -106px -106px;
        width: 68px;
        height: 63px
    }

    .green-small-icon.icon-7 {
        background-position: -209px -113px;
        width: 51px;
        height: 49px
    }

    .green-small-icon.icon-8 {
        background-position: -302px -110px;
        width: 51px;
        height: 54px
    }

    .social-icon {
        background: url(//cdn1.careerhunter.io/assets/sprites/social_icons-62f8776b1557dfb548f5c0cf8b7f55da2b5074d08f2d51d82f90fa71600641ed.svg)
    }

    .social-icon.linkedin {
        background-position: -11px -46px;
        width: 13px;
        height: 13px
    }

    .social-icon.linkedin:hover {
        background-position: -11px -12px
    }

    .social-icon.twitter {
        background-position: -44px -46px;
        width: 16px;
        height: 14px
    }

    .social-icon.twitter:hover {
        background-position: -44px -12px
    }

    .social-icon.web {
        background-position: -79px -45px;
        width: 14px;
        height: 14px
    }

    .social-icon.web:hover {
        background-position: -79px -12px
    }

    .share-icon {
        background: url(//cdn3.careerhunter.io/assets/sprites/social_icons_affiliates-2aa8cd122bb31ba54f8148f22e26caff9d3d9010c65f101b82850fada2f73808.svg)
    }

    .share-icon.email {
        background-position: -10px -10px;
        width: 16px;
        height: 11px
    }

    .share-icon.facebook {
        background-position: -35px -10px;
        width: 8px;
        height: 13px
    }

    .share-icon.twitter {
        background-position: -52px -10px;
        width: 17px;
        height: 13px
    }

    .share-icon.linkedin {
        background-position: -78px -10px;
        width: 14px;
        height: 12px
    }

    .share-icon.email-blue {
        background-position: -10px -32px;
        width: 16px;
        height: 12px
    }

    .share-icon.facebook-blue {
        background-position: -35px -32px;
        width: 8px;
        height: 14px
    }

    .share-icon.twitter-blue {
        background-position: -53px -32px;
        width: 16px;
        height: 14px
    }

    .share-icon.linkedin-blue {
        background-position: -78px -32px;
        width: 14px;
        height: 13px
    }

    .upgrade-icon {
        background: url(//cdn3.careerhunter.io/assets/sprites/upgrade_icons-fdc3b2823d41002783508e0f8aa415b54e01ef01711cf936bdf0d659b10dc58d.svg)
    }

    .upgrade-icon.caret-down {
        background-position: -834px -20px;
        width: 13px;
        height: 8px
    }

    .upgrade-icon.caret-down.right {
        -webkit-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        transform: rotate(270deg)
    }

    .upgrade-icon.caret-down.left {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .upgrade-icon.lock-white {
        background-position: -373px -535px;
        width: 24px;
        height: 28px
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-icon.lock-white {
            background-position: -203px -587px;
            width: 16px;
            height: 18px
        }
    }

    .upgrade-icon.trolley {
        background-position: -200px -622px;
        width: 19px;
        height: 20px;
        margin: 0 0 0 10px
    }

    .upgrade-icon.trolley-big {
        background-position: -465px -539px;
        width: 26px;
        height: 26px;
        margin: 0 0 0 10px
    }

    .upgrade-icon.white-right-arrow {
        background-position: -604px -18px;
        width: 14px;
        height: 11px;
        margin: 0 0 0 5px
    }

    .upgrade-icon.white-right-arrow-small {
        background-position: -570px -17px;
        width: 17px;
        height: 13px;
        margin: 0 0 0 5px
    }

    .upgrade-icon.student-beans-white {
        background-position: -265px -109px;
        width: 175px;
        height: 41px;
        opacity: .5
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-icon.student-beans-white {
            background-position: -205px -467px;
            width: 114px;
            height: 27px
        }
    }

    .upgrade-icon.bullet-point {
        background-position: -255px -56px;
        width: 24px;
        height: 26px
    }

    .upgrade-icon.careers-database {
        background-position: -19px -194px;
        width: 100px;
        height: 93px
    }

    .upgrade-icon.algorithm {
        background-position: -155px -194px;
        width: 87px;
        height: 93px
    }

    .upgrade-icon.experts {
        background-position: -280px -195px;
        width: 68px;
        height: 91px
    }

    .upgrade-icon.career-report {
        background-position: -386px -199px;
        width: 69px;
        height: 83px
    }

    .upgrade-icon.jobs-courses {
        background-position: -18px -330px;
        width: 84px;
        height: 83px
    }

    .upgrade-icon.access {
        background-position: -142px -331px;
        width: 90px;
        height: 81px
    }

    .upgrade-icon.trustpilot-small {
        background-position: -349px -445px;
        width: 90px;
        height: 23px;
        margin-left: 10px;
        position: relative;
        top: 5px
    }

    @media screen and (max-width: 374px) {
        .upgrade-icon.trustpilot-small {
            margin: 0
        }
    }

    .upgrade-icon.trustpilot-white {
        background-position: -119px -102px;
        width: 115px;
        height: 30px;
        display: inline-block;
        position: relative;
        top: 8px
    }

    .upgrade-icon.interests-small-white {
        background-position: -569px -52px;
        width: 45px;
        height: 38px
    }

    .upgrade-icon.personality-small-white {
        background-position: -633px -52px;
        width: 36px;
        height: 38px
    }

    .upgrade-icon.motivators-small-white {
        background-position: -692px -53px;
        width: 37px;
        height: 37px
    }

    .upgrade-icon.abstract-small-white {
        background-position: -754px -56px;
        width: 33px;
        height: 31px
    }

    .upgrade-icon.numerical-small-white {
        background-position: -810px -56px;
        width: 40px;
        height: 32px
    }

    .upgrade-icon.verbal-small-white {
        background-position: -866px -54px;
        width: 49px;
        height: 35px
    }

    .upgrade-icon.domain-icon {
        background-position: -777px -212px;
        width: 19px;
        height: 19px
    }

    .upgrade-icon.discount-sent {
        background-position: -480px -445px;
        width: 67px;
        height: 69px;
        margin-right: auto;
        margin-left: auto
    }

    .upgrade-icon.paypal {
        background-position: -1114px -16px;
        width: 71px;
        height: 18px
    }

    .upgrade-icon.credit-card {
        background-position: -970px -16px;
        width: 60px;
        height: 16px
    }

    .upgrade-icon.email {
        background-position: -387px -61px;
        width: 28px;
        height: 20px;
        margin-right: 5px
    }

    .upgrade-icon.arrow-green-nav {
        background-position: -1191px -116px;
        width: 11px;
        height: 8px;
        margin-left: 5px
    }

    .upgrade-icon.unlock {
        background-position: -236px -619px;
        width: 18px;
        height: 21px;
        margin-left: 5px
    }

    .upgrade-icon.google-icon {
        background-position: -881px -16px;
        width: 14px;
        height: 13px
    }

    .upgrade-icon.fcbk-icon {
        background-position: -861px -16px;
        width: 8px;
        height: 13px
    }

    .upgrade-icon.linkedin-icon {
        background-position: -907px -16px;
        width: 13px;
        height: 13px
    }

    .upgrade-icon.magnify {
        background-position: -779px -18px;
        width: 16px;
        height: 15px
    }

    .slick-slider {
        position: relative;
        display: block;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0
    }

    .slick-list:focus {
        outline: none
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        margin-left: auto;
        margin-right: auto
    }

    .slick-track:before,
    .slick-track:after {
        display: table;
        content: ''
    }

    .slick-track:after {
        clear: both
    }

    .slick-loading .slick-track {
        visibility: hidden
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px
    }

    [dir=rtl] .slick-slide {
        float: right
    }

    .slick-slide img {
        display: block
    }

    .slick-slide.slick-loading img {
        display: none
    }

    .slick-slide.dragging img {
        pointer-events: none
    }

    .slick-initialized .slick-slide {
        display: block
    }

    .slick-loading .slick-slide {
        visibility: hidden
    }

    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent
    }

    .slick-arrow.slick-hidden {
        display: none
    }

    .foundation-mq {
        font-family: "small=0em&medium=40em&large=64.0625em&xlarge=75em&xxlarge=90em"
    }

    :root {
        --swiper-theme-color: #007aff
    }

    .swiper-container {
        margin-left: auto;
        margin-right: auto;
        position: relative;
        overflow: hidden;
        list-style: none;
        padding: 0;
        z-index: 1
    }

    .swiper-container-vertical > .swiper-wrapper {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .swiper-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        z-index: 1;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-transition-property: -webkit-transform;
        transition-property: -webkit-transform;
        transition-property: transform;
        transition-property: transform, -webkit-transform;
        -webkit-box-sizing: content-box;
        box-sizing: content-box
    }

    .swiper-container-android .swiper-slide,
    .swiper-wrapper {
        -webkit-transform: translate3d(0px, 0, 0);
        transform: translate3d(0px, 0, 0)
    }

    .swiper-container-multirow > .swiper-wrapper {
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap
    }

    .swiper-container-multirow-column > .swiper-wrapper {
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .swiper-container-free-mode > .swiper-wrapper {
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
        margin: 0 auto
    }

    .swiper-slide {
        -webkit-flex-shrink: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        width: 100%;
        height: 100%;
        position: relative;
        -webkit-transition-property: -webkit-transform;
        transition-property: -webkit-transform;
        transition-property: transform;
        transition-property: transform, -webkit-transform
    }

    @media screen and (max-width: 39.99875em) {
        .swiper-slide {
            height: auto;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex
        }
    }

    .swiper-slide-invisible-blank {
        visibility: hidden
    }

    .swiper-container-autoheight,
    .swiper-container-autoheight .swiper-slide {
        height: auto
    }

    .swiper-container-autoheight .swiper-wrapper {
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start;
        -webkit-transition-property: height, -webkit-transform;
        transition-property: height, -webkit-transform;
        transition-property: transform, height;
        transition-property: transform, height, -webkit-transform
    }

    .swiper-container-3d {
        -webkit-perspective: 1200px;
        perspective: 1200px
    }

    .swiper-container-3d .swiper-wrapper,
    .swiper-container-3d .swiper-slide,
    .swiper-container-3d .swiper-slide-shadow-left,
    .swiper-container-3d .swiper-slide-shadow-right,
    .swiper-container-3d .swiper-slide-shadow-top,
    .swiper-container-3d .swiper-slide-shadow-bottom,
    .swiper-container-3d .swiper-cube-shadow {
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d
    }

    .swiper-container-3d .swiper-slide-shadow-left,
    .swiper-container-3d .swiper-slide-shadow-right,
    .swiper-container-3d .swiper-slide-shadow-top,
    .swiper-container-3d .swiper-slide-shadow-bottom {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 10
    }

    .swiper-container-3d .swiper-slide-shadow-left {
        background-image: -webkit-gradient(linear, right top, left top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
        background-image: -webkit-linear-gradient(right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
        background-image: linear-gradient(to left, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0))
    }

    .swiper-container-3d .swiper-slide-shadow-right {
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
        background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0))
    }

    .swiper-container-3d .swiper-slide-shadow-top {
        background-image: -webkit-gradient(linear, left bottom, left top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
        background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
        background-image: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0))
    }

    .swiper-container-3d .swiper-slide-shadow-bottom {
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
        background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0))
    }

    .swiper-container-css-mode > .swiper-wrapper {
        overflow: auto;
        scrollbar-width: none;
        -ms-overflow-style: none
    }

    .swiper-container-css-mode > .swiper-wrapper::-webkit-scrollbar {
        display: none
    }

    .swiper-container-css-mode > .swiper-wrapper > .swiper-slide {
        scroll-snap-align: start start
    }

    .swiper-container-horizontal.swiper-container-css-mode > .swiper-wrapper {
        -webkit-scroll-snap-type: x mandatory;
        -ms-scroll-snap-type: x mandatory;
        scroll-snap-type: x mandatory
    }

    .swiper-container-vertical.swiper-container-css-mode > .swiper-wrapper {
        -webkit-scroll-snap-type: y mandatory;
        -ms-scroll-snap-type: y mandatory;
        scroll-snap-type: y mandatory
    }

    :root {
        --swiper-navigation-size: 44px
    }

    .swiper-button-prev,
    .swiper-button-next {
        position: absolute;
        top: 50%;
        width: calc(var(--swiper-navigation-size) / 44 * 27);
        height: var(--swiper-navigation-size);
        margin-top: calc(-1 * var(--swiper-navigation-size) / 2);
        z-index: 10;
        cursor: pointer;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        color: var(--swiper-navigation-color, var(--swiper-theme-color))
    }

    .swiper-button-prev.swiper-button-disabled,
    .swiper-button-next.swiper-button-disabled {
        opacity: .35;
        cursor: auto;
        pointer-events: none
    }

    .swiper-button-prev,
    .swiper-container-rtl .swiper-button-next {
        left: 10px;
        right: auto
    }

    .swiper-button-prev:after,
    .swiper-container-rtl .swiper-button-next:after {
        content: 'prev'
    }

    .swiper-button-next,
    .swiper-container-rtl .swiper-button-prev {
        right: 10px;
        left: auto
    }

    .swiper-button-next:after,
    .swiper-container-rtl .swiper-button-prev:after {
        content: 'next'
    }

    .swiper-button-prev.swiper-button-white,
    .swiper-button-next.swiper-button-white {
        --swiper-navigation-color: #ffffff
    }

    .swiper-button-prev.swiper-button-black,
    .swiper-button-next.swiper-button-black {
        --swiper-navigation-color: #000000
    }

    .swiper-button-lock {
        display: none
    }

    .swiper-pagination {
        position: absolute;
        text-align: center;
        -webkit-transition: 300ms opacity;
        transition: 300ms opacity;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        z-index: 10
    }

    .swiper-pagination.swiper-pagination-hidden {
        opacity: 0
    }

    .swiper-pagination-fraction,
    .swiper-pagination-custom,
    .swiper-container-horizontal > .swiper-pagination-bullets {
        bottom: 65px;
        left: 0;
        width: 100%
    }

    @media screen and (max-width: 64.06125em) {

        .swiper-pagination-fraction,
        .swiper-pagination-custom,
        .swiper-container-horizontal > .swiper-pagination-bullets {
            bottom: 50px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .swiper-pagination-fraction,
        .swiper-pagination-custom,
        .swiper-container-horizontal > .swiper-pagination-bullets {
            bottom: 30px
        }
    }

    .swiper-pagination-bullets-dynamic {
        overflow: hidden;
        font-size: 0
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet {
        -webkit-transform: scale(.33);
        -ms-transform: scale(.33);
        transform: scale(.33);
        position: relative
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev {
        -webkit-transform: scale(.66);
        -ms-transform: scale(.66);
        transform: scale(.66)
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev {
        -webkit-transform: scale(.33);
        -ms-transform: scale(.33);
        transform: scale(.33)
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next {
        -webkit-transform: scale(.66);
        -ms-transform: scale(.66);
        transform: scale(.66)
    }

    .swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next {
        -webkit-transform: scale(.33);
        -ms-transform: scale(.33);
        transform: scale(.33)
    }

    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        display: inline-block;
        border-radius: 100%;
        background: #fff;
        color: #fff;
        opacity: .4
    }

    button.swiper-pagination-bullet {
        border: none;
        margin: 0;
        padding: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none
    }

    .swiper-pagination-clickable .swiper-pagination-bullet {
        cursor: pointer
    }

    .swiper-pagination-clickable .swiper-pagination-bullet:hover {
        opacity: .6
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
        background: #59ce61;
        color: #59ce61
    }

    .swiper-container-vertical > .swiper-pagination-bullets {
        right: 10px;
        top: 50%;
        -webkit-transform: translate3d(0px, -50%, 0);
        transform: translate3d(0px, -50%, 0)
    }

    .swiper-container-vertical > .swiper-pagination-bullets .swiper-pagination-bullet {
        margin: 6px 0;
        display: block
    }

    .swiper-container-vertical > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic {
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 8px
    }

    .swiper-container-vertical > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet {
        display: inline-block;
        -webkit-transition: 200ms top, 200ms -webkit-transform;
        transition: 200ms top, 200ms -webkit-transform;
        transition: 200ms transform, 200ms top;
        transition: 200ms transform, 200ms top, 200ms -webkit-transform
    }

    .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet {
        margin: 0 10px
    }

    .swiper-container-horizontal > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic {
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        white-space: nowrap
    }

    .swiper-container-horizontal > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet {
        -webkit-transition: 200ms left, 200ms -webkit-transform;
        transition: 200ms left, 200ms -webkit-transform;
        transition: 200ms transform, 200ms left;
        transition: 200ms transform, 200ms left, 200ms -webkit-transform
    }

    .swiper-container-horizontal.swiper-container-rtl > .swiper-pagination-bullets-dynamic .swiper-pagination-bullet {
        -webkit-transition: 200ms right, 200ms -webkit-transform;
        transition: 200ms right, 200ms -webkit-transform;
        transition: 200ms transform, 200ms right;
        transition: 200ms transform, 200ms right, 200ms -webkit-transform
    }

    .swiper-pagination-progressbar {
        background: rgba(0, 0, 0, .25);
        position: absolute
    }

    .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
        background: var(--swiper-pagination-color, var(--swiper-theme-color));
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-transform-origin: left top;
        -ms-transform-origin: left top;
        transform-origin: left top
    }

    .swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
        -webkit-transform-origin: right top;
        -ms-transform-origin: right top;
        transform-origin: right top
    }

    .swiper-container-horizontal > .swiper-pagination-progressbar,
    .swiper-container-vertical > .swiper-pagination-progressbar.swiper-pagination-progressbar-opposite {
        width: 100%;
        height: 4px;
        left: 0;
        top: 0
    }

    .swiper-container-vertical > .swiper-pagination-progressbar,
    .swiper-container-horizontal > .swiper-pagination-progressbar.swiper-pagination-progressbar-opposite {
        width: 4px;
        height: 100%;
        left: 0;
        top: 0
    }

    .swiper-pagination-white {
        --swiper-pagination-color: #ffffff
    }

    .swiper-pagination-black {
        --swiper-pagination-color: #000000
    }

    .swiper-pagination-lock {
        display: none
    }

    .swiper-scrollbar {
        border-radius: 10px;
        position: relative;
        -ms-touch-action: none;
        background: rgba(0, 0, 0, .1)
    }

    .swiper-container-horizontal > .swiper-scrollbar {
        position: absolute;
        left: 1%;
        bottom: 3px;
        z-index: 50;
        height: 5px;
        width: 98%
    }

    .swiper-container-vertical > .swiper-scrollbar {
        position: absolute;
        right: 3px;
        top: 1%;
        z-index: 50;
        width: 5px;
        height: 98%
    }

    .swiper-scrollbar-drag {
        height: 100%;
        width: 100%;
        position: relative;
        background: rgba(0, 0, 0, .5);
        border-radius: 10px;
        left: 0;
        top: 0
    }

    .swiper-scrollbar-cursor-drag {
        cursor: move
    }

    .swiper-scrollbar-lock {
        display: none
    }

    .swiper-zoom-container {
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        text-align: center
    }

    .swiper-zoom-container > img,
    .swiper-zoom-container > svg,
    .swiper-zoom-container > canvas {
        max-width: 100%;
        max-height: 100%;
        -o-object-fit: contain;
        object-fit: contain
    }

    .swiper-slide-zoomed {
        cursor: move
    }

    .swiper-lazy-preloader {
        width: 42px;
        height: 42px;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -21px;
        margin-top: -21px;
        z-index: 10;
        -webkit-transform-origin: 50%;
        -ms-transform-origin: 50%;
        transform-origin: 50%;
        -webkit-animation: swiper-preloader-spin 1s infinite linear;
        animation: swiper-preloader-spin 1s infinite linear;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border: 4px solid var(--swiper-preloader-color, var(--swiper-theme-color));
        border-radius: 50%;
        border-top-color: transparent
    }

    .swiper-lazy-preloader-white {
        --swiper-preloader-color: #fff
    }

    .swiper-lazy-preloader-black {
        --swiper-preloader-color: #000
    }

    @-webkit-keyframes swiper-preloader-spin {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    @keyframes swiper-preloader-spin {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    .swiper-container .swiper-notification {
        position: absolute;
        left: 0;
        top: 0;
        pointer-events: none;
        opacity: 0;
        z-index: -1000
    }

    .swiper-container-fade.swiper-container-free-mode .swiper-slide {
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out
    }

    .swiper-container-fade .swiper-slide {
        pointer-events: none;
        -webkit-transition-property: opacity;
        transition-property: opacity
    }

    .swiper-container-fade .swiper-slide .swiper-slide {
        pointer-events: none
    }

    .swiper-container-fade .swiper-slide-active,
    .swiper-container-fade .swiper-slide-active .swiper-slide-active {
        pointer-events: auto
    }

    .swiper-container-cube {
        overflow: visible
    }

    .swiper-container-cube .swiper-slide {
        pointer-events: none;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        z-index: 1;
        visibility: hidden;
        -webkit-transform-origin: 0 0;
        -ms-transform-origin: 0 0;
        transform-origin: 0 0;
        width: 100%;
        height: 100%
    }

    .swiper-container-cube .swiper-slide .swiper-slide {
        pointer-events: none
    }

    .swiper-container-cube.swiper-container-rtl .swiper-slide {
        -webkit-transform-origin: 100% 0;
        -ms-transform-origin: 100% 0;
        transform-origin: 100% 0
    }

    .swiper-container-cube .swiper-slide-active,
    .swiper-container-cube .swiper-slide-active .swiper-slide-active {
        pointer-events: auto
    }

    .swiper-container-cube .swiper-slide-active,
    .swiper-container-cube .swiper-slide-next,
    .swiper-container-cube .swiper-slide-prev,
    .swiper-container-cube .swiper-slide-next + .swiper-slide {
        pointer-events: auto;
        visibility: visible
    }

    .swiper-container-cube .swiper-slide-shadow-top,
    .swiper-container-cube .swiper-slide-shadow-bottom,
    .swiper-container-cube .swiper-slide-shadow-left,
    .swiper-container-cube .swiper-slide-shadow-right {
        z-index: 0;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
    }

    .swiper-container-cube .swiper-cube-shadow {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: #000;
        opacity: .6;
        -webkit-filter: blur(50px);
        filter: blur(50px);
        z-index: 0
    }

    .swiper-container-flip {
        overflow: visible
    }

    .swiper-container-flip .swiper-slide {
        pointer-events: none;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        z-index: 1
    }

    .swiper-container-flip .swiper-slide .swiper-slide {
        pointer-events: none
    }

    .swiper-container-flip .swiper-slide-active,
    .swiper-container-flip .swiper-slide-active .swiper-slide-active {
        pointer-events: auto
    }

    .swiper-container-flip .swiper-slide-shadow-top,
    .swiper-container-flip .swiper-slide-shadow-bottom,
    .swiper-container-flip .swiper-slide-shadow-left,
    .swiper-container-flip .swiper-slide-shadow-right {
        z-index: 0;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
    }

    .swiper-container-horizontal > .swiper-pagination-progressbar,
    .swiper-container-vertical > .swiper-pagination-progressbar.swiper-pagination-progressbar-opposite {
        bottom: 0;
        top: auto !important;
        height: 6px;
        background: rgba(255, 255, 255, .1)
    }

    @media screen and (min-width: 40em) {

        .swiper-container-horizontal > .swiper-pagination-progressbar,
        .swiper-container-vertical > .swiper-pagination-progressbar.swiper-pagination-progressbar-opposite {
            left: 40px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .swiper-container-horizontal > .swiper-pagination-progressbar,
        .swiper-container-vertical > .swiper-pagination-progressbar.swiper-pagination-progressbar-opposite {
            left: 30px
        }
    }

    @media screen and (max-width: 340px) {

        .swiper-container-horizontal > .swiper-pagination-progressbar,
        .swiper-container-vertical > .swiper-pagination-progressbar.swiper-pagination-progressbar-opposite {
            left: 10px
        }
    }

    .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
        background: rgba(255, 255, 255, .5) !important
    }

    .foundation-mq {
        font-family: "small=0em&medium=40em&large=64.0625em&xlarge=75em&xxlarge=90em"
    }

    .slick-slider {
        margin-left: -8px
    }

    @media screen and (max-width: 39.99875em) {
        .slick-slider {
            margin-left: -5px
        }
    }

    .slick-slider .slick-slide {
        padding: 0 8px
    }

    @media screen and (max-width: 39.99875em) {
        .slick-slider .slick-slide {
            padding: 0 5px
        }
    }

    .slick-slider .slider-arrow:hover {
        cursor: pointer
    }

    .partners {
        margin-left: 0 !important
    }

    @media screen and (max-width: 39.99875em) {
        .partners {
            margin-left: 0 !important
        }
    }

    @media screen and (min-width: 90em) {
        .partners .grid-container.transparent {
            padding: 215px 0 !important
        }
    }

    .partners__card {
        background-repeat: no-repeat !important;
        -webkit-background-size: cover !important;
        background-size: cover !important;
        width: 100%;
        background-position: 70% center;
        min-height: 100vh;
        height: auto;
        position: relative
    }

    .partners__card--employers {
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(10, 30, 46, 0.6)), to(rgba(10, 30, 46, 0.6))), url("//cdn2.careerhunter.io/assets/Employers-d2ab9d9c6635fd3825014e1b7330ab0724ae7ecfa82e1e11d181551c81a75cab.jpg");
        background: -webkit-linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn2.careerhunter.io/assets/Employers-d2ab9d9c6635fd3825014e1b7330ab0724ae7ecfa82e1e11d181551c81a75cab.jpg");
        background: linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn2.careerhunter.io/assets/Employers-d2ab9d9c6635fd3825014e1b7330ab0724ae7ecfa82e1e11d181551c81a75cab.jpg")
    }

    .partners__card--profit {
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(10, 30, 46, 0.6)), to(rgba(10, 30, 46, 0.6))), url("//cdn2.careerhunter.io/assets/Profit-Sharing-fb434eb065ce5c32e6c76aadb66d9f675ad9916a2dbd79b968244b7ce4a5c3b0.jpg");
        background: -webkit-linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn2.careerhunter.io/assets/Profit-Sharing-fb434eb065ce5c32e6c76aadb66d9f675ad9916a2dbd79b968244b7ce4a5c3b0.jpg");
        background: linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn2.careerhunter.io/assets/Profit-Sharing-fb434eb065ce5c32e6c76aadb66d9f675ad9916a2dbd79b968244b7ce4a5c3b0.jpg")
    }

    .partners__card--educators {
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(10, 30, 46, 0.6)), to(rgba(10, 30, 46, 0.6))), url("//cdn1.careerhunter.io/assets/Educators-0c12ae5bb50a0dfa13b5cf73aac76660b63380be2b010a44e1796f981d59188f.jpg");
        background: -webkit-linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn1.careerhunter.io/assets/Educators-0c12ae5bb50a0dfa13b5cf73aac76660b63380be2b010a44e1796f981d59188f.jpg");
        background: linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn1.careerhunter.io/assets/Educators-0c12ae5bb50a0dfa13b5cf73aac76660b63380be2b010a44e1796f981d59188f.jpg")
    }

    .partners__card--white-label {
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(10, 30, 46, 0.6)), to(rgba(10, 30, 46, 0.6))), url("//cdn2.careerhunter.io/assets/White-Label-3c785b99b07a81dd6d260d280c7ff388a40b6bb6887e972a86cbd8360dda99d9.jpg");
        background: -webkit-linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn2.careerhunter.io/assets/White-Label-3c785b99b07a81dd6d260d280c7ff388a40b6bb6887e972a86cbd8360dda99d9.jpg");
        background: linear-gradient(rgba(10, 30, 46, 0.6), rgba(10, 30, 46, 0.6)), url("//cdn2.careerhunter.io/assets/White-Label-3c785b99b07a81dd6d260d280c7ff388a40b6bb6887e972a86cbd8360dda99d9.jpg")
    }

    .partners__content {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0;
        right: 0
    }

    @media screen and (max-width: 64.06125em) {
        .partners__content {
            padding: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .partners__content {
            padding: 0 30px
        }
    }

    .partners__title {
        font-size: 20px;
        line-height: 25px;
        color: #59ce61;
        margin: 0
    }

    @media screen and (max-width: 64.06125em) {
        .partners__title {
            margin: 0 0 10px
        }
    }

    .partners__subtitle {
        font-size: 60px;
        line-height: 60px;
        color: #fff;
        margin-top: 0;
        margin-bottom: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .partners__subtitle {
            font-size: 40px;
            line-height: 40px
        }
    }

    .partners__desc {
        max-width: 500px;
        margin: 0 auto;
        margin-bottom: 20px
    }

    .partners__contact {
        margin-bottom: 10px
    }

    .partners .swiper-slide-duplicate-prev [date-observe],
    .partners .swiper-slide-duplicate-next [date-observe] {
        opacity: 0
    }

    .partners .swiper-slide-active [data-observe],
    .partners .swiper-slide-duplicate-active [data-observe] {
        -webkit-animation: fadeIn 1s ease-in both running;
        animation: fadeIn 1s ease-in both running
    }

    .feedback-blk__slider .swiper-slide:focus {
        outline: none
    }

    @media screen and (max-width: 64.06125em) {
        .feedback-blk__card {
            background-color: rgba(255, 255, 255, .03);
            padding: 30px;
            height: 170px
        }
    }

    .feedback-blk__card .small-icon {
        display: inline-block
    }

    .feedback-blk__stars .small-icon {
        display: inline-block
    }

    .feedback-blk__comment {
        color: #fff;
        margin: 10px 0
    }

    .feedback-blk__commenter {
        color: rgba(255, 255, 255, .6);
        margin-bottom: 10px
    }

    .feedback-blk__date {
        color: rgba(255, 255, 255, .3);
        margin: 0
    }

    .steps-slider {
        margin: 10px 0 30px -8px
    }

    @media screen and (max-width: 74.99875em) {
        .steps-slider {
            overflow: hidden
        }

        .steps-slider.swiper-container {
            padding: 0 40px
        }

        .steps-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .steps-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .steps-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .steps-slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .steps-slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .steps-slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .steps-slider.swiper-container {
            padding: 0 30px
        }

        .steps-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .steps-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .steps-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .steps-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .steps-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .steps-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .steps-slider {
            margin: 10px 0 30px -5px
        }
    }

    .steps-slider .icon-blk {
        height: 63px
    }

    .steps-slider h3 {
        margin: 20px 0
    }

    @media screen and (max-width: 64.06125em) {
        .steps-slider .text-center {
            background-color: rgba(255, 255, 255, .03);
            padding: 30px;
            height: 245px
        }
    }

    @media screen and (max-width: 870px) and (min-width: 769px) {
        .steps-slider .text-center {
            height: 280px
        }
    }

    @media screen and (min-width: 90em) {
        .steps-slider .slick-slide {
            margin: 0 16px 0 0 !important;
            padding: 0
        }
    }

    @media screen and (max-width: 74.99875em) {
        .exhibition__slider {
            overflow: hidden
        }

        .exhibition__slider.swiper-container {
            padding: 0 40px
        }

        .exhibition__slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .exhibition__slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .exhibition__slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .exhibition__slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .exhibition__slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .exhibition__slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .exhibition__slider.swiper-container {
            padding: 0 30px
        }

        .exhibition__slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .exhibition__slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .exhibition__slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .exhibition__slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .exhibition__slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .exhibition__slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    .exhibition__icon-wrapper {
        min-height: 55px;
        margin: 0 0 20px
    }

    .exhibition__total {
        font-size: 35px;
        line-height: 40px;
        color: rgba(255, 255, 255, .8);
        margin: 0
    }

    .exhibition__title {
        color: rgba(255, 255, 255, .5);
        font-size: 20px;
        line-height: 22px;
        margin-bottom: 20px
    }

    @media screen and (max-width: 1220px) and (min-width: 1025px) {
        .exhibition__desc {
            min-height: 100px
        }
    }

    @media screen and (max-width: 1024px) and (min-width: 740px) {
        .exhibition__desc {
            min-height: 80px
        }
    }

    @media screen and (max-width: 739px) {
        .exhibition__desc {
            min-height: 100px
        }
    }

    @media screen and (max-width: 320px) {
        .exhibition__desc {
            min-height: 120px
        }
    }

    .tests__container.grid-container {
        padding: 40px 0 0 !important
    }

    @media screen and (max-width: 1439px) and (min-width: 1025px) {
        .tests__container.grid-container {
            padding: 40px 40px 0 !important
        }
    }

    @media screen and (max-width: 64.06125em) {
        .tests__container.grid-container {
            padding: 40px 0 !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__container.grid-container {
            padding: 40px 0 20px !important
        }
    }

    .tests__slider {
        margin: 10px 0 0
    }

    @media screen and (max-width: 64.06125em) {
        .tests__slider {
            overflow: hidden
        }

        .tests__slider.swiper-container {
            padding: 0 40px
        }

        .tests__slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .tests__slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .tests__slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .tests__slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .tests__slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .tests__slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__slider.swiper-container {
            padding: 0 30px
        }

        .tests__slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .tests__slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .tests__slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .tests__slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .tests__slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .tests__slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .tests__slider .large-5.cell {
            padding: 0
        }

        .tests__slider .grid-x > .large-7 {
            width: 50%
        }

        .tests__slider .grid-x > .large-5 {
            width: 50%
        }

        .tests__slider .slick-slide {
            padding: 0
        }
    }

    @media (max-width: 1439px) and (min-width: 1025px) {
        .tests__slider .grid-x > .large-7 {
            width: 45%
        }

        .tests__slider .grid-x > .large-5 {
            width: 55%
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .tests__slider {
            margin: 0 0 0 -8px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__slider {
            margin: 0 0 0 -5px;
            padding-bottom: 35px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .tests__slider.swiper-container {
            padding-bottom: 35px
        }
    }

    .tests__slider .cell {
        -webkit-box-flex: 0 !important;
        -webkit-flex: 0 1 auto !important;
        -ms-flex: 0 1 auto !important;
        flex: 0 1 auto !important
    }

    .tests__slider .button {
        margin-bottom: 0;
        margin-right: 10px
    }

    .tests__slider .button:hover .lock-white {
        background-position: -118px -33px;
        opacity: 1
    }

    .tests__slider .swiper-pagination-bullets {
        bottom: 0
    }

    .tests__slider .swiper-pagination-bullets .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        margin: 0 8px;
        opacity: .3;
        -webkit-transition: all .5s ease;
        transition: all .5s ease
    }

    .tests__slider .swiper-pagination-bullets .swiper-pagination-bullet:hover {
        opacity: .6
    }

    .tests__slider .swiper-pagination-bullets .swiper-pagination-bullet-active {
        background: #fff;
        opacity: 1;
        position: relative
    }

    .tests__slider .swiper-pagination-bullets .swiper-pagination-bullet-active::after {
        content: '';
        width: 16px;
        height: 16px;
        background: 0 0;
        position: absolute;
        border-radius: 50%;
        border: 1.5px solid #59ce61;
        border-top: 0;
        border-left: 0;
        top: -2px;
        left: -2px
    }

    .tests__title {
        font-size: 28px;
        color: #fff;
        font-family: sofia-pro-semi-bold, sans-serif;
        margin: 0 0 0 20px
    }

    @media screen and (max-width: 39.99875em) {
        .tests__title {
            margin: 15px 0 10px 10px;
            font-size: 24px
        }
    }

    @media (max-width: 320px) {
        .tests__title {
            font-size: 20px
        }
    }

    .tests__desc {
        max-width: 470px;
        font-family: sofia-pro-regular, sans-serif;
        margin-bottom: 20px
    }

    @media screen and (max-width: 64.06125em) {
        .tests__content {
            padding: 0 25px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__content {
            min-height: 221px !important;
            padding: 0 15px
        }
    }

    @media screen and (max-width: 320px) {
        .tests__content {
            min-height: 245px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__content .flex-middle {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            display: block
        }

        .tests__content .flex-middle h3 {
            margin-left: 0
        }
    }

    .tests__details {
        margin: 25px 0 23px;
        font-size: 15px;
        width: 100%
    }

    @media screen and (max-width: 39.99875em) {
        .tests__details {
            margin: 15px 0;
            font-size: 14px
        }
    }

    .tests__details-icons {
        color: rgba(255, 255, 255, .8);
        font-family: sofia-pro-regular, sans-serif;
        padding: 0 10px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        line-height: 1
    }

    @media screen and (min-width: 40em) {
        .tests__details-icons:first-child {
            padding: 0 10px 0 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__details-icons {
            padding: 5px 10px 0 0
        }
    }

    .tests__buttons {
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex
    }

    @media screen and (max-width: 64.06125em) {
        .tests__buttons {
            padding: 0 0 25px 25px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__buttons {
            padding: 0 0 25px 15px
        }
    }

    .tests__img {
        width: 100%
    }

    .tests__img img {
        height: auto;
        margin: -25px 0 -66px -16px
    }

    @media screen and (min-width: 64.0625em) {
        .tests__img img {
            float: right;
            width: 100%;
            max-width: 502px;
            height: 275px;
            -o-object-fit: cover;
            object-fit: cover
        }
    }

    @media screen and (max-width: 89.99875em) {
        .tests__img img {
            margin: -25px 0 -66px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .tests__img img {
            margin: 0 0 25px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .tests__img img {
            width: 100%;
            height: 325px;
            -o-object-fit: cover;
            object-fit: cover
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tests__img img {
            margin: 0 0 18px
        }
    }

    .tests__nav .swiper-wrapper {
        margin-top: 20px;
        margin-bottom: 40px
    }

    .tests__nav .swiper-pagination-bullets {
        bottom: 0
    }

    .tests__nav .swiper-pagination-bullets .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        margin: 0 8px;
        opacity: .3;
        -webkit-transition: all .5s ease;
        transition: all .5s ease
    }

    .tests__nav .swiper-pagination-bullets .swiper-pagination-bullet:hover {
        opacity: .6
    }

    .tests__nav .swiper-pagination-bullets .swiper-pagination-bullet-active {
        background: #fff;
        opacity: 1
    }

    .tests__nav .swiper-slide-thumb-active .card {
        background: rgba(59, 75, 88, .9);
        opacity: 1
    }

    .tests__nav .card {
        opacity: .5;
        -webkit-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out
    }

    .tests__nav .card:hover {
        background: rgba(59, 75, 88, .9);
        opacity: 1;
        cursor: pointer;
        -webkit-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        transform: translateY(-10px)
    }

    .tests__nav-access,
    .tests__nav .locked {
        position: absolute;
        top: 10px;
        right: 10px;
        margin: 0
    }

    .tests__nav-access {
        color: #59ce61
    }

    @media screen and (max-width: 64.06125em) {
        .tests__nav-access {
            position: unset;
            text-align: right
        }
    }

    .tests__nav-title {
        color: #fff;
        margin-top: 12px;
        margin-bottom: 0;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        text-align: center;
        max-width: 100px;
        font-size: 18px;
        line-height: 20px
    }

    .tests__nav .icon-wrapper {
        height: 38px
    }

    .careers-tips-slider {
        margin-top: 30px
    }

    @media screen and (max-width: 74.99875em) {
        .careers-tips-slider {
            overflow: hidden
        }

        .careers-tips-slider.swiper-container {
            padding: 0 40px
        }

        .careers-tips-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .careers-tips-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .careers-tips-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .careers-tips-slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .careers-tips-slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .careers-tips-slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .careers-tips-slider.swiper-container {
            padding: 0 30px
        }

        .careers-tips-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .careers-tips-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .careers-tips-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .careers-tips-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .careers-tips-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .careers-tips-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    .careers-tips-slider .card {
        min-height: 135px
    }

    @media screen and (max-width: 1440px) and (min-width: 1302px) {
        .careers-tips-slider .card {
            min-height: 155px
        }
    }

    @media screen and (max-width: 1301px) and (min-width: 1271px) {
        .careers-tips-slider .card {
            min-height: 173px
        }
    }

    @media screen and (max-width: 1270px) and (min-width: 1025px) {
        .careers-tips-slider .card {
            min-height: 215px
        }
    }

    @media screen and (max-width: 991px) and (min-width: 769px) {
        .careers-tips-slider .card {
            min-height: 215px
        }
    }

    @media screen and (max-width: 758px) and (min-width: 641px) {
        .careers-tips-slider .card {
            min-height: 155px
        }
    }

    @media screen and (max-width: 680px) and (min-width: 640px) {
        .careers-tips-slider .card {
            min-height: 175px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .careers-tips-slider .card {
            min-height: 155px
        }
    }

    @media screen and (max-width: 320px) {
        .careers-tips-slider .card {
            min-height: 200px
        }
    }

    @media screen and (max-width: 1300px) {
        .test-tiles-slider:not(.at-results) {
            overflow: hidden
        }
    }

    @media screen and (max-width: 340px) {
        .test-tiles-slider:not(.at-results) .slick-list {
            overflow: visible;
            margin: 0 10px
        }
    }

    @media screen and (min-width: 341px) and (max-width: 640px) {
        .test-tiles-slider:not(.at-results) .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (min-width: 641px) and (max-width: 1300px) {
        .test-tiles-slider:not(.at-results) .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .test-tiles-slider.at-results {
            overflow: hidden
        }

        .test-tiles-slider.at-results.swiper-container {
            padding: 0 40px
        }

        .test-tiles-slider.at-results.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .test-tiles-slider.at-results.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .test-tiles-slider.at-results.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .test-tiles-slider.at-results.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .test-tiles-slider.at-results.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .test-tiles-slider.at-results .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .test-tiles-slider.at-results.swiper-container {
            padding: 0 30px
        }

        .test-tiles-slider.at-results.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .test-tiles-slider.at-results.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .test-tiles-slider.at-results.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .test-tiles-slider.at-results.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .test-tiles-slider.at-results.slider-with-white-arrows .slick-next {
            right: 0
        }

        .test-tiles-slider.at-results .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (max-width: 340px) {
        .test-tiles-slider.at-results .slick-list {
            margin: 0 10px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .test-tiles-slider.at-results .slider-bar {
            margin: 10px 48px 20px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .test-tiles-slider.at-results .slider-bar {
            margin: 10px 38px 12px
        }
    }

    @media screen and (max-width: 340px) {
        .test-tiles-slider.at-results .slider-bar {
            margin: 10px 18px 12px
        }
    }

    .test-tiles-slider.at-results .small-icons.locked,
    .test-tiles-slider.at-results .progress__link {
        position: absolute;
        right: 10px;
        top: 10px
    }

    .test-tiles-slider .slick-slide {
        padding: 0 8px
    }

    .test-tiles-slider .slick-slide:nth-child(even) .progress__card .circle {
        display: none
    }

    @media screen and (max-width: 39.99875em) {
        .test-tiles-slider .slick-slide {
            padding: 0 5px
        }
    }

    .test-tiles-slider .card__title {
        max-width: 100px;
        margin: 0 auto;
        padding: 0
    }

    @media screen and (max-width: 450px) {
        .test-tiles-slider .card__title {
            max-width: unset
        }
    }

    .test-tiles-slider .alarm .progress__details--timed {
        color: #ff3737;
        font-family: sofia-pro-bold, sans-serif
    }

    .tabs-slider .title {
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        font-size: 28px;
        line-height: 35px;
        margin-bottom: 0
    }

    @media screen and (min-width: 90em) {
        .tabs-slider .title {
            padding: 0 !important
        }
    }

    @media screen and (width: 1440px) {
        .tabs-slider .title {
            max-width: 1340px
        }
    }

    @media screen and (min-width: 75em) and (max-width: 89.99875em) {
        .tabs-slider .title {
            padding: 0 40px !important
        }
    }

    @media screen and (min-width: 40em) {
        .tabs-slider .title {
            padding: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-slider .title {
            padding: 0 30px !important
        }
    }

    .tabs-slider .results-slider {
        overflow: hidden;
        max-width: none;
        margin-left: 0
    }

    .tabs-slider .results-slider.swiper-container {
        padding: 0 40px
    }

    .tabs-slider .results-slider.swiper-container .swiper-wrapper {
        overflow: visible
    }

    .tabs-slider .results-slider.slider-with-white-arrows {
        padding-bottom: 60px
    }

    .tabs-slider .results-slider.slider-with-white-arrows .slick-arrow {
        bottom: -10px
    }

    .tabs-slider .results-slider.slider-with-white-arrows .slick-prev {
        left: 10px
    }

    .tabs-slider .results-slider.slider-with-white-arrows .slick-next {
        right: 20px
    }

    .tabs-slider .results-slider .slick-list {
        overflow: visible;
        margin: 0 40px
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-slider .results-slider.swiper-container {
            padding: 0 30px
        }

        .tabs-slider .results-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .tabs-slider .results-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .tabs-slider .results-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .tabs-slider .results-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .tabs-slider .results-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .tabs-slider .results-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    .tabs-slider .results-slider .slick-next,
    .tabs-slider .results-slider .slick-prev {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        position: absolute;
        top: 40%;
        z-index: 2
    }

    .tabs-slider .results-slider .slick-next:hover,
    .tabs-slider .results-slider .slick-prev:hover {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        background-color: #59ce61
    }

    .tabs-slider .results-slider .slick-next {
        right: 0
    }

    .tabs-slider .results-slider .slick-prev {
        left: calc((100% - 1400px) / 2)
    }

    .tabs-slider .results-slider .slider-arrow {
        width: 29px;
        height: 23px;
        position: absolute
    }

    .tabs-slider .results-slider .slider-arrow--next {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg);
        background-position: -404px -11px;
        right: 30px
    }

    .tabs-slider .results-slider .slider-arrow--prev {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg);
        background-position: -357px -11px;
        left: -20px
    }

    @media screen and (min-width: 1441px) {
        .tabs-slider .results-slider .slick-list {
            margin-left: calc((100% - 1400px) / 2)
        }
    }

    @media screen and (max-width: 1440px) and (min-width: 1439px) {
        .tabs-slider .results-slider .slick-list {
            margin-left: calc((100% - 1340px) / 2)
        }
    }

    @media screen and (max-width: 1438px) and (min-width: 1366px) {
        .tabs-slider .results-slider .slick-list {
            margin-left: calc((100% - 1260px) / 2)
        }
    }

    @media screen and (max-width: 340px) {
        .tabs-slider .results-slider .slick-list {
            margin: 0 10px
        }
    }

    .tabs-slider .results-slider .slick-track {
        margin-left: 0;
        width: -webkit-max-content !important;
        width: -moz-max-content !important;
        width: max-content !important
    }

    .tabs-slider .results-slider .slick-slide {
        width: 270px;
        padding: 20px 20px 0 0
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .tabs-slider .results-slider .slick-slide {
            padding: 20px 20px 0 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-slider .results-slider .slick-slide {
            padding: 20px 20px 0 0
        }
    }

    @media screen and (max-width: 340px) {
        .tabs-slider .results-slider .slick-slide {
            padding: 20px 10px 0 0
        }
    }

    .tabs-slider .results-slider .slick-slide:not(.slick-active) {
        background-color: transparent !important;
        opacity: 1
    }

    @media screen and (max-width: 1800px) and (min-width: 1500px) {
        .tabs-slider .results-slider .slick-slide {
            max-width: 245px
        }
    }

    @media screen and (max-width: 1499px) and (min-width: 1440px) {
        .tabs-slider .results-slider .slick-slide {
            max-width: 232px
        }
    }

    @media screen and (max-width: 1439px) and (min-width: 1025px) {
        .tabs-slider .results-slider .slick-slide {
            max-width: 220px
        }
    }

    @media screen and (max-width: 1024px) and (min-width: 831px) {
        .tabs-slider .results-slider .slick-slide {
            max-width: 250px
        }
    }

    @media screen and (max-width: 830px) {
        .tabs-slider .results-slider .slick-slide {
            max-width: 220px
        }
    }

    @media screen and (min-width: 351px) and (max-width: 400px) {
        .tabs-slider .results-slider .slick-slide {
            width: 300px
        }
    }

    @media screen and (max-width: 350px) {
        .tabs-slider .results-slider .slick-slide {
            width: 280px
        }
    }

    .tabs-slider .results-slider .slick-disabled {
        opacity: .5;
        pointer-events: none
    }

    .tabs-slider .results-slider .card--results {
        margin: 0 0 20px !important
    }

    .tabs-slider .results-slider .tabs-title .card {
        -webkit-transition: all .35s ease-in-out;
        transition: all .35s ease-in-out
    }

    .tabs-slider .results-slider .tabs-title.is-active .card {
        background-color: transparent
    }

    .tabs-slider .results-slider .tabs-title.is-active .card .card-industry-name {
        color: #59ce61
    }

    .tabs-slider .results-slider .tabs-title.is-active:hover {
        background-color: transparent
    }

    .tabs-slider .results-slider .tabs-title.is-active:after {
        display: none
    }

    .tabs-slider .results-slider .tabs-title:hover .card {
        background-color: #1e3a49
    }

    @media screen and (min-width: 40em) {
        .tabs-slider .results-slider .tabs-title:hover .card {
            -webkit-transform: translateY(-20px);
            -ms-transform: translateY(-20px);
            transform: translateY(-20px)
        }
    }

    @media screen and (min-width: 64.0625em) {
        .tabs-slider .results-slider.is-blur .slick-disabled {
            opacity: 0
        }

        .tabs-slider .results-slider.is-blur .slick-next {
            -webkit-filter: blur(10px);
            filter: blur(10px)
        }
    }

    .tabs-slider .results-slider.is-blur .slick-slide {
        opacity: 1
    }

    .results-slider .slider-bar,
    .at-results .slider-bar,
    .courses__featured-slider .slider-bar {
        display: -webkit-box !important;
        display: -webkit-flex !important;
        display: -ms-flexbox !important;
        display: flex !important;
        background: rgba(255, 255, 255, .1);
        height: 6px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {

        .results-slider .slider-bar,
        .at-results .slider-bar,
        .courses__featured-slider .slider-bar {
            margin: 0 40px 20px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .results-slider .slider-bar,
        .at-results .slider-bar,
        .courses__featured-slider .slider-bar {
            margin: 0 30px 12px
        }
    }

    @media screen and (max-width: 340px) {

        .results-slider .slider-bar,
        .at-results .slider-bar,
        .courses__featured-slider .slider-bar {
            margin: 0 10px 12px
        }
    }

    .results-slider .slider-bar li,
    .results-slider .slider-bar button,
    .at-results .slider-bar li,
    .at-results .slider-bar button,
    .courses__featured-slider .slider-bar li,
    .courses__featured-slider .slider-bar button {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        height: 6px;
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 0;
        -ms-flex: 1 1 0;
        flex: 1 1 0;
        color: transparent
    }

    .results-slider .slider-bar li button,
    .at-results .slider-bar li button,
    .courses__featured-slider .slider-bar li button {
        background: 0 0;
        color: transparent;
        border: none;
        position: relative;
        top: -8px;
        padding: 10px 0
    }

    .results-slider .slider-bar .slick-active,
    .at-results .slider-bar .slick-active,
    .courses__featured-slider .slider-bar .slick-active {
        background: rgba(255, 255, 255, .5)
    }

    @media screen and (max-width: 74.99875em) {
        .careers-slider {
            overflow: hidden
        }

        .careers-slider.swiper-container {
            padding: 0 40px
        }

        .careers-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .careers-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .careers-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .careers-slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .careers-slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .careers-slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .careers-slider.swiper-container {
            padding: 0 30px
        }

        .careers-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .careers-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .careers-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .careers-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .careers-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .careers-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (max-width: 340px) {
        .careers-slider .slick-list {
            margin: 0 10px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .careers-slider.careers-widget-slider .card--careers {
            margin: 0 8px 15px
        }
    }

    .careers-slider .card--careers {
        margin: 0
    }

    .careers-slider .card__section--careers {
        min-height: 170px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-flow: column;
        -ms-flex-flow: column;
        flex-flow: column;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    @media screen and (min-width: 64.0625em) {
        .careers-slider .slick-slider {
            width: calc(100% + 16px)
        }
    }

    @media screen and (max-width: 64.06125em) {
        .careers-slider .slick-slider {
            margin-bottom: 20px
        }
    }

    .careers-slider .slick-slide {
        padding: 0 8px
    }

    @media screen and (max-width: 39.99875em) {
        .careers-slider .slick-slide {
            padding: 0 5px
        }
    }

    .careers-slider .slick-track {
        width: -webkit-max-content !important;
        width: -moz-max-content !important;
        width: max-content !important
    }

    .careers-slider.in-popup {
        overflow: hidden
    }

    .careers-slider.in-popup.swiper-container {
        padding: 0 40px
    }

    .careers-slider.in-popup.swiper-container .swiper-wrapper {
        overflow: visible
    }

    .careers-slider.in-popup.slider-with-white-arrows {
        padding-bottom: 60px
    }

    .careers-slider.in-popup.slider-with-white-arrows .slick-arrow {
        bottom: -10px
    }

    .careers-slider.in-popup.slider-with-white-arrows .slick-prev {
        left: 10px
    }

    .careers-slider.in-popup.slider-with-white-arrows .slick-next {
        right: 20px
    }

    .careers-slider.in-popup .slick-list {
        overflow: visible;
        margin: 0 40px
    }

    @media screen and (max-width: 39.99875em) {
        .careers-slider.in-popup.swiper-container {
            padding: 0 30px
        }

        .careers-slider.in-popup.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .careers-slider.in-popup.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .careers-slider.in-popup.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .careers-slider.in-popup.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .careers-slider.in-popup.slider-with-white-arrows .slick-next {
            right: 0
        }

        .careers-slider.in-popup .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    .careers-slider.in-popup .slick-list {
        margin-left: 0;
        margin-right: 130px
    }

    @media screen and (min-width: 640px) and (max-width: 769px) {
        .careers-slider.in-popup .slick-list {
            margin-right: 100px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .careers-slider.in-popup .slick-list {
            margin-left: 20px;
            margin-right: 80px
        }
    }

    @media screen and (max-width: 320px) {
        .careers-slider.in-popup .slick-list {
            margin-right: 60px
        }
    }

    .careers-slider.in-popup .slick-disabled {
        opacity: .5;
        pointer-events: none
    }

    .careers-slider.in-popup .slick-next,
    .careers-slider.in-popup .slick-prev {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        position: fixed;
        top: 50%;
        cursor: pointer;
        z-index: 2;
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg) -271px -57px;
        width: 14px;
        height: 11px
    }

    .careers-slider.in-popup .slick-next {
        right: 50px;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .careers-slider.in-popup .slick-prev {
        left: 50px
    }

    .careers-slider.in-popup .card:focus {
        outline: none
    }

    .careers-slider.in-popup .card:focus .card__name--popup {
        color: #59ce61
    }

    @media screen and (max-width: 74.99875em) {
        .is-overlapping {
            margin: 0 -40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .is-overlapping {
            margin: 0 -30px
        }
    }

    .with-navigation .slick-disabled {
        opacity: 0;
        pointer-events: none
    }

    .with-navigation .slick-next,
    .with-navigation .slick-prev {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        position: absolute;
        top: 35%;
        cursor: pointer;
        height: 60px;
        width: 60px;
        background-color: rgba(89, 206, 97, .5);
        border-radius: 30px;
        z-index: 2
    }

    .with-navigation .slick-next:hover,
    .with-navigation .slick-prev:hover {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        background-color: #59ce61
    }

    .with-navigation .slick-next {
        right: 5%
    }

    .with-navigation .slick-prev {
        left: 5%
    }

    .with-navigation .slider-arrow {
        width: 10px;
        height: 18px;
        position: absolute;
        top: 35%
    }

    .with-navigation .slider-arrow--next {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg) -424px -66px;
        left: 42%
    }

    .with-navigation .slider-arrow--prev {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg) -424px -66px;
        left: 38%;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .review__slider,
    .feedback-blk__slider {
        overflow: hidden;
        max-width: none;
        padding: 66px 0
    }

    .review__slider .slick-list,
    .feedback-blk__slider .slick-list {
        overflow: visible
    }

    .review__slider .slick-track,
    .feedback-blk__slider .slick-track {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch
    }

    .review__slider .slick-slide,
    .feedback-blk__slider .slick-slide {
        height: auto
    }

    .review__slider .slick-slide:not(.slick-active),
    .feedback-blk__slider .slick-slide:not(.slick-active) {
        opacity: .3
    }

    .review__slider .slick-slide > div,
    .feedback-blk__slider .slick-slide > div {
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .review__slider .slick-disabled,
    .feedback-blk__slider .slick-disabled {
        opacity: .5
    }

    .review__slider .slick-prev,
    .review__slider .slick-next,
    .feedback-blk__slider .slick-prev,
    .feedback-blk__slider .slick-next {
        width: 40px;
        height: 40px;
        margin: 0 auto;
        position: absolute;
        bottom: 10px
    }

    .review__slider .slick-prev:hover,
    .review__slider .slick-next:hover,
    .feedback-blk__slider .slick-prev:hover,
    .feedback-blk__slider .slick-next:hover {
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        opacity: .5
    }

    .review__slider .slick-prev,
    .feedback-blk__slider .slick-prev {
        left: 8px
    }

    .review__slider .slick-next,
    .feedback-blk__slider .slick-next {
        right: 0
    }

    .review__slider .slick-arrow,
    .feedback-blk__slider .slick-arrow {
        background: rgba(10, 30, 46, .1);
        height: 36px;
        width: 36px;
        border-radius: 50%
    }

    .review__slider .slider-arrow,
    .feedback-blk__slider .slider-arrow {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg);
        margin: 0 -1px -3px 0;
        position: absolute;
        bottom: 15px
    }

    .review__slider .slider-arrow--next,
    .feedback-blk__slider .slider-arrow--next {
        background-position: -221px -17px;
        width: 19px;
        height: 11px;
        right: 10px
    }

    .review__slider .slider-arrow--prev,
    .feedback-blk__slider .slider-arrow--prev {
        background-position: -184px -17px;
        width: 20px;
        height: 11px;
        left: 10px
    }

    .review__container--blue .review__slider .slick-arrow,
    .feedback-blk--group .feedback-blk__slider .slick-arrow {
        background: rgba(255, 255, 255, .1) !important
    }

    .review__container--blue .review__slider .slider-arrow,
    .feedback-blk--group .feedback-blk__slider .slider-arrow {
        margin: 0 0 -3px
    }

    .review__container--blue .review__slider .slider-arrow--prev,
    .feedback-blk--group .feedback-blk__slider .slider-arrow--prev {
        background-position: -124px -17px !important;
        width: 14px !important;
        height: 11px !important
    }

    .review__container--blue .review__slider .slider-arrow--next,
    .feedback-blk--group .feedback-blk__slider .slider-arrow--next {
        background-position: -157px -17px !important;
        width: 14px !important;
        height: 11px !important
    }

    .review__slide {
        background: rgba(255, 255, 255, .05);
        padding: 30px
    }

    .review__slide:focus {
        outline: none
    }

    @media screen and (max-width: 460px) {
        .review__slide-name {
            max-width: 200px
        }
    }

    @media screen and (max-width: 375px) {
        .review__slide-name {
            max-width: 180px
        }
    }

    @media screen and (max-width: 320px) {
        .review__slide-name {
            max-width: 115px
        }
    }

    .endorsments__slider .slick-disabled {
        opacity: .5
    }

    .endorsments__slider .slick-prev,
    .endorsments__slider .slick-next {
        width: 80px;
        height: 80px;
        margin: 0;
        position: absolute;
        bottom: -40px
    }

    .endorsments__slider .slick-prev {
        left: -12px
    }

    .endorsments__slider .slick-next {
        right: -8px
    }

    @media screen and (max-width: 39.99875em) {
        .endorsments__slider .slick-next {
            right: -16px
        }
    }

    .endorsments__slider .slider-arrow {
        position: absolute;
        width: 19px;
        height: 11px;
        bottom: 40px
    }

    .endorsments__slider .slider-arrow--next {
        background: url(//cdn1.careerhunter.io/assets/right-arrow-a1ad9af6eec6b2ac1cfef17b0d644be0fe44687cca71f92fe19d9035a3bfa9a7.svg) no-repeat;
        right: 20px
    }

    .endorsments__slider .slider-arrow--prev {
        background: url(//cdn2.careerhunter.io/assets/left-arrow-7ff8e81d968ed122f306f1d2f4e3434b5ab3a4c4ccbe8d7f13177199e485ccb1.svg) no-repeat;
        left: 20px
    }

    .endorsments__slider .slick-track {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .endorsments__slider .slick-slide {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        height: auto;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .endorsments__slide:focus {
        outline: none
    }

    .endorsments__logo {
        margin: 0 auto
    }

    .slider-with-white-arrows {
        padding-bottom: 60px
    }

    .slider-with-white-arrows .slick-arrow {
        position: absolute;
        bottom: 0;
        cursor: pointer;
        width: 80px;
        height: 80px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .slider-with-white-arrows .slick-arrow:focus {
        outline: none
    }

    .slider-with-white-arrows .slick-arrow::after {
        content: ' ';
        width: 19px;
        height: 11px;
        display: inline-block
    }

    .slider-with-white-arrows .swiper-button-disabled {
        opacity: .5
    }

    .slider-with-white-arrows .slick-prev {
        left: 0
    }

    .slider-with-white-arrows .slick-prev::after {
        background: url(//cdn2.careerhunter.io/assets/left-arrow-7ff8e81d968ed122f306f1d2f4e3434b5ab3a4c4ccbe8d7f13177199e485ccb1.svg) no-repeat
    }

    .slider-with-white-arrows .slick-next {
        right: 0
    }

    .slider-with-white-arrows .slick-next::after {
        background: url(//cdn1.careerhunter.io/assets/right-arrow-a1ad9af6eec6b2ac1cfef17b0d644be0fe44687cca71f92fe19d9035a3bfa9a7.svg) no-repeat
    }

    @media screen and (max-width: 74.99875em) {
        .courses-slider {
            overflow: hidden
        }

        .courses-slider.swiper-container {
            padding: 0 40px
        }

        .courses-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .courses-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .courses-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .courses-slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .courses-slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .courses-slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .courses-slider.swiper-container {
            padding: 0 30px
        }

        .courses-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .courses-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .courses-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .courses-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .courses-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .courses-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (max-width: 340px) {
        .courses-slider .slick-list {
            margin: 0 10px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .courses-slider .slick-slider {
            width: calc(100% + 16px)
        }
    }

    .courses-slider .slick-slide {
        padding: 0 8px
    }

    @media screen and (max-width: 39.99875em) {
        .courses-slider .slick-slide {
            padding: 0 5px
        }
    }

    .courses-slider .card img {
        height: 104px;
        -o-object-fit: cover;
        object-fit: cover;
        width: 100%
    }

    @media screen and (max-width: 64.06125em) {

        .courses__featured-slider,
        .degrees__featured-slider {
            overflow: hidden
        }

        .courses__featured-slider.swiper-container,
        .degrees__featured-slider.swiper-container {
            padding: 0 40px
        }

        .courses__featured-slider.swiper-container .swiper-wrapper,
        .degrees__featured-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .courses__featured-slider.slider-with-white-arrows,
        .degrees__featured-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .courses__featured-slider.slider-with-white-arrows .slick-arrow,
        .degrees__featured-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .courses__featured-slider.slider-with-white-arrows .slick-prev,
        .degrees__featured-slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .courses__featured-slider.slider-with-white-arrows .slick-next,
        .degrees__featured-slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .courses__featured-slider .slick-list,
        .degrees__featured-slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .courses__featured-slider.swiper-container,
        .degrees__featured-slider.swiper-container {
            padding: 0 30px
        }

        .courses__featured-slider.swiper-container .swiper-wrapper,
        .degrees__featured-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .courses__featured-slider.slider-with-white-arrows,
        .degrees__featured-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .courses__featured-slider.slider-with-white-arrows .slick-arrow,
        .degrees__featured-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .courses__featured-slider.slider-with-white-arrows .slick-prev,
        .degrees__featured-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .courses__featured-slider.slider-with-white-arrows .slick-next,
        .degrees__featured-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .courses__featured-slider .slick-list,
        .degrees__featured-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (max-width: 340px) {

        .courses__featured-slider .slick-list,
        .degrees__featured-slider .slick-list {
            margin: 0 10px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {

        .courses__featured-slider .slider-bar,
        .degrees__featured-slider .slider-bar {
            margin: 10px 48px 20px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .courses__featured-slider .slider-bar,
        .degrees__featured-slider .slider-bar {
            margin: 10px 38px 12px
        }
    }

    @media screen and (max-width: 340px) {

        .courses__featured-slider .slider-bar,
        .degrees__featured-slider .slider-bar {
            margin: 10px 18px 12px
        }
    }

    .courses__featured-slider.grid-container,
    .degrees__featured-slider.grid-container {
        padding-top: 0 !important
    }

    .courses__featured-slider .card,
    .degrees__featured-slider .card {
        background: #fff
    }

    .courses__featured-slider .card.card--degrees,
    .degrees__featured-slider .card.card--degrees {
        margin: 0 !important
    }

    .courses__featured-slider .card:hover,
    .degrees__featured-slider .card:hover {
        background: rgba(255, 255, 255, .9)
    }

    .courses__featured-slider .card:hover .card__link,
    .degrees__featured-slider .card:hover .card__link {
        text-decoration: underline
    }

    .courses__featured-slider .card img,
    .degrees__featured-slider .card img {
        height: 104px;
        -o-object-fit: cover;
        object-fit: cover;
        width: 100%
    }

    .courses__featured-slider .card .card__title--courses,
    .courses__featured-slider .card .card__degree-title,
    .degrees__featured-slider .card .card__title--courses,
    .degrees__featured-slider .card .card__degree-title {
        color: #0a1e2e
    }

    .courses__featured-slider .card .card__courses-details,
    .courses__featured-slider .card .card__degree-details,
    .degrees__featured-slider .card .card__courses-details,
    .degrees__featured-slider .card .card__degree-details {
        color: rgba(10, 30, 46, .5)
    }

    .courses__featured-slider .slick-disabled,
    .degrees__featured-slider .slick-disabled {
        opacity: .5;
        pointer-events: none
    }

    .courses__featured-slider .slick-prev,
    .courses__featured-slider .slick-next,
    .degrees__featured-slider .slick-prev,
    .degrees__featured-slider .slick-next {
        position: absolute;
        bottom: 45%
    }

    .courses__featured-slider .slick-prev:hover,
    .courses__featured-slider .slick-next:hover,
    .degrees__featured-slider .slick-prev:hover,
    .degrees__featured-slider .slick-next:hover {
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        opacity: .5;
        cursor: pointer
    }

    .courses__featured-slider .slick-prev,
    .degrees__featured-slider .slick-prev {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg);
        background-position: -357px -11px;
        width: 29px;
        height: 23px;
        left: -30px
    }

    .courses__featured-slider .slick-next,
    .degrees__featured-slider .slick-next {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg);
        background-position: -404px -11px;
        width: 29px;
        height: 23px;
        right: -30px
    }

    .foundation-mq {
        font-family: "small=0em&medium=40em&large=64.0625em&xlarge=75em&xxlarge=90em"
    }

    .text-left {
        text-align: left
    }

    .text-right {
        text-align: right
    }

    .text-center {
        text-align: center
    }

    .text-justify {
        text-align: justify
    }

    @media screen and (min-width: 40em) {
        .medium-text-left {
            text-align: left
        }

        .medium-text-right {
            text-align: right
        }

        .medium-text-center {
            text-align: center
        }

        .medium-text-justify {
            text-align: justify
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-text-left {
            text-align: left
        }

        .large-text-right {
            text-align: right
        }

        .large-text-center {
            text-align: center
        }

        .large-text-justify {
            text-align: justify
        }
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    p {
        font-family: sofia-pro-regular, sans-serif;
        font-weight: 400;
        text-rendering: optimizeLegibility
    }

    div,
    ul,
    ol,
    li,
    h1,
    h2,
    h3,
    h4,
    h5,
    form,
    p {
        margin: 0;
        padding: 0
    }

    b {
        font-family: sofia-pro-bold, sans-serif;
        font-weight: 400
    }

    h1 {
        color: #fff;
        font-size: 34px;
        line-height: 40px;
        margin: 0;
        font-family: sofia-pro-semi-bold, sans-serif
    }

    h1.primary {
        color: #59ce61
    }

    h2 {
        color: #fff;
        font-size: 28px;
        line-height: 35px;
        margin: 20px 0;
        font-family: sofia-pro-semi-bold, sans-serif
    }

    h3 {
        color: #59ce61;
        font-size: 20px;
        line-height: 22px;
        margin-top: 0
    }

    h3.bold {
        font-family: sofia-pro-bold, sans-serif
    }

    h3.grey {
        color: rgba(255, 255, 255, .5)
    }

    .h3--big {
        font-size: 24px;
        line-height: 40px;
        font-family: sofia-pro-semi-bold, sans-serif;
        color: #fff
    }

    h4 {
        color: #59ce61;
        font-size: 15px;
        line-height: 20px;
        margin: 0
    }

    h3.white,
    h4.white {
        color: #fff
    }

    p {
        font-size: 15px;
        line-height: 20px;
        color: #fff;
        margin-bottom: 16px
    }

    p.primary {
        color: #59ce61
    }

    p.grey {
        color: rgba(255, 255, 255, .5)
    }

    p.blue {
        color: #0a1e2e
    }

    p.blue-off {
        color: rgba(10, 30, 46, .5)
    }

    p.bold {
        font-family: sofia-pro-bold, sans-serif
    }

    p.marginless {
        margin-bottom: 0
    }

    ul li,
    ol li {
        font-size: 15px;
        font-family: sofia-pro-light, sans-serif;
        color: rgba(255, 255, 255, .5)
    }

    .no-style-list {
        list-style: none
    }

    a {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 12px;
        text-decoration: none
    }

    a:hover {
        cursor: pointer
    }

    a.mail-link {
        color: rgba(255, 255, 255, .5);
        text-decoration: underline
    }

    a.mail-link:hover {
        color: #59ce61
    }

    p a {
        font-size: inherit;
        color: inherit;
        text-decoration: underline
    }

    sup {
        top: 8px;
        font-size: 26px;
        color: rgba(255, 255, 255, .2)
    }

    small {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 12px;
        line-height: 15px;
        color: rgba(255, 255, 255, .5)
    }

    .text-center {
        text-align: center
    }

    @media screen and (max-width: 64.06125em) {
        .text-center-medium {
            text-align: center
        }
    }

    @media screen and (max-width: 39.99875em) {
        .text-center-small {
            text-align: center
        }
    }

    .text-center-left {
        text-align: center
    }

    @media screen and (max-width: 39.99875em) {
        .text-center-left {
            text-align: left
        }
    }

    .text-left-center {
        text-align: left
    }

    @media screen and (max-width: 39.99875em) {
        .text-left-center {
            text-align: center
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-up-text-right {
            text-align: right
        }
    }

    @media screen and (min-width: 40em) {
        .medium-up-text-right {
            text-align: right
        }
    }

    .float-right {
        float: right !important
    }

    @media screen and (min-width: 40em) {
        .medium-up-float-right {
            float: right !important
        }
    }

    .float-left {
        float: left !important
    }

    .float-center {
        display: block;
        margin-right: auto;
        margin-left: auto
    }

    .align-middle {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .align-start {
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start
    }

    .align-center {
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 64.06125em) {
        .align-center-med {
            -webkit-box-pack: center !important;
            -webkit-justify-content: center !important;
            -ms-flex-pack: center !important;
            justify-content: center !important
        }
    }

    .align-left {
        text-align: left
    }

    .flex-wrap {
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap
    }

    .flex-center {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .flex-start {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: start;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start
    }

    .flex-end {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
        justify-content: flex-end
    }

    .flex-end-start {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
        justify-content: flex-end
    }

    @media screen and (max-width: 64.06125em) {
        .flex-end-start {
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
    }

    .flex-bottom {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: end;
        -webkit-align-items: end;
        -ms-flex-align: end;
        align-items: end
    }

    .flex-end-top {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
        justify-content: flex-end
    }

    .flex-middle {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .flex-direction-row {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row
    }

    @media screen and (min-width: 40em) {
        .medium-flex-middle {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }
    }

    @media screen and (max-width: 64.06125em) {
        .small-flex-middle {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-only-flex-middle {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .medium-only-flex-center {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }
    }

    @media screen and (min-width: 40em) {
        .medium-flex-center {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center
        }
    }

    @media screen and (min-width: 40em) {
        .medium-flex-end-top {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    .spaced-between {
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    @media screen and (min-width: 40em) {
        .med-spaced-between {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-flex-center {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-flex-end {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    .grid-end {
        display: grid;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
        justify-content: flex-end
    }

    @media screen and (min-width: 40em) {
        .medium-flex-end {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-align-middle {
            min-height: inherit;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }
    }

    .centered-block {
        display: table-cell;
        vertical-align: middle
    }

    .flex {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .small-order-1 {
        -webkit-box-ordinal-group: 2;
        -webkit-order: 1;
        -ms-flex-order: 1;
        order: 1
    }

    .small-order-2 {
        -webkit-box-ordinal-group: 3;
        -webkit-order: 2;
        -ms-flex-order: 2;
        order: 2
    }

    .small-order-3 {
        -webkit-box-ordinal-group: 4;
        -webkit-order: 3;
        -ms-flex-order: 3;
        order: 3
    }

    .small-order-4 {
        -webkit-box-ordinal-group: 5;
        -webkit-order: 4;
        -ms-flex-order: 4;
        order: 4
    }

    .small-order-5 {
        -webkit-box-ordinal-group: 6;
        -webkit-order: 5;
        -ms-flex-order: 5;
        order: 5
    }

    .small-order-6 {
        -webkit-box-ordinal-group: 7;
        -webkit-order: 6;
        -ms-flex-order: 6;
        order: 6
    }

    @media screen and (min-width: 40em) {
        .medium-order-1 {
            -webkit-box-ordinal-group: 2;
            -webkit-order: 1;
            -ms-flex-order: 1;
            order: 1
        }

        .medium-order-2 {
            -webkit-box-ordinal-group: 3;
            -webkit-order: 2;
            -ms-flex-order: 2;
            order: 2
        }

        .medium-order-3 {
            -webkit-box-ordinal-group: 4;
            -webkit-order: 3;
            -ms-flex-order: 3;
            order: 3
        }

        .medium-order-4 {
            -webkit-box-ordinal-group: 5;
            -webkit-order: 4;
            -ms-flex-order: 4;
            order: 4
        }

        .medium-order-5 {
            -webkit-box-ordinal-group: 6;
            -webkit-order: 5;
            -ms-flex-order: 5;
            order: 5
        }

        .medium-order-6 {
            -webkit-box-ordinal-group: 7;
            -webkit-order: 6;
            -ms-flex-order: 6;
            order: 6
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-order-1 {
            -webkit-box-ordinal-group: 2;
            -webkit-order: 1;
            -ms-flex-order: 1;
            order: 1
        }

        .large-order-2 {
            -webkit-box-ordinal-group: 3;
            -webkit-order: 2;
            -ms-flex-order: 2;
            order: 2
        }

        .large-order-3 {
            -webkit-box-ordinal-group: 4;
            -webkit-order: 3;
            -ms-flex-order: 3;
            order: 3
        }

        .large-order-4 {
            -webkit-box-ordinal-group: 5;
            -webkit-order: 4;
            -ms-flex-order: 4;
            order: 4
        }

        .large-order-5 {
            -webkit-box-ordinal-group: 6;
            -webkit-order: 5;
            -ms-flex-order: 5;
            order: 5
        }

        .large-order-6 {
            -webkit-box-ordinal-group: 7;
            -webkit-order: 6;
            -ms-flex-order: 6;
            order: 6
        }
    }

    .at-bottom {
        position: absolute;
        bottom: 0;
        width: 100%
    }

    .align-end {
        -webkit-box-align: end;
        -webkit-align-items: flex-end;
        -ms-flex-align: end;
        align-items: flex-end
    }

    .space-between {
        margin: 0 5px
    }

    .contents {
        display: contents
    }

    @media screen and (max-width: 39.99875em) {
        .small-text-center {
            text-align: center
        }
    }

    html {
        -webkit-box-sizing: border-box;
        box-sizing: border-box
    }

    *,
    *::before,
    *::after {
        -webkit-box-sizing: inherit;
        box-sizing: inherit;
        -webkit-font-smoothing: antialiased
    }

    body {
        margin: 0;
        padding: 0
    }

    img {
        display: inline-block;
        vertical-align: middle;
        max-width: 100%;
        height: auto;
        -ms-interpolation-mode: bicubic
    }

    @media screen and (max-width: 39.99875em) {
        .hide-for-small-only {
            display: none !important
        }
    }

    @media screen and (max-width: 0em), screen and (min-width: 40em) {
        .show-for-small-only {
            display: none !important
        }
    }

    @media screen and (min-width: 40em) {
        .hide-for-medium {
            display: none !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .show-for-medium {
            display: none !important
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .hide-for-medium-only {
            display: none !important
        }
    }

    @media screen and (max-width: 39.99875em), screen and (min-width: 64.0625em) {
        .show-for-medium-only {
            display: none !important
        }
    }

    @media screen and (min-width: 64.0625em) {
        .hide-for-large {
            display: none !important
        }
    }

    @media screen and (max-width: 64.06125em) {
        .show-for-large {
            display: none !important
        }
    }

    @media screen and (min-width: 64.0625em) and (max-width: 74.99875em) {
        .hide-for-large-only {
            display: none !important
        }
    }

    @media screen and (max-width: 64.06125em), screen and (min-width: 75em) {
        .show-for-large-only {
            display: none !important
        }
    }

    .show-for-sr,
    .show-on-focus {
        position: absolute !important;
        width: 1px;
        height: 1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0
    }

    .show-on-focus:active,
    .show-on-focus:focus {
        position: static !important;
        width: auto;
        height: auto;
        overflow: visible;
        clip: auto;
        white-space: normal
    }

    @media screen and (max-width: 359px) {
        .hideForXsmall {
            display: none !important
        }
    }

    @media screen and (min-width: 360px) {
        .hideForXsmall {
            display: block !important
        }
    }

    @media screen and (max-width: 359px) {
        .showForXsmall {
            display: block !important
        }
    }

    @media screen and (min-width: 360px) {
        .showForXsmall {
            display: none !important
        }
    }

    .hide-trustpilot {
        display: none;
        visibility: hidden
    }

    .gray-text {
        margin-top: 10px;
        color: rgba(255, 255, 255, .5);
        max-width: 300px
    }

    .gray-link {
        color: rgba(255, 255, 255, .5);
        text-decoration: underline
    }

    .green-link {
        color: #59ce61 !important;
        font-size: 15px;
        line-height: 18px;
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    .green-link:hover {
        cursor: pointer;
        color: #4db554 !important
    }

    .white-link {
        color: #fff;
        text-decoration: underline;
        display: block;
        cursor: pointer
    }

    .white-link:hover {
        color: #59ce61
    }

    .white-off-link {
        color: rgba(255, 255, 255, .5);
        text-decoration: underline;
        display: block
    }

    .blue-off-link {
        color: rgba(10, 30, 46, .5);
        text-decoration: underline;
        display: block
    }

    .white-text {
        color: #fff
    }

    .green-text {
        color: #59ce61 !important;
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    .green-link-on-hover {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    .green-link-on-hover:hover {
        color: #59ce61 !important;
        cursor: pointer
    }

    .green-list {
        list-style: none
    }

    .green-list li {
        font-size: 15px;
        color: #fff;
        list-style: none;
        font-family: sofia-pro-regular, sans-serif;
        margin: 0 0 0 15px
    }

    .green-list li:before {
        content: "\2022";
        color: #59ce61;
        font-weight: 700;
        display: inline-block;
        width: 1em;
        margin-left: -1em
    }

    .green-list li:last-child {
        margin-bottom: 16px
    }

    .agreeText {
        font-size: 12px;
        line-height: 15px;
        color: rgba(255, 255, 255, .5);
        margin-left: 10px;
        display: inline-block
    }

    .agreeText a {
        color: rgba(255, 255, 255, .5);
        text-decoration: underline
    }

    .agreeText a:hover {
        color: #59ce61 !important
    }

    @media screen and (max-width: 39.99875em) {
        .agreeText {
            margin-left: 5px
        }
    }

    .fnt-12 {
        font-size: 12px
    }

    .muted-title {
        color: rgba(255, 255, 255, .2)
    }

    .tiny_text {
        font-size: 8px;
        line-height: 14px;
        font-family: sofia-pro-regular, sans-serif
    }

    .disabled_text {
        color: rgba(255, 255, 255, .5)
    }

    .subtitle-text {
        font-size: 14px;
        font-family: sofia-pro-regular, sans-serif;
        color: rgba(255, 255, 255, .5);
        margin-bottom: 10px
    }

    .pad0 {
        padding: 0 !important
    }

    .padL0 {
        padding-left: 0 !important
    }

    .padL10 {
        padding-left: 10px
    }

    .padL30 {
        padding-left: 30px
    }

    .padR0 {
        padding-right: 0 !important
    }

    .padR5 {
        padding-right: 5px
    }

    .padR10 {
        padding-right: 10px
    }

    .padR15 {
        padding-right: 15px
    }

    .padR20 {
        padding-right: 20px
    }

    .padT10 {
        padding-top: 10px
    }

    .padT20 {
        padding-top: 20px
    }

    .padLR30 {
        padding-left: 30px;
        padding-right: 30px
    }

    @media screen and (min-width: 40em) {
        .med-up-padL10 {
            padding-left: 10px
        }
    }

    @media screen and (min-width: 40em) {
        .med-up-padR10 {
            padding-right: 10px
        }
    }

    @media screen and (min-width: 40em) {
        .med-up-padR15 {
            padding-right: 15px
        }
    }

    .mar-top-auto {
        margin: auto 0 0
    }

    .mar-0 {
        margin: 0 !important
    }

    .mar-top-0 {
        margin-top: 0 !important
    }

    .mar-top-10 {
        margin: 10px 0 0
    }

    .mar-top-12 {
        margin: 10px 0 0
    }

    .mar-top-20 {
        margin: 20px 0 0
    }

    .mar-top-40 {
        margin: 40px 0 0
    }

    .mar-top-45 {
        margin: 45px 0 0
    }

    .mar-top-50 {
        margin-top: 50px
    }

    .mar-top-60 {
        margin-top: 60px
    }

    .mar-top-30 {
        margin: 30px 0 0
    }

    .mar-bot-0 {
        margin-bottom: 0
    }

    .mar-bot-5 {
        margin-bottom: 5px
    }

    .mar-bot-10 {
        margin-bottom: 10px
    }

    .mar-bot-15 {
        margin-bottom: 15px
    }

    .mar-bot-20 {
        margin-bottom: 20px
    }

    .mar-bot-30 {
        margin-bottom: 30px
    }

    .mar-bot-40 {
        margin-bottom: 40px
    }

    .mar-bot-50 {
        margin-bottom: 50px
    }

    .mar-bot-60 {
        margin-bottom: 60px
    }

    .mar-bot-80 {
        margin-bottom: 80px
    }

    @media screen and (min-width: 64.0625em) {
        .large-up-mar-top-20 {
            margin-top: 20px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-up-mar-bot-40 {
            margin-bottom: 40px
        }
    }

    @media screen and (min-width: 40em) {
        .medium-up-bot-20 {
            margin-bottom: 20px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .medium-o-m-top-10 {
            margin-top: 10px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .medium-mar-bot-20 {
            margin-bottom: 20px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .medium-pad-bot-50 {
            padding-bottom: 50px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-top-10 {
            margin-top: 10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-top-15 {
            margin-top: 15px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-top-20 {
            margin-top: 20px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-m-top-20-imp {
            margin-top: 20px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-tb-30 {
            margin: 30px 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-bot-150 {
            margin-bottom: 150px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-bot-40 {
            margin-bottom: 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-bot-20 {
            margin-bottom: 20px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .small-mar-bot-10 {
            margin-bottom: 10px
        }
    }

    @media screen and (max-width: 359px) {
        .x-small-mar-bot-15 {
            margin-bottom: 15px
        }
    }

    .mar-right-0 {
        margin-right: 0 !important
    }

    .mar-right-5 {
        margin-right: 5px
    }

    .mar-right-10 {
        margin-right: 10px
    }

    .mar-right-20 {
        margin-right: 20px
    }

    .mar-right-25 {
        margin-right: 25px
    }

    .mar-right-30 {
        margin-right: 30px
    }

    .mar-left-10 {
        margin-left: 10px
    }

    .mar-sides-10 {
        margin: 0 10px
    }

    .pad-bot-10 {
        padding-bottom: 10px
    }

    .menu p {
        margin: 0
    }

    .mar-auto {
        margin-right: auto;
        margin-left: auto
    }

    .is-marginless {
        margin: 0
    }

    .is-with-margin {
        margin: 30px 0 0
    }

    @media screen and (max-width: 39.99875em) {
        .is-with-margin {
            margin: 30px
        }
    }

    .no-mar-bot input {
        margin-bottom: 0
    }

    .is-spaced {
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    @media screen and (max-width: 64.06125em) {
        .side-pad {
            padding-right: 40px;
            padding-left: 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .side-pad {
            padding-right: 30px;
            padding-left: 30px
        }
    }

    @media screen and (max-width: 340px) {
        .side-pad {
            padding-right: 10px;
            padding-left: 10px
        }
    }

    .no-scroll {
        position: fixed;
        left: 0;
        right: 0
    }

    .before-fade-in {
        opacity: 0
    }

    .fade-in {
        -webkit-animation: fadeIn 1s ease-in both running;
        animation: fadeIn 1s ease-in both running
    }

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0
        }

        to {
            opacity: 1
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0
        }

        to {
            opacity: 1
        }
    }

    body {
        background: #0a1e2e
    }

    @media screen and (max-width: 39.99875em) {
        body.test-body {
            position: fixed;
            overflow: hidden;
            width: 100%
        }
    }

    body.active {
        position: fixed;
        overflow-y: scroll;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0
    }

    body.active.test-body {
        overflow-y: auto
    }

    @media screen and (max-width: 39.99875em) {
        body.active .show-light-logo {
            display: block
        }

        body.active .show-dark-logo {
            display: none
        }
    }

    body.active::-webkit-scrollbar {
        background-color: transparent
    }

    @media screen and (min-width: 40em) {
        .show-light-logo {
            display: block
        }
    }

    @media screen and (max-width: 39.99875em) {
        .show-light-logo {
            display: none
        }
    }

    @media screen and (min-width: 40em) {
        .show-dark-logo {
            display: none
        }
    }

    @media screen and (max-width: 39.99875em) {
        .show-dark-logo {
            display: block
        }
    }

    .line {
        border-top: 1px solid rgba(112, 112, 112, .1)
    }

    .wrapper {
        position: relative
    }

    @media screen and (min-width: 40em) {
        .wrapper {
            min-height: 100vh
        }
    }

    .other_pages {
        min-height: 100vh;
        overflow: hidden;
        display: block;
        padding-bottom: 281px
    }

    @media screen and (min-width: 605px) and (max-width: 1199px) {
        .other_pages {
            padding-bottom: 221px
        }
    }

    @media screen and (min-width: 355px) and (max-width: 606px) {
        .other_pages {
            padding-bottom: 156px
        }
    }

    @media screen and (max-width: 375px) {
        .other_pages {
            padding-bottom: 191px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .other_pages.with_tabs .transparent {
            padding: 100px 30px 80px
        }
    }

    .grecaptcha-badge {
        display: none
    }

    .green-line {
        border-top: 3px solid #59ce61;
        width: 38px;
        margin: 30px auto 16px
    }

    .button {
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border: none;
        cursor: pointer;
        display: inline-block;
        font-family: sofia-pro-semi-bold, sans-serif;
        text-align: center;
        text-decoration: none !important;
        padding: 7px 15px;
        min-width: 100px;
        position: relative;
        overflow: hidden;
        vertical-align: middle;
        z-index: 0;
        color: #fff
    }

    @media (max-width: 320px) {
        .button {
            padding: 10px
        }
    }

    .button:hover {
        color: #fff;
        cursor: pointer
    }

    .button:hover .button__hovered {
        width: 210%;
        height: 262.5px
    }

    .button:focus {
        outline: none;
        border: none;
        color: #fff
    }

    .button__hovered {
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        border-radius: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        z-index: -1;
        -webkit-transition: width .4s ease-in-out, height .4s ease-in-out;
        transition: width .4s ease-in-out, height .4s ease-in-out
    }

    .button--blue-off {
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        background: rgba(10, 30, 46, .1);
        font-size: 15px;
        color: #0a1e2e;
        padding: 10px 20px;
        height: 40px;
        line-height: 1.1
    }

    .button--blue-off .button__hovered {
        background: rgba(10, 30, 46, .2)
    }

    .button--blue-off:hover,
    .button--blue-off:focus {
        color: #0a1e2e
    }

    .button--big {
        border-radius: 25px !important;
        font-size: 17px !important;
        padding: 15px 20px !important;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        min-width: 140px;
        height: 50px !important
    }

    .button--bigger {
        border-radius: 30px !important;
        font-size: 20px !important;
        padding: 15px 20px !important;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        min-width: 140px;
        height: 60px !important
    }

    @media screen and (max-width: 39.99875em) {
        .button--bigger {
            font-size: 18px !important;
            padding: 15px !important;
            height: 50px !important
        }
    }

    .button--green {
        background: #59ce61;
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        font-size: 15px;
        padding: 11px 18px;
        height: 40px;
        color: #fff;
        line-height: 1.1
    }

    @media screen and (max-width: 39.99875em) {
        .button--green {
            padding: 11px 12px
        }
    }

    .button--green .button__hovered {
        background-color: #4db554
    }

    .button--green--large {
        background: #59ce61;
        border-radius: 30px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        font-size: 20px;
        padding: 18px 30px 22px;
        height: 60px;
        line-height: 1.1
    }

    @media screen and (max-width: 39.99875em) {
        .button--green--large {
            font-size: 18px;
            padding: 15px 13px;
            height: 50px
        }
    }

    .button--green--large .button__hovered {
        background-color: #4db554
    }

    .button--green--big {
        border-radius: 40px;
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        font-size: 18px;
        padding: 19px 28px;
        height: 60px;
        line-height: 1.1
    }

    @media screen and (max-width: 39.99875em) {
        .button--green--big {
            padding: 15px 20px;
            height: 50px
        }
    }

    .button--green--medium {
        border-radius: 30px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        font-size: 18px;
        padding: 14px 28px;
        height: 50px;
        line-height: 1.1
    }

    @media screen and (max-width: 39.99875em) {
        .button--green--medium {
            font-size: 15px;
            padding: 11px 18px;
            height: 40px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .button.nav-btn .is-left,
        .button.nav-btn .is-right {
            margin-left: 0 !important;
            margin-right: 0 !important
        }
    }

    .button--white {
        background: rgba(255, 255, 255, .1);
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        padding: 10px 19px;
        font-size: 15px;
        color: #fff;
        line-height: 1.4;
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content
    }

    @media screen and (max-width: 39.99875em) {
        .button--white {
            padding: 10px 12px
        }
    }

    .button--white.nav-btn {
        color: #fff
    }

    .button--white.nav-btn:hover {
        color: #fff
    }

    .button--white:hover {
        color: #fff
    }

    .button--white.disable {
        color: rgba(255, 255, 255, .2)
    }

    .button--white.disable span {
        opacity: .2
    }

    .button--white .button__hovered {
        background: rgba(255, 255, 255, .2)
    }

    .button--white--big {
        border-radius: 30px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        font-size: 18px;
        height: 60px;
        padding: 19px 28px;
        color: #59ce61;
        line-height: 1.1
    }

    .button--white--big:hover {
        color: #59ce61
    }

    .button--white--medium {
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        font-size: 18px;
        padding: 14px 28px;
        height: 50px;
        color: #fff;
        line-height: 1.1
    }

    .button--white--medium:hover {
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .button--white--medium {
            font-size: 15px;
            padding: 11px 18px;
            height: 40px
        }
    }

    .button--white-off {
        background-color: rgba(255, 255, 255, .2);
        font-size: 15px;
        line-height: 18px;
        padding: 11px 15px;
        color: #59ce61
    }

    .button--white-off:hover {
        color: #59ce61
    }

    .button--white-off .button__hovered {
        background-color: rgba(255, 255, 255, .1);
        color: #59ce61
    }

    .button--grey-white {
        background: rgba(10, 30, 46, .1);
        color: #0a1e2e;
        font-size: 15px
    }

    .button--grey-white:hover {
        color: #0a1e2e
    }

    .button--grey-white .button__hovered {
        background-color: rgba(10, 30, 46, .15);
        color: #0a1e2e !important
    }

    .button--grey-green {
        background: rgba(10, 30, 46, .1);
        color: #59ce61;
        font-size: 15px;
        padding: 10px 20px
    }

    .button--grey-green:hover {
        color: #59ce61
    }

    .button--grey-green .button__hovered {
        background-color: rgba(10, 30, 46, .15);
        color: #59ce61 !important
    }

    .button--white-img {
        background: #fff;
        padding: 0 15px;
        height: 60px;
        width: 155px;
        border-radius: 30px;
        border: 2px solid rgba(10, 30, 46, .08);
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .button--white-img img {
        height: -webkit-fit-content;
        height: -moz-fit-content;
        height: fit-content
    }

    .button--white-img .button__hovered {
        background-color: rgba(10, 30, 46, .08)
    }

    .button--transparent {
        background: 0 0;
        color: #4db554
    }

    .button--transparent:hover {
        color: #4db554
    }

    .button--clear {
        background: 0 0;
        color: #083a50;
        font-family: sofia-pro-regular, sans-serif;
        border: 2px solid rgba(10, 30, 46, .1);
        min-height: 40px
    }

    .button--clear span {
        font-family: sofia-pro-semi-bold, sans-serif
    }

    .button--clear:hover,
    .button--clear:focus {
        border: 2px solid rgba(10, 30, 46, .1);
        color: #083a50;
        opacity: .8
    }

    .button__no-margin {
        margin: 0 !important
    }

    .button--grey {
        background-color: rgba(255, 255, 255, .05);
        font-size: 15px
    }

    .button--grey .button__hovered {
        background-color: rgba(255, 255, 255, .1)
    }

    .button--grey .notification {
        width: 8px;
        height: 8px;
        border-radius: 10px;
        position: absolute;
        top: 12px;
        right: 30px;
        background: #59ce61;
        margin: 0
    }

    .button--grey.white-text {
        color: #fff
    }

    .button--grey.white-text:hover {
        color: #fff
    }

    .button--grey.white-text .button__hovered {
        background-color: #4db554
    }

    .button--red {
        background: #db3236;
        font-size: 14px
    }

    @media screen and (max-width: 39.99875em) {
        .button--red {
            width: 100% !important
        }
    }

    .button--red:hover {
        background-color: #c52d31
    }

    .button--blue {
        background: #3b5998;
        font-size: 14px
    }

    @media screen and (max-width: 39.99875em) {
        .button--blue {
            width: 100% !important
        }
    }

    .button--blue:hover {
        background-color: #355089
    }

    .button--paypal {
        color: #000;
        line-height: normal
    }

    .button--paypal--light {
        background: #f6c557
    }

    .button--paypal--light:focus,
    .button--paypal--light:visited {
        background: #f6c557
    }

    .button--paypal--dark {
        background: #253b80
    }

    @media (max-width: 1439px) and (min-width: 1025px) {
        .button--paypal {
            padding: 10px
        }
    }

    .button--paypal .paypal-icon {
        margin-top: -2px
    }

    .button--paypal:hover {
        background: #f6c557;
        color: #000
    }

    .button--paypal .button__hovered {
        background: #f6b03d
    }

    .button--menu {
        background-color: rgba(255, 255, 255, .05);
        color: #59ce61;
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 15px;
        margin: 0 15px;
        padding: 7px 15px;
        height: 40px;
        line-height: 1.3;
        -webkit-box-align: center !important;
        -webkit-align-items: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 820px) {
        .button--menu {
            margin: 0 8px
        }
    }

    @media screen and (max-width: 740px) {
        .button--menu {
            margin: 0 5px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .button--menu {
            padding: 7px 10px
        }
    }

    .button--menu .hideForMediumUp {
        display: inline-block
    }

    @media screen and (min-width: 40em) {
        .button--menu .hideForMediumUp {
            display: none
        }
    }

    @media screen and (max-width: 39.99875em) {
        .button--menu {
            margin: 0 10px 0 5px !important
        }
    }

    @media screen and (max-width: 39.99875em) and (max-width: 350px) {
        .button--menu {
            margin: 0 5px 0 0 !important;
            padding: 8px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .button--menu .hideText {
            display: none
        }
    }

    @media screen and (max-width: 375px) {
        .button--menu.pay {
            min-width: 85px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .button--menu.button--with-icon {
            line-height: 18px
        }

        .button--menu.button--with-icon .small-icon,
        .button--menu.button--with-icon .upgrade-icon,
        .button--menu.button--with-icon .small-icons {
            display: inline-block
        }

        .button--menu.button--with-icon .small-icon.is-right,
        .button--menu.button--with-icon .upgrade-icon.is-right,
        .button--menu.button--with-icon .small-icons.is-right {
            margin: 1px 0 1px 10px !important
        }
    }

    .button--menu:hover {
        color: #59ce61
    }

    .button--menu .button__hovered {
        background-color: rgba(255, 255, 255, .1)
    }

    .button--facebook {
        background: #4267b2;
        font-size: 15px
    }

    .button--facebook .button__hovered {
        background: #294f9a
    }

    .button--twitter {
        background: #1da1f2;
        font-size: 15px
    }

    .button--twitter .button__hovered {
        background: #0488d9
    }

    .button--linkedin {
        background: #2867b2;
        font-size: 15px
    }

    .button--linkedin .button__hovered {
        background: #0f4e99
    }

    .button--filter {
        background: #59ce61;
        font-size: 15px
    }

    .button--retake {
        margin: 0
    }

    @media screen and (max-width: 39.99875em) {
        .button--retake {
            min-width: auto;
            padding: 10px 12px
        }
    }

    .button--retake__text {
        margin: 0;
        line-height: 1.4
    }

    .button--retake__icon {
        margin: 0 0 0 10px
    }

    .button--trustpilot {
        background: #e1e5e9;
        color: #0a1e2e;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 0;
        width: -webkit-fit-content;
        width: -moz-fit-content;
        width: fit-content;
        font-size: 15px
    }

    .button--trustpilot__text {
        margin: auto 5px
    }

    .button--trustpilot:hover,
    .button--trustpilot:focus {
        color: #0a1e2e
    }

    .button--trustpilot .button__hovered {
        background-color: rgba(10, 30, 46, .1)
    }

    @media screen and (max-width: 39.99875em) {
        .button--small {
            min-width: 70px
        }
    }

    .button .small-icon,
    .button .upgrade-icon,
    .button .small-icons {
        display: inline-block
    }

    .button .small-icon.is-left,
    .button .upgrade-icon.is-left,
    .button .small-icons.is-left {
        margin-right: 10px
    }

    .button--answer {
        background: rgba(89, 206, 97, .5);
        border-radius: 25px;
        height: 35px;
        margin-right: 4px;
        margin-bottom: 4px;
        min-width: unset;
        padding: 0;
        width: 35px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 360px) {
        .button--answer {
            margin-right: 2px;
            margin-bottom: 2px
        }
    }

    .button--answer__number {
        margin: 0;
        font-family: sofia-pro-bold, sans-serif !important
    }

    .button--answer.wrong {
        background: rgba(255, 55, 55, .5)
    }

    .button--answer.wrong .button__hovered {
        background: #ff3737
    }

    .button--with-icon {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        line-height: 1.1;
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content
    }

    .button--with-svg {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 4px 15px 5px 4px;
        min-width: 230px
    }

    .button--text {
        margin: 5px 0
    }

    .button--scroll {
        background: rgba(89, 206, 97, .5);
        border-radius: 20px;
        width: 40px;
        height: 40px;
        min-width: auto;
        line-height: normal;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .button--scroll:hover {
        cursor: pointer;
        background-color: #59ce61
    }

    @media screen and (min-width: 64.0625em) {
        .button--group-licensing {
            float: right
        }
    }

    .see-all:hover .right-arrow {
        visibility: visible;
        cursor: pointer;
        -webkit-animation: fadeIn .5s ease forwards;
        animation: fadeIn .5s ease forwards
    }

    .see-all .right-arrow {
        visibility: hidden;
        margin: 0 0 0 10px
    }

    .see-all .left-arrow {
        visibility: hidden;
        margin: 0 10px 0 0
    }

    @media screen and (max-width: 64.06125em) {
        .see-all--industries {
            margin: 0 0 20px
        }
    }

    .text-button {
        margin: 0 10px;
        z-index: 3;
        padding: 0;
        background-color: transparent;
        min-width: auto;
        color: #59ce61;
        text-decoration: underline;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif
    }

    @media screen and (max-width: 39.99875em) {
        .text-button {
            font-size: 13px
        }
    }

    .text-button-small {
        margin: 0 10px;
        z-index: 3;
        padding: 0;
        background-color: transparent;
        min-width: auto;
        color: #59ce61;
        text-decoration: underline;
        font-size: 12px;
        font-family: sofia-pro-regular, sans-serif
    }

    .button-link {
        color: #59ce61;
        background: 0 0;
        padding: 0;
        display: inline-block;
        width: auto;
        height: auto;
        margin: 0 0 0 5px;
        min-width: auto
    }

    .button-link:hover {
        color: #59ce61;
        text-decoration: underline
    }

    @media screen and (max-width: 39.99875em) {
        .small-blk .button {
            min-width: 70px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .capsule--tests__button .button {
            min-width: 80px
        }
    }

    .custom-button {
        position: relative;
        overflow: hidden;
        vertical-align: middle;
        z-index: 0
    }

    .custom-button:hover .button__hovered {
        width: 210%;
        height: 262.5px
    }

    .custom-button.group__button--positive .button__hovered,
    .custom-button.group__button--plus .button__hovered {
        background-color: #4db554
    }

    .custom-button.group__button--negative .button__hovered,
    .custom-button.group__button--minus .button__hovered {
        background-color: rgba(255, 255, 255, .3)
    }

    .buttons-line--full {
        margin-top: 0 !important;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex
    }

    .buttons-line--full .button--with-svg {
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content;
        min-width: 230px;
        margin-right: 0 !important
    }

    .buttons-line--full .button--with-icon {
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content
    }

    .buttons-line--full.with-space .button:first-child {
        margin: 0 16px 10px 0 !important
    }

    @media screen and (max-width: 369px) {
        .buttons-line--full {
            display: inline-block
        }

        .buttons-line--full .button:first-child {
            margin: 0 0 10px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .buttons-line--full--mob {
            display: inline-block
        }

        .buttons-line--full--mob .button:first-child {
            margin: 0 0 15px !important
        }
    }

    .buttons-line .button .small-icon.lock-white {
        margin: 0 0 0 5px
    }

    .buttons-line .button .small-icon.magnify {
        margin: 2px 5px 0 0;
        opacity: .5
    }

    .button:hover .small-icon.lock-white {
        opacity: 1;
        background-position: -118px -33px
    }

    .button:hover .small-icon.magnify {
        opacity: 1
    }

    @supports (-webkit-appearance: -apple-pay-button) {
        .apple-pay-button-with-text {
            display: inline-block;
            -webkit-appearance: -apple-pay-button;
            -apple-pay-button-type: check-out;
            width: 240px;
            border-radius: 10px !important
        }

        .apple-pay-button-with-text > * {
            display: none
        }

        .apple-pay-button-black-with-text {
            -apple-pay-button-style: #000
        }
    }

    @supports not (-webkit-appearance: -apple-pay-button) {
        .apple-pay-button-with-text {
            --apple-pay-scale: 1;
            display: -webkit-inline-box;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            font-size: 12px;
            border-radius: 5px;
            padding: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            min-width: 200px;
            min-height: 32px;
            max-height: 64px
        }

        .apple-pay-button-black-with-text {
            background-color: #000;
            color: #fff
        }

        .apple-pay-button-with-text.apple-pay-button-black-with-text > .logo {
            background-image: -webkit-named-image(apple-pay-logo-white);
            background-color: #000
        }

        .apple-pay-button-with-text > .text {
            font-family: -apple-system;
            font-size: calc(1em * var(--apple-pay-scale));
            font-weight: 300;
            -webkit-align-self: center;
            -ms-flex-item-align: center;
            align-self: center;
            margin-right: calc(2px * var(--apple-pay-scale))
        }

        .apple-pay-button-with-text > .logo {
            width: calc(35px * var(--scale));
            height: 100%;
            -webkit-background-size: 100% 60%;
            background-size: 100% 60%;
            background-repeat: no-repeat;
            background-position: 0 50%;
            margin-left: calc(2px * var(--apple-pay-scale));
            border: none
        }
    }

    .popup-social-button {
        height: 40px;
        background-color: rgba(8, 58, 80, .1);
        width: 100%;
        border-radius: 20px;
        cursor: pointer;
        padding: 10px;
        position: relative
    }

    .popup-social-button .small-icon,
    .popup-social-button .small-icons {
        position: absolute;
        left: 20px;
        top: 13px
    }

    .popup-social-button p {
        color: #083a50
    }

    .popup-social-button button {
        width: 100%
    }

    .paypal-button-container .paypal-button-row .paypal-button-text,
    .paypal-button-container .paypal-button-row .paypal-button-space {
        font-size: 16px !important;
        margin-top: 0 !important;
        line-height: 24px !important;
        font-weight: 400 !important
    }

    .tooltip-trigger {
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-size: 12px;
        font-family: sofia-pro-regular, sans-serif;
        line-height: 12px;
        text-align: center;
        position: relative;
        margin: 0
    }

    .tooltip-trigger.into-field {
        top: 11px;
        right: 10px
    }

    .tooltip-trigger.into-field .tooltip {
        min-width: 10rem
    }

    @media (max-width: 1440px) and (min-width: 1280px) {
        .tooltip-trigger.into-field .tooltip {
            right: 35%;
            -webkit-transform: translateX(35%);
            -ms-transform: translateX(35%);
            transform: translateX(35%)
        }

        .tooltip-trigger.into-field .tooltip:before {
            right: 35%;
            -webkit-transform: translateX(35%);
            -ms-transform: translateX(35%);
            transform: translateX(35%)
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tooltip-trigger.into-field .tooltip {
            right: 25%;
            -webkit-transform: translateX(25%);
            -ms-transform: translateX(25%);
            transform: translateX(25%)
        }

        .tooltip-trigger.into-field .tooltip:before {
            right: 25%;
            -webkit-transform: translateX(25%);
            -ms-transform: translateX(25%);
            transform: translateX(25%)
        }
    }

    .tooltip-trigger.into-label {
        top: 5px;
        left: 5px
    }

    .tooltip-trigger.align-left {
        text-align: left
    }

    .tooltip-trigger.blue-tooltip .tooltip {
        background-color: #0a1e2e;
        text-align: left
    }

    @media screen and (max-width: 39.99875em) {
        .tooltip-trigger.blue-tooltip .tooltip {
            min-width: 11rem
        }
    }

    .tooltip-trigger.blue-tooltip .tooltip:before {
        border-top: 12px solid #0a1e2e !important
    }

    .tooltip-trigger.blue-off-tooltip {
        margin: 0 0 0 5px
    }

    .tooltip-trigger.blue-off-tooltip.cvv-tooltip {
        position: absolute;
        margin: 0 0 10px 5px;
        right: 10px
    }

    .tooltip-trigger.blue-off-tooltip.cvv-tooltip .tooltip {
        min-width: 9rem;
        right: 20%;
        -webkit-transform: translateX(20%);
        -ms-transform: translateX(20%);
        transform: translateX(20%)
    }

    .tooltip-trigger.blue-off-tooltip.cvv-tooltip .tooltip:before {
        right: 20%;
        -webkit-transform: translateX(20%);
        -ms-transform: translateX(20%);
        transform: translateX(20%)
    }

    .tooltip-trigger.blue-off-tooltip .tooltip {
        background-color: #0a1e2e;
        text-align: left;
        min-width: 7rem;
        right: 20%;
        -webkit-transform: translateX(20%);
        -ms-transform: translateX(20%);
        transform: translateX(20%);
        z-index: 100
    }

    .tooltip-trigger.blue-off-tooltip .tooltip:before {
        border-top: 12px solid #0a1e2e !important;
        right: 20%;
        -webkit-transform: translateX(20%);
        -ms-transform: translateX(20%);
        transform: translateX(20%)
    }

    .tooltip {
        background-color: #317647;
        border-radius: 15px;
        color: #fff;
        display: inline-block;
        font-size: 12px;
        font-family: sofia-pro-regular, sans-serif;
        line-height: 12px;
        min-width: 11rem;
        padding: 10px;
        position: absolute;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
        visibility: hidden;
        z-index: 2
    }

    @media screen and (max-width: 39.99875em) {
        .tooltip {
            min-width: 8rem
        }
    }

    .tooltip:before {
        content: "";
        position: absolute;
        top: 100%;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-top: 12px solid #317647 !important;
        border-right: 10px solid transparent
    }

    .tooltip__red {
        background-color: #f85757
    }

    .tooltip__red:before {
        border-top-color: #f85757 !important
    }

    .tooltip.top {
        bottom: 160%
    }

    @media screen and (max-width: 1279px) {
        .tooltip.bottom-for-smaller {
            top: 30px;
            bottom: unset !important
        }

        .tooltip.bottom-for-smaller:before {
            top: unset;
            bottom: 100%;
            border-bottom: 12px solid #317647 !important;
            border-top: none !important
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .tooltip.bottom-for-smaller {
            min-width: 9rem
        }
    }

    .tooltip--notice {
        visibility: visible;
        bottom: calc(100% + 6px);
        font-size: 13px;
        line-height: 1.1
    }

    .tooltip--popover {
        min-width: 5rem;
        width: 11rem;
        -webkit-transform: translate(-87px, -141%);
        -ms-transform: translate(-87px, -141%);
        transform: translate(-87px, -141%);
        visibility: visible;
        right: unset;
        text-align: center
    }

    .tooltip--popover:before {
        top: 98%
    }

    @media screen and (max-width: 1560px) and (min-width: 1025px) {
        .tooltip--popover {
            width: 8rem;
            text-align: left;
            -webkit-transform: translate(-50px, -130%);
            -ms-transform: translate(-50px, -130%);
            transform: translate(-50px, -130%)
        }

        .tooltip--popover:before {
            right: 65%;
            -webkit-transform: translateX(65%);
            -ms-transform: translateX(65%);
            transform: translateX(65%)
        }
    }

    @media screen and (max-width: 64.06125em) {
        .tooltip--popover {
            width: 7rem;
            text-align: left;
            -webkit-transform: translate(-56px, -124%);
            -ms-transform: translate(-56px, -124%);
            transform: translate(-56px, -124%)
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tooltip--popover {
            -webkit-transform: translate(-42px, -127%);
            -ms-transform: translate(-42px, -127%);
            transform: translate(-42px, -127%)
        }

        .tooltip--popover:before {
            right: 62%
        }
    }

    @media (max-width: 320px) {
        .tooltip--popover {
            -webkit-transform: translate(-42px, -112%);
            -ms-transform: translate(-42px, -112%);
            transform: translate(-42px, -112%);
            width: 5rem
        }

        .tooltip--popover:before {
            right: 50%
        }
    }

    .tooltip-trigger:hover .tooltip {
        overflow: visible;
        visibility: visible
    }

    .on_error .custom-checkbox {
        border: 1px solid #ff3737
    }

    .on_error .agreeText {
        color: #ff3737 !important
    }

    .on_error .agreeText a {
        color: #ff3737 !important
    }

    .red-warning {
        position: absolute;
        bottom: 13px;
        right: 10px;
        color: transparent;
        z-index: 0;
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        background-position: -482px -9px;
        width: 16px;
        height: 16px
    }

    .red-warning--inline {
        position: relative;
        bottom: 3px;
        left: 0
    }

    .red-warning.tooltip-trigger {
        line-height: 15px
    }

    .red-warning .tooltip {
        max-width: none;
        min-width: unset;
        white-space: nowrap;
        text-align: center;
        line-height: 16px;
        padding: 6px 10px
    }

    @media screen and (max-width: 39.99875em) {
        .red-warning .tooltip {
            max-width: 11rem;
            min-width: 125px;
            white-space: unset;
            padding: 6px;
            right: 30px;
            font-size: 12px
        }
    }

    .red-warning .tooltip.red {
        background: #ff3737 !important
    }

    .red-warning .tooltip:before {
        border-left: 8px solid transparent;
        border-top: 10px solid #ff3737 !important;
        border-right: 8px solid transparent
    }

    @media screen and (max-width: 39.99875em) {
        .red-warning .tooltip:before {
            right: 30%;
            -webkit-transform: translateX(30%);
            -ms-transform: translateX(30%);
            transform: translateX(30%)
        }
    }

    .red-warning .tooltip.top {
        bottom: 160%
    }

    .red-warning .tooltip.top::after {
        top: 100%;
        border-color: #ff3737 transparent transparent transparent
    }

    .red-warning .tooltip:hover {
        display: none
    }

    .input-tick .red-warning {
        right: -25px;
        top: 8px
    }

    .input-tick .error {
        margin-top: 10px
    }

    .error .tooltip {
        background: #ff3737 !important
    }

    .error .tooltip:before {
        border-top: 15px solid #ff3737 !important
    }

    .error {
        color: red;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 10px;
        margin-bottom: 10px
    }

    .select-label.err .error {
        margin-top: 0
    }

    .err {
        position: relative
    }

    .err.cvc .red-warning {
        top: 11px
    }

    .err input,
    .err select,
    .err textarea {
        border: 2px solid #ff3737 !important
    }

    .share-email-input .err input,
    .share-email-input .err select,
    .share-email-input .err textarea {
        border: 2px solid red !important
    }

    .content-wrapper {
        background-color: rgba(255, 255, 255, .03);
        padding: 30px
    }

    .content-wrapper--light {
        background-color: rgba(255, 255, 255, .1)
    }

    .content-wrapper--padB-0 {
        padding: 30px 30px 0
    }

    .content-wrapper--padB-0 .affiliates__table-container {
        padding: 0 0 30px
    }

    @media all and (max-width: 1330px) {
        .content-wrapper--padB-0 .affiliates__table-container {
            padding: 0 0 20px
        }
    }

    .content-wrapper--less-padding {
        padding: 20px 30px
    }

    .content-wrapper__bold-title {
        font-size: 18px;
        font-family: sofia-pro-bold, sans-serif
    }

    .banner-top {
        background-repeat: no-repeat !important;
        -webkit-background-size: cover !important;
        background-size: cover !important;
        width: 100% !important;
        background-position: 70% center
    }

    .banner-top__title {
        font-size: 30px;
        line-height: 55px;
        margin: 0 auto;
        color: #59ce61
    }

    @media screen and (max-width: 64.06125em) {
        .banner-top__title {
            line-height: 40px
        }
    }

    .banner-top__title-home {
        font-size: 55px;
        line-height: 60px;
        font-family: sofia-pro-bold, sans-serif;
        max-width: 600px;
        margin: 0 auto 20px !important
    }

    @media screen and (max-width: 1200px) and (min-width: 1025px) {
        .banner-top__title-home {
            font-size: 52px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .banner-top__title-home {
            margin: 30px auto 20px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top__title-home {
            font-size: 35px;
            line-height: 38px;
            margin-top: 30px !important;
            margin-bottom: 20px;
            max-width: 275px
        }
    }

    .banner-top__title-home span {
        font-family: sofia-pro-light, sans-serif
    }

    .banner-top__title-student {
        padding-bottom: 50px
    }

    .banner-top__title-tests {
        font-size: 35px;
        line-height: 40px;
        margin: 0 0 10px 15px
    }

    @media screen and (max-width: 350px) {
        .banner-top__title-tests {
            margin: 15px 0
        }
    }

    .banner-top__subtitle {
        max-width: 525px;
        margin: 0 auto;
        margin-bottom: 45px;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 21px
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top__subtitle {
            font-size: 18px;
            line-height: 23px;
            max-width: 315px;
            margin-bottom: 20px
        }
    }

    .banner-top__subtitle span {
        font-family: sofia-pro-bold, sans-serif
    }

    .banner-top__description {
        font-size: 60px;
        line-height: 55px;
        margin: 0 auto;
        max-width: 800px;
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top__description {
            font-size: 40px;
            line-height: 40px
        }
    }

    .banner-top--home {
        background: #091926;
        background: -webkit-radial-gradient(5% 105%, ellipse, #4f5458 0%, #212b34 17%, #091926 35%, transparent 100%), -webkit-radial-gradient(70% -10%, circle, #5c6063 0%, #2a3c4a 0%, #243644, #1a2b3b, #0d202f, #0b1c2c, #091926 90%);
        background: radial-gradient(ellipse at 5% 105%, #4f5458 0%, #212b34 17%, #091926 35%, transparent 100%), radial-gradient(circle at 70% -10%, #5c6063 0%, #2a3c4a 0%, #243644, #1a2b3b, #0d202f, #0b1c2c, #091926 90%);
        background-position: bottom !important;
        -webkit-background-size: cover !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        height: 100vh;
        display: table;
        position: relative
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home {
            height: 100%;
            background: -webkit-radial-gradient(5% 115%, ellipse, #4f5458 0%, #212b34 17%, #091926 35%, transparent 100%), -webkit-radial-gradient(70% -10%, circle, #5c6063 0%, #2a3c4a 0%, #243644, #1a2b3b, #0d202f, #0b1c2c, #091926 90%);
            background: radial-gradient(ellipse at 5% 115%, #4f5458 0%, #212b34 17%, #091926 35%, transparent 100%), radial-gradient(circle at 70% -10%, #5c6063 0%, #2a3c4a 0%, #243644, #1a2b3b, #0d202f, #0b1c2c, #091926 90%)
        }
    }

    .banner-top--home .grid-container {
        position: relative;
        min-height: 600px
    }

    @media screen and (max-width: 1300px) {
        .banner-top--home .grid-container {
            padding: 0 40px !important
        }
    }

    @media screen and (max-width: 64.06125em) {
        .banner-top--home .grid-container {
            min-height: 740px;
            padding: 50px 40px 0 !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home .grid-container {
            min-height: 640px;
            padding: 0 30px 0 !important
        }
    }

    @media screen and (max-width: 640px) {
        .banner-top--home .grid-container {
            padding: 0 10px !important
        }
    }

    .banner-top--home .circle {
        position: absolute;
        background: rgba(255, 255, 255, .08);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .banner-top--home .circle.top-left-big {
        top: 76px;
        left: 561px;
        width: 45px;
        height: 45px
    }

    @media screen and (max-width: 64.06125em) {
        .banner-top--home .circle.top-left-big {
            top: 145px;
            left: 80px
        }
    }

    .banner-top--home .circle.top-left-small {
        top: 130px;
        left: 604px;
        width: 17px;
        height: 17px
    }

    @media screen and (max-width: 64.06125em) {
        .banner-top--home .circle.top-left-small {
            top: 200px;
            left: 120px
        }
    }

    .banner-top--home .circle.top-right-small {
        top: -80px;
        right: 220px;
        width: 26px;
        height: 26px
    }

    @media screen and (max-width: 1279px) {
        .banner-top--home .circle.top-right-small {
            right: 90px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home .circle.top-right-small {
            right: 37%;
            width: 16px;
            height: 16px;
            top: -43px
        }
    }

    .banner-top--home .circle.bottom-left-small {
        top: 430px;
        left: 80px;
        width: 25px;
        height: 25px
    }

    @media screen and (max-width: 1439px) {
        .banner-top--home .circle.bottom-left-small {
            left: 165px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home .circle.bottom-left-small {
            left: 30%;
            width: 15px;
            height: 15px
        }
    }

    .banner-top--home .circle.bottom-right-small {
        top: 345px;
        right: -5px;
        width: 21px;
        height: 21px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .banner-top--home .circle.bottom-right-small {
            bottom: 109px;
            right: -9px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .banner-top--home .circle.bottom-right-small {
            top: 441px;
            right: -25px
        }
    }

    .banner-top--home .circle.bottom-abstract {
        top: 443px;
        left: 0;
        width: 77px;
        height: 77px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .banner-top--home .circle.bottom-abstract img {
        margin: auto
    }

    @media screen and (max-width: 1439px) {
        .banner-top--home .circle.bottom-abstract {
            left: 80px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home .circle.bottom-abstract {
            width: 47px;
            height: 47px;
            left: 15%
        }
    }

    .banner-top--home .circle.top-personality {
        top: -50px;
        right: 254px;
        width: 80px;
        height: 80px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .banner-top--home .circle.top-personality img {
        margin: auto
    }

    @media screen and (max-width: 1279px) {
        .banner-top--home .circle.top-personality {
            top: -65px;
            right: 150px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home .circle.top-personality {
            width: 50px;
            height: 50px;
            top: -47px;
            right: 46%
        }
    }

    .banner-top--home .circle.top-interests {
        top: 0;
        right: 207px;
        width: 80px;
        height: 80px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .banner-top--home .circle.top-interests img {
        margin: auto
    }

    @media screen and (max-width: 1279px) {
        .banner-top--home .circle.top-interests {
            top: -20px;
            right: 110px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home .circle.top-interests {
            width: 50px;
            height: 50px;
            top: -15px;
            right: 40%
        }
    }

    .banner-top--home-btns-container__empty {
        height: 28px
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home-btns-container__empty {
            height: 46px
        }
    }

    .banner-top--home-btns-container {
        height: 108px
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home-btns-container {
            height: auto
        }
    }

    .banner-top--home-btns {
        position: relative;
        margin: 0 auto 10px;
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: end;
        -webkit-align-items: flex-end;
        -ms-flex-align: end;
        align-items: flex-end;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .banner-top--home-btns a {
        margin: 0 5px
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home-btns a {
            margin: 0 auto
        }
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home-btns {
            display: inline-block
        }

        .banner-top--home-btns .button--white--big {
            padding: 15px 20px;
            height: 50px
        }
    }

    .banner-top--home-or {
        font-size: 21px;
        line-height: 31px;
        margin: auto 5px;
        font-family: sofia-pro-regular, sans-serif
    }

    @media screen and (max-width: 39.99875em) {
        .banner-top--home-or {
            font-size: 18px;
            line-height: 23px;
            margin: 0 auto 5px
        }
    }

    .banner-top .rectangle_card {
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px
    }

    @media screen and (max-width: 39.99875em) {
        .title {
            font-size: 40px;
            line-height: 40px
        }
    }

    h2.section-title {
        margin-top: 0
    }

    .section-title {
        font-size: 35px;
        line-height: 40px;
        color: #fff
    }

    @media screen and (max-width: 64.06125em) {
        .section-title {
            text-align: center;
            padding-right: 40px;
            padding-left: 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .section-title {
            line-height: 35px;
            padding-right: 30px;
            padding-left: 30px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .wrapper-upgrade {
            margin-bottom: 150px
        }
    }

    .privacy-blk__title {
        font-size: 35px;
        line-height: 40px;
        color: #fff;
        margin-bottom: 20px
    }

    .privacy-blk__subtitle {
        margin: 0 0 8px
    }

    .privacy-blk__subtitle:focus {
        outline: none
    }

    .privacy-blk__text {
        font-size: 15px;
        line-height: 20px;
        color: #fff;
        margin-bottom: 20px
    }

    .privacy-blk__text:focus {
        outline: none
    }

    .privacy-blk__list-item {
        font-size: 15px;
        line-height: 20px;
        color: #fff;
        margin-left: 15px
    }

    .privacy-blk__list-item:last-child {
        margin-bottom: 20px
    }

    @media screen and (max-width: 64.06125em) {
        .maintenance {
            min-height: calc(100vh - 80px);
            margin: 70px 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .maintenance {
            min-height: 100vh
        }
    }

    .maintenance__title {
        font-size: 60px;
        line-height: 1.2;
        margin: 40px 0
    }

    @media screen and (max-width: 39.99875em) {
        .maintenance__title {
            font-size: 35px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .process.grid-container {
            padding-bottom: 100px !important
        }
    }

    .process .grid-x {
        margin-bottom: 100px
    }

    .process .grid-x .large-7 {
        width: 52%
    }

    @media screen and (min-width: 64.0625em) {
        .process .grid-x .large-5 {
            width: 48%;
            max-width: 604px;
            margin-right: auto
        }
    }

    @media screen and (min-width: 64.0625em) {
        .process .grid-x .large-5.right-step {
            margin-left: auto;
            margin-right: 0
        }
    }

    .process .grid-x:last-child {
        margin-bottom: 0 !important
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .process .grid-x {
            margin-bottom: 50px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .process .grid-x {
            margin-bottom: 50px
        }

        .process .grid-x.grid-padding-x {
            margin: 0
        }
    }

    .process__title {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 35px;
        margin-bottom: 50px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .process__title {
            margin: 30px 0 80px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .process__title {
            font-family: sofia-pro-semi-bold, sans-serif;
            font-size: 28px;
            text-align: center;
            margin-top: 10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .process__step:not(:first-of-type) .process__step-img {
            margin-top: 50px
        }
    }

    .process__step {
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start
    }

    @media screen and (min-width: 40em) {
        .process__step.grid-padding-x > .cell:nth-child(even) {
            padding-right: 0;
            position: relative
        }

        .process__step.grid-padding-x > .cell:nth-child(odd) {
            padding-left: 0;
            position: relative
        }
    }

    @media screen and (max-width: 64.06125em) {
        .process__step.grid-padding-x > .cell {
            padding: 0;
            position: relative
        }
    }

    .process__step--numbers {
        color: rgba(255, 255, 255, .1);
        text-align: left;
        font-size: 290px;
        line-height: 150px;
        font-family: sofia-pro-regular, sans-serif;
        letter-spacing: 0;
        position: absolute;
        right: 0;
        top: -9px
    }

    @media screen and (max-width: 64.06125em) {
        .process__step--numbers {
            top: 35px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .process__step--numbers {
            right: 65px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .process__step-img-blk {
            margin: 0 -30px;
            width: calc(100% + 60px) !important;
            float: none !important
        }
    }

    @media screen and (max-width: 340px) {
        .process__step-img-blk {
            margin: 0 -10px;
            width: calc(100% + 20px) !important
        }
    }

    @media screen and (max-width: 64.06125em) {
        .process__step-img-blk img {
            float: none !important;
            width: 100%
        }
    }

    .process__step-title {
        font-size: 28px;
        line-height: 35px;
        color: #fff;
        margin: 20px 0;
        font-family: sofia-pro-regular, sans-serif
    }

    .buttons-line .button {
        margin-bottom: 0
    }

    .buttons-line .button:first-child {
        margin-right: 16px
    }

    .search-alternatives {
        list-style-type: none
    }

    .search-alternatives li {
        margin: 10px 0
    }

    .the-arrow {
        width: 1px;
        -webkit-transition: all .2s ease;
        transition: all .2s ease
    }

    .the-arrow.-left {
        position: absolute;
        top: 50%;
        left: 0
    }

    .the-arrow.-left > .shaft {
        width: 16px;
        background-color: #59ce61
    }

    .the-arrow.-left > .shaft:before,
    .the-arrow.-left > .shaft:after {
        width: 8px;
        background-color: #59ce61
    }

    .the-arrow.-left > .shaft:before {
        -webkit-transform: rotate(40deg);
        -ms-transform: rotate(40deg);
        transform: rotate(40deg)
    }

    .the-arrow.-left > .shaft:after {
        -webkit-transform: rotate(-40deg);
        -ms-transform: rotate(-40deg);
        transform: rotate(-40deg)
    }

    .the-arrow.-right {
        position: absolute;
        top: 50%;
        right: 0
    }

    .the-arrow.-right > .shaft {
        width: 16px;
        background-color: #59ce61
    }

    .the-arrow.-right > .shaft:before,
    .the-arrow.-right > .shaft:after {
        width: 8px;
        background-color: #59ce61
    }

    .the-arrow.-right > .shaft:before {
        -webkit-transform: rotate(-40deg);
        -ms-transform: rotate(-40deg);
        transform: rotate(-40deg)
    }

    .the-arrow.-right > .shaft:after {
        -webkit-transform: rotate(40deg);
        -ms-transform: rotate(40deg);
        transform: rotate(40deg)
    }

    .the-arrow > .shaft {
        display: block;
        height: 1px;
        position: relative;
        will-change: transform;
        -webkit-transition: all .2s ease;
        transition: all .2s ease
    }

    .the-arrow > .shaft:before,
    .the-arrow > .shaft:after {
        content: '';
        display: block;
        height: 1px;
        position: absolute;
        top: 0;
        right: 0;
        -webkit-transition: all .2s ease;
        transition: all .2s ease
    }

    .the-arrow > .shaft:before {
        -webkit-transform-origin: top right;
        -ms-transform-origin: top right;
        transform-origin: top right
    }

    .the-arrow > .shaft:after {
        -webkit-transform-origin: bottom right;
        -ms-transform-origin: bottom right;
        transform-origin: bottom right
    }

    .animated-arrow {
        display: inline-block;
        color: #fff;
        font-size: 20px;
        text-decoration: none;
        position: relative;
        -webkit-transition: all .2s ease;
        transition: all .2s ease
    }

    .animated-arrow:hover {
        color: #59ce61
    }

    .animated-arrow:hover > .the-arrow.-left > .shaft {
        width: 26px;
        background-color: #59ce61
    }

    .animated-arrow:hover > .the-arrow.-left > .shaft:before,
    .animated-arrow:hover > .the-arrow.-left > .shaft:after {
        width: 8px;
        background-color: #59ce61
    }

    .animated-arrow:hover > .the-arrow.-left > .shaft:before {
        -webkit-transform: rotate(40deg);
        -ms-transform: rotate(40deg);
        transform: rotate(40deg)
    }

    .animated-arrow:hover > .the-arrow.-left > .shaft:after {
        -webkit-transform: rotate(-40deg);
        -ms-transform: rotate(-40deg);
        transform: rotate(-40deg)
    }

    .animated-arrow:hover > .main {
        -webkit-transform: translateX(12px);
        -ms-transform: translateX(12px);
        transform: translateX(12px)
    }

    .animated-arrow > .main {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-transition: all .2s ease;
        transition: all .2s ease
    }

    .animated-arrow > .main > .text {
        margin: 0 0 0 28px;
        line-height: 1
    }

    .animated-arrow > .main > .the-arrow {
        position: relative
    }

    .animated-arrow.-right:hover > .the-arrow.-right > .shaft {
        width: 26px;
        background-color: #59ce61
    }

    .animated-arrow.-right:hover > .the-arrow.-right > .shaft:before,
    .animated-arrow.-right:hover > .the-arrow.-right > .shaft:after {
        width: 8px;
        background-color: #59ce61
    }

    .animated-arrow.-right:hover > .the-arrow.-right > .shaft:before {
        -webkit-transform: rotate(-40deg);
        -ms-transform: rotate(-40deg);
        transform: rotate(-40deg)
    }

    .animated-arrow.-right:hover > .the-arrow.-right > .shaft:after {
        -webkit-transform: rotate(40deg);
        -ms-transform: rotate(40deg);
        transform: rotate(40deg)
    }

    .animated-arrow.-right:hover > .main {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0)
    }

    .animated-arrow.-right > .main > .text {
        color: #59ce61;
        font-size: 15px;
        line-height: 1;
        margin: 0 10px 0 0
    }

    .for-upgrade .feedback-blk__slider.swiper-container {
        padding: 0
    }

    .for-upgrade__how .buttons-line {
        display: none
    }

    .for-upgrade__how .steps-slider {
        margin-bottom: 0
    }

    .for-upgrade__how .steps-slider p {
        margin-bottom: 0
    }

    .trust-icons img {
        margin: 30px
    }

    @media screen and (max-width: 39.99875em) {
        .trust-icons {
            width: auto !important;
            margin: 0 -30px;
            overflow-x: hidden;
            -webkit-box-flex: 1 !important;
            -webkit-flex-grow: 1 !important;
            -ms-flex-positive: 1 !important;
            flex-grow: 1 !important
        }

        .trust-icons img {
            margin: 0 5px 10px
        }
    }

    @media screen and (max-width: 39.99875em) and (max-width: 375px) {
        .trust-icons img {
            max-width: 65px
        }
    }

    .bg__conbtainer:nth-child(odd) {
        background: #162939
    }

    .blue-shade__container:nth-child(even) {
        background: #122535
    }

    .grey-shade__container {
        background: #fff
    }

    .grey-shade__container .blue-blk__title,
    .grey-shade__container .blue-blk__mini-subtitle,
    .grey-shade__container .section-title,
    .grey-shade__container .tests__title,
    .grey-shade__container .tests__desc,
    .grey-shade__container .our-users--small__title,
    .grey-shade__container .our-users--small__desc {
        color: #122535
    }

    .grey-shade__container .card--for-tests {
        background: #dfe2e4
    }

    .grey-shade__container:nth-child(even) {
        background: #ebedee
    }

    .minH500 {
        min-height: 500px !important
    }

    .terms ul.sidebar {
        max-height: calc(100vh - 9rem);
        overflow-y: auto
    }

    .terms ul.sidebar li {
        display: inline-block;
        width: 100%;
        margin: 0;
        padding: 5px 0;
        line-height: 1.2
    }

    .terms ul.sidebar li span {
        display: inline-block;
        width: 30px
    }

    .terms ul.sidebar li a {
        color: #fff;
        font-family: sofia-pro-bold, sans-serif;
        font-size: 18px;
        line-height: 1.2;
        margin: 0
    }

    .terms ul.sidebar li a:hover {
        text-decoration: none;
        color: #59ce61
    }

    .terms--link {
        padding-top: 100px;
        margin-top: -100px
    }

    @media screen and (min-width: 64.0625em) {
        .terms--sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 150px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .terms--sticky {
            position: relative;
            z-index: 1
        }
    }

    .bubble--bg {
        position: absolute;
        top: -10%;
        left: 55%;
        z-index: -1
    }

    @media screen and (max-width: 39.99875em) {
        .bubble--bg__mob {
            display: block !important;
            top: -21%
        }
    }

    @media screen and (max-width: 64.06125em) {
        .bubble--bg {
            left: 35%;
            width: 100%
        }
    }

    @media screen and (max-width: 39.99875em) {
        .bubble--bg {
            display: none
        }
    }

    @media screen and (max-width: 39.99875em) {
        .student-beans-logo-upgrade {
            margin: 0 auto 15px;
            text-align: center
        }
    }

    @media screen and (width: 375px) {
        .student-beans-logo-upgrade {
            margin: 15px auto
        }
    }

    .student-beans-logo-upgrade:hover {
        cursor: pointer;
        opacity: .5;
        -webkit-transition: opacity .5s ease;
        transition: opacity .5s ease
    }

    .student-beans-logo:hover {
        cursor: pointer;
        opacity: .5 !important;
        -webkit-transition: opacity .5s ease;
        transition: opacity .5s ease
    }

    @media screen and (max-width: 39.99875em) {
        .sb-logo-pad {
            padding: 0 30px
        }

        .sb-logo-pad img {
            margin-top: 5px
        }
    }

    .sb-logo-pad:hover {
        cursor: pointer;
        opacity: .5;
        -webkit-transition: opacity .5s ease;
        transition: opacity .5s ease
    }

    .about-mission {
        background: #ebedee
    }

    .about-mission .grid-container {
        padding-top: 60px !important;
        padding-bottom: 60px !important
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .about-mission .grid-container {
            padding-top: 50px !important;
            padding-bottom: 50px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .about-mission .grid-container {
            padding: 40px 30px 70px !important
        }
    }

    @media screen and (max-width: 340px) {
        .about-mission .grid-container {
            padding: 40px 10px 70px !important
        }
    }

    .about-mission__heading {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 20px;
        line-height: 22px;
        color: rgba(10, 30, 46, .5)
    }

    .about-mission__content {
        position: relative;
        margin: 20px auto 0;
        max-width: 815px;
        min-height: 85px
    }

    @media screen and (max-width: 64.06125em) {
        .about-mission__content {
            max-width: 520px
        }
    }

    .about-mission__blockquote {
        position: absolute;
        top: 0;
        right: 15px
    }

    @media screen and (max-width: 39.99875em) {
        .about-mission__blockquote {
            top: 57px
        }
    }

    .about-mission__subheading {
        color: #0a1e2e;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 30px;
        line-height: 35px;
        margin: 0 auto
    }

    .about-mission__subheading span {
        font-family: sofia-pro-bold, sans-serif
    }

    @media screen and (min-width: 40em) {
        .about-mission__subheading {
            max-width: 660px
        }
    }

    @media screen and (max-width: 1023px) {
        .about-mission__subheading {
            max-width: 429px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .about-mission__subheading {
            text-align: left;
            font-size: 26px;
            line-height: 28px
        }
    }

    .about-team {
        background: #ebedee
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .about-team .grid-container {
            padding-top: 80px !important;
            padding-bottom: 60px !important
        }
    }

    .about-team h2 {
        margin-top: 0;
        font-size: 34px;
        line-height: 40px;
        margin-bottom: 20px;
        text-align: center;
        color: #0a1e2e;
        font-family: sofia-pro-semi-bold, sans-serif
    }

    @media screen and (max-width: 39.99875em) {
        .about-team h2 {
            font-size: 28px
        }
    }

    .about-team--subtitle {
        font-size: 20px;
        line-height: 24px;
        font-family: sofia-pro-regular, sans-serif;
        margin-bottom: 40px;
        text-align: center;
        color: #0a1e2e
    }

    @media screen and (max-width: 39.99875em) {
        .about-team--subtitle {
            font-size: 18px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .about-team--members-section {
            max-width: 648px;
            margin: 0 auto
        }
    }

    .about-team--member {
        background: #fff;
        margin: 7px;
        position: relative;
        min-height: 393px;
        height: auto
    }

    @media screen and (max-width: 64.06125em) {
        .about-team--member {
            margin: 8px auto;
            max-width: 308px
        }
    }

    @media screen and (min-width: 641px) and (max-width: 700px) {
        .about-team--member {
            max-width: 300px
        }
    }

    @media screen and (max-width: 375px) {
        .about-team--member {
            margin: 7px -30px;
            width: calc(100% + 60px);
            max-width: none
        }
    }

    @media screen and (max-width: 340px) {
        .about-team--member {
            margin: 7px -10px;
            width: calc(100% + 20px);
            max-width: none
        }
    }

    .about-team--member-info {
        padding: 25px 15px 20px;
        height: 96px;
        position: absolute;
        bottom: 0;
        background: #fff;
        width: 100%
    }

    .about-team--member-info:hover {
        cursor: initial
    }

    .about-team--member-name {
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 21px;
        color: #0a1e2e;
        line-height: 24px;
        margin: 0
    }

    .about-team--member-title {
        font-size: 15px;
        line-height: 22px;
        color: #59ce61;
        margin: 10px 0
    }

    .about-team--member-desc {
        font-size: 15px;
        line-height: 22px;
        color: rgba(10, 30, 46, .5);
        margin: 0;
        font-family: sofia-pro-light, sans-serif
    }

    .about-team--member img {
        width: 100%
    }

    .our-journey {
        background: rgba(255, 255, 255, .03);
        position: relative
    }

    .our-journey .grid-container {
        padding-top: 60px !important;
        padding-bottom: 0 !important
    }

    @media screen and (max-width: 39.99875em) {
        .our-journey .grid-container {
            padding-top: 50px !important
        }
    }

    .our-journey h3 {
        font-size: 28px;
        line-height: 40px;
        color: #fff;
        margin: 15px 0 30px
    }

    .our-journey p {
        color: #fff;
        font-size: 15px
    }

    @media screen and (min-width: 64.0625em) {
        .our-journey .max-width-590 {
            max-width: 590px;
            margin: 0 0 60px auto
        }
    }

    .our-journey__pic {
        margin-bottom: -1px
    }

    @media screen and (min-width: 64.0625em) {
        .our-journey__pic {
            position: absolute;
            bottom: 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .our-journey__pic {
            margin-top: 80px;
            text-align: center
        }
    }

    @media screen and (max-width: 39.99875em) {
        .our-journey__pic {
            margin: 0 -30px
        }
    }

    @media screen and (max-width: 340px) {
        .our-journey__pic {
            margin: 0 -10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .our-journey__pic img {
            width: calc(100% + 60px);
            margin-top: 40px
        }
    }

    @media screen and (max-width: 340px) {
        .our-journey__pic img {
            width: calc(100% + 20px)
        }
    }

    .our-journey__pic .circle {
        position: absolute;
        background: rgba(255, 255, 255, .08);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .our-journey__pic .circle.left-large {
        top: 10px;
        left: 20px;
        width: 50px;
        height: 50px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .our-journey__pic .circle.left-large {
            bottom: 252px;
            top: auto;
            left: 77px
        }
    }

    .our-journey__pic .circle.left-small {
        top: -20px;
        left: 0;
        width: 17px;
        height: 17px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .our-journey__pic .circle.left-small {
            bottom: 323px;
            top: auto;
            left: 51px
        }
    }

    .our-journey--circle-half-right {
        border-radius: 42px 42px 0 0;
        position: absolute;
        width: 84px;
        height: 42px;
        right: 169px;
        bottom: 0;
        background: rgba(89, 206, 97, .16)
    }

    .unrivaled-testing-blk {
        background: #fff;
        position: relative;
        overflow: hidden;
        min-height: 545px
    }

    .unrivaled-testing-blk--green-right-circle {
        background: rgba(89, 206, 97, .16);
        width: 200px;
        height: 200px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        right: -100px;
        position: absolute
    }

    @media screen and (max-width: 64.06125em) {
        .unrivaled-testing-blk--green-right-circle {
            width: 150px;
            height: 150px;
            right: -75px
        }
    }

    .unrivaled-testing-blk--green-bottom-circle {
        background: rgba(89, 206, 97, .16);
        width: 100px;
        height: 100px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        bottom: -50px;
        position: absolute;
        right: 500px
    }

    .unrivaled-testing-blk .grid-container {
        padding-bottom: 0 !important
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .unrivaled-testing-blk .grid-container {
            padding-top: 80px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .unrivaled-testing-blk .grid-container {
            padding-top: 50px
        }
    }

    .unrivaled-testing-blk h2 {
        font-size: 28px;
        line-height: 40px;
        color: #0a1e2e;
        margin-top: 15px;
        margin-bottom: 30px
    }

    @media screen and (max-width: 64.06125em) {
        .unrivaled-testing-blk h2 {
            margin: 0 0 0 15px
        }
    }

    .unrivaled-testing-blk .accordion {
        margin-left: 20px
    }

    @media screen and (max-width: 64.06125em) {
        .unrivaled-testing-blk .accordion {
            margin-top: 20px
        }
    }

    .unrivaled-testing-blk .accordion .accordion-item a {
        color: #0a1e2e !important;
        font-size: 18px !important
    }

    .unrivaled-testing-blk .accordion .accordion-item.is-active p,
    .unrivaled-testing-blk .accordion .accordion-item.is-active ul li,
    .unrivaled-testing-blk .accordion .accordion-item.is-active ol li {
        color: rgba(10, 30, 46, .5) !important;
        font-size: 15px !important;
        max-width: 410px;
        margin-top: 20px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {

        .unrivaled-testing-blk .accordion .accordion-item.is-active p,
        .unrivaled-testing-blk .accordion .accordion-item.is-active ul li,
        .unrivaled-testing-blk .accordion .accordion-item.is-active ol li {
            max-width: 570px
        }
    }

    .unrivaled-testing-blk .accordion .accordion-item {
        margin-bottom: 20px
    }

    .unrivaled-testing-blk .accordion .accordion-title {
        padding-top: 0 !important;
        padding-bottom: 0 !important
    }

    @media screen and (min-width: 64.0625em) {
        .unrivaled-testing-blk .unrivaled-testing-img {
            position: absolute;
            right: 0;
            bottom: 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .unrivaled-testing-blk .unrivaled-testing-img img {
            margin-right: -40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .unrivaled-testing-blk .unrivaled-testing-img img {
            margin-right: -30px
        }
    }

    @media screen and (max-width: 340px) {
        .unrivaled-testing-blk .unrivaled-testing-img img {
            margin-right: -10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .contact.transparent {
            padding: 100px 30px 80px !important
        }
    }

    .contact--title {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 20px;
        color: #59ce61;
        margin-bottom: 20px;
        line-height: 22px
    }

    .contact--subtitle {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 60px;
        line-height: 65px;
        color: #fff;
        margin-bottom: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .contact--subtitle {
            font-size: 40px;
            line-height: 40px
        }
    }

    .contact--text {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px;
        line-height: 20px;
        color: #fff;
        margin-bottom: 10px
    }

    .contact--labels {
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 21px;
        line-height: 20px;
        color: #59ce61;
        margin: 10px 0
    }

    .contact--labels-info {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px;
        line-height: 20px;
        color: rgba(255, 255, 255, .5);
        margin-bottom: 10px
    }

    .contact--location {
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 16px;
        line-height: 20px;
        color: #fff;
        margin-bottom: 10px
    }

    .contact--form-title {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 20px;
        line-height: 20px;
        color: #fff;
        margin-bottom: 10px
    }

    .contact--form-text {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px;
        line-height: 20px;
        color: rgba(255, 255, 255, .5)
    }

    .contact .input-tick label {
        line-height: 1
    }

    [type=text],
    [type=password],
    [type=date],
    [type=datetime],
    [type=datetime-local],
    [type=month],
    [type=week],
    [type=email],
    [type=number],
    [type=search],
    [type=tel],
    [type=time],
    [type=url],
    [type=color],
    textarea,
    input,
    .cardPlaceholder {
        display: block;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, .03);
        border: none !important;
        color: #fff;
        height: 40px;
        font-size: 15px;
        line-height: 20px;
        font-family: sofia-pro-regular, sans-serif !important;
        -webkit-transition: none;
        transition: none;
        margin-bottom: 10px;
        padding: 12px 15px;
        width: 100%
    }

    [type=text]::-webkit-input-placeholder,
    [type=password]::-webkit-input-placeholder,
    [type=date]::-webkit-input-placeholder,
    [type=datetime]::-webkit-input-placeholder,
    [type=datetime-local]::-webkit-input-placeholder,
    [type=month]::-webkit-input-placeholder,
    [type=week]::-webkit-input-placeholder,
    [type=email]::-webkit-input-placeholder,
    [type=number]::-webkit-input-placeholder,
    [type=search]::-webkit-input-placeholder,
    [type=tel]::-webkit-input-placeholder,
    [type=time]::-webkit-input-placeholder,
    [type=url]::-webkit-input-placeholder,
    [type=color]::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder,
    input::-webkit-input-placeholder,
    .cardPlaceholder::-webkit-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    [type=text]::-moz-placeholder,
    [type=password]::-moz-placeholder,
    [type=date]::-moz-placeholder,
    [type=datetime]::-moz-placeholder,
    [type=datetime-local]::-moz-placeholder,
    [type=month]::-moz-placeholder,
    [type=week]::-moz-placeholder,
    [type=email]::-moz-placeholder,
    [type=number]::-moz-placeholder,
    [type=search]::-moz-placeholder,
    [type=tel]::-moz-placeholder,
    [type=time]::-moz-placeholder,
    [type=url]::-moz-placeholder,
    [type=color]::-moz-placeholder,
    textarea::-moz-placeholder,
    input::-moz-placeholder,
    .cardPlaceholder::-moz-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    [type=text]:-ms-input-placeholder,
    [type=password]:-ms-input-placeholder,
    [type=date]:-ms-input-placeholder,
    [type=datetime]:-ms-input-placeholder,
    [type=datetime-local]:-ms-input-placeholder,
    [type=month]:-ms-input-placeholder,
    [type=week]:-ms-input-placeholder,
    [type=email]:-ms-input-placeholder,
    [type=number]:-ms-input-placeholder,
    [type=search]:-ms-input-placeholder,
    [type=tel]:-ms-input-placeholder,
    [type=time]:-ms-input-placeholder,
    [type=url]:-ms-input-placeholder,
    [type=color]:-ms-input-placeholder,
    textarea:-ms-input-placeholder,
    input:-ms-input-placeholder,
    .cardPlaceholder:-ms-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    [type=text]::-ms-input-placeholder,
    [type=password]::-ms-input-placeholder,
    [type=date]::-ms-input-placeholder,
    [type=datetime]::-ms-input-placeholder,
    [type=datetime-local]::-ms-input-placeholder,
    [type=month]::-ms-input-placeholder,
    [type=week]::-ms-input-placeholder,
    [type=email]::-ms-input-placeholder,
    [type=number]::-ms-input-placeholder,
    [type=search]::-ms-input-placeholder,
    [type=tel]::-ms-input-placeholder,
    [type=time]::-ms-input-placeholder,
    [type=url]::-ms-input-placeholder,
    [type=color]::-ms-input-placeholder,
    textarea::-ms-input-placeholder,
    input::-ms-input-placeholder,
    .cardPlaceholder::-ms-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    [type=text]::placeholder,
    [type=password]::placeholder,
    [type=date]::placeholder,
    [type=datetime]::placeholder,
    [type=datetime-local]::placeholder,
    [type=month]::placeholder,
    [type=week]::placeholder,
    [type=email]::placeholder,
    [type=number]::placeholder,
    [type=search]::placeholder,
    [type=tel]::placeholder,
    [type=time]::placeholder,
    [type=url]::placeholder,
    [type=color]::placeholder,
    textarea::placeholder,
    input::placeholder,
    .cardPlaceholder::placeholder {
        color: rgba(255, 255, 255, .5)
    }

    [type=text]:focus,
    [type=password]:focus,
    [type=date]:focus,
    [type=datetime]:focus,
    [type=datetime-local]:focus,
    [type=month]:focus,
    [type=week]:focus,
    [type=email]:focus,
    [type=number]:focus,
    [type=search]:focus,
    [type=tel]:focus,
    [type=time]:focus,
    [type=url]:focus,
    [type=color]:focus,
    textarea:focus,
    input:focus,
    .cardPlaceholder:focus {
        background-color: rgba(255, 255, 255, .03);
        border: none !important;
        color: #fff;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none !important
    }

    [type=text]:-webkit-autofill,
    [type=text]:-webkit-autofill:hover,
    [type=text]:-webkit-autofill:focus,
    [type=text]:-webkit-autofill:active,
    [type=password]:-webkit-autofill,
    [type=password]:-webkit-autofill:hover,
    [type=password]:-webkit-autofill:focus,
    [type=password]:-webkit-autofill:active,
    [type=date]:-webkit-autofill,
    [type=date]:-webkit-autofill:hover,
    [type=date]:-webkit-autofill:focus,
    [type=date]:-webkit-autofill:active,
    [type=datetime]:-webkit-autofill,
    [type=datetime]:-webkit-autofill:hover,
    [type=datetime]:-webkit-autofill:focus,
    [type=datetime]:-webkit-autofill:active,
    [type=datetime-local]:-webkit-autofill,
    [type=datetime-local]:-webkit-autofill:hover,
    [type=datetime-local]:-webkit-autofill:focus,
    [type=datetime-local]:-webkit-autofill:active,
    [type=month]:-webkit-autofill,
    [type=month]:-webkit-autofill:hover,
    [type=month]:-webkit-autofill:focus,
    [type=month]:-webkit-autofill:active,
    [type=week]:-webkit-autofill,
    [type=week]:-webkit-autofill:hover,
    [type=week]:-webkit-autofill:focus,
    [type=week]:-webkit-autofill:active,
    [type=email]:-webkit-autofill,
    [type=email]:-webkit-autofill:hover,
    [type=email]:-webkit-autofill:focus,
    [type=email]:-webkit-autofill:active,
    [type=number]:-webkit-autofill,
    [type=number]:-webkit-autofill:hover,
    [type=number]:-webkit-autofill:focus,
    [type=number]:-webkit-autofill:active,
    [type=search]:-webkit-autofill,
    [type=search]:-webkit-autofill:hover,
    [type=search]:-webkit-autofill:focus,
    [type=search]:-webkit-autofill:active,
    [type=tel]:-webkit-autofill,
    [type=tel]:-webkit-autofill:hover,
    [type=tel]:-webkit-autofill:focus,
    [type=tel]:-webkit-autofill:active,
    [type=time]:-webkit-autofill,
    [type=time]:-webkit-autofill:hover,
    [type=time]:-webkit-autofill:focus,
    [type=time]:-webkit-autofill:active,
    [type=url]:-webkit-autofill,
    [type=url]:-webkit-autofill:hover,
    [type=url]:-webkit-autofill:focus,
    [type=url]:-webkit-autofill:active,
    [type=color]:-webkit-autofill,
    [type=color]:-webkit-autofill:hover,
    [type=color]:-webkit-autofill:focus,
    [type=color]:-webkit-autofill:active,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    textarea:-webkit-autofill:active,
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active,
    .cardPlaceholder:-webkit-autofill,
    .cardPlaceholder:-webkit-autofill:hover,
    .cardPlaceholder:-webkit-autofill:focus,
    .cardPlaceholder:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px rgba(10, 30, 46, .1) inset;
        font-family: sofia-pro-regular, sans-serif;
        -webkit-transition: background-color 5000s ease-in-out;
        transition: background-color 5000s ease-in-out
    }

    [type=text]:-webkit-autofill::first-line,
    [type=password]:-webkit-autofill::first-line,
    [type=date]:-webkit-autofill::first-line,
    [type=datetime]:-webkit-autofill::first-line,
    [type=datetime-local]:-webkit-autofill::first-line,
    [type=month]:-webkit-autofill::first-line,
    [type=week]:-webkit-autofill::first-line,
    [type=email]:-webkit-autofill::first-line,
    [type=number]:-webkit-autofill::first-line,
    [type=search]:-webkit-autofill::first-line,
    [type=tel]:-webkit-autofill::first-line,
    [type=time]:-webkit-autofill::first-line,
    [type=url]:-webkit-autofill::first-line,
    [type=color]:-webkit-autofill::first-line,
    textarea:-webkit-autofill::first-line,
    input:-webkit-autofill::first-line,
    .cardPlaceholder:-webkit-autofill::first-line {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px
    }

    @media screen and (max-width: 39.99875em) {
        .cardPlaceholder {
            max-width: 320px !important
        }
    }

    textarea {
        height: auto;
        min-height: 50px
    }

    .vertical-resize textarea {
        resize: vertical
    }

    .white-off-input input {
        background: rgba(255, 255, 255, .1);
        color: rgba(255, 255, 255, .5)
    }

    .white-off-input input:focus {
        background: rgba(255, 255, 255, .1)
    }

    .hint-text {
        color: #ccc;
        text-align: right;
        margin-top: -10px
    }

    select,
    .currencies-select {
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        background-image: none;
        background-color: rgba(255, 255, 255, .03);
        color: rgba(255, 255, 255, .5);
        line-height: 1.1;
        border: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        height: 40px;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif !important;
        padding: 8px 15px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 10px
    }

    select::-webkit-input-placeholder,
    .currencies-select::-webkit-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    select::-moz-placeholder,
    .currencies-select::-moz-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    select:-ms-input-placeholder,
    .currencies-select:-ms-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    select::-ms-input-placeholder,
    .currencies-select::-ms-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    select::placeholder,
    .currencies-select::placeholder {
        color: rgba(255, 255, 255, .5)
    }

    select:focus,
    .currencies-select:focus {
        background-color: rgba(255, 255, 255, .03);
        border: none !important;
        color: #fff;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none !important
    }

    select:-webkit-autofill,
    select:-webkit-autofill:focus,
    select:-webkit-autofill:active,
    .currencies-select:-webkit-autofill,
    .currencies-select:-webkit-autofill:focus,
    .currencies-select:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px rgba(10, 30, 46, .1) inset;
        font-family: sofia-pro-regular, sans-serif;
        -webkit-transition: background-color 5000s ease-in-out;
        transition: background-color 5000s ease-in-out
    }

    .with-autofill select:-webkit-autofill,
    .with-autofill select:-webkit-autofill:focus,
    .with-autofill select:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px #e5e7e9 inset !important;
        -webkit-transition: none;
        transition: none
    }

    option {
        background: rgba(255, 255, 255, .03);
        border: rgba(255, 255, 255, .03);
        border-radius: 20px
    }

    .select-label.full-opacity:after {
        opacity: 1 !important
    }

    .select-label .small-icon {
        display: inline-block
    }

    .label-icon-right:after {
        content: "";
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        position: absolute;
        top: 18px;
        right: 15px;
        cursor: pointer;
        pointer-events: none;
        background-position: -423px -33px;
        width: 12px;
        height: 7px;
        opacity: .5
    }

    .label-icon-right:after:hover {
        opacity: .3;
        cursor: pointer
    }

    .label-icon-right.select-label {
        margin: 0;
        position: relative
    }

    .label-icon-right.select-label.dark select {
        background-color: rgba(255, 255, 255, .1)
    }

    .label-icon-right.select-label.dark option {
        background: #233543;
        border: #233543
    }

    .label-icon-right.select-label--min-width {
        min-width: 170px
    }

    .label-icon-right.select-label:after {
        background-position: -423px -33px;
        width: 12px;
        height: 7px
    }

    .label-icon-right.select-label::-webkit-input-placeholder {
        color: rgba(255, 255, 255, .5);
        border: rgba(255, 255, 255, .05)
    }

    .label-icon-right.select-label::-moz-placeholder {
        color: rgba(255, 255, 255, .5);
        border: rgba(255, 255, 255, .05)
    }

    .label-icon-right.select-label:-ms-input-placeholder {
        color: rgba(255, 255, 255, .5);
        border: rgba(255, 255, 255, .05)
    }

    .label-icon-right.select-label::-ms-input-placeholder {
        color: rgba(255, 255, 255, .5);
        border: rgba(255, 255, 255, .05)
    }

    .label-icon-right.select-label::placeholder {
        color: rgba(255, 255, 255, .5);
        border: rgba(255, 255, 255, .05)
    }

    .label-icon-right.select-label:focus {
        color: rgba(255, 255, 255, .5);
        -webkit-box-shadow: none;
        box-shadow: none;
        background: rgba(255, 255, 255, .05);
        border: rgba(255, 255, 255, .05)
    }

    .currencies-select {
        background: rgba(255, 255, 255, .03);
        padding: 10px 15px
    }

    @media screen and (max-width: 39.99875em) {
        .currencies-select {
            font-size: 12px;
            line-height: 15px;
            padding: 14px 8px
        }
    }

    .currencies-select:focus {
        color: #fff
    }

    .currencies-select.is-open {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        color: #fff
    }

    .currencies-option {
        background: #233543;
        font-family: sofia-pro-regular, sans-serif;
        color: #fff;
        padding: 0 15px 5px
    }

    @media screen and (max-width: 39.99875em) {
        .currencies-option {
            padding: 0 10px 5px
        }
    }

    .currencies-option:hover {
        cursor: pointer;
        opacity: .9
    }

    .dropdown-pane {
        position: absolute;
        z-index: 10;
        visibility: hidden;
        max-height: 0;
        height: 50px;
        overflow: hidden;
        -webkit-transition: max-height .5s ease;
        transition: max-height .5s ease
    }

    .dropdown-pane.is-open {
        visibility: visible;
        max-height: 50px;
        background: rgba(255, 255, 255, .03);
        width: 85px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px
    }

    .affiliates__share__dropdown {
        position: relative
    }

    .affiliates__share__dropdown .dropdown-pane {
        height: 90px
    }

    .affiliates__share__dropdown .dropdown-pane.is-open {
        background: #233543;
        border: 1px solid #707070;
        max-height: 90px;
        width: 175px;
        top: 40px;
        border-radius: 0;
        padding: 10px 0 8px
    }

    @media screen and (min-width: 40em) {
        .affiliates__share__dropdown .dropdown-pane.is-open {
            width: calc(100% - 15px);
            max-width: 175px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .affiliates__share__dropdown .dropdown-pane.is-open {
            top: 55px;
            left: 0;
            right: 0;
            margin-right: auto;
            margin-left: auto
        }
    }

    .affiliates__share__dropdown .dropdown-pane.is-open.is-selected {
        height: 65px;
        max-height: 65px
    }

    .affiliates__share__dropdown .affiliates__share__option {
        background: #233543;
        font-family: sofia-pro-regular, sans-serif;
        color: #fff;
        font-size: 15px;
        line-height: 1;
        padding: 5px 15px 3px
    }

    .affiliates__share__dropdown .affiliates__share__option:hover {
        background: #1e90ff
    }

    .affiliates__share__select {
        background: #59ce61;
        color: #fff;
        line-height: 1.4;
        height: 40px;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        padding: 10px 15px;
        width: 100%;
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px
    }

    .currency-blk:hover .currencies-select:not(.is-open) {
        background: rgba(255, 255, 255, .2);
        cursor: pointer
    }

    @media screen and (max-width: 39.99875em) {
        .currency-blk .dropdown-pane.is-open {
            width: 40px
        }
    }

    .custom-sized-select-wrapper {
        position: relative;
        margin-bottom: 10px;
        color: rgba(255, 255, 255, .5) !important
    }

    .custom-sized-select-wrapper .drop-down-wrapper {
        position: absolute;
        width: 100%;
        z-index: 10;
        left: 0
    }

    .custom-sized-select-wrapper .drop-down-wrapper select {
        padding: 0 !important
    }

    .custom-sized-select-wrapper .drop-down-wrapper option {
        color: rgba(255, 255, 255, .5) !important
    }

    .custom-sized-select-wrapper select {
        background-color: #e7e9ea !important;
        color: #0a1e2e;
        border-radius: unset;
        max-height: 0;
        padding: 0;
        margin: 0;
        height: auto
    }

    .custom-sized-select-wrapper select option {
        border-radius: 0;
        padding: 0 15px;
        color: #0a1e2e
    }

    .custom-sized-select-wrapper select option:hover {
        border-radius: 0;
        padding: 0 15px;
        color: #fff;
        background-color: rgba(240, 119, 70, .898)
    }

    .custom-sized-select-wrapper.is-active {
        color: #0a1e2e
    }

    .custom-sized-select-wrapper.is-active select {
        max-height: 150px;
        border: 1px solid !important
    }

    .custom-sized-select-placeholder {
        background: rgba(255, 255, 255, .1);
        padding: 10px 15px;
        border-radius: 20px;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px;
        cursor: default;
        text-align: left;
        overflow: visible;
        color: rgba(255, 255, 255, .5);
        margin-top: 10px !important
    }

    .custom-sized-select-placeholder:after {
        top: 18px !important
    }

    .registration__form .custom-sized-select-placeholder {
        background: rgba(10, 30, 46, .1);
        color: rgba(10, 30, 46, .5) !important;
        margin-top: 0 !important
    }

    .registration__form .custom-sized-select-wrapper .drop-down-wrapper {
        top: 41px
    }

    .registration__form .custom-sized-select-wrapper .drop-down-wrapper option {
        color: rgba(10, 30, 46, .5) !important
    }

    .input-tick {
        display: inline-block;
        -webkit-transform: translateZ(0);
        transform: translateZ(0)
    }

    .input-tick label {
        cursor: pointer;
        padding-left: 0;
        color: #fff;
        font-size: 15px
    }

    .input-tick input[type=checkbox],
    .input-tick input[type=radio] {
        opacity: 0;
        position: absolute;
        margin: 0;
        z-index: -1;
        width: 0;
        height: 0;
        visibility: hidden;
        overflow: hidden;
        left: 0;
        pointer-events: none
    }

    .input-tick .checkbox-material {
        vertical-align: middle;
        position: relative;
        top: 0;
        display: inline-block;
        height: 20px;
        border-radius: 50%
    }

    .input-tick .checkbox-material::before {
        position: absolute;
        left: 8px;
        top: 8px;
        content: "";
        background-color: #59ce61;
        height: 4px;
        width: 4px;
        border-radius: 100%;
        z-index: 1;
        opacity: 0;
        margin: 0
    }

    .input-tick .checkbox-material .custom-checkbox {
        position: relative;
        display: inline-block;
        width: 20px;
        height: 20px;
        background-color: rgba(255, 255, 255, .1);
        border-radius: 50%;
        overflow: hidden;
        z-index: 1;
        color: #59ce61;
        -webkit-box-shadow: 0 0 0 1px transparent;
        box-shadow: 0 0 0 1px transparent;
        -webkit-transition: box-shadow .3s ease-out;
        -webkit-transition: -webkit-box-shadow .3s ease-out;
        transition: -webkit-box-shadow .3s ease-out;
        transition: box-shadow .3s ease-out;
        transition: box-shadow .3s ease-out, -webkit-box-shadow .3s ease-out
    }

    .input-tick .checkbox-material .custom-checkbox::before {
        position: absolute;
        content: "";
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        display: block;
        margin-top: -2px;
        margin-left: 8px;
        width: 0;
        height: 0;
        -webkit-box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
        box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
        color: #59ce61
    }

    .input-tick .check-text {
        font-size: 12px;
        margin-left: 5px
    }

    .input-tick input[type=radio]:checked + .wrong-answer,
    .input-tick input[type=checkbox]:checked + .wrong-answer {
        background: #ff3737;
        border-radius: 50%;
        height: 20px;
        width: 20px
    }

    .input-tick input[type=radio]:checked + .wrong-answer .custom-close,
    .input-tick input[type=checkbox]:checked + .wrong-answer .custom-close {
        position: absolute;
        right: 0;
        top: 0;
        width: 20px;
        height: 20px
    }

    .input-tick input[type=radio]:checked + .wrong-answer .custom-close:before,
    .input-tick input[type=checkbox]:checked + .wrong-answer .custom-close:before {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        background-position: -316px -36px;
        width: 12px;
        height: 11px;
        position: absolute;
        content: ' ';
        left: 4px;
        top: 4px;
        color: #fff;
        z-index: 10
    }

    .input-tick input[type=radio]:checked + .wrong-answer ~ .check-text,
    .input-tick input[type=checkbox]:checked + .wrong-answer ~ .check-text {
        color: #ff3737
    }

    .input-tick .checkbox-material.wrong-answer:before {
        background-color: #ff3737
    }

    .input-tick input[type=checkbox]:checked + .checkbox-material .custom-checkbox,
    .input-tick input[type=radio]:checked + .checkbox-material .custom-checkbox {
        color: #59ce61;
        background: #fff
    }

    .input-tick input[type=checkbox]:checked + .checkbox-material .custom-checkbox::before,
    .input-tick input[type=radio]:checked + .checkbox-material .custom-checkbox::before {
        background-color: #59ce61
    }

    .input-tick input[type=checkbox]:checked + .checkbox-material .custom-checkbox::before,
    .input-tick input[type=radio]:checked + .checkbox-material .custom-checkbox::before {
        -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
        box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px
    }

    .input-tick--inline .checkbox-material,
    .input-tick--inline .agreeText {
        display: inline;
        line-height: 15px;
        vertical-align: bottom
    }

    .input-tick--inline .agreeText a,
    .input-tick--inline .custom-checkbox {
        vertical-align: bottom
    }

    .addAnimation .checkbox-material .custom-checkbox::before {
        -webkit-animation: checkbox-off .3s forwards ease-out;
        animation: checkbox-off .3s forwards ease-out
    }

    .addAnimation input[type=checkbox]:checked + .checkbox-material .custom-checkbox,
    .addAnimation input[type=radio]:checked + .checkbox-material .custom-checkbox {
        color: #59ce61;
        background: #fff;
        -webkit-box-shadow: 0 0 0 1px #59ce61;
        box-shadow: 0 0 0 1px #59ce61;
        -webkit-transition: box-shadow .3s ease-out;
        -webkit-transition: -webkit-box-shadow .3s ease-out;
        transition: -webkit-box-shadow .3s ease-out;
        transition: box-shadow .3s ease-out;
        transition: box-shadow .3s ease-out, -webkit-box-shadow .3s ease-out
    }

    .addAnimation input[type=checkbox]:focus + .checkbox-material .custom-checkbox:after,
    .addAnimation input[type=radio]:focus + .checkbox-material .custom-checkbox:after {
        opacity: .2
    }

    .addAnimation input[type=checkbox]:checked + .checkbox-material .custom-checkbox::before,
    .addAnimation input[type=radio]:checked + .checkbox-material .custom-checkbox::before {
        -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
        box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
        -webkit-animation: checkbox-on .3s forwards ease-out;
        animation: checkbox-on .3s forwards ease-out
    }

    .addAnimation input[type=checkbox]:not(:checked) + .checkbox-material {
        -webkit-animation: background-off .3s forwards ease-out;
        animation: background-off .3s forwards ease-out
    }

    .addAnimation input[type=checkbox]:not(:checked) + .checkbox-material:before,
    .addAnimation input[type=radio]:not(:checked) + .checkbox-material:before {
        -webkit-animation: rippleOff 700ms forwards ease-out;
        animation: rippleOff 700ms forwards ease-out
    }

    .addAnimation input[type=checkbox]:checked + .checkbox-material:before,
    .addAnimation input[type=radio]:checked + .checkbox-material:before {
        -webkit-animation: rippleOn 700ms forwards ease-out;
        animation: rippleOn 700ms forwards ease-out
    }

    .addAnimation input[type=checkbox]:not(:checked) + .checkbox-material .custom-checkbox:after,
    .addAnimation input[type=radio]:not(:checked) + .checkbox-material .custom-checkbox:after {
        -webkit-animation: rippleOff 700ms forwards ease-out;
        animation: rippleOff 700ms forwards ease-out
    }

    .addAnimation input[type=checkbox]:checked + .checkbox-material .custom-checkbox:after,
    .addAnimation input[type=radio]:checked + .checkbox-material .custom-checkbox:after {
        -webkit-animation: rippleOn 700ms forwards ease-out;
        animation: rippleOn 700ms forwards ease-out
    }

    .addAnimation input[type=checkbox][disabled]:not(:checked) ~ .checkbox-material .custom-checkbox::before,
    .addAnimation input[type=checkbox][disabled] + .circle {
        opacity: .5
    }

    .addAnimation input[type=checkbox][disabled] + .checkbox-material .check:after {
        -webkit-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
        color: #fff
    }

    @-webkit-keyframes checkbox-on {
        0% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px
        }

        50% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px 2px 0 11px;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px 2px 0 11px
        }

        100% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px
        }
    }

    @keyframes checkbox-on {
        0% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px
        }

        50% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px 2px 0 11px;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px 2px 0 11px
        }

        100% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px
        }
    }

    @-webkit-keyframes checkbox-off {
        0% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset
        }

        25% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset
        }

        50% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            margin-top: -2px;
            margin-left: 8px;
            width: 0;
            height: 0;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px, 0 0 0 0 inset;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px, 0 0 0 0 inset
        }

        51% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            margin-top: 0;
            margin-left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 10px inset;
            box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 10px inset
        }

        100% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            margin-top: 0;
            margin-left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
            box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset
        }
    }

    @keyframes checkbox-off {
        0% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset
        }

        25% {
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px, 0 0 0 0 inset
        }

        50% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            margin-top: -2px;
            margin-left: 8px;
            width: 0;
            height: 0;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px, 0 0 0 0 inset;
            box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px, 0 0 0 0 inset
        }

        51% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            margin-top: 0;
            margin-left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 10px inset;
            box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 10px inset
        }

        100% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            margin-top: 0;
            margin-left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            -webkit-box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
            box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset
        }
    }

    @-webkit-keyframes rippleOn {
        0% {
            opacity: .5
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(13, 13);
            transform: scale(13, 13)
        }
    }

    @keyframes rippleOn {
        0% {
            opacity: .5
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(13, 13);
            transform: scale(13, 13)
        }
    }

    @-webkit-keyframes rippleOff {
        0% {
            opacity: .5
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(13, 13);
            transform: scale(13, 13)
        }
    }

    @keyframes rippleOff {
        0% {
            opacity: .5
        }

        100% {
            opacity: 0;
            -webkit-transform: scale(13, 13);
            transform: scale(13, 13)
        }
    }

    .radio-buttons {
        margin: 0 0 0 30px
    }

    .radio-buttons label {
        color: #fff;
        font-size: 15px;
        line-height: 1.5;
        font-family: sofia-pro-regular, sans-serif;
        text-align: left;
        padding-left: 5px;
        position: relative;
        margin-left: 7px
    }

    .radio-buttons input[type=radio] {
        display: none;
        margin: 0 !important;
        position: relative
    }

    .radio-buttons .check-radio {
        position: absolute;
        left: -20px;
        top: 2px
    }

    .radio-buttons input[type=radio] ~ .check-radio:before,
    .radio-buttons input[type=radio] ~ label .check-radio:before {
        -webkit-transform: rotate(-45deg) scale(0, 0);
        -ms-transform: rotate(-45deg) scale(0, 0);
        transform: rotate(-45deg) scale(0, 0);
        z-index: 1;
        content: '';
        width: 14px;
        height: 14px;
        background: #59ce61;
        position: absolute;
        top: 3px;
        left: 3px;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-transition: transform .4s cubic-bezier(.45, 1.8, .5, .75);
        -webkit-transition: -webkit-transform .4s cubic-bezier(.45, 1.8, .5, .75);
        transition: -webkit-transform .4s cubic-bezier(.45, 1.8, .5, .75);
        transition: transform .4s cubic-bezier(.45, 1.8, .5, .75);
        transition: transform .4s cubic-bezier(.45, 1.8, .5, .75), -webkit-transform .4s cubic-bezier(.45, 1.8, .5, .75)
    }

    .radio-buttons input[type=radio]:checked ~ .check-radio:before,
    .radio-buttons input[type=radio]:checked + label .check-radio:before {
        -webkit-transform: rotate(-45deg) scale(1, 1);
        -ms-transform: rotate(-45deg) scale(1, 1);
        transform: rotate(-45deg) scale(1, 1)
    }

    .radio-buttons input[type=radio] ~ .check-radio:after,
    .radio-buttons input[type=radio] ~ label .check-radio:after {
        background: rgba(255, 255, 255, .1);
        cursor: pointer;
        content: '';
        width: 20px;
        height: 20px;
        top: 0;
        left: 0;
        position: absolute;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .relative-radio {
        display: inline-block;
        -webkit-transform: translateZ(0);
        transform: translateZ(0)
    }

    .relative-radio label {
        cursor: pointer;
        padding-left: 0
    }

    .relative-radio input[type=radio] {
        opacity: 0;
        position: absolute;
        margin: 0;
        z-index: -1;
        width: 0;
        height: 0;
        overflow: hidden;
        left: 0;
        pointer-events: none
    }

    .relative-radio .checkbox-material {
        vertical-align: middle;
        position: relative;
        top: 3px;
        display: inline-block
    }

    .relative-radio .checkbox-material:before {
        position: absolute;
        left: 8px;
        top: 8px;
        content: "";
        background-color: #59ce61;
        height: 4px;
        width: 4px;
        border-radius: 100%;
        z-index: 1;
        opacity: 0;
        margin: 0
    }

    .relative-radio .checkbox-material .custom-checkbox {
        position: relative;
        display: inline-block;
        width: 20px;
        height: 20px;
        background-color: rgba(255, 255, 255, .1);
        border-radius: 50%;
        overflow: hidden;
        z-index: 1;
        color: #59ce61
    }

    .relative-radio .checkbox-material .custom-checkbox:before {
        position: absolute;
        content: "";
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        display: block;
        margin-top: -2px;
        margin-left: 8px;
        width: 0;
        height: 0;
        -webkit-box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
        box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
        color: #59ce61;
        -webkit-animation: .3s forwards ease-out;
        animation: .3s forwards ease-out
    }

    .relative-radio .check-text {
        font-size: 12px;
        margin-left: 5px
    }

    .relative-radio input[type=radio]:checked + .checkbox-material .custom-checkbox {
        color: #59ce61;
        background: #fff
    }

    .relative-radio input[type=radio]:focus + .checkbox-material .custom-checkbox:after {
        opacity: .2
    }

    .relative-radio input[type=radio]:checked + .checkbox-material .custom-checkbox:before {
        -webkit-box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
        box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
        -webkit-animation: checkbox-on .3s forwards ease-out;
        animation: checkbox-on .3s forwards ease-out
    }

    .relative-radio input[type=radio]:not(:checked) + .checkbox-material:before {
        -webkit-animation: rippleOff 700ms forwards ease-out;
        animation: rippleOff 700ms forwards ease-out
    }

    .relative-radio input[type=radio]:checked + .checkbox-material:before {
        -webkit-animation: rippleOn 700ms forwards ease-out;
        animation: rippleOn 700ms forwards ease-out
    }

    .relative-radio input[type=radio]:not(:checked) + .checkbox-material .custom-checkbox:after {
        -webkit-animation: rippleOff 700ms forwards ease-out;
        animation: rippleOff 700ms forwards ease-out
    }

    .relative-radio input[type=radio]:checked + .checkbox-material .custom-checkbox:after {
        -webkit-animation: rippleOn 700ms forwards ease-out;
        animation: rippleOn 700ms forwards ease-out
    }

    @-webkit-keyframes background-off {
        0% {
            background: #fff
        }

        65% {
            background: #fff
        }

        66% {
            background: 0 0
        }

        100% {
            background: rgba(255, 255, 255, .1)
        }
    }

    @keyframes background-off {
        0% {
            background: #fff
        }

        65% {
            background: #fff
        }

        66% {
            background: 0 0
        }

        100% {
            background: rgba(255, 255, 255, .1)
        }
    }

    label {
        font-family: sofia-pro-regular, sans-serif;
        font-size: 12px;
        display: block;
        margin: 0;
        font-weight: 400;
        line-height: 1.8
    }

    .coupon-field {
        position: relative;
        display: inline-block;
        width: 180px
    }

    .coupon-field .red-warning {
        bottom: 7px;
        right: 56px
    }

    .coupon-field input {
        height: 30px !important;
        padding: 8px;
        font-size: 12px !important;
        margin: 10px 0 0 !important
    }

    @media screen and (max-width: 39.99875em) {
        .coupon-field input {
            margin: 5px 0 0 !important
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .coupon-field {
            max-width: 170px
        }
    }

    @media screen and (max-width: 374px) {
        .coupon-field {
            margin: 10px 0;
            max-width: 140px
        }
    }

    .coupon-field .coupon-button {
        font-size: 12px;
        min-width: unset;
        width: 50px !important;
        height: 30px;
        background: #d0d3d5 !important;
        border-radius: 20px !important;
        padding: 0 !important;
        position: absolute;
        border: none;
        top: 10px;
        right: 0;
        color: #0a1e2e;
        outline: none;
        font-family: sofia-pro-regular, sans-serif;
        margin: 0 !important
    }

    @media screen and (max-width: 39.99875em) {
        .coupon-field .coupon-button {
            top: 5px
        }
    }

    .coupon-field .coupon-button .hovered {
        background-color: #bcc1c3
    }

    .coupon-field .coupon-button:hover {
        cursor: pointer
    }

    .coupon-field .err ~ .coupon-button {
        height: 27px;
        top: 11px;
        right: 2px
    }

    @media screen and (max-width: 39.99875em) {
        .coupon-field .err ~ .coupon-button {
            top: 6px
        }
    }

    .contact-form {
        margin-top: 30px
    }

    .contact-form .button {
        margin-bottom: 0
    }

    @media screen and (max-width: 39.99875em) {
        .contact-form .button {
            margin-top: 15px
        }
    }

    .contact-form input:-webkit-autofill,
    .contact-form input:-webkit-autofill:focus,
    .contact-form input:-webkit-autofill:active {
        -webkit-text-fill-color: #fff
    }

    .contact-form select {
        line-height: 1.4
    }

    .contact-form option {
        background: #233543;
        border: #233543
    }

    .contact-form .input-tick .agreeText ~ .red-warning {
        top: 8px
    }

    .contact-form .agree-text {
        margin-top: 20px
    }

    @media (max-width: 365px) {

        .contact-form .grid-x > .small-8,
        .contact-form .grid-x > .small-4 {
            width: 100% !important
        }

        .contact-form .agreeText {
            max-width: unset !important
        }

        .contact-form .agree-text {
            margin-top: 20px
        }
    }

    .contact-form .label-icon-right:after {
        top: 17px
    }

    .contact-form .label-icon-right.select-label.err .red-warning {
        bottom: 22px
    }

    .upgrade-form {
        background: #fff;
        width: 100%;
        height: -webkit-fit-content;
        height: -moz-fit-content;
        height: fit-content
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .upgrade-form {
            margin-top: 50px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-form {
            margin-top: 0
        }
    }

    .upgrade-form .form-container {
        overflow: visible
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-form .form-container {
            padding: 30px
        }
    }

    @media screen and (max-width: 350px) {
        .upgrade-form .form-container {
            padding: 30px 20px
        }
    }

    .upgrade-form .form-container h3 {
        margin-bottom: 10px
    }

    .upgrade-form .input-tick .agreeText {
        margin-left: 5px
    }

    .upgrade-form .input-tick .checkbox-material {
        top: 4px
    }

    .upgrade-form .agree-text {
        margin: 20px 0 0
    }

    .upgrade-form .agree-text .red-warning {
        top: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-form .agree-text .red-warning {
            top: 11px
        }
    }

    .upgrade-form .agree-text .coupon-field .red-warning {
        top: 6px
    }

    .upgrade-form .price del {
        color: rgba(10, 30, 46, .5);
        font-size: 15px
    }

    .upgrade-form .input-with-icon:not(.small) input {
        margin-bottom: 0
    }

    .upgrade-form .input-with-icon:not(.small) .small-icons.green-person {
        bottom: 13px
    }

    .upgrade-form .expire {
        display: inline-block
    }

    @media screen and (min-width: 40em) {
        .upgrade-form .expire {
            margin-right: 10px
        }
    }

    @media screen and (min-width: 1024px) and (max-width: 1060px) {
        .upgrade-form .expire {
            margin-right: 5px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-form .expire {
            width: 100%
        }
    }

    .upgrade-form .select-label {
        width: 80px;
        display: inline-block;
        margin-right: 10px
    }

    @media screen and (min-width: 1024px) and (max-width: 1060px) {
        .upgrade-form .select-label {
            margin-right: 5px
        }
    }

    .upgrade-form .cvc {
        max-width: 89px;
        float: right;
        position: relative
    }

    @media screen and (max-width: 375px) {
        .upgrade-form .cvc {
            max-width: 100px
        }
    }

    .upgrade-form .cvv-input {
        float: right;
        vertical-align: top
    }

    .upgrade-form .cvv-input .input-with-icon {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    @media screen and (max-width: 39.99875em) {
        .upgrade-form .cvv-input {
            display: inline-block
        }
    }

    .upgrade-form .payment-blck {
        margin: 30px 0 0
    }

    .upgrade-form .payment-blck .button {
        margin: 0
    }

    .upgrade-form .initial-price {
        margin: 5px 0 0
    }

    .upgrade-form .code-price {
        margin-left: 5px;
        font-size: 16px
    }

    .upgrade-form .err ~ .count-hint {
        right: 32px
    }

    .upgrade-form .count-hint {
        position: absolute;
        top: 14px;
        right: 14px;
        opacity: .3;
        font-size: 10px;
        line-height: 15px
    }

    @media (max-width: 375px) {
        .upgrade-form .form-container .xsmall-4 {
            width: 33.333% !important;
            margin-left: unset
        }
    }

    @media (max-width: 320px) {
        .upgrade-form .form-container h3 {
            font-size: 16px
        }

        .upgrade-form .tabs-title > a {
            font-size: 16px
        }
    }

    .upgrade-form input,
    .upgrade-form select {
        font-size: 12px !important;
        line-height: 17px
    }

    .upgrade-form input:-webkit-autofill::first-line,
    .upgrade-form select:-webkit-autofill::first-line {
        font-size: 12px !important
    }

    .form-container,
    .registration__form {
        padding: 30px;
        background: #fff;
        margin-bottom: 0
    }

    @media (max-width: 320px) {

        .form-container,
        .registration__form {
            padding: 15px
        }
    }

    .form-container h2,
    .form-container h3,
    .form-container h4,
    .registration__form h2,
    .registration__form h3,
    .registration__form h4 {
        color: #0a1e2e !important;
        margin-bottom: 20px
    }

    .form-container [type=text],
    .form-container [type=password],
    .form-container [type=date],
    .form-container [type=datetime],
    .form-container [type=datetime-local],
    .form-container [type=month],
    .form-container [type=week],
    .form-container [type=email],
    .form-container [type=number],
    .form-container [type=search],
    .form-container [type=tel],
    .form-container [type=time],
    .form-container [type=url],
    .form-container [type=color],
    .form-container select,
    .form-container textarea,
    .form-container .cardPlaceholder,
    .registration__form [type=text],
    .registration__form [type=password],
    .registration__form [type=date],
    .registration__form [type=datetime],
    .registration__form [type=datetime-local],
    .registration__form [type=month],
    .registration__form [type=week],
    .registration__form [type=email],
    .registration__form [type=number],
    .registration__form [type=search],
    .registration__form [type=tel],
    .registration__form [type=time],
    .registration__form [type=url],
    .registration__form [type=color],
    .registration__form select,
    .registration__form textarea,
    .registration__form .cardPlaceholder {
        background-color: rgba(10, 30, 46, .1);
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #0a1e2e
    }

    .form-container [type=text]::-webkit-input-placeholder,
    .form-container [type=password]::-webkit-input-placeholder,
    .form-container [type=date]::-webkit-input-placeholder,
    .form-container [type=datetime]::-webkit-input-placeholder,
    .form-container [type=datetime-local]::-webkit-input-placeholder,
    .form-container [type=month]::-webkit-input-placeholder,
    .form-container [type=week]::-webkit-input-placeholder,
    .form-container [type=email]::-webkit-input-placeholder,
    .form-container [type=number]::-webkit-input-placeholder,
    .form-container [type=search]::-webkit-input-placeholder,
    .form-container [type=tel]::-webkit-input-placeholder,
    .form-container [type=time]::-webkit-input-placeholder,
    .form-container [type=url]::-webkit-input-placeholder,
    .form-container [type=color]::-webkit-input-placeholder,
    .form-container select::-webkit-input-placeholder,
    .form-container textarea::-webkit-input-placeholder,
    .form-container .cardPlaceholder::-webkit-input-placeholder,
    .registration__form [type=text]::-webkit-input-placeholder,
    .registration__form [type=password]::-webkit-input-placeholder,
    .registration__form [type=date]::-webkit-input-placeholder,
    .registration__form [type=datetime]::-webkit-input-placeholder,
    .registration__form [type=datetime-local]::-webkit-input-placeholder,
    .registration__form [type=month]::-webkit-input-placeholder,
    .registration__form [type=week]::-webkit-input-placeholder,
    .registration__form [type=email]::-webkit-input-placeholder,
    .registration__form [type=number]::-webkit-input-placeholder,
    .registration__form [type=search]::-webkit-input-placeholder,
    .registration__form [type=tel]::-webkit-input-placeholder,
    .registration__form [type=time]::-webkit-input-placeholder,
    .registration__form [type=url]::-webkit-input-placeholder,
    .registration__form [type=color]::-webkit-input-placeholder,
    .registration__form select::-webkit-input-placeholder,
    .registration__form textarea::-webkit-input-placeholder,
    .registration__form .cardPlaceholder::-webkit-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .form-container [type=text]::-moz-placeholder,
    .form-container [type=password]::-moz-placeholder,
    .form-container [type=date]::-moz-placeholder,
    .form-container [type=datetime]::-moz-placeholder,
    .form-container [type=datetime-local]::-moz-placeholder,
    .form-container [type=month]::-moz-placeholder,
    .form-container [type=week]::-moz-placeholder,
    .form-container [type=email]::-moz-placeholder,
    .form-container [type=number]::-moz-placeholder,
    .form-container [type=search]::-moz-placeholder,
    .form-container [type=tel]::-moz-placeholder,
    .form-container [type=time]::-moz-placeholder,
    .form-container [type=url]::-moz-placeholder,
    .form-container [type=color]::-moz-placeholder,
    .form-container select::-moz-placeholder,
    .form-container textarea::-moz-placeholder,
    .form-container .cardPlaceholder::-moz-placeholder,
    .registration__form [type=text]::-moz-placeholder,
    .registration__form [type=password]::-moz-placeholder,
    .registration__form [type=date]::-moz-placeholder,
    .registration__form [type=datetime]::-moz-placeholder,
    .registration__form [type=datetime-local]::-moz-placeholder,
    .registration__form [type=month]::-moz-placeholder,
    .registration__form [type=week]::-moz-placeholder,
    .registration__form [type=email]::-moz-placeholder,
    .registration__form [type=number]::-moz-placeholder,
    .registration__form [type=search]::-moz-placeholder,
    .registration__form [type=tel]::-moz-placeholder,
    .registration__form [type=time]::-moz-placeholder,
    .registration__form [type=url]::-moz-placeholder,
    .registration__form [type=color]::-moz-placeholder,
    .registration__form select::-moz-placeholder,
    .registration__form textarea::-moz-placeholder,
    .registration__form .cardPlaceholder::-moz-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .form-container [type=text]:-ms-input-placeholder,
    .form-container [type=password]:-ms-input-placeholder,
    .form-container [type=date]:-ms-input-placeholder,
    .form-container [type=datetime]:-ms-input-placeholder,
    .form-container [type=datetime-local]:-ms-input-placeholder,
    .form-container [type=month]:-ms-input-placeholder,
    .form-container [type=week]:-ms-input-placeholder,
    .form-container [type=email]:-ms-input-placeholder,
    .form-container [type=number]:-ms-input-placeholder,
    .form-container [type=search]:-ms-input-placeholder,
    .form-container [type=tel]:-ms-input-placeholder,
    .form-container [type=time]:-ms-input-placeholder,
    .form-container [type=url]:-ms-input-placeholder,
    .form-container [type=color]:-ms-input-placeholder,
    .form-container select:-ms-input-placeholder,
    .form-container textarea:-ms-input-placeholder,
    .form-container .cardPlaceholder:-ms-input-placeholder,
    .registration__form [type=text]:-ms-input-placeholder,
    .registration__form [type=password]:-ms-input-placeholder,
    .registration__form [type=date]:-ms-input-placeholder,
    .registration__form [type=datetime]:-ms-input-placeholder,
    .registration__form [type=datetime-local]:-ms-input-placeholder,
    .registration__form [type=month]:-ms-input-placeholder,
    .registration__form [type=week]:-ms-input-placeholder,
    .registration__form [type=email]:-ms-input-placeholder,
    .registration__form [type=number]:-ms-input-placeholder,
    .registration__form [type=search]:-ms-input-placeholder,
    .registration__form [type=tel]:-ms-input-placeholder,
    .registration__form [type=time]:-ms-input-placeholder,
    .registration__form [type=url]:-ms-input-placeholder,
    .registration__form [type=color]:-ms-input-placeholder,
    .registration__form select:-ms-input-placeholder,
    .registration__form textarea:-ms-input-placeholder,
    .registration__form .cardPlaceholder:-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .form-container [type=text]::-ms-input-placeholder,
    .form-container [type=password]::-ms-input-placeholder,
    .form-container [type=date]::-ms-input-placeholder,
    .form-container [type=datetime]::-ms-input-placeholder,
    .form-container [type=datetime-local]::-ms-input-placeholder,
    .form-container [type=month]::-ms-input-placeholder,
    .form-container [type=week]::-ms-input-placeholder,
    .form-container [type=email]::-ms-input-placeholder,
    .form-container [type=number]::-ms-input-placeholder,
    .form-container [type=search]::-ms-input-placeholder,
    .form-container [type=tel]::-ms-input-placeholder,
    .form-container [type=time]::-ms-input-placeholder,
    .form-container [type=url]::-ms-input-placeholder,
    .form-container [type=color]::-ms-input-placeholder,
    .form-container select::-ms-input-placeholder,
    .form-container textarea::-ms-input-placeholder,
    .form-container .cardPlaceholder::-ms-input-placeholder,
    .registration__form [type=text]::-ms-input-placeholder,
    .registration__form [type=password]::-ms-input-placeholder,
    .registration__form [type=date]::-ms-input-placeholder,
    .registration__form [type=datetime]::-ms-input-placeholder,
    .registration__form [type=datetime-local]::-ms-input-placeholder,
    .registration__form [type=month]::-ms-input-placeholder,
    .registration__form [type=week]::-ms-input-placeholder,
    .registration__form [type=email]::-ms-input-placeholder,
    .registration__form [type=number]::-ms-input-placeholder,
    .registration__form [type=search]::-ms-input-placeholder,
    .registration__form [type=tel]::-ms-input-placeholder,
    .registration__form [type=time]::-ms-input-placeholder,
    .registration__form [type=url]::-ms-input-placeholder,
    .registration__form [type=color]::-ms-input-placeholder,
    .registration__form select::-ms-input-placeholder,
    .registration__form textarea::-ms-input-placeholder,
    .registration__form .cardPlaceholder::-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .form-container [type=text]::placeholder,
    .form-container [type=password]::placeholder,
    .form-container [type=date]::placeholder,
    .form-container [type=datetime]::placeholder,
    .form-container [type=datetime-local]::placeholder,
    .form-container [type=month]::placeholder,
    .form-container [type=week]::placeholder,
    .form-container [type=email]::placeholder,
    .form-container [type=number]::placeholder,
    .form-container [type=search]::placeholder,
    .form-container [type=tel]::placeholder,
    .form-container [type=time]::placeholder,
    .form-container [type=url]::placeholder,
    .form-container [type=color]::placeholder,
    .form-container select::placeholder,
    .form-container textarea::placeholder,
    .form-container .cardPlaceholder::placeholder,
    .registration__form [type=text]::placeholder,
    .registration__form [type=password]::placeholder,
    .registration__form [type=date]::placeholder,
    .registration__form [type=datetime]::placeholder,
    .registration__form [type=datetime-local]::placeholder,
    .registration__form [type=month]::placeholder,
    .registration__form [type=week]::placeholder,
    .registration__form [type=email]::placeholder,
    .registration__form [type=number]::placeholder,
    .registration__form [type=search]::placeholder,
    .registration__form [type=tel]::placeholder,
    .registration__form [type=time]::placeholder,
    .registration__form [type=url]::placeholder,
    .registration__form [type=color]::placeholder,
    .registration__form select::placeholder,
    .registration__form textarea::placeholder,
    .registration__form .cardPlaceholder::placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .form-container [type=text]:focus,
    .form-container [type=password]:focus,
    .form-container [type=date]:focus,
    .form-container [type=datetime]:focus,
    .form-container [type=datetime-local]:focus,
    .form-container [type=month]:focus,
    .form-container [type=week]:focus,
    .form-container [type=email]:focus,
    .form-container [type=number]:focus,
    .form-container [type=search]:focus,
    .form-container [type=tel]:focus,
    .form-container [type=time]:focus,
    .form-container [type=url]:focus,
    .form-container [type=color]:focus,
    .form-container select:focus,
    .form-container textarea:focus,
    .form-container .cardPlaceholder:focus,
    .registration__form [type=text]:focus,
    .registration__form [type=password]:focus,
    .registration__form [type=date]:focus,
    .registration__form [type=datetime]:focus,
    .registration__form [type=datetime-local]:focus,
    .registration__form [type=month]:focus,
    .registration__form [type=week]:focus,
    .registration__form [type=email]:focus,
    .registration__form [type=number]:focus,
    .registration__form [type=search]:focus,
    .registration__form [type=tel]:focus,
    .registration__form [type=time]:focus,
    .registration__form [type=url]:focus,
    .registration__form [type=color]:focus,
    .registration__form select:focus,
    .registration__form textarea:focus,
    .registration__form .cardPlaceholder:focus {
        background-color: rgba(10, 30, 46, .1);
        color: #0a1e2e;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .form-container [type=text]:disabled,
    .form-container [type=password]:disabled,
    .form-container [type=date]:disabled,
    .form-container [type=datetime]:disabled,
    .form-container [type=datetime-local]:disabled,
    .form-container [type=month]:disabled,
    .form-container [type=week]:disabled,
    .form-container [type=email]:disabled,
    .form-container [type=number]:disabled,
    .form-container [type=search]:disabled,
    .form-container [type=tel]:disabled,
    .form-container [type=time]:disabled,
    .form-container [type=url]:disabled,
    .form-container [type=color]:disabled,
    .form-container select:disabled,
    .form-container textarea:disabled,
    .form-container .cardPlaceholder:disabled,
    .registration__form [type=text]:disabled,
    .registration__form [type=password]:disabled,
    .registration__form [type=date]:disabled,
    .registration__form [type=datetime]:disabled,
    .registration__form [type=datetime-local]:disabled,
    .registration__form [type=month]:disabled,
    .registration__form [type=week]:disabled,
    .registration__form [type=email]:disabled,
    .registration__form [type=number]:disabled,
    .registration__form [type=search]:disabled,
    .registration__form [type=tel]:disabled,
    .registration__form [type=time]:disabled,
    .registration__form [type=url]:disabled,
    .registration__form [type=color]:disabled,
    .registration__form select:disabled,
    .registration__form textarea:disabled,
    .registration__form .cardPlaceholder:disabled {
        background: #d0f1d1;
        color: #0a1e2e !important;
        border: 1px solid #d0f1d1;
        cursor: not-allowed
    }

    .form-container [type=text]:disabled:focus,
    .form-container [type=password]:disabled:focus,
    .form-container [type=date]:disabled:focus,
    .form-container [type=datetime]:disabled:focus,
    .form-container [type=datetime-local]:disabled:focus,
    .form-container [type=month]:disabled:focus,
    .form-container [type=week]:disabled:focus,
    .form-container [type=email]:disabled:focus,
    .form-container [type=number]:disabled:focus,
    .form-container [type=search]:disabled:focus,
    .form-container [type=tel]:disabled:focus,
    .form-container [type=time]:disabled:focus,
    .form-container [type=url]:disabled:focus,
    .form-container [type=color]:disabled:focus,
    .form-container select:disabled:focus,
    .form-container textarea:disabled:focus,
    .form-container .cardPlaceholder:disabled:focus,
    .registration__form [type=text]:disabled:focus,
    .registration__form [type=password]:disabled:focus,
    .registration__form [type=date]:disabled:focus,
    .registration__form [type=datetime]:disabled:focus,
    .registration__form [type=datetime-local]:disabled:focus,
    .registration__form [type=month]:disabled:focus,
    .registration__form [type=week]:disabled:focus,
    .registration__form [type=email]:disabled:focus,
    .registration__form [type=number]:disabled:focus,
    .registration__form [type=search]:disabled:focus,
    .registration__form [type=tel]:disabled:focus,
    .registration__form [type=time]:disabled:focus,
    .registration__form [type=url]:disabled:focus,
    .registration__form [type=color]:disabled:focus,
    .registration__form select:disabled:focus,
    .registration__form textarea:disabled:focus,
    .registration__form .cardPlaceholder:disabled:focus {
        background: #d0f1d1;
        border: 1px solid #d0f1d1
    }

    .form-container [type=password],
    .registration__form [type=password] {
        font-size: 30px;
        color: #083a50;
        padding: 0 15px 10px
    }

    .form-container [type=password]::-webkit-input-placeholder,
    .registration__form [type=password]::-webkit-input-placeholder {
        font-size: 15px !important
    }

    .form-container [type=password]::-moz-placeholder,
    .registration__form [type=password]::-moz-placeholder {
        font-size: 15px !important
    }

    .form-container [type=password]:-ms-input-placeholder,
    .registration__form [type=password]:-ms-input-placeholder {
        font-size: 15px !important
    }

    .form-container [type=password]::-ms-input-placeholder,
    .registration__form [type=password]::-ms-input-placeholder {
        font-size: 15px !important
    }

    .form-container [type=password]::placeholder,
    .registration__form [type=password]::placeholder {
        font-size: 15px !important
    }

    .form-container .with-autofill select,
    .registration__form .with-autofill select {
        background-color: #e5e7e9
    }

    .form-container select,
    .registration__form select {
        color: rgba(10, 30, 46, .5)
    }

    .form-container .input-with-icon,
    .registration__form .input-with-icon {
        position: relative;
        display: inline-block;
        width: 100%
    }

    .form-container .input-with-icon .small-icons,
    .registration__form .input-with-icon .small-icons {
        position: absolute;
        bottom: 22px;
        left: 10px;
        z-index: 1
    }

    .form-container .input-with-icon .small-icons.green-tooltip-icon,
    .registration__form .input-with-icon .small-icons.green-tooltip-icon {
        bottom: 20px
    }

    .form-container .input-with-icon input,
    .registration__form .input-with-icon input {
        padding-left: 30px;
        background: #d0f1d1;
        border: 1px solid #d0f1d1
    }

    .form-container .input-with-icon input:focus,
    .registration__form .input-with-icon input:focus {
        background: #d0f1d1;
        border: 1px solid #d0f1d1
    }

    .form-container .input-with-icon.input-with-error .small-icon,
    .registration__form .input-with-icon.input-with-error .small-icon {
        bottom: 46px
    }

    .form-container .input-with-icon.small .small-icon,
    .registration__form .input-with-icon.small .small-icon {
        left: unset;
        right: 10px !important
    }

    .form-container .input-with-icon.small input,
    .registration__form .input-with-icon.small input {
        padding: 12px 15px;
        background-color: rgba(10, 30, 46, .1);
        border: 1px solid #e6e8e9
    }

    .form-container .input-with-icon.small input:focus,
    .registration__form .input-with-icon.small input:focus {
        background-color: rgba(10, 30, 46, .1);
        border: 1px solid #e6e8e9
    }

    @media (max-width: 375px) {

        .form-container .input-with-icon.small input,
        .registration__form .input-with-icon.small input {
            padding: 10px
        }
    }

    .form-container .select-label.selected-value > select,
    .registration__form .select-label.selected-value > select {
        color: #0a1e2e
    }

    .form-container .select-label:after,
    .registration__form .select-label:after {
        background-position: -423px -52px;
        width: 12px;
        height: 8px;
        opacity: .5
    }

    .form-container .select-label::-webkit-input-placeholder,
    .registration__form .select-label::-webkit-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    .form-container .select-label::-moz-placeholder,
    .registration__form .select-label::-moz-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    .form-container .select-label:-ms-input-placeholder,
    .registration__form .select-label:-ms-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    .form-container .select-label::-ms-input-placeholder,
    .registration__form .select-label::-ms-input-placeholder {
        color: rgba(255, 255, 255, .5)
    }

    .form-container .select-label::placeholder,
    .registration__form .select-label::placeholder {
        color: rgba(255, 255, 255, .5)
    }

    .form-container .select-label select,
    .registration__form .select-label select {
        padding: 8px 15px;
        line-height: 1.3
    }

    .form-container .agreeText,
    .registration__form .agreeText {
        font-size: 12px;
        color: rgba(10, 30, 46, .5);
        margin-top: 20px;
        vertical-align: bottom
    }

    @media screen and (max-width: 39.99875em) {

        .form-container .agreeText,
        .registration__form .agreeText {
            margin-top: 10px
        }
    }

    .form-container .agreeText a,
    .registration__form .agreeText a {
        color: rgba(10, 30, 46, .5);
        text-decoration: underline !important
    }

    .form-container .agreeText a:hover,
    .registration__form .agreeText a:hover {
        color: #59ce61
    }

    .form-container .agreeText .button.green,
    .registration__form .agreeText .button.green {
        margin-top: 0
    }

    .form-container .agreeText label,
    .registration__form .agreeText label {
        margin-bottom: 0
    }

    .form-container a,
    .registration__form a {
        color: rgba(10, 30, 46, .5);
        text-decoration: underline
    }

    .form-container .custom-checkbox,
    .registration__form .custom-checkbox {
        background-color: #e6e8e9 !important
    }

    .form-container .custom-checkbox.checked,
    .registration__form .custom-checkbox.checked {
        background: #59ce61 !important
    }

    .form-container .button,
    .registration__form .button {
        margin-bottom: 0;
        margin-top: 10px
    }

    .form-container .button--form,
    .registration__form .button--form {
        margin-top: 0;
        color: #fff;
        text-decoration: none
    }

    .form-container .button.red,
    .form-container .button.blue,
    .registration__form .button.red,
    .registration__form .button.blue {
        margin-top: 20px
    }

    @media screen and (max-width: 39.99875em) {

        .form-container .button.blue,
        .registration__form .button.blue {
            margin-top: 10px
        }
    }

    .form-container .input-tick .agreeText ~ .red-warning,
    .registration__form .input-tick .agreeText ~ .red-warning {
        top: 20px
    }

    @media screen and (max-width: 39.99875em) {

        .form-container .input-tick .agreeText ~ .red-warning,
        .registration__form .input-tick .agreeText ~ .red-warning {
            top: 12px
        }
    }

    .form-container .expire,
    .registration__form .expire {
        color: rgba(10, 30, 46, .5);
        margin-bottom: 10px;
        font-size: 15px
    }

    .form-container .label-icon-right:after,
    .registration__form .label-icon-right:after {
        top: 17px
    }

    .form-container .label-icon-right.select-label.err .red-warning,
    .registration__form .label-icon-right.select-label.err .red-warning {
        bottom: 22px
    }

    .form-container .label-icon-right.expired-date.err select,
    .registration__form .label-icon-right.expired-date.err select {
        padding: 8px
    }

    .form-container .label-icon-right.expired-date.err:after,
    .registration__form .label-icon-right.expired-date.err:after {
        right: 30px
    }

    @media (max-width: 320px) {

        .form-container .button.green,
        .registration__form .button.green {
            width: 100%;
            margin-top: 10px !important
        }

        .form-container .button.red,
        .registration__form .button.red {
            margin-top: 10px
        }
    }

    .form-container .discount-price,
    .registration__form .discount-price {
        margin: 5px 0 0
    }

    .form-container .discount-price del,
    .registration__form .discount-price del {
        font-size: 20px;
        margin-right: 5px
    }

    .form-container .login-register__header,
    .registration__form .login-register__header {
        color: #0a1e2e !important;
        margin-bottom: 20px;
        font-size: 20px;
        line-height: 22px;
        margin-top: 0
    }

    .registration__form .select-label.is-selected select {
        color: #0a1e2e
    }

    .registration__form .custom-sized-select-placeholder.is-selected {
        color: #0a1e2e !important
    }

    .registration__form {
        max-width: 1048px;
        margin: auto;
        padding: 0;
        border-radius: 5px
    }

    @media screen and (max-width: 39.99875em) {
        .registration__form {
            border-radius: 0
        }
    }

    @media screen and (min-width: 64.0625em) {
        .registration__form .input-tick {
            margin-bottom: 10px
        }
    }

    .registration__form .checkbox-material {
        top: 4px
    }

    .registration__form .agree-text {
        margin: 10px 0 0
    }

    .registration__form .agree-text .agreeText {
        margin-top: 0
    }

    .registration__form .agree-text .red-warning {
        top: 11px
    }

    @media (max-width: 450px) {
        .registration__form .agree-text .red-warning {
            top: 15px;
            right: 13px
        }
    }

    @media screen and (min-width: 40em) {
        .registration__form .agree-text .button {
            margin: 0
        }
    }

    .registration__form .button--green--large {
        min-width: 175px
    }

    .registration__form .button--green--large .upgrade-icon {
        margin: 0 0 -1px 10px
    }

    .registration__left-side {
        padding: 50px 40px
    }

    .registration__left-side .set-up__info {
        margin-top: 10px
    }

    @media screen and (max-width: 64.06125em) {
        .registration__left-side {
            padding: 50px 20px 30px
        }

        .registration__left-side .input-tick {
            margin-bottom: 12px
        }

        .registration__left-side .set-up__info {
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center
        }
    }

    @media screen and (max-width: 39.99875em) {
        .registration__left-side {
            padding: 30px 30px 40px
        }
    }

    @media screen and (max-width: 340px) {
        .registration__left-side {
            padding: 30px 10px 40px
        }
    }

    .registration__right-side {
        background: rgba(10, 30, 46, .1);
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding: 0 40px;
        position: relative
    }

    @media screen and (max-width: 64.06125em) {
        .registration__right-side {
            padding: 40px 20px 35px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .registration__right-side {
            padding: 80px 30px
        }
    }

    @media screen and (max-width: 340px) {
        .registration__right-side {
            padding: 80px 10px
        }
    }

    .registration__right-side .green-circle {
        position: absolute;
        background: rgba(89, 206, 97, .16);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .registration__right-side .green-circle.top-half {
        top: 0;
        left: 20px;
        width: 100px;
        height: 50px;
        border-radius: 0 0 50px 50px
    }

    .registration__right-side .circle {
        position: absolute;
        background: rgba(10, 30, 46, .08);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .registration__right-side .circle.top-small {
        top: 45px;
        left: 115px;
        width: 30px;
        height: 30px
    }

    .registration__right-side .circle.bottom-half {
        bottom: 0;
        right: 40px;
        width: 100px;
        height: 50px;
        border-radius: 50px 50px 0 0
    }

    .registration__link {
        color: #083a50 !important;
        font-family: sofia-pro-regular, sans-serif;
        margin: 0
    }

    .registration__link a {
        color: #59ce61 !important;
        text-decoration: underline
    }

    .registration__img-block {
        -webkit-align-self: center;
        -ms-flex-item-align: center;
        align-self: center;
        text-align: center
    }

    @media screen and (max-width: 64.06125em) {
        .registration__img-block {
            margin: auto
        }
    }

    .registration__img-block p {
        color: #083a50;
        margin: 20px 0
    }

    @media screen and (max-width: 64.06125em) {
        .registration__img-block p {
            margin: 0 0 30px
        }
    }

    .registration__social {
        color: rgba(10, 30, 46, .5) !important;
        margin-top: 15px !important
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .registration__social-btns {
            max-width: 500px
        }
    }

    .registration__social-btns .button--clear {
        min-width: 200px
    }

    @media screen and (min-width: 40em) {
        .registration__social-btns .button--clear {
            text-align: start
        }
    }

    @media screen and (min-width: 64.0625em) {
        .registration__social-btns .button--clear:nth-child(2) {
            padding: 7px 18px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .registration__social-btns .button--clear {
            margin: 10px 5px 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .registration__social-btns .button--clear {
            width: 100%
        }

        .registration__social-btns .button--clear .upgrade-icon,
        .registration__social-btns .button--clear .small-icons {
            position: absolute;
            left: 15px
        }
    }

    .registration__social-btns .button--clear .upgrade-icon {
        margin-bottom: -1px
    }

    .form-container .input-tick-wrapper,
    .registration__form .input-tick-wrapper {
        padding: 7px 15px 3px;
        width: 100%;
        background-color: rgba(255, 138, 71, .3);
        border-radius: 20px;
        text-align: center;
        position: relative
    }

    .form-container .input-tick-wrapper label,
    .registration__form .input-tick-wrapper label {
        line-height: 17px
    }

    .form-container .input-tick-wrapper .agreeText,
    .registration__form .input-tick-wrapper .agreeText {
        margin-left: 10px
    }

    .form-container .input-tick-wrapper .input-tick--inline,
    .registration__form .input-tick-wrapper .input-tick--inline {
        margin-bottom: 10px
    }

    .form-container .input-tick-wrapper .agreeText,
    .form-container .input-tick-wrapper a,
    .registration__form .input-tick-wrapper .agreeText,
    .registration__form .input-tick-wrapper a {
        color: #0a1e2e;
        font-size: 15px
    }

    .form-container .input-tick-wrapper .custom-checkbox,
    .registration__form .input-tick-wrapper .custom-checkbox {
        background-color: rgba(255, 255, 255, .8) !important
    }

    .form-container .input-tick-wrapper a:hover,
    .registration__form .input-tick-wrapper a:hover {
        color: #0a1e2e;
        cursor: pointer;
        opacity: .8
    }

    .license-checkout__box .label-icon-right.expired-date.err .red-warning {
        bottom: 13px
    }

    .license-checkout__box .label-icon-right.expired-date.err::after {
        right: 28px
    }

    .license-checkout__box .label-icon-right.expired-date.err select {
        padding: 8px 10px
    }

    .partner {
        padding-top: 80px;
        padding-bottom: 80px
    }

    @media screen and (max-width: 64.06125em) {
        .partner {
            padding-top: 50px;
            padding-bottom: 50px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .partner .agree-text {
            margin-top: 10px
        }
    }

    @media (max-width: 365px) {

        .partner .grid-x > .small-8,
        .partner .grid-x > .small-4 {
            width: 100% !important
        }

        .partner .agreeText {
            max-width: unset !important
        }

        .partner .agree-text {
            margin-top: 20px
        }
    }

    .partner .grid-container {
        padding: 0 !important
    }

    .partner__title {
        color: #0a1e2e !important;
        margin-bottom: 10px !important;
        line-height: 25px
    }

    .partner__subtitle {
        color: #9d9d9d !important;
        margin-bottom: 20px
    }

    .partner .checkbox-material {
        top: 4px
    }

    .partner .agree-text .red-warning {
        top: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .partner .agree-text .red-warning {
            top: 11px
        }
    }

    .login-form {
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(10, 30, 46, 0.8)), to(rgba(10, 30, 46, 0.8))), url(//cdn0.careerhunter.io/assets/dashboard-9e78b639f1e4b08fee54110bea7d1bb73ec4d6995005b85a43bf54de4619a87b.jpg);
        background: -webkit-linear-gradient(rgba(10, 30, 46, 0.8), rgba(10, 30, 46, 0.8)), url(//cdn0.careerhunter.io/assets/dashboard-9e78b639f1e4b08fee54110bea7d1bb73ec4d6995005b85a43bf54de4619a87b.jpg);
        background: linear-gradient(rgba(10, 30, 46, 0.8), rgba(10, 30, 46, 0.8)), url(//cdn0.careerhunter.io/assets/dashboard-9e78b639f1e4b08fee54110bea7d1bb73ec4d6995005b85a43bf54de4619a87b.jpg);
        height: 100vh;
        min-height: 100%
    }

    @media screen and (max-height: 699px) {
        .login-form {
            height: 100% !important
        }
    }

    @media screen and (max-width: 64.06125em) {
        .login-form {
            height: 100%
        }
    }

    @media screen and (min-width: 64.0625em) {

        .login-form .login-register,
        .login-form .form-container {
            width: 541px;
            margin: 0 auto
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {

        .login-form .login-register,
        .login-form .form-container {
            max-width: 580px
        }
    }

    @media screen and (min-width: 64.0625em) {

        .login-form .grid-container.transparent,
        .popup__content-login .grid-container.transparent {
            padding-top: 0 !important;
            padding-bottom: 0 !important
        }
    }

    @media screen and (min-width: 1025px) and (max-width: 1440px) {

        .login-form .grid-container.transparent,
        .popup__content-login .grid-container.transparent {
            padding-top: 100px !important;
            padding-bottom: 100px !important
        }
    }

    @media screen and (max-width: 64.06125em) {

        .login-form .grid-container.transparent,
        .popup__content-login .grid-container.transparent {
            padding-bottom: 80px !important
        }
    }

    @media screen and (max-width: 39.99875em) {

        .login-form .grid-container.transparent,
        .popup__content-login .grid-container.transparent {
            padding-top: 80px !important;
            padding-bottom: 80px !important
        }
    }

    .login-form .grid-container .align-middle.blk,
    .popup__content-login .grid-container .align-middle.blk {
        min-height: calc(100vh + 50px)
    }

    @media screen and (max-width: 1440px) {

        .login-form .grid-container .align-middle.blk,
        .popup__content-login .grid-container .align-middle.blk {
            min-height: calc(100vh - 200px)
        }
    }

    @media screen and (max-width: 39.99875em) {

        .login-form .grid-container .align-middle.blk,
        .popup__content-login .grid-container .align-middle.blk {
            min-height: calc(100vh - 100px)
        }
    }

    @media (max-width: 1100px) and (min-width: 1025px) {

        .login-form .grid-container .grid-x > .large-5,
        .popup__content-login .grid-container .grid-x > .large-5 {
            width: 48%
        }
    }

    .login-form .login-register,
    .popup__content-login .login-register {
        padding: 30px;
        background: #fff;
        margin: 0 auto;
        overflow: visible;
        border-radius: 5px
    }

    @media (max-width: 320px) {

        .login-form .login-register,
        .popup__content-login .login-register {
            padding: 15px
        }
    }

    .login-form .login-register p,
    .popup__content-login .login-register p {
        color: #142b3d
    }

    .login-form .login-register__header,
    .popup__content-login .login-register__header {
        color: #0a1e2e !important;
        margin-bottom: 20px;
        font-size: 20px;
        line-height: 22px;
        margin-top: 0
    }

    .login-form .login-register h3,
    .popup__content-login .login-register h3 {
        color: #0a1e2e !important;
        margin-bottom: 20px
    }

    .login-form .login-register .forgot-password a,
    .login-form .login-register .link-forms a,
    .popup__content-login .login-register .forgot-password a,
    .popup__content-login .login-register .link-forms a {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    .login-form .login-register .forgot-password a:hover,
    .login-form .login-register .link-forms a:hover,
    .popup__content-login .login-register .forgot-password a:hover,
    .popup__content-login .login-register .link-forms a:hover {
        color: #59ce61
    }

    .login-form .login-register .forgot-password,
    .popup__content-login .login-register .forgot-password {
        margin: 10px 0
    }

    .login-form .login-register a,
    .popup__content-login .login-register a {
        color: rgba(10, 30, 46, .5)
    }

    .login-form .login-register [type=text],
    .login-form .login-register [type=password],
    .login-form .login-register [type=date],
    .login-form .login-register [type=datetime],
    .login-form .login-register [type=datetime-local],
    .login-form .login-register [type=month],
    .login-form .login-register [type=week],
    .login-form .login-register [type=email],
    .login-form .login-register [type=number],
    .login-form .login-register [type=search],
    .login-form .login-register [type=tel],
    .login-form .login-register [type=time],
    .login-form .login-register [type=url],
    .login-form .login-register [type=color],
    .login-form .login-register select,
    .login-form .login-register textarea,
    .popup__content-login .login-register [type=text],
    .popup__content-login .login-register [type=password],
    .popup__content-login .login-register [type=date],
    .popup__content-login .login-register [type=datetime],
    .popup__content-login .login-register [type=datetime-local],
    .popup__content-login .login-register [type=month],
    .popup__content-login .login-register [type=week],
    .popup__content-login .login-register [type=email],
    .popup__content-login .login-register [type=number],
    .popup__content-login .login-register [type=search],
    .popup__content-login .login-register [type=tel],
    .popup__content-login .login-register [type=time],
    .popup__content-login .login-register [type=url],
    .popup__content-login .login-register [type=color],
    .popup__content-login .login-register select,
    .popup__content-login .login-register textarea {
        background-color: rgba(10, 30, 46, .1);
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #0a1e2e
    }

    .login-form .login-register [type=text]::-webkit-input-placeholder,
    .login-form .login-register [type=password]::-webkit-input-placeholder,
    .login-form .login-register [type=date]::-webkit-input-placeholder,
    .login-form .login-register [type=datetime]::-webkit-input-placeholder,
    .login-form .login-register [type=datetime-local]::-webkit-input-placeholder,
    .login-form .login-register [type=month]::-webkit-input-placeholder,
    .login-form .login-register [type=week]::-webkit-input-placeholder,
    .login-form .login-register [type=email]::-webkit-input-placeholder,
    .login-form .login-register [type=number]::-webkit-input-placeholder,
    .login-form .login-register [type=search]::-webkit-input-placeholder,
    .login-form .login-register [type=tel]::-webkit-input-placeholder,
    .login-form .login-register [type=time]::-webkit-input-placeholder,
    .login-form .login-register [type=url]::-webkit-input-placeholder,
    .login-form .login-register [type=color]::-webkit-input-placeholder,
    .login-form .login-register select::-webkit-input-placeholder,
    .login-form .login-register textarea::-webkit-input-placeholder,
    .popup__content-login .login-register [type=text]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=password]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=date]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=datetime]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=datetime-local]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=month]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=week]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=email]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=number]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=search]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=tel]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=time]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=url]::-webkit-input-placeholder,
    .popup__content-login .login-register [type=color]::-webkit-input-placeholder,
    .popup__content-login .login-register select::-webkit-input-placeholder,
    .popup__content-login .login-register textarea::-webkit-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .login-form .login-register [type=text]::-moz-placeholder,
    .login-form .login-register [type=password]::-moz-placeholder,
    .login-form .login-register [type=date]::-moz-placeholder,
    .login-form .login-register [type=datetime]::-moz-placeholder,
    .login-form .login-register [type=datetime-local]::-moz-placeholder,
    .login-form .login-register [type=month]::-moz-placeholder,
    .login-form .login-register [type=week]::-moz-placeholder,
    .login-form .login-register [type=email]::-moz-placeholder,
    .login-form .login-register [type=number]::-moz-placeholder,
    .login-form .login-register [type=search]::-moz-placeholder,
    .login-form .login-register [type=tel]::-moz-placeholder,
    .login-form .login-register [type=time]::-moz-placeholder,
    .login-form .login-register [type=url]::-moz-placeholder,
    .login-form .login-register [type=color]::-moz-placeholder,
    .login-form .login-register select::-moz-placeholder,
    .login-form .login-register textarea::-moz-placeholder,
    .popup__content-login .login-register [type=text]::-moz-placeholder,
    .popup__content-login .login-register [type=password]::-moz-placeholder,
    .popup__content-login .login-register [type=date]::-moz-placeholder,
    .popup__content-login .login-register [type=datetime]::-moz-placeholder,
    .popup__content-login .login-register [type=datetime-local]::-moz-placeholder,
    .popup__content-login .login-register [type=month]::-moz-placeholder,
    .popup__content-login .login-register [type=week]::-moz-placeholder,
    .popup__content-login .login-register [type=email]::-moz-placeholder,
    .popup__content-login .login-register [type=number]::-moz-placeholder,
    .popup__content-login .login-register [type=search]::-moz-placeholder,
    .popup__content-login .login-register [type=tel]::-moz-placeholder,
    .popup__content-login .login-register [type=time]::-moz-placeholder,
    .popup__content-login .login-register [type=url]::-moz-placeholder,
    .popup__content-login .login-register [type=color]::-moz-placeholder,
    .popup__content-login .login-register select::-moz-placeholder,
    .popup__content-login .login-register textarea::-moz-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .login-form .login-register [type=text]:-ms-input-placeholder,
    .login-form .login-register [type=password]:-ms-input-placeholder,
    .login-form .login-register [type=date]:-ms-input-placeholder,
    .login-form .login-register [type=datetime]:-ms-input-placeholder,
    .login-form .login-register [type=datetime-local]:-ms-input-placeholder,
    .login-form .login-register [type=month]:-ms-input-placeholder,
    .login-form .login-register [type=week]:-ms-input-placeholder,
    .login-form .login-register [type=email]:-ms-input-placeholder,
    .login-form .login-register [type=number]:-ms-input-placeholder,
    .login-form .login-register [type=search]:-ms-input-placeholder,
    .login-form .login-register [type=tel]:-ms-input-placeholder,
    .login-form .login-register [type=time]:-ms-input-placeholder,
    .login-form .login-register [type=url]:-ms-input-placeholder,
    .login-form .login-register [type=color]:-ms-input-placeholder,
    .login-form .login-register select:-ms-input-placeholder,
    .login-form .login-register textarea:-ms-input-placeholder,
    .popup__content-login .login-register [type=text]:-ms-input-placeholder,
    .popup__content-login .login-register [type=password]:-ms-input-placeholder,
    .popup__content-login .login-register [type=date]:-ms-input-placeholder,
    .popup__content-login .login-register [type=datetime]:-ms-input-placeholder,
    .popup__content-login .login-register [type=datetime-local]:-ms-input-placeholder,
    .popup__content-login .login-register [type=month]:-ms-input-placeholder,
    .popup__content-login .login-register [type=week]:-ms-input-placeholder,
    .popup__content-login .login-register [type=email]:-ms-input-placeholder,
    .popup__content-login .login-register [type=number]:-ms-input-placeholder,
    .popup__content-login .login-register [type=search]:-ms-input-placeholder,
    .popup__content-login .login-register [type=tel]:-ms-input-placeholder,
    .popup__content-login .login-register [type=time]:-ms-input-placeholder,
    .popup__content-login .login-register [type=url]:-ms-input-placeholder,
    .popup__content-login .login-register [type=color]:-ms-input-placeholder,
    .popup__content-login .login-register select:-ms-input-placeholder,
    .popup__content-login .login-register textarea:-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .login-form .login-register [type=text]::-ms-input-placeholder,
    .login-form .login-register [type=password]::-ms-input-placeholder,
    .login-form .login-register [type=date]::-ms-input-placeholder,
    .login-form .login-register [type=datetime]::-ms-input-placeholder,
    .login-form .login-register [type=datetime-local]::-ms-input-placeholder,
    .login-form .login-register [type=month]::-ms-input-placeholder,
    .login-form .login-register [type=week]::-ms-input-placeholder,
    .login-form .login-register [type=email]::-ms-input-placeholder,
    .login-form .login-register [type=number]::-ms-input-placeholder,
    .login-form .login-register [type=search]::-ms-input-placeholder,
    .login-form .login-register [type=tel]::-ms-input-placeholder,
    .login-form .login-register [type=time]::-ms-input-placeholder,
    .login-form .login-register [type=url]::-ms-input-placeholder,
    .login-form .login-register [type=color]::-ms-input-placeholder,
    .login-form .login-register select::-ms-input-placeholder,
    .login-form .login-register textarea::-ms-input-placeholder,
    .popup__content-login .login-register [type=text]::-ms-input-placeholder,
    .popup__content-login .login-register [type=password]::-ms-input-placeholder,
    .popup__content-login .login-register [type=date]::-ms-input-placeholder,
    .popup__content-login .login-register [type=datetime]::-ms-input-placeholder,
    .popup__content-login .login-register [type=datetime-local]::-ms-input-placeholder,
    .popup__content-login .login-register [type=month]::-ms-input-placeholder,
    .popup__content-login .login-register [type=week]::-ms-input-placeholder,
    .popup__content-login .login-register [type=email]::-ms-input-placeholder,
    .popup__content-login .login-register [type=number]::-ms-input-placeholder,
    .popup__content-login .login-register [type=search]::-ms-input-placeholder,
    .popup__content-login .login-register [type=tel]::-ms-input-placeholder,
    .popup__content-login .login-register [type=time]::-ms-input-placeholder,
    .popup__content-login .login-register [type=url]::-ms-input-placeholder,
    .popup__content-login .login-register [type=color]::-ms-input-placeholder,
    .popup__content-login .login-register select::-ms-input-placeholder,
    .popup__content-login .login-register textarea::-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .login-form .login-register [type=text]::placeholder,
    .login-form .login-register [type=password]::placeholder,
    .login-form .login-register [type=date]::placeholder,
    .login-form .login-register [type=datetime]::placeholder,
    .login-form .login-register [type=datetime-local]::placeholder,
    .login-form .login-register [type=month]::placeholder,
    .login-form .login-register [type=week]::placeholder,
    .login-form .login-register [type=email]::placeholder,
    .login-form .login-register [type=number]::placeholder,
    .login-form .login-register [type=search]::placeholder,
    .login-form .login-register [type=tel]::placeholder,
    .login-form .login-register [type=time]::placeholder,
    .login-form .login-register [type=url]::placeholder,
    .login-form .login-register [type=color]::placeholder,
    .login-form .login-register select::placeholder,
    .login-form .login-register textarea::placeholder,
    .popup__content-login .login-register [type=text]::placeholder,
    .popup__content-login .login-register [type=password]::placeholder,
    .popup__content-login .login-register [type=date]::placeholder,
    .popup__content-login .login-register [type=datetime]::placeholder,
    .popup__content-login .login-register [type=datetime-local]::placeholder,
    .popup__content-login .login-register [type=month]::placeholder,
    .popup__content-login .login-register [type=week]::placeholder,
    .popup__content-login .login-register [type=email]::placeholder,
    .popup__content-login .login-register [type=number]::placeholder,
    .popup__content-login .login-register [type=search]::placeholder,
    .popup__content-login .login-register [type=tel]::placeholder,
    .popup__content-login .login-register [type=time]::placeholder,
    .popup__content-login .login-register [type=url]::placeholder,
    .popup__content-login .login-register [type=color]::placeholder,
    .popup__content-login .login-register select::placeholder,
    .popup__content-login .login-register textarea::placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .login-form .login-register [type=text]:focus,
    .login-form .login-register [type=password]:focus,
    .login-form .login-register [type=date]:focus,
    .login-form .login-register [type=datetime]:focus,
    .login-form .login-register [type=datetime-local]:focus,
    .login-form .login-register [type=month]:focus,
    .login-form .login-register [type=week]:focus,
    .login-form .login-register [type=email]:focus,
    .login-form .login-register [type=number]:focus,
    .login-form .login-register [type=search]:focus,
    .login-form .login-register [type=tel]:focus,
    .login-form .login-register [type=time]:focus,
    .login-form .login-register [type=url]:focus,
    .login-form .login-register [type=color]:focus,
    .login-form .login-register select:focus,
    .login-form .login-register textarea:focus,
    .popup__content-login .login-register [type=text]:focus,
    .popup__content-login .login-register [type=password]:focus,
    .popup__content-login .login-register [type=date]:focus,
    .popup__content-login .login-register [type=datetime]:focus,
    .popup__content-login .login-register [type=datetime-local]:focus,
    .popup__content-login .login-register [type=month]:focus,
    .popup__content-login .login-register [type=week]:focus,
    .popup__content-login .login-register [type=email]:focus,
    .popup__content-login .login-register [type=number]:focus,
    .popup__content-login .login-register [type=search]:focus,
    .popup__content-login .login-register [type=tel]:focus,
    .popup__content-login .login-register [type=time]:focus,
    .popup__content-login .login-register [type=url]:focus,
    .popup__content-login .login-register [type=color]:focus,
    .popup__content-login .login-register select:focus,
    .popup__content-login .login-register textarea:focus {
        background-color: rgba(10, 30, 46, .1);
        color: #0a1e2e;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .login-form .login-register__forgot,
    .popup__content-login .login-register__forgot {
        margin-right: 10px;
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    .login-form .login-register__forgot:hover,
    .popup__content-login .login-register__forgot:hover {
        color: #59ce61;
        text-decoration: underline
    }

    .login-form .login-register__or,
    .popup__content-login .login-register__or {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        font-size: 12px;
        line-height: 15px;
        color: rgba(10, 30, 46, .5) !important;
        font-family: sofia-pro-regular, sans-serif;
        margin: 30px -30px 20px
    }

    .login-form .login-register__or:before,
    .login-form .login-register__or:after,
    .popup__content-login .login-register__or:before,
    .popup__content-login .login-register__or:after {
        content: "";
        -webkit-box-flex: 1;
        -webkit-flex: 1 1;
        -ms-flex: 1 1;
        flex: 1 1;
        border-bottom: 1px solid rgba(10, 30, 46, .1);
        margin: auto
    }

    .login-form .login-register__or:before,
    .popup__content-login .login-register__or:before {
        margin-right: 10px
    }

    .login-form .login-register__or:after,
    .popup__content-login .login-register__or:after {
        margin-left: 10px
    }

    .login-form .login-register__social .button,
    .popup__content-login .login-register__social .button {
        width: 100%
    }

    .login-form .login-register__social .button .small-icons,
    .popup__content-login .login-register__social .button .small-icons {
        float: left;
        margin-top: 2px
    }

    .login-form .login-register .facebook,
    .login-form .login-register .google-plus,
    .login-form .login-register span.text,
    .popup__content-login .login-register .facebook,
    .popup__content-login .login-register .google-plus,
    .popup__content-login .login-register span.text {
        float: left;
        line-height: 15px
    }

    @media screen and (max-width: 39.99875em) {

        .login-form .login-register .facebook,
        .login-form .login-register .google-plus,
        .login-form .login-register span.text,
        .popup__content-login .login-register .facebook,
        .popup__content-login .login-register .google-plus,
        .popup__content-login .login-register span.text {
            float: unset
        }
    }

    .login-form .login-register span.text,
    .popup__content-login .login-register span.text {
        margin: 0
    }

    .login-form .login-register .button,
    .popup__content-login .login-register .button {
        margin-bottom: 0;
        margin-top: 10px
    }

    .login-form .login-register .input-tick .checkbox-material,
    .popup__content-login .login-register .input-tick .checkbox-material {
        top: 0
    }

    .login-form .login-register .input-tick .check-text,
    .popup__content-login .login-register .input-tick .check-text {
        color: rgba(10, 30, 46, .5);
        margin-left: 10px
    }

    .login-form .login-register .checkbox-material,
    .popup__content-login .login-register .checkbox-material {
        top: 4px
    }

    @media (max-width: 450px) {

        .login-form .login-register .checkbox-material,
        .popup__content-login .login-register .checkbox-material {
            top: -4px !important
        }
    }

    .login-form .login-register .agree-text,
    .popup__content-login .login-register .agree-text {
        margin: 10px 0
    }

    .login-form .login-register .agree-text .button,
    .popup__content-login .login-register .agree-text .button {
        margin: 0
    }

    .login-form .login-register .agree-text .red-warning,
    .popup__content-login .login-register .agree-text .red-warning {
        top: 11px
    }

    @media (max-width: 450px) {

        .login-form .login-register .agree-text .red-warning,
        .popup__content-login .login-register .agree-text .red-warning {
            top: 15px;
            right: 13px
        }
    }

    .login-form .login-register .agreeText,
    .popup__content-login .login-register .agreeText {
        color: rgba(10, 30, 46, .5);
        vertical-align: bottom
    }

    @media (max-width: 450px) {

        .login-form .login-register .agreeText,
        .popup__content-login .login-register .agreeText {
            max-width: 105px
        }
    }

    .login-form .login-register .agreeText a,
    .popup__content-login .login-register .agreeText a {
        color: rgba(10, 30, 46, .5);
        text-decoration: underline !important
    }

    .login-form .login-register .agreeText a:hover,
    .popup__content-login .login-register .agreeText a:hover {
        color: #59ce61
    }

    .login-form .login-register .custom-checkbox,
    .popup__content-login .login-register .custom-checkbox {
        background-color: #e6e8e9 !important
    }

    .login-form .login-register .custom-checkbox.checked,
    .popup__content-login .login-register .custom-checkbox.checked {
        background: #59ce61 !important
    }

    .login-form .login-register .login-msg,
    .popup__content-login .login-register .login-msg {
        opacity: .8
    }

    @media screen and (max-width: 39.99875em) {

        .login-form--white,
        .popup__content-login--white {
            background: #fff
        }
    }

    @media screen and (max-width: 39.99875em) {

        .login-form--white .login-register,
        .popup__content-login--white .login-register {
            border-radius: 0
        }
    }

    @media screen and (max-width: 39.99875em) {

        .login-form--white .grid-container.transparent,
        .popup__content-login--white .grid-container.transparent {
            padding: 80px 0 0 !important
        }
    }

    @media screen and (max-width: 39.99875em) {

        .login-form--white .grid-container .align-middle.blk,
        .popup__content-login--white .grid-container .align-middle.blk {
            min-height: -webkit-fit-content;
            min-height: -moz-fit-content;
            min-height: fit-content
        }
    }

    .settings-form h1 {
        margin-bottom: 30px
    }

    .settings-form h1.mar-bot-0 {
        margin-bottom: 0
    }

    .settings-form [type=text],
    .settings-form [type=password],
    .settings-form [type=date],
    .settings-form [type=datetime],
    .settings-form [type=datetime-local],
    .settings-form [type=month],
    .settings-form [type=week],
    .settings-form [type=email],
    .settings-form [type=number],
    .settings-form [type=search],
    .settings-form [type=tel],
    .settings-form [type=time],
    .settings-form [type=url],
    .settings-form [type=color],
    .settings-form select,
    .settings-form textarea {
        margin-top: 10px;
        background: rgba(255, 255, 255, .1)
    }

    .settings-form option {
        background: #233543;
        border: #233543
    }

    .settings-form a {
        color: #fff;
        text-decoration: underline
    }

    .settings-form a:hover {
        color: #59ce61
    }

    .settings-form label span {
        color: #fff;
        font-size: 15px
    }

    .settings-form .label-icon-right:after {
        top: 28px
    }

    .settings-form .label-icon-right.select-label.err .red-warning {
        bottom: 32px
    }

    .settings-form .check-text {
        font-size: 12px
    }

    .settings-form .custom .cancel {
        margin-right: 10px
    }

    @media (max-width: 320px) {
        .settings-form .custom .delete {
            width: 100%
        }

        .settings-form .custom .cancel,
        .settings-form .custom .save {
            width: 50%
        }
    }

    @media screen and (max-width: 374px) {

        .settings-form .custom .small-4,
        .settings-form .custom .small-8 {
            width: 100%
        }
    }

    .settings-form .input-link {
        position: relative
    }

    .settings-form .input-link a {
        position: absolute;
        top: 45px;
        right: 15px;
        color: rgba(255, 255, 255, .5)
    }

    .settings-form .input-tick {
        margin-bottom: 15px
    }

    @media screen and (max-width: 39.99875em) {
        .settings-form .input-tick {
            margin-bottom: 10px
        }
    }

    .form-container--no-bg {
        background: 0 0
    }

    .form-container--no-bg input:disabled {
        background-color: rgba(10, 30, 46, .1);
        color: #fff
    }

    .form-container--no-bg input:hover {
        -webkit-box-shadow: none !important
    }

    .form-container--no-bg .input-with-icon .small-icon {
        bottom: 32px
    }

    .form-container--no-bg h3 {
        color: #59ce61 !important
    }

    .coupon-valid {
        color: #59ce61;
        text-align: right
    }

    .license-checkout__inner [type=text],
    .license-checkout__inner [type=password],
    .license-checkout__inner [type=date],
    .license-checkout__inner [type=datetime],
    .license-checkout__inner [type=datetime-local],
    .license-checkout__inner [type=month],
    .license-checkout__inner [type=week],
    .license-checkout__inner [type=email],
    .license-checkout__inner [type=number],
    .license-checkout__inner [type=search],
    .license-checkout__inner [type=tel],
    .license-checkout__inner [type=time],
    .license-checkout__inner [type=url],
    .license-checkout__inner [type=color],
    .license-checkout__inner select,
    .license-checkout__inner textarea {
        background-color: rgba(10, 30, 46, .1);
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #0a1e2e
    }

    .license-checkout__inner [type=text]::-webkit-input-placeholder,
    .license-checkout__inner [type=password]::-webkit-input-placeholder,
    .license-checkout__inner [type=date]::-webkit-input-placeholder,
    .license-checkout__inner [type=datetime]::-webkit-input-placeholder,
    .license-checkout__inner [type=datetime-local]::-webkit-input-placeholder,
    .license-checkout__inner [type=month]::-webkit-input-placeholder,
    .license-checkout__inner [type=week]::-webkit-input-placeholder,
    .license-checkout__inner [type=email]::-webkit-input-placeholder,
    .license-checkout__inner [type=number]::-webkit-input-placeholder,
    .license-checkout__inner [type=search]::-webkit-input-placeholder,
    .license-checkout__inner [type=tel]::-webkit-input-placeholder,
    .license-checkout__inner [type=time]::-webkit-input-placeholder,
    .license-checkout__inner [type=url]::-webkit-input-placeholder,
    .license-checkout__inner [type=color]::-webkit-input-placeholder,
    .license-checkout__inner select::-webkit-input-placeholder,
    .license-checkout__inner textarea::-webkit-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .license-checkout__inner [type=text]::-moz-placeholder,
    .license-checkout__inner [type=password]::-moz-placeholder,
    .license-checkout__inner [type=date]::-moz-placeholder,
    .license-checkout__inner [type=datetime]::-moz-placeholder,
    .license-checkout__inner [type=datetime-local]::-moz-placeholder,
    .license-checkout__inner [type=month]::-moz-placeholder,
    .license-checkout__inner [type=week]::-moz-placeholder,
    .license-checkout__inner [type=email]::-moz-placeholder,
    .license-checkout__inner [type=number]::-moz-placeholder,
    .license-checkout__inner [type=search]::-moz-placeholder,
    .license-checkout__inner [type=tel]::-moz-placeholder,
    .license-checkout__inner [type=time]::-moz-placeholder,
    .license-checkout__inner [type=url]::-moz-placeholder,
    .license-checkout__inner [type=color]::-moz-placeholder,
    .license-checkout__inner select::-moz-placeholder,
    .license-checkout__inner textarea::-moz-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .license-checkout__inner [type=text]:-ms-input-placeholder,
    .license-checkout__inner [type=password]:-ms-input-placeholder,
    .license-checkout__inner [type=date]:-ms-input-placeholder,
    .license-checkout__inner [type=datetime]:-ms-input-placeholder,
    .license-checkout__inner [type=datetime-local]:-ms-input-placeholder,
    .license-checkout__inner [type=month]:-ms-input-placeholder,
    .license-checkout__inner [type=week]:-ms-input-placeholder,
    .license-checkout__inner [type=email]:-ms-input-placeholder,
    .license-checkout__inner [type=number]:-ms-input-placeholder,
    .license-checkout__inner [type=search]:-ms-input-placeholder,
    .license-checkout__inner [type=tel]:-ms-input-placeholder,
    .license-checkout__inner [type=time]:-ms-input-placeholder,
    .license-checkout__inner [type=url]:-ms-input-placeholder,
    .license-checkout__inner [type=color]:-ms-input-placeholder,
    .license-checkout__inner select:-ms-input-placeholder,
    .license-checkout__inner textarea:-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .license-checkout__inner [type=text]::-ms-input-placeholder,
    .license-checkout__inner [type=password]::-ms-input-placeholder,
    .license-checkout__inner [type=date]::-ms-input-placeholder,
    .license-checkout__inner [type=datetime]::-ms-input-placeholder,
    .license-checkout__inner [type=datetime-local]::-ms-input-placeholder,
    .license-checkout__inner [type=month]::-ms-input-placeholder,
    .license-checkout__inner [type=week]::-ms-input-placeholder,
    .license-checkout__inner [type=email]::-ms-input-placeholder,
    .license-checkout__inner [type=number]::-ms-input-placeholder,
    .license-checkout__inner [type=search]::-ms-input-placeholder,
    .license-checkout__inner [type=tel]::-ms-input-placeholder,
    .license-checkout__inner [type=time]::-ms-input-placeholder,
    .license-checkout__inner [type=url]::-ms-input-placeholder,
    .license-checkout__inner [type=color]::-ms-input-placeholder,
    .license-checkout__inner select::-ms-input-placeholder,
    .license-checkout__inner textarea::-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .license-checkout__inner [type=text]::placeholder,
    .license-checkout__inner [type=password]::placeholder,
    .license-checkout__inner [type=date]::placeholder,
    .license-checkout__inner [type=datetime]::placeholder,
    .license-checkout__inner [type=datetime-local]::placeholder,
    .license-checkout__inner [type=month]::placeholder,
    .license-checkout__inner [type=week]::placeholder,
    .license-checkout__inner [type=email]::placeholder,
    .license-checkout__inner [type=number]::placeholder,
    .license-checkout__inner [type=search]::placeholder,
    .license-checkout__inner [type=tel]::placeholder,
    .license-checkout__inner [type=time]::placeholder,
    .license-checkout__inner [type=url]::placeholder,
    .license-checkout__inner [type=color]::placeholder,
    .license-checkout__inner select::placeholder,
    .license-checkout__inner textarea::placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .license-checkout__inner [type=text]:focus,
    .license-checkout__inner [type=password]:focus,
    .license-checkout__inner [type=date]:focus,
    .license-checkout__inner [type=datetime]:focus,
    .license-checkout__inner [type=datetime-local]:focus,
    .license-checkout__inner [type=month]:focus,
    .license-checkout__inner [type=week]:focus,
    .license-checkout__inner [type=email]:focus,
    .license-checkout__inner [type=number]:focus,
    .license-checkout__inner [type=search]:focus,
    .license-checkout__inner [type=tel]:focus,
    .license-checkout__inner [type=time]:focus,
    .license-checkout__inner [type=url]:focus,
    .license-checkout__inner [type=color]:focus,
    .license-checkout__inner select:focus,
    .license-checkout__inner textarea:focus {
        background-color: rgba(10, 30, 46, .1);
        color: #0a1e2e;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .input-with-button {
        position: relative;
        display: inline-block;
        border-radius: 25px;
        height: 50px
    }

    .input-with-button input {
        background: rgba(10, 30, 46, .05);
        padding: 16px 115px 16px 45px;
        height: 50px;
        border-radius: 25px
    }

    .input-with-button input::-webkit-input-placeholder {
        color: rgba(10, 30, 46, .5) !important
    }

    .input-with-button input::-moz-placeholder {
        color: rgba(10, 30, 46, .5) !important
    }

    .input-with-button input:-ms-input-placeholder {
        color: rgba(10, 30, 46, .5) !important
    }

    .input-with-button input::-ms-input-placeholder {
        color: rgba(10, 30, 46, .5) !important
    }

    .input-with-button input::placeholder,
    .input-with-button input:focus {
        color: rgba(10, 30, 46, .5) !important
    }

    .input-with-button button {
        position: absolute;
        top: 0;
        right: 0;
        height: 50px;
        border-radius: 25px;
        padding: 7px 20px
    }

    .input-with-button button .white-right-arrow-small {
        margin: 0 0 -2px 10px
    }

    .input-with-button .small-icons.green-letter {
        position: absolute;
        bottom: 17px;
        left: 20px;
        z-index: 1
    }

    textarea {
        resize: vertical
    }

    .set-up {
        padding: 50px 30px;
        border-radius: 5px
    }

    @media screen and (max-width: 39.99875em) {
        .set-up {
            padding: 30px;
            border-radius: 0
        }
    }

    @media screen and (max-width: 340px) {
        .set-up {
            padding: 30px 10px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .set-up {
            width: 944px !important;
            margin: 0 auto
        }

        .set-up .grid-x {
            max-width: 620px;
            margin: 0 auto
        }
    }

    .set-up button {
        min-width: 175px;
        margin: 0 auto
    }

    .set-up button .upgrade-icon {
        margin: 0 0 -1px 10px
    }

    .set-up__header {
        color: #083a50;
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 39px;
        line-height: 45px;
        margin-bottom: 18px
    }

    @media screen and (max-width: 64.06125em) {
        .set-up__header {
            max-width: 510px;
            margin: 0 auto 18px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .set-up__header {
            font-size: 30px;
            line-height: 35px;
            max-width: 300px;
            margin: 0 auto 18px
        }
    }

    .set-up__subheader {
        color: #083a50;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 23px;
        line-height: 28px;
        margin-bottom: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .set-up__subheader {
            font-size: 18px;
            line-height: 24px
        }
    }

    .set-up__info {
        color: rgba(10, 30, 46, .5);
        font-family: sofia-pro-regular, sans-serif;
        font-size: 13px;
        line-height: 20px;
        margin: 20px 0 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .set-up__info--center {
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 39.99875em) {
        .set-up__info {
            line-height: 16px;
            -webkit-box-align: inherit;
            -webkit-align-items: inherit;
            -ms-flex-align: inherit;
            align-items: inherit
        }

        .set-up__info .blue-off-tooltip {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 16px;
            -ms-flex: 1 0 16px;
            flex: 1 0 16px;
            margin: 0 5px 0 0
        }

        .set-up__info span:nth-child(2) {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 93%;
            -ms-flex: 0 0 93%;
            flex: 0 0 93%
        }
    }

    .set-up .custom-sized-select-wrapper .drop-down-wrapper option {
        color: rgba(10, 30, 46, .5) !important
    }

    .set-up .custom-sized-select-placeholder {
        background: rgba(10, 30, 46, .1);
        color: rgba(10, 30, 46, .5)
    }

    .filters-wrapper .accordion {
        border: none;
        border-top: 1px solid rgba(255, 255, 255, .2);
        background: 0 0;
        cursor: pointer;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        outline: none;
        padding: 0 10px;
        -webkit-transition: background-color .6s ease;
        transition: background-color .6s ease
    }

    .filters-wrapper .accordion__section {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .filters-wrapper .accordion__title {
        font-size: 20px;
        font-family: sofia-pro-regular, sans-serif;
        color: #fefefe;
        padding: 1.25rem 1rem;
        line-height: 1;
        position: relative;
        display: block;
        border-bottom: 0
    }

    .filters-wrapper .accordion__title:hover,
    .filters-wrapper .accordion__title:focus {
        background: 0 0
    }

    .filters-wrapper .accordion__checkbox {
        margin: 0 !important
    }

    .filters-wrapper .accordion__icon {
        margin-left: auto;
        margin-right: 16px;
        -webkit-transition: transform .6s ease;
        -webkit-transition: -webkit-transform .6s ease;
        transition: -webkit-transform .6s ease;
        transition: transform .6s ease;
        transition: transform .6s ease, -webkit-transform .6s ease
    }

    .filters-wrapper .accordion__icon.rotate {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .filters-wrapper .accordion__content {
        overflow: hidden;
        padding: 0;
        -webkit-transition: max-height .4s ease;
        transition: max-height .4s ease
    }

    .filters-wrapper .accordion__content .select-wrapper {
        margin: 0 0 20px !important
    }

    .accordion {
        background: 0 0;
        border: none;
        list-style-type: none;
        margin: 0;
        padding: 0
    }

    .accordion .accordion-title {
        display: block;
        position: relative;
        font-size: 17px;
        background: 0 0;
        font-family: sofia-pro-regular, sans-serif;
        border: none;
        padding: 20px;
        line-height: 1.1
    }

    .accordion .accordion-title:hover {
        text-decoration: none !important;
        color: #59ce61 !important;
        -webkit-transition: all .5s ease;
        transition: all .5s ease
    }

    .accordion .accordion-title:focus {
        outline: none
    }

    .accordion .accordion-title:before {
        -webkit-transition: transform .1s ease;
        -webkit-transition: -webkit-transform .1s ease;
        transition: -webkit-transform .1s ease;
        transition: transform .1s ease;
        transition: transform .1s ease, -webkit-transform .1s ease;
        content: '';
        background-image: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        background-position: -441px -12px;
        width: 10px;
        height: 10px;
        -webkit-transform: rotate(-180deg);
        -ms-transform: rotate(-180deg);
        transform: rotate(-180deg);
        margin-top: -3px;
        position: absolute;
        top: 50%;
        left: -16px
    }

    @media screen and (max-width: 39.99875em) {
        .accordion .accordion-title {
            padding: 10px 20px
        }
    }

    .accordion .accordion-title h3 {
        margin: 0
    }

    .accordion .is-active > .accordion-title {
        color: #fff
    }

    .accordion .is-active > .accordion-title::before {
        content: '';
        background-image: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        background-position: -565px -16px;
        width: 11px;
        height: 2px;
        margin-top: 2px;
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg)
    }

    .accordion .accordion-item a {
        color: #fff !important
    }

    .accordion .accordion-item p,
    .accordion .accordion-item ul li,
    .accordion .accordion-item ol li {
        padding: 0 18px 0 20px;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif
    }

    .accordion .accordion-item p:last-child,
    .accordion .accordion-item ul li:last-child,
    .accordion .accordion-item ol li:last-child {
        padding-bottom: 0 !important;
        margin-bottom: 0 !important
    }

    .accordion .accordion-item p a:last-child,
    .accordion .accordion-item ul li a:last-child,
    .accordion .accordion-item ol li a:last-child {
        padding-bottom: 0 !important;
        margin-bottom: 0 !important
    }

    @media screen and (max-width: 39.99875em) {

        .accordion .accordion-item p,
        .accordion .accordion-item ul li,
        .accordion .accordion-item ol li {
            padding: 0 0 10px 20px
        }
    }

    .accordion .accordion-item ul,
    .accordion .accordion-item ol {
        margin: 0
    }

    .accordion .accordion-item h1,
    .accordion .accordion-item h2,
    .accordion .accordion-item h3,
    .accordion .accordion-item h4,
    .accordion .accordion-item h5,
    .accordion .accordion-item h6 {
        padding: 10px 20px
    }

    .accordion .accordion-item.is-active {
        padding-bottom: 0
    }

    .accordion .accordion-item.is-active p,
    .accordion .accordion-item.is-active ul li,
    .accordion .accordion-item.is-active ol li {
        color: rgba(255, 255, 255, .8)
    }

    .accordion .accordion-content {
        display: none;
        background: 0 0;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        border: none;
        padding: 0;
        margin-bottom: 16px;
        color: rgba(255, 255, 255, .8) !important
    }

    @media screen and (max-width: 64.06125em) {
        .accordion .accordion-content .grid-padding-x .cell {
            padding: 0
        }
    }

    .accordion .accordion-content a {
        color: rgba(255, 255, 255, .8) !important
    }

    .accordion .accordion-content a:hover {
        text-decoration: underline !important
    }

    .pre-update-popup,
    .post-update-popup {
        text-align: center
    }

    .pre-update-popup .popup__content,
    .post-update-popup .popup__content {
        width: 730px;
        border-radius: 5px;
        padding: 45px 30px 60px
    }

    @media screen and (max-width: 760px) {

        .pre-update-popup .popup__content,
        .post-update-popup .popup__content {
            width: calc(100% - 80px)
        }
    }

    @media screen and (max-width: 39.99875em) {

        .pre-update-popup .popup__content,
        .post-update-popup .popup__content {
            width: 100%;
            border-radius: 0
        }
    }

    .pre-update-popup .button,
    .post-update-popup .button {
        margin-top: 20px;
        border-radius: 30px;
        font-family: sofia-pro-bold, sans-serif;
        font-size: 18px;
        line-height: 22px;
        padding: 14px 22px;
        height: 50px
    }

    .pre-update-popup__title,
    .post-update-popup__title {
        font-family: sofia-pro-bold, sans-serif;
        color: #083a50;
        font-size: 39px;
        line-height: 45px;
        margin-bottom: 20px
    }

    .pre-update-popup__text,
    .post-update-popup__text {
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 20px
    }

    .pre-update-popup__point,
    .post-update-popup__point {
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        font-size: 18px;
        line-height: 26px;
        margin-bottom: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 39.99875em) {

        .pre-update-popup__point,
        .post-update-popup__point {
            text-align: left;
            -webkit-box-align: baseline;
            -webkit-align-items: baseline;
            -ms-flex-align: baseline;
            align-items: baseline
        }
    }

    .pre-update-popup__bullet,
    .post-update-popup__bullet {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        background-position: -523px -387px;
        width: 20px;
        height: 21px;
        margin: 0 5px 0 0;
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 25px;
        -ms-flex: 0 0 25px;
        flex: 0 0 25px
    }

    .pre-update-popup__note,
    .post-update-popup__note {
        font-family: sofia-pro-regular, sans-serif;
        color: rgba(10, 30, 46, .5);
        font-size: 18px;
        line-height: 24px;
        margin: 20px auto 0;
        max-width: 530px
    }

    .popup {
        height: 100vh;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(10, 30, 46, .8);
        z-index: 9999;
        opacity: 1;
        visibility: visible;
        -webkit-animation-name: popupFadeIn;
        animation-name: popupFadeIn;
        -webkit-animation-duration: .5s;
        animation-duration: .5s
    }

    @media screen and (max-width: 39.99875em) {
        .popup {
            background-color: #fff;
            -webkit-animation: unset;
            animation: unset
        }
    }

    .popup--full {
        padding: 30px 50px
    }

    @media screen and (max-width: 39.99875em) {
        .popup--full {
            padding: 10px
        }
    }

    .popup--preloaded {
        visibility: hidden;
        -webkit-animation: none;
        animation: none
    }

    .popup.open {
        visibility: visible;
        -webkit-animation-name: popupFadeIn;
        animation-name: popupFadeIn;
        -webkit-animation-duration: .5s;
        animation-duration: .5s
    }

    @supports (-webkit-backdrop-filter: blur(10px)) or (backdrop-filter:blur(10px)) {
        .popup {
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            background-color: rgba(10, 30, 46, .3)
        }
    }

    .popup__content {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        width: 730px;
        max-width: 75rem;
        padding: 70px 30px;
        background-color: #fff;
        overflow: visible;
        -webkit-animation-name: popupContentMoveDown;
        animation-name: popupContentMoveDown;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        color: rgba(10, 30, 46, .5);
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        text-align: center
    }

    @media screen and (min-width: 923px) {
        .popup__content--large {
            width: 843px
        }
    }

    .popup__content--xlarge {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        position: relative;
        padding: 50px
    }

    @media screen and (min-width: 64.0625em) {
        .popup__content--xlarge {
            max-width: 1064px
        }
    }

    @media screen and (min-height: 860px) {
        .popup__content--xlarge {
            max-width: 1480px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .popup__content--xlarge {
            padding: 10px 0
        }
    }

    .popup__content--xlarge .video-wrapper {
        padding-bottom: 56.25%;
        position: relative
    }

    .popup__content--xlarge iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%
    }

    .popup__content--xlarge .popup__close {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons_01-6bcc3606a70b883b3aac6954e60c3487e99faacba6fa7fa27f577aa7cfc7cfb0.svg) -481px -234px;
        width: 36px;
        height: 36px;
        font-size: 0;
        color: #fff;
        top: 5px;
        right: 0
    }

    @media screen and (max-width: 1440px) {
        .popup__content--xlarge .popup__close {
            right: 20px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .popup__content--xlarge .popup__close {
            top: 15px;
            right: 10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .popup__content--xlarge .popup__close {
            top: -40px
        }
    }

    .popup__content--discount {
        padding: 40px 30px 70px
    }

    @media screen and (min-width: 923px) {
        .popup__content--discount {
            width: 843px
        }
    }

    .popup__content--discount input {
        color: rgba(10, 30, 46, .3);
        background: rgba(89, 206, 97, .2)
    }

    .popup__content--discount input::-webkit-input-placeholder {
        color: rgba(10, 30, 46, .3);
        background: rgba(89, 206, 97, .2)
    }

    .popup__content--discount input::-moz-placeholder {
        color: rgba(10, 30, 46, .3);
        background: rgba(89, 206, 97, .2)
    }

    .popup__content--discount input:-ms-input-placeholder {
        color: rgba(10, 30, 46, .3);
        background: rgba(89, 206, 97, .2)
    }

    .popup__content--discount input::-ms-input-placeholder {
        color: rgba(10, 30, 46, .3);
        background: rgba(89, 206, 97, .2)
    }

    .popup__content--discount input::placeholder,
    .popup__content--discount input:focus {
        color: rgba(10, 30, 46, .3);
        background: rgba(89, 206, 97, .2)
    }

    .popup__content--discount .popup__text-large--bold {
        margin: 0 0 20px
    }

    @media screen and (max-width: 39.99875em) {
        .popup__content {
            width: 100%;
            top: 0;
            left: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            -webkit-transform: unset;
            -ms-transform: unset;
            transform: unset;
            height: 100%;
            -webkit-animation: unset;
            animation: unset
        }
    }

    @media screen and (max-width: 340px) {
        .popup__content {
            padding-right: 10px;
            padding-left: 10px
        }
    }

    .popup__content .form-container {
        overflow: visible;
        padding: 0;
        width: 100%;
        max-width: 475px;
        margin: 0 auto
    }

    .popup__content .align-center {
        margin: 0 auto;
        max-width: 570px
    }

    .popup__content .button {
        margin-bottom: 0
    }

    .popup__content .agree-text .red-warning {
        top: 18px
    }

    @media screen and (max-width: 39.99875em) {
        .popup__content .agree-text .red-warning {
            top: 11px
        }
    }

    .popup__content .agree-text .checkbox-material {
        top: 4px !important
    }

    .popup__content--full {
        width: 100%
    }

    .popup__content-with-form {
        margin: 0 auto
    }

    .popup__content-with-form .button--green--large {
        min-width: 175px
    }

    .popup__logo {
        margin-bottom: 20px
    }

    .popup h3 {
        font-size: 39px;
        line-height: 45px;
        color: #083a50 !important;
        font-family: sofia-pro-bold, sans-serif;
        margin: 0 auto 20px;
        text-align: center
    }

    @media screen and (max-width: 39.99875em) {
        .popup h3 {
            font-size: 30px;
            line-height: 30px
        }
    }

    .popup__title {
        text-align: left;
        margin-bottom: 20px;
        line-height: 1.1
    }

    .popup__title--centered {
        text-align: center;
        margin: 0 auto;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: baseline;
        -webkit-align-items: baseline;
        -ms-flex-align: baseline;
        align-items: baseline
    }

    .popup__title--centered span,
    .popup__title--centered h3 {
        float: left
    }

    .popup__title--centered span {
        margin: 0 10px
    }

    .popup__blue-text {
        font-size: 18px;
        line-height: 24px;
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50
    }

    .popup__confirm_text {
        font-size: 18px;
        line-height: 24px;
        font-family: sofia-pro-bold, sans-serif;
        margin-bottom: 20px;
        color: #083a50
    }

    .popup__email-address {
        text-decoration: underline
    }

    .popup__text {
        color: #083a50;
        font-size: 18px;
        line-height: 24px;
        max-width: 570px;
        margin: 0 auto 20px
    }

    .popup__text:last-child {
        margin-bottom: 0 !important
    }

    .popup__text-link {
        font-family: sofia-pro-bold, sans-serif
    }

    .popup__text-link a {
        color: #083a50;
        text-decoration: underline;
        font-family: sofia-pro-regular, sans-serif
    }

    .popup__text-large {
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        font-size: 23px;
        line-height: 28px;
        max-width: 570px
    }

    @media screen and (max-width: 39.99875em) {
        .popup__text-large {
            font-size: 18px;
            line-height: 23px
        }
    }

    .popup__text-large--bold {
        font-family: sofia-pro-bold, sans-serif
    }

    .popup__text--blue {
        color: rgba(10, 30, 46, .8)
    }

    .popup__text--grey {
        color: rgba(10, 30, 46, .5)
    }

    .popup__box {
        border-radius: 5px;
        background-color: #fbe25d;
        padding: 10px;
        margin: 0 0 20px
    }

    .popup__tip {
        color: rgba(10, 30, 46, .5) !important;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 13px;
        line-height: 20px;
        margin: 20px 0 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 39.99875em) {
        .popup__tip {
            line-height: 16px;
            -webkit-box-align: inherit;
            -webkit-align-items: inherit;
            -ms-flex-align: inherit;
            align-items: inherit
        }

        .popup__tip .blue-off-tooltip {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 16px;
            -ms-flex: 1 0 16px;
            flex: 1 0 16px;
            margin: 0 5px 0 0
        }
    }

    .popup__email {
        text-decoration: underline
    }

    .popup__terms {
        color: rgba(10, 30, 46, .5);
        margin: 20px 0 0
    }

    .popup__terms .blue-off-tooltip {
        margin-bottom: -3px
    }

    .popup__buttons button {
        margin: 20px 5px 0
    }

    @media screen and (max-width: 39.99875em) {
        .popup__buttons button {
            width: 100%;
            margin: 20px 5px 0
        }

        .popup__buttons button.red {
            margin-top: 5px
        }
    }

    .popup__social-btns {
        margin: 35px 0 20px
    }

    .popup__social-btns .button {
        margin: 5px
    }

    @media screen and (max-width: 39.99875em) {
        .popup__social-btns .button {
            width: 100%;
            max-width: 475px
        }
    }

    .popup--educators .popup__content {
        padding: 0;
        display: inline-block
    }

    @media screen and (min-width: 64.0625em) {
        .popup--educators .popup__content {
            width: -webkit-fit-content;
            width: -moz-fit-content;
            width: fit-content
        }
    }

    @media screen and (max-width: 1200px) {
        .popup--educators .popup__content {
            width: 100%
        }
    }

    @media screen and (max-height: 630px) {
        .popup--educators .popup__content {
            height: 100%;
            overflow-y: scroll
        }
    }

    .popup__close {
        color: rgba(10, 30, 46, .5)
    }

    .popup__close,
    .popup__close:visited {
        font-family: sofia-pro-regular, sans-serif;
        color: rgba(10, 30, 46, .5);
        position: absolute;
        line-height: .5;
        top: 20px;
        right: 20px;
        font-size: 32px;
        text-decoration: none;
        display: inline-block;
        -webkit-transition: all .1s, ease-in-out;
        transition: all .1s, ease-in-out
    }

    @media screen and (max-width: 39.99875em) {

        .popup__close,
        .popup__close:visited {
            top: 40px
        }
    }

    .popup__close:hover {
        color: #0a1e2e;
        cursor: pointer
    }

    .popup__close--video {
        background-color: #59ce61;
        padding: 10px;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        text-align: center;
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .popup__close--video {
            top: 10px;
            right: 10px
        }
    }

    .system-update-popup__content {
        padding: 50px 25px 0 50px
    }

    @media screen and (max-width: 64.06125em) {
        .system-update-popup__content {
            padding: 50px
        }
    }

    @media screen and (max-width: 420px) {
        .system-update-popup__content {
            padding: 30px
        }
    }

    .system-update-popup__image {
        background: url(Popup.jpg);
        background-position: center center;
        -webkit-background-size: auto auto;
        background-size: auto;
        background-repeat: no-repeat;
        height: 314px
    }

    .system-update-popup__buttons-line {
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin-top: 20px
    }

    .system-update-popup__buttons-line .button:first-child {
        margin-right: 10px
    }

    @media screen and (max-width: 376px) {
        .system-update-popup__buttons-line {
            display: block
        }

        .system-update-popup__buttons-line .button:first-child {
            margin-bottom: 10px
        }
    }

    .system-update-popup .popup__content {
        padding: 0;
        width: 100%;
        max-width: 840px
    }

    @media screen and (max-width: 64.06125em) {
        .system-update-popup .popup__content {
            max-width: 420px;
            height: auto;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }
    }

    @media screen and (max-width: 420px) {
        .system-update-popup .popup__content {
            width: 100%;
            height: 100vh
        }
    }

    .matches-popup .popup__content {
        max-width: 800px !important
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup .popup__content {
            padding: 30px !important
        }
    }

    .matches-popup .popup__content .grid-x {
        max-width: 480px !important
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__info {
            padding: 0 20px
        }
    }

    .matches-popup__logo {
        font-size: 23px;
        line-height: 1.2;
        font-family: sofia-pro-bold, sans-serif;
        color: #083a50
    }

    .matches-popup__logo span {
        color: #59ce61
    }

    .matches-popup__title {
        font-size: 39px;
        line-height: 45px;
        font-family: sofia-pro-bold, sans-serif;
        color: #083a50;
        margin: 20px 0 5px
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__title {
            font-size: 30px;
            line-height: 35px
        }
    }

    .matches-popup__text {
        font-size: 23px;
        line-height: 28px;
        color: #083a50;
        font-family: sofia-pro-regular, sans-serif;
        margin-bottom: 10px
    }

    .matches-popup__score-txt {
        color: #0a1e2e;
        font-size: 24px;
        font-family: sofia-pro-regular, sans-serif;
        margin: 0 0 5px
    }

    .matches-popup__score {
        font-size: 65px;
        line-height: 1;
        font-family: sofia-pro-regular, sans-serif;
        color: #59ce61
    }

    .matches-popup__form {
        border: 2px solid rgba(255, 255, 255, .1);
        max-width: 540px;
        margin: auto;
        text-align: left
    }

    .matches-popup__form label span {
        color: #083a50;
        font-size: 15px
    }

    .matches-popup__form .matches-popup__text {
        display: none
    }

    .matches-popup__fields {
        padding: 10px 0 40px
    }

    .matches-popup__fields input,
    .matches-popup__fields textarea {
        color: rgba(10, 30, 46, .5) !important;
        background-color: rgba(10, 30, 46, .05) !important
    }

    .matches-popup__fields input:focus,
    .matches-popup__fields textarea:focus {
        background-color: rgba(10, 30, 46, .05) !important
    }

    .matches-popup__fields input:-webkit-autofill,
    .matches-popup__fields input:-webkit-autofill:hover,
    .matches-popup__fields input:-webkit-autofill:focus,
    .matches-popup__fields input:-webkit-autofill:active,
    .matches-popup__fields textarea:-webkit-autofill,
    .matches-popup__fields textarea:-webkit-autofill:hover,
    .matches-popup__fields textarea:-webkit-autofill:focus,
    .matches-popup__fields textarea:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px rgba(10, 30, 46, .05) inset !important;
        -webkit-text-fill-color: rgba(10, 30, 46, .5) !important;
        caret-color: rgba(10, 30, 46, .5) !important
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__fields textarea {
            min-height: 150px
        }
    }

    .matches-popup__form-title {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 0 0 10px;
        border-bottom: 2px solid rgba(8, 58, 80, .1)
    }

    .matches-popup__form-title p {
        margin: auto;
        color: #083a50
    }

    .matches-popup__form-title a {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .matches-popup__form-title .chevron-left-blue {
        -webkit-transition: opacity .5s ease;
        transition: opacity .5s ease
    }

    .matches-popup__form-title .chevron-left-blue:hover {
        opacity: .5
    }

    .matches-popup__careers {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(8, 58, 80, .1);
        margin: 30px 0 20px
    }

    .matches-popup__careers img {
        width: 159px;
        margin-right: 25px
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__careers img {
            margin: 0 0 10px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__careers {
            display: block
        }
    }

    .matches-popup__name {
        color: #083a50 !important;
        font-size: 28px;
        line-height: 31px;
        font-family: sofia-pro-bold, sans-serif;
        margin: 0 0 5px;
        text-align: left
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__name {
            text-align: center;
            font-size: 21px;
            line-height: 24px;
            max-width: 218px;
            margin: 0 auto 5px
        }
    }

    .matches-popup__percentage {
        color: #59ce61;
        font-size: 21px;
        line-height: 26px;
        font-family: sofia-pro-light, sans-serif;
        margin: 0;
        text-align: left
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup__percentage {
            text-align: center;
            font-size: 18px;
            line-height: 22px
        }
    }

    .matches-popup__btn {
        font-size: 15px;
        line-height: 1;
        height: 40px;
        color: #083a50;
        background: rgba(8, 58, 80, .1);
        padding: 11px 20px;
        margin-bottom: 15px !important;
        width: 100%;
        border-radius: 20px;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px
    }

    .matches-popup__btn .small-icons {
        float: left
    }

    .matches-popup__btn .button__hovered {
        background: rgba(8, 58, 80, .2);
        color: #083a50
    }

    .matches-popup__btn:hover {
        color: #083a50
    }

    .matches-popup__share-area {
        max-width: 400px;
        width: 100%;
        margin: auto;
        padding-top: 20px;
        border-top: 1px solid rgba(8, 58, 80, .1)
    }

    .matches-popup__share-btn {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%;
        margin-bottom: 15px !important;
        color: #083a50 !important
    }

    .matches-popup__share-btn:hover {
        color: #083a50 !important
    }

    .matches-popup__share-btn .button__hovered {
        color: #083a50 !important
    }

    .matches-popup__share-btn .share-text {
        margin: auto
    }

    .matches-popup__image {
        margin: 0 0 10px
    }

    @media screen and (min-width: 40em) {
        .matches-popup__image {
            height: 160px
        }
    }

    .matches-popup__back {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 12px;
        line-height: 15px;
        text-decoration: underline;
        color: #083a50;
        opacity: .5;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .matches-popup__back .back-icon {
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg) -271px -57px;
        width: 14px;
        height: 11px;
        margin: 0 10px 0 0
    }

    .matches-popup__back:hover {
        opacity: .8
    }

    .matches-popup .popup__content {
        width: 100%;
        max-width: 850px;
        padding: 60px 80px
    }

    @media screen and (min-width: 40em) {
        .matches-popup .popup__content {
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .matches-popup .popup__content {
            width: calc(100% - 80px)
        }
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup .popup__content {
            padding: 30px 0
        }
    }

    .matches-popup .popup__content .grid-x {
        width: 100%
    }

    @media screen and (max-width: 39.99875em) {
        .matches-popup.exit .popup__content {
            padding: 30px
        }
    }

    .matches-popup .popup__close {
        color: #083a50;
        font-family: sofia-pro-light, sans-serif
    }

    .matches-popup .popup__close:hover {
        color: #0a1e2e
    }

    .matches-popup .careers-slider.in-popup {
        margin-bottom: 45px
    }

    .matches-popup .careers-slider.in-popup .card .match-tank {
        top: 31px
    }

    .matches-popup ul {
        list-style-type: none;
        margin: 25px 0 30px 10px
    }

    .matches-popup ul li {
        font-size: 18px;
        line-height: 24px;
        color: #122535;
        margin-bottom: 8px;
        margin-left: -10px;
        display: inline-block
    }

    .matches-popup ul li::before {
        color: transparent;
        margin-right: 5px;
        content: " ";
        height: 21px;
        width: 20px;
        padding: 0 10px 4px;
        -webkit-mask-size: cover;
        background: url(//cdn0.careerhunter.io/assets/tick-popup-0353e617eb8a1c4f6e0e149d2eed94b1dbde14837d23f36f4a9c4658a792144c.png) no-repeat;
        position: relative;
        top: 0
    }

    .matches-popup__exit-button {
        height: 60px;
        border-radius: 30px;
        -webkit-border-radius: 30px;
        -moz-border-radius: 30px;
        font-family: sofia-pro-bold, sans-serif;
        max-width: 188px;
        padding: 15px 38px;
        font-size: 18px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        margin: 0 auto
    }

    .feedback .popup__content .align-center {
        max-width: 740px
    }

    .feedback__msg {
        font-size: 21px;
        line-height: 24px;
        font-family: sofia-pro-bold, sans-serif;
        color: #083a50;
        margin: 20px auto 0 !important
    }

    .feedback__msg--with-space {
        margin-top: 15px !important;
        margin-bottom: 18px !important
    }

    .feedback__msg--with-bot-space {
        margin-bottom: 8px !important
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__msg {
            font-size: 30px !important;
            line-height: 35px !important
        }
    }

    .feedback__txt {
        font-size: 23px;
        line-height: 28px;
        color: #083a50;
        font-family: sofia-pro-regular, sans-serif
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__txt {
            font-size: 18px !important;
            line-height: 24px !important
        }
    }

    .feedback__txt--bold {
        font-family: sofia-pro-bold, sans-serif;
        margin: 40px 0 20px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__txt--bold {
            margin: 20px 0
        }
    }

    .feedback__txt--with-space {
        margin: 40px 0
    }

    .feedback__contact {
        font-size: 18px;
        line-height: 23px;
        color: rgba(10, 30, 46, .5);
        font-family: sofia-pro-regular, sans-serif;
        margin: 20px 0 40px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__contact {
            margin: 20px 0;
            font-size: 15px;
            line-height: 20px
        }
    }

    .feedback__contact a {
        text-decoration: underline
    }

    .feedback__coupon-box {
        background-image: url(//cdn2.careerhunter.io/assets/feedback/gray-coupon-desktop-4927a9b793a708895925660987e9bfbefcdf6b18b0b981314965026256861025.png);
        position: relative;
        width: 739px;
        height: 122px;
        margin: 30px auto 0
    }

    @media screen and (max-width: 64.06125em) {
        .feedback__coupon-box {
            background-image: url(//cdn1.careerhunter.io/assets/feedback/gray-coupon-tablet-4001ff44679f3582c90e8a5cec07f84a70c526f548b40e89292b6b1bfd8f08f6.png);
            width: 522px;
            height: 165px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__coupon-box {
            background-image: url(//cdn0.careerhunter.io/assets/feedback/gray-coupon-mobile-f1f27fa462a5a54c8e82a64d89df71a234a6249eedae0db11fb28868a0b867a8.png);
            width: 300px;
            height: 264px;
            margin: 30px auto 0
        }
    }

    .feedback__content {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__content {
            height: 264px;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: start;
            -webkit-align-items: flex-start;
            -ms-flex-align: start;
            align-items: flex-start;
            padding: 20px 10px
        }
    }

    .feedback__coupon-txt {
        color: #083a50;
        font-family: sofia-pro-light, sans-serif;
        font-size: 18px;
        line-height: 24px;
        margin: 0 0 10px;
        max-width: 435px
    }

    @media screen and (max-width: 64.06125em) {
        .feedback__coupon-txt {
            line-height: 20px;
            max-width: 225px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__coupon-txt {
            max-width: 270px
        }
    }

    .feedback__coupon-txt span {
        font-family: sofia-pro-bold, sans-serif;
        font-size: 24px
    }

    .feedback__small-txt {
        color: rgba(10, 30, 46, .5);
        font-family: sofia-pro-regular, sans-serif;
        font-size: 12px;
        line-height: 16px;
        margin: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    @media screen and (max-width: 64.06125em) {
        .feedback__small-txt {
            max-width: 225px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__small-txt {
            max-width: 270px
        }
    }

    .feedback__small-txt .blue-off-tooltip {
        margin: 0 7px -4px 0;
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 16px;
        -ms-flex: 0 0 16px;
        flex: 0 0 16px
    }

    .feedback__left-area {
        text-align: left;
        width: 530px
    }

    @media screen and (max-width: 64.06125em) {
        .feedback__left-area {
            width: 452px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__left-area {
            width: 280px;
            height: 365px
        }
    }

    .feedback__right-area {
        text-align: left;
        width: 240px
    }

    @media screen and (max-width: 64.06125em) {
        .feedback__right-area {
            width: 386px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__right-area {
            width: 100%;
            height: 100px
        }
    }

    .feedback__copy-coupon {
        position: relative
    }

    .feedback__copy-coupon input {
        background: #fff;
        color: #59ce61;
        padding: 10px 15px;
        height: 40px;
        margin: 0;
        cursor: default;
        font-size: 16px;
        line-height: 20px;
        font-family: sofia-pro-light, sans-serif
    }

    .feedback__copy-coupon input:focus {
        background: #fff !important;
        color: #59ce61 !important
    }

    .feedback__copy-coupon button {
        position: absolute;
        right: 0;
        top: 0;
        background: rgba(10, 30, 46, .3);
        padding: 10px;
        height: 40px;
        min-width: 80px;
        font-family: sofia-pro-bold, sans-serif;
        color: #0a1e2e;
        font-size: 15px;
        line-height: 1.4;
        text-decoration: none
    }

    .feedback__coupon {
        font-size: 18px;
        line-height: 24px;
        color: #083a50;
        font-family: sofia-pro-regular, sans-serif;
        margin: 20px auto;
        max-width: 620px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__coupon {
            font-size: 15px;
            line-height: 20px
        }
    }

    .feedback__tip {
        font-size: 13px;
        line-height: 20px;
        color: rgba(10, 30, 46, .5);
        font-family: sofia-pro-regular, sans-serif;
        margin: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__tip {
            -webkit-box-align: start;
            -webkit-align-items: start;
            -ms-flex-align: start;
            align-items: start;
            max-width: 230px;
            margin: 0 auto
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__tip .blue-off-tooltip {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 16px;
            -ms-flex: 0 0 16px;
            flex: 0 0 16px;
            margin: 5px 5px 0 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__tip .feedback__tip-txt {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }
    }

    .feedback__rate {
        display: inline-block;
        margin-top: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback__rate {
            width: 80px
        }
    }

    @media screen and (min-width: 40em) {
        .feedback__rate :nth-child(2) {
            margin: 0 40px 10px
        }
    }

    .feedback__rate:hover,
    .feedback__rate.selected {
        cursor: pointer
    }

    .feedback__rate:hover .feedback__rate-txt,
    .feedback__rate.selected .feedback__rate-txt {
        color: #59ce61
    }

    .feedback__rate:hover .feedback__rate-circle,
    .feedback__rate.selected .feedback__rate-circle {
        border: 8px solid #e6e8e9;
        -webkit-transition: all .3s ease;
        transition: all .3s ease
    }

    .feedback__rate-circle {
        width: 80px;
        height: 80px;
        margin: auto;
        border: 8px solid #fff;
        border-radius: 50%;
        -webkit-transition: all .3s ease;
        transition: all .3s ease
    }

    .feedback__rate-txt {
        color: #083a50;
        font-family: sofia-pro-bold, sans-serif;
        margin-top: 10px !important;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        margin-bottom: 0 !important
    }

    .feedback__textarea {
        max-width: 620px;
        margin: 15px auto 20px
    }

    .feedback__textarea textarea {
        background-color: rgba(10, 30, 46, .1);
        color: rgba(10, 30, 46, .5);
        border-radius: 10px
    }

    .feedback__textarea textarea::-webkit-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .feedback__textarea textarea::-moz-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .feedback__textarea textarea:-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .feedback__textarea textarea::-ms-input-placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .feedback__textarea textarea::placeholder {
        color: rgba(10, 30, 46, .5)
    }

    .feedback .popup__content {
        width: 100%;
        max-width: 850px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        padding: 50px 35px !important
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .feedback .popup__content {
            width: calc(100% - 80px)
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback .popup__content {
            border-radius: 0;
            padding: 50px 30px !important
        }
    }

    @media screen and (max-width: 340px) {
        .feedback .popup__content {
            padding: 50px 10px !important
        }
    }

    .feedback .button--white-img {
        margin-bottom: 20px
    }

    @media screen and (min-width: 64.0625em) {
        .feedback .button--white-img {
            margin-right: 10px
        }

        .feedback .button--white-img:last-of-type {
            margin-right: 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .feedback .button--white-img {
            margin: 0 10px 10px 0
        }

        .feedback .button--white-img:last-of-type {
            margin-right: 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .feedback .button--white-img {
            margin: 0 0 10px;
            width: 100%
        }
    }

    .feedback ul {
        width: -webkit-fit-content;
        width: -moz-fit-content;
        width: fit-content;
        margin: 10px auto 30px
    }

    @media screen and (max-width: 400px) {
        .feedback ul {
            width: calc(100% + 20px);
            margin: 10px -20px 30px 0
        }
    }

    .feedback ul li {
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        list-style-position: outside;
        text-align: center;
        font-size: 18px;
        line-height: 24px
    }

    .feedback .tick-list {
        list-style-type: none;
        margin: 18px auto 25px;
        width: 100% !important
    }

    @media screen and (max-width: 39.99875em) {
        .feedback .tick-list {
            margin: 18px auto 30px;
            max-width: 300px
        }
    }

    .feedback .tick-list li {
        font-size: 18px;
        line-height: 26px;
        color: #083a50;
        margin-left: -10px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback .tick-list li {
            font-size: 15px;
            line-height: 20px
        }
    }

    .feedback .tick-list li::before {
        color: transparent;
        margin-right: 5px;
        content: " ";
        height: 21px;
        width: 20px;
        padding: 0 10px 4px;
        -webkit-mask-size: cover;
        background: url(//cdn0.careerhunter.io/assets/tick-popup-0353e617eb8a1c4f6e0e149d2eed94b1dbde14837d23f36f4a9c4658a792144c.png) no-repeat;
        position: relative;
        top: 3px
    }

    @media screen and (max-width: 39.99875em) {
        .feedback .tick-list li::before {
            top: 0
        }
    }

    .share-match-popup {
        text-align: center
    }

    .share-match-popup .popup__content {
        padding: 50px 30px 70px
    }

    @media screen and (min-width: 900px) {
        .share-match-popup .popup__content {
            width: 800px
        }
    }

    .share-match-popup__block {
        max-width: 500px;
        margin: 0 auto
    }

    .share-match-popup__block img {
        width: 160px
    }

    .share-match-popup__title {
        font-family: sofia-pro-bold, sans-serif;
        color: #083a50;
        font-size: 39px;
        line-height: 45px;
        margin-bottom: 20px
    }

    @media screen and (max-width: 39.99875em) {
        .share-match-popup__title {
            font-size: 30px;
            line-height: 35px
        }
    }

    .share-match-popup__career {
        font-family: sofia-pro-bold, sans-serif;
        color: #083a50;
        font-size: 28px;
        line-height: 31px;
        margin-bottom: 6px
    }

    @media screen and (min-width: 40em) {
        .share-match-popup__career {
            text-align: left;
            margin-left: 25px
        }
    }

    .share-match-popup__match {
        font-family: sofia-pro-light, sans-serif;
        color: #59ce61;
        font-size: 21px;
        line-height: 1.2
    }

    @media screen and (min-width: 40em) {
        .share-match-popup__match {
            text-align: left;
            margin-left: 25px
        }
    }

    .share-match-popup__line {
        border-top: 1px solid rgba(10, 30, 46, .2);
        padding-top: 20px;
        margin: 20px auto 0 !important
    }

    @-webkit-keyframes popupFadeIn {
        0% {
            opacity: 0;
            visibility: hidden
        }

        100% {
            opacity: 1;
            visibility: visible
        }
    }

    @keyframes popupFadeIn {
        0% {
            opacity: 0;
            visibility: hidden
        }

        100% {
            opacity: 1;
            visibility: visible
        }
    }

    @-webkit-keyframes popupContentMoveDown {
        0% {
            top: 0
        }

        100% {
            top: 50%
        }
    }

    @keyframes popupContentMoveDown {
        0% {
            top: 0
        }

        100% {
            top: 50%
        }
    }

    .player-wrapper {
        position: relative;
        padding-top: 46.25%
    }

    .player-wrapper__group {
        margin-bottom: 60px
    }

    @media screen and (max-width: 39.99875em) {
        .player-wrapper__group {
            text-align: center;
            margin: 0 -30px 60px;
            width: calc(100% + 60px) !important
        }
    }

    .react-player {
        position: absolute;
        bottom: 0;
        left: 0
    }

    .confirmation-popup .button--large-green .white-right-arrow {
        margin: 0 0 -4px 10px
    }

    @media screen and (min-width: 923px) {
        .retake-popup .popup__content {
            width: 843px
        }
    }

    .retake-popup .large-icon {
        margin-right: auto;
        margin-left: auto
    }

    .retake-popup .blue-off-tooltip {
        margin-bottom: -3px
    }

    .retake-popup .button--with-icon {
        margin: auto
    }

    .retake-popup__text {
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        font-size: 23px;
        line-height: 28px;
        margin: 20px 0
    }

    .retake-popup__desc {
        font-size: 18px;
        line-height: 26px;
        color: rgba(10, 30, 46, .5);
        margin: 0 0 20px
    }

    .retake-popup__info {
        font-size: 15px;
        line-height: 18px;
        color: rgba(10, 30, 46, .5);
        margin: 20px 0 0
    }

    .retake-popup__info a:hover {
        cursor: pointer
    }

    .confirmation-content .popup__text {
        font-family: sofia-pro-semi-bold, sans-serif
    }

    @media screen and (max-width: 39.99875em) {
        .confirmation-content .popup__title {
            margin-top: 20px
        }

        .confirmation-content .button {
            display: block;
            margin: 0 auto 5px
        }
    }

    .leaving-popup .popup__content h3 {
        text-align: left
    }

    @media screen and (max-width: 39.99875em) {
        .leaving-popup .popup__content h3 {
            max-width: 300px;
            margin: 0 auto 0 0
        }
    }

    .leaving-popup .popup__content .button span {
        font-family: sofia-pro-light, sans-serif
    }

    .leaving-popup .popup__content .align-center {
        max-width: 874px
    }

    @media screen and (min-width: 1054px) {
        .leaving-popup .popup__content {
            width: 954px
        }
    }

    .leaving-popup__left {
        max-width: 500px;
        margin: 0 auto 0 0
    }

    .leaving-popup__right p {
        margin: 0
    }

    @media screen and (min-width: 64.0625em) {
        .leaving-popup__right p {
            text-align: right
        }
    }

    @media screen and (max-width: 64.06125em) {
        .leaving-popup__right {
            margin-bottom: 20px
        }
    }

    .leaving-popup__title {
        margin-bottom: 0 !important
    }

    .leaving-popup__logo {
        height: 90px
    }

    .leaving-popup__course {
        font-size: 18px;
        line-height: 24px;
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        text-align: left;
        margin-bottom: 20px
    }

    .leaving-popup__course--list > li,
    .leaving-popup__course p {
        font-size: 16px;
        line-height: 20px;
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        text-align: left
    }

    .leaving-popup__course--list {
        margin-left: 20px
    }

    .leaving-popup__course span {
        font-family: sofia-pro-semi-bold, sans-serif
    }

    .leaving-popup__course--big {
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 24px;
        line-height: 24px
    }

    .leaving-popup__course--grey {
        color: rgba(10, 30, 46, .5)
    }

    @media screen and (min-width: 64.0625em) {
        .leaving-popup__course--space {
            margin-top: 70px !important
        }
    }

    .leaving-popup__rate {
        font-family: sofia-pro-regular, sans-serif;
        color: rgba(10, 30, 46, .5);
        text-align: left;
        margin: 0 0 23px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    @media screen and (max-width: 39.99875em) {
        .leaving-popup__rate {
            margin: 23px 0
        }
    }

    .leaving-popup__rate span {
        margin-right: 3px
    }

    .leaving-popup__rate-number {
        color: #59ce61;
        font-family: sofia-pro-semi-bold, sans-serif;
        margin: 0 10px
    }

    @media screen and (min-width: 64.0625em) {
        .leaving-popup__details {
            width: 630px;
            margin: 0 auto 0 0
        }
    }

    .leaving-popup__side {
        font-size: 15px;
        line-height: 24px;
        font-family: sofia-pro-regular, sans-serif;
        color: rgba(10, 30, 46, .5);
        text-align: left;
        margin: 0 0 15px
    }

    .leaving-popup__category {
        font-size: 15px;
        line-height: 24px;
        font-family: sofia-pro-regular, sans-serif;
        color: #083a50;
        text-align: left;
        margin-bottom: 6px
    }

    .leaving-popup__info {
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 20px;
        line-height: 24px;
        color: #083a50;
        text-align: left;
        margin: 0 0 30px
    }

    @media screen and (max-width: 39.99875em) {
        .leaving-popup__info {
            margin: 0 0 15px
        }
    }

    .leaving-popup__tip {
        color: rgba(10, 30, 46, .5) !important;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px;
        line-height: 18px;
        margin: 20px 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        text-align: left
    }

    @media screen and (max-width: 39.99875em) {
        .leaving-popup__tip {
            line-height: 16px;
            -webkit-box-align: inherit;
            -webkit-align-items: inherit;
            -ms-flex-align: inherit;
            align-items: inherit
        }

        .leaving-popup__tip .blue-off-tooltip {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 16px;
            -ms-flex: 1 0 16px;
            flex: 1 0 16px;
            margin: 0 5px 0 0
        }
    }

    .foundation-mq {
        font-family: "small=0em&medium=40em&large=64.0625em&xlarge=75em&xxlarge=90em"
    }

    .capsule {
        border-radius: 20px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        height: 40px
    }

    @media screen and (max-width: 39.99875em) {
        .capsule {
            -webkit-box-pack: left;
            -webkit-justify-content: left;
            -ms-flex-pack: left;
            justify-content: left
        }
    }

    .capsule__text {
        margin: 0;
        line-height: 1.4
    }

    .capsule__icon {
        margin: 1px 10px 2px 0
    }

    @media screen and (min-width: 40em) {
        .capsule__save-progress {
            min-width: 132px
        }
    }

    @media screen and (min-width: 40em) {
        .capsule__check-email {
            min-width: 166px
        }
    }

    .capsule__link {
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
        color: #fff;
        display: inline;
        font-family: sofia-pro-bold, sans-serif;
        cursor: pointer;
        font-size: 15px;
        margin: 0 0 0 3px;
        text-decoration: none
    }

    .capsule__link--left {
        margin: 0 3px 0 0
    }

    .capsule__link:hover {
        color: #59ce61
    }

    .capsule__dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
        margin: 0 10px 0 0
    }

    .capsule__dot--red {
        background-color: #ff3737
    }

    .capsule__dot--green {
        background-color: #59ce61
    }

    .capsule__status {
        line-height: 1.4
    }

    @media screen and (max-width: 375px) {
        .capsule__status {
            line-height: 18px;
            width: 100%
        }
    }

    .capsule--saved {
        background-color: rgba(255, 255, 255, .1);
        color: #fff;
        padding: 10px 15px;
        margin: 0 0 20px
    }

    .capsule--saved .button__hovered {
        background-color: rgba(255, 255, 255, .1)
    }

    .capsule--save {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        background: #59ce61;
        padding: 10px 15px;
        width: -webkit-fit-content;
        width: -moz-fit-content;
        width: fit-content
    }

    .capsule--aligned {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .capsule--unconfirmed {
        background: rgba(255, 255, 255, .1)
    }

    @media screen and (min-width: 64.0625em) {
        .capsule--unconfirmed {
            max-width: 382px
        }
    }

    .capsule--status {
        color: #fff
    }

    .capsule--share {
        background-color: rgba(255, 255, 255, .05);
        padding: 10px 15px;
        margin: 0 10px
    }

    @media screen and (max-width: 39.99875em) {
        .capsule--share {
            margin: 0 7px
        }
    }

    .capsule--share .capsule__text {
        margin: 0 5px 0 0;
        line-height: 15px
    }

    .capsule--tests {
        position: relative;
        width: 100%;
        background-color: rgba(255, 255, 255, .1);
        color: #fff;
        padding: 10px 15px;
        margin: 0 0 20px;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    @media screen and (max-width: 39.99875em) {
        .capsule--tests {
            margin: 0 0 10px
        }
    }

    @media screen and (min-width: 640px) and (max-width: 1300px) {
        .capsule--tests {
            width: 315px
        }
    }

    .capsule--tests__icon {
        margin: 0 10px 3px 0
    }

    .capsule--tests__text {
        line-height: 15px;
        margin: 0;
        width: auto;
        text-align: left
    }

    @media screen and (max-width: 350px) {
        .capsule--tests__text {
            font-size: 12px;
            line-height: 1.6
        }
    }

    .capsule--tests__button {
        margin: 0;
        position: absolute;
        top: 0;
        right: 0
    }

    .capsule--download {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: rgba(255, 255, 255, .1);
        padding: 10px 0 10px 15px
    }

    @media screen and (max-width: 39.99875em) {
        .capsule--download {
            width: 100%
        }
    }

    .capsule--download-old {
        margin-top: 40px;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    .capsule--download-old .capsule--download {
        text-decoration: none
    }

    @media screen and (min-width: 40em) {
        .capsule--download-old .capsule--download {
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    .capsule--download-old .transparent--button {
        background: 0 0
    }

    .capsule--download__title {
        line-height: 1;
        margin: 0
    }

    .capsule--download__button {
        height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, .03);
        border-radius: 30px;
        cursor: pointer;
        position: relative;
        margin-left: 10px
    }

    @media screen and (max-width: 39.99875em) {
        .capsule--download__button {
            position: absolute;
            right: 0
        }
    }

    .capsule--download__icon {
        display: block;
        position: absolute;
        top: 10px;
        left: 11px
    }

    .capsule--expand {
        padding: 10px 15px
    }

    @media screen and (max-width: 360px) {
        .capsule--expand {
            font-size: 14px
        }
    }

    .capsule--expand.capsule--unconfirmed {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    @media screen and (max-width: 39.99875em) {
        .capsule--expand.capsule--unconfirmed {
            width: -webkit-fit-content;
            width: -moz-fit-content;
            width: fit-content
        }
    }

    .capsule--expand.capsule--unconfirmed .capsule__text {
        line-height: 15px
    }

    @media screen and (max-width: 640px) {
        .capsule--expand.capsule--unconfirmed .capsule__text {
            line-height: 12px;
            font-size: 12px
        }
    }

    .capsule--responsive {
        -webkit-box-align: baseline;
        -webkit-align-items: baseline;
        -ms-flex-align: baseline;
        align-items: baseline;
        padding: 10px 15px
    }

    @media screen and (min-width: 1441px) {
        .capsule--responsive {
            margin-left: calc((100% - 1400px) / 2)
        }
    }

    @media screen and (width: 1440px) {
        .capsule--responsive {
            margin-left: 50px
        }
    }

    @media screen and (min-width: 1401px) and (max-width: 1439px) {
        .capsule--responsive {
            margin-left: calc((100% - 1320px) / 2)
        }
    }

    @media screen and (min-width: 751px) and (max-width: 1400px) {
        .capsule--responsive {
            margin-left: 40px
        }
    }

    @media screen and (max-width: 750px) {
        .capsule--responsive {
            margin: 0;
            border-radius: 0;
            height: auto;
            line-height: 1;
            width: 100vw;
            padding: 10px 35px 10px 30px
        }
    }

    .capsule--widget {
        -webkit-box-align: baseline;
        -webkit-align-items: baseline;
        -ms-flex-align: baseline;
        align-items: baseline;
        padding: 10px 15px 10px 0
    }

    @media screen and (max-width: 1024px) {
        .capsule--widget {
            border-radius: 0;
            height: auto;
            line-height: 1.4
        }
    }

    .capsule--with-bubble {
        position: relative
    }

    @media screen and (max-width: 64.06125em) {
        .full-height {
            overflow-y: scroll
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .full-height {
            height: calc(100vh - 278px)
        }
    }

    @media screen and (max-width: 39.99875em) {
        .full-height {
            height: calc(100vh - 297px)
        }
    }

    .full-height .button {
        margin: 0 auto
    }

    @media screen and (min-width: 751px) {
        .widget-left {
            margin: 0 0 0 10px
        }
    }

    @media screen and (min-width: 1025px) {
        .widget-right {
            margin: 0 10px 0 0
        }
    }

    @media screen and (min-width: 751px) {
        .show-for-widget {
            display: none !important
        }
    }

    @media screen and (max-width: 750px) {
        .show-for-widget {
            display: block
        }
    }

    @media screen and (min-width: 1391px) {
        .no-scroll .courses__page .filters-tabs-wrapper .filters-wrapper {
            position: fixed;
            top: 200px;
            height: 100vh
        }
    }

    @media screen and (max-width: 1390px) and (min-width: 1025px) {
        .courses__page .filters-wrapper {
            position: fixed;
            top: 185px !important
        }
    }

    .courses__slider-heading {
        font-size: 20px;
        line-height: 24px;
        margin-bottom: 0;
        color: #fff
    }

    .courses__heading {
        font-size: 20px;
        line-height: 24px;
        margin-bottom: 0;
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .courses__heading {
            font-size: 18px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .courses__heading {
            margin: 0;
            border-radius: 0;
            height: auto;
            line-height: 1
        }
    }

    @media screen and (max-width: 340px) {
        .courses__heading {
            padding-left: 0
        }
    }

    .courses .pagination {
        margin: 40px 0 0
    }

    .loader {
        height: 100%;
        width: 100%;
        position: fixed;
        z-index: 5;
        left: 0;
        top: 0;
        background-color: rgba(10, 30, 46, .8);
        overflow-x: hidden;
        -webkit-transition: .5s;
        transition: .5s
    }

    .loader.small {
        position: relative;
        min-height: 100vh
    }

    .loader.small-ok {
        position: absolute
    }

    .loader.small-ok .sk-fading-circle {
        margin: auto
    }

    .sk-fading-circle {
        width: 60px;
        height: 60px;
        margin: 30px auto;
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0
    }

    .sk-fading-circle.small {
        position: absolute !important;
        width: 40px !important;
        height: 40px !important
    }

    .sk-fading-circle:not(.small) {
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    .sk-fading-circle .sk-circle {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0
    }

    .sk-fading-circle .sk-circle:before {
        content: '';
        display: block;
        margin: 0 auto;
        width: 4%;
        height: 32%;
        background-color: #59ce61;
        -webkit-animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
        animation: sk-circleFadeDelay 1.2s infinite ease-in-out both
    }

    .sk-fading-circle .sk-circle2 {
        -webkit-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        transform: rotate(30deg)
    }

    .sk-fading-circle .sk-circle3 {
        -webkit-transform: rotate(60deg);
        -ms-transform: rotate(60deg);
        transform: rotate(60deg)
    }

    .sk-fading-circle .sk-circle4 {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg)
    }

    .sk-fading-circle .sk-circle5 {
        -webkit-transform: rotate(120deg);
        -ms-transform: rotate(120deg);
        transform: rotate(120deg)
    }

    .sk-fading-circle .sk-circle6 {
        -webkit-transform: rotate(150deg);
        -ms-transform: rotate(150deg);
        transform: rotate(150deg)
    }

    .sk-fading-circle .sk-circle7 {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    .sk-fading-circle .sk-circle8 {
        -webkit-transform: rotate(210deg);
        -ms-transform: rotate(210deg);
        transform: rotate(210deg)
    }

    .sk-fading-circle .sk-circle9 {
        -webkit-transform: rotate(240deg);
        -ms-transform: rotate(240deg);
        transform: rotate(240deg)
    }

    .sk-fading-circle .sk-circle10 {
        -webkit-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        transform: rotate(270deg)
    }

    .sk-fading-circle .sk-circle11 {
        -webkit-transform: rotate(300deg);
        -ms-transform: rotate(300deg);
        transform: rotate(300deg)
    }

    .sk-fading-circle .sk-circle12 {
        -webkit-transform: rotate(330deg);
        -ms-transform: rotate(330deg);
        transform: rotate(330deg)
    }

    .sk-fading-circle .sk-circle2:before {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s
    }

    .sk-fading-circle .sk-circle3:before {
        -webkit-animation-delay: -1s;
        animation-delay: -1s
    }

    .sk-fading-circle .sk-circle4:before {
        -webkit-animation-delay: -.9s;
        animation-delay: -.9s
    }

    .sk-fading-circle .sk-circle5:before {
        -webkit-animation-delay: -.8s;
        animation-delay: -.8s
    }

    .sk-fading-circle .sk-circle6:before {
        -webkit-animation-delay: -.7s;
        animation-delay: -.7s
    }

    .sk-fading-circle .sk-circle7:before {
        -webkit-animation-delay: -.6s;
        animation-delay: -.6s
    }

    .sk-fading-circle .sk-circle8:before {
        -webkit-animation-delay: -.5s;
        animation-delay: -.5s
    }

    .sk-fading-circle .sk-circle9:before {
        -webkit-animation-delay: -.4s;
        animation-delay: -.4s
    }

    .sk-fading-circle .sk-circle10:before {
        -webkit-animation-delay: -.3s;
        animation-delay: -.3s
    }

    .sk-fading-circle .sk-circle11:before {
        -webkit-animation-delay: -.2s;
        animation-delay: -.2s
    }

    .sk-fading-circle .sk-circle12:before {
        -webkit-animation-delay: -.1s;
        animation-delay: -.1s
    }

    @-webkit-keyframes sk-circleFadeDelay {

        0%,
        39%,
        100% {
            opacity: 0
        }

        40% {
            opacity: 1
        }
    }

    @keyframes sk-circleFadeDelay {

        0%,
        39%,
        100% {
            opacity: 0
        }

        40% {
            opacity: 1
        }
    }

    .match-info {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        font-size: 20px;
        line-height: 1.2;
        font-family: sofia-pro-regular, sans-serif;
        color: #fff;
        max-width: 226px
    }

    @media screen and (max-width: 39.99875em) {
        .match-info {
            font-size: 18px;
            margin: 0 5px 0 0
        }
    }

    .match-tank {
        position: relative;
        border-radius: 50%;
        width: 63px;
        height: 63px;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(.2, .6, .8, .4);
        -webkit-animation-duration: 4s;
        -webkit-animation-fill-mode: forwards
    }

    .match-tank:before {
        overflow: hidden;
        border-radius: 50%;
        content: "";
        position: absolute;
        width: 88px;
        height: 88px;
        z-index: 2
    }

    .match-tank .inner {
        border-radius: 50%;
        width: 63px;
        height: 63px;
        background: -webkit-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 76%, rgba(0, 0, 0, 0.65) 100%);
        background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 76%, rgba(0, 0, 0, 0.65) 100%);
        background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 76%, rgba(0, 0, 0, 0.65) 100%);
        overflow: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0)
    }

    .match-tank .fillAction {
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    .match-tank .wave-shape {
        -webkit-animation-name: waveAction;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-timing-function: linear;
        -webkit-animation-duration: 1s;
        width: 30px;
        height: 15px
    }

    .match-tank .match-percent {
        position: absolute;
        top: 18%;
        left: 50%;
        -webkit-transform: translate(-50%);
        -ms-transform: translate(-50%);
        transform: translate(-50%);
        font-size: 16px;
        font-family: sofia-pro-regular, sans-serif;
        color: #fff;
        text-align: center
    }

    .match-tank .match-percent.centered {
        top: 38%
    }

    .match-tank .match-percent.matches {
        top: 30%
    }

    .match-tank .match-percent.hidden {
        font-size: 11px
    }

    .match-tank .match-percent.hidden .qm {
        font-size: 20px;
        height: 20px;
        line-height: 25px;
        text-align: center
    }

    @-webkit-keyframes waveAction {
        0% {
            -webkit-transform: translate3d(-150px, 0, 0)
        }

        100% {
            -webkit-transform: translate3d(0, 0, 0)
        }
    }

    .pulse_0 {
        -webkit-animation-name: pulse_0;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_0 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .fill_0--background {
        background: rgba(171, 46, 51, .25)
    }

    .fill_0 {
        fill: rgba(255, 55, 55, .5)
    }

    .pulseDrain_0 {
        -webkit-animation-name: pulseDrain_0;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_0 {
        0% {
            background: rgba(171, 46, 51, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_0 {
        -webkit-animation-name: drainAction_0;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_0 {
        0% {
            fill: rgba(255, 55, 55, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_0 {
        -webkit-animation-name: fillAction_0;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_0 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(255, 55, 55, .5)
        }
    }

    .pulse_1 {
        -webkit-animation-name: pulse_1;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_1 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .fill_1--background {
        background: rgba(171, 46, 51, .25)
    }

    .fill_1 {
        fill: rgba(255, 55, 55, .5)
    }

    .pulseDrain_1 {
        -webkit-animation-name: pulseDrain_1;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_1 {
        0% {
            background: rgba(171, 46, 51, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_1 {
        -webkit-animation-name: drainAction_1;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_1 {
        0% {
            fill: rgba(255, 55, 55, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_1 {
        -webkit-animation-name: fillAction_1;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_1 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(255, 55, 55, .5)
        }
    }

    .pulse_2 {
        -webkit-animation-name: pulse_2;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_2 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(159, 58, 55, .25)
        }
    }

    .fill_2--background {
        background: rgba(159, 58, 55, .25)
    }

    .fill_2 {
        fill: rgba(237, 72, 60, .5)
    }

    .pulseDrain_2 {
        -webkit-animation-name: pulseDrain_2;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_2 {
        0% {
            background: rgba(159, 58, 55, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_2 {
        -webkit-animation-name: drainAction_2;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_2 {
        0% {
            fill: rgba(237, 72, 60, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_2 {
        -webkit-animation-name: fillAction_2;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_2 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(237, 72, 60, .5)
        }
    }

    .pulse_3 {
        -webkit-animation-name: pulse_3;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_3 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(147, 69, 57, .25)
        }
    }

    .fill_3--background {
        background: rgba(147, 69, 57, .25)
    }

    .fill_3 {
        fill: rgba(218, 89, 64, .5)
    }

    .pulseDrain_3 {
        -webkit-animation-name: pulseDrain_3;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_3 {
        0% {
            background: rgba(147, 69, 57, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_3 {
        -webkit-animation-name: drainAction_3;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_3 {
        0% {
            fill: rgba(218, 89, 64, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_3 {
        -webkit-animation-name: fillAction_3;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_3 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(218, 89, 64, .5)
        }
    }

    .pulse_4 {
        -webkit-animation-name: pulse_4;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_4 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(135, 79, 61, .25)
        }
    }

    .fill_4--background {
        background: rgba(135, 79, 61, .25)
    }

    .fill_4 {
        fill: rgba(200, 105, 69, .5)
    }

    .pulseDrain_4 {
        -webkit-animation-name: pulseDrain_4;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_4 {
        0% {
            background: rgba(135, 79, 61, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_4 {
        -webkit-animation-name: drainAction_4;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_4 {
        0% {
            fill: rgba(200, 105, 69, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_4 {
        -webkit-animation-name: fillAction_4;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_4 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(200, 105, 69, .5)
        }
    }

    .pulse_5 {
        -webkit-animation-name: pulse_5;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_5 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(122, 90, 64, .25)
        }
    }

    .fill_5--background {
        background: rgba(122, 90, 64, .25)
    }

    .fill_5 {
        fill: rgba(181, 122, 74, .5)
    }

    .pulseDrain_5 {
        -webkit-animation-name: pulseDrain_5;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_5 {
        0% {
            background: rgba(122, 90, 64, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_5 {
        -webkit-animation-name: drainAction_5;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_5 {
        0% {
            fill: rgba(181, 122, 74, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_5 {
        -webkit-animation-name: fillAction_5;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_5 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(181, 122, 74, .5)
        }
    }

    .pulse_6 {
        -webkit-animation-name: pulse_6;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_6 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(111, 102, 66, .25)
        }
    }

    .fill_6--background {
        background: rgba(111, 102, 66, .25)
    }

    .fill_6 {
        fill: rgba(163, 139, 78, .5)
    }

    .pulseDrain_6 {
        -webkit-animation-name: pulseDrain_6;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_6 {
        0% {
            background: rgba(111, 102, 66, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_6 {
        -webkit-animation-name: drainAction_6;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_6 {
        0% {
            fill: rgba(163, 139, 78, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_6 {
        -webkit-animation-name: fillAction_6;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_6 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(163, 139, 78, .5)
        }
    }

    .pulse_7 {
        -webkit-animation-name: pulse_7;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_7 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(98, 113, 70, .25)
        }
    }

    .fill_7--background {
        background: rgba(98, 113, 70, .25)
    }

    .fill_7 {
        fill: rgba(144, 156, 83, .5)
    }

    .pulseDrain_7 {
        -webkit-animation-name: pulseDrain_7;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_7 {
        0% {
            background: rgba(98, 113, 70, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_7 {
        -webkit-animation-name: drainAction_7;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_7 {
        0% {
            fill: rgba(144, 156, 83, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_7 {
        -webkit-animation-name: fillAction_7;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_7 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(144, 156, 83, .5)
        }
    }

    .pulse_8 {
        -webkit-animation-name: pulse_8;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_8 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(86, 124, 73, .25)
        }
    }

    .fill_8--background {
        background: rgba(86, 124, 73, .25)
    }

    .fill_8 {
        fill: rgba(126, 172, 88, .5)
    }

    .pulseDrain_8 {
        -webkit-animation-name: pulseDrain_8;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_8 {
        0% {
            background: rgba(86, 124, 73, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_8 {
        -webkit-animation-name: drainAction_8;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_8 {
        0% {
            fill: rgba(126, 172, 88, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_8 {
        -webkit-animation-name: fillAction_8;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_8 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(126, 172, 88, .5)
        }
    }

    .pulse_9 {
        -webkit-animation-name: pulse_9;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_9 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(74, 135, 76, .25)
        }
    }

    .fill_9--background {
        background: rgba(74, 135, 76, .25)
    }

    .fill_9 {
        fill: rgba(107, 189, 92, .5)
    }

    .pulseDrain_9 {
        -webkit-animation-name: pulseDrain_9;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_9 {
        0% {
            background: rgba(74, 135, 76, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_9 {
        -webkit-animation-name: drainAction_9;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_9 {
        0% {
            fill: rgba(107, 189, 92, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_9 {
        -webkit-animation-name: fillAction_9;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_9 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(107, 189, 92, .5)
        }
    }

    .pulse_10 {
        -webkit-animation-name: pulse_10;
        -webkit-animation-duration: 1s
    }

    @-webkit-keyframes pulse_10 {
        0% {
            background: #ab2e33
        }

        100% {
            background: rgba(62, 146, 79, .25)
        }
    }

    .fill_10--background {
        background: rgba(62, 146, 79, .25)
    }

    .fill_10 {
        fill: rgba(89, 206, 97, .5)
    }

    .pulseDrain_10 {
        -webkit-animation-name: pulseDrain_10;
        -webkit-animation-duration: .5s
    }

    @-webkit-keyframes pulseDrain_10 {
        0% {
            background: rgba(62, 146, 79, .25)
        }

        100% {
            background: rgba(171, 46, 51, .25)
        }
    }

    .drainAction_10 {
        -webkit-animation-name: drainAction_10;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: .5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes drainAction_10 {
        0% {
            fill: rgba(89, 206, 97, .5)
        }

        100% {
            -webkit-transform: translate(0, 88px);
            fill: rgba(255, 55, 55, .5)
        }
    }

    .fillAction_10 {
        -webkit-animation-name: fillAction_10;
        -webkit-animation-iteration-count: 1;
        -webkit-animation-timing-function: cubic-bezier(0, .1, .1, .9);
        -webkit-animation-duration: 1.5s;
        -webkit-animation-fill-mode: forwards
    }

    @-webkit-keyframes fillAction_10 {
        0% {
            -webkit-transform: translate3d(0, 88px, 0);
            fill: #ff3737
        }

        100% {
            fill: rgba(89, 206, 97, .5)
        }
    }

    .range-slider__container .fill_0--background {
        background: #ab2e33
    }

    .range-slider__container .fill_0 {
        fill: #ff3737
    }

    .range-slider__container .fill_1--background {
        background: #ab2e33
    }

    .range-slider__container .fill_1 {
        fill: #ff3737
    }

    .range-slider__container .fill_2--background {
        background: #9f3a37
    }

    .range-slider__container .fill_2 {
        fill: #ed483c
    }

    .range-slider__container .fill_3--background {
        background: #934539
    }

    .range-slider__container .fill_3 {
        fill: #da5940
    }

    .range-slider__container .fill_4--background {
        background: #874f3d
    }

    .range-slider__container .fill_4 {
        fill: #c86945
    }

    .range-slider__container .fill_5--background {
        background: #7a5a40
    }

    .range-slider__container .fill_5 {
        fill: #b57a4a
    }

    .range-slider__container .fill_6--background {
        background: #6f6642
    }

    .range-slider__container .fill_6 {
        fill: #a38b4e
    }

    .range-slider__container .fill_7--background {
        background: #627146
    }

    .range-slider__container .fill_7 {
        fill: #909c53
    }

    .range-slider__container .fill_8--background {
        background: #567c49
    }

    .range-slider__container .fill_8 {
        fill: #7eac58
    }

    .range-slider__container .fill_9--background {
        background: #4a874c
    }

    .range-slider__container .fill_9 {
        fill: #6bbd5c
    }

    .range-slider__container .fill_10--background {
        background: #3e924f
    }

    .range-slider__container .fill_10 {
        fill: #59ce61
    }

    .tabs {
        background: 0 0;
        border: none;
        list-style-type: none;
        margin: 0;
        position: relative
    }

    .tabs::before,
    .tabs::after {
        display: table;
        content: ' '
    }

    .tabs::after {
        clear: both
    }

    .tabs-title {
        float: left
    }

    .tabs-title > a {
        display: block;
        line-height: 1
    }

    .tabs-title--button {
        background: rgba(255, 255, 255, .1);
        border-radius: 20px;
        height: 40px;
        min-width: 140px;
        padding: 10px 15px;
        margin: 10px 10px 10px 0;
        line-height: 1.4;
        text-align: center;
        position: relative;
        overflow: hidden;
        vertical-align: middle;
        z-index: 0
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-title--button {
            min-width: 100px
        }
    }

    @media screen and (max-width: 450px) {
        .tabs-title--button {
            min-width: auto;
            padding: 10px 12px;
            margin: 10px 8px 10px 0
        }
    }

    @media screen and (max-width: 325px) {
        .tabs-title--button {
            padding: 10px
        }
    }

    .tabs-title--button.is-active {
        background: #fff
    }

    .tabs-title--button:last-child {
        margin-right: 0 !important
    }

    .tabs-title--button a {
        color: #59ce61 !important;
        font-size: 15px !important;
        line-height: 18px !important;
        padding: 0 !important
    }

    @media screen and (max-width: 350px) {
        .tabs-title--button a {
            font-size: 13px !important;
            line-height: 15px !important
        }
    }

    .tabs-title--button .button__hovered {
        -webkit-transition: width .4s ease-in-out, height .4s ease-in-out;
        transition: width .4s ease-in-out, height .4s ease-in-out;
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        border-radius: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        z-index: -1;
        background: #fff
    }

    .tabs-title--button:hover {
        cursor: pointer
    }

    .tabs-title--button:hover .button__hovered {
        width: 200%;
        height: 262.5px
    }

    .tabs-panel {
        display: none;
        padding: 1rem
    }

    .tabs-panel.is-active {
        display: block
    }

    .tabs-content {
        -webkit-transition: all .5s ease;
        transition: all .5s ease;
        background: 0 0;
        border: none;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px
    }

    .faq .content.cell {
        padding-right: 0;
        padding-left: 0
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block {
            padding: 0 0 50px
        }
    }

    .accordion-tabs-block .grid-container {
        padding: 0 !important
    }

    .accordion-tabs-block .accordion-tabs-holder {
        height: 60px;
        margin-bottom: 0
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion-tabs-holder {
            border-bottom: none;
            height: auto
        }

        .accordion-tabs-block .accordion-tabs-holder :not(.accordion-content) .accordion-title {
            color: #59ce61 !important;
            font-size: 20px;
            padding: 10px 20px 10px 0;
            border: none
        }
    }

    @media screen and (max-width: 64.06125em) and (max-width: 39.99875em) {
        .accordion-tabs-block .accordion-tabs-holder :not(.accordion-content) .accordion-title {
            padding: 10px 10px 10px 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion-tabs-holder .accordion-content {
            color: rgba(255, 255, 255, .8) !important
        }

        .accordion-tabs-block .accordion-tabs-holder .accordion-content .accordion-title {
            color: #fff !important;
            font-size: 17px;
            padding: 10px 20px
        }

        .accordion-tabs-block .accordion-tabs-holder .accordion-content .accordion-title:hover {
            text-decoration: none !important
        }

        .accordion-tabs-block .accordion-tabs-holder .accordion-content .accordion-title:focus {
            outline: none
        }

        .accordion-tabs-block .accordion-tabs-holder .accordion-content .accordion-title:before {
            -webkit-transition: transform .1s ease;
            -webkit-transition: -webkit-transform .1s ease;
            transition: -webkit-transform .1s ease;
            transition: transform .1s ease;
            transition: transform .1s ease, -webkit-transform .1s ease;
            background-image: url(sprites/small_icons.svg);
            background-position: -441px -12px;
            content: '';
            height: 10px;
            left: -16px;
            opacity: 1;
            position: absolute;
            -webkit-transform: rotate(-180deg);
            -ms-transform: rotate(-180deg);
            transform: rotate(-180deg);
            width: 10px
        }
    }

    @media screen and (max-width: 64.06125em) and (max-width: 39.99875em) {
        .accordion-tabs-block .accordion-tabs-holder .accordion-content .accordion-title {
            padding: 10px 20px 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion-tabs-holder .accordion-content .is-active > .accordion-title {
            color: #fff
        }

        .accordion-tabs-block .accordion-tabs-holder .accordion-content .is-active > .accordion-title::before {
            content: '';
            background-image: url(sprites/small_icons.svg);
            background-position: -565px -16px;
            width: 11px;
            height: 2px;
            margin-top: -3px;
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
            opacity: 1
        }
    }

    @media screen and (max-width: 64.06125em) and (max-width: 39.99875em) {
        .accordion-tabs-block .accordion-tabs-holder .accordion-content .is-active > .accordion-title {
            padding: 10px 20px
        }
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs {
        height: 60px
    }

    @media screen and (max-width: 1063px) {
        .accordion-tabs-block .accordion-tabs-holder .tabs {
            height: 100px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion-tabs-holder .tabs {
            display: none
        }
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-title:focus {
        text-decoration: none;
        border: none;
        outline: none
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-title.is-active {
        color: #59ce61
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-title.is-active a {
        color: #59ce61 !important
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-title a {
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        background: 0 0;
        color: rgba(89, 206, 97, .3) !important;
        font-size: 20px;
        font-family: sofia-pro-regular, sans-serif;
        letter-spacing: .5px;
        display: inline-block;
        padding: 20px 30px 20px 0
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-title a:focus {
        text-decoration: none;
        border: none;
        outline: none
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-title a:hover {
        color: #59ce61 !important
    }

    .accordion-tabs-block .accordion-tabs-holder .tabs .tabs-panel ul {
        margin-bottom: 0
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion-tabs-holder .grid-container {
            padding: 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .tabs-panel {
            display: block !important;
            padding: 10px 10px 10px 0
        }
    }

    .accordion-tabs-block .tabs-panel .accordion-item--responsive.is-active .accordion-anchor--responsive::before {
        content: '';
        background-image: url(sprites/small_icons.svg);
        background-position: -423px -33px;
        width: 12px;
        height: 7px;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
        opacity: .5
    }

    .accordion-tabs-block .tabs-panel .accordion-anchor--responsive {
        color: #59ce61 !important;
        font-size: 20px;
        display: block;
        position: relative;
        border: none
    }

    .accordion-tabs-block .tabs-panel .accordion-anchor--responsive:hover {
        text-decoration: none
    }

    @media screen and (min-width: 64.0625em) {
        .accordion-tabs-block .tabs-panel .accordion-anchor--responsive {
            display: none
        }
    }

    .accordion-tabs-block .tabs-panel .accordion-anchor--responsive:before {
        -webkit-transition: transform .6s ease;
        -webkit-transition: -webkit-transform .6s ease;
        transition: -webkit-transform .6s ease;
        transition: transform .6s ease;
        transition: transform .6s ease, -webkit-transform .6s ease;
        content: '';
        background-image: url(sprites/small_icons.svg);
        background-position: -423px -33px;
        width: 12px;
        height: 7px;
        -webkit-transform: rotate(0);
        -ms-transform: rotate(0);
        transform: rotate(0);
        position: absolute;
        top: 25%;
        left: calc(100% - 18px);
        opacity: .5
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .tabs-panel.is-active .accordion-content--responsive {
            display: block;
            margin-top: 15px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .tabs-panel .accordion-content--responsive {
            display: none
        }
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion .accordion-content p {
            padding: 0 20px 10px 40px
        }
    }

    .accordion-tabs-block .accordion .accordion-content__list {
        margin: 0 0 16px 50px
    }

    .accordion-tabs-block .accordion .accordion-content__list li {
        border: none;
        list-style-type: disc;
        margin: 0;
        padding: 0
    }

    @media screen and (max-width: 64.06125em) {
        .accordion-tabs-block .accordion .accordion-title {
            padding: 10px 20px 10px 40px
        }

        .accordion-tabs-block .accordion .accordion-title:before {
            left: 14px
        }
    }

    .accordion-tabs-block .accordion .accordion-title:hover {
        text-decoration: none !important
    }

    .license-checkout__tab-area .tabs-title {
        margin-bottom: 0 !important
    }

    .license-checkout__tab-area .tabs.with-bankwire {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-flow: wrap;
        -ms-flex-flow: wrap;
        flex-flow: wrap
    }

    .license-checkout__tab-area .tabs.with-bankwire .tabs-title.is-active {
        -webkit-box-ordinal-group: 2;
        -webkit-order: 1;
        -ms-flex-order: 1;
        order: 1;
        float: left
    }

    .license-checkout__tab-area .tabs.with-bankwire .tabs-title.is-active a {
        text-align: left
    }

    @media screen and (min-width: 40em) {
        .license-checkout__tab-area .tabs.with-bankwire .tabs-title.is-active {
            -webkit-box-flex: 1;
            -webkit-flex: 1 0;
            -ms-flex: 1 0;
            flex: 1 0
        }
    }

    .license-checkout__tab-area .tabs.with-bankwire .tabs-title:not(.bankwire-title):not(.is-active) {
        -webkit-box-ordinal-group: 3;
        -webkit-order: 2;
        -ms-flex-order: 2;
        order: 2;
        -webkit-box-flex: 1;
        -webkit-flex: 1 0;
        -ms-flex: 1 0;
        flex: 1 0
    }

    .license-checkout__tab-area .tabs.with-bankwire .tabs-title.bankwire-title:not(.is-active) {
        -webkit-box-ordinal-group: 4;
        -webkit-order: 3;
        -ms-flex-order: 3;
        order: 3;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1
    }

    @media screen and (max-width: 39.99875em) {
        .license-checkout__tab-area .tabs.with-bankwire {
            margin: 0 -5px
        }

        .license-checkout__tab-area .tabs.with-bankwire .tabs-title.is-active {
            width: 100%
        }

        .license-checkout__tab-area .tabs.with-bankwire .tabs-title:not(.is-active) {
            -webkit-box-ordinal-group: 3;
            -webkit-order: 2;
            -ms-flex-order: 2;
            order: 2;
            width: 45%;
            margin: 0 5px
        }

        .license-checkout__tab-area .tabs .tabs-title.is-active a {
            text-align: left
        }
    }

    @media screen and (max-width: 39.99875em) and (max-width: 320px) {
        .license-checkout__tab-area .tabs .tabs-title:not(.is-active) a {
            font-size: 15px !important
        }
    }

    .license-checkout__tab-area .tabs {
        width: 100%
    }

    .license-checkout__tab-area .tabs .tabs-title {
        position: relative;
        overflow: hidden;
        z-index: 0;
        border-radius: 20px;
        margin: 0 10px 10px 0;
        min-width: 90px
    }

    @media screen and (max-width: 39.99875em) {
        .license-checkout__tab-area .tabs .tabs-title {
            min-width: 67px
        }
    }

    .license-checkout__tab-area .tabs .tabs-title:not(.is-active) .button__hovered {
        left: 50%;
        top: 50%;
        background: #d0d3d5
    }

    .license-checkout__tab-area .tabs .tabs-title:not(.is-active):hover {
        cursor: pointer
    }

    .license-checkout__tab-area .tabs .tabs-title:not(.is-active):hover .button__hovered {
        width: 200%;
        height: 262.5px
    }

    .license-checkout__tab-area a {
        text-decoration: none !important
    }

    .license-checkout__tab-area .tabs-title > a {
        border-radius: 20px;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        height: 40px;
        line-height: 18px;
        text-align: center;
        padding: 10px 6px;
        background: rgba(10, 30, 46, .35);
        border: none;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        color: #333;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .license-checkout__tab-area .tabs-title > a:focus {
        text-decoration: none;
        border: none;
        outline: none
    }

    .license-checkout__tab-area .tabs-title > a:focus,
    .license-checkout__tab-area .tabs-title > a[aria-selected=true] {
        border-radius: 20px;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        height: 40px;
        line-height: 1.4;
        text-align: center;
        padding: 10px 6px;
        background: rgba(77, 77, 77, .35);
        color: #4d4d4d !important
    }

    @media (max-width: 375px) {

        .license-checkout__tab-area .tabs-title > a:focus,
        .license-checkout__tab-area .tabs-title > a[aria-selected=true] {
            font-size: 15px;
            padding-right: 10px
        }
    }

    .license-checkout__tab-area .tabs-title.is-active {
        border-radius: 0
    }

    .license-checkout__tab-area .tabs-title:not(.is-active) {
        float: left
    }

    .license-checkout__tab-area .tabs-title:not(.is-active) a {
        border-radius: 20px;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        height: 40px;
        line-height: 1.4;
        text-align: center;
        padding: 10px 6px;
        background: #fff;
        border: 2px solid rgba(10, 30, 46, .1);
        color: #333 !important
    }

    @media (max-width: 375px) {
        .license-checkout__tab-area .tabs-title:not(.is-active) a {
            line-height: 1.6
        }
    }

    @media (max-width: 320px) {
        .license-checkout__tab-area .tabs-title:not(.is-active) a {
            font-size: 13px
        }
    }

    .license-checkout__tab-area .tabs-panel {
        padding: 0
    }

    .tabs-slider {
        margin: 0 0 -30px
    }

    .tabs-slider.results-tabs-slider {
        margin: 0
    }

    .tabs-slider .tabs-title > a:focus,
    .tabs-slider .tabs-title > a[aria-selected=true] {
        background: 0 0;
        outline: none
    }

    .tabs-slider .tabs-title > a {
        padding: 0
    }

    .tabs-slider .tabs-title {
        position: relative;
        float: none !important
    }

    .tabs-slider .tabs-title.is-active:after {
        bottom: -31px;
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-color: transparent;
        border-bottom-color: rgba(89, 206, 97, .2);
        border-width: 30px;
        margin-left: -30px;
        z-index: 2
    }

    .tabs-slider .tabs-title.is-active .card {
        background-color: rgba(89, 206, 97, .5)
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-slider .tabs-title.is-active .card {
            background-color: #59ce61
        }
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-slider .tabs-title.is-active:hover {
            background-color: #59ce61
        }
    }

    @media (pointer: fine) {
        .tabs-slider .tabs-title:hover {
            cursor: pointer
        }

        .tabs-slider .tabs-title:hover .card {
            background-color: rgba(89, 206, 97, .5);
            -webkit-transition: all .35s ease-in-out;
            transition: all .35s ease-in-out
        }
    }

    .tabs-content-container {
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(89, 206, 97, 0.2)), to(#0A1E2E));
        background-image: -webkit-linear-gradient(rgba(89, 206, 97, 0.2), #0A1E2E);
        background-image: linear-gradient(rgba(89, 206, 97, 0.2), #0A1E2E)
    }

    .tabs-content-container .tabs-content {
        position: relative;
        width: 100%
    }

    .tabs-content-container .tabs-content .tabs-panel {
        position: relative;
        padding: 40px 0
    }

    .tabs-content-container .tabs-content .tabs-panel .menu li {
        list-style-type: none
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-content-container .tabs-content .tabs-panel .menu li {
            width: 50%
        }
    }

    .tabs-content-container .tabs-content .tabs-panel .menu li:nth-of-type(2) {
        margin: 0 0 0 30px
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-content-container .tabs-content .tabs-panel .menu li:nth-of-type(2) {
            margin: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .tabs-content-container .tabs-content .tabs-panel .menu.flex-center {
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .tabs-content-container .tabs-content .tabs-panel .menu.flex-center p {
            margin: 0 0 10px
        }
    }

    .tabs-content-container .tabs-content .tabs-panel .top-skills-container .top-skill-wrapper {
        width: auto;
        padding: 0 5px
    }

    .tabs-content-container .tabs-content .tabs-panel .top-skills-container .top-skill-wrapper .top-skill {
        border-radius: 20px;
        border: none;
        background-color: rgba(10, 30, 46, .1);
        color: #0a1e2e;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding: 10px 15px;
        min-height: 28px;
        margin-bottom: 10px;
        position: relative
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-content-container .tabs-content .tabs-panel .top-skills-container .top-skill-wrapper .top-skill {
            font-size: 13px
        }
    }

    .tabs-content-container .tabs-content .tabs-panel .green-info-text {
        margin: 0;
        color: #59ce61;
        font-size: 20px;
        line-height: 18px;
        font-family: sofia-pro-bold, sans-serif;
        margin-right: 30px !important
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-content-container .tabs-content .tabs-panel .green-info-text {
            font-size: 14px;
            line-height: 16px;
            margin-right: 15px !important
        }
    }

    .tabs-content-container .tabs-content .tabs-panel .statistics {
        font-size: 15px;
        line-height: 22px;
        font-family: sofia-pro-bold, sans-serif;
        margin: 0 0 10px
    }

    .tabs-content-container .tabs-content .tabs-panel .statistic-num {
        font-family: sofia-pro-regular, sans-serif;
        margin: 0
    }

    .tabs-content-container .tabs-content .tabs-panel .statistic-num.negative {
        color: #ff3737
    }

    .tabs-content-container .tabs-content .tabs-panel .statistic-num.with-sup {
        margin-top: -13px
    }

    @media screen and (max-width: 64.06125em) {
        .tabs-content-container .tabs-content .tabs-panel .statistic-num.with-sup {
            margin-top: -8px
        }
    }

    .tabs-content-container .tabs-content .tabs-panel .statistic-source {
        font-size: 12px;
        opacity: .5;
        margin: 0 0 10px
    }

    .tabs-content-container .tabs-content .tabs-panel .score-explanation {
        margin: 0 0 20px
    }

    @media screen and (max-width: 39.99875em) {
        .tabs-content-container .tabs-content .tabs-panel .score-explanation {
            overflow-x: hidden
        }
    }

    .tabs-content-container .tabs-content .tabs-panel .hidden-score-explanation {
        background-color: rgba(10, 30, 46, .1);
        color: transparent;
        line-height: 1.8
    }

    .tabs-overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, .5);
        z-index: 2
    }

    .tabs-overlay.active {
        display: block;
        background: #0a1e2e
    }

    .pagination {
        display: -webkit-inline-box;
        display: -webkit-inline-flex;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin: 0 0 1rem
    }

    .pagination::before,
    .pagination::after {
        display: table;
        content: ' '
    }

    .pagination::after {
        clear: both
    }

    .pagination a {
        color: #fff;
        background: rgba(255, 255, 255, .05);
        border-radius: 50%;
        text-decoration: none;
        font-size: 16px;
        font-family: sofia-pro-bold, sans-serif;
        padding: 20px 0;
        line-height: 0;
        position: relative;
        width: 100%
    }

    .pagination a:hover,
    .pagination a:focus {
        background: #59ce61
    }

    .pagination a,
    .pagination button {
        display: inline-block
    }

    .pagination li {
        border-radius: 0;
        list-style: none;
        margin-right: 10px;
        width: 40px;
        height: 40px
    }

    .pagination li.pagination-previous,
    .pagination li.pagination-next {
        width: 25px
    }

    .pagination li.pagination-previous a,
    .pagination li.pagination-next a {
        padding: 14.5px 0;
        background: 0 0;
        opacity: .5
    }

    .pagination li.pagination-previous a:hover,
    .pagination li.pagination-next a:hover {
        cursor: pointer
    }

    .pagination li.pagination-previous a:after,
    .pagination li.pagination-previous a:before,
    .pagination li.pagination-next a:after,
    .pagination li.pagination-next a:before {
        content: " ";
        background: url(//cdn3.careerhunter.io/assets/sprites/small_icons-7cc80b2d8d0866fe6edfeebcee73b8de768dd87dd98623091ca10af7b72bbe6d.svg);
        background-position: -299px -36px;
        width: 14px;
        height: 11px;
        margin: 0 auto
    }

    .pagination li.pagination-previous a:after,
    .pagination li.pagination-previous a:before {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
        margin: 0 auto
    }

    .pagination li.current {
        background: 0 0;
        padding: 0
    }

    .pagination li.current a {
        background: #59ce61
    }

    .pagination li:last-child,
    .pagination li:first-child {
        display: inline-block
    }

    .pagination .pagination-previous a::before,
    .pagination .pagination-next a::after {
        display: inline-block
    }

    .pagination--grey li {
        height: 30px;
        width: 30px
    }

    .pagination--grey li.pagination-previous a::before,
    .pagination--grey li.pagination-next a::after {
        opacity: .5;
        background: transparent url(//cdn0.careerhunter.io/assets/arrow-226040fd4c61640379995fc096a6036f85ced9c4d07758c1ededc7e7bc77b8f9.svg) no-repeat;
        width: 30px
    }

    .pagination--grey li.pagination-previous a {
        background: 0 0;
        padding: 11px 0
    }

    .pagination--grey li.pagination-next a {
        background: 0 0;
        padding: 11px 0
    }

    .pagination--grey a {
        background: rgba(10, 30, 46, .5);
        font-family: sofia-pro-regular, sans-serif;
        height: 30px;
        width: 30px;
        padding: 15px 8px
    }

    .pagination--grey .current a {
        background: #59ce61
    }

    .pagination-container {
        position: relative
    }

    .scroll-to-top {
        position: fixed;
        bottom: 30px;
        z-index: 1;
        text-align: right;
        width: 100vw;
        padding-right: 80px
    }

    @media screen and (min-width: 1441px) {
        .scroll-to-top {
            width: 1400px;
            padding-right: 0
        }
    }

    @media screen and (width: 1440px) {
        .scroll-to-top {
            width: 1340px;
            padding-right: 0
        }
    }

    @media screen and (max-width: 1439px) and (min-width: 1400px) {
        .scroll-to-top {
            width: 1400px;
            padding-right: 80px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .scroll-to-top {
            padding-right: 60px
        }
    }

    .scroll-to-top .small-icon.chevron-down {
        width: 10px;
        height: 7px;
        background-position: -424px -33px;
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg)
    }

    @media screen and (min-width: 90em) {
        .x-large-5 {
            width: 41.6666666667% !important
        }
    }

    @media screen and (min-width: 90em) {
        .x-large-6 {
            width: 50% !important
        }

        .x-large-8 {
            width: 66.6666666667% !important
        }

        .x-large-4 {
            width: 33.3333333333% !important
        }
    }

    @media screen and (max-width: 1024px) and (min-width: 769px) {
        .x-medium-6 {
            width: 50% !important
        }
    }

    @media screen and (max-width: 1280px) and (min-width: 1025px) {
        .s-large-5 {
            width: 41.6666666667% !important
        }

        .s-large-7 {
            width: 58.3333333333% !important
        }
    }

    @media screen and (min-width: 90em) {
        .x-large-2 {
            width: 16.6666666667% !important
        }
    }

    @media screen and (max-width: 359px) {
        .x-small-12 {
            width: 100% !important
        }
    }

    @media screen and (min-width: 90em) {
        .grid-container.less-padding {
            padding: 65px 0 !important
        }
    }

    @media screen and (min-width: 75em) and (max-width: 89.99875em) {
        .grid-container.less-padding {
            padding: 65px 40px !important
        }
    }

    @media screen and (min-width: 90em) {
        .grid-container {
            padding: 80px 0 !important
        }
    }

    @media screen and (width: 1440px) {
        .grid-container {
            max-width: 1340px !important
        }

        .grid-container.max-width-1416 {
            max-width: 1356px !important
        }
    }

    @media screen and (min-width: 75em) and (max-width: 89.99875em) {
        .grid-container {
            padding: 80px 40px !important
        }
    }

    @media screen and (min-width: 40em) {
        .grid-container {
            padding: 50px 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container {
            padding: 40px 30px
        }
    }

    @media screen and (max-width: 340px) {
        .grid-container {
            padding: 40px 10px
        }
    }

    @media screen and (min-width: 90em) {
        .grid-container.small {
            padding: 40px 0 !important
        }
    }

    @media screen and (min-width: 40em) {
        .grid-container.small {
            padding: 40px
        }
    }

    @media screen and (min-width: 90em) {
        .grid-container.transparent {
            padding: 150px 0 110px !important
        }
    }

    @media screen and (min-width: 75em) and (max-width: 89.99875em) {
        .grid-container.transparent {
            padding: 150px 40px 50px !important
        }
    }

    @media screen and (min-width: 40em) {
        .grid-container.transparent {
            padding: 120px 40px 50px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.transparent {
            padding: 150px 30px 80px
        }

        .grid-container.transparent .grid-padding-x .cell {
            padding: 0
        }
    }

    @media screen and (max-width: 340px) {
        .grid-container.transparent {
            padding: 150px 10px 80px
        }
    }

    @media screen and (min-width: 90em) {
        .grid-container.custom-transparent {
            padding: 120px 0 0 !important
        }
    }

    @media screen and (min-width: 75em) and (max-width: 89.99875em) {
        .grid-container.custom-transparent {
            padding: 120px 40px 0 !important
        }
    }

    @media screen and (min-width: 40em) {
        .grid-container.custom-transparent {
            padding: 80px 40px 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.custom-transparent {
            padding: 80px 0 0
        }

        .grid-container.custom-transparent .grid-padding-x .cell {
            padding: 0
        }
    }

    @media screen and (min-width: 90em) {
        .grid-container.results-page {
            padding: 150px 0 0 !important
        }
    }

    @media screen and (min-width: 75em) and (max-width: 89.99875em) {
        .grid-container.results-page {
            padding: 150px 40px 0 !important
        }
    }

    @media screen and (min-width: 40em) {
        .grid-container.results-page {
            padding: 100px 40px 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.results-page {
            padding: 60px 30px 0
        }

        .grid-container.results-page .grid-padding-x .cell {
            padding: 0
        }
    }

    @media screen and (max-width: 340px) {
        .grid-container.results-page {
            padding: 60px 10px 0
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .grid-container.results-page.timed-tests {
            padding-bottom: 20px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.results-page.timed-tests {
            padding-bottom: 10px !important
        }
    }

    .grid-container.paddingless {
        padding: 0 !important
    }

    .grid-container.no-padding {
        padding-top: 0 !important;
        padding-bottom: 0 !important
    }

    .grid-container.no-padding-top {
        padding-top: 0 !important
    }

    .grid-container.inner-bottom {
        padding-bottom: 0 !important
    }

    @media screen and (max-width: 64.06125em) {
        .grid-container.full-width {
            padding: 50px 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.full-width {
            padding: 50px 0
        }
    }

    @media screen and (max-width: 89.99875em) {
        .grid-container.no-side-pad {
            padding-right: 0;
            padding-left: 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .grid-container.no-side-pad-med {
            padding-right: 0;
            padding-left: 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.no-side-pad-small {
            padding-right: 0;
            padding-left: 0
        }
    }

    .grid-container.max-width-1064 {
        max-width: 1064px !important
    }

    .grid-container.max-width-1064 .full {
        width: 100%
    }

    @media screen and (max-width: 39.99875em) {
        .grid-container.mobile-small-padding {
            padding-left: 10px;
            padding-right: 10px
        }
    }

    .max-width-1416 {
        max-width: 1416px !important
    }

    @media screen and (max-width: 1440px) {
        .max-width-1416 {
            max-width: 1356px !important
        }
    }

    .max-width-160 {
        max-width: 160px
    }

    @media screen and (max-width: 360px) {
        .grid-x > .xsmall-12 {
            width: 100% !important
        }
    }

    .flex-grid__box {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        width: 100%
    }

    .flex-grid__box--item {
        -webkit-box-flex: 0;
        -webkit-flex-grow: 0;
        -ms-flex-positive: 0;
        flex-grow: 0
    }

    @media screen and (max-width: 39.99875em) {
        .flex-grid__box--item {
            width: 100%
        }
    }

    .flex-grid__box--item-grow {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1
    }

    .flex-grid__box--item-full-line {
        width: 100%
    }

    .flex-grid__box--item-half {
        width: calc(50% - 10px)
    }

    @media screen and (max-width: 39.99875em) {
        .flex-grid__box--item-half {
            width: 100%
        }
    }

    .flex-grid__container {
        margin: 10px -10px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row
    }

    .flex-grid__container--marginless {
        margin: 0
    }

    .flex-grid__container--marginless-bot {
        margin-bottom: 0
    }

    .flex-grid__container--vertical {
        margin: -10px 10px;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .flex-grid__container--vertical--on-left {
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start;
        margin: 0
    }

    .flex-grid__item {
        margin: 10px;
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1
    }

    .flex-grid__item--shrink {
        -webkit-box-flex: 0;
        -webkit-flex-grow: 0;
        -ms-flex-positive: 0;
        flex-grow: 0
    }

    .flex-grid__item--grow {
        -webkit-box-flex: 2;
        -webkit-flex-grow: 2;
        -ms-flex-positive: 2;
        flex-grow: 2
    }

    .flex-grid__item--marginless-bot {
        margin-bottom: 0
    }

    .flex-grid__item-relative {
        position: relative;
        margin: 10px;
        width: 354px;
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1
    }

    .flex-grid__item-relative-img {
        position: relative;
        margin: 10px;
        width: 354px;
        -webkit-box-flex: 3;
        -webkit-flex-grow: 3;
        -ms-flex-positive: 3;
        flex-grow: 3;
        background-image: url(Tracking-links.png);
        background-position: right bottom !important;
        background-repeat: no-repeat;
        overflow: hidden
    }

    .break {
        -webkit-flex-basis: 100%;
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        height: 0
    }

    footer {
        background: rgba(255, 255, 255, .03)
    }

    footer .grid-container {
        padding: 40px !important
    }

    @media screen and (min-width: 90em) {
        footer .grid-container {
            padding: 40px 0 !important
        }
    }

    @media screen and (width: 1440px) {
        footer .grid-container {
            max-width: 1340px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        footer .grid-container {
            padding: 30px !important
        }
    }

    @media screen and (max-width: 340px) {
        footer .grid-container {
            padding: 30px 10px !important
        }
    }

    footer .link-page {
        color: #fff;
        font-size: 12px;
        font-family: sofia-pro-regular, sans-serif;
        margin-right: 20px;
        line-height: 20px;
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    footer .link-page:last-child {
        margin-right: 0
    }

    footer .link-page:hover {
        color: #59ce61
    }

    footer .link-page:focus {
        outline: none
    }

    @media screen and (max-width: 64.06125em) {
        footer .link-page {
            margin-right: 20px
        }
    }

    @media screen and (max-width: 850px) and (min-width: 751px) {
        footer .link-page {
            margin-right: 12px
        }
    }

    @media screen and (max-width: 750px) and (min-width: 651px) {
        footer .link-page {
            margin-right: 20px
        }
    }

    @media screen and (max-width: 650px) {
        footer .link-page {
            margin-right: 12px
        }
    }

    @media screen and (max-width: 39.99875em) {
        footer .link-page {
            font-size: 13px;
            white-space: nowrap
        }
    }

    footer .link-logo:focus {
        outline: none
    }

    footer .rights {
        font-size: 11px;
        color: rgba(255, 255, 255, .3);
        margin: 0;
        line-height: 13px
    }

    footer .rights a {
        text-decoration: underline;
        color: rgba(255, 255, 255, .3);
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    footer .rights a:hover {
        color: #59ce61
    }

    footer .rights--with-mar {
        margin: 30px auto 0
    }

    @media screen and (max-width: 64.06125em) {
        footer .rights--with-mar {
            max-width: 540px
        }
    }

    @media screen and (max-width: 39.99875em) {
        footer .payment-icons {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center
        }
    }

    @media screen and (min-width: 40em) {

        footer .payment-icons,
        footer .links {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            -ms-flex-pack: end;
            justify-content: flex-end
        }
    }

    @media screen and (max-width: 39.99875em) {

        footer .payment-icons,
        footer .links {
            margin-top: 15px
        }
    }

    footer .links {
        margin-top: 5px;
        margin-bottom: 30px
    }

    @media screen and (max-width: 920px) and (min-width: 640px) {
        footer .links.with-sb {
            width: 100% !important;
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            margin-top: 10px;
            margin-bottom: 10px
        }
    }

    @media screen and (max-width: 720px) and (min-width: 640px) {
        footer .links.with-sb .link-page {
            margin-right: 10px
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        footer .links {
            margin-top: 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        footer .links {
            margin-top: 10px;
            margin-bottom: 10px
        }
    }

    .cookies-message-container .cookies-message {
        background: #162939;
        width: 100%;
        z-index: 0
    }

    .cookies-message-container .cookies-message p {
        color: #fff;
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        text-align: left;
        margin: 0
    }

    .cookies-message-container .cookies-message .grid-container {
        padding: 30px 40px !important;
        max-width: 100%
    }

    .sticky {
        max-width: unset !important;
        z-index: 0;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

    .sticky-container {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        position: fixed;
        width: 100%;
        z-index: 5
    }

    .sticky.is-anchored {
        position: relative;
        right: auto;
        left: auto
    }

    .top-menu__main {
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        height: 100px;
        background: 0 0;
        max-width: 1400px;
        margin: 0 auto;
        padding: 10px 40px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    @media screen and (min-width: 90em) {
        .top-menu__main {
            padding: 10px 0 !important
        }
    }

    @media screen and (width: 1440px) {
        .top-menu__main {
            max-width: 1340px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__main {
            padding: 10px 30px;
            height: 80px
        }
    }

    @media screen and (max-width: 340px) {
        .top-menu__main {
            padding: 10px
        }
    }

    @media screen and (min-width: 64.0625em) {
        .top-menu__main.main-tests {
            height: 60px;
            padding-top: 50px !important
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .top-menu__main.main-tests {
            padding-left: 20px;
            padding-right: 20px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__main.main-tests {
            height: 60px;
            padding: 5px 20px
        }

        .top-menu__main.main-tests .hamburger {
            top: 10px
        }
    }

    @media screen and (max-width: 888px) and (orientation: landscape) {
        .top-menu__main.main-tests {
            height: 60px;
            padding: 5px 20px
        }

        .top-menu__main.main-tests .hamburger {
            top: 10px
        }
    }

    @media screen and (max-width: 320px) {
        .top-menu__main.main-tests {
            padding: 5px 20px
        }
    }

    .top-menu__main.group-menu .currency-area {
        margin-right: 10px
    }

    @media screen and (max-width: 340px) {
        .top-menu__main.group-menu .top-menu__item {
            margin-right: 35px
        }

        .top-menu__main.group-menu .currency-area {
            margin-right: 5px
        }

        .top-menu__main.group-menu .top-menu__logo {
            margin-top: 0
        }
    }

    .top-menu__submenu {
        position: relative
    }

    .top-menu__submenu .caret-down {
        display: inline-block;
        margin-left: 5px
    }

    .top-menu__submenu-content {
        max-height: 0;
        -webkit-transition: max-height .5s;
        transition: max-height .5s;
        background-color: rgba(10, 30, 46, .8);
        z-index: 10;
        position: absolute;
        top: 100%;
        left: 0;
        overflow: hidden;
        white-space: nowrap;
        width: auto;
        margin-top: 13px;
        -webkit-box-shadow: 0 3px 6px #00000029;
        box-shadow: 0 3px 6px #00000029
    }

    .top-menu__submenu-content ul {
        margin: 0
    }

    .top-menu__submenu-content ul li {
        margin: 7px 0
    }

    .top-menu__submenu-content ul li:first-child {
        margin-top: 20px
    }

    .top-menu__submenu-content ul li:last-child {
        margin-bottom: 20px !important
    }

    .top-menu__submenu-content ul li a {
        font-family: sofia-pro-regular, sans-serif;
        padding: 5px 20px
    }

    .top-menu__submenu-content ul li:not(:last-child) a {
        height: auto
    }

    .top-menu__submenu:hover .top-menu__submenu-content {
        max-height: 263px !important
    }

    .top-menu__submenu:hover:after {
        content: "";
        width: 10px;
        height: 10px;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 10px solid rgba(10, 30, 46, .8);
        position: absolute;
        top: 25px;
        left: 50px
    }

    .top-menu__checkout {
        -webkit-transition: all .5s ease;
        transition: all .5s ease
    }

    .top-menu__with_submenu {
        height: 80px
    }

    .top-menu__left {
        max-width: 100%;
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        margin-right: auto
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__left {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto
        }
    }

    @media screen and (max-width: 365px) {
        .top-menu__left {
            width: 110px
        }
    }

    @media screen and (max-width: 320px) {
        .top-menu__left {
            width: 100px
        }
    }

    .top-menu__logo {
        background: 0 0;
        height: 26px;
        list-style-type: none;
        margin: 0 25px 0 0;
        min-width: 130px
    }

    @media screen and (max-width: 1150px) and (min-width: 1025px) {
        .top-menu__logo {
            margin: 0 10px 0 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__logo {
            margin: 0 10px 0 0
        }
    }

    .top-menu__logo a:focus {
        outline: none
    }

    .top-menu__logo--with-label {
        width: 129px;
        position: relative
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__logo--with-label {
            height: 37px
        }
    }

    @media screen and (max-width: 365px) {
        .top-menu__logo--with-label {
            width: 110px
        }
    }

    @media screen and (max-width: 320px) {
        .top-menu__logo--with-label {
            width: 100px
        }
    }

    @media screen and (max-width: 365px) {
        .top-menu__logo {
            margin: 10px 0 0
        }
    }

    .top-menu__image {
        position: fixed;
        z-index: 100
    }

    @media screen and (max-width: 365px) {
        .top-menu__image {
            width: 110px
        }
    }

    @media screen and (max-width: 320px) {
        .top-menu__image {
            width: 100px
        }
    }

    .top-menu__label {
        color: rgba(255, 255, 255, .5);
        font-size: 12px;
        position: absolute;
        top: 20px;
        right: 0;
        margin: 0;
        z-index: 100
    }

    @media screen and (max-width: 365px) {
        .top-menu__label {
            top: 18px
        }
    }

    .top-menu__right {
        max-width: 100%;
        -webkit-box-flex: 0;
        -webkit-flex: 0 1 auto;
        -ms-flex: 0 1 auto;
        flex: 0 1 auto;
        margin-left: auto
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__right {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto
        }
    }

    .top-menu__list {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        list-style: none;
        padding: 0;
        margin: 0
    }

    .top-menu__list--educators .default__item.is-active {
        color: #59ce61
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .top-menu__list--educators .top-menu__option {
            padding: .7rem 8px
        }
    }

    @media screen and (max-width: 820px) {
        .top-menu__list--educators .top-menu__option {
            display: none
        }
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .top-menu__list--educators .overlay .text-center {
            text-align: left;
            padding: 0 75px
        }
    }

    .top-menu__list .label-icon-right.select-label.dark select {
        margin: 0;
        border: 0 !important;
        outline: 0 !important
    }

    .top-menu__list .label-icon-right:after {
        top: 16px;
        right: 12px
    }

    .top-menu__list .currency-area {
        width: 85px;
        margin-right: 10px
    }

    .top-menu__list .currency-area--hide {
        display: none
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__list .currency-area {
            width: 40px;
            margin-right: 0
        }

        .top-menu__list .currency-area--full {
            width: 65px
        }

        .top-menu__list .currency-area--full .currency-blk .dropdown-pane.is-open {
            width: 65px;
            font-size: 12px;
            max-height: 42px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__list .currency-area .label-icon-right:after {
            top: 17px;
            right: 8px
        }
    }

    @media screen and (max-width: 885px) and (min-width: 781px) {
        .top-menu__list li.compress a {
            padding: .7rem 5px
        }
    }

    @media screen and (max-width: 780px) and (min-width: 641px) {
        .top-menu__list li.compress {
            display: none
        }
    }

    .top-menu__option {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        color: #fff;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 15px;
        padding: .7rem 15px
    }

    .top-menu__option--grey {
        color: rgba(255, 255, 255, .5)
    }

    @media screen and (max-width: 1150px) and (min-width: 1025px) {
        .top-menu__option {
            padding: .7rem 7px
        }
    }

    @media screen and (max-width: 1050px) and (min-width: 1025px) {
        .top-menu__option {
            font-size: 14px
        }
    }

    @media screen and (max-width: 820px) {
        .top-menu__option {
            padding: .7rem 8px
        }
    }

    @media screen and (max-width: 740px) {
        .top-menu__option {
            padding: .7rem 5px
        }
    }

    @media screen and (max-width: 720px) {
        .top-menu__option {
            display: none !important
        }
    }

    .top-menu__option:hover {
        color: #59ce61
    }

    .top-menu__option:focus {
        outline: none
    }

    .top-menu__item {
        margin-right: 40px;
        height: 40px
    }

    .top-menu__item--login {
        padding-left: 15px
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .top-menu__item--login {
            padding-left: 8px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu__item--login {
            padding-left: 0
        }
    }

    .top-menu__item--pay {
        margin: 0
    }

    .top-menu__item--pay .button--green {
        min-width: 85px;
        margin: 0 0 0 10px !important
    }

    .top-menu__item--pay .pay-icon {
        margin-right: 5px
    }

    .top-menu__login-text {
        color: rgba(255, 255, 255, .5);
        font-size: 15px;
        font-family: sofia-pro-regular, sans-serif;
        margin: -6px 10px 0 0
    }

    @media screen and (max-width: 340px) {
        .top-menu__login-text {
            margin: 0 5px 0 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .top-menu.white-top-menu .hamburger:not(.active) {
            background: rgba(10, 30, 46, .05)
        }

        .top-menu.white-top-menu .hamburger:not(.active) .hamburger__part {
            background: #0a1e2e
        }
    }

    .hamburger {
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-transition: all .6s ease;
        transition: all .6s ease;
        height: 40px;
        width: 40px;
        min-width: auto;
        cursor: pointer;
        z-index: 100;
        padding: 10px;
        background: rgba(255, 255, 255, .03);
        position: fixed
    }

    .hamburger:focus {
        background: 0 0;
        border: none;
        outline: none
    }

    .hamburger.active {
        background: rgba(255, 255, 255, .1)
    }

    .hamburger.active .hamburger__part--top {
        -webkit-transform: translateY(8px) translateX(0) rotate(45deg);
        -ms-transform: translateY(8px) translateX(0) rotate(45deg);
        transform: translateY(8px) translateX(0) rotate(45deg);
        top: 10px
    }

    .hamburger.active .hamburger__part--middle {
        opacity: 0
    }

    .hamburger.active .hamburger__part--bottom {
        -webkit-transform: translateY(-6px) translateX(0) rotate(-45deg);
        -ms-transform: translateY(-6px) translateX(0) rotate(-45deg);
        transform: translateY(-6px) translateX(0) rotate(-45deg);
        top: 24px
    }

    .hamburger .login,
    .hamburger .logout {
        margin: 2px 2px 0 0
    }

    @media screen and (max-width: 39.99875em) {
        .hamburger {
            top: 20px
        }
    }

    .hamburger__for-login {
        z-index: 0
    }

    .hamburger__part {
        -webkit-transition: all .35s ease;
        transition: all .35s ease;
        background: #fff;
        border: none;
        height: 1.6px;
        width: 13px;
        margin: 0 auto;
        position: absolute;
        cursor: pointer;
        right: 13px
    }

    .hamburger__part--top {
        top: 14px
    }

    .hamburger__part--middle {
        top: 19px
    }

    .hamburger__part--bottom {
        top: 24px
    }

    .overlay {
        -webkit-transition: opacity .35s ease, visibility .35s ease, height .35s ease;
        transition: opacity .35s ease, visibility .35s ease, height .35s ease;
        position: fixed;
        background: #0a1e2e;
        width: 100%;
        height: 0;
        opacity: 0;
        visibility: hidden;
        z-index: 99;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow-y: scroll !important;
        -ms-overflow-style: none;
        scrollbar-width: none;
        display: none;
        -webkit-animation: smooth-opening .35s ease;
        -moz-animation: smooth-opening .35s ease
    }

    .overlay::-webkit-scrollbar {
        display: none;
        width: 0;
        background: 0 0
    }

    @media screen and (min-width: 64.0625em) {
        .overlay {
            overflow: inherit !important
        }
    }

    .overlay .wave-burger-menu {
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 12
    }

    .overlay--open {
        opacity: 1;
        visibility: visible;
        height: 100vh;
        display: block
    }

    @media screen and (max-width: 39.99875em) {
        .overlay--open .flex-end {
            -webkit-box-pack: start;
            -webkit-justify-content: flex-start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            margin-top: 30px
        }
    }

    @media screen and (max-width: 414px) {
        .overlay--open .flex-end {
            margin-top: 10px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .overlay--open .grid-container {
            padding: 0
        }
    }

    .overlay .grid-container {
        padding: 0 !important
    }

    .overlay .align-middle {
        height: 100vh
    }

    @media screen and (max-width: 39.99875em) {
        .overlay .align-middle {
            height: -webkit-fit-content;
            height: -moz-fit-content;
            height: fit-content
        }
    }

    @media screen and (max-width: 39.99875em) {
        .overlay .text-center {
            text-align: left;
            padding: 0 30px;
            height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center
        }
    }

    .overlay__link {
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out;
        font-family: sofia-pro-regular, sans-serif;
        text-align: left;
        display: block
    }

    .overlay__link:focus {
        outline: none
    }

    .overlay__link--navigation {
        color: #fff;
        font-size: 50px;
        line-height: 60px;
        padding: 10px 0
    }

    .overlay__link--navigation .upgrade-icon {
        display: inline-block;
        margin-bottom: 10px
    }

    .overlay__link--navigation:hover {
        color: #59ce61
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__link--navigation {
            font-size: 40px;
            line-height: 50px;
            padding: 0
        }
    }

    .overlay__link--account {
        color: #59ce61;
        font-size: 28px;
        line-height: 1;
        padding: 8px 0;
        text-align: right;
        font-weight: 400
    }

    .overlay__link--account:hover {
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__link--account {
            line-height: 34px;
            padding: 5px 0;
            text-align: left
        }
    }

    .overlay__link--account a {
        color: #59ce61;
        font-size: 28px;
        line-height: 1
    }

    .overlay__link--account a:hover {
        color: #fff
    }

    .overlay__link--info {
        color: rgba(255, 255, 255, .5);
        font-size: 15px;
        line-height: 1;
        padding: 10px 0;
        text-align: right
    }

    .overlay__link--info:hover {
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__link--info {
            line-height: 19px;
            padding: 5px 0;
            text-align: left
        }
    }

    .overlay__link--info.responsive {
        margin-top: 40px
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__link--info.responsive {
            margin-top: 30px
        }
    }

    .overlay__link--submenu {
        color: rgba(255, 255, 255, .5);
        padding: 5px 0;
        font-size: 18px
    }

    .overlay__link--submenu:hover {
        color: #fff
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__link--submenu {
            padding: 5px 0
        }
    }

    .overlay__link--user {
        color: #fff;
        font-size: 25px;
        line-height: 30px;
        padding: 5px 0;
        text-align: left;
        background: 0 0;
        border-radius: 0
    }

    @media screen and (min-width: 64.0625em) {
        .overlay__link--user {
            font-size: 50px;
            line-height: 60px;
            padding: 10px 0
        }
    }

    .overlay__link--user:hover {
        color: #59ce61
    }

    .overlay__link--user:focus {
        background: 0 0
    }

    @media screen and (min-width: 64.0625em) {
        .overlay__link--user--home {
            font-size: 25px;
            line-height: 30px
        }
    }

    .overlay__link--user--grey {
        color: rgba(255, 255, 255, .5)
    }

    .overlay__link--user--grey:hover {
        color: #fff
    }

    .overlay input.overlay__link--account {
        background: 0 0;
        border: none;
        margin: 0 !important;
        text-align: right;
        width: 100%;
        cursor: pointer;
        height: auto
    }

    .overlay input.overlay__link--account:focus {
        outline: none
    }

    @media screen and (max-width: 39.99875em) {
        .overlay input.overlay__link--account {
            text-align: left
        }
    }

    .overlay__list {
        list-style: none;
        padding: 0;
        background: 0 0
    }

    .overlay__list--navigation {
        margin: 0 0 0 150px;
        position: relative
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .overlay__list--navigation {
            margin: 0 0 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__list--navigation {
            margin: 0
        }
    }

    @media screen and (max-width: 64.06125em) {
        .overlay__list--user {
            margin: 0
        }
    }

    .overlay__list--account {
        margin: 0 150px 0 0;
        position: relative;
        z-index: 99
    }

    @media screen and (min-width: 40em) and (max-width: 64.06125em) {
        .overlay__list--account {
            margin: 0 40px 0 0
        }
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__list--account {
            text-align: left;
            margin: 0
        }
    }

    .overlay__list .summary {
        display: none
    }

    .overlay__submenu {
        position: absolute;
        top: 0;
        bottom: 0;
        z-index: 11;
        width: 100%;
        -webkit-transform: translate3d(-100vw, 0, 0);
        transform: translate3d(-100vw, 0, 0);
        -webkit-transition: -webkit-transform .35s;
        transition: -webkit-transform .35s;
        transition: transform .35s;
        transition: transform .35s, -webkit-transform .35s
    }

    .overlay__submenu.align-middle {
        height: 100vh !important
    }

    .overlay__submenu--expanded {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

    .overlay__submenu--expanded li {
        margin-top: 15px
    }

    .overlay__submenu--expanded li:first-child {
        margin-top: 20px
    }

    .overlay__submenu--expanded li a {
        font-size: 18px;
        color: rgba(255, 255, 255, .5);
        line-height: 12px;
        margin-left: 20px
    }

    .overlay__submenu--expanded li a:hover {
        color: #fff;
        cursor: pointer
    }

    .overlay__submenu__content {
        background-color: #0a1e2e;
        width: 100%;
        height: 100vh !important
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__submenu__content {
            position: relative;
            top: -50px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__submenu__content--login {
            position: relative;
            top: -115px
        }
    }

    .overlay__gutter {
        margin-top: 50px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        margin-bottom: 30px
    }

    @media screen and (max-width: 39.99875em) {
        .overlay__gutter {
            margin-top: 30px
        }
    }

    @media screen and (max-width: 414px) {
        .overlay__gutter {
            margin-top: 10px
        }
    }

    .overlay__gutter span {
        margin: 0 5px
    }

    .overlay__gutter a,
    .overlay__gutter span {
        font-size: 28px;
        color: #59ce61
    }

    .overlay__gutter a:hover {
        text-decoration: underline;
        color: #59ce61
    }

    @media screen and (min-width: 821px) {
        .hideForLargeScreenOnly {
            display: none
        }
    }

    @-webkit-keyframes smooth-opening {
        0% {
            opacity: 0
        }

        100% {
            opacity: 1
        }
    }

    @keyframes smooth-opening {
        0% {
            opacity: 0
        }

        100% {
            opacity: 1
        }
    }

    .secondary-menu-results {
        background-color: rgba(30, 58, 73, .9);
        -webkit-transition: padding .1s linear;
        transition: padding .1s linear;
        z-index: 99
    }

    @media screen and (min-width: 1440px) {
        .secondary-menu-results .grid-container {
            padding: 0 !important
        }
    }

    @media screen and (max-width: 1439px) {
        .secondary-menu-results .grid-container {
            padding: 0 40px !important
        }
    }

    @media screen and (max-width: 64.06125em) {
        .secondary-menu-results .grid-container {
            padding: 0 0 0 40px !important
        }
    }

    @media screen and (max-width: 39.99875em) {
        .secondary-menu-results .grid-container {
            padding: 0 0 0 30px !important
        }
    }

    @media screen and (max-width: 340px) {
        .secondary-menu-results .grid-container {
            padding: 0 0 0 10px !important
        }
    }

    .secondary-menu-results.is-stuck {
        background-color: rgba(30, 58, 73, .9);
        display: block;
        position: fixed;
        top: 100px;
        z-index: 99;
        width: 100%;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn
    }

    @media screen and (max-width: 39.99875em) {
        .secondary-menu-results.is-stuck {
            top: 80px
        }
    }

    .secondary-menu-results .industry-list {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        list-style: none;
        padding: 0;
        overflow-y: scroll;
        white-space: nowrap;
        -ms-overflow-style: none;
        scrollbar-width: none
    }

    .secondary-menu-results .industry-list::-webkit-scrollbar {
        display: none
    }

    .secondary-menu-results .industry-list li {
        padding: 0 15px;
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content
    }

    .secondary-menu-results .industry-list li:first-child {
        padding-left: 0
    }

    .secondary-menu-results .industry-list li a {
        font-size: 18px;
        color: #fff;
        padding: .7rem 0;
        display: inline-block;
        vertical-align: top;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out
    }

    @media screen and (max-width: 39.99875em) {
        .secondary-menu-results .industry-list li a {
            font-size: 16px
        }
    }

    .secondary-menu-results .industry-list li a:hover {
        color: #59ce61;
        cursor: pointer
    }

    .secondary-menu-results .industry-list li a.full-access {
        font-size: 12px;
        text-decoration: underline;
        color: #59ce61
    }

    .secondary-menu-results .industry-list li a.full-access:hover {
        border-top: none
    }

    .secondary-menu-results .industry-list li.current a {
        color: #59ce61
    }

    .grid-container {
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto
    }

    .grid-x {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-flow: row wrap;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap
    }

    .cell {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        min-height: 0;
        min-width: 0;
        width: 100%
    }

    .cell.auto {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 0;
        -ms-flex: 1 1 0;
        flex: 1 1 0px
    }

    .cell.shrink {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto
    }

    .grid-x > .auto {
        width: auto
    }

    .grid-x > .shrink {
        width: auto
    }

    .grid-x > .small-1 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 8.3333333333%
    }

    .grid-x > .small-2 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 16.6666666667%
    }

    .grid-x > .small-3 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 25%
    }

    .grid-x > .small-4 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 33.3333333333%
    }

    .grid-x > .small-5 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 41.6666666667%
    }

    .grid-x > .small-6 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 50%
    }

    .grid-x > .small-7 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 58.3333333333%
    }

    .grid-x > .small-8 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 66.6666666667%
    }

    .grid-x > .small-9 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 75%
    }

    .grid-x > .small-10 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 83.3333333333%
    }

    .grid-x > .small-11 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 91.6666666667%
    }

    .grid-x > .small-12 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: 100%
    }

    @media screen and (min-width: 40em) {
        .grid-x > .medium-auto {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 0;
            -ms-flex: 1 1 0;
            flex: 1 1 0px;
            width: auto
        }

        .grid-x > .medium-1 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 8.3333333333%
        }

        .grid-x > .medium-2 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 16.6666666667%
        }

        .grid-x > .medium-3 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 25%
        }

        .grid-x > .medium-4 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 33.3333333333%
        }

        .grid-x > .medium-5 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 41.6666666667%
        }

        .grid-x > .medium-6 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 50%
        }

        .grid-x > .medium-7 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 58.3333333333%
        }

        .grid-x > .medium-8 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 66.6666666667%
        }

        .grid-x > .medium-9 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 75%
        }

        .grid-x > .medium-10 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 83.3333333333%
        }

        .grid-x > .medium-11 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 91.6666666667%
        }

        .grid-x > .medium-12 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 100%
        }
    }

    @media screen and (min-width: 64.0625em) {
        .grid-x > .large-auto {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 0;
            -ms-flex: 1 1 0;
            flex: 1 1 0px;
            width: auto
        }

        .grid-x > .large-1 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 8.3333333333%
        }

        .grid-x > .large-2 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 16.6666666667%
        }

        .grid-x > .large-3 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 25%
        }

        .grid-x > .large-4 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 33.3333333333%
        }

        .grid-x > .large-5 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 41.6666666667%
        }

        .grid-x > .large-6 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 50%
        }

        .grid-x > .large-7 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 58.3333333333%
        }

        .grid-x > .large-8 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 66.6666666667%
        }

        .grid-x > .large-9 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 75%
        }

        .grid-x > .large-10 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 83.3333333333%
        }

        .grid-x > .large-11 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 91.6666666667%
        }

        .grid-x > .large-12 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 100%
        }
    }

    .grid-padding-x .grid-padding-x {
        margin-right: -.625rem;
        margin-left: -.625rem
    }

    @media screen and (min-width: 40em) {
        .grid-padding-x .grid-padding-x {
            margin-right: -.9375rem;
            margin-left: -.9375rem
        }
    }

    .grid-padding-x > .cell {
        padding-right: .625rem;
        padding-left: .625rem
    }

    @media screen and (min-width: 40em) {
        .grid-padding-x > .cell {
            padding-right: .9375rem;
            padding-left: .9375rem
        }
    }

    .small-offset-0 {
        margin-left: 0%
    }

    .small-offset-1 {
        margin-left: 8.3333333333%
    }

    .small-offset-2 {
        margin-left: 16.6666666667%
    }

    .small-offset-3 {
        margin-left: 25%
    }

    .small-offset-4 {
        margin-left: 33.3333333333%
    }

    .small-offset-5 {
        margin-left: 41.6666666667%
    }

    .small-offset-6 {
        margin-left: 50%
    }

    .small-offset-7 {
        margin-left: 58.3333333333%
    }

    .small-offset-8 {
        margin-left: 66.6666666667%
    }

    .small-offset-9 {
        margin-left: 75%
    }

    .small-offset-10 {
        margin-left: 83.3333333333%
    }

    .small-offset-11 {
        margin-left: 91.6666666667%
    }

    @media screen and (min-width: 40em) {
        .medium-offset-0 {
            margin-left: 0%
        }

        .medium-offset-1 {
            margin-left: 8.3333333333%
        }

        .medium-offset-2 {
            margin-left: 16.6666666667%
        }

        .medium-offset-3 {
            margin-left: 25%
        }

        .medium-offset-4 {
            margin-left: 33.3333333333%
        }

        .medium-offset-5 {
            margin-left: 41.6666666667%
        }

        .medium-offset-6 {
            margin-left: 50%
        }

        .medium-offset-7 {
            margin-left: 58.3333333333%
        }

        .medium-offset-8 {
            margin-left: 66.6666666667%
        }

        .medium-offset-9 {
            margin-left: 75%
        }

        .medium-offset-10 {
            margin-left: 83.3333333333%
        }

        .medium-offset-11 {
            margin-left: 91.6666666667%
        }
    }

    @media screen and (min-width: 64.0625em) {
        .large-offset-0 {
            margin-left: 0%
        }

        .large-offset-1 {
            margin-left: 8.3333333333%
        }

        .large-offset-2 {
            margin-left: 16.6666666667%
        }

        .large-offset-3 {
            margin-left: 25%
        }

        .large-offset-4 {
            margin-left: 33.3333333333%
        }

        .large-offset-5 {
            margin-left: 41.6666666667%
        }

        .large-offset-6 {
            margin-left: 50%
        }

        .large-offset-7 {
            margin-left: 58.3333333333%
        }

        .large-offset-8 {
            margin-left: 66.6666666667%
        }

        .large-offset-9 {
            margin-left: 75%
        }

        .large-offset-10 {
            margin-left: 83.3333333333%
        }

        .large-offset-11 {
            margin-left: 91.6666666667%
        }
    }

    .foundation-mq {
        font-family: "small=0em&medium=40em&large=64.0625em&xlarge=75em&xxlarge=90em"
    }

    .no-webp .card--upgrade .card-1 .card__image,
    .no-webp .card--home .card-1 .card__image {
        background-image: url(//cdn3.careerhunter.io/assets/upgrade/card1-e8d9fc6597cc3bf5c2dd391767d24c6f5a3c6e0b724c0401f9882d7eb5d75f36.png)
    }

    @media screen and (max-width: 39.99875em) {

        .no-webp .card--upgrade .card-1 .card__image,
        .no-webp .card--home .card-1 .card__image {
            background-image: url(//cdn0.careerhunter.io/assets/upgrade/card_1m-051a87f34f8590a2a540f1abf2dd392c8804ba6adad1932ca0d153e72d4fecae.png)
        }
    }

    .no-webp .card--upgrade .card-2 .card__image,
    .no-webp .card--home .card-2 .card__image {
        background-image: url(//cdn0.careerhunter.io/assets/upgrade/card2-5d55ea3372498f9033f1a62300b9588293df8b6ba5e2f848fb7311eb5906175d.png)
    }

    @media screen and (max-width: 39.99875em) {

        .no-webp .card--upgrade .card-2 .card__image,
        .no-webp .card--home .card-2 .card__image {
            background-image: url(//cdn1.careerhunter.io/assets/upgrade/card_2m-dc67c7051221422ea04d49fa1b9e31198dda841e538d785102a8a643b1cbb6a9.png)
        }
    }

    .no-webp .card--upgrade .card-3 .card__image,
    .no-webp .card--home .card-3 .card__image {
        background-image: url(//cdn2.careerhunter.io/assets/upgrade/card3-d98f2cd411066aa2336ecbb24e1545042766e70f83c6fc7ef098f55ee40407ae.png)
    }

    @media screen and (max-width: 39.99875em) {

        .no-webp .card--upgrade .card-3 .card__image,
        .no-webp .card--home .card-3 .card__image {
            background-image: url(//cdn1.careerhunter.io/assets/upgrade/card_3m-d201491fc5e7073a11c4834af3927dd41cc625f9afc037ff966e8652c16bb54b.png)
        }
    }

    .no-webp .card--home .card-4 .card__image {
        background-image: url(//cdn2.careerhunter.io/assets/upgrade/business-and-management-1e5e0d1d9d4db9d0c7b9174e41fd37895056260706a9bdb16063ed15eb6ffe2e.jpg)
    }

    .no-webp .card--home .card-5 .card__image {
        background-image: url(//cdn3.careerhunter.io/assets/upgrade/Engineering-56d69ad02b52731a67dbe4d780789893b863eac43f6736f25f8eab6432c8e448.jpg)
    }

    .no-webp .card--home .card-6 .card__image {
        background-image: url(//cdn3.careerhunter.io/assets/upgrade/Creative-Arts-bb68e305261d24ec3fe3cb2dfcc74023a2a93b6b9398b987ab0a50508be8f0f4.jpg)
    }

    .card {
        font-family: sofia-pro-regular, sans-serif;
        border: none;
        position: relative;
        background-color: rgba(255, 255, 255, .03)
    }

    .card__hover {
        background-color: rgba(30, 58, 73, .3);
        opacity: 0;
        position: absolute;
        top: 0;
        margin: 0 auto;
        right: 0;
        left: 0;
        bottom: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-transition: opacity .1s ease-in-out;
        transition: opacity .1s ease-in-out
    }

    .card__hover--popup {
        background-color: rgba(85, 206, 97, .8);
        height: 150px
    }

    .card__link {
        color: #59ce61;
        font-size: 11px;
        margin: 0;
        line-height: 13px;
        padding: 0 0 16px 16px
    }

    .card__link a {
        text-decoration: none
    }

    .card__link:hover {
        text-decoration: underline;
        cursor: pointer
    }

    .card--for-tests {
        padding: 30px;
        margin: 0 16px 16px 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    .card--for-tests .tests__title {
        margin: 20px 0
    }

    .card--for-tests .tests__desc {
        min-height: unset;
        max-width: unset
    }

    @media screen and (max-width: 39.99875em) {
        .card--for-tests {
            margin: 0 0 16px
        }
    }

    .card__benefits {
        padding: 45px;
        margin: 0 16px 16px 0
    }

    @media screen and (max-width: 1440px) and (min-width: 1280px) {
        .card__benefits {
            padding: 30px
        }
    }

    @media screen and (max-width: 1279px) and (min-width: 1025px) {
        .card__benefits {
            padding: 20px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card__benefits {
            margin: 0 0 16px
        }
    }

    .card__benefits__title {
        font-size: 26px;
        line-height: 31px;
        max-width: 215px;
        margin: 30px auto;
        color: #fff
    }

    .card__equalizer {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-flow: row wrap;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap
    }

    .card__equal-items {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .card__equal-items .card--careers {
        background: #fff;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1
    }

    .card--careers {
        margin: 0 8px 15px
    }

    @media screen and (max-width: 39.99875em) {
        .card--careers {
            margin: 0 auto 15px 0
        }
    }

    .card--careers.popular-results {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-flow: column wrap;
        -ms-flex-flow: column wrap;
        flex-flow: column wrap;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        height: 100%
    }

    @media screen and (min-width: 40em) {
        .card--careers.popular-results {
            margin: 0 8px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card--careers.popular-results {
            margin: 0 -30px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .card--careers.popular-results {
            border-bottom: 10px solid #0a1e2e
        }
    }

    .card--careers .card__hover {
        background: rgba(30, 58, 73, .8)
    }

    .card--careers .card__image {
        height: 104px !important
    }

    .card--careers .match-tank {
        right: 10% !important;
        left: auto !important;
        -webkit-transform: translateX(10%) !important;
        -ms-transform: translateX(10%) !important;
        transform: translateX(10%) !important;
        top: 10px !important
    }

    .card--upgrade .card-1 .card__image,
    .card--home .card-1 .card__image {
        opacity: 1;
        background-image: url(//cdn0.careerhunter.io/assets/upgrade/card1-caf123c06b881cb6f24d20236de636656db9bd6b18401b723c306bf6835fbb1d.webp);
        width: 153px;
        height: 99px
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .card-1 .card__image,
        .card--home .card-1 .card__image {
            background-image: url(//cdn0.careerhunter.io/assets/upgrade/card_1m-3e83f530bafa0f0febbb789b563ba1b03e9bea54451b106fd840836211e64a17.webp);
            width: 103px;
            height: 66px
        }
    }

    .card--upgrade .card-2 .card__image,
    .card--home .card-2 .card__image {
        opacity: 1;
        background-image: url(//cdn2.careerhunter.io/assets/upgrade/card2-ca11cdd21b2f67580855b516f1bf4a0c9ff295bd66a9179374417de7cf767a88.webp);
        width: 153px;
        height: 99px
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .card-2 .card__image,
        .card--home .card-2 .card__image {
            background-image: url(//cdn0.careerhunter.io/assets/upgrade/card_2m-7ed201c65445e0cf3e2488979aae15770690fbbd1c3851b415c57a484cb150ab.webp);
            width: 103px;
            height: 66px
        }
    }

    .card--upgrade .card-3 .card__image,
    .card--home .card-3 .card__image {
        opacity: 1;
        background-image: url(//cdn1.careerhunter.io/assets/upgrade/card3-698c94f8a206e6dcde9efb50d18a0fd174a59e6c52a44b574042c554f8e91a6b.webp);
        width: 153px;
        height: 99px
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .card-3 .card__image,
        .card--home .card-3 .card__image {
            background-image: url(//cdn2.careerhunter.io/assets/upgrade/card_3m-89ddb610245696b0f81f2c30230649dd8a24b1df17b4ea02925f7469bbfb5310.webp);
            width: 103px;
            height: 66px
        }
    }

    .card--upgrade .card__image,
    .card--home .card__image {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        width: 153px;
        height: 99px;
        opacity: .4
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .card__image,
        .card--home .card__image {
            width: 103px;
            height: 66px
        }
    }

    .card--upgrade .match-tank,
    .card--home .match-tank {
        width: 66px;
        height: 66px;
        top: 15px !important
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .match-tank,
        .card--home .match-tank {
            width: 50px;
            height: 50px;
            top: 5px !important
        }
    }

    .card--upgrade .match-tank .inner,
    .card--home .match-tank .inner {
        width: 66px;
        height: 66px
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .match-tank .inner,
        .card--home .match-tank .inner {
            width: 50px;
            height: 50px
        }
    }

    .card--upgrade .match-tank .qm,
    .card--home .match-tank .qm {
        font-size: 20px !important
    }

    @media screen and (max-width: 64.06125em) {

        .card--upgrade .match-tank .qm,
        .card--home .match-tank .qm {
            font-size: 16px !important
        }
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .match-tank .qm,
        .card--home .match-tank .qm {
            font-size: 16px !important
        }
    }

    .card--upgrade .match-tank .match-percent,
    .card--home .match-tank .match-percent {
        top: 22%
    }

    .card--upgrade .match-tank .match-percent.hidden,
    .card--home .match-tank .match-percent.hidden {
        font-size: 13px
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .match-tank .match-percent.hidden,
        .card--home .match-tank .match-percent.hidden {
            top: 10% !important;
            font-size: 11px
        }
    }

    .card--upgrade .card__section,
    .card--home .card__section {
        background: #1f2f3d;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        padding: 5px 10px
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .card__section,
        .card--home .card__section {
            padding: 4px 10px
        }
    }

    @media screen and (max-width: 39.99875em) {

        .card--upgrade .card__name,
        .card--home .card__name {
            font-size: 10px !important
        }
    }

    .card--upgrade .card__name:hover,
    .card--home .card__name:hover {
        cursor: default;
        color: #fff !important
    }

    .card--upgrade .card-1 {
        position: absolute;
        left: -46px;
        top: 112px;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65)
    }

    @media screen and (min-width: 1080px) and (max-width: 1279px) {
        .card--upgrade .card-1 {
            left: -15px;
            z-index: -1
        }
    }

    @media screen and (min-width: 640px) and (max-width: 1079px) {
        .card--upgrade .card-1 {
            position: absolute;
            left: unset;
            right: 200px;
            top: 150px;
            z-index: -1
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card--upgrade .card-1 {
            width: 103px;
            left: -25px;
            top: 90px;
            z-index: -1
        }
    }

    @media screen and (max-width: 350px) {
        .card--upgrade .card-1 {
            left: -18px
        }
    }

    .card--upgrade .card-2 {
        position: absolute;
        right: 6%;
        top: 0;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65)
    }

    @media screen and (min-width: 1080px) and (max-width: 1279px) {
        .card--upgrade .card-2 {
            right: 9%
        }
    }

    @media screen and (min-width: 1025px) and (max-width: 1079px) {
        .card--upgrade .card-2 {
            display: none
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card--upgrade .card-2 {
            width: 103px;
            right: 14%;
            top: -62px;
            z-index: -1
        }
    }

    .card--upgrade .card-3 {
        position: absolute;
        right: -17%;
        top: 60px;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65)
    }

    @media screen and (min-width: 1080px) and (max-width: 1279px) {
        .card--upgrade .card-3 {
            right: -20px
        }
    }

    @media screen and (min-width: 640px) and (max-width: 1079px) {
        .card--upgrade .card-3 {
            right: unset;
            left: 55px;
            top: 75px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card--upgrade .card-3 {
            width: 103px;
            right: 0;
            top: 335px;
            z-index: 0
        }
    }

    @media screen and (max-width: 340px) {
        .card--upgrade .card-3 {
            right: 0
        }
    }

    .card--home .card-1 {
        position: absolute;
        left: 140px;
        top: -20px;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        z-index: 2
    }

    @media screen and (min-width: 1151px) and (max-width: 1279px) {
        .card--home .card-1 {
            left: 120px
        }
    }

    @media screen and (min-width: 1025px) and (max-width: 1150px) {
        .card--home .card-1 {
            position: absolute;
            left: 50px;
            top: -63px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .card--home .card-1 {
            position: absolute;
            right: calc(50% - 160px);
            top: 450px;
            left: unset
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card--home .card-1 {
            right: calc(50% - 130px)
        }
    }

    .card--home .card-1 .card__image {
        background-image: url(//cdn1.careerhunter.io/assets/upgrade/card3-698c94f8a206e6dcde9efb50d18a0fd174a59e6c52a44b574042c554f8e91a6b.webp)
    }

    .card--home .card-2 {
        position: absolute;
        left: 20px;
        top: 58px;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65)
    }

    @media screen and (max-width: 64.06125em) {
        .card--home .card-2 {
            left: unset;
            right: calc(50% - 50px);
            top: 500px
        }
    }

    .card--home .card-3 {
        position: absolute;
        right: 160px;
        top: 95px;
        -webkit-box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        box-shadow: 0 0 20px -5px rgba(0, 0, 0, .65);
        z-index: 2
    }

    @media screen and (min-width: 1151px) and (max-width: 1279px) {
        .card--home .card-3 {
            right: 115px;
            top: 80px
        }
    }

    @media screen and (min-width: 1025px) and (max-width: 1150px) {
        .card--home .card-3 {
            right: -25px;
            top: 90px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card--home .card-3 {
            width: 103px;
            right: -5%;
            top: 22px;
            z-index: 0
        }
    }

    @media screen and (max-width: 340px) {
        .card--home .card-3 {
            right: 0
        }
    }

    .card--home .card-3 .card__image {
        background-image: url(//cdn0.careerhunter.io/assets/upgrade/card1-caf123c06b881cb6f24d20236de636656db9bd6b18401b723c306bf6835fbb1d.webp)
    }

    .card--horizontal {
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px
    }

    .card--horizontal .card-4 {
        top: 250px;
        left: 140px;
        width: 200px;
        height: 80px;
        position: absolute
    }

    .card--horizontal .card-4 .card__image {
        background-image: url(//cdn0.careerhunter.io/assets/upgrade/business-and-management-99b18639d651b0d55d42748fb276febb04594defd109c1aec39c2e62494a6eaf.webp);
        background-position: center
    }

    @media screen and (max-width: 1279px) and (min-width: 1025px) {
        .card--horizontal .card-4 {
            left: 50px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .card--horizontal .card-4 {
            top: -70px
        }
    }

    .card--horizontal .card-5 {
        right: 10px;
        top: 208px;
        width: 200px;
        height: 80px;
        position: absolute
    }

    .card--horizontal .card-5 .card__image {
        background-image: url(//cdn0.careerhunter.io/assets/upgrade/Engineering-9ec76754fb5658c31ac87f932595f105d9b01cfa0ec097dd123f14ddc12a5402.webp);
        background-position: center
    }

    .card--horizontal .card-6 {
        right: 240px;
        top: 350px;
        width: 200px;
        height: 80px;
        position: absolute
    }

    .card--horizontal .card-6 .card__image {
        background-image: url(//cdn3.careerhunter.io/assets/upgrade/Creative-Arts-75b1b3a8365eda68d795d9b069ca5b0dba22c50c86bf06a11bbf406631e0d460.webp);
        background-position: center
    }

    .card--horizontal .card__image {
        width: 200px;
        height: 80px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px
    }

    .card--horizontal .card__section {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        background: 0 0;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        border-radius: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        position: absolute;
        top: 0
    }

    .card--horizontal .match-tank {
        position: initial !important;
        top: 0 !important;
        left: 40px !important;
        -webkit-transform: translateX(0%) !important;
        -ms-transform: translateX(0%) !important;
        transform: translateX(0%) !important
    }

    .card--horizontal .card__name {
        margin-left: 10px
    }

    .card--courses {
        margin: 0 8px 15px
    }

    @media screen and (max-width: 39.99875em) {
        .card--courses {
            margin: 0 auto 15px 0
        }
    }

    .card--courses img {
        height: 104px;
        -o-object-fit: cover;
        object-fit: cover;
        width: 100%
    }

    .card--courses:hover {
        background: rgba(255, 255, 255, .1)
    }

    .card--courses:hover .card__link {
        text-decoration: underline
    }

    .card--jobs {
        display: block;
        margin: 0 8px 16px
    }

    @media screen and (max-width: 39.99875em) {
        .card--jobs {
            margin: 0 auto 20px 0
        }
    }

    .card--jobs:hover {
        background-color: rgba(59, 75, 88, .9);
        cursor: pointer
    }

    .card--jobs:hover .card__search {
        text-decoration: underline
    }

    .card__content {
        padding: 20px;
        min-height: 84px
    }

    .card__search {
        font-size: 11px;
        line-height: 13px;
        color: #59ce61;
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 auto;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto
    }

    .card__search .small-icons {
        display: inline-block;
        margin: 0 0 0 5px
    }

    .card__jobs-title {
        font-family: sofia-pro-semi-bold, sans-serif;
        font-size: 18px;
        line-height: 22px;
        color: #fff;
        margin: 0 0 11px
    }

    .card__jobs-title--recommended {
        min-height: 44px
    }

    .card__jobs-salary {
        font-family: sofia-pro-light, sans-serif;
        font-size: 15px;
        line-height: 22px;
        color: rgba(255, 255, 255, .5)
    }

    .card__jobs-recommended {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin: 13px 0 0
    }

    .card__jobs-recommended .card__search {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 100px;
        -ms-flex: 1 1 100px;
        flex: 1 1 100px;
        text-align: right
    }

    .card__jobs-score {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        font-size: 12px;
        line-height: 14px;
        color: rgba(255, 255, 255, .5)
    }

    .card__jobs-score .small-icon {
        display: inline-block;
        margin: 0 5px -2px 0;
        -webkit-flex-shrink: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .card__overview-results {
        background: rgba(255, 255, 255, .1) !important
    }

    .card__overview {
        position: relative
    }

    .card__overview .circle {
        position: absolute;
        background: rgba(255, 255, 255, .08);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .card__overview .circle.half-top {
        top: 0;
        right: 20px;
        width: 50px;
        height: 25px;
        border-radius: 0 0 25px 25px
    }

    .card__overview .circle.small-right {
        top: 50px;
        right: 12px;
        width: 17px;
        height: 17px
    }

    .card__overview .circle.small-left {
        top: 60px;
        left: 110px;
        width: 15px;
        height: 15px
    }

    .card__overview .circle.half-bot {
        top: 65px;
        left: 90px;
        width: 30px;
        height: 15px;
        border-radius: 15px 15px 0 0
    }

    .card__overview-icon {
        background: rgba(89, 206, 97, .5);
        width: 63px;
        height: 63px;
        border-radius: 50%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .card__overview-icon .large-icon {
        margin: auto
    }

    .card--results {
        border-radius: 20px;
        background: #1e3a49;
        max-height: 208px;
        margin: 20px 0 !important
    }

    .card--results .card__image {
        border-radius: 20px;
        height: 80px;
        opacity: .5
    }

    .card--results .card__section {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        min-height: 80px;
        padding: 0 14px 8px;
        position: absolute;
        top: 0
    }

    .card--results .card-industry-name {
        color: #fff;
        margin-left: 10px;
        text-align: center;
        font-size: 15px;
        line-height: 18px
    }

    .card--results .match-tank {
        position: initial !important;
        top: 0 !important;
        left: 40px !important;
        -webkit-transform: translateX(0%) !important;
        -ms-transform: translateX(0%) !important;
        transform: translateX(0%) !important
    }

    .card--explained {
        min-height: 300px
    }

    @media screen and (min-width: 1025px) and (max-width: 1080px) {
        .card--explained {
            min-height: 345px
        }
    }

    @media screen and (min-width: 769px) and (max-width: 900px) {
        .card--explained {
            min-height: 345px
        }
    }

    @media screen and (min-width: 640px) and (max-width: 700px) {
        .card--explained {
            min-height: 325px
        }
    }

    .card--slider-header {
        padding: 25px 0 25px 25px
    }

    @media screen and (max-width: 64.06125em) {
        .card--slider-header {
            padding: 0
        }
    }

    .card--balanced {
        padding: 55px
    }

    @media screen and (max-width: 1279px) and (min-width: 1025px) {
        .card--balanced {
            padding: 50px 25px
        }
    }

    .card--balanced.small {
        padding: 30px
    }

    .card__section {
        padding: 10px
    }

    .card__section--careers {
        background: #fff;
        min-height: 170px
    }

    .card__section--careers .card__name {
        font-size: 18px;
        color: #0a1e2e;
        margin-bottom: 10px;
        font-family: sofia-pro-semi-bold, sans-serif
    }

    .card__section--careers .card__salary {
        color: #0a1e2e;
        margin-bottom: 5px
    }

    .card__section--careers .card__education {
        color: rgba(10, 30, 46, .5);
        margin-bottom: 20px
    }

    .card__section--careers .card__link {
        padding: 0 !important
    }

    .card__section--courses {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        min-height: 60px
    }

    .card__section--careers,
    .card__section--courses {
        padding: 20px
    }

    .card__section--careers-results {
        min-height: 109px;
        padding: 10px 25px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center
    }

    .card__section--careers-results .name {
        color: #fff;
        margin: 0;
        font-size: 22px;
        font-family: sofia-pro-light, sans-serif;
        line-height: 26px;
        width: 70%
    }

    .card__section--careers-results .match-tank {
        position: absolute !important;
        top: 50% !important;
        right: 10px !important;
        left: auto !important;
        -webkit-transform: translate(-10px, -50%) !important;
        -ms-transform: translate(-10px, -50%) !important;
        transform: translate(-10px, -50%) !important;
        width: 70px;
        height: 70px
    }

    .card__section--careers-results .match-tank .match-percent {
        top: 25%
    }

    .card__section--careers-results .match-tank .inner {
        width: 70px;
        height: 70px
    }

    .card__section--careers-results .match-tank .hidden {
        font-size: 14px
    }

    .card__section--careers-results .match-tank .hidden .qm {
        font-size: 24px;
        line-height: 23px
    }

    .card__section--extra-padding {
        padding: 16px 16px 0;
        min-height: 122px
    }

    @media screen and (min-width: 40em) {
        .card__section--extra-padding {
            min-height: 134px
        }
    }

    @media screen and (max-width: 1440px) and (min-width: 1025px) {
        .card__section--extra-padding {
            min-height: 154px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .card__section--extra-padding {
            min-height: 140px
        }
    }

    .card__section--top {
        padding: 30px 30px 0
    }

    .card__section--main {
        padding: 20px 30px;
        font-size: 15px;
        color: #fff
    }

    .card__title {
        font-size: 20px;
        color: #fff;
        padding: 0 20px;
        margin: 0
    }

    .card__title--courses {
        font-size: 18px;
        padding: 0;
        min-height: 44px
    }

    .card__button {
        margin: 0;
        color: #59ce61;
        -webkit-transition: all .1s ease-in-out;
        transition: all .1s ease-in-out
    }

    .card__button:hover,
    .card__button:focus {
        color: #59ce61
    }

    .card__image {
        background: url(//cdn1.careerhunter.io/assets/about-863b591d31602b953f019237f8708c6428eb4d7878dab713e2019bf815df61dc.jpg);
        -webkit-background-size: cover;
        background-size: cover;
        height: 200px
    }

    .card__image--popup {
        background: url(//cdn1.careerhunter.io/assets/about-863b591d31602b953f019237f8708c6428eb4d7878dab713e2019bf815df61dc.jpg);
        -webkit-background-size: cover;
        background-size: cover;
        height: 150px
    }

    .card__read-more {
        color: #59ce61;
        font-family: sofia-pro-regular, sans-serif;
        font-size: 12px
    }

    .card__name {
        color: #fff;
        margin: 0
    }

    .card__name--popup {
        font-size: 18px;
        line-height: 1.3;
        color: #0a1e2e;
        margin: 20px 0 0;
        text-align: center
    }

    .card__name--popup:hover {
        color: #59ce61
    }

    .card__courses-logo {
        height: 70px;
        width: 70px;
        margin: 0 15px 0 0;
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 70px;
        -ms-flex: 0 0 70px;
        flex: 0 0 70px;
        position: relative
    }

    .card__courses-logo:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: -1
    }

    .card__courses-details {
        font-family: sofia-pro-light, sans-serif;
        font-size: 15px;
        line-height: 22px;
        color: rgba(255, 255, 255, .5);
        margin: 11px 0 20px
    }

    .card__provider {
        margin: 0 0 10px;
        color: #59ce61
    }

    .card--degrees {
        display: block;
        margin: 0 8px 16px
    }

    .card--degrees:hover {
        background-color: rgba(59, 75, 88, .9);
        cursor: pointer
    }

    .card--degrees:hover .card__search {
        text-decoration: underline
    }

    .card__degree-content {
        padding: 15px 20px 15px 15px
    }

    .card__degree-title {
        font-size: 18px;
        line-height: 22px;
        color: #fff;
        margin: 0 0 27px
    }

    .card__degree-details {
        font-family: sofia-pro-light, sans-serif;
        font-size: 15px;
        line-height: 22px;
        margin: 0 0 20px;
        color: rgba(255, 255, 255, .5)
    }

    .card__degree-logo {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, .5)
    }

    .card .match-tank {
        position: absolute;
        top: 55px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%)
    }

    .card:hover .card__hover,
    .card.active .card__hover {
        opacity: 1
    }

    .progress__card {
        background-color: #142b3d;
        height: 250px;
        margin: 0;
        padding: 10px 10px 15px;
        position: relative;
        z-index: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between
    }

    .progress__card.finished .big-white-tooltip {
        opacity: 1
    }

    .progress__card.finished .progress__link {
        color: #fff
    }

    .progress__card .big-white-tooltip {
        opacity: .5
    }

    .progress__card .circle {
        position: absolute;
        background: rgba(255, 255, 255, .08);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%
    }

    .progress__card .circle.half-top,
    .progress__card .circle.half-1 {
        top: 0;
        right: 20px;
        width: 80px;
        height: 40px;
        border-radius: 0 0 40px 40px
    }

    .progress__card .circle.right-small,
    .progress__card .circle.right-1 {
        top: 50px;
        right: 20px;
        width: 24px;
        height: 24px
    }

    .progress__card .button {
        z-index: 1
    }

    .progress__card--career {
        background: #fff;
        padding: 30px 15px;
        min-height: 250px;
        -webkit-box-pack: start;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        height: 250px
    }

    @media screen and (max-width: 1060px) and (min-width: 1025px) {
        .progress__card--career {
            height: 280px;
            min-height: 280px
        }
    }

    .progress__card--career .circle {
        background: rgba(10, 30, 46, .08)
    }

    .progress__card--career .circle.half-bottom,
    .progress__card--career .circle.half-0,
    .progress__card--career .circle.half-2 {
        bottom: 0;
        right: 20px;
        width: 80px;
        height: 40px;
        border-radius: 40px 40px 0 0
    }

    .progress__card--career .circle.right-small-bottom,
    .progress__card--career .circle.right-small-0,
    .progress__card--career .circle.right-small-2 {
        bottom: 50px;
        right: 20px;
        width: 24px;
        height: 24px
    }

    .progress__card--career .progress__career-title {
        font-size: 17px;
        color: #0a1e2e;
        margin: 15px 0 10px 0;
        font-family: sofia-pro-semi-bold, sans-serif
    }

    .progress__layer {
        position: absolute;
        background: rgba(89, 206, 97, .5);
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0;
        z-index: -1;
        -webkit-animation: fillUp 2s ease-in-out;
        animation: fillUp 2s ease-in-out
    }

    .progress__layer.not_started {
        height: 0
    }

    .progress__layer.finished {
        height: 100%
    }

    .progress__test-title {
        font-size: 18px;
        color: #fff;
        padding: 0 20px;
        margin: 0 auto 15px;
        max-width: 130px
    }

    .progress__career-title {
        font-size: 17px;
        color: #0a1e2e;
        margin-bottom: 0
    }

    .progress__career-info {
        font-size: 15px;
        color: #0a1e2e;
        margin-bottom: 10px
    }

    .progress__career-info .score {
        color: #59ce61
    }

    .progress__career-info .industry {
        font-family: sofia-pro-bold, sans-serif
    }

    .progress__link {
        color: #59ce61;
        font-size: 12px;
        line-height: 1;
        z-index: 2;
        position: relative
    }

    .progress__link:hover {
        text-decoration: underline;
        cursor: pointer
    }

    .progress__details {
        color: rgba(255, 255, 255, .5);
        font-size: 15px;
        display: inline-block;
        opacity: .5;
        -webkit-animation: none;
        animation: none;
        line-height: 1
    }

    .progress__details--time {
        margin: 5px 0 0 10px
    }

    .progress__details--timed {
        margin: 5px 0 0 10px;
        opacity: 1
    }

    .progress__details--comments {
        margin: 5px 10px 0 0
    }

    .progress-label {
        color: rgba(255, 255, 255, .5);
        margin: 0 10px 0 0
    }

    .degrees__heading {
        font-family: sofia-pro-semi-bold, sans-serif;
        margin: 0 0 17px
    }

    .degrees__featured {
        margin: 80px 0 0
    }

    @-webkit-keyframes fillUp {
        0% {
            height: 0
        }
    }

    @keyframes fillUp {
        0% {
            height: 0
        }
    }

    .adBlock {
        margin: 0 8px 15px
    }

    @media screen and (max-width: 340px) {
        .match-explained-container .is-overlapping {
            margin: 0 -10px
        }
    }

    @media screen and (max-width: 74.99875em) {
        .match-explained-slider {
            overflow: hidden
        }

        .match-explained-slider.swiper-container {
            padding: 0 40px
        }

        .match-explained-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .match-explained-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .match-explained-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .match-explained-slider.slider-with-white-arrows .slick-prev {
            left: 10px
        }

        .match-explained-slider.slider-with-white-arrows .slick-next {
            right: 20px
        }

        .match-explained-slider .slick-list {
            overflow: visible;
            margin: 0 40px
        }
    }

    @media screen and (max-width: 39.99875em) {
        .match-explained-slider.swiper-container {
            padding: 0 30px
        }

        .match-explained-slider.swiper-container .swiper-wrapper {
            overflow: visible
        }

        .match-explained-slider.slider-with-white-arrows {
            padding-bottom: 60px
        }

        .match-explained-slider.slider-with-white-arrows .slick-arrow {
            bottom: -10px
        }

        .match-explained-slider.slider-with-white-arrows .slick-prev {
            left: 0
        }

        .match-explained-slider.slider-with-white-arrows .slick-next {
            right: 0
        }

        .match-explained-slider .slick-list {
            overflow: visible;
            margin: 0 30px
        }
    }

    @media screen and (max-width: 64.06125em) {
        .match-explained-slider .swiper-wrapper {
            margin-bottom: 20px
        }
    }

    @media screen and (max-width: 340px) {
        .match-explained-slider.swiper-container {
            padding: 0 10px
        }
    }
</style>
<script src="{{ asset('HuongNghiep/Hong/dichvunhom.js') }}"></script>
<script src="//cdn1.careerhunter.io/packs/vendors.3e9e666b1b937736f649.js" defer="defer"></script>
<script src="//cdn2.careerhunter.io/packs/js/affiliates~career_tests~educators-c09b6bb3535aad356efa.chunk.js"
        defer="defer"></script>
<script src="//cdn2.careerhunter.io/packs/js/educators-39d108efe7c0aff8e04c.js" defer="defer"></script>
</body>
</html>

