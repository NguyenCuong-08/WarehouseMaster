<?php


Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::group(['prefix' => 'goi_dich_vu'], function () {
        Route::get('', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@getIndex')->middleware('permission:super_admin');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@add');
        Route::get('delete/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@muaGoi');
        Route::post('/cart/get-discount-info', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@getDiscountInfo')->name('cart.getDiscountInfo');

    });
    Route::get('thu_hoi/{admin_buy_id}/{new_bill_id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@ThuHoi');
    Route::get('/get-provinces', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@getProvinces');
    Route::get('/get-districts/{provinceId}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@getDistricts');
    Route::get('/get-wards/{districtId}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@getWards');
    Route::get('so-tien', function (){
        return view('GoiDichVu.admin.nhap_so_tien');
    })->name('so.tien');
});


//Route::get('goi_dich_vu_view', '\App\Modules\GoiDichVu\Controllers\Frontend\GoiDichVuController@getViewGoiDV');
Route::view('goi_dich_vu_view', 'GoiDichVu.frontend.partials.danh_sach_goi');
