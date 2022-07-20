<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\TaskController;
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



/**
* Rotas para painel administrativo
*/

Route::get('/', [DashboardController::class, 'index'])->name('admin');

/**
* Rotas de login
*/

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login/do', [AuthController::class, 'login'])->name('login.do');
Route::get('/registrar', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('/registrar/do', [AuthController::class, 'register'])->name('register.do');
Route::get('/logout/do', [AuthController::class, 'logout'])->name('logout.do');

/*
|
|Rotas de agenda de tarefas
|
 */
Route::get('/tarefas/busca', [TaskController::class, 'find'])
->name('task.find')
->middleware('auth');


Route::resource('/tarefas', TaskController::class)
->names('task')
->parameters(['tarefas' => 'task'])
->middleware('auth');

Route::patch('/tarefas/{task}', [TaskController::class, 'concludedTask'])
->name('task.concluded')
->middleware('auth');
