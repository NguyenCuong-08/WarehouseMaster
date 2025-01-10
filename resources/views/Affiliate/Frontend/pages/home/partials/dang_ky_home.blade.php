 
<section class="signup-outer img-bg padding-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <ul class="clearfix">
                    <li><span class="icon-men"></span>
                        <h4>Đăng ký tài<span> khoản</span></h4>
                    </li>
                    <li><span class="icon-chat"></span>
                        <h4>Trao đổi với <span>đội ngũ của chúng tôi</span></h4>
                    </li>
                    <li><span class="icon-lap"></span>
                        <h4>Nhận <span>hỗ trợ tốt</span></h4>
                    </li>
                </ul>
                <div class="signup-form">
                    <form action="{{route('admin.register')}}" method="post">
                        <div class="email">
                            <input name="email" type="text" placeholder="email">
                        </div>
                        <div class="password">
                            <input name="password" type="password" placeholder="password">
                        </div>
                        <button class="signup-btn">Đăng ký ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
