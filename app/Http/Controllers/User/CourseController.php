<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $result = 0;

        if (Auth()->check()) {
            $user = Auth()->user()->id;
            $checkused = Course::checkusedcourse($user)->find($id);
            if ($checkused->used > 0) {
                $result = 1;
            }
        }
        return view('course.detail', compact('course', 'other_course', 'result'));
    }

    public function filterLesson(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if ($name == '') {
            $course = course::with('lessons')->find($id);
        } else {
            $course = course::filterlesson($name)->find($id);
        }

        return response()->json($course->lessons);
    }

    public function following($id)
    {
        $course_id = Course::find($id);
        $student = Auth()->user()->id;
        $course_id->students()->attach($student);
        $course = Course::with('lessons', 'tags', 'teachers', 'reviews')->find($id);
        $course->setRelation('lessons', $course->lessons()->paginate(config('variable.pagination')));
        $other_course = Course::inRandomOrder()->take(5)->get();
        $result = $this->checktakeincourse($id);
        return redirect()->back()->with(compact('course', 'other_course', 'result'));
    }

    public function unfollow($id)
    {
        $course_id = Course::find($id);
        $student = Auth()->user()->id;
        $course_id->students()->detach($student);
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

    public function getLesson($course_id, $id)
    {   
        $result = $this->checktakeincourse($course_id);
        if ($result == 0) {
            Alert::warning('warning', 'You have not taken this course yet');
            return back();
        }
        else {
            return $this->getCourse($course_id);;
        }
    }
}
