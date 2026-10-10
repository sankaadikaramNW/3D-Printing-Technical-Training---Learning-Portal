<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/troubleshooting') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Troubleshooting
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($issue) ? 'Edit Defect Guide' : 'Add New Defect Guide' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($issue) ? 'admin/troubleshooting/update/' . ($issue['id'] ?? 0) : 'admin/troubleshooting/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Defect Name / Issue Title *</label>
                <input type="text" id="title" name="title" required value="<?= e($issue['title'] ?? '') ?>" placeholder="e.g., Warping and Corner Lifting" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div>
                <label for="causes" class="block text-xs font-bold text-slate-700 uppercase mb-2">Root Causes *</label>
                <textarea id="causes" name="causes" rows="3" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($issue['causes'] ?? $issue['likely_causes'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="checks" class="block text-xs font-bold text-slate-700 uppercase mb-2">Diagnostic Checks</label>
                    <textarea id="checks" name="checks" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($issue['checks'] ?? $issue['symptoms'] ?? $issue['inspection_steps'] ?? '') ?></textarea>
                </div>

                <div>
                    <label for="corrective_actions" class="block text-xs font-bold text-slate-700 uppercase mb-2">Corrective Actions & Fixes *</label>
                    <textarea id="corrective_actions" name="corrective_actions" rows="4" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($issue['corrective_actions'] ?? $issue['solution'] ?? $issue['solutions'] ?? '') ?></textarea>
                </div>
            </div>

            <div>
                <label for="prevention" class="block text-xs font-bold text-slate-700 uppercase mb-2">Long-term Prevention & Best Practices</label>
                <textarea id="prevention" name="prevention" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($issue['prevention'] ?? $issue['prevention_guidelines'] ?? '') ?></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/troubleshooting') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Defect Guide</button>
            </div>
        </form>
    </div>
</div>
