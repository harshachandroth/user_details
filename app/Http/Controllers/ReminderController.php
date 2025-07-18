<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders =Reminder::orderBy('id', 'asc')->get();
        return view('reminder.reminder',compact('reminders'));
    }
    public function create()
{
    return view('reminder.create'); // Blade file to show the form
}
     public function store(Request $request)
    {
        //echo "<pre>";print_r($request);die;
        $request->validate([
             'title' => 'required|string|max:255',
           // 'date'=>'required'
        ]);
        $isDone = $request->has('is_done') ? 1 : 0;
         Reminder::create([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->reminder_date,
        'time' => $request->reminder_time,
        'is_done' =>  $isDone,
         ]);
     return redirect()->back()->with('success', 'Reminder added successfully!');
    }
    public function destroy($id)
    {
       
         $dept = Reminder::findOrFail($id);
         $dept->delete();
         return redirect()->back()->with('success', 'Reminder deleted successfully!');

    }
    public function edit(Request $request,$id)
    {
        $reminder = Reminder::findOrFail($id);
     
         return view('reminder.edit', compact('reminder'));
    }
    public function update(Request $request,$id)
{
    $id=$request->id;
    // Validate input
    $request->validate([
        'title' => 'required|string|max:255',
        
    ]);

    $reminder = Reminder::findOrFail($id);

    $isDone = $request->has('is_done') ? 1 : 0;
    $reminder->update([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->reminder_date,
        'time' => $request->reminder_time,
        'is_done' =>  $isDone,
    ]);

    // ✅ Redirect back with a success message
    return redirect()->route('reminders')->with('success', 'reminder updated successfully.');
}



}
