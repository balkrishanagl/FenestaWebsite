<?php
 
namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
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
use App\Models\Handlelock;
use App\Models\PageMeta;
use App\Models\Serie;
use View;

class CmspageController extends Controller
{
    private $pp_ss='';
    public $cookie;
   
	public function __construct(Request $request){
        $this->c_city = $request->instance()->query('cookiescity');
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
        view::share('datasettings', $datasettings);
        
        $uri_seg = request()->segment(1);
        $uri_seg2 = request()->segment(2);
        if(!empty($uri_seg2)){
        
              $uridata = Cmspage::where('page_slug', $uri_seg2)->where('is_delete','0')->where('status','Active')->first();
               if(empty($uridata)){
                  $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->where('status','Active')->first();
                   
                   if(empty($uridata)){
                        return CmspageController::pageNotFound();
                    }else{
                        $this->pp_ss = 'page-'.$uridata->id;
                   }
              }else{
                    $this->pp_ss = 'page-'.$uridata->id;
               }
         
        }else{
        $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->where('status','Active')->first();
            if(!empty($uridata)){
             $this->pp_ss = 'page-'.$uridata->id;
            }else{
              $this->pp_ss = '';  
            }
            
        }
        
//        $appreciations = DB::table('appreciations')
//                     ->select()->where('is_delete','0')->where('status','Active')
//                     ->get();
//        
        $appreciations = DB::table('appreciations')
            ->select()->where('is_delete','0')->where('category','1')->where('status','Active')->where('city',$this->c_city)->take(5)
            ->get();
        if($appreciations->isEmpty()){
           $appreciations = DB::table('appreciations')
            ->select()->where('category','1')->where('is_delete','0')->where('status','Active')->take(5)
            ->get(); 
        }
        
        
        
        if(!empty($this->pp_ss)){
        $faqs = DB::table('faqs')
                ->select()->where('is_delete','0')->where('status','Active')->where('page', 'like', "%$this->pp_ss%") ->get();    
        $relatedblog = DB::table('blog_page')->select()->where('status','Active')->where('page', 'like', "%$this->pp_ss%")->limit(3)->get();
        }else{
          $relatedblog = array();  
          $faqs = DB::table('faqs')
                ->select()->where('is_delete','0')->where('status','Active')->where('page',NULL)
                ->get();
            
        }
        
        view::share('appreciations', $appreciations);
        view::share('relatedblog', $relatedblog);
        view::share('faqs', $faqs);
        view::share('c_city', $this->c_city);
    }
    public function pages($parent_slug=null,$child_slug=null) {

        $check_parent = Cmspage::where('page_slug', $parent_slug)->where('parent_menu_page_id',0)->where('status','Active')->first();
        
//       print_r($check_parent);
//        die;
        if(empty($check_parent)){
            return CmspageController::pageNotFound();
        }

       $page_slug=$parent_slug;
       if(!empty($child_slug)){
         $page_slug=$child_slug;

       }




      //  die();
//    $data = Cmspage::where('page_slug', $page_slug)->where('is_delete','0')->first();
    $data = $check_parent;

    $menu_active='';

            if(!empty($data)){        
                    $blog_page_class='inr-page-bg';
//                if(in_array($data->id, array(4,3,2))){
//                        $blog_page_class="blog-page";
//                }


//die($data->slug);

$breadcrumbs=array();
//if($data->slug=='product'){  
//     $breadcrumbs[]=array("name"=>'Company',"link"=>url('company'));
//     $breadcrumbs[]=array("name"=>'Our Products',"link"=>'');
//}

//if($data->parent_menu_page_id){
//    $parent_page=Cmspage::find($data->parent_menu_page_id);
// $parent_name=$parent_page->name;
// $parent_link=url($parent_page->slug);

//if($parent_page->slug=='media'){
//    $parent_link='';
//}


//if($parent_page->slug=='company'){  
//    $parent_name='Company';
//}

//if($parent_page->slug=='product' || $data->slug=='product'){  
//     $breadcrumbs[]=array("name"=>'Company',"link"=>url('company'));
//     $breadcrumbs[]=array("name"=>'Our Products',"link"=>'');
//}



//$breadcrumbs[]=array("name"=>$parent_name,"link"=>$parent_link);
//
//    if($data->id=='42' || $data->id=='65'){  
//        
//        $breadcrumbs[]=array("name"=>'Our Business',"link"=>'');
//    }
//}

//         $breadcrumbs[]=array("name"=>$data->page_title,"link"=>url('/'));
                
//       dd($breadcrumbs);

                $page_array=array(
                    'id' => $data->id,
                    'name' => $data->page_title,                  
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keyword,
                    'meta_description' => $data->meta_description,
                    'meta_title' => $data->meta_title,
                    'banner_image' => $data->banner_image,
                    'parent_slug' => $parent_slug,                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,      
                    'body_class' => 'page_'.$data->id .' '.$blog_page_class,                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => $data->page_title,
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    );

            $page_layout='cms_page';
//             if($data->layout){              
//                $page_layout=$data->layout;
//            }   

            return view('frontend/'.$page_layout, $page_array);
        }  else {
        return CmspageController::pageNotFound();
        
    }
    	
    }
 
    public function windows_doors(Request $request) {
    $slug = $request->segment(1); 
    $data = Cmspage::where('page_slug', $slug)->where('is_delete','0')->where('status','Active')->first();

    $menu_active='';

            if(!empty($data)){        
                    $blog_page_class='inr-page-bg';

$breadcrumbs=array();

//    $breadcrumbs[]=array("name"=>$data->page_title,"link"=>url('/'));
                
    $windowproduct =   WindowdoorType::where('is_delete','0')->where('status','Active')->where('type',$slug)->get();   
                
    $byapplication = WindowdoorByapplication::where('type', $slug)->where('is_delete','0')->get();

                $page_array=array(
                    'id' => $data->id,
                    'ptype' => $slug,
                    'name' => $data->page_title,                  
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keyword,
                    'meta_description' => $data->meta_description,
                    'banner_image' => $data->banner_image,              
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,      
                    'body_class' => 'page_'.$data->id .' '.$blog_page_class,                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => $data->page_title,
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'windowproduct' => $windowproduct,
                    'byapplication' => $byapplication,
                    );

            $page_layout='index';
            return view('frontend/windowdoors/'.$page_layout, $page_array);
        }  else {
        return CmspageController::pageNotFound();
        
    }
    	
    }
    public function product(Request $request) {
    $slug = $request->segment(1); 
    $productslug = $request->segment(2); 
    $data = WindowdoorType::where('slug', $productslug)->where('status','Active')->where('is_delete','0')->first();
        
    $product_types = WindowType::where('product_type', $data->type)->where('product', $data->id)->where('is_delete','0')->where('status','Active')->get();
    $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
    $series = Serie::where('is_delete','0')->where('status','Active')->get();

    $menu_active='';
       

    $breadcrumbs=array();

    $breadcrumbs[]=array("name"=>$data->type,"link"=>url('/'.$slug));
                
                
    $gallerys  = DB::table('gallery_images')
                ->select('heading','image')->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
                
                $page_array=array(
                    'id' => $data->id,
                    'ptype' => $data->type,
                    'name' => $data->title,                  
                    'about' => $data->about,
                    'title' => ($data->title)?$data->title:$data->type,
                    'meta_title' => $data->meta_title,
                    'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_keyword' => $data->meta_keyword,
                    'meta_description' => $data->meta_description,
                    'banner_image' => $data->banner_image,              
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,   
                    'feature_benefits' => $data->feature_benefits,   
                    'short_description' => $data->short_description,   
                    'body_class' => '',                    
//                    'meta_other' => $data->meta_other,
                    'image_alt' => $data->title,
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallerys,
                    'product_types' => $product_types,
                    'featurebenefit' => $featurebenefit,
                    'series_content' => $data->series,
                    'series' => $series,
                    );

            $page_layout='product';
            return view('frontend/windowdoors/'.$page_layout, $page_array);
  
    	
    }
    public function internal_doors(Request $request) {
    $slug = $request->segment(1); 
    $productslug = $request->segment(2); 
    $data = Cmspage::where('page_slug', $productslug)->where('is_delete','0')->where('status','Active')->first();
        
    $internaldoor = WindowdoorType::where('slug', $productslug)->where('is_delete','0')->where('status','Active')->first();
        
    $product_types = WindowType::where('product_type', $data->type)->where('product', $data->id)->where('is_delete','0')->where('status','Active')->get();
    $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
    $series = Serie::where('is_delete','0')->where('status','Active')->get();

    $menu_active='';
        
    $coloroptionssl = DB::table('coloroptions')->select()->where('is_delete','0')->where('windowdoor','5')->where('type','Door')->where('status','Active')->get();

    $handlelocks = Handlelock::where('is_delete','0')->where('windowdoor',5)->where('type','!=','Acessories')->where('status','Active')->get();
        
    $acessories = Handlelock::where('is_delete','0')->where('windowdoor',5)->where('type','Acessories')->where('status','Active')->get();
        
    $breadcrumbs=array();

    $breadcrumbs[]=array("name"=>"Door","link"=>url('/door'));
                
//    echo $this->pp_ss;            
    $gallerys =  DB::table('gallery_images')
                ->select('heading','image')->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
//                print_r($gallerys);
//        die;
                $page_array=array(
                    'id' => $data->id,
                    'ptype' => $data->type,
                    'name' => $data->title,                  
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $internaldoor->meta_keywords,
                    'meta_description' => $internaldoor->meta_description,
                    'og_title' => $internaldoor->og_title,
                    'og_desc' => $internaldoor->og_desc,
                    'og_image' => $internaldoor->og_image,
                    'banner_image' => $data->banner_image,              
                    'slug' => $data->slug,                    
                    'content' => $internaldoor->page_description,   
                    'woodenimage' => $internaldoor->woodenimage,   
                    'fenestaimage' => $internaldoor->fenestaimage,   
                    'feature_benefits' => $internaldoor->feature_benefits,   
                    'short_description' => $internaldoor->short_description,   
                    'arange' => json_decode($internaldoor->arange),   
                    'woodenoptions' => json_decode($internaldoor->woodenoptions),   
                    'feature' => json_decode($internaldoor->features),   
                    'fenestaoptions' => json_decode($internaldoor->fenestaoptions),   
                    'body_class' => '',                     
//                    'meta_other' => $data->meta_other,
                    'image_alt' => $data->title,
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallerys,
                    'product_types' => $product_types,
                    'featurebenefit' => $featurebenefit,
                    'series_content' => $internaldoor->series,
                    'doorimage' => $internaldoor->banner_image,   
                    'coloroptionssl' => $coloroptionssl,
                    'handlelocks' => $handlelocks,
                    'acessories' => $acessories,
                    );

            $page_layout='internal_doors';
            return view('frontend/windowdoors/'.$page_layout, $page_array);
  
    	
    }
/*
    public function doors() {

    $data = Cmspage::where('page_slug', 'doors')->where('is_delete','0')->first();

    $menu_active='';

            if(!empty($data)){        
                    $blog_page_class='inr-page-bg';

$breadcrumbs=array();

//    $breadcrumbs[]=array("name"=>$data->page_title,"link"=>url('/'));
                
    $windowproduct =   WindowdoorType::where('is_delete','0')->where('type','Door')->get();   
                
    $byapplication = WindowdoorByapplication::where('type', 'Door')->where('is_delete','0')->get();

                $page_array=array(
                    'id' => $data->id,
                    'name' => $data->page_title,                  
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keyword,
                    'meta_description' => $data->meta_description,
                    'banner_image' => $data->banner_image,              
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,      
                    'body_class' => 'page_'.$data->id .' '.$blog_page_class,                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => $data->page_title,
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'windowproduct' => $windowproduct,
                    'byapplication' => $byapplication,
                    );

            $page_layout='doors';
            return view('frontend/doors/'.$page_layout, $page_array);
        }  else {
        return CmspageController::pageNotFound();
        
    }
    	
    }
*/
    public function enquire_now(Request $request) {
        
        $page_slug = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $breadcrumbs=array();
        //$breadcrumbs[]=array("name"=>'Handles and Locks',"link"=>'');
//     echo $this->pp_ss;
//        die;
      $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
        
        $testimonials = DB::table('testimonials')
            ->select()->where('is_delete','0')->where('status','Active')->where('category','1')->take(5)
            ->get();
        
        
        $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->where('showon','Yes')->get();
      
        
        
        
//         dd($testimonials);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_title' => $data->meta_title,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallery, 
                    'testimonials' => $testimonials, 
                    'featurebenefit' => $featurebenefit, 

                    );

		return view('frontend.cmspage.enquiry_now',$page_array);
    	
    }
    public function thankyou(Request $request) {
        
        $page_slug = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $breadcrumbs=array();
        //$breadcrumbs[]=array("name"=>'Handles and Locks',"link"=>'');
//     echo $this->pp_ss;
//        die;
      $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
        
        $testimonials = DB::table('testimonials')
            ->select()->where('is_delete','0')->where('status','Active')->where('category','1')->take(5)
            ->get();
        
        
        $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->where('showon','Yes')->get();
      
        
        
        
//         dd($testimonials);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallery, 
                    'testimonials' => $testimonials, 
                    'featurebenefit' => $featurebenefit, 

                    );

		return view('frontend.cmspage.thankyou',$page_array);
    	
    }
    public function about_fenesta(Request $request) {
        
        $page_slug = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $breadcrumbs=array();
        //$breadcrumbs[]=array("name"=>'Handles and Locks',"link"=>'');
//     echo $this->pp_ss;
//        die;
      $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
        
        $awards = DB::table('award_accreditations')
            ->select()->where('is_delete','0')->where('status','Active')->orderBy('id','desc')
            ->get();

                  
        $asql = DB::table('about_fenestas')->where('status','Active')
            ->select()->where('is_delete','0')
            ->get();

         $about_fenestas    =   $asql->where('type','1');    
         $about_value       =   $asql->where('type','2');
         $about_infa        =   $asql->where('type','3');   
         $about_life        =   $asql->where('type','4');
        
        
        
      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_title' => $data->meta_title,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallery, 
                    'awards' => $awards,
                    'about_fenestas' => $about_fenestas,
                    'about_value' => $about_value,
                    'about_infa' => $about_infa,
                    'about_life' => $about_life,

                    );

		return view('frontend.cmspage.about_fenesta',$page_array);
    	
    }
    public function about_dcm(Request $request) {
        
        $page_slug = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $breadcrumbs=array();
        //$breadcrumbs[]=array("name"=>'Handles and Locks',"link"=>'');
        
      $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
        
        $awards = DB::table('award_accreditations')->where('status','Active')
            ->select()->where('is_delete','0')
            ->get();

                  
        $asql = DB::table('about_fenestas')->where('status','Active')
            ->select()->where('is_delete','0')
            ->get();

         $about_fenestas    =   $asql->where('type','1');    
         $about_value       =   $asql->where('type','7');
         $about_infa        =   $asql->where('type','3');   
         $business        =   $asql->where('type','6');
         $leadership        =   $asql->where('type','5');
        
        
        
      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallery, 
                    'awards' => $awards,
                    'about_fenestas' => $about_fenestas,
                    'about_value' => $about_value,
                    'about_infa' => $about_infa,
                    'business' => $business,
                    'leadership' => $leadership,

                    );

		return view('frontend.cmspage.about_dcm',$page_array);
    	
    }
    public function brochure(Request $request) {
        
        $page_slug = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $breadcrumbs=array();
        //$breadcrumbs[]=array("name"=>'Handles and Locks',"link"=>'');
        
      
         $bro = DB::table('brochures')
                ->select()->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')
                ->get();
        
      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'bro' => $bro,

                    );
 
		return view('frontend.cmspage.brochure',$page_array);
    	
    }
    public function handles(Request $request) {
        
        $page_slug='handles';
       
        $uritype = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $windows = DB::table('windowdoor_types')
                    ->select()->where('is_delete','0')->where('status','Active')->where('type','Window')
                    ->get();
         $doors = DB::table('windowdoor_types')
                    ->select()->where('is_delete','0')->where('status','Active')->where('type','Door')
                    ->get();


         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>ucfirst($uritype),"link"=>url("/$uritype"));
        //$breadcrumbs[]=array("name"=>'Handles and Locks',"link"=>'');

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'uritype' => $uritype,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'windows' => $windows,
                    'doors' => $doors,

                    );

		return view('frontend.cmspage.handles',$page_array);
    	
    }

    public function customer_reviews() {
        
        $page_slug='customer-reviews';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();


        $customerappreciations = DB::table('appreciations')
                     ->select()->where('is_delete','0')->where('status','Active')->where('category','2')
                     ->get();

        $customerappreciations1 = DB::table('appreciations')
                     ->select()->where('is_delete','0')->where('status','Active')->where('category','3')
                     ->get();

        $testimonials = DB::table('testimonials')
            ->select()->where('is_delete','0')->where('category','2')->where('status','Active')
            ->get();

        $testimonials1 = DB::table('testimonials')
            ->select()->where('is_delete','0')->where('category','3')->where('status','Active')
            ->get();

         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'retailcus' => $customerappreciations,
                    'reatiltestimonials' => $testimonials,
                    'projectcus' => $customerappreciations1,
                    'projecttestimonials' => $testimonials1,

                    );

		return view('frontend.cmspage.customer_reviews',$page_array);
    	
    }
    public function colors_finish(Request $request) {
        
        $page_slug='colors-finish';
        $uritype = $request->segment(1);
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $coloroptionssql = DB::table('coloroptions')
            ->select()->where('is_delete','0')->where('status','Active')->where('type',ucwords($uritype))
            ->get();
        
        
        if($uritype=='window'){
            $coloroptionsalm = $coloroptionssql->whereIn('windowdoor', 2);
            $coloroptionsupvc = $coloroptionssql->whereIn('windowdoor', 1);
        }else{
            $coloroptionsalm = $coloroptionssql->whereIn('windowdoor', 4);
            $coloroptionsupvc = $coloroptionssql->whereIn('windowdoor',3);
        }
//        print_r($coloroptions);
//        die;
        
         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>ucfirst($uritype),"link"=>url("/$uritype"));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'ptype' => $uritype,
                    'name' => $data->name,        
                     'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
    'meta_title' => $data->meta_title,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'coloroptionsalm' => $coloroptionsalm,
                    'coloroptionsupvc' => $coloroptionsupvc,

                    );

		return view('frontend.cmspage.color_finish',$page_array);
    	
    }
    public function trims() {
        
        $page_slug='trims';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $trims = DB::table('trim_options')
            ->select()->where('is_delete','0')->where('status','Active')->where('type','Single')
            ->get();
        $Multitrims = DB::table('trim_options')
            ->select()->where('is_delete','0')->where('status','Active')->where('type','Multi')
            ->get();
        
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Customer Reviews',"link"=>url('/color-finish'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,     
                    'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
    'meta_title' => $data->meta_title,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'trims' => $trims,
                    'Multitrims' => $Multitrims,

                    );
 
		return view('frontend.cmspage.trims',$page_array);
    	
    }

    public function great_facade() {
        
        $page_slug='great-facade';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $testimonials = DB::table('great_facades')
            ->select()->where('is_delete','0')->where('status','Active')
            ->get();
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Customer Reviews',"link"=>url('/color-finish'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                  'sub_text' => $data->sub_text,
                   'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'testimonials' => $testimonials,

                    );
 
		return view('frontend.cmspage.great_facade',$page_array);
    	
    }


    public function award_accreditation() {
        
        $page_slug='awards-accreditations';
        
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $testimonials = DB::table('award_accreditations')
            ->select()->where('is_delete','0')->where('status','Active')
            ->get();
        
        $awards= $testimonials->where('type','Awards');
        $app= $testimonials->where('type','Accreditations');
            
            
         $breadcrumbs=array();

         $breadcrumbs[]=array("name"=>'Why Fenesta',"link"=>url('/'));
      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name, 
    'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'awards' => $awards,
                    'app' => $app,

                    );
 
		return view('frontend.cmspage.award_accreditation',$page_array);
    	
    }



    public function showcase_gc(Request $request) {
        
        $page_slug=$request->segment(2);
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();
//
//        $gallery = DB::table('gallery_images')
//            ->select()->where('is_delete','0')->where('showon','!=','1')->where('type',)->orderBy('id','DESC')
//            ->get();
//        echo $this->pp_ss;
//        die;
        if($page_slug=='clientele'){
           $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('type',$page_slug)->orderBy('id','DESC')
                ->get(); 
        }else{
        $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type',$page_slug)->orderBy('id','DESC')
                ->get();
        }
         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,       
    'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallery' => $gallery,

                    );
 
		return view('frontend.cmspage.gallery',$page_array);
    	
    }
    public function features_benefits(Request $request) {
        
        $page_slug='features-benefits';
        $child_slug=$request->segment(2);
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $featurebenefitsingle = FeatureBenefit::where('is_delete','0')->where('slug',$child_slug)->where('status','Active')->first();
        $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
         $series = DB::table('series')
            ->select('title')->where('is_delete','0')->where('status','Active')
            ->get(); 
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
    'about' => $data->about,
                    'sub_text' => $data->sub_text,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,
                    'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'featurebenefit' => $featurebenefit,
                    'featurebenefitsingle' => $featurebenefitsingle,
                    'series' => $series,
                    'child_slug' => $child_slug,
                    'page_slug' => $page_slug,

                    );
 
		return view('frontend.cmspage.features_benefits',$page_array);
    	
    }
    public function knowledge_center() {
        
        $page_slug='knowledge-center';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
         $series = DB::table('series')
            ->select('title')->where('status','Active')->where('is_delete','0')
            ->get(); 
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
    'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,
    'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,       
    'meta_title' => $data->meta_title,
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'featurebenefit' => $featurebenefit,
                    'series' => $series,

                    );
 
		return view('frontend.cmspage.knowledge_center',$page_array);
    	
    }

    public function style_benefits() {
        
        $page_slug='style-benefits';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $gallery = DB::table('gallery_images')
                ->select()->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get()->take(10);
        
        $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->where('showon','Yes')->get();
      
        
         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>'Why Fenesta',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,
    'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
    'meta_title' => $data->meta_title,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'subcontent' => $data->subcontent,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallery,
                    'featurebenefit' => $featurebenefit,

                    );
 
		return view('frontend.cmspage.style_benefits',$page_array);
    	
    }
    public function mesh_grill(Request $request) {
        
        $page_slug='mesh-grill';
       
        $uritype = $request->segment(1);
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        
        $ssql = DB::table('meshgrill_options')
            ->select()->where('is_delete','0')->where('status','Active')
            ->get();
        
            $meshoptions = $ssql->where('type', 'Mesh')->where('upload_type','Option');
            $meshstyle = $ssql->where('type', 'Mesh')->where('upload_type','style');
        
            $grilloptions = $ssql->where('type', 'Grill')->where('upload_type','Option');
            $grillstyle = $ssql->where('type', 'Grill')->where('upload_type','style');
        

         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>ucfirst($uritype),"link"=>url("/$uritype"));

       

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'sub_text' => $data->sub_text,
    'meta_title' => $data->meta_title,
    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,
    'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'meshoptions' => $meshoptions,
                    'meshstyle' => $meshstyle,
                    'grilloptions' => $grilloptions,
                    'grillstyle' => $grillstyle,
                    'divclass' => '',

                    );
 
		return view('frontend.cmspage.mesh_gril',$page_array);
    	
    }
    public function glass(Request $request) {
        
        $page_slug='glass';
       
        $uritype = $request->segment(1);
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        
        $ssql = DB::table('glass_options')
            ->select()->where('is_delete','0')->where('status','Active')
            ->get();
        
            $glassoptions = $ssql->where('upload_type','Glass Option');
            $glassstyle = $ssql->where('upload_type','Glazing Types');


         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>ucfirst($uritype),"link"=>url("/$uritype"));

       

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'ptype' => $uritype,
                    'name' => $data->name,    
    'meta_title' => $data->meta_title,
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'glassoptions' => $glassoptions,
                    'glassstyle' => $glassstyle,
                    'divclass' => '',

                    );
 
		return view('frontend.cmspage.glass',$page_array);
    	
    }

    public function series() {
        
        $page_slug='series';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $seriesdata = DB::table('series')->where('is_delete','0')->where('status','Active')->orderBy('id','ASC')->get();
        

         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'seriesdata' => $seriesdata,

                    );
 
        
//        print_r($page_array);
//        die;
		return view('frontend.cmspage.series',$page_array);
    	
    }
    public function why_services(Request $request) {
        
        $page_slug=$request->segment(1);
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $news = DB::table('solutions')->where('is_delete','0')->where('status','Active')->orderBy('id','ASC')->get();
        if($page_slug=='quality-innovation'){
          $resultdata =  $news->where('type',1);
        }elseif($page_slug=='services-infrastructure'){
          $resultdata =  $news->where('type',2);
        }elseif($page_slug=='brand-heritage'){
          $resultdata =  $news->where('type',3);
        }else{
          $resultdata =  $news->where('type',4);
        }

         $breadcrumbs=array();
  $breadcrumbs[]=array("name"=>'Why Fenesta',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
    'meta_title' => $data->meta_title,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'resultdata' => $resultdata,

                    );
 
		return view('frontend.cmspage.why_services',$page_array);
    	
    }
    public function locate_us() {
        
        $page_slug='locate-us';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $showrooms = DB::table('showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
        $offices = DB::table('offices')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
        $partner_showrooms = DB::table('partner_showrooms')->where('status','Active')->where('is_delete','0')->orderBy('id','DESC')->get();
        
        
         $stateshowrooms = DB::table('showrooms')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
//         $cityshowrooms = DB::table('showrooms')->select('city')->where('is_delete','0')->groupBy('city')->get();
//         $blockshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->groupBy('locality')->get();
//        
        
        
         $statepshowrooms = DB::table('partner_showrooms')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
//         $citypshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->groupBy('city')->get();
//         $blockpshowrooms = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->groupBy('locality')->get();
//        
        
        
        
         $stateoshowrooms = DB::table('offices')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
//         $cityoshowrooms = DB::table('offices')->select('city')->where('is_delete','0')->groupBy('city')->get();
//         $blockoshowrooms = DB::table('offices')->select('type')->where('is_delete','0')->groupBy('type')->get();
//        
        
        
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

        // Initiate curl session in a variable (resource)
//        $curl_handle = curl_init();
//
//        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,
//+Mountain+View,+CA&key=YOUR_API_KEY";
//
//        // Set the curl URL option
//        curl_setopt($curl_handle, CURLOPT_URL, $url);
//
//        // This option will return data as a string instead of direct output
//        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
//
//        // Execute curl & store data in a variable
//        $curl_data = curl_exec($curl_handle);
//
//        curl_close($curl_handle);
//
//        // Decode JSON into PHP array
//        $response_data = json_decode($curl_data);
//
//        // Print all data if needed
//        // print_r($response_data);
//        // die();
//
//        // All user data exists in 'data' object
//        $user_data = $response_data->data;
//
//        // Extract only first 5 user data (or 5 array elements)
//        $user_data = array_slice($user_data, 0, 4);
//
//        // Traverse array and print employee data
//        foreach ($user_data as $user) {
//            echo "name: ".$user->employee_name;
//            echo "<br />";
//        }
//
//        
//        
        
        
        
        
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
                    'sub_text' => $data->sub_text,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'showrooms' => $showrooms,
                    'stateshowrooms' => $stateshowrooms,
//                    'cityshowrooms' => $cityshowrooms,
//                    'blockshowrooms' => $blockshowrooms,
                    'statepshowrooms' => $statepshowrooms,
//                    'citypshowrooms' => $citypshowrooms,
//                    'blockpshowrooms' => $blockpshowrooms,
                    'stateoshowrooms' => $stateoshowrooms,
//                    'cityoshowrooms' => $cityoshowrooms,
//                    'blockoshowrooms' => $blockoshowrooms,
                    'offices' => $offices,
                    'partner_showrooms' => $partner_showrooms,

                    );
 
		return view('frontend.cmspage.locate_us',$page_array);
    	
    }
    public function locate_us_child(Request $request) {
        
        $page_slug='locate-us';
       
        $slug=$request->segment(1);
        
        $child_slug=$request->segment(2);
        $child_slug1=$request->segment(3);
        $child_slug2=$request->segment(4);
        $child_slug3=$request->segment(5);
        
       $state_seg = ucwords(str_replace("-"," ",$child_slug1));
       $city_seg =  ucwords(str_replace("-"," ",$child_slug2));
       $blk_seg =  str_replace("-"," ",$child_slug3);
//        DB::enableQueryLog();
  
        
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();
    
        $breadcrumbs=array();
        if(!empty($child_slug)){
          
         $breadcrumbs[]=array("name"=>'Locate Us',"link"=>url('/locate-us'));  
            if($child_slug=='signature-studio'){  
            $b_title = 'Signature Studio';  
            }
            elseif($child_slug=='partner-showroom'){
            $b_title = 'Partner Showroom';  
            }
            elseif($child_slug=='fenesta-offices'){
            $b_title = 'Fenesta Offices';  
            }
            elseif($child_slug=='international-market'){
            $b_title = 'International Market';  
            }
            else{
            $b_title = '';   
            }    


        }else{
            $b_title = $data->page_title;
        }
        
        
        if($child_slug=='signature-studio' || empty($child_slug)){
        
        $showrooms = DB::table('showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        if(!empty($child_slug1)){
            $showrooms = $showrooms->where('state',$state_seg);
        }
        if(!empty($child_slug2)){
            $showrooms = $showrooms->where('city',$city_seg);
        }

        if(!empty($child_slug3)){
            $showrooms = DB::table('showrooms')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->where('state',$state_seg)->where('city',$city_seg)->where('locality',$blk_seg)->get();
        }
            
            
            
                $stateshowrooms = DB::table('showrooms')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
        
         
         if(!empty($child_slug1)){
            $cityshowrooms = DB::table('showrooms')->select('city')->where('is_delete','0')->where('status','Active')->where('state',$state_seg)->groupBy('city')->get();   
          }else{
//          $cityshowrooms = DB::table('showrooms')->select('city')->where('is_delete','0')->groupBy('city')->get();   
          $cityshowrooms = '';   
         }
        
         
        if(!empty($child_slug1) and empty($child_slug2)){
//            $blockshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->where('state',$state_seg)->groupBy('locality')->get();
            $blockshowrooms = '';
        }
        elseif(!empty($child_slug2)){
            $blockshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->where('state',$state_seg)->where('city',$city_seg)->groupBy('locality')->get();
        }else{
//            $blockshowrooms = DB::table('showrooms')->select('locality')->where('is_delete','0')->groupBy('locality')->get();
            $blockshowrooms = '';
        }
       
        
            
            
       
        }
        
         if($child_slug=='partner-showroom'){
             $partner_showrooms = DB::table('partner_showrooms')->where('status','Active')->where('country','India')->where('is_delete','0')->orderBy('id','DESC')->get();
         if(!empty($child_slug1)){
            $partner_showrooms = $partner_showrooms->where('state',$state_seg);
        }
        if(!empty($child_slug2)){
            $partner_showrooms = $partner_showrooms->where('city',$city_seg);
        }
        if(!empty($child_slug3)){
             $partner_showrooms = DB::table('partner_showrooms')->where('status','Active')->where('country','India')->where('is_delete','0')->where('locality',$blk_seg)->where('state',$state_seg)->where('city',$city_seg)->orderBy('id','DESC')->get();
            //$partner_showrooms = $partner_showrooms->where('locality',$blk_seg);
        }
        
        
        
     
        
         $statepshowrooms = DB::table('partner_showrooms')->select('state')->where('is_delete','0')->where('status','Active')->where('country','India')->groupBy('state')->get();
        
         
        if(!empty($child_slug1)){
            $citypshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('state',$state_seg)->where('country','India')->groupBy('city')->get();
        }else{
//           $citypshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->groupBy('city')->where('country','India')->get();
           $citypshowrooms = '';
        }
        
         
         if(!empty($child_slug1)  and empty($child_slug2)){
             $blockpshowrooms = '';
//             $blockpshowrooms = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->where('state',$state_seg)->where('country','India')->groupBy('locality')->get();
        }
        elseif(!empty($child_slug2)){
            $blockpshowrooms = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->where('state',$state_seg)->where('city',$city_seg)->where('country','India')->groupBy('locality')->get();
        }else{
            $blockpshowrooms = '';
//            $blockpshowrooms = DB::table('partner_showrooms')->select('locality')->where('is_delete','0')->where('country','India')->groupBy('locality')->get();
         }
        
        
        
         }
         $showroomsqltest = DB::table('testimonials')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
        if(!empty($state_seg)){
        $testlocateus = $showroomsqltest->where('state',$state_seg);
        }
        elseif(!empty($city_seg)){
        $testlocateus = $showroomsqltest->where('city',$city_seg);
        }else{
          $testlocateus   = $showroomsqltest->take(3);
        }
        
        
         if($child_slug=='international-market'){
             $partner_showrooms = DB::table('partner_showrooms')->where('status','Active')->where('country','!=','India')->where('is_delete','0')->orderBy('id','DESC')->get();
         if(!empty($child_slug1)){
            $partner_showrooms = $partner_showrooms->where('country',$state_seg);
        }
        if(!empty($child_slug2)){
            $city_seg = strtolower($city_seg);
            $partner_showrooms = $partner_showrooms->where('city',$city_seg);
        }
        
        
        
     
        
         $statepshowrooms = DB::table('partner_showrooms')->select('state')->where('is_delete','0')->where('status','Active')->where('country','!=','India')->groupBy('state')->get();
        
         
        if(!empty($child_slug1)){
            $citypshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('country',$state_seg)->where('country','!=','India')->groupBy('city')->get();
        }else{
           $citypshowrooms ='';
//           $citypshowrooms = DB::table('partner_showrooms')->select('city')->where('is_delete','0')->where('country','!=','India')->groupBy('city')->get();
        }
        
          $testlocateus = DB::table('testimonials')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get()->take(2);
        
         }
       
       
        
         if($child_slug=='fenesta-offices'){
//       dd(DB::getQueryLog());
        
        $offices = DB::table('offices')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
//         if(!empty($child_slug1)){
//            $offices = $offices->where('state',$state_seg);
//        }
//        if(!empty($child_slug2)){
//            $offices = $offices->where('city',$city_seg);
//        }
             
         $type_officce = array(1=>'Head Office',2=>'Sales Office And Installation Service',3=>'Extrusion Factory',4=>'Fabrication Factories');  
             $key = array_search ($state_seg, $type_officce);
         if(!empty($child_slug1)){
            $offices = $offices->where('type',$key);
        }
        
        
        
//         $stateoshowrooms = DB::table('offices')->select('state')->where('is_delete','0')->where('status','Active')->groupBy('state')->get();
//        
//         if(!empty($child_slug1)){
//             $cityoshowrooms = DB::table('offices')->select('city')->where('is_delete','0')->where('state',$state_seg)->groupBy('city')->get();
//        }else{
//             $cityoshowrooms = DB::table('offices')->select('city')->where('is_delete','0')->groupBy('city')->get();
//         }
//        
//        
//        
//         if(!empty($child_slug1)){
//              $blockoshowrooms = DB::table('offices')->select('type')->where('is_delete','0')->where('state',$state_seg)->groupBy('type')->get();
//        }
//        elseif(!empty($child_slug2)){
//             $blockoshowrooms = DB::table('offices')->select('type')->where('is_delete','0')->where('state',$state_seg)->where('city',$city_seg)->groupBy('type')->get();
//        }else{
             $blockoshowrooms = DB::table('offices')->select('type')->where('is_delete','0')->groupBy('type')->get();
//        }
        
        $state_seg = $key;
             
          $showroomsqltest = DB::table('testimonials')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
          $testlocateus   = $showroomsqltest->take(3);
        
             
    }
     
        
        
$page_array=array(
                    'pageData' => $data,
                    'childslug_formeta' => $child_slug,
                    'child_slug' => $child_slug,
                    'child_slug1' => $state_seg,
                    'child_slug2' => $city_seg,
                    'child_slug3' => $blk_seg,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'meta_title' => $data->meta_title,
                    'title' => $b_title,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'showrooms' => (!empty($showrooms))?$showrooms:'',
                    'stateshowrooms' => (!empty($stateshowrooms))?$stateshowrooms:'',
                    'cityshowrooms' => (!empty($cityshowrooms))?$cityshowrooms:'',
                    'blockshowrooms' => (!empty($blockshowrooms))?$blockshowrooms:'',
                    'statepshowrooms' => (!empty($statepshowrooms))?$statepshowrooms:'',
                    'citypshowrooms' => (!empty($citypshowrooms))?$citypshowrooms:'',
                    'blockpshowrooms' => (!empty($blockpshowrooms))?$blockpshowrooms:'',
                    'stateoshowrooms' => (!empty($stateoshowrooms))?$stateoshowrooms:'',
                    'cityoshowrooms' => (!empty($cityoshowrooms))?$cityoshowrooms:'',
                    'blockoshowrooms' => (!empty($blockoshowrooms))?$blockoshowrooms:'',
                    'offices' => (!empty($offices))?$offices:'',
                    'partner_showrooms' => (!empty($partner_showrooms))?$partner_showrooms:'',
                    'testlocateus' => (!empty($testlocateus))?$testlocateus:'',

                    );
 
		return view('frontend.cmspage.locate_us',$page_array);
    	
    }
    public function news_media() {
        
        $page_slug='news-media';
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $news = DB::table('news')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
        
        $latestevent = $news->where('upload_type',4)->take(3);
        $presstevent = $news->whereIn('upload_type',[2])->take(4);
        $addevent = $news->where('upload_type',3)->take(4);
//         print_r($latestevent);
//        die;
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'Showcase',"link"=>url('/'));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'latestevent' => $latestevent,
                    'pressevent' => $presstevent,
                    'addevent' => $addevent,

                    );
 
		return view('frontend.cmspage.news_media',$page_array);
    	
    }
    public function news_pages(Request $request) {
        
        $slug=$request->segment(1);
        $page_slug=$request->segment(2);
       
        $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

        $news = DB::table('news')->where('is_delete','0')->where('status','Active')->orderBy('id','DESC')->get();
       
        if($page_slug=="latest-events"){
            
        $event = $news->where('upload_type',4);
        }
       else if($page_slug=="press-coverage"){
           
        $event = $news->whereIn('upload_type',[2,1]);
       }
       else if($page_slug=="advertisement-centre"){
          
        $event = $news->where('upload_type',3); 
       }else{
           
        $event = $news->where('upload_type',4);
       }
        
         $breadcrumbs=array();
         $breadcrumbs[]=array("name"=>'News & Media',"link"=>url("/$slug"));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
                    'sub_text' => $data->sub_text,
    'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'events' => $event,

                    );
 
		return view('frontend.cmspage.news_pages',$page_array);
    	
    }

    public function design(Request $request) {
        
        $slug=$request->segment(1);
       
        $data = Cmspage::where('page_slug', $slug)->where('status','Active')->where('is_delete','0')->first();

         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'News & Media',"link"=>url("/$slug"));

        
        $windowsdata =  DB::table('window_types')
        ->select()->where('is_delete','0')->where('status','Active')->where('product_type','Window')->get();
        
        $doorsdata =  DB::table('window_types')
        ->select()->where('is_delete','0')->where('status','Active')->where('product_type','Door')->get();
            
            
      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,      
                   'about' => $data->about,
    'meta_title' => $data->meta_title,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'banner_image' => $data->banner_image,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'windowsdata' => $windowsdata,
                    'doorsdata' => $doorsdata,

                    );
 
		return view('frontend.cmspage.design',$page_array);
    	
    }

    public function material(Request $request) {
        
        $slug=$request->segment(1);
       
        $data = Cmspage::where('page_slug', $slug)->where('status','Active')->where('is_delete','0')->first();

        
            
        $upvcdata =  DB::table('windowdoor_types')
        ->select()->where('is_delete','0')->where('status','Active')->where('title','like', '%upvc%')->get();
        
        $almdata =  DB::table('windowdoor_types')
        ->select()->where('is_delete','0')->where('status','Active')->where('title','like', '%Alumininum%')->get();
            
        
        $internaldata =  DB::table('windowdoor_types')
        ->select()->where('is_delete','0')->where('status','Active')->where('id',5)->where('type','Door')->first();
            
        
        
         $breadcrumbs=array();
//         $breadcrumbs[]=array("name"=>'News & Media',"link"=>url("/$slug"));

      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'id' => $data->id,
                    'name' => $data->name,  
    'meta_title' => $data->meta_title,
                   'about' => $data->about,
                    'sub_text' => $data->sub_text,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                    
                    'content3' => $data->content3,                    
                    'banner_image' => $data->banner_image,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'upvcdata' => $upvcdata,
                    'almdata' => $almdata,
                    'internaldata' => $internaldata,
                    'divclass' => '',

                    );
 
		return view('frontend.cmspage.material',$page_array);
    	
    }


    static function pageNotFound() {
        
         abort(404);  
    }
        
    
    

}
