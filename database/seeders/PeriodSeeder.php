<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::create(['name'=>'daily','name_ar'=>'يومي']);
        Period::create(['name'=>'monthly','name_ar'=>'شهري']);
        Period::create(['name'=>'yearly','name_ar'=>'سنوي']);
    }
}
