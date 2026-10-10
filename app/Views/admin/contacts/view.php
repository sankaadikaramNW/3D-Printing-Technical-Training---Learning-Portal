<div class="max-w-3xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/contacts') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Messages
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy">Message Details</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8 space-y-6">
        <div class="flex items-start justify-between border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-xl font-bold text-slate-800"><?= e($message['subject'] ?? 'No Subject') ?></h3>
                <div class="text-xs text-slate-400 mt-1">Received <?= !empty($message['created_at']) ? date('F j, Y, g:i a', strtotime($message['created_at'])) : 'N/A' ?></div>
            </div>
            <a href="mailto:<?= e($message['email'] ?? '') ?>?subject=Re: <?= urlencode($message['subject'] ?? '') ?>" class="px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-xs flex items-center gap-2">
                <i class="fas fa-reply"></i> Reply via Email
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 bg-slate-50 p-4 rounded-xl text-xs text-slate-600">
            <div>
                <span class="text-slate-400 block">Sender Name</span>
                <strong class="text-slate-800 text-sm"><?= e($message['name'] ?? 'Trainee') ?></strong>
            </div>
            <div>
                <span class="text-slate-400 block">Email Address</span>
                <strong class="text-slate-800 text-sm"><?= e($message['email'] ?? '') ?></strong>
            </div>
            <?php if (!empty($message['phone'])): ?>
                <div>
                    <span class="text-slate-400 block">Phone / Intercom</span>
                    <strong class="text-slate-800"><?= e($message['phone']) ?></strong>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <span class="text-xs font-bold text-slate-700 uppercase block mb-2">Message Body</span>
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                <?= e($message['message'] ?? '') ?>
            </div>
        </div>
    </div>
</div>
