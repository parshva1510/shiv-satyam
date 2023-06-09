<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ticket;
use App\Http\Controllers\authentication;
use App\Http\Controllers\user;
use App\Http\Controllers\addtransporter;
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

Route::get('ticket_form',[ticket::class,'index'])->name('ticket_form');
Route::get('view_ticket',[ticket::class,'view_ticket'])->name('view_ticket');
Route::get('login',[authentication::class,'login'])->name('login');
Route::get('/',[authentication::class,'login']);


Route::get('demo',[ticket::class,'demo'])->name('demo');
Route::post('formsubmit',[ticket::class,'formsubmit'])->name('formsubmit');

Route::get('add_user',[user::class,'add_user'])->name('add_user');
Route::get('transporter',[addtransporter::class,'show_transporter'])->name('show_transporter');
Route::post('transporter',[addtransporter::class,'add_transporter'])->name('add_transporter');
Route::get('add_report',[ticket::class,'add_report'])->name('add_report');
Route::get('add_payment',[payment::class,'add_payment'])->name('add_payment');

Route::get('generate-pdf',[pdfcontroller::class,'generatepdf'])->name('generate-pdf');
Route::get('reports',[reportcontroller::class,'reports'])->name('reports');

Route::POST('add_ticket',[ticket::class,'add_ticket'])->name('add_ticket');