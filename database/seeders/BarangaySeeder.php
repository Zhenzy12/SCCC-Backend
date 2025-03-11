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
            ['name' => 'Hillside', 'latitude' => 16.3966, 'longitude' => 120.6047],
            ['name' => 'Holy Ghost Extension', 'latitude' => 16.4166, 'longitude' => 120.6040],
            ['name' => 'Holy Ghost Proper', 'latitude' => 16.4168, 'longitude' => 120.6008],
            ['name' => 'Honeymoon', 'latitude' => 16.4193, 'longitude' => 120.6008],
            ['name' => 'Imelda R. Marcos', 'latitude' => 16.4002, 'longitude' => 120.5894],
            ['name' => 'Imelda Village', 'latitude' => 16.4188, 'longitude' => 120.6056],
            ['name' => 'Irisan', 'latitude' => 16.4203, 'longitude' => 120.5568],
            ['name' => 'Kabayanihan', 'latitude' => 16.4147, 'longitude' => 120.5969],
            ['name' => 'Kagitingan', 'latitude' => 16.4160, 'longitude' => 120.5966],
            ['name' => 'Kayang Extension', 'latitude' => 16.4144, 'longitude' => 120.5896],
            ['name' => 'Kayang-Hilltop', 'latitude' => 16.4154, 'longitude' => 120.5942],
            ['name' => 'Kias', 'latitude' => 16.3675, 'longitude' => 120.6316],
            ['name' => 'Legarda-Burnham-Kisad', 'latitude' => 16.4072, 'longitude' => 120.5948],
            ['name' => 'Liwanag-Loakan', 'latitude' => 16.3861, 'longitude' => 120.6099],
            ['name' => 'Loakan Proper', 'latitude' => 16.3761, 'longitude' => 120.6176],
            ['name' => 'Lopez Jaena', 'latitude' => 16.4259, 'longitude' => 120.6035],
            ['name' => 'Lourdes Subdivision Extension', 'latitude' => 16.4121, 'longitude' => 120.5843],
            ['name' => 'Lourdes Subdivision, Lower', 'latitude' => 16.4102, 'longitude' => 120.5851],
            ['name' => 'Lourdes Subdivision, Proper', 'latitude' => 16.4107, 'longitude' => 120.5828],
            ['name' => 'Lualhati', 'latitude' => 16.4137, 'longitude' => 120.6201],
            ['name' => 'Lucnab', 'latitude' => 16.4048, 'longitude' => 120.6294],
            ['name' => 'Magsaysay Private Road', 'latitude' => 16.4241, 'longitude' => 120.5934],
            ['name' => 'Magsaysay, Lower', 'latitude' => 16.4208, 'longitude' => 120.5928],
            ['name' => 'Magsaysay, Upper', 'latitude' => 16.4167, 'longitude' => 120.5956],
            ['name' => 'Malcolm Square-Perfecto', 'latitude' => 16.4139, 'longitude' => 120.5960],
            ['name' => 'Manuel A. Roxas', 'latitude' => 16.4150, 'longitude' => 120.6079],
            ['name' => 'Market Subdivision, Upper', 'latitude' => 16.4167, 'longitude' => 120.5942],
            ['name' => 'Middle Quezon Hill Subdivision', 'latitude' => 16.4163, 'longitude' => 120.5747],
            ['name' => 'Military Cut-off', 'latitude' => 16.4037, 'longitude' => 120.6005],
            ['name' => 'Mines View Park', 'latitude' => 16.4240, 'longitude' => 120.6262],
            ['name' => 'Modern Site, East', 'latitude' => 16.4219, 'longitude' => 120.6063],
            ['name' => 'Modern Site, West', 'latitude' => 16.4228, 'longitude' => 120.6031],
            ['name' => 'MRR-Queen of Peace', 'latitude' => 16.4130, 'longitude' => 120.5871],
            ['name' => 'New Lucban', 'latitude' => 16.4224, 'longitude' => 120.5959],
            ['name' => 'Outlook Drive', 'latitude' => 16.4110, 'longitude' => 120.6273],
            ['name' => 'Pacdal', 'latitude' => 16.4168, 'longitude' => 120.6151],
            ['name' => 'Padre Burgos', 'latitude' => 16.4199, 'longitude' => 120.5919],
            ['name' => 'Padre Zamora', 'latitude' => 16.4184, 'longitude' => 120.5922],
            ['name' => 'Palma-Urbano', 'latitude' => 16.4129, 'longitude' => 120.5894],
            ['name' => 'Phil-Am', 'latitude' => 16.4004, 'longitude' => 120.5940],
            ['name' => 'Pinget', 'latitude' => 16.4268, 'longitude' => 120.5852],
            ['name' => 'Pinsao Pilot Project', 'latitude' => 16.4276, 'longitude' => 120.5812],
            ['name' => 'Pinsao Proper', 'latitude' => 16.4265, 'longitude' => 120.5738],
            ['name' => 'Poliwes', 'latitude' => 16.3960, 'longitude' => 120.5995],
            ['name' => 'Pucsusan', 'latitude' => 16.4164, 'longitude' => 120.6294],
            ['name' => 'Quezon Hill Proper', 'latitude' => 16.4146, 'longitude' => 120.5821],
            ['name' => 'Quezon Hill, Upper', 'latitude' => 16.4167, 'longitude' => 120.5760],
            ['name' => 'Victoria Village', 'latitude' => 16.4142, 'longitude' => 120.5761]
        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }
    }
}
