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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->foreign('passenger_id')->on('users')->references('id')->cascadeOnDelete();
            $table->boolean('is_accepted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->enum('status',[
                'requested',        // by passenger
                'accepted',         // by driver
                'reached',          // by driver
                'picked',           // by driver
                'change_requested', // by passenger 
                'changed',          // by driver
                'droped',           // by driver
            ])->default('requested');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
