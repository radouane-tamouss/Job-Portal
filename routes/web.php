<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminJobLocationController;
use App\Http\Controllers\Admin\AdminJobSalaryRangeController;
use App\Http\Controllers\Admin\AdminJobTypeController;
use App\Http\Controllers\Admin\AdminJobExperienceController;
use App\Http\Controllers\Admin\AdminCompanyLocationController;
use App\Http\Controllers\Admin\AdminCompanyIndustryController;
use App\Http\Controllers\Admin\AdminCompanySizeController;
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

// Company
Route::post('company-signup-submit',[SignupController::class,'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}',[SignupController::class,'company_signup_verify'])->name('company_signup_verify');
Route::post('company_login_submit',[LoginController::class,'company_login_submit'])->name('company_login_submit');
Route::get('/company/logout',[LoginController::class,'company_logout'])->name('company_logout'); 
Route::get('reset-password/company/{token}/{email}', [ForgetPasswordController::class,'company_reset_password'])->name('company_reset_password');
Route::post('reset-password/company/submit', [ForgetPasswordController::class,'company_reset_password_submit'])->name('company_reset_password_submit');

Route::get('forget-password/company',[ForgetPasswordController::class,'company_forget_password'])->name('company_forget_password');
Route::post('forget-password/company/submit',[ForgetPasswordController::class,'company_forget_password_submit'])->name('company_forget_password_submit');




//company middleware
Route::middleware(['company:company'])->group(function(){
    Route::get('/company/dashboard', [CompanyController::class,'index'])->name('company_dashboard');
    Route::get('/company/make-payment', [CompanyController::class,'make_payment'])->name('company_make_payment');
    Route::get('/company/orders', [CompanyController::class, 'orders'])->name('company_orders');

    Route::get('/company/edit-profile', [CompanyController::class, 'edit_profile'])->name('company_edit_profile');
    Route::post('/company/edit-profile/update', [CompanyController::class, 'edit_profile_update'])->name('company_edit_profile_update');

    Route::get('/company/edit-password', [CompanyController::class, 'edit_password'])->name('company_edit_password');
    Route::post('/company/edit-password/update', [CompanyController::class, 'company_edit_password_update'])->name('company_edit_password_update');

    
     /* PayPal */
     Route::post('/company/paypal/payment', [CompanyController::class, 'paypal'])->name('company_paypal');
     Route::get('/company/paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
     Route::get('/company/paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');
 
     /* Stripe */
     Route::post('/company/stripe/payment', [CompanyController::class, 'stripe'])->name('company_stripe');
     Route::get('/company/stripe/success', [CompanyController::class, 'stripe_success'])->name('company_stripe_success');
     Route::get('/company/stripe/cancel', [CompanyController::class, 'stripe_cancel'])->name('company_stripe_cancel');
     //company photos
     Route::get('/company/photos', [CompanyController::class, 'photos'])->name('company_photos');
     Route::post('/company/photos/submit', [CompanyController::class, 'photos_submit'])->name('company_photos_submit');
    Route::get('/company/photos/delete/{id}',[CompanyController::class,'photo_delete'])->name('company_photo_delete');

     //Company videos
     Route::get('/company/videos', [CompanyController::class, 'videos'])->name('company_videos');
     Route::post('/company/videos/submit', [CompanyController::class, 'videos_submit'])->name('company_videos_submit');
     Route::get('/company/videos/delete/{id}',[CompanyController::class,'video_delete'])->name('company_video_delete');


     Route::get('/company/jobs', [CompanyController::class, 'jobs'])->name('company_jobs');
     Route::get('/company/create-job', [CompanyController::class, 'jobs_create'])->name('jobs_create');
     Route::post('/company/create-job-submit', [CompanyController::class, 'jobs_create_submit'])->name('company_jobs_create_submit');
    
     Route::get('/company/jobs/edit/{id}',[companyController::class,'edit_job'])->name('company_edit_job');
     Route::post('/company/jobs/update/{id}', [companyController::class, 'update_job'])->name('company_update_job');
     Route::get('/company/jobs/delete/{id}', [companyController::class, 'delete_job'])->name('company_delete_job');
     
 
});

//candidate
Route::post('candidate-signup-submit',[SignupController::class,'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}',[SignupController::class,'candidate_signup_verify'])->name('candidate_signup_verify');
Route::post('candidate_login_submit',[LoginController::class,'candidate_login_submit'])->name('candidate_login_submit');
Route::get('/candidate/logout',[LoginController::class,'candidate_logout'])->name('candidate_logout'); 

Route::get('forget-password/candidate',[ForgetPasswordController::class,'candidate_forget_password'])->name('candidate_forget_password');
Route::post('forget-password/candidate/submit',[ForgetPasswordController::class,'candidate_forget_password_submit'])->name('candidate_forget_password_submit');
Route::get('reset-password/candidate/{token}/{email}', [ForgetPasswordController::class,'candidate_reset_password'])->name('candidate_reset_password');
Route::post('reset-password/candidate/submit', [ForgetPasswordController::class,'candidate_reset_password_submit'])->name('candidate_reset_password_submit');

    //candidate middleware
    Route::middleware(['candidate:candidate'])->group(function(){
        Route::get('/candidate/dashboard', [CandidateController::class,'index'])->name('candidate_dashboard');

        Route::get('/candidate/edit-profile', [CandidateController::class, 'edit_profile'])->name('candidate_edit_profile');
        Route::post('/candidate/edit-profile/update', [CandidateController::class, 'edit_profile_update'])->name('candidate_edit_profile_update');

        Route::get('/candidate/edit-password', [CandidateController::class, 'edit_password'])->name('candidate_edit_password');
        Route::post('/candidate/edit-password/update', [CandidateController::class, 'candidate_edit_password_update'])->name('candidate_edit_password_update');
        
        
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

    Route::get('/admin/job-location/view', [AdminJobLocationController::class, 'index'])->name('admin_job_location');
    Route::get('/admin/job-location/create',[AdminJobLocationController::class,'create'])->name('admin_job_location_create');
    Route::post('/admin/job-location/store', [AdminJobLocationController::class, 'store'])->name('admin_job_location_store');
    Route::get('/admin/job-location/edit/{id}',[AdminJobLocationController::class,'edit'])->name('admin_job_location_edit');
    Route::post('/admin/job-location/update/{id}', [AdminJobLocationController::class, 'update'])->name('admin_job_location_update');
    Route::get('/admin/job-location/delete/{id}',[AdminJobLocationController::class,'delete'])->name('admin_job_location_delete');

    Route::get('/admin/job-type/view', [AdminJobTypeController::class, 'index'])->name('admin_job_type');
    Route::get('/admin/job-type/create',[AdminJobTypeController::class,'create'])->name('admin_job_type_create');
    Route::post('/admin/job-type/store', [AdminJobTypeController::class, 'store'])->name('admin_job_type_store');
    Route::get('/admin/job-type/edit/{id}',[AdminJobTypeController::class,'edit'])->name('admin_job_type_edit');
    Route::post('/admin/job-type/update/{id}', [AdminJobTypeController::class, 'update'])->name('admin_job_type_update');
    Route::get('/admin/job-type/delete/{id}',[AdminJobTypeController::class,'delete'])->name('admin_job_type_delete');

    Route::get('/admin/job-experience/view', [AdminJobExperienceController::class, 'index'])->name('admin_job_experience');
    Route::get('/admin/job-experience/create',[AdminJobExperienceController::class,'create'])->name('admin_job_experience_create');
    Route::post('/admin/job-experience/store', [AdminJobExperienceController::class, 'store'])->name('admin_job_experience_store');
    Route::get('/admin/job-experience/edit/{id}',[AdminJobExperienceController::class,'edit'])->name('admin_job_experience_edit');
    Route::post('/admin/job-experience/update/{id}', [AdminJobExperienceController::class, 'update'])->name('admin_job_experience_update');
    Route::get('/admin/job-experience/delete/{id}',[AdminJobExperienceController::class,'delete'])->name('admin_job_experience_delete');

    Route::get('/admin/job-salary-range/view', [AdminJobSalaryRangeController::class, 'index'])->name('admin_job_salary_range');
    Route::get('/admin/job-salary-range/create',[AdminJobSalaryRangeController::class,'create'])->name('admin_job_salary_range_create');
    Route::post('/admin/job-salary-range/store', [AdminJobSalaryRangeController::class, 'store'])->name('admin_job_salary_range_store');
    Route::get('/admin/job-salary-range/edit/{id}',[AdminJobSalaryRangeController::class,'edit'])->name('admin_job_salary_range_edit');
    Route::post('/admin/job-salary-range/update/{id}', [AdminJobSalaryRangeController::class, 'update'])->name('admin_job_salary_range_update');
    Route::get('/admin/job-salary-range/delete/{id}',[AdminJobSalaryRangeController::class,'delete'])->name('admin_job_salary_range_delete');

    Route::get('/admin/package/view' , [AdminPackageController::class,'index'])->name('admin_package');
    Route::get('/admin/package/create',[AdminPackageController::class,'create'])->name('admin_package_create');
    Route::post('/admin/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
    Route::get('/admin/package/edit/{id}',[AdminPackageController::class,'edit'])->name('admin_package_edit');
    Route::post('/admin/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
    Route::get('/admin/package/delete/{id}', [AdminPackageController::class,'delete'])->name('admin_package_delete');

    Route::get('/admin/company-location/view', [AdminCompanyLocationController::class, 'index'])->name('admin_company_location');
    Route::get('/admin/company-location/create',[AdminCompanyLocationController::class,'create'])->name('admin_company_location_create');
    Route::post('/admin/company-location/store', [AdminCompanyLocationController::class, 'store'])->name('admin_company_location_store');
    Route::get('/admin/company-location/edit/{id}',[AdminCompanyLocationController::class,'edit'])->name('admin_company_location_edit');
    Route::post('/admin/company-location/update/{id}', [AdminCompanyLocationController::class, 'update'])->name('admin_company_location_update');
    Route::get('/admin/company-location/delete/{id}',[AdminCompanyLocationController::class,'delete'])->name('admin_company_location_delete');

    Route::get('/admin/company-industry/view', [AdminCompanyIndustryController::class, 'index'])->name('admin_company_industry');
    Route::get('/admin/company-industry/create',[AdminCompanyIndustryController::class,'create'])->name('admin_company_industry_create');
    Route::post('/admin/company-industry/store', [AdminCompanyIndustryController::class, 'store'])->name('admin_company_industry_store');
    Route::get('/admin/company-industry/edit/{id}',[AdminCompanyIndustryController::class,'edit'])->name('admin_company_industry_edit');
    Route::post('/admin/company-industry/update/{id}', [AdminCompanyIndustryController::class, 'update'])->name('admin_company_industry_update');
    Route::get('/admin/company-industry/delete/{id}',[AdminCompanyIndustryController::class,'delete'])->name('admin_company_industry_delete');

    Route::get('/admin/company-size/view', [AdminCompanySizeController::class, 'index'])->name('admin_company_size');
    Route::get('/admin/company-size/create',[AdminCompanySizeController::class,'create'])->name('admin_company_size_create');
    Route::post('/admin/company-size/store', [AdminCompanySizeController::class, 'store'])->name('admin_company_size_store');
    Route::get('/admin/company-size/edit/{id}',[AdminCompanySizeController::class,'edit'])->name('admin_company_size_edit');
    Route::post('/admin/company-size/update/{id}', [AdminCompanySizeController::class, 'update'])->name('admin_company_size_update');
    Route::get('/admin/company-size/delete/{id}',[AdminCompanySizeController::class,'delete'])->name('admin_company_size_delete');

    
   


}); 

