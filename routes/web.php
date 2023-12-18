<?php

use App\Models\OccurrenceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OccurrenceController;
use App\Http\Controllers\OccurrenceTypeController;

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
    $occurrences = OccurrenceType::pluck('name', 'id');
    return view('welcome',compact('occurrences'));
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(OccurrenceTypeController::class)->group(function () {
    Route::get('/index-occurrence-type', 'index')->name('index-occurrence-type');
});

Route::controller(OccurrenceController::class)->group(function () {
    Route::get('/index-occurrence', 'index')->name('index-occurrence');
    Route::post('/store-occurrences', 'store')->name('occurrences.store');
});

