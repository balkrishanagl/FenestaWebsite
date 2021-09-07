
  <header class="home">
    <div class="container-fluid">
      <div class="inner-header">
        <div class="logo"><a href="<?php echo e(url('/')); ?>">
              <img src="<?php echo e(asset('images/logo/'.$datasettings['logo'])); ?>"></a></div>
        <div class="header-right">
          <div class="top">
            <a href="<?php echo e(url('/brochure')); ?>"><img class="hover" src="<?php echo e(asset('images/site_images/images/broucher.png')); ?>"><img class="nohover"src="<?php echo e(asset('images/site_images/images/broucher-white.png')); ?>">Brochure</a>
          
            <a href="<?php echo e(url('/enquire-now')); ?>?utm_source=WebEnquiry&utm_medium=Organic%2FDirect&utm_campaign=Website" ><img class="hover" src="<?php echo e(asset('images/site_images/images/enquire.png')); ?>"><img class="nohover"src="<?php echo e(asset('images/site_images/images/enquire-white.png')); ?>">Enquire</a>
            <a href="tel:18001029880" class="tel_box">  <img class="hover" src="<?php echo e(asset('images/site_images/images/phone.png')); ?>"><img class="nohover"src="<?php echo e(asset('images/site_images/images/phone-white.png')); ?>"> Toll Free : 1800 102 9880</a>
          </div>
          <div class="bottom">
            <ul class="menu-list">
              <li><a href="<?php echo e(URL('/')); ?>">Home</a></li>
              <li class="drop-down"><a href="<?php echo e(URL('/about-us')); ?>">About Us</a><span><i class="fa fa-angle-down"></i></span>
                
                      <div class="submenu">
                      <ul class="">
                        <li><a href="<?php echo e(URL('/about-us#ourvalue')); ?>">Our Value</a>

                          </li>
                        <li ><a href="<?php echo e(URL('/about-us#infrastructure-sec')); ?>">Our Infrastructure</a>   
                        </li>
                        <li ><a href="<?php echo e(URL('/about-us#awards')); ?>">Awards & Accreditations</a>   
                        </li>
                      </ul>
                    </div>  
                  
                </li>


            

              <li  class="drop-down"><a href="javascript:;">Products</a>
                <span><i class="fa fa-angle-down"></i></span>
                <div class="submenu">
                  <ul class="">
                    <li><a href="<?php echo e(URL('/window')); ?>">Windows</a> <span class="fa fa-angle-right"></span>
                          <ul class="sub_dropdown_menu">
                          <?php
                          use App\Models\WindowdoorType;
                
                          $wind = WindowdoorType::where('is_delete','0')->get();
                  
                          $windows = $wind->where('type','Window');
                          ?>
                  <?php $__currentLoopData = $windows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $ttype = strtolower($ww->type);
                    $pt = strtolower($ww->slug);
                    ?>
                   <li><a href="<?php echo e(url("/$ttype/$pt")); ?>"><?php echo e($ww->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                              </ul>
                        
                      </li>
                    <li ><a href="<?php echo e(URL('/door')); ?>">Doors</a>  <span class="fa fa-angle-right"></span>
                        
                          <ul class="sub_dropdown_menu">
                         <?php
                   $doors = $wind->where('type','Door');
                  ?>
                  <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php
                    $ttype = strtolower($dd->type);
                    $pt = strtolower($dd->slug);
                    ?>
                    
                <li><a href="<?php echo e(url("/$ttype/$pt")); ?>"><?php echo e($dd->title); ?> </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                              </ul>
                        
                    </li>
                  </ul>
                </div>  
                
                </li>
              <li class="drop-down"><a href="javascript:;">Why Fenesta</a><span><i class="fa fa-angle-down"></i></span>
                  <div class="submenu">
                  <ul class="">
                      <li><a href="<?php echo e(URL('/features-benefits')); ?>">Features & Benefits</a></li>
                     <li><a href="<?php echo e(URL('/style-benefits')); ?>">Style & Benefits</a></li>
                    <li><a href="<?php echo e(URL('/quality-innovation')); ?>">Quality & Innovation</a></li>
                    <li><a href="<?php echo e(URL('/awards-accreditations')); ?>">Awards & Accreditations</a></li>
                    <li><a href="<?php echo e(URL('/services-infrastructure')); ?>">Services & Infrastucture</a></li>
                    <li><a href="<?php echo e(URL('/brand-heritage')); ?>">Brand & Heritage</a></li>
                    <li><a href="<?php echo e(URL('/green-sustainability')); ?>">Green & Sustainability</a></li>
                  </ul>
                </div>  
                </li>
              <li class="drop-down"><a href="javascript:;">Showcase</a><span><i class="fa fa-angle-down"></i></span>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="<?php echo e(URL('/showcase/clientele')); ?>">Clientele</a></li>
                    <li><a href="<?php echo e(URL('/showcase/gallery')); ?>">Gallery</a></li>
                    <li><a href="<?php echo e(URL('/customer-reviews')); ?>">Testimonials</a></li>
                  </ul>
                </div>  
                </li>
              <li><a href="https://www.fenesta.com/VisualizeDesign/index.html">Customize</a></li>
              <li class="drop-down"><a href="javascript:;">Contact Us</a>
                  <span><i class="fa fa-angle-down"></i></span>
                  <div class="submenu">
                  <ul class="">
                    <li><a href="https://api.whatsapp.com/send?phone=917428691568&text=Hi">Market Outside India Whatsapp</a></li>
                      <li><a href="sms:+56161&body=Hi">SMS <WINDOW> TO 56161</WINDOW></a></li>
                    <li><a href="<?php echo e(url('/enquire-now')); ?>?utm_source=WebEnquiry&utm_medium=Organic%2FDirect&utm_campaign=Website" >Submit Enquiry</a></li>
                    <li><a href="mailto:response@fenesta.com" >Email Us</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target=".complaint-popup">Customer Complaint</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target=".buiseness-popup"> Reach the Business head </a></li>
                  </ul>
                </div>  
              </li>
            </ul> 

           

            <div class="search-box">
              <span class="search-icon slide-toggle" id="searchIcon1">
                <img class="search-image" src="<?php echo e(asset('images/site_images/search.png')); ?>">
                <img class="mob-search-image" src="<?php echo e(asset('images/site_images/search-blue.png')); ?>">
              </span>
            </div>
            <!-- Search-Box -->
            <div class="mob-locate-icon">
              <img class="" src="<?php echo e(asset('images/site_images/images/locate-icon-blue.png')); ?>"> <?php if($c_city!=''): ?> <?php echo e($c_city); ?> <?php else: ?> Gurugram  <?php endif; ?>         
            </div>

            <!-- Floating Search bar. Appear on click of search Icon on top menu -->
             <div class="floatingSearch1 searchBox" id="floatingSearch1">
              <div class="search-box-container">
                <form>
                  <input type="text" autocomplete="off" id="search-box" placeholder="Search"/>
                  <input type="button" value="Search" class="blue-btn btnSearch"/> 
                    
                    <div id="suggesstion-box"></div>
                </form>
              </div>
            </div>
            <!-- /floatingSearch --> 


          </div>
          <!-- Bottom -->
        </div>
      </div>
    </div>

  </header>  

<?php /**PATH D:\xampp\htdocs\fenestalive\FenestaWebsite\resources\views/frontend/_partials/header.blade.php ENDPATH**/ ?>