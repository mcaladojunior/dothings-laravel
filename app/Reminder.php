<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $dates = [
        'date_time'
    ];

    protected $fillable = [
    	'name', 'description', 'date_time', 'thing_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function thing()
    {
        return $this->belongsTo('App\Thing');
    }    
}
