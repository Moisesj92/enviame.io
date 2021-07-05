<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*Companies*/
Route::prefix('company')->name('companyweb.')->group(function(){

    Route::middleware(['auth'])->group(function () {
        
        Route::get('/list', [CompanyController::class, 'index'])->name('list');
        Route::get('/create', [CompanyController::class, 'create'])->name('create');
        Route::get('/edit/{company}', [CompanyController::class, 'edit'])->name('edit');
        Route::get('/{id}', [CompanyController::class, 'show'])->name('show');
        Route::post('/', [CompanyController::class, 'store'])->name('store');
        Route::put('/{company}', [CompanyController::class, 'update'])->name('update');
        Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('delete');

    });


});

require __DIR__.'/auth.php';
