<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Portal',
            'last_name' => 'Admin',
            'email' => 'portal@laracms.com',
            'password' => Hash::make('admin123'),
            'phone_no' => '+9212312345',
            'address' => 'ABC Steet Testing',
            'zipcode' => '1234'
        ]);
    }
}
