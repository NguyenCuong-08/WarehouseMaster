<?php
//Route::view('/home-test','Affiliate.Frontend.pages.home.home')->name('home.test');
Route::view('/home','Affiliate.Frontend.pages.home.home')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => 'no_auth:admin'], function () {
    Route::get('login', '\App\Modules\Affiliate\Controllers\Admin\AdminController@login')->name('admin.login');
    Route::post('authenticate', '\App\Modules\Affiliate\Controllers\Admin\AdminController@authenticate');
    Route::match(['GET', 'POST'], 'register', '\App\Modules\Affiliate\Controllers\Admin\AdminController@register')->name('admin.register');
    Route::get('block-admin', '\App\Modules\Affiliate\Controllers\Admin\AdminController@blockAdmin')->name('admin.block');
    Route::match(['GET', 'POST'], 'quen-mat-khau', '\App\Modules\Affiliate\Controllers\Admin\AdminController@forgetPassword');
    

});
Route::get('districts/{provinceId}', '\App\Modules\Affiliate\Controllers\Admin\AdminController@getDistricts');
Route::get('wards/{districtId}', '\App\Modules\Affiliate\Controllers\Admin\AdminController@getWards');


Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::group(['prefix' => 'hoadon'], function () {
        Route::get('{id}', '\App\Modules\Affiliate\Controllers\Admin\BillController@getIndex')->name('hoadon')->middleware('permission:hoa_don_mua_hang_view');
//        Route::get('2', '\App\Modules\Affiliate\Controllers\Admin\BillController@getIndex2')->name('hoadon2');
//        Route::get('3', '\App\Modules\Affiliate\Controllers\Admin\BillController@getIndex3')->name('hoadon3');
        Route::get('{sdt}/{date}', '\App\Modules\Affiliate\Controllers\Admin\MyBillController@myBill');
//        Route::get('list_child', '\App\Modules\Affiliate\Controllers\Admin\BillController@myBill')->name('hoadonchild');
        Route::get('publish', '\App\Modules\Affiliate\Controllers\Admin\BillController@getPublish')->name('hoadon.publish')->middleware('permission:hoadon_edit');
        Route::get('delete/{id}', '\App\Modules\Affiliate\Controllers\Admin\BillController@delete')->middleware('permission:hoadon_delete');
        Route::post('multi-delete', '\App\Modules\Affiliate\Controllers\Admin\BillController@multiDelete')->middleware('permission:hoadon_delete');
        Route::get('search-for-select2', '\App\Modules\Affiliate\Controllers\Admin\BillController@searchForSelect2')->name('hoadon.search_for_select2');
        Route::get('edit/{id}', '\App\Modules\Affiliate\Controllers\Admin\BillController@formupdate')->middleware('permission:hoadon_view');
        Route::post('edit/{id}', '\App\Modules\Affiliate\Controllers\Admin\BillController@update')->name('updatehoadon')->middleware('permission:hoadon_edit');
        //duyệt đơn
        Route::post('duyet-don/{id}', '\App\Modules\Affiliate\Controllers\Admin\BillController@duyetDon')->name('duyethoadon')->middleware('permission:hoadon_edit');
        Route::post('duyet-trang-thai/{id}', '\App\Modules\Affiliate\Controllers\Admin\BillController@duyetTrangThai')->name('duyetTrangThai')->middleware('permission:hoadon_edit');
    });
    Route::group(['prefix' => 'list-nguoi-gioi-thieu'], function () {
        Route::get('', '\App\Modules\Affiliate\Controllers\Admin\ThanhVienGioiThieuController@getIndex')->name('thanh-vien-gioi-thieu');

    });
    Route::get('cay-thanh-vien', function () {
        return view('Affiliate/admin/cay');
    });

    Route::get('cayngang/{id}','\App\Modules\Affiliate\Controllers\Admin\BillController@cayNgang');
    Route::get('cay-ngang', function () {
        return view('Affiliate/admin/cayngang2');
    });
    Route::get('cay-ngang-3', function () {
        return view('Affiliate/admin/cayngang3');
    });
    Route::get('cay-ngang-4', function () {
        return view('Affiliate/admin/cayngang4');
    });
    Route::get('change-pin','\App\Modules\Affiliate\Controllers\Admin\BillController@changePinView')->name('change.pin');
    Route::post('change-pin','\App\Modules\Affiliate\Controllers\Admin\BillController@changePin')->name('change.pin.post');
});
Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::group(['prefix' => 'thong-tin-thu-nhap'], function () {
        Route::get('', '\App\Modules\Affiliate\Controllers\Admin\BillController@thongTinThuNhap')->name('hoadon');
    });
});

