<?php
use App\Core\Helper;
use App\Core\Auth;

$uri = $currentUri ?? '';
if (!function_exists('adminNavActive')) {
    function adminNavActive($path, $uri) {
        if ($path === '/admin' && $uri === '/admin') return 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20';
        if ($path !== '/admin' && strpos($uri, $path) === 0) return 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20';
        return 'text-slate-300 hover:bg-slate-800/80 hover:text-white font-medium';
    }
}
?>

<aside class="w-64 bg-slate-950 text-slate-300 flex flex-col border-r border-slate-800 min-h-screen shrink-0">
    <!-- Brand -->
    <div class="h-20 flex items-center px-6 border-b border-slate-800 bg-slate-900/60">
        <a href="<?= Helper::url('admin') ?>" class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-700 to-cyan-500 flex items-center justify-center text-white shadow-md">
                <i class="fas fa-cube text-lg"></i>
            </div>
            <div>
                <div class="text-xs font-bold uppercase tracking-wider text-cyan-400">Admin CMS</div>
                <div class="text-sm font-bold text-white font-heading truncate">3D Printer Portal</div>
            </div>
        </a>
    </div>

    <!-- Navigation Items -->
    <div class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
        <!-- Main Section -->
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 px-3 mb-2">Core Overview</div>
            <a href="<?= Helper::url('admin') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl text-sm transition-all <?= adminNavActive('/admin', $uri) ?>">
                <i class="fas fa-chart-line w-5 text-center text-base"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- Content Management -->
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 px-3 mb-2">Educational Content</div>
            <div class="space-y-1">
                <a href="<?= Helper::url('admin/articles') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/articles', $uri) ?>">
                    <i class="fas fa-newspaper w-5 text-center"></i>
                    <span>Technical Articles</span>
                </a>
                <a href="<?= Helper::url('admin/training') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/training', $uri) ?>">
                    <i class="fas fa-layer-group w-5 text-center"></i>
                    <span>Training Modules</span>
                </a>
                <a href="<?= Helper::url('admin/components') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/components', $uri) ?>">
                    <i class="fas fa-cogs w-5 text-center"></i>
                    <span>Printer Components</span>
                </a>
                <a href="<?= Helper::url('admin/materials') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/materials', $uri) ?>">
                    <i class="fas fa-flask w-5 text-center"></i>
                    <span>Materials Database</span>
                </a>
                <a href="<?= Helper::url('admin/troubleshooting') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/troubleshooting', $uri) ?>">
                    <i class="fas fa-wrench w-5 text-center"></i>
                    <span>Troubleshooting</span>
                </a>
                <a href="<?= Helper::url('admin/projects') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/projects', $uri) ?>">
                    <i class="fas fa-cubes w-5 text-center"></i>
                    <span>Practical Projects</span>
                </a>
                <a href="<?= Helper::url('admin/quizzes') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/quizzes', $uri) ?>">
                    <i class="fas fa-question-circle w-5 text-center"></i>
                    <span>Knowledge Quizzes</span>
                </a>
                <a href="<?= Helper::url('admin/glossary') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/glossary', $uri) ?>">
                    <i class="fas fa-book w-5 text-center"></i>
                    <span>A-Z Glossary</span>
                </a>
                <a href="<?= Helper::url('admin/faqs') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/faqs', $uri) ?>">
                    <i class="fas fa-comments w-5 text-center"></i>
                    <span>FAQ Repository</span>
                </a>
                <a href="<?= Helper::url('admin/resources') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/resources', $uri) ?>">
                    <i class="fas fa-download w-5 text-center"></i>
                    <span>Downloads & SOPs</span>
                </a>
            </div>
        </div>

        <!-- Media & Assets -->
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 px-3 mb-2">Media & Showcase</div>
            <div class="space-y-1">
                <a href="<?= Helper::url('admin/videos') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/videos', $uri) ?>">
                    <i class="fas fa-video w-5 text-center"></i>
                    <span>Training Videos</span>
                </a>
                <a href="<?= Helper::url('admin/gallery') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/gallery', $uri) ?>">
                    <i class="fas fa-images w-5 text-center"></i>
                    <span>Photo Gallery</span>
                </a>
                <a href="<?= Helper::url('admin/media') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/media', $uri) ?>">
                    <i class="fas fa-folder-open w-5 text-center"></i>
                    <span>Media Library</span>
                </a>
                <a href="<?= Helper::url('admin/contacts') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/contacts', $uri) ?>">
                    <i class="fas fa-envelope w-5 text-center"></i>
                    <span>Inquiries</span>
                </a>
            </div>
        </div>

        <!-- Administration & Security -->
        <?php if (Auth::hasRole('super-admin')): ?>
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400 px-3 mb-2">System Controls</div>
            <div class="space-y-1">
                <a href="<?= Helper::url('admin/settings/printer-specs') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/settings/printer-specs', $uri) ?>">
                    <i class="fas fa-microchip w-5 text-center"></i>
                    <span>Printer Specs Editor</span>
                </a>
                <a href="<?= Helper::url('admin/settings') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/settings', $uri) ?>">
                    <i class="fas fa-sliders w-5 text-center"></i>
                    <span>Portal Settings</span>
                </a>
                <a href="<?= Helper::url('admin/users') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/users', $uri) ?>">
                    <i class="fas fa-users-cog w-5 text-center"></i>
                    <span>Admin Users</span>
                </a>
                <a href="<?= Helper::url('admin/audit') ?>" class="flex items-center space-x-3 px-3 py-2 rounded-xl text-sm transition-all <?= adminNavActive('/admin/audit', $uri) ?>">
                    <i class="fas fa-shield-alt w-5 text-center"></i>
                    <span>Audit Logs</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- User Profile & Sign Out -->
    <div class="p-4 border-t border-slate-800 bg-slate-900/80 flex items-center justify-between">
        <div class="flex items-center space-x-3 overflow-hidden">
            <div class="w-9 h-9 rounded-full bg-blue-700 text-white flex items-center justify-center font-bold text-xs shrink-0">
                <?= strtoupper(substr($currentUser['full_name'] ?? 'A', 0, 1)) ?>
            </div>
            <div class="overflow-hidden">
                <div class="text-xs font-bold text-white truncate"><?= htmlspecialchars($currentUser['full_name'] ?? 'Admin') ?></div>
                <div class="text-[10px] text-cyan-400 truncate"><?= htmlspecialchars($currentUser['role_name'] ?? 'Officer') ?></div>
            </div>
        </div>
        <a href="<?= Helper::url('admin/logout') ?>" class="p-2 text-slate-400 hover:text-rose-400 transition-colors" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</aside>
