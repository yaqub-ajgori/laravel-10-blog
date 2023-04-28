<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $categories = Category::query()
        ->LeftJoin('category_posts', 'categories.id', '=', 'category_posts.category_id')
        ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
        ->groupBy('categories.id', 'categories.title', 'categories.slug')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

        return view('layouts.app', compact('categories'));
    }
}
