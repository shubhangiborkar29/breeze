<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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


Route::get('dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
Route::get('table',[ProfileController::class,'table'])->name('table');
Route::get('edit/{id}',[ProfileController::class,'edit'])->name('edit');
Route::post('update/{id}',[ProfileController::class,'update'])->name('update');

Route::post('api/fetch-states', [RegisteredUserController::class, 'fetchState']);
Route::post('api/fetch-cities', [RegisteredUserController::class, 'fetchCity']);
