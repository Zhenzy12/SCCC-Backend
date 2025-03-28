<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Electronics', 'deleted_by' => null],
            ['category_name' => 'Office Supplies', 'deleted_by' => null],
            ['category_name' => 'Furniture', 'deleted_by' => null],
            ['category_name' => 'Books', 'deleted_by' => null],
            ['category_name' => 'Stationery', 'deleted_by' => null],
            ['category_name' => 'Audio Equipment', 'deleted_by' => null],
            ['category_name' => 'Networking Devices', 'deleted_by' => null],
            ['category_name' => 'Storage Equipment', 'deleted_by' => null],
            ['category_name' => 'Cleaning Supplies', 'deleted_by' => null],
            ['category_name' => 'Tools & Hardware', 'deleted_by' => null],
        ];

        DB::table('categories')->insert($categories);
    }
}
