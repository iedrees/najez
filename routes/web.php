<?php


// Projects
Route::middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Home\Home::class)->name('home');

    Route::as('projects.')->prefix('/projects/{id}')->group(function () {
        // Route::livewire('/', 'projects.show')->name('show');
        // Route::livewire('/settings', 'projects.settings')->name('settings');
        // Route::livewire('/members', 'projects.members')->name('members');
    });

    // Route::livewire('create-project', 'projects.project-create')->name('create-project');
});
 
Route::middleware('auth')->group(function () {

    // profile
    Route::get('/profile', \App\Http\Livewire\Users\Show::class)->name('profile');

    // Reports
    Route::get('/reports/index',\App\Http\Livewire\Reports\Index::class)->name('reports.index');

    // My tasks
    Route::get('/tasks/all',\App\Http\Livewire\Tasks\MyTasks::class)->name('tasks.my-tasks');
});

// Auth
Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {


    // Auth
    Route::view('email/verify', 'auth.verify')->middleware('throttle:6,1')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')->middleware('signed')->name('verification.verify');
    Route::get('logout', 'Auth\LogoutController')->name('logout');
    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');
});

Route::middleware('guest')->namespace('App\Http\Controllers')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::namespace('App\Http\Controllers')->group(function () {

    // Download Reports
    Route::get('reports/view-pdf/{start}/{end}', 'PdfController@viewPDF');
    Route::get('reports/download', 'PdfController@download')->name('reports.download');

    Route::view('password/reset', 'auth.passwords.email')->name('password.request');
    Route::get('password/reset/{token}', 'Auth\PasswordResetController')->name('password.reset');
});

