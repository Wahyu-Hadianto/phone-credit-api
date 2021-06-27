<?php

namespace Database\Seeders;

use App\Models\StorageRam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('storage_rams')->insert([
                'name'      => '2 GB & 16 GB'
       ]);

       DB::table('storage_rams')->insert([
            'name'      => '2 GB &  32GB'
       ]);

       DB::table('storage_rams')->insert([
        'name'      => '3 GB & 32 GB'
       ]);
       DB::table('storage_rams')->insert([
        'name'      => '4 GB & 32 GB'
       ]);
       DB::table('storage_rams')->insert([
        'name'      => '4 GB & 64 GB'
        ]);
        DB::table('storage_rams')->insert([
            'name'      => '6 GB & 64 GB'
        ]);
        DB::table('storage_rams')->insert([
            'name'      => '4 GB & 128 GB'
        ]);
        DB::table('storage_rams')->insert([
            'name'      => '8 GB & 128 GB'
        ]);
        DB::table('storage_rams')->insert([
            'name'      => '8 GB & 256 GB'
        ]);
    }
}
