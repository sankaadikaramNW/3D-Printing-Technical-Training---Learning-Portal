<?php
use App\Core\Helper;
?>

<!-- ==============================================================================
     SECTION 1: PUBLIC HOMEPAGE (Provider.lk-Style Full-Width Hero & Defense Flow)
     ============================================================================== -->

<!-- Hero Section with Looping 3D Extrusion Vector/Video Animation -->
<section class="relative bg-[#0A2540] text-white overflow-hidden py-16 lg:py-24 border-b border-slate-800">
    <!-- Subtle Grid Background -->
    <div class="absolute inset-0 dark-tech-grid-pattern opacity-40 pointer-events-none"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#0A2540]/80 via-[#0A2540] to-[#0A2540] pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Left: Historic Milestone Proclamation & Value Callouts -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <!-- Historic Milestone Golden Ribbon -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/20 border border-blue-400/40 text-blue-200 text-xs font-bold tracking-wide backdrop-blur-md shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                    <span>Historic Milestone &bull; Sri Lanka Air Force</span>
                </div>

                <!-- Primary Milestone Heading -->
                <div class="space-y-3">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight leading-tight text-white">
                        The Very First Official <br class="hidden sm:inline">
                        <span class="text-blue-400">Additive Manufacturing</span> & <br class="hidden sm:inline">
                        3D Printing Concept in SLAF History
                    </h1>
                    
                    <p class="text-xs sm:text-sm font-mono font-bold text-slate-300 uppercase tracking-wider">
                        Driving Local Defense Innovation &bull; Self-Reliance &bull; Point-of-Need Supply Chain Readiness
                    </p>
                </div>

                <!-- Detailed Military Strategic Narrative -->
                <p class="text-sm sm:text-base text-slate-200 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    A breakthrough institutional engineering initiative establishing sovereign fabrication capabilities across 
                    <strong class="text-white">DGCE, DGGE, DGP</strong>, and the <strong class="text-white">IT & Avionics Trade</strong>. 
                    Enabling air-gapped parametric digital spare parts repositories, rapid aircraft maintenance tooling, and rigorous defense quality qualification.
                </p>

                <!-- Action CTAs: Launch Web App & Explore Tracks -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#interactive-suite" 
                       class="w-full sm:w-auto px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm tracking-wide shadow-xl shadow-blue-600/30 transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fas fa-laptop-code text-base"></i>
                        <span>Launch Web App Portal</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#directorates" 
                       class="w-full sm:w-auto px-8 py-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-sm border border-slate-700 hover:border-slate-500 transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fas fa-shield-halved text-blue-400"></i>
                        <span>Explore Directorate Tracks</span>
                    </a>
                </div>

                <!-- Live Key Readiness Indicators -->
                <div class="pt-6 grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-slate-800/80 text-left">
                    <div>
                        <div class="text-[11px] text-slate-400 font-semibold uppercase">Supported Branches</div>
                        <div class="text-lg font-black text-white font-mono">4 <span class="text-xs text-blue-400 font-sans">Directorates</span></div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-400 font-semibold uppercase">Intranet Protocol</div>
                        <div class="text-lg font-black text-white font-mono">100% <span class="text-xs text-emerald-400 font-sans">Air-Gapped</span></div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-400 font-semibold uppercase">Flight Quality</div>
                        <div class="text-lg font-black text-white font-mono">5-Phase <span class="text-xs text-blue-400 font-sans">Pre-Flight SOP</span></div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-400 font-semibold uppercase">Material Envelope</div>
                        <div class="text-lg font-black text-white font-mono">300°C <span class="text-xs text-amber-400 font-sans">PA-CF / PEEK</span></div>
                    </div>
                </div>

            </div>

            <!-- Hero Right: Real-Time Vector 3D Printer Extrusion Simulation -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    <div class="relative rounded-3xl bg-slate-900 border border-slate-700/90 shadow-2xl p-6 overflow-hidden">
                        
                        <!-- Machine Status HUD -->
                        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-emerald-500 animate-ping"></span>
                                <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 font-mono">EXTRUDING ACTIVE</span>
                            </div>
                            <span class="text-xs font-mono text-slate-400">SLAF-FDM-DEV-01</span>
                        </div>

                        <!-- 3D Extrusion Vector Box -->
                        <div class="my-5 rounded-2xl bg-slate-950 p-6 border border-slate-800 relative overflow-hidden h-64 flex flex-col justify-between">
                            
                            <!-- Telemetry Overlays -->
                            <div class="flex items-center justify-between text-[11px] font-mono text-slate-400">
                                <span>HOTEND: <strong class="text-blue-400">285°C</strong></span>
                                <span>BED: <strong class="text-amber-400">100°C</strong></span>
                                <span>FEED: <strong class="text-emerald-400">PA12-CF</strong></span>
                            </div>

                            <!-- Animated Layer Simulation -->
                            <div class="relative w-full h-36 flex items-center justify-center">
                                
                                <!-- Heated Bed Plate -->
                                <div class="absolute bottom-1 w-5/6 h-2 bg-slate-700 rounded-sm border-t border-slate-500"></div>

                                <!-- Building Aerospace Bracket Model -->
                                <div class="absolute bottom-3 w-3/5 bg-blue-900/70 border border-blue-500/50 rounded p-2 h-20 flex flex-col justify-end">
                                    <div class="w-full grid grid-cols-6 gap-1 opacity-70 mb-1">
                                        <div class="border-t-2 border-cyan-400 rounded-full h-3"></div>
                                        <div class="border-t-2 border-cyan-400 rounded-full h-3"></div>
                                        <div class="border-t-2 border-cyan-400 rounded-full h-3"></div>
                                        <div class="border-t-2 border-cyan-400 rounded-full h-3"></div>
                                        <div class="border-t-2 border-cyan-400 rounded-full h-3"></div>
                                        <div class="border-t-2 border-cyan-400 rounded-full h-3"></div>
                                    </div>
                                    <div class="w-full h-1 bg-blue-400 shadow-[0_0_10px_#38bdf8] rounded-full animate-pulse"></div>
                                </div>

                                <!-- Moving Nozzle Carriage -->
                                <div class="absolute z-20 animate-nozzle" style="top: 5px; left: 40%;">
                                    <svg width="36" height="46" viewBox="0 0 42 52" fill="none">
                                        <rect x="6" y="0" width="30" height="20" rx="3" fill="#64748B" stroke="#94A3B8"/>
                                        <path d="M11 20H31L26 38H16L11 20Z" fill="#F59E0B" stroke="#D97706"/>
                                        <circle cx="21" cy="46" r="2.5" fill="#0056D2"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Live Coordinate HUD -->
                            <div class="flex items-center justify-between text-[11px] font-mono text-cyan-400 border-t border-slate-900 pt-2">
                                <span>STATUS: LAYER 142 / 310</span>
                                <span>TOL: ±0.08mm</span>
                            </div>
                        </div>

                        <!-- Quick App Links -->
                        <div class="grid grid-cols-2 gap-2 pt-2">
                            <a href="<?= Helper::url('slicing-simulator') ?>" class="py-2.5 px-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl text-center transition">
                                <i class="fas fa-calculator mr-1"></i> Slicing Calculator
                            </a>
                            <a href="<?= Helper::url('preflight-checklist') ?>" class="py-2.5 px-3 bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs rounded-xl text-center transition border border-slate-700">
                                <i class="fas fa-list-check mr-1"></i> Pre-Flight Check
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==============================================================================
     DIRECTORATES & TECHNICAL TRADES GRID (DGCE, DGGE, DGP, ITAV)
     ============================================================================== -->
<section id="directorates" class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider border border-blue-100">
                Operational Branches
            </span>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                Supported SLAF Directorates & Technical Trades
            </h2>
            <p class="text-slate-600 text-sm">
                Targeted additive manufacturing solutions, digital CAD repository workflows, and qualified material profiles across Sri Lanka Air Force engineering directorates.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- 1. DGCE -->
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 flex flex-col justify-between space-y-5 hover:border-blue-500 hover:bg-white hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-black text-xs font-mono">DGCE</span>
                        <i class="fas fa-building text-slate-400 group-hover:text-emerald-600 transition"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base group-hover:text-blue-600 transition">
                        Directorate General of Civil Engineering
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Topographical site modeling, airfield conduit adapters, concrete formwork jigs, and structural scale prototyping.
                    </p>
                    <div class="pt-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Core Materials:</span>
                        <span class="text-xs font-mono font-medium text-emerald-700">PLA+, PETG, Concrete Casting TPU</span>
                    </div>
                </div>
                <a href="<?= Helper::url('directorates/dgce') ?>" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                    Explore DGCE Track <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- 2. DGGE -->
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 flex flex-col justify-between space-y-5 hover:border-blue-500 hover:bg-white hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-blue-50 text-blue-700 font-black text-xs font-mono">DGGE</span>
                        <i class="fas fa-plane text-slate-400 group-hover:text-blue-600 transition"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base group-hover:text-blue-600 transition">
                        Directorate General of General Engineering
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Aircraft maintenance holding fixtures, borescope guide brackets, cabin replacement clips, and high-strength PA-CF carbon nylon gears.
                    </p>
                    <div class="pt-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Core Materials:</span>
                        <span class="text-xs font-mono font-medium text-blue-700">PA12-CF, Polycarbonate, PEEK</span>
                    </div>
                </div>
                <a href="<?= Helper::url('directorates/dgge') ?>" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                    Explore DGGE Track <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- 3. DGP -->
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 flex flex-col justify-between space-y-5 hover:border-blue-500 hover:bg-white hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-indigo-50 text-indigo-700 font-black text-xs font-mono">DGP</span>
                        <i class="fas fa-database text-slate-400 group-hover:text-indigo-600 transition"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base group-hover:text-blue-600 transition">
                        Directorate General of Planning
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Transitioning physical spare parts into encrypted digital CAD repositories, military additive machinery qualification, and supply lead-time reduction.
                    </p>
                    <div class="pt-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Core Focus:</span>
                        <span class="text-xs font-mono font-medium text-indigo-700">Digital Twins, Standardized Polymers</span>
                    </div>
                </div>
                <a href="<?= Helper::url('directorates/dgp') ?>" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                    Explore DGP Track <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- 4. IT & Avionics -->
            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 flex flex-col justify-between space-y-5 hover:border-blue-500 hover:bg-white hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-sky-50 text-sky-700 font-black text-xs font-mono">ITAV</span>
                        <i class="fas fa-microchip text-slate-400 group-hover:text-sky-600 transition"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base group-hover:text-blue-600 transition">
                        IT & Avionics Technicians Trade
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        IP65 weatherproof radar sensor node enclosures, telemetry housings, drone payload brackets, flight simulator switch panels, and digital twins.
                    </p>
                    <div class="pt-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 block">Core Materials:</span>
                        <span class="text-xs font-mono font-medium text-sky-700">ESD-PETG, Tough Resin, TPU 95A</span>
                    </div>
                </div>
                <a href="<?= Helper::url('directorates/itav') ?>" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                    Explore ITAV Track <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

        </div>

    </div>
</section>

<!-- ==============================================================================
     3D TECHNOLOGY & MATERIALS OVERVIEW (FDM, SLA, SLS & Defense Materials)
     ============================================================================== -->
<section class="py-16 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider border border-blue-100">
                Technology Benchmarking
            </span>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                3D Printing Technologies & Aerospace Material Grades
            </h2>
            <p class="text-slate-600 text-sm">
                Comparative analysis of FDM, SLA, and SLS additive manufacturing processes with certified thermoplastic properties.
            </p>
        </div>

        <!-- 3 Tech Comparison Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <span class="text-xs font-mono font-black text-blue-600">01 / THERMAL EXTRUSION</span>
                    <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 text-[10px] font-bold">Primary SLAF Tool</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Fused Deposition Modeling (FDM / FFF)</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Continuous thermoplastic filament heated past glass-transition temperature and extruded through a 0.4mm nozzle onto a heated bed.
                </p>
                <div class="space-y-1.5 text-xs text-slate-700 font-medium">
                    <div class="flex items-center justify-between border-b border-slate-50 py-1">
                        <span class="text-slate-500">Tensile Strength:</span>
                        <span class="font-mono font-bold">45 – 140 MPa (PA-CF)</span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-50 py-1">
                        <span class="text-slate-500">Layer Resolution:</span>
                        <span class="font-mono font-bold">0.08 – 0.32 mm</span>
                    </div>
                    <div class="flex items-center justify-between py-1">
                        <span class="text-slate-500">Best Application:</span>
                        <span class="font-bold text-blue-700">Flight line tooling & fixtures</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <span class="text-xs font-mono font-black text-indigo-600">02 / PHOTOPOLYMERIZATION</span>
                    <span class="px-2 py-0.5 rounded bg-indigo-50 text-indigo-700 text-[10px] font-bold">High Precision</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Stereolithography (SLA / MSLA)</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    405nm UV light selectively solidifies liquid resin layer by layer through a 12K LCD mask for microscopic dimensional fidelity.
                </p>
                <div class="space-y-1.5 text-xs text-slate-700 font-medium">
                    <div class="flex items-center justify-between border-b border-slate-50 py-1">
                        <span class="text-slate-500">Tensile Strength:</span>
                        <span class="font-mono font-bold">50 – 75 MPa</span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-50 py-1">
                        <span class="text-slate-500">Layer Resolution:</span>
                        <span class="font-mono font-bold">0.01 – 0.05 mm (10μm)</span>
                    </div>
                    <div class="flex items-center justify-between py-1">
                        <span class="text-slate-500">Best Application:</span>
                        <span class="font-bold text-indigo-700">Avionics sensors & connectors</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <span class="text-xs font-mono font-black text-purple-600">03 / POWDER BED FUSION</span>
                    <span class="px-2 py-0.5 rounded bg-purple-50 text-purple-700 text-[10px] font-bold">Supportless</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Selective Laser Sintering (SLS)</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    High-powered $CO_2$ laser sinters polymer powder (Nylon PA12) without requiring support structures for complex internal manifolds.
                </p>
                <div class="space-y-1.5 text-xs text-slate-700 font-medium">
                    <div class="flex items-center justify-between border-b border-slate-50 py-1">
                        <span class="text-slate-500">Tensile Strength:</span>
                        <span class="font-mono font-bold">48 – 65 MPa Isotropic</span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-50 py-1">
                        <span class="text-slate-500">Layer Resolution:</span>
                        <span class="font-mono font-bold">0.06 – 0.12 mm</span>
                    </div>
                    <div class="flex items-center justify-between py-1">
                        <span class="text-slate-500">Best Application:</span>
                        <span class="font-bold text-purple-700">Fuel & hydraulic ducting</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ==============================================================================
     SECTION 2: THE INTERACTIVE WEB APPLICATION (Trainee & Instructor Suite)
     ============================================================================== -->
<section id="interactive-suite" class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider border border-blue-100">
                Interactive Learning Web Applications
            </span>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                Trainee & Technician Interactive Tools
            </h2>
            <p class="text-slate-600 text-sm">
                Built-in air-gapped web applications providing real-time slicing calculation, subsystem anatomy diagnostics, 5-phase pre-flight clearance, and video tutorial archives.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Tool 1: Slicing Calculator -->
            <a href="<?= Helper::url('slicing-simulator') ?>" class="bg-slate-50 rounded-3xl border border-slate-200 p-7 flex flex-col justify-between space-y-6 hover:bg-white hover:border-blue-600 hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-xl shadow-md shadow-blue-600/20 group-hover:scale-110 transition">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition">
                        Slicing Simulator & Cost App
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Calculate part mass, print duration, and production costs based on live density ($\rho$) and volume ($V$).
                    </p>
                </div>
                <div class="text-xs font-bold text-blue-600 flex items-center gap-1">
                    Launch Simulator <i class="fas fa-arrow-right text-[10px]"></i>
                </div>
            </a>

            <!-- Tool 2: Hardware Anatomy Viewer -->
            <a href="<?= Helper::url('hardware-anatomy') ?>" class="bg-slate-50 rounded-3xl border border-slate-200 p-7 flex flex-col justify-between space-y-6 hover:bg-white hover:border-blue-600 hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-600 text-white flex items-center justify-center text-xl shadow-md shadow-indigo-600/20 group-hover:scale-110 transition">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition">
                        Hardware Anatomy Viewer
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Subsystem inspection of hotend, extruder, heated bed, stepper rails, and 32-bit controller maintenance.
                    </p>
                </div>
                <div class="text-xs font-bold text-blue-600 flex items-center gap-1">
                    Inspect Subsystems <i class="fas fa-arrow-right text-[10px]"></i>
                </div>
            </a>

            <!-- Tool 3: 5-Phase Pre-Flight Checklist -->
            <a href="<?= Helper::url('preflight-checklist') ?>" class="bg-slate-50 rounded-3xl border border-slate-200 p-7 flex flex-col justify-between space-y-6 hover:bg-white hover:border-blue-600 hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center text-xl shadow-md shadow-emerald-600/20 group-hover:scale-110 transition">
                        <i class="fas fa-list-check"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition">
                        5-Phase Pre-Flight Checklist
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Rigorous 15-point flight qualification checklist before executing additive manufacturing jobs.
                    </p>
                </div>
                <div class="text-xs font-bold text-blue-600 flex items-center gap-1">
                    Open Pre-Flight Tool <i class="fas fa-arrow-right text-[10px]"></i>
                </div>
            </a>

            <!-- Tool 4: Video Training Hub -->
            <a href="<?= Helper::url('videos') ?>" class="bg-slate-50 rounded-3xl border border-slate-200 p-7 flex flex-col justify-between space-y-6 hover:bg-white hover:border-blue-600 hover:shadow-xl transition-all duration-300 group">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-rose-600 text-white flex items-center justify-center text-xl shadow-md shadow-rose-600/20 group-hover:scale-110 transition">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition">
                        Video Lecture Library
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Searchable, filterable gallery of video tutorials classified by Directorate and technical trade.
                    </p>
                </div>
                <div class="text-xs font-bold text-blue-600 flex items-center gap-1">
                    Browse Lectures <i class="fas fa-arrow-right text-[10px]"></i>
                </div>
            </a>

        </div>

    </div>
</section>

<!-- ==============================================================================
     STRUCTURED 8-MODULE TRAINING CURRICULUM OVERVIEW
     ============================================================================== -->
<section class="py-16 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider border border-blue-100">
                    SLAF Trainee Curriculum
                </span>
                <h2 class="text-3xl font-black text-slate-900 tracking-tight mt-2">
                    8-Module Certified Additive Training Syllabus
                </h2>
                <p class="text-slate-600 text-sm mt-1">From fundamental thermodynamics to aerospace-grade composite slicing and metrology.</p>
            </div>
            <a href="<?= Helper::url('training') ?>" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition shadow-sm shrink-0">
                View Full Curriculum &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach (array_slice($trainingModules ?? [], 0, 8) as $m): ?>
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:border-blue-500 hover:shadow-md transition flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-mono font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded">MOD 0<?= (int)$m['module_number'] ?></span>
                            <span class="text-slate-400 text-[11px]"><?= htmlspecialchars($m['estimated_hours'] ?? '2 Hours') ?></span>
                        </div>
                        <h3 class="text-sm font-bold text-slate-900 line-clamp-2"><?= htmlspecialchars($m['title']) ?></h3>
                        <p class="text-xs text-slate-500 line-clamp-2"><?= htmlspecialchars($m['description']) ?></p>
                    </div>
                    <a href="<?= Helper::url('training') ?>" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                        Explore Lessons <i class="fas fa-chevron-right text-[9px]"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ==============================================================================
     INSTRUCTOR & CMS BANNER
     ============================================================================== -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-[#0A2540] via-[#0F172A] to-[#0A2540] rounded-3xl p-8 sm:p-12 text-white flex flex-col lg:flex-row items-center justify-between gap-8 shadow-2xl border border-slate-800">
            <div class="space-y-3 max-w-2xl text-center lg:text-left">
                <span class="px-3.5 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold border border-blue-400/30 uppercase tracking-wider">
                    Administrative Access
                </span>
                <h3 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                    SLAF Instructor & Course Administrator Portal
                </h3>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    Manage training modules, edit hardware maintenance specifications, upload defense video demonstrations, configure directorate curricula, and inspect audit logs.
                </p>
            </div>
            <div class="shrink-0 flex items-center gap-4">
                <a href="<?= Helper::url('admin/login') ?>" 
                   class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-xl shadow-xl shadow-blue-600/30 transition flex items-center gap-2 cursor-pointer">
                    <i class="fas fa-lock"></i>
                    <span>Instructor Admin Login</span>
                </a>
            </div>
        </div>
    </div>
</section>
