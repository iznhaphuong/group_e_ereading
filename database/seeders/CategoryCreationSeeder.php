<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoryCreationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_creation')->insert([
            [
                'creation_id' => 1,
                'category_id' => 4
            ],
            [
                'creation_id' => 3,
                'category_id' => 1
            ],
            [
                'creation_id' => 2,
                'category_id' => 1
            ],
            [
                'creation_id' => 5,
                'category_id' => 4
            ],
            [
                'creation_id' => 3,
                'category_id' => 5
            ]
        ]);
    }
}
