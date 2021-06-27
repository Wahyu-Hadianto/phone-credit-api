<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countProduct = 8;
        for($i = 0;$i < 5;$i++){

            DB::table('product_colors')->insert([
                'product_id'    => 1 + ($countProduct * $i),
                'color_name'    =>  'Cyber Black'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 2 + ($countProduct * $i),
                'color_name'    =>  'Blue Blade'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 2 + ($countProduct * $i),
                'color_name'    => 'Silver Sword'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 3 + ($countProduct * $i),
                'color_name'    => 'Marine Blue'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 4 + ($countProduct * $i),
                'color_name'    => 'Glacier Blue'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 5 + ($countProduct * $i),
                'color_name'    => 'Sunset Melody'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 6 + ($countProduct * $i),
                'color_name'    => 'Purist Blue'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 6 + ($countProduct * $i),
                'color_name'    => 'Obsidian Black'
            ]);
    
            DB::table('product_colors')->insert([
                'product_id'    => 7 + ($countProduct * $i),
                'color_name'    => 'Oxygen Blue'
            ]);

            DB::table('product_colors')->insert([
                'product_id'    => 7 + ($countProduct * $i),
                'color_name'    => 'Aquamarine Green'
            ]);
            
            DB::table('product_colors')->insert([
                'product_id'    => 8 + ($countProduct * $i),
                'color_name'    => 'Crystal Symphony'
            ]);

            DB::table('product_colors')->insert([
                'product_id'    => 8 + ($countProduct * $i),
                'color_name'    => 'Titanium Sapphire'
            ]);
        }
        
    }
}
