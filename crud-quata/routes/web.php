<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/home', function() {
    return Redirect::to('/');
});

Route::get('/add', [MainController::class, 'add'])->name('add');
Route::get('/edit', [MainController::class, 'edit'])->name('edit')->middleware('auth');
Route::get('/view', [MainController::class, 'view'])->name('view');

Auth::routes();


