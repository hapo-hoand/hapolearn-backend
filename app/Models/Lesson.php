<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
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
