<?php

namespace App\Models;

class Course extends Base
{

    protected $fillable = [
        'name', 'slug', 'thumbnail', 'description', 'preview_video', 'duration', 'price', 'user_id', 'created_at',
    ];

}
