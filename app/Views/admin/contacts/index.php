<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-extrabold text-brand-navy">Inquiries & Contact Messages</h1>
        <p class="text-slate-500 text-xs">Review submissions from trainees, instructors, and external engineering inquiries.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">From</th>
                        <th class="py-3 px-4">Subject</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($messages)): ?>
                        <tr><td colspan="5" class="py-8 text-center text-slate-400">No contact messages received.</td></tr>
                    <?php else: ?>
                        <?php foreach ($messages as $msg): ?>
                            <tr class="hover:bg-slate-50/50 <?= empty($msg['is_read']) ? 'bg-cyan-50/30 font-semibold' : '' ?>">
                                <td class="py-3 px-4">
                                    <div class="text-slate-800"><?= e($msg['name'] ?? 'Trainee') ?></div>
                                    <div class="text-xs text-slate-400 font-normal"><?= e($msg['email'] ?? '') ?></div>
                                </td>
                                <td class="py-3 px-4 text-slate-700 truncate max-w-xs"><?= e($msg['subject'] ?? 'No subject') ?></td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-0.5 rounded-full text-xs font-bold <?= !empty($msg['is_read']) ? 'bg-slate-100 text-slate-600' : 'bg-cyan-100 text-cyan-800' ?>">
                                        <?= !empty($msg['is_read']) ? 'Read' : 'New' ?>
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-xs text-slate-400"><?= !empty($msg['created_at']) ? date('M d, Y H:i', strtotime($msg['created_at'])) : 'N/A' ?></td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <a href="<?= base_url('admin/contacts/view/' . ($msg['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">View</a>
                                    <a href="<?= base_url('admin/contacts/delete/' . ($msg['id'] ?? 0)) ?>" onclick="return confirm('Delete message?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
