<?php
use App\Core\Helper;
?>

<header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between shadow-xs sticky top-0 z-30">
    <div class="flex items-center space-x-3">
        <h1 class="text-lg font-extrabold text-slate-800 font-heading"><?= htmlspecialchars($pageTitle ?? 'Admin Dashboard') ?></h1>
    </div>

    <div class="flex items-center space-x-3">
        <a href="<?= Helper::url() ?>" target="_blank" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold flex items-center space-x-1.5 transition-colors border border-slate-200">
            <i class="fas fa-external-link-alt text-slate-400 text-[10px]"></i>
            <span>Live Portal</span>
        </a>

        <div class="h-5 w-px bg-slate-200"></div>

        <div class="flex items-center space-x-3">
            <div class="text-right hidden sm:block leading-tight">
                <div class="text-xs font-bold text-slate-800"><?= htmlspecialchars($currentUser['name'] ?? 'Administrator') ?></div>
                <div class="text-[10px] text-blue-600 font-semibold uppercase"><?= htmlspecialchars($currentUser['role_name'] ?? 'Super Admin') ?></div>
            </div>
            <a href="<?= Helper::url('admin/logout') ?>" class="px-3 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition-colors border border-rose-200 flex items-center space-x-1">
                <i class="fas fa-power-off text-[10px]"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>
