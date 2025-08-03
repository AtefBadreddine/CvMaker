<div style="height: 100%">
    <table style="border-bottom: 4px double #222; width:95%">
        <tbody>
        <tr>
            <td>
                <strong class="name"><?php echo e($cv->name ?? ""); ?></strong>
                <br>
                <strong><?php echo e($cv->current_job ?? ""); ?></strong>
            </td>
        </tr>
        </tbody>
    </table>

    <?php if($cv->profession_summary): ?>
        <table style="width:95%;">
            <tbody>
            <tr>
                <td><p style="text-align: justify"><?php echo str_replace("\n","<br/>",$cv->profession_summary); ?></p></td>
            </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if($cv->jobs): ?>
        <table style="width:95%;">
            <thead>
            <tr>
                <th scope="col" class="section-title"><?php echo e($cv->jobs_section_title ?? __('pdf-sections.experiences')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php if(isset($cv->jobs)): ?>
                <?php $__currentLoopData = $cv->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th style="padding-bottom: 5px"><?php echo e($job['job_title'] ?? ""); ?> <?php echo e(isset($job['employer']) ? ', '.$job['employer'] : ""); ?></th>
                    </tr>
                    <tr>
                        <td scope="col" style="padding-top: 0">
                            <?php echo e(isset($job['job_city']) ? $job['job_city'] . ' , ' : ""); ?><?php echo e(isset($job['jobStartYear']) ? $job['jobStartYear'] . ' - ' : ""); ?><?php echo e($job['jobEndYear'] ?? ""); ?>

                            <p style="padding-top: 10px"><?php echo str_replace("\n","<br/>",$job['details'] ?? ""); ?></p>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if($cv->educations): ?>
        <table style="width:95%;">
            <thead>
            <tr>
                <th scope="col" class="section-title"><?php echo e($cv->education_section_title ?? __('pdf-sections.education')); ?></th>
            </tr>
            </thead>
            <tbody>

            <?php if(isset($cv->educations)): ?>
                <?php $__currentLoopData = $cv->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td scope="col">
                            <strong class="title"><?php echo e($education['degree'] ?? ""); ?><?php echo e(isset($education['university']) ? ', '.$education['university'] : ""); ?></strong>
                            <br>
                            <?php echo e(isset($education['education_city']) ? $education['education_city'] . ' , ' : ""); ?><?php echo e(isset($education['startYear']) ? $education['startYear'] . ' - ' : ""); ?><?php echo e($education['endYear'] ?? ""); ?>

                            <p style="padding-top: 10px"><?php echo str_replace("\n","<br/>",$education['details'] ?? ""); ?></p>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if(isset($cv->customSections)): ?>
        <?php $__currentLoopData = $cv->customSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <table style="width:95%;">
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

</div>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/components/cv/main-content.blade.php ENDPATH**/ ?>