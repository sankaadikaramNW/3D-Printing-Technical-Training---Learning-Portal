<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Software & Toolpath Generation
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                3D Slicing Masterclass
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Translating 3D geometry into numerical G-code: layer resolutions, perimeter wall mathematics, structural infill patterns, and thermal print settings.
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-8 space-y-12 text-slate-700 text-sm leading-relaxed">
                
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200">
                        What is a 3D Slicer?
                    </h2>
                    <p class="mb-4">
                        A 3D slicer is a specialized CAM (Computer-Aided Manufacturing) software compiler that slices a 3D surface mesh into hundreds of discrete horizontal 2D planes. It computes optimal raster toolpaths for the perimeter shells and internal infill, inserting motor travel feeds, extruder pulse steps, and temperature commands to generate the final <strong>G-code file</strong>.
                    </p>
                </div>

                <!-- Critical Slicing Parameters -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-6">
                        Essential Slicing Parameters Explained
                    </h3>

                    <div class="space-y-6">
                        
                        <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-slate-900 text-base font-heading">1. Layer Height ($Z$-Resolution)</h4>
                                <span class="px-2.5 py-1 rounded bg-blue-100 text-blue-800 text-xs font-mono font-bold">0.08mm - 0.28mm</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Defines the vertical thickness of each slice. Standard rule: <strong>Layer height must never exceed 75% of nozzle diameter</strong> ($0.30\text{ mm}$ max for a $0.4\text{ mm}$ nozzle). For general technical prototypes, $0.20\text{ mm}$ provides the optimal balance of speed and structural strength.
                            </p>
                        </div>

                        <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-slate-900 text-base font-heading">2. Perimeter Walls / Shells</h4>
                                <span class="px-2.5 py-1 rounded bg-emerald-100 text-emerald-800 text-xs font-mono font-bold">3 - 6 Shells</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                <strong>Engineering Rule:</strong> Wall perimeters dictate over 75% of overall tensile and bending strength. For load-bearing brackets, increasing wall count to 4-5 perimeters ($1.6\text{ mm}-2.0\text{ mm}$ thickness) is far more effective than increasing internal infill density.
                            </p>
                        </div>

                        <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-slate-900 text-base font-heading">3. Structural Infill Patterns</h4>
                                <span class="px-2.5 py-1 rounded bg-indigo-100 text-indigo-800 text-xs font-mono font-bold">15% - 40% Density</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2 text-xs">
                                <div class="p-3 bg-white rounded-xl border border-slate-200">
                                    <span class="font-bold text-slate-900 block mb-1">Gyroid (Top Choice)</span>
                                    <p class="text-slate-500 text-[11px]">Isotropic 3D strength in all directions; no planar weak axes.</p>
                                </div>
                                <div class="p-3 bg-white rounded-xl border border-slate-200">
                                    <span class="font-bold text-slate-900 block mb-1">Honeycomb</span>
                                    <p class="text-slate-500 text-[11px]">Maximum vertical compression resistance; slightly longer print time.</p>
                                </div>
                                <div class="p-3 bg-white rounded-xl border border-slate-200">
                                    <span class="font-bold text-slate-900 block mb-1">Grid / Rectilinear</span>
                                    <p class="text-slate-500 text-[11px]">Fastest print speed; optimal for non-structural visual parts.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-slate-900 text-base font-heading">4. Retraction Settings</h4>
                                <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 text-xs font-mono font-bold">0.8mm - 6.0mm</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Briefly pulls filament backward during non-print travel moves to relieve nozzle melt-zone pressure and prevent stringing:
                            </p>
                            <div class="grid grid-cols-2 gap-3 mt-2 text-xs font-mono">
                                <div class="p-2.5 bg-white rounded-xl border border-slate-200">Direct Drive: 0.8mm–1.5mm @ 45mm/s</div>
                                <div class="p-2.5 bg-white rounded-xl border border-slate-200">Bowden: 4.5mm–6.5mm @ 50mm/s</div>
                            </div>
                        </div>

                        <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-bold text-slate-900 text-base font-heading">5. Bed Adhesion Aids (Skirt, Brim, Raft)</h4>
                                <span class="px-2.5 py-1 rounded bg-purple-100 text-purple-800 text-xs font-mono font-bold">Brim / Raft</span>
                            </div>
                            <div class="space-y-1.5 text-xs text-slate-600">
                                <p><strong>Skirt:</strong> An outline around the part to prime the nozzle and verify Z-offset.</p>
                                <p><strong>Brim:</strong> Single-layer flange attached directly to the base to multiply surface area and prevent corner warping.</p>
                                <p><strong>Raft:</strong> A multi-layer sacrificial foundation printed beneath the model for extreme warping materials (ABS).</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- G-code Cheat Sheet -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-4">
                        Fundamental G-Code Command Quick-Reference
                    </h3>
                    <div class="p-6 rounded-3xl bg-slate-950 text-slate-300 font-mono text-xs space-y-3">
                        <div class="flex justify-between border-b border-slate-800 pb-2">
                            <span class="text-cyan-400 font-bold">G28</span>
                            <span>Auto-Home all axes to hardware endstop origin (0, 0, 0)</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-800 pb-2">
                            <span class="text-cyan-400 font-bold">G1 X100 Y100 Z0.2 E5 F1800</span>
                            <span>Linear motion with extrusion feed (X100 Y100 Z0.2, 5mm extrude @ 30mm/s)</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-800 pb-2">
                            <span class="text-cyan-400 font-bold">M104 S210 / M109 S210</span>
                            <span>Set Hotend Temp (M104 async / M109 wait until reached 210°C)</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-800 pb-2">
                            <span class="text-cyan-400 font-bold">M140 S60 / M190 S60</span>
                            <span>Set Heated Bed Temp (M140 async / M190 wait until reached 60°C)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-cyan-400 font-bold">M106 S255 / M107</span>
                            <span>Part Cooling Fan (M106 S255 = 100% full speed / M107 = fan off)</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Navigation -->
            <div class="lg:col-span-4 space-y-6">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-slate-900 font-heading text-sm mb-4">Next in Curriculum</h4>
                    <div class="space-y-2 text-xs">
                        <a href="<?= Helper::url('materials') ?>" class="block p-3 rounded-xl bg-blue-600 text-white font-bold text-center hover:bg-blue-700 transition-colors shadow-md">
                            Printing Materials Guide →
                        </a>
                        <a href="<?= Helper::url('operation-process') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 font-medium text-slate-700 hover:border-blue-400 transition-colors">
                            19-Step Machine Operation SOP
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
