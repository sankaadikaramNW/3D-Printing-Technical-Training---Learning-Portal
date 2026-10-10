<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <a href="<?= base_url('admin/quizzes') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
                <i class="fas fa-arrow-left text-[10px]"></i> Back to Quizzes
            </a>
            <h1 class="text-2xl font-extrabold text-brand-navy">Manage Questions: <?= e($quiz['title'] ?? 'Quiz') ?></h1>
        </div>
    </div>

    <!-- Existing Questions List -->
    <div class="space-y-6">
        <?php if (empty($questions)): ?>
            <div class="bg-white rounded-2xl p-8 text-center text-slate-400 border border-slate-200">
                No questions added to this quiz yet. Add your first question below.
            </div>
        <?php else: ?>
            <?php foreach ($questions as $idx => $q): ?>
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <span class="w-8 h-8 rounded-lg bg-slate-100 text-brand-navy font-bold flex items-center justify-center text-sm flex-shrink-0">
                                <?= $idx + 1 ?>
                            </span>
                            <div>
                                <h3 class="font-bold text-slate-800 text-base"><?= e($q['question_text'] ?? '') ?></h3>
                                <?php if (!empty($q['explanation'])): ?>
                                    <p class="text-xs text-slate-500 mt-1"><i class="fas fa-info-circle text-cyan-600"></i> <?= e($q['explanation']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a href="<?= base_url('admin/quizzes/delete-question/' . ($q['id'] ?? 0)) ?>" onclick="return confirm('Delete this question?');" class="text-rose-600 hover:text-rose-800 text-xs font-semibold">Delete</a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2 border-t border-slate-100 text-xs">
                        <?php foreach ((is_array($q['answers'] ?? null) ? $q['answers'] : []) as $ans): ?>
                            <div class="p-2.5 rounded-lg border <?= !empty($ans['is_correct']) ? 'border-emerald-300 bg-emerald-50 text-emerald-900 font-bold' : 'border-slate-100 bg-slate-50 text-slate-600' ?>">
                                <?= e($ans['answer_text'] ?? '') ?>
                                <?php if (!empty($ans['is_correct'])): ?>
                                    <span class="text-[10px] bg-emerald-600 text-white px-1.5 py-0.5 rounded ml-2">Correct</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Add Question Form -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
        <h3 class="text-lg font-bold text-brand-navy border-b border-slate-100 pb-3">Add New Multiple Choice Question</h3>

        <form action="<?= base_url('admin/quizzes/store-question/' . ($quiz['id'] ?? 0)) ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="question_text" class="block text-xs font-bold text-slate-700 uppercase mb-2">Question Statement *</label>
                <textarea id="question_text" name="question_text" rows="2" required placeholder="e.g., What does FDM stand for in additive manufacturing?" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>
            </div>

            <div>
                <label for="explanation" class="block text-xs font-bold text-slate-700 uppercase mb-2">Technical Explanation</label>
                <textarea id="explanation" name="explanation" rows="2" placeholder="Explanation displayed to learner after grading..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>
            </div>

            <div class="space-y-3">
                <label class="block text-xs font-bold text-slate-700 uppercase">Answer Choices (Check the radio button for the correct answer)</label>

                <?php for ($i = 1; $i <= 4; $i++): ?>
                    <div class="flex items-center gap-3">
                        <input type="radio" name="correct_answer_index" value="<?= $i ?>" <?= $i === 1 ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600">
                        <input type="text" name="answers[]" required placeholder="Option <?= $i ?>" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="pt-4 border-t border-slate-100">
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">
                    <i class="fas fa-plus mr-1"></i> Add Question to Quiz
                </button>
            </div>
        </form>
    </div>
</div>
