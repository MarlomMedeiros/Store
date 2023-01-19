<?php

use App\Http\Livewire\Auth\AccessAccount;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Product;
use App\Http\Livewire\Profile\Index;
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

Route::get('/', App\Http\Livewire\Index\Index::class)->name('home');
Route::get('/login', AccessAccount::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('home');
})->name('logout');

Route::get('/produto/{product}/{name}', Product\Index::class)->name('product');
Route::get('/carrinho', Cart\Index::class)->name('cart');
Route::get('/busca/{result?}', App\Http\Livewire\Search\Index::class)->name('search');
Route::get('/minha-conta', Index::class)->name('profile');
