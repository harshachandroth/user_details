<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('user_details', function (Blueprint $table) {
        $table->id();
       // $table->unsignedBigInteger('department_id')->nullable();
        $table->foreignId('department_id')->references('id')->on('departments');
       // $table->unsignedBigInteger('device_id')->nullable();
        $table->foreignId('device_id')->references('id')->on('devices');
        $table->string('ipaddress')->nullable();
        $table->string('username')->nullable();
        $table->string('password')->nullable();
        $table->string('ssid')->nullable();
        $table->string('wifipassword')->nullable();
        $table->string('adminpassword')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('user_details');
    }
};
