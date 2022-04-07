<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/layout', function () {
    return view('layout.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//frontend

Route::get('/', [App\Http\Controllers\frontendController::class, 'user'])->name('frontend.main');
Route::get('/sortProduct', [App\Http\Controllers\frontendController::class, 'sortProduct']);
Route::get('/products', [App\Http\Controllers\frontendController::class, 'products'])->name('frontend.sidebar');
Route::get('product/{url}', [App\Http\Controllers\frontendController::class, 'detail']);

//add to cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart']);
Route::Post('/addtocart', [App\Http\Controllers\CartController::class, 'addtocart']);
Route::Post('/removecart', [App\Http\Controllers\CartController::class, 'removecart'])->name('cart.remove');
Route::post('/updatecart', [App\Http\Controllers\CartController::class, 'updatecart'])->name('cart.update');

//checkout

Route::get('/billing',[App\Http\Controllers\CheckoutController::class, 'billing']);
Route::post('/addbilling',[App\Http\Controllers\CheckoutController::class, 'addbilling']);

Route::get('/shipping',[App\Http\Controllers\CheckoutController::class, 'shipping']);
Route::post('/addshipping',[App\Http\Controllers\CheckoutController::class, 'addshipping']);

 Route::get('/order',[App\Http\Controllers\CheckoutController::class, 'order']);

 Route::get('/myorder',[App\Http\Controllers\CheckoutController::class, 'myorder']);

 Route::get('/payment',[App\Http\Controllers\CheckoutController::class, 'payment']);

//  Route::get('/orderdata',[App\Http\Controllers\CheckoutController::class, 'orderdata']);
 
 Route::post('/orderda',[App\Http\Controllers\CheckoutController::class, 'orderda']);

 
 Route::get('/tnkyou',[App\Http\Controllers\CheckoutController::class, 'tnkyou']);

 Route::get('check/sessiondata',function(){
    $data = session()->get('checkout');
    return $data;
 });