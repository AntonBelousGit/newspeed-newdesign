<?php

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\Frontend\ApiCatalogController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['api'])->group(function () {

//    Route::apiResources([
//        'categories' => ApiCategoryController::class,
//    ]);
    Route::post('menu-catalog', function ( Request $request ) {
        return ( new ApiCategoryController )->get_menu($request);
    });

//    Route::get('/menu-catalog',[ApiCatalogController::class,'menu']);
//    Route::get('/block',[ApiCatalogController::class,'block']);
//    Route::get('product/{slug}', [ApiCatalogController::class, 'product']);
//    Route::get('category/{slug}', [ApiCatalogController::class, 'category']);

});
