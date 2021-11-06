<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create(['account_holder_name'=>'ahmed','bank_name'=>'bank_alahly','account_number'=>'2344','iban_number'=>'4757575']);
        BankAccount::create(['account_holder_name'=>'mohmed','bank_name'=>'bank_enmaa','account_number'=>'3344','iban_number'=>'4457575']);
        BankAccount::create(['account_holder_name'=>'ahmed','bank_name'=>'bank_rag7y','account_number'=>'4390','iban_number'=>'3457575']);

    }
}
