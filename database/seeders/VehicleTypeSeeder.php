<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create(['title'=> 'car']);
        VehicleType::create(['title'=> 'van']);
        VehicleType::create(['title'=> 'bike']);
        VehicleType::create(['title'=> 'rikshaw']);
    }
}
