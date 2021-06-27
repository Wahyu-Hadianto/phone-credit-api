<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $countColor = 12;
        for($ci=0;$ci < 5;$ci++){
        // ===============  Cyber Black ======================== 
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 1 + ($ci * $countColor),
                'image'     => '/image/product/realme-8/cyber-black/cyber-black('.$i.').png',
            ]);
        }

        // ===================  blue blade ========================== 
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 2 + ($ci * $countColor),
                'image'     => '/image/product/realme-narzo-20/blue-blade/blue-blade('.$i.').jpg',
            ]);
        }

         // ===================  Silver sword  ==========================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 3 + ($ci * $countColor),
                'image'     => '/image/product/realme-narzo-20/silver-sword/sliver-sword('.$i.').jpg',
            ]);
        }
        
         // ===================  Marine Blue  =========================='
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 4 + ($ci * $countColor),
                'image'     => '/image/product/realme-c15/marine-blue/marine-blue('.$i.').png',
            ]);
        }
        // ===================  Gracire Blue  ==========================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 5 + ($ci * $countColor),
                'image'     => '/image/product/realme-X3-super-zoom/glacier-blue/gracier-blue('.$i.').jpg',
            ]);
    
        }
        // ======================== SUNSET MOELODY=====================================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 6 + ($ci * $countColor),
                'image'     => '/image/product/vivo-v20/sunset-melody/sunset-melody('.$i.').jpg',
            ]);
        }
        
        // ================================= PURIST BLUE =========================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 7 + ($ci * $countColor),
                'image'     => '/image/product/vivo-y20s/purist-blue/purist-blue('.$i.').jpg',
            ]);
        }
        // ======================== OBSIDAN BLACK ==========================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 8 + ($ci * $countColor),
                'image'     => '/image/product/vivo-y20s/obsidian-black/obisidan-black('.$i.').jpg',
            ]);
        }
        // =========================== OXYGEN BLUE ===========================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 9 + ($ci * $countColor),
                'image'     => '/image/product/vivo-v20-se/oxygen-blue/oxygen-blue('.$i.').jpg',
            ]);
        }
        // ================= aquamarine green ========================================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 10 + ($ci * $countColor),
                'image'     => '/image/product/vivo-v20-se/aquamarine-green/aquamarine-blue('.$i.').jpg',
            ]);
        }
        // ============================== Crystal symphony ==================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 11 + ($ci * $countColor),
                'image'     => '/image/product/vivo-y51/crystal-shympony/crystal-sympony('.$i.').jpg',
            ]);
        }
        // ================= titanium shapire ================
        for($i=1;$i < 5;$i++){
            DB::table('product_images')->insert([
                'color_id'  => 12 + ($ci * $countColor),
                'image'     => '/image/product/vivo-y51/titanium-sapphire/titanium-sapphire('.$i.').jpg',
            ]);
        }
    }
    }
}
