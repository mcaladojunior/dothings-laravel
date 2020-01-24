<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ThingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$things = Auth::user()->things()->paginate(25);
        return view('things.index', compact('things'));
    }

    public function create()
    {
        return view('things.create');
    }

	public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:128', 
            'description' => 'required', 
            'status' => 'required', 
            'start_at' => 'required', 
            'end_at' => 'required', 
            'difficulty' => 'required', 
            'importance' => 'required'
        ]);
        
        $thing = Auth::user()->things()->create($validatedData);

        return redirect()->route('things.index')->with('success','Thing created successfully.');
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:128', 
            'description' => 'required', 
            'status' => 'required', 
            'start_at' => 'required', 
            'end_at' => 'required', 
            'difficulty' => 'required', 
            'importance' => 'required'
        ]);
        
        Thing::whereId($id)->update($validatedData);
        
        return redirect()->route('things.index')->with('success','Thing updated successfully.');
    }

    public function destroy($id)
    {
        Thing::findOrFail($id)->delete();
    	return redirect()->route('things.index')->with('success','Thing deleted successfully.');
    }    
}
