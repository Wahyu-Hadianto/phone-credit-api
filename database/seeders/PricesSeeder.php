<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentProduct = 8;
        for($i=0;$i < 5;$i++){
            // REALME 8
            DB::table('product_prices')->insert([
                'product_id'        => 1 + ($currentProduct * $i),
                'ram_storage_id'    => 8,
                'price_normal'      => 3599000,
                'price_sale'        => 3499000,
                'is_sale'           => true
            ]);
            //REALME NARZO 20
            DB::table('product_prices')->insert([
                'product_id'        => 2 + ($currentProduct * $i),
                'ram_storage_id'    => 5,
                'price_normal'      => 3599000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);

            DB::table('product_prices')->insert([
                'product_id'        => 2 + ($currentProduct * $i),
                'ram_storage_id'    => 7,
                'price_normal'      => 3799000,
                'price_sale'        => 3699000,
                'is_sale'           => true
            ]);
            // REALME C15 
            DB::table('product_prices')->insert([
                'product_id'        => 3 + ($currentProduct * $i),
                'ram_storage_id'    => 5,
                'price_normal'      => 2199000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);

            DB::table('product_prices')->insert([
                'product_id'        => 3 + ($currentProduct * $i),
                'ram_storage_id'    => 7,
                'price_normal'      => 2499000,
                'price_sale'        => 2299000,
                'is_sale'           => true
            ]);
            // REALME X3 SUPPER ZOOM
            DB::table('product_prices')->insert([
                'product_id'        => 4 + ($currentProduct * $i),
                'ram_storage_id'    => 7,
                'price_normal'      => 2499000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);

            DB::table('product_prices')->insert([
                'product_id'        => 4 + ($currentProduct * $i),
                'ram_storage_id'    => 9,
                'price_normal'      => 4599000,
                'price_sale'        => 4299000,
                'is_sale'           => true
            ]);
            // VIVO V20 
            DB::table('product_prices')->insert([
                'product_id'        => 5 + ($currentProduct * $i),
                'ram_storage_id'    => 8,
                'price_normal'      => 2999000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);

            DB::table('product_prices')->insert([
                'product_id'        => 5 + ($currentProduct * $i),
                'ram_storage_id'    => 9,
                'price_normal'      => 4399000,
                'price_sale'        => 4199000,
                'is_sale'           => true
            ]);
            //vivo y20 s
            DB::table('product_prices')->insert([
                'product_id'        => 6 + ($currentProduct * $i),
                'ram_storage_id'    => 7,
                'price_normal'      => 2799000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);

            DB::table('product_prices')->insert([
                'product_id'        => 6 + ($currentProduct * $i),
                'ram_storage_id'    => 8,
                'price_normal'      => 3599000,
                'price_sale'        => 3399000,
                'is_sale'           => false
            ]);

            // vivo v20 se
            DB::table('product_prices')->insert([
                'product_id'        => 7 + ($currentProduct * $i),
                'ram_storage_id'    => 7,
                'price_normal'      => 2799000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);
            
            // vivo y51
            DB::table('product_prices')->insert([
                'product_id'        => 8 + ($currentProduct * $i),
                'ram_storage_id'    => 8,
                'price_normal'      => 3399000,
                'price_sale'        => null,
                'is_sale'           => false
            ]);
        }
    }
}
