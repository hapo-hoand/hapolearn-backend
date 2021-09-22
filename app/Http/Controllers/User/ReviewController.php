<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
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
        if (!isset($data['vote'])) {
            $data['vote'] = 0;
        }

        $course->reviews()->attach($user, ['content' => $data['content'], 'time' => $time, 'rate' => $data['vote'], 'parent_id' => $data['parent_id']]);
        return response()->json(true);
    }

    public function update(Request $request)
    {
        $review = Review::find($request->id);
        $review->content = $request->content;
        $review->save();
        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $review = Review::find($id);
        foreach($review->replies as $reply) {
            $reply->delete();
        }
        $review->delete();
        return response()->json(true);
    }
}
