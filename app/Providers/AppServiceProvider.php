<?php

namespace App\Providers;

use App\Models\ApplicantCourse;
use App\Models\Section;
use App\Models\CourseCategory;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['app'], function ($view) {
            $applicant = auth('applicants')->user();
            if($applicant){
                $t='1';
            }
            else{
                $t='0';
            }
            $sections = Section::all();
                        $coucat = CourseCategory::all();
            $view->with(compact('t' , 'applicant' , 'sections' , 'coucat'));

        });
         View::composer(['dashboard'], function ($view) {
 $pending = ApplicantCourse::where( 'status' , 'pending' )->count();
$accepted = ApplicantCourse::where( 'status' , 'accepted' )->count();
$rejected = ApplicantCourse::where( 'status' , 'rejected' )->count();
            $view->with(compact('pending' , 'accepted' , 'rejected'));

        });

    }
}
