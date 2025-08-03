<?php $__env->startSection('PAGE_TITLE', 'إصنع سيرتك الذاتية'); ?>

<?php $__env->startSection('STEP_TITLE'); ?>
<h2 class="fw-bolder mb-0 px-1">
    
</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('STEP_CONTENT'); ?>
<div class="card border-0">
    <div class="card-body p-2">
        
        <form class="row g-3" id="stepsForm" method="POST" action="<?php echo e(route('step.processingThree')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card border-0">
                <div class="card-header bg-white d-flex justify-content-between flex-wrap">
                    <div>
                        <h4 class="d-flex align-items-center">
                            <input id="headTitle" type="text" style="width:255px" class="border-0 fs-2 fw-bold" name="jobs_section_title" value="<?php echo e(__('pdf-sections.experiences')); ?>" placeholder="<?php echo e(__('pdf-sections.experiences')); ?>" />
                            <label for="headTitle">
                                <i class="bi bi-pen align-middle"></i>
                            </label>
                        </h4>
                        <small class="text-muted"><?php echo e(__('pdf-sections.experiences_desc')); ?></small>
                    </div>
                    
                </div>
                <div id="collapse1" class="jobs">
                    <div class="card-body accordion" id="sortableList">
                        
                        <?php if(isset($cv->jobs)): ?>
                            <?php $__currentLoopData = $cv->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed positionn-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBox<?php echo e($loop->iteration+1); ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="handler bi bi-arrows-move text-dark px-2" style="cursor:move"></i>
                                      	<span class="hashNumber"><?php echo e($loop->iteration); ?></span>
                                    </button>
                                </h2>
                                <div id="collapseBox<?php echo e($loop->iteration+1); ?>" class="accordion-collapse collapse" data-bs-parent="#sortableList">
                                	<div id="jobs-<?php echo e($loop->iteration+1); ?>" class="row g-3 deletable p-3">
                                    <div class="col-md-12">
                                        <label for="inputJobTitle" class="form-label fw-bold"><?php echo e(__('labels.job')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputJobTitle" name="jobs[][job_title]" value="<?php echo e($job['job_title'] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmployer" class="form-label fw-bold"><?php echo e(__('labels.employer')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputEmployer" name="jobs[][employer]" value="<?php echo e($job['employer'] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label fw-bold"><?php echo e(__('labels.city')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputCity" name="jobs[][job_city]" value="<?php echo e($job['job_city'] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStartYear" class="form-label fw-bold"><?php echo e(__('labels.start_date')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputStartYear" name="jobs[][jobStartYear]" value="<?php echo e($job['jobStartYear'] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEndYear" class="form-label fw-bold"><?php echo e(__('labels.end_date')); ?></label>
                                        <input type="text" class="form-control form-control-lg rounded-pill" id="inputEndYear" name="jobs[][jobEndYear]" value="<?php echo e($job['jobEndYear'] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="textareaDetails" class="form-label fw-bold"><?php echo e(__('labels.details')); ?></label>
                                      	<button class="btn btn-sm btn-primary addBullet" type="button"><?php echo e(__('labels.add_bullet')); ?> •</button>
                                        <textarea class="form-control area rounded" id="textareaDetails" rows="3" name="jobs[<?php echo e($loop->iteration); ?>][details]"><?php echo e($job['details'] ?? ''); ?></textarea>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                        <i class="bi bi-trash3 fs-5 mx-2"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <button type="button" id="createElement" class="btn btn-outline-primary rounded-pill fw-bold py-1">
                    <i class="bi bi-plus fs-5 fw-bold mx-2 align-middle"></i>
                    <?php echo e(__('general.addMoreJobBtn')); ?>

                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('HEAD_BOTTOM'); ?>
<?php if(app()->getLocale() == 'ar'): ?>
	<style>.accordion-button::after{margin-left:0}</style>
<?php else: ?>
	<style>.accordion-button::after{margin-right:0}</style>
<?php endif; ?>
<style>

.accordion-button:not(.collapsed) {
    color: unset;
    background-color: unset;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('BODY_BOTTOM'); ?>
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    <script>
        let elements = 0;
        <?php if(isset($cv->jobs)): ?> elements = <?php echo e(count($cv->jobs) + 1); ?>; <?php endif; ?>
        $(function() {
            $('body').on('click','.removeElement',function () {
                elements--;
                $(this).parents(".accordion-item").remove();
            });
			new Sortable(document.getElementById('sortableList'), {
                animation: 150,
              	onEnd: autoPreview,
              handle:'.handler'
            });
            
            $("#createElement").click(function(e){
                e.preventDefault();
              $(".accordion-collapse").each((i, element) => {
              	element.classList.remove("show")
              });
              $(".accordion-button").each((i, element) => {
              	element.classList.add("collapsed")
              });
                elements++;
                $('#sortableList').append(
                `<div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button positionn-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBox${elements}" aria-expanded="true" aria-controls="collapseOne">
                            <i class="handler bi bi-arrows-move text-dark px-2" style="cursor:move"></i>
							<span class="hashNumber">${elements}</span>
                        </button>
                    </h2>
                    <div id="collapseBox${elements}" class="accordion-collapse collapse show" data-bs-parent="#sortableList">
                        <div id="jobs" class="row g-3 deletable p-3">
                            <div class="col-md-12">
                                <label for="inputJobTitle" class="form-label fw-bold"><?php echo e(__('labels.job')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputJobTitle" name="jobs[][job_title]" >
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="inputEmployer" class="form-label fw-bold"><?php echo e(__('labels.employer')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputEmployer" name="jobs[][employer]">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="inputCity" class="form-label fw-bold"><?php echo e(__('labels.city')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputCity" name="jobs[][job_city]">
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <label for="inputStartYear" class="form-label fw-bold"><?php echo e(__('labels.start_date')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputStartYear" name="jobs[][jobStartYear]">
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <label for="inputEndYear" class="form-label fw-bold"><?php echo e(__('labels.end_date')); ?></label>
                                <input type="text" class="form-control form-control-lg rounded-pill" id="inputEndYear" name="jobs[][jobEndYear]">
                            </div>
                            <div class="col-md-12">
                                <label for="textareaDetails" class="form-label fw-bold"><?php echo e(__('labels.details')); ?></label>
                                <button class="btn btn-sm btn-primary addBullet" type="button"><?php echo e(__('labels.add_bullet')); ?> •</button>
                                <textarea class="form-control area1 rounded" id="textareaDetails" rows="3" name="jobs[][details]"></textarea>
                            </div>
                            <button type="button" class="btn btn-outline-danger border-0 removeElement">
                                <i class="bi bi-trash3 fs-5 mx-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                `);
            });
            

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/pages/steps/three.blade.php ENDPATH**/ ?>