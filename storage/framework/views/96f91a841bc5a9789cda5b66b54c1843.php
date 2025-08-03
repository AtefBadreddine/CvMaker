<?php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
?>

<!DOCTYPE html>
<html lang="<?php echo e($currentLocale); ?>" dir="<?php echo e($currentLocale == 'ar' ? 'rtl' : 'ltr'); ?>">

<head>
    <title><?php echo $cv->name ?? '' . "'s cv"; ?></title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&family=Cairo:wght@400&family=Amiri:wght@400&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;

            <?php if($currentLocale == 'ar'): ?>
            text-align: right;
            font-family: 'Cairo', 'Amiri', serif;
            <?php else: ?>
            text-align: left;
            font-family: 'Roboto', sans-serif;
        <?php endif; ?>
    }

        body {
            margin: 0;
            padding: 0;
            color: #545E6C;

            <?php if($currentLocale == 'ar'): ?>
            text-align: right;
            font-family: 'Cairo', 'Amiri', serif;
            <?php else: ?>
            text-align: left;
            font-family: 'Roboto', sans-serif;
        <?php endif; ?>
    }

        /* Main container using flexbox */
        .cv-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar styling */
        .sidebar {
            flex: 0 0 30%;
            background: <?php echo e($cv->cv_color ?? '#2a5fb0'); ?>;
            color: white;
        }

        /* Main content area */
        .main-content {
            flex: 1;
            background: #fff;
            overflow-wrap: break-word;
        }

        /* PDF Print Styles - Optimized for Spatie PDF (Puppeteer) */
        @media print {
            html {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                overflow: visible;
            }

            .cv-container {
                display: flex;
                width: 100%;
                min-height: 100vh;
                margin: 0;
                padding: 0;
            }

            .sidebar {
                flex: 0 0 30%;
                width: 30%;
                background: <?php echo e($cv->cv_color ?? '#2a5fb0'); ?>;
                color: white;
                min-height: 100vh;
                position: relative;
            }

            .main-content {
                flex: 1;
                width: 70%;
                background: #fff;
                min-height: 100vh;
                overflow-wrap: break-word;
            }

            /* Hide sidebar content on pages after first */
            .sidebar::after {
                content: '';
                position: fixed;
                top: 0;
                <?php echo e($currentLocale == 'ar' ? 'left: 0;' : 'right: 0;'); ?>

                width: 30%;
                height: 100vh;
                background: <?php echo e($cv->cv_color ?? '#2a5fb0'); ?>;
                z-index: -1;
            }

            /* Ensure content flows properly across pages */
            .page-break {
                page-break-before: always;
            }

            .avoid-break {
                page-break-inside: avoid;
            }

            /* Responsive design */
            @media screen and (max-width: 768px) {
                .cv-container {
                    flex-direction: column;
                }

                .sidebar {
                    flex: none;
                    width: 100%;
                }

                .main-content {
                    flex: none;
                    width: 100%;
                }
            }

            /* Print page breaks */
            @media print {
                .new-page {
                    page-break-before: always;
                }

                .new-page:empty {
                    display: none;
                }

                .no-break {
                    page-break-inside: avoid;
                }
            }

            .sidebar table {
                width: 100%;
                table-layout: fixed;
            }

            td {
                white-space: normal; /* allows wrapping */
                word-wrap: break-word; /* for old browsers */
                word-break: break-word; /* newer property, better support */
            }

        }

    </style>
    <?php echo $__env->yieldContent('styles'); ?>


</head>

<body>
  <?php echo $__env->yieldContent('content'); ?>
</body>

</html>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/layouts/cv-simple.blade.php ENDPATH**/ ?>