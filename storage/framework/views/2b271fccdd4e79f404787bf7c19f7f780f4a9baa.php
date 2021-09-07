
<?php $__env->startSection('content'); ?>
<?php

use Illuminate\Support\Facades\DB;
use App\Models\WindowType;
?>



    <div class="sitemap-sec">
      <div class="sitemap-box mt60">
        <div class="container-fluid">
          <div class="inner-box">
            <div class="parent">
              <a href="<?php echo e(url('/')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/home-icon.png')); ?>"></span> Home</a>
            </div>
            <div class="parent product-list">
              <a href="javascript:;"><span class="image"><img src="<?php echo e(asset('images/sitemap/product-icon.png')); ?>"></span> Products</a>
              <div class="child">
                <div class="colm-1 colm">
                    <a href="<?php echo e(url('/window')); ?>"> <h6 class="bord-btm">Windows</h6> </a>
                  <div class="sub-child">
                   <a href="<?php echo e(url('/window/upvc-windows')); ?>"> <h6>uPVC Windows</h6></a>
                    <ul>
                        
                        <?php
                          $windowtypes = WindowType::where('is_delete','0')->where('product','1')->where('product_type','Window')->get();
                          $wkki=0;
                          $type_w = 'window';
                          $slug_w = 'upvc-windows';
                        
                       
                        ?>
                        
                         <?php $__currentLoopData = $windowtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkk => $wtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                      <li><a href="<?php echo e(url("/$type_w/$slug_w")); ?>">uPVC <?php echo e($wtt->title); ?> Windows</a></li> 
                   <?php
                       $wkki = $wkki+200;
                       ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                    </ul>
                  </div>
                  <div class="sub-child">
                   <a href="<?php echo e(url('/window/alumininum-windows')); ?>">  <h6>Aluminium Windows</h6></a>
                    <ul>
                       
                        <?php
                          $windowtypes = WindowType::where('is_delete','0')->where('product','2')->where('product_type','Window')->get();
                          $wkki=0;
                          $type_w = 'window';
                          $slug_w = 'alumininum-windows';
                        ?>
                        
                         <?php $__currentLoopData = $windowtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkk => $wtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                      <li><a href="<?php echo e(url("/$type_w/$slug_w")); ?>">Aluminium <?php echo e($wtt->title); ?> Windows</a></li> 
                   <?php
                       $wkki = $wkki+200;
                       ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                </div>
                <div class="colm-2 colm">
                  <a href="<?php echo e(url('/door')); ?>">  <h6 class="bord-btm">Doors</h6></a>
                  <div class="sub-child">
                  <a href="<?php echo e(url('/door/upvc-doors')); ?>">   <h6>uPVC Doors</h6></a>
                    <ul>
                     
                        <?php
                          $windowtypes = WindowType::where('is_delete','0')->where('product','3')->where('product_type','Door')->get();
                          $wkki=0;
                          $type_w = 'door';
                          $slug_w = 'upvc-doors';
                        ?>
                        
                         <?php $__currentLoopData = $windowtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkk => $wtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                      <li><a href="<?php echo e(url("/$type_w/$slug_w")); ?>">uPVC <?php echo e($wtt->title); ?> Doors</a></li> 
                   <?php
                       $wkki = $wkki+200;
                       ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                  <div class="sub-child">
                  <a href="<?php echo e(url('/door/alumininum-doors')); ?>">   <h6>Aluminium Doors</h6></a>
                    <ul>
                      
                        <?php
                          $windowtypes = WindowType::where('is_delete','0')->where('product','4')->where('product_type','Door')->get();
                          $wkki=0;
                          $type_w = 'door';
                          $slug_w = 'alumininum-doors';
                        ?>
                        
                         <?php $__currentLoopData = $windowtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkk => $wtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                      <li><a href="<?php echo e(url("/$type_w/$slug_w")); ?>">Aluminium <?php echo e($wtt->title); ?> Doors</a></li> 
                   <?php
                       $wkki = $wkki+200;
                       ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
                    
                     <div class="sub-child">
                  <a href="<?php echo e(url('/door/internal-doors')); ?>">   <h6>Internal Doors</h6></a>
                         
                    </div>
                </div>
              </div>
            </div>
            <div class="parent locate-list">
                
              <a href="<?php echo e(url('/locate-us')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/locate-icon.png')); ?>"></span> Locate Us</a>
              <div class="child">
                <div class="colm-1 colm">
                  <a href="<?php echo e(url('/locate-us/international-market')); ?>"> <h6 class="bord-btm">International Market</h6></a>
                  <div class="sub-child">
                      <a href="<?php echo e(url('locate-us/international-market/bhutan')); ?>"><h6>Bhutan</h6> </a>
                    <ul>
                      <li><a href="<?php echo e(url('locate-us/international-market/bhutan/phuentsholing')); ?>">Phuentsholing</a></li>
                      <li><a href="<?php echo e(url('locate-us/international-market/bhutan/thimphu')); ?>">Thimpu</a></li>
                    </ul>
                  </div>
                  <div class="sub-child">
                  <a href="<?php echo e(url('locate-us/international-market/nepal')); ?>">  <h6>Nepal</h6> </a>
                    <ul>
                      <li><a href="<?php echo e(url('locate-us/international-market/nepal/kathmandu')); ?>">Kathmandu</a></li>
                    </ul>
                  </div>
                  <div class="colm-2 colm">
                   <a href="<?php echo e(url('/locate-us/fenesta-offices')); ?>"> <h6 class="bord-btm">Fenesta Offices</h6></a>
                    <div class="sub-child">
                      <ul>
                        <li><a href="<?php echo e(url('locate-us/fenesta-offices/head-office')); ?>">Head Office</a></li>
                        <li><a href="<?php echo e(url('locate-us/fenesta-offices/sales-office-and-installation-service')); ?>">Sales Office & Installation Service</a></li>               
                        <li><a href="<?php echo e(url('locate-us/fenesta-offices/extrusion-factory')); ?>">Extrusion Factory</a></li>
                        <li><a href="<?php echo e(url('locate-us/fenesta-offices/fabrication-factories')); ?>">Fabrication Factory</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="colm-3 colm">
                 <a href="<?php echo e(url('/locate-us/signature-studio')); ?>"> <h6 class="bord-btm">Signature Studios</h6></a>
                    
                    <?php
                     $stateshowrooms = DB::table('showrooms')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
                    
                    ?>
                    <?php $__currentLoopData = $stateshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php 
                    $citypshowrooms = DB::table('showrooms')->select('city')->where('is_delete','0')->where('state',$ss->state)->get();
                    $scb = strtolower(str_replace(' ', '-', $ss->state));
                    ?>
                  <div class="sub-child">
                      <a href="<?php echo e(url("locate-us/signature-studio/$scb")); ?>"><h6><?php echo e($ss->state); ?></h6></a>
                    <ul>
                        <?php $__currentLoopData = $citypshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                <?php 
                            $blockpshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->where('city',$cc->city)->get();
                                $scbc = strtolower(str_replace(' ', '-', $cc->city));
                            ?>
                        
                        
                      <li>
                        <a href="<?php echo e(url("locate-us/signature-studio/$scb/$scbc")); ?>"><?php echo e($cc->city); ?></a>
                        <ul class="sub-sub-child">
                            <?php $__currentLoopData = $blockpshowrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php 
                                $scbcb = strtolower(str_replace(' ', '-', $bb->locality));
                            ?>
                          <li><a href="<?php echo e(url("locate-us/signature-studio/$scb/$scbc/$scbcb")); ?>"><?php echo e($bb->locality); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </ul>
                      </li> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>                 
                  </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="colm-4 colm">
                  <a href="<?php echo e(url('/locate-us/partner-showroom')); ?>"> <h6 class="bord-btm">Partner Showrooms</h6></a>
                    
                     
                    <?php
                     $stateshowroomspp = DB::table('partner_showrooms')->select('state')->where('is_delete','0')->where('status','Active')->where('country','India')->groupBy('state')->get();
                    
                    ?>
                    <?php $__currentLoopData = $stateshowroomspp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php 
                    $citypshowroomspp = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('state',$ss->state)->where('country','India')->groupBy('city')->get();
                    $scb = strtolower(str_replace(' ', '-', $ss->state));
                    ?>
                  <div class="sub-child">
                      <a href="<?php echo e(url("locate-us/signature-studio/$scb")); ?>"><h6><?php echo e($ss->state); ?></h6></a>
                    <ul>
                        <?php $__currentLoopData = $citypshowroomspp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                <?php 
                            $blockpshowroomspp = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->where('country','India')->where('city',$cc->city)->groupBy('locality')->get();
                                $scbc = strtolower(str_replace(' ', '-', $cc->city));
                            ?>
                        
                        
                      <li>
                        <a href="<?php echo e(url("locate-us/signature-studio/$scb/$scbc")); ?>"><?php echo e($cc->city); ?></a>
                          <?php if(!empty($blockpshowroomspp[0]->locality)): ?>
                        <ul class="sub-sub-child">
                            <?php $__currentLoopData = $blockpshowroomspp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php 
                                $scbcb = strtolower(str_replace(' ', '-', $bb->locality));
                            ?>
                          <li><a href="<?php echo e(url("locate-us/signature-studio/$scb/$scbc/$scbcb")); ?>"><?php echo e($bb->locality); ?></a></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </ul>
                          <?php endif; ?>
                      </li> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>                 
                  </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </div>
              </div>
            </div>
            <div class="parent about-fenesta">
              <h6  class="bord-btm"><a href="<?php echo e(url('/about-us')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/about-icon.png')); ?>"></span> About Fenesta</a></h6>
              <ul class="adjacent-child">
                <li><a href="<?php echo e(url('/about-us#ourvalue')); ?>">Our Values</a></li>
                <li><a href="<?php echo e(url('/about-us#infrastructure-sec')); ?>">Our Infrastructure</a></li>
                <li><a href="<?php echo e(url('/about-us#awards')); ?>">Awards & Recognitions</a></li>
              </ul> 
            </div>
       
            <div class="parent news-media">
              <h6  class="bord-btm"><a href="<?php echo e(url('/news-media')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/news-icon.png')); ?>"></span> News & Media</a></h6>
              <ul class="adjacent-child">
                <li><a href="<?php echo e(url('/news-media/latest-events')); ?>">Latest Events</a></li>
                <li><a href="<?php echo e(url('/news-media/advertisement-centre')); ?>">Advertisements</a></li>
                <li><a href="<?php echo e(url('/news-media/press-coverage')); ?>">Press Coverage</a></li>
                
              </ul> 
            </div>
            <div class="col-box1 col-box">
              <div class="parent why-fenesta">
                <h6  class="bord-btm"><a href="<?php echo e(url('/style-benefits')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/convers-icon.png')); ?>"></span> Why Fenesta</a></h6>
                <ul class="adjacent-child">
                  <li>
                    <a href="<?php echo e(url('/features-benefits')); ?>">Features & Benefits</a>
                    <ul class="sub-sub-child">
                    <?php $__currentLoopData = $featurebenefit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $ffbb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url("/features-benefits/$ffbb->slug")); ?>"><?php echo e($ffbb->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul> 
                    </li> 
                  <li><a href="<?php echo e(url('/style-benefits')); ?>">Style & Benefits</a></li>
                  <li><a href="<?php echo e(url('/quality-innovation')); ?>">Quality & Innovation</a></li>
                  <li><a href="<?php echo e(url('/awards-accreditations')); ?>">Awards & Accreditations</a></li>
                  <li><a href="<?php echo e(url('/services-infrastructure')); ?>">Services & Infrastructure</a></li>
                  <li><a href="<?php echo e(url('/brand-heritage')); ?>">Our Brand & Heritage</a></li>
                  <li><a href="<?php echo e(url('/green-sustainability')); ?>">Green & Sustainability</a></li>
                </ul> 
              </div>
              <div class="parent option">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="<?php echo e(asset('images/sitemap/option-icon.png')); ?>"></span> Options</a></h6>
                <ul class="adjacent-child">
                  <li><a href="<?php echo e(url('/window/colors-finish')); ?>">Color Options</a></li>
                  <li><a href="<?php echo e(url('/window/glass')); ?>">Glass Options</a></li>
                  <li><a href="<?php echo e(url('/window/handles')); ?>">Handles & Locks</a></li>
                  <li><a href="<?php echo e(url('/window/mesh-grill')); ?>">Mesh & Grill Options</a></li>
                  <li><a href="<?php echo e(url('/trims')); ?>">Trim Options</a></li>
                </ul> 
              </div>
                <div class="parent option">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="<?php echo e(asset('images/sitemap/option-icon.png')); ?>"></span> Options Other</a></h6>
                <ul class="adjacent-child">
                  <li><a href="<?php echo e(url('/design')); ?>">By Design</a></li>
                  <li><a href="<?php echo e(url('/series')); ?>">By Series</a></li>
                  <li><a href="<?php echo e(url('/material')); ?>">By Material</a></li>
                </ul> 
              </div>
              <div class="parent showcase">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="<?php echo e(asset('images/sitemap/showcase-icon.png')); ?>"></span> Showcase</a></h6>
                <ul class="adjacent-child">
                  <li><a href="<?php echo e(url('/showcase/clientele')); ?>">Clientele</a></li>
                  <li><a href="<?php echo e(url('/showcase/gallery')); ?>">Gallery</a></li>
                  <li><a href="<?php echo e(url('/customer-reviews')); ?>">Testimonials</a></li>
                </ul> 
              </div>
              <div class="parent other">
                <h6  class="bord-btm"><a href="javascript:;"><span class="image"><img src="<?php echo e(asset('images/sitemap/other-icon.png')); ?>"></span> Others</a></h6>
                <ul class="adjacent-child">
                  <li><a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policies</a></li>
                  <li><a href="<?php echo e(url('/disclaimer')); ?>">Disclaimer</a></li>
                </ul> 
              </div>
            </div>   
            <div class="col-box2 col-box">
              <div class="parent facade">
                <h6  class=""><a href="<?php echo e(url('/great-facade')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/facade-icon.png')); ?>"></span> Great Facades</a></h6>               
              </div>
              <div class="parent blog">
                <h6  class=""><a href="<?php echo e(url('/blog')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/blog-icon.png')); ?>"></span> Blog</a></h6>               
              </div>
              <div class="parent brochures">
                <h6  class=""><a href="<?php echo e(url('/brochure')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/broucher-icon.png')); ?>"></span> Fenesta Brochures</a></h6>               
              </div>
              <div class="parent dcm">
                <h6  class=""><a href="<?php echo e(url('/about-dcm')); ?>"><span class="image"><img src="<?php echo e(asset('images/sitemap/dcm-icon.png')); ?>"></span> DCM Shriram</a></h6>               
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.template_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fenesta_new_develpment/resources/views/sitemap.blade.php ENDPATH**/ ?>