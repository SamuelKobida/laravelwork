<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table='invoices';
    protected $fillable = [
        'customer_id',
        'discount',
        'total',
        'created_at',
        'updated_at'
    ];

    public function customers(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function invoice_items(){
        return $this->hasMany('App\Models\Invoice_item');
    }
}
