<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    @include('Affiliate.Frontend.layouts.head_home')
    @include('Affiliate.Frontend.layouts.css_home')
    @include('Affiliate.Frontend.layouts.js_home')

</head>
<body class="lazyload"><svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 0px; height: 0px; position: absolute; overflow: hidden; display: none;">
    <symbol id="shape_qrAYHZPMqH" viewBox="0 0 408.7 408.7">
        <polygon fill="#fff" points="163.5 296.3 286.1 204.3 163.5 112.4 163.5 296.3"></polygon>
        <path
                d="M204.3,0C91.5,0,0,91.5,0,204.3S91.5,408.7,204.3,408.7s204.3-91.5,204.3-204.3S316.7,0,204.3,0ZM163.5,296.3V112.4l122.6,91.9Z"
                transform="translate(0 0)"></path>
    </symbol>
    <symbol id="shape_BDgXcqjYju" viewBox="0 0 1792 1896.0833">
        <path
                d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z">
        </path>
    </symbol>
    <symbol id="shape_LProCXKXeh" viewBox="0 0 1152 1896.0833">
        <path
                d="M1075 736q0 13-10 23l-466 466q-10 10-23 10t-23-10L87 759q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z">
        </path>
    </symbol>
    <symbol id="shape_JJagXIbTjM" viewBox="0 0 1664 1896.0833">
        <path
                d="M45 1651q-19 19-32 13t-13-32V160q0-26 13-32t32 13l710 710q8 8 13 19V160q0-26 13-32t32 13l710 710q19 19 19 45t-19 45l-710 710q-19 19-32 13t-13-32V922q-5 10-13 19z">
        </path>
    </symbol>
    <symbol id="shape_dqmIEJddJZ" viewBox="0 0 1664 1896.0833">
        <path
                d="M1619 141q19-19 32-13t13 32v1472q0 26-13 32t-32-13L909 941q-8-9-13-19v710q0 26-13 32t-32-13L141 941q-19-19-19-45t19-45l710-710q19-19 32-13t13 32v710q5-11 13-19z">
        </path>
    </symbol>
    <symbol id="shape_VCCGiAXfNk" viewBox="0 0 1536 1896.0833">
        <path
                d="M1536 896q0 209-103 385.5T1153.5 1561 768 1664t-385.5-103T103 1281.5 0 896t103-385.5T382.5 231 768 128t385.5 103T1433 510.5 1536 896z">
        </path>
    </symbol>
</svg><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3XRRH5" height="0" width="0"
                        style="display:none;visibility:hidden"></iframe></noscript>
<div class="ladi-wraper">

    @yield('content')

</div>
<div id="backdrop-popup" class="backdrop-popup"></div>
<div id="backdrop-dropbox" class="backdrop-dropbox"></div>
<div id="lightbox-screen" class="lightbox-screen"></div>
<script id="script_lazyload"
        type="text/javascript">window.lazyload_run = function (dom, is_first, check_dom_rect) { if (check_dom_rect && (document.body.clientWidth <= 0 || document.body.clientheight <= 0)) { return setTimeout(function () { window.lazyload_run(dom, is_first, check_dom_rect); }, 1); } var style_lazyload = document.getElementById('style_lazyload'); var list_element_lazyload = dom.querySelectorAll('body.lazyload .ladi-overlay, body.lazyload .ladi-box, body.lazyload .ladi-button-background, body.lazyload .ladi-collection-item, body.lazyload .ladi-countdown-background, body.lazyload .ladi-form-item-background, body.lazyload .ladi-form-label-container .ladi-form-label-item.image, body.lazyload .ladi-frame-background, body.lazyload .ladi-gallery-view-item, body.lazyload .ladi-gallery-control-item, body.lazyload .ladi-headline, body.lazyload .ladi-image-background, body.lazyload .ladi-image-compare, body.lazyload .ladi-list-paragraph ul li, body.lazyload .ladi-section-background, body.lazyload .ladi-survey-option-background, body.lazyload .ladi-survey-option-image, body.lazyload .ladi-tabs-background, body.lazyload .ladi-video-background, body.lazyload .ladi-banner, body.lazyload .ladi-spin-lucky-screen, body.lazyload .ladi-spin-lucky-start'); var docEventScroll = window; for (var i = 0; i < list_element_lazyload.length; i++) { var rect = list_element_lazyload[i].getBoundingClientRect(); if (rect.x == "undefined" || rect.x == undefined || rect.y == "undefined" || rect.y == undefined) { rect.x = rect.left; rect.y = rect.top; } var offset_top = rect.y + window.scrollY; if (offset_top >= window.scrollY + window.innerHeight || window.scrollY >= offset_top + list_element_lazyload[i].offsetHeight) { list_element_lazyload[i].classList.add('ladi-lazyload'); } } if (typeof style_lazyload != "undefined" && style_lazyload != undefined) { style_lazyload.parentElement.removeChild(style_lazyload); } document.body.classList.remove("lazyload"); var currentScrollY = window.scrollY; var stopLazyload = function (event) { if (event.type == "scroll" && window.scrollY == currentScrollY) { currentScrollY = -1; return; } docEventScroll.removeEventListener('scroll', stopLazyload); list_element_lazyload = document.getElementsByClassName('ladi-lazyload'); while (list_element_lazyload.length > 0) { list_element_lazyload[0].classList.remove('ladi-lazyload'); } }; if (is_first) { var scrollEventPassive = null; try { var opts = Object.defineProperty({}, 'passive', { get: function () { scrollEventPassive = { passive: true }; } }); window.addEventListener('testPassive', null, opts); window.removeEventListener('testPassive', null, opts); } catch (e) { } docEventScroll.addEventListener('scroll', stopLazyload, scrollEventPassive); } return dom; }; window.lazyload_run(document, true, true);</script>


</body>


</html>
