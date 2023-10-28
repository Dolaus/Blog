<?php

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

Route::get('/', function () {
    return 2;
});
Route::get('/qq', function () {
    return 333;
});
Route::get('/q1', function () {
    return 2;
});Route::get('/q2', function () {
    return 1;
});
