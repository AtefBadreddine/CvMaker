<?php $__env->startSection('PAGE_TITLE', 'إصنع سيرتك الذاتية'); ?>

<?php $__env->startSection('STEP_TITLE'); ?>
<h2 class="fw-bolder mb-0 px-1">
    <span class="text-dark d-inline">
        <?php echo e(__('steps-bar.six')); ?>

    </span>
</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('STEP_CONTENT'); ?>
    <div class="card-body p-2">
        <form class="row " id="stepsForm" method="POST" action="<?php echo e(route('step.processingFour')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card border-0 p-md-5 p-sm-1">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-translate fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="langs_section_title"
                                   value="<?php echo e(__('pdf-sections.languages')); ?>"
                                   placeholder="<?php echo e(__('pdf-sections.languages')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-muted fst-italic"><?php echo e(__('pdf-sections.languages_desc')); ?></small>
                    </div>
                </div>

                <div id="collapse1">
                    <div class="card-body">
                        <div id="languages" class="row g-3 structure align-items-center" style="display:none">
                            <div class="col-md-6">
                                <label for="inputLanguageTitle" class="form-label fw-bold"><?php echo e(__('labels.language')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputLanguageTitle" name="language" value="<?php echo e(old('language') ?? ($cv->language ?? '')); ?>">
                            </div>
                            <div class="col-md-5">
                                <label for="inputLanguageLevel" class="form-label fw-bold"><?php echo e(__('labels.level')); ?></label>
                                <select class="form-control form-control-lg rounded-pill" id="inputLanguageLevel" name="level">
                                    <option <?php if(isset($cv->level) && $cv->level == __('labels.language_begginer')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_begginer')); ?></option>
                                    <option <?php if(isset($cv->level) && $cv->level == __('labels.language_good')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_good')); ?></option>
                                    <option <?php if(isset($cv->level) && $cv->level == __('labels.language_vgood')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_vgood')); ?></option>
                                    <option <?php if(isset($cv->level) && $cv->level == __('labels.language_native')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_native')); ?></option>
                                    <option <?php if(isset($cv->level) && $cv->level == 'A1'): echo 'selected'; endif; ?>>A1</option>
                                    <option <?php if(isset($cv->level) && $cv->level == 'A2'): echo 'selected'; endif; ?>>A2</option>
                                    <option <?php if(isset($cv->level) && $cv->level == 'B1'): echo 'selected'; endif; ?>>B1</option>
                                    <option <?php if(isset($cv->level) && $cv->level == 'B2'): echo 'selected'; endif; ?>>B2</option>
                                    <option <?php if(isset($cv->level) && $cv->level == 'C1'): echo 'selected'; endif; ?>>C1</option>
                                    <option <?php if(isset($cv->level) && $cv->level == 'C2'): echo 'selected'; endif; ?>>C2</option>
                                </select>
                            </div>
                          	<div class="col-1 pt-4">
                              <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                  <i class="bi bi-trash3 fs-5 mx-2"></i>
                              </button>
                            </div>
                            <hr />
                        </div>
                        <?php if(isset($cv->languages)): ?>
                            <?php $__currentLoopData = $cv->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="languages" class="row g-3 structure deletable">
                                    <div class="col-md-6">
                                        <label for="inputLanguageTitle" class="form-label fw-bold"><?php echo e(__('labels.language')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputLanguageTitle" name="languages[<?php echo e($loop->iteration); ?>][language]" value="<?php echo e($lang['language']); ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputLanguageLevel" class="form-label fw-bold"><?php echo e(__('labels.level')); ?></label>
                                        <select class="form-control form-control-lg rounded-pill" id="inputLanguageLevel" name="languages[<?php echo e($loop->iteration); ?>][level]">
                                            <option <?php if(isset($lang['level']) && $lang['level'] == __('labels.language_begginer')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_begginer')); ?></option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == __('labels.language_good')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_good')); ?></option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == __('labels.language_vgood')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_vgood')); ?></option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == __('labels.language_native')): echo 'selected'; endif; ?>><?php echo e(__('labels.language_native')); ?></option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == 'A!'): echo 'selected'; endif; ?>>A1</option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == 'A2'): echo 'selected'; endif; ?>>A2</option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == 'B1'): echo 'selected'; endif; ?>>B1</option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == 'B2'): echo 'selected'; endif; ?>>B2</option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == 'C1'): echo 'selected'; endif; ?>>C1</option>
                                            <option <?php if(isset($lang['level']) && $lang['level'] == 'C2'): echo 'selected'; endif; ?>>C2</option>
                                        </select>
                                    </div>
                                  	<div class="col-1 pt-4">
                                      <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                          <i class="bi bi-trash3 fs-5 mx-2"></i>
                                      </button>
                                    </div>
                                    <hr />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <button type="button" id="createElement" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    <?php echo e(__('general.addMoreLangBtn')); ?>

                </button>
            </div>

            <div class="card border-0 p-md-5 p-sm-1">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-magic fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="skills_section_title" value="<?php echo e(__('pdf-sections.skills')); ?>" placeholder="<?php echo e(__('pdf-sections.skills')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-muted fst-italic"><?php echo e(__('pdf-sections.skills_desc')); ?></small>
                    </div>
                </div>
                <div id="collapse2">
                    <div class="card-body">
                        <div id="skills" class="row g-3 structure align-items-center" style="display:none">
                            <div class="col-md-11">
                                <label for="inputSkill" class="form-label fw-bold"><?php echo e(__('labels.skill')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputSkill" name="skill" value="<?php echo e(old('skill') ?? ($cv->skill ?? '')); ?>">
                            </div>
                          	<div class="col-md-1 pt-4">
                              <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                  <i class="bi bi-trash3 fs-5 mx-2"></i>
                              </button>
                            </div>
                            <hr />
                        </div>
                        <?php if(isset($cv->skills)): ?>
                            <?php $__currentLoopData = $cv->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="skills" class="row g-3 structure deletable">
                                    <div class="col-md-11">
                                        <label for="inputSkill" class="form-label fw-bold"><?php echo e(__('labels.skill')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputSkill" name="skills[<?php echo e($loop->iteration); ?>][skill]" value="<?php echo e($skill['skill']); ?>">
                                    </div>
                                  	<div class="col-md-1 pt-4">
                                      <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                          <i class="bi bi-trash3 fs-5 mx-2"></i>
                                      </button>
                                    </div>
                                    <hr />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <button type="button" id="createElement2" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    <?php echo e(__('general.addMoreSkillBtn')); ?>

                </button>
            </div>

          <div class="card border-0 p-md-5 p-sm-1">
              <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                  <div class="w-100">
                      <h4 class="d-flex align-items-center mb-1">
                          <i class="bi bi-moon-stars-fill fs-4 text-primary"></i>
                          <input type="text"
                                 class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                 name="summary_section_title" value="<?php echo e(__('pdf-sections.summary')); ?>" placeholder="<?php echo e(__('pdf-sections.summary')); ?>"
                                 aria-label="Section Title" />
                      </h4>
                      <small class="text-muted fst-italic"><?php echo e(__('pdf-sections.summary_desc')); ?></small>
                  </div>
              </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="textareaDetails" class="form-label fw-bold"><?php echo e(__('labels.details')); ?></label>
                          	<button class="btn btn-sm btn-primary addBullet" type="button"><?php echo e(__('labels.add_bullet')); ?> •</button>
                            <textarea class="form-control rounded" id="textareaDetails" rows="3" name="profession_summary"><?php echo e(old('profession_summary') ?? ($cv->profession_summary ?? '')); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 p-md-5 p-sm-1 collapse <?php if(isset($cv->cert)): ?> show <?php endif; ?>" id="collapseCerts">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bank fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="certs_section_title" value="<?php echo e(__('pdf-sections.certs')); ?>" placeholder="<?php echo e(__('pdf-sections.certs')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-primary fst-italic"><?php echo e(__('pdf-sections.optional_section')); ?></small>
                    </div>
                </div>
                <div id="collapse6">
                    <div class="card-body">
                        <div id="certs" class="row g-3 structure align-items-center">
                            <div class="col-md-12">
                                <label for="inputSkill" class="form-label fw-bold"><?php echo e(__('labels.cert')); ?></label>
                                <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="cert"><?php echo e(($cv->cert ?? '')); ?></textarea>
                            </div>
                            <!--<div class="col-md-1 pt-4">
                                <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                    <i class="bi bi-trash3 fs-5 mx-2"></i>
                                </button>
                            </div>-->
                            <hr />
                        </div>
                        <?php if(isset($cv->certs)): ?>
                            <?php $__currentLoopData = $cv->certs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="certs" class="row g-3 structure deletable">
                                    <div class="col-md-12">
                                        <label for="inputSkill" class="form-label fw-bold"><?php echo e(__('labels.cert')); ?></label>
                                        <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="certs[<?php echo e($loop->iteration); ?>][cert]"><?php echo e($cert['cert']); ?></textarea>
                                    </div>
                                    <!--<div class="col-md-1 pt-4">
                                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                                        </button>
                                    </div>-->
                                    <hr />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--<button type="button" id="createElement6" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    <?php echo e(__('general.addMoreBtn')); ?>

                </button>-->
            </div>

            <div class="card border-0 p-md-5 p-sm-1  collapse <?php if(isset($cv->ref)): ?> show <?php endif; ?>" id="collapseRefs">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-pen fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="refs_section_title" value="<?php echo e(__('pdf-sections.refs')); ?>" placeholder="<?php echo e(__('pdf-sections.refs')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-primary fst-italic"><?php echo e(__('pdf-sections.optional_section')); ?></small>
                    </div>
                </div>
                <div id="collapse9">
                    <div class="card-body">
                        <div id="refs" class="row g-3 structure align-items-center">
                            <div class="col-md-12">
                                <label for="inputSkill" class="form-label fw-bold"><?php echo e(__('labels.ref')); ?></label>
                                <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="ref"><?php echo e(($cv->ref ?? '')); ?></textarea>
                            </div>
                            <!--<div class="col-md-1 pt-4">
                                <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                    <i class="bi bi-trash3 fs-5 mx-2"></i>
                                </button>
                            </div>-->
                            <hr />
                        </div>
                        <?php if(isset($cv->refs)): ?>
                            <?php $__currentLoopData = $cv->refs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="refs" class="row g-3 structure deletable">
                                    <div class="col-md-12">
                                        <label for="inputSkill" class="form-label fw-bold"><?php echo e(__('labels.ref')); ?></label>
                                        <textarea class="form-control form-control-lg rounded-pill" id="inputSkill" name="refs[<?php echo e($loop->iteration); ?>][ref]"><?php echo e($ref['ref']); ?></textarea>
                                    </div>
                                    <!--<div class="col-md-1 pt-4">
                                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                                        </button>
                                    </div>-->
                                    <hr />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!--<button type="button" id="createElement9" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    <?php echo e(__('general.addMoreBtn')); ?>

                </button>-->
            </div>





            <div class="card border-0 p-md-5 p-sm-1  collapse <?php if(isset($cv->interests)): ?> show <?php endif; ?>" id="collapseInterests">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bag-heart-fill fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="interests_section_title" value="<?php echo e(__('pdf-sections.interests')); ?>" placeholder="<?php echo e(__('pdf-sections.intersts')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <small class="text-primary fst-italic"><?php echo e(__('pdf-sections.optional_section')); ?></small>
                    </div>
                </div>
                <div id="collapse3">
                    <div class="card-body">
                        <div id="interests" class="row g-3 structure" style="display: none">
                            <div class="col-md-11">
                                <label for="inputInterest" class="form-label fw-bold"><?php echo e(__('labels.interest')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputInterest" name="interest" value="<?php echo e(old('interest') ?? ($cv->interest ?? '')); ?>">
                            </div>
                          	<div class="col-md-1 pt-4">
                              <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                  <i class="bi bi-trash3 fs-5 mx-2"></i>
                              </button>
                            </div>
                            <hr />
                        </div>
                        <?php if(isset($cv->interests)): ?>
                            <?php $__currentLoopData = $cv->interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div id="interests" class="row g-3 structure deletable">
                                    <div class="col-md-11">
                                        <label for="inputInterest" class="form-label fw-bold"><?php echo e(__('labels.interest')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputInterest" name="interests[<?php echo e($loop->iteration); ?>][interest]" value="<?php echo e($interest['interest']); ?>">
                                    </div>
                                  	<div class="col-md-1 pt-4">
                                      <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                          <i class="bi bi-trash3 fs-5 mx-2"></i>
                                      </button>
                                  	</div>
                                    <hr />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <button type="button" id="createElement3" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    <?php echo e(__('general.addMoreInterestBtn')); ?>

                </button>
            </div>

            <div class="card border-0 p-md-5 p-sm-1  structure" id="customSections" style="display: none">
                <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bandaid fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="customSectionTitle" value="<?php echo e(old('customSectionTitle') ?? ($cv->customSectionTitle ?? '')); ?>"   placeholder="<?php echo e(__('labels.customSectionTitle')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-primary fst-italic"><?php echo e(__('pdf-sections.optional_section')); ?></small>
                            <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                <i class="bi bi-trash3 fs-5 mx-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="textareaDetails1" class="form-label"><?php echo e(__('labels.details')); ?></label>
                          	<button class="btn btn-sm btn-primary addBullet" type="button"><?php echo e(__('labels.add_bullet')); ?> •</button>
                            <textarea class="form-control" id="textareaDetails1" rows="3" name="customSectionDetails"><?php echo e(old('customSectionDetails') ?? ($cv->customSectionDetails ?? '')); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <span id="customs">
                <?php if(isset($cv->customSections)): ?>
                    <?php $__currentLoopData = $cv->customSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card shadow border-0 p-md-5 p-sm-1 mt-5 structure deletable" id="customSections">

                               <div class="card-header bg-light d-flex justify-content-between flex-wrap align-items-center border-bottom border-secondary-subtle py-3">
                    <div class="w-100">
                        <h4 class="d-flex align-items-center mb-1">
                            <i class="bi bi-bandaid fs-4 text-primary"></i>
                            <input type="text"
                                   class="form-control form-control-lg rounded-pill border-1 ms-2 fs-4 fw-semibold bg-white"
                                   name="customSections[<?php echo e($loop->iteration); ?>][customSectionTitle]" value="<?php echo e($section['customSectionTitle']); ?>"  placeholder="<?php echo e(__('labels.customSectionTitle')); ?>"
                                   aria-label="Section Title" />
                        </h4>
                        <div class="d-flex justify-content-between align-items-center">
                               <small class="text-primary fst-italic"><?php echo e(__('pdf-sections.optional_section')); ?></small>
                        <button type="button" class="btn btn-outline-danger border-0 removeElement">
                            <i class="bi bi-trash3 fs-5 mx-2"></i>
                        </button>
                        </div>

                    </div>
                </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-2">
                                               <label for="textareaDetails1" class="form-label"><?php echo e(__('labels.details')); ?></label>
                                      	<button class="btn btn-sm btn-primary addBullet" type="button"><?php echo e(__('labels.add_bullet')); ?> •</button>
                                        </div>

                                        <textarea class="form-control" id="textareaDetails1" rows="3" name="customSections[<?php echo e($loop->iteration); ?>][customSectionDetails]"><?php echo e($section['customSectionDetails']); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </span>

            <div class="card border-0 p-md-5 p-sm-1 mt-5">
                <div class="card-header bg-white d-flex justify-content-between flex-wrap">
                    <div>
                        <h4>
                            <i class="bi bi-pencil-square"></i>
                            <?php echo e(__('general.addNewSectionTitle')); ?>

                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseInterests">
                                <i class="bi bi-bag-heart-fill"></i>
                                <?php echo e(__('pdf-sections.interests')); ?>

                            </button>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseCerts">
                                <i class="bi bi-bank2"></i>
                                <?php echo e(__('pdf-sections.certs')); ?>

                            </button>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseRefs">
                                <i class="bi bi-pen"></i>
                                <?php echo e(__('pdf-sections.refs')); ?>

                            </button>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button type="button" class="btn btn-outline-primary rounded-pill" id="createElement5">
                                <i class="bi bi-mic-fill"></i>
                                <?php echo e(__('pdf-sections.custom')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('BODY_BOTTOM'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.repeater.js')); ?>"></script>
    <script>

        $(function() {
            $('#stepsForm').repeater({
                repeatElement: 'languages',
                containerElement: 'collapse1',
                groupName: "languages",
                createElement: 'createElement',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'skills',
                containerElement: 'collapse2',
                groupName: "skills",
                createElement: 'createElement2',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'interests',
                containerElement: 'collapse3',
                groupName: "interests",
                createElement: 'createElement3',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'certs',
                containerElement: 'collapse6',
                groupName: "certs",
                createElement: 'createElement6',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'refs',
                containerElement: 'collapse9',
                groupName: "refs",
                createElement: 'createElement9',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'courses',
                containerElement: 'collapse4',
                groupName: "courses",
                createElement: 'createElement4',
                removeElement: 'removeElement'
            });

            $('#stepsForm').repeater({
                repeatElement: 'customSections',
                containerElement: 'customs',
                groupName: "customSections",
                createElement: 'createElement5',
                removeElement: 'removeElement'
            });



            $('.removeElement').click(function () {
                $(this).parents(".deletable").remove();
            });

            $('#submitBtn').click(function(event) {
                event.preventDefault();
                // Check if the collapsible div is shown
                if ($('.collapse').hasClass('show'))
                {
                    // Enable the additional inputs inside the collapsible div
                    $('.collapse input').prop('disabled', false);
                } else {
                    // Disable the additional inputs inside the collapsible div
                    $('.collapse input').prop('disabled', true);
                }

                // Submit the form
                $('#stepsForm').submit();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/pages/steps/four.blade.php ENDPATH**/ ?>