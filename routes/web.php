<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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
Route::get('cache_clear', function () {
    \Artisan::call('clear-compiled');
    \Artisan::call('optimize:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('route:cache');
    dd("All Compile data and Cache is cleared");
});

Route::get('php_artisan', function () {
    \Artisan::call('migrate');
    \Artisan::call('cache:clear');
    \Artisan::call('optimize:clear');
    dd("Migration is done and Cache is cleared");
});


/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/', [CustomerController::class, 'index'])->name('home');

Route::any('/ajax_trade_api_data', [CustomerController::class, 'trade_api_data'])->name('ajax_trade_api_data');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
    Route::get('/graph', [CustomerController::class, 'graph'])->name('graph');
    Route::get('/trade_results', [CustomerController::class, 'trades_history'])->name('trade_results');
    Route::get('/start_buy_trade', [CustomerController::class, 'startNewBuyTrade'])->name('start_buy_trade');
    Route::get('/start_sell_trade', [CustomerController::class, 'startNewSellTrade'])->name('start_sell_trade');
    Route::get('/close_trade', [CustomerController::class, 'endCurrentTrade'])->name('close_trade');
    Route::get('/refresh-data', [CustomerController::class, 'refresh'])->name('refresh.data');
});

/*Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', UserController::class);

    Route::get('/wallet', [DashboardController::class, 'wallet'])->name('wallet');
    Route::get('/trades', [DashboardController::class, 'trades'])->name('trades');
    Route::get('/list_trade_rates', [DashboardController::class, 'listOilRates'])->name('list_trade_rates');
    Route::get('/update_rates', [DashboardController::class, 'updateRates'])->name('update_rates');
    Route::get('/start_trade', [DashboardController::class, 'startNewTrade'])->name('start_trade');
    Route::get('/close_trade', [DashboardController::class, 'endCurrentTrade'])->name('close_trade');

});*/

require __DIR__.'/auth.php';
