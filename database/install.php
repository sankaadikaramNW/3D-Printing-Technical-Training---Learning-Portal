<?php
/**
 * Database Auto-Installer & Seeder Script
 */

$envFile = __DIR__ . '/../.env';
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

$host = $_ENV['DB_HOST'] ?? '127.0.0.1';
$port = $_ENV['DB_PORT'] ?? 3306;
$dbName = $_ENV['DB_DATABASE'] ?? '3d_printer_portal';
$user = $_ENV['DB_USERNAME'] ?? 'root';
$pass = $_ENV['DB_PASSWORD'] ?? '';

echo "========================================================\n";
echo " FDM 3D PRINTER TECHNICAL PORTAL - DATABASE INSTALLER\n";
echo "========================================================\n";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS => true
    ]);
    
    echo "[1/3] Connected to MySQL server successfully.\n";

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$dbName`");
    echo "[2/3] Using database `$dbName`.\n";

    // Helper to execute SQL files safely
    function executeSqlFile(PDO $pdo, string $filePath, string $label) {
        if (!file_exists($filePath)) {
            echo "      [WARN] File not found: $filePath\n";
            return;
        }
        $sql = file_get_contents($filePath);
        // Remove comments
        $lines = explode("\n", $sql);
        $cleanSql = '';
        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (strpos($trimmed, '--') === 0 || strpos($trimmed, '/*') === 0) {
                continue;
            }
            $cleanSql .= $line . "\n";
        }
        
        $pdo->exec($cleanSql);
        echo "      [SUCCESS] $label executed successfully.\n";
    }

    echo "      - Importing schema.sql...\n";
    executeSqlFile($pdo, __DIR__ . '/schema.sql', 'Database Schema');

    echo "      - Importing seed.sql...\n";
    executeSqlFile($pdo, __DIR__ . '/seed.sql', 'Seed Dataset');

    echo "\n[3/3] Installation Complete! Portal is ready.\n";
    echo "Default Admin: admin / admin123\n";
    echo "========================================================\n";

} catch (PDOException $e) {
    echo "\n[ERROR] Setup failed: " . $e->getMessage() . "\n";
    exit(1);
}
