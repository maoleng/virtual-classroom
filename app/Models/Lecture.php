<?php

namespace App\Models;

class Lecture extends Base
{

    protected $fillable = [
        'name', 'slug', 'document', 'video', 'order', 'study_minutes', 'course_id', 'created_at',
    ];

    public function getVideoThumbnailAttribute(): string
    {
        return "https://img.youtube.com/vi/$this->video/0.jpg";
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
