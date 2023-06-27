<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SweepstakeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource("/user", UserController::class)->names('user');
Route::resource("/sweepstakes", SweepstakeController::class)->names('sweepstakes');

Route::get('/participant', [SweepstakeController::class, 'createParticipant'])->name('participant.create');
Route::post('/participant', [SweepstakeController::class, 'storeParticipant'])->name('participant.store');

Route::get("/sweepstakes/draw/{sweepstake}", [SweepstakeController::class, 'draw'])->name('sweepstakes.draw');