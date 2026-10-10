<?php
use App\Core\Helper;
use App\Core\Auth;

$uri = $currentUri ?? '/';
if (!function_exists('isActive')) {
    function isActive($path, $current) {
        if ($path === '/' && $current === '/') {
            return 'bg-blue-50 text-blue-700 font-bold';
        }
        if ($path !== '/' && strpos($current, $path) === 0) {
            return 'bg-blue-50 text-blue-700 font-bold';
        }
        return 'text-slate-700 hover:text-blue-700 hover:bg-slate-50 font-medium';
    }
}
?>

<!-- Top Historic Milestone Announcement Banner -->
<div class="bg-[#0A2540] text-slate-200 text-xs py-2.5 px-4 border-b border-slate-800">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-2">
        <div class="flex items-center space-x-2 text-center md:text-left">
            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-600 text-white uppercase tracking-wider shrink-0">
                SLAF Historic Milestone
            </span>
            <span class="font-medium text-slate-200 text-xs truncate max-w-2xl">
                Very First Official Additive Manufacturing & 3D Printing Concept in Sri Lanka Air Force History
            </span>
        </div>
        <div class="flex items-center space-x-4 text-slate-300 text-xs shrink-0">
            <span><i class="fas fa-shield-alt text-blue-400 mr-1"></i> 4 Directorates & Trades</span>
            <span class="hidden sm:inline text-slate-600">|</span>
            <a href="<?= Helper::url('preflight-checklist') ?>" class="hover:text-blue-400 transition-colors flex items-center">
                <i class="fas fa-list-check mr-1 text-emerald-400"></i> Pre-Flight Tool
            </a>
            <span class="hidden sm:inline text-slate-600">|</span>
            <a href="<?= Helper::url('admin/login') ?>" class="text-blue-400 hover:text-blue-300 font-bold transition flex items-center gap-1">
                <i class="fas fa-lock text-[10px]"></i> Admin Portal
            </a>
        </div>
    </div>
</div>

<!-- Main Sticky Header (Provider.lk-Style Unified Navigation) -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-xs transition-all" x-data="{ mobileMenu: false, searchOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 gap-4">
            
            <!-- Brand Logo & Identity -->
            <a href="<?= Helper::url() ?>" class="flex items-center space-x-3 group shrink-0">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-[#0A2540] to-blue-600 flex items-center justify-center text-white shadow-md shadow-blue-950/20 group-hover:scale-105 transition-transform shrink-0">
                    <i class="fas fa-cube text-xl text-blue-300"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-[10px] font-black uppercase tracking-wider text-blue-600 leading-tight">Sri Lanka Air Force</span>
                    <span class="text-base sm:text-lg font-black text-slate-900 font-heading tracking-tight group-hover:text-blue-600 transition-colors leading-tight">Additive Manufacturing Portal</span>
                </div>
            </a>

            <!-- Desktop Navigation Menu -->
            <nav class="hidden xl:flex items-center space-x-1 text-xs font-medium">
                <a href="<?= Helper::url() ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/', $uri) ?>">
                    Home
                </a>

                <!-- Directorates Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-xl text-slate-700 hover:text-blue-700 hover:bg-slate-50 transition-all whitespace-nowrap <?= (strpos($uri, '/directorate') === 0) ? 'bg-blue-50 text-blue-700 font-bold' : '' ?>">
                        <span>Directorates</span>
                        <i class="fas fa-chevron-down text-[10px] ml-1 transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute top-full left-0 w-72 bg-white rounded-2xl shadow-xl border border-slate-200 p-2 z-50 mt-1">
                        <a href="<?= Helper::url('directorates/dgce') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-building text-emerald-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">DGCE (Civil Engineering)</div>
                                <div class="text-[11px] text-slate-500">Airfield models & conduit jigs</div>
                            </div>
                        </a>
                        <a href="<?= Helper::url('directorates/dgge') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-plane text-blue-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">DGGE (General Engineering)</div>
                                <div class="text-[11px] text-slate-500">Aircraft fixtures & PA-CF parts</div>
                            </div>
                        </a>
                        <a href="<?= Helper::url('directorates/dgp') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-database text-indigo-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">DGP (Planning)</div>
                                <div class="text-[11px] text-slate-500">Digital CAD twin repositories</div>
                            </div>
                        </a>
                        <a href="<?= Helper::url('directorates/itav') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-microchip text-sky-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">IT & Avionics Trade</div>
                                <div class="text-[11px] text-slate-500">Radar pods & drone payloads</div>
                            </div>
                        </a>
                        <div class="border-t border-slate-100 mt-1 pt-1">
                            <a href="<?= Helper::url('directorates') ?>" class="block text-center py-1.5 text-xs font-bold text-blue-600 hover:underline">
                                View All 4 Defense Tracks &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Interactive App Tools Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center space-x-1 px-3 py-2 rounded-xl text-slate-700 hover:text-blue-700 hover:bg-slate-50 transition-all whitespace-nowrap <?= (strpos($uri, '/slicing-simulator') === 0 || strpos($uri, '/hardware-anatomy') === 0 || strpos($uri, '/preflight-checklist') === 0) ? 'bg-blue-50 text-blue-700 font-bold' : '' ?>">
                        <span class="font-bold text-blue-700">App Tools</span>
                        <i class="fas fa-chevron-down text-[10px] ml-1 transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute top-full left-0 w-72 bg-white rounded-2xl shadow-xl border border-slate-200 p-2 z-50 mt-1">
                        <a href="<?= Helper::url('slicing-simulator') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-calculator text-blue-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">Slicing Calculator & Simulator</div>
                                <div class="text-[11px] text-slate-500">Live mass, time & cost estimation</div>
                            </div>
                        </a>
                        <a href="<?= Helper::url('hardware-anatomy') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-cogs text-indigo-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">Hardware Subsystems Viewer</div>
                                <div class="text-[11px] text-slate-500">Component specs & airbase checklists</div>
                            </div>
                        </a>
                        <a href="<?= Helper::url('preflight-checklist') ?>" class="flex items-start space-x-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors">
                            <i class="fas fa-list-check text-emerald-600 mt-1"></i>
                            <div>
                                <div class="font-bold text-slate-900 text-xs">5-Phase Pre-Flight Checklist</div>
                                <div class="text-[11px] text-slate-500">15-point flight qualification tool</div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Learning & Curriculum -->
                <a href="<?= Helper::url('training') ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/training', $uri) ?>">Training</a>
                <a href="<?= Helper::url('materials') ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/materials', $uri) ?>">Materials</a>
                <a href="<?= Helper::url('videos') ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/videos', $uri) ?>">Video Hub</a>
                <a href="<?= Helper::url('troubleshooting') ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/troubleshooting', $uri) ?>">Troubleshooting</a>
                <a href="<?= Helper::url('projects') ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/projects', $uri) ?>">Projects</a>
                <a href="<?= Helper::url('quiz') ?>" class="px-3 py-2 rounded-xl transition-all whitespace-nowrap <?= isActive('/quiz', $uri) ?>">Quizzes</a>
            </nav>

            <!-- Actions & Instructor Admin Login Button -->
            <div class="hidden sm:flex items-center space-x-3 shrink-0">
                <button @click="searchOpen = true; $nextTick(() => document.getElementById('search-query-input')?.focus())" 
                        class="flex items-center space-x-2 px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200/80 text-slate-600 text-xs font-medium transition-all border border-slate-200/80 cursor-pointer">
                    <i class="fas fa-search text-slate-400"></i>
                    <span class="hidden md:inline">Search...</span>
                    <kbd class="px-1.5 py-0.5 bg-white rounded border border-slate-300 text-[10px] text-slate-500 font-mono">Ctrl K</kbd>
                </button>

                <!-- Prominent Instructor Admin Login Button -->
                <a href="<?= Helper::url('admin/login') ?>" 
                   class="px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold tracking-wide shadow-md shadow-blue-600/20 transition-all flex items-center space-x-1.5 cursor-pointer">
                    <i class="fas fa-user-shield text-xs"></i>
                    <span class="whitespace-nowrap">Instructor Admin Login</span>
                </a>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="xl:hidden flex items-center space-x-2">
                <button @click="searchOpen = true" class="p-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200">
                    <i class="fas fa-search"></i>
                </button>
                <button @click="mobileMenu = !mobileMenu" class="p-2.5 rounded-xl bg-slate-100 text-slate-800 hover:bg-slate-200">
                    <i class="fas" :class="mobileMenu ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileMenu" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="xl:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-2 max-h-[80vh] overflow-y-auto shadow-2xl">
        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider px-2 pt-2">SLAF Directorates</div>
        <a href="<?= Helper::url('directorates/dgce') ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-blue-50">DGCE - Civil Engineering</a>
        <a href="<?= Helper::url('directorates/dgge') ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-blue-50">DGGE - General Engineering</a>
        <a href="<?= Helper::url('directorates/dgp') ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-blue-50">DGP - Planning & CAD</a>
        <a href="<?= Helper::url('directorates/itav') ?>" class="block px-3 py-2 rounded-lg text-slate-800 font-medium hover:bg-blue-50">IT & Avionics Trade</a>

        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider px-2 pt-3 border-t border-slate-100">Interactive App Tools</div>
        <a href="<?= Helper::url('slicing-simulator') ?>" class="block px-3 py-2 rounded-lg text-blue-700 font-bold hover:bg-blue-50">Slicing Simulator & Cost App</a>
        <a href="<?= Helper::url('hardware-anatomy') ?>" class="block px-3 py-2 rounded-lg text-blue-700 font-bold hover:bg-blue-50">Hardware Anatomy Viewer</a>
        <a href="<?= Helper::url('preflight-checklist') ?>" class="block px-3 py-2 rounded-lg text-blue-700 font-bold hover:bg-blue-50">5-Phase Pre-Flight Checklist</a>

        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider px-2 pt-3 border-t border-slate-100">Curriculum & Media</div>
        <a href="<?= Helper::url('training') ?>" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">8-Module Training Syllabus</a>
        <a href="<?= Helper::url('videos') ?>" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">Video Demonstration Hub</a>
        <a href="<?= Helper::url('troubleshooting') ?>" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">Troubleshooting Matrix</a>
        <a href="<?= Helper::url('projects') ?>" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">Defense Projects Showcase</a>
        <a href="<?= Helper::url('quiz') ?>" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">Knowledge Quizzes</a>

        <div class="pt-3 border-t border-slate-100">
            <a href="<?= Helper::url('admin/login') ?>" class="block text-center py-3 bg-blue-600 text-white rounded-xl font-bold text-xs">
                <i class="fas fa-lock mr-1"></i> Instructor Admin Login
            </a>
        </div>
    </div>

    <!-- Live Global Search Modal -->
    <div x-show="searchOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="searchOpen = false"
         class="fixed inset-0 z-50 flex items-start justify-center pt-20 px-4 bg-slate-900/80 backdrop-blur-sm"
         style="display: none;">
        <div @click.away="searchOpen = false" class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full border border-slate-200 overflow-hidden">
            <form action="<?= Helper::url('search') ?>" method="GET" class="relative flex items-center p-4 border-b border-slate-100">
                <i class="fas fa-search text-slate-400 text-lg ml-2"></i>
                <input type="text" 
                       name="q" 
                       id="search-query-input"
                       placeholder="Search SLAF 3D printing topics, components, issues, G-code..." 
                       class="w-full px-4 py-2 bg-transparent text-slate-900 text-base focus:outline-none placeholder-slate-400">
                <button type="submit" class="px-3 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold cursor-pointer">Search</button>
            </form>
            <div class="p-4 bg-slate-50 text-xs text-slate-500 flex justify-between items-center">
                <span>Quick links: <a href="<?= Helper::url('slicing-simulator') ?>" class="text-blue-600 underline ml-1">Slicing Tool</a>, <a href="<?= Helper::url('directorates/dgge') ?>" class="text-blue-600 underline ml-1">PA-CF Nylon</a>, <a href="<?= Helper::url('hardware-anatomy') ?>" class="text-blue-600 underline ml-1">Hotend</a></span>
                <span class="text-slate-400">Press ESC to exit</span>
            </div>
        </div>
    </div>
</header>
