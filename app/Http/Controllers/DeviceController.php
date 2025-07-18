<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
   public function index()
    {
       $devices =Device::orderBy('id', 'asc')->get();
        return view('devices.devices',compact('devices'));
    }
     public function create()
{
    return view('devices.create'); // Blade file to show the form
}
public function store(Request $request)
    {
      // echo "<pre>";print_r($request->devtitle);die;
        $request->validate([
             'devtitle' => 'required|string|max:255',
           // 'date'=>'required'
        ]);
         Device::create([
        'name' => $request->devtitle,
        'description' => $request->devdescription,
        ]);
     return redirect()->route('devices')->with('success', 'Devices added successfully!');
    }
     public function edit(Request $request,$id)
    {
        $devices = Device::findOrFail($id);
       return view('devices.edit', compact('devices'));
    }
    public function update(Request $request,$id)
{
    $id=$request->id;
    // Validate input
   
    $device = Device::findOrFail($id);

      $request->validate([
             'devtitle' => 'required|string|max:255',
           // 'date'=>'required'
        ]);
       $device->update([
        'name' => $request->devtitle,
        'description' => $request->devdescription,
        ]);

    // ✅ Redirect back with a success message
    return redirect()->route('devices')->with('success', 'Device updated successfully.');
}
public function destroy($id)
    {
       
         $dept = Device::findOrFail($id);
         $dept->delete();
         return redirect()->back()->with('success', 'Device deleted successfully!');

    }



}
