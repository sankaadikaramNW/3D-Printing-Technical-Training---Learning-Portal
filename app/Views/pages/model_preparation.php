<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Design for Additive Manufacturing (DfAM)
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                3D Model Preparation & CAD Rules
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Engineering guidelines for CAD modeling, mesh manifold geometry, orientation for directional strength, and support minimization.
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-8 space-y-10 text-slate-700 text-sm leading-relaxed">
                
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200">
                        Design for Additive Manufacturing (DfAM) Rules
                    </h2>
                    <p class="mb-4">
                        Designing parts for 3D printing requires an engineering mindset distinct from CNC machining or injection molding. You must accommodate gravity, anisotropic layer bonding, and minimum feature resolution.
                    </p>
                </div>

                <!-- 4 Pillars of DfAM -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-lg mb-3">
                            <i class="fas fa-ruler-combined"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base font-heading mb-1">1. Wall Thickness Multiples</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Always design wall thicknesses in exact integer multiples of your nozzle diameter ($0.4\text{ mm}$ default). Design walls at $0.8\text{ mm}$ (2 perimeters), $1.2\text{ mm}$ (3 perimeters), or $1.6\text{ mm}$ (4 perimeters) to prevent internal hollow gaps.
                        </p>
                    </div>

                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-lg mb-3">
                            <i class="fas fa-angle-right"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base font-heading mb-1">2. The 45-Degree Overhang Rule</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Features angled beyond 45° from the vertical axis lack sufficient underlying substrate support and will sag or droop. Chamfer overhangs at 45° or utilize teardrop hole profiles for horizontal bores to eliminate the need for supports.
                        </p>
                    </div>

                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-lg mb-3">
                            <i class="fas fa-arrows-alt"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base font-heading mb-1">3. Mating Tolerances & Clearances</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            For sliding fits, leave a nominal radial clearance of $0.20\text{ mm} - 0.30\text{ mm}$. For press fits, design with $0.05\text{ mm} - 0.10\text{ mm}$ interference. Account for polymer thermal shrinkage (~0.3% in PLA, ~0.8% in ABS).
                        </p>
                    </div>

                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg mb-3">
                            <i class="fas fa-compress-arrows-alt"></i>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base font-heading mb-1">4. Orientation for Anisotropic Strength</h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            FDM prints are anisotropic: tensile strength parallel to layer lines ($X/Y$ plane) is 3x to 5x higher than interlayer adhesion strength along the $Z$ axis. Orient load-bearing mechanical arms horizontally on the build plate.
                        </p>
                    </div>
                </div>

                <!-- STL vs 3MF Comparison -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-4">
                        File Formats: STL vs 3MF Mesh Standards
                    </h3>
                    <div class="p-6 rounded-3xl bg-slate-900 text-white space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800">
                                <div class="font-bold text-amber-400 mb-1">Legacy STL Format</div>
                                <p class="text-slate-400 leading-relaxed">
                                    Contains only raw triangular coordinates. Cannot store units, color, multi-material data, or slicer parameters. Prone to non-manifold vertex errors.
                                </p>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800">
                                <div class="font-bold text-cyan-400 mb-1">Modern 3MF Format (Recommended)</div>
                                <p class="text-slate-400 leading-relaxed">
                                    XML-based container format supporting units, colors, materials, custom support block paint, and complete slicer profiles. Produces 70% smaller file sizes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Navigation -->
            <div class="lg:col-span-4 space-y-6">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-slate-900 font-heading text-sm mb-4">Next Step in Workflow</h4>
                    <div class="space-y-2 text-xs">
                        <a href="<?= Helper::url('slicing') ?>" class="block p-3 rounded-xl bg-blue-600 text-white font-bold text-center hover:bg-blue-700 transition-colors shadow-md">
                            Continue to Slicing Masterclass →
                        </a>
                        <a href="<?= Helper::url('materials') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 font-medium text-slate-700 hover:border-blue-400 transition-colors">
                            Material Science & Thermoplastics
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
