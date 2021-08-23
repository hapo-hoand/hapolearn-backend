<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::query()->paginate(config('variable.pagination'));
        $teachers = User::Where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        return view('user.allcourse', compact('courses', 'teachers', 'tags'));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $courses = Course::query()->filter($data)->paginate(config('variable.pagination'));
        $teachers = User::Where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        return view('user.allcourse', compact('courses', 'teachers', 'tags'));
    }

    public function getCourse($id)
    {
        $course = Course::query()
        ->with(['lessons' => function($query) {
            $query->selectRaw(DB::raw('title'));
        }])
        ->find($id);

        // dd($course);
        return view('user.course', ['course' => $course]);
    }
}
