<?php $__env->startSection('PAGE_TITLE', 'إصنع سيرتك الذاتية'); ?>

<?php $__env->startSection('PAGE_CONTENT'); ?>
    <!-- Page Content-->
    <div class="container px-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xs-12 my-5">
              <div class="text-left mb-4">
                  <?php echo $__env->yieldContent('STEP_TITLE'); ?>
              </div>
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
                          <div class="row justify-content-between align-items-center">
                            <div class="col-xs-12 col-lg-3 text-center order-lg-first order-sm-last">
                              <a
                                 <?php switch(request()->route()->getName()):
                                      case ('step.one'): ?>
                                          href="<?php echo e(route('step.template')); ?>"
                                          <?php break; ?>

                                      <?php case ('step.two'): ?>
                                          href="<?php echo e(route('step.one')); ?>"
                                          <?php break; ?>

                                	<?php case ('step.three'): ?>
                                          href="<?php echo e(route('step.two')); ?>"
                                          <?php break; ?>

                                	<?php case ('step.four'): ?>
                                          href="<?php echo e(route('step.three')); ?>"
                                          <?php break; ?>

                                	<?php case ('step.finish'): ?>
                                          href="<?php echo e(route('step.four')); ?>"
                                          <?php break; ?>

                                      <?php default: ?>
                                          href="<?php echo e(route('step.template')); ?>"
                                  <?php endswitch; ?>
                                 class="btn btn-outline-primary w-100 fw-bold rounded-pill border-0" id="prevBtn">
                                  <?php echo e(__('labels.prev')); ?>

                                  
                              </a>
                            </div>
                            <div class="col-xs-12 col-lg-3 text-center order-lg-last order-sm-first">
                              <button type="submit" id="submitBtn" class="btn btn-primary w-100 fw-bold rounded-pill">
                                  <?php echo e(__('labels.continue')); ?>

                                  
                              </button>
                            </div>
                          </div>
                            <?php if(isset($cv)): ?>
                            
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </section>
            </div>
          	<div class="col-lg-4 d-sm-none mt-5 d-md-block text-center">
            <div class="dropdown mt-5">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-translate"></i>
                  <?php echo e(__('steps-bar.one')); ?>

              </button>
              <ul class="dropdown-menu">
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=ar">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/uae.png')); ?>" class="mx-1" width="25" height="25"> العربية
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=en">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/usa.png')); ?>" class="mx-1" width="25" height="25"> English
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=fr">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/france.png')); ?>" class="mx-1" width="25" height="25"> Français
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=de">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/germany.png')); ?>" class="mx-1" width="25" height="25"> Deutsch
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=pt">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/portugal.png')); ?>" class="mx-1" width="25" height="25"> Português
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=es">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/spain.png')); ?>" class="mx-1" width="25" height="25"> Español
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=tr">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/turkey.png')); ?>" class="mx-1" width="25" height="25"> Türkçe
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=it">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/italy.png')); ?>" class="mx-1" width="25" height="25"> italiano
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=nl">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/netherlands.png')); ?>" class="mx-1" width="25" height="25"> Nederlands
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=pl">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/poland.png')); ?>" class="mx-1" width="25" height="25"> Polski
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=ro">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/romania.png')); ?>" class="mx-1" width="25" height="25"> Română
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=el">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/greece.png')); ?>" class="mx-1" width="25" height="25"> Ελληνικά
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=uk-UA">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/ukraine.png')); ?>" class="mx-1" width="25" height="25"> українська мова
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=id">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/indonesia.png')); ?>" class="mx-1" width="25" height="25"> Bahasa Indonesia
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=hu">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/hungary.png')); ?>" class="mx-1" width="25" height="25"> Magyar
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=no">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/norway.png')); ?>" class="mx-1" width="25" height="25"> Norsk
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=sv">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/sweden.png')); ?>" class="mx-1" width="25" height="25"> Svenska
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=da">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/denmark.png')); ?>" class="mx-1" width="25" height="25"> Dansk
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=fi">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/finland.png')); ?>" class="mx-1" width="25" height="25"> Suomi
                              </div>
                          </a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="<?php echo e(url()->current()); ?>?lang=cs">
                              <div class="d-flex justify-content-start align-items-center">
                                  <img src="<?php echo e(asset('assets/images/czech.png')); ?>" class="mx-1" width="25" height="25"> Čeština
                              </div>
                          </a>
                      </li>
                    </ul>
            </div>
                <iframe id="pdfPreview" class="rounded" height="100%" style="height:115vh"></iframe>

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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <style>
        .nav-link {
            color: #999;
        }

      @media(max-width:800px)
      {
        .iframe
        {
        	margin-top:20px;
          	visibility: hidden;
        }

        iframe
        {
        	height:800px
        }
        .order-sm-first
        {
        	order:-1 !important;
        }

        .d-sm-none
        {
        	display:none
        }

        #prevBtn,
        #saveAndFinish,
        #submitBtn
        {
          height:3.2em;
          margin-bottom:15px
        }
      }

      @media(min-width:900px)
      {
        .iframe
        {
            z-index: 999;
    		opacity: 0.3;
          	bottom:50px;
          <?php if(app()->currentLocale() == "ar"): ?>
            position: fixed;left: 11%;
          <?php else: ?>
            position: fixed;right: 11%;
          <?php endif; ?>
        }

        iframe
        {
          <?php if(app()->currentLocale() == "ar"): ?>
            top: 167px;  left: 10%;
          <?php else: ?>
            top: 167px; right: 10%;
          <?php endif; ?>
        }
      }

      @media(min-width:1400px)
      {
        <?php if(app()->currentLocale() == "ar"): ?>
            left: 25%;
          <?php else: ?>
            right: 25%;
          <?php endif; ?>
      }

    </style>
<?php $__env->stopPrepend(); ?>

<?php $__env->startPrepend('BODY_BOTTOM'); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap-toggle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.imgcheckbox.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.word-and-character-counter.js')); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        function addBullet(btn) {
            var textarea = btn.nextElementSibling;
            var selectionStart = textarea.selectionStart;
            var selectionEnd = textarea.selectionEnd;
            var beforeSelection = textarea.value.substring(0, selectionStart);
            var selection = textarea.value.substring(selectionStart, selectionEnd);
            var afterSelection = textarea.value.substring(selectionEnd);

            // Determine if we need a newline before the bullet
            var needsNewline = beforeSelection.length > 0 && !beforeSelection.endsWith('\n');
            var bulletLine = (needsNewline ? '\n' : '') + '• ' + selection;

            // Update textarea value
            textarea.value = beforeSelection + bulletLine + afterSelection;

            // Move cursor to end of inserted bullet
            const newCursorPos = beforeSelection.length + bulletLine.length;
            textarea.setSelectionRange(newCursorPos, newCursorPos);
            textarea.focus();

            return false;
        }


        $('body').on('click','.addBullet', function(event){addBullet(event.target)});

          $(window).scroll(function(){
              $("iframe").css("top", Math.max(0, 167 - $(this).scrollTop()));
              $(".iframe").css("bottom", Math.max(10, 10 - $(this).scrollTop()));
          });
          const applyOrder = () => {
          	const educations = $('.educations .accordion-item');
            educations.each((index, educationBox) => {
              console.log("educationBox ",educationBox)
              $(educationBox).find('.form-control').each((i, input) => {
                input.name = input.name.replace(/\[\d*\]/, `[${index+1}]`);
              });
              $(educationBox).find('.hashNumber').each((i, span) => {
                span.innerHTML = $(educationBox).find('#inputDegree').val() ?? index+1;
              });
            });
            const jobs = $('.jobs .accordion-item');
            jobs.each((index, jobBox) => {
              $(jobBox).find('.form-control').each((i, input) => {
                input.name = input.name.replace(/\[\d*\]/, `[${index+1}]`);
              });
              $(jobBox).find('.hashNumber').each((i, span) => {
                span.innerHTML = $(jobBox).find('#inputJobTitle').val() ?? index+1;
              });
            });
          }
          const autoPreview = () => {
            applyOrder();
        	$.ajax({
                url: '/autoSave',
                method: 'POST',
              	headers:{"X-CSRF-TOKEN":"<?php echo e(csrf_token()); ?>"},
                processData: false,
              	contentType:false,
                data: new FormData(document.getElementById('stepsForm')),
                success: function(res)
                {
                    console.log("success")
                    console.log(res);
                    $("#pdfPreview").attr('src', '/cv')

                },
                error : function (res) {
                    console.log(res)
                    console.log(res.responseJSON)
                    const errors = res.responseJSON.errors;
                    if (errors?.picture) {
                        $('#picture-error').text(errors.picture[0]);
                    }
                }

                }
            );
        }
          autoPreview();
          $("body").on("change", ".form-control, .form-select, input[type='file']",autoPreview);
          $(document).on("click", ".removeElement",autoPreview);

            $("#submitBtn").on("click", function(){
              	applyOrder();
                $("form#stepsForm").submit();
            });

            $("#saveAndFinish").on("click", function(){
              	applyOrder();
                $("form#stepsForm").attr('action', "<?php echo e(route('autoSave')); ?>");
                $("form#stepsForm").submit();
            });

            let detectTap = false;

            $('body').on('touchstart', '#sortableList input, #sortableList select', () => {
              detectTap = true;
            });
            $('body').on('touchmove', '#sortableList input, #sortableList select', () => {
              detectTap = false;
            });
            $('body').on('touchend', '#sortableList input, #sortableList select', (e) => {
              if (detectTap) $(e.target).focus();
            });

          let detectCollapse = false;

            $('body').on('touchstart', '#sortableList .accordion-button', () => {
              detectCollapse = true;
            });
            $('body').on('touchmove', '#sortableList .accordion-button', () => {
              detectCollapse = false;
            });
            $('body').on('touchend', '#sortableList .accordion-button', (e) => {
              if (detectCollapse) $(e.target).click();
            });


    </script>
<?php $__env->stopPrepend(); ?>

<?php echo $__env->make('layouts.abstract', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/layouts/step.blade.php ENDPATH**/ ?>