<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute');
    }

    public function images(){
        return $this->hasMany('App\Models\ProductImage');
    }

    public function vendor(){
        return $this->belongsTo('App\Models\Vendor','vendor_id')->with('vendorbusinessdetails');
    }

    public static function getDiscountPrice($product_id){
        $prodDetails = Product::select('product_price', 'product_discount', 'category_id')
        ->where('id', $product_id)
        ->first();
        $prodDetails = json_decode(json_encode($prodDetails),true);

        $catDetails = Category::select('category_discount')
        ->where('id', $prodDetails['category_id'])
        ->first();
        $catDetails = json_decode(json_encode($catDetails),true);

        if($prodDetails['product_discount']>0){
            //discount from admin panel
            $discounted_price = $prodDetails['product_price'] - ($prodDetails['product_price']*$prodDetails['product_discount']/100);
        }
        else if($catDetails['category_discount']>0){
            //discount from category
            $discounted_price = $prodDetails['product_price'] - ($prodDetails['product_price']*$catDetails['category_discount']/100);
        }
        else{
            $discounted_price = 0;
        }
        return $discounted_price;
    }

    public static function getDiscountAttributePrice($product_id, $size){
        $proAttrPrice = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])
        ->first()
        ->toArray();
        $prodDetails = Product::select('product_discount', 'category_id')
        ->where('id', $product_id)
        ->first();
        $prodDetails = json_decode(json_encode($prodDetails),true);

        $catDetails = Category::select('category_discount')
        ->where('id', $prodDetails['category_id'])
        ->first();
        $catDetails = json_decode(json_encode($catDetails),true);

        if($prodDetails['product_discount']>0){
            //discount from admin panel
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price']*$prodDetails['product_discount']/100);
            $discount = $proAttrPrice['price'] - $final_price;
        }
        else if($catDetails['category_discount']>0){
            //discount from category
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price']*$catDetails['category_discount']/100);
            $discount = $proAttrPrice['price'] - $final_price;
        }
        else{
            $final_price = $proAttrPrice['price'];
            $discount = 0;
        }
        return array('product_price'=>$proAttrPrice['price'],'final_price'=>$final_price,'discount'=>$discount);
    }   

    public static function isProductNew($product_id){
        $productIds = Product::select('id')
        ->where('status',1)
        ->orderby('id','Desc')
        ->limit(3)
        ->pluck('id');

        $productIds = json_decode(json_encode($productIds), true);

        // dd($productIds);
        if(in_array($product_id,$productIds)){
            $isProductNew = "Yes";
        }
        else{
            $isProductNew = "No";
        }
        return $isProductNew;
    }
}
