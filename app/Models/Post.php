<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Post extends Model
{
    //
    use Searchable;

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
