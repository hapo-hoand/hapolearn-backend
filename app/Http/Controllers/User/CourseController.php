<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()->paginate(config('variable.pagination'));
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();

        return view('course.index', compact('courses', 'teachers', 'tags'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $courses = Course::query()->filter($data)->paginate(config('variable.pagination'));
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        return view('course.index', compact('courses', 'teachers', 'tags'));
    }

    public function show($id)
    {
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->status()->getnumberreviews()->find($id);
        $otherCourse = Course::inRandomOrder()->take(config('variable.random'))->get();
        $result = Course::isJoined($id);
        return view('course.detail', compact('course', 'otherCourse', 'result'));
    }

    public function join($id)
    {
        $course = Course::find($id);
        $userID = Auth()->user()->id;
        $course->students()->attach($userID);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $otherCourse = Course::inRandomOrder()->take(config('variable.random'))->get();
        $result = Course::isJoined($id);
        return redirect()->back()->with(compact('course', 'otherCourse', 'result'));
    }

    public function leave($id)
    {
        $course = Course::find($id);
        $userID = Auth()->user()->id;
        $course->students()->detach($userID);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $otherCourse = Course::inRandomOrder()->take(config('variable.random'))->get();
        $result = Course::isJoined($id);
        return redirect()->back()->with(compact('course', 'otherCourse', 'result'));
    }

    public function getreviews(Request $request)
    {
        $id = $request->id;
        $course = Course::with('reviews')->getnumberreviews()->find($id);
        return response()->json($course);
    }
}
