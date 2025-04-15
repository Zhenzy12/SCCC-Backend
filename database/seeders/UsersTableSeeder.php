<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstName' => 'John',
                'middleName' => 'Michael',
                'lastName' => 'Doe',
                'email' => 'john.doe@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 1,
                'for_inventory' => 0,
            ],
            [
                'firstName' => 'Jane',
                'middleName' => 'Elizabeth',
                'lastName' => 'Smith',
                'email' => 'jane.smith@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 0,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'Carlos',
                'middleName' => 'Andres',
                'lastName' => 'Gonzalez',
                'email' => 'carlos.gonzalez@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 1,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'Emily',
                'middleName' => 'Rose',
                'lastName' => 'Johnson',
                'email' => 'emily.johnson@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('p@ssword123'),
                'for_911' => 0,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'David',
                'middleName' => 'William',
                'lastName' => 'Brown',
                'email' => 'david.brown@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 1,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'Laura',
                'middleName' => 'Anne',
                'lastName' => 'Martinez',
                'email' => 'laura.martinez@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 0,
                'for_inventory' => 0,
            ],
            [
                'firstName' => 'Michael',
                'middleName' => 'James',
                'lastName' => 'Wilson',
                'email' => 'michael.wilson@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('p@ssword123'),
                'for_911' => 1,
                'for_inventory' => 0,
            ],
            [
                'firstName' => 'Sophia',
                'middleName' => 'Grace',
                'lastName' => 'Lee',
                'email' => 'sophia.lee@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 0,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'Ethan',
                'middleName' => 'Alexander',
                'lastName' => 'Harris',
                'email' => 'ethan.harris@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('p@ssword123'),
                'for_911' => 1,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'Olivia',
                'middleName' => 'Mae',
                'lastName' => 'Clark',
                'email' => 'olivia.clark@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('p@ssword123'),
                'for_911' => 0,
                'for_inventory' => 1,
            ],
            [
                'firstName' => 'Rafael',
                'middleName' => 'Emperador',
                'lastName' => 'Aquino',
                'email' => 'rafael@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('p@ssword123'),
                'for_911' => 0,
                'for_inventory' => 1,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
