<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Filament Material Database</h1>
            <p class="text-slate-500 text-xs">Manage printing polymers, extrusion temperatures, bed adhesion, and safety notes.</p>
        </div>
        <a href="<?= base_url('admin/materials/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Material
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Material</th>
                        <th class="py-3 px-4">Full Name</th>
                        <th class="py-3 px-4">Nozzle Temp</th>
                        <th class="py-3 px-4">Bed Temp</th>
                        <th class="py-3 px-4">Difficulty</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($materials as $mat): ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-bold text-brand-navy"><?= e($mat['code'] ?? '') ?></td>
                            <td class="py-3 px-4 text-xs"><?= e($mat['name'] ?? '') ?></td>
                            <td class="py-3 px-4 text-xs font-mono font-semibold"><?= e($mat['nozzle_temp_range'] ?? '200-220°C') ?></td>
                            <td class="py-3 px-4 text-xs font-mono font-semibold"><?= e($mat['bed_temp_range'] ?? '50-60°C') ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded text-xs font-semibold bg-cyan-50 text-cyan-800 capitalize"><?= e($mat['difficulty'] ?? 'easy') ?></span>
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="<?= base_url('admin/materials/edit/' . ($mat['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                <a href="<?= base_url('admin/materials/delete/' . ($mat['id'] ?? 0)) ?>" onclick="return confirm('Delete material?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
