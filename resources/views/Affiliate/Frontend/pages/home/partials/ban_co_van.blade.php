<style>
    ul.marketing-list2>li {
        background: #fff;
        border-radius: 20px;
        margin: 0 15px;
        padding: 16px;
        margin-bottom: 32px;
        box-shadow: 0 4px 40px -2px rgba(61, 61, 61, .1);

    }
    ul.marketing-list2 li .icon {
        display: flex;
        justify-content: center;
    }

    ul.marketing-list2 li img {
        width: 243px;
        height: auto;
        border: 2px solid #eff0f7;
        border-radius: 20px;
    }

    .advisory-group-introduce {
        padding: 16px;
        border: 1px solid #4a50ff;
        border-radius: 20px;
        height: calc(100% - 320px);
    }

    .advisory-group-introduce p::before {
        content: "•"; /* Chèn dấu chấm */
        margin-right: 8px; /* Khoảng cách giữa dấu chấm và nội dung */
        color: black; /* Màu sắc của dấu chấm, có thể thay đổi */
        font-size: 18px; /* Kích thước dấu chấm */
        display: inline-block;
    }

    ul.marketing-list2 li h3 {
        min-height: 54px;
        font-size: 16px;
        font-weight: 700;
        line-height: 140%;
    }

    ul.marketing-list2 .advisory-group-introduce li {
        list-style: disc;
    }
    ul.marketing-list2 .advisory-group-introduce ul{
        padding-left: 10px;
    }
</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van')->where('status', 1)->first();
    $bcv1 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_1')->where('status', 1)->first();
    $bcv2 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_2')->where('status', 1)->first();
    $bcv3 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_3')->where('status', 1)->first();
    $bcv4 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_4')->where('status', 1)->first();
    $bcv5 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_5')->where('status', 1)->first();
    $bcv6 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_6')->where('status', 1)->first();
    $bcv7 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_7')->where('status', 1)->first();
    $bcv8 = \App\Modules\Post\Models\Widget::where('location', 'ban_co_van_8')->where('status', 1)->first();
?>
@if(isset($widget) && is_object($widget))

<section class="content-marketing content-marketing3 padding-lg" id="doi-ngu-giao-vien">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="head-block">
                    <h2>{{$widget->title}}</h2>
                    {{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galleywhen an unknown printer took</p>--}}
                </div>
            </div>
        </div>
        <ul class="row marketing-list2">
            @if(isset($bcv1) && is_object($bcv1))
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/'.$bcv1->image)}}" alt=""></figure>
                <h3>{{$bcv1->title}}</h3>
                <div class="advisory-group-introduce">
                    {!! $bcv1->content !!}
                </div>
            </li>
            @endif

            @if(isset($bcv2) && is_object($bcv2))
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/'.$bcv2->image)}}" alt=""></figure>
                <h3>{{$bcv2->title}}</h3>
                <div class="advisory-group-introduce">
                    {!! $bcv2->content !!}
                </div>
            </li>
            @endif
            @if(isset($bcv3) && is_object($bcv3))
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/'.$bcv3->image)}}" alt=""></figure>
                <h3>{{$bcv3->title}}</h3>
                <div class="advisory-group-introduce">
                   {!! $bcv3->content !!}
                </div>
            </li>
                @endif
            @if(isset($bcv4) && is_object($bcv4))
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/'.$bcv4->image)}}" alt=""></figure>
                <h3>{{$bcv4->title}}</h3>
                <div class="advisory-group-introduce">
                    {!! $bcv4->content !!}
                </div>
            </li>
            @endif
        </ul>
        <ul class="row marketing-list2">
            @if(isset($bcv5) && is_object($bcv5))
                <li class="col-md">
                    <figure class="icon"><img src="{{asset('AFF/images/'.$bcv5->image)}}" alt=""></figure>
                    <h3>{{$bcv5->title}}</h3>
                    <div class="advisory-group-introduce">
                        {!! $bcv5->content !!}
                    </div>
                </li>
            @endif
                @if(isset($bcv6) && is_object($bcv6))
                    <li class="col-md">
                        <figure class="icon"><img src="{{asset('AFF/images/'.$bcv6->image)}}" alt=""></figure>
                        <h3>{{$bcv6->title}}</h3>
                        <div class="advisory-group-introduce">
                            {!! $bcv6->content !!}
                        </div>
                    </li>
                @endif
                @if(isset($bcv7) && is_object($bcv7))
                    <li class="col-md">
                        <figure class="icon"><img src="{{asset('AFF/images/'.$bcv7->image)}}" alt=""></figure>
                        <h3>{{$bcv7->title}}</h3>
                        <div class="advisory-group-introduce">
                            {!! $bcv7->content !!}
                        </div>
                    </li>
                @endif
                @if(isset($bcv8) && is_object($bcv8))
                    <li class="col-md">
                        <figure class="icon"><img src="{{asset('AFF/images/'.$bcv8->image)}}" alt=""></figure>
                        <h3>{{$bcv8->title}}</h3>
                        <div class="advisory-group-introduce">
                            {!! $bcv8->content !!}
                        </div>
                    </li>
                @endif
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/MarekKasperski.jpg')}}" alt=""></figure>--}}
{{--                <h3>Giáo Sư. Marek Kasperski</h3>--}}
{{--                <div class="advisory-group-introduce">--}}
{{--                    <p><span>Chủ Tịch Hiệp Hội Trọng Tài Thể Thao Trí Tuệ Toàn Cầu</span></p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/BiswaroopRoyChowdhury.jpg')}}" alt=""></figure>--}}
{{--                <h3>Biswaroop Roy Chowdhury</h3>--}}
{{--                <div class="advisory-group-introduce">--}}
{{--                    <p><span>Tổng Giám Đốc Kỷ Lục Châu Á</span></p>--}}

{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/John Graham.jpg')}}" alt=""></figure>--}}
{{--                <h3>John Graham</h3>--}}
{{--                <div class="advisory-group-introduce">--}}
{{--                    <p><span>Vô Địch Siêu Trí Nhớ Mỹ</span></p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/Lester He.jpg')}}" alt=""></figure>--}}
{{--                <h3>Lester He</h3>--}}
{{--                <div class="advisory-group-introduce">--}}
{{--                    <p><span>Trưởng Ban Trọng Tài Thế Giới</span></p>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
</section>
@endif