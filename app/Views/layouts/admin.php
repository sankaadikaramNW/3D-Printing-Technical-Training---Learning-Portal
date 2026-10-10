<?php
use App\Core\Helper;
use App\Core\View;
use App\Core\Auth;

$currentUser = Auth::user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'SLAF Instructor & Admin CMS') ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS with Coursera Blue & SLAF Navy -->
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

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= Helper::asset('assets/css/style.css') ?>">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-900 antialiased flex min-h-screen">

    <!-- Admin Sidebar -->
    <?php View::partial('partials.admin_sidebar'); ?>

    <!-- Main Admin Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Header -->
        <?php View::partial('partials.admin_header'); ?>

        <!-- Content Body -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-slate-50">
            <!-- Flash Alerts -->
            <?php View::partial('partials.alerts'); ?>

            <!-- View Content -->
            <?= $content ?>
        </main>
    </div>

</body>
</html>
