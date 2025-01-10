@extends('HuongNghiep.Frontend.layouts.layout_trang_phu')
@section('header')
    @include('HuongNghiep.Frontend.partials.header.header_1')
@endsection
@section('content')
<style>
    .tnt1{
        position: unset;
        /*bottom: 0;*/
        height: 150px;
    }
</style>

    <div class="simple-top-hero simple-top-hero--about before-fade-in fade-in">
    <div class="circle small-right show-for-large"></div>
    <div class="circle half-right show-for-large"></div>
    <div class="circle small-left show-for-large"></div>
    <div class="green-circle half-bot show-for-large"></div>
    <div class="green-circle right-med show-for-large"></div>
    <div class="grid-container transparent max-width-1064">
        <div class="grid-x">
            <div class="small-12 text-center cell">
                <h1 class="simple-top-hero__green-title">Đội ngũ sáng lập TeenCodes</h1>
                <h2 style="font-size: 55px; margin-top: 20px;" class="simple-top-hero__long-desc">TeenCodes kiến tạo nền tảng <br> Vì tương lai của Teens
                    <br> Chúng tôi dành tất cả cho TeenCodes </h2>
            </div>
        </div>
    </div>
</div>

<div class="about-mission">
    <div class="grid-container">
        <div class="grid-x align-middle">
            <div class="small-12 cell text-center">
                <h3 class="about-mission__heading">Sứ mệnh của TeenCodes</h3>
                <div class="about-mission__content">
                    <div class="about-mission__blockquote"><img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/images/about/quote.png')}}" height="86" width="89" alt="career hunter mission quote icon"/></div>
                    <p class="about-mission__subheading"><span style="font-family:unset"> Cần định hướng thật tốt! TeenCodes giúp bạn lựa chọn đúng và phù hợp nhất với bản thân, hướng đến nghề nghiệp tương lai tươi sáng.</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="our-journey">
    <div  class="grid-container">
        <div class="grid-x">
            <div class="large-6 medium-12 cell large-order-1 medi-order-2 small-order-2 ">
                <div class="our-journey__pic">
                    <div class="circle left-large hide-for-small-only"></div>
                    <div class="circle left-small hide-for-small-only"></div>
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/images/about/journey-desktop.png')}}" width="601" height="272" class="show-for-large" alt="career hunter journey"/>
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/images/about/journey-tablet.png')}}" width="589" height="272" class="show-for-medium-only" alt="career hunter journey"/>
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/images/about/journey-mobile.png')}}" width="320" height="163" class="show-for-small-only" alt="career hunter journey"/>
                </div>
            </div>
            <div class="large-6 medium-12 cell  large-order-2 medium-order-1 small-order-1">
                <div class="max-width-590 large-text-left small-text-center">
                    <div class="large-icon journey"></div>
                    <h2>Our Journey</h2>
                    <p>TeenCodes được hình thành ý tưởng từ năm 2022 và bắt đầu triển khai nghiên cứu từ đầu năm 2023 để tìm giải pháp cho những khó khăn thực tế mà hầu hết các bạn tuổi Teen cùng với phụ huynh gặp phải trước mỗi kỳ tuyển sinh chuyển cấp. Chọn những môn thi nào, sẽ tập trung học tiếp về lĩnh vực gì hoặc định hướng theo ngành nghề nào?</p>
                    <p>Với sự hướng dẫn và trợ giúp của các chuyên gia hàng đầu, nhóm sáng lập TeenCodes đã được thành lập vào năm 2023 bởi các học sinh và sinh viên (trước đó vẫn là học sinh) đang học tập tại Hà Nội. TeenCodes là dự án khởi nghiệp để kết nối cũng như phục vụ hàng triệu các bạn trẻ tuổi Teen ở Việt Nam định hướng đến tương lai.</p>
                </div>
                <div class="our-journey--circle-half-right"></div>
            </div>
        </div>
    </div>
</div>

<div class="featured-logos featured-logos--blue" >
    <div class="grid-container text-center">
        <div class="grid-x">
            <div class="small-12 cell">
                <p class="featured-logos__title">AS SEEN ON:</p>
            </div>
        </div>
        <div data-react-class="logoSlider" data-react-props="{&quot;items&quot;:[{&quot;id&quot;:716,&quot;order&quot;:0,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/716/CA-Logo-White.png&quot;,&quot;file_path&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/716/CA-Logo-White.png&quot;,&quot;style_name&quot;:&quot;about&quot;},{&quot;id&quot;:710,&quot;order&quot;:1,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/710/novoresume.png&quot;,&quot;file_path&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/710/novoresume.png&quot;,&quot;style_name&quot;:&quot;about&quot;},{&quot;id&quot;:711,&quot;order&quot;:2,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/711/fairygoodboss.png&quot;,&quot;file_path&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/711/fairygoodboss.png&quot;,&quot;style_name&quot;:&quot;about&quot;},{&quot;id&quot;:712,&quot;order&quot;:3,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/712/dailyexpress.png&quot;,&quot;file_path&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/712/dailyexpress.png&quot;,&quot;style_name&quot;:&quot;about&quot;},{&quot;id&quot;:713,&quot;order&quot;:4,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/713/resume_spice.png&quot;,&quot;file_path&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/713/resume_spice.png&quot;,&quot;style_name&quot;:&quot;about&quot;},{&quot;id&quot;:715,&quot;order&quot;:5,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/715/softtonic.png&quot;,&quot;file_path&quot;:&quot;https://www.careerhunter.io/uploads/featuredlogo/715/softtonic.png&quot;,&quot;style_name&quot;:&quot;about&quot;}]}" data-react-cache-id="logoSlider-0"></div>
    </div>
</div>
<div class="unrivaled-testing-blk">
    <div class="grid-container">
        <div class="grid-x">
            <div class="large-6 cell">
                <div class="small-flex-middle">
                    <div class="large-icon unrivaled-testing"></div>
                    <h2>TeenCodes còn hơn cả một giải pháp</h2>
                </div>
                <ul class="accordion nested enable-active">
                    <li class="accordion-item is-active">
                        <a href="#" class="accordion-title">Khả năng tương thích nghề nghiệp với độ chính xác</a>
                        <div class="accordion-content">
                            <p>Thuật toán độc đáo của TeenCodes sẽ đánh giá kết quả bài trắc nghiệm của bạn và cung cấp danh sách những nghề nghiệp phù hợp với bạn và có thể giúp bạn thành công.</p>

                        </div>
                    </li>
                    <li class="accordion-item">
                        <a href="#" class="accordion-title">Phân tích tâm lý thông minh bằng Holland Codes</a>
                        <div class="accordion-content">
                            <p>Cùng với bạn đi sâu vào cấu trúc tâm lý, phân tích tính cách và các khả năng tiềm ẩn của chính bạn để nắm bắt đầy đủ điểm mạnh cần phát huy và hạn chế cần khắc phục.</p>

                        </div>
                    </li>
                    <li class="accordion-item">
                        <a href="#" class="accordion-title">Thông tin chi tiết được cá nhân hóa dành riêng cho</a>
                        <div class="accordion-content">
                            <p>Bảng điều khiển TeenCodes của bạn sẽ hiển thị thông tin chi tiết và cập nhật về kết quả từ bài trắc nghiệm cùng với sự giải thích dễ hiểu để giúp bạn hướng nghiệp thành công.</p>

                        </div>
                    </li>
                    <li class="accordion-item">
                        <a href="#" class="accordion-title">Dễ dàng đưa ra quyết định nghề nghiệp và học tập</a>
                        <div class="accordion-content">
                            <p>Cho dù bạn chưa chắc chắn nên bắt đầu từ đâu hay kế hoạch tiếp theo của mình là gì, TeenCodes sẽ giúp bạn tự lựa chọn và đưa ra các quyết định sáng suốt và phù hợp nhất.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="large-6 text-right cell unrivaled-testing-img">
                <div class="unrivaled-testing-blk--green-right-circle hide-for-small-only"></div>

                <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/images/about/unrivaled-testing-desktop.png')}}" width="760" height="488" class="show-for-large" alt="unrivaled career testing"/>
                <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/images/about/unrivaled-testing-tablet.png')}}" width="626" height="402" class="show-for-medium-only" alt="unrivaled career testing"/>
                <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.ioimages/about/unrivaled-testing-mobile.png')}}" width="320" height="383" class="show-for-small-only" alt="unrivaled career testing"/>
            </div>
        </div>
    </div>
</div>

<div class="about-team">
    <div class="grid-container">
        <h2>Đội ngũ sáng lập TeenCodes</h2>
        <p class="about-team--subtitle">Sự kết hợp giữa cả sinh viên và học sinh tuổi Teen dưới một mái nhà, chung một đam mê vận dụng các kiến thức vừa được học để cùng nhau khởi nghiệp và làm hướng nghiệp.</p>
        <div class="grid-x about-team--members-section">
            <div class="large-3 medium-6 cell">
                <div class="about-team--member">
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/689/chris-t.png')}}" />
                    <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                    <div class="about-team--member-info">
                        <p class="about-team--member-name">Phạm Hoàng Hà</p>
                        <p class="about-team--member-title">Sinh năm 2003</p>
                        
                    </div>
                </div>
            </div>
            <div class="large-3 medium-6 cell">
                <div class="about-team--member">
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/692/chris-l.png')}}" />
                    <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                    <div class="about-team--member-info">
                        <p class="about-team--member-name">Đoàn Tường Vi</p>
                        <p class="about-team--member-title">Sinh năm 2005</p>
                        <!--          <p class="about-team--member-desc"></p>-->
                    </div>
                </div>
            </div>
            <div class="large-3 medium-6 cell">
                <div class="about-team--member">
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/690/joanna.png')}}" />
                    <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                    <div class="about-team--member-info">
                        <p class="about-team--member-name">Trương Anh Quân</p>
                        <p class="about-team--member-title">Sinh năm 2004</p>
                        <!--          <p class="about-team--member-desc"></p>-->
                    </div>
                </div>
            </div>
            <div class="large-3 medium-6 cell">
                <div class="about-team--member">
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/683/anna.png')}}" />
                    <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                    <div class="about-team--member-info">
                        <p class="about-team--member-name">Đoàn Linh An</p>
                        <p class="about-team--member-title">Sinh năm 2008</p>
                        <!--          <p class="about-team--member-desc"></p>-->
                    </div>
                </div>
            </div>
            <div class="large-3 medium-6 cell">
                <div class="about-team--member">
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/685/katerina.png')}}" />
                    <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                    <div class="about-team--member-info">
                        <p class="about-team--member-name">Phan Dương Hà An</p>
                        <p class="about-team--member-title">Sinh năm 2008</p>
                        <!--          <p class="about-team--member-desc"></p>-->
                    </div>
                </div>
            </div>
            <div class="large-3 medium-6 cell">
                <div class="about-team--member">
                    <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/688/george.png')}}" />
                    <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                    <div class="about-team--member-info">
                        <p class="about-team--member-name">Phạm Sơn Hải</p>
                        <p class="about-team--member-title">Sinh năm 2007</p>
                        <!--          <p class="about-team--member-desc"></p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="about-team">
        <div style="padding-top:0 !important" class="grid-container">
            <h2>Ban cố vấn cho TeenCodes</h2>
            <p class="about-team--subtitle">Với sự tham gia cố vấn, hướng dẫn, dẫn dắt các chuyên gia trong lĩnh vực giáo dục và ứng dụng công nghệ - đổi mới sáng tạo trong hoạt động đào tạo cũng như hướng nghiệp.</p>
            <div class="grid-x about-team--members-section">
                <div class="large-3 medium-6 cell">
                    <div class="about-team--member">
                        <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/689/chris-t.png')}}" />
                        <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                        <div class="tnt1  about-team--member-info">
                            <p class="about-team--member-name">Vũ Việt Anh</p>
                            <p class="about-team--member-title">Tiến sĩ</p>
                            <p class="about-team--member-title">Công ty Giáo dục và truyền thông HỌC VIỆN THÀNH CÔNG</p>
                            <!--          <p class="about-team--member-desc"></p>-->
                        </div>
                    </div>
                </div>
                <div class="large-3 medium-6 cell">
                    <div class="about-team--member">
                        <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/692/chris-l.png')}}" />
                        <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                        <div class="tnt1 about-team--member-info">
                            <p class="about-team--member-name">Đoàn Bắc</p>
                            <p class="about-team--member-title">Thạc sĩ</p>
                            <p class="about-team--member-title">Công ty Đào tạo trực tuyến 3G CỘNG</p>
                            <!--          <p class="about-team--member-desc"></p>-->
                        </div>
                    </div>
                </div>
                <div class="large-3 medium-6 cell">
                    <div class="about-team--member">
                        <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/690/joanna.png')}}" />
                        <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                        <div class="tnt1 about-team--member-info">
                            <p class="about-team--member-name">Đỗ Như Hảo</p>
                            <p class="about-team--member-title">Thạc sĩ</p>
                            <p class="about-team--member-title">Công ty Giáo dục và truyền thông HỌC VIỆN THÀNH CÔNG</p>
                            <!--          <p class="about-team--member-desc"></p>-->
                        </div>
                    </div>
                </div>
                <div class="large-3 medium-6 cell">
                    <div class="about-team--member">
                        <img src="{{ asset('HuongNghiep/layout_page/www.careerhunter.io/uploads/images/683/anna.png')}}" />
                        <!--          <img src="images/about/Christopher-Thoma.png"/>-->
                        <div class="tnt1 about-team--member-info">
                            <p class="about-team--member-name">Phan Văn Hưng</p>
                            <p class="about-team--member-title">Giảng viên </p>
                            <p class="about-team--member-title">Công ty TOMOTECH</p>
                            <!--          <p class="about-team--member-desc"></p>-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
@section('footer')
    @include('HuongNghiep.Frontend.partials.footer.footer_1')
@endsection