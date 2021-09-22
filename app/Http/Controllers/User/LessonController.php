<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Document;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Response;

class LessonController extends Controller
{
    const PUBLIC_PATH = "public/document/";
    const LOCAL_PATH = 'storage/document/';
    
    public function index($courseId, $id)
    {
        $lesson = Lesson::with(['course' => function ($query) {
            $query->with('teachers', 'reviews')->getnumberreviews();
        }])->with(['documents' => function ($query) {
            $query->with('users');
        }])->find($id);
        $otherCourse = Course::inRandomOrder()->take(5)->get();
        $result = Course::isJoined($courseId);
        $progress = Lesson::status()->find($id);
        if ($progress->total_docs == 0) {
            $ratio = 0;
        }
        else {
            $ratio = ($progress->learned_docs/$progress->total_docs)*100;
        }
        if ($result == true) {
            return view('lesson.index', compact('lesson', 'otherCourse', 'result', 'ratio'));
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        if (isset($name)) {
            $course = course::filterlesson($name)->find($id);
        } else {
            $course = course::with('lessons')->find($id);
        }

        return response()->json($course);
    }

    public function uploadfile(Request $request)
    {
        if ($request->has('document')) {
            $file = $request->file('document');
            $type = $file->getClientOriginalExtension();
            $name = time() . '.' .$type;
            Storage::putFileAs(self::PUBLIC_PATH . $request->id . "/", $file, $name);

            $lesson = Lesson::find($request->id);
            $lesson->documents()->create(['name' => $name, 'type' => $type]);
        }
        return redirect()->back();
    }

    public function download($id, $name)
    {
        return response()->download(public_path(self::LOCAL_PATH . $id . '/' . $name));
    }

    public function preview($id, $name)
    {
        $path = public_path(self::LOCAL_PATH . $id . '/' . $name);
        return response()->file($path);
    }
}
