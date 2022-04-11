<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $product->save();
    }

    public function products()
    {
        $products = Product::all();
        return $products;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
