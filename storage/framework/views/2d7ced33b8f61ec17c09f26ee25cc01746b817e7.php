
<?php $__env->startSection('content'); ?>
<?php $type_officce = array(1=>'Head Office',2=>'Sales Office and Installation Service',3=>'Extrusion Factory',4=>'Fabrication Factories'); 
$mapdata=array();
$map_c=0; 

?>
<style>
    #map_wrapper {
    height: 400px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}
</style>
        <div class="main-sec inner-page">
    <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
     
      <div class="our-office-sec pdt45">
        <div class="container-fluid">
          <h4 class="text-center">Our Presence</h4>
          <div class="map-box mt40">
            <div id="map_wrapper">
            <div id="map_canvas"></div></div>
          </div>
          <div class="tooltip-list">
            <div class="item">
              <img src="<?php echo e(asset('images/site_images/images/locate/tooltip-blue.png')); ?>">
              <p>Signature Studios</p>
            </div>
            <div class="item">
              <img src="<?php echo e(asset('images/site_images/images/locate/tooltip.png')); ?>">
              <p>Partner Showroom</p>
            </div>
            <div class="item">
              <img src="<?php echo e(asset('images/site_images/images/locate/tooltip-purple.png')); ?>">
              <p>Fenesta Offices</p>
            </div>
            <div class="item">
              <img src="<?php echo e(asset('images/site_images/images/locate/tooltip.png')); ?>">
              <p>International Market</p>
            </div>
          </div>
        </div>
      </div>
            
      <div class="locate-tab-sec">
        <div class="container-fluid">
          <ul class="locate-link">
            <li><a href="<?php echo e(url('/locate-us/signature-studio')); ?>" <?php if(empty($child_slug) || $child_slug=='signature-studio'): ?> class="active" <?php endif; ?> >Signature Studio</a></li>
            <li><a <?php if($child_slug=='partner-showroom'): ?> class="active" <?php endif; ?> href="<?php echo e(url('/locate-us/partner-showroom')); ?>" >Partner Showroom</a></li>            
            <li><a <?php if($child_slug=='fenesta-offices'): ?> class="active" <?php endif; ?> href="<?php echo e(url('/locate-us/fenesta-offices')); ?>">Fenesta Offices</a></li>          
            <li><a <?php if($child_slug=='international-market'): ?> class="active" <?php endif; ?> href="<?php echo e(url('/locate-us/international-market')); ?>">International Market</a></li>          
          </ul>
        </div>
        <div class="locate-tab-list">
          <div class="container-fluid">
              <?php if(empty($child_slug) || $child_slug=='signature-studio'): ?>
            <div class="locate-tab-box" id="signature-studio" <?php if(empty($child_slug) || $child_slug=='signature-studio'): ?> style="display: block;" <?php endif; ?> >
              <div class="slelect-box">                 
                <div class="form-group">
                  <select class="select">
<!--                    <option>Select Country</option>-->
                    <option>India</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" name="fstate" id="fstate">
                    <option value="">Select State</option>
        
                      <?php $__currentLoopData = $stateshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug1)): ?> <?php if($child_slug1==$sts->state): ?> selected  <?php endif; ?> <?php endif; ?> value="<?php echo e($sts->state); ?>"><?php echo e($sts->state); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select"  name="fcity" id="fcity">
                    <option value="">Select City</option>
                      <?php if(!empty($cityshowrooms)): ?>
                      <?php $__currentLoopData = $cityshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug2)): ?> <?php if($child_slug2==$sts->city): ?> selected  <?php endif; ?> <?php endif; ?> value="<?php echo e($sts->city); ?>"><?php echo e($sts->city); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="fblock">
                    <option value="">Select Block</option>
                       <?php if(!empty($blockshowrooms)): ?>
                       <?php $__currentLoopData = $blockshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug3)): ?> <?php if($child_slug3==strtolower($sts->locality)): ?> selected  <?php endif; ?> <?php endif; ?> value="<?php echo e($sts->locality); ?>"><?php echo e($sts->locality); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php endif; ?>
                  </select>
                </div>                
              </div>
              <div class="inner-box">
                <div class="left">
					
					<div class="address-list-slider owl-carousel">
                        
                        <?php $__currentLoopData = $showrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Signature Studio");
                        
                        ?>
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?php echo e(asset('images/site_images/images/right-arrow.png')); ?>" alt=""><?php echo e($sroom->city); ?></h4>
								<h3><?php echo e($sroom->dealer_name); ?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/user.png')); ?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?php echo e($sroom->contact_person); ?>

								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/gps.png')); ?>" alt="">
									</div>
									<strong><?php echo e($sroom->locality); ?></strong>
									<p><?php echo $sroom->address; ?> , <?php echo e($sroom->state); ?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/email.png')); ?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?php echo e($sroom->email); ?>"><?php echo e($sroom->email); ?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/phone.png')); ?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?php echo e($sroom->phone); ?>"><?php echo e($sroom->phone); ?></a>
								</li>
							</ul>
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
                </div>
                <div class="right video-sliderss">
                  <div class=" video-slider owl-carousel">
                        <?php $__currentLoopData = $testlocateus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <?php if($ps->youtube_url): ?>
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
              <?php endif; ?>
              <?php if($child_slug=='partner-showroom'): ?> 
            <div class="locate-tab-box" id="partner-showroom" <?php if($child_slug=='partner-showroom'): ?> style="display: block;" <?php endif; ?>  >
                
              <div class="slelect-box">                 
                <div class="form-group">
                  <select class="select">
<!--                    <option>Select Country</option>-->
                    <option>India</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="psstate">
                    <option value="">Select State</option>
        
                      <?php $__currentLoopData = $statepshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug1)): ?> <?php if($child_slug1==$sts->state): ?> selected  <?php endif; ?> <?php endif; ?>  value="<?php echo e($sts->state); ?>"><?php echo e($sts->state); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select"  id="pscity">
                    <option value="">Select City</option>
                      <?php if(!empty($citypshowrooms)): ?>
                      <?php $__currentLoopData = $citypshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug2)): ?> <?php if($child_slug2==$sts->city): ?> selected  <?php endif; ?> <?php endif; ?>  value="<?php echo e($sts->city); ?>"><?php echo e($sts->city); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <select class="select" id="psblock">
                    <option value="">Select Block</option>
                      <?php if(!empty($blockpshowrooms)): ?>
                      <?php $__currentLoopData = $blockpshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug3)): ?> <?php if($child_slug3==strtolower($sts->locality)): ?> selected  <?php endif; ?> <?php endif; ?> value="<?php echo e($sts->locality); ?>"><?php echo e($sts->locality); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php endif; ?>
                  </select>
                </div>                
              </div>
              <div class="inner-box">
                <div class="left">
                  <div class="address-list-slider owl-carousel">
                      
                        <?php $__currentLoopData = $partner_showrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                      
                       <?php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Partner Showroom");
                        ?>
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?php echo e(asset('images/site_images/images/right-arrow.png')); ?>" alt=""><?php echo e($sroom->city); ?></h4>
								<h3><?php echo e($sroom->dealer_name); ?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/user.png')); ?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?php echo e($sroom->contact_person); ?>

								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/gps.png')); ?>" alt="">
									</div>
									<strong><?php echo e($sroom->locality); ?></strong>
									<p><?php echo $sroom->address; ?>,<?php echo e($sroom->state); ?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/email.png')); ?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?php echo e($sroom->email); ?>"><?php echo e($sroom->email); ?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/phone.png')); ?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?php echo e($sroom->phone); ?>"><?php echo e($sroom->phone); ?></a>
								</li>
							</ul>
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
                </div>
                <div class="right video-sliderpp ">
                  <div class="video-slider owl-carousel">
                        <?php $__currentLoopData = $testlocateus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <?php if($ps->youtube_url): ?>
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if($child_slug=='fenesta-offices'): ?>  
              <div class="locate-tab-box" id="fenesta-offices" <?php if($child_slug=='fenesta-offices'): ?> style="display: block;" <?php endif; ?>>
                
              <div class="slelect-box">                 
             
                <div class="form-group">
                  <select class="select" id="ooblock">
                    <option value="">Select Office </option>
                      <?php if(!empty($blockoshowrooms)): ?>
                     <?php $__currentLoopData = $blockoshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug1)): ?> <?php if($child_slug1==$sts->type): ?> selected  <?php endif; ?> <?php endif; ?>  data-name="<?php echo e($type_officce[$sts->type]); ?>" value="<?php echo e($sts->type); ?>"><?php echo e($type_officce[$sts->type]); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php endif; ?> 
                  </select>
                </div>                
              </div>
              <div class="inner-box">
                <div class="left">
                  <div class="address-list-slider owl-carousel">
                      
                        
                        <?php $__currentLoopData = $offices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                      <?php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Fenesta Offices");
                        ?>
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?php echo e(asset('images/site_images/images/right-arrow.png')); ?>" alt=""><?php echo e($sroom->city); ?></h4>
								<h3><?php echo e($type_officce[$sroom->type]); ?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/user.png')); ?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?php echo e($sroom->contact_person); ?>

								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/gps.png')); ?>" alt="">
									</div>
									<strong><?php echo e($sroom->locality); ?></strong>
									<p><?php echo $sroom->address; ?> , <?php echo e($sroom->state); ?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/email.png')); ?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?php echo e($sroom->email); ?>"><?php echo e($sroom->email); ?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/phone.png')); ?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?php echo e($sroom->phone); ?>"><?php echo e($sroom->phone); ?></a>
								</li>
							</ul>
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
                </div>
                <div class="right video-slideroo">
                  <div class=" video-slider owl-carousel">
                     <?php $__currentLoopData = $testlocateus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                      <?php if($ps->youtube_url): ?>
                      <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
              
              
              <?php if($child_slug=='international-market'): ?> 
            <div class="locate-tab-box" id="international-market" <?php if($child_slug=='international-market'): ?> style="display: block;" <?php endif; ?>  >
                
              <div class="slelect-box">                 
                <div class="form-group">
                  <select class="select country">
                    <option value="">Select Country</option>
                    <option value="Bhutan" <?php if(!empty($child_slug1)): ?> <?php if($child_slug1=='Bhutan'): ?> selected  <?php endif; ?> <?php endif; ?> >Bhutan</option>
                    <option value="Nepal" <?php if(!empty($child_slug1)): ?> <?php if($child_slug1=='Nepal'): ?> selected  <?php endif; ?> <?php endif; ?>  >Nepal</option>
                  </select>
                </div>
               
                <div class="form-group">
                  <select class="select"  id="incity">
                    <option value="">Select City</option>
                      <?php if(!empty($citypshowrooms)): ?>
                      <?php $__currentLoopData = $citypshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option <?php if(!empty($child_slug2)): ?> <?php if($child_slug2==$sts->city): ?> selected  <?php endif; ?> <?php endif; ?>  value="<?php echo e($sts->city); ?>"><?php echo e($sts->city); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      <?php endif; ?>
                  </select>
                </div> 
                          
              </div>
              <div class="inner-box">
                <div class="left">
                  <div class="address-list-slider owl-carousel">
                      
                        <?php $__currentLoopData = $partner_showrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                      
                       <?php 
                        $mapdata[$map_c++]=array(0=>$sroom->city,$sroom->lat,$sroom->long,"$sroom->address,$sroom->city,$sroom->state","Partner Showroom");
                        ?>
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?php echo e(asset('images/site_images/images/right-arrow.png')); ?>" alt=""><?php echo e($sroom->city); ?></h4>
								<h3><?php echo e($sroom->dealer_name); ?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/user.png')); ?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?php echo e($sroom->contact_person); ?>

								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/gps.png')); ?>" alt="">
									</div>
									<strong><?php echo e($sroom->locality); ?></strong>
									<p><?php echo $sroom->address; ?>,<?php echo e($sroom->state); ?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/email.png')); ?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?php echo e($sroom->email); ?>"><?php echo e($sroom->email); ?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?php echo e(asset('images/site_images/images/locate/phone.png')); ?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?php echo e($sroom->phone); ?>"><?php echo e($sroom->phone); ?></a>
								</li>
							</ul>
						</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
                </div>
                <div class="right video-sliderpp ">
                  <div class="video-slider owl-carousel">
                        <?php $__currentLoopData = $testlocateus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                      <?php if($ps->youtube_url): ?>
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
              
              
            </div>
        </div>
      </div>   
            
    <?php echo $__env->make('frontend._partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
</div>

<script>
    
//fcity
//floca
 
 $('.country').change(function(){
      var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/international-market/"+str;
 });
    
    
 $('#incity').change(function(){
        var str1 = $('.country').val();
        var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/international-market/"+str1+"/"+str;
 });
    
    
    
 $('#fstate').change(function(){
    var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/signature-studio/"+str;
     

//    var url = "<?php echo e(url('/')); ?>/getlocateusstudio";//should return json with a list of cities only
//    var url1 = "<?php echo e(url('/')); ?>/getvideo";//should return json with a list of cities only
//    var std = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#signature-studio .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderss').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlcity = "<?php echo e(url('/')); ?>/getcitybystate";
//  
//    $.ajax({
//        url:urlcity,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#fcity').html(items);
//        }
//    });
//     
//     
     
});

 $('#fcity').change(function(){
     
        var str1 = $('#fstate').val();
        var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/signature-studio/"+str1+"/"+str;
     
//    var url = "<?php echo e(url('/')); ?>/getlocateuscitystudio";//should return json with a list of cities only
//    var url1 = "<?php echo e(url('/')); ?>/getvideo";//should return json with a list of cities only
//    var std = $("#fstate").find(':selected').val();
//    var city = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#signature-studio .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderss').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlblock = "<?php echo e(url('/')); ?>/getblockbycity";
//  
//    $.ajax({
//        url:urlblock,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#fblock').html(items);
//        }
//    });
//     
});
    
 $('#fblock').change(function(){
     
     
        var str1 = $('#fstate').val();
        var str2 = $('#fcity').val();
        var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      str2 = str2.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/signature-studio/"+str1+"/"+str2+"/"+str;
     
//    var url = "<?php echo e(url('/')); ?>/getlocateusblockstudio";//should return json with a list of cities only
//    var std = $("#fstate").find(':selected').val();
//    var city = $("#fcity").find(':selected').val();
//    var block = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city, block:block};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#signature-studio .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//   
//     
});
    
 $('#psstate').change(function(){
     
     var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/partner-showroom/"+str;
   
     
     
//    var url = "<?php echo e(url('/')); ?>/getlocateuspartner";//should return json with a list of cities only
//    var url1 = "<?php echo e(url('/')); ?>/getvideo";//should return json with a list of cities only
//    var std = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#partner-showroom .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderpp').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlcity = "<?php echo e(url('/')); ?>/getcitybystatepartnerlll";
//  
//    $.ajax({
//        url:urlcity,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#pscity').html(items);
//        }
//    });
});
  
 $('#pscity').change(function(){
      var str = $('#psstate').val();
      var str1 = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/partner-showroom/"+str+"/"+str1;
   
     
//    var url = "<?php echo e(url('/')); ?>/getlocateuscitypartner";//should return json with a list of cities only
//    var url1 = "<?php echo e(url('/')); ?>/getvideo";//should return json with a list of cities only
//    var std = $("#psstate").find(':selected').val();
//    var city = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#partner-showroom .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-sliderpp').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlblock = "<?php echo e(url('/')); ?>/getblockbycitypartner";
//  
//    $.ajax({
//        url:urlblock,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#psblock').html(items);
//        }
//    });
//     
});
    
 $('#psblock').change(function(){
     
     var str = $('#psstate').val();
     var str1 = $('#pscity').val();
      var str2 = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      str2 = str2.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/partner-showroom/"+str+"/"+str1+"/"+str2;
   
     
     
//    var url = "<?php echo e(url('/')); ?>/getlocateusblockpartner";//should return json with a list of cities only
//    var std = $("#psstate").find(':selected').val();
//    var city = $("#pscity").find(':selected').val();
//    var block = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city, block:block};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#partner-showroom .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//   
     
});
    
    /*
 $('#oostate').change(function(){
     
      var str = $(this).val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/fenesta-offices/"+str;
     
     
     
//    var url = "<?php echo e(url('/')); ?>/getlocateusoffice";//should return json with a list of cities only
//    var url1 = "<?php echo e(url('/')); ?>/getvideo";//should return json with a list of cities only
//    var std = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#fenesta-offices .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-slideroo').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     var urlcity = "<?php echo e(url('/')); ?>/getcitybystateoffice";
//  
//    $.ajax({
//        url:urlcity,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#oocity').html(items);
//        }
//    });
});
 $('#oocity').change(function(){
     var str = $(this).val();
     var str1 = $('#oostate').val();
      str = str.replace(/\s+/g, '-').toLowerCase();
      str1 = str1.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/fenesta-offices/"+str1+"/"+str;
//    var url = "<?php echo e(url('/')); ?>/getlocateuscityoffice";//should return json with a list of cities only
//    var url1 = "<?php echo e(url('/')); ?>/getvideo";//should return json with a list of cities only
//    var std = $("#oostate").find(':selected').val();
//    var city = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#fenesta-offices .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//     
//     
//     
//     
//    $.ajax({
//        url:url1,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('.video-slideroo').html(items);
//            
//             $('.video-slider').owlCarousel({
//    loop: true,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:1,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:1
//        },
//        1024:{
//          items:1
//        },
//        1366:{
//          items:1
//        }
//      }
//  });
//        }
//    });
//     
//     var urlblock = "<?php echo e(url('/')); ?>/getblockbycityoffice";
//  
//    $.ajax({
//        url:urlblock,
//        data:data,
//        dataType:'html',
//        success: function(items){
//            $('#ooblock').html(items);
//        }
//    });
//     
}); */
    
 $('#ooblock').change(function(){
       var str = $(this).val();
     if(!str){
        window.location = "<?php echo e(url('/')); ?>/locate-us/fenesta-offices/";  
     }
       var strn = $(this).find(':selected').attr('data-name');
//     var str1 = $('#oostate').val();
//     var str2 = $('#oocity').val();
      strn = strn.replace(/\s+/g, '-').toLowerCase();
//      str1 = str1.replace(/\s+/g, '-').toLowerCase();
//      str2 = str2.replace(/\s+/g, '-').toLowerCase();
      window.location = "<?php echo e(url('/')); ?>/locate-us/fenesta-offices/"+strn;
     
//    var url = "<?php echo e(url('/')); ?>/getlocateusblockoffice";//should return json with a list of cities only
//    var std = $("#oostate").find(':selected').val();
//    var city = $("#oocity").find(':selected').val();
//    var block = $(this).find(':selected').val();
////    alert(std);
//    var data = {'state':std , city:city, block:block};
//    $.ajax({
//        url:url,
//        data:data,
//        dataType:'html',
//        success: function(items){
//             $('#fenesta-offices .left').html(items);
//            
//             $('.address-list-slider').owlCarousel({
//    loop: false,
//	margin:25,  
//    autoplay:false,
//    dots:false,
//    nav:true,
//    smartSpeed:1000,
//    mouseDrag:true,
//    responsiveClass:true,
//	items:2,  
//    responsive:{
//        0:{
//          items:1,
//		},
//        480:{
//          items:1
//        },
//        768:{
//          items:2
//        },
//        1024:{
//          items:2
//        },
//        1366:{
//          items:2
//        }
//      }
//  });
//        }
//    });
//   
     
});
</script>


  <script>

jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDtHKuJRxHlOpQlfS_OUWs09CeY8lnVmU4&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

      
//if (navigator.geolocation) { 
//
//         navigator.geolocation.getCurrentPosition(initialize);
//
// } 
//      
      
function initialize() {

    var map;
    var bounds = new google.maps.LatLngBounds();
    
//    var clat =  position.coords.latitude;                                       
//    var clong =  position.coords.longitude;   
//    alert(clat);
//    alert(clong);
    
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
    
//    navigator.geolocation.getCurrentPosition(function (p) {
//        var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
//        var mapOptions = {
//            center: LatLng,
//            zoom: 13,
//            mapTypeId: google.maps.MapTypeId.ROADMAP
//        };
        
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
     // Multiple Markers
	var markers = <?php echo json_encode($mapdata); ?>;
		
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i <= markers.length; i++ ) {
        console.log(markers[i][1]);
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);



        // Info Window Content
        var address = markers[i][3];
        var heading = markers[i][4];
//alert(heading);
        if(heading == 'Signature Studios')
        {
          var iconimg = "<?php echo e(asset('images/site_images/images/locate/tooltip-blue.png')); ?>";
        }else if(heading == 'Partner Showroom')
        {
          var iconimg = "<?php echo e(asset('images/site_images/images/locate/tooltip.png')); ?>";
        }else if(heading == 'Fenesta Offices')
        {
          var iconimg = "<?php echo e(asset('images/site_images/images/locate/tooltip-purple.png')); ?>";
        }
        else if(heading == 'Signature Studios')
        {
          var iconimg = "<?php echo e(asset('images/site_images/images/locate/tooltip-purple.png')); ?>";
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
        this.setZoom(10);
        google.maps.event.removeListener(boundsListener);
    });
    
}
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/frontend/cmspage/locate_us.blade.php ENDPATH**/ ?>