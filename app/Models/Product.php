<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
    protected function images(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
    protected function prices(){
        return $this->hasMany(ProductPrice::class,'product_id','id');
    }
    
   
}
