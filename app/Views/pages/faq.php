<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-4 py-1.5 rounded-full bg-cyan-500/20 text-cyan-300 font-semibold text-xs tracking-wider uppercase inline-block mb-4 border border-cyan-500/30">
            Frequently Asked Questions
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">Technical FAQs & Help Center</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-base sm:text-lg">
            Answers to common queries regarding the FDM 3D printer training module, slicing parameters, safety protocols, and maintenance procedures.
        </p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16" x-data="{ activeCategory: 'all', openFaq: null }">
    
    <!-- Category Tabs -->
    <?php if (!empty($categories)): ?>
        <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
            <button type="button" 
                    @click="activeCategory = 'all'" 
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold transition"
                    :class="activeCategory === 'all' ? 'bg-brand-navy text-white shadow-sm' : 'bg-white hover:bg-slate-100 text-slate-700 border border-slate-200'">
                All Questions
            </button>
            <?php foreach ($categories as $cat): ?>
                <button type="button" 
                        @click="activeCategory = '<?= (string)($cat['id'] ?? '') ?>'" 
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold transition"
                        :class="activeCategory === '<?= (string)($cat['id'] ?? '') ?>' ? 'bg-brand-navy text-white shadow-sm' : 'bg-white hover:bg-slate-100 text-slate-700 border border-slate-200'">
                    <?= e($cat['name'] ?? 'General') ?>
                </button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- FAQ Accordion List -->
    <div class="space-y-4">
        <?php foreach (($faqs ?? []) as $index => $faq): ?>
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm transition"
                 x-show="activeCategory === 'all' || activeCategory === '<?= (string)($faq['category_id'] ?? '') ?>'">
                
                <button type="button" 
                        @click="openFaq === <?= (int)$index ?> ? openFaq = null : openFaq = <?= (int)$index ?>"
                        class="w-full text-left p-6 flex items-center justify-between gap-4 font-bold text-slate-800 hover:text-cyan-600 transition">
                    <span class="text-base sm:text-lg flex items-center gap-3">
                        <i class="fas fa-question-circle text-cyan-600"></i>
                        <span><?= e($faq['question'] ?? 'Frequently Asked Question') ?></span>
                    </span>
                    <i class="fas fa-chevron-down text-sm transition-transform duration-200 text-slate-400"
                       :class="openFaq === <?= (int)$index ?> ? 'rotate-180 text-cyan-600' : ''"></i>
                </button>

                <div x-show="openFaq === <?= (int)$index ?>" 
                     x-collapse 
                     class="px-6 pb-6 pt-2 text-slate-600 text-sm leading-relaxed border-t border-slate-100 bg-slate-50/50">
                    <?= nl2br(e($faq['answer'] ?? 'No answer provided yet.')) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Contact support box -->
    <div class="mt-14 bg-gradient-to-r from-cyan-50 to-blue-50 border border-cyan-200 rounded-3xl p-8 text-center">
        <h3 class="text-xl font-bold text-brand-navy mb-2">Have a specific technical question?</h3>
        <p class="text-slate-600 text-sm mb-6 max-w-lg mx-auto">
            If your inquiry is not answered above, submit a technical support request to our training instructors and engineering team.
        </p>
        <a href="<?= base_url('contact') ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl shadow-sm transition">
            <i class="fas fa-envelope"></i> Contact Engineering Team
        </a>
    </div>

</div>
