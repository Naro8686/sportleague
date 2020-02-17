<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('privacy', 'Admin\PrivacyPolicyController@privacy_page')->name('privacy.page');
Route::get('races', 'Front\PagesController@races')->name('races');
Route::get('faq', 'Front\PagesController@faq')->name('faq');
Route::get('contact', 'Front\PagesController@contact')->name('contact');

Auth::routes();
Route::get('register', 'Auth\RegisterController@registerPage')->name('register');
// Payment routes
Route::get('payment', 'Front\PaymentController@payment')->name('payment');
Route::get('cancel', 'Front\PaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'Front\PaymentController@success')->name('payment.success');
Route::get('pay', 'Front\PaymentController@pay')->name('pay')->middleware('auth');
Route::post('payment-success', 'Front\PaymentController@success')->name('payment.success');
Route::get('step-two', 'Front\PaymentController@stepTwo')->name('step-two')->middleware(['auth', 'paid']);
Route::post('select-races', 'Front\PaymentController@selectRaces')->name('select-races')->middleware('auth');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth', 'profile'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('league', 'Admin\LeagueController');
    Route::resource('clubs', 'Admin\ClubsController');
    Route::resource('texts', 'Admin\TextsController');
    Route::resource('race-categories', 'Admin\RaceCategoryController');
    Route::resource('privacy-policy', 'Admin\PrivacyPolicyController');

    /* Reports */
    Route::get('reports', 'Admin\ReportsController@index')->name('reports');
    Route::get('registration-pdf', 'Admin\ReportsController@registrationPDF')->name('registration-pdf');

    /* Races */
    Route::resource('races', 'Admin\RacesController');
    Route::post('/present', 'Admin\RacesController@present');
    Route::get('marshals-pdf/{id}', 'Admin\RacesController@pdf')->name('marshals-pdf');
    Route::get('races-pdf', 'Admin\RacesController@races_pdf')->name('races-pdf');

    // Payment routes
    Route::get('payments', 'Front\PaymentController@payments')->name('payments');
    Route::post('paid', 'Front\PaymentController@paid')->name('paid');
});