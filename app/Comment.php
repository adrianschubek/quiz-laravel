<?php

namespace App;

use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes, Cachable;

    protected $guarded = [];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => "(Gelöscht)",
            'id' => -1
        ]);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, "likeable");
    }

    public function getRelativeCreatedAttribute()
    {
        return Carbon::parse($this->created_at)->fromNow();
    }
}
