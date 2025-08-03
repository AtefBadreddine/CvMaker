<?php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
?>
<?php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
?>



<?php $__env->startSection('styles'); ?>
    <style>

        /* Sidebar styling */
        .sidebar {
            background:<?php echo e($cv->lighter_color ?? '#97b8d2'); ?>;
            color:#222;
        }




        /* PDF Print Styles - Optimized for Spatie PDF (Puppeteer) */
        @media print {
            .sidebar {
                background:<?php echo e($cv->lighter_color ?? '#97b8d2'); ?>;
                color:#222;
            }

            /* Hide sidebar content on pages after first */
            .sidebar::after {
                background:<?php echo e($cv->lighter_color ?? '#97b8d2'); ?>;
                color:#222;
            }
        }



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



        .name,
        .tagline
        {
            padding: 0;
            margin: 0;
            font-weight: 300;
            line-height: 1.6;
        }
        .tagline
        {
            font-size: <?php echo e($cv->cv_text_size+4 ?? '18'); ?>px;
            margin: 0 10px;
        }

        table th .title,
        table td .title
        {
            font-size: <?php echo e($cv->cv_text_size+4 ?? '18'); ?>px;
        }

        .gray-text
        {
            color: #97AAC3;
        }

        table th.section-title {
            color: <?php echo e($cv->cv_color ?? '#004a89'); ?>;
            padding-bottom: 0;
            padding-top: 20px;
            font-size: <?php echo e($cv->cv_text_size+6 ?? '20'); ?>px;
            font-weight: 500;
            padding-bottom: 10px;
        }

        .sidebar table td,
        .sidebar table th
        {
            color:#222;
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
            width: 100%
        }

        .sidebar table th.sidebar-title
        {
            font-size: <?php echo e($cv->cv_text_size+2 ?? '16'); ?>px;
            color: #222;
        }

        .sidebar table th.info-sidebar-title
        {
            padding-top: 0;
            padding-bottom: 0;
        }

        .sidebar table td.info-sidebar-data
        {
            padding-top: 5px;
        }

        .sidebar table
        {
            margin-bottom: 20px;
        }

        table td .details,
        table th .details
        {
            font-size: <?php echo e($cv->cv_text_size ?? '14'); ?>px; !important;
            font-weight:300;
            color: #545E6C;
            padding-top: 10px
        }

        .top-section
        {
            padding: 0 20px 10px;
            margin: 0;
            height: 165px;
            background-color: #878787;
            color: #fff;
            <?php if($currentLocale == 'ar'): ?>
            text-align: right;
            font-family:'Cairo';
            <?php else: ?>
            text-align: left;
            font-family:'Roboto';
        <?php endif; ?>
}

        .top-section .float-right
        {
            float: right;
        }

        .top-section .float-left
        {
            float:left;
        }

        table.jobs td,
        table.jobs th
        {
            padding-top: 0;
            padding-bottom: 5px;
        }
    </style>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>
    <table class="top-section">
        <tbody>
        <tr>
            <td style="width: 15%" rowspan="2">
                <?php if(is_string($cv->picture) && file_exists(public_path('storage/cv/pictures/' . $cv->picture))): ?>
                    <img  class="profile" src="<?php echo e(public_path('storage/cv/pictures/' . $cv->picture)); ?>" alt="Picture" />
                <?php endif; ?>
            </td>
            <td style="width: 74%; vertical-align: bottom; padding:5px">
                <h1 class="name"><?php echo e($cv->name ?? ""); ?></h1>
            </td>
        </tr>
        <tr>
            <td style="width: 74%; vertical-align: top; padding:5px">
                <h3 class="tagline"><?php echo e($cv->current_job ?? ""); ?></h3>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="cv-container">

        <div class="sidebar">
            <?php echo $__env->make('components.pillar-dev.sidebar', ['cv' => $cv, 'currentLocale' => $currentLocale], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="main-content">
            <?php echo $__env->make('components.pillar-dev.main-content', ['cv' => $cv, 'currentLocale' => $currentLocale], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.cv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/templates/pillar-dev.blade.php ENDPATH**/ ?>