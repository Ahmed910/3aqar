<?php

namespace Database\Seeders;

use App\Models\Frontage;
use Illuminate\Database\Seeder;

class FrontageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frontage::create(['name' => 'north']);
        Frontage::create(['name' => 'east']);
        Frontage::create(['name' => 'west']);
        Frontage::create(['name' => 'south']);
        Frontage::create(['name' => 'Northeast']);
        Frontage::create(['name' => 'Southeast']);
        Frontage::create(['name' => 'Southwest']);
        Frontage::create(['name' => 'Northwest']);
        //Northeast
    }
}
