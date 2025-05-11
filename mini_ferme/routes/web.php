<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

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

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Page contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Auth routes (Laravel Breeze or default)
Auth::routes();

// Routes animales protégées par middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('animals', AnimalController::class)->except(['show']);
});
