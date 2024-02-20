<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\my_controllers;
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


Route::get('/', function()
{return view('welcome');});

Route::prefix('students')->middleware('auth')->group(function (){

    Route::get('', [my_controllers::class, 'list']);

    Route::post('', [my_controllers::class, 'add']);

    Route::get('/{id}/edit', [my_controllers::class, 'edit'])->where(['id'=>'[0-9]+']);

    Route::put('/{id}', [my_controllers::class, 'update'])->name('students.update');

    Route::delete('/{id}', [my_controllers::class, 'delete'])->name('students.delete');

    Route::get('/{id}/{name?}', [my_controllers::class, 'nameandid'])->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

    Route::get('/create', [my_controllers::class, 'create']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
