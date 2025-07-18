<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
     protected $fillable = ['title', 'date', 'time', 'description','is_done'];
}
