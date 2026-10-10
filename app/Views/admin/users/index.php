<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-brand-navy">Administrator & Instructor Accounts</h1>
            <p class="text-slate-500 text-xs">Role-based access control (Super Admin, Content Administrator, Training Administrator, Editor).</p>
        </div>
        <a href="<?= base_url('admin/users/create') ?>" class="px-5 py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl text-sm shadow-sm flex items-center gap-2">
            <i class="fas fa-user-plus"></i> New User
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">User</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Last Login</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($users as $u): ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4">
                                <div class="font-bold text-brand-navy"><?= e($u['name'] ?? $u['full_name'] ?? $u['username'] ?? 'Unknown User') ?></div>
                                <div class="text-xs text-slate-400 font-normal"><?= e($u['username'] ?? '') ?> (<?= e($u['email'] ?? '') ?>)</div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 bg-slate-100 text-slate-800 rounded-md text-xs font-semibold"><?= e($u['role_name'] ?? $u['role'] ?? 'Super Admin') ?></span>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded-full text-xs font-bold <?= !empty($u['is_active']) ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' ?>">
                                    <?= !empty($u['is_active']) ? 'Active' : 'Disabled' ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 text-xs text-slate-400"><?= !empty($u['last_login'] ?? $u['last_login_at'] ?? null) ? time_ago($u['last_login'] ?? $u['last_login_at']) : 'Never' ?></td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="<?= base_url('admin/users/edit/' . ($u['id'] ?? 0)) ?>" class="text-cyan-600 hover:text-cyan-800 font-medium">Edit</a>
                                <?php if (($u['id'] ?? 0) != \App\Core\Auth::id()): ?>
                                    <a href="<?= base_url('admin/users/delete/' . ($u['id'] ?? 0)) ?>" onclick="return confirm('Delete user account?');" class="text-rose-600 hover:text-rose-800 font-medium">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
