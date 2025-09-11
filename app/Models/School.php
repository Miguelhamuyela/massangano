<?php

namespace App\Models;

use App\Models\Province;
use App\Models\County;
use App\Models\Course;
use App\Models\Finalist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'nSchool',
        'email',
        'nif',
        'phone',
        'nRoom',
        'bout',
        'description',
        'schoolType',
        'schoolLevel',
        'SchoolCategory',
        'id_provinces',
        'id_counties',
        'id_courses',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'id_provinces');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'id_counties');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_courses');
    }

    public function finalists()
    {
        return $this->hasMany(Finalist::class, 'id_schools');
    }
}
