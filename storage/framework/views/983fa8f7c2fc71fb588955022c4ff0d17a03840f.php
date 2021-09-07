<div class="breadcum">
  <div class="container-fluid">
       <div class="breadcum-box">   
        <a href="<?php echo e(url('/')); ?>">Home <span>»</span></a>
        <?php if(isset($breadcrumbs)){
        foreach ($breadcrumbs as $breadcrumb) { ?>
        <a href="<?php echo ($breadcrumb['link']!='')?$breadcrumb['link']:'javascript:void(0)';?>"><?php echo $breadcrumb['name'];?> <span>»</span></a>
       <?php  }
      } ?>
       <span class="text-capitalize"><?php echo e($title); ?></span>    
           
      </div>
  </div>
</div>

<?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/layouts/breadcrumb.blade.php ENDPATH**/ ?>