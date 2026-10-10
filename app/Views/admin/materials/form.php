<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/materials') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Materials
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($material) ? 'Edit Material' : 'Add New Material' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($material) ? 'admin/materials/update/' . ($material['id'] ?? 0) : 'admin/materials/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="code" class="block text-xs font-bold text-slate-700 uppercase mb-2">Short Code (e.g., PLA) *</label>
                    <input type="text" id="code" name="code" required value="<?= e($material['code'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div class="sm:col-span-2">
                    <label for="name" class="block text-xs font-bold text-slate-700 uppercase mb-2">Full Chemical / Material Name *</label>
                    <input type="text" id="name" name="name" required value="<?= e($material['name'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="nozzle_temp_range" class="block text-xs font-bold text-slate-700 uppercase mb-2">Nozzle Temp Range</label>
                    <input type="text" id="nozzle_temp_range" name="nozzle_temp_range" value="<?= e($material['nozzle_temp_range'] ?? $material['print_temp_nozzle'] ?? '200-220°C') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="bed_temp_range" class="block text-xs font-bold text-slate-700 uppercase mb-2">Bed Temp Range</label>
                    <input type="text" id="bed_temp_range" name="bed_temp_range" value="<?= e($material['bed_temp_range'] ?? $material['print_temp_bed'] ?? '50-60°C') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="difficulty" class="block text-xs font-bold text-slate-700 uppercase mb-2">Print Difficulty</label>
                    <select id="difficulty" name="difficulty" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <option value="easy" <?= (isset($material) && ($material['difficulty'] ?? '') === 'easy') ? 'selected' : '' ?>>Easy (Beginner)</option>
                        <option value="moderate" <?= (isset($material) && ($material['difficulty'] ?? '') === 'moderate') ? 'selected' : '' ?>>Moderate (Intermediate)</option>
                        <option value="difficult" <?= (isset($material) && ($material['difficulty'] ?? '') === 'difficult') ? 'selected' : '' ?>>Difficult (Advanced)</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 uppercase mb-2">Overview & Characteristics</label>
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($material['description'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="advantages" class="block text-xs font-bold text-slate-700 uppercase mb-2">Advantages</label>
                    <textarea id="advantages" name="advantages" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($material['advantages'] ?? '') ?></textarea>
                </div>

                <div>
                    <label for="limitations" class="block text-xs font-bold text-slate-700 uppercase mb-2">Limitations & Storage</label>
                    <textarea id="limitations" name="limitations" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($material['limitations'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/materials') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Material</button>
            </div>
        </form>
    </div>
</div>
