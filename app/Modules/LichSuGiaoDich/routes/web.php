<?php

Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::get('lich-su-giao-dich', '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@getIndex');
    Route::get('ds-lich-su-giao-dich', '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@getLsgd');

    Route::get('chuyen-tien', '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@chuyentienForm');
    Route::post('chuyen-tien-search', '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@chuyentienSearch')->name('chuyentien.search');
    Route::get('chuyen-tien/{user_id2}', '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@chuyentien2Form')->name('chuyentien.item');
    Route::post('chuyen-tien/{user_id2}', '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@chuyentien2')->name('chuyentien.item.submit');

    Route::group(['prefix' => 'list-user'], function () {
        Route::get('', '\App\Modules\LichSuGiaoDich\Controllers\Admin\DSThanhVienController@getIndex')->name('hoadon');

    });

    Route::get('update-vitien-stutus',  '\App\Modules\LichSuGiaoDich\Controllers\Admin\LichSuGiaoDichController@updateViTienStutus');
});