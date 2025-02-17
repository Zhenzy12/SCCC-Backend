<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfAssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_of_assistance')->insert([
            ['id' => 1, 'assistance' => 'Medical Assistance'],
            ['id' => 2, 'assistance' => 'Police Assistance'],
            ['id' => 3, 'assistance' => 'Fire Assistance'],
            ['id' => 4, 'assistance' => 'Rescue Assistance'],
            ['id' => 5, 'assistance' => 'General Assistance'],
            ['id' => 6, 'assistance' => 'Others'],
        ]);
    }
}
