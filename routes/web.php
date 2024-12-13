<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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


// About Pages

Route::get('/', [HomeController::class, 'index'])->name('webIndexPage');
Route::get('/about', function () {
    return view('front/about'); // View for the About page
})->name('webAboutPage');

Route::get('/pricing', function () {
    return view('front/pricing'); // View for the Pricing page
})->name('webPricingPage');

// Services Page
Route::get('/services', function () {
    return view('front/services'); // View for the Services page
})->name('webServicesPage');

// Blog Pages
Route::get('/blog-grid', function () {
    return view('front/blog-grid'); // View for the Blog Grid page
})->name('webBlogGridPage');

Route::get('/blog-sidebar', function () {
    return view('front/blog-sidebar'); // View for the Blog Sidebar page
})->name('webBlogSidebarPage');

Route::get('/blog-single', function () {
    return view('front/blog-single'); // View for the Blog Single page
})->name('webBlogSinglePage');

// Contact Page
Route::get('/contact', function () {
    return view('front/contact'); // View for the Contact page
})->name('webContactPage');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/admin/blogs');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin/blogs', BlogController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::any('admin/config/edit', [ConfigController::class, 'edit'])->name('config.edit');
    Route::any('admin/config/update', [ConfigController::class, 'update'])->name('config.update');

});
Route::middleware('auth', 'admin')->group(function () {
    // User Management
    Route::resource('admin/users', UserController::class);

    // Role Management
    Route::resource('admin/roles', RoleController::class);

    // Permission Management
    Route::resource('admin/permissions', PermissionController::class);
});



Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
