<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomFacility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::factory(2)->has(RoomFacility::factory(2))->create();
    }
}
