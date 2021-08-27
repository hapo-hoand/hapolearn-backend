<?php

use App\Models\Course;

function checktakeincourse($id)
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
