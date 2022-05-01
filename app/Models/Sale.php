<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'product_id',
        'quantity',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'client_id');//ou id?
    }
}