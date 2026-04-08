<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto py-12 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="text-center space-y-2 mb-10">
        <div class="w-16 h-16 bg-indigo-600 rounded-[1.5rem] flex items-center justify-center text-white mx-auto shadow-2xl shadow-indigo-200 mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        </div>
        <h1 class="text-3xl font-black text-gray-900 tracking-tight">Welcome Back</h1>
        <p class="text-gray-400 text-sm font-medium">Please enter your credentials to access the dashboard</p>
    </div>

    <form action="/login" method="POST" class="space-y-6 bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-gray-100 border border-gray-50">
        <?php echo csrf_field(); ?>
        <div class="space-y-2">
            <label class="text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Email Address</label>
            <input type="email" name="email" placeholder="admin@lumina.lib" required value="<?php echo e(old('email')); ?>"
                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 focus:bg-white transition-all outline-none text-sm font-medium">
        </div>

        <div class="space-y-2">
            <div class="flex items-center justify-between px-1">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest">Password</label>
                <a href="#" class="text-[10px] font-black text-indigo-600 uppercase tracking-widest hover:underline">Forgot?</a>
            </div>
            <input type="password" name="password" placeholder="••••••••" required
                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-600 focus:bg-white transition-all outline-none text-sm font-medium">
        </div>

        <div class="pt-4 flex flex-col gap-4">
            <button type="submit" class="w-full py-4 bg-indigo-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-indigo-100 hover:bg-indigo-700 hover:shadow-indigo-200 hover:-translate-y-0.5 active:translate-y-0 transition-all uppercase tracking-widest">
                Sign In
            </button>
            <p class="text-center text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                Don't have an account? <a href="/register" class="text-indigo-600 hover:underline">Contact Admin</a>
            </p>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/auth/login.blade.php ENDPATH**/ ?>