<?php

namespace App\Models;

use App\Models\County;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function counties()
    {
        return $this->hasMany(County::class, 'id_provinces');
    }

    public function schools()
    {
        return $this->hasMany(School::class, 'id_provinces');
    }
}
