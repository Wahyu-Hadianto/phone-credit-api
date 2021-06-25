<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\SpesifikasiController;
use App\Http\Controllers\Admin\StorageRamController;
use App\Http\Controllers\tokenController;
use App\Models\Brand;
use App\Models\ProductPrice;
use App\Models\StorageRam;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/{any}',function(){
//     return view('app');
// });
Route::middleware('auth')->group(function(){
        Route::middleware('role:Admin')->group(function(){
                Route::get('/',[HomeController::class,'index'])->name('home');
                Route::get('/product',[ProductController::class,'setProduct']);
                // Brand
                Route::get('/merek',[BrandController::class,'index']);
                Route::post('/brand',[BrandController::class,'addBrand']);
                Route::delete('/brand/{id}',[BrandController::class,'delete']);
                // ============= Product ROUTE ================== 
                Route::get('/product',[ProductController::class,'index']);
                Route::get('/products',[ProductController::class,'listProducts']);
                Route::get('/brand/{brandId}/products',[ProductController::class,'getProductByBrand']);
                Route::post('/product',[ProductController::class,'addProduct']);
                Route::delete('/product/{id}',[ProductController::class,'delete']);
        
                Route::get("/storage-ram",[StorageRamController::class,'index']);
                Route::post("/storage-ram",[StorageRamController::class,'addStorageRam']);
        
        Route::prefix('product')->group(function(){
        
        // ================= PRICE PRODUCT ======================= 
                Route::get('/{id}/price/edit',[PriceController::class,'editProductPrice']);
                Route::put('/{id}/price',[PriceController::class,'updateProductPrice']);
                Route::get('/price',[PriceController::class,'index']);
                Route::post('/price',[PriceController::class,'addProductPrice']);
         // ================ IMAGE PRODUCT =========================
                Route::get('/image',[ProductImageController::class,'index']);
                Route::delete('/image/{id}',[ProductImageController::class,'delete']);
                Route::post('/image',[ProductImageController::class,'addImage']);
                Route::get('/{id}/image/edit',[ProductImageController::class,'editProductImage']);
                Route::put('/{id}/image',[ProductImageController::class,'updateProductImage']);
                Route::get('/{id}/edit',[ProductController::class,'editProduct']);
                Route::put('/{id}',[ProductController::class,'updateProduct']);
        });
        });
});



// ============== SEPESIFIKASI PRODUCT ================== 
// Route::get('/spesifikasi',[SpesifikasiController::class,'index']);
// Route::post('/spesifikasi',[SpesifikasiController::class,'addSpesifikasi']);


Auth::routes();
// Route::get('/token',[tokenController::class,'setToken']);
// Route::post('/token',[tokenController::class,'getToken']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


