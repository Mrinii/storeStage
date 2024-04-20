<?php

use App\Http\Controllers\prodController;
use App\Http\Controllers\ResController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [prodController::class, 'home']);



Route::get('/produits/{cat}', [prodController::class, 'getProdByCat']);

Route::fallback(function () {
    return view('404');
});






Route::middleware(['adminuser'])->group(function () {



    Route::get('/produits/{id}', [ResController::class, 'show'])->name('show');
    Route::get('/produits/{id}/edit', [ResController::class, 'edit'])->name('edit');
    Route::post('/produits', [ResController::class, 'store'])->name('str');
    Route::get('/addProd/create', [ResController::class, 'create'])->name('add');    //    Appel : <a href="{{ route('name') }}">
    Route::put('/produits/{id}', [ResController::class, 'update'])->name('update');
    Route::delete('/produits/{id}', [ResController::class, 'destroy'])->name('destroy');
});


// Route::get('/addProd/create', [ResController::class, 'create'])->name('add');
// Route::resource('produits', ResController::class);
// Route::post('/produits', [ResController::class, 'store'])->name('str');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/espaceadmin', [prodController::class, 'espaceadmin']);
// Route::get('/espaceclient', [prodController::class, 'espaceclient']);

//middleware routes
Route::get('/espaceadmin', [prodController::class, 'espaceadmin'])->middleware('adminuser');
Route::get('/espaceclient', [prodController::class, 'espaceclient'])->middleware('useruser');

// // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');




//route d'etails
Route::get('/details/{id}', [prodController::class, 'details']);
//route back
Route::get('/back/{cat}', [prodController::class, 'getProdByCat']);


// les routes du cart
Route::get('cart', [prodController::class, 'cart'])->middleware('useruser');
Route::get('cart/addc/{id}', [prodController::class, 'addToCart']);

Route::patch('update-cart', [prodController::class, 'updatec']);

Route::delete('remove-from-cart', [prodController::class, 'removec']);
