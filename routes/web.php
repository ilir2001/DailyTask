<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DailyTaskController;
use App\Http\Controllers\CompleteController;
use App\Models\Post;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {;
    return view('index');
})->name('index');

Route::resource('/daily', DailyTaskController::class);

Route::put('post/{post}/complete', CompleteController::class)->name('daily.complete');

