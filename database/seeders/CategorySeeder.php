<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Kiếm hiệp'
            ],
            [
                'name' => 'Lịch sử'
            ],
            [
                'name' => 'Tiên hiệp'
            ],
            [
                'name' => 'Huyền huyễn'
            ],
            [
                'name' => 'Quân sự'
            ]
        ]);
    }
}
