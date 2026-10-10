<div class="max-w-3xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/videos') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Videos
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($video) ? 'Edit Video' : 'Add New Video' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($video) ? 'admin/videos/update/' . ($video['id'] ?? 0) : 'admin/videos/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Video Title *</label>
                <input type="text" id="title" name="title" required value="<?= e($video['title'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="video_type" class="block text-xs font-bold text-slate-700 uppercase mb-2">Platform</label>
                    <select id="video_type" name="video_type" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <option value="youtube" <?= (isset($video) && in_array($video['video_type'] ?? $video['video_source'] ?? '', ['youtube', 'YouTube'])) ? 'selected' : '' ?>>YouTube</option>
                        <option value="vimeo" <?= (isset($video) && in_array($video['video_type'] ?? $video['video_source'] ?? '', ['vimeo', 'Vimeo'])) ? 'selected' : '' ?>>Vimeo</option>
                        <option value="local" <?= (isset($video) && in_array($video['video_type'] ?? $video['video_source'] ?? '', ['local', 'mp4', 'Local'])) ? 'selected' : '' ?>>Local / MP4 File</option>
                    </select>
                </div>

                <div>
                    <label for="video_url" class="block text-xs font-bold text-slate-700 uppercase mb-2">Video URL or Embed ID *</label>
                    <input type="text" id="video_url" name="video_url" required value="<?= e($video['video_url'] ?? $video['url'] ?? $video['embed_url'] ?? '') ?>" placeholder="e.g., https://www.youtube.com/watch?v=..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div>
                <label for="description" class="block text-xs font-bold text-slate-700 uppercase mb-2">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($video['description'] ?? '') ?></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/videos') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Video</button>
            </div>
        </form>
    </div>
</div>
