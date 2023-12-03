<?php

namespace Database\Seeders;

use App\Models\Stop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $stop = 1;

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);

        Stop::create([
            'user_id' => $user->id,
            'lat' => rand(39,40),
            'lng' => rand(39,40),
            'stop_number' => $stop++,
            'price' => 50,
            'date_time' => Carbon::now(),
        ]);
    }
}
