<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{
    public function index($course_id, $id)
    {
        $lesson = Lesson::with(['course' => function($query) {
            $query->with('teachers', 'reviews');
        }])->find($id);
        $other_course = Course::inRandomOrder()->take(5)->get();
        $result = checktakeincourse($id);
        if ($result == 1) {
            return view('lesson.index', compact('lesson', 'other_course', 'result'));
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if ($name == '') {
            $course = course::with('lessons')->find($id);
        } else {
            $course = course::filterlesson($name)->find($id);
        }

        return response()->json($course);
    }

    public function uploadfile(Request $request)
    {
        // dd($request->document);
        if($request->has('document')) {
            $file = $request->file('document');
            $file_name = $file->getClientOriginalName();
            Storage::putFileAs("Document/".$request->id."/", $file,  time());
            
            return 1;
        }
    }
}
