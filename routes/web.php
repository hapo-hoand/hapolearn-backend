<?php

use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\LessonController;
use App\Models\Lesson;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::get('/home/course/{id}', [CourseController::class, 'getCourse'])->name('course.detail');
Route::post('/searchlesson', [LessonController::class, 'search'])->name('course.filter.lesson');
Route::post('/getreviews', [CourseController::class, 'getreviews'])->name('course.get.reviews');
Route::post('/upfile', [LessonController::class, 'uploadfile'])->name('lesson.upfile');
Route::post('/storereview', [ReviewController::class, 'store']);
Route::group(['middleware' => 'checksigin'], function() {
    Route::get('/takethiscourse/{id}', [CourseController::class, 'following'])->name('course.takethiscourse');
    Route::get('/cancelingcourse/{id}', [CourseController::class, 'unfollow'])->name('course.cancelingcourse');
    Route::get('/home/course/{course_id}/lesson/{id}', [LessonController::class, 'index'])->name('course.lesson');
});
Auth::routes();
