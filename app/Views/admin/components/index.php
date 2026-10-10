<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Printer Component Repository</h1>
            <p class="text-slate-500 text-xs">Manage hardware parts, mechanical specs, functions, and maintenance protocols.</p>
        </div>
        <a href="<?= base_url('admin/components/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Component
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Component Name</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Function Summary</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($components)): ?>
                        <tr><td colspan="4" class="py-8 text-center text-slate-400">No printer components registered.</td></tr>
                    <?php else: ?>
                        <?php foreach ($components as $comp): ?>
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-semibold text-brand-navy"><?= e($comp['name'] ?? 'Unnamed Component') ?></td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-1 bg-cyan-50 text-cyan-800 rounded-md text-xs font-semibold"><?= e($comp['category_name'] ?? $comp['category'] ?? 'General') ?></span>
                                </td>
                                <td class="py-3 px-4 text-xs text-slate-500 truncate max-w-xs"><?= e($comp['function_summary'] ?? $comp['subtitle'] ?? $comp['function_description'] ?? 'No summary provided.') ?></td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <a href="<?= base_url('admin/components/edit/' . ($comp['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                    <a href="<?= base_url('admin/components/delete/' . ($comp['id'] ?? 0)) ?>" onclick="return confirm('Delete this component?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
