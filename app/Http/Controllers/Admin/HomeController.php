<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\StorageRam;
class HomeController extends Controller
{
    public function api(){
        return view('admin.home');
    }
    public function index(){
        $products   = Product::all();
        $colspan    = count(StorageRam::all()) ;
        return view("admin.products",compact("products","colspan"));
    }
}
