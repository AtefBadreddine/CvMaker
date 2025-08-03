<?php
    $currentLocale = session()->get('selectedLang') ?? ($cv->selectedLang ?? 'en');
?>
<!doctype html>
<html lang="<?php echo e($currentLocale); ?>" dir="<?php echo e($currentLocale == 'ar' ? 'rtl' : 'ltr'); ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <style>
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        th {
            background: <?php echo e($cv->lighter_color ?? '#deeaf6'); ?>;
            font-size: <?php echo e($cv->cv_text_size ?? '18'); ?>px;
            font-family:'Cairo';
            padding:5px 0;
        }

        td,
        th {
            border: none
        }

        td
        {
            font-family:'Cairo';
            font-size: <?php echo e($cv->cv_text_size - 2 ?? '16'); ?>px;
            padding: 5px;
        }

        .multirows td
        {
            padding: 10px
        }

        .multirows td.lastrow
        {
            padding-bottom: 20px;
        }

        td.subtitle,
        .multirows td.subtitle
        {
            font-weight: bold;
            font-size: <?php echo e($cv->cv_text_size - 1 ?? '17'); ?>px;
        }

        .multirows td.subtitle
        {
            padding-top: 20px
        }

        body {
            background: #fff;
            font: <?php echo e($cv->cv_text_size - 2 ?? '16'); ?>px "Cairo", "Arial";
            padding: 20px;
         	 margin:10px;
        }

      	.name
        {
            font-size: 40px;
            font-family:'Cairo';
            text-align: center;
            font-weight: bold;
            margin: 0;
            padding: 0
        }

        p
        {
            font-family:'Cairo';
          font-size:<?php echo e($cv->cv_text_size - 2 ?? '16'); ?>px;
        }

        .text-center
        {
            text-align: center
        }

        .text-justify
        {
            text-align: justify;
        }

        hr
        {
            margin: 0;
            padding: 0
        }

    </style>
    <title><?php echo e($cv->name ?? ""); ?></title>
</head>

<body>
  	<p style="padding:5px 0 10px 0;margin:0;line-height: 1.2;" class="text-center">
      <span class="name"><?php echo e($cv->name ?? ""); ?></span>
      <br />
      <?php echo e($cv->current_job ?? ""); ?></p>
    <hr />
    <p style="padding:0;margin:0;text-align:center" class="text-center;" dir="ltr">
      <?php if($cv->phone): ?><?php echo e($cv->phone ?? ""); ?> <?php endif; ?>
      <?php if($cv->email): ?> | <?php echo e($cv->email ?? ""); ?> <?php endif; ?>
      <?php if($cv->marital_status): ?> | <?php echo e($cv->marital_status ?? ""); ?> <?php endif; ?>
      <?php if($cv->address): ?> | <?php echo e($cv->address ?? "" . $cv->city ?? ""); ?> <?php endif; ?>
      <?php if($cv->birth_date): ?> | <?php echo e($cv->birth_date ?? ""); ?> <?php endif; ?>
  	</p>
    <?php if($cv->profession_summary): ?>
  	<table>
        <thead>
            <tr>
                <th><?php echo e($cv->summary_section_title ?? __('pdf-sections.summary')); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-justify" style="padding:20px 5px;"><?php echo str_replace("\n","<br/>",$cv->profession_summary); ?></td>
            </tr>
        </tbody>
    </table>
  	<?php endif; ?>

  	<?php if($cv->jobs): ?>
    <table>
        <thead>
            <tr>
                <th colspan="2"><?php echo e($cv->jobs_section_title ?? __('pdf-sections.experiences')); ?></th>
            </tr>
        </thead>
        <tbody class="multirows">
          <?php $__currentLoopData = $cv->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="subtitle"><?php echo e($job['job_title'] ?? ""); ?></td>
                <td rowspan="3" style="vertical-align: text-top;text-align: left;width: 15%;padding-top:20px"><?php echo e($job['jobStartYear'] ?? ""); ?> - <?php echo e($job['jobEndYear'] ?? ""); ?></td>
            </tr>
            <tr>
                <td><?php echo e($job['employer'] ?? ""); ?><?php echo e(isset($job['job_city']) ? ', '.$job['job_city'] : ""); ?></td>
            </tr>
            <tr>
                <td class="lastrow"><?php echo str_replace("\n","<br/>",$job['details'] ?? ""); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  	<?php endif; ?>

  	<?php if($cv->educations): ?>
    <table>
        <thead>
            <tr>
                <th colspan="2"><?php echo e($cv->education_section_title ?? __('pdf-sections.education')); ?></th>
            </tr>
        </thead>
        <tbody class="multirows">
          <?php $__currentLoopData = $cv->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="subtitle"><?php echo e($education['degree'] ?? ""); ?></td>
                <td rowspan="1" style="vertical-align: text-top;text-align: left;width: 15%;padding-top:20px"><?php echo e($education['startYear'] ?? ""); ?> - <?php echo e($education['endYear'] ?? ""); ?></td>
            </tr>
            <tr>
                <td><?php echo e($education['university'] ?? ""); ?><?php echo e(isset($education['education_city']) ? ', '.$education['education_city'] : ""); ?></td>
            </tr>
          	<tr>
                <td colspan="2" class="lastrow"><?php echo str_replace("\n","<br/>",$education['details'] ?? ""); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
  	<?php endif; ?>

  	<?php if($cv->language || isset($cv->languages)): ?>
    <table>
        <thead>
            <tr>
                <th colspan="2"><?php echo e($cv->langs_section_title ?? __('pdf-sections.languages')); ?></th>
            </tr>
        </thead>
        <tbody>
          <?php if(isset($cv->language)): ?>
            <tr>
                <td class="subtitle" style="width: 15%"><?php echo e($cv->language); ?></td>
                <td><?php echo e($cv->level ?? ''); ?></td>
            </tr>
          <?php endif; ?>
          	<?php if(isset($cv->languages)): ?>
            	<?php $__currentLoopData = $cv->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="subtitle" style="width: 15%"><?php echo e($language['language']); ?></td>
                      <td><?php echo e($language['level'] ?? ''); ?></td>
                    </tr>
          		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          	<?php endif; ?>
        </tbody>
    </table>
  	<?php endif; ?>

  	<?php if($cv->skill || isset($cv->skills)): ?>
    <table>
        <thead>
            <tr>
                <th><?php echo e($cv->skills_section_title ?? __('pdf-sections.skills')); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td class="subtitle"><?php echo e($cv->skill ?? ""); ?>

                  <?php if(isset($cv->skills)): ?>
                    <?php $__currentLoopData = $cv->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  		, <?php echo e($skill['skill']); ?>

                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

              </td>
            </tr>
          <tr><td class="lastrow"></td></tr>
        </tbody>
    </table>
  	<?php endif; ?>

  	<?php if($cv->interests): ?>
    <table>
        <thead>
            <tr>
                <th><?php echo e($cv->interests_section_title ?? __('pdf-sections.interests')); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="subtitle">
                    <?php $__currentLoopData = $cv->interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  		<?php echo e($interest['interest']); ?>,
                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
            </tr>
          	<tr><td class="lastrow"></td></tr>
        </tbody>
    </table>
  	<?php endif; ?>

    <?php if(isset($cv->cert)): ?>
        <table>
            <thead>
            <tr>
                <th><?php echo e($cv->certs_section_title ?? __('pdf-sections.certs')); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="subtitle"><?php echo e($cv->cert); ?></td>
            </tr>
            <tr><td class="lastrow"></td></tr>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if(isset($cv->ref)): ?>
        <table>
            <thead>
            <tr>
                <th><?php echo e($cv->refs_section_title ?? __('pdf-sections.certs')); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="subtitle"><?php echo e($cv->ref); ?></td>
            </tr>
            <tr><td class="lastrow"></td></tr>
            </tbody>
        </table>
    <?php endif; ?>


  	<?php if(isset($cv->customSections)): ?>
    	<?php $__currentLoopData = $cv->customSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <table>
              <thead>
                  <tr>
                      <th><?php echo e($section['customSectionTitle'] ?? ""); ?></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="lastrow">
                          <p><?php echo str_replace("\n","<br/>",$section['customSectionDetails'] ?? ""); ?></p>
                    </td>
                  </tr>
              </tbody>
          </table>
  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</body>

</html>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/templates/simple.blade.php ENDPATH**/ ?>