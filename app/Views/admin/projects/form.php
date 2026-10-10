<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/projects') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Projects
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($project) ? 'Edit Project Showcase' : 'Add New Project Showcase' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($project) ? 'admin/projects/update/' . ($project['id'] ?? 0) : 'admin/projects/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Project Title *</label>
                    <input type="text" id="title" name="title" required value="<?= e($project['title'] ?? '') ?>" placeholder="e.g., UAV Avionics Modular Sensor Mount" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="material_used" class="block text-xs font-bold text-slate-700 uppercase mb-2">Material *</label>
                    <input type="text" id="material_used" name="material_used" value="<?= e($project['material_used'] ?? 'PLA+') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label for="print_time_hours" class="block text-xs font-bold text-slate-700 uppercase mb-2">Print Time (Hours)</label>
                    <input type="number" step="0.1" id="print_time_hours" name="print_time_hours" value="<?= e($project['print_time_hours'] ?? '4.5') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="layer_height" class="block text-xs font-bold text-slate-700 uppercase mb-2">Layer Height</label>
                    <input type="text" id="layer_height" name="layer_height" value="<?= e($project['layer_height'] ?? '0.20 mm') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="infill_percentage" class="block text-xs font-bold text-slate-700 uppercase mb-2">Infill %</label>
                    <input type="number" id="infill_percentage" name="infill_percentage" value="<?= (int)($project['infill_percentage'] ?? 25) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div>
                <label for="objective" class="block text-xs font-bold text-slate-700 uppercase mb-2">Project Objective</label>
                <textarea id="objective" name="objective" rows="2" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($project['objective'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 uppercase mb-2">Design & Slicing Breakdown</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($project['description'] ?? '') ?></textarea>
            </div>

            <div>
                <label for="lessons_learned" class="block text-xs font-bold text-slate-700 uppercase mb-2">Lessons Learned & Insights</label>
                <textarea id="lessons_learned" name="lessons_learned" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($project['lessons_learned'] ?? '') ?></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/projects') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Project</button>
            </div>
        </form>
    </div>
</div>
