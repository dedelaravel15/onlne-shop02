<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'amount',
        'image'
    ];
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
