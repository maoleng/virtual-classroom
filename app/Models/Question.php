<?php

namespace App\Models;

class Question extends Base
{

    protected $fillable = [
        'content', 'answer', 'lecture_id', 'user_id', 'created_at',
    ];


}
