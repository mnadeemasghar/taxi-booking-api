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
        Schema::create('booking_timestamps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->on('bookings')->references('id')->cascadeOnDelete();
            $table->enum('status',[
                'created',          // by driver
                'requested',        // by passenger
                'accepted',         // by driver
                'reached',          // by driver
                'picked',           // by driver
                'change_requested', // by passenger 
                'changed',          // by driver
                'droped',           // by driver
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_timestamps');
    }
};
