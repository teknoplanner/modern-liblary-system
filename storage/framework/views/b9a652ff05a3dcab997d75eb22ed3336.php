<?php $__env->startSection('content'); ?>
<div class="space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="space-y-1">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 leading-tight">Borrowed <span class="text-indigo-600">Reports</span></h1>
            <p class="text-sm text-gray-500 leading-relaxed font-medium">Daily report of books that are currently being borrowed by members.</p>
        </div>
        <div class="flex items-center gap-4 bg-white/50 glass p-2 rounded-2xl border border-gray-100 px-6 py-3">
            <div class="flex flex-col">
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest leading-none">Total Active</span>
                <span class="text-2xl font-black text-indigo-600 leading-tight"><?php echo e($loans->count()); ?></span>
            </div>
            <div class="w-px h-8 bg-gray-200"></div>
            <div class="text-xs text-gray-500 font-bold flex flex-col gap-1">
                <span><?php echo e(date('d M Y')); ?></span>
                <span class="text-emerald-500 uppercase tracking-tighter">Live Status</span>
            </div>
        </div>
    </div>

    <!-- Minimalist Cards List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php $__empty_1 = true; $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="group bg-white rounded-[2rem] p-8 shadow-xl shadow-gray-100 hover:shadow-indigo-100/40 border border-gray-100 transition-all hover:scale-[1.03] active:scale-[0.98]">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 shadow-sm border border-indigo-100 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <span class="px-4 py-1.5 bg-amber-50 text-amber-700 text-[10px] font-black uppercase tracking-widest rounded-xl border border-amber-100">BORROWED</span>
            </div>

            <div class="mt-8 space-y-2">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition-colors"><?php echo e($loan->book->title); ?></h3>
                <div class="flex items-center gap-2 text-sm font-medium text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <?php echo e($loan->member->name); ?>

                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-50 flex items-center justify-between text-xs font-bold">
                <div class="flex flex-col gap-1">
                    <span class="text-gray-300 uppercase tracking-widest text-[9px]">Loan Date</span>
                    <span class="text-gray-600"><?php echo e(\Carbon\Carbon::parse($loan->loan_date)->toFormattedDateString()); ?></span>
                </div>
                <div class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-gray-300 group-hover:border-indigo-100 group-hover:text-indigo-200 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-full py-20 text-center opacity-30 select-none">
            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <p class="mt-5 text-xl font-black uppercase tracking-[0.2em]">All books are in collection</p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/reports/index.blade.php ENDPATH**/ ?>