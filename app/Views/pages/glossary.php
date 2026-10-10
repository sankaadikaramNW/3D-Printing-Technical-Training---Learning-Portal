<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-4 py-1.5 rounded-full bg-cyan-500/20 text-cyan-300 font-semibold text-xs tracking-wider uppercase inline-block mb-4 border border-cyan-500/30">
            Technical Lexicon
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">FDM 3D Printing Glossary</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-base sm:text-lg">
            Essential engineering terminology, additive manufacturing definitions, abbreviations, and mechanical hardware concepts from A to Z.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ activeLetter: 'ALL', searchTerm: '' }">
    
    <!-- Search & Filter Controls -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 mb-10 space-y-6">
        <div class="max-w-md mx-auto">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" 
                       x-model="searchTerm" 
                       placeholder="Filter glossary terms (e.g., Infill, Extruder, G-code)..." 
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:bg-white transition">
                <button x-show="searchTerm.length > 0" @click="searchTerm = ''" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
        </div>

        <!-- A-Z Letter Bar -->
        <div class="flex flex-wrap items-center justify-center gap-1.5 pt-2 border-t border-slate-100">
            <button type="button" 
                    @click="activeLetter = 'ALL'" 
                    class="px-3 py-1.5 rounded-lg text-xs font-bold transition"
                    :class="activeLetter === 'ALL' ? 'bg-brand-navy text-white' : 'bg-slate-100 hover:bg-slate-200 text-slate-700'">
                ALL
            </button>
            <?php foreach (range('A', 'Z') as $char): ?>
                <button type="button" 
                        @click="activeLetter = '<?= $char ?>'" 
                        class="w-8 h-8 rounded-lg text-xs font-bold transition flex items-center justify-center"
                        :class="activeLetter === '<?= $char ?>' ? 'bg-cyan-600 text-white shadow-sm' : 'bg-slate-100 hover:bg-slate-200 text-slate-700'">
                    <?= $char ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Terms Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach (($terms ?? []) as $term): ?>
            <?php 
                $termName = (string)($term['term'] ?? '');
                $firstChar = !empty($termName) ? strtoupper(substr($termName, 0, 1)) : '#';
                $definition = (string)($term['definition'] ?? $term['short_definition'] ?? $term['detailed_explanation'] ?? 'No definition available.');
                $relatedTopic = (string)($term['related_topic'] ?? $term['category'] ?? '');
            ?>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:border-cyan-400 hover:shadow-md transition-all duration-200"
                 x-show="(activeLetter === 'ALL' || '<?= $firstChar ?>' === activeLetter) && ('<?= addslashes(strtolower($termName)) ?>'.includes(searchTerm.toLowerCase()) || '<?= addslashes(strtolower($definition)) ?>'.includes(searchTerm.toLowerCase()))">
                
                <div class="flex items-start justify-between gap-2 mb-3">
                    <h3 class="text-xl font-bold text-brand-navy"><?= e($termName) ?></h3>
                    <span class="w-7 h-7 rounded-lg bg-cyan-50 text-cyan-700 font-extrabold text-xs flex items-center justify-center flex-shrink-0 border border-cyan-100">
                        <?= $firstChar ?>
                    </span>
                </div>

                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    <?= e($definition) ?>
                </p>

                <?php if (!empty($relatedTopic)): ?>
                    <div class="pt-3 border-t border-slate-100 flex items-center gap-1.5 text-xs text-slate-400">
                        <i class="fas fa-link text-cyan-500"></i>
                        <span>Related: <strong class="text-slate-600"><?= e($relatedTopic) ?></strong></span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>
