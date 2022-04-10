<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function customers(Request $request)
    {
        $customer = Customer::create($request->all());
        $customer->save();
    }

    public function products(Request $request)
    {
        $products = Product::create($request->all());
        $products->save();
    }

    public function getproducts()
    {
        $products = Product::all();

        return $products;
    }

    public function getcustomers()
    {
        $customers = Customer::all();

        return $customers;
    }
}
