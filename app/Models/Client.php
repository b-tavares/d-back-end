<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'email',
    ];

    public function adress()
    {
        return $this->hasOne('App\Models\Adress', 'client_id');
    }

    public function sale()
    {
        return $this->hasMany('App\Models\Sale', 'client_id')->orderBy('created_at', 'DESC');
    }
}