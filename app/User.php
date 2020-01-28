<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function things()
    {
        return $this->hasMany('App\Thing')->orderBy('updated_at', 'desc');
    }

    public function lists()
    {
        return $this->hasMany('App\Lists')
                ->orderBy('created_at', 'desc')
                ->orderBy('priority', 'desc');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder')
                ->orderBy('created_at', 'desc')
                ->orderBy('date_time', 'desc');
    }
}
