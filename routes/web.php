<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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
       return redirect('/movies');
});

Route::get('movies-datatable',[MovieController::class,'movieDatatable'])->name('movies.datatables');
Route::post('movies-display',[MovieController::class,'movieDisplay'])->name('movies.display');
Route::post('movies-upgrade-ajax',[MovieController::class,'movieUpgradeAjax'])->name('movies.ajax');
Route::post('movies-delete',[MovieController::class,'movieDeleteAjax'])->name('movies.delete.ajax');
Route::resource('movies', MovieController::class);

Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
 });
