
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

Route::get('ticket_form',[ticket::class,'index'])->name('ticket_form');
Route::get('view_ticket',[ticket::class,'view_ticket'])->name('view_ticket');


Route::get('show_reports',[reportcontroller::class,'show_reports'])->name('show_reports');

Route::get('show_transporter',[ticket::class,'show_transporter'])->name('show_transporter');
Route::POST('add_transporter',[ticket::class,'add_transporter'])->name('add_transporter');

Route::get('login',[authentication::class,'login'])->name('login');
Route::get('/',[authentication::class,'login']);


Route::get('demo',[ticket::class,'demo'])->name('demo');
Route::post('formsubmit',[ticket::class,'formsubmit'])->name('formsubmit');

Route::get('add_user',[user::class,'add_user'])->name('add_user');

/*Route::get('add_client',[client::class,'show_client'])->name('show_client');
Route::post('add_client',[client::class,'add_client'])->name('add_client');*/
Route::get('add_client',[client::class,'show_client'])->name('show_client');
Route::post('add_client',[client::class,'add_client'])->name('add_client');
Route::get('edit/{id}',[client::class,'edit'])->name('edit_client');
Route::get('delete/{id}',[client::class,'delete'])->name('delete_client');

Route::get('add_report',[ticket::class,'add_report'])->name('add_report');
Route::get('add_payment',[payment::class,'add_payment'])->name('add_payment');

Route::get('generate-pdf',[pdfcontroller::class,'generatepdf'])->name('generate-pdf');
Route::get('reports',[reportcontroller::class,'reports'])->name('reports');

Route::POST('add_ticket',[ticket::class,'add_ticket'])->name('add_ticket');

Route::get('/edit_ticket/{sr_no}',[ticket::class, 'edit_ticket'])->name('edit_ticket');
Route::post('update_ticket',[ticket::class,'update_ticket'])->name('update_ticket');
Route::get('/delete_ticket/{sr_no}',[ticket::class,'delete_ticket'])->name('delete_ticket');

