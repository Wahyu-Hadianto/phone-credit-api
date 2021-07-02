<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\ProductPriceController;
use App\Http\Controllers\Api\TenorController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\UserController as UserUserController;
use App\Http\Controllers\ApiAuth\LoginController;
use App\Http\Controllers\ApiAuth\LogoutController;
use App\Http\Controllers\ApiAuth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register',[RegisterController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);
Route::post('/upload',[UserUserController::class,'upload']);
// ================== USER ============================
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user',[UserUserController::class,'user']);
    Route::put('/user',[UserUserController::class,'updateUser']);
    Route::post('/user/order',[OrderController::class,'storeOrder']);
    Route::post('/user/avatar',[UserUserController::class,'updateAvatar']);
});
// Route::get('/products')

// ===================== MEREK =========================
Route::get('/tenor',[TenorController::class,'getTenor']);
Route::get('/mereks',[ProductController::class,'getBrands']);
// =================== Route Product =================
Route::prefix('/product')->group(function(){
    Route::get('/',[ProductController::class,'getProduct']);
    Route::get('/slug/{slug}',[ProductController::class,'productSlug']);
});
Route::prefix('/products')->group(function(){
    Route::get('/',[ProductController::class,'getProducts']);
    Route::get('/take/{count}',[ProductController::class,'productTake']);
    Route::get('/search/{name}',[ProductController::class,'productSearch']);
    Route::get('/promo',[ProductController::class,'getProductsPromo']);
});