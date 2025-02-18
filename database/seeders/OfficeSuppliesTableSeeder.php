<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('office_supplies')->insert([
                'supply_name' => 'Supply-' . Str::random(6),
                'supply_description' => 'Description for ' . Str::random(8) . ' supply',
                'serial_number' => strtoupper(Str::random(2)) . '-' . rand(100000, 999999),
                'category_id' => rand(1, 10),
                'supply_quantity' => rand(10, 1000),
            ]);
        }
    }
}
