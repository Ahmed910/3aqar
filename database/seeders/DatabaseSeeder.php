<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'fullname' => "Admin",
            'phone' => "123456789",
            'email' => "admin@info.com",
            'is_active' => 1,
            'is_ban' => 0,
            'email_verified_at' =>now()->addDay(rand(1,6)),
            'password' => '123456789', // secret
            'user_type' => 'superadmin', // secret
            'gender' => 'male', // secret
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            // PeriodSeeder::class,
            // FrontageSeeder::class,
            // ResidenceTypeSeeder::class,
            // FeatureSeeder::class,
            // PopulationTypeSeeder::class,
            // CategorySeeder::class,
            BankAccountSeeder::class,
        ]);
    }
}
