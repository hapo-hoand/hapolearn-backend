<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Document;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class LessonController extends Controller
{
    public function index($course_id, $id)
    {
        $lesson = Lesson::with(['course' => function($query) {
            $query->with('teachers', 'reviews')->getnumberreviews();
        }])->with('documents')->find($id);
        $otherCourse = Course::inRandomOrder()->take(5)->get();
        $result = Course::CheckJoined($course_id);
        if ($result == 1) {
            return view('lesson.index', compact('lesson', 'otherCourse', 'result'));
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
        if($request->has('document')) {
            $file = $request->file('document');
            $type = $file->getClientOriginalExtension();
            $name = time() . '.' .$type;
            Storage::putFileAs("public/document/".$request->id."/", $file, $name);

            $lesson = Lesson::find($request->id);
            $lesson->documents()->create(['name' => $name, 'type' => $type]);
        }
        return redirect()->back();
    }

    public function download($id, $name)
    {
        return response()->download(public_path('storage/document/' . $id . '/' . $name));
    }

    public function preview($id, $name)
    {
        $path = public_path('storage/document/' . $id . '/' . $name);
        return response()->file($path);
    }
}
