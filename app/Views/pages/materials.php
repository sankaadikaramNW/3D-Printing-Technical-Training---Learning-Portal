<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Polymer Science & Filament Guide
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                3D Printing Materials
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Engineering comparison of PLA, PETG, ABS, and TPU thermoplastics: mechanical properties, thermal glass transitions, print temperatures, storage, and safety protocols.
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Comparison Table -->
        <div>
            <div class="text-center max-w-2xl mx-auto mb-8">
                <h2 class="text-2xl font-bold text-slate-900 font-heading">Thermoplastic Engineering Comparison Matrix</h2>
                <p class="text-xs text-slate-500 mt-1">Select the optimal filament based on operational thermal requirements and mechanical loading.</p>
            </div>

            <div class="overflow-x-auto rounded-3xl border border-slate-200 shadow-sm bg-white">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-900 text-white font-heading">
                            <th class="p-4 font-bold">Property / Spec</th>
                            <th class="p-4 font-bold text-blue-400">PLA</th>
                            <th class="p-4 font-bold text-cyan-400">PETG</th>
                            <th class="p-4 font-bold text-rose-400">ABS</th>
                            <th class="p-4 font-bold text-emerald-400">TPU (Flexible 95A)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 text-slate-700">
                        <tr>
                            <td class="p-3.5 font-bold bg-slate-50">Nozzle Temp Range</td>
                            <td class="p-3.5 font-mono">190 – 215 °C</td>
                            <td class="p-3.5 font-mono">230 – 250 °C</td>
                            <td class="p-3.5 font-mono">235 – 255 °C</td>
                            <td class="p-3.5 font-mono">215 – 235 °C</td>
                        </tr>
                        <tr>
                            <td class="p-3.5 font-bold bg-slate-50">Bed Temp Range</td>
                            <td class="p-3.5 font-mono">50 – 60 °C</td>
                            <td class="p-3.5 font-mono">70 – 85 °C</td>
                            <td class="p-3.5 font-mono">95 – 110 °C</td>
                            <td class="p-3.5 font-mono">40 – 60 °C</td>
                        </tr>
                        <tr>
                            <td class="p-3.5 font-bold bg-slate-50">Glass Transition ($T_g$)</td>
                            <td class="p-3.5 font-mono">~55 – 60 °C</td>
                            <td class="p-3.5 font-mono">~75 – 80 °C</td>
                            <td class="p-3.5 font-mono">~105 °C</td>
                            <td class="p-3.5 font-mono">-20 to 50 °C</td>
                        </tr>
                        <tr>
                            <td class="p-3.5 font-bold bg-slate-50">Tensile Strength</td>
                            <td class="p-3.5 font-mono">50 – 65 MPa (High)</td>
                            <td class="p-3.5 font-mono">45 – 55 MPa (Ductile)</td>
                            <td class="p-3.5 font-mono">40 – 50 MPa (Tough)</td>
                            <td class="p-3.5 font-mono">30 – 40 MPa (>450% strain)</td>
                        </tr>
                        <tr>
                            <td class="p-3.5 font-bold bg-slate-50">Part Cooling Fan</td>
                            <td class="p-3.5 font-mono">100% (High airflow)</td>
                            <td class="p-3.5 font-mono">30% – 50% (Moderate)</td>
                            <td class="p-3.5 font-mono">0% (Disabled)</td>
                            <td class="p-3.5 font-mono">50% – 100%</td>
                        </tr>
                        <tr>
                            <td class="p-3.5 font-bold bg-slate-50">Enclosure Required?</td>
                            <td class="p-3.5 text-slate-500">No (Open chassis)</td>
                            <td class="p-3.5 text-slate-500">No (Draft shield OK)</td>
                            <td class="p-3.5 text-rose-600 font-bold">Yes (Chamber 45°C)</td>
                            <td class="p-3.5 text-slate-500">No (Direct drive best)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Detailed Material Cards -->
        <div class="space-y-12">
            <?php foreach (($materials ?? []) as $mat): ?>
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-4">
                    <div>
                        <div class="flex items-center space-x-3">
                            <span class="px-3 py-1 rounded-xl bg-slate-900 text-white font-mono font-bold text-xs"><?= htmlspecialchars((string)($mat['code'] ?? 'FIL'), ENT_QUOTES, 'UTF-8') ?></span>
                            <h3 class="text-2xl font-bold text-slate-900 font-heading"><?= htmlspecialchars((string)($mat['name'] ?? 'Filament Material'), ENT_QUOTES, 'UTF-8') ?></h3>
                        </div>
                        <p class="text-xs text-slate-500 mt-1"><?= htmlspecialchars((string)($mat['material_type'] ?? 'Thermoplastic'), ENT_QUOTES, 'UTF-8') ?></p>
                    </div>

                    <div class="flex items-center space-x-3 text-xs font-mono">
                        <div class="px-3 py-2 rounded-xl bg-blue-50 text-blue-800 border border-blue-100">
                            <span class="text-slate-400 block text-[10px]">Nozzle:</span>
                            <span class="font-bold"><?= htmlspecialchars((string)($mat['print_temp_nozzle'] ?? $mat['print_temp_nozzle_range'] ?? '190 - 220 °C'), ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <div class="px-3 py-2 rounded-xl bg-amber-50 text-amber-800 border border-amber-100">
                            <span class="text-slate-400 block text-[10px]">Bed:</span>
                            <span class="font-bold"><?= htmlspecialchars((string)($mat['print_temp_bed'] ?? $mat['print_temp_bed_range'] ?? '50 - 60 °C'), ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                    </div>
                </div>

                <p class="text-xs text-slate-700 leading-relaxed"><?= htmlspecialchars((string)($mat['description'] ?? 'Standard additive manufacturing thermoplastic polymer.'), ENT_QUOTES, 'UTF-8') ?></p>

                <!-- Pros & Cons Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
                    <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-200/60">
                        <span class="font-bold text-emerald-950 block mb-2"><i class="fas fa-check-circle text-emerald-600 mr-1"></i> Engineering Advantages:</span>
                        <div class="text-slate-700 space-y-1"><?= $mat['pros'] ?? $mat['advantages'] ?? 'High tensile strength and dimensional fidelity.' ?></div>
                    </div>
                    <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-200/60">
                        <span class="font-bold text-amber-950 block mb-2"><i class="fas fa-exclamation-triangle text-amber-600 mr-1"></i> Limitations & Challenges:</span>
                        <div class="text-slate-700 space-y-1"><?= $mat['cons'] ?? $mat['limitations'] ?? 'Moisture hygroscopic sensitivity.' ?></div>
                    </div>
                </div>

                <!-- Applications & Storage -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs pt-2">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <span class="font-bold text-slate-900 block mb-1"><i class="fas fa-cubes text-blue-600 mr-1"></i> Typical Applications:</span>
                        <div class="text-slate-600 space-y-1"><?= $mat['applications'] ?? $mat['typical_applications'] ?? 'Functional prototypes, jigs, and fixtures.' ?></div>
                    </div>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                        <span class="font-bold text-slate-900 block mb-1"><i class="fas fa-box-open text-cyan-600 mr-1"></i> Storage & Drying Protocol:</span>
                        <p class="text-slate-600"><?= htmlspecialchars((string)($mat['storage_notes'] ?? 'Store in sealed containers with desiccant silica gel packets.'), ENT_QUOTES, 'UTF-8') ?></p>
                        <span class="font-bold text-slate-900 block mt-2 mb-1"><i class="fas fa-shield-alt text-rose-500 mr-1"></i> Safety Notes:</span>
                        <p class="text-slate-600"><?= htmlspecialchars((string)($mat['safety_notes'] ?? 'Ensure workshop cross-ventilation during continuous high-temperature extrusion.'), ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
