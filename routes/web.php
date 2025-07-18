<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserdetailController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard');
 
  
});

require __DIR__.'/auth.php';
Route::middleware('user_auth')->group(function () {

 Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
 Route::post('/departments/{id} ', [DepartmentController::class, 'update'])->name('departments.update');
 Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
 Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'] )->name('departments.destroy');

 Route::get('/reminders', [ReminderController::class, 'index'])->name('reminders');
 Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'] )->name('reminders.destroy');
 Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');
 Route::get('/reminders/create', [ReminderController::class, 'create'])->name('reminders.create');
 Route::get('/reminders/{reminder}/edit', [ReminderController::class, 'edit'])->name('reminders.edit');
 Route::post('/reminders/{id} ', [ReminderController::class, 'update'])->name('reminders.update');

 Route::get('/devices', [DeviceController::class, 'index'])->name('devices');
 Route::get('/devices/create', [DeviceController::class, 'create'])->name('devices.create');
 Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
 Route::get('/devices/{devices}/edit', [DeviceController::class, 'edit'])->name('devices.edit');
 Route::post('/devices/{id} ', [DeviceController::class, 'update'])->name('devices.update');
 Route::delete('/devices/{id}', [DeviceController::class, 'destroy'] )->name('devices.destroy');

 Route::get('/userdetails', [UserdetailController::class, 'index'])->name('userdetails');
 Route::get('/userdetails/create', [UserdetailController::class, 'create'])->name('userdetails.create');
Route::post('/userdetails', [UserdetailController::class, 'store'])->name('userdetails.store');
 Route::get('/userdetails/{userdetails}/edit', [UserdetailController::class, 'edit'])->name('userdetails.edit');
  Route::post('/userdetails/{id} ', [UserdetailController::class, 'update'])->name('userdetails.update');
   Route::delete('/userdetails/{id}', [UserdetailController::class, 'destroy'] )->name('userdetails.destroy');
});
