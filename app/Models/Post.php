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
        'meta_title',
        'meta_description',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function getThumbnail(): string
    {
        if(str_starts_with($this->thumbnail, 'http')){
            return $this->thumbnail;
        }
        return asset('storage/'.$this->thumbnail);
    }

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getFormattedDate(): string
    {
        return $this->published_at->format('F jS Y');
    }

    public function shortBody(): string
    {
        return substr($this->content, 0, 200);
    }

    // public function viewedBy(User $user): bool
    // {
    //     return $this->views->contains($user);
    // }

    // public function view(User $user): void
    // {
    //     $this->views()->attach($user);
    // }

    public function views(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_views');
    }

    public function viewedByCount(): int
    {
        return $this->views->count();
    }

    public function viewedByCountFormatted(): string
    {
        $count = $this->viewedByCount();
        if($count > 1000){
            return round($count / 1000, 1).'k';
        }
        return $count;
    }


}
