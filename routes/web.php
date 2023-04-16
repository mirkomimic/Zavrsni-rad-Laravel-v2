<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RestaurantLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/restaurant/{id}/items', [HomeController::class, 'showRestaurantItems'])->name('restaurant-items');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('users/logout', [LoginController::class, 'userLogout'])->name('user.logout');

Route::get('/add-to-cart/{item}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/remove-from-cart/{item}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
Route::get('/get-items-from-cart', [CartController::class, 'getItemsFromCart'])->name('get.items.from.cart');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');

Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'store'])->name('create.order');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::prefix('restaurant')->group(function () {
    Route::post('/addItem', [RestaurantController::class, 'addItem'])->name('restaurant.add.item');
    Route::post('/deleteItem', [RestaurantController::class, 'deleteItem'])->name('restaurant.delete.item');
    Route::post('/getItem', [RestaurantController::class, 'getItem'])->name('restaurant.get.item');
    Route::post('/editItem', [RestaurantController::class, 'editItem'])->name('restaurant.edit.item');
    Route::post('/items/priceAsc', [RestaurantController::class, 'getItemsByPriceAsc'])->name('restaurant.items.asc');
    Route::post('/items/priceDesc', [RestaurantController::class, 'getItemsByPriceDesc'])->name('restaurant.items.desc');
    Route::post('/items/search', [RestaurantController::class, 'filterByName'])->name('restaurant.items.search');

    Route::get('/login', [RestaurantLoginController::class, 'showLoginForm'])->name('restaurant.login');
    Route::post('/login', [RestaurantLoginController::class, 'login'])->name('restaurant.login.submit');
    Route::post('/logout', [RestaurantLoginController::class, 'logout'])->name('restaurant.logout');
    Route::get('/', [RestaurantController::class, 'index'])->name('restaurant.dashboard');
});
