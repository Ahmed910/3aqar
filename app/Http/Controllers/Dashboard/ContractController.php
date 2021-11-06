<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::latest()->paginate(100);
        return view('dashboard.contract.index',compact('contracts'));
    }

    public function show(Contract $contract)
    {
        if (!request()->ajax()) {
           return view('dashboard.contract.show',compact('contract'));
        }
    }

    public function destroy(Contract $contract)
    {
        if ($contract->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
