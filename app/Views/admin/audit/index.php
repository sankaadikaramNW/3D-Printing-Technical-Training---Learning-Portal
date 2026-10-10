<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-extrabold text-brand-navy">System Audit Trail & Security Logs</h1>
        <p class="text-slate-500 text-xs">Immutable security log of admin operations, authentication events, content modifications, and settings updates.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Timestamp</th>
                        <th class="py-3 px-4">Admin User</th>
                        <th class="py-3 px-4">Action</th>
                        <th class="py-3 px-4">Module</th>
                        <th class="py-3 px-4">Details</th>
                        <th class="py-3 px-4">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-mono text-xs">
                    <?php if (empty($logs)): ?>
                        <tr><td colspan="6" class="py-8 text-center text-slate-400 font-sans">No audit records found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($logs as $log): ?>
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-3 px-4 text-slate-400 whitespace-nowrap"><?= e($log['created_at'] ?? 'N/A') ?></td>
                                <td class="py-3 px-4 font-bold text-brand-navy font-sans"><?= e($log['admin_name'] ?? 'System') ?></td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-0.5 rounded uppercase font-bold text-[10px]
                                        <?php 
                                            switch(strtolower($log['action'] ?? '')) {
                                                case 'create': case 'insert': echo 'bg-emerald-100 text-emerald-800'; break;
                                                case 'update': case 'edit': echo 'bg-blue-100 text-blue-800'; break;
                                                case 'delete': echo 'bg-rose-100 text-rose-800'; break;
                                                case 'login': echo 'bg-purple-100 text-purple-800'; break;
                                                default: echo 'bg-slate-100 text-slate-800';
                                            }
                                        ?>">
                                        <?= e($log['action'] ?? 'LOG') ?>
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-cyan-800 font-bold"><?= e($log['module'] ?? 'general') ?></td>
                                <td class="py-3 px-4 text-slate-600 truncate max-w-xs font-sans"><?= e($log['details'] ?? '-') ?></td>
                                <td class="py-3 px-4 text-slate-400"><?= e($log['ip_address'] ?? '127.0.0.1') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
