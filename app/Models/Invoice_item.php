<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_item extends Model
{
    use HasFactory;
    protected $table='invoice_items';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function invoices(){
        return $this->belongsTo('App\Models\Invoice');
    }

    public function products(){
        return $this->belongsTo('App\Models\Product');
    }
}
