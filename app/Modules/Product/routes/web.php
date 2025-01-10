<?php


Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {

    Route::group(['prefix' => 'categories'], function () {
        Route::get('', '\App\Modules\Product\Controllers\Admin\CategoryController@getIndex')->middleware('permission:super_admin')->name('index_category');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\CategoryController@add');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\CategoryController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\CategoryController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\CategoryController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\CategoryController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\CategoryController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\Product\Controllers\Admin\CategoryController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\CategoryController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\CategoryController@getDiscountInfo')->name('cart.getDiscountInfo');

    });
    Route::match(array('GET', 'POST'), 'categorie/import-excel', '\App\Modules\Product\Controllers\Admin\CategoryController@importExcel');

    Route::group(['prefix' => 'product'], function () {
        Route::get('', '\App\Modules\Product\Controllers\Admin\ProductController@getIndex')->name('index-product')->middleware('permission:super_admin');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\ProductController@add')->name('create-product');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\ProductController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\ProductController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\ProductController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\ProductController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\ProductController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\Product\Controllers\Admin\ProductController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\ProductController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\ProductController@getDiscountInfo')->name('cart.getDiscountInfo');
        Route::match(array('GET', 'POST'), 'import-excel', '\App\Modules\Product\Controllers\Admin\ProductController@importExcel');

    });
    Route::group(['prefix' => 'result'], function () {
        Route::match(['GET', 'POST'], '', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@checkProductPost')
            ->middleware('permission:super_admin')
            ->name('result');
//        Route::post('', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@checkProductPost')->middleware('permission:super_admin')->name('result');
//        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\ResultSearchProduct@add')->name('create-product');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@update')->middleware('permission:super_admin');
        Route::get('show', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@showResultPage')->name('result.show');
//        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\ProductController@register')->name('goi_dich_vu.register');
//        Route::get('view', '\App\Modules\Product\Controllers\Admin\ProductController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
////        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
//        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\ProductController@muaGoi');
//        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\ProductController@getDiscountInfo')->name('cart.getDiscountInfo');

    });
//    Route::group(['prefix' => 'result'], function () {
//        Route::match(['GET', 'POST'], '', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@checkProductPost')
//            ->middleware('permission:super_admin')
//            ->name('result');
//
//        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@delete')
//            ->middleware('permission:super_admin');
//
//        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@multiDelete')
//            ->middleware('permission:super_admin');
//
//        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@update')
//            ->middleware('permission:super_admin');
//
//        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@update')
//            ->middleware('permission:super_admin');
//    });

    Route::group(['prefix' => 'day_hang'], function () {
        Route::get('', '\App\Modules\Product\Controllers\Admin\DayHangController@getIndex')->middleware('permission:super_admin');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\DayHangController@add');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\DayHangController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\DayHangController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\DayHangController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\DayHangController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\DayHangController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\Product\Controllers\Admin\DayHangController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
        Route::match(array('GET', 'POST'), 'import-excel', '\App\Modules\Product\Controllers\Admin\DayHangController@importExcel');

//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\DayHangController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\DayHangController@getDiscountInfo')->name('cart.getDiscountInfo');

    });
    Route::group(['prefix' => 'ke-hang'], function () {
        Route::get('', '\App\Modules\Product\Controllers\Admin\KeHangController@getIndex')->middleware('permission:super_admin');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\KeHangController@add');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\KeHangController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\KeHangController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\KeHangController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\KeHangController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\KeHangController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\Product\Controllers\Admin\KeHangController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\KeHangController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\KeHangController@getDiscountInfo')->name('cart.getDiscountInfo');

    });
    Route::group(['prefix' => 'tang-ke'], function () {
        Route::get('', '\App\Modules\Product\Controllers\Admin\TangKeController@getIndex')->middleware('permission:super_admin');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\TangKeController@add');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\TangKeController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\TangKeController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\TangKeController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\TangKeController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\TangKeController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\Product\Controllers\Admin\TangKeController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\TangKeController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\TangKeController@getDiscountInfo')->name('cart.getDiscountInfo');

    });
    Route::group(['prefix' => 'o_hang'], function (){
        Route::get('', '\App\Modules\Product\Controllers\Admin\OHangController@getIndex')->middleware('permission:super_admin');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Product\Controllers\Admin\OHangController@add');
        Route::get('delete/{id}', '\App\Modules\Product\Controllers\Admin\OHangController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\Product\Controllers\Admin\OHangController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\Product\Controllers\Admin\OHangController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\Product\Controllers\Admin\OHangController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\Product\Controllers\Admin\OHangController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\Product\Controllers\Admin\OHangController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');

        Route::match(array('GET', 'POST'), 'import-excel', '\App\Modules\Product\Controllers\Admin\OHangController@importExcel');

//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\Product\Controllers\Admin\OHangController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\Product\Controllers\Admin\OHangController@getDiscountInfo')->name('cart.getDiscountInfo');

    });

    Route::get('thu_hoi/{admin_buy_id}/{new_bill_id}', '\App\Modules\Product\Controllers\Admin\CategoryController@ThuHoi');
    Route::get('/get-provinces', '\App\Modules\Product\Controllers\Admin\CategoryController@getProvinces');
    Route::get('/get-districts/{provinceId}', '\App\Modules\Product\Controllers\Admin\CategoryController@getDistricts');
    Route::get('/get-wards/{districtId}', '\App\Modules\Product\Controllers\Admin\CategoryController@getWards');
    Route::get('so-tien', function (){
        return view('GoiDichVu.admin.nhap_so_tien');
    })->name('so.tien');
    Route::get('nhap-ma', '\App\Modules\Product\Controllers\Admin\ProductController@nhapMa')->name('scan') ;
    Route::post('nhap-ma-post', '\App\Modules\Product\Controllers\Admin\ProductController@nhapMaPost')->name('nhap-ma') ;
    Route::get('nhap-hang', '\App\Modules\Product\Controllers\Admin\ProductController@nhapHang')->name('nhap-hang') ;
    Route::get('luan-chuyen', '\App\Modules\Product\Controllers\Admin\ProductController@luanChuyen')->name('luan-chuyen') ;
    Route::post('luan-chuyen', '\App\Modules\Product\Controllers\Admin\ProductController@luanChuyenPost')->name('luan-chuyen.post') ;
    Route::post('luan-chuyen-next', '\App\Modules\Product\Controllers\Admin\ProductController@luanChuyenNextPost')->name('luan-chuyen-next') ;
    Route::get('get-o-hang/{id}', '\App\Modules\Product\Controllers\Admin\ProductController@getOHang')->name('get-o-hang') ;

    Route::post('nhap-hang', '\App\Modules\Product\Controllers\Admin\ProductController@nhapHangPost')->name('nhap-hang.post');
    Route::post('sua-hang', '\App\Modules\Product\Controllers\Admin\ResultSearchProductController@suaHangPost')->name('sua-hang.post') ;
    Route::get('check-product', '\App\Modules\Product\Controllers\Admin\ProductController@checkProduct')->name('check-product') ;
    Route::post('edit-product', '\App\Modules\Product\Controllers\Admin\ProductController@checkProductPost')->name('edit-product') ;

    Route::get('xuat_hang', '\App\Modules\Product\Controllers\Admin\SlipController@xuathang')->name('xuat_hang') ;
    Route::post('nhaptt', '\App\Modules\Product\Controllers\Admin\SlipController@nhaptt')->name('nhaptt') ;
    Route::get('lich_su_xuat', '\App\Modules\Product\Controllers\Admin\SlipController@getIndex')->name('lichsuxuatkho')->middleware('permission:super_admin');
    Route::get('lich_su_luan_chuyen', '\App\Modules\Product\Controllers\Admin\LichSuLuanChuyenController@getIndex')->name('lichsuxuat')->middleware('permission:super_admin');
    Route::get('lich_su_nhap_kho', '\App\Modules\Product\Controllers\Admin\LichSuNhapKhoController@getIndex')->name('lichsuxuat')->middleware('permission:super_admin');
    Route::post('xuatdon', '\App\Modules\Product\Controllers\Admin\SlipController@xuatdon')->name('xuatdon') ;
    Route::get('slip/info/{id}', '\App\Modules\Product\Controllers\Admin\XuatHangController@getIndex')->name('lichsuxuathang')->middleware('permission:super_admin');
// báo cáo tồn kho---------------------------------------------------------------------------------------------------------------------------------------
    Route::get('ton_kho', '\App\Modules\Product\Controllers\Admin\TonKhoController@getIndex')->name('tonkho')->middleware('permission:super_admin');

    Route::view('luan-chuyen-2', 'KhoHang.luan-chuyen-next');




});
Route::get('/get-shelves/{aisle_id}', '\App\Modules\Product\Controllers\Admin\ProductController@getShelves');
Route::get('/get-levels/{shelf_id}', '\App\Modules\Product\Controllers\Admin\ProductController@getLevels');
Route::get('/get-slots/{level_id}', '\App\Modules\Product\Controllers\Admin\ProductController@getSlots');

//Route::get('goi_dich_vu_view', '\App\Modules\GoiDichVu\Controllers\Frontend\GoiDichVuController@getViewGoiDV');
Route::view('goi_dich_vu_view', 'GoiDichVu.frontend.partials.danh_sach_goi');
