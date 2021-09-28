<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home()
    {
        $courses = Course::inRandomOrder()->take(3)->get();
        foreach ($courses as $course) {
            $arr[] = $course->id; 
        }
        $otherCourse = Course::whereNotIn('id', $arr)->inRandomOrder()->take(3)->get();
        $allCourse = Course::all();
        $numberLesson = 0;
        $numberLearner = 0;
        foreach ($allCourse as $course) {
            $numberLesson += $course->lessons->count();
            $numberLearner += $course->learner_number; 
        }
        return view('home', compact('courses', 'otherCourse','allCourse', 'numberLesson', 'numberLearner'));
    }
}
