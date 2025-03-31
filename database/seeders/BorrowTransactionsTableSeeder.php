<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BorrowTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowTransactions = [
            ['borrower_id' => 1, 'borrow_date' => Carbon::now()->subDays(10), 'return_date' => null, 'lender_id' => 3, 'remarks' => 'Laptop borrowed for presentation', 'isc' => 'Michael Joshua Calalo'],
            ['borrower_id' => 2, 'borrow_date' => Carbon::now()->subDays(20), 'return_date' => null, 'lender_id' => 4, 'remarks' => 'Office supplies for finance team', 'isc' => 'Jan Ryan Balassio'],
            ['borrower_id' => 3, 'borrow_date' => Carbon::now()->subDays(15), 'return_date' => null, 'lender_id' => 2, 'remarks' => 'Projector borrowed for training', 'isc' => 'Rie Zhenzy Zumen'],
            ['borrower_id' => 4, 'borrow_date' => Carbon::now()->subDays(25), 'return_date' => null, 'lender_id' => 5, 'remarks' => 'Books for research purposes', 'isc' => 'Oliver Palgue'],
            ['borrower_id' => 5, 'borrow_date' => Carbon::now()->subDays(12), 'return_date' => null, 'lender_id' => 1, 'remarks' => 'Microphone borrowed for event', 'isc' => 'Glenn Baday'],
            ['borrower_id' => 6, 'borrow_date' => Carbon::now()->subDays(18), 'return_date' => null, 'lender_id' => 7, 'remarks' => 'Chairs borrowed for seminar', 'isc' => 'Ronjay Acorda'],
            ['borrower_id' => 7, 'borrow_date' => Carbon::now()->subDays(30), 'return_date' => null, 'lender_id' => 6, 'remarks' => 'Whiteboard borrowed for meeting', 'isc' => 'Vincent Beato'],
            ['borrower_id' => 8, 'borrow_date' => Carbon::now()->subDays(5), 'return_date' => null, 'lender_id' => 8, 'remarks' => 'Printer borrowed for reports', 'isc' => 'Andre Marin'],
            ['borrower_id' => 9, 'borrow_date' => Carbon::now()->subDays(22), 'return_date' => null, 'lender_id' => 9, 'remarks' => 'Camera borrowed for documentation', 'isc' => 'Erynth Eilinger'],
            ['borrower_id' => 10, 'borrow_date' => Carbon::now()->subDays(7), 'return_date' => null, 'lender_id' => 10, 'remarks' => 'Extension cords borrowed for event', 'isc' => 'Rafael Aquino'],
        ];

        DB::table('borrow_transactions')->insert($borrowTransactions);
    }
}
