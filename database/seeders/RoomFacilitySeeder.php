<?php

namespace Database\Seeders;

use App\Models\RoomFacility;
use App\Models\RoomType;
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
        RoomType::factory(2)->has(RoomFacility::factory(2))->create();
    }
}
