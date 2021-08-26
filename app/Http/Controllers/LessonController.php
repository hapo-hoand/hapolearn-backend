<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class LessonController extends Controller
{
    public function search(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        $course = Course::with('lessons')->find($id);
        if ($name) {
            $course = Course::with(['lessons' => function ($query) use ($name) {
                $query->where('title', 'like', '%' . $name . '%');
            }])->find($id);
        }

        return response()->json($course->lessons);
    }
}
