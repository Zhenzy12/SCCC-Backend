<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BorrowTransactionItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $isReturned = (bool)rand(0, 1);
            $itemTypes = ['Equipment Copy', 'Office Supply'];

            DB::table('borrow_transaction_items')->insert([
                'transaction_id' => rand(1, 10),
                'item_copy_id' => rand(1, 10),
                'returned' => $isReturned,
                'item_type' => $itemTypes[array_rand($itemTypes)],
            ]);
        }
    }
}
