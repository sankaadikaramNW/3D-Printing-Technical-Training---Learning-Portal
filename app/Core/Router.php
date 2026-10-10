<?php
namespace App\Core;

/**
 * Clean & Dynamic HTTP Router Supporting Parametric Routes
 */
class Router
{
    private array $routes = [];

    public function get(string $path, $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function addRoute(string $method, string $path, $handler): void
    {
        $normalizedPath = '/' . trim($path, '/');
        if ($normalizedPath === '//') $normalizedPath = '/';

        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $normalizedPath,
            'handler' => $handler
        ];
    }

    public function dispatch(Request $request): void
    {
        $method = $request->getMethod();
        $uri = $request->getUri();

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            // Convert route pattern {param} to regex named capture group
            $pattern = preg_replace('~\{([a-zA-Z0-9_]+)\}~', '(?P<$1>[^/]+)', $route['path']);
            $pattern = '~^' . $pattern . '$~';

            if (preg_match($pattern, $uri, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }

                $this->executeHandler($route['handler'], $params);
                return;
            }
        }

        // 404 Not Found Handler
        $this->handleNotFound();
    }

    private function executeHandler($handler, array $params = []): void
    {
        if (is_callable($handler)) {
            call_user_func_array($handler, array_values($params));
            return;
        }

        if (is_string($handler) && strpos($handler, '@') !== false) {
            list($controllerName, $action) = explode('@', $handler);
            $fullClass = "\\App\\Controllers\\" . $controllerName;

            if (!class_exists($fullClass)) {
                die("Controller class not found: " . htmlspecialchars($fullClass));
            }

            $controller = new $fullClass();
            if (!method_exists($controller, $action)) {
                die("Action method not found: " . htmlspecialchars($action) . " on " . htmlspecialchars($fullClass));
            }

            call_user_func_array([$controller, $action], array_values($params));
            return;
        }

        die("Invalid route handler defined.");
    }

    private function handleNotFound(): void
    {
        http_response_code(404);
        View::render('pages.404', [
            'pageTitle' => 'Page Not Found - 404',
            'metaDescription' => 'The requested educational page or technical resource could not be located.'
        ], 'main');
    }
}
