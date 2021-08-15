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
        'rate'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function courses()
    {
        return $this->belongsTo(Course::class, 'location_id');
    }
}
