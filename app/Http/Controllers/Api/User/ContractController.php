<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Contracts\ContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function createContract(ContractRequest $request)
    {
        Contract::create($request->validated());
        return response()->json(['data'=>null,'status'=>'success','message'=>trans('api.messages.contract_created_successfully')]);
    }
}
