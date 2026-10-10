<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-16 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-4 py-1.5 rounded-full bg-cyan-500/20 text-cyan-300 font-semibold text-xs tracking-wider uppercase inline-block mb-4 border border-cyan-500/30">
            Capstone Engineering Dossier
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">Final Project Technical Showcase</h1>
        <p class="text-slate-300 max-w-3xl mx-auto text-base sm:text-lg">
            Complete technical documentation of the design, mechanical fabrication, electronic control integration, calibration, and educational deployment of the FDM 3D printer module.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
    
    <!-- Executive Project Summary -->
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-slate-200">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-cyan-50 border border-cyan-200 text-cyan-800 rounded-full text-xs font-bold">
                    <i class="fas fa-certificate text-cyan-600"></i> Project Specification
                </div>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-brand-navy leading-tight">
                    DESIGN AND FABRICATION OF A FUSED DEPOSITION MODELING (FDM) 3D PRINTER MODULE FOR TECHNICAL TRAINING
                </h2>
                <div class="space-y-4 text-slate-700 leading-relaxed text-sm sm:text-base">
                    <p>
                        <strong>Problem Statement:</strong> Traditional technical training programs frequently face high acquisition costs and closed-architecture barriers with commercial industrial 3D printers, preventing trainees from interacting directly with motion kinematics, PID temperature tuning, and hardware integration.
                    </p>
                    <p>
                        <strong>Proposed Solution:</strong> Design and fabricate an open-architecture, robust, 220×220×250 mm build volume FDM 3D printer module equipped with 32-bit silent stepper control, direct-drive extrusion, and an interactive digital learning portal for complete hands-on pedagogy.
                    </p>
                </div>
            </div>

            <div class="bg-slate-900 rounded-2xl p-6 sm:p-8 text-white border border-slate-800 shadow-xl space-y-4">
                <h3 class="text-lg font-bold text-cyan-400 border-b border-white/10 pb-3 flex items-center gap-2">
                    <i class="fas fa-microchip"></i> Key Technical Specifications
                </h3>
                <div class="grid grid-cols-2 gap-4 text-xs sm:text-sm">
                    <div>
                        <span class="text-slate-400 block">Kinematics:</span>
                        <strong class="text-white">Cartesian XZ-Head / Y-Bed</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Build Envelope:</span>
                        <strong class="text-white">220 × 220 × 250 mm</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Max Hotend Temp:</span>
                        <strong class="text-white">260°C (All-Metal Ready)</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Max Bed Temp:</span>
                        <strong class="text-white">100°C (24V Heated Bed)</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Mainboard:</span>
                        <strong class="text-white">32-Bit ARM Cortex-M4</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Stepper Drivers:</span>
                        <strong class="text-white">TMC2209 Silent UART</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Extrusion:</span>
                        <strong class="text-white">Dual-Gear Direct Drive</strong>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Firmware:</span>
                        <strong class="text-white">Marlin 2.1.x / Klipper Capable</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Development Phases Matrix -->
    <div class="space-y-8">
        <h2 class="text-3xl font-extrabold text-brand-navy text-center">Engineering Implementation Phases</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Phase 1 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center font-bold">1</div>
                <h3 class="text-lg font-bold text-brand-navy">CAD Design & Structural Rigidity</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    2020 and 2040 V-slot aluminum extrusions engineered with gusset plates to resist torsional flex during high-acceleration toolhead travels.
                </p>
                <div class="text-xs text-cyan-600 font-semibold">Outcome: Zero frame resonance at 60 mm/s</div>
            </div>

            <!-- Phase 2 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold">2</div>
                <h3 class="text-lg font-bold text-brand-navy">Electronics & Harness Wiring</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Crimped JST connectors, braided cable sleeving, thermal runaway fail-safe routines, and dedicated MOSFET isolation for the 220W heated bed.
                </p>
                <div class="text-xs text-blue-600 font-semibold">Outcome: Certified electrical safety & clean routing</div>
            </div>

            <!-- Phase 3 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">3</div>
                <h3 class="text-lg font-bold text-brand-navy">Calibration & Print Validation</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    E-step calibration (415 steps/mm for dual-gear), PID autotuning at 210°C / 60°C, and 20mm XYZ test cubes achieving ±0.08mm dimensional accuracy.
                </p>
                <div class="text-xs text-emerald-600 font-semibold">Outcome: Institutional verification benchmark passed</div>
            </div>
        </div>
    </div>

    <!-- Future Improvements Roadmap (Section 56 Requirement) -->
    <div class="bg-slate-50 rounded-3xl p-8 sm:p-12 border border-slate-200 space-y-8">
        <div class="max-w-2xl mx-auto text-center space-y-2">
            <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-bold uppercase tracking-wider">
                Roadmap & Evolution
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-brand-navy">Identified Future Possibilities</h2>
            <p class="text-slate-600 text-sm">
                The following technical enhancements have been architected as future research possibilities for future development phases:
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-wifi"></i>
                </div>
                <h4 class="font-bold text-slate-800 text-sm mb-1">Remote Web Camera Monitoring</h4>
                <p class="text-xs text-slate-500 leading-relaxed">OctoPrint / Moonraker camera streaming with AI-driven spaghetti detection fail-safes.</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-compress-arrows-alt"></i>
                </div>
                <h4 class="font-bold text-slate-800 text-sm mb-1">Optical Filament Runout Sensor</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Smart optical sensor detecting filament tangle, runout, and clogged extrusion pauses.</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-fire"></i>
                </div>
                <h4 class="font-bold text-slate-800 text-sm mb-1">High-Temp Composite Nozzle</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Hardened steel or ruby 300°C nozzle upgrades for carbon fiber and abrasive nylon printing.</p>
            </div>

            <div class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center text-lg mb-3">
                    <i class="fas fa-award"></i>
                </div>
                <h4 class="font-bold text-slate-800 text-sm mb-1">Automated Trainee Certification</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Digital certificate generator upon completion of all 8 core training modules and quizzes.</p>
            </div>
        </div>
    </div>

</div>
