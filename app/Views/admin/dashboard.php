<?php
$user = \App\Core\Auth::user();
$adminName = $user['full_name'] ?? $user['name'] ?? $user['username'] ?? 'Administrator';
?>
<div class="space-y-8 max-w-7xl mx-auto">
    
    <!-- Welcome Header Banner (Solid Navy Contrast) -->
    <div class="bg-[#0A2540] rounded-3xl p-8 text-white shadow-xl relative overflow-hidden border border-slate-800">
        <div class="relative z-10 space-y-3">
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 rounded-full bg-blue-600/30 text-blue-300 font-bold text-[11px] uppercase tracking-wider border border-blue-500/40">
                    SLAF Technical Directorate CMS
                </span>
                <span class="text-xs text-slate-300">Defense Additive Manufacturing System</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                Welcome, <?= htmlspecialchars($adminName) ?>
            </h1>
            <p class="text-slate-200 text-xs sm:text-sm max-w-3xl leading-relaxed">
                Centralized instructor command center for managing SLAF 3D printing training modules, printer hardware maintenance databases, material specifications, defense project showcases, and trainee assessments.
            </p>
        </div>
        <div class="absolute right-6 bottom-4 opacity-10 text-9xl text-white pointer-events-none">
            <i class="fas fa-cube"></i>
        </div>
    </div>

    <!-- Quick Action Shortcuts Bar -->
    <div class="flex flex-wrap items-center gap-3">
        <a href="<?= base_url('admin/articles/create') ?>" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-900 text-xs font-bold rounded-xl border border-slate-200 shadow-xs flex items-center gap-2 transition">
            <i class="fas fa-plus text-blue-600"></i> New Article
        </a>
        <a href="<?= base_url('admin/training/create-lesson') ?>" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-900 text-xs font-bold rounded-xl border border-slate-200 shadow-xs flex items-center gap-2 transition">
            <i class="fas fa-plus text-blue-600"></i> New Lesson
        </a>
        <a href="<?= base_url('admin/components/create') ?>" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-900 text-xs font-bold rounded-xl border border-slate-200 shadow-xs flex items-center gap-2 transition">
            <i class="fas fa-plus text-blue-600"></i> New Hardware Part
        </a>
        <a href="<?= base_url('admin/media') ?>" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-900 text-xs font-bold rounded-xl border border-slate-200 shadow-xs flex items-center gap-2 transition">
            <i class="fas fa-upload text-blue-600"></i> Media Upload
        </a>
        <a href="<?= base_url('admin/settings/printer-specs') ?>" class="px-4 py-2 bg-white hover:bg-slate-50 text-slate-900 text-xs font-bold rounded-xl border border-slate-200 shadow-xs flex items-center gap-2 transition">
            <i class="fas fa-sliders-h text-blue-600"></i> Edit Machine Specs
        </a>
    </div>

    <!-- Statistics Cards Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        
        <a href="<?= base_url('admin/articles') ?>" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between group">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition">
                <i class="fas fa-newspaper"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900"><?= (int)($stats['articles'] ?? 0) ?></div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Articles</div>
            </div>
        </a>

        <a href="<?= base_url('admin/training') ?>" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between group">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900"><?= (int)($stats['lessons'] ?? 0) ?></div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Lessons</div>
            </div>
        </a>

        <a href="<?= base_url('admin/components') ?>" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between group">
            <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition">
                <i class="fas fa-cogs"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900"><?= (int)($stats['components'] ?? 0) ?></div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Components</div>
            </div>
        </a>

        <a href="<?= base_url('admin/troubleshooting') ?>" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between group">
            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition">
                <i class="fas fa-wrench"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900"><?= (int)($stats['troubleshooting'] ?? 0) ?></div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Defect Guides</div>
            </div>
        </a>

        <a href="<?= base_url('admin/projects') ?>" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between group">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition">
                <i class="fas fa-cube"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900"><?= (int)($stats['projects'] ?? 0) ?></div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Projects</div>
            </div>
        </a>

        <a href="<?= base_url('admin/quizzes') ?>" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between group">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition">
                <i class="fas fa-question-circle"></i>
            </div>
            <div>
                <div class="text-2xl font-black text-slate-900"><?= (int)($stats['quizzes'] ?? 0) ?></div>
                <div class="text-xs text-slate-500 font-medium mt-0.5">Quizzes</div>
            </div>
        </a>

    </div>

    <!-- 2 Column Section: Recent Inquiries & Recent Audit Logs -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Contact Messages -->
        <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-xs border border-slate-200">
            <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                    <i class="fas fa-envelope text-blue-600"></i> Recent Trainee Inquiries
                </h3>
                <a href="<?= base_url('admin/contacts') ?>" class="text-xs text-blue-600 hover:underline font-semibold">View All</a>
            </div>

            <?php if (empty($recentContacts)): ?>
                <p class="text-slate-400 text-xs text-center py-8">No recent inquiries received.</p>
            <?php else: ?>
                <div class="space-y-3">
                    <?php foreach ($recentContacts as $msg): ?>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 flex items-start justify-between gap-4">
                            <div>
                                <h4 class="font-bold text-slate-900 text-xs"><?= e($msg['name'] ?? 'Trainee') ?></h4>
                                <p class="text-[11px] text-slate-600 mt-0.5 line-clamp-1"><?= e($msg['subject'] ?? 'No subject') ?></p>
                                <p class="text-[10px] text-slate-400 mt-1"><?= time_ago($msg['created_at'] ?? '') ?></p>
                            </div>
                            <a href="<?= base_url('admin/contacts/view/' . ($msg['id'] ?? 0)) ?>" class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-lg hover:bg-slate-100 transition">
                                Open
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Recent Audit Logs -->
        <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-xs border border-slate-200">
            <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                    <i class="fas fa-history text-blue-600"></i> Recent Audit Activities
                </h3>
                <a href="<?= base_url('admin/audit') ?>" class="text-xs text-blue-600 hover:underline font-semibold">View All</a>
            </div>

            <?php if (empty($recentLogs)): ?>
                <p class="text-slate-400 text-xs text-center py-8">No audit activities logged yet.</p>
            <?php else: ?>
                <div class="space-y-2">
                    <?php foreach ($recentLogs as $log): ?>
                        <div class="flex items-center justify-between text-xs py-2 border-b border-slate-50">
                            <div>
                                <span class="font-bold text-slate-900"><?= e($log['admin_name'] ?? 'System') ?></span>
                                <span class="text-slate-500"> <?= e($log['action'] ?? '') ?></span>
                                <span class="text-blue-700 font-medium"> [<?= e($log['module'] ?? 'general') ?>]</span>
                            </div>
                            <span class="text-slate-400 text-[11px]"><?= time_ago($log['created_at'] ?? '') ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</div>
