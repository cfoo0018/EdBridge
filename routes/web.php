<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\YouTubeController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\QuestionnaireController;
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

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::prefix('support')->group(function () {
    Route::get('/', [CharityController::class, 'index'])->name('support.index');
    Route::get('/geocode', [CharityController::class, 'geocodeCharities'])->name('support.geocode');
    Route::get('/search', [CharityController::class, 'searchSuggestions'])->name('support.search');
});

Route::get('/resourcehub', [YouTubeController::class, 'index'])->name('resourcehub');
Route::get('/resourcehub/search', [YouTubeController::class, 'search'])->name('youtube.search');

// Route::get('/pathways', function () {
//     return view('pathways.pathways');
// })->name('pathways');

// Route::get('/datascience', function () {
//     return view('pathways.roadmaps.datascience');
// })->name('datascience');

// Route::get('/datascience/quiz', function () {
//     return view('pathways.quiz.datascience');
// })->name('datasciencequiz');

// Route::get('/softwaredevelopment', function () {
//     return view('pathways.roadmaps.softwaredevelopment');
// })->name('softwaredevelopment');

// Route::get('/softwaredevelopment/quiz', function () {
//     return view('pathways.quiz.softwaredevelopment');
// })->name('softwaredevelopmentquiz');

// Route::get('/cybersecurity', function () {
//     return view('pathways.roadmaps.cybersecurity');
// })->name('cybersecurity');

// Route::get('/cybersecurity/quiz', function () {
//     return view('pathways.quiz.cybersecurity');
// })->name('cybersecurityquiz');

// Route::get('/businessinformation', function () {
//     return view('pathways.roadmaps.businessinformation');
// })->name('businessinformation');

// Route::get('/businessinformation/quiz', function () {
//     return view('pathways.quiz.businessinformation');
// })->name('businessinformationquiz');

Route::prefix('pathways')->group(function () {
    Route::view('/', 'pathways.pathways')->name('pathways');
    Route::get('/questionnaire', [QuestionnaireController::class, 'index'])->name('questionnaire');
    Route::post('/submit', [QuestionnaireController::class, 'submit'])->name('submit');

    Route::prefix('roadmaps')->group(function () {
        Route::view('/datascience', 'pathways.roadmaps.datascience')->name('datascience');
        Route::view('/softwaredevelopment', 'pathways.roadmaps.softwaredevelopment')->name('softwaredevelopment');
        Route::view('/cybersecurity', 'pathways.roadmaps.cybersecurity')->name('cybersecurity');
        Route::view('/businessinformation', 'pathways.roadmaps.businessinformation')->name('businessinformation');
    });

    Route::prefix('quiz')->group(function () {
        Route::view('/datascience', 'pathways.quiz.datascience')->name('datasciencequiz');
        Route::view('/softwaredevelopment', 'pathways.quiz.softwaredevelopment')->name('softwaredevelopmentquiz');
        Route::view('/cybersecurity', 'pathways.quiz.cybersecurity')->name('cybersecurityquiz');
        Route::view('/businessinformation', 'pathways.quiz.businessinformation')->name('businessinformationquiz');
    });
});

Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships/{id}', [ScholarshipController::class, 'show'])->name('scholarships.show');

Route::fallback(function () {
    return response()->view('404', [], 404);
});

Route::get('/500', function () {
    return view('500');
});