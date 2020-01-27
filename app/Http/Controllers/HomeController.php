<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	if(Auth::check()) {
    		// $folders = Auth::user()->folders;
    		$lists = Auth::user()->lists()->orderBy('priority', 'desc')->get();
            $inbox = Auth::user()->lists()->where('name', 'Inbox')->first();
    		$reminders = Auth::user()->reminders()->orderBy('date_time', 'desc')->get();
    		return view('home', compact('lists', 'inbox', 'reminders'));
    	} else {
    		return view('home');	
    	}
    }
}
