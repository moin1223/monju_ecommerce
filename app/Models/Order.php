<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'mobile_no',
        'sub_total',
        'delivery_charge',
        'discount',
        'grand_total',
        'status',
      
    ];
     // Relationship to OrderItem
     public function items()
     {
         return $this->hasMany(OrderItem::class);
     }
}
