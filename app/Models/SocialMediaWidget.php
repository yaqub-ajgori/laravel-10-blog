<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];

    public static function getFacebook( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->facebook : '';
    }

    public static function getTwitter( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->twitter : '';
    }

    public static function getInstagram( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->instagram : '';
    }

    public static function getLinkedin( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->linkedin : '';
    }


}
