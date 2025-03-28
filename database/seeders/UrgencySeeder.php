<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('urgency')->insert([
            ['id' => 1, 'urgency' => 'Emergent', 'description' => 'Poses an immediate threat to life. Immediate cure/seen by a doctor within 10 minutes.'],
            ['id' => 2, 'urgency' => 'Urgent', 'description' => 'Requiring prompt care, but can wait for hours. Condition that must be treated by a doctor, but need more that 2 resources.'],
            ['id' => 3, 'urgency' => 'Less Urgent', 'description' => 'Condition that must be treated by a Doctor, but need one (1) resources.'],
            ['id' => 4, 'urgency' => 'Non-Urgent', 'description' => 'Condition needs attention, but time is not a critical factor.'],
        ]);
    }
}
