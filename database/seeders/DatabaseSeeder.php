<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ColorSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
    }
}
