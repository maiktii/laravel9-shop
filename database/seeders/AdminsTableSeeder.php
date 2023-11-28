<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id' => 2, 
            'name' => 'veto', 
            'type' => 'vendor', 
            'vendor_id' => 1, 
            'mobile' => '08125756890', 
            'email' => 'veto@gmail.com', 
            'password' => '$2a$10$mYdHpXoqvB7qz3EXjWP3QeldiZQS00DSPIfTYflM8jSn9P7ZDXTSS', 
            'image' => '',
            'status' => 1],
        ];
        Admin::insert($adminRecords);
    }
}
