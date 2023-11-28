<?php

namespace Database\Seeders;

use App\Models\ProductsFilter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filterRecords = [
            [
                'id'=>1,
                'cats_id'=>'1,2,3,6,7,8',
                'filter_name'=>'Fabric',
                'filter_column'=>'fabric',
                'status'=>1,
            ],
            [
                'id'=>2,
                'cats_id'=>'4,5',
                'filter_name'=>'RAM',
                'filter_column'=>'ram',
                'status'=>1,
            ],
        ];
        ProductsFilter::insert($filterRecords);
    }
}
