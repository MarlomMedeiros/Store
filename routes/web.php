<?php

use App\Http\Livewire\Auth\AccessAccount;
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
//
//Route::get('/', function () {
//    return view('livewire.index.index');
//})->name('home');
//
//Route::get('/login', function () {
//    return view('livewire.auth.login');
//})->name('login');
