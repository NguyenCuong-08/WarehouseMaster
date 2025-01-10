@extends('HuongNghiep.Frontend.layouts.layout_trang_phu')
@section('header')
    @include('HuongNghiep.Frontend.partials.header.header_2')
@endsection
@section('content')

    <div class="grid-container contact transparent max-width-1064 large-align-middle">
        <div class="grid-x full">
            <div class="large-6 medium-12 cell">
                <div itemscope itemtype="http://schema.org/Organization">
                    <meta itemprop="name" content="CareerHunter">
                    <meta itemprop="email" content="info@careerhunter.io">
                    <meta itemProp="url" content="index.html" />
                    <meta itemProp="sameAs" content="https://www.facebook.com/CareerHunterTest" />
                    <div itemscope itemtype="http://schema.org/ImageObject" itemprop="logo">
                        <meta itemprop="url" content="images/CareerHunter-square-logo.jpg">
                        <meta itemprop="width" content="400">
                        <meta itemprop="height" content="400">
                    </div>

                    <h1 class="contact contact--title">Liên hệ với chúng tôi</h1>
                    <h2 class="contact contact--subtitle">TeenCodes luôn lắng nghe bạn</h2>
                    <p class="contact contact--text">Dù bạn có thắc mắc hoặc cần trợ giúp về vấn đề gì, đội ngũ của TeenCodes
                        sẵn sàng tư vấn và hỗ trợ bạn.</p>
                    <p class="contact contact--text">Bạn cũng có thể xem phần Câu hỏi thường gặp của <a href="faq.html"
                                                                                                        class="green-link-on-hover">TeenCodes.vn</a> – có thể đã trả lời câu hỏi của bạn ở đó.</p>
                    <div class="grid-x">
                        <div class="large-6 medium-6 small-12 cell">
                            <p class="contact contact--labels">Giờ làm việc</p>
                            <p class="contact contact--labels-info">
                                Đội ngũ của TeenCodes sẵn sàng trợ giúp, tất cả các ngày trong tuần, 8:30 - 17:30 theo giờ Hà Nội</p>
                        </div>
                        <div class="large-5 large-offset-1 medium-6 small-12 cell">
                            <p class="contact contact--labels">Email của chúng tôi</p>
                            <p class="contact contact--labels-info"><a href=""><span class="__cf_email__">info@teencodes.vn
                    </span></a></p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="large-5 large-offset-1 medium-12 cell">
                <p class="contact contact--form-title">Gửi yêu cầu của bạn</p>
                <p class="contact contact--form-text">Hãy hoàn thành biểu mẫu bên dưới và một trong những thành viên trong
                    nhóm của chúng tôi sẽ sớm liên hệ lại với bạn!</p>
                <div class="contact-form before-fade-in fade-in">
                    <div data-react-class="contact/form"
                         data-react-props="{&quot;subject&quot;:&quot;Contact Form&quot;,&quot;recaptchaKey&quot;:&quot;6LcTOCkaAAAAAC2I3uSEvpG6bSyfLKQP04Ik2zl-&quot;}"
                         data-react-cache-id="contact/form-0">
                        <form>
                            <div class=""><input placeholder="Tên của bạn" type="text" name="name" value=""></div>
                            <div class=""><input placeholder="Email" type="email" name="email" value=""></div>
                            <div class=""><input placeholder="Số điện thoại di động" type="tel" name="phone" value=""></div>
                            <div class="label-icon-right select-label"><select name="subject">
                                    <option value="">Chủ đề của bạn</option>
                                    <option value="Advertising/Marketing">Quảng cáo / Tiếp thị</option>
                                    <option value="Business/Partnerships">Kinh doanh / Đối tác</option>
                                    <option value="Customer Service">Dịch vụ khách hàng</option>
                                    <option value="Personal Data">Dữ liệu cá nhân</option>
                                    <option value="Press">Báo chí</option>
                                    <option value="Technical Support">Hỗ trợ kỹ thuật</option>
                                    <option value="Other">Khác</option>
                                </select></div>
                            <div class=""><textarea placeholder="Nhập tin nhắn của bạn" rows="4" name="message"></textarea></div>
                            <div class="grid-x align-middle align-center agree-text">
                                <div class="medium-8 small-text-center cell">
                                    <div class=" input-tick"><label><input type="checkbox" name="agree_terms" value="false">
                                            <div class="checkbox-material">
                                                <div class="custom-checkbox"></div>
                                            </div><span class="agreeText">Tôi đồng ý với quy định Điều khoản và Pháp lý</span>
                                        </label></div>
                                </div>
                                <div class="medium-4 medium-flex-end"><button class="button button--green before-fade-in fade-in">
                                        Gửi đi<span class="button__hovered"></span></button></div>
                            </div>
                            <div id="ryepff">
                                <div class="grecaptcha-badge" data-style="bottomright"
                                     style="width: 256px; height: 60px; position: fixed; visibility: hidden; display: block; transition: right 0.3s ease 0s; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px; border-radius: 2px; overflow: hidden;">
                                    <div class="grecaptcha-logo"><iframe title="reCAPTCHA" width="256" height="60" role="presentation"
                                                                         name="a-o5vbd97owr8" frameborder="0" scrolling="no"
                                                                         sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                                                         src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LcTOCkaAAAAAC2I3uSEvpG6bSyfLKQP04Ik2zl-&amp;co=aHR0cHM6Ly93d3cuY2FyZWVyaHVudGVyLmlvOjQ0Mw..&amp;hl=vi&amp;v=joHA60MeME-PNviL59xVH9zs&amp;size=invisible&amp;cb=nvxklhu63t46"></iframe>
                                    </div>
                                    <div class="grecaptcha-error"></div><textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                                                                  class="g-recaptcha-response"
                                                                                  style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                </div><iframe style="display: none;"></iframe>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('HuongNghiep.Frontend.partials.footer.footer_1')
@endsection
