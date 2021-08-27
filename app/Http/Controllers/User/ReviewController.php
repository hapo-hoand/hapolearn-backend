<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $time = Carbon::now();
        $course = Course::find($data['id']);
        $user = Auth()->user();
        $course->reviews()->attach($user, ['content' => $data['content'], 'time' => $time, 'rate' => $data['vote']]);
        return response()->json(1);
    }
}
