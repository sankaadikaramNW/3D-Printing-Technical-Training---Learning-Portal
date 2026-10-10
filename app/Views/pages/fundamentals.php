<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Core Module 01
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                3D Printing Fundamentals
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Understanding the Additive Manufacturing Paradigm, historical evolution, process categorization, and engineering comparisons.
            </p>
        </div>
    </div>
</section>

<!-- Content Body -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-8 space-y-10 text-slate-700 text-sm leading-relaxed">
                
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-heading mb-4 pb-2 border-b border-slate-200">
                        What is Additive Manufacturing?
                    </h2>
                    <p class="mb-4">
                        <strong>Additive Manufacturing (AM)</strong>, commonly referred to as 3D printing, is a formalized manufacturing process (ISO/ASTM 52900) of joining materials to make parts from 3D model data, usually layer upon layer, as opposed to subtractive manufacturing methodologies and formative manufacturing methodologies.
                    </p>
                    <p>
                        In contrast to conventional manufacturing methods such as CNC milling, turning, or drilling where excess material is mechanically sheared away from a solid raw stock, additive manufacturing deposits or solidifies raw thermoplastic, resin, or metal powder only where the CAD model geometry dictates.
                    </p>
                </div>

                <!-- Comparison Table -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-4">
                        Comparative Manufacturing Matrix
                    </h3>
                    <div class="overflow-x-auto rounded-2xl border border-slate-200 shadow-xs">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-slate-900 text-white font-heading">
                                    <th class="p-3.5 font-bold">Parameter</th>
                                    <th class="p-3.5 font-bold text-cyan-400">Additive (3D Printing)</th>
                                    <th class="p-3.5 font-bold">Subtractive (CNC Machining)</th>
                                    <th class="p-3.5 font-bold">Formative (Injection Molding)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-700 bg-white">
                                <tr>
                                    <td class="p-3.5 font-bold bg-slate-50">Material Efficiency</td>
                                    <td class="p-3.5 text-blue-700 font-semibold">90% – 98% (Minimal scrap)</td>
                                    <td class="p-3.5">20% – 60% (High chip waste)</td>
                                    <td class="p-3.5">High (Runner scrap recyclable)</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-bold bg-slate-50">Tooling & Fixtures</td>
                                    <td class="p-3.5 text-blue-700 font-semibold">Zero tooling required ($0)</td>
                                    <td class="p-3.5">Custom jigs, clamps & cutters</td>
                                    <td class="p-3.5">Extremely expensive steel dies</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-bold bg-slate-50">Geometric Complexity</td>
                                    <td class="p-3.5 text-blue-700 font-semibold">Virtually Unlimited (Internal voids)</td>
                                    <td class="p-3.5">Restricted by cutter access & reach</td>
                                    <td class="p-3.5">Strict draft angles & uniform walls</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-bold bg-slate-50">Lead Time (1st Unit)</td>
                                    <td class="p-3.5 text-blue-700 font-semibold">1 to 12 Hours</td>
                                    <td class="p-3.5">1 to 5 Days</td>
                                    <td class="p-3.5">4 to 12 Weeks (Tooling lead time)</td>
                                </tr>
                                <tr>
                                    <td class="p-3.5 font-bold bg-slate-50">Cost vs Volume Curve</td>
                                    <td class="p-3.5 text-blue-700 font-semibold">Flat cost per unit (1-100 units)</td>
                                    <td class="p-3.5">Moderate slope (10-1000 units)</td>
                                    <td class="p-3.5">Economical only for 10,000+ units</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 7 ISO/ASTM Categories -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 font-heading mb-4">
                        The 7 ISO/ASTM Additive Process Categories
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-200">
                            <h4 class="font-bold text-blue-950 mb-1 flex items-center">
                                <i class="fas fa-layer-group text-blue-600 mr-2"></i>
                                1. Material Extrusion (FDM / FFF)
                            </h4>
                            <p class="text-slate-600 leading-relaxed">
                                Material is selectively dispensed through a nozzle or orifice. (This project's focus).
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center">
                                <i class="fas fa-sun text-amber-500 mr-2"></i>
                                2. Vat Photopolymerization (SLA / DLP)
                            </h4>
                            <p class="text-slate-600 leading-relaxed">
                                Liquid photopolymer resin in a vat is selectively cured by UV light.
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center">
                                <i class="fas fa-boxes text-emerald-600 mr-2"></i>
                                3. Powder Bed Fusion (SLS / SLM)
                            </h4>
                            <p class="text-slate-600 leading-relaxed">
                                Thermal energy selectively fuses regions of a powder bed (polymers or metals).
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center">
                                <i class="fas fa-tint text-purple-600 mr-2"></i>
                                4. Material Jetting (PolyJet)
                            </h4>
                            <p class="text-slate-600 leading-relaxed">
                                Droplets of build material are selectively deposited and cured simultaneously.
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center">
                                <i class="fas fa-spray-can text-indigo-600 mr-2"></i>
                                5. Binder Jetting
                            </h4>
                            <p class="text-slate-600 leading-relaxed">
                                A liquid bonding agent is selectively deposited to join powder materials.
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center">
                                <i class="fas fa-clone text-rose-600 mr-2"></i>
                                6. Sheet Lamination (LOM)
                            </h4>
                            <p class="text-slate-600 leading-relaxed">
                                Sheets of material are bonded together to form a solid object.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Advantages and Limitations -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                    <div class="p-6 rounded-3xl bg-emerald-50/60 border border-emerald-200">
                        <h4 class="font-bold text-emerald-950 text-base font-heading mb-3 flex items-center">
                            <i class="fas fa-plus-circle text-emerald-600 mr-2"></i> Key Advantages
                        </h4>
                        <ul class="space-y-2 text-xs text-slate-700">
                            <li class="flex items-start"><i class="fas fa-check text-emerald-600 mr-2 mt-0.5"></i> Accelerated design iteration cycle</li>
                            <li class="flex items-start"><i class="fas fa-check text-emerald-600 mr-2 mt-0.5"></i> Custom lightweight internal infill structures</li>
                            <li class="flex items-start"><i class="fas fa-check text-emerald-600 mr-2 mt-0.5"></i> Part consolidation (single print assemblies)</li>
                            <li class="flex items-start"><i class="fas fa-check text-emerald-600 mr-2 mt-0.5"></i> On-demand decentralized replacement parts</li>
                        </ul>
                    </div>

                    <div class="p-6 rounded-3xl bg-amber-50/60 border border-amber-200">
                        <h4 class="font-bold text-amber-950 text-base font-heading mb-3 flex items-center">
                            <i class="fas fa-exclamation-circle text-amber-600 mr-2"></i> Engineering Limitations
                        </h4>
                        <ul class="space-y-2 text-xs text-slate-700">
                            <li class="flex items-start"><i class="fas fa-minus text-amber-600 mr-2 mt-0.5"></i> Anisotropic strength (Z-axis layer weakness)</li>
                            <li class="flex items-start"><i class="fas fa-minus text-amber-600 mr-2 mt-0.5"></i> Stair-stepping surface finish on shallow curves</li>
                            <li class="flex items-start"><i class="fas fa-minus text-amber-600 mr-2 mt-0.5"></i> Higher cycle time for mass volume production</li>
                            <li class="flex items-start"><i class="fas fa-minus text-amber-600 mr-2 mt-0.5"></i> Thermal shrinkage and warping in high-temp polymers</li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Navigation -->
            <div class="lg:col-span-4 space-y-6">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200">
                    <h4 class="font-bold text-slate-900 font-heading text-sm mb-4">Core Technology Pages</h4>
                    <div class="space-y-2 text-xs">
                        <a href="<?= Helper::url('fdm-technology') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 hover:border-blue-400 font-medium transition-colors">
                            <div class="font-bold text-slate-800">FDM Technology Deep-Dive →</div>
                            <div class="text-slate-400 text-[11px] mt-0.5">Thermal melt-zone thermodynamics</div>
                        </a>
                        <a href="<?= Helper::url('printer-components') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 hover:border-blue-400 font-medium transition-colors">
                            <div class="font-bold text-slate-800">Printer Anatomy & Components →</div>
                            <div class="text-slate-400 text-[11px] mt-0.5">Mechanical, electrical, thermal systems</div>
                        </a>
                        <a href="<?= Helper::url('materials') ?>" class="block p-3 rounded-xl bg-white border border-slate-200 hover:border-blue-400 font-medium transition-colors">
                            <div class="font-bold text-slate-800">Filament Polymers (PLA, PETG, ABS, TPU) →</div>
                            <div class="text-slate-400 text-[11px] mt-0.5">Properties, temps, and tensile strength</div>
                        </a>
                        <a href="<?= Helper::url('quiz') ?>" class="block p-3 rounded-xl bg-blue-600 text-white font-bold text-center hover:bg-blue-700 transition-colors">
                            <i class="fas fa-graduation-cap mr-1"></i> Take Fundamentals Quiz
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
