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

Route::get('/', [NoteController::class, 'index'])->name('notes.index')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.index');

Route::get('/register', [LoginController::class, 'register'])->name('login.register');
Route::post('/register', [LoginController::class, 'checkRegister'])->name('login.register');

Route::middleware('auth')->group(function () {
     Route::get('notes/{note}/add_label', [LabelController::class, 'addLabel'])->name('notes.add_label');

     //Trash routes
     Route::get('trash', [NoteController::class, 'trash'])->name('notes.trash');
     Route::delete('send_trash/{note}', [NoteController::class, 'sendTrash'])->name('notes.sendTrash');
     Route::put('restore/{note}', [NoteController::class, 'restore'])->name('notes.restore');
     Route::delete('empty_trash/', [NoteController::class, 'emptyTrash'])->name('notes.empty_trash');
     Route::get('notes/{note}/trash', [NoteController::class, 'showReadOnly'])->name('notes.read_only');

     //Notes routes
     Route::resource('notes', NoteController::class)->except(["index", "edit"]);

     // Route::resource('label', LabelController::class)->only(['index', 'store', 'update', 'destroy']);
     Route::resource('labels', LabelController::class)->except(["create", 'edit']);
});
