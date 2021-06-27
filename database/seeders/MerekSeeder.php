<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name'  => 'Realme',
            'slug'  => Str::slug('Realme')
        ]);
        DB::table('brands')->insert([
            'name'  => 'Vivo',
            'slug'  => Str::slug('Vivo')
        ]);
    }
}
