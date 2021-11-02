<?php

namespace Database\Seeders;

use App\Models\ResidenceType;
use Illuminate\Database\Seeder;

class ResidenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidenceType::create(['name' => 'residence']);
        ResidenceType::create(['name' => 'commericial']);
        ResidenceType::create(['name' => 'commericial residence']);
    }
}
