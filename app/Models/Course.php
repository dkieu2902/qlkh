<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
        protected $fillable = [
            'title',
            'content',
            'img_url',
            'price',
            'user_id'
        ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

        public function videos()
    {
        return $this->hasMany(Video::class);
    }
 public function courseUsers()
    {
        return $this->hasMany(CourseUser::class);
    }
}
