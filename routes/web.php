<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TasksController;

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

Route::get('/',                 [TasksController::class,'index'])->name('tasks.index');

Route::post('/add_new_task',    [TasksController::class, 'add_new_task'])->name('tasks.add_new');
Route::post('/edit_task',       [TasksController::class, 'edit_task'])->name('tasks.edit');
