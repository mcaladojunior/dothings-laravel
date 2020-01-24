<?php

namespace App\Http\Controllers;

use App\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$lists = Auth::user()->lists()->paginate(15);
        return view('lists.index', compact('lists'));
    }

    public function create()
    {
        return view('lists.create');
    }

	public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:128', 
            'priority' => 'required'
        ]);
        
        $list = Auth::user()->lists()->create([
        	'name' => $request['name'], 
        	'description' => $request['description'],
            'priority' => $request['priority']
        ]);

        return redirect()->route('lists.index')->with('success','List created successfully.');
    }

    public function show($id)
    {
        $list = Lists::findOrFail($id);
        return view('lists.show', compact('list'));
    }

    public function edit($id)
    {
        $list = Lists::findOrFail($id);
        return view('lists.edit', compact('list'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'required|max:128', 
            'priority' => 'required'
        ]);
        
        Lists::whereId($id)->update([
        	'name' => $request['name'], 
        	'description' => $request['description'],
            'priority' => $request['priority']
        ]);
        
        return redirect()->route('lists.index')->with('success','List updated successfully.');
    }

    public function destroy($id)
    {
        Lists::findOrFail($id)->delete();
    	return redirect()->route('lists.index')->with('success','List deleted successfully.');
    }    
}
