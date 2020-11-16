<?php



// Projects
Route::middleware('auth')->prefix('old')->group(function () {
    // Route::livewire('/', 'home.home')->name('home');
    Route::get('//', \App\Http\Livewire\Home\Home::class)->name('home');


    Route::as('projects.')->prefix('/projects/{id}')->group(function () {
        Route::get('/', \App\Http\Livewire\Projects\Show::class)->name('show');
        Route::get('settings', \App\Http\Livewire\Projects\Settings::class)->name('settings');
        Route::get('members', \App\Http\Livewire\Projects\Members::class)->name('members');
        // Route::livewire('/', 'projects.show')->name('show');
        // Route::livewire('/settings', 'projects.settings')->name('settings');
        // Route::livewire('/members', 'projects.members')->name('members');
    });

    Route::get('create-project', \App\Http\Livewire\Projects\ProjectCreate::class)->name('create-project');

    // Route::livewire('create-project', 'projects.project-create')->name('create-project');
});

// Download Reports
Route::prefix('old')->get('reports/view-pdf/{start}/{end}', 'App\Http\Controllers\PdfController@viewPDF');
Route::prefix('old')->get('reports/download', 'App\Http\Controllers\PdfController@download')->name('reports.download');

// Auth
Route::prefix('old')->middleware('auth')->group(function () {

    // profile
    // Route::livewire('/profile', 'users.show')->name('profile');
    Route::get('profile', \App\Http\Livewire\Users\Show::class)->name('profile');

    // Reports
    // Route::livewire('/reports/index', 'reports.index')->name('reports.index');
    Route::get('reports/index', \App\Http\Livewire\Reports\Index::class)->name('reports.index');

    // My tasks
    // Route::livewire('/tasks/all', 'tasks.my-tasks')->name('tasks.my-tasks');
    Route::get('tasks/all', \App\Http\Livewire\Tasks\MyTasks::class)->name('tasks.my-tasks');

    // Auth
    Route::view('email/verify', 'auth.verify')->middleware('throttle:6,1')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\EmailVerificationController')->middleware('signed')->name('verification.verify');
    Route::view('password/confirm', 'auth.passwords.confirm')->name('password.confirm');
});

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
    // Route::get('logout', 'App\Http\Controllers\Auth\LogoutController')->name('logout');

});

Route::view('password/reset', 'auth.passwords.email')->name('password.request');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\PasswordResetController')->name('password.reset');

// web app 
Route::namespace('\App\Actions')->middleware(['auth'])->group(function () {
    Route::get('logout', User\LogoutUser::class)->name('logout');
    Route::get('{any?}', WebApp::class)->name('app')->where('any', '.*');
});