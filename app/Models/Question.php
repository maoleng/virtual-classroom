<?php

namespace App\Models;

class Question extends Base
{

    protected $fillable = [
        'content', 'text_answer', 'audio_answer', 'video_answer', 'lecture_id', 'user_id', 'created_at',
    ];


}
