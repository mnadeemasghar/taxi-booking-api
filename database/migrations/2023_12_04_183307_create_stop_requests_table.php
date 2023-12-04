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
        Schema::create('stop_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stop_id');
            $table->foreign('stop_id')->on('stops')->references('id')->cascadeOnDelete();
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->on('bookings')->references('id')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stop_requests');
    }
};
