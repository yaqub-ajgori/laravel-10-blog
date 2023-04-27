<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidebarWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'content',
        'image',
        'btn_text',
        'btn_link',
        'is_active',
    ];

    public static function getTitle( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->title : '';
    }

    public static function getContent( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->content : '';
    }

    public static function getImage( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->image : '';
    }


    public static function getBtnText( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->btn_text : '';
    }

    public static function getBtnLink( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->btn_link : '';
    }
}
