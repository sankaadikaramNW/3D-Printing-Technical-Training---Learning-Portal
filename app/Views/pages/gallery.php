<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-cyan-700/60 mb-3">
                Visual Documentation
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Project & Training Gallery
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                High-resolution photographic documentation of the FDM 3D printer chassis fabrication, mechanical gantry assembly, wiring, test printing, and hands-on trainee workshops.
            </p>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 bg-slate-50" x-data="{ activeCat: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center gap-2 mb-12">
            <button @click="activeCat = 'all'" 
                    :class="activeCat === 'all' ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                    class="px-4 py-2 rounded-xl text-xs transition-all">
                All Gallery Photos
            </button>
            <?php foreach (array_keys($groupedImages) as $cat): ?>
            <button @click="activeCat = '<?= addslashes($cat) ?>'" 
                    :class="activeCat === '<?= addslashes($cat) ?>' ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                    class="px-4 py-2 rounded-xl text-xs transition-all">
                <?= htmlspecialchars($cat) ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Photos Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($allImages as $img): ?>
            <div x-show="activeCat === 'all' || activeCat === '<?= addslashes($img['category'] ?? 'General') ?>'"
                 class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden group cursor-pointer interactive-card"
                 onclick="window.openLightbox('<?= Helper::asset($img['image_url'] ?? $img['image_path'] ?? '') ?>', '<?= addslashes($img['title'] ?? '') ?>', '<?= addslashes($img['description'] ?? $img['caption'] ?? '') ?>')">
                
                <div class="aspect-4/3 bg-slate-900 relative overflow-hidden flex items-center justify-center text-slate-700 text-5xl">
                    <i class="fas fa-camera"></i>
                    
                    <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white z-20">
                        <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-lg shadow-xl scale-75 group-hover:scale-100 transition-transform">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>

                    <div class="absolute top-3 left-3 z-10">
                        <span class="px-2.5 py-0.5 rounded-full bg-slate-950/80 border border-slate-800 text-cyan-300 text-[10px] font-bold">
                            <?= htmlspecialchars($img['category'] ?? 'General') ?>
                        </span>
                    </div>

                    <?php if (!empty($img['stage_tag'])): ?>
                    <div class="absolute top-3 right-3 z-10">
                        <span class="px-2 py-0.5 rounded bg-blue-900/90 text-white text-[10px] font-mono font-bold">
                            <?= htmlspecialchars($img['stage_tag']) ?>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-slate-900 text-sm font-heading mb-1 line-clamp-1 group-hover:text-blue-600 transition-colors">
                        <?= htmlspecialchars($img['title'] ?? '') ?>
                    </h3>
                    <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                        <?= htmlspecialchars($img['description'] ?? $img['caption'] ?? '') ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
