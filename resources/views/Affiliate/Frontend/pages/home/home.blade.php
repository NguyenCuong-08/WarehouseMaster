@extends('Affiliate.Frontend.layouts.home.layout_home')
@section('content')
    <!-- ==============================================
**Banner Image**
=================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.banner')

    <!-- ==============================================
    **Học nhẹ nhàng dễ nhớ**
=================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.hoc_nhe_de_nho')

    <!-- ==============================================
    **Bộ công cụ học tập**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.bo_cong_cu')

    <!-- ==============================================
    **Người đồng hành thiên nga trắng**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.nguoi_dong_hanh_TNT')

    <!-- ==============================================
    **Ban cố vấn**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.ban_co_van')
    <!-- ==============================================
    **Cộng đồng nói về 5 phút thuộc bài**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.cong_dong')

    <!-- ==============================================
    **BÁO CHÍ NÓI VỀ 5 PHÚT THUỘC BÀI**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.bao_chi')
    <!-- ==============================================
    **Bài viết**
    =================================================== -->
{{--    @include('Affiliate.Frontend.pages.home.partials.bai_viet')--}}
    <!-- ==============================================
    **Hướng dẫn**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.huong_dan')
    <!-- ==============================================
    **Đăng ký**
    =================================================== -->
    @include('Affiliate.Frontend.pages.home.partials.dang_ky_home')
@endsection