<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

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
}
