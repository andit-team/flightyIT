<?php


Route::group(['prefix' => 'customer',  'middleware' => 'isCustomerLogin'], function(){
    Route::post('crop-image', ['as'=>'croppie.upload-image','uses'=>'CustomerController@imageCrop']);
    Route::get('profile', 'CustomerController@profile');
    Route::get('information', 'CustomerController@information');
    Route::get('profile/edit', 'CustomerController@account_edit');
    Route::post('profile/edit/{id}', 'CustomerController@account_update');
    Route::get('profile/password', 'CustomerController@password');
    Route::post('profile/password', 'CustomerController@PostPassword');
    Route::get('profile/delete', 'CustomerController@delete');
    Route::post('profile/delete', 'CustomerController@PostDelete');
});