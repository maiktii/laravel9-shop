<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailTableSeeder extends Seeder
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
                'vendor_id' => 1,
                'shop_name' => 'Maju Jaya',
                'shop_address' => 'Marina',
                'shop_city' => 'Semarang',
                'shop_pincode' => '50123',
                'shop_mobile' => '0247548123',
                'shop_email' => 'majujaya@gmail.com',
                'address_proof' => 'Passport',
                'business_license_number' => '123123123'
            ],
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
