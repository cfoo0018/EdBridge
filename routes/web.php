<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\YouTubeController;
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
})->name('home');

// Route::get('/resourcehub', function () {
//     return view('resourcehub');
// })->name('resourcehub');

Route::get('/support', [CharityController::class, 'index'])->name('support.index');
Route::get('/support/geocode', [CharityController::class,'geocodeCharities'])->name('support.geocode');


Route::get('/resourcehub', [YouTubeController::class, 'index'])->name('resourcehub');

// Route::get('/youtube', [YouTubeController::class, 'index'])->name('youtube.index');
Route::get('/resourcehub/search', [YouTubeController::class, 'search'])->name('youtube.search');