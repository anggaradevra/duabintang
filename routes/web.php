<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerRmsController;
use App\Models\Customer_rms;

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
    $jumlahdatapenjualan = Customer_rms::where('penjualan')->count();
    
    return view('welcome', compact('jumlahdata', 'jumlahdatapenjualan'));
});

Route::get('/rms',[CustomerRmsController::class, 'Index'])->name('rms');
Route::get('/tambahrms',[CustomerRmsController::class, 'tambahrms'])->name('tambahrms');
Route::post('/insertdatarms',[CustomerRmsController::class, 'insertdatarms'])->name('insertdatarms');

Route::get('/tampilkandatarms/{id}',[CustomerRmsController::class, 'tampilkandatarms'])->name('tampilkandatarms');
Route::post('/updatedatarms/{id}',[CustomerRmsController::class, 'updatedatarms'])->name('updatedatarms');

Route::get('/deleterms/{id}',[CustomerRmsController::class, 'deleterms'])->name('deleterms');

// Export PDF
Route::get('/exportpdf',[CustomerRmsController::class, 'exportpdf'])->name('exportpdf');


