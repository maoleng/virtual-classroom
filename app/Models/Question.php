<?php

namespace App\Models;

use Carbon\Carbon;

class Question extends Base
{

    protected $fillable = [
        'content', 'text_answer', 'audio_answer', 'video_answer', 'lecture_id', 'user_id', 'created_at',
    ];

    public function getPrettyCreatedAtAttribute(): string
    {
        return Carbon::make($this->created_at)->format('d-m-Y H:i:s');
    }


}
