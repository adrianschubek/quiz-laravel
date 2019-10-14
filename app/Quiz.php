<?php

namespace App;

use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes, Cachable;

    protected $fillable = [
        "user_id", "title", "description"
    ];

    protected $touches = [
        "questions"
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

    public function getRelativeCreatedAttribute()
    {
        return Carbon::parse($this->created_at)->fromNow();
    }
}
