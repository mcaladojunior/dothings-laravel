<?php

namespace App\Http\Controllers;

use App\Thing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$things = Auth::user()->things()->paginate(15);
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
        ]);
        
        $thing = Auth::user()->things()->create($validatedData);

        return redirect()->route('things.index')->with('success','Thing created successfully.');
    }

    public function storeFromList(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:128',
            'list_id' => 'required'
        ]);
        
        $list = Auth::user()->lists()->where('id', $request['list_id'])->first();

        $list->things()->create([
            'name' => $request['name'],
            'user_id' => Auth::id()
        ]);

        return back()->with('success','Thing created successfully.');
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
