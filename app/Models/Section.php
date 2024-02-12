<?php

namespace App\Models;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $table = 'section';

    protected $fillable = [
        'name',
    ];
    public function coursecategory()
    {
       return $this->hasMany(CourseCategory::class,'section_id');
    }
}
