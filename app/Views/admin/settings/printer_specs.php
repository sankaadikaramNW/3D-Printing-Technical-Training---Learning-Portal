<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <a href="<?= base_url('admin/settings') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
                <i class="fas fa-arrow-left text-[10px]"></i> Back to Settings
            </a>
            <h1 class="text-2xl font-extrabold text-brand-navy">FDM Printer Technical Specifications</h1>
            <p class="text-slate-500 text-xs">Manage dynamic machine parameters displayed across public learning pages and capstone showcases.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url('admin/settings/printer-specs/update') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <?php foreach ($specs as $spec): ?>
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-2">
                        <label for="spec_<?= $spec['id'] ?>" class="block text-xs font-bold text-slate-700 uppercase">
                            <?= e($spec['spec_name']) ?>
                            <?php if (!empty($spec['unit'])): ?>
                                <span class="text-slate-400 font-normal">(<?= e($spec['unit']) ?>)</span>
                            <?php endif; ?>
                        </label>
                        <input type="text" 
                               id="spec_<?= $spec['id'] ?>" 
                               name="specs[<?= $spec['id'] ?>]" 
                               value="<?= e($spec['spec_value']) ?>" 
                               class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-brand-navy focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/settings') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">
                    <i class="fas fa-save mr-1"></i> Update Machine Specs
                </button>
            </div>
        </form>
    </div>
</div>
