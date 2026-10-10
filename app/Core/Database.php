<?php
namespace App\Core;

use PDO;
use PDOException;

/**
 * Singleton PDO Database Connection Manager
 */
class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $host = $_ENV['DB_HOST'] ?? '127.0.0.1';
            $port = $_ENV['DB_PORT'] ?? 3306;
            $dbName = $_ENV['DB_DATABASE'] ?? '3d_printer_portal';
            $user = $_ENV['DB_USERNAME'] ?? 'root';
            $pass = $_ENV['DB_PASSWORD'] ?? '';
            $charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';

            $dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=$charset";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                // If database doesn't exist yet, attempt automatic creation/installation
                if ($e->getCode() == 1049) {
                    self::attemptAutoInstall($host, $port, $dbName, $user, $pass, $options);
                } else {
                    die("<div style='font-family:sans-serif;padding:30px;background:#fee2e2;color:#991b1b;border:1px solid #f87171;border-radius:8px;max-width:700px;margin:50px auto;'>
                        <h2 style='margin-top:0;'>Database Connection Error</h2>
                        <p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>
                        <p>Please check your <code>.env</code> database credentials and ensure your MySQL / MariaDB server is active.</p>
                    </div>");
                }
            }
        }

        return self::$instance;
    }

    private static function attemptAutoInstall($host, $port, $dbName, $user, $pass, $options): void
    {
        try {
            $tempPdo = new PDO("mysql:host=$host;port=$port;charset=utf8mb4", $user, $pass, $options);
            $tempPdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $tempPdo = null;

            self::$instance = new PDO("mysql:host=$host;port=$port;dbname=$dbName;charset=utf8mb4", $user, $pass, $options);
            
            $schemaFile = __DIR__ . '/../../database/schema.sql';
            $seedFile = __DIR__ . '/../../database/seed.sql';
            
            if (file_exists($schemaFile)) {
                self::$instance->exec(file_get_contents($schemaFile));
            }
            if (file_exists($seedFile)) {
                self::$instance->exec(file_get_contents($seedFile));
            }
        } catch (PDOException $ex) {
            die("Auto installation failed: " . htmlspecialchars($ex->getMessage()));
        }
    }
}
