<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransaksiController;

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

Route::middleware('guest')->group( function () {
	Route::get('register', [OutletController::class, 'register'])->name('register');
	Route::post('register/outlet', [OutletController::class, 'doRegister'])->name('register.outlet');

	Route::get('login', [UserController::class, 'login'])->name('login');
	Route::post('login/user', [UserController::class, 'doLogin'])->name('login.user');
});

Route::middleware('auth')->group( function () {

	Route::middleware('can:role, "admin"')->group( function (){
		Route::get('paket', [PageController::class, 'paket'])->name('paket');
		Route::get('pengguna', [PageController::class, 'pengguna'])->name('pengguna');
		Route::get('pengaturan', [PageController::class, 'pengaturan'])->name('pengaturan');

		Route::get('paket/add', [PaketController::class, 'add'])->name('paket.add');
		Route::post('paket/store', [PaketController::class, 'store'])->name('paket.store');
		Route::get('paket/ubah/{id}', [PaketController::class, 'ubah'])->name('paket.ubah');
		Route::post('paket/update/{id}', [PaketController::class, 'update'])->name('paket.update');
		Route::get('paket/delete/{id}', [PaketController::class, 'delete'])->name('paket.delete');

		Route::get('pengguna/add', [UserController::class, 'add'])->name('pengguna.add');
		Route::post('pengguna/store', [UserController::class, 'store'])->name('pengguna.store');
		Route::get('pengguna/ubah/{id}', [UserController::class, 'ubah'])->name('pengguna.ubah');
		Route::post('pengguna/update/{id}', [UserController::class, 'update'])->name('pengguna.update');
		Route::get('pengguna/delete/{id}', [UserController::class, 'delete'])->name('pengguna.delete');

		Route::post('outlet/update', [OutletController::class, 'update'])->name('outlet.update');
		Route::get('outlet/delete', [OutletController::class, 'delete'])->name('outlet.delete');

	});

	Route::middleware('can:role, "admin", "kasir"')->group(function() {
		Route::get('transaksi', [PageController::class, 'transaksi'])->name('transaksi');
		Route::get('member/add', [MemberController::class, 'add'])->name('member.add');
		Route::post('member/store', [MemberController::class, 'store'])->name('member.store');
		Route::get('member/ubah/{id}', [MemberController::class, 'ubah'])->name('member.ubah');
		Route::post('member/update/{id}', [MemberController::class, 'update'])->name('member.update');
		Route::get('member/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

		Route::get('transaksi/member/{id}', [TransaksiController::class, 'transaksiMember'])->name('transaksi.member');
		Route::get('transaksi/member/{id}/add', [TransaksiController::class, 'add'])->name('transaksi.add');
		Route::post('transaksi/member/{id}/store', [TransaksiController::class, 'store'])->name('transaksi.store');
		Route::get('transaksi/member/{id}/ubah', [TransaksiController::class, 'ubah'])->name('transaksi.ubah');
		Route::post('transaksi/member/{id}/update', [TransaksiController::class, 'update'])->name('transaksi.update');
		Route::get('transaksi/member/{id}/delete', [TransaksiController::class, 'delete'])->name('transaksi.delete');

		Route::get('transaksi/member/{id}/detail', [TransaksiController::class, 'transaksiDetail'])->name('transaksi.detail');
		Route::post('transaksi/member/{id}/detail/store', [TransaksiController::class, 'transaksiDetailStore'])->name('transaksiDetail.store');
	});

	Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
	Route::get('laporan', [PageController::class, 'laporan'])->name('laporan');
	Route::get('laporan/generate', [PageController::class, 'generateLaporan'])->name('laporan.generate');
	Route::get('logout', [UserController::class, 'logout'])->name('logout');

});
