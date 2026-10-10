<?php
/**
 * ==============================================================================
 * DESIGN AND FABRICATION OF A FUSED DEPOSITION MODELING (FDM) 3D PRINTER MODULE
 * FOR TECHNICAL TRAINING
 * Main Entry Point (Front Controller)
 * ==============================================================================
 */

declare(strict_types=1);

// Register PSR-4 Autoloader
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Load Global Helper Functions
require_once __DIR__ . '/app/Core/functions.php';

// Bootstrap Application Core
$app = new \App\Core\App();
$app->run();
