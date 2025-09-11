<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\School;
use App\Models\Course;

class Finalist extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'bi',
        'phone',
        'file',
        'cover',
        'id_schools',
        'id_courses',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'id_schools');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_courses');
    }
}
