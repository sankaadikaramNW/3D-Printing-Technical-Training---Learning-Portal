<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Learning Resources & Downloads</h1>
            <p class="text-slate-500 text-xs">Manage downloadable calibration guides, manuals, STL/G-code sample bundles.</p>
        </div>
        <a href="<?= base_url('admin/resources/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Resource
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Type</th>
                        <th class="py-3 px-4">Downloads</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($resources)): ?>
                        <tr><td colspan="4" class="py-8 text-center text-slate-400">No downloadable resources added yet.</td></tr>
                    <?php else: ?>
                        <?php foreach ($resources as $res): ?>
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-bold text-brand-navy"><?= e($res['title'] ?? 'Downloadable Document') ?></td>
                                <td class="py-3 px-4 text-xs uppercase font-semibold text-slate-500"><?= e($res['file_type'] ?? 'PDF') ?></td>
                                <td class="py-3 px-4 text-xs font-semibold text-slate-600"><?= (int)($res['download_count'] ?? 0) ?></td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <a href="<?= base_url('admin/resources/edit/' . ($res['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                    <a href="<?= base_url('admin/resources/delete/' . ($res['id'] ?? 0)) ?>" onclick="return confirm('Delete resource?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
