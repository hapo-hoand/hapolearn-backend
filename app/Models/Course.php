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

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses', 'course_id', 'user_id');
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
        return $this->belongsToMany(Tag::class, 'courses_tags', 'course_id', 'tag_id');
    }

    public function lessons()
    {
        return $this->hasMany(lesson::class, 'course_id');
    }

    public function reviews()
    {
        return $this->belongsToMany(User::class, 'reviews', 'course_id', 'user_id')->withPivot('content', 'time', 'rate');
    }

    public function getLessonNumberAttribute()
    {
        return $this->lessons()->count();
    }

    public function getLearnerNumberAttribute()
    {
        return $this->students()->count();
    }

    public function getTimeLearningAttribute()
    {
        return $this->lessons()->sum('time');
    }

    public function getRateAttribute()
    {
        return $this->reviews()->avg('rate');
    }

    public function scopeFilter($query, $data)
    {
        if (isset($data['key']) && $data['key'] != null) {
            $query->where('courses.name', 'like', '%' . $data['key'] . '%')
                ->orWhere('courses.intro', 'like', '%' . $data['key'] . '%');
        }

        if (isset($data['number_lesson']) && ($data['number_lesson']) != null) {
            if ($data['number_lesson'] == config('variable.orderBy.desc')) {
                $query->withCount('lessons')->orderBy('lessons_count', 'desc');
            } else {
                $query->withCount('lessons')->orderBy('lessons_count', 'asc');
            }
        }

        if (isset($data['number_learner']) && ($data['number_learner']) != null) {
            if ($data['number_learner'] == config('variable.orderBy.desc')) {
                $query->withCount('students')->orderBy('students_count', 'desc');
            } else {
                $query->withCount('students')->orderBy('students_count', 'asc');
            }
        }

        if (isset($data['teacher']) && ($data['teacher']) != null) {
                $query->whereIn('teacher_id', [$data['teacher']]);
        }

        if (isset($data['tags']) && ($data['tags']) != null) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        if (isset($data['time_learning']) && ($data['time_learning']) != null) {
            $query->withCount([
                'lessons AS time_learning' => function ($query) {
                    $query->select(DB::raw("SUM(lessons.time)"));
                }
            ]);

            if ($data['time_learning'] == config('variable.orderBy.desc')) {
                $query->orderBy('time_learning', 'desc');
            } else {
                $query->orderBy('time_learning', 'asc');
            }
        }

        if (isset($data['reviews']) && ($data['reviews']) != null) {
            $query->withCount([
                'reviews AS courese_rate' => function ($query) {
                    $query->select(DB::raw("AVG(reviews.rate)"))
                    ->groupBy('courses.id');
                }
            ]);

            if ($data['reviews'] == config('variable.orderBy.desc')) {
                $query->orderBy('courese_rate', 'desc');
            } else {
                $query->orderBy('courese_rate', 'asc');
            }
        }

        if (isset($data['status'])) {
            if ($data['status'] == config('variable.status.oldest')) {
                $query->orderBy('courses.id', 'DESC');
            }
            $query->orderBy('courses.id', 'ASC');
        }
        
        return null;
    }
}
