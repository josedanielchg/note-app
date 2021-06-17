<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
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

Route::get('/', [NoteController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login.check');
Route::get('/register', [LoginController::class, 'register'])->name('login.register');
Route::post('/register', [LoginController::class, 'checkRegister'])->name('login.check_register');

Route::get('notes/{note}/add_label', [LabelController::class, 'addLabel'])->name('notes.add_label');
Route::resource('notes', NoteController::class);

Route::resource('label', LabelController::class)->only(['index', 'store', 'update', 'destroy']);
