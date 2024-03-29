<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class,'postLogin'])->name('post.login');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
});
Route::middleware(['auth'])->prefix('admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/{chat}', [AdminController::class, 'chat'])->name('chat');
    Route::post('/{chat}/send', [AdminController::class, 'send'])->name('send');
    Route::delete('/{chat}/delete', [AdminController::class, 'delete'])->name('delete');
});
