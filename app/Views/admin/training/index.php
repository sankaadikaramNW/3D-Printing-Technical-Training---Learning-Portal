<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Training Modules & Curriculum</h1>
            <p class="text-slate-500 text-xs">Manage sequential learning modules, lessons, and competencies.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= base_url('admin/training/create-module') ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl text-xs flex items-center gap-2 transition">
                <i class="fas fa-folder-plus text-blue-600"></i> New Module
            </a>
            <a href="<?= base_url('admin/training/create-lesson') ?>" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2 transition">
                <i class="fas fa-plus"></i> New Lesson
            </a>
        </div>
    </div>

    <div class="space-y-6">
        <?php foreach ($modules as $mod): ?>
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-5 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-blue-600 text-white font-bold text-xs flex items-center justify-center">
                            M<?= (int)($mod['module_number'] ?? $mod['order_num'] ?? 1) ?>
                        </span>
                        <div>
                            <h3 class="font-bold text-slate-900 text-base"><?= e($mod['title'] ?? 'Untitled Module') ?></h3>
                            <p class="text-xs text-slate-500"><?= e($mod['description'] ?? '') ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="<?= base_url('admin/training/module/edit/' . ($mod['id'] ?? 0)) ?>" class="text-xs text-blue-600 hover:underline font-semibold">Edit Module</a>
                    </div>
                </div>

                <div class="divide-y divide-slate-100">
                    <?php if (empty($mod['lessons'])): ?>
                        <div class="p-4 text-center text-xs text-slate-400">No lessons created in this module yet.</div>
                    <?php else: ?>
                        <?php foreach ($mod['lessons'] as $les): ?>
                            <div class="p-4 flex items-center justify-between hover:bg-slate-50/50 text-sm">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-bold text-slate-400">L<?= (int)($les['lesson_number'] ?? $les['order_num'] ?? 1) ?></span>
                                    <div>
                                        <h4 class="font-semibold text-slate-900"><?= e($les['title'] ?? 'Lesson') ?></h4>
                                        <div class="flex items-center gap-2 text-xs text-slate-400 mt-0.5">
                                            <span><?= (int)($les['duration_mins'] ?? $les['duration_minutes'] ?? 15) ?> mins</span>
                                            <span>•</span>
                                            <span class="capitalize"><?= e($les['difficulty_level'] ?? $les['difficulty'] ?? $mod['difficulty_level'] ?? 'Beginner') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 text-xs">
                                    <a href="<?= base_url('admin/training/lesson/edit/' . ($les['id'] ?? 0)) ?>" class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                    <form action="<?= base_url('admin/training/lesson/delete/' . ($les['id'] ?? 0)) ?>" method="POST" class="inline" onsubmit="return confirm('Delete this lesson?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="text-rose-600 hover:text-rose-800 font-semibold cursor-pointer">Delete</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
