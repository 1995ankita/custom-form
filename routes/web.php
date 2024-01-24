<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\TaskController;

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

// Route::get('create-form-field/{field}', [FormController::class, 'create']);
// Route::post('save-form-text', [FormController::class, 'store'])->name('form.store');
// Route::get('/form/{id}/show', [FormController::class, 'show'])->name('form.show');
// Route::get('/form/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
// Route::put('/form/{id}', [FormController::class, 'update'])->name('form.update');
// Route::get('/form/{id}/delete', [FormController::class, 'delete'])->name('form.delete');

Route::resource('project',            ProjectController::class);
Route::resource('project.board',            BoardController::class);
Route::resource('project.board.task',            TaskController::class);
Route::get('project/{project_id}/board/{board_id}/task/create/{field}', [TaskController::class, 'create'])
    ->name('project.board.task.create');
