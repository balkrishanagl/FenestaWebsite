<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial;
use App\Models\WindowdoorType;
use App\Models\FeatureBenefit;
use App\Models\WindowType;
use App\Models\WindowdoorByapplication;
use App\Models\Cmspage;
use App\Models\Page;
use App\Models\Setting;
use App\Models\PageMeta;
use App\Models\EnquiriesModel;
use App\Models\Serie;
use View;
use PDF;
use \DOMDocument;
class AjaxController extends Controller
{
    
	public function __construct(){
    
        $logo = Setting::where('key','logo')->first()->value;
        $facebook = Setting::where('key','facebook')->first()->value;
        $twitter = Setting::where('key','twitter')->first()->value;
        $insta = Setting::where('key','insta')->first()->value;
        $youtube = Setting::where('key','youtube')->first()->value;
        $linkedin = Setting::where('key','linkedin')->first()->value;
        $copyright = Setting::where('key','copyright')->first()->value;
        $playstore = Setting::where('key','playstore')->first()->value;
        $appstore = Setting::where('key','appstore')->first()->value;
        $subscribetitle = Setting::where('key','subscribetitle')->first()->value;
        $headerphoneno = Setting::where('key','headerphoneno')->first()->value;
        
        $datasettings = array(
                        'logo'=>$logo,
                        'facebook'=>$facebook,
                        'twitter'=>$twitter,
                        'insta'=>$insta,
                        'youtube'=>$youtube,
                        'linkedin'=>$linkedin,
                        'copyright'=>$copyright,
                        'playstore'=>$playstore,
                        'appstore'=>$appstore,
                        'subscribetitle' => $subscribetitle,
                        'headerphoneno' => $headerphoneno
        );

        $uri_seg = request()->segment(1);
        $uri_seg2 = request()->segment(2);
        if(!empty($uri_seg2)){
        
              $uridata = Cmspage::where('page_slug', $uri_seg2)->where('is_delete','0')->first();
               if(empty($uridata)){
                  $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->first();
                 $pp_ss = 'page-'.$uridata->id;
              }else{
                    $pp_ss = 'page-'.$uridata->id;
               }
         
        }else{
        $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->first();
            if(!empty($uridata)){
        $pp_ss = 'page-'.$uridata->id;
            }else{
              $pp_ss = '';  
            }
            
        }
        $appreciations = DB::table('appreciations')
                     ->select()->where('is_delete','0')->where('status','Active')
                     ->get();
        
        if(!empty($pp_ss)){
        $faqs = DB::table('faqs')
                ->select()->where('is_delete','0')->where('status','Active')->where('page',$pp_ss)
                ->get();    
        $relatedblog = DB::table('blog_page')->select()->where('status','Active')->where('page',$pp_ss)
                ->limit(3)->get();
        }else{
          $relatedblog = array();  
          $faqs = DB::table('faqs')
                ->select()->where('is_delete','0')->where('status','Active')->where('page','0')
                ->get();
            
        }
        view::share('datasettings', $datasettings);
        view::share('appreciations', $appreciations);
        view::share('relatedblog', $relatedblog);
        view::share('faqs', $faqs);
    }
    
    
    public function index(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->page;
     if(!empty($request->region_id)){
     $zonewise = implode(',',$request->region_id);
     }else{
      $zonewise = '';   
     }
     if(!empty($request->type_id)){
     $seg = implode(',',$request->type_id);
     }else{
          $seg = '';
     }
    if($id==21){
        if(!empty($zonewise) and !empty($seg)){
            $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'gallery' AND `is_delete` = '0' AND `showon` = 'page-21' AND ( `zonewise` IN ($zonewise)  OR `segtype` IN ($seg) )");
        }
        if(empty($zonewise) and !empty($seg)){
              $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'gallery' AND `is_delete` = '0' AND `showon` = 'page-21' AND `segtype` IN ($seg)");
        }
        if(!empty($zonewise) and empty($seg)){
              $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'gallery' AND `is_delete` = '0' AND `showon` = 'page-21' AND `zonewise` IN ($zonewise)");
        }
        if(empty($zonewise) and empty($seg)){
              $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'gallery' AND `is_delete` = '0' AND `showon` = 'page-21'");
        }
       
    }else{
        if(!empty($zonewise) and !empty($seg)){
            $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'clientele' AND `is_delete` = '0' AND `showon` = 'page-21' AND ( `zonewise` IN ($zonewise)  OR `segtype` IN ($seg) )");
        }
        if(empty($zonewise) and !empty($seg)){
              $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'clientele' AND `is_delete` = '0' AND `showon` = 'page-21' AND `segtype` IN ($seg)");
        }
        if(!empty($zonewise) and empty($seg)){
              $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'clientele' AND `is_delete` = '0' AND `showon` = 'page-21' AND `zonewise` IN ($zonewise)");
        }
        if(empty($zonewise) and empty($seg)){
              $result =  DB::select("SELECT * FROM `gallery_images` WHERE `type` = 'clientele' AND `is_delete` = '0' AND `showon` = 'page-21'");
        }
        
       
    }
     foreach($result as $gg){
?>
            <li  style="display:list-item">
                  <div class="image"><img src="<?=url('/')?>/images/gallery_images/<?=$gg->image?>"></div>
               <?php if($id==21){ ?> <h6><?=$gg->heading?></h6>  <?php } ?>
                </li>
<?php }
    
    }
    
    public function getlocateusstudio(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        
        $showrooms = DB::table('showrooms')->where('state',$id)->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    public function getlocateuscitystudio(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        
        $showroomsql = DB::table('showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    
    public function getlocateusblockstudio(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        $block = $request->block;
        
        $showroomsql = DB::table('showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
        if(!empty($block)){
        $showrooms = $showroomsql->where('locality',$block);
        }
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    
    public function getlocateuspartner(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        
        $showrooms = DB::table('partner_showrooms')->where('state',$id)->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    public function getlocateuscitypartner(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        
        $showroomsql = DB::table('partner_showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    
    public function getlocateusblockpartner(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        $block = $request->block;
        
        $showroomsql = DB::table('partner_showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
        if(!empty($block)){
        $showrooms = $showroomsql->where('locality',$block);
        }
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    public function getlocateusoffice(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        
        $showrooms = DB::table('offices')->where('state',$id)->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    public function getlocateuscityoffice(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        
        $showroomsql = DB::table('offices')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$sroom->dealer_name?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    
    public function getlocateusblockoffice(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        $block = $request->block;
//        echo $id."<br>".$city."<br>".$block;
//        die;
        $type_officce = array(1=>'Head Office',2=>'Sales Office and Installation Service',3=>'Extrusion Factory',4=>'Fabrication Factories');
        
        $showroomsql = DB::table('offices')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('state',$id)->where('city',$city);
        }
        if(!empty($block)){
        $showrooms = $showroomsql->where('city',$city)->where('state',$id)->where('type',$block);
        }
//        echo "<pre>";
//        print_r($showrooms);
//        die;
         ?>
					<div class="address-list-slider owl-carousel">
    <?php   
        foreach($showrooms as $sroom){
     ?>
       
                        
						<div class="lu_item">
							<div class="head">
								<h4><img src="<?=asset('images/site_images/images/right-arrow.png')?>" alt=""><?=$sroom->city?></h4>
								<h3><?=$type_officce[$sroom->type]?></h3>
							</div>
							<ul class="lu_list">
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/user.png')?>" alt="">
									</div>
									<strong>Contact Person: </strong>
									<?=$sroom->contact_person?>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/gps.png')?>" alt="">
									</div>
									<strong><?=$sroom->locality?></strong>
									<p><?=$sroom->address?> , <?=$sroom->state?></p>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/email.png')?>" alt="">
									</div>
									<strong>EMAIL ID : </strong>
									<a href="mailto:<?=$sroom->email?>"><?=$sroom->email?></a>
								</li>
								<li>
									<div class="icon">
										<img src="<?=asset('images/site_images/images/locate/phone.png')?>" alt="">
									</div>
									<strong>Toll Free Number : </strong>
									<a href="tel:<?=$sroom->phone?>"><?=$sroom->phone?></a>
								</li>
							</ul>
						</div>
                        
                        <?php } ?> </div><?php  }
    
    public function getlocateusofficehome(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        if(empty($id)){
                 $showrooms = DB::table('partner_showrooms')->where('is_delete','0')->where('country','India')->where('status','Active')->orderBy('id','DESC')->get()->take(5);
        }else{
        $showrooms = DB::table('partner_showrooms')->where('state',$id)->where('is_delete','0')->where('country','India')->where('status','Active')->orderBy('id','DESC')->get();
        }
         ?>
					
          <div class="address-slider owl-carousel">
    <?php   
        foreach($showrooms as $ps){
     ?>
       
                        

            <div class="item">
              <div class="address">
                <div class="image"><img src="<?=asset('images/site_images/loc-icon.png') ?>"></div>
                <div class="right">
                  <h6><?=$ps->city?></h6>
                  <p><?=$ps->address?></p>
                </div>
              </div>
              <div class="email">
                <div class="image"><img src="<?=asset('images/site_images/email.png') ?>"></div>
                <div class="right">
                  <a href="mailto:<?=$ps->email?>"><?=$ps->email?></a>
                </div>
              </div>
              <div class="phone">
                <div class="image"><img src="<?=asset('images/site_images/call-icon.png') ?>"></div>
                <div class="right">
                  <a href="tel:<?=$ps->phone?>"><?=$ps->phone?></a>
                </div>
              </div>
            </div>

                        
                        <?php } ?> </div><?php  }
    
    public function getlocateuscityofficehome(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        
        $showroomsql = DB::table('partner_showrooms')->where('is_delete','0')->where('status','Active')->where('country','India')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
         ?>
					<div class="address-slider owl-carousel">
    <?php   
        foreach($showrooms as $ps){
     ?>
       
                        
            <div class="item">
              <div class="address">
                <div class="image"><img src="<?=asset('images/site_images/loc-icon.png') ?>"></div>
                <div class="right">
                  <h6><?=$ps->city?></h6>
                  <p><?=$ps->address?></p>
                </div>
              </div>
              <div class="email">
                <div class="image"><img src="<?=asset('images/site_images/email.png') ?>"></div>
                <div class="right">
                  <a href="mailto:<?=$ps->email?>"><?=$ps->email?></a>
                </div>
              </div>
              <div class="phone">
                <div class="image"><img src="<?=asset('images/site_images/call-icon.png') ?>"></div>
                <div class="right">
                  <a href="tel:<?=$ps->phone?>"><?=$ps->phone?></a>
                </div>
              </div>
            </div>

                        
                        <?php } ?> </div><?php  }
    
    
    public function getlocateusblockofficehome(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        $block = $request->block;
        $type_officce = array(1=>'Head Office',2=>'Sales Office and Installation Service',3=>'Extrusion Factory',4=>'Fabrication Factories');
        
        $showroomsql = DB::table('partner_showrooms')->where('is_delete','0')->where('status','Active')->where('country','India')->orderBy('id','DESC')->get();
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }
//        if(!empty($block)){
//        $showrooms = $showroomsql->where('type',$block);
//        }
         ?>
					<div class="address-slider owl-carousel">
    <?php   
        foreach($showrooms as $ps){
     ?>
       
                        
                        
            <div class="item">
              <div class="address">
                <div class="image"><img src="<?=asset('images/site_images/loc-icon.png') ?>"></div>
                <div class="right">
                  <h6><?=$ps->city?></h6>
                  <p><?=$ps->address?></p>
                </div>
              </div>
              <div class="email">
                <div class="image"><img src="<?=asset('images/site_images/email.png') ?>"></div>
                <div class="right">
                  <a href="mailto:<?=$ps->email?>"><?=$ps->email?></a>
                </div>
              </div>
              <div class="phone">
                <div class="image"><img src="<?=asset('images/site_images/call-icon.png') ?>"></div>
                <div class="right">
                  <a href="tel:<?=$ps->phone?>"><?=$ps->phone?></a>
                </div>
              </div>
            </div>

                       
                        
                        <?php } ?> </div><?php  }
    public function getvideo(Request $request ) {         
//print_r($request->all());
//    die;
        $id = $request->state;
        $city = $request->city;
        
        $showroomsql = DB::table('testimonials')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
        if(!empty($id)){
        $showrooms = $showroomsql->where('state',$id);
        }
        if(!empty($city)){
        $showrooms = $showroomsql->where('city',$city);
        }

         ?>
   <div class=" video-slider owl-carousel">
    <?php   
        foreach($showrooms as $ps){
     ?>
       
                    <div class="item">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$ps->youtube_url?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>     
                        <?php } ?> 
</div>

<?php  }
    
    
    public function submit_brochure(Request $request) {
       
        
                $this->validate($request, [                
                'email' => 'required|email',          
                'username' => 'required',         
                'userphone' => 'required',          
                'brochure_id' => 'required',          
                
            ]);  

             $response_array=array();
             $response_array['status']='0';
             $response_array['message']='Some error!';
            try
              { 

                $post_array=array();
                $post_array['email']=strip_tags($request->email);
                $post_array['contactno']=$request->userphone;
                $post_array['name']=$request->username;
                $post_array['brochure_id']=$request->brochure_id;
                $post_array['ip']=$_SERVER['REMOTE_ADDR'];
                $post_array['type']='Brochureenquiry';
                
                $bro = DB::table('brochures')
                ->select()->where('is_delete','0')->where('status','Active')->where('id',$request->brochure_id)
                ->first();
                
                    $save=EnquiriesModel::create($post_array); 
                        if($save->id){
                            
                             $details = [
                                    'title' => "Admin",
                                    'body' => "A New User has been downloaded the Brochure. <br> Following are the details : <br> <br> 
                                    Name  : ".$post_array['name'].", <br> 
                                    Contactno  : ".$post_array['contactno'].", <br> 
                                    Email  : ".$post_array['email'].", <br> 
                                    Brochure : ".$bro->title." , <br>  <br> 
                                    Contact with user as soon as possible.
                                     <br> 
                                    "
                                ];

                                Mail::to("ankita.gaba@adglobal360.com")->send(new \App\Mail\MyTestMail($details));


                            
//                        $filePath = public_path()."/images/brochure/".$bro->pdf;
//                        $headers = ['Content-Type: application/pdf'];
//                        $fileName = time().'.pdf';
//                        response()->download($filePath, $fileName, $headers);
                            
                            $response_array['status']='1';
                            $response_array['pdf']=$bro->pdf;
                            $response_array['message']='Thank You !!';
                           
                     
                   }
              }
              catch(\Exception $e)
              { 

                            //$response_array['message']="Unable to submit your request. Please check form field values and try again!";
                            $response_array['message']=$e->getMessage();
                          
                
              }


              return response()->json($response_array,200);           
        

    	
    }
    
    
    
   public function send_otp_whatsapp($phone) {
                        $curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.trilyo.com/api/v2/whatsApp/whatsappOTP",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>"{\n   \"message\": {\n     \"to\": \"$phone\",\n     \"options\": {\n     \t\"digits\" : 4\n     },\n     \"buttons\":[]\n   }\n}",
			  CURLOPT_HTTPHEADER => array(
				"x-app-id: a928638ed8dd488b8594b9727d45b453",
				"x-api-key: cfb45bde-4444-43ed-86d1-31e5b7a4619b",
				"Content-Type: application/json",
				"Content-Type: application/json"
			  ),
			));

			$response = curl_exec($curl);
                        /*if (curl_errno($curl)) {
				$error_msg = curl_error($curl);
                                 echo $error_msg; die;
			}*/
			curl_close($curl);
			$return_data =  json_decode($response, true);
		   if($return_data['status'] == 'success'){
			   $otp = $return_data['otp'];
			   return $otp;
		   }else{
			   return false;
		   }
	}
    
    
    public function detectDevice(){
          $userAgent = $_SERVER["HTTP_USER_AGENT"];
          $devicesTypes = array(
                "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
                "tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
                "mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
                "bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
            );
          foreach($devicesTypes as $deviceType => $devices) {           
                foreach($devices as $device) {
                    if(preg_match("/" . $device . "/i", $userAgent)) {
                        $deviceName = $deviceType;
                    }
                }
            }
            return ucfirst($deviceName);
    }
    public function submit_enquiry_now(Request $request) {
       
                $this->validate($request, [                
                'txt_email' => 'required',          
                'txt_name' => 'required',         
                'txt_telephoneno' => 'required',              
                'state_tags' => 'required',              
                'txt_cityFrom' => 'required',              
                
            ]);  

             $response_array=array();
             $response_array['status']='0';
             $response_array['message']='Some error!';
            try
              { 
              
                $browser_details = $request->header('User-Agent');
                $value_ed = $this->detectDevice();
                
              $result = DB::select("SELECT * FROM lp_leads where name='$_POST[txt_name]' AND email='$_POST[txt_email]' AND phone='$_POST[txt_telephoneno]' AND utm_source='$_POST[utm_source]' AND cur_time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
              $num_rows = count($result);
              if($num_rows> 0){
                $semail = trim($_POST['txt_email']);
                $response_array = array('msg'=>'duplicate');
                  
                   return response()->json($response_array,200);     
                  
              }else{
                  if($_POST && $_POST['txt_name'] !='' && $_POST['txt_telephoneno'] !='' && $_POST['txt_email'] !='' && empty($_POST['txt_OTP'])){
                        $randN = rand(1000,9999);
                        // Set timezone 
                        date_default_timezone_set('Asia/Kolkata'); 
                        $otp_timestamp = date('Y-m-d H:i:s');
                        $sql  =  "insert into lp_leads (name,phone,email,state,city,pincode,contact_form,other_city,lp_url,utm_source,utm_medium,utm_campaignname,utm_campaignid,utm_adgroupname,utm_adgroupid,utm_keyword,utm_website,utm_geo,utm_type,utm_adgroup,utm_creativeid,utm_ad_name,browser_details,device,OTP,publisher_id,c4c_lead_send,otp_timestamp) values ('$_POST[txt_name]','$_POST[txt_telephoneno]','$_POST[txt_email]','$_POST[state_tags]','$_POST[ddlcity]','-','-','$_POST[txt_cityFrom]','$_POST[lp_url]','$_POST[utm_source]','$_POST[utm_medium]','$_POST[utm_campaignname]','$_POST[utm_campaignid]','$_POST[utm_adgroupname]','$_POST[utm_adgroupid]','$_POST[utm_keyword]','$_POST[utm_website]','$_POST[utm_geo]','$_POST[utm_type]','$_POST[utm_adgroup]','$_POST[utm_creativeid]','$_POST[utm_ad_name]','$browser_details', '$value_ed','$randN','$_POST[publisher_id]','0','$otp_timestamp') ";
                        DB::insert($sql);
                        //echo $sql; die;
                        $lastInnserId = DB::getPdo()->lastInsertId();
                        if($lastInnserId){
//                            echo $lastInnserId;
//                            die;
                            $statusOurDB= "Form Data Inserted in our database successfully";
                            $toOtp =  $_POST["txt_telephoneno"];
                            $msgOtp = 'Your OTP (One Time Password) for submitting the inquiry is '.$randN;
                            $whatsapp_otp = 0;
                       if(isset($_POST['whatsapp']) && $_POST['whatsapp'] == 'true'){
                                $w_phone = '91'.$_POST['txt_telephoneno'];
                               $whatsapp_otp =  $this->send_otp_whatsapp($w_phone);
                            }
                            
                            if(!$whatsapp_otp){
                                // Send Email
//                                echo $whatsapp_otp;
//                                die;
                               
                                 $details = [
                                    'title' => "Admin",
                                    'body' => "A New Enquiry has been genrated from fenesta. <br> Following are the details : <br> <br> 
                                    Name  : ".$_POST['txt_name'].", <br> 
                                    Contactno  : ".$_POST['txt_telephoneno'].", <br> 
                                    Email  : ".$_POST['txt_email'].", <br> 
                                    State : ".$_POST['state_tags'].", <br> 
                                    City : ".$_POST['txt_cityFrom'].", <br> 
                                    Device : ".$value_ed.", <br> 
                                    <br> 
                                    Contact with user as soon as possible.
                                     <br> 
                                    "
                                ];
                            
                            
                                Mail::to("ankita.gaba@adglobal360.com")->send(new \App\Mail\MyTestMail($details));

                            $details1 = [
                                    'title' => $_POST['txt_name'],
                                    'body' => "Your enquiry has been successfully send to fenesta. <br> Following are the details : <br> <br> 
                                    Name  : ".$_POST['txt_name'].", <br> 
                                    Contactno  : ".$_POST['txt_telephoneno'].", <br> 
                                    Email  : ".$_POST['txt_email'].", <br> 
                                    State : ".$_POST['state_tags'].", <br> 
                                    City : ".$_POST['txt_cityFrom'].", <br> 
                                    <br> 
                                    We will connect with you soon.
                                     <br> 
                                    "
                                ];
                                Mail::to($_POST['txt_email'])->send(new \App\Mail\MyTestMail($details1));
                                


//                            $response_array['status']='1';
//                            $response_array['message']='Thank You ! Your Enquiry has been send.';
                           
                     
                                
                                
                            	$subject="Customer Enquiry - Campaign";
                            	 $name = trim($_POST['txt_name']);
                                 $semail = trim($_POST['txt_email']);
        	                    $contact_no =   trim($_POST['txt_telephoneno']);
        	                        $queries = trim($_POST['ddlcity']);
        	                    $fields = ['subject'=>urlencode($subject),'txt_name' => urlencode($name),'txt_email' => urlencode($semail),'txt_telephoneno' => urlencode($contact_no),'ddlContactFrom' => urlencode($queries)];
                            $url = 'http://ec2-54-254-234-40.ap-southeast-1.compute.amazonaws.com/fenesta_emailer.php';
                    		//open connection
                    		$ch = curl_init();
                    		curl_setopt($ch,CURLOPT_URL, $url);
                    		curl_setopt($ch,CURLOPT_POST, count($fields));
                    		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
                    		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5); 
                    		curl_setopt($ch,CURLOPT_TIMEOUT,5);	
                    		echo $result = curl_exec($ch);
                    		curl_close($ch);
                                //sent_otp($toOtp,$msgOtp);
                                
                                
                              
                                 $response_array = array('lId'=>'','msg'=>'SMS');
                                
                                 return response()->json($response_array,200); 
                                
                                
                            }else{
                                $updOtp = "update lp_leads set OTP = ".$whatsapp_otp." where id=".$lastInnserId;
                                $updRes = DB::update($updOtp);
                            
                                $response_array = array('lId'=>$lastInnserId,'msg'=>'OTP is sent successfully!');
                            
                            return response()->json($response_array,200);  
                            }
                        }else{
                            $statusOurDB= "Form Data not inserted in our database";
                            $response_array = array('lId'=>'','msg'=>$statusOurDB);
                            return response()->json($response_array,200);  
                        }
                  }
              }
          // remove all session variables
         // session_unset(); 
          // destroy the session 
      //    session_destroy(); 
                
                

//                $post_array=array();
//                $post_array['email']=strip_tags($request->email);
//                $post_array['contactno']=$request->mobile;
//                $post_array['name']=$request->name;
//                $post_array['state']=$request->state;
//                $post_array['city']=$request->city;
//                $post_array['type']='Enquiries';
//                $post_array['ip']=$_SERVER['REMOTE_ADDR'];
//                
//                
//                    $save=EnquiriesModel::create($post_array); 
//                        if($save->id){
//                             $details = [
//                                    'title' => "Admin",
//                                    'body' => "A New Enquiry has been genrated from fenesta. <br> Following are the details : <br> <br> 
//                                    Name  : ".$post_array['name'].", <br> 
//                                    Contactno  : ".$post_array['contactno'].", <br> 
//                                    Email  : ".$post_array['email'].", <br> 
//                                    State : ".$post_array['state'].", <br> 
//                                    City : ".$post_array['city'].", <br> 
//                                    IP : ".$post_array['ip'].", <br> 
//                                    <br> 
//                                    Contact with user as soon as possible.
//                                     <br> 
//                                    "
//                                ];
//                            
//                            
//                                Mail::to("ankita.gaba@adglobal360.com")->send(new \App\Mail\MyTestMail($details));
//
//                            $details1 = [
//                                    'title' => $post_array['name'],
//                                    'body' => "Your enquiry has been successfully send to fenesta. <br> Following are the details : <br> <br> 
//                                    Name  : ".$post_array['name'].", <br> 
//                                    Contactno  : ".$post_array['contactno'].", <br> 
//                                    Email  : ".$post_array['email'].", <br> 
//                                    State : ".$post_array['state'].", <br> 
//                                    City : ".$post_array['city'].", <br> 
//                                    <br> 
//                                    We will connect with you soon.
//                                     <br> 
//                                    "
//                                ];
//                                Mail::to($post_array['email'])->send(new \App\Mail\MyTestMail($details1));
//
//
//                            $response_array['status']='1';
//                            $response_array['message']='Thank You ! Your Enquiry has been send.';
//                           
//                     
//                   }
              }
              catch(\Exception $e)
              { 

                            //$response_array['message']="Unable to submit your request. Please check form field values and try again!";
                            $response_array['message']=$e->getMessage();
                          
                 return response()->json($response_array,200);     
              }


                   
        

    	
    }
    
    
    public function verify_otp(){
         $lId = $_POST['hdnLid'];
          $sqlCheckOtp = "select OTP from lp_leads where id=".$lId." and verifyOtp = '0'";
          $reees = DB::select($sqlCheckOtp);
       
//          $numres = $reees->toArray();
          if($reees[0]){
              if($reees[0]->OTP == $_POST['txt_OTP']){ // Match Otp
                   // $updWhats = "update lp_leads set whatsApp_verify = '1' where id=".$lId;
                               // $updRes = mysql_query($updWhats);
                   
                  
                  $updOtp = "update lp_leads set verifyOtp = '1',c4c_lead_send = '1' where id=".$lId;
                  $updRes = DB::update($updOtp);
                  
                  
                    $data   = [
                                'name' => $_POST['txt_name'],
                                'email' => $_POST['txt_email'],
                                'phone' => $_POST['txt_telephoneno']
                                ];
                     $Source = '40' ;
                    // if(create_xml($data,$Source)){
                    //         if(upload_file_over_ftp()){ 
                    //             $updOtp = "update lp_leads set verifyOtp = '1',c4c_lead_send = '1' where id=".$lId;
                    //             $updRes = mysql_query($updOtp);
                    //         }
                    // }
                    
                    $SourceCategory = '' ;
            		$SubCategory = '';
            		$domtree  = new DOMDocument('1.0', 'utf-8');
            		$domtree->formatOutput = true;
            		$root = $domtree->createElementNS('http://dcmsnet.com/WebEnquiryDetails', 'ns0:WebEnquiryDetails');
            		$domtree->appendChild($root);
            		$item = $domtree->createElement('EnquiryDetail');
            		$root->appendChild($item);
            		$item->appendChild($domtree->createElement('CustomerName',$data['name']));
            		$item->appendChild($domtree->createElement('EmailID',$data['email']));
            		$item->appendChild($domtree->createElement('Phone',$data['phone']));
            		$item->appendChild($domtree->createElement('Source',$Source));
            		$item->appendChild($domtree->createElement('SourceCategory',$SourceCategory));
            		$item->appendChild($domtree->createElement('SubCategory',$SubCategory));
                    $domtree->save("verifyweb_c4c.xml");
                    
                    $ftp_server = "103.231.213.54";
                    $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
                     $login = ftp_login($ftp_conn, "winmaker", "welcome@123");
                    $file = "verifyweb_c4c.xml";
                    $uploadFile = "/Windowmaker/Inbound/WM2CRM/"."WEB2C4C_".date('Y')."-".date('m')."-". date('d')."T".date('H')."_".date('i')."_". date('s').".xml"  ;
                  // upload file
//uncomment when live
                  /*      if (ftp_put($ftp_conn, $uploadFile, $file, FTP_ASCII))
                          {
                            $updOtp = "update lp_leads set verifyOtp = '1',c4c_lead_send = '1' where id=".$lId;
                            $updRes = DB::update($updOtp);
                            //echo "Successfully uploaded $uploadFile.";
                            //die();
                          }
                        else
                          {
                              
                          //echo "Error uploading $uploadFile.";
                          //die();
                          }
                  
                        ftp_close($ftp_conn);
                        
                          // txt file open and write 
                        $leadsqlCheckOtpdata = "select id,name, email, phone, city, cur_time from lp_leads where id=".$lId." and verifyOtp = '1'";
                        $txtlead = DB::select($leadsqlCheckOtpdata)[0];
//                        $txtlead = $txtresult->toArray();
                        $ftp_server_txt = "103.231.213.54";
                        $ftp_conntext = ftp_connect($ftp_server_txt) or die("Could not connect to $ftp_server");
                        $login = ftp_login($ftp_conntext, "winmaker", "welcome@123");
                        $filenametxt = "file.txt";
                        
                        $fh = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$filenametxt,"w");
                        $text = "";
                        $text .= str_pad('ExternalId', 10)."  ".str_pad('LeadId', 10 )."  ".str_pad('First Name', 10 )."  ".str_pad('Phone1', 10 )."  ".str_pad('Phone2', 10 )."  ".str_pad('Email Address', 10 )."  ".str_pad('City', 10 )."  ".str_pad('Requirement', 10 )."  ".str_pad('Source', 10 )."  ".str_pad('Received Date', 10 )."  ".str_pad('List Name', 10 )."\n";
                         $text .= str_pad($txtlead->id, 10)."  ".str_pad($txtlead->id, 10 )."  ".str_pad($txtlead->name, 10 )."  ".str_pad($txtlead->phone, 10 )."  ".str_pad('', 10 )."  ".str_pad($txtlead->email, 10 )."  ".str_pad($txtlead->city, 10 )."  ".str_pad('', 10 )."  ".str_pad($Source, 10 )."  ".str_pad($txtlead->cur_time, 10 )."  ".str_pad('Web Calling', 10 )."\n";
                        fwrite($fh, $text) or die("Could not write file!");
                        fclose($fh);
                        $uploadtxtFile = "/Windowmaker/Inbound/WM2CRM/BCMDEV_DCMDEV_Administrator/Automatic/OutboundCampaign/"."TXTWEBFILE2C4C_".date('Y')."-".date('m')."-". date('d')."T".date('H')."_".date('i')."_". date('s').".txt"  ;
                  
                        if (ftp_put($ftp_conntext, $uploadtxtFile, $filenametxt, FTP_ASCII))
                        {
                           
                         }
                       else
                          {
                              
                          
                           }
                        
                        ftp_close($ftp_conntext);
                        */
                    // Send Email
                    	$subject="Customer Enquiry - Campaign";
                    	 $name = trim($_POST['txt_name']);
                         $semail = trim($_POST['txt_email']);
	                    $contact_no =   trim($_POST['txt_telephoneno']);
	                        $queries = trim($_POST['ddlcity']);
	                    $fields = ['subject'=>urlencode($subject),'txt_name' => urlencode($name),'txt_email' => urlencode($semail),'txt_telephoneno' => urlencode($contact_no),'ddlContactFrom' => urlencode($queries)];
                    $url = 'http://ec2-54-254-234-40.ap-southeast-1.compute.amazonaws.com/fenesta_emailer.php';
            		//open connection
            		$ch = curl_init();
            		curl_setopt($ch,CURLOPT_URL, $url);
            		curl_setopt($ch,CURLOPT_POST, count($fields));
            		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5); 
            		curl_setopt($ch,CURLOPT_TIMEOUT,5);	
            		echo $result = curl_exec($ch);
            		curl_close($ch);
                    
                     $whatsapp_status = 0;
                       if(isset($_POST['whatsapp']) && $_POST['whatsapp'] == 'true'){
                                $w_phone = '91'.$_POST['txt_telephoneno'];
                                $w_name = $_POST['txt_name'];
                                $template = 'webform_inquiry';
                               $whatsapp_status =  $this->send_whatsapp($w_phone,$w_name,$template);
                            }
                            if(!$whatsapp_status){
                                $to = $_POST["txt_telephoneno"];
                                $msg = "Thank you for enquiring with Fenesta - India's No.1 Windows and Doors brand. Our team will soon contact you from 0124-4518150";
                                $this->sent_otp($to,$msg);
                            }
                    $_POST = [];
                    $response_array = array('msg'=>'OTP success');
              }else{
                   $response_array = array('lId'=>$lId,'msg'=>'OTP is incorrect'); 
              }
          }
        return response()->json($response_array,200);        
    }
    
    
   public function sent_otp($toOtp,$msg){
      $from = 'FENSTA';
      $cUrlOtp = "http://www.myvaluefirst.com/smpp/sendsms?username=adglobal360&password=global0210h&to=" . $toOtp . "&from=" . $from . "&text=" . urlencode($msg) . "&dlr-url=&category=bulk";
      $chOtp = curl_init();
      curl_setopt($chOtp, CURLOPT_URL, $cUrlOtp);
      curl_setopt($chOtp, CURLOPT_RETURNTRANSFER, true);
	   $responseOtp = curl_exec($chOtp); 
	   return $responseOtp;
    }
  public function send_whatsapp($phone,$name,$template){
     $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.trilyo.com/api/v2/whatsApp/whatsappHSM",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\n   \"message\": {\n     \"to\": \"$phone\",\n     \"parameters\": [\n         \"$name\"\n      ],\n      \"templateName\": \"webform_inquiry\",\n      \"buttons\" : []\n   }\n}",
          CURLOPT_HTTPHEADER => array(
            "x-app-id: a928638ed8dd488b8594b9727d45b453",
            "x-api-key: cfb45bde-4444-43ed-86d1-31e5b7a4619b",
            "Content-Type: application/json",
            "Content-Type: application/json"
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
       $return_data =  json_decode($response, true);
       if($return_data['status'] == 'success'){
           return true;
       }else{
           return false;
       }
    }
    public function resend_otp(){
         $hdnLidRsnd =$_POST['hdnLidRsnd'];
	       $toOtp =  $_POST["txtNumberRsnd"];
	         $randN = rand(1000,9999);
	       $msgOtp = 'Your OTP (One Time Password) for submitting the inquiry is '.$randN;
    	   if($this->sent_otp($toOtp,$msgOtp)){
    	        $updOtpRsnd = "update lp_leads set OTP = ".$randN." where id=".$hdnLidRsnd;
                $updResnd = DB::update($updOtpRsnd);
//                if($updResnd){
                  $response_array = array('lId'=>$hdnLidRsnd,'msg'=>'OTP is sent successfully!');
//                }else{
//                 $response_array = array('lId'=>$hdnLidRsnd,'msg'=>'OTP not sent!'); 
//                }
    	   }
        return response()->json($response_array,200);        
    }
    public function submit_enquiry(Request $request) {
       
                $this->validate($request, [                
                'email' => 'required',          
                'name' => 'required',         
                'mobile' => 'required',              
                'state' => 'required',              
                'city' => 'required',              
                
            ]);  

             $response_array=array();
             $response_array['status']='0';
             $response_array['message']='Some error!';
            try
              { 

                $post_array=array();
                $post_array['email']=strip_tags($request->email);
                $post_array['contactno']=$request->mobile;
                $post_array['name']=$request->name;
                $post_array['state']=$request->state;
                $post_array['city']=$request->city;
                $post_array['type']='Enquiries';
                $post_array['ip']=$_SERVER['REMOTE_ADDR'];
                
                
                    $save=EnquiriesModel::create($post_array); 
                        if($save->id){
                             $details = [
                                    'title' => "Admin",
                                    'body' => "A New Enquiry has been genrated from fenesta. <br> Following are the details : <br> <br> 
                                    Name  : ".$post_array['name'].", <br> 
                                    Contactno  : ".$post_array['contactno'].", <br> 
                                    Email  : ".$post_array['email'].", <br> 
                                    State : ".$post_array['state'].", <br> 
                                    City : ".$post_array['city'].", <br> 
                                    IP : ".$post_array['ip'].", <br> 
                                    <br> 
                                    Contact with user as soon as possible.
                                     <br> 
                                    "
                                ];
                            
                            
                                Mail::to("ankita.gaba@adglobal360.com")->send(new \App\Mail\MyTestMail($details));

                            $details1 = [
                                    'title' => $post_array['name'],
                                    'body' => "Your enquiry has been successfully send to fenesta. <br> Following are the details : <br> <br> 
                                    Name  : ".$post_array['name'].", <br> 
                                    Contactno  : ".$post_array['contactno'].", <br> 
                                    Email  : ".$post_array['email'].", <br> 
                                    State : ".$post_array['state'].", <br> 
                                    City : ".$post_array['city'].", <br> 
                                    <br> 
                                    We will connect with you soon.
                                     <br> 
                                    "
                                ];
                                Mail::to($post_array['email'])->send(new \App\Mail\MyTestMail($details1));


                            $response_array['status']='1';
                            $response_array['message']='Thank You ! Your Enquiry has been send.';
                           
                     
                   }
              }
              catch(\Exception $e)
              { 

                            //$response_array['message']="Unable to submit your request. Please check form field values and try again!";
                            $response_array['message']=$e->getMessage();
                          
                
              }


              return response()->json($response_array,200);           
        

    	
    }
    
    
    public function submit_complaint(Request $request) {
       
                $this->validate($request, [                
                'type' => 'required',          
                'name' => 'required',          
                'mobile' => 'required',         
                'email' => 'required',              
//                'address' => 'required',              
                'state' => 'required',              
                'city' => 'required',              
                'message' => 'required',              
                
            ]);  

             $response_array=array();
             $response_array['status']='0';
             $response_array['message']='Some error!';
            try
              { 

                $post_array=array();
                $post_array['email']=strip_tags($request->email);
                $post_array['contactno']=$request->mobile;
                $post_array['name']=$request->name;
                $post_array['state']=$request->state;
                $post_array['city']=$request->city;
                $post_array['address']=$request->address;
                $post_array['message']=$request->message;
                $post_array['type']=$request->type;
                $post_array['ip']=$_SERVER['REMOTE_ADDR'];
                
                
                    $save=EnquiriesModel::create($post_array); 
                        if($save->id){
                             $details = [
                                    'title' => "Admin",
                                    'body' => "A New $request->type Enquiry has been genrated from fenesta. <br> Following are the details : <br> <br> 
                                    Name  : ".$post_array['name'].", <br> 
                                    Contactno  : ".$post_array['contactno'].", <br> 
                                    Email  : ".$post_array['email'].", <br> 
                                    State : ".$post_array['state'].", <br> 
                                    City : ".$post_array['city'].", <br> 
                                    IP : ".$post_array['ip'].", <br> 
                                    Address : ".$post_array['address'].", <br> 
                                    Message : ".$post_array['message'].", <br> 
                                    <br> 
                                    Contact with user as soon as possible.
                                     <br> 
                                    "
                                ];
                            
                            
                                Mail::to("ankita.gaba@adglobal360.com")->send(new \App\Mail\MyTestMail($details));

                            $details1 = [
                                    'title' => $post_array['name'],
                                    'body' => "Your $request->type enquiry has been successfully send to fenesta. <br> Following are the details :  <br> <br> 
                                    Name  : ".$post_array['name'].", <br> 
                                    Contactno  : ".$post_array['contactno'].", <br> 
                                    Email  : ".$post_array['email'].", <br> 
                                    State : ".$post_array['state'].", <br> 
                                    City : ".$post_array['city'].", <br> 
                                    Address : ".$post_array['address'].", <br> 
                                    Message : ".$post_array['message'].", <br> 
                                    <br> 
                                    We will connect with you soon.
                                     <br> 
                                    "
                                ];
                                Mail::to($post_array['email'])->send(new \App\Mail\MyTestMail($details1));


                            $response_array['status']='1';
                            $response_array['message']='Thank You ! Your Enquiry has been send.';
                           
                     
                   }
              }
              catch(\Exception $e)
              { 

                            //$response_array['message']="Unable to submit your request. Please check form field values and try again!";
                            $response_array['message']=$e->getMessage();
                          
                
              }


              return response()->json($response_array,200);           
        

    	
    }
    
    
        
    public function getcitybystate(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
    $cityshowrooms = DB::table('showrooms')->select('city')->where('is_delete','0')->where('status','Active')->where('state',$id)->groupBy('city')->get();    
         
        ?>
        <option value="">Select City</option>
            <?php
     foreach($cityshowrooms as $gg){
//         print_r($gg);
//         die;
        
?>
           <option  value="<?=$gg->city?>"><?=$gg->city?></option>
<?php 
     }
    }
    public function getblockbycity(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
    $city = $request->city;
        
    $blockshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->where('status','Active')->where('state',$id)->where('city',$city)->groupBy('locality')->get();
        
        ?>
        <option value="">Select Block</option>
            <?php
     foreach($blockshowrooms as $gg){
      
?>
           <option  value="<?=$gg->locality?>"><?=$gg->locality?></option>
<?php 
     }
    }
        
    public function getcitybystatepartner(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
        
    $c_city = $request->instance()->query('cookiescity');
    $cityshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('status','Active')->where('state',$id)->groupBy('city')->get();    
         
        ?>
        <option value="">Select City</option>
            <?php
     foreach($cityshowrooms as $gg){
//         print_r($gg);
//         die;
        
?>
           <option <?php if($gg->city==$c_city){ echo "selected"; } ?> value="<?=$gg->city?>"><?=$gg->city?></option>
<?php 
     }
    }
    public function getcitybystatepartnerlll(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
        
    $c_city = $request->instance()->query('cookiescity');
    $cityshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('status','Active')->where('state',$id)->groupBy('city')->get();    
         
        ?>
        <option value="">Select City</option>
            <?php
     foreach($cityshowrooms as $gg){
//         print_r($gg);
//         die;
        
?>
           <option value="<?=$gg->city?>"><?=$gg->city?></option>
<?php 
     }
    }
    public function getblockbycitypartner(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
    $city = $request->city;
        
    $blockshowrooms = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->where('status','Active')->where('state',$id)->where('city',$city)->groupBy('locality')->get();
        
        ?>
        <option value="">Select Block</option>
            <?php
     foreach($blockshowrooms as $gg){
      
?>
           <option  value="<?=$gg->locality?>"><?=$gg->locality?></option>
<?php 
     }
    }
    
    public function getcitybystateoffice(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
    $cityshowrooms = DB::table('offices')->select('city')->where('is_delete','0')->where('status','Active')->where('state',$id)->groupBy('city')->get();    
         
        ?>
        <option value="">Select City</option>
            <?php
     foreach($cityshowrooms as $gg){
//         print_r($gg);
//         die;
        
?>
           <option  value="<?=$gg->city?>"><?=$gg->city?></option>
<?php 
     }
    }
    public function getblockbycityoffice(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
    $city = $request->city;
        
    $type_officce = array(1=>'Head Office',2=>'Sales Office and Installation Service',3=>'Extrusion Factory',4=>'Fabrication Factories');
         
    $blockshowrooms = DB::table('offices')->select('type')->where('is_delete','0')->where('status','Active')->where('state',$id)->where('city',$city)->groupBy('type')->get();
        
        ?>
        <option value="">Select</option>
            <?php
     foreach($blockshowrooms as $gg){
      
?>
           <option  value="<?=$gg->type?>"><?=$type_officce[$gg->type]?></option>
<?php 
     }
    }
    
    
    public function getstate(Request $request) {
        
        $c_state = $request->instance()->query('cookiesstate');
        
        $data = file_get_contents ("js/states.json");
        $json = json_decode($data, true);
        ?>
        <option value="">--Select state--</option>
            <?php
     foreach($json as $gg){
//         print_r($gg);
//         die;
         if($gg['country_id']=='101'){
       
?>
           <option <?php if($c_state==$gg['name']){ echo "selected"; } ?> value="<?=$gg['name']?>" data-id="<?=$gg['id']?>"><?=$gg['name']?></option>

<?php }
         
     }
    }
    
    public function getcity(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
        
        $c_city = $request->instance()->query('cookiescity');
        
         $data = file_get_contents ("js/cities.json");
        $json = json_decode($data, true);
        ?>
        <option value="">--Select--</option>
            <?php
     foreach($json as $gg){
//         print_r($gg);
//         die;
         if($gg['state_id']==$id){
       
?>
           <option <?php if($c_city==$gg['name']){ echo "selected"; } ?> value="<?=$gg['name']?>"><?=$gg['name']?></option>
<?php }
     }
    }
    
    public function search_auto_data(Request $request){
        $keyw = $request->keyword;
        
         $result =  DB::select("SELECT page_title,page_slug,id FROM `pages` WHERE `is_delete` = '0' AND `status` = 'Active' AND parent_page='0' And  ( `page_title` LIKE '%$keyw%' or `meta_keyword` LIKE '%$keyw%' )");
        
         
        
         $result1 =  DB::select("SELECT title,slug,type FROM `windowdoor_types` WHERE `is_delete` = '0' AND `status` = 'Active' AND  ( `title` LIKE '%$keyw%' or `meta_keyword` LIKE '%$keyw%' )");
        
        
        
         $result3 =  DB::select("SELECT name,slug FROM `blog_post` WHERE  `status` = 'Active' AND  ( `name` LIKE '%$keyw%' or `page_title` LIKE '%$keyw%' or `short_description` LIKE '%$keyw%' )");
        
        
//         $result4 =  DB::select("SELECT name,slug FROM `blog_page` WHERE   `status` = 'Active' AND  ( `name` LIKE '%$keyw%' or `description` LIKE '%$keyw%' or `short_description` LIKE '%$keyw%' )");
        
         $result5 =  DB::select("SELECT name,slug FROM `blog_category` WHERE  `status` = 'Active' AND  ( `name` LIKE '%$keyw%' )");
        
        
        
         $result2 =  DB::select("SELECT window_types.title as title,window_types.slug as slug,windowdoor_types.slug as psluge,windowdoor_types.title as ptitle,window_types.product_type as product_type FROM `window_types` join windowdoor_types on windowdoor_types.id=window_types.product  WHERE window_types.is_delete = '0' AND window_types.status = 'Active' AND  ( window_types.title LIKE '%$keyw%' or window_types.page_description LIKE '%$keyw%' )");
       ?>
        <ul>
            <?php foreach($result as $rr){
            
            $resultotherpage =  DB::select("SELECT page_title,page_slug FROM `pages` WHERE `is_delete` = '0' AND `status` = 'Active' AND parent_page LIKE '%$rr->id,%' And  ( `page_title` LIKE '%$keyw%' or `page_description` LIKE '%$keyw%' )");
           
            ?>
            <li><a href="<?=url('/')?>/<?=$rr->page_slug?>" title="<?=$rr->page_title?>"><?=$rr->page_title?></a></li>
            <?php foreach($resultotherpage as $rrh){ ?> 
               <li><a href="<?=url('/')?>/<?=$rr->page_slug?>/<?=$rrh->page_slug?>" title="<?=$rrh->page_title?>"><?=$rr->page_title?> : <?=$rrh->page_title?></a></li>
            
            <?php } ?>
            <?php } ?>
            <?php foreach($result1 as $rr){  ?>
            <li><a href="<?=url('/')?>/<?=strtolower($rr->type)?>/<?=$rr->slug?>" title="<?=$rr->title?>"><?=$rr->title?></a></li>
            <?php } ?>
            
            <?php foreach($result2 as $rr){  ?>
            <li><a href="<?=url('/')?>/<?=strtolower($rr->product_type)?>/<?=$rr->psluge?>/<?=$rr->slug?>" title="<?=$rr->title?>"><?=$rr->title?> : <?=$rr->ptitle?></a></li>
            <?php } ?>
             <?php foreach($result5 as $rr){  ?>
            <li><a href="<?=url('/')?>/blog/category/<?=$rr->slug?>" title="<?=$rr->name?>"><?=$rr->name?></a></li>
            <?php } ?>
             <?php foreach($result3 as $rr){  ?>
            <li><a href="<?=url('/')?>/blog/<?=$rr->slug?>" title="<?=$rr->name?>"><?=$rr->name?></a></li>
            <?php } ?>
             <?php /* foreach($result4 as $rr){  ?>
            <li><a href="<?=url('/')?>/related-blog/<?=$rr->slug?>" title="<?=$rr->name?>"><?=$rr->name?></a></li>
            <?php } */ ?>
            
         </ul>
<?php
    }
    
    public function ajax_user_count(Request $request){
      
        $log_file_name = 'traffic_count.log';
        $count = file_get_contents($log_file_name, true);
        if(empty($count)){$count = 2507342;}  
        if(isset($request->action)){
            $action = $request->action;
            if($action == 'enter'){

                    $count += 2;
                    if($count == 0) { $count = 1; }
                    $_SESSION['user_count'] = $count;
                    $message = $count; 
                    file_put_contents($log_file_name, $message);        

            } 
        }

        echo $count;
        die;
        
    }
}
