<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <h1 class="fs-3 fw-bolder text-primary"><img src="<?php echo e(asset('assets/images/Logo.png')); ?>" width="120px" /></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" style="justify-content: space-between;" id="navbarSupportedContent">
            <?php echo $__env->make('components.steps-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <ul class="navbar-nav mb-2 mb-lg-0 small fw-bolder fs-6">
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle <?php if(request()->is('/')): ?> active <?php endif; ?>" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if(session()->has('selectedLang')): ?>
                            <?php switch(session()->get('selectedLang')):
                                case ('ar'): ?>
                                    <i class="fi fi-sa"></i>
                                <?php break; ?>

                                <?php case ('en'): ?>
                                    <i class="fi fi-us"></i>
                                <?php break; ?>

                                <?php case ('el'): ?>
                                    <i class="fi fi-gr"></i>
                                <?php break; ?>

                                <?php case ('uk-UA'): ?>
                                    <i class="fi fi-ua"></i>
                                <?php break; ?>

                                <?php case ('sv'): ?>
                                    <i class="fi fi-se"></i>
                                <?php break; ?>

                                <?php case ('da'): ?>
                                    <i class="fi fi-dk"></i>
                                <?php break; ?>

                                <?php case ('cs'): ?>
                                    <i class="fi fi-cz"></i>
                                <?php break; ?>

                                <?php default: ?>
                                    <i class="fi fi-<?php echo e(session()->get('selectedLang')); ?>"></i>
                            <?php endswitch; ?>
                        <?php else: ?>
                            <i class="bi bi-translate"></i>
                        <?php endif; ?>
                        <?php echo e(__('steps-bar.one')); ?>

                    </a> 
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
                
                </li>
            </ul>
        </div>

    </div>
</nav>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/components/navbar.blade.php ENDPATH**/ ?>