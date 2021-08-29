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

Route::get('/add', function (){ 
    return view('user.add'); })->name('add');
Route::post('/add.do', [MainController::class, 'add'])->name('add.do');
Route::get('/add.do', function (){ 
    return Redirect::to('/'); });

Route::get('/edit/{id}', [MainController::class, 'editload'])->name('edit');
Route::get('/edit', function (){ 
    return Redirect::to('/'); });

Route::post('/edit.do', [MainController::class, 'edit'])->name('edit.do');
Route::get('/edit.do', function (){ 
    return Redirect::to('/'); });

Route::post('/delete', [MainController::class, 'delete'])->name('delete');
Route::get('/delete', function (){ 
    return Redirect::to('/'); });

Route::get('/view/{id}', [MainController::class, 'view'])->name('view');
Route::get('/view', function (){ 
    return Redirect::to('/'); });


Auth::routes();


