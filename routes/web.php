<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('admin_login');
Route::Post('/admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin_login');
Route::Post('/admin-logout', [\App\Http\Controllers\Auth\LoginController::class, 'adminlogout'])->name('admin_logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/resend', [\App\Http\Controllers\User\UserController::class, 'resendCode'])->name('resend_code');
Route::get('/register-completion', [\App\Http\Controllers\Auth\RegisterController::class, 'registerCompletion'])->name('register_completion');
Route::post('/forget/password', [\App\Http\Controllers\User\UserController::class, 'forgetPassword'])->name('forget_password');


Route::get('blogs', [App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::get('{slug}', [App\Http\Controllers\HomeController::class, 'blogSingle'])->name('blog');


Route::name('user.')->prefix('user')->middleware('auth')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\User\UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [\App\Http\Controllers\User\UserController::class, 'profile'])->name('profile');

    Route::get('invest/index', [\App\Http\Controllers\User\InvestController::class, 'index'])->name('invest.index');
    Route::get('invest/create', [\App\Http\Controllers\User\InvestController::class, 'create'])->name('invest.create');
    Route::post('invest/store', [\App\Http\Controllers\User\InvestController::class, 'store'])->name('invest.store');
    Route::get('invest/{invest}', [\App\Http\Controllers\User\InvestController::class, 'show'])->name('invest.show');
    Route::post('invest/update/{invest}/', [\App\Http\Controllers\User\InvestController::class, 'update'])->name('invest.update');
});


Route::name('super-admin.')->prefix('super-admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [\App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('users');
    Route::get('user/{user}', [\App\Http\Controllers\Admin\AdminUserController::class, 'edit'])->name('user');
    Route::patch('user/{user}', [\App\Http\Controllers\Admin\AdminUserController::class, 'update'])->name('userUpdate');
    Route::delete('user/{user}/delete', [\App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])->name('userDestroy');

    Route::resource('blogs', \App\Http\Controllers\Admin\AdminBlogController::class);
});
