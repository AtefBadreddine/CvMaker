<?php $__env->startPush('HEAD_BOTTOM'); ?>
    <style>
        span.imgCheckbox0 img {
            margin: 0px auto;
            width: 50px;
        }

        p.card-text
        {
            font-size: 1em;
        }
      
      	.checkable, .card-text
        {
          cursor:pointer
        }
      
      	@media(max-width:800px)
        {
      		.col-sm-6 my-3 {
              flex: 0 0 auto;
              width: 50%;
          }
      	}

        .border-light-subtle
        {
            border-color:#eee
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('BODY_BOTTOM'); ?>
<script>
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
  
  	$('.card-text').click(function(){
    	$(this).closest('.card').find('.checkable').click()
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('STEP_TITLE'); ?>
    <h2 class="display-5 fw-bolder mb-0">
        <span class="d-inline">
            <?php echo e(__('general.home_title')); ?>

        </span>
    </h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('STEP_CONTENT'); ?>
    <div class="card border-0">
        <div class="card-body p-md-3 p-xs-2">
            <form method="POST" action="<?php echo e(route('setLang')); ?>" id="stepsForm">
                <?php echo csrf_field(); ?>
                <div class="row justify-content-evenly">
                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/uae.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="االغة العربية" name="ar_lang" />
                                <div class="card-body p-0">
                                <p class="card-text">العربية</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/usa.png')); ?>" class="card-img-top checkable mx-auto" alt="English Language" name="en_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">English</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/france.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="Langue française" name="fr_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Français</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/germany.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="Deutsch" name="de_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Deutsch</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/portugal.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="Português" name="pt_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Português</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/spain.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="Español" name="es_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Español</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/turkey.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="Türkçe" name="tr_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Türkçe</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/italy.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="االغة العربية" name="it_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Italy</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/netherlands.png')); ?>" class="card-img-top checkable mx-auto" alt="Netherlands Language" name="nl_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Netherlands</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/poland.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="Poland" name="pl_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Poland</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/romania.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="romania" name="ro_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Romania</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/greece.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="greece" name="el_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Greece</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/ukraine.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="ukraine" name="uk-UA_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Ukraine</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/indonesia.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="indonesia" name="id_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/hungary.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="hungary" name="hu_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Hungary</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/norway.png')); ?>" class="card-img-top checkable mx-auto" alt="norway" name="no_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Norway</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/sweden.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="sweden" name="sv_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Sweden</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/denmark.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="denmark" name="da_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Denmark</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/finland.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="finland" name="fi_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Finland</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 my-3">
                        <div class="card border-1 border-light-subtle border-opacity-25 text-center fw-bold flex-row justify-content-center align-items-center">
                            <img src="<?php echo e(asset('assets/images/czech.png')); ?>" class="card-img-top checkable mx-auto"
                                alt="czech" name="cs_lang" />
                            <div class="card-body p-0">
                                <p class="card-text">Czech</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.no-preview-step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/pages/cvmake.blade.php ENDPATH**/ ?>