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

    public function detail($id)
    {
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->status()->getnumberreviews()->find($id);
        $otherCourse = Course::inRandomOrder()->take(5)->get();
        $result = Course::checkjoined($id);
        return view('course.detail', compact('course', 'otherCourse', 'result'));
    }

    public function following($id)
    {
        $courseID = Course::find($id);
        $userID = Auth()->user()->id;
        $courseID->students()->attach($userID);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $otherCourse = Course::inRandomOrder()->take(5)->get();
        $result = Course::checkJoined($id);
        return redirect()->back()->with(compact('course', 'otherCourse', 'result'));
    }

    public function unfollow($id)
    {
        $courseID = Course::find($id);
        $userID = Auth()->user()->id;
        $courseID->students()->detach($userID);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $otherCourse = Course::inRandomOrder()->take(5)->get();
        $result = Course::checkJoined($id);
        return redirect()->back()->with(compact('course', 'otherCourse', 'result'));
    }

    public function getreviews(Request $request)
    {
        $id = $request->id;
        $course = Course::with('reviews')->getnumberreviews()->find($id);
        return response()->json($course);
    }
}
