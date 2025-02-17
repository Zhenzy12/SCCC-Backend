<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionsTakenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actions_taken')->insert([
            ['id' => 1, 'actions' => 'Pending'],
            ['id' => 2, 'actions' => 'Referred'],
            ['id' => 3, 'actions' => 'Solved']
        ]);
    }
}
