<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BankAccount\BankAccountResource;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        $bank_accounts = BankAccount::paginate(100);
        return BankAccountResource::collection($bank_accounts)->additional(['status'=>'success','rent_price'=>(double)setting('rent_price'),'sale_price'=>(double)setting('sale_price'),'commericial_rent_aqar_price'=>(double)setting('commericial_aqar_price'),'residential_rent_aqar_price'=>(double)setting('residential_aqar_price'),'message'=>'']);
    }


}
