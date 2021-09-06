
<?php $__env->startSection('content'); ?>
<style>
    .otpMsgSuccs{
        color:green;
    }
    p#crctOtpTxt {
    padding-top: 10px;
    color: red;
}
</style>
<div class="style-benefit-sec">

<div class="inner-banner">  
     
      <?php if(empty($pageData->banner_image)): ?>
        <picture>
          <source srcset="<?php echo e(asset('images/site_images/enq-banner.jpg')); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/site_images/enq-banner-mobile.jpg')); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/site_images/enq-banner.jpg')); ?>">
        </picture> 
         <?php else: ?>
        
        <picture>
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:768px)">
          <source srcset="<?php echo e(asset('images/'.$pageData->banner_image)); ?>" media="(min-width:320px)">
          <img src="<?php echo e(asset('images/'.$pageData->banner_image)); ?>">
        </picture> 
        <?php endif; ?>
     
        <div class="banner_caption">
			<div class="container">
				<div class="inner">
					 <?php if($content!=''): ?>
                      <?php echo $content; ?>

                      <?php endif; ?>
				</div>	
			</div>	
        </div>
		<div class="enq_form">
            <div id="home">
			<h3>Please Enter Your Details</h3>            
            <form class="enquiry-form" id="enquiry-form" action="<?php echo e(url('/submit-enquiry-now')); ?>" method="post" novalidate>
                 <?php echo csrf_field(); ?>
                
                 <input type="hidden" value="/wEPDwUKLTI3ODMxMTEzM2Rkvv2CvUen/ICZGext10oWUDzPtK4=" id="__VIEWSTATE" name="__VIEWSTATE">
                 <input type="hidden" value="321C15CF" id="__VIEWSTATEGENERATOR" name="__VIEWSTATEGENERATOR">
                 <input type="hidden" value="/wEWHgKy6JfLCgKbzqrYDQKevKvSBQLgl/mlAQKIhKmtDALaqK+XCALBhvmJAQLPgP2MDwLr5uACAtv7z+MLAuzqmtMHAv/s8ucEAvy/uXECoae2/wMC04/EpQwCwaSviwECnd+uJQKaxJThBAL1jp6aCQLVg6bzBALT4JOnCALNpe/zCwLv4sr+AQKTyLeUBwL6/e+hDgLmjbHlDgKd6ZC0DgKfgIzDCALWz+21CwLHst2qAospIQTG1Mg6Nt46T2bHn7xloX0v" id="__EVENTVALIDATION" name="__EVENTVALIDATION">
                
                
              <div class="form-group">
                <input type="text" id="username" class="form-control" name="name" placeholder="Name*">
                  <div class="error" id="error_username" ></div>
              </div>
              <div class="form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email ID*">
                  <div class="error" id="error_email" ></div>
              </div>
              <div class="form-group">
                <input type="text" id="userphone" class="form-control" name="mobile" placeholder="Phone No*"> 
                  <div class="error" id="error_userphone" ></div>
              </div>
              <div class="form-group">
                <select class="form-control select userstate" id="userstate" name="state">
                  <option value="">State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
                  <div class="error" id="error_userstate" ></div>
              </div>
              <div class="form-group">
                <select class="form-control  select usercity" id="usercity" name="city">
                  <option value="">City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
                  <div class="error" id="error_usercity" ></div>
              </div>
              <div class="form-group">
                   <input type="hidden" value="" name="hdnLid" id="hdnLid">
                <button id="submit-btn-enquiry-form" type="submit" name="" class="blue-btn enquirysubmit"> Submit </button>
                  
                <input type="hidden" id="lp_url" value="<?php if(!empty($_SERVER['REQUEST_URI'])){ echo $_SERVER['REQUEST_URI']; } ?>" name="lp_url"> 
                <input type="hidden" id="utm_source" value="<?php if(!empty($_REQUEST['utm_source'])){ echo $_REQUEST['utm_source']; } ?>" name="utm_source">
                <input type="hidden" id="utm_medium" value="<?php if(!empty($_REQUEST['utm_medium'])){ echo $_REQUEST['utm_medium']; } ?>" name="utm_medium">
                <input type="hidden" id="utm_campaignname" value="<?php if(!empty($_REQUEST['utm_campaign'])){ echo $_REQUEST['utm_campaign']; } ?>" name="utm_campaignname">
                <input type="hidden" id="utm_campaignid" value="<?php if(!empty($_REQUEST['utm_campaignid'])){ echo $_REQUEST['utm_campaignid']; } ?>" name="utm_campaignid">
                <input type="hidden" id="utm_adgroupname" value="<?php if(!empty($_REQUEST['utm_adset_name'])){ echo $_REQUEST['utm_adset_name']; } ?>" name="utm_adgroupname">
                <input type="hidden" id="utm_adgroupid" value="<?php if(!empty($_REQUEST['utm_ad_id'])){ echo $_REQUEST['utm_ad_id']; } ?>" name="utm_adgroupid">
                <input type="hidden" id="utm_keyword" value="<?php if(!empty($_REQUEST['utm_keyword'])){ echo $_REQUEST['utm_keyword']; } ?>" name="utm_keyword">
                <input type="hidden" id="utm_website" value="<?php if(!empty($_REQUEST['utm_website'])){ echo $_REQUEST['utm_website']; } ?>" name="utm_website">
                <input type="hidden" id="utm_geo" value="<?php if(!empty($_REQUEST['utm_geo'])){ echo $_REQUEST['utm_geo']; } ?>" name="utm_geo">
                <input type="hidden" id="utm_type" value="<?php if(!empty($_REQUEST['utm_type'])){ echo $_REQUEST['utm_type']; } ?>" name="utm_type">
                <input type="hidden" id="utmpublisher_id" value="<?php if(!empty($_REQUEST['utm_publisherid'])){ echo $_REQUEST['utm_publisherid']; } ?>" name="publisher_id">
                <input type="hidden" id="publisher_id" value="<?php if(!empty($_REQUEST['utm_publisher_id'])){ echo $_REQUEST['utm_publisher_id']; } ?>" name="publisher_id">
                <input type="hidden" id="utm_adgroup" value="<?php if(!empty($_REQUEST['utm_adgroup'])){ echo $_REQUEST['utm_adgroup']; } ?>" name="utm_adgroup">
                <input type="hidden" id="utm_creativeid" value="<?php if(!empty($_REQUEST['utm_creative'])){ echo $_REQUEST['utm_creative']; } ?>" name="utm_creativeid">
                <input type="hidden" id="utm_ad_name" value="<?php if(!empty($_REQUEST['utm_ad_name'])){ echo $_REQUEST['utm_ad_name']; } ?>" name="utm_ad_name">

              </div>   
              <div class="message-box message-box-enquiry-form" style="display:none;"> <span class="message-text"></span> </div>           
              <div class="form-group">
                <p>*By clicking Submit button I agree that I have read the  <a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a></p>
              </div>
            </form>
            </div>
            <h3 id="otpMsgSuccs"></h3>
             <div class="otp_verification form_section OtpFormSection" id="otp" style="display:none;">
            <p>Please verify your number through One-Time Verification Pin (OTP) sent on your WhatsApp number</p>
        <form name="sendOtp" id="sendOtp" method="post" action="">
             <?php echo csrf_field(); ?>
            <div class="form-group block">
				<input type="text"  class="optInp form-control" required placeholder="OTP *" id="txt_OTP" name="txt_OTP">	
			</div>
			<div class="custom_checkbox">
                <input type="checkbox" checked required name="whatsapp" id="whatsapp" value="true">
                <label for="whatsapp"><span>Receive your inquiry confirmation on WhatsApp</span></label>
            </div>
            <br>
		<div class="submitclass form-group">
				<input type="button" class="btn sumbit" id="cmdOtp" value="Verify" name="cmdOtp">
			</div>
           <div class="resendOtplink">
                <a class="link" href="javascript:void(0)" id="cmdOtpResend" name="cmdOtpResend">Resend OTP</a>
            </div>
        </form>
        <p class="alert_err" id="crctOtpTxt" style="display: none;"></p>
        <p class="alert_success" id="crctOtpTxtsent" style="display: none;"></p>
    </div>
            
		</div>
      </div>     
      
   <div class="science-work-sec">
        <div class="container-fluid">
          <div class="inner-box text-center">
              <?php if($about!=''): ?>
              <?php echo $about; ?>

              <?php endif; ?>
           
              
              
            <div class="science-work-wrap">
              <div class="science-work-list left">
                  
                  <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ki<=4): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                  <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>"><h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6> </a>
                  </div>
                <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $turt = $featurebenefit[0]->image; ?>
                </div>
              <div class="middle aos-init" data-aos="zoom-in">
                <div class="center-image"><img class="<?php echo e($turt); ?>" src="<?php echo e(asset("images/featurebenefit/image/$turt")); ?>"></div>
                
              </div>
              <div class="science-work-list right">
          
               
                  <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($ki>=5 and $ki<10): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                 <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>"> <h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6></a>
                  </div>
                <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
<!-- 
              <div class="science-work-list science-work-list-ipad">
                   <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($ki<10): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>">  <h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6></a>
                  </div>
               
            <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
                  
              </div> -->

              <div class="science-work-list science-work-list-mob">
                   <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($ki<10): ?>
                  <div class="item aos-init" data-aos="fade-right" data-image="<?php echo e(asset("images/featurebenefit/image/$ffbb->image")); ?>">
                  <span class="image"><img class="nohover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->icon")); ?>"><img class="hover" src="<?php echo e(asset("images/featurebenefit/icon/$ffbb->onhovericon")); ?>"></span>
                      <?php  $tit = explode(' ',$ffbb->othername) ?>
                <a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>">  <h6><?php if(isset($tit[0])): ?> <?php echo e($tit[0]); ?> <?php endif; ?> <span><?php if(isset($tit[1])): ?> <?php echo e($tit[1]); ?> <?php endif; ?> <?php if(isset($tit[2])): ?> <?php echo e($tit[2]); ?> <?php endif; ?> <?php if(isset($tit[3])): ?> <?php echo e($tit[3]); ?> <?php endif; ?></span></h6></a>
                  </div>
               
            <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
                  
              </div>
            </div>
    
    
          
          </div>
        </div>
      </div>
   
    <?php echo $__env->make('frontend._partials.imagegallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('frontend._partials.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend._partials.customerapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.enqurytemplate_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/enquiry_now.blade.php ENDPATH**/ ?>