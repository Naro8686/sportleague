<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('privacy', 'Admin\PrivacyPolicyController@privacy_page')->name('privacy.page');

Auth::routes();
Route::get('register', 'Auth\RegisterController@registerPage')->name('register');
// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Payment routes
Route::get('payment', 'PaymentController@payment')->name('payment');
Route::get('cancel', 'PaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaymentController@success')->name('payment.success');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');

    Route::resource('clients', 'Admin\FraudulentClientsController');
    Route::delete('clients_mass_destroy', 'Admin\FraudulentClientsController@massDestroy')->name('clients.mass_destroy');

    Route::resource('league', 'Admin\LeagueController');
    Route::resource('clubs', 'Admin\ClubsController');
    Route::resource('races', 'Admin\RacesController');
    Route::resource('privacy-policy', 'Admin\PrivacyPolicyController');
});