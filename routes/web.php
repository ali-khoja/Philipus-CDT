<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ClasscController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ComappController;
use App\Models\ApplicantCourse;

use App\Http\Controllers\CourseCategoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/staff', [HomeController::class, 'staff'])->name('staff.shows');
Route::get('/coursesection/{id}', [CourseCategoryController::class, 'index3'])->name('coursecategory.index3');
Route::get('/coursecategory', [CourseCategoryController::class, 'index2'])->name('coursecategory.index2');
Route::get('/coursecategory/{id}', [CourseCategoryController::class, 'show2'])->name('coursecategory.show2');
//Route::get('/applicant/{id}', [ApplicantController::class, 'create'])->name('applicantcourse.create');
Route::get('/applicant/create/{id}', [ApplicantController::class, 'create1'])->name('applicantcourse.create1');
Route::get('/companyapp/create', [ComappController::class, 'create'])->name('comapp.create');
Route::post('/companyapp/store', [ComappController::class, 'store'])->name('companyapp.store');
Route::get('/companyapp/success', [ComappController::class, 'success'])->name('companysuccess');
//Route::get('/applicantcourse/create/{id}/{aid}', [ApplicantController::class, 'afterapplicantcreate'])->name('afterapplicantcreate');
Route::get('/applicant/check/{id}', [ApplicantController::class, 'check'])->name('applicantcourse.check');
Route::post('/check-applicant/{id}', [ApplicantController::class, 'checkApplicant'])->name('check.applicant');
Route::post('/applicant/store/{id}', [ApplicantController::class, 'store'])->name('applicantcourse.store');
     Route::get('/applicant/editextra/{id}', [ApplicantController::class, 'edit'])->name('applicantextra.edit');
      Route::put('/applicant/update/{id}', [ApplicantController::class, 'update'])->name('applicantextra.update');
//Route::post('/applicantcourse/store/{cid}/{id}', [ApplicantController::class, 'store2'])->name('applicantcourse.store2');
Route::get('/applicantcourse/show/{applicant}', [ApplicantController::class, 'show'])->name('applicantshow');
Route::get('/applicantcourse/show2/{applicant}', [ApplicantController::class, 'show2'])->name('applicantshow2');
Route::post('/applicant/logout', [ApplicantController::class, 'logout'])->name('applicant.logout');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
            $pending = ApplicantCourse::where( 'status' , 'pending' )->count();
$accepted = ApplicantCourse::where( 'status' , 'accepted' )->count();
$rejected = ApplicantCourse::where( 'status' , 'rejected' )->count();
    return view('dashboard' , compact('pending' , 'rejected' , 'accepted'));
})->middleware(['auth', 'role:admin'])->name('dashboard');
Route::prefix('dashboard')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('coursecategory', CourseCategoryController::class);
    Route::resource('course', CourseController::class);
  //  Route::resource('class', ClasscController::class);
    Route::resource('post', PostsController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('staff', StaffController::class);
    Route::get('/applicant/index', [ApplicantController::class, 'index'])->name('applicant1.index');
    Route::get('/applicant/pending', [ApplicantController::class, 'pending'])->name('applicant1.pending');
    Route::get('/applicant/accepted', [ApplicantController::class, 'accepted'])->name('applicant1.accepted');
    Route::get('/applicant/rejected', [ApplicantController::class, 'rejected'])->name('applicant1.rejected');
    Route::get('/applicant/courses/{id}', [ApplicantController::class, 'showcourses'])->name('applicant.showcourses');
    Route::put('/applicant/update/{id}', [ApplicantController::class, 'updateapp'])->name('applicant1.updateapp');

    Route::get('/companyapp/pending', [ComappController::class, 'show'])->name('companyapp.show');
    // Route::put('/applicant/updateclassmessage/{id}', [ApplicantController::class, 'updateclassmessage'])->name('updateclassmessage');
    Route::delete('/applicantcourse/delete/{id}', [ApplicantController::class, 'destroy'])->name('applicant1.destroy');
        Route::delete('/comapp/delete/{id}', [ComappController::class, 'destroy'])->name('companyapp.destroy');

    Route::delete('/applicant/delete/{id}', [ApplicantController::class, 'destroy2'])->name('applicant.destroy2');
});
Route::prefix('dashboard')->middleware(['role:gallery,post'])->group(function () {
 Route::resource('post', PostsController::class)->name('post');
    Route::resource('gallery', GalleryController::class)->name('gallery');
    Route::get('/dashboard', function () {
                    $pending = ApplicantCourse::where( 'status' , 'pending' )->count();
$accepted = ApplicantCourse::where( 'status' , 'accepted' )->count();
$rejected = ApplicantCourse::where( 'status' , 'rejected' )->count();
    return view('dashboard' , compact('pending' , 'rejected' , 'accepted'));})->name('dashboard');
});
require __DIR__.'/auth.php';
