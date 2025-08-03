<table>
    <tbody>
    <tr>
        <td class="info-section">
            <?php if(is_string($cv->picture) && file_exists(public_path('storage/cv/pictures/' . $cv->picture))): ?>
                <img src="<?php echo e(public_path('storage/cv/pictures/' . $cv->picture)); ?>" alt="Picture" />
                <br><br>
            <?php endif; ?>
            <span class="name"><?php echo e($cv->name ?? ""); ?></span>
            <br><br>
            <?php echo e($cv->current_job ?? ""); ?>

        </td>
    </tr>
    <?php if($cv->email): ?>
        <tr>
            <td><?php echo e($cv->email); ?></td>
        </tr>
    <?php endif; ?>
    <?php if($cv->phone): ?>
        <tr>
            <td><?php echo e($cv->phone); ?></td>
        </tr>
    <?php endif; ?>
    <?php if($cv->address): ?>
        <tr>
            <td><?php echo e($cv->address); ?></td>
        </tr>
    <?php endif; ?>
    <?php if($cv->city): ?>
        <tr>
            <td><?php echo e($cv->city); ?></td>
        </tr>
    <?php endif; ?>
    <?php if($cv->birth_date): ?>
        <tr>
            <td><?php echo e($cv->birth_date); ?></td>
        </tr>
    <?php endif; ?>
    <?php if($cv->marital_status): ?>
        <tr>
            <td><?php echo e($cv->marital_status); ?></td>
        </tr>
    <?php endif; ?>
    <?php if($cv->nationality): ?>
        <tr>
            <td><?php echo e($cv->nationality); ?></td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<?php if($cv->language || isset($cv->languages)): ?>
    <table style="max-width: 100%">
        <thead style="max-width: 100%">
        <tr style="max-width: 100%">
            <th class="sidebar-title" style="max-width: 100%"><?php echo e($cv->langs_section_title ?? __('pdf-sections.languages')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($cv->language)): ?>
            <tr>
                <td scope="col">
                    <?php echo e($cv->language); ?> <?php echo e($cv->level ?? ''); ?>

                </td>
            </tr>
        <?php endif; ?>
        <?php if(isset($cv->languages)): ?>
            <?php $__currentLoopData = $cv->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($language['language']); ?> <?php echo e($language['level'] ?? ''); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if($cv->skill || isset($cv->skills)): ?>
    <table >
        <thead>
        <tr>
            <th class="sidebar-title"><?php echo e($cv->skills_section_title ?? __('pdf-sections.skills')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($cv->skill)): ?>
            <tr>
                <td><?php echo e($cv->skill); ?></td>
            </tr>
        <?php endif; ?>
        <?php if(isset($cv->skills)): ?>
            <?php $__currentLoopData = $cv->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($skill['skill']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if(isset($cv->interests)): ?>
    <table>
        <thead>
        <tr>
            <th class="sidebar-title"><?php echo e($cv->interests_section_title ?? __('pdf-sections.interests')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $cv->interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($interest['interest']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>



<?php if(isset($cv->cert)): ?>
    <table>
        <thead>
        <tr>
            <th class="sidebar-title"><?php echo e($cv->certs_section_title ?? __('pdf-sections.certs')); ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($cv->cert); ?></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>

<?php if(isset($cv->ref)): ?>
    <table>
        <thead>
        <tr>
            <th class="sidebar-title"><?php echo e($cv->refs_section_title ?? __('pdf-sections.certs')); ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($cv->ref); ?></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/components/orbital/sidebar.blade.php ENDPATH**/ ?>