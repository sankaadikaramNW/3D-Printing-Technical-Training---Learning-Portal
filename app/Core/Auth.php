<?php
namespace App\Core;

use PDO;

/**
 * Authentication and Role Authorization Service
 */
class Auth
{
    private const SESSION_USER_KEY = '_admin_user';

    public static function check(): bool
    {
        Session::start();
        return Session::has(self::SESSION_USER_KEY);
    }

    public static function user(): ?array
    {
        Session::start();
        return Session::get(self::SESSION_USER_KEY);
    }

    public static function id(): ?int
    {
        $user = self::user();
        return $user ? (int)$user['id'] : null;
    }

    public static function role(): ?string
    {
        $user = self::user();
        return $user['role_slug'] ?? null;
    }

    public static function attempt(string $usernameOrEmail, string $password): bool
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            SELECT a.*, r.name as role_name, r.slug as role_slug 
            FROM admins a 
            JOIN roles r ON a.role_id = r.id 
            WHERE (a.username = :username OR a.email = :email) AND a.is_active = 1 
            LIMIT 1
        ");
        $stmt->execute([
            'username' => $usernameOrEmail,
            'email' => $usernameOrEmail
        ]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            // Update last login timestamp
            $upStmt = $db->prepare("UPDATE admins SET last_login_at = NOW() WHERE id = :id");
            $upStmt->execute(['id' => $admin['id']]);

            // Save user session
            unset($admin['password_hash']);
            Session::set(self::SESSION_USER_KEY, $admin);

            // Log successful login
            Logger::log('login', 'auth', $admin['id'], "Admin {$admin['username']} logged in successfully");

            return true;
        }

        return false;
    }

    public static function hasRole(string ...$roles): bool
    {
        $currentRole = self::role();
        if (!$currentRole) return false;
        if ($currentRole === 'super-admin') return true; // Super Admin has all access
        return in_array($currentRole, $roles);
    }

    public static function logout(): void
    {
        $user = self::user();
        if ($user) {
            Logger::log('logout', 'auth', $user['id'], "Admin {$user['username']} logged out");
        }
        Session::remove(self::SESSION_USER_KEY);
        Session::destroy();
    }
}
