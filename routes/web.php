<?php

use App\Http\Controllers\KatalogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
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
Route::post('/keranjang',[KeranjangController::class, 'store'])->middleware('auth')->name('keranjang.store');
Route::post('/keranjang',[KeranjangController::class, 'store'])->middleware('auth')->name('keranjang.store');
Route::resource('/photo',PhotoController::class)->middleware('auth');
Route::resource('keranjang', KeranjangController::class)->middleware('auth')->except(['store','create','edit','update']);
// Route::get('/keranjang',[KeranjangController::class, 'index']);
Route::resource('/kategori',KategoriController::class)->middleware('auth');
Route::resource('/barang',BarangController::class)->middleware('auth');
Route::resource('/produk',ProdukController::class);
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
