<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_course',
        'title',
        'desc'
    ];
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lessons_user', 'id_lesson', 'id_user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'location_id')->where('location_type', Review::LOCATION_TYPE['lesson']);
    }
}
