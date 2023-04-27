<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    public function index()
    {
        $posts =Post::query()
        ->where('is_published', true)
        ->whereDate('published_at', '<=', Carbon::now())
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('home', compact('posts'));
    }

    public function show(Post $post)
    {

        if (!$post->is_published && $post->published_at > Carbon::now()) {
            throw new NotFoundHttpException();
        }

        $next = Post::query()
        ->where('is_published', true)
        ->whereDate('published_at', '<=', Carbon::now())
        ->where('published_at', '<', $post->published_at)
        ->orderBy('published_at', 'desc')
        ->limit(1)
        ->first();

        $previous = Post::query()
        ->where('is_published', true)
        ->whereDate('published_at', '<=', Carbon::now())
        ->where('published_at', '>', $post->published_at)
        ->orderBy('published_at', 'asc')
        ->limit(1)
        ->first();

        return view('posts.show', compact('post', 'next', 'previous'));
    }
}
