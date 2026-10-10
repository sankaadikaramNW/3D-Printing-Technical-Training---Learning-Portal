<?php
namespace App\Core;

/**
 * Global Helper Functions
 */
class Helper
{
    /**
     * Escape HTML output to prevent XSS
     */
    public static function e(?string $string): string
    {
        return htmlspecialchars((string)$string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Get base application URL
     */
    public static function baseUrl(string $path = ''): string
    {
        $baseUrl = rtrim($_ENV['APP_URL'] ?? '', '/');
        if (empty($baseUrl)) {
            $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
            $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
            $dir = trim(str_replace('\\', '/', dirname($scriptName)), '/');
            if ($dir === '.' || $dir === '') {
                $dir = '';
            }
            $baseUrl = $scheme . '://' . $host . ($dir ? '/' . $dir : '');
        }
        
        $path = ltrim($path, '/');
        return $path ? $baseUrl . '/' . $path : $baseUrl;
    }

    /**
     * Generate URL for named routes or path
     */
    public static function url(string $path = ''): string
    {
        return self::baseUrl($path);
    }

    /**
     * Generate asset URL
     */
    public static function asset(?string $path = ''): string
    {
        if (empty($path)) {
            return self::baseUrl('assets/img/placeholder.svg');
        }
        return self::baseUrl($path);
    }

    /**
     * Redirect to path
     */
    public static function redirect(string $path): void
    {
        $url = (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) ? $path : self::baseUrl($path);
        header("Location: $url");
        exit;
    }

    /**
     * Generate URL slug from title
     */
    public static function slugify(string $text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        return empty($text) ? 'n-a' : $text;
    }

    /**
     * Truncate string nicely
     */
    public static function truncate(string $text, int $length = 150, string $append = '...'): string
    {
        $text = strip_tags($text);
        if (mb_strlen($text) <= $length) return $text;
        return rtrim(mb_substr($text, 0, $length)) . $append;
    }

    /**
     * Format bytes into human readable format
     */
    public static function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    /**
     * Human time difference (e.g. 2 hours ago)
     */
    public static function timeAgo($datetime): string
    {
        if (empty($datetime)) return 'Never';
        $timestamp = is_numeric($datetime) ? (int)$datetime : strtotime($datetime);
        $diff = time() - $timestamp;

        if ($diff < 60) return 'just now';
        if ($diff < 3600) return floor($diff / 60) . ' mins ago';
        if ($diff < 86400) return floor($diff / 3600) . ' hours ago';
        if ($diff < 2592000) return floor($diff / 86400) . ' days ago';
        return date('M j, Y', $timestamp);
    }
}
