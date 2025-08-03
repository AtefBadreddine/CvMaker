<?php if($cv->profession_summary): ?>
    <table >
        <thead>
        <tr>
            <th class="section-title"><?php echo e($cv->summary_section_title ?? __('pdf-sections.summary')); ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><div class="details" style="text-align: justify !important"><?php echo str_replace("\n","<br/>",$cv->profession_summary); ?></div></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>

<?php if($cv->jobs): ?>
    <table >
        <thead>
        <tr>
            <th scope="col" colspan="2" class="section-title"><?php echo e($cv->jobs_section_title ?? __('pdf-sections.experiences')); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php if(isset($cv->jobs)): ?>
            <?php $__currentLoopData = $cv->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="width: 20%" class="gray-text" style="vertical-align: top"><?php echo e($job['jobStartYear'] ?? ""); ?><?php echo e(isset($job['jobEndYear']) ? ' - ' . $job['jobEndYear'] : ""); ?></td>
                    <td scope="col" style="width: 75%">
                        <span class="title"><?php echo e($job['job_title'] ?? ""); ?></span>
                        <br>
                        <br>
                        <span class="gray-text"><?php echo e($job['employer']  ?? ""); ?><?php echo e(isset($job['job_city']) ? ', '. $job['job_city'] : ""); ?></span>
                        <p class="details"><?php echo str_replace("\n","<br/>",$job['details'] ?? ""); ?></p>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if($cv->educations): ?>
    <table >
        <thead>
        <tr>
            <th scope="col" colspan="2" class="section-title"><?php echo e($cv->education_section_title ?? __('pdf-sections.education')); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php if(isset($cv->educations)): ?>
            <?php $__currentLoopData = $cv->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="width: 35%" class="gray-text" style="vertical-align: top"><?php echo e($education['startYear'] ?? ""); ?> <br/> <?php echo e(isset($education['endYear']) ? ' - ' . $education['endYear'] : ""); ?></td>
                    <td scope="col" style="width:65%">
                        <strong class="title"><?php echo e($education['degree'] ?? ""); ?></strong>
                        <br>
                        <br>
                        <?php echo e($education['university'] ?? ""); ?> <?php echo e(isset($education['education_city']) ? ', '.$education['education_city'] : ""); ?>

                        <p class="details" style="padding-top:5px"><?php echo str_replace("\n","<br/>",$education['details'] ?? ""); ?></p>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if(isset($cv->customSections)): ?>
    <?php $__currentLoopData = $cv->customSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table >
            <thead>
            <tr>
                <th scope="col" class="section-title"><?php echo e($section['customSectionTitle'] ?? ""); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p><?php echo str_replace("\n","<br/>",$section['customSectionDetails'] ?? ""); ?></p>
                </td>
            </tr>
            </tbody>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/components/orbital/main-content.blade.php ENDPATH**/ ?>