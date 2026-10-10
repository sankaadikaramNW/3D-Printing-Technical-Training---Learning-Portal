<?php
use App\Core\Helper;
?>

<!-- Page Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Project Documentation
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                About The Project
            </h1>
            <p class="text-xs sm:text-sm font-mono text-cyan-400 mt-2">
                DESIGN AND FABRICATION OF A FUSED DEPOSITION MODELING (FDM) 3D PRINTER MODULE FOR TECHNICAL TRAINING
            </p>
        </div>
    </div>
</section>

<!-- Main Project Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Narrative Column -->
            <div class="lg:col-span-8 space-y-12">
                
                <!-- 1. Background -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <i class="fas fa-history text-blue-600 mr-3"></i>
                        <span>1. Project Background</span>
                    </h2>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>
                            Additive manufacturing has evolved from a niche rapid prototyping technology into a mainstream digital production pillar across aerospace, defense, automotive, and consumer manufacturing. However, traditional technical training programs frequently treat 3D printers as consumer appliances or closed-box systems. Trainees are often trained only to push buttons rather than understanding the underlying mechanical kinematics, thermodynamic melt boundaries, electrical driver control, and material science.
                        </p>
                        <p>
                            To address this educational deficit, this project was undertaken to conceive, engineer, assemble, program, calibrate, and validate a dedicated open-architecture <strong>Fused Deposition Modeling (FDM) 3D Printer Module</strong> paired with a complete digital technical-learning ecosystem.
                        </p>
                    </div>
                </div>

                <!-- 2. Aim -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <i class="fas fa-bullseye text-cyan-600 mr-3"></i>
                        <span>2. Project Aim</span>
                    </h2>
                    <div class="p-6 rounded-3xl bg-blue-50/60 border border-blue-200 text-slate-800 text-sm leading-relaxed">
                        <p class="font-semibold text-blue-950">
                            The primary aim is to design and fabricate a robust, serviceable, open-architecture FDM 3D printer module optimized specifically for technical training, and to deploy an accompanying interactive digital curriculum that connects theoretical engineering concepts with hands-on additive manufacturing experience.
                        </p>
                    </div>
                </div>

                <!-- 3. Objectives -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <i class="fas fa-tasks text-indigo-600 mr-3"></i>
                        <span>3. Project Objectives</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs text-slate-700">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-3">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Introduce FDM Technology</h4>
                                <p class="text-slate-500">Impart fundamental principles of thermoplastic extrusion, melt flow, and layer bonding.</p>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-3">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Develop Technical Competencies</h4>
                                <p class="text-slate-500">Provide practical training in mechanical alignment, belt tensioning, and stepper VREF tuning.</p>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-3">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Standardize SOP Operation</h4>
                                <p class="text-slate-500">Establish a rigorous 19-step standard operating procedure for repeatable print quality.</p>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-3">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Support CAD & Slicing</h4>
                                <p class="text-slate-500">Train students in parametric modeling for additive layers and G-code toolpath optimization.</p>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-3">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Cultivate Troubleshooting</h4>
                                <p class="text-slate-500">Equip trainees to systematically diagnose warping, stringing, under-extrusion, and jams.</p>
                            </div>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-3">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Foster Technical Innovation</h4>
                                <p class="text-slate-500">Enable trainees to rapidly design, print, and test functional prototypes and custom tooling.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. Project Scope -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <i class="fas fa-compass text-emerald-600 mr-3"></i>
                        <span>4. Project Scope & Architecture</span>
                    </h2>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            The scope covers the full development lifecycle: 3D CAD modeling of all brackets and chassis extrusions; procurement of precision mechanical and electrical subsystems; physical assembly and orthogonal tramming; 32-bit ARM firmware compilation (Marlin 2.1.x) with active thermal runaway protection; multi-material benchmarking (PLA, PETG, ABS, TPU); and the creation of this comprehensive database-driven technical training web application.
                        </p>
                    </div>
                </div>

                <!-- 5. Educational Significance -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <i class="fas fa-graduation-cap text-purple-600 mr-3"></i>
                        <span>5. Educational Significance</span>
                    </h2>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            Operating and maintaining this FDM module allows trainees to experience how mechanical kinematics, thermal closed-loop PID control, microstepping PWM electricity, and software toolpaths converge in modern computer-integrated manufacturing.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Column: Full Technical Specifications Matrix -->
            <div class="lg:col-span-4">
                <div class="sticky top-28 space-y-6">
                    
                    <div class="rounded-3xl bg-slate-950 text-white p-6 border border-slate-800 shadow-xl">
                        <div class="flex items-center space-x-2 pb-4 border-b border-slate-800">
                            <i class="fas fa-microchip text-cyan-400"></i>
                            <h3 class="font-bold text-base font-heading">Hardware Specifications</h3>
                        </div>

                        <div class="mt-4 space-y-6">
                            <?php foreach ($groupedSpecs as $category => $specs): ?>
                            <div>
                                <div class="text-[11px] font-bold uppercase tracking-wider text-cyan-400 mb-2 font-mono"><?= htmlspecialchars($category) ?></div>
                                <div class="space-y-2">
                                    <?php foreach ($specs as $s): ?>
                                    <div class="text-xs p-2 rounded-lg bg-slate-900 border border-slate-800/80 flex justify-between items-center">
                                        <span class="text-slate-400"><?= htmlspecialchars($s['spec_name']) ?>:</span>
                                        <span class="font-bold text-slate-200 font-mono text-right ml-2"><?= htmlspecialchars($s['spec_value']) ?> <?= htmlspecialchars($s['unit'] ?? '') ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-800">
                            <a href="<?= Helper::url('project-development') ?>" class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold flex items-center justify-center space-x-2 transition-all">
                                <i class="fas fa-project-diagram"></i>
                                <span>View 13-Stage Fabrication Journey</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
