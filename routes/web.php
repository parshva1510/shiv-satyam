
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ticket;
use App\Http\Controllers\authentication;
use App\Http\Controllers\user;
use App\Http\Controllers\client;
use App\Http\Controllers\paymentController;
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
Route::get('/edit_ticket/{id}',[ticket::class, 'edit_ticket'])->name('edit_ticket');
Route::get('view_ticket',[ticket::class,'view_ticket'])->name('view_ticket');


Route::get('reports',[reportcontroller::class,'reports'])->name('reports');
Route::get('show_report',[reportcontroller::class,'show_report'])->name('show_report');
Route::get('vehicle_report',[reportcontroller::class,'vehicle_report'])->name('vehicle_report');
Route::get('show_vehicle_report',[reportcontroller::class,'show_vehicle_report'])->name('show_vehicle_report');
Route::get('datewise_report',[reportcontroller::class,'datewise_report'])->name('datewise_report');
Route::get('show_datewise_report',[reportcontroller::class,'show_datewise_report'])->name('show_datewise_report');
Route::get('payment_report',[reportcontroller::class,'payment_report'])->name('payment_report');
Route::get('show_payment_report',[reportcontroller::class,'show_payment_report'])->name('show_payment_report');


Route::get('show_transporter',[ticket::class,'show_transporter'])->name('show_transporter');
Route::POST('add_transporter',[ticket::class,'add_transporter'])->name('add_transporter');



Route::get('login',[authentication::class,'login'])->name('login');
Route::post('login',[authentication::class,'check_user'])->name('check_user');
Route::get('login',[authentication::class,'destroy'])->name('destroy');
Route::get('/',[authentication::class,'login']);


Route::get('demo',[ticket::class,'demo'])->name('demo');
Route::post('formsubmit',[ticket::class,'formsubmit'])->name('formsubmit');

Route::get('add_user',[user::class,'add_user'])->name('add_user');

Route::get('add_client',[client::class,'show_client'])->name('show_client');
Route::post('add_client',[client::class,'add_client'])->name('add_client');
Route::get('edit_client/{id}',[client::class,'edit_client'])->name('edit_client');
Route::get('delete_client/{id}',[client::class,'delete_client'])->name('delete_client');
Route::post('update_client',[client::class,'update_client'])->name('update_client');

Route::get('add_user',[User::class,'show_user'])->name('show_user');
Route::post('add_user',[User::class,'add_user'])->name('add_user');
Route::get('edit_user/{id}',[User::class,'edit_user'])->name('edit_user');
Route::get('delete_user/{id}',[User::class,'delete_user'])->name('delete_user');
Route::post('update_user',[User::class,'update_user'])->name('update_user');

Route::get('add_payment',[paymentController::class,'show_payment'])->name('show_payment');
Route::post('add_payment',[paymentController::class,'add_payment'])->name('add_payment');
Route::post('add_payment1',[paymentController::class,'show_payment'])->name('add_payment1');
Route::get('edit_payment',[paymentController::class,'show_payment'])->name('show_payment1');
Route::get('/edit_payment/{id}',[paymentController::class,'edit_payment'])->name('edit_payment');
Route::post('update_payment',[paymentController::class,'update_payment'])->name('update_payment');
Route::get('delete_payment/{id}',[paymentController::class,'delete_payment'])->name('delete_payment');
Route::get('get_transporter',[paymentController::class,'get_transporter'])->name('get_transporter');

Route::get('add_report',[ticket::class,'add_report'])->name('add_report');


Route::get('generate-pdf/{id}',[pdfcontroller::class,'generatepdf'])->name('generate-pdf');


Route::get('reports',[reportcontroller::class,'reports'])->name('reports');

Route::get('reset_password',[authentication::class,'reset_password'])->name('reset_password');

Route::get('change_password',[authentication::class,'change_password'])->name('change_password');

Route::POST('add_ticket',[ticket::class,'add_ticket'])->name('add_ticket');
// aa je apne update karie 6ea e kai method  6 ?

Route::post('update_ticket',[ticket::class,'update_ticket'])->name('update_ticket');
Route::get('/delete_ticket/{sr_no}',[ticket::class,'delete_ticket'])->name('delete_ticket');
