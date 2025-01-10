<style>
    ul.features-listing li .inner {
        padding: 5%;
    }

    ul.features-listing li .inner {
        transition: all 0.3s ease; /* Thời gian chuyển tiếp là 0.3 giây và hiệu ứng là ease */
    }

    ul.features-listing li .inner:hover {
        cursor: pointer;
        border-radius: 20px;
        box-shadow: 0 10px 25px 5px rgba(137, 173, 255, .35);
        transform: translateY(-10px);
        background-color: #ffffff;
    }
    .inner .icon img{
        border-radius: 20px;
    }
</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'bo_cong_cu')->where('status', 1)->first();
    $sach = \App\Modules\Post\Models\Widget::where('location', 'sach_sieu_tri_nho')->where('status', 1)->first();
    $video_ky_thuat = \App\Modules\Post\Models\Widget::where('location', 'video_ky_thuat_nho')->where('status', 1)->first();
    $video_bai_giang = \App\Modules\Post\Models\Widget::where('location', 'video_bai_giang')->where('status', 1)->first();
    $so_do = \App\Modules\Post\Models\Widget::where('location', 'so_do_tu_duy')->where('status', 1)->first();
    $tram_khong_gian = \App\Modules\Post\Models\Widget::where('location', 'tram_khong_gian_5_sao')->where('status', 1)->first();

?>
@if(isset($widget) && is_object($widget))
<section class="client-speak our-features padding-lg">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
                {{--                <span>Our Features</span>--}}
                <h2>{!! str_replace('.', '<br>', $widget->title) !!}</h2>
                {{--                <p class="hidden-xs">Bộ công cụ được thiết kế để giúp trẻ tiếp thu kiến thức một cách nhanh chóng và ghi nhớ bền vững hơn.</p>--}}
            </div>
        </div>
        <ul class="row features-listing">
            @if(isset($sach) && is_object($sach))
                <li class="col-md-4 video-trigger"
                data-video-url="{{$sach->link}}">
                <div class="inner"><span class="icon"><img src="{{asset('AFF/images/'.$sach->image)}}"
                                                           alt=""></span>
                    <h3>{{$sach->title}}</h3>
                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            @endif

            @if(isset($video_ky_thuat) && is_object($video_ky_thuat))
                <li class="col-md-4 video-trigger"
                data-video-url="{{$video_ky_thuat->link}}">
                <div class="inner"><span class="icon"><img
                                src="{{asset('AFF/images/'.$video_ky_thuat->image)}}" alt=""></span>
                    <h3>{{$video_ky_thuat->title}}</h3>
                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            @endif

            @if(isset($video_bai_giang) && is_object($video_bai_giang))
                <li class="col-md-4 video-trigger"
                data-video-url="{{$video_bai_giang->link}}">
                <div class="inner"><span class="icon"><img src="{{asset('AFF/images/'.$video_bai_giang->image)}}"
                                                           alt=""></span>
                    <h3>{{$video_bai_giang->title}}</h3>
                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            @endif

            @if(isset($so_do) && is_object($so_do))
                <li class="col-md-4 video-trigger"
                data-video-url="{{$so_do->link}}">
                <div class="inner"><span class="icon"><img src="{{asset('AFF/images/'.$so_do->image)}}"
                                                           alt=""></span>
                    <h3>{{$so_do->title}}</h3>
                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            @endif

            @if(isset($tram_khong_gian) && is_object($tram_khong_gian))
                <li class="col-md-4 video-trigger"
                data-video-url="{{$tram_khong_gian->link}}">
                <div class="inner"><span class="icon"><img src="{{asset('AFF/images/'.$tram_khong_gian->image)}}"
                                                           alt=""></span>
                    <h3>{{$tram_khong_gian->title}}</h3>
                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            @endif
            {{--            <li class="col-md-4">--}}
            {{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091273_5ptb.png')}}" alt=""></span>--}}
            {{--                    <h3>Perfect Grafic View</h3>--}}
            {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
            {{--                </div>--}}
            {{--            </li>--}}
        </ul>
    </div>
</section>
@endif