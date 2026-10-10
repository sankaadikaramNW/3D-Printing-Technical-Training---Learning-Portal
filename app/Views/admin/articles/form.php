<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <a href="<?= base_url('admin/articles') ?>" class="text-xs text-blue-600 hover:underline flex items-center gap-1 mb-1">
                <i class="fas fa-arrow-left text-[10px]"></i> Back to Articles
            </a>
            <h1 class="text-2xl font-extrabold text-slate-900"><?= isset($article) ? 'Edit Article' : 'Create New Article' ?></h1>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($article) ? 'admin/articles/update/' . ($article['id'] ?? 0) : 'admin/articles/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-bold text-slate-800 uppercase mb-2">Article Title *</label>
                    <input type="text" id="title" name="title" required value="<?= e($article['title'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div>
                    <label for="category_id" class="block text-xs font-bold text-slate-800 uppercase mb-2">Category *</label>
                    <select id="category_id" name="category_id" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?? '' ?>" <?= (isset($article) && ($article['category_id'] ?? '') == ($cat['id'] ?? '')) ? 'selected' : '' ?>><?= e($cat['name'] ?? 'Category') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="summary" class="block text-xs font-bold text-slate-800 uppercase mb-2">Short Summary</label>
                <textarea id="summary" name="summary" rows="2" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600"><?= e($article['summary'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="content" class="block text-xs font-bold text-slate-800 uppercase mb-2">Article Content (HTML supported) *</label>
                <textarea id="content" name="content" rows="12" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-mono text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600"><?= e($article['content'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <?php 
                        $currDiff = strtolower($article['difficulty_level'] ?? $article['difficulty'] ?? 'beginner');
                    ?>
                    <label for="difficulty_level" class="block text-xs font-bold text-slate-800 uppercase mb-2">Difficulty Level</label>
                    <select id="difficulty_level" name="difficulty_level" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="Beginner" <?= $currDiff === 'beginner' ? 'selected' : '' ?>>Beginner</option>
                        <option value="Intermediate" <?= $currDiff === 'intermediate' ? 'selected' : '' ?>>Intermediate</option>
                        <option value="Advanced" <?= $currDiff === 'advanced' ? 'selected' : '' ?>>Advanced</option>
                    </select>
                </div>

                <div>
                    <label for="reading_time_mins" class="block text-xs font-bold text-slate-800 uppercase mb-2">Est. Reading Time (Mins)</label>
                    <input type="number" id="reading_time_mins" name="reading_time_mins" value="<?= (int)($article['reading_time_mins'] ?? $article['reading_time'] ?? 5) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" <?= (!isset($article) || !empty($article['is_published'])) ? 'checked' : '' ?> class="w-4 h-4 text-blue-600 rounded">
                        <span class="text-sm font-bold text-slate-800">Publish Immediately</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/articles') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm shadow-sm transition cursor-pointer">Save Article</button>
            </div>
        </form>
    </div>
</div>
