<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'publisher',
        'year',
        'description',
        'sku',
        'price',
        'quantity',
    ];

    public function sale()
    {
        return $this->hasOne('App\Sale', 'foreign_key');
    }
}