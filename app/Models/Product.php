<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'old_price',
        'new_price',
        'weight',
        'stock',
        'description',
        'image',
        'review_1',
        'review_2',
        'review_3',
        'cartificate_1',
        'cartificate_2',
        'cartificate_3'
      
    ];
}
