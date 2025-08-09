<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout menggunakan get sesuai Laravel convention dan untuk keamanan CSRF
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $user = Auth::user(); // Ambil data user yang login
    return view('dashboard', ['user' => $user]);
})->name('dashboard');

// Route account dan buy menggunakan controller AdminController
// Karena tidak menggunakan middleware 'auth', lakukan pengecekan session manual jika perlu di controller
Route::get('/account', [AdminController::class, 'account'])->name('admin.account');
Route::middleware('auth')->group(function () {
    Route::get('/account', [AdminController::class, 'account'])->name('admin.account');

    Route::post('/account/add', [AdminController::class, 'storeAccount'])->name('account.add');

    // Memproses update akun, method PUT atau POST
    Route::put('/account/{username}', [AdminController::class, 'updateAccount'])->name('account.update');
    // Route::get('/account/{username}/edit', [AdminController::class, 'editAccount'])->name('account.edit');

    // Route delete dengan method DELETE
    Route::delete('/account/{username}', [AdminController::class, 'deleteAccount'])->name('account.delete');
});

Route::get('/view', [AdminController::class, 'view'])->name('view');
Route::get('/progress', [AdminController::class, 'progress'])->name('progress');

Route::middleware(['auth'])->group(function () {
    Route::get('/buy', [PembelianController::class, 'buy'])->name('buy');

    Route::get('/pembelian/tambah', [PembelianController::class, 'create'])
        ->name('pembelian.create');

    Route::post('/pembelian/store', [PembelianController::class, 'store'])
        ->name('pembelian.store');

    // Route delete dengan model binding
    Route::resource('pembelian', PembelianController::class);
    Route::delete('pembelian/{pembelian}', [PembelianController::class, 'destroy'])
        ->name('pembelian.destroy');
});