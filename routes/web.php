<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('blank/', function () {
    CMS::test();
});


Route::get('locale/{locale}', function ($locale) {
    Session::put('locale',$locale);
    DB::table('site_settings')->update(['language'=>$locale]);
    Core::activities("Changes", "Language", "Change language to ".$locale);
    return redirect()->back();
});

Route::get('404', function () {
    return view('frontend.404');
})->name('404');


// Forntend Authorization pages , can access all user;



include('admin.php');


Route::get('/', 'HomeController@login');
// Route::get('/', 'HomeController@index');

// Route::get('registration', 'CustomerController@registration');
// Route::post('registration', 'CustomerController@PostRegistration')->name('PostRegistration');
// Route::get('login', 'CustomerController@login');
// Route::post('login', 'CustomerController@PostLogin')->name('PostLogin');
// Route::get('logout', 'CustomerController@logout');

// include('customer.php');

// Route::get('/{page?}/{cat?}', 'HomeController@index');