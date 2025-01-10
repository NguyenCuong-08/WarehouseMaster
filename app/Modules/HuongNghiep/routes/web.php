<?php

Route::view('/home', 'HuongNghiep.Frontend.pages.home.home_page');
Route::view('/test', 'HuongNghiep.Frontend.pages.test.test_page')->name('test');
Route::view('/introduce', 'HuongNghiep.Frontend.pages.introduce.introduce_page')->name('introduce');
Route::view('/result', 'HuongNghiep.Frontend.pages.result.result_page');
Route::view('/new', 'HuongNghiep.Frontend.news.new_page');
Route::view('/new_detail', 'HuongNghiep.Frontend.news.new_detail');

Route::view('/contact', 'HuongNghiep.Frontend.pages.contact.contact_page');
Route::view('/partners', 'HuongNghiep.Frontend.pages.partners.partners_page');
Route::view('/about', 'HuongNghiep.Frontend.pages.about.about_page');
Route::view('/faq', 'HuongNghiep.Frontend.pages.faq.faq_page');

Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    
    Route::group(['prefix' => 'introduce'], function () {

        Route::get('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\IntroduceController@update');
        Route::post('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\IntroduceController@update');
    });
    //  School
    Route::group(['prefix' => 'schools'], function () {
        Route::get('', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@getIndex');
        Route::get('publish', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@getPublish')->name('schools.publish')->middleware('permission:schools_edit');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@add')->middleware('permission:schools_add');
        Route::get('delete/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@delete')->middleware('permission:schools_delete');
        Route::post('multi-delete', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@multiDelete')->middleware('permission:schools_delete');
        Route::get('search-for-select2', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@searchForSelect2')->name('schools.search_for_select2');
        Route::get('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@update')->middleware('permission:schools_view');
        Route::post('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\SchoolController@update')->middleware('permission:schools_edit');
        Route::get('/get-customer-info/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\InfoCusController@getCustomerInfo');

    });
    //  Ngành đào tạo
    Route::group(['prefix' => 'nganh_dao_tao'], function () {
        Route::get('', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@getIndex');
        Route::get('publish', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@getPublish')->name('nganh_dao_tao.publish')->middleware('permission:nganh_dao_tao_edit');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@add')->middleware('permission:nganh_dao_tao_add');
        Route::get('delete/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@delete')->middleware('permission:nganh_dao_tao_delete');
        Route::post('multi-delete', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@multiDelete')->middleware('permission:nganh_dao_tao_delete');
        Route::get('search-for-select2', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@searchForSelect2')->name('nganh_dao_tao.search_for_select2');
        Route::get('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@update')->middleware('permission:nganh_dao_tao_view');
        Route::post('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\NganhDaoTaoController@update')->middleware('permission:nganh_dao_tao_edit');
        Route::get('/get-customer-info/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\InfoCusController@getCustomerInfo');

    });
    //  tài khoản người dùng
    Route::group(['prefix' => 'users'], function () {
        Route::get('', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@getIndex');
        Route::get('publish', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@getPublish')->name('users.publish')->middleware('permission:users_edit');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@add')->middleware('permission:users_add');
        Route::get('delete/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@delete')->middleware('permission:users_delete');
        Route::post('multi-delete', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@multiDelete')->middleware('permission:users_delete');
        Route::get('search-for-select2', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@searchForSelect2')->name('users.search_for_select2');
        Route::get('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@update')->middleware('permission:users_view');
        Route::post('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\UserController@update')->middleware('permission:users_edit');
        Route::get('/get-customer-info/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\InfoCusController@getCustomerInfo');

    });
});