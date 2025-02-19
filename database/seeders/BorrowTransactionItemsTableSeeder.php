<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowTransactionItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $isReturned = (bool)rand(0);
            $returnDate = null;

            DB::table('borrow_transaction_items')->insert([
                'transaction_id' => rand(1, 10),
                'item_copy_id' => rand(1, 10),
                'returned' => $isReturned,
                'return_date' => $returnDate,
                'item_type' => rand(0, 1) ? 'equipment' : 'supply',
            ]);
        }
    }
}
