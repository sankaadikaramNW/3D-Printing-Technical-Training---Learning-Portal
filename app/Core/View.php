<?php
namespace App\Core;

/**
 * View Rendering Engine with Layout and Section Support
 */
class View
{
    private static array $sections = [];
    private static ?string $currentSection = null;
    private static ?string $layout = 'main';
    private static array $viewData = [];

    public static function setLayout(?string $layout): void
    {
        self::$layout = $layout;
    }

    public static function share(string $key, $value): void
    {
        self::$viewData[$key] = $value;
    }

    public static function render(string $viewPath, array $data = [], ?string $layout = null): void
    {
        $allData = array_merge(self::$viewData, $data);
        extract($allData);

        if ($layout !== null) {
            self::$layout = $layout;
        }

        // Start output buffering for the view file
        ob_start();
        $file = __DIR__ . '/../Views/' . str_replace('.', '/', $viewPath) . '.php';
        if (!file_exists($file)) {
            die("View file not found: " . htmlspecialchars($file));
        }
        include $file;
        $content = ob_get_clean();

        // If a layout is specified, render the layout with $content
        if (self::$layout) {
            $layoutFile = __DIR__ . '/../Views/layouts/' . self::$layout . '.php';
            if (file_exists($layoutFile)) {
                ob_start();
                include $layoutFile;
                $output = ob_get_clean();
                echo $output;
                return;
            }
        }

        echo $content;
    }

    public static function partial(string $partialPath, array $data = []): void
    {
        $allData = array_merge(self::$viewData, $data);
        extract($allData);
        $file = __DIR__ . '/../Views/' . str_replace('.', '/', $partialPath) . '.php';
        if (file_exists($file)) {
            include $file;
        }
    }

    public static function startSection(string $name): void
    {
        self::$currentSection = $name;
        ob_start();
    }

    public static function endSection(): void
    {
        if (self::$currentSection) {
            self::$sections[self::$currentSection] = ob_get_clean();
            self::$currentSection = null;
        }
    }

    public static function yieldSection(string $name, string $default = ''): void
    {
        echo self::$sections[$name] ?? $default;
    }
}
