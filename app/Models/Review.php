<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_course',
        'id_user',
        'content',
        'time',
        'rate',
        'location_type',
        'location_id'
    ];
    
    const LOCATION_TYPE = ['course' => 0, 'lesson' => 1];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function location()
    {
        if ('location_type' == self::LOCATION_TYPE['course']) {
            return $this->belongsTo(Course::class, 'location_id');
        } elseif ('location_type' == self::LOCATION_TYPE['lesson']) {
            return $this->belongsTo(Lesson::class, 'location_id');
        }
    }
}
