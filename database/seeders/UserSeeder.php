<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'name1',
            'phone' => '+9231234567',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'otp' => rand(100000, 999999),
            'expire_at' => Carbon::now()
        ]);
        User::create([
            'name' => 'name2',
            'phone' => '+9231234566',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'otp' => rand(100000, 999999),
            'expire_at' => Carbon::now()
        ]);
        User::create([
            'name' => 'name3',
            'phone' => '+9231234565',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'otp' => rand(100000, 999999),
            'expire_at' => Carbon::now()
        ]);
        User::create([
            'name' => 'name3',
            'phone' => '+9231234564',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'otp' => rand(100000, 999999),
            'expire_at' => Carbon::now()
        ]);
        User::create([
            'name' => 'name4',
            'phone' => '+9231234563',
            'phone_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'otp' => rand(100000, 999999),
            'expire_at' => Carbon::now()
        ]);
    }
}
