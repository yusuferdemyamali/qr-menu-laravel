<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_email',
        'site_phone',
        'site_address',
        'site_logo',
        'site_favicon',
        'site_facebook_url',
        'site_twitter_url',
        'site_linkedin_url',
        'site_instagram_url',
        'site_youtube_url',
        'site_working_hours',
        'site_maps_embed',
        'site_seo_title',
        'site_seo_description',
        'site_seo_keywords',
        'is_maintenance',
    ];

    /**
     * Model kaydedildiğinde cache'i temizle
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('site_settings');
        });

        static::deleted(function ($model) {
            Cache::forget('site_settings');
        });
    }

    /**
     * Cache'lenmiş site ayarlarını al
     *
     * @return SiteSetting|null
     */
    public static function getCached()
    {
        return Cache::remember('site_settings', 3600, function () {
            return static::first();
        });
    }

    /**
     * Site ayarları cache'ini temizle
     *
     * @return void
     */
    public static function clearCache()
    {
        Cache::forget('site_settings');
    }
}
