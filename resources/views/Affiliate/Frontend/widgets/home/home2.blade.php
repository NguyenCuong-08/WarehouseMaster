<?php
if(!isset($widgets))
    $widgets = App\Modules\Post\Models\Widget::where('location','home_1')->where('status', 1)->first();

?>

@if(isset($widgets))


<div id="SECTION2"
     class='ladi-section'>
    <div style="background-image: url(https://tse2.mm.bing.net/th?id=OIP.ldXdTdKzde_DrzYd-xEWDQHaEq&pid=Api&P=0&h=220);" class=' ladi-section-background'></div>
    <div class="ladi-container">
        <div id="video-2" class='ladi-element' style="">
            <div class='ladi-video'>
                <div style="opacity:unset;background-image: url(https://tse4.mm.bing.net/th?id=OIP.jErFBVwrhN0aC4GclKlu5wHaEc&pid=Api&P=0&h=220);" class=" ladi-video-background"></div>
                <div id="SHAPE11" class='ladi-element'>
                    <div class='ladi-shape'><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                 preserveAspectRatio="none" viewBox="0 0 408.7 408.7" fill="rgba(0, 0, 0, 0.5)">
                            <use xlink:href="#shape_qrAYHZPMqH"></use>
                        </svg></div>
                </div>
                <iframe id="video-2_player" class="iframe-video-preload"
                        data-video-type="youtube"
                        style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen=""
                        referrerpolicy="strict-origin-when-cross-origin"
                        title="Video YouTube"
                        width="640"
                        height="360"
                        src="https://www.youtube.com/embed/qNEW-CsmyoY?rel=0&modestbranding=0&playsinline=0&controls=1&enablejsapi=1&origin=https%3A%2F%2Fnutricare.com.vn&widgetid=3&loop=1&playlist=qNEW-CsmyoY
">
                </iframe>
            </div>
        </div>
    </div>
</div>

    @endif