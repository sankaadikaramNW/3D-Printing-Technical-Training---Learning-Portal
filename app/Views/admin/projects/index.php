<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Project Showcases & Case Studies</h1>
            <p class="text-slate-500 text-xs">Manage practical parts fabricated using the FDM module.</p>
        </div>
        <a href="<?= base_url('admin/projects/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Project
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Project Title</th>
                        <th class="py-3 px-4">Material</th>
                        <th class="py-3 px-4">Print Duration</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($projects as $proj): ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-bold text-brand-navy"><?= e($proj['title'] ?? 'Fabrication Showcase') ?></td>
                            <td class="py-3 px-4 text-xs font-semibold text-slate-700"><?= e($proj['material_used'] ?? 'PLA') ?></td>
                            <td class="py-3 px-4 text-xs text-slate-500"><?= e($proj['print_time_hours'] ?? 'N/A') ?> hrs</td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="<?= base_url('admin/projects/edit/' . ($proj['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                <a href="<?= base_url('admin/projects/delete/' . ($proj['id'] ?? 0)) ?>" onclick="return confirm('Delete project?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
