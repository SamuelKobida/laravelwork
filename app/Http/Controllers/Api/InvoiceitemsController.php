<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice_item;
use Illuminate\Http\Request;


class InvoiceitemsController extends Controller
{
    public function invoiceitems($id) {
        $invoice_items = Invoice_item::all();
        return $invoice_items->whereIn('invoice_id', [$id]);
    }
    public function store(Request $request)
    {
        $invoice_items = Invoice_item::create($request->all());
        $invoice_items->save();
    }


    public function delete($id)
    {
        $invoice_items = Invoice_item::findOrFail($id);
        $invoice_items->delete();
    }

}
