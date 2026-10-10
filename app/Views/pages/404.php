<?php
use App\Core\Helper;
?>

<div class="min-h-[70vh] flex items-center justify-center py-16 px-4">
    <div class="text-center max-w-lg">
        <div class="w-24 h-24 mx-auto rounded-3xl bg-blue-100 text-blue-600 flex items-center justify-center text-4xl shadow-lg mb-6">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1 class="text-6xl font-black text-slate-900 font-heading mb-2">404</h1>
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Resource or Page Not Found</h2>
        <p class="text-slate-600 text-sm mb-8 leading-relaxed">
            The technical learning module, article, or resource you are looking for has been relocated or is temporarily unavailable.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="<?= Helper::url() ?>" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md transition-all">
                <i class="fas fa-home mr-2"></i> Return to Homepage
            </a>
            <a href="<?= Helper::url('learning') ?>" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-sm transition-all">
                <i class="fas fa-book-open mr-2"></i> Browse All Articles
            </a>
        </div>
    </div>
</div>
