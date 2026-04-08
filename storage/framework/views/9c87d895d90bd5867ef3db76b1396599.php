<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="space-y-1">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Book</h1>
        <p class="text-sm text-gray-500 leading-relaxed max-w-lg">Modify the details of the book entry below.</p>
    </div>

    <form action="/books/<?php echo e($book->id); ?>" method="POST" class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="grid grid-cols-1 gap-6">
            <div class="space-y-2 group">
                <label for="title" class="text-sm font-semibold text-gray-700 ml-1">Book Title</label>
                <input type="text" name="title" id="title" required value="<?php echo e($book->title); ?>"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="isbn" class="text-sm font-semibold text-gray-700 ml-1">ISBN Number</label>
                    <input type="text" name="isbn" id="isbn" required value="<?php echo e($book->isbn); ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
                </div>

                <div class="space-y-2">
                    <label for="stock" class="text-sm font-semibold text-gray-700 ml-1">Stock Quantity</label>
                    <input type="number" name="stock" id="stock" required min="0" value="<?php echo e($book->stock); ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
                </div>
            </div>
        </div>

        <div class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100">
            <a href="/books" class="px-6 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors">Cancel</a>
            <button type="submit" class="px-8 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all">
                Update Book
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/books/edit.blade.php ENDPATH**/ ?>