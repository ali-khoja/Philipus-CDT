<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classc extends Model
{
    use HasFactory;
    protected $table = 'class';

    protected $fillable = [
        'course_id',
        'notes',
        'days',
        'time',
        'statue',
        'visual',
    ];


}
