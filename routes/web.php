<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',             [FormController::class, 'index'])->name('form');

Route::get('create-form-field/{field}', [FormController::class, 'create']);
Route::post('save-form-text', [FormController::class, 'store'])->name('form.store');
Route::get('/form/{id}/show', [FormController::class, 'show'])->name('form.show');
Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');
