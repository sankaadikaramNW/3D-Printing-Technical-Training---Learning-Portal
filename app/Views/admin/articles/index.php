<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Article & Guide Management</h1>
            <p class="text-slate-500 text-xs">Create, edit, and organize educational articles and technical guides.</p>
        </div>
        <a href="<?= base_url('admin/articles/create') ?>" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2 transition">
            <i class="fas fa-plus"></i> New Article
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Difficulty</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Created</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($articles)): ?>
                        <tr><td colspan="6" class="py-8 text-center text-slate-400">No articles found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($articles as $art): ?>
                            <?php
                                $diff = strtolower($art['difficulty_level'] ?? $art['difficulty'] ?? 'beginner');
                            ?>
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 font-semibold text-slate-900">
                                    <?= e($art['title'] ?? 'Untitled Article') ?>
                                    <div class="text-xs text-slate-400 font-normal">/learning/article/<?= e($art['slug'] ?? ($art['id'] ?? '')) ?></div>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 bg-slate-100 text-slate-700 rounded-md text-xs"><?= e($art['category_name'] ?? 'General') ?></span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-0.5 rounded text-xs font-semibold
                                        <?= $diff === 'beginner' ? 'bg-emerald-100 text-emerald-800' : ($diff === 'intermediate' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800') ?>">
                                        <?= ucfirst($diff) ?>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-bold <?= !empty($art['is_published']) ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' ?>">
                                        <?= !empty($art['is_published']) ? 'Published' : 'Draft' ?>
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-xs text-slate-500"><?= !empty($art['created_at']) ? date('M d, Y', strtotime($art['created_at'])) : 'N/A' ?></td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <a href="<?= base_url('admin/articles/edit/' . ($art['id'] ?? 0)) ?>" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                    <a href="<?= base_url('admin/articles/delete/' . ($art['id'] ?? 0)) ?>" onclick="return confirm('Are you sure you want to delete this article?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
