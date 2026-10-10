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
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Select File (JPG, PNG, WebP, SVG, PDF, STL)</label>
                <input type="file" name="file" required class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition flex-shrink-0 flex items-center gap-2">
                <i class="fas fa-cloud-upload-alt"></i> Upload Asset
            </button>
        </form>
    </div>

    <?php $fileList = $files ?? $mediaFiles ?? []; ?>

    <!-- Media Grid -->
    <?php if (!empty($fileList)): ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php foreach ($fileList as $file): ?>
                <?php 
                    $fileName = $file['file_name'] ?? $file['original_name'] ?? 'File';
                    $filePath = $file['file_path'] ?? '';
                    $fileType = strtolower($file['file_type'] ?? '');
                    $mimeType = strtolower($file['mime_type'] ?? '');
                    $isImage = str_starts_with($mimeType, 'image/') || in_array($fileType, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg']);
                    $fileSizeKB = round(($file['file_size'] ?? 1024) / 1024, 1);
                ?>
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between group p-2 hover:border-cyan-400 transition">
                    <div class="h-28 bg-slate-100 rounded-xl overflow-hidden flex items-center justify-center relative">
                        <?php if ($isImage && !empty($filePath)): ?>
                            <img src="<?= images_asset($filePath) ?>" alt="<?= e($fileName) ?>" class="w-full h-full object-cover">
                        <?php elseif ($fileType === 'pdf'): ?>
                            <i class="fas fa-file-pdf text-3xl text-rose-500"></i>
                        <?php elseif (in_array($fileType, ['stl', 'obj', '3mf'])): ?>
                            <i class="fas fa-cube text-3xl text-cyan-600"></i>
                        <?php else: ?>
                            <i class="fas fa-file-alt text-3xl text-slate-400"></i>
                        <?php endif; ?>
                    </div>
                    <div class="p-2">
                        <p class="text-xs font-bold text-slate-700 truncate" title="<?= e($fileName) ?>"><?= e($fileName) ?></p>
                        <p class="text-[10px] text-slate-400 mt-0.5"><?= $fileSizeKB ?> KB</p>
                    </div>
                    <div class="flex items-center justify-between px-2 pt-1 border-t border-slate-100 text-[11px]">
                        <button type="button" onclick="navigator.clipboard.writeText('<?= asset($filePath) ?>'); alert('File URL copied to clipboard: <?= asset($filePath) ?>');" class="text-cyan-600 hover:underline font-semibold">Copy URL</button>
                        <a href="<?= base_url('admin/media/delete/' . ($file['id'] ?? 0)) ?>" onclick="return confirm('Delete this media asset?');" class="text-rose-600 hover:underline">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-2xl p-12 text-center border border-slate-200">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fas fa-images"></i>
            </div>
            <h3 class="text-slate-800 font-bold text-base mb-1">No Media Files Uploaded</h3>
            <p class="text-slate-500 text-xs max-w-sm mx-auto">Upload images, diagrams, schematics, 3D STL files, or training PDFs using the uploader above.</p>
        </div>
    <?php endif; ?>
</div>
