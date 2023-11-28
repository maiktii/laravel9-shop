<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecord = [
            [
                'id' => 1,
                'vendor_id' => 1,
                'account_name' => 'veto',
                'account_number' => '030303030',
                'bank_name' => 'Mandiri',
                'bank_code' => '121212'
            ],
        ];
        VendorsBankDetail::insert($vendorRecord);
    }
}
