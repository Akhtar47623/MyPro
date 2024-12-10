<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Web\HomeController;

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

Route::middleware('auth')->group(function () {
    Route::resource('admin/blogs', BlogController::class);
    Route::resource('admin/categories', CategoryController::class);
});



Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
