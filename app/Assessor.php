<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessor extends Model
{
    protected $fillable = ['name','username'];

        public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
}
