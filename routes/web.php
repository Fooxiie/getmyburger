<?php

use App\Http\Controllers\BurgerController;
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

Route::get('/burger', [BurgerController::class, 'show'])->middleware(['auth'])->name('burger.show');
Route::get('/burger/edit', [BurgerController::class, 'edit'])->middleware(['auth'])->name('burger.edit');
Route::get('/burger/delete', [BurgerController::class, 'delete'])->middleware(['auth'])->name('burger.delete');

require __DIR__.'/auth.php';
