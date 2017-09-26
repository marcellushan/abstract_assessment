<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name','mission'];

    public function assessors()
    {
        return $this->belongsToMany('App\Assessor');
    }

    public function assessments()
    {
        return $this->hasMany('App\Assessment');
    }

}
