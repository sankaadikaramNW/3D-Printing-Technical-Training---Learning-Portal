<?php
namespace App\Core;

/**
 * Application Core Bootstrapper & Lifecycle Controller
 */
class App
{
    private Router $router;
    private Request $request;

    public function __construct()
    {
        $this->loadEnvironment();
        $this->initializeErrorHandling();
        Session::start();

        $this->router = new Router();
        $this->request = new Request();

        $this->bootstrapViewData();
    }

    private function loadEnvironment(): void
    {
        $envFile = __DIR__ . '/../../.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                if (strpos($line, '=') !== false) {
                    list($key, $val) = explode('=', $line, 2);
                    $key = trim($key);
                    $val = trim($val, " \t\n\r\0\x0B\"'");
                    $_ENV[$key] = $val;
                    putenv("$key=$val");
                }
            }
        }
    }

    private function initializeErrorHandling(): void
    {
        $debug = filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN);
        if ($debug) {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        } else {
            error_reporting(0);
            ini_set('display_errors', '0');
        }
    }

    private function bootstrapViewData(): void
    {
        // Load global site settings and share with all views
        try {
            $db = Database::getConnection();
            $stmt = $db->query("SELECT setting_key, setting_value FROM site_settings");
            $settingsList = $stmt->fetchAll();
            $settings = [];
            foreach ($settingsList as $s) {
                $settings[$s['setting_key']] = $s['setting_value'];
            }
            View::share('siteSettings', $settings);
        } catch (\Exception $e) {
            View::share('siteSettings', []);
        }

        View::share('currentUser', Auth::user());
        View::share('isLoggedIn', Auth::check());
        View::share('currentUri', $this->request->getUri());
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function run(): void
    {
        // Register all application routes
        $routeFile = __DIR__ . '/../../routes/web.php';
        if (file_exists($routeFile)) {
            $router = $this->router;
            require $routeFile;
        }

        // Dispatch current request
        $this->router->dispatch($this->request);
    }
}
