<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentCopiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipmentCopies = [
            ['item_id' => 1, 'is_available' => true, 'copy_num' => 1],
            ['item_id' => 2, 'is_available' => false, 'copy_num' => 2],
            ['item_id' => 3, 'is_available' => true, 'copy_num' => 1],
            ['item_id' => 4, 'is_available' => true, 'copy_num' => 3],
            ['item_id' => 5, 'is_available' => false, 'copy_num' => 2],
            ['item_id' => 6, 'is_available' => true, 'copy_num' => 1],
            ['item_id' => 7, 'is_available' => false, 'copy_num' => 4],
            ['item_id' => 8, 'is_available' => true, 'copy_num' => 1],
            ['item_id' => 9, 'is_available' => true, 'copy_num' => 2],
            ['item_id' => 10, 'is_available' => false, 'copy_num' => 3],
        ];

        DB::table('equipment_copies')->insert($equipmentCopies);
    }
}
