<?php $__env->startSection('STEP_TITLE'); ?>
    <h2 class="display-5 fw-bolder mb-0">
        <span class="text-dark d-inline">
            <?php echo e(__('steps-bar.two_dev')); ?>

        </span>
    </h2>
	<p class="lead"><?php echo e(__('general.subTitle')); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('BODY_BOTTOM'); ?>
<script>
	$('body').on('click',".selectTemplate",function(e){
      switch($(this).attr('id'))
      {
        case "orbitalOverlay":
        case "orbitalBtn":
          {
          	$('#orbitalInput').val('on');
            $("#stepsForm").submit();
            break;
          }
          
        case "orbitalDevBtn":
        case "orbitalDevOverlay":
          {
          	$('#orbitalDevInput').val('on');
            $("#stepsForm").submit();
            break;
          }
          
        case "pillarBtn":
        case "pillarOverlay":
          {
          	$('#pillarInput').val('on');
            $("#stepsForm").submit();
            break;
          }
          
        case "pillarDevBtn":
        case "pillarDevOverlay":
          {
          	$('#pillarDevInput').val('on');
            $("#stepsForm").submit();
            break;
          }
          
        case "simpleBtn":
        case "simpleOverlay":
          {
          	$('#simpleInput').val('on');
            $("#stepsForm").submit();
            break;
          }
          
        case "simpleDevBtn":
        case "simpleDevOverlay":
          {
          	$('#simpleDevInput').val('on');
            $("#stepsForm").submit();
            break;
          }
      }
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('STEP_CONTENT'); ?>
    <div class="card border-0">
        <div class="card-body p-4">
            <form method="POST" action="<?php echo e(route('step.setTemplate')); ?>" id="stepsForm">
              	
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-4 col-sm-12 mb-5">
                        <div class="card border-0 template-card text-center fw-bold">
                            <img src="<?php echo e(asset('assets/images/orbital.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="قالب 1" />
                          	<input type="hidden" name="orbital" id="orbitalInput"/>
                            <div class="overlay selectTemplate" id="orbitalOverlay">
                                <button type="button" class="btn btn-light w-75 fw-bold selectTemplate" id="orbitalBtn"><?php echo e(__('general.chooseTemplate')); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-5">
                        <div class="card border-0 template-card text-center fw-bold">
                            <img src="<?php echo e(asset('assets/images/orbital-dev.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="قالب 1" />
                          	<input type="hidden" name="orbital-dev" id="orbitalDevInput" />
                            <div class="overlay selectTemplate" id="orbitalDevOverlay">
                                <button type="button" class="btn btn-light w-75 fw-bold selectTemplate" id="orbitalDevBtn"><?php echo e(__('general.chooseTemplate')); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-5">
                        <div class="card border-0 template-card text-center fw-bold">
                            <img src="<?php echo e(asset('assets/images/pillar.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="قالب 2" />
                          	<input type="hidden" name="pillar" id="pillarInput" />
                            <div class="overlay selectTemplate" id="pillarOverlay">
                                <button type="button" class="btn btn-light w-75 fw-bold selectTemplate" id="pillarBtn"><?php echo e(__('general.chooseTemplate')); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-5">
                        <div class="card border-0 template-card text-center fw-bold">
                            <img src="<?php echo e(asset('assets/images/pillar-dev.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="قالب 2" />
                         	<input type="hidden" name="pillar-dev" id="pillarDevInput" />
                            <div class="overlay selectTemplate" id="pillarDevOverlay">
                                <button type="button" class="btn btn-light w-75 fw-bold selectTemplate" id="pillarDevBtn"><?php echo e(__('general.chooseTemplate')); ?></button>
                            </div>
                        </div>
                    </div>
                  	<div class="col-lg-4 col-sm-12 mb-5">
                        <div class="card border-0 template-card text-center fw-bold">
                            <img src="<?php echo e(asset('assets/images/simple.jpg')); ?>" class="card-img-top checkable mx-auto"
                                alt="قالب 2" />
                         	<input type="hidden" name="simple" id="simpleInput" />
                            <div class="overlay selectTemplate" id="simpleOverlay">
                                <button type="button" class="btn btn-light w-75 fw-bold selectTemplate" id="simpleBtn"><?php echo e(__('general.chooseTemplate')); ?></button>
                            </div>
                        </div>
                    </div>
                  	<div class="col-lg-4 col-sm-12 mb-5">
                        <div class="card border-0 template-card text-center fw-bold">
                            <img src="<?php echo e(asset('assets/images/simple-dev.jpg')); ?>" class="card-img-top checkable mx-auto"
                                alt="قالب 2" />
                         	<input type="hidden" name="simple-dev" id="simpleDevInput" />
                            <div class="overlay selectTemplate" id="simpleDevOverlay">
                                <button type="button" class="btn btn-light w-75 fw-bold selectTemplate" id="simpleDevBtn"><?php echo e(__('general.chooseTemplate')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('HEAD_BOTTOM'); ?>
    <style>
        img.card-img,
        .card-img-top {
            width: 23vw;
        }

        @media (max-width:800px) {

            img.card-img,
            .card-img-top {
                width: 70vw;
            }
        }
    </style>
    <style>
        .card {
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #fff;
          background-color:rgba(0,0,0,0.4);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
          cursor:pointer;
        }

        .template-card:hover .overlay {
            opacity: 1;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.no-preview-step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/pages/steps/template.blade.php ENDPATH**/ ?>