<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//example 1
Route::get('posts', [\App\Http\Controllers\PostController::class,'index'])->name('post.index');

//example 2
// use App\Http\Controllers\UserController;
// Route::get('users', [UserController::class,'index'])->name('user.index');

Route::get('say', function(){
    $jsonArray = ['test','test','tesd'];

    return view('say',['name'=>'jack', 'jsonArray' => $jsonArray]);
});

Route::resource('bus', \App\Http\Controllers\BusController::class);
Route::get('bus/search/{id}',[\App\Http\Controllers\BusController::class,'search'])->name('bus.search');

require __DIR__.'/auth.php';
