<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $dates = [
        'start_at', 'end_at'
    ];

    protected $fillable = [
    	'name', 'description', 'status', 'start_at', 'end_at', 'difficulty', 'importance', 
        'user_id', 'step_thing_id', 'urgency'
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
