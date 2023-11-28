<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsAttribute extends Model
{
    use HasFactory;

    public static function isStockAvailable($product_id, $size){
        $getProductStock = ProductsAttribute::select('stock')->where(['product_id'=>$product_id, 'size'=>$size])
        ->first();
        return $getProductStock->stock;
    } 
}
