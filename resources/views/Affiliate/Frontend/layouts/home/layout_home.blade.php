<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('Affiliate.Frontend.partials.header.header_meta')
    <link rel="icon" href="{{asset('AFF/images/logo_5phut.jpg')}}" type="image/x-icon">
    <title>5 Phút Thuộc Bài</title>
    @include('Affiliate.Frontend.partials.header.header_script')
</head>
<body>

<!-- ==============================================
**Preloader**
=================================================== -->
<div id="loader">
    <div id="element">
        <div class="circ-one"></div>
        <div class="circ-two"></div>
    </div>
</div>

<!-- ==============================================
**Header**
=================================================== -->
@include('Affiliate.Frontend.partials.header.header_home')
@yield('content')
<!-- ==============================================
**Footer*
=================================================== -->
@include('Affiliate.Frontend.partials.footer.footer_home')

<!-- Popup Modal for Video -->
<div id="video-popup" class="video-popup">
    <div class="video-popup-content">
        <span class="video-popup-close">&times;</span>
        <iframe id="popup-video" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<script>
    document.querySelectorAll('.video-trigger, .play-btn').forEach(item => {
        item.addEventListener('click', function() {
            // Find the closest figure element to get the video URL
            var figure = this.closest('figure');

            // Get the video URL from the image's data-video-url attribute
            var videoUrl = figure.querySelector('.video-trigger').getAttribute("data-video-url");

            // Add autoplay and mute parameters to the URL
            videoUrl += "&autoplay=1&mute=1";
            console.log(videoUrl);

            // Set the URL in the iframe and display the popup
            document.getElementById("popup-video").src = videoUrl;
            document.getElementById("video-popup").style.display = "flex"; // Show the popup
        });
    });

    // Close popup when clicking the close button
    document.querySelector('.video-popup-close').addEventListener('click', function() {
        var popup = document.getElementById("video-popup");
        popup.style.display = "none";
        document.getElementById("popup-video").src = "";  // Clear the URL to stop the video
    });

    // Close popup when clicking outside the video area
    window.addEventListener('click', function(event) {
        var popup = document.getElementById("video-popup");
        if (event.target === popup) {
            popup.style.display = "none";
            document.getElementById("popup-video").src = "";  // Clear the URL to stop the video
        }
    });

</script>

<script>
    // Khi nhấn vào ảnh sẽ bật popup và tự động chạy video
    document.querySelectorAll('.video-trigger').forEach(item => {
        item.addEventListener('click', function() {
            // Lấy URL video từ thuộc tính data-video-url
            var videoUrl = this.getAttribute("data-video-url");

            // Thêm tham số autoplay=1 vào URL để video tự chạy
            videoUrl += "&autoplay=1&mute=1";
            console.log(videoUrl);
            document.getElementById("popup-video").src = videoUrl;  // Gán URL vào iframe
            document.getElementById("video-popup").style.display = "flex";  // Hiển thị popup
        });
    });

    // Đóng popup khi nhấn vào nút đóng
    document.querySelector('.video-popup-close').addEventListener('click', function() {
        var popup = document.getElementById("video-popup");
        popup.style.display = "none";
        document.getElementById("popup-video").src = "";  // Xóa URL để dừng video khi đóng
    });

    // Đóng popup khi nhấn ngoài popup
    window.addEventListener('click', function(event) {
        var popup = document.getElementById("video-popup");
        if (event.target === popup) {
            popup.style.display = "none";
            document.getElementById("popup-video").src = "";  // Xóa URL để dừng video khi đóng
        }
    });



</script>

<!-- Scroll to top -->
<a href="#" class="scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
@include('Affiliate.Frontend.partials.footer.footer_script')
</body>

<!-- Mirrored from protechtheme.com/saas/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 08:29:55 GMT -->
</html>