<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Stop;
use App\Models\StopRequest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passengers = User::get();
        $stops = Stop::get();

        foreach($passengers as $passenger){
            $booking = Booking::create([
                "passenger_id" => $passenger->id,
            ]);

            foreach($stops as $stop){
                StopRequest::create([
                    "booking_id" => $booking->id,
                    "stop_id" => $stop->id
                ]);
            }
        }
    }
}
