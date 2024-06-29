<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;




Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'product')->name('home-page');
    Route::get('product/{productId}/details', [ProductController::class, 'productDetails'])->name('product-details');
    // Route::get('/home-page', 'homePage')->name('home-page');
    // Route::get('/products', 'product')->name('product-page');
    // Route::get('/contact-us', 'contactUs')->name('contact-us');
    // Route::get('/about-us', 'aboutUs')->name('about-us');
});
// Order
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
    // Route::get('/', 'index')->name('index');
    Route::get('/{id}/create', 'create')->name('create');
    //     Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
    //     Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
    //     Route::delete('/{id}/delete', 'destroy')->name('destroy')

});
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profiles', 'editProfile')->name('profile.edit');
        Route::put('update-profile', 'updateProfile')->name('profile.update');
    
        Route::get('/change-password', 'changePassword')->name('change_password');
        Route::put('/update-password', 'updatePassword')->name('update_password');
    });
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('destroy');

});
});
// Add to Cart
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');









//Admin Route
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('product', ProductController::class);
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('slider', SliderController::class);
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profiles', 'editProfile')->name('profile.edit');
        Route::put('update-profile', 'updateProfile')->name('profile.update');

        Route::get('/change-password', 'changePassword')->name('change_password');
        Route::put('/update-password', 'updatePassword')->name('update_password');
    })->middleware(['auth', 'verified']);

    Route::get('/dashboard', function () {
        return view('website.pages.home');
    })->middleware(['auth', 'verified'])->name("dashboard");
});



// Route::middleware(['auth', 'verified'])->group(function () {
//     require __DIR__ . '/users.php';
// });

require __DIR__ . '/auth.php';
