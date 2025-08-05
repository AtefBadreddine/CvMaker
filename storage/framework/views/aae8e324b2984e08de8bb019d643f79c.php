<?php $__env->startSection('PAGE_TITLE', 'إصنع سيرتك الذاتية'); ?>

<?php $__env->startSection('STEP_TITLE'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('STEP_CONTENT'); ?>
<div class="card border-0 p-2">
    <div class="card-header border-0 bg-white d-flex justify-content-between flex-column">
      <div>
        <h4 class="d-flex align-items-center">
          <input id="headTitle" type="text" class="border-0 fs-2 fw-bold w-100" name="profile_section_title" readonly value="<?php echo e(__('pdf-sections.profile')); ?>" placeholder="<?php echo e(__('pdf-sections.profile')); ?>" />
          
        </h4>
        <small class="text-muted"><?php echo e(__('pdf-sections.profile_desc')); ?></small>
      </div>
    </div>
    <div class="card-body">
        
        <form class="row g-3" id="stepsForm" enctype="multipart/form-data" method="POST" action="<?php echo e(route('step.processingOne')); ?>">
            <?php echo csrf_field(); ?>
            

            <div class="col-sm-12 mb-4">
                <label for="picture" class="form-label fw-bold d-block"><?php echo e(__('labels.add_photo')); ?></label>

                
                <div class="mb-2 position-relative d-inline-block" id="imagePreviewContainer" style="max-width: 150px;">
                    <button type="button"
                            id="removeButton"
                            class="position-absolute remove-btn"
                            onclick="removePicture()"
                            aria-label="Remove"
                            style=" display: <?php echo e(isset($cv->picture) ? 'block' : 'none'); ?>; ">
                        &times;
                    </button>
                    <input type="hidden" name="remove_picture" id="removePictureFlag" value="0">


                <?php if(isset($cv->picture)): ?>
                        <img id="imagePreview" src="<?php echo e(asset('storage/cv/pictures/' . $cv->picture)); ?>" class="rounded"
                             style="width: 150px; height: 150px;" />
                    <?php else: ?>
                        <img id="imagePreview" src="<?php echo e(asset('assets/images/avatar.png')); ?>" class="rounded"
                             style="width: 150px; height: 150px;" />
                    <?php endif; ?>
                </div>

                
                <input class="form-control" type="file" id="picture" name="picture" accept="image/*" onchange="previewPicture(event)">

                <small id="picture-error" class="text-danger d-block mt-1"></small>

            </div>



            
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <label for="inputName" class="form-label fw-bold"><?php echo e(__('labels.name')); ?></label>
                        <input type="text" class="form-control rounded-pill" id="inputName" name="name" value="<?php echo e(old('name') ?? ($cv->name ?? "")); ?>">
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        <label for="inputEmail" class="form-label fw-bold"><?php echo e(__('labels.email')); ?></label>
                        <input type="email" class="form-control rounded-pill" id="inputEmail" name="email" value="<?php echo e(old('email') ?? ($cv->email ?? "")); ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <label for="inputPhone" class="form-label fw-bold"><?php echo e(__('labels.phone')); ?></label>
                <input type="text" class="form-control rounded-pill" id="inputPhone" name="phone" value="<?php echo e(old('phone') ?? ($cv->phone ?? "")); ?>">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="inputCurrentJob" class="form-label fw-bold"><?php echo e(__('labels.current_job')); ?></label>
                <input type="text" class="form-control rounded-pill" id="inputCurrentJob" name="current_job" value="<?php echo e(old('current_job') ?? ($cv->current_job ?? "")); ?>">
            </div>
            <div class="col-md-12 col-sm-12">
                <label for="inputAddress" class="form-label fw-bold"><?php echo e(__('labels.address')); ?></label>
                <input type="text" class="form-control rounded-pill" id="inputAddress" placeholder="1234 Main St" name="address" value="<?php echo e(old('address') ?? ($cv->address ?? "")); ?>">
            </div>
            <div class="collapse row my-md-3" id="collapseExample">
                <div class="col-md-12 col-sm-12 mb-3">
                    <label for="inputNationality" class="form-label"><?php echo e(__('labels.nationality')); ?></label>
                    <input type="text" class="form-control" id="inputNationality" name="nationality" value="<?php echo e(old('nationality') ?? ($cv->nationality ?? "")); ?>">
                </div>
                
                <div class="col-md-6 col-sm-12">
                    <label for="inputState" class="form-label"><?php echo e(__('labels.marital_status')); ?></label>
                    <select id="inputState" class="form-select" name="marital_status">
                        <option selected></option>
                        <option <?php if(isset($cv->marital_status) && $cv->marital_status == __('labels.single')): echo 'selected'; endif; ?>><?php echo e(__('labels.single')); ?></option>
                        <option <?php if(isset($cv->marital_status) && $cv->marital_status == __('labels.married')): echo 'selected'; endif; ?>><?php echo e(__('labels.married')); ?></option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="inputBirthDate" class="form-label"><?php echo e(__('labels.birth_date')); ?></label>
                    <input type="text" class="form-control" id="inputBirthDate" name="birth_date" value="<?php echo e(old('birth_date') ?? ($cv->birth_date ?? "")); ?>">
                </div>
                
            </div>
            <div class="col-12">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <?php echo e(__('labels.more_btn')); ?>

                        <i class="bi bi-file-plus fs-5 mx-2 more-icon"></i>
                    </button>
                </div>
            </div>


        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('HEAD_BOTTOM'); ?>
	<style>
        #photoLabel
        {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-around;
            padding:5px 20px
        }
        .remove-btn {
            top: 6px;
            right: 2px;
            width: 24px;
            height: 24px;
            border: none;
            background-color: black;
            color: #fff;
            border-radius: 50%;
            font-size: 16px;
            line-height: 1;
            text-align: center;
            z-index: 2;
            padding: 0;
        }
	</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('BODY_BOTTOM'); ?>
    <script>
        function previewPicture(event) {
            const file = event.target.files[0];
            const maxSizeMB = 10; // Max 10 MB
            const maxSize = maxSizeMB * 1024 * 1024;
            const preview = document.getElementById('imagePreview');
            const removeBtn = document.getElementById('removeButton');
            const errorMsg = document.getElementById('picture-error');

            if (!file) {
                return;
            }

            if (file.size > maxSize) {
                preview.src = "<?php echo e(asset('assets/images/avatar.png')); ?>";
                errorMsg.value = 'Maximum file size is ' + maxSizeMB + ' MB.';
                event.target.value = ''; // Clear file input
                removeBtn.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function () {
                preview.src = reader.result;
            };
            reader.readAsDataURL(file);
            removeBtn.style.display = 'block';
        }

        function removePicture() {
            const preview = document.getElementById('imagePreview');
            const fileInput = document.getElementById('picture');
            const removeFlag = document.getElementById('removePictureFlag');
            const removeBtn = document.getElementById('removeButton');

            // Reset preview to default image
            preview.src = "<?php echo e(asset('assets/images/avatar.png')); ?>";

            // Clear file input
            fileInput.value = '';
            removeFlag.value = '1';
            // Manually trigger change event
            const event = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(event);

            removeBtn.style.display = 'none';
        }

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cvmaker\resources\views/pages/steps/one.blade.php ENDPATH**/ ?>