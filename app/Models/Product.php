<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['product_name', 'image', 'brand_id', 'description', 'gender', 'stock', 'price', 'order_date'];

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
