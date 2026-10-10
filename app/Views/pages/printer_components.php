<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Machine Anatomy & Subsystems
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Printer Components Database
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Detailed technical reference covering working principles, engineering specifications, preventative maintenance, and common failure modes for all printer subsystems.
            </p>
        </div>
    </div>
</section>

<!-- Components Explorer -->
<section class="py-16 bg-slate-50" x-data="{ activeCat: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-2 mb-12">
            <button @click="activeCat = 'all'" 
                    :class="activeCat === 'all' ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                    class="px-4 py-2 rounded-xl text-xs transition-all">
                All Subsystems
            </button>
            <?php foreach (array_keys($groupedComponents) as $cat): ?>
            <button @click="activeCat = '<?= addslashes($cat) ?>'" 
                    :class="activeCat === '<?= addslashes($cat) ?>' ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                    class="px-4 py-2 rounded-xl text-xs transition-all">
                <?= htmlspecialchars($cat) ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Components Grid -->
        <div class="space-y-12">
            <?php foreach ($groupedComponents as $category => $components): ?>
            <div x-show="activeCat === 'all' || activeCat === '<?= addslashes($category) ?>'" class="space-y-6">
                
                <div class="flex items-center space-x-3 pb-2 border-b border-slate-200">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                    <h2 class="text-xl font-bold text-slate-900 font-heading"><?= htmlspecialchars($category) ?></h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <?php foreach ($components as $comp): ?>
                    <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200 shadow-sm flex flex-col justify-between interactive-card">
                        
                        <div class="space-y-4">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                     <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                         <?= htmlspecialchars($comp['category'] ?? '') ?>
                                     </span>
                                     <h3 class="text-xl font-bold text-slate-900 font-heading mt-2"><?= htmlspecialchars($comp['name'] ?? '') ?></h3>
                                     <?php if (!empty($comp['subtitle'])): ?>
                                     <p class="text-xs text-cyan-700 font-medium"><?= htmlspecialchars($comp['subtitle']) ?></p>
                                     <?php endif; ?>
                                 </div>
                                 <div class="w-12 h-12 rounded-2xl bg-slate-900 text-cyan-400 flex items-center justify-center text-xl shrink-0 shadow-md">
                                     <i class="fas fa-microchip"></i>
                                 </div>
                            </div>

                            <!-- Working Principle -->
                            <div class="text-xs text-slate-600 leading-relaxed bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                <span class="font-bold text-slate-900 block mb-1">Working Principle:</span>
                                <?= htmlspecialchars($comp['working_principle'] ?? $comp['operating_principle'] ?? $comp['description'] ?? 'Principle details available in module curriculum.') ?>
                            </div>

                            <!-- Function -->
                            <div class="text-xs text-slate-600 leading-relaxed">
                                <span class="font-bold text-slate-900 block mb-1">Function in 3D Printing:</span>
                                <?= htmlspecialchars($comp['function_description'] ?? $comp['function_summary'] ?? 'Functional summary details.') ?>
                            </div>

                            <!-- Technical Specs -->
                            <?php if (!empty($comp['technical_specs'])): ?>
                            <div class="text-xs text-slate-700 bg-blue-50/40 p-4 rounded-2xl border border-blue-100/60 space-y-1">
                                <span class="font-bold text-blue-950 block mb-1">Technical Specifications:</span>
                                <div class="space-y-1 text-slate-600"><?= $comp['technical_specs'] ?></div>
                            </div>
                            <?php endif; ?>

                            <!-- Common Problems & Maintenance Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                                <div class="p-3 rounded-xl bg-rose-50/50 border border-rose-100 text-xs text-slate-700">
                                    <span class="font-bold text-rose-900 block mb-1"><i class="fas fa-exclamation-triangle text-rose-500 mr-1"></i> Common Faults:</span>
                                    <div class="text-slate-600 space-y-1"><?= $comp['common_problems'] ?? $comp['common_issues'] ?? $comp['troubleshooting_tips'] ?? 'Inspect during regular scheduled maintenance.' ?></div>
                                </div>
                                <div class="p-3 rounded-xl bg-emerald-50/50 border border-emerald-100 text-xs text-slate-700">
                                    <span class="font-bold text-emerald-900 block mb-1"><i class="fas fa-wrench text-emerald-500 mr-1"></i> Maintenance:</span>
                                    <div class="text-slate-600 space-y-1"><?= $comp['maintenance_tips'] ?? $comp['maintenance_info'] ?? $comp['maintenance_guide'] ?? 'Lubricate and calibrate according to manual.' ?></div>
                                </div>
                            </div>

                            <?php if (!empty($comp['safety_notes'])): ?>
                            <div class="p-3 rounded-xl bg-amber-50 border border-amber-200/60 text-[11px] text-amber-900 flex items-start space-x-2">
                                <i class="fas fa-shield-alt text-amber-600 mt-0.5"></i>
                                <div><span class="font-bold">Safety Directive:</span> <?= htmlspecialchars($comp['safety_notes']) ?></div>
                            </div>
                            <?php endif; ?>

                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
