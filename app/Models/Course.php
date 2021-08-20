<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'intro',
        'desc',
        'time',
        'image',
        'price',
        'learner'
    ];

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses', 'id_course', 'id_user');
    }

    public function students()
    {
        return $this->users()->where('users.role', User::ROLE['student']);
    }

    public function teachers()
    {
        return $this->users()->where('users.role', User::ROLE['teacher']);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'courses_tags', 'id_course', 'id_tag');
    }

    public function lessons()
    {
        return $this->hasMany(lesson::class, 'id_course');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'location_id')->where('location_type', Review::LOCATION_TYPE['course']);
    }

    // Create attribute

    public function getLessonNumberAttribute()
    {
        return $this->lessons()->count();
    }

    public function getLearnerNumberAttribute()
    {
        return $this->students()->count();
    }
    
    // Create scope
    public function scopeTimeLearning($query)
    {
        return $query->withCount([
            'lessons AS time_learning' => function($query) {
                $query->select(DB::raw("SUM(lessons.id)"));
            }
        ]);
    }

    public function scopeOrderByStatusCourse($query, $request)
    {
        if (isset($request)) {
            if ($request == 0) {
                return $query->orderBy('courses.id', 'DESC');
            }
            return $query->orderBy('courses.id', 'ASC');
        }

        return $query;
    }

    public function scopeOrderByNumberLessons($query, $request)
    {
        if (isset($request)) {
            $query->with('lessons')->withCount('lessons');
            if ($request == 0) {
                return $query->orderBy('lessons_count', 'desc');
            } else {
                return $query->orderBy('lessons_count', 'asc');
            }
        }

        return $query;
    }

    public function scopeKeysearch($query,  Request $request) {
        if (isset($request['key'])) {
            return  $query->where('courses.name', 'like', '%'.$request['key'].'%')
            ->orWhere('courses.intro', 'like', '%'.$request['key'].'%');
        }

        return $query;
    }

    public function scopeSearchByTeacher($query, $request) {
        if (isset($request)) {
            return $query->whereHas('teachers', function ($query) use ($request) {
                $query->where('id_user', $request);
            });
        }

        return $query;
    }

    public function scopeOrderByNumberLearner($query, $request)
    {
        if (isset($request)) {
            $query->with('students')->withCount('students');

            if ($request == 0) {
                return $query->orderBy('students_count', 'desc');
            } else {
                return $query->orderBy('students_count', 'asc');
            }
        }

        return $query;
    }

    public function scopeSearchByTags($query, $request)
    {
        if (isset($request)) {
            return $query->whereHas('tags', function ($subquery) use ($request) {
                $subquery->where('id_tag', $request);
            });
        }

        return $query;
    }

    public function scopeOrderByTimeLearning($query, $request)
    {
        if (isset($request)) {
            $query->withCount([
                'lessons AS time_learning' => function($query) {
                    $query->select(DB::raw("SUM(lessons.id)"));
                }
            ]);

            if ($request == 0) {
                return $query->orderBy('time_learning', 'desc');
            } else {
                return $query->orderBy('time_learning', 'asc');
            }
        }

        return $query;
    }

    public function scopeFilter($query, $request) {
        if ($request['key'] != null) {
            $query->where('courses.name', 'like', '%'.$request['key'].'%')
            ->orWhere('courses.intro', 'like', '%'.$request['key'].'%');
        }

        if (($request['number_lesson']) != null) {
            if ($request['number_lesson'] == 0) {
                $query->withCount('lessons')->orderBy('lessons_count', 'desc');
            } else {
                $query->withCount('lessons')->orderBy('lessons_count', 'asc');
            }
        }

        if (($request['number_learner']) != null) {
            if ($request['number_learner'] == 0) {
                $query->withCount('students')->orderBy('students_count', 'desc');
            } else {
                $query->withCount('students')->orderBy('students_count', 'asc');
            }
        }

        if (($request['teacher']) != null) {
            $query->whereHas('teachers', function ($query) use ($request) {
                $query->where('users_courses.id_user', $request['teacher']);
            });
        }

        if (($request['choice']) != null) {
            if ($request['choice'] == 0) {
                $query->orderBy('courses.id', 'DESC');
            }
            $query->orderBy('courses.id', 'ASC');
        }

        if (($request['tags']) != null) {
                $query->whereHas('tags', function ($subquery) use ($request) {
                    $subquery->where('id_tag', $request['tags']);
            });
        }

        if (($request['time_learning']) != null) {
            $query->withCount([
                'lessons AS time_learning' => function($query) {
                    $query->select(DB::raw("SUM(lessons.id)"));
                }
            ]);
            if ($request['time_learning'] == 0) {
                $query->orderBy('time_learning', 'desc');
            } else {
                $query->orderBy('time_learning', 'asc');
            }
        }

        return $query;
    }
}
