<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officeSupplies = [
            ['supply_name' => 'Bond Paper', 'supply_description' => 'A4 size white paper for printing', 'category_id' => 5, 'supply_quantity' => 500, 'isc' => 'Juan Carlo'],
            ['supply_name' => 'Ballpoint Pens', 'supply_description' => 'Black ink pens for office use', 'category_id' => 5, 'supply_quantity' => 200, 'isc' => 'Kardo Carding'],
            ['supply_name' => 'Stapler', 'supply_description' => 'Heavy-duty stapler for office documents', 'category_id' => 2, 'supply_quantity' => 50, 'isc' => 'Stepping Curry'],
            ['supply_name' => 'Paper Clips', 'supply_description' => 'Assorted sizes of paper clips', 'category_id' => 5, 'supply_quantity' => 1000, 'isc' => 'Lebron Goat James'],
            ['supply_name' => 'Whiteboard Markers', 'supply_description' => 'Set of dry-erase markers', 'category_id' => 4, 'supply_quantity' => 100, 'isc' => 'Hatdog Itlog'],
            ['supply_name' => 'Sticky Notes', 'supply_description' => 'Colorful sticky notes for reminders', 'category_id' => 5, 'supply_quantity' => 300, 'isc' => 'Porta Vaga'],
            ['supply_name' => 'Correction Tape', 'supply_description' => 'Quick-dry correction tape for mistakes', 'category_id' => 5, 'supply_quantity' => 150, 'isc' => 'Nilagang Hatdog'],
            ['supply_name' => 'Folders', 'supply_description' => 'Standard legal-size document folders','category_id' => 2, 'supply_quantity' => 400, 'isc' => 'Jollibee McDo'],
            ['supply_name' => 'Highlighters', 'supply_description' => 'Pack of assorted color highlighters', 'category_id' => 5, 'supply_quantity' => 250, 'isc' => 'Siomai Danes'],
            ['supply_name' => 'Envelopes', 'supply_description' => 'Brown legal envelopes for documents', 'category_id' => 2, 'supply_quantity' => 600, 'isc' => 'Browny James'],
        ];

        DB::table('office_supplies')->insert($officeSupplies);
    }
}
