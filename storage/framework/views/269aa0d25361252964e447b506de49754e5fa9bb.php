
<?php $__env->startSection('content'); ?>

        <div class="blog-sec blog-detail-sec">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    


      <?php echo $__env->make('frontend._partials.blogcategory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <div class="blog-info-sec blog-detail-info-sec" data-aos="fade-up">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="left-col">              
              <h4><?php echo e($post_data->name); ?></h4>
              <div class="image"><img src="<?php echo e(asset('images/'.$post_data->image)); ?>" alt="<?php echo e($post_data->name); ?>"></div>
              <?php echo $post_data->description; ?>

              <div class="pagination">
                <div class="btn-grp">
                <?php if(App\Models\BlogPageModel::getPostPrv($post_data->id)!=''){?>
                
                    <a href="<?php echo e(App\Models\BlogPageModel::getPostUrl(App\Models\BlogPageModel::getPostPrv($post_data->id)->slug)); ?>" class="white-btn prev"> Prev
                    </a>
                
                <?php } ?>
                 
                <?php if(App\Models\BlogPageModel::getPostNaxt($post_data->id)!=''){?>
                    <a href="<?php echo e(App\Models\BlogPageModel::getPostUrl(App\Models\BlogPageModel::getPostNaxt($post_data->id)->slug)); ?>" class="white-btn next">Next
                    </a>
                  <?php } ?>

                </div>
                <div class="social-link">
                  
                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(App\Models\BlogPageModel::getPostUrl($post_data->slug)); ?>"><img src="<?php echo e(asset('images/site_images/fb.png')); ?>"></a>
                  <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo e($post_data->page_title); ?>&amp;url=<?php echo e(App\Models\BlogPageModel::getPostUrl($post_data->slug)); ?>"><img src="<?php echo e(asset('images/site_images/tweet.png')); ?>"></a>
                  <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(App\Models\BlogPageModel::getPostUrl($post_data->slug)); ?>&amp;title=<?php echo e($post_data->page_title); ?>"><img src="<?php echo e(asset('images/site_images/linked.png')); ?>" ></a>
                 
                  <a href="https://www.instagram.com/?url=<?php echo e(App\Models\BlogPageModel::getPostUrl($post_data->slug)); ?>" target="_blank"><img src="<?php echo e(asset('images/site_images/insta-icon.png')); ?>"></a>
                </div>
              </div>
              <div class="comment-box">
                <h5>Comments</h5>
            <form name="frmBlog"  id="frmBlog" method="post" action="<?php echo e(url('blog/commentPost')); ?>">        
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="blog_name" value="<?php echo e($name); ?>">
                        <input type="hidden" name="blog_id" value="<?php echo e($post_data->id); ?>">
                <div class="form">
                  <div class="form-group">
                    <input class="form-control" placeholder="Your Name"  maxlength="100" name="name" id="name" onKeyUp="Remove('frmBlog','name')">
                      <div class="error" id="error_name" ></div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email"  maxlength="100"  name="email" id="email" onKeyUp="Remove('frmBlog','email')">
                      <div class="error" id="error_email" ></div>
                  </div>
                  <div class="form-group width-100">
                    <textarea class="form-control" placeholder="Comment"  maxlength="1000" name="message" id="message" onKeyUp="Remove('frmBlog','message')"></textarea>
                  </div>
                </div>
                 <span id="load-img-frmBlog" style="display:none;">
                      <img src="<?php echo e(asset('images/site_images/ajax-loader.gif')); ?>"></span>
                <button id="submit-btn-frmBlog" class="blue-btn prev submitBtn">Submit</button>
                
                 <div class="message-box message-box-frmBlog" style="display:none;">
                  <span class="message-text"></span>
                  </div>
                  </form>
              </div>

            </div>
              
           <?php echo $__env->make('frontend._partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>
      </div>

  
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/blog/relatedblog_detail.blade.php ENDPATH**/ ?>