<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/components') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Components
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($component) ? 'Edit Printer Component' : 'Add New Printer Component' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($component) ? 'admin/components/update/' . ($component['id'] ?? 0) : 'admin/components/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold text-slate-700 uppercase mb-2">Component Name *</label>
                    <input type="text" id="name" name="name" required value="<?= e($component['name'] ?? '') ?>" placeholder="e.g., Direct-Drive Extruder" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="category_id" class="block text-xs font-bold text-slate-700 uppercase mb-2">Category *</label>
                    <select id="category_id" name="category_id" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?? $cat['name'] ?? '' ?>" <?= (isset($component) && (($component['category_id'] ?? $component['category'] ?? '') == ($cat['id'] ?? $cat['name'] ?? ''))) ? 'selected' : '' ?>><?= e($cat['name'] ?? 'Category') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="function_summary" class="block text-xs font-bold text-slate-700 uppercase mb-2">Function Summary *</label>
                <textarea id="function_summary" name="function_summary" rows="2" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($component['function_summary'] ?? $component['subtitle'] ?? $component['function_description'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="working_principle" class="block text-xs font-bold text-slate-700 uppercase mb-2">Working Principle / Operation Details</label>
                <textarea id="working_principle" name="working_principle" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($component['working_principle'] ?? $component['operating_principle'] ?? $component['description'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="common_issues" class="block text-xs font-bold text-slate-700 uppercase mb-2">Common Failure Modes & Issues</label>
                    <textarea id="common_issues" name="common_issues" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($component['common_issues'] ?? $component['troubleshooting_tips'] ?? $component['common_problems'] ?? '') ?></textarea>
                </div>

                <div>
                    <label for="maintenance_info" class="block text-xs font-bold text-slate-700 uppercase mb-2">Maintenance Protocols</label>
                    <textarea id="maintenance_info" name="maintenance_info" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($component['maintenance_info'] ?? $component['maintenance_guide'] ?? $component['maintenance_tips'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/components') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Component</button>
            </div>
        </form>
    </div>
</div>
