<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardConroller;
use App\Http\Controllers\PersonController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //dashboard
    Route::get('/dash', [DashboardConroller::class, 'dashboard']);

    //person
    Route::get('/person', [PersonController::class, 'index'])->name('person.index');
    Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');
    Route::post('/person/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('/person/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
    Route::put('person/{person}', [PersonController::class, 'update'])->name('person.update');
    Route::delete('person/delete/{id}', [PersonController::class, 'destroy'])->name('person.destroy'); 
});
