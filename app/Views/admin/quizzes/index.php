<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Quiz & Assessment Management</h1>
            <p class="text-slate-500 text-xs">Create knowledge assessments, configure passing criteria, and manage question banks.</p>
        </div>
        <a href="<?= base_url('admin/quizzes/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Quiz
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Quiz Title</th>
                        <th class="py-3 px-4">Questions</th>
                        <th class="py-3 px-4">Pass Mark</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($quizzes as $quiz): ?>
                        <?php $isPublished = !empty($quiz['is_published']) || !empty($quiz['is_active']); ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-bold text-brand-navy">
                                <?= e($quiz['title'] ?? 'Untitled Quiz') ?>
                                <div class="text-xs text-slate-400 font-normal">/quiz/<?= e($quiz['slug'] ?? ($quiz['id'] ?? '')) ?></div>
                            </td>
                            <td class="py-3 px-4 text-xs font-semibold text-slate-600"><?= (int)($quiz['question_count'] ?? 0) ?> questions</td>
                            <td class="py-3 px-4 text-xs font-bold text-emerald-600"><?= (int)($quiz['pass_mark'] ?? 70) ?>%</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded-full text-xs font-bold <?= $isPublished ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' ?>">
                                    <?= $isPublished ? 'Active' : 'Draft' ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="<?= base_url('admin/quizzes/questions/' . ($quiz['id'] ?? 0)) ?>" class="text-indigo-600 hover:text-indigo-800 font-medium">Manage Questions</a>
                                <a href="<?= base_url('admin/quizzes/edit/' . ($quiz['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                <a href="<?= base_url('admin/quizzes/delete/' . ($quiz['id'] ?? 0)) ?>" onclick="return confirm('Delete quiz?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
