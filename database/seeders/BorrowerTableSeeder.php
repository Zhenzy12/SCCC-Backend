<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowers = [
            ['borrowers_name' => 'Juan Santos', 'borrowers_contact' => '09171234567', 'office_id' => 1, 'deleted_by' => null],
            ['borrowers_name' => 'Maria Reyes', 'borrowers_contact' => '09281234568', 'office_id' => 2, 'deleted_by' => 3],
            ['borrowers_name' => 'Jose Cruz', 'borrowers_contact' => '09391234569', 'office_id' => 3, 'deleted_by' => null],
            ['borrowers_name' => 'Ana Bautista', 'borrowers_contact' => '09471234560', 'office_id' => 4, 'deleted_by' => 2],
            ['borrowers_name' => 'Pedro Garcia', 'borrowers_contact' => '09581234561', 'office_id' => 5, 'deleted_by' => null],
            ['borrowers_name' => 'Rosa Torres', 'borrowers_contact' => '09691234562', 'office_id' => 6, 'deleted_by' => 4],
            ['borrowers_name' => 'Luis Gonzalez', 'borrowers_contact' => '09771234563', 'office_id' => 7, 'deleted_by' => null],
            ['borrowers_name' => 'Carmen Martinez', 'borrowers_contact' => '09881234564', 'office_id' => 8, 'deleted_by' => 1],
            ['borrowers_name' => 'Miguel Lopez', 'borrowers_contact' => '09991234565', 'office_id' => 9, 'deleted_by' => null],
            ['borrowers_name' => 'Elena Fernandez', 'borrowers_contact' => '09181234566', 'office_id' => 10, 'deleted_by' => 5],
        ];

        DB::table('borrowers')->insert($borrowers);
    }
}
