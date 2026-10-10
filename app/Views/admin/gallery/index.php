<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Project Fabrication Gallery</h1>
            <p class="text-slate-500 text-xs">Manage workshop photos, printer assembly snapshots, and printed artifacts.</p>
        </div>
        <a href="<?= base_url('admin/gallery/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> Upload Photo
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($images as $img): ?>
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm flex flex-col justify-between group">
                <div class="relative h-44 overflow-hidden bg-slate-100">
                    <img src="<?= asset($img['image_path'] ?? $img['image_url'] ?? '') ?>" alt="<?= e($img['title'] ?? 'Fabrication Artifact') ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-slate-800 text-sm truncate"><?= e($img['title'] ?? 'Fabrication Artifact') ?></h4>
                    <p class="text-xs text-slate-400 mt-1 capitalize"><?= e($img['category'] ?? 'Assembly') ?></p>
                </div>
                <div class="p-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs">
                    <a href="<?= base_url('admin/gallery/edit/' . ($img['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-semibold">Edit</a>
                    <a href="<?= base_url('admin/gallery/delete/' . ($img['id'] ?? 0)) ?>" onclick="return confirm('Delete photo?');" class="text-rose-600 hover:text-rose-800 font-semibold">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
