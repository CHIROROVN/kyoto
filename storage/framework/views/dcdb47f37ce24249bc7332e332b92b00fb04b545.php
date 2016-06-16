<?php echo $__env->make('frontend.element.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- content -->
      <?php echo $__env->yieldContent('content'); ?>
    <!-- end content -->
<?php echo $__env->make('frontend.element.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>