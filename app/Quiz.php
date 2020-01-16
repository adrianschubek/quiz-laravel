<?php

namespace App;

use App\Support\Traits\FormatsNumbers;
use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use SoftDeletes, Cachable, FormatsNumbers;

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
        return $this->belongsTo(User::class)->withDefault([
            'name' => "(Gelöscht)",
            'id' => -1
        ]);
    }

    public function getPlayCount()
    {
        return $this->numformat($this->play_count);
    }

    public function getLikesCount()
    {
        return $this->numformat($this->likes_count);
    }

    public function isPrivate()
    {
        return $this->questions->isEmpty();
    }

    public function getShortDescription()
    {
        return Str::limit($this->description, 50);
    }

    public function scopePublic(Builder $query)
    {
        return $query->has('questions');
    }

    public function scopeMostPlayed(Builder $query)
    {
        return $query->orderBy('play_count', 'desc');
    }

    public function scopeMostLiked(Builder $query)
    {
        return $query->orderBy('likes_count', 'desc');
    }

    public function getCreatedAtDate()
    {
        return Carbon::parse($this->created_at)->format('d.m.Y \u\m H:i');
    }

    public function getUpdatedAtDate()
    {
        return Carbon::parse($this->updated_at)->format('d.m.Y \u\m H:i');
    }

    public function getSlug()
    {
        return Str::slug($this->title);
    }

    public function getRelativeCreatedAttribute()
    {
        return Carbon::parse($this->created_at)->fromNow();
    }
}
