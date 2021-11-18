<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	['role_name'=> 'Admin', 'display_name'=> 'Quản trị hệ thống'],
        	['role_name'=> 'Developer', 'display_name'=> 'Phát triển hệ thống'],
        	['role_name'=> 'Content', 'display_name'=> 'Quản trị nội dung'],
        	['role_name'=> 'Guest', 'display_name'=> 'Khách hàng'],
        ]);
    }
}
