<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
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
        'learner',
        'teacher_id'
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
        return $this->belongsToMany(User::class, 'reviews', 'course_id', 'user_id')->withPivot('content', 'time', 'rate', 'parent_id', 'id')->wherePivotNull('deleted_at');
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
        return $this->reviews()->wherePivot('rate', '<>', 0)->avg('rate');
    }

    public function getNumberReviewAttribute()
    {
        return $this->reviews()->count();
    }

    public function getRateNumberAttribute()
    {
        return $this->reviews()->wherePivot('rate', '<>', 0)->count();
    }

    public function scopeFilter($query, $data)
    {
        if (isset($data['key'])) {
            $query->where('courses.name', 'like', '%' . $data['key'] . '%')
                ->orWhere('courses.intro', 'like', '%' . $data['key'] . '%');
        }

        if (isset($data['number_lesson'])) {
            if ($data['number_lesson'] == config('variable.orderBy.desc')) {
                $query->withCount('lessons')->orderByDesc('lessons_count');
            } else {
                $query->withCount('lessons')->orderBy('lessons_count');
            }
        }

        if (isset($data['number_learner'])) {
            if ($data['number_learner'] == config('variable.orderBy.desc')) {
                $query->withCount('students')->orderByDesc('students_count');
            } else {
                $query->withCount('students')->orderBy('students_count');
            }
        }

        if (isset($data['teacher'])) {
                $query->whereIn('teacher_id', [$data['teacher']]);
        }

        if (isset($data['tags'])) {
            $query->whereHas('tags', function ($subquery) use ($data) {
                $subquery->where('tag_id', $data['tags']);
            });
        }

        if (isset($data['time_learning'])) {
            $query->withCount([
                'lessons AS time_learning' => function ($query) {
                    $query->select(DB::raw("SUM(lessons.time)"));
                }
            ]);

            if ($data['time_learning'] == config('variable.orderBy.desc')) {
                $query->orderByDesc('time_learning');
            } else {
                $query->orderBy('time_learning');
            }
        }

        if (isset($data['reviews'])) {
            $query->withCount([
                'reviews AS courese_rate' => function ($query) {
                    $query->select(DB::raw("AVG(reviews.rate)"))
                    ->where('rate', '<>', 0)
                    ->groupBy('courses.id');
                }
            ]);

            if ($data['reviews'] == config('variable.orderBy.desc')) {
                $query->orderByDesc('courese_rate');
            } else {
                $query->orderBy('courese_rate');
            }
        }

        if (isset($data['status'])) {
            if ($data['status'] == config('variable.status.oldest')) {
                $query->orderByDesc('courses.id');
            }
            $query->orderBy('courses.id');
        }
        
        return null;
    }
    
    public function scopeJoined($query, $user)
    {
        return $query->withCount(['users as used' => function ($query) use ($user) {
            $query->where('user_id', $user);
        }]);
    }

    public function scopeFilterLesson($query, $data)
    {
        return $query->with(['lessons' => function ($query) use ($data) {
            $query->where('title', 'like', '%' . $data . '%');
        }]);
    }

    public function scopeGetNumberReviews($query)
    {
        return $query->withCount([
            'reviews as avg_rate' => function ($query) {
                $query->select(DB::raw('AVG(reviews.rate)'))
                ->where('rate', '<>', 0)
                ->groupBy('courses.id');
            },
            'reviews as totalrating' => function ($query) {
                $query->where('rate', '<>', 0)
                ->groupBy('courses.id');
            },
            'reviews AS number_review' => function ($query) {
                $query->select(DB::raw("COUNT('course_id')"))
                ->groupBy('courses.id');
            },
            'reviews AS five_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))
                ->where('rate', 5)
                ->groupBy('courses.id');
            },
            'reviews AS four_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))
                ->where('rate', 4)
                ->groupBy('courses.id');
            },
            'reviews AS three_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))
                ->where('rate', 3)
                ->groupBy('courses.id');
            },
            'reviews AS two_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))
                ->where('rate', 2)
                ->groupBy('courses.id');
            },
            'reviews AS one_star' => function ($query) {
                $query->select(DB::raw("COUNT('rate')"))
                ->where('rate', 1)
                ->groupBy('courses.id');
            }

        ]);
    }

    public static function isJoined($id)
    {
        if (Auth()->check()) {
            $user = Auth()->user()->id;
            $checkused = Course::Joined($user)->find($id);
            if ($checkused->used > 0) {
                return true;
            }
        }
        return false;
    }
}
