<div class="max-w-xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/training') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Training
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($module) ? 'Edit Training Module' : 'Create Training Module' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($module) ? 'admin/training/update-module/' . ($module['id'] ?? 0) : 'admin/training/store-module') ?>" method="POST" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Module Title *</label>
                <input type="text" id="title" name="title" required value="<?= e($module['title'] ?? '') ?>" placeholder="e.g., Module 01: FDM Fundamentals" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 uppercase mb-2">Module Description</label>
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($module['description'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="order_num" class="block text-xs font-bold text-slate-700 uppercase mb-2">Sequence Order Number</label>
                <input type="number" id="order_num" name="order_num" value="<?= (int)($module['order_num'] ?? $module['module_number'] ?? 1) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/training') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Module</button>
            </div>
        </form>
    </div>
</div>
