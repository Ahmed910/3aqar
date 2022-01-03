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
        ResidenceType::create(['name' => 'residence','name_ar'=>'سكني']);
        ResidenceType::create(['name' => 'commericial','name_ar'=>'تجاري']);
        ResidenceType::create(['name' => 'commericial residence','name_ar'=>'سكني تجاري']);
    }
}
