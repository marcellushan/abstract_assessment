<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessor extends Model
{
        public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
}
