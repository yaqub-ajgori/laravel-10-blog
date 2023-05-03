<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'user_agent',
        'post_id',
        'user_id',
    ];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
