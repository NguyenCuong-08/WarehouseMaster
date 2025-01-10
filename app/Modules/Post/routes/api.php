<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    // login register
    Route::group(['prefix' => 'admin'], function () {
        Route::post('login', 'Admin\AdminController@login');
        Route::post('register', 'Admin\AdminController@register');
        Route::post('forgot-password', 'Admin\AdminController@forgotPassword');
        Route::post('forgot-password', 'Admin\AdminController@forgotPasswordCode');
        Route::post('restore-password', 'Admin\AdminController@restorePassword');
        Route::post('restore-password-by-code', 'Admin\AdminController@restorePasswordByCode');

        //  Login social
        Route::post('/login/{param}', 'Admin\AdminController@loginSocial');
    });
    //post
    Route::group(['prefix' => 'post'], function () {
        Route::get('', '\App\Modules\Post\Controllers\Api\PostController@getPost');
        Route::get('detail/{id}', '\App\Modules\Post\Controllers\Api\PostController@getPostDetail');
    });
});

