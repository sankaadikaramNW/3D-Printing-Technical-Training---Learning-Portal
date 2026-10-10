<?php
use App\Core\Helper;
use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'SLAF Additive Manufacturing & 3D Printing Platform') ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription ?? 'Sri Lanka Air Force (SLAF) official Additive Manufacturing and FDM 3D printing educational platform and technical training portal.') ?>">
    <link rel="canonical" href="<?= Helper::url($currentUri ?? '') ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS with Coursera Blue & SLAF Navy Tokens -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-navy': '#0A2540',
                        'coursera-blue': '#0056D2',
                        navy: {
                            800: '#0F172A',
                            900: '#0A2540',
                            950: '#051329'
                        },
                        blue: {
                            50: '#EFF6FF',
                            100: '#DBEAFE',
                            200: '#BFDBFE',
                            500: '#3B82F6',
                            600: '#0056D2',
                            700: '#00419E',
                            800: '#1E40AF',
                            900: '#1E3A8A'
                        },
                        slate: {
                            50: '#F8FAFC',
                            100: '#F1F5F9',
                            200: '#E2E8F0',
                            300: '#CBD5E1',
                            400: '#94A3B8',
                            500: '#64748B',
                            600: '#475569',
                            700: '#334155',
                            800: '#1E293B',
                            900: '#0F172A',
                            950: '#020617'
                        }
                    },
                    fontFamily: {
                        heading: ['Outfit', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace']
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= Helper::asset('assets/css/style.css') ?>">

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen flex flex-col antialiased bg-slate-50 text-slate-900">

    <!-- Header & Navigation -->
    <?php View::partial('partials.header'); ?>

    <!-- Flash Alerts Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 w-full">
        <?php View::partial('partials.alerts'); ?>
    </div>

    <!-- Main Content Yield -->
    <main class="flex-grow">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <?php View::partial('partials.footer'); ?>

    <!-- Custom JS -->
    <script src="<?= Helper::asset('assets/js/main.js') ?>"></script>
</body>
</html>
