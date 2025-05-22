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

    //
    Route::get('/dash', [DashboardConroller::class, 'dashboard']);
    Route::get('/person', [PersonController::class, 'index'])->name('person.index');
});
