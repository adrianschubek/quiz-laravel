<?php

namespace App;

use Cviebrock\EloquentTaggable\Taggable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes, Taggable, Cachable;

    protected $fillable = [
        "user_id", "title", "description", "category_id"
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
