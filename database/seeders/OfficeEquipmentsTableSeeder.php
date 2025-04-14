<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeEquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officeEquipments = [
            ['equipment_name' => 'Projector', 'equipment_description' => 'High-resolution projector for presentations', 'category_id' => 1, 'isc' => 'Juan Carlo'],
            ['equipment_name' => 'Office Chair', 'equipment_description' => 'Ergonomic office chair with lumbar support', 'category_id' => 3, 'isc' => 'Kardo Carding'],
            ['equipment_name' => 'Printer', 'equipment_description' => 'All-in-one printer with scanning and copying features', 'category_id' => 2, 'isc' => 'Stepping Curry'],
            ['equipment_name' => 'Whiteboard', 'equipment_description' => 'Magnetic whiteboard for brainstorming sessions', 'category_id' => 4, 'isc' => 'Lebron Goat James'],
            ['equipment_name' => 'Microphone', 'equipment_description' => 'Wireless microphone for meetings and events', 'category_id' => 6, 'isc' => 'Hatdog Itlog'],
            ['equipment_name' => 'File Cabinet', 'equipment_description' => 'Steel file cabinet for document storage', 'category_id' => 3, 'isc' => 'Porta Vaga'],
            ['equipment_name' => 'Laminator', 'equipment_description' => 'Thermal laminator for protecting documents', 'category_id' => 5, 'isc' => 'Nilagang Hatdog'],
            ['equipment_name' => 'Conference Table', 'equipment_description' => 'Large wooden conference table for meetings', 'category_id' => 3, 'isc' => 'Jollibee McDo'],
            ['equipment_name' => 'Wi-Fi Router', 'equipment_description' => 'High-speed wireless router for office internet', 'category_id' => 7, 'isc' => 'Siomai Danes'],
            ['equipment_name' => 'Power Strip', 'equipment_description' => 'Surge-protected power strip with multiple outlets', 'category_id' => 10, 'isc' => 'Browny James'],
        ];

        DB::table('office_equipments')->insert($officeEquipments);
    }
}
