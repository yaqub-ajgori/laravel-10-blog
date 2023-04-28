<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function about()
    {
        if (!About::query()->where('key', 'about-page')->exists()) {
            About::create([
                'key' => 'about-page',
                'image' => 'https://via.placeholder.com/800x400',
                'title' => 'About Us',
                'description' => 'Lor'
            ]);
        }

        $widget = About::query()
            ->where('key', 'about-page')
            ->first();

        if (!$widget) {
            throw new NotFoundHttpException();
        }

        return view('about', compact('widget'));
    }
}
