<?php $__env->startSection('content'); ?>
<div x-data="{ open: false, action: '', title: '' }" class="space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="space-y-1">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Library Members</h1>
            <p class="text-sm text-gray-500 leading-relaxed">Directory of all registered members authorized to borrow books.</p>
        </div>
        <a href="/members/create" class="flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all active:scale-95 group">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Register Member
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 space-y-4 hover:border-indigo-100 transition-all group">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 font-bold text-xl group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <?php echo e(substr($member->name, 0, 1)); ?>

                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold text-gray-900"><?php echo e($member->name); ?></h3>
                    <span class="text-xs text-gray-400"><?php echo e($member->email); ?></span>
                </div>
            </div>
            
            <div class="pt-4 border-t border-gray-50 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <a href="/members/<?php echo e($member->id); ?>/edit" class="text-indigo-600 hover:bg-indigo-50 p-2 rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M17.14 3.37a2.22 2.22 0 013.13 3.13L11.82 14.95l-3.32.83.83-3.32 8.45-8.45z"></path></svg>
                    </a>
                    <button @click="open = true; action = '/members/<?php echo e($member->id); ?>'; title = '<?php echo e($member->name); ?>'" 
                            class="text-rose-600 hover:bg-rose-50 p-2 rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
                <div class="text-[10px] font-black uppercase tracking-widest text-gray-300">
                    ID #<?php echo e(str_pad($member->id, 4, '0', STR_PAD_LEFT)); ?>

                </div>
            </div>

            <?php if($member->address): ?>
            <p class="text-[10px] text-gray-400 bg-gray-50 p-2 rounded-xl italic">
                <?php echo e($member->address); ?>

            </p>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-full py-12 text-center text-gray-400 italic">No members registered yet.</div>
        <?php endif; ?>
    </div>

    <!-- Modern Confirmation Modal -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm" 
         style="display: none;">
        
        <div @click.away="open = false" 
             x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-95 translate-y-4 opacity-0"
             x-transition:enter-end="scale-100 translate-y-0 opacity-100"
             class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-900/20 max-w-sm w-full p-10 text-center space-y-6 border border-slate-100">
            
            <div class="w-20 h-20 bg-rose-50 rounded-3xl flex items-center justify-center text-rose-600 mx-auto shadow-inner">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>

            <div class="space-y-2">
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Remove Member?</h2>
                <p class="text-slate-400 text-sm font-medium leading-relaxed">Are you sure you want to remove <span class="text-slate-900 font-bold" x-text="title"></span>? All loan history for this member will also be affected.</p>
            </div>

            <div class="flex flex-col gap-3 pt-2">
                <form :action="action" method="POST">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="w-full py-4 bg-rose-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-rose-100 hover:bg-rose-700 transition-all uppercase tracking-widest">
                        Yes, Remove Data
                    </button>
                </form>
                <button @click="open = false" class="w-full py-4 bg-slate-50 text-slate-400 text-sm font-black rounded-2xl hover:bg-slate-100 transition-all uppercase tracking-widest">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/members/index.blade.php ENDPATH**/ ?>