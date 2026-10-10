<?php
use App\Core\Helper;
?>

<!-- Global Footer -->
<footer class="bg-[#0A2540] text-slate-300 border-t border-slate-800 text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            
            <!-- Brand & Project Identity -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-md">
                        <i class="fas fa-cube text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-blue-400 uppercase tracking-wider">Sri Lanka Air Force</div>
                        <div class="text-lg font-bold text-white font-heading">Additive Manufacturing Platform</div>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-slate-300 max-w-md">
                    The very first official Additive Manufacturing & 3D Printing concept in SLAF history. Established to drive local defense innovation, sovereign spare-part rapid prototyping, and digital warehouse readiness.
                </p>
                <div class="pt-2 flex items-center space-x-3 text-xs text-slate-300">
                    <span class="px-2.5 py-1 rounded bg-slate-800 border border-slate-700 text-blue-400 font-mono">PHP 8.2+</span>
                    <span class="px-2.5 py-1 rounded bg-slate-800 border border-slate-700 text-emerald-400 font-mono">Air-Gapped Intranet</span>
                    <span class="px-2.5 py-1 rounded bg-slate-800 border border-slate-700 text-cyan-400 font-mono">4 Directorates</span>
                </div>
            </div>

            <!-- Directorates Column -->
            <div class="space-y-3">
                <h4 class="text-white font-bold text-sm uppercase tracking-wider font-heading">SLAF Directorates</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="<?= Helper::url('directorates/dgce') ?>" class="hover:text-blue-400 transition-colors">DGCE (Civil Engineering)</a></li>
                    <li><a href="<?= Helper::url('directorates/dgge') ?>" class="hover:text-blue-400 transition-colors">DGGE (General Engineering)</a></li>
                    <li><a href="<?= Helper::url('directorates/dgp') ?>" class="hover:text-blue-400 transition-colors">DGP (Planning & CAD)</a></li>
                    <li><a href="<?= Helper::url('directorates/itav') ?>" class="hover:text-blue-400 transition-colors">IT & Avionics Trade</a></li>
                    <li><a href="<?= Helper::url('directorates') ?>" class="hover:text-blue-400 transition-colors font-bold text-blue-400">All Defense Tracks &rarr;</a></li>
                </ul>
            </div>

            <!-- Interactive App Tools -->
            <div class="space-y-3">
                <h4 class="text-white font-bold text-sm uppercase tracking-wider font-heading">Interactive Apps</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="<?= Helper::url('slicing-simulator') ?>" class="hover:text-blue-400 transition-colors">Slicing Simulator & Cost App</a></li>
                    <li><a href="<?= Helper::url('hardware-anatomy') ?>" class="hover:text-blue-400 transition-colors">Hardware Anatomy Viewer</a></li>
                    <li><a href="<?= Helper::url('preflight-checklist') ?>" class="hover:text-blue-400 transition-colors">5-Phase Pre-Flight Checklist</a></li>
                    <li><a href="<?= Helper::url('videos') ?>" class="hover:text-blue-400 transition-colors">Video Lecture Library</a></li>
                    <li><a href="<?= Helper::url('quiz') ?>" class="hover:text-blue-400 transition-colors">Knowledge Quizzes</a></li>
                    <li><a href="<?= Helper::url('troubleshooting') ?>" class="hover:text-blue-400 transition-colors">Troubleshooting Matrix</a></li>
                </ul>
            </div>

            <!-- Project & Admin -->
            <div class="space-y-3">
                <h4 class="text-white font-bold text-sm uppercase tracking-wider font-heading">System & Access</h4>
                <ul class="space-y-2 text-xs">
                    <li><a href="<?= Helper::url('training') ?>" class="hover:text-blue-400 transition-colors">8-Module Training Syllabus</a></li>
                    <li><a href="<?= Helper::url('materials') ?>" class="hover:text-blue-400 transition-colors">Defense Materials Database</a></li>
                    <li><a href="<?= Helper::url('projects') ?>" class="hover:text-blue-400 transition-colors">Engineering Project Showcase</a></li>
                    <li><a href="<?= Helper::url('about-project') ?>" class="hover:text-blue-400 transition-colors">About The Project</a></li>
                    <li><a href="<?= Helper::url('admin/login') ?>" class="hover:text-blue-300 transition-colors font-bold text-blue-400 flex items-center gap-1.5"><i class="fas fa-lock text-[10px]"></i> Instructor Admin Login</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Copyright -->
        <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-4">
            <div>
                © <?= date('Y') ?> Sri Lanka Air Force (SLAF) Additive Manufacturing & 3D Printing Platform. Built for Air-Gapped Intranet Servers.
            </div>
            <div class="flex items-center space-x-4">
                <span>Learn. Design. Print. Innovate.</span>
                <span>•</span>
                <a href="<?= Helper::url('admin/login') ?>" class="hover:text-slate-300 text-slate-500 transition-colors" title="Administrative Access">
                    <i class="fas fa-lock text-[10px]"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
