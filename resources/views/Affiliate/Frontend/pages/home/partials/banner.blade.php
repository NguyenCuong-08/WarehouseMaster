<style>
    .banner.banner2 .cnt-row2 {
        padding-top: 196px;
    }
</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'home_1')->where('status', 1)->first();
    $banner_mobile = \App\Modules\Post\Models\Widget::where('location', 'banner_mobile')->where('status', 1)->first();
    $video_gt = \App\Modules\Post\Models\Widget::where('location', 'banner_video_gioi_thieu')->where('status', 1)->first();
?>
@if(isset($banner_mobile) && is_object($banner_mobile))
    <style>
        @media (max-width: 480px) {
            .banner {
                background: url({{asset('AFF/images/'.$banner_mobile->image)}}) no-repeat center top / cover!important;
            }
        }
    </style>
@endif
@if(isset($widget) && is_object($widget))
    <style>
        .banner.banner2 {
            background: url({{asset('AFF/images/'.$widget->image)}}) no-repeat center top / cover;

        }
    </style>
<div class="banner banner2">
    <div class="container">
        <div class="row cnt-block">
            <div class="col-md-6">
                <div class="left">
{{--                    <h1>The Perfect SaaS and WebApp Template.</h1>--}}
{{--                    <p>Developed for SaaS and Web Applications!</p>--}}
                    <div class="row cnt-row2">
                        <div class="col-md-6 col-lg-5 hidden-xs">
                            @if(isset($video_gt) && is_object($video_gt))
                            <div class="video-block"> <a class="play-btn video" href="{{$video_gt->link}}"><span class="icon-play-btn"></span></a> <figure><img src="{{asset('AFF/images/'.$video_gt->image)}}" class="img-fluid" alt=""></figure> </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-lg-6">
{{--                            <div class="right-sec">--}}
{{--                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing</p>--}}
{{--                                <a href="#" class="get-started">Purchase Now</a> </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            {{--            <div class="col-md-6">--}}
            {{--                <figure><img src="{{asset('AFF/images/banner-img2.png')}}" class="img-fluid" alt=""></figure>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>

@endif