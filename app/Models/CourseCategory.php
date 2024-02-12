<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
    use HasFactory;
    protected $table = 'course_category';

    protected $fillable = [
        'name',
        'description',
        'image',
        'section_id',
    ];
    public function course()
{
   return $this->hasMany(Course::class,'category_id');
}
public function section()
    {
       return $this->belongsto(Section::class,'section_id');
    }
}
