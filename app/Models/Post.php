<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }




}
