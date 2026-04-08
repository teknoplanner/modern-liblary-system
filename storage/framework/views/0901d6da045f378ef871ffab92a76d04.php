<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="space-y-1">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Member</h1>
        <p class="text-sm text-gray-500 leading-relaxed max-w-lg">Update member personal information.</p>
    </div>

    <form action="/members/<?php echo e($member->id); ?>" method="POST" class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="grid grid-cols-1 gap-6">
            <div class="space-y-2">
                <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Full Name</label>
                <input type="text" name="name" id="name" required value="<?php echo e($member->name); ?>"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="email" class="text-sm font-semibold text-gray-700 ml-1">Email Address</label>
                    <input type="email" name="email" id="email" required value="<?php echo e($member->email); ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
                </div>

                <div class="space-y-2">
                    <label for="phone" class="text-sm font-semibold text-gray-700 ml-1">Phone Number</label>
                    <input type="text" name="phone" id="phone" required value="<?php echo e($member->phone); ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
                </div>
            </div>

            <div class="space-y-2">
                <label for="address" class="text-sm font-semibold text-gray-700 ml-1">Resident Address</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all resize-none"><?php echo e($member->address); ?></textarea>
            </div>
        </div>

        <div class="pt-4 flex items-center justify-end gap-3">
            <a href="/members" class="px-6 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors">Cancel</a>
            <button type="submit" class="px-8 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all">
                Update Profile
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/infrastruktur/Documents/RPL/Project/sample/resources/views/members/edit.blade.php ENDPATH**/ ?>