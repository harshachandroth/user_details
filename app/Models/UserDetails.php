<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'ipaddress',
        'ssid',
        'wifipassword',
        'adminpassword',
        'department_id',
        'device_id',
        'username',
        'password'
    ];
    public function department()
    {
       return $this->hasOne(Department::class,'id','department_id');
    }
     public function device()
    {
       return $this->hasOne(Device::class,'id','device_id');
    }
}
