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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subject/create', [App\Http\Controllers\SubjectController::class, 'create'])->name('subjects.create');
Route::get('/subjects/{subject}', [App\Http\Controllers\SubjectController::class, 'show'])->name('subjects.show');
Route::post('/subject/{subject}', [App\Http\Controllers\SubjectController::class, 'suscribe'])->name('subjects.suscribe');
Route::post('/subjects', [App\Http\Controllers\SubjectController::class, 'store'])->name('subjects.store');
