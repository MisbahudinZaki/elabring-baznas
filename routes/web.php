<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\cetakcontroller;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\officeprofileController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

//Route::get('/', [logincontroller::class, 'login'])->name('login');
//Route::post('actionlogin', [logincontroller::class, 'actionlogin'])->name('actionlogin');
//Route::post('logout', [logincontroller::class, 'actionlogout'])->name('logout')->middleware('auth');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/home', [homecontroller::class, 'index'])->name('home');
Route::get('/gantiPassword',[UserController::class,'showchangepasswordform'])->middleware('auth');
Route::post('/gantiPassword',[UserController::class,'changepassword'])->name('changepassword')->middleware('auth');


    Route::resource('absen', AbsensiController::class);

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');

Route::get('/about', [officeprofileController::class, 'index'])->name('about');

Route::get('/chat', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'sendMessage']);

Route::resource('pegawai', PegawaiController::class);

    Route::get('/cetak', [cetakcontroller::class, 'cetak'])->name('cetak')->middleware('admin');
    Route::get('/cetakdata', [cetakcontroller::class, 'cetakform'])->name('cetak-pegawai-form')->middleware('admin');
    Route::get('cetakdatapertanggal/{tglawal}/{tglakhir}', [cetakcontroller::class, 'cetakpegawaipertanggal'])->name('cetakpegawaipertanggal')->middleware('admin');
  //  Route::get('/cetakpertanggal',[cetakcontroller::class, 'cetakpertanggal'])->name('cetakpertanggal')->middleware('admin');
   // Route::get('cetakdata/{tglawal}/{tglakhir}','cetakcontroller@cetakpertanggal')->name('cetakdata');

//absen->

/*
Route::get('/absen', [AbsensiController::class, 'index'])->name('absen.index');
Route::get('/create', [AbsensiController::class, 'create'])->name('absen.create');
Route::post('/store', [AbsensiController::class, 'store'])->name('absen.store');
Route::get('/edit/{id}', [AbsensiController::class, 'edit'])->name('absen.edit');
Route::put('/update/{id}', [AbsensiController::class, 'update'])->name('absen.update');
Route::get('/destroy/{id}', [AbsensiController::class, 'destroy'])->name('absen.destroy');
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

