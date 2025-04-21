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
            // // A Barangays === 11 Barangays
            // ['name' => 'A. Bonifacio-Caguioa-Rimando', 'latitude' => 16.4188, 'longitude' => 120.5976],
            // ['name' => 'Abanao-Zandueta-Kayong-Chugum-Otek', 'latitude' => 16.4136, 'longitude' => 120.5934],
            // ['name' => 'Alfonso Tabora', 'latitude' => 16.4234, 'longitude' => 120.5969],
            // ['name' => 'Ambiong', 'latitude' => 16.4288, 'longitude' => 120.6081],
            // ['name' => 'Andres Bonifacio', 'latitude' => 16.4174, 'longitude' => 120.5856],
            // ['name' => 'Apugan-Loakan', 'latitude' => 16.3828, 'longitude' => 120.6246],
            // ['name' => 'Asin Road', 'latitude' => 16.4046, 'longitude' => 120.5636],
            // ['name' => 'Atok Trail', 'latitude' => 16.3792, 'longitude' => 120.6307],
            // ['name' => 'Aurora Hill Proper', 'latitude' => 16.4245, 'longitude' => 120.6030],
            // ['name' => 'Aurora Hill, North Central', 'latitude' => 16.4250, 'longitude' => 120.6048],
            // ['name' => 'Aurora Hill, South Central', 'latitude' => 16.4254, 'longitude' => 120.6069],
            
            // // B Barangays === 11 Barangays
            // ['name' => 'Bagong Lipunan', 'latitude' => 16.4148, 'longitude' => 120.5952],
            // ['name' => 'Bakakeng Central', 'latitude' => 16.3960, 'longitude' => 120.5783],
            // ['name' => 'Bakakeng North', 'latitude' => 16.3861, 'longitude' => 120.5909],
            // ['name' => 'Bal-Marcoville', 'latitude' => 16.4063, 'longitude' => 120.6035],
            // ['name' => 'Balsigan', 'latitude' => 16.3990, 'longitude' => 120.5937],
            // ['name' => 'Bayan Park East', 'latitude' => 16.4271, 'longitude' => 120.6083],
            // ['name' => 'Bayan Park Village', 'latitude' => 16.4274, 'longitude' => 120.6059],
            // ['name' => 'Bayan Park West', 'latitude' => 16.4285, 'longitude' => 120.6025],
            // ['name' => 'BGH Compound', 'latitude' => 16.3997, 'longitude' => 120.5975],
            // ['name' => 'Brookside', 'latitude' => 16.4210, 'longitude' => 120.6018],
            // ['name' => 'Brookspoint', 'latitude' => 16.4251, 'longitude' => 120.6091],

            // // C Barangays === 10 Barangays
            // ['name' => 'Cabinet Hill-Teacher\'s Camp', 'latitude' => 16.4110, 'longitude' => 120.6071],
            // ['name' => 'Camdas Subdivision', 'latitude' => 16.4273, 'longitude' => 120.5927],
            // ['name' => 'Camp 7', 'latitude' => 16.3796, 'longitude' => 120.6024],
            // ['name' => 'Camp 8', 'latitude' => 16.3978, 'longitude' => 120.6016],
            // ['name' => 'Camp Allen', 'latitude' => 16.4162, 'longitude' => 120.5912],
            // ['name' => 'Campo Filipino', 'latitude' => 16.4155, 'longitude' => 120.5874],
            // ['name' => 'City Camp Central', 'latitude' => 16.4106, 'longitude' => 120.5863],
            // ['name' => 'City Camp Proper', 'latitude' => 16.4108, 'longitude' => 120.5896],
            // ['name' => 'Country Club Village', 'latitude' => 16.4052, 'longitude' => 120.6201],
            // ['name' => 'Cresencia Village', 'latitude' => 16.4203, 'longitude' => 120.5874],

            // // D Barangays === 6 Barangays
            // ['name' => 'Dagsian, Lower', 'latitude' => 16.3919, 'longitude' => 120.6081],
            // ['name' => 'Dagsian, Upper', 'latitude' => 16.3946, 'longitude' => 120.6075],
            // ['name' => 'Dizon Subdivision', 'latitude' => 16.4248, 'longitude' => 120.5899],
            // ['name' => 'Dominican Hill-Mirador', 'latitude' => 16.4067, 'longitude' => 120.5817],
            // ['name' => 'Dontogan', 'latitude' => 16.3818, 'longitude' => 120.5722],
            // ['name' => 'DPS Area', 'latitude' => 16.4049, 'longitude' => 120.6049],

            // // E Barangays === 1 Barangay
            // ['name' => 'Engineers\' Hill', 'latitude' => 16.4074, 'longitude' => 120.6021],

            // // F Barangays === 3 Barangays
            // ['name' => 'Fairview Village', 'latitude' => 16.4176, 'longitude' => 120.5808],
            // ['name' => 'Ferdinand', 'latitude' => 16.4027, 'longitude' => 120.5915],
            // ['name' => 'Fort del Pilar', 'latitude' => 16.3653, 'longitude' => 120.6177],

            // // G Barangays === 8 Barangays
            // ['name' => 'Gabriela Silang', 'latitude' => 16.3943, 'longitude' => 120.6041],
            // ['name' => 'General Emilio F. Aguinaldo', 'latitude' => 16.4080, 'longitude' => 120.5899],
            // ['name' => 'General Luna, Lower', 'latitude' => 16.4150, 'longitude' => 120.5982],
            // ['name' => 'General Luna, Upper', 'latitude' => 16.4132, 'longitude' => 120.6016],
            // ['name' => 'Gibraltar', 'latitude' => 16.4182, 'longitude' => 120.6230],
            // ['name' => 'Greenwater Village', 'latitude' => 16.4014, 'longitude' => 120.6073],
            // ['name' => 'Guisad Central', 'latitude' => 16.4230, 'longitude' => 120.5855],
            // ['name' => 'Guisad Sorong', 'latitude' => 16.4203, 'longitude' => 120.5838],

            // // H Barangays === 7 Barangays
            // ['name' => 'Happy Hollow', 'latitude' => 16.3950, 'longitude' => 120.6238],
            // ['name' => 'Happy Homes', 'latitude' => 16.4280, 'longitude' => 120.5956],
            // ['name' => 'Harrison-Claudio Carantes', 'latitude' => 16.4117, 'longitude' => 120.5971],
            // ['name' => 'Hillside', 'latitude' => 16.3966, 'longitude' => 120.6047],
            // ['name' => 'Holy Ghost Extension', 'latitude' => 16.4166, 'longitude' => 120.6040],
            // ['name' => 'Holy Ghost Proper', 'latitude' => 16.4168, 'longitude' => 120.6008],
            // ['name' => 'Honeymoon', 'latitude' => 16.4193, 'longitude' => 120.6008],

            // // I Barangays === 3 Barangays
            // ['name' => 'Imelda R. Marcos', 'latitude' => 16.4002, 'longitude' => 120.5894],
            // ['name' => 'Imelda Village', 'latitude' => 16.4188, 'longitude' => 120.6056],
            // ['name' => 'Irisan', 'latitude' => 16.4203, 'longitude' => 120.5568],

            // // K Barangays === 5 Barangays
            // ['name' => 'Kabayanihan', 'latitude' => 16.4147, 'longitude' => 120.5969],
            // ['name' => 'Kagitingan', 'latitude' => 16.4160, 'longitude' => 120.5966],
            // ['name' => 'Kayang Extension', 'latitude' => 16.4144, 'longitude' => 120.5896],
            // ['name' => 'Kayang-Hilltop', 'latitude' => 16.4154, 'longitude' => 120.5942],
            // ['name' => 'Kias', 'latitude' => 16.3675, 'longitude' => 120.6316],

            // // L Barangays === 9 Barangays
            // ['name' => 'Legarda-Burnham-Kisad', 'latitude' => 16.4072, 'longitude' => 120.5948],
            // ['name' => 'Liwanag-Loakan', 'latitude' => 16.3861, 'longitude' => 120.6099],
            // ['name' => 'Loakan Proper', 'latitude' => 16.3761, 'longitude' => 120.6176],
            // ['name' => 'Lopez Jaena', 'latitude' => 16.4259, 'longitude' => 120.6035],
            // ['name' => 'Lourdes Subdivision Extension', 'latitude' => 16.4121, 'longitude' => 120.5843],
            // ['name' => 'Lourdes Subdivision, Lower', 'latitude' => 16.4102, 'longitude' => 120.5851],
            // ['name' => 'Lourdes Subdivision, Proper', 'latitude' => 16.4107, 'longitude' => 120.5828],
            // ['name' => 'Lualhati', 'latitude' => 16.4137, 'longitude' => 120.6201],
            // ['name' => 'Lucnab', 'latitude' => 16.4048, 'longitude' => 120.6294],

            // // M Barangays === 12 Barangays
            // ['name' => 'Magsaysay Private Road', 'latitude' => 16.4241, 'longitude' => 120.5934],
            // ['name' => 'Magsaysay, Lower', 'latitude' => 16.4208, 'longitude' => 120.5928],
            // ['name' => 'Magsaysay, Upper', 'latitude' => 16.4167, 'longitude' => 120.5956],
            // ['name' => 'Malcolm Square-Perfecto', 'latitude' => 16.4139, 'longitude' => 120.5960],
            // ['name' => 'Manuel A. Roxas', 'latitude' => 16.4150, 'longitude' => 120.6079],
            // ['name' => 'Market Subdivision, Upper', 'latitude' => 16.4167, 'longitude' => 120.5942],
            // ['name' => 'Middle Quezon Hill Subdivision', 'latitude' => 16.4163, 'longitude' => 120.5747],
            // ['name' => 'Military Cut-off', 'latitude' => 16.4037, 'longitude' => 120.6005],
            // ['name' => 'Mines View Park', 'latitude' => 16.4240, 'longitude' => 120.6262],
            // ['name' => 'Modern Site, East', 'latitude' => 16.4219, 'longitude' => 120.6063],
            // ['name' => 'Modern Site, West', 'latitude' => 16.4228, 'longitude' => 120.6031],
            // ['name' => 'MRR-Queen of Peace', 'latitude' => 16.4130, 'longitude' => 120.5871],

            // // N Barangays === 1 Barangay
            // ['name' => 'New Lucban', 'latitude' => 16.4224, 'longitude' => 120.5959],

            // // O Barangays === 1 Barangay
            // ['name' => 'Outlook Drive', 'latitude' => 16.4110, 'longitude' => 120.6273],

            // // P Barangays === 10 Barangays
            // ['name' => 'Pacdal', 'latitude' => 16.4168, 'longitude' => 120.6151],
            // ['name' => 'Padre Burgos', 'latitude' => 16.4199, 'longitude' => 120.5919],
            // ['name' => 'Padre Zamora', 'latitude' => 16.4184, 'longitude' => 120.5922],
            // ['name' => 'Palma-Urbano', 'latitude' => 16.4129, 'longitude' => 120.5894],
            // ['name' => 'Phil-Am', 'latitude' => 16.4004, 'longitude' => 120.5940],
            // ['name' => 'Pinget', 'latitude' => 16.4268, 'longitude' => 120.5852],
            // ['name' => 'Pinsao Pilot Project', 'latitude' => 16.4276, 'longitude' => 120.5812],
            // ['name' => 'Pinsao Proper', 'latitude' => 16.4265, 'longitude' => 120.5738],
            // ['name' => 'Poliwes', 'latitude' => 16.3960, 'longitude' => 120.5995],
            // ['name' => 'Pucsusan', 'latitude' => 16.4164, 'longitude' => 120.6294],

            // // Q Barangays === 7 Barangays
            // ['name' => 'Quezon Hill Proper', 'latitude' => 16.4146, 'longitude' => 120.5821],
            // ['name' => 'Quezon Hill, Upper', 'latitude' => 16.4167, 'longitude' => 120.5760],
            // ['name' => 'Quirino Hill, East', 'latitude' => 16.4310, 'longitude' => 120.5934],
            // ['name' => 'Quirino Hill, Lower', 'latitude' => 16.4310, 'longitude' => 120.5934],
            // ['name' => 'Quirino Hill, Middle', 'latitude' => 16.4273, 'longitude' => 120.5896],
            // ['name' => 'Quirino Hill, West', 'latitude' => 16.4308, 'longitude' => 120.5892],
            // ['name' => 'Quirino-Magsaysay, Upper', 'latitude' => 16.4050, 'longitude' => 120.5899],

            // // R Barangays === 4 Barangay
            // ['name' => 'Rizal Monument Area', 'latitude' => 16.4128, 'longitude' => 120.5918],
            // ['name' => 'Rock Quarry, Lower', 'latitude' => 16.4091, 'longitude' => 120.5878],
            // ['name' => 'Rock Quarry, Middle', 'latitude' => 16.4085, 'longitude' => 120.5859],
            // ['name' => 'Rock Quarry, Upper', 'latitude' => 16.4074, 'longitude' => 120.5877],

            // // S Barangays === 17 Barangay
            // ['name' => 'Saint Joseph Village', 'latitude' => 16.4170, 'longitude' => 120.6106],
            // ['name' => 'Salud Mitra', 'latitude' => 16.4110, 'longitude' => 120.6010],
            // ['name' => 'San Antonio Village', 'latitude' => 16.4265, 'longitude' => 120.6052],
            // ['name' => 'San Luis Village', 'latitude' => 16.4088, 'longitude' => 120.5728],
            // ['name' => 'San Roque Village', 'latitude' => 16.4117, 'longitude' => 120.5804],
            // ['name' => 'San Vicente', 'latitude' => 16.3954, 'longitude' => 120.5968],
            // ['name' => 'Sanitary Camp, North', 'latitude' => 16.4304, 'longitude' => 120.5994],
            // ['name' => 'Sanitary Camp, South', 'latitude' => 16.4272, 'longitude' => 120.5967],
            // ['name' => 'Santa Escolastica', 'latitude' => 16.4006, 'longitude' => 120.6039],
            // ['name' => 'Santo Rosario', 'latitude' => 16.4022, 'longitude' => 120.5851],
            // ['name' => 'Santo Tomas Proper', 'latitude' => 16.3844, 'longitude' => 120.5806],
            // ['name' => 'Santo Tomas School Area', 'latitude' => 16.3704, 'longitude' => 120.5768],
            // ['name' => 'Scout Barrio', 'latitude' => 16.3961, 'longitude' => 120.6084],
            // ['name' => 'Session Road Area', 'latitude' => 16.4095, 'longitude' => 120.5992],
            // ['name' => 'Slaughter House Area', 'latitude' => 16.4202, 'longitude' => 120.5942],
            // ['name' => 'SLU-SVP Housing Village', 'latitude' => 16.3898, 'longitude' => 120.5900],
            // ['name' => 'South Drive', 'latitude' => 16.4079, 'longitude' => 120.6082],

            // // T Barangays === 2 Barangay
            // ['name' => 'Teodora Alonzo', 'latitude' => 16.4198, 'longitude' => 120.5966],
            // ['name' => 'Trancoville', 'latitude' => 16.4244, 'longitude' => 120.5999],

            // // V Barangays === 1 Barangay
            // ['name' => 'Victoria Village', 'latitude' => 16.4142, 'longitude' => 120.5761]
            ['name' => 'A. BONIFACIO-CAGUIOA-RIMANDO (ABCR)', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'ABANAO-ZANDUETA-KAYONG-CHUGUM-OTEK (AZKCO)', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'ALFONSO TABORA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'AMBIONG', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'ANDRES BONIFACIO (LOWER BOKAWKAN)', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'ASIN ROAD', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'ATOK TRAIL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'AURORA HILL PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BAKAKENG CENTRAL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BAKAKENG NORTE/SUR', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BAL-MARCOVILLE (MARCOVILLE)', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BALSIGAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BAYAN PARK EAST', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BAYAN PARK VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BGH COMPOUND', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BROOKSIDE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'BROOKSPOINT', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CABINET HIIL T. CAMP', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CAMDAS SUBDIVISION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CAMP 7', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CAMP 8', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CAMP ALLEN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CAMPO FILIPINO', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CITY CAMP CENTRAL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CITY CAMP PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'COUNTRY CLUB VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'CRESENCIA VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'DIZON SUBDIVISION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'DOMINICAN-MIRADOR', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'DONTOGAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'DPS COMPOUND', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'EAST MODERN SITE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'EAST QUIRINO HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'ENGINEERS HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'FAIRVIEW', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'FERDINAND', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'FORT DEL PILAR', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'GABRIELA SILANG', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'GEFA (LOWER Q.M).', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'GIBRALTAR', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'GREEN WATER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'GUISAD CENTRAL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'GUISAD SURONG', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HAPPY HOLLOW', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HAPPY HOMES-LUCBAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HARRISON-CARRANTES', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HILLSIDE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HOLYGHOST EXTENSION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HOLYGHOST PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'HONEYMOON-HOLYGHOST', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'IMELDA MARCOS', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'IMELDA VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'IRISAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'KABAYANIHAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'KAGITINGAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'KAYANG EXTENSION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'KAYANG HILLTOP', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'KIAS', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LEGARDA-BURNHAM-KISAD', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOAKAN APUGAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOAKAN LIWANAG', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOAKAN PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOPEZ JAENA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOURDES SUBDIVISION EXTENSION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOURDES SUBDIVISION PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOWER DAGSIAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOWER GENERAL LUNA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOWER LOURDES SUBDIVISION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOWER MAGSAYSAY', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOWER QUIRINO HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LOWER ROCK QUARRY', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LUALHATI', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'LUCNAB', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MAGSAYSAY PRIVATE RD.', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MALCOLM SQUARE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MANUEL ROXAS', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MIDDLE QUEZON HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MIDDLE QUIRINO HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MIDDLE ROCK QUARRY', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MILITARY CUT-OFF', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MINES VIEW PARK', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'MRR-QUEEN OF PEACE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'NEW LUCBAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'NORTH CENTRAL AURORA HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'NORTH SANITARY CAMP', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'OUTLOOK DRIVE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PACDAL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PADRE BURGOS', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PADRE ZAMORA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PALMA-URBANO', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PHIL-AM', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PINGET', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PINSAO PILOT PROJECT', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PINSAO PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'POLIWES', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'PUCSUSAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'QUEZON HILL PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'QUIRINO-MAGSAYSAY (UPPER QM)', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'RIZAL MONUMENT', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SAINT JOSEPH VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SALUD MITRA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SAN ANTONIO VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SAN LUIS VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SAN ROQUE VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SAN VICENTE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SANTA ESCOLASTICA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SANTO ROSARIO', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SANTO TOMAS PROPER', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SANTO TOMAS SCHOOL AREA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SCOUT BARRIO', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SESSION ROAD', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SLAUGHTER HOUSE AREA (SANTO NIÑO SLAUGTHER)', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SLU-SVP', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SOUTH CENTRAL AURORA HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SOUTH DRIVE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'SOUTH SANITARY CAMP', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'TEODORA ALONZO', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'TRANCOVILLE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'UPPER DAGSIAN', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'UPPER GENERAL LUNA', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'UPPER MAGSAYSAY', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'UPPER MARKET SUBDIVISION', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'UPPER QUEZON HILL', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'UPPER ROCK QUARRY', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'VICTORIA VILLAGE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'WEST BAYAN PARK', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'WEST MODERNSITE', 'longitude' => 0.0, 'latitude' => 0.0],
            ['name' => 'WEST QUIRINO HILL', 'longitude' => 0.0, 'latitude' => 0.0]
        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }
    }
}
