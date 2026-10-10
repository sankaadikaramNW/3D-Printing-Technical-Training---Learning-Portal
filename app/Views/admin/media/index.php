<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Media Library & File Assets</h1>
            <p class="text-slate-500 text-xs">Upload images, diagrams, schematics, and documents for embedding across courses and articles.</p>
        </div>
    </div>

    <!-- Upload Dropzone Box -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
        <form action="<?= base_url('admin/media/upload') ?>" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-center gap-4">
            <?= csrf_field() ?>
            <div class="w-full">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Select File (JPG, PNG, WebP, PDF, STL)</label>
                <input type="file" name="file" required class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition flex-shrink-0 flex items-center gap-2">
                <i class="fas fa-cloud-upload-alt"></i> Upload Asset
            </button>
        </form>
    </div>

    <!-- Media Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <?php foreach ($files as $file): ?>
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between group p-2">
                <div class="h-28 bg-slate-100 rounded-xl overflow-hidden flex items-center justify-center relative">
                    <?php if (str_starts_with($file['file_type'] ?? '', 'image/')): ?>
                        <img src="<?= asset($file['file_path'] ?? '') ?>" alt="<?= e($file['original_name'] ?? 'File') ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <i class="fas fa-file-alt text-3xl text-slate-400"></i>
                    <?php endif; ?>
                </div>
                <div class="p-2">
                    <p class="text-xs font-bold text-slate-700 truncate" title="<?= e($file['original_name'] ?? 'File') ?>"><?= e($file['original_name'] ?? 'File') ?></p>
                    <p class="text-[10px] text-slate-400 mt-0.5"><?= round(($file['file_size'] ?? 1024) / 1024, 1) ?> KB</p>
                </div>
                <div class="flex items-center justify-between px-2 pt-1 border-t border-slate-100 text-[11px]">
                    <button type="button" @click="navigator.clipboard.writeText('<?= asset($file['file_path'] ?? '') ?>'); alert('File URL copied to clipboard!');" class="text-cyan-600 hover:underline font-semibold">Copy URL</button>
                    <a href="<?= base_url('admin/media/delete/' . ($file['id'] ?? 0)) ?>" onclick="return confirm('Delete file?');" class="text-rose-600 hover:underline">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
