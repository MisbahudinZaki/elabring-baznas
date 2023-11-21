<?php

use App\Http\Controllers\absenberandacontroller;
use App\Http\Controllers\absenpulangController;
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
use Carbon\Carbon;

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
    return view('auth.login');
});

//Route::get('/', [logincontroller::class, 'login'])->name('login');
//Route::post('actionlogin', [logincontroller::class, 'actionlogin'])->name('actionlogin');
//Route::post('logout', [logincontroller::class, 'actionlogout'])->name('logout')->middleware('auth');
//Route::get('register', [RegisterController::class, 'register'])->name('register');
//Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/home', [homecontroller::class, 'index'])->name('home');
Route::get('/gantiPassword',[UserController::class,'showchangepasswordform'])->middleware('auth');
Route::post('/gantiPassword',[UserController::class,'changepassword'])->name('changepassword')->middleware('auth');
Route::resource('user', UserController::class);


    Route::resource('absen', AbsensiController::class);
    Route::resource('absen_pulang', absenpulangController::class);

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');

Route::get('/about', [officeprofileController::class, 'index'])->name('about');

Route::get('/chat', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'sendMessage']);

Route::resource('pegawai', PegawaiController::class);


    Route::get('/cetak', [cetakcontroller::class, 'cetak'])->name('cetak')->middleware('admin');
    Route::get('/cetakdata', [cetakcontroller::class, 'cetakform'])->name('cetak-pegawai-form')->middleware('admin');
    Route::get('cetakdatapertanggal/{tglawal}/{tglakhir}', [cetakcontroller::class, 'cetakpegawaipertanggal'])->name('cetakpegawaipertanggal')->middleware('admin');

    Route::resource('beranda', absenberandacontroller::class);

Route::get('/waktu-sekarang', function () {
        $waktuSekarang = Carbon::now();
        return view('waktu-sekarang', ['waktuSekarang' => $waktuSekarang]);
    });

Auth::routes();


