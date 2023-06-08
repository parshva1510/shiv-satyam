<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ticket;
use App\Http\Controllers\transporter;
use App\Http\Controllers\authentication;
use App\Http\Controllers\user;
use App\Http\Controllers\pdfcontroller;
use App\Http\Controllers\reportcontroller;
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
Route::get('/',[authentication::class,'login']);


Route::get('demo',[ticket::class,'demo'])->name('demo');
Route::post('formsubmit',[ticket::class,'formsubmit'])->name('formsubmit');


Route::get('client',[ticket::class,'client'])->name('client');
//Route::post('client',[ticket::class,'add_transporter'])->name('add_transporter');


Route::get('transporter',[ticket::class,'add_transporter'])->name('add_transporter');
/*Route::get('add_ticket/{id}',[ticket::class,'add_ticket'])->name('add_ticket');
Route::post('add_ticket/{id}',[ticket::class,'add_transporter'])->name('add_transporter');*/


//Route::get('add_transporter',[transporter::class,'show'])->name('show');



Route::get('reports',[reportcontroller::class,'reports'])->name('reports');