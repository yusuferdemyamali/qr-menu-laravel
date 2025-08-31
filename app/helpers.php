<?php

use App\Models\SiteSetting;

if (! function_exists('siteSetting')) {
    /**
     * Site ayarlarını almak için helper fonksiyon
     *
     * @param  string|null  $key  Belirli bir ayar anahtarı (opsiyonel)
     * @param  mixed  $default  Varsayılan değer
     * @return mixed
     */
    function siteSetting($key = null, $default = null)
    {
        $settings = SiteSetting::getCached();

        if (is_null($key)) {
            return $settings;
        }

        return $settings ? $settings->{$key} ?? $default : $default;
    }
}

if (! function_exists('siteConfig')) {
    /**
     * Site ayarlarını array olarak almak için helper fonksiyon
     *
     * @return array
     */
    function siteConfig()
    {
        $settings = siteSetting();

        if (! $settings) {
            return [];
        }

        return $settings->toArray();
    }
}
