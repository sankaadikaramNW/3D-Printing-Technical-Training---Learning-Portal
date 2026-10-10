<?php
use App\Core\Helper;
use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'SLAF Administrator Authentication') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

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
                            600: '#0056D2',
                            700: '#00419E'
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
                            900: '#0F172A'
                        }
                    },
                    fontFamily: {
                        heading: ['Outfit', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= Helper::asset('assets/css/style.css') ?>">
</head>
<body class="min-h-screen bg-slate-900 text-slate-900 flex items-center justify-center p-4 relative overflow-hidden dark-tech-grid-pattern">
    <div class="absolute inset-0 bg-gradient-to-tr from-blue-950/60 via-slate-900 to-slate-900 pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-md">
        <?= $content ?>
    </div>
</body>
</html>
