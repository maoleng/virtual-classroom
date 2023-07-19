<?php

namespace App\Models;

use Carbon\Carbon;

class Question extends Base
{

    protected $fillable = [
        'content', 'lecture_id', 'user_id', 'created_at',
    ];

    public function getPrettyCreatedAtAttribute(): string
    {
        return Carbon::make($this->created_at)->format('d-m-Y H:i:s');
    }


}
