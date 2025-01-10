<?php

Route::view('huongnghiep/home', 'HuongNghiep.Frontend.pages.home.home_page');
Route::view('huongnghiep/test', 'HuongNghiep.Frontend.pages.test.test_page')->name('test');
Route::view('huongnghiep/introduce', 'HuongNghiep.Frontend.pages.introduce.introduce_page')->name('introduce');
Route::view('huongnghiep/result', 'HuongNghiep.Frontend.pages.result.result_page');
Route::view('huongnghiep/new', 'HuongNghiep.Frontend.news.new_page');
Route::view('huongnghiep/new_detail', 'HuongNghiep.Frontend.news.new_detail');

//Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {

Route::group(['prefix' => 'dichvu'], function () {
    Route::get('', '\App\Modules\DichVu\Controllers\Admin\DichVuController@dichvu');
//        Route::get('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\IntroduceController@update');
//        Route::post('edit/{id}', '\App\Modules\HuongNghiep\Controllers\Admin\IntroduceController@update');
});
//    Route::group(['prefix' => 'auth'], function () {
Route::get('log-in', '\App\Modules\DichVu\Controllers\Admin\AuthController@loginForm')->name('login.form');
Route::post('log-in', '\App\Modules\DichVu\Controllers\Admin\AuthController@login')->name('login.submit');

//sign-up
Route::post('validate-email', '\App\Modules\DichVu\Controllers\Admin\AuthController@validateEmail');
Route::get('sign-up', '\App\Modules\DichVu\Controllers\Admin\AuthController@registerForm')->name('signup.form');
Route::post('sign-up', '\App\Modules\DichVu\Controllers\Admin\AuthController@register')->name('signup.submit');
//profile
Route::get('setting', '\App\Modules\DichVu\Controllers\Admin\AuthController@profileForm')->middleware(\App\Http\Middleware\LoginMiddleware::class);
Route::post('setting', '\App\Modules\DichVu\Controllers\Admin\AuthController@profile')->name('setting.submit');
//change-password
Route::post('change-password', '\App\Modules\DichVu\Controllers\Admin\AuthController@changePassword')->name('change.password');
Route::post('validate-password',  '\App\Modules\DichVu\Controllers\Admin\AuthController@validatePassword');
//delete-account
Route::get('delete-account', '\App\Modules\DichVu\Controllers\Admin\AuthController@delete')->name('delete.account');
//forgot-password
Route::post('check-email', '\App\Modules\DichVu\Controllers\Admin\AuthController@checkEmail');
Route::get('/resetpassword/{token}', '\App\Modules\DichVu\Controllers\Admin\AuthController@resetPasswordform')->name('resetpassword.form');
Route::post('/resetpassword/', '\App\Modules\DichVu\Controllers\Admin\AuthController@resetPassword')->name('resetpassword.submit');


//dich-vu-nhom
Route::get('dich-vu-nhom', '\App\Modules\DichVu\Controllers\Admin\DichVuController@dichVuNhom')->name('dichvunhom');
Route::view('test-holland-2', 'Hong.DichVu.goi2');
Route::view('test-holland-3', 'Hong.DichVu.goi3');
Route::view('test-holland-4', 'Hong.DichVu.goi4');

Route::view('tinh-gia-nhom', 'Hong.DichVu.tinh_gia_nhom');