<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    protected $fillable = [
    	'name', 'description', 'status', 'start_at', 'end_at', 'difficulty', 'importance'
    ];

    protected $hidden = [
    ];
}
