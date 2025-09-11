<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function schools()
    {
        return $this->hasMany(School::class, 'id_counties');
    }
}
