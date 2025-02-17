<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('source')->insert([
            ['id' => 1, 'sources' => '911'],
            ['id' => 2, 'sources' => 'CDRRMO'],
            ['id' => 3, 'sources' => 'Icom Radio'],
            ['id' => 4, 'sources' => 'EMS Hotline'],
        ]);
    }
}
