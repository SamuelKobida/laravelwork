<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        $customer->save();
    }


    public function customers()
    {
        $customers = Customer::all();
        return $customers;
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

    }
}
