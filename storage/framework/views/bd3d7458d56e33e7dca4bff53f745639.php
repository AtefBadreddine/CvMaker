<!DOCTYPE html>
<html>
<head>
 <base target="_parent">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
<!-- Custom Google font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo e(asset('assets/js/pdf.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pdf.worker.js')); ?>"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
body{
    font-family: 'cairo', sans-serif;
}
#upload-button {
	width: 150px;
	display: block;
	margin: 20px auto;
}

#file-to-upload {
	display: none;
}

#pdf-main-container {

	margin: 20px auto;
  width: fit-content;
}

#pdf-loader {
	display: none;
	text-align: center;
	color: #999999;
	font-size: 13px;
	line-height: 100px;
	height: 100px;
}

#pdf-contents {
	display: none;
}

#pdf-meta {
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons {
	float: left;
}

#page-count-container {
	float: right;
}

#pdf-current-page {
	display: inline;
}

#pdf-total-pages {
	display: inline;
}

#pdf-canvas {
	box-sizing: border-box;
}

#page-loader {
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;
	color: #999999;
	font-size: 13px;
}

#download-image {
	width: 150px;
	display: block;
	margin: 20px auto 0 auto;
	font-size: 13px;
	text-align: center;
}

@media (max-width:800px)
{
	#pdf-canvas
	{
		width:100vw;
	}
}

</style>
</head>

<body>

<div id="pdf-main-container">
	<div id="pdf-loader"><img src="https://sonobel.com.br/assets/img/loader-pequeno1.gif" /></div>
	<div id="pdf-contents" style="position:relative">


		<canvas id="pdf-canvas" width="400" style="border-radius:0.8rem"></canvas>
      <div id="pdf-meta">
			<div id="pdf-buttons">
                <button id="pdf-prev" class="btn btn-sm btn-secondary"><?php echo e(__('labels.prev')); ?></button>
                <button id="pdf-next" class="btn btn-sm btn-primary"><?php echo e(__('labels.continue')); ?></button>
			</div>
			<div id="page-count-container"><?php echo e(__('labels.page')); ?> <div id="pdf-current-page"></div>/<div id="pdf-total-pages"></div></div>
      </div>
		<div id="page-loader"></div>


    <?php if(!request()->query('pdf')): ?>
      	<div style="display:flex; justify-content:center;align-items:center">
          <a class="btn btn-link text-dark fw-bold" href="<?php echo e(route('step.template')); ?>"><?php echo e(__('steps-bar.two')); ?></a>
          <a
				class="iframe btn btn-sm btn-dark text-light px-3 rounded-pill"
				style="    position: absolute;
                bottom: 109px;"
				href="<?php echo e($path); ?>">
				<?php echo e(__('steps-bar.seven')); ?>

				<i class="far fa-eye me-2"></i>
			</a>
        </div>
      <?php endif; ?>
	</div>
</div>

<script>
    $("a.iframe").click(function(e) {
        e.preventDefault();

        const fancybox = window.parent.jQuery?.fancybox;

        if (typeof fancybox?.open === 'function') {
            fancybox.open({
                src: "<?php echo e($path); ?>",
                type: 'iframe',
                opts: { selector: 'a.iframe' }
            });
        } else {
            console.warn('Fancybox is not available in parent window.');
            // Optionally show fallback or error message
        }
    });

var __PDF_DOC,
	__CURRENT_PAGE,
	__TOTAL_PAGES,
	__PAGE_RENDERING_IN_PROGRESS = 0,
	__CANVAS = $('#pdf-canvas').get(0),
	__CANVAS_CTX = __CANVAS.getContext('2d');

function showPDF(pdf_url) {
	$("#pdf-loader").show();

	PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC = pdf_doc;
		__TOTAL_PAGES = __PDF_DOC.numPages;

		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-loader").hide();
		$("#pdf-contents").show();
		$("#pdf-total-pages").text(__TOTAL_PAGES);
		if(__TOTAL_PAGES == 1) $('#pdf-meta').hide()
		// Show the first page
		showPage(1);
	}).catch(function(error) {
		// If error re-show the upload button
		$("#pdf-loader").hide();
		$("#upload-button").show();

		alert(error.message);
	});
}

function showPage(page_no) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas").hide();
	$("#page-loader").show();
	$("#download-image").hide();

	// Update current page in HTML
	$("#pdf-current-page").text(page_no);

	// Fetch the page
	__PDF_DOC.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX,
			viewport: viewport
		};

		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next, #pdf-prev").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas").show();
			$("#page-loader").hide();
			$("#download-image").show();
		});
	});
}

// Previous page of the PDF
$("#pdf-prev").on('click', function() {
	if(__CURRENT_PAGE != 1)
		showPage(--__CURRENT_PAGE);
});

// Next page of the PDF
$("#pdf-next").on('click', function() {
	if(__CURRENT_PAGE != __TOTAL_PAGES)
		showPage(++__CURRENT_PAGE);
});

showPDF("<?php echo e($path); ?>");
</script>

</body>
</html>
<?php /**PATH D:\laragon\www\cvmaker\resources\views/pages/pdf-to-png.blade.php ENDPATH**/ ?>