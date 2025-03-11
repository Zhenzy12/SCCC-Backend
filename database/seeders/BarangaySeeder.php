<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barangay;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $barangays = [
            ['name' => 'A. Bonifacio-Caguioa-Rimando', 'latitude' => 16.4188, 'longitude' => 120.5976],
            ['name' => 'Abanao-Zandueta-Kayong-Chugum-Otek', 'latitude' => 16.4136, 'longitude' => 120.5934],
            ['name' => 'Alfonso Tabora', 'latitude' => 16.4234, 'longitude' => 120.5969],
            ['name' => 'Ambiong', 'latitude' => 16.4288, 'longitude' => 120.6081],
            ['name' => 'Andres Bonifacio', 'latitude' => 16.4174, 'longitude' => 120.5856],
            ['name' => 'Apugan-Loakan', 'latitude' => 16.3828, 'longitude' => 120.6246],
            ['name' => 'Asin Road', 'latitude' => 16.4046, 'longitude' => 120.5636],
            ['name' => 'Atok Trail', 'latitude' => 16.3792, 'longitude' => 120.6307],
            ['name' => 'Aurora Hill Proper', 'latitude' => 16.4245, 'longitude' => 120.6030],
            ['name' => 'Aurora Hill, North Central', 'latitude' => 16.4250, 'longitude' => 120.6048],
            ['name' => 'Aurora Hill, South Central', 'latitude' => 16.4254, 'longitude' => 120.6069],
            ['name' => 'Bagong Lipunan', 'latitude' => 16.4148, 'longitude' => 120.5952],
            ['name' => 'Bakakeng Central', 'latitude' => 16.3960, 'longitude' => 120.5783],
            ['name' => 'Bakakeng North', 'latitude' => 16.3861, 'longitude' => 120.5909],
            ['name' => 'Bal-Marcoville', 'latitude' => 16.4063, 'longitude' => 120.6035],
            ['name' => 'Balsigan', 'latitude' => 16.3990, 'longitude' => 120.5937],
            ['name' => 'Bayan Park East', 'latitude' => 16.4271, 'longitude' => 120.6083],
            ['name' => 'Bayan Park Village', 'latitude' => 16.4274, 'longitude' => 120.6059],
            ['name' => 'Bayan Park West', 'latitude' => 16.4285, 'longitude' => 120.6025],
            ['name' => 'BGH Compound', 'latitude' => 16.3997, 'longitude' => 120.5975],
            ['name' => 'Brookside', 'latitude' => 16.4210, 'longitude' => 120.6018],
            ['name' => 'Brookspoint', 'latitude' => 16.4251, 'longitude' => 120.6091],
            ['name' => 'Cabinet Hill-Teacher\'s Camp', 'latitude' => 16.4110, 'longitude' => 120.6071],
            ['name' => 'Camdas Subdivision', 'latitude' => 16.4273, 'longitude' => 120.5927],
            ['name' => 'Camp 7', 'latitude' => 16.3796, 'longitude' => 120.6024],
            ['name' => 'Camp 8', 'latitude' => 16.3978, 'longitude' => 120.6016],
            ['name' => 'Camp Allen', 'latitude' => 16.4162, 'longitude' => 120.5912],
            ['name' => 'Campo Filipino', 'latitude' => 16.4155, 'longitude' => 120.5874],
            ['name' => 'City Camp Central', 'latitude' => 16.4106, 'longitude' => 120.5863],
            ['name' => 'City Camp Proper', 'latitude' => 16.4108, 'longitude' => 120.5896],
            ['name' => 'Country Club Village', 'latitude' => 16.4052, 'longitude' => 120.6201],
            ['name' => 'Cresencia Village', 'latitude' => 16.4203, 'longitude' => 120.5874],
            ['name' => 'Dagsian, Lower', 'latitude' => 16.3919, 'longitude' => 120.6081],
            ['name' => 'Dagsian, Upper', 'latitude' => 16.3946, 'longitude' => 120.6075],
            ['name' => 'Dizon Subdivision', 'latitude' => 16.4248, 'longitude' => 120.5899],
            ['name' => 'Dominican Hill-Mirador', 'latitude' => 16.4067, 'longitude' => 120.5817],
            ['name' => 'Dontogan', 'latitude' => 16.3818, 'longitude' => 120.5722],
            ['name' => 'DPS Area', 'latitude' => 16.4049, 'longitude' => 120.6049],
            ['name' => 'Engineers\' Hill', 'latitude' => 16.4074, 'longitude' => 120.6021],
            ['name' => 'Fairview Village', 'latitude' => 16.4176, 'longitude' => 120.5808],
            ['name' => 'Ferdinand', 'latitude' => 16.4027, 'longitude' => 120.5915],
            ['name' => 'Fort del Pilar', 'latitude' => 16.3653, 'longitude' => 120.6177],
            ['name' => 'Gabriela Silang', 'latitude' => 16.3943, 'longitude' => 120.6041],
            ['name' => 'General Emilio F. Aguinaldo', 'latitude' => 16.4080, 'longitude' => 120.5899],
            ['name' => 'General Luna, Lower', 'latitude' => 16.4150, 'longitude' => 120.5982],
            ['name' => 'General Luna, Upper', 'latitude' => 16.4132, 'longitude' => 120.6016],
            ['name' => 'Gibraltar', 'latitude' => 16.4182, 'longitude' => 120.6230],
            ['name' => 'Greenwater Village', 'latitude' => 16.4014, 'longitude' => 120.6073],
            ['name' => 'Guisad Central', 'latitude' => 16.4230, 'longitude' => 120.5855],
            ['name' => 'Guisad Sorong', 'latitude' => 16.4203, 'longitude' => 120.5838],
            ['name' => 'Happy Hollow', 'latitude' => 16.3950, 'longitude' => 120.6238],
            ['name' => 'Happy Homes', 'latitude' => 16.4280, 'longitude' => 120.5956],
            ['name' => 'Harrison-Claudio Carantes', 'latitude' => 16.4117, 'longitude' => 120.5971],
        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }
    }
}
