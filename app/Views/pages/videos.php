<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-rose-900/60 text-rose-400 text-xs font-bold uppercase tracking-wider border border-rose-700/60 mb-3">
                Multimedia Learning
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Video Learning Center
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                Demonstration videos covering physical printer setup, 4-corner bed leveling calibration, Cura slicing profiles, and hotend maintenance procedures.
            </p>
        </div>
    </div>
</section>

<!-- Video Grid Section -->
<section class="py-16 bg-slate-50" x-data="{ videoModal: false, activeVideoUrl: '', activeVideoTitle: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (($allVideos ?? []) as $v): 
                // Helper to extract YouTube ID if applicable
                $ytId = '';
                $videoUrl = $v['video_url'] ?? '';
                if (!empty($videoUrl) && preg_match('~(?:youtu\.be/|youtube\.com/watch\?v=)([a-zA-Z0-9_-]+)~', $videoUrl, $m)) {
                    $ytId = $m[1];
                }
                $embedUrl = $ytId ? "https://www.youtube.com/embed/$ytId?autoplay=1" : $videoUrl;
                $dur = (int)($v['duration_seconds'] ?? 0);
                $title = $v['title'] ?? 'Training Video';
                $cat = $v['category'] ?? 'Demonstration';
                $desc = $v['description'] ?? '';
            ?>
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between interactive-card">
                <div>
                    <!-- Video Thumbnail with Play Button -->
                    <div class="aspect-16/9 bg-slate-950 relative overflow-hidden group cursor-pointer"
                         @click="activeVideoUrl = '<?= addslashes((string)$embedUrl) ?>'; activeVideoTitle = '<?= addslashes((string)$title) ?>'; videoModal = true">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent z-10"></div>
                        
                        <div class="absolute inset-0 flex items-center justify-center z-20">
                            <div class="w-14 h-14 rounded-full bg-blue-600 group-hover:bg-blue-500 text-white flex items-center justify-center text-xl shadow-xl group-hover:scale-110 transition-all">
                                <i class="fas fa-play ml-1"></i>
                            </div>
                        </div>

                        <div class="absolute bottom-3 right-3 z-20 px-2.5 py-1 rounded-md bg-slate-900/90 text-white text-[10px] font-mono font-bold">
                            <?= floor($dur / 60) ?>:<?= sprintf('%02d', $dur % 60) ?>
                        </div>

                        <div class="absolute top-3 left-3 z-20 px-2.5 py-0.5 rounded-full bg-blue-900/90 text-cyan-300 text-[10px] font-bold">
                            <?= htmlspecialchars((string)$cat, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-base font-bold text-slate-900 font-heading mb-2 line-clamp-2">
                            <?= htmlspecialchars((string)$title, ENT_QUOTES, 'UTF-8') ?>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                            <?= htmlspecialchars((string)$desc, ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0">
                    <button @click="activeVideoUrl = '<?= addslashes((string)$embedUrl) ?>'; activeVideoTitle = '<?= addslashes((string)$title) ?>'; videoModal = true"
                            class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-700 text-xs font-bold transition-all flex items-center justify-center space-x-1.5 border border-slate-200">
                        <i class="fas fa-play text-xs text-blue-600"></i>
                        <span>Watch Demonstration</span>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

    <!-- Video Modal Player -->
    <div x-show="videoModal" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/90 backdrop-blur-md"
         style="display: none;">
        
        <div @click.away="videoModal = false; activeVideoUrl = ''" 
             class="relative max-w-4xl w-full bg-slate-900 rounded-3xl border border-slate-700 shadow-2xl overflow-hidden">
            
            <div class="p-4 border-b border-slate-800 flex justify-between items-center bg-slate-900">
                <h4 class="text-sm font-bold text-white truncate" x-text="activeVideoTitle"></h4>
                <button @click="videoModal = false; activeVideoUrl = ''" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-white flex items-center justify-center text-xs">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="aspect-16/9 bg-black w-full">
                <template x-if="videoModal && activeVideoUrl">
                    <iframe :src="activeVideoUrl" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </template>
            </div>

        </div>
    </div>
</section>
