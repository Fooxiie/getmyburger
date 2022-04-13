<?php

use App\Http\Controllers\BurgerController;
use App\Http\Controllers\OrderController;
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
    if (date('l') == "Thursday") {
        $time = new DateTime("now", new DateTimeZone("Europe/Paris"));
        if ($time->format('H') >= 11) {
            return view('finish');
        } else {
            return view('index');
        }
    } else {
        return view('badday');
    }
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/debug', function () {
    return view('index');
})->middleware(['auth'])->name('debug');

Route::get('/burger', [BurgerController::class, 'show'])->middleware(['auth'])->name('burger.show');
Route::get('/burger/new', [BurgerController::class, 'new'])->middleware(['auth'])->name('burger.new');
Route::get('/burger/edit', [BurgerController::class, 'edit'])->middleware(['auth'])->name('burger.edit');
Route::post('/burger/edit_submit', [BurgerController::class, 'edit_submit'])->middleware(['auth'])->name('burger.edit_submit');
Route::get('/burger/delete', [BurgerController::class, 'delete'])->middleware(['auth'])->name('burger.delete');

Route::get('/order', [OrderController::class, 'show'])->middleware(['auth'])->name('order.show');
Route::get('/order/delete', [OrderController::class, 'delete'])->middleware(['auth'])->name('order.delete');
Route::get('/order/resume', [OrderController::class, 'resume'])->middleware(['auth'])->name('order.resume');
Route::post('/order/submit', [OrderController::class, 'submit'])->name('order.submit');
Route::get('/order/ok', [OrderController::class, 'ok'])->name('order.ok');
Route::get('/order/paid', [OrderController::class, 'paid'])->middleware(['auth'])
    ->name('order.paid');

require __DIR__ . '/auth.php';
