<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <a href="<?= base_url('admin/training') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
                <i class="fas fa-arrow-left text-[10px]"></i> Back to Training
            </a>
            <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($lesson) ? 'Edit Lesson' : 'Create New Lesson' ?></h1>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($lesson) ? 'admin/training/update-lesson/' . ($lesson['id'] ?? 0) : 'admin/training/store-lesson') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Lesson Title *</label>
                    <input type="text" id="title" name="title" required value="<?= e($lesson['title'] ?? '') ?>" placeholder="e.g., Lesson 01: What is 3D Printing?" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="module_id" class="block text-xs font-bold text-slate-700 uppercase mb-2">Module *</label>
                    <select id="module_id" name="module_id" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <?php foreach ($modules as $mod): ?>
                            <option value="<?= $mod['id'] ?? '' ?>" <?= (isset($lesson) && ($lesson['module_id'] ?? '') == ($mod['id'] ?? '')) ? 'selected' : '' ?>><?= e($mod['title'] ?? 'Module') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="summary" class="block text-xs font-bold text-slate-700 uppercase mb-2">Short Summary</label>
                <textarea id="summary" name="summary" rows="2" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($lesson['summary'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="content" class="block text-xs font-bold text-slate-700 uppercase mb-2">Lesson Content (HTML supported) *</label>
                <textarea id="content" name="content" rows="12" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($lesson['content'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="duration_minutes" class="block text-xs font-bold text-slate-700 uppercase mb-2">Duration (Mins)</label>
                    <input type="number" id="duration_minutes" name="duration_minutes" value="<?= (int)($lesson['duration_minutes'] ?? $lesson['duration_mins'] ?? 15) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <?php $lesDiff = strtolower($lesson['difficulty'] ?? $lesson['difficulty_level'] ?? 'beginner'); ?>
                    <label for="difficulty" class="block text-xs font-bold text-slate-700 uppercase mb-2">Difficulty</label>
                    <select id="difficulty" name="difficulty" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <option value="beginner" <?= $lesDiff === 'beginner' ? 'selected' : '' ?>>Beginner</option>
                        <option value="intermediate" <?= $lesDiff === 'intermediate' ? 'selected' : '' ?>>Intermediate</option>
                        <option value="advanced" <?= $lesDiff === 'advanced' ? 'selected' : '' ?>>Advanced</option>
                    </select>
                </div>

                <div>
                    <label for="order_num" class="block text-xs font-bold text-slate-700 uppercase mb-2">Sequence Order Number</label>
                    <input type="number" id="order_num" name="order_num" value="<?= (int)($lesson['order_num'] ?? $lesson['lesson_number'] ?? 1) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/training') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Lesson</button>
            </div>
        </form>
    </div>
</div>
