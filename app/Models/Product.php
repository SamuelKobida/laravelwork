<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at'
    ];

    public function invoice_items(){
        return $this->hasMany('App\Models\Invoice_item');
    }
}
