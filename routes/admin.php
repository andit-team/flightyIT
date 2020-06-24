<?php
/****
 
 ***************** Admin Module Start ******************
 
 ****/
 
Route::get('system-admin/login', 'HomeController@login');
Route::post('system-admin/login', 'HomeController@process_login')->name('process_login');
// Route::get('system-admin/register', 'HomeController@register');
// Route::post('system-admin/process_register', 'HomeController@process_register')->name('process_register');
Route::get('system-admin/logout', 'HomeController@logout');
// Route::get('password_reset', 'HomeController@password_reset');
// Route::post('password_reset', 'HomeController@process_password_reset');
// Route::get('confirm_password_reset/{id}/{code}', 'HomeController@confirm_password_reset');
// Route::post('confirm_password_reset/{id}/{code}', 'HomeController@process_confirm_password_reset');





 //Only Authorized User Allowed
 
 Route::group(['prefix' => 'system-admin'], function () {

    // Route::group(['prefix' => 'cms'], function () {
    //     Route::resource('menu','CmsMenuController');
    // });
    // Route::resource('cms','CmsController'); 
    Route::resource('payroll','PayrollController'); 

    // Agent
    Route::resource('agent', 'AgentController'); 
    // Agency
    Route::resource('agency','AgencyController'); 
    // Tickets
    Route::resource('ticket','TicketsController'); 

     Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
     Route::get('myprofile', 'UserController@myProfile');
     Route::post('myprofile', 'UserController@updateMyProfile')->name('myprofileupdate');
 
 
     Route::group(['prefix' => 'users'], function () {
         //Manage Users
         Route::get('/', 'UserController@index');
         Route::get('create', 'UserController@userCreate');
         Route::post('store', 'UserController@userStore');
         Route::get('/{id}/edit', 'UserController@userEdit');
         Route::post('/{id}/update', 'UserController@userUpdate');
         Route::post('/{id}/delete', 'UserController@userDelete');
 
         //manage permissions
         Route::get('permissions', 'PermissionController@index');
         Route::get('permission/create', 'PermissionController@create');
         Route::get('permission/parent_show', 'PermissionController@parent_show');
         Route::post('permission/store', 'PermissionController@store')->name('permission.store');
         Route::get('permission/{id}/edit', 'PermissionController@edit');
         Route::post('permission/{id}/update', 'PermissionController@update');
         // Route::get('permission/{id}/delete', 'PermissionController@deletePermission');
 
         //manage roles
         Route::get('roles', 'UserController@indexRole')->name('roles');
         Route::get('role/create', 'UserController@createRole')->name('createRole');
         Route::post('role/store', 'UserController@storeRole')->name('storeRole');
         Route::get('role/{id}/edit', 'UserController@editRole');
         Route::post('role/{id}/update', 'UserController@updateRole')->name('updateRole');
         Route::post('role/{id}/delete', 'UserController@deleteRole');
 
         //User activites logs
         Route::get('activities', 'ActivityController@index');
         Route::get('activities/{id}/delete', 'ActivityController@delete');
         // user notification
         Route::get('notification', 'NotificationController@index');
         Route::get('notification/{id}/delete', 'NotificationController@delete');
     });
 
 
     Route::get('mailbox', 'EmailTemplateController@mailbox');
     Route::get('mailbox/detail/{id}', 'EmailTemplateController@mailbox_detail');
     Route::post('mailbox_delete/', 'EmailTemplateController@mailbox_delete')->name('maildelete');
     Route::resource('emailtemplate', 'EmailTemplateController');
 
     Route::group(['prefix' => 'settings'], function () {
         Route::get('system-setting/general', 'SiteSettingController@general');
         Route::post('system-setting/general', 'SiteSettingController@generalUpdate');
         Route::get('system-setting/site', 'SiteSettingController@site');
         Route::post('system-setting/site', 'SiteSettingController@siteUpdate');
     });
 
     Route::get('notification/{id}/update', 'AjaxController@updateNotification');
     Route::get('users/role/{id}/show', 'AjaxController@showParmission');
     Route::get('purchase/product/{slug}', 'AjaxController@purchaseProduct');
     Route::get('sale/customer/{id}', 'AjaxController@getCustomerInfo');
     Route::get('purchase/manufacturersProduct/{id}', 'AjaxController@manufacturersProduct');
     Route::get('products/change-status/{id}/{status}', 'AjaxController@changeProductStatus');
     //UI
     Route::get('togglesidebar', 'AjaxController@uiToggleSidebar');
     Route::get('theme-switcher/{theme}', 'AjaxController@uiColorSwitcher');
 });