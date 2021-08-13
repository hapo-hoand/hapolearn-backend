<?php

use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Models\Course;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::post('/login/store', [LoginController::class, 'store'])->name('account.store');
Route::post('/login/findUser', [LoginController::class, 'findUser'])->name('account.findUser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home/allcourses', [CourseController::class, 'index'])->name('allcourse');
Auth::routes();
