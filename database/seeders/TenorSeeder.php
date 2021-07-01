<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenors')->insert([
             'tenor'    => '3 Bulan'
        ]);
        DB::table('tenors')->insert([
            'tenor'    => '6 Bulan'
        ]);
        DB::table('tenors')->insert([
            'tenor'    => '9 Bulan'
        ]);
        DB::table('tenors')->insert([
            'tenor'    => '12 Bulan'
        ]);
    }
}
