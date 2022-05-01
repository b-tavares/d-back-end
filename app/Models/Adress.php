<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'district',
        'city',
        'state',
        'zipcode',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}