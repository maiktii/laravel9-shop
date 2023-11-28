<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            [
                'id' => 1,
                'section_id' => 2,
                'category_id' => 5,
                'brand_id' => 4,
                'vendor_id'=> 1,
                'admin_id'=> 2,
                'admin_type'=>'vendor',
                'product_name'=>'Samsung Note 10+',
                'product_code'=>'SM10',
                'product_color'=>'Black',
                'product_price'=>'10000000',
                'product_discount'=>10,
                'product_weight'=>500,
                'product_image'=>'',
                'product_video'=>'',
                'description'=>'',
                'meta_title'=>'',
                'meta_description'=>'',
                'meta_keywords'=>'',
                'is_featured'=>'Yes',
                'status'=>1,
            ],
            [
                'id' => 2,
                'section_id' => 1,
                'category_id' => 6,
                'brand_id' => 2,
                'vendor_id'=> 0,
                'admin_id'=> 1,
                'admin_type'=>'superadmin',
                'product_name'=>'Nikke Casual T-shirts',
                'product_code'=>'NC001',
                'product_color'=>'Blue',
                'product_price'=>'100000',
                'product_discount'=>0,
                'product_weight'=>200,
                'product_image'=>'',
                'product_video'=>'',
                'description'=>'',
                'meta_title'=>'',
                'meta_description'=>'',
                'meta_keywords'=>'',
                'is_featured'=>'Yes',
                'status'=>1,
            ],
        ];
        Product::insert($productRecords);
    }
}
