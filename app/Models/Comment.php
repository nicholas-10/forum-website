<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    //
    public function comment_likes(): HasMany
    {
        return $this->hasMany(CommentLike::class);
    }

}
