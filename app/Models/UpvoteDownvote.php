<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpvoteDownvote extends Model
{
    use HasFactory;

    protected $fillable = [
        'upvote',
        'user_id',
        'post_id',
    ];
}
