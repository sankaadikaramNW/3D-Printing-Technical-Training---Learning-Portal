<div class="max-w-xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/quizzes') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Quizzes
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($quiz) ? 'Edit Quiz' : 'Create New Quiz' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($quiz) ? 'admin/quizzes/update/' . ($quiz['id'] ?? 0) : 'admin/quizzes/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Quiz Title *</label>
                <input type="text" id="title" name="title" required value="<?= e($quiz['title'] ?? '') ?>" placeholder="e.g., FDM 3D Printing Fundamentals Quiz" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 uppercase mb-2">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($quiz['description'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="pass_mark" class="block text-xs font-bold text-slate-700 uppercase mb-2">Passing Mark (%)</label>
                    <input type="number" id="pass_mark" name="pass_mark" value="<?= (int)($quiz['pass_mark'] ?? 70) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="time_limit_minutes" class="block text-xs font-bold text-slate-700 uppercase mb-2">Time Limit (Mins)</label>
                    <input type="number" id="time_limit_minutes" name="time_limit_minutes" value="<?= e($quiz['time_limit_minutes'] ?? '') ?>" placeholder="0 for Self-paced" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div class="flex items-center">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" <?= (!isset($quiz) || !empty($quiz['is_published']) || !empty($quiz['is_active'])) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 rounded">
                    <span class="text-sm font-bold text-slate-800">Publish Immediately</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/quizzes') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Quiz</button>
            </div>
        </form>
    </div>
</div>
