<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ticket;
use App\Http\Controllers\authentication;
use App\Http\Controllers\user;
use App\Http\Controllers\client;
use App\Http\Controllers\payment;
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

Route::get('add_user',[user::class,'add_user'])->name('add_user');
Route::get('add_client',[client::class,'add_client'])->name('add_client');
Route::get('add_report',[ticket::class,'add_report'])->name('add_report');
Route::get('add_payment',[payment::class,'add_payment'])->name('add_payment');

Route::get('generate-pdf',[pdfcontroller::class,'generatepdf'])->name('generate-pdf');
Route::get('reports',[reportcontroller::class,'reports'])->name('reports');
