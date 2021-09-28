<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'desc'
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lessons_user', 'lesson_id', 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function scopeStatus($query)
    {
        if (Auth::check()) {
            $query->withCount(['documents as learned_docs' => function ($query) {
                $query->whereHas('users', function ($query) {
                    $query->where('user_id', Auth()->user()->id);
                });
            },'documents as total_docs' => function ($query) {
                $query->groupBy('lessons.id');
            }]);
        }

        return null;
    }
}
