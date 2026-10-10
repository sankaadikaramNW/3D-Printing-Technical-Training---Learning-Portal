<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-14 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-sm text-cyan-300/80 mb-4">
            <a href="<?= base_url('projects') ?>" class="hover:text-white transition flex items-center gap-1">
                <i class="fas fa-arrow-left"></i> All Project Showcases
            </a>
            <span>/</span>
            <span class="text-slate-300 truncate max-w-xs"><?= e($project['title'] ?? 'Project Details') ?></span>
        </div>
        
        <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 border border-cyan-500/30 rounded-full text-xs font-semibold">
                <?= e($project['category_name'] ?? 'Engineering Fabrication') ?>
            </span>
            <span class="px-3 py-1 bg-white/10 text-slate-300 rounded-full text-xs">
                <i class="fas fa-cubes mr-1 text-cyan-400"></i> Material: <strong><?= e($project['material_used'] ?? 'PLA+') ?></strong>
            </span>
            <?php if (!empty($project['print_time_hours'])): ?>
                <span class="px-3 py-1 bg-white/10 text-slate-300 rounded-full text-xs">
                    <i class="fas fa-clock mr-1 text-cyan-400"></i> Print Duration: <strong><?= e($project['print_time_hours']) ?> hrs</strong>
                </span>
            <?php endif; ?>
        </div>
        
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight"><?= e($project['title'] ?? 'Engineering Project') ?></h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        <!-- Main Content (2 cols) -->
        <div class="lg:col-span-2 space-y-10">
            <!-- Hero Project Image -->
            <div class="rounded-2xl overflow-hidden shadow-xl border border-slate-200 bg-white">
                <img src="<?= asset($project['featured_image'] ?? $project['image_url'] ?? 'assets/img/placeholder.svg') ?>" 
                     alt="<?= e($project['title'] ?? 'Project Image') ?>" 
                     class="w-full h-80 sm:h-96 object-cover">
            </div>

            <!-- Objective & Summary -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
                <h2 class="text-2xl font-bold text-brand-navy mb-4 flex items-center gap-2">
                    <i class="fas fa-bullseye text-cyan-600"></i> Project Objective & Background
                </h2>
                <div class="text-slate-700 leading-relaxed space-y-4">
                    <?= nl2br(e($project['objective'] ?? $project['description'] ?? 'This engineering component was designed and fabricated using the institutional FDM 3D printer training module to demonstrate practical prototyping capabilities.')) ?>
                </div>
            </div>

            <!-- Design & Fabrication Details -->
            <?php if (!empty($project['design_details']) || !empty($project['description'])): ?>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
                    <h2 class="text-2xl font-bold text-brand-navy mb-4 flex items-center gap-2">
                        <i class="fas fa-drafting-compass text-cyan-600"></i> Engineering Design & Slicing Strategy
                    </h2>
                    <div class="prose max-w-none text-slate-700 leading-relaxed">
                        <?= !empty($project['design_details']) ? $project['design_details'] : nl2br(e($project['description'])) ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Print Settings Breakdown -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200">
                <h2 class="text-2xl font-bold text-brand-navy mb-6 flex items-center gap-2">
                    <i class="fas fa-sliders-h text-cyan-600"></i> Slicing Parameters & Machine Settings
                </h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="text-xs text-slate-500 uppercase font-semibold">Material</div>
                        <div class="text-lg font-bold text-brand-navy mt-1"><?= e($project['material_used'] ?? 'PLA / PETG') ?></div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="text-xs text-slate-500 uppercase font-semibold">Layer Height</div>
                        <div class="text-lg font-bold text-brand-navy mt-1"><?= e($project['layer_height'] ?? '0.20 mm') ?></div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="text-xs text-slate-500 uppercase font-semibold">Infill Density</div>
                        <div class="text-lg font-bold text-brand-navy mt-1"><?= e($project['infill_percentage'] ?? '25') ?>%</div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="text-xs text-slate-500 uppercase font-semibold">Infill Pattern</div>
                        <div class="text-lg font-bold text-brand-navy mt-1"><?= e($project['infill_pattern'] ?? 'Gyroid / Grid') ?></div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="text-xs text-slate-500 uppercase font-semibold">Print Temperature</div>
                        <div class="text-lg font-bold text-brand-navy mt-1"><?= e($project['print_temperature'] ?? '210°C / 60°C') ?></div>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="text-xs text-slate-500 uppercase font-semibold">Support Material</div>
                        <div class="text-lg font-bold text-brand-navy mt-1"><?= e(!empty($project['supports_used']) ? 'Tree / Organic' : 'None (Self-Supporting)') ?></div>
                    </div>
                </div>
            </div>

            <!-- Lessons Learned & Educational Outcomes -->
            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-8 border border-cyan-200">
                <h2 class="text-2xl font-bold text-brand-navy mb-4 flex items-center gap-2">
                    <i class="fas fa-graduation-cap text-cyan-600"></i> Technical Insights & Lessons Learned
                </h2>
                <div class="text-slate-700 leading-relaxed space-y-3">
                    <?= nl2br(e($project['lessons_learned'] ?? '• Proper orientation on the build plate reduced support requirements by 40% and improved tensile strength along the load-bearing axis.' . "\n" . '• First layer squish calibration ensured zero edge-warping during the 8-hour print session.' . "\n" . '• Post-processing with light deburring provided accurate hole tolerances for M4 threaded inserts.')) ?>
                </div>
            </div>
        </div>

        <!-- Sidebar (1 col) -->
        <div class="space-y-8">
            <!-- Project Meta Box -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                <h3 class="text-lg font-bold text-brand-navy mb-4 border-b border-slate-100 pb-3">Project Metadata</h3>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between py-1 border-b border-slate-50">
                        <dt class="text-slate-500">Fabricated On:</dt>
                        <dd class="font-semibold text-slate-800">FDM Training Module v1.0</dd>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-50">
                        <dt class="text-slate-500">Learner / Team:</dt>
                        <dd class="font-semibold text-slate-800"><?= e($project['author'] ?? $project['created_by_name'] ?? 'Technical Training Cohort') ?></dd>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-50">
                        <dt class="text-slate-500">Dimensional Accuracy:</dt>
                        <dd class="font-semibold text-emerald-600">± 0.15 mm verified</dd>
                    </div>
                    <div class="flex justify-between py-1 border-b border-slate-50">
                        <dt class="text-slate-500">Weight / Filament:</dt>
                        <dd class="font-semibold text-slate-800"><?= e($project['filament_weight_g'] ?? $project['filament_weight_grams'] ?? '85') ?> grams</dd>
                    </div>
                </dl>
                
                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href="<?= base_url('projects') ?>" class="block w-full text-center px-4 py-2.5 bg-brand-navy text-white rounded-xl font-semibold hover:bg-slate-800 transition">
                        <i class="fas fa-th mr-1"></i> Browse More Projects
                    </a>
                </div>
            </div>

            <!-- Related Learning Modules CTA -->
            <div class="bg-gradient-to-br from-brand-navy to-slate-900 rounded-2xl p-6 text-white text-center shadow-md">
                <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-cyan-500/20 flex items-center justify-center text-cyan-400 text-xl">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h4 class="font-bold text-lg mb-2">Want to print this?</h4>
                <p class="text-slate-300 text-sm mb-5 leading-relaxed">
                    Follow our step-by-step Slicing and 3D Model Preparation tutorials to configure these exact parameters.
                </p>
                <a href="<?= base_url('slicing') ?>" class="inline-block w-full py-2.5 bg-cyan-500 hover:bg-cyan-400 text-brand-navy font-bold rounded-xl transition text-sm">
                    Open Slicing Guide
                </a>
            </div>
        </div>

    </div>
</div>
