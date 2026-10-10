<?php
use App\Core\Helper;
?>

<!-- Breadcrumbs & Header -->
<div class="bg-white border-b border-slate-200 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-1">
                    <a href="<?= Helper::url() ?>" class="hover:text-blue-600 transition">Portal Home</a>
                    <i class="fas fa-chevron-right text-[9px] text-slate-400"></i>
                    <span class="text-blue-600 font-bold">Interactive Tools</span>
                    <i class="fas fa-chevron-right text-[9px] text-slate-400"></i>
                    <span class="text-slate-800">Hardware Subsystem Anatomy</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Interactive Hardware Anatomy & Maintenance Viewer</h1>
                <p class="text-slate-600 text-sm mt-1 max-w-3xl">
                    Engineering component inspection for Hotend, Direct Extruder, Heated Bed, Linear Guides, 32-bit Controller, and SLA Resin Vat with airbase maintenance checklists.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1.5 rounded-xl bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                    <i class="fas fa-shield-alt mr-1"></i> SLAF Technical Standard
                </span>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="hardwareViewer()">
    
    <!-- Subsystem Selector Bar -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 mb-8">
        <template x-for="(sub, key) in subsystems" :key="key">
            <button @click="activeKey = key" 
                    :class="activeKey === key ? 'border-blue-600 bg-blue-50 text-blue-700 font-bold shadow-sm' : 'border-slate-200 bg-white text-slate-700 hover:bg-slate-50 font-medium'"
                    class="p-4 rounded-2xl border text-center transition flex flex-col items-center justify-center gap-2 cursor-pointer">
                <div :class="activeKey === key ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-600'" 
                     class="w-10 h-10 rounded-xl flex items-center justify-center text-lg transition">
                    <i class="fas" :class="sub.icon"></i>
                </div>
                <span class="text-xs" x-text="sub.name"></span>
            </button>
        </template>
    </div>

    <!-- Active Subsystem Deep-Dive Container -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left Column: Component Specs & 3D Interactive Diagram (6 cols) -->
        <div class="lg:col-span-6 space-y-6">
            
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7 space-y-5">
                <div class="flex items-center justify-between">
                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold border border-blue-100 uppercase" x-text="activeSubsystem.category"></span>
                    <span class="text-xs font-mono font-bold text-slate-500" x-text="'TECH: ' + activeSubsystem.tech"></span>
                </div>

                <h2 class="text-xl sm:text-2xl font-black text-slate-900" x-text="activeSubsystem.fullName"></h2>
                
                <p class="text-slate-600 text-sm leading-relaxed" x-text="activeSubsystem.description"></p>

                <!-- Defense SLAF Role Callout -->
                <div class="bg-blue-50/70 border border-blue-200 rounded-xl p-4 text-xs space-y-1">
                    <div class="font-bold text-blue-900 flex items-center gap-1.5">
                        <i class="fas fa-plane-circle-check text-blue-600"></i> Sri Lanka Air Force Operational Role:
                    </div>
                    <p class="text-slate-700 leading-relaxed" x-text="activeSubsystem.slafRole"></p>
                </div>

                <!-- Technical Specification Grid -->
                <div class="space-y-2 pt-2">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-800">Technical Specifications</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                        <template x-for="(val, label) in activeSubsystem.specs" :key="label">
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                                <span class="text-slate-500 block text-[11px]" x-text="label"></span>
                                <span class="font-bold text-slate-900 font-mono" x-text="val"></span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Tropical Airbase Maintenance SOP Checklist (6 cols) -->
        <div class="lg:col-span-6 space-y-6">
            
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7 space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <i class="fas fa-screwdriver-wrench text-blue-600"></i> Maintenance & Inspection SOP
                    </h3>
                    <span class="text-xs text-slate-500 font-mono">Airbase Protocol</span>
                </div>

                <p class="text-xs text-slate-500">
                    Preventative inspection and calibration tasks required by SLAF technical orders for tropical high-humidity environments.
                </p>

                <!-- Interactive Checklist Items -->
                <div class="space-y-3">
                    <template x-for="(item, idx) in activeSubsystem.maintenance" :key="idx">
                        <label class="flex items-start gap-3 p-3.5 rounded-xl border border-slate-200 bg-slate-50 hover:bg-white hover:border-blue-400 transition cursor-pointer">
                            <input type="checkbox" class="mt-0.5 rounded text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                            <span class="text-xs font-medium text-slate-800 leading-relaxed" x-text="item"></span>
                        </label>
                    </template>
                </div>

                <!-- Printable SOP Trigger -->
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="text-[11px] text-slate-500">
                        <i class="fas fa-check-double text-emerald-600 mr-1"></i> Certified for Base Workshops
                    </div>
                    <button @click="window.print()" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 cursor-pointer">
                        <i class="fas fa-print"></i>
                        <span>Print Maintenance Card</span>
                    </button>
                </div>
            </div>

            <!-- Failure Modes & Quick Diagnostic -->
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                    <i class="fas fa-triangle-exclamation text-amber-600"></i> Common Tropical Airbase Failure Modes
                </h4>
                <div class="space-y-2 text-xs text-slate-700">
                    <div class="p-3 bg-white rounded-xl border border-slate-200" x-text="activeSubsystem.failureModes"></div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function hardwareViewer() {
    return {
        activeKey: 'hotend',
        
        subsystems: {
            'hotend': {
                name: 'Hotend Assembly',
                icon: 'fa-fire-flame-curved',
                fullName: 'All-Metal Titanium Bi-Metal Hotend (300°C+)',
                category: 'Thermal & Extrusion',
                tech: 'FDM / FFF',
                description: 'High-temperature thermal barrier utilizing titanium heatbreak and hardened tool-steel nozzle. Eliminates PTFE tube degradation inside the melt zone for printing engineering polymers.',
                slafRole: 'Enables printing carbon-fiber nylon (PA-CF) and flame-retardant polycarbonate (PC) for aircraft maintenance brackets and borescope guides.',
                specs: {
                    'Max Temperature': '300°C Continuous / 350°C Peak',
                    'Nozzle Size': '0.4mm & 0.6mm Hardened Steel',
                    'Heater Cartridge': '24V 50W Ceramic High-Output',
                    'Thermistor': 'PT1000 Precision RTD Sensor'
                },
                maintenance: [
                    'Perform cold-pull cleaning procedure every 50 hours of carbon-fiber printing.',
                    'Inspect ceramic heater wiring for insulation fatigue caused by tropical humidity.',
                    'Torque nozzle to 2.5 N·m strictly at 285°C to avoid molten plastic leakage.',
                    'Apply boron-nitride thermal paste on heatbreak cartridge threads.'
                ],
                failureModes: 'Heat creep clogging due to high ambient hangar temperatures or fan degradation; molten polymer leakage from cold-tightened nozzle threads.'
            },
            'extruder': {
                name: 'Direct Extruder',
                icon: 'fa-gear',
                fullName: 'Dual-Drive Geared Direct Extruder & Runout Sensor',
                category: 'Extrusion Motion',
                tech: 'FDM / FFF',
                description: '3:1 gear-reduction direct drive system delivering high torque extrusion with dual nickel-plated hardened steel teeth for zero slippage.',
                slafRole: 'Guarantees reliable extrusion of flexible TPU vibration dampers and abrasive composite filaments without jamming during multi-hour prints.',
                specs: {
                    'Gear Ratio': '3:1 Mechanical Advantage',
                    'Drive Teeth': 'Dual Hardened Tool Steel',
                    'Motor': 'NEMA 14 Lightweight Pancake Stepper',
                    'Sensor': 'Optical Filament Runout & Tangle Detection'
                },
                maintenance: [
                    'Clean filament debris from drive gear teeth with a brass brush weekly.',
                    'Calibrate extruder E-steps whenever switching between TPU and PA-CF.',
                    'Verify idler tension spring is not flattening soft flexible filaments.',
                    'Inspect optical sensor lens for airbase dust accumulation.'
                ],
                failureModes: 'Filament grinding caused by excessive retraction speed or clogged nozzle; tension spring loosening causing under-extrusion.'
            },
            'heatbed': {
                name: 'Heated Bed Plate',
                icon: 'fa-layer-group',
                fullName: 'Magnetic Spring-Steel Textured PEI Build Surface',
                category: 'Thermal & Structural',
                tech: 'FDM / FFF',
                description: 'Double-sided spring steel plate with textured PEI coating on 24V cast aluminum plate insulated with thermal ceramic batting.',
                slafRole: 'Prevents first-layer warping on large DGCE airfield contour models and high-stress DGGE mechanical fixtures.',
                specs: {
                    'Max Bed Temp': '115°C Uniform Distribution',
                    'Leveling': '25-Point Auto Mesh Tramming',
                    'Power': '24V 300W with Thermal Fuse',
                    'Adhesion Surface': 'Double-Sided Powder-Coated PEI'
                },
                maintenance: [
                    'Degrease with 99% Isopropyl Alcohol (IPA) before every print session.',
                    'Wash with dish soap and warm water if finger oil contamination occurs.',
                    'Verify Z-offset calibration standard deviation is below 0.005mm.',
                    'Inspect silicon heater ground wire continuity and thermal cutoff.'
                ],
                failureModes: 'Edge lifting and warping due to oily PEI surface; thermal gradient fluctuations in air-conditioned or windy hangar zones.'
            },
            'motion': {
                name: 'Linear Rails',
                icon: 'fa-arrows-up-down-left-right',
                fullName: 'Precision Stainless Steel Linear Guide Rails & Dual Z',
                category: 'Mechanical Motion',
                tech: 'FDM / FFF',
                description: 'MGN12H stainless steel guide rails on X and Y axes paired with dual synchronized Z-axis leadscrews and 0.9° high-resolution stepper motors.',
                slafRole: 'Maintains strict ±0.08mm dimensional accuracy for tight-tolerance aerospace brackets, avionics enclosures, and interlocking assemblies.',
                specs: {
                    'Guide Rails': 'MGN12H Stainless Steel',
                    'Step Angle': '0.9° (400 steps per revolution)',
                    'Positional Accuracy': 'X/Y: 0.0125 mm, Z: 0.0025 mm',
                    'Timing Belts': 'Gates GT2 6mm Fiberglass-reinforced'
                },
                maintenance: [
                    'Wipe rails with lint-free cloth and apply synthetic machine oil weekly.',
                    'Measure timing belt resonance frequency (Target: 110-120 Hz).',
                    'Inspect Z-axis anti-backlash brass nuts and leadscrew lubrication.',
                    'Check stepper motor operating temperatures under continuous load (< 65°C).'
                ],
                failureModes: 'Layer shifting from loose belt tension or debris in linear rail ball bearings; Z-banding from unlubricated leadscrew.'
            },
            'board': {
                name: '32-Bit Controller',
                icon: 'fa-microchip',
                fullName: '32-Bit ARM Cortex-M4 Board & TMC2209 Drivers',
                category: 'Electronics & Firmware',
                tech: 'FDM & Electronics',
                description: 'High-speed 180MHz computing architecture running customized SLAF defense firmware with hardware thermal runaway and sensorless homing.',
                slafRole: 'Executes Input Shaping and Linear Advance algorithms locally in an air-gapped intranet environment with zero cloud connectivity.',
                specs: {
                    'Processor': 'STM32F446 32-bit ARM Cortex-M4 @ 180MHz',
                    'Stepper Drivers': 'TMC2209 Silent UART with StealthChop',
                    'Input Voltage': '24V DC MeanWell Industrial PSU',
                    'Intranet Interface': 'Air-gapped Local Ethernet / SD Card'
                },
                maintenance: [
                    'Clean electronics cooling fan dust filters monthly.',
                    'Check terminal block screws on high-current bed MOSFET connections.',
                    'Verify firmware cryptographic checksum to prevent tampering.',
                    'Verify chassis ground connection to mains earth terminal.'
                ],
                failureModes: 'Thermal throttling of stepper drivers from clogged fan filters; loose screw terminals causing MOSFET overheating.'
            },
            'resinvat': {
                name: 'SLA Resin Vat',
                icon: 'fa-sun',
                fullName: '12K Monochromatic LCD & UV Matrix Light Engine',
                category: 'Stereolithography',
                tech: 'SLA / MSLA',
                description: '405nm parallel UV Matrix paired with a 12K monochrome masking LCD and release-film resin tank for microscopic layer curing.',
                slafRole: 'Fabricates micro-connectors, radar telemetry housings, and optical sensor mounts for IT & Avionics technicians.',
                specs: {
                    'UV Wavelength': '405nm Uniform Matrix Array',
                    'XY Resolution': '18 x 18 Microns (12K Mono)',
                    'Layer Height': '0.01 – 0.10 mm (10-100 Microns)',
                    'Tank Frame': 'CNC Anodized Aluminum with FEP Release Film'
                },
                maintenance: [
                    'Inspect FEP film for clouding or punctures before pouring resin.',
                    'Filter vat resin through 190-micron mesh after any failed print.',
                    'Clean optical LCD screen with lens cleaner and microfiber wipe.',
                    'Store photopolymer resin in UV-blocked bottles away from ambient base light.'
                ],
                failureModes: 'FEP film puncture leaking resin onto LCD screen; cured resin particles puncturing film during bed descent.'
            }
        },

        get activeSubsystem() {
            return this.subsystems[this.activeKey] || this.subsystems['hotend'];
        }
    };
}
</script>
