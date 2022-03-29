<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlocksController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'],
    function () {


        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', ProductController::class);
        Route::post('/products/add-photo', [ProductController::class, 'addPhoto'])->name('product-add-photo');
        Route::post('/products/remove-photo', [ProductController::class, 'removePhoto'])->name('remove-photo');
        Route::post('/categories/add-photo', [CategoryController::class, 'addPhoto'])->name('category-add-photo');
        Route::post('/categories/remove-photo', [CategoryController::class, 'removePhoto'])->name('category-remove-photo');
        Route::post('/categories/search-by-name', [CategoryController::class, 'searchByName'])->name('category.search-by-name');
        Route::post('/categories/search-children-by-id', [CategoryController::class, 'searchChildrenByParent'])->name('category.searchChildrenByParent');

        Route::match(['get', 'post'], '/products/move_product_to_block', [ProductController::class, 'move_product_to_block'])->name('products.move_product_to_block');
        Route::match(['get', 'post'], '/products/delete_product_from_block', [ProductController::class, 'delete_product_from_block'])->name('products.delete_product_from_block');

        Route::resource('banners', BannerController::class);
        Route::get('/blocks/positions', [BlocksController::class, 'positions'])->name('blocks.positions');
        Route::match(['get', 'post'], '/blocks/move_product_to_block', [BlocksController::class, 'move_product_to_block'])->name('blocks.move_product_to_block');
        Route::match(['get', 'post'], '/blocks/delete_product_from_block', [BlocksController::class, 'delete_product_from_block'])->name('blocks.delete_product_from_block');
        Route::post('block_status', [BlocksController::class, 'blockStatus'])->name('block.status');
        Route::resource('blocks', BlocksController::class);

        Route::get('/galleries/main', [GalleriesController::class, 'main'])->name('galleries.main');
        Route::match(['get', 'post'], 'galleries/delete_main_gallery_block', [GalleriesController::class, 'delete_main_gallery_block'])->name('galleries.delete_main_gallery_block');

        Route::get('/galleries/sliders', [GalleriesController::class, 'sliders'])->name('galleries.sliders');
        Route::match(['get', 'post'], '/gallery/sliders_update/{gallery}', [GalleriesController::class, 'sliders_update'])->name('galleries.sliders_update');
        Route::match(['get', 'post'], 'galleries/delete_sliders_gallery_block', [GalleriesController::class, 'delete_sliders_gallery_block'])->name('galleries.delete_sliders_gallery_block');

        Route::resource('galleries', GalleriesController::class);

        Route::match(['get', 'post'], 'galleries/delete_main_gallery_image', [GalleriesController::class, 'delete_main_gallery_image'])->name('galleries.delete_main_gallery_image');
        Route::get('/gallery/main/all-statistics', [GalleriesController::class, 'main_statistics'])->name('galleries.main.all_statistics');
        Route::match(['get', 'post'], 'galleries/delete_sliders_gallery_image', [GalleriesController::class, 'delete_sliders_gallery_image'])->name('galleries.delete_sliders_gallery_image');

        Route::match(['get', 'post'], 'galleries/move_banner_to_gallery', [GalleriesController::class, 'move_banner_to_gallery'])->name('galleries.move_banner_to_gallery');
        Route::match(['get', 'post'], 'galleries/delete_banner_from_gallery', [GalleriesController::class, 'delete_banner_from_gallery'])->name('galleries.delete_banner_from_gallery');

        Route::resource('/blogs', BlogController::class);
        Route::match(['get', 'post'], 'blogs/delete_main_blog_image', [BlogController::class, 'delete_main_blog_image'])->name('blogs.delete_main_blog_image');

        Route::resource('/users', UserController::class);
        Route::match(['get', 'post'], 'users/update_user_role', [UserController::class, 'update_user_role'])->name('users.update_user_role');

        Route::resource('/contacts', ContactController::class)->scoped([
            'contact' => 'slug',
        ]);

        Route::resources([
            'order' => OrderController::class,
            'brand' => BrandController::class,
            'menu' => MenuController::class,
        ]);

        Route::post('/menu/add-photo', [MenuController::class, 'addPhoto'])->name('menu-add-photo');
        Route::post('/menu/remove-photo', [MenuController::class, 'removePhoto'])->name('menu-remove-photo');


        Route::group(['prefix' => 'attributes'], function () {

            Route::get('/', [AttributeController::class, 'index'])->name('attributes.index');
            Route::get('/create', [AttributeController::class, 'create'])->name('attributes.create');
            Route::post('/store', [AttributeController::class, 'store'])->name('attributes.store');
            Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('attributes.edit');
            Route::get('/{id}/edit-value', [AttributeController::class, 'editValue'])->name('attributes.edit-value');
            Route::post('/update/{id}', [AttributeController::class, 'update'])->name('attributes.update');
            Route::delete('/{id}/delete', [AttributeController::class, 'delete'])->name('attributes.delete');

            Route::get('/get-attribute/{id}', [AttributeValueController::class, 'getValues'])->name('attribute.get-attribute');
            Route::post('/add-values/{id}', [AttributeValueController::class, 'addValues'])->name('attribute-value.add-values');
            Route::post('/update-values', [AttributeValueController::class, 'updateValues']);
            Route::post('/delete-values/{id}', [AttributeValueController::class, 'deleteValues'])->name('attribute-value.delete-values');
        });
    });
