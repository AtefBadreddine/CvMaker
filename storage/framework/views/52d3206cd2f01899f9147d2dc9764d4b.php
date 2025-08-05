<?php $__env->startSection('PAGE_TITLE', 'Ready Made CVs'); ?>

<?php $__env->startSection('PAGE_CONTENT'); ?>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
            <i class="fas fa-table me-1"></i>
            You can add, edit and delete any model
            </div>
            <a href="<?php echo e(route('dashboard.cvs.create')); ?>" class="btn btn-primary">Add</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($cv->title); ?></td>
                            <?php
                                $lang = $cv->langDetails()
                            ?>
                            <td><?php echo e($lang['name']); ?> <i class="fi fi-<?php echo e($lang['flag']); ?>"></i> </td>
                            <td><?php echo e(str()->slug($cv->title, '-')); ?></td>
                            <td>
                                <a href="<?php echo e(route('dashboard.cvs.edit', ['cv' => $cv->id])); ?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                                <button data-clipboard-text="<?php echo e(url('/') . '?model=' . $cv->uuid); ?>" class="btn btn-outline-dark"><i class="fa fa-link"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('X_JS'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.copy-to-clipboard.js')); ?>"></script>
    <script>

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/dashboard/rmcvs/index.blade.php ENDPATH**/ ?>