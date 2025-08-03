<?php $__env->startSection('PAGE_TITLE', 'إصنع سيرتك الذاتية'); ?>

<?php $__env->startSection('PAGE_CONTENT'); ?>
    <!-- Page Content-->
    <div class="container-fluid px-3 my-5">
        <div class="text-center mb-5">
            <?php echo $__env->yieldContent('STEP_TITLE'); ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <!-- Experience Section-->
                <section>
                    <?php if($errors->any()): ?>
                        <div class="card border-0 rounded-4 mb-5">
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class=" border-0 mb-5">
                        
                        <?php echo $__env->yieldContent('STEP_CONTENT'); ?>
                        
                    </div>
                    <?php if(!request()->is('step/finish')): ?>
                        <div class="d-grid gap-2">
                            
                            <?php if(isset($cv)): ?>
                            <a href="#" id="saveAndFinish" class="btn btn-outline-warning btn-lg fw-bold">
                                <?php echo e(__('labels.finishBtn')); ?>

                                <?php if(app()->currentLocale() == "ar"): ?>
                                <i class="bi bi-chevron-double-left fs-5 mx-2 my-1"></i>
                                <?php else: ?>
                                <i class="bi bi-chevron-double-right fs-5 mx-2"></i>
                                <?php endif; ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </section>
            </div>
            <div class="col-lg-10 col-sm-12 mt-4">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5058682780348010" crossorigin="anonymous"></script>
            <ins class="adsbygoogle"
                 style="display:block;"
                 data-ad-format="auto"
                 data-full-width-responsive="true"
                 data-ad-slot="4381091381"></ins>
            <script>
                 
                    (adsbygoogle = window.adsbygoogle || []).push({});
                
            </script>
        </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPrepend('HEAD_BOTTOM'); ?>
    <link href="<?php echo e(asset('assets/css/bootstrap-toggle.css')); ?>" rel="stylesheet" />
    <style>
        .nav-link {
            color: #999;
        }
        
    </style>
<?php $__env->stopPrepend(); ?>

<?php $__env->startPrepend('BODY_BOTTOM'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap-toggle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.imgcheckbox.js')); ?>"></script>
    <script>
        $(function() {
            $("img.checkable").imgCheckbox({
                radio: true,
                canDeselect: true,
                "styles": {
                    "span.imgCheckbox.imgChked img": {
                        // This property will overwrite the default grayscaling, we need to add it back in
                        "filter": "blur(1px) grayscale(10%)",

                        // This is just css: remember compatibility
                        "-webkit-filter": "blur(1px) grayscale(10%)",

                        // Let's change the amount of scaling from the default of "0.8"
                        "transform": "scale(0.9)"
                    }
                },
                onclick: function(){
                    $("form#stepsForm").submit();
                }
            });
            $("#submitBtn").on("click", function(){
                $("form#stepsForm").submit();
            });
            
            $("#saveAndFinish").on("click", function(){
                $("form#stepsForm").attr('action', "<?php echo e(route('autoSave')); ?>");
                $("form#stepsForm").submit();
            });
            
            
            
        });
    </script>
<?php $__env->stopPrepend(); ?>

<?php echo $__env->make('layouts.abstract', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/layouts/no-preview-step.blade.php ENDPATH**/ ?>