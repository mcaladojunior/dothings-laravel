<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThingController extends Controller
{
    public function index()
    {
    	$things = Thing::all();
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
