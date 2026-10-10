<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            <div class="flex items-center space-x-3 text-xs">
                <a href="<?= Helper::url('learning') ?>" class="text-cyan-400 hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Articles
                </a>
                <span class="text-slate-600">•</span>
                <span class="px-2.5 py-0.5 rounded-full bg-blue-900 text-cyan-300 font-bold font-mono">
                    <?= htmlspecialchars((string)($article['category_name'] ?? 'Technical Guide'), ENT_QUOTES, 'UTF-8') ?>
                </span>
                <span class="px-2.5 py-0.5 rounded-full bg-slate-800 text-slate-300 font-bold">
                    <?= htmlspecialchars((string)($article['difficulty_level'] ?? 'Intermediate'), ENT_QUOTES, 'UTF-8') ?> Level
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight leading-tight">
                <?= htmlspecialchars((string)($article['title'] ?? 'Technical Article'), ENT_QUOTES, 'UTF-8') ?>
            </h1>

            <div class="flex items-center space-x-4 text-xs text-slate-400 pt-2 border-t border-slate-800">
                <span><i class="far fa-user mr-1 text-blue-400"></i> <?= htmlspecialchars((string)($article['author_name'] ?? 'Training Officer'), ENT_QUOTES, 'UTF-8') ?></span>
                <span>•</span>
                <span><i class="far fa-clock mr-1 text-cyan-400"></i> <?= (int)($article['reading_time_mins'] ?? 5) ?> min read</span>
                <span>•</span>
                <span><i class="far fa-eye mr-1 text-emerald-400"></i> <?= number_format((int)($article['views_count'] ?? 0)) ?> views</span>
                <span>•</span>
                <span><?= date('F j, Y', strtotime((string)($article['created_at'] ?? 'now'))) ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content Body -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Summary Box -->
        <?php if (!empty($article['summary'])): ?>
        <div class="p-6 rounded-3xl bg-blue-50/50 border border-blue-200 text-slate-800 text-sm italic mb-10 leading-relaxed">
            <?= htmlspecialchars((string)$article['summary'], ENT_QUOTES, 'UTF-8') ?>
        </div>
        <?php endif; ?>

        <!-- Rich Body -->
        <div class="article-content prose prose-slate max-w-none">
            <?= $article['content'] ?? '<p>No content available.</p>' ?>
        </div>

        <!-- Author Bio Footer -->
        <div class="mt-16 pt-8 border-t border-slate-200 flex items-center space-x-4 bg-slate-50 p-6 rounded-3xl">
            <div class="w-12 h-12 rounded-2xl bg-blue-700 text-white font-bold flex items-center justify-center text-lg shadow-md shrink-0">
                <?= strtoupper(substr((string)($article['author_name'] ?? 'T'), 0, 1)) ?>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 text-sm"><?= htmlspecialchars((string)($article['author_name'] ?? 'Technical Training Officer'), ENT_QUOTES, 'UTF-8') ?></h4>
                <p class="text-xs text-slate-500"><?= htmlspecialchars((string)($article['author_role'] ?? 'Additive Manufacturing Specialist & Lead Instructor'), ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </div>

        <!-- Related Articles -->
        <?php if (!empty($relatedArticles)): ?>
        <div class="mt-16 pt-12 border-t border-slate-200">
            <h3 class="text-xl font-bold text-slate-900 font-heading mb-6">Related Technical Articles</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <?php foreach ($relatedArticles as $rel): ?>
                <a href="<?= Helper::url('learning/article/' . ($rel['slug'] ?? '')) ?>" class="p-5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-blue-400 transition-all block">
                    <span class="text-[10px] font-bold text-blue-600 uppercase font-mono"><?= htmlspecialchars((string)($rel['difficulty_level'] ?? 'Beginner'), ENT_QUOTES, 'UTF-8') ?></span>
                    <h4 class="font-bold text-slate-900 text-sm font-heading mt-1 line-clamp-2"><?= htmlspecialchars((string)($rel['title'] ?? 'Technical Article'), ENT_QUOTES, 'UTF-8') ?></h4>
                    <p class="text-xs text-slate-500 mt-1 line-clamp-2"><?= htmlspecialchars((string)($rel['summary'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>
