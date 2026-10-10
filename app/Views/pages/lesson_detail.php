<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-3">
            <div class="flex items-center space-x-2 text-xs">
                <a href="<?= Helper::url('training') ?>" class="text-cyan-400 hover:underline">
                    <i class="fas fa-arrow-left mr-1"></i> All Modules
                </a>
                <span class="text-slate-600">•</span>
                <span class="text-slate-400 font-mono">Module <?= sprintf('%02d', (int)($module['module_number'] ?? 1)) ?>: <?= htmlspecialchars((string)($module['title'] ?? ''), ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-black font-heading tracking-tight leading-tight">
                Lesson <?= htmlspecialchars((string)($lesson['lesson_number'] ?? 1), ENT_QUOTES, 'UTF-8') ?>: <?= htmlspecialchars((string)($lesson['title'] ?? 'Training Lesson'), ENT_QUOTES, 'UTF-8') ?>
            </h1>

            <div class="flex items-center space-x-4 text-xs text-slate-400 pt-2 border-t border-slate-800 font-mono">
                <span><i class="far fa-clock text-cyan-400 mr-1"></i> Duration: <?= (int)($lesson['duration_mins'] ?? 15) ?> Minutes</span>
                <span>•</span>
                <span><i class="fas fa-check-circle text-emerald-400 mr-1"></i> Technical Training Lesson</span>
            </div>
        </div>
    </div>
</section>

<!-- Lesson Body -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Summary Box -->
        <?php if (!empty($lesson['summary'])): ?>
        <div class="p-6 rounded-3xl bg-blue-50/60 border border-blue-200 text-slate-800 text-sm mb-10 leading-relaxed">
            <span class="font-bold text-blue-950 block mb-1">Lesson Objective:</span>
            <?= htmlspecialchars((string)$lesson['summary'], ENT_QUOTES, 'UTF-8') ?>
        </div>
        <?php endif; ?>

        <!-- Rich Content -->
        <div class="article-content prose prose-slate max-w-none mb-12">
            <?= $lesson['content'] ?? '<p>No lesson content available.</p>' ?>
        </div>

        <!-- Next / Prev Lesson Navigation -->
        <div class="pt-8 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <?php if (!empty($prevLesson)): ?>
            <a href="<?= Helper::url('training/lesson/' . ($prevLesson['slug'] ?? '')) ?>" class="p-4 rounded-2xl bg-slate-50 border border-slate-200 hover:border-blue-400 transition-all flex items-center space-x-3">
                <i class="fas fa-arrow-left text-blue-600"></i>
                <div class="overflow-hidden">
                    <div class="text-[10px] text-slate-400 uppercase font-bold font-mono">Previous Lesson</div>
                    <div class="text-xs font-bold text-slate-900 truncate"><?= htmlspecialchars((string)($prevLesson['title'] ?? 'Previous Lesson'), ENT_QUOTES, 'UTF-8') ?></div>
                </div>
            </a>
            <?php else: ?>
            <div></div>
            <?php endif; ?>

            <?php if (!empty($nextLesson)): ?>
            <a href="<?= Helper::url('training/lesson/' . ($nextLesson['slug'] ?? '')) ?>" class="p-4 rounded-2xl bg-slate-50 border border-slate-200 hover:border-blue-400 transition-all flex items-center justify-between text-right">
                <div class="overflow-hidden">
                    <div class="text-[10px] text-slate-400 uppercase font-bold font-mono">Next Lesson</div>
                    <div class="text-xs font-bold text-slate-900 truncate"><?= htmlspecialchars((string)($nextLesson['title'] ?? 'Next Lesson'), ENT_QUOTES, 'UTF-8') ?></div>
                </div>
                <i class="fas fa-arrow-right text-blue-600 ml-3"></i>
            </a>
            <?php endif; ?>
        </div>

    </div>
</section>
