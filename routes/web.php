<?php

use Illuminate\Support\Facades\Route;
use App\LiveWire\HomePage;
use App\LiveWire\CategoriesPage;
use App\LiveWire\ProductsPage;
use App\LiveWire\CartPage;
use App\LiveWire\ProductDetailPage;
use App\LiveWire\CheckoutPage;
use App\LiveWire\MyOrdersPage;
use App\LiveWire\SuccessPage;
use App\LiveWire\CancelPage;
use App\LiveWire\MyOrderDetailPage;
use App\LiveWire\Auth\LoginPage;
use App\LiveWire\Auth\RegisterPage;
use App\LiveWire\Auth\ForgotPasswordPage;
use App\LiveWire\Auth\ResetPasswordPage;


Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);

Route::middleware('guest')->group(function(){
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class);
    Route::get('/reset', ResetPasswordPage::class);
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    });
    Route::get('/checkout', CheckoutPage::class);
    Route::get('my-orders', MyOrdersPage::class);
    Route::get('my-orders/{order}', MyOrderDetailPage::class);
    Route::get('/success', SuccessPage::class);
    Route::get('/cancel', CancelPage::class);
});

