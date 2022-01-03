<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use App\Http\Requests\Dashboard\BankAccount\BankRequest;

class BankController extends Controller
{
    public function index()
    {
          $banks = BankAccount::latest()->paginate(100);
          return view('dashboard.bank.index',compact('banks'));

    }
    public function create()
    {
      if (!request()->ajax()) {
          return view('dashboard.bank.create');
      }
    }
    public function store(BankRequest $request)
    {
        if (!request()->ajax()) {
              BankAccount::create($request->validated());
           return redirect(route('dashboard.bank.index'))->withTrue(trans('dashboard.messages.success_add'));
        }
    }

    public function edit(BankAccount $bank)
    {
        if (!request()->ajax()) {
            $banks = BankAccount::get()->pluck('bank_name','id');
            return view('dashboard.bank.edit',compact('banks','bank'));
        }
    }
    public function update(BankRequest $request, BankAccount $bank)
    {
        if (!request()->ajax()) {
           $bank->update($request->validated());
           return redirect(route('dashboard.bank.index'))->withTrue(trans('dashboard.messages.success_update'));
        }
    }
    public function destroy(BankAccount $bank)
    {
        if ($bank->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
