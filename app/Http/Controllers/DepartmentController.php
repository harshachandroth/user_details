<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
     public function index()
    {
        $department =Department::orderBy('id', 'asc')->get();
        return view('department.department',compact('department'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
             'name' => 'required|string|max:255',
            'floor'=>'required'
        ]);
         Department::create([
        'name' => $request->name,
        'floor_no' => $request->floor,
         ]);
     return redirect()->back()->with('success', 'Department added successfully!');
    }
    public function destroy($id)
    {
       
         $dept = Department::findOrFail($id);
         $dept->delete();
         return redirect()->back()->with('success', 'Department deleted successfully!');

    }
    public function update(Request $request,$id)
{
    $id=$request->dept_id;
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'floor' => 'required',
    ]);

    // Find the department
    $department = Department::findOrFail($id);

    // Update department details
    $department->update([
        'name' => $request->name,
        'floor_no' => $request->floor,
    ]);

    // ✅ Redirect back with a success message
    return redirect()->back()->with('success', 'Department updated successfully.');
}


}
