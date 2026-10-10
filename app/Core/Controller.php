<?php
namespace App\Core;

/**
 * Base Abstract Controller
 */
abstract class Controller
{
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    protected function render(string $view, array $data = [], ?string $layout = 'main'): void
    {
        View::render($view, $data, $layout);
    }

    protected function json(array $data, int $statusCode = 200): void
    {
        Response::json($data, $statusCode);
    }

    protected function redirect(string $path): void
    {
        Helper::redirect($path);
    }

    protected function setFlash(string $type, string $message): void
    {
        Session::flash($type, $message);
    }

    protected function validateCsrf(): bool
    {
        $token = $this->request->input('_csrf_token');
        if (!Csrf::validate($token)) {
            $this->setFlash('error', 'Security verification failed (Invalid CSRF token). Please try again.');
            return false;
        }
        return true;
    }

    protected function requireAuth(): void
    {
        if (!Auth::check()) {
            Session::flash('error', 'Authentication required to access the admin portal.');
            Helper::redirect('admin/login');
        }
    }

    protected function requireRole(string ...$roles): void
    {
        $this->requireAuth();
        if (!Auth::hasRole(...$roles)) {
            Session::flash('error', 'Access denied. You do not possess the required administrative permissions.');
            Helper::redirect('admin');
        }
    }
}
