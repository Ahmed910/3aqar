<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Frontage;
use App\Models\Period;
use App\Models\PopulationType;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = Feature::all();
        // $frontages = Frontage::all();
        // $apartment_sale = Category::create(['name' => 'apartment','type'=>'sale']);
        // $apartment_sale->features()->sync($features);
        // $apartment_sale->frontages()->sync($frontages);

        $periods = Period::all();
        $population_types = PopulationType::all();

        $apartment_rent = Category::create(['name' => 'apartment','type'=>'rent']);
        $apartment_rent->periods()->sync($periods);
        $apartment_rent->population_types()->sync($population_types);
        $apartment_rent->features()->sync($features);
    }
}
