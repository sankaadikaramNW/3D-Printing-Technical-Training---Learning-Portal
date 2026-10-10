<div class="max-w-4xl mx-auto space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Portal General Settings</h1>
            <p class="text-slate-500 text-xs">Configure site title, institutional contact details, and platform behavior.</p>
        </div>
        <a href="<?= base_url('admin/settings/printer-specs') ?>" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-xs flex items-center gap-2">
            <i class="fas fa-sliders-h"></i> FDM Printer Technical Specs
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url('admin/settings/update') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div class="space-y-4">
                <h3 class="text-base font-bold text-brand-navy border-b border-slate-100 pb-2">Branding & Titles</h3>
                <div>
                    <label for="site_name" class="block text-xs font-bold text-slate-700 uppercase mb-2">Display Platform Name</label>
                    <input type="text" id="site_name" name="site_name" value="<?= e(setting('site_name', 'FDM 3D Printer Technical Training Module')) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
                <div>
                    <label for="project_title" class="block text-xs font-bold text-slate-700 uppercase mb-2">Full Project Title</label>
                    <input type="text" id="project_title" name="project_title" value="<?= e(setting('project_title', 'DESIGN AND FABRICATION OF A FUSED DEPOSITION MODELING (FDM) 3D PRINTER MODULE FOR TECHNICAL TRAINING')) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
                <div>
                    <label for="site_tagline" class="block text-xs font-bold text-slate-700 uppercase mb-2">Tagline</label>
                    <input type="text" id="site_tagline" name="site_tagline" value="<?= e(setting('site_tagline', 'Learn. Design. Print. Innovate.')) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div class="space-y-4 pt-4">
                <h3 class="text-base font-bold text-brand-navy border-b border-slate-100 pb-2">Institutional Contact</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_email" class="block text-xs font-bold text-slate-700 uppercase mb-2">Contact Email</label>
                        <input type="email" id="contact_email" name="contact_email" value="<?= e(setting('contact_email', 'training.3dprinting@portal.edu.lk')) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>
                    <div>
                        <label for="contact_phone" class="block text-xs font-bold text-slate-700 uppercase mb-2">Telephone / Intercom</label>
                        <input type="text" id="contact_phone" name="contact_phone" value="<?= e(setting('contact_phone', '+94 11 234 5678')) ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save Settings</button>
            </div>
        </form>
    </div>
</div>
