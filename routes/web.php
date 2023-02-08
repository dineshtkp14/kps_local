<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Itemscontroller;
use App\Http\Controllers\salescontroller;
use App\Http\Controllers\CustomAuthcontroller;



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


Route::get('/', function () {
    return view('login');
});


Route::resource('/items', Itemscontroller::class);




Route::get('/stocks', [Itemscontroller::class, 'showstocklist'])->name('stocks.index');



Route::get('/sales', [salescontroller::class, 'index'])->name('sales.index');


Route::post('/sales', [salescontroller::class, 'store'])->name('sales.store');


//Route::get('/sales/{sales}/create',[salescontroller::class,'create'])->name('sales.create');
Route::get('/sales/{sales}/getdata', [Itemscontroller::class, 'getdata'])->name('items.getdata');




//Route::get('/', [CustomAuthcontroller::class, 'home']); 
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/postlogin', [CustomAuthController::class, 'login'])->name('postlogin');
Route::get('/signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::get('/changepass', [CustomAuthController::class, 'changepass'])->name('user.password');
Route::get('/change-password', [CustomAuthController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [CustomAuthController::class, 'updatePassword'])->name('update-password');



Route::post('/postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('/viewuser', [CustomAuthController::class, 'viewuser'])->name('viewuser');
Route::delete('/viewuser/{viewuse}', [CustomAuthController::class, 'destroy'])->name('users.destroy');
