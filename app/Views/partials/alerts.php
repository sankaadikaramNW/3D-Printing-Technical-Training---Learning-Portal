<?php
use App\Core\Session;

$success = Session::getFlash('success');
$error = Session::getFlash('error');
$info = Session::getFlash('info');
$warning = Session::getFlash('warning');
?>

<?php if ($success): ?>
    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start space-x-3 shadow-sm transition-all">
        <i class="fas fa-check-circle text-emerald-500 text-xl mt-0.5"></i>
        <div class="flex-1">
            <h4 class="font-bold text-sm">Success</h4>
            <p class="text-sm mt-0.5"><?= htmlspecialchars($success) ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start space-x-3 shadow-sm transition-all">
        <i class="fas fa-exclamation-triangle text-rose-500 text-xl mt-0.5"></i>
        <div class="flex-1">
            <h4 class="font-bold text-sm">Notice / Error</h4>
            <p class="text-sm mt-0.5"><?= htmlspecialchars($error) ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if ($info): ?>
    <div class="mb-6 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-800 flex items-start space-x-3 shadow-sm transition-all">
        <i class="fas fa-info-circle text-blue-500 text-xl mt-0.5"></i>
        <div class="flex-1">
            <h4 class="font-bold text-sm">Information</h4>
            <p class="text-sm mt-0.5"><?= htmlspecialchars($info) ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if ($warning): ?>
    <div class="mb-6 p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 flex items-start space-x-3 shadow-sm transition-all">
        <i class="fas fa-exclamation-circle text-amber-500 text-xl mt-0.5"></i>
        <div class="flex-1">
            <h4 class="font-bold text-sm">Attention</h4>
            <p class="text-sm mt-0.5"><?= htmlspecialchars($warning) ?></p>
        </div>
    </div>
<?php endif; ?>
