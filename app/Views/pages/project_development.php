<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-cyan-700/60 mb-3">
                Engineering Milestone Chronicle
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Project Development Journey
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Documenting the complete engineering lifecycle: Concept ↓ CAD ↓ Fabrication ↓ Assembly ↓ Electronics ↓ Firmware ↓ Calibration ↓ Trials ↓ Training Module Deployment.
            </p>
        </div>
    </div>
</section>

<!-- 13-Stage Milestone Timeline -->
<section class="py-16 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="space-y-12">
            <?php foreach ($stages as $stage): ?>
            <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200 shadow-sm space-y-6 relative overflow-hidden interactive-card">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-slate-900 to-blue-900 text-cyan-400 flex items-center justify-center font-black font-heading text-xl shadow-md shrink-0">
                            <?= sprintf('%02d', $stage['stage_number']) ?>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 font-mono">
                                Phase: <?= htmlspecialchars($stage['phase_name']) ?>
                            </span>
                            <h3 class="text-xl font-bold text-slate-900 font-heading mt-1"><?= htmlspecialchars($stage['title']) ?></h3>
                        </div>
                    </div>
                </div>

                <div class="text-xs text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="font-bold text-slate-900 block mb-1">Stage Objective & Summary:</span>
                    <?= htmlspecialchars($stage['summary']) ?>
                </div>

                <div class="text-xs text-slate-600 leading-relaxed space-y-2">
                    <span class="font-bold text-slate-900 block">Technical Implementation Details:</span>
                    <p><?= htmlspecialchars($stage['detailed_description']) ?></p>
                </div>

                <!-- Challenges & Solutions Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs pt-2">
                    <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-200">
                        <span class="font-bold text-amber-950 block mb-1"><i class="fas fa-exclamation-triangle text-amber-600 mr-1"></i> Key Technical Challenges:</span>
                        <p class="text-slate-700 leading-relaxed"><?= htmlspecialchars($stage['key_challenges']) ?></p>
                    </div>
                    <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-200">
                        <span class="font-bold text-blue-950 block mb-1"><i class="fas fa-wrench text-blue-600 mr-1"></i> Solutions Implemented:</span>
                        <p class="text-slate-700 leading-relaxed"><?= htmlspecialchars($stage['solutions_implemented']) ?></p>
                    </div>
                </div>

                <!-- Outcome Banner -->
                <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-200 text-xs">
                    <span class="font-bold text-emerald-950 block mb-0.5"><i class="fas fa-check-circle text-emerald-600 mr-1"></i> Verified Engineering Outcome:</span>
                    <p class="text-slate-700"><?= htmlspecialchars($stage['outcomes']) ?></p>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
