<div class="max-w-xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/gallery') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Gallery
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($image) ? 'Edit Gallery Photo' : 'Upload Gallery Photo' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($image) ? 'admin/gallery/update/' . ($image['id'] ?? 0) : 'admin/gallery/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Photo Title *</label>
                <input type="text" id="title" name="title" required value="<?= e($image['title'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div>
                <label for="category" class="block text-xs font-bold text-slate-700 uppercase mb-2">Category</label>
                <select id="category" name="category" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    <option value="fabrication" <?= (isset($image) && ($image['category'] ?? '') === 'fabrication') ? 'selected' : '' ?>>Fabrication & Machining</option>
                    <option value="assembly" <?= (isset($image) && ($image['category'] ?? '') === 'assembly') ? 'selected' : '' ?>>Mechanical Assembly</option>
                    <option value="electronics" <?= (isset($image) && ($image['category'] ?? '') === 'electronics') ? 'selected' : '' ?>>Electronics & Wiring</option>
                    <option value="testing" <?= (isset($image) && ($image['category'] ?? '') === 'testing') ? 'selected' : '' ?>>Testing & Calibration</option>
                    <option value="training" <?= (isset($image) && ($image['category'] ?? '') === 'training') ? 'selected' : '' ?>>Training Workshops</option>
                    <option value="printed_parts" <?= (isset($image) && ($image['category'] ?? '') === 'printed_parts') ? 'selected' : '' ?>>Printed Artifacts</option>
                </select>
            </div>

            <div>
                <label for="image_file" class="block text-xs font-bold text-slate-700 uppercase mb-2">Image File <?= isset($image) ? '(Leave empty to keep current)' : '*' ?></label>
                <input type="file" id="image_file" name="image_file" accept="image/*" <?= isset($image) ? '' : 'required' ?> class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
            </div>

            <div>
                <label for="caption" class="block text-xs font-bold text-slate-700 uppercase mb-2">Caption / Description</label>
                <textarea id="caption" name="caption" rows="3" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"><?= e($image['caption'] ?? '') ?></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/gallery') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Photo</button>
            </div>
        </form>
    </div>
</div>
