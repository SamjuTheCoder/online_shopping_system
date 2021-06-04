<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName',
        'category',
        'brand',
        'description',
        'qty',
        'price',
        'discount',
        'specialOffer',
        'image',
        'status',
    ];
}
