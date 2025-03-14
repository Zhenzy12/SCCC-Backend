<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            TypeOfAssistanceSeeder::class,
            ActionsTakenSeeder::class,
            SourceSeeder::class,
            IncidentSeeder::class,
            BarangaySeeder::class,

            // seeder for SCCC Inventory System
            UsersTableSeeder::class,
            OfficesTableSeeder::class,
            BorrowerTableSeeder::class,
            BorrowTransactionsTableSeeder::class,
            BorrowTransactionItemsTableSeeder::class,
            CategoriesTableSeeder::class,
            OfficeEquipmentsTableSeeder::class,
            OfficeSuppliesTableSeeder::class,
            EquipmentCopiesTableSeeder::class
        ]);
    }
}
