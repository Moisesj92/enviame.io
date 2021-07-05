<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Rutas principales para el passport */
Route::prefix('auth')->name('auth.')->group(function () {

    Route::post('login', [AuthController::class, 'login']);

    Route::post('signup', [AuthController::class, 'signUp']);

    Route::middleware(['auth:api'])->group(function () {

        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

/* Companies */
Route::prefix('company')->name('companyapi.')->group(function () {

    Route::middleware(['auth:api'])->group(function () {

        Route::get('/list', [CompanyController::class, 'index'])->name('list');
        Route::get('/{id}', [CompanyController::class, 'show'])->name('show');
        Route::post('/', [CompanyController::class, 'store'])->name('store');
        Route::put('/{id}', [CompanyController::class, 'update'])->name('update');
        Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('delete');

    });

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
