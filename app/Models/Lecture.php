<?php

namespace App\Models;

class Lecture extends Base
{

    protected $fillable = [
        'name', 'document', 'video', 'order', 'course_id', 'created_at',
    ];


}
