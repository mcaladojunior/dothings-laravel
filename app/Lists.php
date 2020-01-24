<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
	protected $table = 'lists';

    protected $fillable = [
    	'name', 'description', 'priority'
	];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function things()
    {
        return $this->belongsToMany(
        	'App\Thing', 'lists_has_things', 'list_id', 'thing_id'
        );
    }   
}
