<style>
    .seo-reports.seo-reports2.cus-seo-reports .col-lg-7{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', '5_phut_thuoc_bai')->where('status', 1)->first();

?>
@if(isset($widget) && is_object($widget))

<section class="seo-reports seo-reports2 cus-seo-reports" id="gioithieu">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cnt-block">
                    <h2>{{ $widget->title }}</h2>
                    <p>{!! $widget->content !!}</p>
                    <a href="http://referral.5phutthuocbai.com/apn/6744411" class="get-started">Tải ứng dụng</a> </div>
            </div>
            <div class="col-lg-7">
                <figure class="img"><img src="{{asset('AFF/images/'.$widget->image)}}" class="img-fluid" alt=""></figure>
            </div>
        </div>
    </div>
</section>
@endif