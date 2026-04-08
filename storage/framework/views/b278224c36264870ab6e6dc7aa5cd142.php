<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto py-16 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="text-center space-y-3 mb-12">
        <div class="w-20 h-20 bg-cyan-600 rounded-[2rem] flex items-center justify-center text-white mx-auto shadow-2xl shadow-cyan-100 mb-8 border-4 border-cyan-50">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        </div>
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Akses Petugas</h1>
        <p class="text-slate-400 text-sm font-medium">Silakan masuk untuk mengelola ekosistem perpustakaan</p>
    </div>

    <form action="/login" method="POST" class="space-y-8 bg-white p-12 rounded-[3.5rem] shadow-[0_48px_96px_-24px_rgba(0,0,0,0.06)] border border-slate-50 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-cyan-300"></div>
        <?php echo csrf_field(); ?>
        <div class="space-y-2.5">
            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Alamat Email Resmi</label>
            <input type="email" name="email" placeholder="contoh@lumina.lib" required value="<?php echo e(old('email')); ?>"
                class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all outline-none text-sm font-bold text-slate-700 placeholder:text-slate-300">
        </div>

        <div class="space-y-2.5">
            <div class="flex items-center justify-between px-1">
                <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Kata Sandi</label>
                <a href="#" class="text-[11px] font-black text-cyan-600 uppercase tracking-[0.2em] hover:text-cyan-700 transition-colors">Lupa?</a>
            </div>
            <input type="password" name="password" placeholder="••••••••" required
                class="w-full px-6 py-5 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all outline-none text-sm font-bold text-slate-700 placeholder:text-slate-300">
        </div>

        <div class="pt-6 flex flex-col gap-6">
            <button type="submit" class="w-full py-5 bg-slate-900 text-white text-xs font-black rounded-2xl shadow-2xl shadow-slate-200 hover:bg-cyan-600 hover:shadow-cyan-100 transition-all active:scale-[0.98] uppercase tracking-[0.3em]">
                Masuk ke Sistem
            </button>
            <p class="text-center text-[10px] text-slate-400 font-black uppercase tracking-[0.2em]">
                Belum memiliki akses? <a href="/register" class="text-cyan-600 hover:text-cyan-700 transition-colors">Daftar Akun Baru</a>
            </p>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/auth/login.blade.php ENDPATH**/ ?>