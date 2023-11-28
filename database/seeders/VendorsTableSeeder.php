<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            [
            'id' => 1,
            'name' => 'Veto',
            'address'=> 'Marina',
            'city' => 'Semarang',
            'state' => 'Jawa Tengah',
            'country' => 'Indonesia',
            'pincode' => '50123',
            'mobile' => '08125756890',
            'email' => 'veto@gmail.com',
            'status' => 0
            ]
        ];
        Vendor::insert($vendorRecords);
    }
}
