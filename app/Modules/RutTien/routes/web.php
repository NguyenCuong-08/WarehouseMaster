<?php


Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::group(['prefix' => 'cast_out'], function () {
        Route::get('', '\App\Modules\RutTien\Controllers\Admin\CastOutController@getIndex')->name('castout');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\RutTien\Controllers\Admin\CastOutController@add')->name('castout.add');
        Route::match(array('GET', 'POST'), 'duyet', '\App\Modules\RutTien\Controllers\Admin\CastOutController@duyet')->name('castout.duyet');
        Route::match(array('GET', 'POST'), 'huy', '\App\Modules\RutTien\Controllers\Admin\CastOutController@huy')->name('castout.huy');
        Route::match(array('GET', 'POST'), 'duyettc', '\App\Modules\RutTien\Controllers\Admin\CastOutController@duyettc')->name('castout.duyettc');

        Route::get('delete/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@multiDelete')->middleware('permission:super_admin');
//        Route::get('search-for-select2', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@searchForSelect2')->name('classroom.search_for_select2')->middleware('permission:super_admin');
        Route::get('edit/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@update')->middleware('permission:super_admin');
        Route::post('edit/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@update')->middleware('permission:super_admin');
        Route::get('register/{goi_dich_vu_id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@register')->name('goi_dich_vu.register');
        Route::get('view', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@goiDichVuView')->name('goi_dich_vu.goiDichVuView');
//        Route::get('publish', '\App\Modules\ThuePhongZoom\Controllers\Admin\TaiKhoanZoomController@getPublish')->name('classroom.publish')->middleware('permission:super_admin');
        Route::post('mua_goi/{id}', '\App\Modules\GoiDichVu\Controllers\Admin\GoiDichVuController@muaGoi');

    });
    Route::group(['prefix' => 'cast_out_history'], function () {
        Route::match(array('GET', 'POST'),'', '\App\Modules\RutTien\Controllers\Admin\CastOutController@history')->name('castout_history');
        Route::get('delete/{id}', '\App\Modules\RutTien\Controllers\Admin\CastOutController@delete');
    });
});


//Route::get('goi_dich_vu_view', '\App\Modules\GoiDichVu\Controllers\Frontend\GoiDichVuController@getViewGoiDV');
Route::view('goi_dich_vu_view', 'GoiDichVu.frontend.partials.danh_sach_goi');