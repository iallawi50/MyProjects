<?php

use App\Http\Controllers\DarkController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DefaultController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/projects');
});

Auth::routes();

Route::resource('/projects', ProjectController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/projects/{project}/tasks', [TaskController::class, 'store']);
Route::patch('/projects/{project}/tasks/{task}',[TaskController::class, 'update']);
Route::delete('/projects/{project}/tasks/{task}',[TaskController::class, 'delete']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::patch('/profile', [ProfileController::class, 'update']);


Route::get('/adminx/show/users/', function () {
    $users = User::class::get();

    return view('Admin.index', compact('users'));

});
