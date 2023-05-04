<?php

namespace App\Filament\Widgets;

use App\Models\PostView;
use Filament\Widgets\Widget;
use App\Models\UpvoteDownvote;
use Illuminate\Database\Eloquent\Model;

class BlogPostsOverview extends Widget
{
    protected static string $view = 'filament.widgets.blog-posts-overview';
    protected int | string | array $columnSpan = 3;

    public ?Model $record = null;


    protected function getViewData(): array
    {
        return [
            'postView' => PostView::where('post_id', $this->record?->id)
            ->where('user_id', auth()->user()->id)
            ->count(),

            'upvote'=> UpvoteDownvote::where('post_id', $this->record?->id)
            ->where('user_id', auth()->user()->id)
            ->where('upvote', 1)
            ->count(),

            'downvote'=> UpvoteDownvote::where('post_id', $this->record?->id)
            ->where('user_id', auth()->user()->id)
            ->where('upvote', 0)
            ->count(),

        ];
    }

}
