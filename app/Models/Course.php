<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function getPrettyCreatedAtAttribute(): string
    {
        return Carbon::make($this->created_at)->format('m/Y');
    }

    public function getEnrolledAmountAttribute(): int
    {
        return $this->users->count();
    }

    public function getLastPriceAttribute(): float
    {
        return $this->price * 1.1;
    }

    public function getVideoThumbnailAttribute(): string
    {
        return "https://img.youtube.com/vi/$this->preview_video/0.jpg";
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class)->orderBy('order');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'courses_users')->withPivot(['price']);
    }

}
