<footer class="section bg11" id="section10">
      <div class="container-fluid">
        <div class="inner-box">
          <div class="top-footer">
            <h4><?php echo e($datasettings['subscribetitle']); ?></h4>
            <form name="frmNewsletter"  id="frmNewsletter" method="post" action="<?php echo e(url('newsletter')); ?>">
                        <?php echo e(csrf_field()); ?>

               
                <div class="form-group">
                <input  maxlength="100" placeholder="Enter Email Address"  name="email" id="email" onKeyUp="Remove('frmNewsletter','email')" type="email" >
                <button type="submit" class="blue-btn">Subscribe</button>
                 </div>
                <div class="message-box message-box-frmNewsletter" style="display:none;"> <span class="message-text"></span> </div>
                <div class="error" id="error_email" ></div>
                </form>
            <ul class="social-link">
              <li><a target="_blank" href="<?php echo e($datasettings['facebook']); ?>"><img src="<?php echo e(asset('images/site_images/fb.png')); ?>"></a></li>
              <li><a target="_blank" href="<?php echo e($datasettings['twitter']); ?>"><img src="<?php echo e(asset('images/site_images/tweet.png')); ?>"></a></li>
              <li><a target="_blank" href="<?php echo e($datasettings['linkedin']); ?>"><img src="<?php echo e(asset('images/site_images/linked.png')); ?>"></a></li>
              <li><a target="_blank" href="<?php echo e($datasettings['youtube']); ?>"><img src="<?php echo e(asset('images/site_images/yt.png')); ?>"></a></li>
              <li><a target="_blank" href="<?php echo e($datasettings['insta']); ?>"><img src="<?php echo e(asset('images/site_images/insta.png')); ?>"></a></li>
            </ul>
          </div>
          <div class="footer-menu">
            <div class="footer-menu-box">
                <h6><a href="javascript:void(0)">Windows <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a></h6>
              <ul>
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
            </div>
            <div class="footer-menu-box">
                <h6><a href="javascript:void(0)">Doors <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></a></h6>
              <ul>
                  <?php
                   $doors = $wind->where('type','Door');
                  ?>
                  <?php $__currentLoopData = $doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $ttype = strtolower($dd->type);
                    $pt = strtolower($dd->slug);
                    ?>
                <li><a href="<?php echo e(url("/$ttype/$pt")); ?>"><?php echo e($dd->title); ?>  </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
            </div>
            <div class="footer-menu-box">
              <h6>Discover Fenesta <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h6>
              <ul>
                <li><a href="<?php echo e(url('/about-us')); ?>">About Fenesta</a></li>
                <li><a href="<?php echo e(url('/about-dcm')); ?>">DCM Shriram</a></li>
                <li><a href="<?php echo e(url('/news-media')); ?>">News & Media</a></li>
                <li><a href="<?php echo e(url('/awards-accreditations')); ?>">What's New</a></li>
                <li><a href="<?php echo e(url('/style-benefits')); ?>">Why Fenesta</a></li>
                <li><a href="<?php echo e(URL('/showcase/gallery')); ?>">Showcase</a></li>
                 
              </ul>
            </div>
            <div class="footer-menu-box">
              <h6>Support <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h6>
              <ul>
                <li><a href="<?php echo e(url('/locate-us')); ?>">Locate Us  </a></li>
                <li><a href="<?php echo e(url('/great-facade')); ?>">Great Facades </a></li>
                <li><a href="<?php echo e(url('/brochure')); ?>">Request a Brochure  </a></li>
                <li><a href="javascript:;"  data-toggle="modal" data-target=".consult-popup">Consult  </a></li>
                <li><a href="<?php echo e(url('/blog')); ?>">Blog</a></li>
              </ul>
            </div>
            <div class="footer-menu-box">
              <h6>Contact Us <i class="fas fa-plus"></i> <i class="fas fa-minus"></i></h6>
              <ul>
                <li><a href="tel:18001029880">Call Toll Free 1800 102 9880</a></li>
                <li><a href="sms:+56161&body=Hi">SMS <WINDOW> TO 56161</a></li>
                 <li><a href="<?php echo e(url('/enquire-now')); ?>?utm_source=WebEnquiry&utm_medium=Organic%2FDirect&utm_campaign=Website" >Submit Enquiry</a></li>
                <li><a href="mailto:response@fenesta.com">Email Us</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target=".complaint-popup">Customer Complaint</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target=".buiseness-popup">Reach the Business Head</a></li>
              </ul>
            </div>
          </div>
          <div class="dwnload-app">
            <h6>Download The App Now</h6>
            <a href="<?php echo e($datasettings['playstore']); ?>"><img src="<?php echo e(asset('images/site_images/g-play-store.png')); ?>"></a>
            <a href="<?php echo e($datasettings['appstore']); ?>"><img src="<?php echo e(asset('images/site_images/app-store.png')); ?>"></a>
          </div>
          <div class="bottom-footer">
            <ul>
              <li><a href="https://career10.successfactors.com/career?company=dcmshriramP">Careers</a></li>
              <li><a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policies</a></li>
                <li><a href="<?php echo e(url('/disclaimer')); ?>"> Disclaimer</a></li>
              <li><a href="<?php echo e(url('/sitemap')); ?>"> Site Map</a></li>
            </ul>
            <p><?php echo e($datasettings['copyright']); ?> </p>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <div class="back-to-top">
   
      
<!--
      <div class="chat-link">
        <div class="">
          <a href="javascript:;" class="chat"><img class="for-desk" src="<?php echo e(asset('images/site_images/images/chat-icon.png')); ?>"><img class="for-mob" src="<?php echo e(asset('images/site_images/images/chat-icon1.png')); ?>"></a>
        </div>
      </div>
-->
    <a href="#banner">
      <img src="<?php echo e(asset('images/site_images/back-top.png')); ?>">
    </a>
  </div>

      <!-- Konverse Chatbot -->
        <a href="https://www.konverse.ai/"
        id="konverse-ref-id" data-bot-id="fenesta"
        title="Konverse.ai - Whatsapp chatbot retargeting Suite"
        style="display:none">WhatsApp for Business Chatbot</a>
  <!-------- Mobile Footer --------->
  <div class="mobile-footer">
    <div class="container-fluid">
      <ul>
        <li>
          <a href="<?php echo e(url('/locate-us')); ?>">
         <!--    <img class="grey" src="images/locate-icon.png">
            <img class="blue" src="images/home-active.png"> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="13.803" height="17.121" viewBox="0 0 13.803 17.121"><defs><style>.a{fill:#040b37;}.b{fill:none;stroke:#707070;}</style></defs><g transform="translate(-48.886)"><g transform="translate(48.886)"><path class="a" d="M61.45,2.966a6.888,6.888,0,0,0-11.326,0,6.89,6.89,0,0,0-.8,6.348,5.426,5.426,0,0,0,1,1.651l5.011,5.886a.6.6,0,0,0,.908,0l5.009-5.884a5.431,5.431,0,0,0,1-1.649A6.891,6.891,0,0,0,61.45,2.966ZM61.134,8.9a4.255,4.255,0,0,1-.787,1.289l0,0-4.557,5.352-4.559-5.355A4.258,4.258,0,0,1,50.44,8.9a5.7,5.7,0,0,1,.666-5.251,5.7,5.7,0,0,1,9.363,0A5.7,5.7,0,0,1,61.134,8.9Z" transform="translate(-48.886)"/><path class="b" d="M7.162,16.331"/></g><g transform="translate(52.447 3.539)"><path class="a" d="M159.095,106.219a3.341,3.341,0,1,0,3.341,3.341A3.344,3.344,0,0,0,159.095,106.219Zm0,5.488a2.147,2.147,0,1,1,2.147-2.147A2.15,2.15,0,0,1,159.095,111.707Z" transform="translate(-155.754 -106.219)"/></g></g></svg>
            <span>Locate</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(url('/enquire-now')); ?>?utm_source=WebEnquiry&utm_medium=Organic%2FDirect&utm_campaign=Website">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.121" height="17.121" viewBox="0 0 17.121 17.121"><defs><style>.a{fill:#040b37;}</style></defs><path class="a" d="M8.526,13.409A.669.669,0,1,1,9.2,12.74.669.669,0,0,1,8.526,13.409ZM9.2,10.4V9.5a2.788,2.788,0,1,0-2.63-4.7,2.738,2.738,0,0,0-.847,1.988.669.669,0,0,0,1.338,0,1.412,1.412,0,0,1,.437-1.025,1.48,1.48,0,0,1,1.092-.412,1.444,1.444,0,0,1,.264,2.857,1.25,1.25,0,0,0-.991,1.227V10.4a.669.669,0,0,0,1.338,0Zm3.794,5.488a.669.669,0,1,0-.693-1.144,7.286,7.286,0,1,1,2.262-2.174.669.669,0,1,0,1.112.743A8.556,8.556,0,0,0,2.507,2.507a8.561,8.561,0,0,0,10.483,13.38Zm0,0" transform="translate(0.001 0)"/></svg>
            <span>Enquiry</span>
          </a>
        </li>
        <li>
          <a href="tel:18001029880">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.121" height="17.121" viewBox="0 0 17.121 17.121"><g transform="translate(0 -0.001)"><g transform="translate(0 0.001)"><g transform="translate(0 0)"><path d="M248.605,22.3h.03a5.5,5.5,0,0,1,5.507,5.534.605.605,0,0,0,.6.608h0a.606.606,0,0,0,.605-.6,6.707,6.707,0,0,0-6.718-6.751H248.6a.605.605,0,0,0,0,1.211Z" transform="translate(-240.492 -20.452)"/><path d="M15.5,12.49a2.293,2.293,0,0,0-.7-1.575,5.631,5.631,0,0,0-2.23-1.481A2.5,2.5,0,0,0,10,10.16l0,0-.819.813a12.191,12.191,0,0,1-2.58-2l-.08-.08a12.267,12.267,0,0,1-2-2.581L5.337,5.5l0,0a2.5,2.5,0,0,0,.727-2.562A5.631,5.631,0,0,0,4.586.705,2.3,2.3,0,0,0,1.389.59L1.371.606,1.348.628A4.912,4.912,0,0,0,0,4.227,11.5,11.5,0,0,0,3.66,11.841l.006.006a14.776,14.776,0,0,0,1.446,1.258.605.605,0,0,0,.737-.961,13.539,13.539,0,0,1-1.332-1.159l-.006-.006a10.279,10.279,0,0,1-3.3-6.759A3.74,3.74,0,0,1,2.193,1.5l0,0a1.089,1.089,0,0,1,1.517.055c1.568,1.626,1.454,2.393.761,3.1L3.354,5.78a.605.605,0,0,0-.123.673,12.234,12.234,0,0,0,2.434,3.3l.08.08a12.234,12.234,0,0,0,3.3,2.434.605.605,0,0,0,.673-.123l1.131-1.122c.71-.693,1.478-.806,3.1.761A1.089,1.089,0,0,1,14.01,13.3l0,0a3.729,3.729,0,0,1-2.7.982H11.28a7.851,7.851,0,0,1-2.988-.707.605.605,0,1,0-.48,1.112,8.932,8.932,0,0,0,3.461.806h.034a4.9,4.9,0,0,0,3.564-1.347l.022-.024.016-.017A2.293,2.293,0,0,0,15.5,12.49Z" transform="translate(0 -0.001)"/><path d="M294.522,112.863a3.327,3.327,0,0,0-1.572-.9.605.605,0,1,0-.323,1.167,2.118,2.118,0,0,1,1.039.594,2.164,2.164,0,0,1,.588,1.02l.009.03a.605.605,0,1,0,1.161-.344l-.008-.028A3.332,3.332,0,0,0,294.522,112.863Z" transform="translate(-283.337 -108.547)"/></g></g></g></svg>
            <span>Call Us</span>
          </a>
        </li>        
        <li>
          <a href="javascript:;" class="menu-btn">
            <div class="burger-menu"><span></span></div>
            <span>Menu</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="mob-overlay"></div>

  <!-- The landing Pop Modal -->
  <div class="modal fade videoPopup" id="videoPopup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close"><img src="<?php echo e(asset('images/site_images/close.png')); ?>"></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
             <div id="video-placeholder" style="position: relative;"></div>
          </div>       
        </div> 
      </div>
    </div>
  </div>



  <!------------Enquiry Pop Up ------------>
  <div class="modal fade enquiry-popup" id="enquiry-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>"></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="">Please Enter Your Details</h5>            
            <form class="enquiry-form" id="enquiry-form" action="<?php echo e(url('/submit-enquiry')); ?>" method="post" novalidate>
                 <?php echo csrf_field(); ?>
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
                <select class="form-control  userstate" id="userstate" name="state">
                  <option value="">State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
                  <div class="error" id="error_userstate" ></div>
              </div>
              <div class="form-group">
                <select class="form-control  usercity" id="usercity" name="city">
                  <option value="">City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
                  <div class="error" id="error_usercity" ></div>
              </div>
              <div class="form-group">
                <button id="submit-btn-enquiry-form" type="submit" name="" class="blue-btn enquirysubmit"> Submit </button>
              </div>   
              <div class="message-box message-box-enquiry-form" style="display:none;"> <span class="message-text"></span> </div>    
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
              <div class="form-group">
                <p>*By clicking Submit button I agree that I have read the <br> <a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a></p>
              </div>
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>

  <!------------Complaint Pop Up ------------>
  <div class="modal fade complaint-popup" id="complaint-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>"></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="text-center">CUSTOMER COMPLAINTS</h5>
            <p class="text-center">We are sorry if we have caused any inconvenience to you. Please fill up the form below with your details. Our customer support staff will make sure we address your issue at the earliest.</p>
            <form class="complaint-form" id="complaint-form" novalidate method="post" action="<?php echo e(url('/submit-complaint')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" required value="Customercomplaint">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Contact No*" id="mobile">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email ID*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address*">
              </div>
              <div class="form-group">
                <select class="form-control  userstate" name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  usercity" name="city">
                  <option>City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
              </div>
              <div class="form-group full">
                <textarea class="form-control" name="message" placeholder="Enter Your Query"></textarea>
              </div>
              <div class="form-group full">
                <div class="captcha">
                 <div id="complaint_recaptcha" class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ" style="transform:scale(0.94);-webkit-transform:scale(0.94);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                </div>
               
              </div>
              <div class="form-group full">
                <button type="submit" id="submit-btn-complaint-form" name="" class="blue-btn submitcc"> Submit Complaint</button>
              </div> 
                <div class="message-box message-box-cc" style="display:none;"> <span class="message-text"></span> </div> 
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
			</form>	
          </div>
            
          </div>       
        </div> 
      </div>
  </div>

  <!------------Buiseness Pop Up ------------>
  <div class="modal fade buiseness-popup" id="buiseness-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>" alt=""></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="text-center">Reach The Buiseness Head</h5>
            <p class="text-center">Do you have a suggestion, a question, a business proposal or a concern that you'd like to share with our Business Head? Fill in form below to reach him directly.</p>
            <form class="complaint-form" id="complaint-forma" novalidate method="post" action="<?php echo e(url('/submit-complaint')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="type" required value="Reachbusiness">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Contact No*" id="mobile">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email ID*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address*">
              </div>
              <div class="form-group">
                <select class="form-control  userstate " name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  usercity " name="city">
                  <option>City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
              </div>
              <div class="form-group full">
                <textarea class="form-control" name="message" placeholder="Enter Your Query"></textarea>
              </div>
              <div class="form-group full">
                <div class="captcha">
                  <div id="reachhead_recaptcha" class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ" style="transform:scale(0.94);-webkit-transform:scale(0.94);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                </div>
              </div>
              <div class="form-group full">
                <button type="submit" id="submit-btn-complaint-forma" name="" class="blue-btn submitcca"> Submit Complaint</button>
              </div>   
                   <div class="message-box message-box-cca" style="display:none;"> <span class="message-text"></span> </div> 
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>

  <!------------consult Pop Up ------------>
  <div class="modal fade consult-popup" id="consult-popup">    
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">      
        <!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/site_images/images/close-pop.png')); ?>" alt=""></button> 
        <!-- Modal body -->
        <div class="modal-body">          
          <div class="content">
            <h5 class="text-center">Expert Consultation</h5>
            <p class="text-center">Whether you are looking for that perfect window for your room or a signature door for your entrance, our team of experts are here to help. Our consultants will help you with tips and solutions for every query specific to your need. To help us serve you better, please fill in your details below:</p>
            <form class="consult-form" id="consult-form" novalidate method="post" action="<?php echo e(url('/submit-complaint')); ?>">
                <?php echo csrf_field(); ?>
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name*">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="mobile" placeholder="Contact No*" id="mobile">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email ID*">
              </div>
               <div class="form-group">
                <select class="form-control  type " name="type">
                  <option value="Windowdoorconsult"> For Windows & Doors</option>
                  <option value="Interiorsconsult">For Interiors and Architecture </option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  userstate " name="state">
                  <option>State*</option>
                  <option>Delhi</option>
                  <option>Punjab</option>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  usercity " name="city">
                  <option>City*</option>
                  <option>Delhi</option>
                  <option>Amritsar</option>
                </select>
              </div>
              <div class="form-group full">
                <textarea class="form-control" name="message" placeholder="Enter Your Query"></textarea>
              </div>
              <div class="form-group full">
                <div class="captcha">
                  <div id="consult_recaptcha" class="g-recaptcha" data-sitekey="6LfaA1EbAAAAAAKc5BeLVYQRsEHmJ7iMGbIsPLBJ" style="transform:scale(0.94);-webkit-transform:scale(0.94);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                </div>
              </div>
              <div class="form-group full">
                <button type="submit"  id="submit-btn-consult-form" name="" class="blue-btn submitexpert"> Submit Consult</button>
              </div>   
                   <div class="message-box message-box-expert" style="display:none;"> <span class="message-text"></span> </div> 
                <div class="message-box error-cc" style="display:none;"> <span class="message-text"></span> </div> 
                  
            </form>
          </div>       
        </div> 
      </div>
    </div>
  </div>



 

  <div id="right_btm_box">
    <div class="top-content">
      <img src="http://52.66.48.39/fenesta_new_develpment/public/images/site_images/images/mesh/welcome-banner1.jpg">
      <div class="overlay-text">
        <h1>Customize your Windows &amp; Doors  in few simple steps</h1>
        <a href="https://www.fenesta.com/VisualizeDesign/index.html" class="blue-btn white">Visualize now</a>
      </div>
    </div>

    <div class="dwnload-app">
      <h6>Download The App Now</h6>
      <a href="https://play.google.com/store/apps/details?id=com.Fenesta.FenestaMobile"><img src="http://52.66.48.39/fenesta_new_develpment/public/images/site_images/g-play-store.png"></a>
      <a href="https://apps.apple.com/us/app/fenesta/id1462027526"><img src="http://52.66.48.39/fenesta_new_develpment/public/images/site_images/app-store.png"></a>
    </div>
    <button class="close_btn"> <span> x </span></button>
  </div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/fullpage.js')); ?>"></script>
<script src="<?php echo e(asset('js/scrolloverflow.min.js')); ?>"></script>
<script src="http://www.youtube.com/iframe_api"></script>
<script src="<?php echo e(asset('js/aos.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('js/common_file.js')); ?>"></script>

<?php
   $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

        { 
           ?>
  
<div class="whatapp_wrap_box">
  <a class="whatspp_icon" id="whatpp_icons"  href="https://api.whatsapp.com/send?phone=917428691568&text=Hi" style="text-decoration: none;" target="_blank">
	 <img src="https://i.ibb.co/N9P0K9H/239px-Whats-App-svg.png" width="50" height="50"/>
  </a>
</div>
<?php  
        }
        else{
          ?>
 
 <script>
    	setTimeout(function(){ 
    	    
    	var script = document.createElement('script');
script.src = "https://chat.konverse.ai/konverse.js";
script.async = true;
document.getElementsByTagName('head')[0].appendChild(script);    
    	    
    	}, 1000);
    </script>

<?php
        }

?>

<!-- end SnapEngage code -->
<script type="text/javascript">
   
    var player;
  $('.client-sec .image .play').on('click', function () {
      var url = $(this).attr('data-video-id');
      player.cueVideoById(url);
      player.playVideo();
      $('.videoPopup').modal('show');

  });   

  $('.videoPopup .close').click(function(){
    player.pauseVideo();
     $('.videoPopup').modal('hide');
  });

   $('.videoPopup').click(function(){
    player.pauseVideo();
     $('.videoPopup').modal('hide');
  })

  function onYouTubeIframeAPIReady() {
      player = new YT.Player('video-placeholder', {
          videoId: '',     
      });
  }

function Remove(form_id,id){
    jQuery('#error_'+id).html('');
    //jQuery('#'+id).removeClass('fld-error');

    jQuery("#"+form_id+ " #error_"+id).html("");
    jQuery("#"+form_id+ " #"+id).removeClass('fld-error');

}//end Remove 

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}//end IsEmail
function IsPhone(phone) {
  var regex = /^([0-9]{10})+$/;
  return regex.test(phone);
}//endIsPhone

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
    && (charCode < 48 || charCode > 57))
        return false;

    return true;
}  
    
   // start frmNewsletter
 $("#frmNewsletter").on("submit", function(r) {

var form_id="frmNewsletter";

jQuery(".message-box-" +form_id).hide();
jQuery("#"+form_id+" .error").html(" ");  
    

        var s = $(this);       
        r.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
       
     // js validation 


    var   email = jQuery("#"+form_id+" #email").val(); 
   if(email==''){        

            jQuery("#"+form_id+ " #error_"+"email").html("Please enter email.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+"  #email").focus();
            jQuery("#"+form_id+"  #email").addClass('fld-error');         
            return false;
           
      }


    if(IsEmail(email)==false){ 
            jQuery("#"+form_id+ " #error_"+"email").html("Please enter valid email address.");
            jQuery("#"+form_id+ " #error_"+"email").show();
            jQuery("#"+form_id+" #email").focus();
            jQuery("#"+form_id+" #email").addClass('fld-error');         
            return false;
            return false;       
            
    } 

  $(this).prop("disabled", true); 
 // js validation  end 
       // ajax
             jQuery.ajax({ 
             url: $("#" + form_id).attr("action"),
             type: 'POST',
             data: $("#" + form_id).serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery("#submit-btn-"+form_id).attr('disabled'); 
              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                                if(response.status==1){

                                  $("#" + form_id).trigger("reset");
                                 jQuery(".message-box-" + form_id).removeClass("error");
                                 jQuery(".message-box-" + form_id).addClass("success");

                                 } else{
                                jQuery(".message-box-" + form_id).removeClass("success");
                                 jQuery(".message-box-" + form_id).addClass("error");                        
                                } 
                              
                                //jQuery(".message-box-" + form_id).html(response.message);
                               jQuery(".message-box-frmNewsletter").html(response.message);

                                jQuery(".message-box-" + form_id).show(); 
                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
                               jQuery('#load-img-'+form_id).hide();  

               
             },
              error: function(e) {
                 jQuery('#submit-btn-'+form_id).removeAttr('disabled');
                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( "#"+form_id+ " #error_"+e).html(a);
                            $("#"+form_id+  " #" + e).addClass('fld-error');  
                             $("#"+form_id+  " #" + e).focus();            
                             

                        })  
                    },
           });
            //grecaptcha.reset();
            return false;
   
    })




</script>
    <script>
   
 jQuery.validator.addMethod("lettersonly", function(value, element) 
{
return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Please enter letters and spaces only");
   
            
 jQuery.validator.addMethod("addressonly", function(value, element) 
{
return this.optional(element) || /^[a-z0-9A-Z," "]+$/i.test(value);
}, "Please enter correct address");
    
        
 jQuery.validator.addMethod("matches", function(value, element) 
{
return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
}, "Please enter correct number");

        
     
 $('.enquirysubmit').click(function(r){
   r.preventDefault();
   $('#enquiry-form').validate({
    rules:{
      name: {
                lettersonly: true,
                required: true,
            },
      state:'required',
      mobile:{
        matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
        required:true,
        minlength:10,
        number:true,
        maxlength:10
       },
      email:{
        required:true,
        email:true
      }
    },
    messages:{
      
name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
      state:'Please enter state',
      mobile:{
          matches:"Please enter correct number",
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });
 
   if($('#enquiry-form').valid()){
       
var form_id="enquiry-form";

jQuery(".message-box-" +form_id).hide();
jQuery("#"+form_id+" .error").html(" ");  
    

        var s = $(this);       
        r.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
       
     // js validation 
// var   username = jQuery("#"+form_id+" #username").val(); 
//   if(username==''){        
//
//            jQuery("#"+form_id+ " #error_"+"username").html("Please enter name.");
//            jQuery("#"+form_id+ " #error_"+"username").show();
//            jQuery("#"+form_id+"  #username").focus();
//            jQuery("#"+form_id+"  #username").addClass('fld-error');         
//            return false;
//           
//      }
//
//  
//    var   email = jQuery("#"+form_id+" #email").val(); 
//   if(email==''){        
//
//            jQuery("#"+form_id+ " #error_"+"email").html("Please enter email.");
//            jQuery("#"+form_id+ " #error_"+"email").show();
//            jQuery("#"+form_id+"  #email").focus();
//            jQuery("#"+form_id+"  #email").addClass('fld-error');         
//            return false;
//           
//      }
//    if(IsEmail(email)==false){ 
//            jQuery("#"+form_id+ " #error_"+"email").html("Please enter valid email address.");
//            jQuery("#"+form_id+ " #error_"+"email").show();
//            jQuery("#"+form_id+" #email").focus();
//            jQuery("#"+form_id+" #email").addClass('fld-error');         
//            return false;     
//            
//    } 
//     var   userphone = jQuery("#"+form_id+" #userphone").val(); 
//   if(userphone==''){        
//
//            jQuery("#"+form_id+ " #error_"+"userphone").html("Please enter Phone.");
//            jQuery("#"+form_id+ " #error_"+"userphone").show();
//            jQuery("#"+form_id+"  #userphone").focus();
//            jQuery("#"+form_id+"  #userphone").addClass('fld-error');         
//            return false;
//           
//      }
//
//    var   userstate = jQuery("#"+form_id+" #userstate").val(); 
//   if(userstate==''){        
//
//            jQuery("#"+form_id+ " #error_"+"userstate").html("Please enter state.");
//            jQuery("#"+form_id+ " #error_"+"userstate").show();
//            jQuery("#"+form_id+"  #userstate").focus();
//            jQuery("#"+form_id+"  #userstate").addClass('fld-error');         
//            return false;
//           
//      }
//
//    var   usercity = jQuery("#"+form_id+" #usercity").val(); 
//   if(usercity==''){        
//
//            jQuery("#"+form_id+ " #error_"+"usercity").html("Please enter city.");
//            jQuery("#"+form_id+ " #error_"+"usercity").show();
//            jQuery("#"+form_id+"  #usercity").focus();
//            jQuery("#"+form_id+"  #usercity").addClass('fld-error');         
//            return false;
//           
//      }
  $(this).prop("disabled", true); 
 // js validation  end 
       // ajax
             jQuery.ajax({ 
             url: $("#" + form_id).attr("action"),
             type: 'POST',
             data: $("#" + form_id).serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery("#submit-btn-"+form_id).attr('disabled'); 
              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                              
                                jQuery(".message-box-" + form_id).html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-" + form_id).show(); 
                                jQuery("#submit-btn-"+form_id).removeAttr('disabled'); 
                               jQuery('#load-img-'+form_id).hide();  
                               jQuery("#"+form_id+" .form-control").val("");  
               
             },
              error: function(e) {
                 jQuery('#submit-btn-'+form_id).removeAttr('disabled');
                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( "#"+form_id+ " #error_"+e).html(a);
                            $("#"+form_id+  " #" + e).addClass('fld-error');  
                             $("#"+form_id+  " #" + e).focus();            
                             

                        })  
                    },
           });
            //grecaptcha.reset();
            return false;
   }
    })
    
 $('.submitcc').click(function(r){

   r.preventDefault();
   $('#complaint-form').validate({
    rules:{
      name: {
                lettersonly: true,
                required: true,
            },
      address: {
                addressonly: true,
                required: true,
            },
      state:'required',
      message: {
            lettersonly: true,
            required: true,
        },
      mobile:{
          matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
        required:true,
        minlength:10,
        number:true,
        maxlength:10
       },
      email:{
        required:true,
        email:true
      }
    },
    messages:{
      
    name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
      address:{
        required: "Please enter address",
        lettersonly:"Please Letters and spaces only",
        },
      state:'Please enter state',
      message:{
        required: "Please enter message",
        lettersonly:"Please Letters and spaces only",
        },
      mobile:{
        matches:'Please enter correct number',
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });


   if($('#complaint-form').valid()){
       
//       grecaptcha.render('g-recaptcha', {
//          'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
//        });
       
     
       
       var CaptchaCallback1 = function() {
    if ( $('#complaint_recaptcha').length ) {
        grecaptcha.render(document.getElementById('complaint_recaptcha'), {'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
        });
    }
};
      
       
         if(grecaptcha.getResponse(0) == "") {
           //  alert("captcha is required");
             jQuery(".error-cc").html("Captcha is required").delay(5000).fadeOut();
             jQuery(".error-cc").show(); 
             grecaptcha.reset();
             return false;
             
             
         }else{
//     $('#complaint-form').serializeArray().forEach(function(item,index){
//           arr[item.name] = item.value ;
//       });
//     console.log(arr)
//   }
//        var s = $(this);       
//        r.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
         $(this).prop("disabled", true); 
       // ajax
             jQuery.ajax({ 
             url: $("#complaint-form").attr("action"),
             type: 'POST',
             data: $("#complaint-form").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery("#submit-btn-complaint-form").attr('disabled','disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                               jQuery("#complaint-form .form-control").val("");  
                                jQuery(".message-box-cc").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-cc").show(); 
                                jQuery(".submitcc").removeAttr('disabled'); 
                 setTimeout(function(){ jQuery(".close").click(); }, 3000); 
//                               jQuery('#load-img-'+form_id).hide();  

               
             },
              error: function(e) {
                 jQuery('.submitcc').removeAttr('disabled');
//                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( ".submitcc #error_"+e).html(a);            
                             

                        })  
                    },
           });
//            grecaptcha.reset();
            return false;
         }
   }
   
    });
 
 $('.submitcca').click(function(r){
   r.preventDefault();
   $('#complaint-forma').validate({
    rules:{
      name: {
                lettersonly: true,
                required: true,
            },
      address: {
            addressonly: true,
            required: true,
        },
      state:'required',
      message: {
            lettersonly: true,
            required: true,
        },

      mobile:{
          matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
        required:true,
        minlength:10,
        number:true,
        maxlength:10
       },
      email:{
        required:true,
        email:true
      }
    },
    messages:{
     name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
       address:{
        required: "Please enter address",
        lettersonly:"Please Letters and spaces only",
        },
      state:'Please enter state',
       message:{
        required: "Please enter message",
        lettersonly:"Please Letters and spaces only",
        },
      mobile:{
        matches:'Please enter correct number',
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });
 
   if($('#complaint-forma').valid()){
       
//         alert($('#reachhead_recaptcha').length);
       
             var CaptchaCallback12 = function() {
    if ( $('#reachhead_recaptcha').length ) {
        grecaptcha.render(document.getElementById('reachhead_recaptcha'), {'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
        });
    }
};
       
       
         if(grecaptcha.getResponse(1) == "") {
           //  alert("captcha is required");
             jQuery(".error-cc").html("Captcha is required").delay(5000).fadeOut();
             jQuery(".error-cc").show(); 
             grecaptcha.reset();
             return false;
             
             
         }else{
             
            $( ".gerror").html(''); 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
         $(this).prop("disabled", true); 
       // ajax
             jQuery.ajax({ 
             url: $("#complaint-forma").attr("action"),
             type: 'POST',
             data: $("#complaint-forma").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery(".submitcca").attr('disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                              
                                jQuery(".message-box-cca").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-cca").show(); 
                                jQuery(".submitcca").removeAttr('disabled'); 
//                               jQuery('#load-img-'+form_id).hide();  
                                jQuery("#complaint-forma .form-control").val("");  
                 setTimeout(function(){ jQuery(".close").click(); }, 3000); 
               
             },
              error: function(e) {
                 jQuery('.submitcca').removeAttr('disabled');
//                 jQuery('#load-img-'+form_id).hide();  

                        var a = JSON.parse(e.responseText);                
                        jQuery.each(a, function(e, a) {
                          // alert(a);
                           //alert(e);

                            $( ".submitcca #error_"+e).html(a);            
                             

                        })  
                    },
           });
       
//       }else{
//          $( ".gerror").html('reCAPTCHA Required'); 
//           return false;
//       }
//            grecaptcha.reset();
            return false;
   }
   }
    })
 $('.submitexpert').click(function(r){
   r.preventDefault();
   $('#consult-form').validate({
    rules:{
        name: {
                lettersonly: true,
                required: true,
            },
      type:'required',
      state:'required',
       message: {
            lettersonly: true,
            required: true,
        },

 
      mobile:{
          matches: "([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})",
        required:true,
        minlength:10,
        number:true,
        maxlength:10
       },
      email:{
        required:true,
        email:true
      }
    },
    messages:{
        name:{
        required: "Please enter your name",
        lettersonly:"Please Letters and spaces only",
        },
      type:'Please select Type',
      state:'Please enter state',
        message:{
        required: "Please enter message",
        lettersonly:"Please Letters and spaces only",
        },
      mobile:{
        matches:'Please enter correct number',
        required:'Please enter 10 digit number',
        minlength:'Mobile number must be 10 digit',
        number:'Please enter numbewr from 0-9',
        maxlength:'Mobile number not more than 10 digit'

      },
      email:{
        required:'Please enter email',
        email:"Please enter a valid email address"
      },
    }

   });
 
   if($('#consult-form').valid()){
       
//        var googleResponse = $('#g-recaptcha-response').val();
//alert(googleResponse);
//     $('#complaint-forma').serializeArray().forEach(function(item,index){
//           arr[item.name] = item.value ;
//       });
//     console.log(arr)
//   }
//
//        var s = $(this);       
//        r.preventDefault();
       //if(grecaptcha && grecaptcha.getResponse().length > 0){
        
             var CaptchaCallback = function() {
    if ( $('#consult_recaptcha').length ) {
        grecaptcha.render(document.getElementById('consult_recaptcha'), {'sitekey' : '6LfaA1EbAAAAAKaG2OLA0sRTMN1oBfeOowXmYwLJ'
        });
    }
};
       
         if(grecaptcha.getResponse(2) == "") {
           //  alert("captcha is required");
             jQuery(".error-cc").html("Captcha is required").delay(5000).fadeOut();
             jQuery(".error-cc").show(); 
             grecaptcha.reset();
             return false;
             
             
         }else{
             
            $( ".gerror").html(''); 
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
         $(this).prop("disabled", true); 
       // ajax
             jQuery.ajax({ 
             url: $("#consult-form").attr("action"),
             type: 'POST',
             data: $("#consult-form").serialize(),
              dataType: "json",
             enctype: 'multipart/form-data',
             processData: false,
             beforeSend: function(){              

              jQuery(".submitexpert").attr('disabled'); 
//              jQuery("#load-img-"+form_id).show(); 

            },
             success: function (response) {         
                                //jsonObj = JSON.parse(response);
                              
                                jQuery(".message-box-expert").html(response.message).delay(5000).fadeOut();
                                jQuery(".message-box-expert").show(); 
                                jQuery(".submitexpert").removeAttr('disabled'); 
//                               jQuery('#load-img-'+form_id).hide();  
                                jQuery("#consult-form .form-control").val(""); 
                 setTimeout(function(){ jQuery(".close").click(); }, 3000); 
               
             },
              error: function(e) {
                 jQuery('.submitexpert').removeAttr('disabled');
//                 jQuery('#load-img-'+form_id).hide();  

                  jQuery(".message-box-expert").show(); 
                          jQuery(".message-box-expert").html("<div class='error'>The given data was invalid.</div>").delay(5000).fadeOut();         
                             
                    },
           });
       
//       }else{
//          $( ".gerror").html('reCAPTCHA Required'); 
//           return false;
//       }
//            grecaptcha.reset();
            return false;
   }
   }
    })
</script>
    <script>
     var urla = "<?php echo e(url('/')); ?>/getstate";//should return json with a list of cities only   
         $.ajax({
        url:urla,
        dataType:'html',
        success: function(items){
            $('.userstate').html(items);
             $('.userstate').change(function(){
                var url = "<?php echo e(url('/')); ?>/getcity";//should return json with a list of cities only
                var std = $(this).find(':selected').data('id');
            //    alert(std);
                var data = {'state':std};
                $.ajax({
                    url:url,
                    data:data,
                    dataType:'html',
                    success: function(items){
                         $('.usercity').html(items);
                    }
                })
            }).change();
        }
    })
        
        
 $('.userstate').change(function(){
    var url = "<?php echo e(url('/')); ?>/getcity";//should return json with a list of cities only
    var std = $(this).find(':selected').data('id');
//    alert(std);
    var data = {'state':std};
    $.ajax({
        url:url,
        data:data,
        dataType:'html',
        success: function(items){
             $('.usercity').html(items);
        }
    })
});

        /*
//        
//     $(document).ready(function() {
//            // Called the function in each second
//            var interval = setInterval(function() {
//                 var number = parseInt($('.count').text(), 10) || 0;
//                $('.count').text(number+3); // Update the value in paragraph
//
////                if (number > 1000) {
////                    clearInterval(interval); // If exceeded 100, clear interval
////                }
//            }, 120000); // Run for each second
//        });
//        
        
   */

        
        $("#suggesstion-box").hide();
                $(document).ready(function(){
            $("#search-box").keyup(function(){
                
                 $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
                if($(this).val()==''){
                    $("#suggesstion-box").hide();
                    return false;
                }
                $.ajax({
                type: "POST",
                url: "<?php echo e(url('/search-auto-data')); ?>",
//                data:'keyword='+$(this).val(),
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "keyword": $(this).val()
                },
                dataType:'html',
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(<?php echo e(url('images/LoaderIcon.gif')); ?>) no-repeat 165px");
                },
                success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");
                }
                });
            });
        });
   
        
        
     function AddReadMore() {
    //This limit you can set after how much characters you want to show Read More.
    var carLmt = 150;
    // Text to show when text is collapsed
    var readMoreTxt = " ... Read More";
    // Text to show when text is expanded
    var readLessTxt = " Read Less";


    //Traverse all selectors with this class and manupulate HTML part to show Read More
    $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
            return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
        }

    });
    //Read More and Read Less Click Event binding
    $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
$(function() {
    //Calling function after Page Load
    AddReadMore();
});
        
        
function get_enter_web_traffic(){
    var data = { "_token": "<?php echo e(csrf_token()); ?>",'action' : 'enter'}; 
    $.post('<?php echo e(url("ajax_user_count")); ?>',data,function(response){
        $('.count').html(response); // website hit count
    }); 
}
        
 get_enter_web_traffic();       
</script>

<?php if(date('H:i:s') >= '10:00:00' and '18:00:00' >= date('H:i:s')  ): ?>

<script>
     $(document).ready(function(){
            
            setInterval(function(){ 
                get_enter_web_traffic();
            }, 60000);

        });

    
    
</script>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\fenestalive\FenestaWebsite\resources\views/frontend/_partials/footer.blade.php ENDPATH**/ ?>