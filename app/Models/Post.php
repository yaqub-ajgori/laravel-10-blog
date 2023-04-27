<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'thumbnail',
        'content',
        'is_published',
        'published_at',
        'user_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function getFormattedDate(): string
    {
        return $this->created_at->format('F jS Y');
    }

    public function shortBody(): string
    {
        return substr($this->content, 0, 200);
    }
}
