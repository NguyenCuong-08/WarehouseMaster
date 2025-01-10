<?php

//  Route của cổng thanh toán payos
Route::group(['prefix' => 'payos'], function () {
    // Tạo link nạp tiền
    Route::post('create-payment-link', '\App\Modules\Payment\Controllers\Admin\CheckoutController@createPaymentLink')->name('create.payment');

    //  khách ấn huỷ nạp tiền
    Route::get('cancel', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@cancelPayment');

    //  khách thanh toán thành công
    Route::get('succes', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@succesPayment')->name('payment.success');
});



Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin', 'get_permissions']], function () {

    //  Lịch sử giao dịch
    Route::group(['prefix' => 'payment_history'], function () {
        Route::get('', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@getIndex')->name('check_error_link_logs');
        Route::match(array('GET', 'POST'), 'add', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@add');


//        Route::get('publish', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@getPublish')->name('check_error_link_logs.publish');
//        Route::get('delete/{id}', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@delete')->middleware('permission:lich_su_giao_dich');
//        Route::get('delete/{id}', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@delete')->middleware('permission:lich_su_giao_dich');
//        Route::post('multi-delete', '\App\Modules\Payment\Controllers\Admin\PaymentHistoryController@multiDelete')->middleware('permission:lich_su_giao_dich');

    });

});
