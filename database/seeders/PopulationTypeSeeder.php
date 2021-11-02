<?php

namespace Database\Seeders;

use App\Models\PopulationType;
use Illuminate\Database\Seeder;

class PopulationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PopulationType::create(['name' => 'families']);
        PopulationType::create(['name' => 'singles']);
    }
}
