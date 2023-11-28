<?php

namespace Database\Seeders;

use App\Models\ProductsAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productAttributesRecords = [
            [
                'id'=> 1,
                'product_id'=> 2,
                'size'=> 'Small',
                'price'=> 100000,
                'stock' => 5,
                'sku' => 'NC001-S',
                'status' => 1,
            ],
            [
                'id'=> 2,
                'product_id'=> 2,
                'size'=> 'Medium',
                'price'=> 200000,
                'stock' => 10,
                'sku' => 'NC001-M',
                'status' => 1,
            ],
            [
                'id'=> 3,
                'product_id'=> 2,
                'size'=> 'Large',
                'price'=> 300000,
                'stock' => 15,
                'sku' => 'NC001-L',
                'status' => 1,
            ]
        ];
    ProductsAttribute::insert($productAttributesRecords);
    }
}
