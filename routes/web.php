<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/resourcehub', [YouTubeController::class, 'index'])->name('resourcehub');

// Route::get('/youtube', [YouTubeController::class, 'index'])->name('youtube.index');
Route::get('/resourcehub/search', [YouTubeController::class, 'search'])->name('youtube.search');

Route::get('/pathways', function () {
    return view('pathways.pathways');
})->name('pathways');

Route::get('/datascience', function () {
    return view('pathways.roadmaps.datascience');
})->name('datascience');

Route::get('/datascience/quiz', function () {
    return view('pathways.quiz.datascience');
})->name('datasciencequiz');

Route::get('/softwaredevelopment', function () {
    return view('pathways.roadmaps.softwaredevelopment');
})->name('softwaredevelopment');

Route::get('/softwaredevelopment/quiz', function () {
    return view('pathways.quiz.softwaredevelopment');
})->name('softwaredevelopmentquiz');

Route::get('/cybersecurity', function () {
    return view('pathways.roadmaps.cybersecurity');
})->name('cybersecurity');

Route::get('/cybersecurity/quiz', function () {
    return view('pathways.quiz.cybersecurity');
})->name('cybersecurityquiz');

Route::get('/businessinformation', function () {
    return view('pathways.roadmaps.businessinformation');
})->name('businessinformation');

Route::get('/businessinformation/quiz', function () {
    return view('pathways.quiz.businessinformation');
})->name('businessinformationquiz');

Route::fallback(function () {
    return response()->view('404', [], 404);
});
