<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Controller
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
<<<<<<< HEAD
use App\Http\Controllers\Backend\SizeController;
=======
use App\Http\Controllers\Frontend\HomeController;
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491
use Illuminate\Support\Facades\Auth;

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

// Login and verify email
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

// *** FontEnd Route *** \\
<<<<<<< HEAD
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});
=======
Route::get('/',[HomeController::class, 'index']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
>>>>>>> 854f89a54d47ff421d626e6899fa5f0c82422491

Route::get('ajax-login', function () {
    return view('frontend.pages.ajax-login');
})->name('ajax-login');


// *** BackEnd Route *** \\
Route::prefix('admin')->group(function () {
    // Login Route
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.show_login_form');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    // Auth:admin
    Route::group(['middleware' => 'admin'], function () {

        // Dashboard
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::redirect('/home', '/');

        // Route Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Route Category
        Route::resource('/categories', CategoryController::class)->except(['create', 'show']);

        // Route Color
        Route::resource('/colors', ColorController::class)->except(['create', 'show']);

        // Route Size
        Route::resource('/sizes', SizeController::class)->except(['create', 'show']);

        // Route Product
        Route::resource('/products', ProductController::class);
    });
});

// *** Email Route *** \\
// The Email Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
