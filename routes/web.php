<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Models\to_do_list;
use App\Models\to_do_list_user;
use App\Http\Controllers\AuthController;

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

Route::get('/',[ToDoController::class,'Home'])->name('home');
Route::get('/register',[ToDoController::class, 'Register'])->name('register');
Route::post('/register',[AuthController::class,'SendRegister']);
Route::get('/login',[ToDoController::class,'Login'])->name('login');
Route::post('/login',[AuthController::class,'SendLogin']);
Route::get('/logout',[AuthController::class,'Logout'])->name('logout');
Route::group(['middleware'=>'LoginControl'], function()
{
    Route::get('/dashboard',[ToDoController::class,'Dashboard'])->name('dashboard');
    Route::get('/create',[ToDoController::class,'Create'])->name('create');
    Route::post('/create',[ToDoController::class,'SendCreate'])->name('sendcreate');
    Route::get('/edit/{id}',[ToDoController::class,'Edit'])->name('edit');
    Route::post('/edit/{id}',[ToDoController::class,'SendEdit'])->name('sendedit');
    Route::get('delete/{id}',[ToDoController::class,'Delete'])->name('delete');
});

