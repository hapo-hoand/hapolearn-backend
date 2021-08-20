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
    const PAGINATE_NUMBER = 10;
    public function index()
    {
        $courses = Course::select('courses.*')
        ->wherehas('lessons')
        ->TimeLearning()
        ->paginate(10);
        $teachers = User::Where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        return view('user.allcourse', compact('courses', 'teachers', 'tags'));
    }

    public function search(Request $request)
    {
    
    // if (isset($request['choice'])) {
    //     dd($request['choice']);
    // }
    // else
    // dd(3);
    // dd($request['choice']);
        $courses = Course::select('courses.*')
        ->Filter($request)
            // ->Keysearch($request)
            // ->OrderByNumberLessons($request['number_lesson'])
            // ->OrderByNumberLearner($request['number_learner'])
            // ->SearchByTeacher($request['teacher'])
            // ->OrderByStatusCourse($request['choice'])
            // ->SearchByTags($request['tags'])
            // ->OrderByTimeLearning($request['time_learning'])
            // ->whereHas('tags', function ($subquery) use ($request) {
            //     $subquery->where('id_tag', $request['tags']);
            // })
            // ->TimeLearning()
            // ->wherehas('lessons')
            ->paginate(10);
    //  dd($courses);
        $teachers = User::Where('role', User::ROLE['teacher'])->get();
        $tags = Tag::all();
        return view('user.allcourse', compact('courses', 'teachers', 'tags'));
    }

    public function findbyID() {
        return view('user.course');
    }
}
