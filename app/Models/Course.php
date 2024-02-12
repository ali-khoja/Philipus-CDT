<?php

namespace App\Models;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'image',
        'statue',
        'visual',
    ];
    public function coursecategory()
    {
       return $this->belongsto(CourseCategory::class,'category_id');
    }

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class , 'applicants_courses', 'course_id', 'applicant_id');
    }
}
