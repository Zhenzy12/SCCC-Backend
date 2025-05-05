<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inbound;
use App\Models\Road;
use App\Models\StatusTraffic;

class InboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roads = Road::all();
        $statuses = StatusTraffic::all();

        foreach ($roads as $road) {
            $randomStatus = $statuses->random();

            Inbound::create([
                'road_id' => $road->id,
                'status_id' => $randomStatus->id,
            ]);
        }
    }
}
