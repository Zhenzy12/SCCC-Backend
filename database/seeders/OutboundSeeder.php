<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outbound;
use App\Models\Road;
use App\Models\StatusTraffic;

class OutboundSeeder extends Seeder
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

            Outbound::create([
                'road_id' => $road->id,
                'status_id' => $randomStatus->id,
            ]);
        }
    }
}
