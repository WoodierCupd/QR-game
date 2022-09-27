<?php

use App\Http\Controllers\PDFController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/question/{question}', function (\App\Models\Question $question) {
    return view('question')->with(compact('question'));
})->name('question');

Route::get('/verify/{verify_request}', function (\App\Models\verify_request $verify_request) {
    return view('verify')->with(compact('verify_request'));
})->middleware(['auth'])->name('verify');

Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->middleware(['auth'])->name('pdf');

require __DIR__.'/auth.php';
