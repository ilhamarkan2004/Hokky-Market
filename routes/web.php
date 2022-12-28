<?php

use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    if(Auth::user() == null || Auth::user()->role != 'admin'){
        return view('dashboard');
    }
   else{
         return view('admin.index');
    }
    
});



Route::resource('/katalog',KatalogController::class);
Route::resource('/kategori',KategoriController::class);
Route::resource('/barang',BarangController::class);
// Route::get('/kategori/create',[KategoriController::class,'create'])->name('kategori.create');
// Route::post('/kategori/store',[KategoriController::class,'store'])->name('kategori.store');
// Route::get('/kategori/edit/{kategori}',[KategoriController::class,'edit'])->name('kategori.edit');


Route::get('/dashboard', function () {
     if(Auth::user() == null || Auth::user()->role != 'admin'){
        return view('dashboard');
    }
   else{
         return view('admin.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
