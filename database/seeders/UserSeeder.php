<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
            [
                'user_name' => 'Người dùng',
                'user_username' => 'user',
                'user_email' => 'user@mail.com',
                'user_password' => '12345',
                'user_avatar' => '',
            ],
            [
                'user_name' => 'Admin',
                'user_username' => 'admin',
                'user_email' => 'admin@mail.com',
                'user_password' => '12345',
                'user_avatar' => '',
            ]
        ]);
    }
}
