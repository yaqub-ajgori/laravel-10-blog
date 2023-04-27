<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'site_title',
        'site_description',
    ];

    public static function getSiteTitle( string $key ): string
    {
        $widget = self::where('key', $key)->first();
        return $widget ? $widget->site_title : '';
    }

    public static function getSiteDescription( string $key ): string
    {
        $widget = HeaderWidget::query()
        ->where('key', $key)
        ->first();
        return $widget ? $widget->site_description : '';
    }
}
