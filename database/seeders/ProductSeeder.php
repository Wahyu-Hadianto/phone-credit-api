<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0;$i < 5;$i++){

            $products = Product::create([
                'product_name'  => 'Realme 8',
                'slug'          => Str::slug('Realme 8'),
                'processor'     => 'Mediatek Helio G95',
                'camera'        => '64 AI Quad Kamera', 
                'battery'       => '5000 mAh',
                'display'       => '8 GB & 128 GB',
                'storage_ram'   => '6.44 "',
                'brand_id'      => 1,
            ]);
    
            $products = Product::create([
                'product_name'  => 'Realme Narzo 20',
                'slug'          => Str::slug('Realme Narzo 20'),
                'processor'     => 'Mediatek Helio G85',
                'camera'        => '48 AI Quad Kamera', 
                'battery'       => '6000 mAh',
                'display'       => '4 GB & 64 GB',
                'storage_ram'   => '6.5 "',
                'brand_id'      => 1
            ]);
    
            $products = Product::create([
                'product_name'  => 'Realme C15',
                'slug'          => Str::slug('Realme C15'),
                'processor'     => 'Mediatek Helio G35',
                'camera'        => '13 Mp', 
                'battery'       => '6000 mAh',
                'display'       => '4 GB & 64 GB,4GB & 128 GB',
                'storage_ram'   => '6.5 "',
                'brand_id'      => 1
            ]);
    
            $products = Product::create([
                'product_name'  => 'Realme X3 SuperZoom',
                'slug'          => Str::slug('Realme X3 SuperZoom'),
                'processor'     => 'Snapdragon 855+',
                'camera'        => '64 AI Quad Kamera', 
                'battery'       => '5000 mAh',
                'display'       => '12 GB & 128 GB',
                'storage_ram'   => '6.5 "',
                'brand_id'      => 1
            ]);
    
            $products = Product::create([
                'product_name'  => 'Vivo V20',
                'slug'          => Str::slug('Vivo V20'),
                'processor'     => 'Snadragon 720G',
                'camera'        => '44 Mp', 
                'battery'       => '4100 mAh',
                'display'       => '8 GB & 128 GB',
                'storage_ram'   => '6.44 "',
                'brand_id'      =>  2
            ]);
    
            $products = Product::create([
                'product_name'  => 'Vivo Y20s',
                'slug'          => Str::slug('Vivo V20'),
                'processor'     => 'Snadragon 720G',
                'camera'        => '13 Mp', 
                'battery'       => '5000 mAh',
                'display'       => '8 GB & 128 GB',
                'storage_ram'   => '6.5 "',
                'brand_id'      =>  2
            ]);
    
            $products = Product::create([
                'product_name'  => 'Vivo V20 SE',
                'slug'          => Str::slug('Vivo V20 SE'),
                'processor'     => 'Snadragon 665',
                'camera'        => '13 Mp', 
                'battery'       => '5000 mAh',
                'display'       => '8 GB & 128 GB',
                'storage_ram'   => '6.58 "',
                'brand_id'      =>  2
            ]);
    
            $products = Product::create([
                'product_name'  => 'Vivo Y51',
                'slug'          => Str::slug('Vivo Y51'),
                'processor'     => 'Snadragon 665',
                'camera'        => '13 Mp Quad', 
                'battery'       => '5000 mAh',
                'display'       => '8 GB & 128 GB',
                'storage_ram'   => '6.58 "',
                'brand_id'      =>  2
            ]);
        }
    }
}
