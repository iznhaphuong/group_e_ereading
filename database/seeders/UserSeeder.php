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
                'name' => 'Người dùng',
                'username' => 'user123',
                'email' => 'user@mail.com',
                'password' => '12345',

            ],
            [
                'name' => 'Admin',
                'username' => 'admin123',
                'email' => 'admin@mail.com',
                'password' => '12345',

            ]
        ]);
    }
}
