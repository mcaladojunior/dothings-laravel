<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $dates = [
        'start_at', 'end_at'
    ];

    protected $fillable = [
    	'name', 'description', 'status', 'start_at', 'end_at', 'difficulty', 
        'importance', 'user_id', 'thing_id', 'urgency'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function steps()
    {
        return $this->hasMany('App\Thing', 'thing_id')->orderBy('updated_at', 'desc');
    }    

    public function mainThing()
    {
        return $this->belongsTo('App\Thing', 'thing_id');
    }

    public function lists()
    {
        return $this->belongsToMany(
            'App\Lists', 'lists_has_things', 'thing_id', 'list_id'
        )->orderBy('updated_at', 'desc');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder')
                ->orderBy('updated_at', 'desc')
                ->orderBy('date_time', 'desc');
    }
}
