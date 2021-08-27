<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Course;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
{
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
}
