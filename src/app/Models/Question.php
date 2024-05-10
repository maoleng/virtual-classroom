<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Base
{

    protected $fillable = [
        'content', 'lecture_id', 'user_id', 'created_at',
    ];

    public function getPrettyCreatedAtAttribute(): string
    {
        return Carbon::make($this->created_at)->format('d-m-Y H:i:s');
    }

    public function getAuthorAvatarAttribute(): string
    {
        return $this->user->avatar ?? asset('assets/images/robot.png');
    }

    public function getAuthorNameAttribute(): string
    {
        return $this->user->name ?? $this->lecture->course->user->name;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }

}
