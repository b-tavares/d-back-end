<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'product',
        'quantity',
        'total_price',
        'sale_date',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client', 'foreign_key');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'foreign_key');
    }
}
