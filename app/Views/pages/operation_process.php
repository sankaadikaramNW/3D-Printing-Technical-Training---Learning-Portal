<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-900/60 text-emerald-400 text-xs font-bold uppercase tracking-wider border border-emerald-700/60 mb-3">
                Standard Operating Procedure (SOP)
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                19-Step Printer Operation SOP
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Standardized, repeatable operational procedure for technical trainees—from pre-flight machine inspection to post-print QA metrology.
            </p>
        </div>
    </div>
</section>

<!-- 19-Step SOP Guide -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="space-y-8">
            <?php
            $sopSteps = [
                ['step' => '01', 'title' => 'Inspect the Printer & Motion Axes', 'desc' => 'Visually check GT2 belts for proper tension, ensure V-slot rails are clear of debris, and confirm all axes move smoothly by hand when steppers are disabled.', 'safety' => 'Keep fingers clear of belt pulleys and lead screw pinch zones.', 'mistake' => 'Forcing axes to slide rapidly, generating back-EMF voltage that can damage stepper drivers.', 'tip' => 'Always disable steppers via LCD menu before manually pushing axes.'],
                ['step' => '02', 'title' => 'Check Workspace & Environmental Conditions', 'desc' => 'Verify workshop ambient temperature is between 20°C–28°C and clear the printer envelope of loose wires, tools, and flammable solvents.', 'safety' => 'Ensure a minimum 20cm clearance around all moving gantries.', 'mistake' => 'Positioning printer directly under high-velocity air conditioning vents causing warping.', 'tip' => 'Use a physical draft shield for PETG and ABS printing.'],
                ['step' => '03', 'title' => 'Inspect & Degrease the Build Plate', 'desc' => 'Wipe the magnetic textured PEI sheet with a lint-free microfiber cloth saturated with 99% Isopropyl Alcohol (IPA) to eliminate skin oils.', 'safety' => 'Never apply flammable alcohol to a hot build bed.', 'mistake' => 'Touching the bed surface with bare fingers after wiping.', 'tip' => 'Wash plate with warm water and dish soap if IPA alone ceases to provide adhesion.'],
                ['step' => '04', 'title' => 'Inspect Filament Condition & Dryness', 'desc' => 'Check filament spool for tangles, verify 1.75mm diameter consistency, and test for brittleness by gently bending a 5cm sample.', 'safety' => 'Ensure spool is secured on roller bearings to prevent binding.', 'mistake' => 'Printing with moisture-saturated filament causing popping, steam voids, and stringing.', 'tip' => 'Dry hygroscopic filaments (PETG/ABS/TPU) in a dehydrator before printing.'],
                ['step' => '05', 'title' => 'Prepare the 3D CAD Model', 'desc' => 'Validate model geometry for manifold watertight boundaries, check wall thickness multiples (≥0.8mm), and orient for tensile load paths.', 'safety' => 'Verify dimensions against mating component tolerances.', 'mistake' => 'Exporting coarse polygonal meshes causing faceted circular holes.', 'tip' => 'Export in 3MF format with high chordal tolerance.'],
                ['step' => '06', 'title' => 'Slice the Model in Slicing Software', 'desc' => 'Import 3MF file into Cura/PrusaSlicer. Configure layer height (0.2mm), perimeters (4 walls), and Gyroid infill (25%).', 'safety' => 'Ensure support overhang angle is set appropriately (50°).', 'mistake' => 'Using 100% rectilinear infill instead of adding outer walls for strength.', 'tip' => 'Use Gyroid infill to eliminate internal shear failure planes.'],
                ['step' => '07', 'title' => 'Generate & Preview G-Code Toolpaths', 'desc' => 'Perform virtual layer-by-layer visual toolpath simulation in the slicer to inspect internal retractions and support interfaces.', 'safety' => 'Verify volumetric flow rate does not exceed 11 mm³/s.', 'mistake' => 'Skipping G-code preview and printing disconnected unsupported islands.', 'tip' => 'Check travel moves for excessive air crosses.'],
                ['step' => '08', 'title' => 'Transfer G-Code File to Printer', 'desc' => 'Save G-code to a high-speed MicroSD card or send via OctoPrint USB serial stream.', 'safety' => 'Safely eject MicroSD from computer to avoid file corruption.', 'mistake' => 'Pulling SD card while writing, resulting in an incomplete print failure halfway.', 'tip' => 'Use short, descriptive alphanumeric filenames without special symbols.'],
                ['step' => '09', 'title' => 'Perform Bed Leveling & Z-Offset Calibration', 'desc' => 'Execute 4-corner manual paper leveling. Adjust thumb-screws until standard 80gsm paper feels moderate frictional drag under nozzle.', 'safety' => 'Keep fingers away from preheated nozzle.', 'mistake' => 'Leveling while bed and nozzle are cold (ignores thermal expansion).', 'tip' => 'Always level at operating temperatures (60°C Bed / 170°C Nozzle).'],
                ['step' => '10', 'title' => 'Load Filament into Extruder', 'desc' => 'Cut filament tip at a clean 45° angle, insert into extruder drive gears, and push into the hotend throat until molten bead emerges.', 'safety' => 'Use brass wire brush or tweezers to catch purged filament, never bare hands.', 'mistake' => 'Inserting blunt, flattened filament tip causing gear jamming.', 'tip' => 'Purge 50mm of old material to flush out residual color pigments.'],
                ['step' => '11', 'title' => 'Preheat Hotend & Heated Bed', 'desc' => 'Set target operational temperatures on control panel (e.g. 210°C Hotend / 60°C Bed for PLA). Allow 3 minutes for thermal stabilization.', 'safety' => 'Hotend reaches 260°C. Contact burns occur instantaneously.', 'mistake' => 'Starting print before heated bed aluminum core reaches full thermal equilibrium.', 'tip' => 'Watch PID temperature graph for zero overshoot oscillation.'],
                ['step' => '12', 'title' => 'Initiate Print Execution', 'desc' => 'Select G-code file from menu and confirm start. Machine executes auto-home (G28) and begins prime line wipe.', 'safety' => 'Ensure power cords are unhindered by moving Y-axis carriage.', 'mistake' => 'Leaving printer completely unattended during initial homing sequence.', 'tip' => 'Keep one hand near the emergency power switch during initial homing.'],
                ['step' => '13', 'title' => 'Observe the First Layer Deposition (Crucial)', 'desc' => 'Carefully observe first layer bead squish. Lines must fuse together seamlessly with 120% line width and zero gaps or scraping.', 'safety' => 'Keep eyes shielded from hot plastic splashes.', 'mistake' => 'Walking away before the first layer is 100% complete.', 'tip' => 'Use real-time Z-babystepping in 0.02mm increments to dial in perfect adhesion.'],
                ['step' => '14', 'title' => 'Monitor the Printing Progress', 'desc' => 'Check print periodically for layer shifts, warping corners, extruder motor skipping, or part cooling fan failures.', 'safety' => 'Never reach into the moving gantry envelope during active motion.', 'mistake' => 'Allowing spool to run out without filament runout sensor.', 'tip' => 'Listen for rhythmic clicking from extruder, which signals a partial clog.'],
                ['step' => '15', 'title' => 'Complete Printing Cycle', 'desc' => 'Firmware completes toolpath, disables heaters (M104 S0, M140 S0), parks gantry at rear, and sounds completion beep.', 'safety' => 'Heated bed and hotend remain dangerously hot for several minutes.', 'mistake' => 'Immediately grabbing the printed part off the hot bed.', 'tip' => 'Wait for firmware cool-down routine.'],
                ['step' => '16', 'title' => 'Allow Natural Thermal Cooling', 'desc' => 'Allow build plate to cool down naturally below 35°C. Differential thermal contraction will automatically pop part free.', 'safety' => 'Do not spray cold water on glass/aluminum beds to accelerate cooling.', 'mistake' => 'Forcibly prying hot parts off the bed, permanently warping the plastic geometry.', 'tip' => 'Patience prevents 90% of part deformation.'],
                ['step' => '17', 'title' => 'Remove Printed Object Safely', 'desc' => 'Gently flex the spring steel magnetic PEI sheet to release the part without tools.', 'safety' => 'Never use razor blades or metal scrapers on PEI textured sheets.', 'mistake' => 'Gouging the PEI powder-coated surface with sharp scrapers.', 'tip' => 'Part should lift off with zero mechanical resistance once cold.'],
                ['step' => '18', 'title' => 'Post-Process & De-Burring', 'desc' => 'Peel away brims and skirts. Carefully remove tree/organic support structures using needle-nose pliers and deburring tools.', 'safety' => 'Wear safety glasses when snipping brittle plastic support struts.', 'mistake' => 'Yanking supports aggressively, tearing away delicate model walls.', 'tip' => 'Use hobby scalpel along interface layers to detach support roofs cleanly.'],
                ['step' => '19', 'title' => 'Quality Assurance & Metrology Inspection', 'desc' => 'Measure critical dimensions with digital vernier calipers. Inspect visual surface quality for layer consistency, stringing, or voids.', 'safety' => 'Log dimensions and print parameters into laboratory training records.', 'mistake' => 'Omitting metrology check before assembling mechanical prototypes.', 'tip' => 'Compare actual physical dimensions against nominal CAD model values.'],
            ];

            foreach ($sopSteps as $s):
            ?>
            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center space-x-3">
                    <span class="px-3 py-1 rounded-xl bg-slate-900 text-cyan-400 font-mono font-bold text-xs">
                        Step <?= $s['step'] ?>
                    </span>
                    <h3 class="text-lg font-bold text-slate-900 font-heading"><?= $s['title'] ?></h3>
                </div>

                <p class="text-xs text-slate-700 leading-relaxed"><?= $s['desc'] ?></p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs pt-2">
                    <div class="p-3 rounded-xl bg-rose-50 border border-rose-100 text-slate-700">
                        <span class="font-bold text-rose-900 block mb-0.5"><i class="fas fa-shield-alt text-rose-500 mr-1"></i> Safety Rule:</span>
                        <p class="text-[11px] text-slate-600"><?= $s['safety'] ?></p>
                    </div>
                    <div class="p-3 rounded-xl bg-amber-50 border border-amber-100 text-slate-700">
                        <span class="font-bold text-amber-900 block mb-0.5"><i class="fas fa-exclamation-triangle text-amber-500 mr-1"></i> Common Pitfall:</span>
                        <p class="text-[11px] text-slate-600"><?= $s['mistake'] ?></p>
                    </div>
                    <div class="p-3 rounded-xl bg-emerald-50 border border-emerald-100 text-slate-700">
                        <span class="font-bold text-emerald-950 block mb-0.5"><i class="fas fa-lightbulb text-emerald-500 mr-1"></i> Pro Tip:</span>
                        <p class="text-[11px] text-slate-600"><?= $s['tip'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
