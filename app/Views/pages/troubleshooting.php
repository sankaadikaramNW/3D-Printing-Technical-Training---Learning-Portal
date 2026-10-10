<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-amber-900/60 text-amber-400 text-xs font-bold uppercase tracking-wider border border-amber-700/60 mb-3">
                Diagnostic & Failure Analysis Matrix
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                3D Printing Troubleshooting Matrix
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Systematic engineering diagnostic framework: Problem Symptom → Root Causes → Visual Checks → Corrective Actions → Preventative Protocols.
            </p>
        </div>
    </div>
</section>

<!-- Troubleshooting Explorer -->
<section class="py-16 bg-slate-50" x-data="{ activeCat: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center gap-2 mb-12">
            <button @click="activeCat = 'all'" 
                    :class="activeCat === 'all' ? 'bg-amber-600 text-white font-bold shadow-md shadow-amber-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                    class="px-4 py-2 rounded-xl text-xs transition-all">
                All Diagnostic Categories
            </button>
            <?php foreach (array_keys($groupedIssues ?? []) as $cat): ?>
            <button @click="activeCat = '<?= addslashes((string)$cat) ?>'" 
                    :class="activeCat === '<?= addslashes((string)$cat) ?>' ? 'bg-amber-600 text-white font-bold shadow-md shadow-amber-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                    class="px-4 py-2 rounded-xl text-xs transition-all">
                <?= htmlspecialchars((string)$cat, ENT_QUOTES, 'UTF-8') ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Issue Cards -->
        <div class="space-y-8">
            <?php foreach (($groupedIssues ?? []) as $category => $issues): ?>
            <div x-show="activeCat === 'all' || activeCat === '<?= addslashes((string)$category) ?>'" class="space-y-6">
                
                <div class="flex items-center space-x-2 pb-2 border-b border-slate-200">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    <h2 class="text-xl font-bold text-slate-900 font-heading"><?= htmlspecialchars((string)$category, ENT_QUOTES, 'UTF-8') ?></h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <?php foreach ((is_array($issues) ? $issues : []) as $issue): 
                        $sev = $issue['severity'] ?? 'Medium';
                        $sevClass = match(ucfirst(strtolower((string)$sev))) {
                            'Critical' => 'bg-rose-100 text-rose-800 border border-rose-200',
                            'High' => 'bg-amber-100 text-amber-800 border border-amber-200',
                            'Medium' => 'bg-blue-100 text-blue-800 border border-blue-200',
                            default => 'bg-slate-100 text-slate-800 border border-slate-200'
                        };
                    ?>
                    <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200 shadow-sm space-y-5 interactive-card">
                        
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider <?= $sevClass ?>">
                                    <?= htmlspecialchars((string)$sev, ENT_QUOTES, 'UTF-8') ?> Severity
                                </span>
                                <h3 class="text-lg font-bold text-slate-900 font-heading mt-2"><?= htmlspecialchars((string)($issue['title'] ?? 'Troubleshooting Issue'), ENT_QUOTES, 'UTF-8') ?></h3>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg shrink-0">
                                <i class="fas fa-wrench"></i>
                            </div>
                        </div>

                        <!-- Symptom -->
                        <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 text-xs text-slate-700">
                            <span class="font-bold text-slate-900 block mb-1"><i class="fas fa-eye text-blue-500 mr-1"></i> Visual Symptom:</span>
                            <?= htmlspecialchars((string)($issue['symptom'] ?? 'No symptom described.'), ENT_QUOTES, 'UTF-8') ?>
                        </div>

                        <!-- Causes & Checks -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div class="p-4 rounded-2xl bg-rose-50/50 border border-rose-100">
                                <span class="font-bold text-rose-950 block mb-1.5"><i class="fas fa-question-circle text-rose-500 mr-1"></i> Root Causes:</span>
                                <div class="text-slate-600 space-y-1"><?= $issue['likely_causes'] ?? $issue['causes'] ?? 'No causes recorded.' ?></div>
                            </div>
                            <div class="p-4 rounded-2xl bg-blue-50/50 border border-blue-100">
                                <span class="font-bold text-blue-950 block mb-1.5"><i class="fas fa-search text-blue-500 mr-1"></i> Inspection Steps:</span>
                                <div class="text-slate-600 space-y-1"><?= $issue['inspection_steps'] ?? $issue['checks'] ?? 'No inspection steps recorded.' ?></div>
                            </div>
                        </div>

                        <!-- Corrective Actions & Prevention -->
                        <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-200 text-xs space-y-2">
                            <span class="font-bold text-emerald-950 block"><i class="fas fa-check-circle text-emerald-600 mr-1"></i> Corrective Action:</span>
                            <div class="text-slate-700 space-y-1"><?= $issue['corrective_actions'] ?? $issue['actions'] ?? 'No corrective actions listed.' ?></div>
                            
                            <div class="pt-2 border-t border-emerald-200/60 text-slate-600">
                                <span class="font-bold text-emerald-950">Prevention: </span>
                                <?= htmlspecialchars((string)($issue['prevention_guidelines'] ?? $issue['prevention'] ?? 'Follow standard pre-flight checklist and calibrate bed regularly.'), ENT_QUOTES, 'UTF-8') ?>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
