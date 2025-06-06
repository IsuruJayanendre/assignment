<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardConroller;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\GenderController;

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
    return view('auth.login');
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
    Route::get('/person/view/{id}', [PersonController::class, 'show'])->name('person.show'); 

    //search
    Route::get('/person/search', [PersonController::class, 'search'])->name('person.search');

    //religion
    Route::get('/religion', [ReligionController::class, 'index'])->name('religion.index');
    Route::post('/religion/store', [ReligionController::class, 'store'])->name('religion.store');
    Route::put('/religion/{id}', [ReligionController::class, 'update'])->name('religion.update');
    Route::delete('/religion/{id}', [ReligionController::class, 'destroy'])->name('religion.destroy');

    //gender
    Route::get('/gender', [GenderController::class, 'index'])->name('gender.index');
    Route::post('/gender/store', [GenderController::class, 'store'])->name('gender.store');
    Route::put('/gender/{id}', [GenderController::class, 'update'])->name('gender.update');
    Route::delete('/gender/{id}', [GenderController::class, 'destroy'])->name('gender.destroy');
    

});
