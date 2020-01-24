<?php

namespace App\Http\Controllers;

use App\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$reminders = Auth::user()->reminders()->paginate(15);
        return view('reminders.index', compact('reminders'));
    }

    public function create()
    {
        return view('reminders.create');
    }

	public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:128',
            'date_time' => 'required',
            'thing_id' => 'required'
        ]);
        
        $reminder = Auth::user()->reminders()->create([
        	'name' => $request['name'],
        	'description' => $request['description'],
        	'date_time' => $request['date_time'],
        	'thing_id' => $request['thing_id'],
        ]);

        return redirect()->route('reminders.index')->with('success','Reminder created successfully.');
    }

    public function show($id)
    {
        $reminder = Reminder::findOrFail($id);
        return view('reminders.show', compact('reminder'));
    }

    public function edit($id)
    {
        $reminder = Reminder::findOrFail($id);
        return view('reminders.edit', compact('reminder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:128',
            'date_time' => 'required',
            'thing_id' => 'required'
        ]);
        
        Reminder::whereId($id)->update([
        	'name' => $request['name'],
        	'description' => $request['description'],
        	'date_time' => $request['date_time'],
        	'thing_id' => $request['thing_id'],
        ]);

        return redirect()->route('reminders.index')->with('success','Reminder updated successfully.');
    }

    public function destroy($id)
    {
        Reminder::findOrFail($id)->delete();
    	return redirect()->route('reminder.index')->with('success','Reminder deleted successfully.');
    }    
}
