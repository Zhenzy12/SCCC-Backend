<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EquipmentCopiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('equipment_copies')->insert([
                'item_id' => rand(1, 10),
                'is_available' => (bool)rand(0, 1),
                'copy_num'=> rand(1, 10)
            ]);
        }
    }
}
