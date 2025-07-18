<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\Department;
use App\Models\Device;

class UserdetailController extends Controller
{
    public function index()
    {
        $userdetails =UserDetails::orderBy('id', 'asc')->get();
       // echo "<pre>";print_r($userdetails);die;
        return view('userdetails.userdetails',compact('userdetails'));
    }
    public function create()
    {
          $devices =Device::orderBy('id', 'asc')->get();
          //echo  $devices;die;
         $departments =Department::orderBy('id', 'asc')->get();
        $edit=false;
         return view('userdetails.create',compact('departments','devices','edit')); 
    }
    public function store(Request $request)
    {
        //echo "<pre>";print_r($request);die;
        $request->validate([
             'department_id' => 'required',
            // '' => 'required',
           // 'date'=>'required'
        ]);
        
          UserDetails::create([
        'department_id' => $request->department_id,
        'device_id' => $request->device_id,
        'ssid' => $request->ssid,
        'ipaddress' => $request->ipaddress,
        'wifipassword' => $request->wifipassword,
        'adminpassword' => $request->adminpassword,
        'username'=> $request->username,
        'password'=> $request->password,
       
         ]);
        return redirect()->route('userdetails')->with('success', 'Password added successfully!');
    }
        public function edit(Request $request,$id)
    {
         $devices =Device::orderBy('id', 'asc')->get();
         $departments =Department::orderBy('id', 'asc')->get();
         $userdetails = UserDetails::findOrFail($id);
         $edit=true;
         return view('userdetails.create', compact('userdetails','devices','departments','edit'));
    }
    public function update(Request $request,$id)
{
    //$id=$request->id;
    // Validate input
    $request->validate([
         'department_id' => 'required',
        
    ]);

    $reminder = UserDetails::findOrFail($id);

    $reminder->update([
        'department_id' => $request->department_id,
        'device_id' => $request->device_id,
        'ssid' => $request->ssid,
        'ipaddress' => $request->ipaddress,
        'wifipassword' => $request->wifipassword,
        'adminpassword' => $request->adminpassword,
         'username'=> $request->username,
        'password'=> $request->password,
    ]);
 return redirect()->route('userdetails')->with('success', 'Passwords updated successfully.');
}
public function destroy($id)
    {
       
         $dept = UserDetails::findOrFail($id);
         $dept->delete();
         return redirect()->back()->with('success', 'Password deleted successfully!');

    }
}
