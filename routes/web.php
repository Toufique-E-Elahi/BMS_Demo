<?php

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
    return view('welcome');
});

Route::get('/check', [\App\Http\Controllers\TricController::class, 'index']);
Route::post('/import_excel/import', [\App\Http\Controllers\TricController::class, 'import']);

Route::get('/check/{tric}', [\App\Http\Controllers\TricController::class, 'show']);
Route::put('/check/{tric}', [\App\Http\Controllers\TricController::class, 'update']);
Route::delete('/check/{tric}', [\App\Http\Controllers\TricController::class, 'destroy']);


//Route::get('/checks', function () {
//    return ['foo'=> 'bar',
//        'bar' => 25];
//});
