<?php
use App\Core\Helper;
?>

<!-- Header Hero -->
<section class="py-16 bg-slate-900 text-white relative dark-tech-grid-pattern border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-900/60 text-cyan-400 text-xs font-bold uppercase tracking-wider border border-blue-700/60 mb-3">
                Structured Technical Curriculum
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-heading tracking-tight leading-tight">
                Training Curriculum Modules
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2">
                A progressive 8-module engineering training syllabus developed specifically for technical trainees, instructors, and mechanical personnel.
            </p>
        </div>
    </div>
</section>

<!-- Curriculum Modules Grid -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="space-y-8">
            <?php foreach (($modules ?? []) as $mod): 
                $modNumber = (int)($mod['module_number'] ?? 1);
                $diff = (string)($mod['difficulty_level'] ?? 'Beginner');
                $title = (string)($mod['title'] ?? 'Training Module');
                $estHours = (string)($mod['estimated_hours'] ?? '1-2 hrs');
                $lessons = (is_array($mod['lessons'] ?? null) ? $mod['lessons'] : []);
                $desc = (string)($mod['description'] ?? '');
            ?>
            <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200 shadow-sm space-y-6">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 rounded-2xl bg-blue-900 text-cyan-400 flex items-center justify-center text-2xl font-black font-heading shadow-md shrink-0">
                            <?= sprintf('%02d', $modNumber) ?>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 font-mono">
                                <?= htmlspecialchars($diff, ENT_QUOTES, 'UTF-8') ?> Level
                            </span>
                            <h3 class="text-xl font-bold text-slate-900 font-heading mt-1"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3 text-xs text-slate-500 font-mono">
                        <span><i class="far fa-clock text-blue-600 mr-1"></i> <?= htmlspecialchars($estHours, ENT_QUOTES, 'UTF-8') ?></span>
                        <span>•</span>
                        <span><i class="fas fa-book-open text-cyan-600 mr-1"></i> <?= count($lessons) ?> Lessons</span>
                    </div>
                </div>

                <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($desc, ENT_QUOTES, 'UTF-8') ?></p>

                <!-- Lessons List -->
                <?php if (!empty($lessons)): ?>
                <div class="space-y-2 pt-2">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-2 font-mono">Module Lessons:</span>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <?php foreach ($lessons as $lesson): 
                            $lNum = (int)($lesson['lesson_number'] ?? 1);
                            $lSlug = (string)($lesson['slug'] ?? $lesson['id'] ?? '');
                            $lTitle = (string)($lesson['title'] ?? 'Lesson');
                            $lDur = (int)($lesson['duration_mins'] ?? 15);
                        ?>
                        <a href="<?= Helper::url('training/lesson/' . $lSlug) ?>" class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-blue-400 hover:bg-blue-50/40 transition-all flex items-center justify-between group">
                            <div class="flex items-center space-x-3 overflow-hidden">
                                <span class="w-6 h-6 rounded-lg bg-slate-200 text-slate-700 group-hover:bg-blue-600 group-hover:text-white font-mono font-bold text-[10px] flex items-center justify-center shrink-0 transition-colors">
                                    <?= $lNum ?>
                                </span>
                                <span class="text-xs font-bold text-slate-800 truncate group-hover:text-blue-700 transition-colors">
                                    <?= htmlspecialchars($lTitle, ENT_QUOTES, 'UTF-8') ?>
                                </span>
                            </div>
                            <span class="text-[11px] text-slate-400 shrink-0 ml-2 font-mono">
                                <?= $lDur ?>m <i class="fas fa-arrow-right text-[10px] ml-1 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
