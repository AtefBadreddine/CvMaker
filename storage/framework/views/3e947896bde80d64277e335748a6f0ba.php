<?php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
?>

<?php $__env->startSection('styles'); ?>
    <style>

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


        td,th {
            padding: 20px;
        }

        table td,
        table th {
            font-size: <?php echo e($cv->cv_text_size ?? '14'); ?>px;
            <?php if($currentLocale == 'ar'): ?>
            text-align: right;
            font-family:'Cairo';
            <?php else: ?>
            text-align: left;
            font-family:'Roboto';
        <?php endif; ?>
}

        .name
        {
            font-size: <?php echo e($cv->cv_text_size+16 ?? '30'); ?>px
        }

        table th .title,
        table td .title
        {
            font-size: <?php echo e($cv->cv_text_size + 4 ?? '18'); ?>px;
        }

        .gray-text
        {
            color: #97AAC3;
        }

        table th.section-title {
            color: <?php echo e($cv->cv_color ?? '#2a5fb0'); ?>;
            padding-bottom: 0;
            padding-top: 20px;
            font-size: <?php echo e($cv->cv_text_size+6 ?? '20'); ?>px;
            font-weight: 500;
        }

        .sidebar table td,
        .sidebar table th
        {
            color:white;
            padding:10px;
            <?php if($currentLocale == 'ar'): ?>
            padding-right: 15px;
            padding-left: 0px;
            <?php else: ?>
            padding-left: 15px;
            padding-right: 0px;
        <?php endif; ?>
}

        table td.info-section
        {
            text-align: center;
            padding: 20px !important;
            background-color: <?php echo e($cv->cv_color ?? '#2a5fb0'); ?>;
            width: 100%
        }

        .sidebar table {
            width: 100%;
            table-layout: fixed;
        }


        .sidebar table th.sidebar-title {
            background-color: <?php echo e($cv->darker_color ?? '#224c8d'); ?>;
            font-size: <?php echo e($cv->cv_text_size+2 ?? '16'); ?>px;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
            box-sizing: border-box;
        }


        table td .details,
        table th .details
        {
            font-size: <?php echo e($cv->cv_text_size ?? '14'); ?>px !important;
            font-weight:300;
            color: #545E6C;
            padding-top: 10px
        }


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="cv-container">
        <div class="sidebar">
            <?php echo $__env->make('components.orbital.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="main-content">
            <?php echo $__env->make('components.orbital.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.cv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/templates/orbital.blade.php ENDPATH**/ ?>