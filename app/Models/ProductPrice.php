<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function ramStorage(){
        return $this->hasOne(StorageRam::class,'id','ram_storage_id');
    }
    protected function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
