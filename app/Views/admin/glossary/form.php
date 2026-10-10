<div class="max-w-xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/glossary') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Glossary
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($term) ? 'Edit Glossary Term' : 'Add New Term' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($term) ? 'admin/glossary/update/' . ($term['id'] ?? 0) : 'admin/glossary/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="term" class="block text-xs font-bold text-slate-700 uppercase mb-2">Term Name *</label>
                <input type="text" id="term" name="term" required value="<?= e($term['term'] ?? '') ?>" placeholder="e.g., Bowden Tube" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div>
                <label for="definition" class="block text-xs font-bold text-slate-700 uppercase mb-2">Technical Definition *</label>
                <textarea id="definition" name="definition" rows="4" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($term['definition'] ?? $term['short_definition'] ?? $term['detailed_explanation'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="related_topic" class="block text-xs font-bold text-slate-700 uppercase mb-2">Related Discipline / Module</label>
                <input type="text" id="related_topic" name="related_topic" value="<?= e($term['related_topic'] ?? $term['category'] ?? '') ?>" placeholder="e.g., Extrusion Subsystem" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/glossary') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Term</button>
            </div>
        </form>
    </div>
</div>
