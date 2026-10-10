<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Glossary Lexicon</h1>
            <p class="text-slate-500 text-xs">Manage additive manufacturing definitions and terms.</p>
        </div>
        <a href="<?= base_url('admin/glossary/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Term
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Term</th>
                        <th class="py-3 px-4">Definition</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($terms as $term): ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-bold text-brand-navy"><?= e($term['term'] ?? '') ?></td>
                            <td class="py-3 px-4 text-xs text-slate-600 truncate max-w-md"><?= e($term['definition'] ?? $term['short_definition'] ?? $term['detailed_explanation'] ?? 'No definition available.') ?></td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="<?= base_url('admin/glossary/edit/' . ($term['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                <a href="<?= base_url('admin/glossary/delete/' . ($term['id'] ?? 0)) ?>" onclick="return confirm('Delete term?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
