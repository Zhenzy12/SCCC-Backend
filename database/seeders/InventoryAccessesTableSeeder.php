<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryAccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $inventoryAccesses = [
            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 1,
            ],
            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 2,
            ],
            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 3,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 4,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 5,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 6,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 7,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 8,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 9,
            ],

            [
                'for_dashboard' => true,
                'for_inventory' => true,
                'for_offices' => true,
                'for_categories' => true,
                'for_borrowers' => true,
                'for_users' => true,
                'user_id' => 10,
            ],
        ];

        DB::table('inventory_accesses')->insert($inventoryAccesses);
    }
}
