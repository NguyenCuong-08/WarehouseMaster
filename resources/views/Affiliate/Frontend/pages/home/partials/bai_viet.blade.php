<style>
    .our-blog .card a {
        transition: .4s;
    }

    .our-blog .card a:hover {
        color: #FF8A73;
    }
</style>
<section class="latest-stories padding-lg" id="tin-tuc">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
                {{--                <span>Our Blog</span>--}}
                <h2>Bài viết mới nhất của chúng tôi</h2>
                <p class="hidden-xs">Khám phá những câu chuyện mới nhất từ chúng tôi, nơi bạn sẽ tìm thấy những bài
                    viết thú vị, thông tin hữu ích và những trải nghiệm độc đáo. Chúng tôi cập nhật thường xuyên để
                    mang đến cho bạn những nội dung hấp dẫn nhất, giúp bạn luôn bắt kịp xu hướng và kiến thức mới.
                    Hãy cùng chúng tôi bước vào hành trình khám phá những điều thú vị!</p>
            </div>
        </div>
        <div class="card-deck blog-blocks our-blog">
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img1.jpg')}}" class="img-fluid" alt=""></figure>
                <div class="card-body">
                    <h3><a href="blog-grid.html">Món Quà Tinh Ý Cho Người Trân Quý</a></h3>
                    <span class="date">10 Dec 2017</span></div>
            </div>
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid" alt=""></figure>
                <div class="card-body">
                    <h3><a href="blog-grid.html">Tặng Tài Khoản Vip Siêu Trí Nhớ Cho Con Gia Đình Liệt Sĩ</a></h3>
                    <span class="date">21 Nov 2017</span></div>
            </div>
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img3.jpg')}}" class="img-fluid" alt=""></figure>
                <div class="card-body">
                    <h3><a href="blog-grid.html">Các chuyên gia trong và ngoài nước nói về 5 Phút Thuộc Bài</a></h3>
                    <span class="date">18 Oct 2017</span></div>
            </div>
        </div>
    </div>
</section>