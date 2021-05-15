<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function(){

    //routes of clients
    Route::get('/clients', 'ClientApiController@fetchAll');

    //routes of offers
    Route::get('/offers', 'OfferApiController@fetchAll');

    //routes of vouchers
    Route::post('/vouchers', 'VoucherApiController@createVouchersForAllClients');
    Route::get('/vouchers/{email}', 'VoucherApiController@getValidVouchersByEmail');
    Route::put('/vouchers/validateAnUseVoucher', 'VoucherApiController@validateUserVoucher');
});
