<style>
    /* Popup overlay */
    .video-popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Lớp nền tối */
        justify-content: center;
        align-items: center;
    }

    /* Popup content (làm to hơn) */
    .video-popup-content {
        position: relative;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 90%; /* Điều chỉnh chiều rộng tối đa */
        max-height: 90%; /* Điều chỉnh chiều cao tối đa */
        width: 900px; /* Chiều rộng cố định */
        height: 500px; /* Chiều cao cố định */
        overflow: hidden;
    }

    /* Làm video iframe lớn hơn */
    .video-popup iframe {
        width: 100%;
        height: 100%;
    }

    /* Close button */
    .video-popup-close {
        position: absolute;
        top: 0px;
        right: 2px;
        font-size: 30px;
        cursor: pointer;
        color: #333;
    }

    .card-deck.blog-blocks.community .card {
        transition: all 0.3s ease; /* Thời gian và cách thức chuyển đổi */
    }

    .card-deck.blog-blocks.community .card:hover {
        cursor: pointer;
        /*border-radius: 20px;*/
        box-shadow: 0 10px 25px 5px rgba(137, 173, 255, .35);
        transform: translateY(-10px);
    }

</style>

<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'tinh_hoa_khoa_hoc')->where('status', 1)->first();
$th1= \App\Modules\Post\Models\Widget::where('location', 'tinh_hoa_1')->where('status', 1)->first();
$th2= \App\Modules\Post\Models\Widget::where('location', 'tinh_hoa_2')->where('status', 1)->first();
$th3= \App\Modules\Post\Models\Widget::where('location', 'tinh_hoa_3')->where('status', 1)->first();
?>
@if(isset($widget) && is_object($widget))
<section class="latest-stories padding-lg">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10"><span>{{$widget->title}}</span>
                {!! $widget->content !!}
                {{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
            </div>
        </div>
        <div class="card-deck blog-blocks community">
            @if(isset($th1) && is_object($th1))
            <div class="card">
                <figure><img src="{{asset('AFF/images/'.$th1->image)}}" class="img-fluid video-trigger"
                             data-video-url="{{$th1->link}}" alt="">
                </figure>
                <div class="card-body">
                    <h3><a href="#">{{$th1->title}}</a></h3>
                    {{--                    <span class="date">10 Dec 2017</span>--}}
                </div>
            </div>
            @endif

                @if(isset($th2) && is_object($th2))
                    <div class="card">
                        <figure><img src="{{asset('AFF/images/'.$th2->image)}}" class="img-fluid video-trigger"
                                     data-video-url="{{$th2->link}}" alt="">
                        </figure>
                        <div class="card-body">
                            <h3><a href="#">{{$th2->title}}</a></h3>
                            {{--                    <span class="date">10 Dec 2017</span>--}}
                        </div>
                    </div>
                @endif

                @if(isset($th3) && is_object($th3))
                    <div class="card">
                        <figure><img src="{{asset('AFF/images/'.$th3->image)}}" class="img-fluid video-trigger"
                                     data-video-url="{{$th3->link}}" alt="">
                        </figure>
                        <div class="card-body">
                            <h3><a href="#">{{$th3->title}}</a></h3>
                            {{--                    <span class="date">10 Dec 2017</span>--}}
                        </div>
                    </div>
                @endif
{{--            <div class="card">--}}
{{--                <figure><img src="{{asset('AFF/images/1_cong_dong.png')}}" class="img-fluid video-trigger"--}}
{{--                             data-video-url="https://www.youtube.com/embed/vfvGlUCaHCM?si=Bs3PcOvc0k-k7TBw"--}}
{{--                             alt=""></figure>--}}
{{--                <div class="card-body">--}}
{{--                    <h3><a href="#">Cộng đồng Phụ Huynh, Thầy Cô, Học Sinh nói về 5 Phút Thuộc Bài</a></h3>--}}
{{--                    --}}{{--                    <span class="date">21 Nov 2017</span> --}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <figure>--}}
{{--                    <img src="{{asset('AFF/images/1_chuyen_gia.png')}}" class="img-fluid video-trigger"--}}
{{--                         data-video-url="https://www.youtube.com/embed/clGY78Iv6G8?si=PvGmCECzwR70mlAD" alt="">--}}
{{--                </figure>--}}
{{--                <div class="card-body">--}}
{{--                    <h3><a href="#">Các chuyên gia trong và ngoài nước nói về 5 Phút Thuộc Bài</a></h3>--}}
{{--                    --}}{{--                    <span class="date">18 Oct 2017</span> --}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
@endif