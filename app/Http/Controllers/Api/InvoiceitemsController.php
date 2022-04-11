<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InvoiceitemsController extends Controller
{
    public function invoiceitems($id) {
        $invoice_items = DB::select("SELECT * FROM invoice_items LEFT JOIN products ON invoice_items.product_id=products.id LEFT JOIN invoices ON invoice_items.invoice_id=invoices.id", [$id]);
        return $invoice_items;
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
