<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords = [
            [
                'id' => 1,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Men',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'men',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => 0,
                'status'=> 1
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Women',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'women',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => 0,
                'status'=> 1
            ],
            [
                'id' => 3,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Kids',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'kids',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => 0,
                'status'=> 1
            ],
            [
                'id' => 4,
                'parent_id' => 0,
                'section_id' => 2,
                'category_name' => 'Mobiles',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'mobiles',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keywords' => 0,
                'status'=> 1
            ],
            [
                'id' => 5,
                'parent_id' => 4,
                'section_id' => 2,
                'category_name' => 'Smartphones',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => 'smartphone',
                'url' => 'smartphone',
                'meta_title' => 'smartphone',
                'meta_description' => 'smartphone',
                'meta_keywords' => 'smartphone',
                'status'=> 1
            ],
            [
                'id' => 6,
                'parent_id' => 1,
                'section_id' => 1,
                'category_name' => 'T-Shirts',
                'category_image'=> '',
                'category_discount' => 10,
                'description' => 'T-shirts',
                'url' => 'tshirt',
                'meta_title' => 't-shirt',
                'meta_description' => 't-shirt',
                'meta_keywords' => 't-shirt',
                'status'=> 1
            ],
            [
                'id' => 7,
                'parent_id' => 1,
                'section_id' => 1,
                'category_name' => 'Shirts',
                'category_image'=> '',
                'category_discount' => 10,
                'description' => 'shirts',
                'url' => 'shirt',
                'meta_title' => 'shirt',
                'meta_description' => 'shirt',
                'meta_keywords' => 'shirt',
                'status'=> 1
            ],
            [
                'id' => 8,
                'parent_id' => 2,
                'section_id' => 1,
                'category_name' => 'Top',
                'category_image'=> '',
                'category_discount' => 15,
                'description' => 'Top',
                'url' => 'top',
                'meta_title' => 'top',
                'meta_description' => 'top',
                'meta_keywords' => 'top',
                'status'=> 1
            ],
            [
                'id' => 9,
                'parent_id' => 1,
                'section_id' => 1,
                'category_name' => 'Men Shoe',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => 'mshoe',
                'url' => 'mshoe',
                'meta_title' => 'mshoe',
                'meta_description' => 'mshoe',
                'meta_keywords' => 'mshoe',
                'status'=> 1
            ],
            [
                'id' => 10,
                'parent_id' => 2,
                'section_id' => 1,
                'category_name' => 'Women Shoe',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => 'wshoe',
                'url' => 'wshoe',
                'meta_title' => 'wshoe',
                'meta_description' => 'wshoe',
                'meta_keywords' => 'wshoe',
                'status'=> 1
            ],
            [
                'id' => 11,
                'parent_id' => 3,
                'section_id' => 1,
                'category_name' => 'Kids Shoe',
                'category_image'=> '',
                'category_discount' => 0,
                'description' => 'kshoe',
                'url' => 'kshoe',
                'meta_title' => 'kshoe',
                'meta_description' => 'kshoe',
                'meta_keywords' => 'kshoe',
                'status'=> 1
            ],
            ];
            Category::insert($categoryRecords);
    }
    
}