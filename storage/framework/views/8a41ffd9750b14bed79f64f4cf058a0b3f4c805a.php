<!DOCTYPE html>
<html lang="en">
	<?php echo $__env->make('frontend._partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P83WHJ" height="0" width="0" loading="lazy" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
	<?php echo $__env->make('frontend._partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('frontend._partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>