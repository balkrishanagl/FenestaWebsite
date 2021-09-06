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
use App\Models\PageMeta;
use App\Models\Serie;
use View;

class WindowdoorController extends Controller
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
                        'headerphoneno' => $headerphoneno,
                       
        );
        
        view::share('datasettings', $datasettings);
        
        $uri_seg = request()->segment(1);
        $uri_seg2 = request()->segment(2);
        if(!empty($uri_seg2)){
        $uridata = WindowdoorType::where('slug', $uri_seg2)->where('is_delete','0')->first();
        
          if(empty($uridata)){
              $uridata = Cmspage::where('page_slug', $uri_seg2)->where('is_delete','0')->first();
               if(empty($uridata)){
                  $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->first();
                    if(empty($uridata)){
                         return CmspageController::pageNotFound();
                    }else{
                    $this->pp_ss = 'page-'.$uridata->id;
                    }
              }else{
                    $this->pp_ss = 'page-'.$uridata->id;
               }
          }else{
             $this->pp_ss = 'product-'.$uridata->id; 
          }
            
        }else{
        $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->first();
            if(!empty($uridata)){
        $this->pp_ss = 'page-'.$uridata->id;
            }else{
              $this->pp_ss = '';  
            }
            
        }
//        $appreciations = DB::table('appreciations')
//                     ->select()->where('is_delete','0')->where('status','Active')
//                     ->get();
        
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
        view::share('c_city',$this->c_city);
    }
    public function pages($parent_slug=null,$child_slug=null) {

        $check_parent = Cmspage::where('page_slug', $parent_slug)->where('parent_menu_page_id',0)->first();
        
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
                    'meta_keywords' => $data->meta_keyword,
                    'meta_description' => $data->meta_description,
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
    $data = Cmspage::where('page_slug', $slug)->where('is_delete','0')->first();
        
    $menu_active='';

            if(!empty($data)){        
                    $blog_page_class='inr-page-bg';

$breadcrumbs=array();

//    $breadcrumbs[]=array("name"=>$data->page_title,"link"=>url('/'));
                
    $windowproduct =   WindowdoorType::where('is_delete','0')->where('status','Active')->where('type',$slug)->get();   
                
    $byapplication = WindowdoorByapplication::where('type', $slug)->where('is_delete','0')->where('status','Active')->get();

                $page_array=array(
                    'id' => $data->id,
                    'ptype' => $slug,
                    'name' => $data->page_title,                  
                    'about' => $data->about,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keywords' => $data->meta_keyword,
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
    $data = WindowdoorType::where('slug', $productslug)->where('is_delete','0')->first();
      if(empty($data)){
           return CmspageController::pageNotFound();
      }  
    $product_types = WindowType::where('product_type', $data->type)->where('product', $data->id)->where('is_delete','0')->where('status','Active')->get();
    $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
    $series = Serie::where('is_delete','0')->where('status','Active')->get();

    $menu_active='';
       

    $breadcrumbs=array();

    $breadcrumbs[]=array("name"=>$data->type,"link"=>url('/'.$slug));
                
    $this->pp_ss = 'product-'.$data->id;               
    $gallerys = DB::table('gallery_images')
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
                    'meta_keywords' => $data->meta_keyword,
                    'meta_description' => $data->meta_description,
                    'banner_image' => $data->banner_image,              
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,   
                    'feature_benefits' => $data->feature_benefits,   
                    'short_description' => $data->short_description,   
                    'body_class' => '',                    
//                    'meta_other' => $data->meta_other,
                    'image_alt' => $data->title,
                    'fffoptions' => $data->options,
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
    public function product_details(Request $request) {
    $slug = $request->segment(1); 
    $productslug = $request->segment(2); 
    $productslug3 = $request->segment(3); 
    $data = WindowdoorType::where('slug', $productslug)->where('is_delete','0')->where('status','Active')->first();
     
    if(empty($data)){
           return CmspageController::pageNotFound();
    }  
        
    $product_types_details = WindowType::where('product_type', $data->type)->where('slug', $productslug3)->where('product', $data->id)->where('is_delete','0')->where('status','Active')->first();
    
    if(empty($product_types_details)){
           return CmspageController::pageNotFound();
    }  
        
    $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
   
    $product_types = WindowType::where('product_type', $data->type)->where('product', $data->id)->where('is_delete','0')->where('status','Active')->orderBy('id','ASC')->get();
        
    $menu_active='';
       
    $breadcrumbs=array();
    $breadcrumbs[]=array("name"=>$data->type,"link"=>url('/'.$slug));
    $breadcrumbs[]=array("name"=>$data->title,"link"=>url('/'.$slug.'/'.$productslug));
        
        
    $this->pp_ss = 'producttype-'.$product_types_details->id;        
    $this->pp_ss1 = 'product-'.$data->id;        
//      echo $this->pp_ss;
//        die;
    $gallerys =DB::table('gallery_images')
                ->select('heading','image')->where('is_delete','0')->where('status','Active')->where('showon', 'like', "%$this->pp_ss1%")->where('showon', 'like', "%$this->pp_ss%")->where('type','gallery')->orderBy('id','DESC')
                ->get();
                
                $page_array=array(
                    'id' => $product_types_details->id,
                    'ptype' => $data->type,
                    'name' => $product_types_details->title,                  
                    'about' => $product_types_details->about,
                    'title' => ($product_types_details->title)?$product_types_details->title:$data->title,
                    'meta_title' => $product_types_details->meta_title,
                    'og_title' => $product_types_details->og_title,
                    'og_desc' => $product_types_details->og_desc,
                    'og_image' => $product_types_details->og_image,
                    'meta_keywords' => $product_types_details->meta_keyword,
                    'meta_description' => $product_types_details->meta_description,
                    'banner_image' => $product_types_details->banner_image,              
                    'featured_image' => $product_types_details->featured_image,              
                    'image' => $product_types_details->image,              
                    'video_url' => $product_types_details->video_url,              
                    'multi_image' => $product_types_details->multi_image,              
                    'recom_for' => json_decode($product_types_details->recom_for),              
                    'options' => json_decode($product_types_details->options),              
                    'slug' => $data->slug,                    
                    'content' => $product_types_details->page_description,   
                    'feature_benefits' => $product_types_details->feature_benefits,   
                    'short_description' => $product_types_details->short_description,   
                    'other2' => $product_types_details->other2,   
                    'body_class' => '',                    
//                    'meta_other' => $data->meta_other,
                    'image_alt' => $product_types_details->title,
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'gallerys' => $gallerys,
                    'product_types' => $product_types,
                    'featurebenefit' => $featurebenefit,
                    );

            $page_layout='product_details';
            return view('frontend/windowdoors/'.$page_layout, $page_array);
  
    	
    }

    static function pageNotFound() {
        
         abort(404);  
    }
        
    
    static function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return strtolower($slug);
	}

}
