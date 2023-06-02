<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ticket;
use App\Http\Controllers\authentication;
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

Route::get('add_ticket',[ticket::class,'add_ticket'])->name('add_ticket');
Route::get('view_ticket',[ticket::class,'view_ticket'])->name('view_ticket');
Route::get('login',[authentication::class,'login'])->name('login');
Route::get('/',[authentication::class,'login1']);