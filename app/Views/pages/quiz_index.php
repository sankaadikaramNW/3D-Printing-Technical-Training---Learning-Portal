<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-4 py-1.5 rounded-full bg-cyan-500/20 text-cyan-300 font-semibold text-xs tracking-wider uppercase inline-block mb-4 border border-cyan-500/30">
            Interactive Knowledge Assessment
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">Technical Knowledge Quizzes</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-base sm:text-lg">
            Evaluate your understanding of FDM 3D printing concepts, mechanical components, materials, slicing parameters, and troubleshooting protocols.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <?php if (empty($quizzes)): ?>
        <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 shadow-sm max-w-xl mx-auto">
            <div class="w-16 h-16 mx-auto mb-4 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 text-2xl">
                <i class="fas fa-clipboard-question"></i>
            </div>
            <h3 class="text-xl font-bold text-brand-navy mb-2">No Quizzes Published Yet</h3>
            <p class="text-slate-500 text-sm">Our training instructors are preparing new assessment modules. Please check back shortly!</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach (($quizzes ?? []) as $quiz): 
                $title = (string)($quiz['title'] ?? 'Technical Assessment');
                $category = (string)($quiz['category_name'] ?? 'General Assessment');
                $qCount = (int)($quiz['question_count'] ?? 10);
                $desc = (string)($quiz['description'] ?? 'Test your technical competency with multiple choice questions with instant explanations.');
                $pass = (int)($quiz['pass_mark'] ?? $quiz['passing_percentage'] ?? 70);
                $timeLimit = (int)($quiz['time_limit_minutes'] ?? $quiz['time_limit_mins'] ?? 0);
                $slug = (string)($quiz['slug'] ?? $quiz['id'] ?? '');
            ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl border border-slate-200 overflow-hidden transition-all duration-300 flex flex-col justify-between group">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-700 rounded-full text-xs font-semibold border border-cyan-100">
                                <?= e($category) ?>
                            </span>
                            <span class="text-xs text-slate-500 flex items-center gap-1 font-medium">
                                <i class="fas fa-question-circle text-cyan-500"></i> <?= $qCount ?> Questions
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-cyan-600 transition">
                            <?= e($title) ?>
                        </h3>
                        
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                            <?= e($desc) ?>
                        </p>
                        
                        <div class="grid grid-cols-2 gap-3 py-3 px-4 bg-slate-50 rounded-xl text-xs text-slate-600 mb-6">
                            <div>
                                <span class="text-slate-400 block">Passing Mark</span>
                                <strong class="text-slate-800 text-sm"><?= $pass ?>%</strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block">Time Limit</span>
                                <strong class="text-slate-800 text-sm"><?= $timeLimit > 0 ? $timeLimit . ' mins' : 'Self-Paced' ?></strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-slate-50 border-t border-slate-100">
                        <a href="<?= base_url('quiz/' . $slug) ?>" class="block w-full text-center py-3 bg-brand-navy hover:bg-cyan-600 text-white font-bold rounded-xl transition duration-200 shadow-sm flex items-center justify-center gap-2">
                            <span>Start Assessment</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
