<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()->paginate(config('variable.pagination'));
        $teachers = User::where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        Alert::success('Success', 'Sign Up Success');
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

    public function getCourse($id)
    {
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $course->setRelation('lessons', $course->lessons()->paginate(config('variable.pagination')));
        $other_course = Course::inRandomOrder()->take(5)->get();
        $result = $this->checktakeincourse($id);

        return view('course.detail', compact('course', 'other_course', 'result'));
    }

    public function following($id)
    {
        $course_id = Course::find($id);
        $user_id = Auth()->user()->id;
        $course_id->students()->attach($user_id);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $course->setRelation('lessons', $course->lessons()->paginate(config('variable.pagination')));
        $other_course = Course::inRandomOrder()->take(5)->get();
        $result = $this->checktakeincourse($id);
        return redirect()->back()->with(compact('course', 'other_course', 'result'));
    }

    public function unfollow($id)
    {
        $course_id = Course::find($id);
        $user_id = Auth()->user()->id;
        $course_id->students()->detach($user_id);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $course->setRelation('lessons', $course->lessons()->paginate(config('variable.pagination')));
        $other_course = Course::inRandomOrder()->take(5)->get();
        $result = $this->checktakeincourse($id);
        return redirect()->back()->with(compact('course', 'other_course', 'result'));
    }

    public function checktakeincourse($id)
    {
        $result = 0;

        if (Auth()->check()) {
            $user = Auth()->user()->id;
            $checkused = Course::checkusedcourse($user)->find($id);
            if ($checkused->used > 0) {
                $result = 1;
            }
        }
        return $result;
    }

    public function getreviews(Request $request)
    {
        $id = $request->id;
        $course = Course::with('reviews')->getnumberreviews()->getnumberrate()->find($id);
        return response()->json($course);
    }
}
