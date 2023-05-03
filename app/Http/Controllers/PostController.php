<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostView;
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

    public function show(Post $post, Request $request)
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

        // Post view
        $user = $request->user();
        PostView::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'post_id' => $post->id,
            'user_id' => $user ? $user->id : null,
        ]);


        return view('posts.show', compact('post', 'next', 'previous'));
    }

    public function byCategory(Category $category){
        $posts =Post::query()
        ->join('category_posts', 'posts.id', '=', 'category_posts.post_id')
        ->where('category_posts.category_id', $category->id)
        ->where('is_published', true)
        ->whereDate('published_at', '<=', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->paginate(10);

        return view('posts.index', compact('posts', 'category'));
    }
}
