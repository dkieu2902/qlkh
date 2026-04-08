<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'video_url',
        'title',
        'content',
        'is_seen',
        'course_id',
    ];

    protected $casts = [
        'is_seen' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
