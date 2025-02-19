<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeEquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('office_equipments')->insert([
                'equipment_name' => 'Equipment-' . Str::random(6),
                'equipment_description' => 'Description for ' . Str::random(8) . ' equipment',
                'category_id' => rand(1, 10),
            ]);
        }
    }
}
