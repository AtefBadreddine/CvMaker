<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <strong><?php echo e(session()->get('success')); ?></strong>
    </div>
<?php endif; ?>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/components/success-alert.blade.php ENDPATH**/ ?>