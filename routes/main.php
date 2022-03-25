<?php

use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\WishlistController;
use Illuminate\Support\Facades\Route;


Route::group([
    'as' => 'catalog.', // имя маршрута, например catalog.index
    'prefix' => 'catalog', // префикс маршрута, например catalog/index
], function () {

    Route::match(['get', 'post'], 'galleries/save_click_on_main_slider_href', [GalleriesController::class, 'save_click_on_main_slider_href'])->name('galleries.save_click_on_main_slider_href');

    // категория каталога товаров


    // страница товара каталога


//    Route::get('cart', [OrderController::class, 'index'])->name('cart');
//
//    Route::get('add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('add.to.cart');
//
//    Route::patch('update-cart', [OrderController::class, 'updateCart'])->name('update.cart');
//
//    Route::delete('remove-from-cart', [OrderController::class, 'removeFromCart'])->name('remove.from.cart');
//    Route::resource('/order', OrderController::class);
});
//Wishlist

Route::group(['prefix' => 'wishlist', 'middleware' => 'auth'], function () {
    Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/store', [WishlistController::class, 'wishlistStore'])->name('wishlist.store');
    //Route::post('wishlist/move-to-cart', [WishlistController::class, 'moveToCart'])->name('wishlist.move.cart');
    Route::post('/delete', [WishlistController::class, 'wishlistDelete'])->name('wishlist.delete');
});

Route::get('/{slug}', [CatalogController::class, 'product'])->name('product');
Route::get('category/{slug}', [CatalogController::class, 'category'])->name('category');


Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'cart'])->name('cart');
    Route::post('store', [CartController::class, 'cartStore'])->name('cart.store');
    Route::post('delete', [CartController::class, 'cartDelete'])->name('cart.delete');
    Route::post('update', [CartController::class, 'cartUpdate'])->name('cart.update');
});

Route::group(['prefix' => 'attribute', 'middleware' => 'auth'], function () {
    Route::post('/get-attribute', [AttributeValueController::class, 'getAttributeApi'])->name('get-attribute-api');
    Route::post('/get-value', [AttributeValueController::class, 'getValues'])->name('attribute-value');
    Route::post('/add-value', [AttributeValueController::class, 'addValues'])->name('add-attribute-value');
    Route::post('/delete-value', [AttributeValueController::class, 'deleteValues'])->name('delete-attribute-value');
//    Route::post('update', [CartController::class, 'cartUpdate'])->name('cart.update');
});

Route::group(['prefix' => 'order'], function () {
    Route::post('/', [OrderController::class, 'index'])->name('order');
});

Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/new-user', [CheckoutController::class, 'newUser'])->name('checkout.new-user');
});

Route::resource('/blogs', BlogController::class);
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::resource('blogs', BlogController::class)->scoped([
    'blog' => 'slug',
]);


Route::get('/search', SearchController::class)->name('search');
