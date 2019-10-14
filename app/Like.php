<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use Cachable;

    protected $fillable = ["user_id"];

    public function likeable()
    {
        return $this->morphTo();
    }
}
