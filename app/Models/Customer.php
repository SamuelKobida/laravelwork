<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $fillable = [
        'name',
        'adress',
        'phone',
        'created_at',
        'updated_at'
    ];

    public function invoices(){
        return $this->hasMany('App\Models\Invoice');
    }
}
