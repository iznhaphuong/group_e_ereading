<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(UserSeeder::class);

    }
}
