<?php


Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::group(['prefix' => 'goi_dich_vu_lan_quet'], function () {
        Route::get('', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@getIndex');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@add');
        Route::get('delete/{id}', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@register')->name('goi_dich_vu_lan_quet.register');
        Route::get('view', '\App\Modules\GoiDichVuLanQuet\Controllers\Admin\GoiDichVuLanQuetController@goiDichVuView')->name('goi_dich_vu_lan_quet.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
    });
});


//Route::get('goi_dich_vu_view', '\App\Modules\GoiDichVuLanQuet\Controllers\Frontend\GoiDichVuLanQuetController@getViewGoiDV');
Route::view('goi_dich_vu__lan_quet_view', 'GoiDichVuLanQuet.frontend.partials.danh_sach_goi');
