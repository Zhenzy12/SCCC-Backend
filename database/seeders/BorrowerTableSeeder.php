<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BorrowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('borrowers')->insert([
                'borrowers_name' => 'Borrower-' . Str::random(8),
                'borrowers_contact' => rand(100, 999) . '-' . rand(100, 999) . '-' . rand(1000, 9999),
                'office_id' => rand(1, 10),
                'deleted_by' => rand(1, 10),
            ]);
        }
    }
}
