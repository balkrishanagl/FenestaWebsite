<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;

//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Solution;
use App\Models\Setting;
use App\Models\PageMeta;
use App\Models\WindowDoor;
use App\Models\NewsletterModel;
use App\Models\BlogPostModel;
use App\Models\GalleryImages;
use View;

class HomeController extends Controller
{
	public function __construct(){
		$pageData = DB::table('pages')
            ->select()->where('is_delete','0')->where('id', '1')->get();
           // dd($pageData);
        view::share('pageData', $pageData);
	}

    public function index(Request $request){
        
        
        
//        $resultfff =  DB::select("SELECT * FROM `fenestadatac`");
//        foreach($resultfff as $rt){
//            $lat = explode(',',$rt->COL8)[0];
//            $long = explode(',',$rt->COL8)[1];
//            $d = $rt->COL2;
//            DB::table('partner_showrooms')->where('dealer_name', $d)->update(['lat' => $lat, 'long' => $long]);
//        }
//        echo "Sdsf";
//        die;
        
//        echo "<pre>";
//        print_r($request->instance());
//        die;
        $c_state = $request->instance()->query('cookiesstate');
        $c_city = $request->instance()->query('cookiescity');
        $cookiesuserda = $request->instance()->query('cookiesuserda');
//print_r($cookiesuserda);
//        die;
        
//        $informationData = json_decode($cookiesuserda->json_data, true); 
//        $array_i = $informationData['pages'];
//        $keyf = 'count';
//        $tsum = array_sum(array_column($array_i,$keyf));
//        
//        echo $tsum;
//        die;
        
        $Solutions = Solution::where('is_delete','0')->where('status','Active')->where('show_on','Yes')->where('type','1')->take(4)
            ->get();
        
        $gallerys = DB::table('gallery_images')
            ->select('heading','image')->where('is_delete','0')->where('status','Active')->where('type','gallery')->where('showon', 'like', '%page-1%')->get();
        $banners = DB::table('home_banner_images')
            ->select()->where('is_delete','0')->where('status','Active')->where('regions','0')->orderBy('id', 'DESC')->get();
        $secondndbanners = DB::table('home_banner_images')
            ->select()->where('is_delete','0')->where('status','Active')->where('regions',$c_state)
            ->get();
        
        $appreciations = DB::table('appreciations')
            ->select()->where('is_delete','0')->where('status','Active')->where('category','1')->where('city',$c_city)->take(5)
            ->get();
        if($appreciations->isEmpty()){
           $appreciations = DB::table('appreciations')
            ->select()->where('is_delete','0')->where('category','1')->where('status','Active')->take(5)
            ->get(); 
        }
        
        $fenestaworlds = DB::table('award_accreditations')
            ->select()->where('is_delete','0')->where('status','Active')->orderBy('id','ASC')
            ->get()->take(3);
//        $fenestaworlds = DB::table('fenesta_worlds')
//            ->select()->where('is_delete','0')->where('status','Active')
//            ->get();
        
    	$testimonials = DB::table('testimonials')
            ->select()->where('is_delete','0')->where('status','Active')->where('category','1')->where('city',$c_city)->take(5)
            ->get();
           
         if($testimonials->isEmpty()){
           
           $testimonials = DB::table('testimonials')->select()->where('category','1')->where('is_delete','0')->where('status','Active')->take(5)
            ->get(); 
        }
       
        $windowdoors = DB::table('window_doors')
            ->select('id','heading','window_image', 'door_image')->where('is_delete','0')->where('status','Active')
            ->get();
        $blogs = DB::table('blog_post')
            ->select()->where('status','Active')->orderBy('posted_date','desc')->limit(5)
            ->get();
        $partnerShowroom = DB::table('partner_showrooms')
            ->select()->where('is_delete','0')->where('status','Active')
            ->get();
        
        $servicesend = DB::table('services')
            ->select()->where('is_delete','0')->where('status','Active')->where('type','1')->orderBy('contentheading','ASC')
            ->get();
            
        $durableend = DB::table('services')
            ->select()->where('is_delete','0')->where('status','Active')->where('type','2')
            ->get();
//        print_r($servicesend);
//        die;
    	$page_description = Page::where('id',1)->first()->page_description;
    	$wi_subtitle = PageMeta::where('page_id',1)->where('meta_key','wi_subtitle')->first()->meta_value;
		$wi_title = PageMeta::where('page_id',1)->where('meta_key','wi_title')->first()->meta_value;
		$wi_subcontent = PageMeta::where('page_id',1)->where('meta_key','wi_subcontent')->first()->meta_value;
		$wi_content = PageMeta::where('page_id',1)->where('meta_key','wi_content')->first()->meta_value;
        $about_heading = PageMeta::where('page_id',1)->where('meta_key','about_heading')->first()->meta_value;
		$about_content = PageMeta::where('page_id',1)->where('meta_key','about_content')->first()->meta_value;
		
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
        
        $solu_headings = PageMeta::where('page_id',1)->where('meta_key','solu_heading')->first();
        if(!empty($solu_headings)){
        $solu_heading = $solu_headings->meta_value;
        }else{
        $solu_heading ='';    
        }
		$solu_contents = PageMeta::where('page_id',1)->where('meta_key','solu_content')->first();
        
        if(!empty($solu_contents)){
        $solu_content = $solu_contents->meta_value;
        }else{
        $solu_content ='';    
        }
       
       
		$visdsg_headings = PageMeta::where('page_id',1)->where('meta_key','visdsg_heading')->first();
        if(!empty($visdsg_headings)){
        $visdsg_heading = $visdsg_headings->meta_value;
        }else{
        $visdsg_heading ='';    
        }
        
		$visdsg_contents = PageMeta::where('page_id',1)->where('meta_key','visdsg_content')->first();
        if(!empty($visdsg_contents)){
        $visdsg_content = $visdsg_contents->meta_value;
        }else{
        $visdsg_content ='';    
        }
        
		$cli_headings = PageMeta::where('page_id',1)->where('meta_key','cli_heading')->first();
        if(!empty($cli_headings)){
        $cli_heading = $cli_headings->meta_value;
        }else{
        $cli_heading ='';    
        }
        
		$dcm_headings = PageMeta::where('page_id',1)->where('meta_key','dcm_heading')->first();
        if(!empty($dcm_headings)){
        $dcm_heading = $dcm_headings->meta_value;
        }else{
        $dcm_heading ='';    
        }
		$dcm_contents = PageMeta::where('page_id',1)->where('meta_key','dcm_content')->first();
        if(!empty($dcm_contents)){
        $dcm_content = $dcm_contents->meta_value;
        }else{
        $dcm_content ='';    
        }
        
		$locateus_headings = PageMeta::where('page_id',1)->where('meta_key','locateus_heading')->first();
        if(!empty($locateus_headings)){
        $locateus_heading = $locateus_headings->meta_value;
        }else{
        $locateus_heading ='';    
        }
        
		$cltsat_headings = PageMeta::where('page_id',1)->where('meta_key','cltsat_heading')->first();
        if(!empty($cltsat_headings)){
        $cltsat_heading = $cltsat_headings->meta_value;
        }else{
        $cltsat_heading ='';    
        }
        
		$cltsat_subheadings = PageMeta::where('page_id',1)->where('meta_key','cltsat_subheading')->first();
        if(!empty($cltsat_subheadings)){
        $cltsat_subheading = $cltsat_subheadings->meta_value;
        }else{
        $cltsat_subheading ='';    
        }
        
		$imgglry_headings = PageMeta::where('page_id',1)->where('meta_key','imgglry_heading')->first();
        if(!empty($imgglry_headings)){
        $imgglry_heading = $imgglry_headings->meta_value;
        }else{
        $imgglry_heading ='';    
        }
		$cusapp_headings = PageMeta::where('page_id',1)->where('meta_key','cusapp_heading')->first();
        if(!empty($cusapp_headings)){
        $cusapp_heading = $cusapp_headings->meta_value;
        }else{
        $cusapp_heading ='';    
        }
        
		$blog_headings = PageMeta::where('page_id',1)->where('meta_key','blog_heading')->first();
        if(!empty($blog_headings)){
        $blog_heading = $blog_headings->meta_value;
        }else{
        $blog_heading ='';    
        }
        
		$fw_headings = PageMeta::where('page_id',1)->where('meta_key','fw_heading')->first();
        if(!empty($fw_headings)){
        $fw_heading = $fw_headings->meta_value;
        }else{
        $fw_heading ='';    
        } 
        
        $banner_images = PageMeta::where('page_id',1)->where('meta_key','banner_images')->first();
        if(!empty($banner_images)){
        $exist_banner_images = json_decode($banner_images->meta_value);
        }else{
        $exist_banner_images ='';    
        }
		$bthum_images = PageMeta::where('page_id',1)->where('meta_key','bthum_images')->first();
        if(!empty($bthum_images)){
        $exist_bthum_images = $bthum_images->meta_value;
        }else{
        $exist_bthum_images ='';    
        }
//		$slider_images = PageMeta::where('page_id',1)->where('meta_key','slider_images')->first();
//        if(!empty($slider_images)){
//        $exist_slider_images = json_decode($slider_images->meta_value);
//        }else{
//        $exist_slider_images ='';    
//        }
       

		$dcm_leftimage = PageMeta::where('page_id',1)->where('meta_key','left_image')->first();
        if(!empty($dcm_leftimage)){
        $exist_dcm_leftimage = $dcm_leftimage->meta_value;
        }else{
        $exist_dcm_leftimage ='';    
        }
       



		$durable_headings = PageMeta::where('page_id',1)->where('meta_key','durable_heading')->first();
        if(!empty($durable_headings)){
        $durable_heading = $durable_headings->meta_value;
        }else{
        $durable_heading ='';    
        }
     
		$durable_subcontents = PageMeta::where('page_id',1)->where('meta_key','durable_subcontent')->first();
        if(!empty($durable_subcontents)){
        $durable_subcontent = $durable_subcontents->meta_value;
        }else{
        $durable_subcontent ='';    
        }
     
		$durable_contents = PageMeta::where('page_id',1)->where('meta_key','durable_content')->first();
        if(!empty($durable_contents)){
        $durable_content = $durable_contents->meta_value;
        }else{
        $durable_content ='';    
        }
     
		$durable_images = PageMeta::where('page_id',1)->where('meta_key','durable_image')->first();
        if(!empty($durable_images)){
        $durable_image = $durable_images->meta_value;
        }else{
        $durable_image='';    
        }
//		$dcm_logo = PageMeta::where('page_id',1)->where('meta_key','logo_image')->first();
//        if(!empty($dcm_logo)){
//        $exist_dcm_logo = $dcm_logo->meta_value;
//        }else{
//        $exist_dcm_logo ='';    
//        }
     
        //,'exist_dcm_leftimage','exist_dcm_logo','dcm_heading','dcm_content'
       
         $stateoshowrooms = DB::table('offices')->select('state')->where('is_delete','0')->groupBy('state')->get();
        
        $clicndaar = DB::table('gallery_images')->select('image')->where('is_delete','0')->where('status','Active')->where('showonhome','Yes')->where('type','clientele')->orderBy('id','DESC')
            ->get();
//        print_r($clicndaar);;
//        die;
//        
    	return view('frontend.index',compact('c_city','banners','blogs','blog_heading','appreciations','fenestaworlds','testimonials','wi_subtitle','wi_title','wi_subcontent','wi_content','windowdoors','page_description','gallerys','about_heading','about_content','datasettings','solu_heading','Solutions','visdsg_heading','visdsg_content','cli_heading','locateus_heading','cltsat_heading','cltsat_subheading','imgglry_heading','fw_heading','cusapp_heading','partnerShowroom','exist_banner_images','exist_bthum_images','secondndbanners','exist_dcm_leftimage','dcm_heading','dcm_content','servicesend','durableend','durable_heading','durable_subcontent','durable_content','durable_image','stateoshowrooms','clicndaar','c_state'));
    }
    
    
 public function newsletter(Request $request ) {         


                $this->validate($request, [                
                'email' => 'required|email'          
                
            ]);  

             $response_array=array();
             $response_array['status']='0';
             $response_array['message']='Some error!';
            try
              { 

                $check_email=NewsletterModel::where("email",$request->email)->where("is_delete",0)->count();
                if($check_email){
                    //throw new Exception("You have already subscribed!", 1);
                    $response_array['message']="You have already subscribed!";
                    return response()->json($response_array,200);   
                }

                $post_array=array();
                $post_array['email']=strip_tags($request->email);
                 
                    $save=NewsletterModel::create($post_array); 
                        if($save->id){
                            $response_array['status']='1';
                            $response_array['message']='Thank You For Subscribing!';
                           
                     
                   }
              }
              catch(\Exception $e)
              { 

                            //$response_array['message']="Unable to submit your request. Please check form field values and try again!";
                            $response_array['message']=$e->getMessage();
                          
                
              }


              return response()->json($response_array,200);           
        

    }

}
