<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'courses_users', 'id_course', 'id_user');
    }

    public function students()
    {
        return $this->users()->where('role', User::ROLE['student']);
    }

    public function teachers()
    {
        return $this->users()->where('role', User::ROLE['teacher']);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'courses_tags', 'id_course', 'id_tag');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'location_id')->where('location_type', Review::LOCATION_TYPE['course']);
    }
}
