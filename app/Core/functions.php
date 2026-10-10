<?php
/**
 * Global Application Helper Functions
 */

if (!function_exists('base_url')) {
    function base_url(string $path = ''): string
    {
        return \App\Core\Helper::baseUrl($path);
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        return \App\Core\Helper::url($path);
    }
}

if (!function_exists('asset')) {
    function asset(?string $path = null): string
    {
        return \App\Core\Helper::asset($path);
    }
}

if (!function_exists('images_asset')) {
    function images_asset(?string $path = null): string
    {
        return \App\Core\Helper::asset($path);
    }
}

if (!function_exists('e')) {
    function e(?string $string): string
    {
        return \App\Core\Helper::e($string);
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        return \App\Core\Csrf::getToken();
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return \App\Core\Csrf::field();
    }
}

if (!function_exists('setting')) {
    function setting(string $key, $default = ''): string
    {
        try {
            return \App\Models\SiteSetting::get($key, (string)$default);
        } catch (\Throwable $e) {
            return (string)$default;
        }
    }
}

if (!function_exists('time_ago')) {
    function time_ago($datetime): string
    {
        return \App\Core\Helper::timeAgo($datetime);
    }
}

if (!function_exists('truncate')) {
    function truncate(string $text, int $length = 150, string $append = '...'): string
    {
        return \App\Core\Helper::truncate($text, $length, $append);
    }
}

if (!function_exists('auth_user')) {
    function auth_user()
    {
        return \App\Core\Auth::user();
    }
}

if (!function_exists('is_logged_in')) {
    function is_logged_in(): bool
    {
        return \App\Core\Auth::check();
    }
}
