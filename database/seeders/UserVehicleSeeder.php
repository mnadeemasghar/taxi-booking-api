<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserVehicle;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $vehicleType = VehicleType::first();

        UserVehicle::create([
            "vehicle_type_id" => $vehicleType->id,
            "user_id" => $user->id,
            "make" => "make",
            "model" => "model",
            "year" => "2018",
            "seats" => 4,
            "license_plate" => "LIC-23232",
            "driver_license" => "RJRK222"
        ]);
    }
}
