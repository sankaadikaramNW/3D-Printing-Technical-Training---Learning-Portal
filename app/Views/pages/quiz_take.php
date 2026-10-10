<div class="bg-gradient-to-br from-slate-900 via-brand-navy to-slate-900 text-white py-12 border-b border-white/10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-sm text-cyan-300/80 mb-3">
            <a href="<?= base_url('quiz') ?>" class="hover:text-white transition flex items-center gap-1">
                <i class="fas fa-arrow-left"></i> All Assessments
            </a>
            <span>/</span>
            <span class="text-slate-300 truncate max-w-xs"><?= e($quiz['title'] ?? 'Technical Assessment') ?></span>
        </div>
        <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight"><?= e($quiz['title'] ?? 'Technical Assessment') ?></h1>
        <p class="text-slate-300 text-sm sm:text-base mt-2"><?= e($quiz['description'] ?? 'Select the best answer for each question and submit to view your detailed score breakdown.') ?></p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12" 
     x-data="quizEngine(<?= htmlspecialchars(json_encode($questions ?? []), ENT_QUOTES, 'UTF-8') ?>, <?= (int)($quiz['pass_mark'] ?? $quiz['passing_percentage'] ?? 70) ?>)">
    
    <!-- State: Not Submitted -->
    <div x-show="!submitted" class="space-y-8">
        
        <!-- Progress Bar & Indicator -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 sticky top-20 z-10 backdrop-blur-md bg-white/95">
            <div class="flex items-center justify-between text-sm font-semibold mb-2">
                <span class="text-brand-navy">
                    Question <span x-text="currentIndex + 1"></span> of <span x-text="questions.length"></span>
                </span>
                <span class="text-cyan-600" x-text="Math.round(((answeredCount()) / questions.length) * 100) + '% Completed'"></span>
            </div>
            <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 h-full transition-all duration-300"
                     :style="'width: ' + ((answeredCount() / questions.length) * 100) + '%'"></div>
            </div>
        </div>

        <!-- Question Card -->
        <template x-for="(q, idx) in questions" :key="q.id">
            <div x-show="currentIndex === idx" class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200 space-y-6">
                <div class="flex items-start gap-4">
                    <span class="w-10 h-10 rounded-xl bg-cyan-50 border border-cyan-200 text-cyan-700 font-bold flex items-center justify-center flex-shrink-0 text-lg"
                          x-text="idx + 1"></span>
                    <h3 class="text-xl font-bold text-slate-800 leading-snug pt-1" x-text="q.question_text"></h3>
                </div>

                <!-- Answers List -->
                <div class="space-y-3 pt-2">
                    <template x-for="ans in q.answers" :key="ans.id">
                        <button type="button"
                                @click="selectAnswer(q.id, ans.id)"
                                class="w-full text-left p-4 rounded-xl border transition-all duration-200 flex items-center justify-between group"
                                :class="userAnswers[q.id] === ans.id 
                                    ? 'border-cyan-500 bg-cyan-50/60 ring-2 ring-cyan-500/20 text-brand-navy font-semibold' 
                                    : 'border-slate-200 hover:border-cyan-300 hover:bg-slate-50 text-slate-700'">
                            <span x-text="ans.answer_text"></span>
                            <div class="w-5 h-5 rounded-full border flex items-center justify-center transition-colors"
                                 :class="userAnswers[q.id] === ans.id ? 'border-cyan-600 bg-cyan-600 text-white' : 'border-slate-300 group-hover:border-cyan-400'">
                                <i x-show="userAnswers[q.id] === ans.id" class="fas fa-check text-[10px]"></i>
                            </div>
                        </button>
                    </template>
                </div>

                <!-- Nav Controls -->
                <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                    <button type="button" 
                            @click="prevQuestion()" 
                            :disabled="currentIndex === 0"
                            class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 disabled:opacity-40 disabled:cursor-not-allowed transition text-sm flex items-center gap-2">
                        <i class="fas fa-arrow-left text-xs"></i> Previous
                    </button>

                    <button type="button" 
                            x-show="currentIndex < questions.length - 1"
                            @click="nextQuestion()" 
                            class="px-6 py-2.5 rounded-xl bg-brand-navy hover:bg-slate-800 text-white font-semibold transition text-sm flex items-center gap-2">
                        Next <i class="fas fa-arrow-right text-xs"></i>
                    </button>

                    <button type="button" 
                            x-show="currentIndex === questions.length - 1"
                            @click="submitQuiz()" 
                            :disabled="answeredCount() < questions.length"
                            class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 disabled:bg-slate-300 text-white font-bold transition text-sm flex items-center gap-2">
                        <span>Submit Assessment</span>
                        <i class="fas fa-check-circle"></i>
                    </button>
                </div>
            </div>
        </template>
    </div>

    <!-- State: Submitted Result View -->
    <div x-show="submitted" class="space-y-8" style="display: none;">
        
        <!-- Result Summary Card -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200 text-center">
            <div class="w-24 h-24 mx-auto rounded-full flex items-center justify-center text-4xl mb-6 shadow-inner"
                 :class="isPassed() ? 'bg-emerald-50 text-emerald-600 border-4 border-emerald-200' : 'bg-rose-50 text-rose-600 border-4 border-rose-200'">
                <i :class="isPassed() ? 'fas fa-trophy' : 'fas fa-exclamation-triangle'"></i>
            </div>
            
            <h2 class="text-3xl font-extrabold text-brand-navy mb-2" x-text="isPassed() ? 'Assessment Passed!' : 'Requires Review'"></h2>
            <p class="text-slate-600 max-w-md mx-auto mb-6" 
               x-text="isPassed() 
                    ? 'Congratulations! You have demonstrated solid technical understanding of this FDM module.' 
                    : 'You did not meet the passing score this time. Review the detailed explanations below and retake the quiz.'"></p>

            <div class="grid grid-cols-3 gap-4 max-w-md mx-auto p-4 bg-slate-50 rounded-2xl border border-slate-100 mb-8">
                <div>
                    <span class="text-xs text-slate-400 uppercase font-semibold">Your Score</span>
                    <div class="text-2xl font-black text-brand-navy mt-1" x-text="scorePercent + '%'"></div>
                </div>
                <div>
                    <span class="text-xs text-slate-400 uppercase font-semibold">Correct</span>
                    <div class="text-2xl font-black text-emerald-600 mt-1" x-text="correctCount + '/' + questions.length"></div>
                </div>
                <div>
                    <span class="text-xs text-slate-400 uppercase font-semibold">Required</span>
                    <div class="text-2xl font-black text-slate-600 mt-1" x-text="passMark + '%'"></div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4">
                <button type="button" @click="resetQuiz()" class="px-6 py-3 bg-brand-navy hover:bg-slate-800 text-white font-bold rounded-xl transition flex items-center gap-2 shadow-sm">
                    <i class="fas fa-redo"></i> Retake Assessment
                </button>
                <a href="<?= base_url('learning') ?>" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl transition">
                    Back to Learning Portal
                </a>
            </div>
        </div>

        <!-- Detailed Explanations Breakdown -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200 space-y-8">
            <h3 class="text-2xl font-bold text-brand-navy border-b border-slate-100 pb-4">
                Detailed Answers & Explanations
            </h3>

            <template x-for="(q, idx) in questions" :key="q.id">
                <div class="p-6 rounded-2xl border space-y-4"
                     :class="isQuestionCorrect(q) ? 'border-emerald-200 bg-emerald-50/20' : 'border-rose-200 bg-rose-50/20'">
                    
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-3">
                            <span class="w-8 h-8 rounded-lg font-bold flex items-center justify-center text-sm flex-shrink-0"
                                  :class="isQuestionCorrect(q) ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700'"
                                  x-text="idx + 1"></span>
                            <h4 class="font-bold text-slate-800 pt-1" x-text="q.question_text"></h4>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold"
                              :class="isQuestionCorrect(q) ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700'"
                              x-text="isQuestionCorrect(q) ? 'Correct' : 'Incorrect'"></span>
                    </div>

                    <!-- Answers comparison -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-sm">
                        <template x-for="ans in q.answers" :key="ans.id">
                            <div class="p-3 rounded-xl border flex items-center justify-between"
                                 :class="{
                                     'border-emerald-500 bg-emerald-50 text-emerald-900 font-bold': ans.is_correct == 1,
                                     'border-rose-400 bg-rose-50 text-rose-900': userAnswers[q.id] === ans.id && ans.is_correct == 0,
                                     'border-slate-200 bg-white text-slate-600': ans.is_correct == 0 && userAnswers[q.id] !== ans.id
                                 }">
                                <span x-text="ans.answer_text"></span>
                                <span x-show="ans.is_correct == 1" class="text-xs bg-emerald-600 text-white px-2 py-0.5 rounded font-bold ml-2">Correct Answer</span>
                                <span x-show="userAnswers[q.id] === ans.id && ans.is_correct == 0" class="text-xs bg-rose-600 text-white px-2 py-0.5 rounded font-bold ml-2">Your Pick</span>
                            </div>
                        </template>
                    </div>

                    <!-- Explanation text -->
                    <div x-show="q.explanation" class="p-4 bg-white rounded-xl border border-slate-200 text-xs text-slate-600 leading-relaxed">
                        <strong class="text-brand-navy block mb-1 font-semibold flex items-center gap-1">
                            <i class="fas fa-info-circle text-cyan-600"></i> Technical Explanation:
                        </strong>
                        <span x-text="q.explanation"></span>
                    </div>
                </div>
            </template>
        </div>

    </div>

</div>

<script>
function quizEngine(questions, passMark) {
    return {
        questions: questions || [],
        passMark: passMark || 70,
        currentIndex: 0,
        userAnswers: {},
        submitted: false,
        correctCount: 0,
        scorePercent: 0,

        selectAnswer(questionId, answerId) {
            this.userAnswers[questionId] = answerId;
        },

        answeredCount() {
            return Object.keys(this.userAnswers).length;
        },

        nextQuestion() {
            if (this.currentIndex < this.questions.length - 1) {
                this.currentIndex++;
            }
        },

        prevQuestion() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            }
        },

        submitQuiz() {
            let correct = 0;
            this.questions.forEach(q => {
                const userPick = this.userAnswers[q.id];
                const correctAns = q.answers.find(a => a.is_correct == 1);
                if (correctAns && correctAns.id === userPick) {
                    correct++;
                }
            });
            this.correctCount = correct;
            this.scorePercent = Math.round((correct / this.questions.length) * 100);
            this.submitted = true;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        isPassed() {
            return this.scorePercent >= this.passMark;
        },

        isQuestionCorrect(q) {
            const userPick = this.userAnswers[q.id];
            const correctAns = q.answers.find(a => a.is_correct == 1);
            return correctAns && correctAns.id === userPick;
        },

        resetQuiz() {
            this.userAnswers = {};
            this.currentIndex = 0;
            this.submitted = false;
            this.correctCount = 0;
            this.scorePercent = 0;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
}
</script>
