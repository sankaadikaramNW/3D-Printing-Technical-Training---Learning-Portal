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
                    <span class="text-slate-800">Slicing Simulator & Cost Estimator</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Interactive Slicing Calculator & Extrusion Simulator</h1>
                <p class="text-slate-600 text-sm mt-1 max-w-3xl">
                    Real-time parametric estimator computing military part mass, print duration, and production cost using certified SLAF additive manufacturing formulas.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1.5 rounded-xl bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                    <i class="fas fa-calculator mr-1"></i> SLAF Defense Formula
                </span>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="slicingCalculator()">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left Column: Input Form (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7 space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <i class="fas fa-sliders text-blue-600"></i> Toolpath Parameters
                    </h2>
                    <button @click="resetDefaults()" class="text-xs text-blue-600 hover:text-blue-800 font-semibold cursor-pointer">
                        Reset Defaults
                    </button>
                </div>

                <!-- Material Selection -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-2">Defense Material Grade</label>
                    <select x-model="selectedMaterialKey" @change="updateMaterialProperties()" 
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:ring-2 focus:ring-blue-600 transition">
                        <template x-for="(mat, key) in materials" :key="key">
                            <option :value="key" x-text="mat.name + ' (' + mat.type + ')'"></option>
                        </template>
                    </select>
                </div>

                <!-- Part Volume (cm3) Slider & Input -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-800">Part Solid Volume (V)</label>
                        <span class="text-xs font-mono font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100" x-text="volume + ' cm³'"></span>
                    </div>
                    <input type="range" min="5" max="800" step="5" x-model.number="volume" 
                           class="w-full accent-blue-600 cursor-pointer h-2 bg-slate-200 rounded-lg">
                    <div class="flex justify-between text-[10px] text-slate-400 mt-1 font-mono">
                        <span>5 cm³ (Brackets)</span>
                        <span>400 cm³</span>
                        <span>800 cm³ (Enclosures)</span>
                    </div>
                </div>

                <!-- Layer Height (mm) -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-800">Layer Height (h)</label>
                        <span class="text-xs font-mono font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100" x-text="layerHeight.toFixed(2) + ' mm'"></span>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <button type="button" @click="layerHeight = 0.12" 
                                :class="layerHeight === 0.12 ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-50 text-slate-800 border-slate-200 hover:bg-slate-100'"
                                class="py-2 px-3 rounded-xl border text-xs font-bold transition text-center cursor-pointer">
                            0.12 mm (Fine)
                        </button>
                        <button type="button" @click="layerHeight = 0.20" 
                                :class="layerHeight === 0.20 ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-50 text-slate-800 border-slate-200 hover:bg-slate-100'"
                                class="py-2 px-3 rounded-xl border text-xs font-bold transition text-center cursor-pointer">
                            0.20 mm (Standard)
                        </button>
                        <button type="button" @click="layerHeight = 0.28" 
                                :class="layerHeight === 0.28 ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-50 text-slate-800 border-slate-200 hover:bg-slate-100'"
                                class="py-2 px-3 rounded-xl border text-xs font-bold transition text-center cursor-pointer">
                            0.28 mm (Draft)
                        </button>
                    </div>
                </div>

                <!-- Infill Density (%) -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-800">Internal Infill Density</label>
                        <span class="text-xs font-mono font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-100" x-text="infill + ' %'"></span>
                    </div>
                    <input type="range" min="0" max="100" step="5" x-model.number="infill" 
                           class="w-full accent-blue-600 cursor-pointer h-2 bg-slate-200 rounded-lg">
                    <div class="flex justify-between text-[10px] text-slate-400 mt-1 font-mono">
                        <span>15% (Visual Mockup)</span>
                        <span>40% (Avionics Tray)</span>
                        <span>100% (High-Load Gear)</span>
                    </div>
                </div>

                <!-- Infill Pattern Selection -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-2">Infill Geometry</label>
                    <div class="grid grid-cols-3 gap-2 text-xs">
                        <label class="p-2 rounded-xl border cursor-pointer flex flex-col items-center text-center transition"
                               :class="pattern === 'gyroid' ? 'border-blue-600 bg-blue-50/60 font-bold text-blue-700' : 'border-slate-200 text-slate-700 hover:bg-slate-50'">
                            <input type="radio" value="gyroid" x-model="pattern" class="sr-only">
                            <i class="fas fa-wave-square mb-1 text-sm text-blue-600"></i>
                            <span>Gyroid (Iso)</span>
                        </label>
                        <label class="p-2 rounded-xl border cursor-pointer flex flex-col items-center text-center transition"
                               :class="pattern === 'grid' ? 'border-blue-600 bg-blue-50/60 font-bold text-blue-700' : 'border-slate-200 text-slate-700 hover:bg-slate-50'">
                            <input type="radio" value="grid" x-model="pattern" class="sr-only">
                            <i class="fas fa-border-all mb-1 text-sm text-blue-600"></i>
                            <span>Grid (2D)</span>
                        </label>
                        <label class="p-2 rounded-xl border cursor-pointer flex flex-col items-center text-center transition"
                               :class="pattern === 'honeycomb' ? 'border-blue-600 bg-blue-50/60 font-bold text-blue-700' : 'border-slate-200 text-slate-700 hover:bg-slate-50'">
                            <input type="radio" value="honeycomb" x-model="pattern" class="sr-only">
                            <i class="fas fa-shapes mb-1 text-sm text-blue-600"></i>
                            <span>Honeycomb</span>
                        </label>
                    </div>
                </div>

            </div>

            <!-- Material Spec Card -->
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-5 space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-600 flex items-center gap-1.5">
                    <i class="fas fa-info-circle text-blue-600"></i> Active Filament Properties
                </h4>
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div class="bg-white p-3 rounded-xl border border-slate-200">
                        <span class="text-slate-500 block text-[11px]">Material Density (ρ)</span>
                        <span class="font-bold text-slate-900 font-mono text-sm" x-text="density + ' g/cm³'"></span>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-slate-200">
                        <span class="text-slate-500 block text-[11px]">Filament Cost (C)</span>
                        <span class="font-bold text-slate-900 font-mono text-sm" x-text="'$' + costPerKg + ' / kg'"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Real-Time Results & Extrusion Visualizer (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Computed Output Metric Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                
                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm space-y-1">
                    <div class="flex items-center justify-between text-slate-500 text-xs font-semibold">
                        <span>Calculated Part Mass</span>
                        <i class="fas fa-weight-hanging text-blue-600"></i>
                    </div>
                    <div class="text-3xl font-black text-slate-900 font-mono tracking-tight" x-text="computedMass.toFixed(1) + ' g'"></div>
                    <div class="text-[11px] text-slate-500">
                        Filament length: <span class="font-mono font-bold text-slate-700" x-text="(computedMass / 3.0).toFixed(1) + ' m'"></span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm space-y-1">
                    <div class="flex items-center justify-between text-slate-500 text-xs font-semibold">
                        <span>Estimated Build Time</span>
                        <i class="fas fa-clock text-indigo-600"></i>
                    </div>
                    <div class="text-3xl font-black text-slate-900 font-mono tracking-tight" x-text="formattedTime"></div>
                    <div class="text-[11px] text-slate-500">
                        Total Layers: <span class="font-mono font-bold text-slate-700" x-text="totalLayers"></span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm space-y-1">
                    <div class="flex items-center justify-between text-slate-500 text-xs font-semibold">
                        <span>Material Cost</span>
                        <i class="fas fa-tag text-emerald-600"></i>
                    </div>
                    <div class="text-3xl font-black text-emerald-700 font-mono tracking-tight" x-text="'$' + computedCost.toFixed(2)"></div>
                    <div class="text-[11px] text-slate-500 font-mono">
                        ~ LKR <span class="font-bold text-slate-700" x-text="(computedCost * 310).toFixed(0)"></span>
                    </div>
                </div>

            </div>

            <!-- Visual Extrusion & Slicing Simulator -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7 space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Interactive Layer Toolpath Simulator</h3>
                        <p class="text-xs text-slate-500">Visual representation of nozzle deposit and infill mesh cross-section</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="toggleAnimation()" class="px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 cursor-pointer"
                                :class="isSimulating ? 'bg-amber-100 text-amber-800 border border-amber-200' : 'bg-blue-600 text-white shadow-sm'">
                            <i class="fas" :class="isSimulating ? 'fa-pause' : 'fa-play'"></i>
                            <span x-text="isSimulating ? 'Pause Nozzle' : 'Run Simulation'"></span>
                        </button>
                    </div>
                </div>

                <!-- Canvas Visualizer Container -->
                <div class="relative bg-slate-900 rounded-2xl p-6 h-72 overflow-hidden flex flex-col justify-between border border-slate-800 text-white">
                    <!-- Machine Top HUD -->
                    <div class="flex items-center justify-between z-10 text-xs font-mono text-slate-300">
                        <div class="flex items-center gap-3">
                            <span>NOZZLE: <strong class="text-blue-400" x-text="selectedMaterial.nozzleTemp + '°C'"></strong></span>
                            <span>BED: <strong class="text-amber-400" x-text="selectedMaterial.bedTemp + '°C'"></strong></span>
                            <span>SPEED: <strong class="text-emerald-400">50 mm/s</strong></span>
                        </div>
                        <div class="text-slate-400">
                            SIM LAYER: <span class="text-white font-bold" x-text="activeSimLayer + ' / ' + totalLayers"></span>
                        </div>
                    </div>

                    <!-- Visual Deposition Animation Area -->
                    <div class="relative w-full h-44 flex items-center justify-center">
                        
                        <!-- Heated Bed Platform Grid -->
                        <div class="absolute bottom-2 w-4/5 h-3 bg-slate-700 rounded-sm border-t border-slate-500 shadow-lg"></div>

                        <!-- Deposited Layers Stack -->
                        <div class="absolute bottom-5 w-3/5 bg-blue-900/60 border border-blue-500/40 rounded flex flex-col justify-end p-2 transition-all duration-300"
                             :style="'height: ' + Math.min(130, Math.max(30, (volume / 800) * 120)) + 'px;'">
                            
                            <!-- Infill Pattern Overlay -->
                            <div class="w-full h-full opacity-60 flex items-center justify-center text-blue-400 text-xs font-mono overflow-hidden">
                                <template x-if="pattern === 'gyroid'">
                                    <div class="grid grid-cols-6 gap-1 w-full h-full p-1 opacity-70">
                                        <template x-for="i in 18">
                                            <div class="border-t-2 border-r-2 border-cyan-400 rounded-full h-4"></div>
                                        </template>
                                    </div>
                                </template>
                                <template x-if="pattern === 'grid'">
                                    <div class="grid grid-cols-6 grid-rows-4 gap-1 w-full h-full p-1 opacity-70">
                                        <template x-for="i in 24">
                                            <div class="border border-blue-400 h-4"></div>
                                        </template>
                                    </div>
                                </template>
                                <template x-if="pattern === 'honeycomb'">
                                    <div class="grid grid-cols-5 gap-1 w-full h-full p-1 opacity-70">
                                        <template x-for="i in 15">
                                            <div class="border-2 border-cyan-400 rotate-45 h-3 w-3 m-auto"></div>
                                        </template>
                                    </div>
                                </template>
                            </div>

                            <!-- Live Extruding Top Layer Glow -->
                            <div class="w-full h-1.5 bg-blue-400 shadow-[0_0_12px_#38bdf8] rounded-full animate-pulse"></div>
                        </div>

                        <!-- Moving Hotend & Nozzle -->
                        <div class="absolute z-20 transition-transform duration-150"
                             :class="isSimulating ? 'animate-nozzle' : ''"
                             style="top: 15px; left: 45%;">
                            <!-- Nozzle Body SVG -->
                            <svg width="42" height="52" viewBox="0 0 42 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="6" y="0" width="30" height="20" rx="3" fill="#64748B" stroke="#94A3B8"/>
                                <path d="M11 20H31L26 38H16L11 20Z" fill="#F59E0B" stroke="#D97706"/>
                                <rect x="18" y="38" width="6" height="8" rx="1" fill="#D97706"/>
                                <circle cx="21" cy="46" r="2" fill="#0056D2"/>
                            </svg>
                            <!-- Filament Glow Line -->
                            <div class="w-1 h-10 bg-gradient-to-b from-blue-400 to-transparent mx-auto rounded-full"></div>
                        </div>

                    </div>

                    <!-- Progress Bar -->
                    <div class="w-full bg-slate-800 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full rounded-full transition-all duration-300"
                             :style="'width: ' + ((activeSimLayer / totalLayers) * 100) + '%;'"></div>
                    </div>
                </div>

                <!-- Defense Engineering Mathematical Formula Reference -->
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-200 text-xs space-y-2">
                    <div class="font-bold text-slate-800 flex items-center gap-1.5">
                        <i class="fas fa-square-root-variable text-blue-600"></i> Mathematical Formulas Implemented:
                    </div>
                    <div class="font-mono text-[11px] text-slate-600 space-y-1">
                        <div>• <strong>Mass (g):</strong> V × ρ × (0.30 + (Infill% / 100) × 0.70)</div>
                        <div>• <strong>Build Time (hrs):</strong> (V / (h_layer × 12)) × (1 + Infill% / 200)</div>
                        <div>• <strong>Cost ($):</strong> (Mass / 1000) × Material_Cost_Per_Kg</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function slicingCalculator() {
    return {
        volume: 65,
        layerHeight: 0.20,
        infill: 30,
        pattern: 'gyroid',
        selectedMaterialKey: 'PLA',
        density: 1.24,
        costPerKg: 24.0,
        isSimulating: true,
        activeSimLayer: 45,
        
        materials: {
            'PLA': { name: 'PLA (Standard)', type: 'Prototyping Polymer', density: 1.24, cost: 22.0, nozzleTemp: 205, bedTemp: 60 },
            'PETG': { name: 'PETG (Tough)', type: 'Chemical & Weather Resistant', density: 1.27, cost: 26.0, nozzleTemp: 235, bedTemp: 75 },
            'ABS': { name: 'ABS / ASA', type: 'High-Temperature Aerospace', density: 1.05, cost: 28.0, nozzleTemp: 245, bedTemp: 100 },
            'PACF': { name: 'PA12-CF Carbon Nylon', type: 'Defense Structural Grade', density: 1.15, cost: 68.0, nozzleTemp: 280, bedTemp: 100 },
            'PC': { name: 'Polycarbonate (PC)', type: 'Ballistic & Impact Fixtures', density: 1.20, cost: 45.0, nozzleTemp: 290, bedTemp: 110 },
            'TPU': { name: 'TPU 95A', type: 'Anti-Vibration Dampers', density: 1.21, cost: 35.0, nozzleTemp: 225, bedTemp: 50 }
        },

        get selectedMaterial() {
            return this.materials[this.selectedMaterialKey] || this.materials['PLA'];
        },

        updateMaterialProperties() {
            const mat = this.selectedMaterial;
            this.density = mat.density;
            this.costPerKg = mat.cost;
        },

        get computedMass() {
            // Formula: Mass = V * rho * (0.30 + (infill/100) * 0.70)
            const infillRatio = this.infill / 100;
            return this.volume * this.density * (0.30 + (infillRatio * 0.70));
        },

        get computedTimeHours() {
            // Formula: Time = (V / (layerHeight * 12)) * (1 + infill / 200) / 60
            const rawMinutes = (this.volume / (this.layerHeight * 12)) * (1 + (this.infill / 200));
            return rawMinutes / 60;
        },

        get formattedTime() {
            const totalHours = this.computedTimeHours;
            const hrs = Math.floor(totalHours);
            const mins = Math.round((totalHours - hrs) * 60);
            if (hrs === 0) return `${mins} mins`;
            return `${hrs}h ${mins}m`;
        },

        get totalLayers() {
            // Estimate height based on cubic root of volume in mm
            const estimatedHeightMm = Math.cbrt(this.volume * 1000);
            return Math.max(10, Math.round(estimatedHeightMm / this.layerHeight));
        },

        get computedCost() {
            // Formula: Cost = (Mass / 1000) * CostPerKg
            return (this.computedMass / 1000) * this.costPerKg;
        },

        toggleAnimation() {
            this.isSimulating = !this.isSimulating;
        },

        resetDefaults() {
            this.volume = 65;
            this.layerHeight = 0.20;
            this.infill = 30;
            this.pattern = 'gyroid';
            this.selectedMaterialKey = 'PLA';
            this.updateMaterialProperties();
        }
    };
}
</script>
