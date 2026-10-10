<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-cyan-700/60 mb-3">
                Applied Prototypes & Case Studies
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Project Showcase & Case Studies
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Real-world engineering components, avionics brackets, and instructional mechanisms designed and fabricated on the FDM 3D printer training module.
            </p>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (($projects ?? []) as $proj): 
                $slug = (string)($proj['slug'] ?? $proj['id'] ?? '');
                $title = (string)($proj['title'] ?? 'Engineering Project');
                $org = (string)($proj['client_org'] ?? $proj['category_name'] ?? 'SLAF Additive Manufacturing');
                $objective = (string)($proj['objective'] ?? $proj['description'] ?? '');
                $mat = (string)($proj['material_used'] ?? 'PLA+');
                $time = (string)($proj['print_time_hours'] ?? 'N/A');
                $weight = (string)($proj['filament_weight_grams'] ?? $proj['filament_weight_g'] ?? 'N/A');
                $layer = (string)($proj['layer_height_mm'] ?? $proj['layer_height'] ?? '0.20');
                $infill = (string)($proj['infill_percent'] ?? $proj['infill_percentage'] ?? '20');
            ?>
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between interactive-card">
                <div>
                    <div class="aspect-16/10 bg-slate-900 relative flex items-center justify-center text-slate-700 text-5xl">
                        <i class="fas fa-cubes"></i>
                        <span class="absolute top-4 left-4 px-2.5 py-1 rounded-full bg-slate-950/80 border border-slate-700 text-cyan-400 text-[10px] font-bold">
                            <?= htmlspecialchars($mat, ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </div>

                    <div class="p-6">
                        <div class="text-[11px] font-mono text-blue-600 mb-1 font-bold"><?= htmlspecialchars($org, ENT_QUOTES, 'UTF-8') ?></div>
                        <h3 class="text-lg font-bold text-slate-900 font-heading mb-2">
                            <a href="<?= Helper::url('projects/show/' . $slug) ?>" class="hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed mb-4">
                            <?= htmlspecialchars($objective, ENT_QUOTES, 'UTF-8') ?>
                        </p>

                        <!-- Print Parameters Mini Badges -->
                        <div class="grid grid-cols-2 gap-2 text-[11px] font-mono text-slate-600 bg-slate-50 p-3 rounded-2xl border border-slate-100">
                            <div>Time: <span class="text-slate-900 font-bold"><?= htmlspecialchars($time, ENT_QUOTES, 'UTF-8') ?>h</span></div>
                            <div>Weight: <span class="text-slate-900 font-bold"><?= htmlspecialchars($weight, ENT_QUOTES, 'UTF-8') ?>g</span></div>
                            <div>Layer: <span class="text-slate-900 font-bold"><?= htmlspecialchars($layer, ENT_QUOTES, 'UTF-8') ?>mm</span></div>
                            <div>Infill: <span class="text-slate-900 font-bold"><?= htmlspecialchars($infill, ENT_QUOTES, 'UTF-8') ?>%</span></div>
                        </div>
                    </div>
                </div>

                <div class="p-6 pt-0">
                    <a href="<?= Helper::url('projects/show/' . $slug) ?>" class="w-full py-2.5 rounded-xl bg-blue-50 hover:bg-blue-600 hover:text-white text-blue-700 text-xs font-bold transition-all flex items-center justify-center space-x-1.5 border border-blue-100">
                        <span>Read Case Study</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
