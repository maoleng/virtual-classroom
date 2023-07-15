<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Course extends Base
{

    protected $fillable = [
        'name', 'slug', 'thumbnail', 'title', 'description', 'preview_video', 'duration', 'price', 'user_id', 'is_verify',
        'rating', 'created_at',
    ];

    public function getLimitDescriptionAttribute(): string
    {
        return Str::limit($this->description, 40);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }

}
