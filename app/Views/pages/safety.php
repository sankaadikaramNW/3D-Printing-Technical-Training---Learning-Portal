<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-rose-900/60 text-rose-400 text-xs font-bold uppercase tracking-wider border border-rose-700/60 mb-3">
                Laboratory Health & Hazard Mitigation
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Workshop Safety Protocols
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Mandatory institutional laboratory safety directives: thermal burn prevention, electrical fire safety, mechanical pinch points, and particulate emission ventilation.
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Golden Rule Alert Banner -->
        <div class="p-6 rounded-3xl bg-blue-900 text-white mb-12 shadow-xl border border-blue-700 flex items-start space-x-4">
            <i class="fas fa-exclamation-triangle text-amber-400 text-3xl mt-1 shrink-0"></i>
            <div>
                <h3 class="font-bold text-lg font-heading">Primary Institutional Safety Directive</h3>
                <p class="text-xs text-blue-100 mt-1 leading-relaxed">
                    Always adhere strictly to established laboratory standard operating procedures, institutional safety protocols, and technical equipment manuals. Never bypass software or hardware safety interlocks, and never operate uncertified heating elements without supervision.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- 1. Thermal Safety -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center text-xl">
                    <i class="fas fa-fire-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 font-heading">1. Thermal Hazard Management</h3>
                <ul class="space-y-2 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start"><i class="fas fa-times-circle text-rose-500 mr-2 mt-0.5"></i> <strong>Hotend Temperature (200°C–260°C):</strong> Can inflict instantaneous 3rd-degree burns. Never touch the nozzle or heater block during or within 15 minutes of operation.</li>
                    <li class="flex items-start"><i class="fas fa-times-circle text-rose-500 mr-2 mt-0.5"></i> <strong>Heated Bed Surface (60°C–100°C):</strong> Allow bed temperature to drop below 35°C before handling.</li>
                    <li class="flex items-start"><i class="fas fa-check-circle text-emerald-500 mr-2 mt-0.5"></i> <strong>Thermal Runaway Protection (TRP):</strong> Firmware TRP must be actively compiled in Marlin/Klipper to halt power if thermistor feedback decouples.</li>
                </ul>
            </div>

            <!-- 2. Electrical Safety -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 font-heading">2. Electrical & Fire Prevention</h3>
                <ul class="space-y-2 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start"><i class="fas fa-check-circle text-emerald-500 mr-2 mt-0.5"></i> <strong>Ferrule Termination:</strong> Crimp all high-current wire ends (heated bed & hotend) with insulated copper ferrules instead of tinned bare wire.</li>
                    <li class="flex items-start"><i class="fas fa-check-circle text-emerald-500 mr-2 mt-0.5"></i> <strong>Class C Fire Extinguisher:</strong> Ensure an approved dry chemical or CO2 fire extinguisher is positioned within 5 meters of the printer workbench.</li>
                    <li class="flex items-start"><i class="fas fa-times-circle text-rose-500 mr-2 mt-0.5"></i> <strong>Mains Isolation:</strong> Disconnect AC line power before servicing power supply units (PSU) or opening mainboard enclosures.</li>
                </ul>
            </div>

            <!-- 3. Mechanical Pinch Points -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 font-heading">3. Moving Axes & Pinch Points</h3>
                <ul class="space-y-2 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start"><i class="fas fa-times-circle text-rose-500 mr-2 mt-0.5"></i> <strong>Leadscrews & Belts:</strong> Keep hands, loose clothing, lanyards, and long hair tied back and away from rotating Z lead screws and high-speed GT2 pulleys.</li>
                    <li class="flex items-start"><i class="fas fa-check-circle text-emerald-500 mr-2 mt-0.5"></i> <strong>Emergency Stop:</strong> Memorize the location of the main power toggle switch to abort machine movement immediately in case of collision.</li>
                </ul>
            </div>

            <!-- 4. Fumes & Ventilation -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center text-xl">
                    <i class="fas fa-wind"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 font-heading">4. Airborne Emissions & Fume Control</h3>
                <ul class="space-y-2 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start"><i class="fas fa-times-circle text-rose-500 mr-2 mt-0.5"></i> <strong>Styrene & VOCs (ABS/ASA):</strong> Emits volatile organic compounds during thermal decomposition. Mandates active HEPA/carbon filtration or external duct exhaust.</li>
                    <li class="flex items-start"><i class="fas fa-check-circle text-emerald-500 mr-2 mt-0.5"></i> <strong>Ambient Ventilation:</strong> Ensure classroom/workshop maintains a minimum of 4–6 air changes per hour (ACH).</li>
                </ul>
            </div>

        </div>

    </div>
</section>
