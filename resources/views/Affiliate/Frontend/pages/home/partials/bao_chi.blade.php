<style>
    .latest-stories.padding-lg.pt-0 {
        padding-top: 60px !important;
        background-color: #ffffff;
    }

    @media (min-width: 1200px) {
        .cus-card-desk.card-deck.blog-blocks {
            width: 70%;
        }

        .card-deck.blog-blocks.cus-card-blog {
            display: flex;
            justify-content: center;
        }
    }

</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'bao_chi')->where('status', 1)->first();
    $bc1= \App\Modules\Post\Models\Widget::where('location', 'bao_chi_1')->where('status', 1)->first();
    $bc2= \App\Modules\Post\Models\Widget::where('location', 'bao_chi_2')->where('status', 1)->first();
?>
@if(isset($widget) && is_object($widget))
<section class="latest-stories padding-lg pt-0">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
                {{--                <span>TINH HOA CỦA KHÓA HỌC</span>--}}
                <h2>{{$widget->title}}</h2>
                {{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
            </div>
        </div>
        <div class="card-deck blog-blocks cus-card-blog">
            <div class="cus-card-desk card-deck blog-blocks">
                @if(isset($bc1) && is_object($bc1))
                <div class="card">
                    <figure><img src="{{asset('AFF/images/'.$bc1->image)}}" class="img-fluid video-trigger"
                                 data-video-url="{{$bc1->link}}"
                                 alt=""></figure>
                    <div class="card-body">
                        <h3><a href="#">{{$bc1->title}}</a></h3>
                        {{--                    <span class="date">10 Dec 2017</span>--}}
                    </div>
                </div>
                @endif

                    @if(isset($bc2) && is_object($bc2))
                        <div class="card">
                            <figure><img src="{{asset('AFF/images/'.$bc2->image)}}" class="img-fluid video-trigger"
                                         data-video-url="{{$bc2->link}}"
                                         alt=""></figure>
                            <div class="card-body">
                                <h3><a href="#">{{$bc2->title}}</a></h3>
                                {{--                    <span class="date">10 Dec 2017</span>--}}
                            </div>
                        </div>
                    @endif
{{--                <div class="card">--}}
{{--                    <figure><img src="{{asset('AFF/images/1_trao_giai.png')}}" class="img-fluid video-trigger"--}}
{{--                                 data-video-url="https://www.youtube.com/embed/j-CLgsIbGQg?si=D-U6HWadxpTVv0Uo"--}}
{{--                                 alt=""></figure>--}}
{{--                    <div class="card-body">--}}
{{--                        <h3><a href="#">Đài truyền hình đưa tin Kỷ Lục Gia Siêu Trí Nhớ TG Nguyễn Phùng Phong nhận huân chương giáo dục</a>--}}
{{--                        </h3>--}}
{{--                        --}}{{--                    <span class="date">21 Nov 2017</span> --}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            {{--            <div class="card">--}}
            {{--                <figure><img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/watch?v=7BgdLV5k9Rk&embeds_referring_euri=https%3A%2F%2F5phutthuocbai.com%2F&source_ve_path=MjM4NTE" alt=""></figure>--}}
            {{--                <div class="card-body">--}}
            {{--                    <h3><a href="#">Cộng đồng Phụ Huynh, Thầy Cô, Học Sinh nói về 5 Phút Thuộc Bài</a></h3>--}}
            {{--                    --}}{{--                    <span class="date">21 Nov 2017</span> --}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
    </div>
</section>
@endif