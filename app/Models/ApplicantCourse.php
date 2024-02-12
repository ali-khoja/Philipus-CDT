<?php

namespace App\Models;

use App\Models\Classc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantCourse extends Model
{
    protected $table = 'applicants_courses';

    protected $fillable = [
        'course_id',
        'applicant_id',
        'status',
        'message',
        'details',
        'visual',
        'extra',
    ];
    use HasFactory;
        public function applicant()
        {
            return $this->belongsTo(Applicant::class, 'applicant_id');
        }
        public function course()
        {
            return $this->belongsTo(Course::class, 'course_id');
        }
}
