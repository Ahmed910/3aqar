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
        return BankAccountResource::collection($bank_accounts)->additional(['status'=>'success','message'=>'']);
    }


}
