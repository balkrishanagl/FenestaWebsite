
<?php $__env->startSection('content'); ?>

<style>
    #map_wrapper {
    height: 400px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}
</style>
<?php
$mapdata=array();
?>
  <div id="fullpage" class="main-sec">
     
    <?php if(!$banners->isEmpty()): ?>
    <div class="banner section bg1" id="section0">
      <div class="banner-slider owl-carousel">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
          <div class="content">
            <div class="heading heading1">
              <h1><span><?php echo e($banner->heading); ?></span><?php echo $banner->sub_heading; ?></h1>
            </div> 
              <?php if($ki==0): ?>
            <div class="btn-grp">
              <a href="<?php echo e(url('/window')); ?>" class="window">
                <img class="nohover" src="<?php echo e(asset('images/site_images/images/window-icon.png')); ?>">
                <img class="hover" src="<?php echo e(asset('images/site_images/images/home/window-icon-red.png')); ?>">
                <span>Windows</span>
              </a>
              <a href="<?php echo e(url('/door')); ?>" class="door">
                <img class="nohover" src="<?php echo e(asset('images/site_images/images/home/door-icon-red.png')); ?>">
                <img class="hover" src="<?php echo e(asset('images/site_images/images/home/door-icon-white.png')); ?>">
                <span>Doors</span>
              </a>
            </div>
              <?php endif; ?>
          </div>
          <div class="left">
            <div class="image">
              <img src="<?php echo asset("images/home_banner/big/$banner->home_banner_image"); ?>">
            </div>            
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
      </div>     
      <div class="count-box">
        <div class="image"><img src="<?php echo e(asset('images/site_images/images/win-count-icon.png')); ?>"></div>
        <div class="count-desc active">
            <span class="count">2500666</span>
            <?php echo $page_description; ?>

          <span class="shut"><img class="nohover" src="<?php echo e(asset('images/site_images/images/left-arrow.png')); ?>"><img class="hover" src="<?php echo e(asset('images/site_images/images/left-arrow-blue.png')); ?>"></span>
        </div>
      </div>
      <div class="feneta-logo">
        <img src="<?php echo e(asset('images/site_images/images/fenesta-logo.png')); ?>">
      </div>
     
      <div class="down-link">
        <a href="#durable-safe" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
    <?php endif; ?>
   
    <div class="durable-safe section bg2" id="section1">
      <div class="container-fluid">        
        <div class="inner-box">
          <div class="excellance">
            <div class="wrap-box">
              <picture>
                <source srcset="<?php echo e(asset('images/site_images/images/home/polygon.png')); ?>" media="(min-width:768px)">
                <source srcset="<?php echo e(asset('images/site_images/images/home/polygon-mob.png')); ?>" media="(min-width:320px)">
                <img class="" src="<?php echo e(asset('images/site_images/images/home/polygon.png')); ?>">
              </picture> 
              
              <div class="slick-slider slider-for-heading">
                <div class="slick-slide"><h4>  18 Years of Excellence</h4></div>
                <div class="slick-slide"><h4>2.5+ Million Installations</h4></div>
                <div class="slick-slide"><h4>All India Presence</h4></div>
                <div class="slick-slide"><h4>Customized Solutions</h4></div>
                <div class="slick-slide"><h4>Hassle Free End to End Service</h4></div>
                <div class="slick-slide"><h4>10 Year Warranty</h4></div>
                <div class="slick-slide"><h4>365 Days Customer Support</h4></div>
              </div> 
            </div>
          </div>

          <div class="left">
            <h2><?php echo $durable_heading; ?></h2>
            <?php if($durableend != ''): ?>
            <ul class="tabList">
                <?php
                 $di=1;
                ?>
             <?php $__currentLoopData = $durableend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <div class="tabs"  data-image="<?php echo e(asset("images/services/rightimage/$dd->mainimage")); ?>"" id="tab<?php echo e($di); ?>"
                     <?php if($dd->id==8): ?>
                       data-url="<?php echo e(url("/features-benefits/negligible-maintenance")); ?>"
                     <?php elseif($dd->id==9): ?>
                       data-url="<?php echo e(url("/features-benefits/prevent-dust-buildup")); ?>"
                     <?php elseif($dd->id==10): ?>
                       data-url="<?php echo e(url("/features-benefits/large-views-ample-sunlight")); ?>"
                     <?php elseif($dd->id==11): ?>
                       data-url="<?php echo e(url("/features-benefits/")); ?>"
                     <?php elseif($dd->id==12): ?>
                       data-url="<?php echo e(url("/features-benefits/protection-from-storm")); ?>"
                    <?php else: ?>
                       data-url="<?php echo e(url("/features-benefits/")); ?>"
                    <?php endif; ?>
                     >
                  <div class="image"><img class="nohover" alt="<?php echo $dd->title; ?>" src="<?php echo e(asset("images/services/$dd->image")); ?>"><img alt="<?php echo $dd->title; ?>" class="hover" src="<?php echo e(asset("images/services/onhover/$dd->onhoverimage")); ?>"></div>
                  <div class="title"><?php echo $dd->title; ?></div>
                </div>
              </li>
                <?php
                 $di=$di+1;
                ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              <li><a href="<?php echo e(url('/features-benefits')); ?>" class="blue-btn white featurebene">Explore More</a></li>
            </ul> 
              
          <?php endif; ?>
          </div>

          <div class="right durablerignt" style="<?php echo e(asset("images/services/rightimage/$dd->mainimage")); ?>" >
               <?php
                 $di=1;
                ?>
             <?php $__currentLoopData = $durableend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="tabContent<?php echo e($di); ?>" class="tabContent">
              <div class="content" >
                <h4><?php echo $dd->contentheading; ?></h4>
                   <p><?php echo $dd->content; ?></p>
                  <a href="<?php echo e(url('/features-benefits')); ?>" class="for-mob blue-btn white">  <span>Explore More</span></a> 
              </div>
              
            </div>
                <?php
                 $di=$di+1;
                ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>



        </div>
      </div>
      <div class="down-link">
        <a href="#wide-range" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
      
    <div class="wide-range section bg3" id="section2">
      <div class="container-fluid">
        <div class="inner-box" style="background: #f0f6f6 url(<?php echo e(asset("images/page/$exist_bthum_images")); ?>) no-repeat;">          
          <div class="right">
            <div class="">
              <h4><?php echo e($wi_subtitle); ?></h4>
              <h1><span><?php echo e($wi_title); ?></span> </h1>
                <p><?php echo $wi_subcontent; ?></p>
            </div>  
              
              <div class="tab-list">
                                  <a href="<?php echo e(url('/design')); ?>">By Design</a>
                                 <a href="<?php echo e(url('/series')); ?>">By Series</a>
                                 <a href="<?php echo e(url('/material')); ?>">By Material</a>
                           </div>
              
                     
          </div>
          <div class="left" style="display: none;">
            <div class="wide-range-list" id="by-design" >
              <div class="image-box">
                  <a href="<?php echo e(url('/design')); ?>">   <div class="image"><img src="<?php echo e(asset('images/site_images/images/home/wide-range1.jpg')); ?>"></div></a>
              </div>             
            </div>
            <div class="wide-range-list" id="by-series">
              <div class="image-box">
                  <a href="<?php echo e(url('/series')); ?>"><div class="image"><img src="<?php echo e(asset('images/site_images/images/home/wide-range1.jpg')); ?>"></div></a>
              </div> 
            </div>
            <div class="wide-range-list" id="by-material">
              <div class="image-box">
                  <a href="<?php echo e(url('/material')); ?>"><div class="image"><img src="<?php echo e(asset('images/site_images/images/home/wide-range1.jpg')); ?>"></div></a>
              </div> 
            </div>
          </div>          
        </div>      
      </div>    
      <div class="down-link">
        <a href="#quality-innovate" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>

    <div class="quality-innovate section bg4" id="section3">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2><?php echo e($solu_heading); ?></h2>
            <a href="<?php echo e(url('/quality-innovation')); ?>" class="blue-btn">Explore More</a>
          </div>
          <div class="before-mob">
            <div class="quality-innovate-slider owl-carousel">
                <?php $__currentLoopData = $Solutions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk => $solution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($sk==0 || $sk==4 || $sk==8): ?>
                    <div class="item">
                <?php endif; ?>
                <div class="box">
                  <div class="left"><h6><?php echo $solution->title; ?></h6></div>
                  <div class="right"><img class="" src="<?php echo e(asset("images/solutions/$solution->mainimage")); ?>"></div>
                </div>
              <?php if($sk==3 || $sk==7 || $sk==11): ?>
              </div> 
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </div>
          </div>
          <div class="after-mob text-center">
            <div class="quality-innovate-slider owl-carousel">
                 <?php $__currentLoopData = $Solutions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk => $solution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <div class="item">
                <div class="box">
                  <div class="left">
                    <h6><?php echo $solution->title; ?></h6>
                    <div class="content">
                      <a href="<?php echo e(url('/quality-innovation')); ?>">Read More</a>
                    </div>
                  </div>
                  <div class="right"><img class="" src="<?php echo e(asset("images/solutions/$solution->mainimage")); ?>"></div>
                </div>  
              </div>
             
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
               <div class="view-all for-mob"><a href="<?php echo e(url('/quality-innovation')); ?>" class="blue-btn"> view All</a></div>
          </div>

        </div>
      </div>
      <div class="down-link">
        <a href="#location" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>

     <?php if(!$partnerShowroom->isEmpty()): ?>
    <div class="locate-sec section bg3" id="section2">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2><span class="for-desk"><?php echo e($locateus_heading); ?></span><span class="for-mob">Find Us Nearby You</span></h2>


            <div class="slelect-box">
           
              <div class="form-group">
                <label>Country</label>
                <div class="styled_select">
                  <select class="form-control">
                     <option value="">India</option>
                  </select>
                </div>                
              </div>

              <div class="form-group">
                <label>State</label>

                <div class="styled_select">
                  <select class=" form-control" id="oostate">
                   <option value="">Select State</option>
                    <?php $__currentLoopData = $stateoshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if($c_state==$sts->state): ?> selected <?php endif; ?> value="<?php echo e($sts->state); ?>"><?php echo e($sts->state); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div> 
              </div>


              <div class="form-group">
                <label>City</label>
                <div class="styled_select">
                  <select class="form-control" id="oocity">
                      <option value="">Select City</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Block</label>
                <div class="styled_select">
                  <select class="form-control" id="ooblock">
                      <option value="">Select Block</option>
                  </select>
                </div>
              </div> 
            </div>
          </div>
          <div class="map">
                <div id="map_wrapper">
                   <div id="map_canvas"></div>
                </div>
            </div>
          <div class="ajax-data">
          <div class="address-slider owl-carousel">
              <?php $__currentLoopData = $partnerShowroom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <?php  $mapdata[]=array(0=>$ps->city,$ps->lat,$ps->long,"$ps->address,$ps->city,$ps->state","Partner Showroom");
              ?>
              
              
            <div class="item">
              <div class="address">
                <div class="image"><img src="<?php echo e(asset('images/site_images/loc-icon.png')); ?>"></div>
                <div class="right">
                  <h6><?php echo e($ps->city); ?></h6>
                  <p><?php echo $ps->address; ?></p>
                </div>
              </div>
              <div class="email">
                <div class="image"><img src="<?php echo e(asset('images/site_images/email.png')); ?>"></div>
                <div class="right">
                  <a href="mailto:<?php echo e($ps->email); ?>"><?php echo e($ps->email); ?></a>
                </div>
              </div>
              <div class="phone">
                <div class="image"><img src="<?php echo e(asset('images/site_images/call-icon.png')); ?>"></div>
                <div class="right">
                  <a href="tel:<?php echo e($ps->phone); ?>"><?php echo e($ps->phone); ?></a>
                </div>
              </div>
            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          </div>
          <div class="view-showroom"><a href="javascript:;" class="blue-btn" id="view-more">View More Showrooms</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#unmatch-service" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
      <?php endif; ?>
      
      
    <div class="unmatch-service section bg6" id="section5">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="left">
            <div class="heading">
              <h2><?php echo e($dcm_heading); ?></h2>
                <h4>  <?php echo e(strip_tags(htmlspecialchars_decode($dcm_content))); ?> </h4>
            </div>
             
             <?php if(!$servicesend->isEmpty()): ?>
            <ul class="image-box">
                <?php $__currentLoopData = $servicesend; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk => $servicee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="">
                <div class="image"><img src="<?php echo e(asset("images/services/$servicee->image")); ?>"></div>
                <div class="title"><?php echo $servicee->title; ?></div>
              </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            </ul>
              <?php endif; ?>
          
          </div>
        
        </div>
      </div>
      <div class="down-link">
        <a href="#client-say" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
      
    <?php if(!$testimonials->isEmpty()): ?>
    <div class="client-sec section bg7" id="section6">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading text-center">
            <h2><?php echo e($cltsat_heading); ?> <a href="<?php echo e(url('/customer-reviews')); ?>" class="blue-btn"> view All</a></h2>
            <!-- <h5><?php echo e($cltsat_subheading); ?></h5> -->
          </div>
          <div class="client-slider owl-carousel">
               <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
              <div class="image">
                <img src="<?php echo asset("images/testimonials/reference/$testimonial->reference_image"); ?>">
                  <?php if(!empty($testimonial->youtube_url)): ?>
                <span class="play" data-video-id="<?php echo e($testimonial->youtube_url); ?>"><img src="<?php echo e(asset('images/site_images/play.png')); ?>"></span>
                  <?php endif; ?>
              </div>
              <div class="desc">
                <div class="pic"><img src="<?php echo asset("images/testimonials/user/$testimonial->user_image"); ?>"></div>
                <div class="right">
                  <h6><?php echo e($testimonial->name); ?></h6>
                  <p><?php echo e($testimonial->city); ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="view-all for-mob"><a href="<?php echo e(url('/customer-reviews')); ?>" class="blue-btn"> view All</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#visual-design" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
    <?php endif; ?>
    <div class="visual-sec section bg8" id="section7">
      <div class="inner-box"> 
        <div class="container-fluid">
          <div class="slider-for-visual slick-slider">
            <div class="image">
                <?php if($exist_banner_images): ?>
                  <?php $__currentLoopData = $exist_banner_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
              <picture>
                <source srcset="<?php echo e(asset('images/page/').'/'.$bi); ?>" media="(min-width:768px)">
                <source srcset="<?php echo e(asset('images/page/').'/'.$bi); ?>" media="(min-width:320px)">
                <img src="<?php echo e(asset('images/page/').'/'.$bi); ?>">
              </picture> 
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
               <?php endif; ?>   
                
            </div> 
            <div class="content">
              <div class="heading"><h3><?php echo $visdsg_heading; ?></h3></div>
              <a href="https://www.fenesta.com/VisualizeDesign/index.html" class="blue-btn">Visualize Now</a>
                <ul class="dwnlist">
					<li><a href="<?php echo e($datasettings['playstore']); ?>"><img src="<?php echo e(asset('images/site_images/images/g-play-store.png')); ?>"></a></li>
					<li><a href="<?php echo e($datasettings['appstore']); ?>"><img src="<?php echo e(asset('images/site_images/images/app-store.png')); ?>"></a></li>
				</ul>
            </div>         
          </div>
        </div>
      </div>
      <div class="bottom-strip" style="display: none;">
        <div class="container-fluid">
          <div class="box">
            <h6>Download The App Now</h6>
            <a href="javascript:;"><img src="<?php echo e(asset('images/site_images/images/g-play-store.png')); ?>"></a>
            <a href="javascript:;"><img src="<?php echo e(asset('images/site_images/images/app-store.png')); ?>"></a>
          </div>
        </div>
      </div>

      <div class="down-link">
        <a href="#image-gallery" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>

    </div>
      
    <?php if(!$gallerys->isEmpty()): ?>
    
    <div class="image-gallery section bg7" id="section6">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2><?php echo e($imgglry_heading); ?></h2>
            <a href="<?php echo e(url('/showcase/gallery')); ?>" class="blue-btn">View More</a>
          </div>
          <div class="image-gallery-slider owl-carousel">
            <?php $__currentLoopData = $gallerys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         
            <div class="item">
              <div class="image"><img src=<?php echo asset("images/gallery_images/$gallery->image"); ?>></div>
              <div class="title"><?php echo $gallery->heading; ?></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </div>
         
          <div class="experinece-ar for-mob"><a href="<?php echo e(url('/showcase/gallery')); ?>" class="blue-btn">View More</a></div>
        </div>
      </div>
      <div class="down-link">
        <a href="#awards" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
    <?php endif; ?>

    <div class="latest-sec section bg10" id="section9">
      <div class="container-fluid">
        <div class="inner-box">
            
       <?php if(!$fenestaworlds->isEmpty()): ?>
          <div class="heading">
            <h2><?php echo e($fw_heading); ?></h2>
            <a href="<?php echo e(url('/awards-accreditations')); ?>" class="blue-btn">Read All</a>
          </div>
          <div class="latest-update">
              
            <?php $__currentLoopData = $fenestaworlds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fenestaworld): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
             <div class="image"><img src="<?php echo asset("images/awards/$fenestaworld->image"); ?>"></div>
              <div class="content">
               
                <h6><?php echo e(strip_tags($fenestaworld->description)); ?> </h6>
                
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </div>
            
          <div class="read-all for-mob"><a href="<?php echo e(url('/awards-accreditations')); ?>" class="blue-btn">View All</a></div>
        <?php endif; ?>
            
            
            <?php if(!$clicndaar->isEmpty()): ?>
          <div class="bottom">
            <div class="clientele-sec">              
              <div class="heading">
                 
                <h2> <?php echo e($cli_heading); ?></h2>
                <a href="<?php echo e(url('/showcase/clientele')); ?>" class="blue-btn">View All</a>
              </div>
              <div class="for-desk">
                <div class="clientele-slider owl-carousel">
                     <?php if($clicndaar): ?>
                       <?php $__currentLoopData = $clicndaar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="item"><img src="<?php echo e(asset('images/gallery_images/').'/'.$exim->image); ?>"></div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                    
                </div>
              </div>
              <div class=" for-mob">
                  <?php if($clicndaar): ?>
                <div class="clientele-slider-mob owl-carousel">
                    
                       <?php $__currentLoopData = $clicndaar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                    <ul>
                      <li><img src="<?php echo e(asset('images/gallery_images/').'/'.$exim->image); ?>"></li>
                    </ul>                  
                  </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </div>
                    <?php endif; ?>
              </div>
            </div>            
          </div>
            <?php endif; ?>
        </div>
      </div>
      <div class="down-link">
        <a href="#latest-blog" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
     
      <?php if(!$blogs->isEmpty()): ?>
    <div class="home-latest-blog-sec section bg11" id="section10">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="heading">
            <h2><?php echo e($blog_heading); ?></h2>
            <a href="<?php echo e(url('/blog')); ?>" class="blue-btn">Read All</a>
          </div> 
          <div class="home-latest-blog-list">
              <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($bk==0): ?>
            <div class="left">
              <div class="item">
                <div class="image"><img src="<?php echo e(asset("images/$blog->image")); ?>"></div>
                <div class="content">
                  <div class="date"><img src="<?php echo e(asset('images/site_images/images/blog/calender.png')); ?>"><?php echo e(date("d-m-
                      Y",strtotime($blog->posted_date))); ?></div>
                  <h4> <?php echo e($blog->name); ?></h4>
                  <p><?php echo e($blog->short_description); ?></p>
                  <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($blog->slug)); ?>" class="blue-btn">Read More</a>
                </div>
              </div>
            </div>
              <?php endif; ?>
              <?php if($bk>0): ?>
               <?php if($bk==1): ?>
            <div class="right">
               <?php endif; ?>
              <div class="item <?php if($bk==1): ?> blog_first_box_img <?php endif; ?> ">
                <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($blog->slug)); ?>">
                  <div class="image"><img src="<?php echo e(asset("images/$blog->image")); ?>"></div>
                  <div class="content">                  
                      <h4><?php echo e($blog->name); ?></h4>
                    <div class="date"><img src="<?php echo e(asset('images/site_images/images/calender1.png')); ?>"><?php echo e(date("d-m-
                      Y",strtotime($blog->posted_date))); ?></div>
                      
                    <a href="<?php echo e(App\Models\BlogPostModel::getPostUrl($blog->slug)); ?>" class="blue-btn">Read More</a>
                  </div>
                </a>
              </div>
                <?php if($bk==4): ?>
            </div>
                <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="home-latest-blog-view-all for-mob"><a href="<?php echo e(url('/blog')); ?>" class="blue-btn">Read All</a></div>
          </div>
        </div>         
      </div>
      <div class="down-link">
        <a href="#customer-appreciation" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
     <?php endif; ?>
   
    
  
    <div class="customer-appreciation-sec section bg10" id="section9">
      <div class="container-fluid">
        <div class="inner-box">
            
          <?php if($about_heading != '' || $about_content != ''): ?>
          <div class="content">
            <h4 class="text-center"><?php echo e($about_heading); ?> </h4>
          <?php echo $about_content; ?>

          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="down-link">
        <a href="#footer" data-id="wide-range">
          <img src="<?php echo e(asset('images/site_images/drop-down.png')); ?>">
          <img src="<?php echo e(asset('images/site_images/drop-down.png')); ?>">
        </a>
      </div>
    </div>
<script>
          
 $('#oostate').change(function(){
//     alert("ghjgh");
    var url = "<?php echo e(url('/')); ?>/getlocateusofficehome";//should return json with a list of cities only
    var std = $(this).find(':selected').val();
//    alert(std);
    var data = {'state':std};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.ajax-data').html(items);
            
             $('.address-slider').owlCarousel({
    loop: false,
	margin:25,  
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
	items:3,  
    responsive:{
        0:{
          items:1,
		},
        480:{
          items:1
        },
        768:{
          items:3
        },
        1024:{
          items:3
        },
        1366:{
          items:3
        }
      }
  });
        }
    });
     
     var urlcity = "<?php echo e(url('/')); ?>/getcitybystatepartner";
  
    $.ajax({
        url:urlcity,
        data:data,
        dataType:'html',
        success: function(items){
            $('#oocity').html(items);
            $('#oocity').change();
        }
    });
}).change();
 $('#oocity').change(function(){
//     alert("ghjgh");
    var url = "<?php echo e(url('/')); ?>/getlocateuscityofficehome";//should return json with a list of cities only
    var std = $("#oostate").find(':selected').val();
    var city = $(this).find(':selected').val();
//    alert(std);
    var data = {'state':std , city:city};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.ajax-data').html(items);
            
             $('.address-slider').owlCarousel({
    loop: false,
	margin:25,  
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
	items:3,  
    responsive:{
        0:{
          items:1,
		},
        480:{
          items:1
        },
        768:{
          items:3
        },
        1024:{
          items:3
        },
        1366:{
          items:3
        }
      }
  });
        }
    });
     
     var urlblock = "<?php echo e(url('/')); ?>/getblockbycitypartner";
  
    $.ajax({
        url:urlblock,
        data:data,
        dataType:'html',
        success: function(items){
            $('#ooblock').html(items);
        }
    });
     
}).change();
    
 $('#ooblock').change(function(){
//     alert("ghjgh");
    var url = "<?php echo e(url('/')); ?>/getlocateusblockofficehome";//should return json with a list of cities only
    var std = $("#oostate").find(':selected').val();
    var city = $("#oocity").find(':selected').val();
    var block = $(this).find(':selected').val();
//    alert(std);
    var data = {'state':std , city:city, block:block};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.ajax-data').html(items);
            
             $('.address-slider').owlCarousel({
    loop: false,
	margin:25,  
    autoplay:false,
    dots:false,
    nav:true,
    smartSpeed:1000,
    mouseDrag:true,
    responsiveClass:true,
	items:3,  
    responsive:{
        0:{
          items:1,
		},
        480:{
          items:1
        },
        768:{
          items:3
        },
        1024:{
          items:3
        },
        1366:{
          items:3
        }
      }
  });
        }
    });
   
     
});
</script>

<script>
$(document).ready(function() {
  $('.tabContent').css("display", "none");
  $('#tabContent1').css("display", "block");
  $('.tabs').on('click', function() {
    var tabId = $(this).attr('id');
    var matches = tabId.match(/(\d+)/);
    if (matches) {
//        alert(matches);
        var url = $(this).attr('data-url');
        var imageUrl = $(this).attr('data-image');
//         alert(url);
      $('.featurebene').attr('href',url)
      $('.durablerignt').css('background-image', 'url(' + imageUrl + ')');
      $('.tabContent').css("display", "none");
      $('#tabContent' + matches[0]).css("display", "block");
    } else {
      $('.tabContent').css("display", "none");
    }
  })
});
    
    
    
    
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDtHKuJRxHlOpQlfS_OUWs09CeY8lnVmU4&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {

    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        Zoom: 7,
        center: new google.maps.LatLng(23.1633477,79.9589574),
    };
    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
     // Multiple Markers
	var markers = <?php echo json_encode($mapdata); ?>;
//	var markers =	jQuery.parseJSON(markersj);
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i <= markers.length; i++ ) {
//        console.log(markers[i][1]);
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);



        // Info Window Content
        var address = markers[i][3];
        var heading = markers[i][4];

        if(heading == 'Signature Studios')
        {
          var iconimg = 'images/site_images/images/locate/tooltip-blue.png';
        }else if(heading == 'Partner Showroom')
        {
          var iconimg = 'images/site_images/images/locate/tooltip.png';
        }else if(heading == 'Fenesta Offices')
        {
          var iconimg = 'images/site_images/images/locate/tooltip-purple.png';
        }
        else if(heading == 'Signature Studios')
        {
          var iconimg = 'images/site_images/images/locate/tooltip-purple.png';
        }
		
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
            icon: iconimg
        });


		var infoWindowContent =  '<div class="info_content"><b><p>'+heading+'</p></b><p>'+address+'</p></div>';
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () { 
               infoWindow.setContent('<b>'+markers[i][4]+'</b><br />'+markers[i][3]);
               //infoWindow.setContent(infoWindowContent);
               infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });
    
}
</script>
<?php $__env->stopSection(); ?>
     
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\fenestalive\FenestaWebsite\resources\views/frontend/index.blade.php ENDPATH**/ ?>