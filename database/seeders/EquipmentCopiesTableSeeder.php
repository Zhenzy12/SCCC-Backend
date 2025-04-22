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
            ['item_id' => 1, 'is_available' => true, 'copy_num' => 1, 'serial_number' => 'C02Z50G3MD6R'],
            ['item_id' => 2, 'is_available' => false, 'copy_num' => 2, 'serial_number' => '721TAGM4563'],
            ['item_id' => 3, 'is_available' => true, 'copy_num' => 1, 'serial_number' => 'PH1234567890A'],
            ['item_id' => 4, 'is_available' => true, 'copy_num' => 3, 'serial_number' => '1HGCM82633A123456'],
            ['item_id' => 5, 'is_available' => false, 'copy_num' => 2, 'serial_number' => '8935201234567890123'],
            ['item_id' => 6, 'is_available' => true, 'copy_num' => 1, 'serial_number' => 'XXXX-XXXXX-XXXXX-XXXXX-XXXXX'],
            ['item_id' => 7, 'is_available' => false, 'copy_num' => 4, 'serial_number' => 'RUG1234567'],
            ['item_id' => 8, 'is_available' => true, 'copy_num' => 1, 'serial_number' => 'MD1234567'],
            ['item_id' => 9, 'is_available' => true, 'copy_num' => 2, 'serial_number' => 'Copy No. 142 of 500'],
            ['item_id' => 10, 'is_available' => false, 'copy_num' => 3, 'serial_number' => 'LZ123456789PH'],
        ];

        DB::table('equipment_copies')->insert($equipmentCopies);
    }
}
