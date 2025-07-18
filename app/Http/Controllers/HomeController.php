<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Device;
use App\Models\Reminder;
class HomeController extends Controller
{
    public function index()
    {
        $dept_count =Department::count();
        $device_count =Device::count();
        $rem_count =Reminder::count();
        $pasw_count =Department::count();

        return view('admin.dashboard',compact('dept_count','device_count','rem_count','pasw_count'));
    }
}
