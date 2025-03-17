<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserPageController::class, 'home'])->name('page.home');
Route::get('/home', [UserPageController::class, 'home']);
Route::get('/menu', [UserPageController::class, 'menu'])->name('menu');
Route::post('/menu', [OrganizationController::class, 'addMenu'])->name('store-menu');
Route::get('/destinations', [UserPageController::class, 'allDestinations'])->name('page.all-destinations');
Route::get('/destinations/{slug}', [UserPageController::class, 'destination'])->name('page.destination');
Route::get('/contact-us', [UserPageController::class, 'contactUs'])->name('page.contactUs');
Route::get('/company-info/{slug}', [UserPageController::class, 'pageCompany'])->name('page.company-info');
Route::get('/travel-info/{slug}', [UserPageController::class, 'pageTravel'])->name('page.travel-info');
Route::get('/faqs', [UserPageController::class, 'faqs'])->name('page.faqs');
Route::get('/blogs', [UserPageController::class, 'blogs'])->name('page.blogs');
Route::get('/blogs/{blog}', [UserPageController::class, 'blogDetails'])->name('page.blog-details');
Route::get('/packages', [UserPageController::class, 'packages'])->name('page.all-packages');

//route for package slug
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('package/{package}/review', [ReviewController::class, 'customerReview'])->name('page.customer.review');

Route::post('/contact', [UserPageController::class, 'contactAdd'])->name('page.contact.store');

Route::post('authenticate', [AuthController::class, 'authentication'])->name('admin.auth');

Route::post('upload', [MediaController::class, 'upload'])->name('ckeditor.upload');
Route::get('images/download/{filename}', function ($filename) {
    $path = storage_path('app/public/media/' . $filename);

    if (file_exists($path)) {
        return response()->download($path, $filename);
    } else {
        abort(404);
    }
});

Route::get('/booking-form', [BookingController::class, 'book_form'])->name('book.form');
Route::post('/book', [BookingController::class, 'book_submit'])->name('book.submit');
Route::get('/custom-book', [BookingController::class, 'custom_book_form'])->name('custom.book.form');
Route::post('/custom-book', [BookingController::class, 'custom_book_submit'])->name('custom.book.submit');
Route::get('/search', [UserPageController::class, 'search'])->name('search');
Route::post('/newsletter', [UserPageController::class, 'newsletter'])->name('newsletter');
Route::get('{slug}', [PackageController::class, 'userPackageDetails'])->name('page.package.details');
