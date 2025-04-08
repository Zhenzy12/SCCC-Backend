<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowTransactionItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowTransactionItems = [
            ['transaction_id' => 1, 'item_copy_id' => 2, 'returned' => true, 'item_type' => 'Equipment Copy', 'quantity' => 1],
            ['transaction_id' => 2, 'item_copy_id' => 3, 'returned' => false, 'item_type' => 'Office Supply', 'quantity' => 1],
            ['transaction_id' => 3, 'item_copy_id' => 5, 'returned' => true, 'item_type' => 'Equipment Copy', 'quantity' => 1],
            ['transaction_id' => 4, 'item_copy_id' => 7, 'returned' => false, 'item_type' => 'Office Supply', 'quantity' => 1],
            ['transaction_id' => 5, 'item_copy_id' => 1, 'returned' => true, 'item_type' => 'Equipment Copy', 'quantity' => 1],
            ['transaction_id' => 6, 'item_copy_id' => 4, 'returned' => false, 'item_type' => 'Office Supply', 'quantity' => 1],
            ['transaction_id' => 7, 'item_copy_id' => 6, 'returned' => true, 'item_type' => 'Equipment Copy', 'quantity' => 1],
            ['transaction_id' => 8, 'item_copy_id' => 8, 'returned' => false, 'item_type' => 'Office Supply', 'quantity' => 1],
            ['transaction_id' => 9, 'item_copy_id' => 9, 'returned' => true, 'item_type' => 'Equipment Copy', 'quantity' => 1],
            ['transaction_id' => 10, 'item_copy_id' => 10, 'returned' => false, 'item_type' => 'Office Supply', 'quantity' => 1],
        ];

        DB::table('borrow_transaction_items')->insert($borrowTransactionItems);
    }
}
