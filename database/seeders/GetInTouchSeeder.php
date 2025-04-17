<?php

namespace Database\Seeders;

use App\Models\GetInTouch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GetInTouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GetInTouch::factory()->count(20)->create();
    }
}
