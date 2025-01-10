<style>
    .latest-stories.instruct {
        background: #ffffff;

    }

    .card-deck.instruct-item.pb-60 {
        padding-bottom: 30px;
    }

    .instruct .card-body {
        padding: 13px 13px 16px;
    }

    .card-deck-instruct-container {
        padding-left: 15px;
    }

    .instruct-item .card {
        background: none;
        box-shadow: none;
    }

    .instruct-item .card img {
        border-radius: 20px;
    }

    .instruct-item .card h3 {
        font-size: 16px;
        text-align: center;
    }


    .instruct-item .card figure {
        position: relative;
    }

    .instruct-item p.play-btn {
        font-size: 40px;
        position: absolute;
        top: 50%;
        margin: 0 auto;
        left: 50%; /* Center horizontally */
        transform: translate(-50%, -50%);
        color: #fff;
        z-index: 1;
    }


    @media (min-width: 1200px) {
        .card-deck-instruct-container {
            width: 67%;
            justify-content: center;
        }
    }
</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'huong_dan')->where('status', 1)->first();
    $hd1= \App\Modules\Post\Models\Widget::where('location', 'huong_dan_1')->where('status', 1)->first();
    $hd2= \App\Modules\Post\Models\Widget::where('location', 'huong_dan_2')->where('status', 1)->first();
    $hd3= \App\Modules\Post\Models\Widget::where('location', 'huong_dan_3')->where('status', 1)->first();
    $hd4= \App\Modules\Post\Models\Widget::where('location', 'huong_dan_4')->where('status', 1)->first();
    $hd5= \App\Modules\Post\Models\Widget::where('location', 'huong_dan_5')->where('status', 1)->first();
?>
@if(isset($widget) && is_object($widget))
<section class="latest-stories padding-lg instruct">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
                {{--                <span>TINH HOA CỦA KHÓA HỌC</span>--}}
                <h2>Hướng dẫn</h2>
                {{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
            </div>
        </div>
        <div class="card-deck blog-blocks pb-60 instruct-item">
            @if(isset($hd1) && is_object($hd1))
            <div class="card">
                <figure>
                    <img src="{{asset('AFF/images/'.$hd1->image)}}" class="img-fluid video-trigger"
                         data-video-url="{{$hd1->link}}" alt="">
                    <p class="play-btn video"><span class="icon-play-btn"></span></p>
                </figure>

                <div class="card-body">
                    <h3><a href="#">{{$hd1->title}}</a></h3>
                    {{--                    <span class="date">10 Dec 2017</span>--}}
                </div>
            </div>
            @endif

                @if(isset($hd2) && is_object($hd2))
                    <div class="card">
                        <figure>
                            <img src="{{asset('AFF/images/'.$hd2->image)}}" class="img-fluid video-trigger"
                                 data-video-url="{{$hd2->link}}" alt="">
                            <p class="play-btn video"><span class="icon-play-btn"></span></p>
                        </figure>

                        <div class="card-body">
                            <h3><a href="#">{{$hd2->title}}</a></h3>
                            {{--                    <span class="date">10 Dec 2017</span>--}}
                        </div>
                    </div>
                @endif

                @if(isset($hd3) && is_object($hd3))
                    <div class="card">
                        <figure>
                            <img src="{{asset('AFF/images/'.$hd3->image)}}" class="img-fluid video-trigger"
                                 data-video-url="{{$hd3->link}}" alt="">
                            <p class="play-btn video"><span class="icon-play-btn"></span></p>
                        </figure>

                        <div class="card-body">
                            <h3><a href="#">{{$hd3->title}}</a></h3>
                            {{--                    <span class="date">10 Dec 2017</span>--}}
                        </div>
                    </div>
                @endif

        </div>
        <div class="card-deck blog-blocks">
            <div class="card-deck blog-blocks card-deck-instruct-container instruct-item">
                @if(isset($hd4) && is_object($hd4))
                    <div class="card">
                        <figure>
                            <img src="{{asset('AFF/images/'.$hd4->image)}}" class="img-fluid video-trigger"
                                 data-video-url="{{$hd4->link}}" alt="">
                            <p class="play-btn video"><span class="icon-play-btn"></span></p>
                        </figure>

                        <div class="card-body">
                            <h3><a href="#">{{$hd4->title}}</a></h3>
                            {{--                    <span class="date">10 Dec 2017</span>--}}
                        </div>
                    </div>
                @endif

                    @if(isset($hd5) && is_object($hd5))
                        <div class="card">
                            <figure>
                                <img src="{{asset('AFF/images/'.$hd5->image)}}" class="img-fluid video-trigger"
                                     data-video-url="{{$hd5->link}}" alt="">
                                <p class="play-btn video"><span class="icon-play-btn"></span></p>
                            </figure>

                            <div class="card-body">
                                <h3><a href="#">{{$hd5->title}}</a></h3>
                                {{--                    <span class="date">10 Dec 2017</span>--}}
                            </div>
                        </div>
                    @endif
            </div>

        </div>
    </div>
</section>
@endif