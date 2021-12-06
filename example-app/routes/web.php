<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TaxyearController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TicketController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::view('upload','upload');
Route::post('upload',[UploadController::class,'index']);
Route::view('profile','profile');
Route::get('list',function () {
    return view('list');});
Route::get('list',[MemberController::class,'show']);
Route::post('add',[MemberController::class,'add']);
Route::get('taxyear',function () {
    return view('taxyear');});
Route::get('taxyear',[TaxyearController::class,'show']);
Route::post('addtaxyear',[TaxyearController::class,'addtaxyear']);
Route::get('service',function () {
    return view('service');});
Route::get('service',[ServiceController::class,'show']);
Route::post('addservice',[ServiceController::class,'addservice']);
Route::get('getTaxYears',[ServiceController::class,'getTaxYears']);
Route::get('ticket',[TicketController::class,'show']);
Route::post('addticket',[TicketController::class,'addticket']);
Route::get('getTaxYears',[TicketController::class,'getTaxYears']);