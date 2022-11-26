<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('add_lab_details', function (Blueprint $table) {
            $table->id();
            $table->string('labName');
            $table->string('licenseNumber')->unique();
            $table->string('emailAddress')->unique();
            $table->string('managerName');
            $table->string('ContactNumber')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('Address');
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        //
    }
};
