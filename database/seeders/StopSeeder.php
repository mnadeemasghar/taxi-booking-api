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
        $users = User::all();
        
        foreach($users as $user){
            $stop = 1;
            $stop_here = rand(5,10);
            while($stop < $stop_here ){
                Stop::create([
                    'user_id' => $user->id,
                    'lat' => rand(31412084, 31410000) / 1000000,
                    'lng' => rand(74214250, 74210000) / 1000000,
                    'stop_number' => $stop++,
                    'price' => rand(20, 100),
                    'date_time' => Carbon::now(),
                ]);
            }
        }
    }
}
