<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::view('/page-not-found', 'pages.404')->name('404');

Route::post('/getExamByCourse', [HomeController::class, 'getExamByCourse'])->name('getExamByCourse');

Route::get('/courses/{courseTitle}', [CourseController::class,'courses'])->name('Courses');

Route::get('/about-us', [AboutController::class,'getaboutus'])->name('AboutUs');


Route::get('/course-detail/{batchSku}',  [CourseController::class,'courseDetail'])->name('CourseDetail');

Route::get('/contact-us', [HomeController::class,'contactUs'])->name('ContactUs');
Route::get('/privacy-policy', [HomeController::class,'privacyPolicy'])->name('PrivacyPolicy');
Route::get('/terms-and-conditions', [HomeController::class,'termsCondition'])->name('TermsAndConditions');
Route::get('/refund-policy', [HomeController::class,'refundPolicy'])->name('RefundPolicy');


Route::get('/blogs', [BlogPageController::class, 'blogs'])->name('Blogs');
Route::get('/blogdetails/{id}', [BlogPageController::class, 'blogDetails'])->name('BlogDetails');
Route::post('/addBlogComment', [BlogPageController::class, 'addBlogComment'])->name('addBlogComment');
Route::get('/blog-search-list', [BlogPageController::class, 'blogSearchList'])->name('BlogSearchList');
Route::get('/blog-search-data', [BlogPageController::class, 'blogSearchData'])->name('BlogSearchData');

Route::post('/addEnquiry', [HomeController::class, 'addEnquiry'])->name('addEnquiry');


