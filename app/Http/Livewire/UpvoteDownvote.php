<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\UpvoteDownvote as ModelsUpvoteDownvote;

class UpvoteDownvote extends Component
{

    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $upvotes = ModelsUpvoteDownvote::where('post_id', $this->post->id)->where('upvote', 1)->count();

        $downvotes = ModelsUpvoteDownvote::where('post_id', $this->post->id)->where('upvote', 0)->count();

        // change color of upvote button if user has upvoted
        $user = auth()->user();
        $hasUpvote = false;

        if ($user) {
            $upvoteDownvote = ModelsUpvoteDownvote::where('post_id', $this->post->id)->where('user_id', $user->id)->first();
            if ($upvoteDownvote) {
                $hasUpvote = $upvoteDownvote->upvote;
            }
        } else {
            $hasUpvote = false;
        }

        return view('livewire.upvote-downvote', compact('upvotes', 'downvotes', 'hasUpvote'));
    }


    public function UpvoteDownvote($upvote=true) {

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        $upvoteDownvote = ModelsUpvoteDownvote::where('post_id', $this->post->id)->where('user_id', $user->id)->first();

        if (!$upvoteDownvote) {
            $upvoteDownvote = ModelsUpvoteDownvote::create([
                'post_id' => $this->post->id,
                'user_id' => $user->id,
                'upvote' => $upvote
            ]);
            return;
        }

        if ($upvoteDownvote->upvote == $upvote) {
            $upvoteDownvote->delete();
            return;
        } else {
            $upvoteDownvote->upvote = $upvote;
            $upvoteDownvote->save();
            return;
        }

    }
}
