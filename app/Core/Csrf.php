<?php
namespace App\Core;

/**
 * CSRF Protection Token Manager
 */
class Csrf
{
    public static function generateToken(): string
    {
        Session::start();
        $token = bin2hex(random_bytes(32));
        Session::set('_csrf_token', $token);
        return $token;
    }

    public static function getToken(): string
    {
        Session::start();
        $token = Session::get('_csrf_token');
        if (!$token) {
            $token = self::generateToken();
        }
        return $token;
    }

    public static function field(): string
    {
        $token = self::getToken();
        return '<input type="hidden" name="_csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }

    public static function validate(?string $submittedToken): bool
    {
        Session::start();
        $storedToken = Session::get('_csrf_token');
        if (empty($storedToken) || empty($submittedToken)) {
            return false;
        }
        return hash_equals($storedToken, $submittedToken);
    }
}
