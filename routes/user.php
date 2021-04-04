<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'User'], function() {
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('user.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('user.password.update');

    // Confirm Password
    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('user.password.confirm');
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Verify Email
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('user.verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('user.verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('user.verification.resend');

    Route::group(['middleware' => 'auth:user', 'as' => 'user.'], function() {
        Route::get('/', 'HomeController@index')->name('user');
        Route::get('/dashboard', 'DashboardController@index')->name('home');

        Route::group(['prefix' => 'booking', 'as' => 'booking.'], function() {
            Route::get('/', 'BookingController@index')->name('index');
            Route::get('/{id}/detail', 'BookingController@detail')->name('detail');

            Route::get('/{id}/boarding-pass', 'BookingController@boarding')->name('boarding');


            Route::get('/{schedule}/checkout', 'BookingController@checkout')->name('checkout');
            Route::post('/{schedule}/pay', 'BookingController@pay')->name('pay');
        });

    });

});
