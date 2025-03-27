<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BorrowTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $borrowDate = Carbon::now()->subDays(rand(5, 30));
            $returnDate = null;

            DB::table('borrow_transactions')->insert([
                'borrower_id' => rand(1, 10),
                'borrow_date' => $borrowDate,
                'return_date' => $returnDate,
                'lender_id' => rand(1, 10),
                'remarks' => 'Remark-' . Str::random(15),
                'isc' => 'ISC-' . Str::random(5),
            ]);
        }
    }
}
