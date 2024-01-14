<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});
Route::get('/onas', function () {
    return view('onas');
});

Route::get('/dashboard', [ProfileController::class, 'showDashboard'])->name('dashboard');
Route::get('/zmianahasla', [ProfileController::class, 'showZmianaHasla'])->name('zmianahasla');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/kontakt', [ContactUsFormController::class, 'createForm']);
Route::post('/kontakt', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');


Route::get('/adres', [AddressController::class, 'index'])->name('indexAdres');
Route::post('/adres-create', [AddressController::class, 'store'])->name('storeAdres');
Route::get('/adres-create', [AddressController::class, 'create'])->name('createAdres');

Route::delete('/delete/{id}', [AddressController::class,'destroy'])->name('deleteAdres');


Route::get('/sklep', [ProductController::class, 'index'])->name('indexProduct');
Route::post('/dodaj-przedmiot', [ProductController::class, 'store'])->name('dodajPrzedmiot');
Route::get('/dodaj-przedmiot', [ProductController::class, 'create'])->name('stworzPrzedmiot');

require __DIR__.'/auth.php';
