<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\hcpanelController\CourseController;
use App\Http\Controllers\hcpanelController\ExamNameController;
use App\Http\Controllers\hcpanelController\BlogController;
use App\Http\Controllers\hcpanelController\LoginController;
use App\Http\Controllers\hcpanelController\BatchController;
use App\Http\Controllers\hcpanelController\BannerController;
use App\Http\Controllers\hcpanelController\FaqController;
use App\Http\Controllers\hcpanelController\ReviewController;
use App\Http\Controllers\hcpanelController\PlatformController;
use App\Http\Controllers\hcpanelController\PageController;
use App\Http\Controllers\hcpanelController\EnquiryController;
use App\Http\Controllers\hcpanelController\SettingController;
use App\Http\Controllers\hcpanelController\FounderController;
use App\Http\Middleware\AuthUser;


Route::get('/admin/login', function () {
    return view('hcpanel.admin.pages.login');
})->name('admin.pages.login');

Route::post('/admin/login-user', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');


Route::middleware([AuthUser::class])->group(function () {
    Route::get('/admin/course', [CourseController::class, 'getCourse'])->name('admin.pages.getCourse');

    Route::get('/admin/examName', [ExamNameController::class, 'getExamName'])->name('admin.pages.getExamName');

    Route::get('/admin/blog', [BlogController::class, 'getAdminBlogList'])->name('admin.pages.blogs');

    Route::get('/admin/batch', [BatchController::class, 'getBatch'])->name('admin.pages.getBatch');

    Route::get('/admin/faqs/website', [FaqController::class, 'getFaq'])->name('admin.pages.getFaq');
    Route::get('/admin/faqs/batch', [FaqController::class, 'getBatchFaq'])->name('admin.pages.getBatchFaq');
    Route::get('/admin/faqs/exam', [FaqController::class, 'getExamFaq'])->name('admin.pages.getExamFaq');

    Route::get('/admin/banner', [BannerController::class, 'getBanner'])->name('admin.pages.banner');

    Route::get('/admin/review', [ReviewController::class, 'getReview'])->name('admin.pages.review');

    Route::get('/admin/platform', [PlatformController::class, 'getPlatform'])->name('admin.pages.platform');

    // Page Controller
    Route::get('/admin/page-content', [PageController::class, 'pageContent'])->name('admin.pages.pageContent');

    Route::get('/admin/enquiry', [EnquiryController::class, 'getEnquiry'])->name('admin.pages.Enquiry');

    Route::post('/admin/addLeadRemarks/{id}', [EnquiryController::class, 'addLeadRemarks'])->name('admin.pages.addLeadRemarks');


    Route::get('/admin/settings/general', [SettingController::class, 'settings'])->name('admin.pages.Settings');
    Route::get('/admin/settings/mission-vision', [SettingController::class, 'missionVision'])->name('admin.pages.missionVision');

    Route::get('/admin/founder', [FounderController::class, 'getFounder'])->name('admin.pages.Founder');
});



Route::post('/addCourse', [CourseController::class, 'addCourse'])->name('admin.addCourse');
Route::post('/updateCourseStatus/{id}', [CourseController::class, 'updateCourseStatus'])->name('admin.updateCourseStatus');
Route::post('/updateCourse/{id}', [CourseController::class, 'updateCourse'])->name('admin.updateCourse');
Route::get('/fetchCourseContent/{id}', [CourseController::class, 'fetchCourseContent'])->name('admin.fetchCourseContent');



Route::post('/addExamName', [ExamNameController::class, 'addExamName'])->name('admin.addExamName');
Route::post('/updatePopularExamStatus/{id}', [ExamNameController::class, 'updatePopularExamStatus'])->name('admin.updatePopularExamStatus');
Route::post('/updateExamStatus/{id}', [ExamNameController::class, 'updateExamStatus'])->name('admin.updateExamStatus');
Route::post('/updateExamName/{id}', [ExamNameController::class, 'updateExamName'])->name('admin.updateExamName');
Route::get('/fetchExamNameContent/{id}', [ExamNameController::class, 'fetchExamNameContent'])->name('admin.fetchExamNameContent');


Route::get('/admin/fetchBlogInfo/{id}', [BlogController::class, 'fetchBlogInfo'])->name('admin.fetchBlogInfo');
Route::post('/api/admin/addBlog', [BlogController::class, 'addBlog'])->name('hcpanel.addBlog');
Route::post('/api/admin/updateBlog/{id}', [BlogController::class, 'updateBlog'])->name('hcpanel.updateBlog');
Route::post('/api/updateBlogStatus/{id}', [BlogController::class, 'updateBlogStatus'])->name('admin.pages.updateBlogStatus');
Route::post('/api/updateBlogCommentStatus/{id}', [BlogController::class, 'updateBlogCommentStatus'])->name('admin.updateBlogCommentStatus');


Route::post('/addBatch', [BatchController::class, 'addBatch'])->name('admin.addBatch');
Route::post('/updateBatchStatus/{id}', [BatchController::class, 'updateBatchStatus'])->name('admin.updateBatchStatus');
Route::post('/updatePopularStatus/{id}', [BatchController::class, 'updatePopularStatus'])->name('admin.updatePopularStatus');
Route::post('/updateBatch/{id}', [BatchController::class, 'updateBatch'])->name('admin.updateBatch');
Route::get('/fetchBatchContent/{id}', [BatchController::class, 'fetchBatchContent'])->name('admin.fetchBatchContent');



Route::post('/addFaq', [FaqController::class, 'addFaq'])->name('admin.addFaq');
Route::post('/updateFaqStatus/{id}', [FaqController::class, 'updateFaqStatus'])->name('admin.updateFaqStatus');
Route::post('/updateFaq/{id}', [FaqController::class, 'updateFaq'])->name('admin.updateFaq');
Route::get('/fetchFaqContent/{id}', [FaqController::class, 'fetchFaqContent'])->name('admin.fetchFaqContent');


Route::post('/addBatchFaq', [FaqController::class, 'addBatchFaq'])->name('admin.addBatchFaq');
Route::post('/updateBatchFaqStatus/{id}', [FaqController::class, 'updateBatchFaqStatus'])->name('admin.updateBatchFaqStatus');
Route::post('/updateBatchFaq/{id}', [FaqController::class, 'updateBatchFaq'])->name('admin.updateBatchFaq');
Route::get('/fetchBatchFaqContent/{id}', [FaqController::class, 'fetchBatchFaqContent'])->name('admin.fetchBatchFaqContent');


Route::post('/addExamFaq', [FaqController::class, 'addExamFaq'])->name('admin.addExamFaq');
Route::post('/updateExamFaqStatus/{id}', [FaqController::class, 'updateExamFaqStatus'])->name('admin.updateExamFaqStatus');
Route::post('/updateExamFaq/{id}', [FaqController::class, 'updateExamFaq'])->name('admin.updateExamFaq');
Route::get('/fetchExamFaqContent/{id}', [FaqController::class, 'fetchExamFaqContent'])->name('admin.fetchExamFaqContent');


Route::post('/addBanner', [BannerController::class, 'addBanner'])->name('admin.addBanner');
Route::post('/updateBannerStatus/{id}', [BannerController::class, 'updateBannerStatus'])->name('admin.updateBannerStatus');
Route::post('/updateBanner/{id}', [BannerController::class, 'updateBanner'])->name('admin.updateBanner');
Route::get('/fetchBannerContent/{id}', [BannerController::class, 'fetchBannerContent'])->name('admin.fetchBannerContent');



Route::post('/addReview', [ReviewController::class, 'addReview'])->name('admin.addReview');
Route::post('/updateReviewStatus/{id}', [ReviewController::class, 'updateReviewStatus'])->name('admin.updateReviewStatus');
Route::post('/updateReview/{id}', [ReviewController::class, 'updateReview'])->name('admin.updateReview');
Route::get('/fetchReviewContent/{id}', [ReviewController::class, 'fetchReviewContent'])->name('admin.fetchReviewContent');



Route::post('/addPlatform', [PlatformController::class, 'addPlatform'])->name('admin.addPlatform');
Route::post('/updatePlatformStatus/{id}', [PlatformController::class, 'updatePlatformStatus'])->name('admin.updatePlatformStatus');
Route::post('/updatePlatform/{id}', [PlatformController::class, 'updatePlatform'])->name('admin.updatePlatform');
Route::get('/fetchPlatformContent/{id}', [PlatformController::class, 'fetchPlatformContent'])->name('admin.fetchPlatformContent');


// Page Controller
Route::post('/fetch-page-content/{id}', [PageController::class, 'fetchPageContent'])->name('admin.fetchPageContent');
Route::post('/update-page-status/{id}', [PageController::class, 'updatePageStatus'])->name('admin.updatePageStatus');
Route::post('/update-page-content/{id}', [PageController::class, 'updatePageContent'])->name('admin.updatePageContent');

Route::post('/update-setting', [SettingController::class, 'updateDetails'])->name('admin.updateDetails');
Route::post('/update-mission-vision', [SettingController::class, 'updateMissionVision'])->name('admin.updateMissionVision');

Route::post('/addFounder', [FounderController::class, 'addFounder'])->name('admin.addFounder');
Route::post('/updateFounderStatus/{id}', [FounderController::class, 'updateFounderStatus'])->name('admin.updateFounderStatus');
Route::post('/updateFounder/{id}', [FounderController::class, 'updateFounder'])->name('admin.updateFounder');
Route::get('/fetchFounderContent/{id}', [FounderController::class, 'fetchFounderContent'])->name('admin.fetchFounderContent');
