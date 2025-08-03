<?php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
?>




<?php $__env->startSection('styles'); ?>
    <style>

        .sidebar {
            background: <?php echo e($cv->cv_color ?? '#2e5395'); ?> !important;
        }
        @media print {
            .sidebar {
                background: <?php echo e($cv->cv_color ?? '#2e5395'); ?>  !important;
            }

            /* Hide sidebar content on pages after first */
            .sidebar::after {
                background: <?php echo e($cv->cv_color ?? '#2e5395'); ?>  !important;
            }
        }
        /* Table styling */
        table {
            border-spacing: 1;
            border-collapse: collapse;
            overflow: wrap;
            width: 100%;
            margin: 0 auto;
            position: relative;
            padding-top: 15px;
        }

        table * {
            position: relative;
        }

        td, th {
            padding: 20px;
            vertical-align: top;
        }

        table td,
        table th {
            font-size: <?php echo e($cv->cv_text_size ?? '14'); ?>px;
            text-align: <?php echo e($currentLocale == 'ar' ? 'right' : 'left'); ?>;
        }

        /* Typography */
        .name {
            font-size: <?php echo e($cv->cv_text_size+28 ?? '40'); ?>px;
            color: <?php echo e($cv->cv_color ?? '#2e5395'); ?>;
            font-weight: bold;
        }

        .title {
            padding-top: 20px;
            font-size: <?php echo e($cv->cv_text_size+4 ?? '18'); ?>px;
            font-weight: 400;
            text-transform: uppercase
        }

        .section-title {
            color: <?php echo e($cv->cv_color ?? '#2e5395'); ?>;
            font-weight: bold;
            padding-bottom: 0;
            padding-top: 20px;
            font-size: <?php echo e($cv->cv_text_size+9 ?? '23'); ?>px;
            text-transform: uppercase
        }

        /* Sidebar specific styling */
        .sidebar td,
        .sidebar th {
            color:white;
            padding:10px;
            <?php if($currentLocale == 'ar'): ?>
            padding-right: 20px;
            padding-left: 20px;
            <?php else: ?>
            padding-left: 20px;
            padding-right: 20px;
        <?php endif; ?>
}


        /* Personal info table */
        .personal-info-table th {
            padding-bottom: 2px;
        }

        .personal-info-table td {
            padding-top: 2px
        }


        /* Strong text styling */
        strong.title
        {
            line-height: 25px
        }

    </style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="cv-container">
        <div class="sidebar">
            <?php echo $__env->make('components.cv.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="main-content">
            <?php echo $__env->make('components.cv.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.cv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/templates/orbital-dev.blade.php ENDPATH**/ ?>