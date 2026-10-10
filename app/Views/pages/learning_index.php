<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Knowledge Base & Documentation
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Technical Articles & Learning Center
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                In-depth educational articles, engineering whitepapers, and operational guides covering the full spectrum of additive manufacturing.
            </p>
        </div>
    </div>
</section>

<!-- Articles Catalog -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-2 mb-12">
            <a href="<?= Helper::url('learning') ?>" 
               class="px-4 py-2 rounded-xl text-xs transition-all <?= empty($selectedCategory) ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' ?>">
                All Topics
            </a>
            <?php foreach (($categories ?? []) as $cat): 
                $slug = (string)($cat['slug'] ?? '');
                $catName = (string)($cat['name'] ?? 'General');
            ?>
            <a href="<?= Helper::url('learning?category=' . urlencode($slug)) ?>" 
               class="px-4 py-2 rounded-xl text-xs transition-all <?= (!empty($selectedCategory) && $selectedCategory === $slug) ? 'bg-blue-600 text-white font-bold shadow-md shadow-blue-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' ?>">
                <?= htmlspecialchars($catName, ENT_QUOTES, 'UTF-8') ?>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (($articles ?? []) as $art): 
                $artSlug = (string)($art['slug'] ?? $art['id'] ?? '');
                $artTitle = (string)($art['title'] ?? 'Technical Article');
                $diff = (string)($art['difficulty_level'] ?? 'Beginner');
                $readingTime = (int)($art['reading_time_mins'] ?? 5);
                $createdAt = (string)($art['created_at'] ?? 'now');
                $summary = (string)($art['summary'] ?? '');
                $views = (int)($art['views_count'] ?? 0);
            ?>
            <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between interactive-card">
                <div>
                    <div class="aspect-16/9 bg-slate-900 relative overflow-hidden flex items-center justify-center text-slate-700 text-5xl">
                        <i class="fas fa-file-alt"></i>
                        <div class="absolute top-4 left-4 z-20">
                            <span class="px-2.5 py-1 rounded-full bg-blue-600/90 text-white text-[10px] font-bold uppercase tracking-wider backdrop-blur-md">
                                <?= htmlspecialchars($diff, ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="text-[11px] text-slate-400 font-medium mb-2 flex items-center space-x-2">
                            <span><i class="far fa-clock mr-1"></i> <?= $readingTime ?> min read</span>
                            <span>•</span>
                            <span><?= date('M j, Y', strtotime($createdAt)) ?></span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-lg font-heading mb-2 line-clamp-2 hover:text-blue-600 transition-colors">
                            <a href="<?= Helper::url('learning/article/' . $artSlug) ?>">
                                <?= htmlspecialchars($artTitle, ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                            <?= htmlspecialchars($summary, ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-slate-100 mt-4 flex items-center justify-between">
                    <span class="text-[11px] text-slate-400">
                        <i class="far fa-eye mr-1"></i> <?= number_format($views) ?> views
                    </span>
                    <a href="<?= Helper::url('learning/article/' . $artSlug) ?>" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center space-x-1">
                        <span>Read Article</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>
