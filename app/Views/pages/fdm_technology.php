<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-cyan-700/60 mb-3">
                Core Module 02
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                FDM Technology & Mechanics
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                The physics of thermoplastic extrusion, melt-zone thermal dynamics, volumetric metering, and inter-layer polymer fusion.
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
                        What is Fused Deposition Modeling (FDM)?
                    </h2>
                    <p class="mb-4">
                        <strong>Fused Deposition Modeling (FDM)</strong>—also designated as <em>Fused Filament Fabrication (FFF)</em>—is an extrusion-based additive manufacturing process. Continuous solid thermoplastic filament (typically 1.75mm nominal diameter) is driven by an electromechanical extruder into a temperature-controlled melt chamber, liquefied into a viscous state, and forced through a micro-aperture nozzle onto a heated build platform along pre-calculated Cartesian toolpaths.
                    </p>
                </div>

                <!-- 8-Stage Visual Extrusion Flow -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-6 flex items-center">
                        <i class="fas fa-project-diagram text-blue-600 mr-2"></i>
                        <span>The 8-Stage Thermal Extrusion Cycle</span>
                    </h3>

                    <div class="space-y-4">
                        <?php
                        $cycle = [
                            ['step' => '01', 'title' => 'Filament Spool Feed', 'desc' => 'Solid 1.75mm polymer is drawn from a low-friction spool holder into the drive gear.', 'icon' => 'fa-compact-disc', 'color' => 'text-blue-500'],
                            ['step' => '02', 'title' => 'Extruder Drive Traction', 'desc' => 'Dual hardened steel hobbed gears grip and apply controlled axial thrust (piston effect).', 'icon' => 'fa-cogs', 'color' => 'text-cyan-500'],
                            ['step' => '03', 'title' => 'Cold Zone Isolation', 'desc' => 'Fan-cooled aluminum heat sink keeps filament rigid, preventing premature softening (heat creep).', 'icon' => 'fa-snowflake', 'color' => 'text-indigo-500'],
                            ['step' => '04', 'title' => 'Thermal Heat Break', 'desc' => 'Ultra-thin throat maintains a steep 180°C thermal gradient across a 2mm transition zone.', 'icon' => 'fa-thermometer-half', 'color' => 'text-amber-500'],
                            ['step' => '05', 'title' => 'Melt Zone Phase Change', 'desc' => 'High-power cartridge heater raises polymer above melting temperature ($T_m$) into a non-Newtonian fluid.', 'icon' => 'fa-fire-alt', 'color' => 'text-rose-500'],
                            ['step' => '06', 'title' => 'Nozzle Orifice Extrusion', 'desc' => 'Molten plastic is compressed through a calibrated 0.4mm orifice into an accurate continuous bead.', 'icon' => 'fa-tint', 'color' => 'text-purple-500'],
                            ['step' => '07', 'title' => 'Substrate Layer Deposition', 'desc' => 'Cartesian toolhead places the molten track at exact X, Y coordinates against the heated bed.', 'icon' => 'fa-layer-group', 'color' => 'text-emerald-500'],
                            ['step' => '08', 'title' => 'Polymer Chain Diffusion & Cooling', 'desc' => 'Thermal energy partially remelts previous layer; polymer chains intertwine before fan solidifies part.', 'icon' => 'fa-fan', 'color' => 'text-teal-500'],
                        ];
                        foreach ($cycle as $c):
                        ?>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-start space-x-4">
                            <span class="text-xs font-black font-mono px-2.5 py-1 rounded bg-slate-900 text-cyan-400 shrink-0">
                                <?= $c['step'] ?>
                            </span>
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-900 text-sm flex items-center">
                                    <i class="fas <?= $c['icon'] ?> <?= $c['color'] ?> mr-2"></i>
                                    <?= $c['title'] ?>
                                </h4>
                                <p class="text-xs text-slate-600 mt-1 leading-relaxed"><?= $c['desc'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Thermodynamics Deep Dive -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-4">
                        Polymer Thermodynamics & Glass Transition ($T_g$)
                    </h3>
                    <div class="p-6 rounded-3xl bg-slate-900 text-white space-y-4">
                        <p class="text-xs leading-relaxed text-slate-300">
                            Understanding thermal transition states is critical for additive manufacturing engineers:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                            <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800">
                                <div class="font-bold text-cyan-400 mb-1">Glass Transition ($T_g$)</div>
                                <p class="text-slate-400">The temperature boundary where an amorphous polymer transitions from a hard, brittle state to a rubbery, pliable state (PLA $\approx 55^\circ\text{C}$, ABS $\approx 105^\circ\text{C}$).</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800">
                                <div class="font-bold text-rose-400 mb-1">Melting Temperature ($T_m$)</div>
                                <p class="text-slate-400">The point where crystalline structures collapse and the polymer becomes a freely flowing liquid suitable for nozzle extrusion (PLA $\approx 180^\circ\text{C}$, ABS $\approx 230^\circ\text{C}$).</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Navigation -->
            <div class="lg:col-span-4 space-y-6">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-slate-900 font-heading text-sm mb-4">Related Engineering Topics</h4>
                    <div class="space-y-2 text-xs">
                        <a href="<?= Helper::url('printer-components') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 hover:border-blue-400 font-medium transition-colors">
                            <div class="font-bold text-slate-800">Printer Anatomy & Components →</div>
                            <div class="text-slate-400 text-[11px] mt-0.5">Explore hotends, steppers, and controllers</div>
                        </a>
                        <a href="<?= Helper::url('slicing') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 hover:border-blue-400 font-medium transition-colors">
                            <div class="font-bold text-slate-800">Slicing & Toolpaths →</div>
                            <div class="text-slate-400 text-[11px] mt-0.5">G-code parameters and infill geometry</div>
                        </a>
                        <a href="<?= Helper::url('materials') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 hover:border-blue-400 font-medium transition-colors">
                            <div class="font-bold text-slate-800">Material Science Guide →</div>
                            <div class="text-slate-400 text-[11px] mt-0.5">PLA vs PETG vs ABS vs TPU</div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
