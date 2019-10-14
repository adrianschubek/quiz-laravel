<?php

namespace App;

use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use SoftDeletes, Cachable;

    protected $fillable = [
        "user_id", "title", "description"
    ];

    protected $touches = [
        "questions"
    ];

    protected $withCount = [
        "likes"
    ];

    public function likes()
    {
        return $this->morphMany(Like::class, "likeable");
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPlayCount()
    {
        return number_format($this->play_count, 0, ',', '.');
    }

    public function getLikesCount()
    {
        return number_format($this->likes_count, 0, ',', '.');
    }

    public function getShortDescription()
    {
        return Str::limit($this->description, 50);
    }

    public function getRelativeCreatedAttribute()
    {
        return Carbon::parse($this->created_at)->fromNow();
    }
}
