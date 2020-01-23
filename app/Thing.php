<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $fillable = [
    	'name', 'description', 'status', 'start_at', 'end_at', 'difficulty', 'importance', 
        'user_id', 'step_thing_id'
    ];

    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function steps()
    {
        return $this->hasMany('App\Thing', 'step_thing_id');
    }    

    public function mainThing()
    {
        return $this->belongsTo('App\Thing', 'step_thing_id');
    }
}
