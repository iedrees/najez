<?php

 
// Projects 
Route::middleware('auth')->group(function () {
    Route::livewire('/', 'home.home')->name('home');
  
    Route::middleware('auth')->as('projects.')->prefix('/projects/{id}')->group(function () {
        Route::livewire('/', 'projects.show')->name('show');
        Route::livewire('/settings', 'projects.settings')->name('settings');
    });
 
});
  

// Auth 
Route::middleware('auth')->group(function () {
    Route::view('email/verify', 'auth.verify')->middleware('throttle:6,1')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')->middleware('signed')->name('verification.verify');
    Route::get('logout', 'Auth\LogoutController')->name('logout');
    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');
});

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::view('password/reset', 'auth.passwords.email')->name('password.request');
Route::get('password/reset/{token}', 'Auth\PasswordResetController')->name('password.reset');
