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
            ['supply_name' => 'Bond Paper', 'supply_description' => 'A4 size white paper for printing', 'serial_number' => 'BP-123456', 'category_id' => 5, 'supply_quantity' => 500],
            ['supply_name' => 'Ballpoint Pens', 'supply_description' => 'Black ink pens for office use', 'serial_number' => 'BP-654321', 'category_id' => 5, 'supply_quantity' => 200],
            ['supply_name' => 'Stapler', 'supply_description' => 'Heavy-duty stapler for office documents', 'serial_number' => 'ST-789012', 'category_id' => 2, 'supply_quantity' => 50],
            ['supply_name' => 'Paper Clips', 'supply_description' => 'Assorted sizes of paper clips', 'serial_number' => 'PC-345678', 'category_id' => 5, 'supply_quantity' => 1000],
            ['supply_name' => 'Whiteboard Markers', 'supply_description' => 'Set of dry-erase markers', 'serial_number' => 'WM-901234', 'category_id' => 4, 'supply_quantity' => 100],
            ['supply_name' => 'Sticky Notes', 'supply_description' => 'Colorful sticky notes for reminders', 'serial_number' => 'SN-567890', 'category_id' => 5, 'supply_quantity' => 300],
            ['supply_name' => 'Correction Tape', 'supply_description' => 'Quick-dry correction tape for mistakes', 'serial_number' => 'CT-112233', 'category_id' => 5, 'supply_quantity' => 150],
            ['supply_name' => 'Folders', 'supply_description' => 'Standard legal-size document folders', 'serial_number' => 'FD-445566', 'category_id' => 2, 'supply_quantity' => 400],
            ['supply_name' => 'Highlighters', 'supply_description' => 'Pack of assorted color highlighters', 'serial_number' => 'HL-778899', 'category_id' => 5, 'supply_quantity' => 250],
            ['supply_name' => 'Envelopes', 'supply_description' => 'Brown legal envelopes for documents', 'serial_number' => 'EV-332211', 'category_id' => 2, 'supply_quantity' => 600],
        ];

        DB::table('office_supplies')->insert($officeSupplies);
    }
}
