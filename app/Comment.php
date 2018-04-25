<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['assessment_id','name','type'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
