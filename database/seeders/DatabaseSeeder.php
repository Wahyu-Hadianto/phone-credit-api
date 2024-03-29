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
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            MerekSeeder::class,
            RamStorageSeeder::class,
            ProductSeeder::class,
            ColorSeeder::class,
            ImageSeeder::class,
            PricesSeeder::class,
            TenorSeeder::class
        ]);
    }
}
