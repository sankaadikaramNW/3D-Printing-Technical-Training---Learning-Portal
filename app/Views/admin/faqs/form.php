<div class="max-w-xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/faqs') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to FAQs
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($faq) ? 'Edit FAQ' : 'Add New FAQ' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($faq) ? 'admin/faqs/update/' . ($faq['id'] ?? 0) : 'admin/faqs/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="question" class="block text-xs font-bold text-slate-700 uppercase mb-2">Question Statement *</label>
                <input type="text" id="question" name="question" required value="<?= e($faq['question'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div>
                <label for="category_id" class="block text-xs font-bold text-slate-700 uppercase mb-2">Category</label>
                <select id="category_id" name="category_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?? $cat['name'] ?? '' ?>" <?= (isset($faq) && (($faq['category_id'] ?? $faq['category'] ?? '') == ($cat['id'] ?? $cat['name'] ?? ''))) ? 'selected' : '' ?>><?= e($cat['name'] ?? 'General') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="answer" class="block text-xs font-bold text-slate-700 uppercase mb-2">Answer Explanation *</label>
                <textarea id="answer" name="answer" rows="5" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($faq['answer'] ?? '') ?></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/faqs') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save FAQ</button>
            </div>
        </form>
    </div>
</div>
