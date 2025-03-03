<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstName' => 'User',
            'middleName' => 'Example',
            'lastName' => 'Example',
            'email' => 'user@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'for_911' => 1,
            'for_inventory' => 1,
        ]);

        for ($i = 0; $i < 10; $i++) {
            $email_verified = rand(0, 1);

            DB::table('users')->insert([
                'firstName' => Str::random(8),
                'middleName' => Str::random(8),
                'lastName' => Str::random(8),
                'email' => Str::random(8) . '@example.com',
                'email_verified_at' => $email_verified ? Carbon::now() : null,
                'password' => Hash::make('password123'),
                'for_911' => rand(0, 1),
                'for_inventory' => rand(0, 1),
            ]);
        }
    }
}
