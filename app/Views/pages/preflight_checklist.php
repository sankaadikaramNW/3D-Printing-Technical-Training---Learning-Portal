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
                    <span class="text-slate-800">5-Phase Pre-Flight Checklist</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">5-Phase Pre-Flight Additive Manufacturing Checklist</h1>
                <p class="text-slate-600 text-sm mt-1 max-w-3xl">
                    Standardized pre-flight qualification protocol for SLAF airmen and technicians to guarantee zero print failures and aerospace-grade part integrity.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1.5 rounded-xl bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                    <i class="fas fa-certificate mr-1"></i> SLAF Standard Protocol
                </span>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="preflightChecklist()">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Checklist Progress & Steps (8 cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- Progress Banner -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center font-black text-xl font-mono transition"
                         :class="progressPercent === 100 ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/30' : 'bg-blue-50 text-blue-600 border border-blue-200'"
                         x-text="progressPercent + '%'">
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-slate-900">Pre-Flight Readiness Status</h2>
                        <p class="text-xs text-slate-500" x-text="completedCount + ' of ' + totalCount + ' verification items completed'"></p>
                    </div>
                </div>
                <div class="w-full sm:w-48 bg-slate-100 h-3 rounded-full overflow-hidden border border-slate-200">
                    <div class="h-full bg-blue-600 transition-all duration-300 rounded-full"
                         :class="progressPercent === 100 ? 'bg-emerald-600' : 'bg-blue-600'"
                         :style="'width: ' + progressPercent + '%;'"></div>
                </div>
            </div>

            <!-- Phase 1: Machine & Hardware Structural Check -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center">1</span>
                        <h3 class="text-base font-bold text-slate-900">Phase 1: Machine & Hardware Inspection</h3>
                    </div>
                    <span class="text-xs font-semibold text-slate-400">Mechanical Verification</span>
                </div>

                <div class="space-y-2.5">
                    <template x-for="(item, idx) in phase1" :key="idx">
                        <label class="flex items-start gap-3 p-3 rounded-xl border transition cursor-pointer"
                               :class="item.done ? 'bg-blue-50/50 border-blue-300' : 'bg-slate-50 border-slate-200 hover:bg-white'">
                            <input type="checkbox" x-model="item.done" class="mt-0.5 rounded text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                            <div class="flex-1">
                                <span class="text-xs font-bold text-slate-900 block" x-text="item.title"></span>
                                <span class="text-[11px] text-slate-500" x-text="item.desc"></span>
                            </div>
                        </label>
                    </template>
                </div>
            </div>

            <!-- Phase 2: Bed Leveling & Tramming -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center">2</span>
                        <h3 class="text-base font-bold text-slate-900">Phase 2: Bed Tramming & Surface Degreasing</h3>
                    </div>
                    <span class="text-xs font-semibold text-slate-400">Thermal & Adhesion</span>
                </div>

                <div class="space-y-2.5">
                    <template x-for="(item, idx) in phase2" :key="idx">
                        <label class="flex items-start gap-3 p-3 rounded-xl border transition cursor-pointer"
                               :class="item.done ? 'bg-blue-50/50 border-blue-300' : 'bg-slate-50 border-slate-200 hover:bg-white'">
                            <input type="checkbox" x-model="item.done" class="mt-0.5 rounded text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                            <div class="flex-1">
                                <span class="text-xs font-bold text-slate-900 block" x-text="item.title"></span>
                                <span class="text-[11px] text-slate-500" x-text="item.desc"></span>
                            </div>
                        </label>
                    </template>
                </div>
            </div>

            <!-- Phase 3: Material Conditioning & De-Humidification -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center">3</span>
                        <h3 class="text-base font-bold text-slate-900">Phase 3: Material De-Humidification & Feed Setup</h3>
                    </div>
                    <span class="text-xs font-semibold text-slate-400">Polymer Conditioning</span>
                </div>

                <div class="space-y-2.5">
                    <template x-for="(item, idx) in phase3" :key="idx">
                        <label class="flex items-start gap-3 p-3 rounded-xl border transition cursor-pointer"
                               :class="item.done ? 'bg-blue-50/50 border-blue-300' : 'bg-slate-50 border-slate-200 hover:bg-white'">
                            <input type="checkbox" x-model="item.done" class="mt-0.5 rounded text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                            <div class="flex-1">
                                <span class="text-xs font-bold text-slate-900 block" x-text="item.title"></span>
                                <span class="text-[11px] text-slate-500" x-text="item.desc"></span>
                            </div>
                        </label>
                    </template>
                </div>
            </div>

            <!-- Phase 4: First-Layer Monitoring -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center">4</span>
                        <h3 class="text-base font-bold text-slate-900">Phase 4: First-Layer Extrusion Monitoring</h3>
                    </div>
                    <span class="text-xs font-semibold text-slate-400">In-Flight Quality</span>
                </div>

                <div class="space-y-2.5">
                    <template x-for="(item, idx) in phase4" :key="idx">
                        <label class="flex items-start gap-3 p-3 rounded-xl border transition cursor-pointer"
                               :class="item.done ? 'bg-blue-50/50 border-blue-300' : 'bg-slate-50 border-slate-200 hover:bg-white'">
                            <input type="checkbox" x-model="item.done" class="mt-0.5 rounded text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                            <div class="flex-1">
                                <span class="text-xs font-bold text-slate-900 block" x-text="item.title"></span>
                                <span class="text-[11px] text-slate-500" x-text="item.desc"></span>
                            </div>
                        </label>
                    </template>
                </div>
            </div>

            <!-- Phase 5: Post-Processing & QA Inspection -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center">5</span>
                        <h3 class="text-base font-bold text-slate-900">Phase 5: Post-Processing & Dimensional Clearance</h3>
                    </div>
                    <span class="text-xs font-semibold text-slate-400">Quality Assurance</span>
                </div>

                <div class="space-y-2.5">
                    <template x-for="(item, idx) in phase5" :key="idx">
                        <label class="flex items-start gap-3 p-3 rounded-xl border transition cursor-pointer"
                               :class="item.done ? 'bg-blue-50/50 border-blue-300' : 'bg-slate-50 border-slate-200 hover:bg-white'">
                            <input type="checkbox" x-model="item.done" class="mt-0.5 rounded text-blue-600 focus:ring-blue-500 w-4 h-4 cursor-pointer">
                            <div class="flex-1">
                                <span class="text-xs font-bold text-slate-900 block" x-text="item.title"></span>
                                <span class="text-[11px] text-slate-500" x-text="item.desc"></span>
                            </div>
                        </label>
                    </template>
                </div>
            </div>

        </div>

        <!-- Right: Print Clearance & Certificate Generation (4 cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-5 sticky top-24">
                <div class="flex items-center gap-2 text-slate-900 font-bold text-base pb-3 border-b border-slate-100">
                    <i class="fas fa-file-shield text-blue-600"></i>
                    <span>Flight Clearance Ticket</span>
                </div>

                <!-- Job Details -->
                <div class="space-y-3 text-xs">
                    <div>
                        <label class="block font-bold text-slate-800 uppercase mb-1">Part / Project Reference</label>
                        <input type="text" x-model="jobRef" placeholder="e.g. SLAF-DGGE-BRK-04" 
                               class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-medium">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-800 uppercase mb-1">Technician / Airman Name</label>
                        <input type="text" x-model="techName" placeholder="e.g. Cpl. Perera M.K." 
                               class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-medium">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-800 uppercase mb-1">Directorate / Trade</label>
                        <select x-model="dirCode" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-medium">
                            <option value="DGGE">DGGE - General Engineering</option>
                            <option value="DGCE">DGCE - Civil Engineering</option>
                            <option value="DGP">DGP - Planning & CAD</option>
                            <option value="ITAV">IT & Avionics Technicians Trade</option>
                        </select>
                    </div>
                </div>

                <!-- Clearance Status Display -->
                <div class="p-4 rounded-xl border text-center transition"
                     :class="progressPercent === 100 ? 'bg-emerald-50 border-emerald-300 text-emerald-800' : 'bg-amber-50 border-amber-300 text-amber-800'">
                    <i class="fas text-2xl mb-1" :class="progressPercent === 100 ? 'fa-circle-check text-emerald-600' : 'fa-clock text-amber-600'"></i>
                    <div class="font-bold text-xs" x-text="progressPercent === 100 ? 'QUALIFIED FOR PRINTING' : 'PRE-FLIGHT INCOMPLETE'"></div>
                    <div class="text-[10px] mt-0.5" x-text="progressPercent === 100 ? 'All 15 aerospace safety gates verified.' : 'Complete all check items to unlock print pass.'"></div>
                </div>

                <div class="space-y-2">
                    <button type="button" @click="selectAll()" class="w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition cursor-pointer">
                        Mark All 15 Gates Checked
                    </button>
                    <button type="button" @click="printCard()" :disabled="progressPercent < 100" 
                            :class="progressPercent === 100 ? 'bg-blue-600 hover:bg-blue-700 text-white cursor-pointer shadow-lg shadow-blue-600/25' : 'bg-slate-200 text-slate-400 cursor-not-allowed'"
                            class="w-full py-3 font-bold rounded-xl text-xs transition flex items-center justify-center gap-2">
                        <i class="fas fa-print"></i>
                        <span>Generate Clearance PDF</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function preflightChecklist() {
    return {
        jobRef: 'SLAF-DGGE-BKT-01',
        techName: 'SLAF Lead Technician',
        dirCode: 'DGGE',

        phase1: [
            { title: 'Nozzle Cleanliness & Bore Inspection', desc: 'Ensure exterior nozzle is free of charred plastic residue and orifice is clear.', done: false },
            { title: 'Belt Tension & Linear Guide Freedom', desc: 'X/Y belts properly tensioned (110Hz resonance) with smooth carriage motion.', done: false },
            { title: 'Wiring & Thermal Cartridge Security', desc: 'Confirm heater and thermistor wire insulation are intact and secured in drag chain.', done: false }
        ],

        phase2: [
            { title: 'PEI Build Surface Degreasing (99% IPA)', desc: 'Wipe spring steel sheet with 99% Isopropyl Alcohol to remove skin oils.', done: false },
            { title: '25-Point Automated Mesh Bed Leveling', desc: 'Execute mesh probe routine and verify bed deviation stays under 0.005mm.', done: false },
            { title: 'Z-Offset Feeler Gauge Verification', desc: 'Verify zero clearance with 0.10mm brass feeler gauge without dragging.', done: false }
        ],

        phase3: [
            { title: 'Filament Moisture Conditioning Check', desc: 'Verify polymer spool was dried in dehydrator at recommended temp (PA-CF: 80°C / 8h).', done: false },
            { title: 'Drybox Relative Humidity < 15% RH', desc: 'Inspect feed enclosure hygrometer to prevent tropical humidity absorption.', done: false },
            { title: 'PTFE Guide Tube Secure Seating', desc: 'Ensure bowden/reverse-bowden couplers are locked with blue retention clips.', done: false }
        ],

        phase4: [
            { title: 'Purge Line & Extrusion Bead Uniformity', desc: 'Inspect perimeter prime line for consistent width and zero stuttering.', done: false },
            { title: 'First Layer Squish & Adhesion Gate', desc: 'Confirm layer lines fuse seamlessly without gaps or nozzle gouging.', done: false },
            { title: 'Chamber Thermal Stabilization', desc: 'Close enclosure doors for ABS/PA-CF prints to prevent draft-induced layer delamination.', done: false }
        ],

        phase5: [
            { title: 'Cool Down Below 35°C Before Removal', desc: 'Allow magnetic bed to self-release part naturally without mechanical force.', done: false },
            { title: 'Dimensional Caliper Verification (±0.10mm)', desc: 'Measure critical datum features against CAD drawing tolerances.', done: false },
            { title: 'Post-Cure / Annealing Execution', desc: 'Execute oven annealing cycle for structural nylon or UV wash-cure for SLA resin.', done: false }
        ],

        get allItems() {
            return [...this.phase1, ...this.phase2, ...this.phase3, ...this.phase4, ...this.phase5];
        },

        get totalCount() {
            return this.allItems.length;
        },

        get completedCount() {
            return this.allItems.filter(i => i.done).length;
        },

        get progressPercent() {
            if (this.totalCount === 0) return 0;
            return Math.round((this.completedCount / this.totalCount) * 100);
        },

        selectAll() {
            this.allItems.forEach(i => i.done = true);
        },

        printCard() {
            window.print();
        }
    };
}
</script>
