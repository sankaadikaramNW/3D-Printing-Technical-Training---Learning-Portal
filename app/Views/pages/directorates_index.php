<?php
use App\Core\Helper;
?>

<!-- Breadcrumbs & Hero -->
<div class="bg-[#0A2540] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center gap-2 text-xs font-semibold text-slate-300 mb-2">
            <a href="<?= Helper::url() ?>" class="hover:text-blue-400 transition">Portal Home</a>
            <i class="fas fa-chevron-right text-[9px] text-slate-500"></i>
            <span class="text-blue-400 font-bold">Defense Tracks</span>
        </div>
        <div class="max-w-3xl space-y-3">
            <span class="px-3 py-1 rounded-full bg-blue-600/30 text-blue-300 text-xs font-bold border border-blue-500/40 uppercase tracking-wider">
                SLAF Defense Additive Manufacturing
            </span>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                Supported Directorates & Technical Trades
            </h1>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                Specialized 3D printing workflows, digital repository strategies, and technical qualification tracks tailored for Sri Lanka Air Force engineering branches.
            </p>
        </div>
    </div>
</div>

<!-- Directorate Cards Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php foreach (($directorates ?? []) as $d): ?>
            <?php 
                $apps = json_decode($d['trade_applications'] ?? '[]', true) ?: [];
                $code = (string)($d['code'] ?? 'AM');
                $name = (string)($d['name'] ?? 'Directorate Track');
                $desc = (string)($d['description'] ?? '');
                $sort = (int)($d['sort_order'] ?? 1);
            ?>
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:border-blue-500 transition-all duration-300 p-8 flex flex-col justify-between space-y-6 group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-3.5 py-1 rounded-xl bg-blue-50 text-blue-700 font-black text-xs border border-blue-200 font-mono tracking-wider">
                            <?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?>
                        </span>
                        <span class="text-xs font-semibold text-slate-400">
                            Defense Track #<?= $sort ?>
                        </span>
                    </div>

                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 group-hover:text-blue-600 transition-colors">
                        <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
                    </h2>

                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        <?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8') ?>
                    </p>

                    <!-- Strategic Focus -->
                    <?php if (!empty($d['strategic_focus'])): ?>
                    <div class="bg-slate-50 rounded-xl p-3.5 border border-slate-200/80 text-xs space-y-1">
                        <span class="font-bold text-slate-800 block uppercase tracking-wider text-[10px]">Strategic Focus:</span>
                        <span class="text-slate-600 font-medium"><?= htmlspecialchars((string)$d['strategic_focus'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <?php endif; ?>

                    <!-- Core Materials -->
                    <?php if (!empty($d['core_materials'])): ?>
                    <div class="text-xs space-y-1">
                        <span class="font-bold text-slate-700 block uppercase tracking-wider text-[10px]">Certified Materials:</span>
                        <span class="text-blue-700 font-mono font-medium text-[11px]"><?= htmlspecialchars((string)$d['core_materials'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <?php endif; ?>

                    <!-- Key Trade Applications -->
                    <?php if (!empty($apps)): ?>
                    <div class="space-y-1.5 pt-2">
                        <span class="font-bold text-slate-800 block text-xs">Primary Use Cases:</span>
                        <ul class="space-y-1 text-xs text-slate-600">
                            <?php foreach (array_slice($apps, 0, 3) as $app): ?>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check text-blue-600 text-[10px] mt-1 shrink-0"></i>
                                    <span><?= htmlspecialchars((string)$app, ENT_QUOTES, 'UTF-8') ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="<?= Helper::url('directorates/' . strtolower($code)) ?>" 
                       class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm shadow-blue-600/20">
                        <span>Explore <?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?> Curriculum</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
