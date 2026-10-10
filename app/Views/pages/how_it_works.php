<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Process Pipeline
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                How The FDM Printer Works
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                A complete stage-by-stage walkthrough from conceptual CAD geometry, tessellated mesh slicing, G-code execution, to physical thermoplastic layer synthesis.
            </p>
        </div>
    </div>
</section>

<!-- Interactive Pipeline -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="space-y-12">
            
            <?php
            $stages = [
                ['num' => '01', 'title' => 'Parametric 3D CAD Modeling', 'tag' => 'Digital Design Phase', 'icon' => 'fa-drafting-compass', 'desc' => 'Engineers design 3D solid models using boundary representation (B-Rep) CAD tools (SolidWorks, Fusion 360, FreeCAD). Design considerations include wall thickness, fillet radii on internal corners, and draft orientations for additive layers.'],
                ['num' => '02', 'title' => 'Tessellated Mesh Export (STL / 3MF)', 'tag' => 'Geometric Translation', 'icon' => 'fa-draw-polygon', 'desc' => 'The CAD model is converted into a standard triangulated surface mesh (STL or modern 3MF format). Mesh resolution must be optimized: excessive polygon count bloats file size, while coarse chordal deviation creates visible facets on circular bosses and bores.'],
                ['num' => '03', 'title' => 'Slicing & Toolpath Generation', 'tag' => 'Software Compilation', 'icon' => 'fa-layer-group', 'desc' => 'The slicer software (UltiMaker Cura, PrusaSlicer) cuts the 3D polygon model into horizontal slices (e.g. 0.2mm height). It calculates outer perimeter toolpaths, infill density/pattern (e.g. Gyroid), and required support overhang trees.'],
                ['num' => '04', 'title' => 'Numerical Control G-Code Creation', 'tag' => 'Machine Code', 'icon' => 'fa-code', 'desc' => 'The slicer compiles toolpaths into G-code machine instructions: G0/G1 Cartesian movements ($X, Y, Z, E$), feed rates ($F$), hotend temperatures ($M104/M109$), heated bed temperatures ($M140/M190$), and part cooling fan speeds ($M106$).'],
                ['num' => '05', 'title' => 'Machine Pre-Flight & Thermal Equilibrium', 'tag' => 'Hardware Preparation', 'icon' => 'fa-thermometer-three-quarters', 'desc' => 'The 32-bit controller energizes the heated bed and hotend. Closed-loop PID algorithms prevent thermal overshoot. The Cartesian axes perform auto-homing ($G28$) against microswitch or optical endstops to establish coordinate origin $(0,0,0)$.'],
                ['num' => '06', 'title' => 'Filament Metering & Volumetric Extrusion', 'tag' => 'Electromechanical Drive', 'icon' => 'fa-cogs', 'desc' => 'The stepper motor drives hobbed gears to push 1.75mm solid filament into the melt chamber. Inside the heater block, the polymer melts into a non-Newtonian fluid and is forced through the 0.4mm nozzle orifice.'],
                ['num' => '07', 'title' => 'Layer Deposition & Polymer Interdiffusion', 'tag' => 'Thermal Bonding', 'icon' => 'fa-burn', 'desc' => 'The toolhead deposits the molten track onto the heated build surface. Thermal energy partially remelts the surface beneath it, allowing polymer chains to diffuse across the inter-layer interface and form a structural bond.'],
                ['num' => '08', 'title' => 'Forced Convection Cooling & Solidification', 'tag' => 'Phase Solidification', 'icon' => 'fa-fan', 'desc' => 'The dedicated part cooling blower directs focused laminar airflow onto the newly deposited track, dropping temperature below glass transition ($T_g$) and locking geometry in place before gravitational deformation occurs.'],
                ['num' => '09', 'title' => 'Cool Down & Part Removal', 'tag' => 'Post-Processing', 'icon' => 'fa-check-double', 'desc' => 'Upon print completion ($M107$, $M104 S0$, $M140 S0$), the heated bed cools below 35°C. Differential thermal contraction releases the part from the textured PEI sheet without requiring scraper blades.'],
            ];
            foreach ($stages as $s):
            ?>
            <div class="relative flex items-start space-x-6 group">
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white font-black font-heading flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition-transform">
                        <?= $s['num'] ?>
                    </div>
                    <div class="w-0.5 h-full bg-slate-200 mt-4"></div>
                </div>

                <div class="flex-1 pb-8">
                    <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 group-hover:border-blue-300 transition-colors">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600 font-mono"><?= $s['tag'] ?></span>
                        <h3 class="text-lg font-bold text-slate-900 font-heading mt-1 mb-2 flex items-center">
                            <i class="fas <?= $s['icon'] ?> text-cyan-600 mr-2"></i>
                            <?= $s['title'] ?>
                        </h3>
                        <p class="text-xs text-slate-600 leading-relaxed"><?= $s['desc'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <div class="mt-12 text-center">
            <a href="<?= Helper::url('operation-process') ?>" class="inline-flex items-center space-x-2 px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-lg transition-all">
                <span>See Step-by-Step Operator SOP (19 Steps)</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>
