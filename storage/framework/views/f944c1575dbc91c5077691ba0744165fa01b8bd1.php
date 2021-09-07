
<?php $__env->startSection('content'); ?>
<style>
    .galley-image-listing ul li .image {
    height: 157px;
}
/*
    .client_list {
    width: calc(100% - 241px);
    padding: 30px;
    background-color: #f3f3f3;
    margin-left: 14px;
    min-height: 500px;
}
    .client_list ul {
    display: flex;
    flex-wrap: wrap;
}
    .client_list ul li {
    width: 20%;
    padding: 0 7px 14px;
}
    .client_list ul li .image > img {
    width: 100%;
}
*/
</style>
        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     
      <div class="scroll-gallery"></div>
      <div class="galley-box pdt45">
        <div class="container-fluid">
          <div class="top-heading">
            <h4 data-aos="fade-up"><?php echo $pageData->page_title; ?></h4>
             <?php if(!empty($pageData->page_description)): ?>
                <?php echo $pageData->page_description; ?>


            <?php endif; ?>
          </div>
          <div class="bottom-box">
            <div class="filter-icon for-mob"><a href="javascript:;"><img src="<?php echo e(asset('images/site_images/images/gallery/filter-icon.png')); ?>">Filter</a></div>
            <div class="galley-filter-box"> 
              <a href="javascript:;" class="filter-close for-mob"><img src="<?php echo e(asset('images/site_images/images/gallery/close-blue.png')); ?>"></a>             
              <div class="galley-filter-list">
                  <?php if($id==23): ?>
                <h6>Zone Wise</h6>
                <div class="checkbox-list">
                 
                 <label class="checkbox-button">South Region
                    <input type="checkbox" class="region" value="1" >
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">North Region
                    <input type="checkbox" class="region" value="2">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">West Region
                    <input type="checkbox" class="region" value="3">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">East Region
                    <input type="checkbox" class="region" value="4">
                    <span class="checkbox-checkmark"></span>
                  </label>
                </div>
                  <?php else: ?>
                  <h6>Category</h6>
                <div class="checkbox-list">
                 
                  <label class="checkbox-button">Window
                    <input type="checkbox" class="region" value="4">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Door
                    <input type="checkbox" class="region" value="5">
                    <span class="checkbox-checkmark"></span>
                  </label>
                </div>
                  <?php endif; ?>
              </div>
                <?php if($id==23): ?> <input type="hidden" id="pid" value="23"> <?php else: ?> <input type="hidden" id="pid" value="21"> <?php endif; ?>
              <div class="galley-filter-list">
                <h6>Property Type</h6>
                <div class="checkbox-list">
                     
                
                  <label class="checkbox-button">Housing
                    <input type="checkbox" class="ptype" value="5">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Hotels
                    <input type="checkbox" class="ptype" value="1">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Offices
                    <input type="checkbox" class="ptype" value="4">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Hospitals
                    <input type="checkbox" class="ptype" value="2">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  <label class="checkbox-button">Education Institutes
                    <input type="checkbox" class="ptype" value="3">
                    <span class="checkbox-checkmark"></span>
                  </label>
                  
                </div>
              </div>
            </div>
            <div <?php if($id==23): ?> class="client_list text-center" <?php else: ?> class="galley-image-listing text-center" <?php endif; ?>>
                <h6 style="display:none;" class="noresult">No Result Found !!</h6>
              <ul class="ajaxdata">
                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  
                      <?php if($id==23): ?>
                      <img src=<?php echo asset("images/gallery_images/$gg->image"); ?>>
                      <?php else: ?>
                    <div class="image">
                      <img src=<?php echo asset("images/gallery_images/$gg->image"); ?>>
                    </div>
                      <?php endif; ?>
                   
                 <?php if($id!=23): ?>  <h6><?php echo e($gg->heading); ?></h6> <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              </ul>
              <div class="load-more-btn text-center sloadi">
                <a href="javascript:;" class="blue-btn load-more">Load more</a>
                <a href="javascript:;" class="blue-btn load-less" style="display: none;">Load less</a>
              </div>
            </div>
          </div>  
        </div>      
      </div>

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/gallery.blade.php ENDPATH**/ ?>