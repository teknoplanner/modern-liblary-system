<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto space-y-12 py-10 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="space-y-3">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
            <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Manajemen Inventaris</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 leading-tight">Registrasi <span class="text-cyan-600">Buku Baru</span></h1>
        <p class="text-slate-500 font-medium max-w-lg">Pastikan data yang dimasukkan sesuai dengan standar katalogisasi perpustakaan.</p>
    </div>

    <form action="/books" method="POST" class="bg-white p-12 rounded-[3.5rem] shadow-[0_48px_96px_-24px_rgba(0,0,0,0.06)] border border-slate-50 space-y-10 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-cyan-300 opacity-20"></div>
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-1 gap-10">
            <div class="space-y-3 group">
                <label for="title" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Judul Lengkap Koleksi</label>
                <input type="text" name="title" id="title" required placeholder="Contoh: Laskar Pelangi - Edisi Spesial"
                    class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label for="isbn" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nomor ISBN Terdaftar</label>
                    <input type="text" name="isbn" id="isbn" required placeholder="978-X-XXX-XXXXX-X"
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none">
                </div>

                <div class="space-y-3">
                    <label for="stock" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Jumlah Unit Tersedia</label>
                    <input type="number" name="stock" id="stock" required min="0" value="1"
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none">
                </div>
            </div>
        </div>

        <div class="pt-10 flex flex-col md:flex-row items-center justify-end gap-6 border-t border-slate-50">
            <a href="/books" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-rose-500 transition-colors">Batalkan & Kembali</a>
            <button type="submit" class="w-full md:w-auto px-12 py-5 bg-slate-900 text-white text-xs font-black rounded-2xl shadow-2xl shadow-slate-200 hover:bg-cyan-600 hover:shadow-cyan-100 transition-all active:scale-[0.98] uppercase tracking-[0.3em]">
                Simpan Data Koleksi
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/books/create.blade.php ENDPATH**/ ?>