<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Source;
use App\Models\Incident;
use App\Models\Barangay;
use App\Models\ActionsTaken;
use App\Models\TypeOfAssistance;
use App\Models\Report;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Report::class;
     
    public function definition(): array
    {
        // return [
        //     'time' => $this->faker->time(),
        //     'date_received' => $this->faker->date(),
        //     'arrival_on_site' => $this->faker->dateTime(),
        //     'name' => $this->faker->name(),
        //     'landmark' => $this->faker->streetName(),
        //     // Get a random barangay ID and its corresponding longitude and latitude
        //     'barangay_id' => $barangayId = Barangay::inRandomOrder()->value('id') ?: 1,
        //     'longitude' => Barangay::find($barangayId)->longitude, // Use longitude from the selected barangay
        //     'latitude' => Barangay::find($barangayId)->latitude, // Use latitude from the selected barangay
        //     'source_id' => Source::inRandomOrder()->value('id') ?: 1,
        //     'incident_id' => Incident::inRandomOrder()->value('id') ?: 1,
        //     'actions_id' => ActionsTaken::inRandomOrder()->value('id') ?: 1,
        //     'assistance_id' => TypeOfAssistance::inRandomOrder()->value('id') ?: 1,
        // ];
        return [
            'time' => $this->faker->time(),
            'date_received' => $this->faker->date(),
            'arrival_on_site' => $this->faker->dateTime(),
            'name' => $this->faker->name(),
            'landmark' => $this->faker->streetName(),
            
            // Get a random barangay ID
            'barangay_id' => $barangayId = Barangay::inRandomOrder()->value('id') ?: 1,
        
            // Fetch barangay coordinates
            'longitude' => $this->faker->randomFloat(6, 
                Barangay::find($barangayId)->longitude - 0.002, 
                Barangay::find($barangayId)->longitude + 0.002
            ),
            'latitude' => $this->faker->randomFloat(6, 
                Barangay::find($barangayId)->latitude - 0.002, 
                Barangay::find($barangayId)->latitude + 0.002
            ),
        
            'source_id' => Source::inRandomOrder()->value('id') ?: 1,
            'incident_id' => Incident::inRandomOrder()->value('id') ?: 1,
            'actions_id' => ActionsTaken::inRandomOrder()->value('id') ?: 1,
            'assistance_id' => TypeOfAssistance::inRandomOrder()->value('id') ?: 1,
        ];        
    }
}
