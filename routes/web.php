<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('privacy', 'Admin\PrivacyPolicyController@privacy_page')->name('privacy.page');

Auth::routes();
Route::get('register', 'Auth\RegisterController@registerPage')->name('register');
// Payment routes
Route::get('payment', 'PaymentController@payment')->name('payment');
Route::get('cancel', 'PaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PaymentController@success')->name('payment.success');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('league', 'Admin\LeagueController');
    Route::resource('clubs', 'Admin\ClubsController');
    Route::resource('races', 'Admin\RacesController');
    Route::resource('texts', 'Admin\TextsController');
    Route::resource('race-categories', 'Admin\RaceCategoryController');
    Route::get('my-races', 'Admin\RacesController@myRaces')->name('my-races');
    Route::post('select-races', 'Admin\UsersController@selectRaces')->name('select-races');
    Route::resource('privacy-policy', 'Admin\PrivacyPolicyController');
    Route::get('reports', 'Admin\ReportsController@index')->name('reports');
    Route::get('registration-pdf', 'Admin\ReportsController@registrationPDF')->name('registration-pdf');
});