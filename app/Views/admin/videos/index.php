<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Video Learning Management</h1>
            <p class="text-slate-500 text-xs">Manage YouTube, Vimeo, and local video tutorials.</p>
        </div>
        <a href="<?= base_url('admin/videos/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> New Video
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Video Title</th>
                        <th class="py-3 px-4">Platform</th>
                        <th class="py-3 px-4">Duration</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($videos as $vid): ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-bold text-brand-navy"><?= e($vid['title'] ?? 'Untitled Video') ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded text-xs uppercase font-semibold bg-slate-100 text-slate-700"><?= e($vid['video_type'] ?? $vid['video_source'] ?? 'YouTube') ?></span>
                            </td>
                            <td class="py-3 px-4 text-xs text-slate-500"><?= e(!empty($vid['duration_seconds']) ? gmdate("i:s", (int)$vid['duration_seconds']) : (!empty($vid['duration_mins']) ? $vid['duration_mins'].' mins' : 'N/A')) ?></td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="<?= base_url('admin/videos/edit/' . ($vid['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                <a href="<?= base_url('admin/videos/delete/' . ($vid['id'] ?? 0)) ?>" onclick="return confirm('Delete video?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
