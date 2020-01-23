<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$things = Auth::user()->things;
        return view('things.index', compact('things'));
    }

    public function create()
    {
        return view('things.create');
    }

	public function store()
    {
    	//
    }

    public function show($id)
    {
    	$thing = Thing::findOrFail($id);
        return view('things.show', compact('thing'));
    }

    public function edit($id)
    {
    	$thing = Thing::findOrFail($id);
        return view('things.edit', compact('thing'));
    }

    public function update()
    {
    	//
    }

    public function delete()
    {
    	//
    }    
}
