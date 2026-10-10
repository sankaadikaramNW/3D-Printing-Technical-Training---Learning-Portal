<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Practical Engineering Scope
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Engineering Applications of FDM 3D Printing
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Discover how the FDM 3D printer module supports rapid prototyping, custom workshop tooling, avionics enclosures, and instructional training aids.
            </p>
        </div>
    </div>
</section>

<!-- Content Grid -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4 interactive-card">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">1. Rapid Engineering Prototyping</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Verify CAD design fit, mating assembly clearances, and ergonomic human-factor grips in physical polymer within hours instead of waiting weeks for external machining.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4 interactive-card">
                <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-xl">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">2. Custom Jigs, Fixtures & Tooling</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Fabricate custom drill guides, assembly holding nests, wire harness routing jigs, and coordinate alignment blocks tailored to specific workshop repair tasks.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4 interactive-card">
                <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">3. Custom Avionics & Sensor Enclosures</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Print dust-resistant, vibration-damped IP54 enclosures with integrated PCB standoffs, cable glands, and snap-fit lids for workshop sensor telemetry.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4 interactive-card">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">4. Instructional Mechanical Aids</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Create functional cutaway kinematic models—such as planetary gearboxes, differential drives, and turbine cross-sections—for classroom mechanical demonstration.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4 interactive-card">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                    <i class="fas fa-flask"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">5. Laboratory Test Fixtures</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Produce bespoke test tube racks, optical sensor mounts, chemical-resistant PETG fluid couplings, and customized test sample holding clamps.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4 interactive-card">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">6. Applied STEM Innovation</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Empower student engineering teams to invent novel robotic grippers, drone airframe brackets, and mechatronic prototypes with zero barrier to fabrication.
                </p>
            </div>

        </div>

        <div class="text-center pt-8">
            <a href="<?= Helper::url('projects') ?>" class="inline-flex items-center space-x-2 px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md transition-all">
                <span>Explore Fabricated Project Case Studies</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>
