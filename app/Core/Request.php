<?php
namespace App\Core;

/**
 * HTTP Request Handler
 */
class Request
{
    private array $get;
    private array $post;
    private array $server;
    private array $files;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->files = $_FILES;
    }

    public function getMethod(): string
    {
        return strtoupper($this->server['REQUEST_METHOD'] ?? 'GET');
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'POST';
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'GET';
    }

    public function isAjax(): bool
    {
        return (!empty($this->server['HTTP_X_REQUESTED_WITH']) && 
                strtolower($this->server['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') ||
               (strpos($this->server['HTTP_ACCEPT'] ?? '', 'application/json') !== false);
    }

    public function input(string $key, $default = null)
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function all(): array
    {
        return array_merge($this->get, $this->post);
    }

    public function file(string $key)
    {
        return $this->files[$key] ?? null;
    }

    public function getUri(): string
    {
        $uri = $this->server['REQUEST_URI'] ?? '/';
        
        // Strip query string
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }

        $decodedUri = rawurldecode($uri);

        // 1. Try stripping based on SCRIPT_NAME / PHP_SELF
        $scriptName = $this->server['SCRIPT_NAME'] ?? $this->server['PHP_SELF'] ?? '';
        if (!empty($scriptName)) {
            $baseDir = dirname($scriptName);
            if ($baseDir !== '/' && $baseDir !== '\\' && $baseDir !== '.') {
                $baseDir = str_replace('\\', '/', $baseDir);
                $decodedBase = rawurldecode($baseDir);

                if (strpos($decodedUri, $decodedBase) === 0) {
                    $decodedUri = substr($decodedUri, strlen($decodedBase));
                } elseif (strpos($uri, $baseDir) === 0) {
                    $decodedUri = rawurldecode(substr($uri, strlen($baseDir)));
                }
            }
        }

        // 2. Fallback check against APP_URL path if configured
        if (!empty($_ENV['APP_URL'])) {
            $appPath = parse_url($_ENV['APP_URL'], PHP_URL_PATH);
            if (!empty($appPath) && $appPath !== '/') {
                $appPath = str_replace('\\', '/', $appPath);
                $decodedAppPath = rawurldecode($appPath);
                if (strpos($decodedUri, $decodedAppPath) === 0) {
                    $decodedUri = substr($decodedUri, strlen($decodedAppPath));
                }
            }
        }

        $cleanUri = '/' . trim($decodedUri, '/');
        return $cleanUri;
    }

    public function ip(): string
    {
        return $this->server['HTTP_X_FORWARDED_FOR'] ?? $this->server['REMOTE_ADDR'] ?? '127.0.0.1';
    }
}
