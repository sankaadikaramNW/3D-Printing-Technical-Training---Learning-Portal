<div class="max-w-xl mx-auto space-y-6">
    <div>
        <a href="<?= base_url('admin/users') ?>" class="text-xs text-cyan-600 hover:underline flex items-center gap-1 mb-1">
            <i class="fas fa-arrow-left text-[10px]"></i> Back to Users
        </a>
        <h1 class="text-2xl font-extrabold text-brand-navy"><?= isset($user) ? 'Edit User' : 'Create User Account' ?></h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sm:p-8">
        <form action="<?= base_url(isset($user) ? 'admin/users/update/' . ($user['id'] ?? 0) : 'admin/users/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 uppercase mb-2">Full Name *</label>
                <input type="text" id="name" name="name" required value="<?= e($user['name'] ?? $user['full_name'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="block text-xs font-bold text-slate-700 uppercase mb-2">Username *</label>
                    <input type="text" id="username" name="username" required value="<?= e($user['username'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase mb-2">Email Address *</label>
                    <input type="email" id="email" name="email" required value="<?= e($user['email'] ?? '') ?>" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase mb-2">Password <?= isset($user) ? '(Leave empty to keep current)' : '*' ?></label>
                    <input type="password" id="password" name="password" <?= isset($user) ? '' : 'required' ?> class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </div>

                <div>
                    <label for="role_id" class="block text-xs font-bold text-slate-700 uppercase mb-2">Role *</label>
                    <select id="role_id" name="role_id" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?= $role['id'] ?? $role['name'] ?? '' ?>" <?= (isset($user) && (($user['role_id'] ?? $user['role'] ?? '') == ($role['id'] ?? $role['name'] ?? ''))) ? 'selected' : '' ?>><?= e($role['name'] ?? 'Role') ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="flex items-center">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" <?= (!isset($user) || !empty($user['is_active'])) ? 'checked' : '' ?> class="w-4 h-4 text-cyan-600 rounded">
                    <span class="text-sm font-bold text-slate-800">Account Active</span>
                </label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="<?= base_url('admin/users') ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl text-sm shadow-sm transition">Save User</button>
            </div>
        </form>
    </div>
</div>
