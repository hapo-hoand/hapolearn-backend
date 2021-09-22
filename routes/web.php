<?php

use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\LessonController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::post('/signin/store', [LoginController::class, 'store'])->name('account.store');
Route::post('/signin', [LoginController::class, 'signin'])->name('account.signin');
Route::get('/signout', [LoginController::class, 'signout'])->name('account.signout');
Route::get('/home/allcourses', [CourseController::class, 'index'])->name('allcourse');
Route::get('/search', [CourseController::class, 'search'])->name('search');
Route::get('/home/course/{id}', [CourseController::class, 'show'])->name('course.detail');
Route::post('/searchlesson', [LessonController::class, 'search'])->name('course.filter.lesson');

Route::get('/lesson/dowload/{id}/{name}', [LessonController::class, 'download'])->name('lesson.download');
Route::get('/lesson/preview/{id}/{name}', [LessonController::class, 'preview'])->name('lesson.preview');
Route::get('/learned', [UserController::class, 'leared']);

Route::group(['middleware' => 'checksigin'], function () {
    Route::get('/takethiscourse/{id}', [CourseController::class, 'join'])->name('course.takethiscourse');
    Route::get('/cancelingcourse/{id}', [CourseController::class, 'leave'])->name('course.cancelingcourse');
    Route::get('/home/course/{course_id}/lesson/{id}', [LessonController::class, 'index'])->name('course.lesson');

    Route::post('/storeDocument', [UserController::class, 'storeDocument'])->name('user.store.document');
    Route::get('/statusDocument', [UserController::class, 'statusDocument'])->name('user.status.document');
});
Auth::routes();
