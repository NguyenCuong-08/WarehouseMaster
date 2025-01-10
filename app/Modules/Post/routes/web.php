<?php

Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions', 'locale']], function () {
    Route::group(['prefix' => 'widget'], function () {

        Route::get('', '\App\Modules\Post\Controllers\Admin\WidgetController@getIndex')->name('widget');
//        Route::get('', 'Admin\WidgetController@getIndex')->name('widget')->middleware('permission:theme');
        Route::get('publish', '\App\Modules\Post\Controllers\Admin\WidgetController@getPublish')->name('widget.publish');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Post\Controllers\Admin\WidgetController@add');
        Route::get('{id}/duplicate', '\App\Modules\Post\Controllers\Admin\WidgetController@duplicate');
        Route::get('delete/{id}', '\App\Modules\Post\Controllers\Admin\WidgetController@delete');
        Route::post('multi-delete', '\App\Modules\Post\Controllers\Admin\WidgetController@multiDelete');
        Route::get('search-for-select2', '\App\Modules\Post\Controllers\Admin\WidgetController@searchForSelect2')->name('widget.search_for_select2');
        Route::get('edit/{id}', '\App\Modules\Post\Controllers\Admin\WidgetController@update');
        Route::post('edit/{id}', '\App\Modules\Post\Controllers\Admin\WidgetController@update');

    });
//    Route::get('widget-test', function (\Illuminate\Http\Request $r) {
//        return view(@$r->view);
//    });
//
////    Route::group(['prefix' => 'post'], function () {
////        Route::get('', '\App\Modules\Post\Controllers\Admin\PostController@getIndex')->name('post')->middleware('permission:post_view');
////        Route::get('publish', '\App\Modules\Post\Controllers\Admin\PostController@getPublish')->name('post.publish')->middleware('permission:post_edit');
////        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Post\Controllers\Admin\PostController@add')->middleware('permission:post_add');
////        Route::get('delete/{id}', '\App\Modules\Post\Controllers\Admin\PostController@delete')->middleware('permission:post_delete');
////        Route::post('multi-delete', '\App\Modules\Post\Controllers\Admin\PostController@multiDelete')->middleware('permission:post_delete');
////        Route::get('search-for-select2', '\App\Modules\Post\Controllers\Admin\PostController@searchForSelect2')->name('post.search_for_select2');
////        Route::get('edit/{id}', '\App\Modules\Post\Controllers\Admin\PostController@update')->middleware('permission:post_view');
////        Route::post('edit/{id}', '\App\Modules\Post\Controllers\Admin\PostController@update')->middleware('permission:post_edit');
////    });
////    Route::group(['prefix' => 'hoadon'], function () {
////        Route::get('add', '\App\CRMDV\Controllers\Admin\HoaDonController@hoadon')->name('formaddhoadon')->middleware('permission:hoadon_view');
////        Route::post('add', '\App\CRMDV\Controllers\Admin\HoaDonController@add')->name('addhoadon')->middleware('permission:hoadon_add');
////
////        Route::get('', '\App\Modules\Post\Controllers\Admin\BillController@getIndex')->name('hoadon')->middleware('permission:hoadon_view');
////        Route::get('publish', '\App\Modules\Post\Controllers\Admin\BillController@getPublish')->name('hoadon.publish')->middleware('permission:hoadon_edit');
////        Route::get('delete/{id}', '\App\Modules\Post\Controllers\Admin\BillController@delete')->middleware('permission:hoadon_delete');
////        Route::post('multi-delete', '\App\Modules\Post\Controllers\Admin\BillController@multiDelete')->middleware('permission:hoadon_delete');
////        Route::get('search-for-select2', '\App\Modules\Post\Controllers\Admin\BillController@searchForSelect2')->name('hoadon.search_for_select2');
////        Route::get('edit/{id}', '\App\Modules\Post\Controllers\Admin\BillController@formupdate')->middleware('permission:hoadon_view');
////        Route::post('edit/{id}', '\App\Modules\Post\Controllers\Admin\BillController@update')->name('updatehoadon')->middleware('permission:hoadon_edit');
////    });
});