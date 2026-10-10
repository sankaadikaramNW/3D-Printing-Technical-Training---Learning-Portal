<div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden p-8 sm:p-10 space-y-8">
    <div class="text-center space-y-2">
        <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-600 flex items-center justify-center text-white text-2xl shadow-lg shadow-blue-600/30">
            <i class="fas fa-cube"></i>
        </div>
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Administrator Portal</h1>
        <p class="text-slate-500 text-xs font-medium">SLAF 3D Printing Training CMS & Control Panel</p>
    </div>

    <?php require __DIR__ . '/../partials/alerts.php'; ?>

    <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-5">
        <?= csrf_field() ?>

        <div>
            <label for="username" class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Username or Email</label>
            <div class="relative">
                <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" 
                       id="username" 
                       name="username" 
                       required 
                       autofocus
                       placeholder="admin"
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 focus:bg-white transition">
            </div>
        </div>

        <div>
            <label for="password" class="block text-xs font-bold text-slate-800 uppercase tracking-wider mb-2">Password</label>
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required 
                       placeholder="••••••••"
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 focus:bg-white transition">
            </div>
        </div>

        <button type="submit" class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-600/25 transition duration-200 flex items-center justify-center gap-2 cursor-pointer">
            <span>Sign In to Dashboard</span>
            <i class="fas fa-arrow-right text-xs"></i>
        </button>
    </form>

    <div class="pt-4 border-t border-slate-100 text-center">
        <a href="<?= base_url() ?>" class="text-xs font-medium text-slate-500 hover:text-blue-600 transition flex items-center justify-center gap-1.5">
            <i class="fas fa-arrow-left text-[10px]"></i> Return to Public Training Portal
        </a>
    </div>
</div>
