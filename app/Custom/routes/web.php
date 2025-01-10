<?php

Route::get('/', function () {
    /*$bills = \Modules\WebBill\Models\Bill::all();
    foreach ($bills as $bill) {
        $bill->registration_date = $bill->created_at;
        $bill->save();
    }
    die('ok');*/
    return redirect('/admin');
});


Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {
    Route::group(['prefix' => 'landingpage'], function () {
        Route::get('', '\App\Custom\Controllers\Admin\LandingpageController@getIndex')->name('landingpage')->middleware('permission:landingpage_view');
        Route::get('publish', '\App\Custom\Controllers\Admin\LandingpageController@getPublish')->name('landingpage.publish')->middleware('permission:landingpage_publish');
        Route::match(array('GET', 'POST'), 'add', '\App\Custom\Controllers\Admin\LandingpageController@add')->middleware('permission:landingpage_add');
        Route::get('delete/{id}', '\App\Custom\Controllers\Admin\LandingpageController@delete')->middleware('permission:landingpage_delete');
        Route::post('multi-delete', '\App\Custom\Controllers\Admin\LandingpageController@multiDelete')->middleware('permission:landingpage_delete');
        Route::get('search-for-select2', '\App\Custom\Controllers\Admin\LandingpageController@searchForSelect2')->name('landingpage.search_for_select2')->middleware('permission:landingpage_view');
        Route::get('{id}/duplicate', '\App\Custom\Controllers\Admin\LandingpageController@duplicate')->middleware('permission:landingpage_add');

        Route::get('{id}/ban-giao', '\App\Custom\Controllers\Admin\LandingpageController@banGiao');

        Route::get('update-to-bill', '\App\Custom\Controllers\Admin\LandingpageController@updateToBill')->middleware('permission:bill_add');

        Route::get('get-gg-form-fields', '\App\Custom\Controllers\Admin\LandingpageController@getGGFormFields');

        Route::get('update-link-ldp', function () {
            $landingpages = \Modules\LandingPage\Models\Landingpage::where('ladi_link', 'like', '%ladi.demopage.me%')->get();
            foreach ($landingpages as $ldp) {
                $ldp->ladi_link = str_replace('http://ladi.demopage.me/', 'http://preview.pagedemo.me/', $ldp->ladi_link);
//                dd($ldp->ladi_link);
                $ldp->save();
            }
            die('xong!');
        });

        Route::get('edit/{id}', '\App\Custom\Controllers\Admin\LandingpageController@update')->middleware('permission:landingpage_view');
        Route::post('edit/{id}', '\App\Custom\Controllers\Admin\LandingpageController@update')->middleware('permission:landingpage_edit');
    });

    //  Admin
    Route::group(['prefix' => 'admin'], function () {
        Route::get('ajax-get-info', '\App\CRMDV\Controllers\Admin\AdminController@ajaxGetInfo');
    });

    //  quản lý công ty
    Route::group(['prefix' => 'company'], function () {
        Route::get('', '\App\Custom\Controllers\Admin\CompanyController@getIndex')->name('Company')->middleware('permission:lead_view');
        Route::match(array('GET', 'POST'), 'add', '\App\Custom\Controllers\Admin\CompanyController@add')->middleware('permission:lead_view');
        Route::get('edit/{id}', '\App\Custom\Controllers\Admin\CompanyController@update')->middleware('permission:lead_view');
        Route::post('edit/{id}', '\App\Custom\Controllers\Admin\CompanyController@update')->middleware('permission:lead_view');
        Route::get('delete/{id}', '\App\Custom\Controllers\Admin\AdminController@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Custom\Controllers\Admin\AdminController@multiDelete')->middleware('permission:super_admin');
    });

    //  ngành nghề
    Route::group(['prefix' => 'company_category'], function () {
        Route::get('', '\App\Custom\Controllers\Admin\CompanyCategoryController@getIndex')->name('CompanyCategory')->middleware('permission:lead_view');
        Route::match(array('GET', 'POST'), 'add', '\App\Custom\Controllers\Admin\CompanyCategoryController@add')->middleware('permission:lead_view');
        Route::get('edit/{id}', '\App\Custom\Controllers\Admin\CompanyCategoryController@update')->middleware('permission:lead_view');
        Route::post('edit/{id}', '\App\Custom\Controllers\Admin\CompanyCategoryController@update')->middleware('permission:lead_view');
        Route::get('delete/{id}', '\App\Custom\Controllers\Admin\AdminControllerCategory@delete')->middleware('permission:super_admin');
        Route::post('multi-delete', '\App\Custom\Controllers\Admin\AdminControllerCategory@multiDelete')->middleware('permission:super_admin');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'landingpage'], function () {
        Route::get('down-load-file/{bill_id}/{ldp_id}', '\App\Custom\Controllers\Admin\LandingpageController@downLoadFile');
    });
});
