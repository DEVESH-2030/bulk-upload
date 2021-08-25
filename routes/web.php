<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportExcelController;

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

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', [ImportExcelController::class, 'view'])->name('view');
Route::post('/import_excel/import', [ImportExcelController::class, 'import'])->name('import');
Route::get('/import_excel/delete'.'/{id}', [ImportExcelController::class, 'delete'])->name('delete');
Route::get('/import_excel/download', [ImportExcelController::class, 'download'])->name('download');
