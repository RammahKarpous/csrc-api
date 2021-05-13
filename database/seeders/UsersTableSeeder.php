<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "member_type" => "Admin",
            "name" => "Rammah",
            "slug" => "rammah",
            "email" => "rammahkarpous@outlook.com",
            "gender" => "Male",
            "dob" => "09/28/1994",
            "password" => Hash::make("password"),
            "status" => "active"
        ]);
    }
}
