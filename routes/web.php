<?php

use App\Models\Customer_rms;
use App\Models\Customer_dbs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerDbsController;
use App\Http\Controllers\CustomerRmsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukrmsController;
use App\Models\produkrms;

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

Route::get('/', function () {
    $jumlahdata = Customer_rms::count();
    $jumlahdatadb = Customer_dbs::count();
    $jumlahdataproduk = produkrms::count();
    
    return view('welcome', compact('jumlahdata', 'jumlahdatadb', 'jumlahdataproduk'));
});

// RMS
Route::get('/rms',[CustomerRmsController::class, 'Index'])->name('rms');
Route::get('/tambahrms',[CustomerRmsController::class, 'tambahrms'])->name('tambahrms');
Route::post('/insertdatarms',[CustomerRmsController::class, 'insertdatarms'])->name('insertdatarms');

Route::get('/tampilkandatarms/{id}',[CustomerRmsController::class, 'tampilkandatarms'])->name('tampilkandatarms');
Route::post('/updatedatarms/{id}',[CustomerRmsController::class, 'updatedatarms'])->name('updatedatarms');

Route::get('/deleterms/{id}',[CustomerRmsController::class, 'deleterms'])->name('deleterms');

// Export PDF
Route::get('/exportpdf',[CustomerRmsController::class, 'exportpdf'])->name('exportpdf');

// Export PDF
Route::get('/exportexcel',[CustomerRmsController::class, 'exportexcel'])->name('exportexcel');
Route::get('/exportdbexcel',[CustomerDbsController::class, 'exportdbexcel'])->name('exportdbexcel');
// import PDF
Route::post('/importexcel',[CustomerRmsController::class, 'importexcel'])->name('importexcel');
Route::post('/importdbexcel',[CustomerDbsController::class, 'importdbexcel'])->name('importdbexcel');

// DB
Route::get('/db',[CustomerDbsController::class, 'Index'])->name('db');
Route::get('/tambahdb',[CustomerDbsController::class, 'tambahdb'])->name('tambahdb');
Route::post('/insertdatadb',[CustomerDbsController::class, 'insertdatadb'])->name('insertdatadb');
Route::get('/tampilkandatadb/{id}',[CustomerDbsController::class, 'tampilkandatadb'])->name('tampilkandatadb');
Route::post('/updatedatadb/{id}',[CustomerDbsController::class, 'updatedatadb'])->name('updatedatadb');
Route::get('/deletedb/{id}',[CustomerDbsController::class, 'deletedb'])->name('deletedb');
Route::get('/exportdbpdf',[CustomerDbsController::class, 'exportdbpdf'])->name('exportdbpdf');

// Produk 
Route::get('/produk',[ProdukrmsController::class, 'index'])->name('dataproduk');
Route::get('/tambahproduk',[ProdukrmsController::class, 'create'])->name('tambahdb');
Route::post('/insertdataproduk',[ProdukrmsController::class, 'insertproduk'])->name('insertdataproduk');
Route::get('/deleteproduk/{id}',[ProdukrmsController::class, 'deleteproduk'])->name('deleteproduk');
Route::get('/tampilkandataproduk/{id}',[ProdukrmsController::class, 'tampilkandataproduk'])->name('tampilkandataproduk');
Route::post('/updatedataproduk/{id}',[ProdukrmsController::class, 'updatedataproduk'])->name('updatedataproduk');


// Login
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/proses',[LoginController::class, 'proses'])->name('proses');
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/inputregister',[LoginController::class, 'inputregister'])->name('inputregister');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');