<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function store(Request $request)
    {
        $invoices = Invoice::create($request->all());
        $invoices->save();
    }

    public function storetotal(Request $request,$id)
    {

        $invoice = Invoice::find($id);
        $invoice->total= $request->total;
        $invoice->save();


    }
    public function invoices()
    {
        $invoices = Invoice::all();
        return $invoices;
    }

    public function delete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
    }
}
