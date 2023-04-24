<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Candidate\CandidateController;


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


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('terms', [TermsController::class,'index'])->name('terms');
Route::get('job-categories', [JobCategoryController::class,'categories'])->name('job_categories');
Route::get('pricing', [PricingController::class,'index'])->name('pricing');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::get('create-account',[SignupController::class,'index'])->name('signup');

Route::get('forget-password/company',[ForgetPasswordController::class,'company_forget_password'])->name('company_forget_password');
Route::post('forget-password/company/submit',[ForgetPasswordController::class,'company_forget_password_submit'])->name('company_forget_password_submit');


// Company
Route::post('company-signup-submit',[SignupController::class,'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}',[SignupController::class,'company_signup_verify'])->name('company_signup_verify');
Route::post('company_login_submit',[LoginController::class,'company_login_submit'])->name('company_login_submit');
Route::get('/company/logout',[LoginController::class,'company_logout'])->name('company_logout'); 
Route::get('reset-password/company/{token}/{email}', [ForgetPasswordController::class,'company_reset_password'])->name('company_reset_password');
Route::post('reset-password/company/submit', [ForgetPasswordController::class,'company_reset_password_submit'])->name('company_reset_password_submit');



//company middleware
Route::middleware(['company:company'])->group(function(){
    Route::get('/company/dashboard', [CompanyController::class,'index'])->name('company_dashboard');
    
});


//candidate
Route::post('candidate-signup-submit',[SignupController::class,'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}',[SignupController::class,'candidate_signup_verify'])->name('candidate_signup_verify');
Route::post('candidate_login_submit',[LoginController::class,'candidate_login_submit'])->name('candidate_login_submit');
Route::get('/candidate/logout',[LoginController::class,'candidate_logout'])->name('candidate_logout'); 
Route::get('reset-password/candidate/{token}/{email}', [ForgetPasswordController::class,'candidate_reset_password'])->name('candidate_reset_password');
Route::post('reset-password/candidate/submit', [ForgetPasswordController::class,'candidate_reset_password_submit'])->name('candidate_reset_password_submit');

//candidate middleware
Route::middleware(['candidate:candidate'])->group(function(){
    Route::get('/candidate/dashboard', [candidateController::class,'index'])->name('candidate_dashboard');
    
});

// Admin
Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/forget_password', [AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/login-submit', [AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout'); 
Route::post('/admin/forget-password-submit', [AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class,'reset_password_submit'])->name('admin_reset_password_submit');

Route::middleware(['admin:admin'])->group(function(){
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::get('/admin/home-page', [AdminHomePageController::class, 'index'])->name('admin_home_page');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');
    Route::post('/admin/home-page/update', [AdminHomePageController::class, 'update'])->name('admin_home_page_update');

    Route::get('/admin/job-category/view', [AdminJobCategoryController::class, 'index'])->name('admin_job_category');
    Route::get('/admin/job-category/create',[AdminJobCategoryController::class,'create'])->name('admin_job_category_create');
    Route::post('/admin/job-category/store', [AdminJobCategoryController::class, 'store'])->name('admin_job_category_store');
    Route::get('/admin/job-category/edit/{id}',[AdminJobCategoryController::class,'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job-category/update/{id}', [AdminJobCategoryController::class, 'update'])->name('admin_job_category_update');
    Route::get('/admin/job-category/delete/{id}',[AdminJobCategoryController::class,'delete'])->name('admin_job_category_delete');

    Route::get('/admin/package/view' , [AdminPackageController::class,'index'])->name('admin_package');
    Route::get('/admin/package/create',[AdminPackageController::class,'create'])->name('admin_package_create');
    Route::post('/admin/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
    Route::get('/admin/package/edit/{id}',[AdminPackageController::class,'edit'])->name('admin_package_edit');
    Route::post('/admin/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
    Route::get('/admin/package/delete/{id}', [AdminPackageController::class,'delete'])->name('admin_package_delete');


}); 


