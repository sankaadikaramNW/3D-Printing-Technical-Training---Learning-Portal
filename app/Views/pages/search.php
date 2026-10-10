<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-14 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-4">
            Search Results for: <span class="text-cyan-400">"<?= e($query) ?>"</span>
        </h1>
        <p class="text-slate-300 text-sm sm:text-base">
            Found <strong><?= (int)$totalCount ?></strong> matches across articles, printer components, troubleshooting guides, glossary terms, and projects.
        </p>

        <!-- Search input inside header for refinement -->
        <form action="<?= base_url('search') ?>" method="GET" class="mt-6 max-w-xl">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" 
                       name="q" 
                       value="<?= e($query) ?>" 
                       placeholder="Refine search query..." 
                       class="w-full pl-11 pr-28 py-3 bg-white/10 text-white placeholder-slate-400 border border-white/20 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white/20 transition">
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-cyan-500 hover:bg-cyan-400 text-brand-navy font-bold rounded-lg text-xs transition">
                    Search
                </button>
            </div>
        </form>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <?php if (empty($results)): ?>
        <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-xl mx-auto space-y-4">
            <div class="w-16 h-16 mx-auto bg-slate-100 rounded-full flex items-center justify-center text-slate-400 text-2xl">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="text-xl font-bold text-brand-navy">No Direct Matches Found</h3>
            <p class="text-slate-500 text-sm leading-relaxed">
                We couldn't find any resources matching "<?= e($query ?? '') ?>". Try searching for keywords like <a href="<?= base_url('search?q=extruder') ?>" class="text-cyan-600 font-semibold underline">extruder</a>, <a href="<?= base_url('search?q=PLA') ?>" class="text-cyan-600 font-semibold underline">PLA</a>, <a href="<?= base_url('search?q=bed+leveling') ?>" class="text-cyan-600 font-semibold underline">bed leveling</a>, or <a href="<?= base_url('search?q=slicing') ?>" class="text-cyan-600 font-semibold underline">slicing</a>.
            </p>
        </div>
    <?php else: ?>
        <div class="space-y-6">
            <?php foreach (($results ?? []) as $item): 
                $type = (string)($item['type'] ?? 'Article');
                $url = (string)($item['url'] ?? '#');
                $title = (string)($item['title'] ?? 'Search Result');
                $snippet = (string)($item['snippet'] ?? '');
            ?>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:border-cyan-400 hover:shadow-md transition">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider
                            <?php 
                                switch($type) {
                                    case 'Article': echo 'bg-blue-100 text-blue-800'; break;
                                    case 'Component': echo 'bg-purple-100 text-purple-800'; break;
                                    case 'Troubleshooting': echo 'bg-amber-100 text-amber-800'; break;
                                    case 'Glossary': echo 'bg-emerald-100 text-emerald-800'; break;
                                    case 'Project': echo 'bg-cyan-100 text-cyan-800'; break;
                                    default: echo 'bg-slate-100 text-slate-800';
                                }
                            ?>">
                            <?= e($type) ?>
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-brand-navy mb-2">
                        <a href="<?= e($url) ?>" class="hover:text-cyan-600 transition">
                            <?= e($title) ?>
                        </a>
                    </h3>

                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        <?= e(substr(strip_tags($snippet), 0, 240)) ?>...
                    </p>

                    <a href="<?= e($url) ?>" class="inline-flex items-center gap-1 text-cyan-600 hover:text-cyan-700 font-semibold text-xs">
                        <span>View Resource</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
