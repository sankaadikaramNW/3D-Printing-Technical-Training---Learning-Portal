<?php
use App\Core\Helper;
$apps = json_decode($directorate['trade_applications'] ?? '[]', true) ?: [];
$code = (string)($directorate['code'] ?? 'AM');
$name = (string)($directorate['name'] ?? 'Directorate Track');
$desc = (string)($directorate['description'] ?? '');
?>

<!-- Breadcrumbs & Hero -->
<div class="bg-[#0A2540] text-white py-14 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center gap-2 text-xs font-semibold text-slate-300 mb-2">
            <a href="<?= Helper::url() ?>" class="hover:text-blue-400 transition">Portal Home</a>
            <i class="fas fa-chevron-right text-[9px] text-slate-500"></i>
            <a href="<?= Helper::url('directorates') ?>" class="hover:text-blue-400 transition">Directorates</a>
            <i class="fas fa-chevron-right text-[9px] text-slate-500"></i>
            <span class="text-blue-400 font-bold"><?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
        
        <div class="max-w-3xl space-y-3">
            <span class="px-3.5 py-1 rounded-xl bg-blue-600/40 text-blue-300 text-xs font-black border border-blue-500/50 uppercase tracking-widest font-mono">
                <?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?> Track
            </span>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
            </h1>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                <?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8') ?>
            </p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- Strategic Highlights Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-2">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg">
                <i class="fas fa-bullseye"></i>
            </div>
            <h3 class="font-bold text-slate-900 text-sm">Strategic Focus</h3>
            <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars((string)($directorate['strategic_focus'] ?? 'Engineering Additive Prototyping'), ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-2">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg">
                <i class="fas fa-flask"></i>
            </div>
            <h3 class="font-bold text-slate-900 text-sm">Qualified Materials</h3>
            <p class="text-xs text-blue-700 font-mono font-medium leading-relaxed"><?= htmlspecialchars((string)($directorate['core_materials'] ?? 'PLA, PETG, ABS, Nylon-CF'), ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-y-2">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                <i class="fas fa-shield-halved"></i>
            </div>
            <h3 class="font-bold text-slate-900 text-sm">Defense Qualification</h3>
            <p class="text-xs text-slate-600 leading-relaxed">Air-gapped parametric CAD repositories & aerospace tolerance compliance (±0.08mm).</p>
        </div>

    </div>

    <!-- Trade Applications & Defense Use Cases -->
    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm space-y-6">
        <div class="border-b border-slate-100 pb-4">
            <h2 class="text-xl font-bold text-slate-900">Mandatory Trade Applications & Use Cases</h2>
            <p class="text-xs text-slate-500 mt-1">Specific military fabrication projects assigned to <?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?> technicians.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <?php foreach ($apps as $idx => $app): ?>
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-start gap-3">
                    <span class="w-6 h-6 rounded-lg bg-blue-600 text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5"><?= $idx + 1 ?></span>
                    <span class="text-xs font-medium text-slate-800 leading-relaxed"><?= htmlspecialchars((string)$app, ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Video Lectures & Tutorials for this Directorate -->
    <?php if (!empty($videos)): ?>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-900">Recommended Video Training Lectures</h2>
                <p class="text-xs text-slate-500">Visual SOPs and step-by-step printing guides for <?= htmlspecialchars($code, ENT_QUOTES, 'UTF-8') ?>.</p>
            </div>
            <a href="<?= Helper::url('videos') ?>" class="text-xs font-bold text-blue-600 hover:text-blue-800">View All Videos &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($videos as $v): ?>
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition">
                    <div class="relative bg-slate-900 h-40 flex items-center justify-center text-white">
                        <i class="fas fa-play-circle text-4xl text-blue-500 opacity-90"></i>
                        <span class="absolute bottom-2 right-2 px-2 py-0.5 rounded bg-black/70 text-[10px] font-mono font-bold text-slate-200">
                            <?= htmlspecialchars((string)($v['duration'] ?? '15 mins'), ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </div>
                    <div class="p-5 space-y-2 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600"><?= htmlspecialchars((string)($v['category'] ?? 'General'), ENT_QUOTES, 'UTF-8') ?></span>
                            <h3 class="text-sm font-bold text-slate-900 line-clamp-2 mt-1"><?= htmlspecialchars((string)($v['title'] ?? 'Training Video'), ENT_QUOTES, 'UTF-8') ?></h3>
                            <p class="text-xs text-slate-500 line-clamp-2 mt-1"><?= htmlspecialchars((string)($v['description'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                        <a href="<?= Helper::url('videos') ?>" class="pt-3 text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                            Watch Lecture <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Action Bar -->
    <div class="bg-gradient-to-r from-blue-700 to-blue-600 rounded-3xl p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
        <div class="space-y-1 text-center sm:text-left">
            <h3 class="text-xl font-bold">Ready to Begin <?= htmlspecialchars($directorate['code']) ?> Printing Operations?</h3>
            <p class="text-blue-100 text-xs">Access our interactive slicing calculator and run through the 5-phase pre-flight checklist.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="<?= Helper::url('slicing-simulator') ?>" class="px-5 py-2.5 bg-white text-blue-800 rounded-xl font-bold text-xs shadow hover:bg-blue-50 transition">
                Launch Slicing Tool
            </a>
            <a href="<?= Helper::url('preflight-checklist') ?>" class="px-5 py-2.5 bg-blue-900 text-white rounded-xl font-bold text-xs border border-blue-400/40 hover:bg-blue-950 transition">
                Pre-Flight Checklist
            </a>
        </div>
    </div>

</div>
